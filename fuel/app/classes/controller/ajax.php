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
			
			return $this->response = \Format::forge(array('success' => true))->to_json();
		}
	}



	/**
	 * Reject Friend Request
	 * @return
	 */
	public function post_delete_notification()
	{
		//$deleted = Model_Notification::delete_request(Input::post('notification_id'));

		return $this->response = \Format::forge(array('success' => true))->to_json();
	}

	/**
	 * Accept Friend Request
	 * @return
	 */
	public function post_accept_friend()
	{
		
		$notification = Model_Notification::find(Input::post('notification_id'));

		$new_friends = Model_Friend::add_new($notification);
		$delete_notification = Model_Notification::delete_request($notification->id);
		
		if(!$new_friends)
		{
			// Error adding friend
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







}