<?

class Controller_Quiz extends Controller_Template
{

			
		public function get_questions($deck_id)
		{
			$is_logged_in = Session::get('is_logged_in');

			$deck = Model_Deck::get_deck($deck_id);
			$deck_owner = $deck->users->username;
			
			// Setting up views
			$this->template->head    = View::forge('includes/head');

			// Determining which header to be displayed
			if(!isset($is_logged_in))
			{
				$this->template->header  = View::forge('includes/logged_out/header');
			}
			else
			{
				$this->template->header  = View::forge('includes/logged_in/header', array(
													'username'      => Session::get('username'),
													'profile_image' => Model_User::get_by_id(Session::get('user_id'))->profile_image,
													'notifications' => Model_Notification::get_count(Session::get('user_id')),
				));
			}

			$this->template->content = View::forge('quiz/index', array(
												'deck_info'  => Model_Deck::get_deck($deck_id),
												'cards'      => Model_Card::get_all_cards($deck_id),
												'card_count' => Model_Card::get_card_count($deck_id),
												// 'quiz_cards' => Model_Card::get_questions($deck_id),
												'tags'       => Model_Tag::get_tags($deck_id),
												'deck_owner' => $deck_owner,
			));

			$this->template->footer  = View::forge('includes/footer');
		
		}



	
}