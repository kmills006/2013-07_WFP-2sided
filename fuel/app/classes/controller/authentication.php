<?php

class Controller_Authentication extends Controller{

	public function action_check_user(){
		$username = Input::post('username');
		$password = Input::post('password');
	}
	
	
	// Sign up a new user
	public function action_sign_up(){
		echo "Sign Up";
	}

}
