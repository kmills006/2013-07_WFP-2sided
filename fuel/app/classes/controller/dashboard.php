<?php

class Controller_Dashboard extends Controller_App
{

	/**
	 * [action_study description]
	 * @param  integer $page_number [description]
	 * @return [type]               [description]
	 */
	public function action_study($page_number = 1)
	{
		$user = $this->user;

		if (!isset($user))
		{
			Response::redirect('user/login');
		}


		// Pagination
		$pagination = \Pagination::forge('pagination', array(
			'pagination_url' => Uri::base().'dashboard/study',
			'total_items'    => $user->total_decks(),
			'per_page'       => 8,
			'uri_segment'    => 4,
			'show_first'     => false,
			'show_last'      => false,
			'current_page'   => $page_number,
			'template'       => array(
	            'wrapper_start' => '<div class="pagination"> ',
	            'wrapper_end'   => ' </div>',
	            'active'        => 'active',
            ),
		));


		// Setting up views
		$this->template->content = View::forge('dashboard/index', array(
			'user_info'        => $user,
			'decks'            => $user->get_decks($pagination->per_page, $pagination->offset),
			'pagination'	   => $pagination->render(),
			'total_decks'      => $user->total_decks(),
			'recently_studied' => $user->get_recently_studied(),
		));
	}

	/**
	 * [get_notifications description]
	 * @return [type] [description]
	 */
	public function get_notifications()
	{
		$user = $this->user;

		if (! isset($user))
		{
			Response::redirect('user/login');
		}
		
		$this->template->content = View::forge('dashboard/notifications', array(
			'username'      => $user->username,
			'notifications' => $user->get_notifications(),
		));
	}

	/**
	 * [get_achievements description]
	 * @return [type] [description]
	 */
	public function get_achievements()
	{
		$user = $this->user;
		
		if(!isset($user))
		{
			Response::redirect('user/login');
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
			$points_to_level = $user->points_to_level($user->get_points()->total_points, $user->check_level($user->get_points()->total_points));
		}
		
		$this->template->content = View::forge('dashboard/achievements', array(
			'username'        => $user->username,
			'points'          => $user->get_points(),
			'level'           => $level,
			'points_to_level' => $points_to_level,
		));
	}


	/**
	 * [get_settings description]
	 * @return [type] [description]
	 */
	public function get_settings()
	{
		$user = $this->user;
		
		if (! isset($user))
		{
			Response::redirect('user/login');
		}


		$this->template->content = View::forge('dashboard/settings', array(
			'user_info' => $user,
		));
	}
}

