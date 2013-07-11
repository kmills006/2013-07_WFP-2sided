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

  		$data = Model_Deck::get_users_decks(Session::get('user_id'), Input::post('newest'));

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


	/**
	 * Add New Friend
	 * @return 
	 */
	public function post_add_friend()
	{
		$added = Model_Notification::add_new((int)Input::post('user_id'), 
											 (int)Input::post('friend_id'), 
											 Input::post('message'));

		if(!$added)
		{
			// Problem adding new friend
			// throw error message
		}
		else
		{
			// Successfully added new friend
			// change button to pending until
			// user accepts friend request
			
			echo 'trueeeee';
		}
	}
}