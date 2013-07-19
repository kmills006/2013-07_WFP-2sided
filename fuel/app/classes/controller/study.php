<?php

class Controller_Study extends Controller_Template
{

	public function get_cards($deck_id)
	{

		$deck = Model_Deck::get_deck($deck_id);
		$deck_owner = $deck->users->username;

		if($deck->user_id != Session::get('user_id'))
		{
			$liked = Model_Like::check_like($deck_id);
		}
		else
		{
			// Viewing your own deck
			// Edit button
			$liked = false;
		}
		
		// Setting up views
		$this->template->head    = View::forge('includes/head');

		if(Session::get('is_logged_in') != 1)
		{
			$this->template->header  = View::forge('includes/logged_out/header');
		}
		else
		{
			$this->template->header  = View::forge('includes/logged_in/header', array(
												'username'      => Model_User::get_by_id(Session::get('user_id'))->username,
												'profile_image' => Model_User::get_by_id(Session::get('user_id'))->profile_image,
												'notifications' => Model_Notification::get_count(Session::get('user_id')),
			));
		}


		$this->template->content = View::forge('study/index', array(
											'deck_info'  => Model_Deck::get_deck($deck_id),
											'cards'      => Model_Card::get_all_cards($deck_id),
											'card_count' => Model_Card::get_card_count($deck_id),
											'tags'       => Model_Tag::get_tags($deck_id),
											'likes'      => Model_Like::get_likes($deck_id),
											'deck_owner' => $deck_owner,
											'liked'      => $liked,
											'quiz_score' => Model_Score::get_last_score($deck_id, Session::get('user_id')),
		));

		$this->template->footer  = View::forge('includes/footer');
		
	}

}
