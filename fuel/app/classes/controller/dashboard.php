<?php

class Controller_Dashboard extends Controller_Template
{

	public function action_index()
	{
		$user_id          = Session::get('user_id');
		$data['username'] = Session::get('username');
		
		$data['decks']    = Model_Deck::get_users_decks($user_id);
		$data['total_decks'] = Model_Deck::get_total_decks($user_id);

		$this->template->head    = View::forge('includes/head');
		$this->template->header  = View::forge('includes/logged_in/header', $data);
		$this->template->content = View::forge('dashboard/index', $data);
		$this->template->footer  = View::forge('includes/footer');
	}

}
