<?php

class Controller_Dashboard extends Controller_Template
{

	public function action_index()
	{
		$user_id          = Session::get('user_id');
		$user['username'] = Session::get('username');
		
		$decks['decks'] = Model_Deck::get_users_decks($user_id);
		

		echo '<pre>';
		var_dump($decks);
		echo '</pre>';

		$this->template->head    = View::forge('includes/head');
		$this->template->header  = View::forge('includes/logged_in/header', $user);
		$this->template->content = View::forge('dashboard/index', $user);
		$this->template->footer  = View::forge('includes/footer');
	}

}
