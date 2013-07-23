<?

class Controller_Quiz extends Controller_App
{

		/**
		 * [get_questions description]
		 * @param  [type] $deck_id [description]
		 * @return [type]          [description]
		 */
		public function get_questions($deck_id)
		{
			$is_logged_in = Session::get('is_logged_in');

			if(!isset($this->user))
			{
				
			}


			$deck = Model_Deck::get_deck($deck_id);
			$deck_owner = $deck->users->username;
			
			$this->template->content = View::forge('quiz/index', array(
											'deck_info'  => $deck,
											'cards'      => $deck->get_cards(),
											'card_count' => $deck->get_card_count(),
											'tags'       => $deck->get_tags(),
											'deck_owner' => $deck->users->username,
			));			
		}



	
}