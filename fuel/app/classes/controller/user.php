<?php

class Controller_User extends Controller_Template{

	/**
	 * Get Login
	 *
	 * Load login view
	 */
	public function get_login()
	{
		$this->template->head    = View::forge('includes/head');
		$this->template->header  = View::forge('includes/logged_out/header');
		$this->template->content = View::forge('login/index');
		$this->template->footer  = View::forge('includes/footer');
	}

	/**
	 * Check Login
	 * 
	 * Checking the user login information
	 */
	public function post_login()
	{
		
		if(Auth::login())
		{
			$user['user_id']       = Auth::get_user_id()[1];
			$user['username']      = Auth::get('username');
			
			
			$session = Session::set(array(
						'user_id'      => $user['user_id'],
						'username'     => $user['username'],
						'is_logged_in' => 1,
			));

			// If successful login, direct users to their dashboard
			Response::redirect('dashboard');
		}
		else
		{
			// If login failed, return user to login screen
			// and display error message
			$this->get_login();
		}

	}
	

	/**
	 * Get Signup
	 * 
	 * Load signup view
	 */
	public function get_signup()
	{
		$this->template->head    = View::forge('includes/head');
		$this->template->header  = View::forge('includes/logged_out/header');
		$this->template->content = View::forge('signup/index');
		$this->template->footer  = View::forge('includes/footer');
	}


	/**
	 * Registering a new user
	 */
	public function post_signup()
	{
		
		$new_user = Auth::create_user(
						Input::post('username'),
						Input::post('password'),
						Input::post('email'),
						1
		);

		if(!$new_user)
		{
			// User could not be added to the database
			// Show error message
		}
		else
		{
			if(Auth::login(Input::post('username'), Input::post('password')))	
			{
				$user['user_id']  = Auth::get_user_id()[1];
				$user['username'] = Auth::get('username');

				$session = Session::set(array(
								'user_id'      => $user['user_id'],
								'username'     => $user['username'],
								'is_logged_in' => 1,
				));

				Response::redirect('dashboard');
			};
		}
	
	}


	/**
	 * post_settings
	 *
	 * Updating the database with the users 
	 * changed information
	 */
	public function post_settings()
	{

		$updated_info['user']     = Model_User::get_by_id(Session::get('user_id'));
		$updated_info['new_info'] = Input::post();

		$update_user = Model_User::update_user($updated_info);
		
		// // var_dump(Input::post('name'));
		
		// // $user = Auth::update_user(array(
		// // 					'email' => Input::post('email'),
		// // 					'name' => Input::post('name'),
		// // ));

		// // var_dump(Auth::get_profile_fields());

		// $this->template->head    = View::forge('includes/head');
		// $this->template->header  = View::forge('includes/logged_out/header');
		// $this->template->content = View::forge('signup/index');
		// $this->template->footer  = View::forge('includes/footer');
		// On successful update, reload user dashbord on settings page
		Response::redirect('dashboard/settings');
	}


	/**
	 *
	 * check_username
	 *
	 * ajax 
	 * 
	 */
	public function check_username($new_username)
	{
		var_dump($new_username);
	}


	/**
	 * Logout
	 * 
	 * Log out the current user
	 */
	public function get_logout()
	{
		Auth::logout();
		Session::destroy();
		Response::redirect('landing');
	}
}
