<?

class Controller_Deck extends Controller_Template{
	
	/**
	 * Displays the create new deck form
	 */
	public function action_create()
	{
		$data['username'] = Session::get('username');

		$this->template->head    = View::forge('includes/head');
		$this->template->header  = View::forge('includes/logged_in/header', $data);
		$this->template->content = View::forge('deck/index');
		$this->template->footer  = View::forge('includes/footer');
	}

	/**
	 * Deck Save
	 *
	 * Saves a new user created deck into the database
	 */
	public function action_save()
	{

		if(Input::post())
		{
			// echo '<pre>';
			// var_dump(Input::post());
			// echo '</pre>';

			$deck_info['title'] = Input::post('title');
			$deck_info['privacy'] = Input::post('privacy');

			$new_deck = Model_Deck::save_deck($deck_info);
		}




		$this->template->head    = View::forge('includes/head');
		$this->template->header  = View::forge('includes/logged_in/header');
		$this->template->content = View::forge('deck/save');
		$this->template->footer  = View::forge('includes/footer');
	}


}