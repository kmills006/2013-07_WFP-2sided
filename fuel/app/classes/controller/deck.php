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



	/**
	 * [get_edit description]
	 * @param  string $deck_id [description]
	 */
	public function get_edit($deck_id)
	{		

		// Setting up views
		$this->template->head    = View::forge('includes/head');

		$this->template->header  = View::forge('includes/logged_in/header', array(
											'username' => Session::get('username'),
		));

		$this->template->content = View::forge('deck/edit', array(
											'deck_info' => Model_Deck::get_deck($deck_id),
											'cards'     => Model_Card::get_all_cards($deck_id),
		));

		$this->template->footer  = View::forge('includes/footer');
	}


	/**
	 * [post_edit description]
	 */
	public function post_update()
	{
		// echo '<pre>';
		// var_dump(Input::post());
		// echo '</pre>';
		
		$updated_info['orig_info'] = Model_Deck::get_deck(Input::post('id'));

		$updated_info['id']        = Input::post('id');
		$updated_info['title']     = Input::post('title');
		$updated_info['privacy']   = Input::post('privacy');

		$updated_deck = Model_Deck::update_deck($updated_info);


		// Removing the deck title, privacy and tags
		$sliced = array_slice(Input::post(), 4);

		// Dividing the array into term/definition paris
		$cards  = array_chunk($sliced, 2);

		// // Removing the empy array value from the end of $cards
		$removed  = array_pop($cards);

		// echo '<pre>';
		// var_dump($cards);
		// echo '</pre>';

		// // Setting the deck_id for the cards table
		// $cards['deck_id'] = $deck_info['id'];

		// $new_cards = Model_Card::save_cards($cards);
		




		// Setting up views
		$this->template->head    = View::forge('includes/head');

		$this->template->header  = View::forge('includes/logged_in/header', array(
											'username' => Session::get('username'),
		));

		$this->template->content = View::forge('signup/index');

		$this->template->footer  = View::forge('includes/footer');
	}



}