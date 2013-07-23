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

		if (isset($this->template))
		{
			$this->_init_header();
			$this->_init_template_vars();
		}

	}


	/**
	 * [user_logged_in description]
	 * @return [type] [description]
	 */
	public function user_logged_in()
	{
		return isset($this->user);
	}


	/**
	 * [_init_auth description]
	 * @return [type] [description]
	 */
	private function _init_auth()
	{
		$this->auth = Auth::instance();
	}


	/**
	 * [_init_user description]
	 * @return [type] [description]
	 */
	private function _init_user()
	{
		if ($this->auth->check())
		{
			$this->user = Model_User::get_by_id($this->auth->get('id'));
		}
		else
		{
			$this->user = null;
		}
	}


	/**
	 * [_init_header description]
	 * @return [type] [description]
	 */
	private function _init_header()
	{
		$this->template->head = View::forge('includes/head');

		if ($this->user_logged_in())
		{
			$this->template->header = View::forge('includes/logged_in/header');
		}
		else
		{
			$this->template->header = View::forge('includes/logged_out/header');
		}

		$this->template->footer = View::forge('includes/footer');
	}


	/**
	 * [_init_template_vars description]
	 * @return [type] [description]
	 */
	public function _init_template_vars()
	{
		$this->template->set_global('user', $this->user, false);
	}



}