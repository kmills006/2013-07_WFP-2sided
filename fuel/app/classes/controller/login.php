<?php

class Controller_Login extends Controller_Template
{

	public function action_index()
	{
		$data["subnav"] = array('index'=> 'active' );
		$this->template->title = 'Login &raquo; Index';
		$this->template->content = View::forge('login/index', $data);
	}

}
