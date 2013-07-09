<?php

class Controller_Dashboard extends Controller_Template
{

	public function action_index()
	{
	
		if(Session::get('is_logged_in') == 1)
		{

			// Setting up views
			$this->template->head    = View::forge('includes/head');

			$this->template->header  = View::forge('includes/logged_in/header', array(
												'username'      => Model_User::get_by_id(Session::get('user_id'))->username,
												'profile_image' => Model_User::get_by_id(Session::get('user_id'))->profile_image,
												'notifications' => Model_Notification::get_count(Session::get('user_id')),
			));


			$this->template->content = View::forge('dashboard/index', array(
												'username'    => Model_User::get_by_id(Session::get('user_id'))->username,
												'name'        => Model_User::get_by_id(Session::get('user_id'))->name,
												'decks'       => Model_Deck::get_users_decks(Session::get('user_id')),
												'total_decks' => Model_Deck::get_total_decks(Session::get('user_id')),
			));

			$this->template->footer  = View::forge('includes/footer');
		}
		else
		{
			Response::redirect('user/login');
		}
		
	}


	public function get_notifications()
	{
		if(Session::get('is_logged_in') == 1)
			{


				// $notifications = Model_Notification::get_notifications(Session::get('user_id'));

				// Setting up views
				$this->template->head    = View::forge('includes/head');

				$this->template->header  = View::forge('includes/logged_in/header', array(
													'username'      => Model_User::get_by_id(Session::get('user_id'))->username,
													'profile_image' => Model_User::get_by_id(Session::get('user_id'))->profile_image,
				));


				$this->template->content = View::forge('dashboard/notifications', array(
													'username'      => Session::get('username'),
													'notifications' => Model_Notification::get_notifications(Session::get('user_id')),
				));

				$this->template->footer  = View::forge('includes/footer');
		}
		else
		{
			Response::redirect('user/login');
		}
	}


	public function get_achievements()
	{
		if(Session::get('is_logged_in') == 1)
			{
				// Setting up views
				$this->template->head    = View::forge('includes/head');

				$this->template->header  = View::forge('includes/logged_in/header', array(
													'username'      => Model_User::get_by_id(Session::get('user_id'))->username,
													'profile_image' => Model_User::get_by_id(Session::get('user_id'))->profile_image,
				));


				$this->template->content = View::forge('dashboard/achievements', array(
													'username'    => Session::get('username'),
				));

				$this->template->footer  = View::forge('includes/footer');
		}
		else
		{
			Response::redirect('user/login');
		}
	}


	/**
	 * [get_settings description]
	 */
	public function get_settings()
	{
		if(Session::get('is_logged_in') == 1)
			{
				// Setting up views
				$this->template->head    = View::forge('includes/head');

				$this->template->header  = View::forge('includes/logged_in/header', array(
													'username'      => Model_User::get_by_id(Session::get('user_id'))->username,
													'profile_image' => Model_User::get_by_id(Session::get('user_id'))->profile_image,
				));


				$this->template->content = View::forge('dashboard/settings', array(
													'user_info' => Model_User::get_by_id(Session::get('user_id')),
				));

				$this->template->footer  = View::forge('includes/footer');
		}
		else
		{
			Response::redirect('user/login');
		}
	}





	public function get_sort_newest()
	{
		echo 'HERE HOORAY!';
	}

}

