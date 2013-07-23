<?php

class Controller_Study extends Controller_App
{

	public function get_view($deck_id)
	{
		$deck = Model_Deck::get_deck($deck_id);

		if($deck->user_id != $this->user->id)
		{
			$liked = $deck->check_like($this->user->id);
		}
		else
		{
			// Viewing your own deck
			// Edit button
			$liked = false;
		}
		
		// Setting up view
		$this->template->content = View::forge('study/index', array(
											'deck_info'  => $deck,
											'cards'      => $deck->get_cards(),
											'card_count' => $deck->get_card_count(),
											'tags'       => $deck->get_tags(),
											'deck_owner' => $deck->users->username,
											'liked'      => $liked,
											'quiz_score' => $deck->get_last_score($this->user->id),
		));		
	}

}
