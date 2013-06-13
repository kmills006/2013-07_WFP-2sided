<?php

	class Controller_Landing extends Controller_Template
	{
	
		public function action_index()
		{

			$this->template->head    = View::forge('includes/head');
			$this->template->header  = View::forge('includes/logged_out/header');
			$this->template->content = View::forge('landing/index');
			$this->template->footer  = View::forge('includes/footer');
		
		}
	}
