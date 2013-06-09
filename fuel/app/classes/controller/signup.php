<?php

class Controller_Signup extends Controller{

	public function action_index(){
		$view = View::forge('layout');
			
		$view->head = View::forge('includes/head');
		$view->header = View::forge('includes/logged_out/header');
		$view->content = View::forge('signup/index');
		$view->footer = View::forge('includes/footer');
		
		return $view;
	}
}
