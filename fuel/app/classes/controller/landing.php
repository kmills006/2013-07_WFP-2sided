<?php

	class Controller_Landing extends Controller_Template
	{
	
		public function action_index()
		{

			$is_logged_in = Session::get('is_logged_in');
			
			// Setting up views
			$this->template->head    = View::forge('includes/head');

			// Determining which header to be displayed
			if(!isset($is_logged_in))
			{
				$this->template->header  = View::forge('includes/logged_out/header');
			}
			else
			{
				$this->template->header  = View::forge('includes/logged_in/header', array(
													'username'      => Session::get('username'),
													'profile_image' => Model_User::get_by_id(Session::get('user_id'))->profile_image,
													'notifications' => Model_Notification::get_count(Session::get('user_id')),
				));
			}

			$this->template->content = View::forge('landing/index', array(
												'top_tags' => Model_Tag::get_top_tags(),
			));
			
			$this->template->footer  = View::forge('includes/footer');
		
		}
	}
