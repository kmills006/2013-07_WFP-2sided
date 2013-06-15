<?php

class Controller_Dashboard extends Controller_Template
{

	public function action_index()
	{
		
	
		if(Session::get('is_logged_in') == 1)
		{
			$user_id = Session::get('user_id');

			// Setting up views
			$this->template->head    = View::forge('includes/head');

			$this->template->header  = View::forge('includes/logged_in/header', array(
												'username' => Session::get('username'),
			));


			$this->template->content = View::forge('dashboard/index', array(
												'decks'       => Model_Deck::get_users_decks($user_id),
												'total_decks' => Model_Deck::get_total_decks($user_id),
			));

			$this->template->footer  = View::forge('includes/footer');
		}
		else
		{
			Response::redirect('login');
		}
		
	}

}
