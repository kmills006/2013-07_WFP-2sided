<?php

class Controller_Dashboard extends Controller_Template
{

	public function action_index()
	{
		$user['username'] = Session::get('username');

		$this->template->head    = View::forge('includes/head');
		$this->template->header  = View::forge('includes/logged_in/header', $user);
		$this->template->content = View::forge('dashboard/index', $user);
		$this->template->footer  = View::forge('includes/footer');
	}

}
