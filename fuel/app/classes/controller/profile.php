<?php

class Controller_Profile extends Controller_App
{

	/**
	 * [action_view description]
	 * @param  [type] $username [description]
	 * @return [type]           [description]
	 */
	public function action_view($username)
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

		$limit = $user->total_decks();

		$this->template->content = View::forge('profile/index', array(
			'user_info'       => $user,
			'decks'           => $user->get_decks($user->total_decks(), 0),
			'deck_count'      => $user->total_decks(),
			'friends'         => $user->get_friends(),
			'friend_check'    => $user->is_friends_with($this->user->id),
			'check_pending'   => $user->is_pending_friend($this->user->id),
			'recent_activity' => $user->get_recent_activity($user->id),
			'points'          => $points,
			'level'           => $level,
			'points_to_level' => $points_to_level,
		));
		
		
	}

}
