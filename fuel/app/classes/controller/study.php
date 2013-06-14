<?php

class Controller_Study extends Controller_Template
{

	public function action_cards($deck_id)
	{

		$data['username']   = Session::get('username');

		$data['deck_info']  = Model_Deck::get_deck($deck_id);

		$data['cards']      = Model_Card::get_all_cards($deck_id);
		$data['card_count'] = count($data['cards']);


		$this->template->head    = View::forge('includes/head');
		$this->template->header  = View::forge('includes/logged_in/header', $data);
		$this->template->content = View::forge('study/index', $data);
		$this->template->footer  = View::forge('includes/footer');
	}

}
