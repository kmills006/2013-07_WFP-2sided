<?php

class Controller_Profile extends Controller_Template
{

	public function action_index()
	{
		$view = View::forge('layout');
			
		$view->head = View::forge('includes/head');
		$view->header = View::forge('includes/logged_in/header');
		$view->content = View::forge('profile/index');
		$view->footer = View::forge('includes/footer');
		
		return $view;
	}

}
