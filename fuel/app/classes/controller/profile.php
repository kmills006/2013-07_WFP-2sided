<?php

class Controller_Profile extends Controller_App
{

	/**
	 * [action_view description]
	 * @param  [type] $username [description]
	 * @return [type]           [description]
	 */
	public function action_view($username, $page_number = 1)
	{
		$user = Model_User::get_by_username($username);

		if (! isset($user))
		{
			throw new HttpNotFoundException;
		}

		$points = $user->get_points();

		if(!isset($points))
		{
			// echo 'No points, try again.';

			$level = 1;
			$points_to_level = 50;
		}
		else
		{
			// echo 'POINTS HOOORAY!';

			$level = $user->check_level($user->get_points()->total_points);
			$points_to_level = $user->points_to_level($user->get_points()->total_points, $user->check_level($points->total_points));
		}

		// Pagination
		$pagination = \Pagination::forge('pagination', array(
			'pagination_url' => Uri::base().'profile/view/'.$username,
			'total_items'    => $user->total_decks(),
			'per_page'       => 8,
			'uri_segment'    => 5,
			'show_first'     => false,
			'show_last'      => false,
			'current_page'   => $page_number,
			'template'       => array(
	            'wrapper_start' => '<div class="pagination"> ',
	            'wrapper_end'   => ' </div>',
	            'active'        => 'active',
            ),
		));


		$this->template->content = View::forge('profile/index', array(
			'user_info'       => $user,
			'decks'           => $user->get_decks($pagination->per_page, $pagination->offset),
			'deck_count'      => $user->total_decks(),
			'friends'         => $user->get_friends(),
			'friend_check'    => $user->is_friends_with($this->user->id),
			'check_pending'   => $user->is_pending_friend($this->user->id),
			'recent_activity' => $user->get_recent_activity($user->id),
			'points'          => $points,
			'level'           => $level,
			'points_to_level' => $points_to_level,
			'pagination'	  => $pagination->render(),
		));
		
		
	}

}
