<?

class Controller_Deck extends Controller_Template{
	
	/**
	 * Create New Deck
	 * 
	 * Displays the create new deck form
	 */
	public function action_create()
	{

		// Setting up views
		$this->template->head    = View::forge('includes/head');
		
		$this->template->header  = View::forge('includes/logged_in/header', array(
											'username' => Session::get('username'),
		));
		
		$this->template->content = View::forge('deck/index');

		$this->template->footer  = View::forge('includes/footer');
	}

	/**
	 * Deck Save
	 *
	 * Saves a new user created deck into the database
	 */
	public function post_save()
	{
		$deck_info['id'] 	  = uniqid();
		$deck_info['title']   = Input::post('title');
		$deck_info['privacy'] = Input::post('privacy');

		$new_deck = Model_Deck::save_deck($deck_info);


		// Removing the deck title, privacy and tags
		$sliced = array_slice(Input::post(), 3);

		// Dividing the array into term/definition paris
		$cards  = array_chunk($sliced, 2);

		// Removing the empy array value from the end of $cards
		$removed  = array_pop($cards);

		// Setting the deck_id for the cards table
		$cards['deck_id'] = $deck_info['id'];

		$new_cards = Model_Card::save_cards($cards);


		// Setting up views
		$this->template->head    = View::forge('includes/head');

		$this->template->header  = View::forge('includes/logged_in/header', array(
											'username' => Session::get('username'),
		));

		$this->template->content = View::forge('deck/save');

		$this->template->footer  = View::forge('includes/footer');
	}



	public function get_edit()
	{
		// Setting up views
		$this->template->head    = View::forge('includes/head');

		$this->template->header  = View::forge('includes/logged_in/header', array(
											'username' => Session::get('username'),
		));

		$this->template->content = View::forge('deck/edit');

		$this->template->footer  = View::forge('includes/footer');
	}


}