<?php

class Controller_User extends Controller{

	/**
	 * Checking the user login information
	 */
	public function action_login()
	{
		// $username = Input::post('username');
		// $password = Input::post('password');

		// $user = Model_User::check_user($username, $password);

		// echo '<pre>';
		// print_r($user);
		// echo '</pre>';
		// 
		
		if(Input::post())
		{

			var_dump(md5(Input::post('password')));
			echo uniqid();

			if(Auth::login())
			{
				echo "Login Success";
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

}
