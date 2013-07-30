<?php

class Controller_Dashboard extends Controller_App
{

	/**
	 * [action_index description]
	 * @return [type] [description]
	 */
	public function action_index()
	{
		$user = $this->user;

		if (!isset($user))
		{
			Response::redirect('user/login');
		}

		// Setting up views
		$this->template->content = View::forge('dashboard/index', array(
			'user_info'        => $user,
			'decks'            => $user->get_decks(),
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
		
		$this->template->content = View::forge('dashboard/achievements', array(
			'username' => $user->username,
			'points'   => $user->get_points(),
			'level'    => $user->check_level($user->get_points()->total_points),
			'points_to_level' => $user->points_to_level($user->get_points()->total_points, $user->check_level($user->get_points()->total_points)),
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

