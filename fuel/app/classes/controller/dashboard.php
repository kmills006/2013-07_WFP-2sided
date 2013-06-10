<?php

class Controller_Dashboard extends Controller{

	public function action_index(){
		$view = View::forge('layout');
			
		$view->head = View::forge('includes/head');
		$view->header = View::forge('includes/logged_in/header');
		$view->content = View::forge('dashboard/index');
		$view->footer = View::forge('includes/footer');
		
		return $view;
	}

}
