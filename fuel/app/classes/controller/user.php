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
	 * Checking the user login information
	 */
	public function post_login()
	{
		
		if(Auth::login())
		{
			$user['user_id']  = Auth::get_user_id()[1];
			$user['username'] = Auth::get('username');
			
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
			Response::redirect('login');
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
	 * Log out the current user
	 */
	public function action_logout()
	{
		Auth::logout();
		Session::destroy();
		Response::redirect('landing');
	}
}
