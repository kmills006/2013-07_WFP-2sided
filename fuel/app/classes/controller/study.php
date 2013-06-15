<?php

class Controller_Study extends Controller_Template
{

	public function get_cards($deck_id)
	{

		$deck = Model_Deck::get_deck($deck_id);
		$deck_owner = $deck->users->username;

		
		// Setting up views
		$this->template->head    = View::forge('includes/head');

		if(!isset($is_logged_in))
		{
			$this->template->header  = View::forge('includes/logged_out/header');
		}
		else
		{
			$this->template->header  = View::forge('includes/logged_in/header', array(
												'username' => Session::get('username'),
			));
		}

		$this->template->content = View::forge('study/index', array(
											'deck_info'  => Model_Deck::get_deck($deck_id),
											'cards'      => Model_Card::get_all_cards($deck_id),
											'card_count' => Model_Card::get_card_count($deck_id),
											'deck_owner' => $deck_owner,
		));

		$this->template->footer  = View::forge('includes/footer');
		
	}

}
