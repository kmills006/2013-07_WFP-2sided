<?php

	class Controller_Login extends Controller{
	
		public function action_index(){
			$view = View::forge('layout');
			
			$view->head = View::forge('includes/head');
			$view->header = View::forge('includes/logged_out/header');
			$view->content = View::forge('login/index');
			$view->footer = View::forge('includes/footer');
			
			return $view;
		}
	}
