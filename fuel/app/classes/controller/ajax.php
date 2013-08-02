<? 


class Controller_Ajax extends Controller_Rest
{


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
	 * [get_username description]
	 * @return [type] [description]
	 */
	public function get_username()
	{
		$user = Model_User::get_by_id(Session::get('user_id'));
		return $this->response = \Format::forge($user->username)->to_json();
	}


	/**
	 * Sort users decks by newests created
	 * @return $data 
	 */
	public function post_newest()
	{
  		$data = Model_Deck::get_users_decks(Input::post('user_id'), Input::post('sort_by'), 8, 0);
  		return $this->response = \Format::forge($data)->to_json();
	}

	/**
	 * Sort users decks by oldest created
	 * @return $data 
	 */
	public function post_oldest()
	{

  		$data = Model_Deck::get_users_decks(Input::post('user_id'), Input::post('sort_by'), 8, 0);

  		return $this->response = \Format::forge($data)->to_json();
	}

	/**
	 * [post_rating description]
	 * @return [type] [description]
	 */
	public function post_rating()
	{
		$data = Model_Deck::get_users_decks(Input::post('user_id'), Input::post('sort_by'), 8, 0);

		return $this->response = \Format::forge($data)->to_json();
	}


	/**
	 * [post_get_cards description]
	 * @return [type] [description]
	 */
	public function post_get_cards()
	{
		$data = Model_Card::get_all_cards(Input::post('deck_id'));
		
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
			
			return $this->response = \Format::forge(array('success' => true))->to_json();
		}
	}



	/**
	 * Reject Friend Request
	 * @return
	 */
	public function post_delete_notification()
	{
		// Delete the notification
		$deleted = Model_Notification::delete_request(Input::post('notification_id'));

		if(!$deleted)
		{
			return $this->response = \Format::forge(array('success' => false))->to_json();
		}
		else
		{
			return $this->response = \Format::forge(array('success' => true))->to_json();
		}
	}

	/**
	 * Accept Friend Request
	 * @return
	 */
	public function post_accept_friend()
	{
		
		// Pull the correct notification
		$notification        = Model_Notification::find(Input::post('notification_id'));

		// Add the new friends
		$new_friends         = Model_Friend::add_new($notification);

		// Delete the notification
		$delete_notification = Model_Notification::delete_request($notification->id);

		
		if(!$new_friends)
		{
			return $this->response = \Format::forge(array('success' => false))->to_json();
		}
		else
		{
			return $this->response = \Format::forge(array('success' => true))->to_json();
		}
	}

	/**
	 * Update the notification icon in the global nav when a user is logged in
	 * @return
	 */
	public function post_update_nav()
	{
		$new_count = Model_Notification::get_count(Input::post('user_id'));
		
		return $this->response = \Format::forge(array('notification_count' => $new_count))->to_json();
	}


	/**
	 * Like Deck
	 */
	public function post_like_deck()
	{
		$like = Model_Like::like(Input::post('deck_id'));

		return $this->response = \Format::forge(array('success' => $like))->to_json();
	}


	/**
	 * Unlike Deck
	 * @return 
	 */
	public function post_unlike_deck()
	{
		$unlike = Model_Like::unlike(Input::post('deck_id'));

		return $this->response = \Format::forge(array('success' => $unlike))->to_json();
	}


	/**
	 * Delete deck
	 * @return
	 */
	public function post_delete_deck()
	{

		$recently_studied = Model_Studied::delete_deck(Input::post('deck_id'));
		$deck = Model_Deck::delete_deck(Input::post('deck_id'));

		// On succesful delete, reload user dashboard study page
		// Show success notification
		return $this->response = \Format::forge(array('success' => true))->to_json();
	}


	/**
	 * Get choices for quiz questions
	 * @return
	 */
	public function post_get_choices()
	{
		$choices = Model_Card::get_choices(Input::post());

		return $this->response = \Format::forge(array('choices' => $choices))->to_json();
	}

	/**
	 * [post_save_score description]
	 * @return [type] [description]
	 */
	public function post_save_score()
	{
		$new_score = Model_Score::save_score(Input::post());

		return $this->response = \Format::forge(array('success' => $new_score))->to_json();
	}


	/**
	 * [post_save_points description]
	 * @return [type] [description]
	 */
	public function post_save_points()
	{
		$new_points = Model_Point::save_points(Input::post());
	}


	/**
	 * [post_sort_az description]
	 * @return [type] [description]
	 */
	public function post_sort_az()
	{
		$cards = Model_Card::get_all_cards(Input::post('deck_id'), 'az');

		return $this->response = \Format::forge($cards)->to_json();
	}


	/**
	 * [post_sort_random description]
	 * @return [type] [description]
	 */
	public function post_sort_random()
	{
		$cards = Model_Card::get_all_cards(Input::post('deck_id'));

		return $this->response = \Format::forge($cards)->to_json();
	}

	/**
	 * [post_resources description]
	 * @return [type] [description]
	 */
	public function post_save_resource()
	{
		$new = Model_Resource::save_resource(Input::post());

		return $this->response = \Format::forge($new)->to_json();
	}

	/**
	 * [post_check_resource description]
	 * @return [type] [description]
	 */
	public function post_check_resource()
	{
		$results = Model_Resource::check_resource(Input::post('user_id'), Input::post('card_id'), Input::post('deck_id'));
		return $this->response = \Format::forge($results)->to_json();
	}

	/**
	 * [post_delete_resource description]
	 * @return [type] [description]
	 */
	public function post_delete_resource()
	{
		$results = Model_Resource::delete_resource(Input::post('resource_id'));
		return $this->response = \Format::forge($results)->to_json();
	}


	/**
	 * [post_get_resources description]
	 * @return [type] [description]
	 */
	public function post_get_resources()
	{
		$resources = Model_Resource::get_resources(Input::post('user_id'), Input::post('deck_id'));
		return $this->response = \Format::forge($resources)->to_json();
	}


	/**
	 * [post_update_recently_studied description]
	 * @return [type] [description]
	 */
	public function post_update_recently_studied()
	{
		$recently_studied = Model_Studied::get_recently_studied(Session::get('user_id'), Input::post('amount'));

		// Reformat studied at date
		foreach($recently_studied as $rs)
		{
			$rs->studied_at = $rs->date();
		}

		return $this->response = \Format::forge($recently_studied)->to_json();
	}



}