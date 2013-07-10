<? 


class Controller_Ajax extends Controller_Rest{


	/**
	 * Get the current logged in users id
	 * @return $data 
	 */
	public function get_user_id()
	{

  		$data = array(
  					'user_id' => Session::get('user_id'),
  		);

  		return $this->response = \Format::forge($data)->to_json();
	}


	/**
	 * Sort users decks by newests created
	 * @return $data 
	 */
	public function post_newest()
	{

  		$data = array(
  					'decks'    => Model_Deck::get_users_decks(Session::get('user_id'), Input::post('newest')),
  		);

  		return $this->response = \Format::forge($data)->to_json();
	}

	/**
	 * Sort users decks by oldest created
	 * @return $data 
	 */
	public function post_oldest()
	{

  		$data = Model_Deck::get_users_decks(Session::get('user_id'), Input::post('oldest'));

  		return $this->response = \Format::forge($data)->to_json();
	}

}