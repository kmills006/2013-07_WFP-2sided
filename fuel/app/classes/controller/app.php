<?php

class Controller_App extends Controller_Template
{

	public $auth = null;
	public $user = null;

	public function before()
	{
		parent::before();

		$this->_init_auth();
		$this->_init_user();
	}

	public function user_logged_in()
	{
		return isset($this->user);
	}



	private function _init_auth()
	{
		$this->auth = Auth::instance();
	}


	private function _init_user()
	{
		if ($this->auth->perform_check())
		{
			$this->user = Model_User::get_by_id($this->auth->get('id'));
		}
		else
		{
			$this->user = null;
		}
	}




}