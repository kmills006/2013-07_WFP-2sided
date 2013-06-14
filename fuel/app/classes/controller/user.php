<?php

class Controller_User extends Controller{

	/**
	 * Checking the user login information
	 */
	public function action_login()
	{

		if(Input::post())
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
	}
	
	
	/**
	 * Registering a new user
	 */
	public function action_signup()
	{
		if(Input::post())
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
									'user_id'  => $user['user_id'],
									'username' => $user['username'],
					));

					Response::redirect('dashboard');
				};
			}
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
