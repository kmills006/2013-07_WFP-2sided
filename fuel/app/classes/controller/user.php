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
				$user['user_id'] = Auth::get_user_id()[1];
				$user['username'] = Auth::get('username');
				
				$session = Session::set(array(
								'user_id'  => $user['user_id'],
								'username' => $user['username'],
				));

				// If successful login, direct users to their dashboard
				Response::redirect('dashboard');
			}
			else
			{
				echo "Login Failed";
			}
		}
	}
	
	
	/**
	 * Registering a new user
	 */
	public function action_signup()
	{
	
		$new_user = Auth::create_user(
							'blazer',
							'blazer',
							'blazer@gmail.com',
							1
		);
	
	}


	/**
	 * Log out the current user
	 */
	public function action_logout()
	{
		Auth::logout();
		Response::redirect('landing');
	}
}
