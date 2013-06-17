<?php

class Controller_Profile extends Controller_Template
{

	public function action_view($user_id)
	{
		// Setting up views
		$this->template->head    = View::forge('includes/head');

		if(Session::get('is_logged_in') == 1)
		{
			
			$this->template->header  = View::forge('includes/logged_in/header', array(
												'username' => Session::get('username'),

			));

		}
		else
		{
			$this->template->header  = View::forge('includes/logged_out/header');
		}

		$this->template->content = View::forge('profile/index', array(
											'user_info' => Model_User::get_by_id($user_id),
		));
		
		$this->template->footer  = View::forge('includes/footer');
	}

}
