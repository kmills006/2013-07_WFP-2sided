<?php

class Controller_Study extends Controller_Template
{

	public function action_index()
	{
		$view = View::forge('layout');
			
		$view->head = View::forge('includes/head');
		$view->header = View::forge('includes/logged_in/header');
		$view->content = View::forge('study/index');
		$view->footer = View::forge('includes/footer');
		
		return $view;
	}

}
