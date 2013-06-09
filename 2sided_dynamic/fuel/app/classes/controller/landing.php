<?php

class Controller_Landing extends Controller{

	public function action_index(){
		$view = View::forge('layout');
		
		$view->head = View::forge('includes/head');
		$view->header = View::forge('includes/logged_out/header');
		$view->content = View::forge('landing/index');
		$view->footer = View::forge('includes/footer');
		
		return $view;
	}
	
	
	// 404 Error
	public function action_404(){
		return Response::forge(ViewModel::forge('landing/404'), 404);
	}
}
