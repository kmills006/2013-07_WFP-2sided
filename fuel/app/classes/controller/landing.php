<?php

	class Controller_Landing extends Controller_Template
	{
	
		public function action_index()
		{

			$is_logged_in = Session::get('is_logged_in');


			$this->template->head    = View::forge('includes/head');

			// Determining which header to be displayed
			if(!isset($is_logged_in))
			{
				$this->template->header  = View::forge('includes/logged_out/header');
			}
			else
			{
				$this->template->header  = View::forge('includes/logged_in/header');
			}

			$this->template->content = View::forge('landing/index');
			$this->template->footer  = View::forge('includes/footer');
		
		}
	}
