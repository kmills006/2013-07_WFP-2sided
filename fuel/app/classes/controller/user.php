<?php

use \Social\Facebook;

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

		$val = Validation::forge('login_validation');

		$val->add('username', 'Username or Email Address')->add_rule('required');
		$val->add('password', 'Password')->add_rule('required');
		$val->set_message('required', 'The field :label is required.');

		if($val->run())
		{
			// If the user has correctly filled in both fields
			// attempt to login user
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
		else
		{
			// If the user has left either the username or password empty
			// reload the login screen with errors
			


			$this->template->head    = View::forge('includes/head');

			$this->template->header  = View::forge('includes/logged_out/header');

			$this->template->content = View::forge('login/index', array(
												'error_msg' => $val->error(),
			));

			$this->template->footer  = View::forge('includes/footer');
		}
	}


	/**
	 * Facebook Login
	 * 
	 * 
	 */
	public function action_facebook()
	{
		$data= array();

        $fbl_params = array(
        				'scope'        => 'email',
        				'redirect_uri' => Uri::create('user/handle_facebook'),
        );

        $data['fb_login_url'] = Facebook::instance()->getLoginUrl($fbl_params);

        Response::redirect($data['fb_login_url']);
	}


	/**
	 * [action_handle_facebook description]
	 * @return [type] [description]
	 */
	public function action_handle_facebook()
	{

		$user_id = Facebook::instance()->getUser();

		if($user_id)
		{
			try{
				$me = Facebook::instance()->api('/me');
				$fb_user = $me;

				if(!$fb_user)
				{
					// No user found
				}
				else
				{
					// Checks if the the user is alrady 
					// a member of the community
					if(Model_User::is_member($fb_user))
					{
						$user = Model_User::is_member($fb_user);

						$session = Session::set(array(
									'user_id'      => $user['id'],
									'username'     => $user['username'],
									'is_logged_in' => 1,
						));

						Response::redirect('dashboard');
					}
					else
					{
						// If this the first time the user
						// is logging in, register their 
						
						$this->template->head    = View::forge('includes/head');

						$this->template->header  = View::forge('includes/logged_out/header');

						$this->template->content = View::forge('signup/facebook', array(
															'facebook_user' => $fb_user,
						));
						
						$this->template->footer  = View::forge('includes/footer');
					}
				}
			}catch(FacebookApiException $e){
				error_log($e);
			}
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
							1,
							array(
								'facebook_id' => Input::post('facebook_id'),	
							)
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
	 * Post Settings
	 *
	 * Updating the database with the users 
	 * changed information
	 */
	public function post_settings()
	{

		// echo '<pre>';
		// var_dump(Input::post());
		// echo '</pre>';

		$updated_info['user']     = Model_User::get_by_id(Session::get('user_id'));
		$updated_info['new_info'] = Input::post();

		$update_user = Model_User::update_user($updated_info);
		
		// On successful update, reload user dashbord on settings page
		Response::redirect('dashboard/settings');
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
