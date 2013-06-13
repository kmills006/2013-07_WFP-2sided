<?php

class Controller_Study extends Controller_Template
{

	public function action_index()
	{
		$this->template->head    = View::forge('includes/head');
		$this->template->header  = View::forge('includes/logged_in/header');
		$this->template->content = View::forge('study/index');
		$this->template->footer  = View::forge('includes/footer');
	}

}
