
<?php

class Model_User extends \Orm\Model
{
	protected static $_properties = array(
		'id',
		'username',
		'password',
		'email',
		'last_login',
		'login_hash',
		'name',
		'profile_image',
		'facebook_id',
		'twitter_id',
		'created_at',
		'updated_at',
		'group',
	);

	protected static $_observers = array(
		'Orm\Observer_CreatedAt' => array(
			'events' => array('before_insert'),
			'mysql_timestamp' => false,
		),
		'Orm\Observer_UpdatedAt' => array(
			'events' => array('before_update'),
			'mysql_timestamp' => false,
		),
	);

	// protected static $_has_many = array(
	//     'decks' => array(
	//         'key_from' => 'id',
	//         'model_to' => 'Model_Deck',
	//         'key_to' => 'user_id',
	//         'cascade_save' => true,
	//         'cascade_delete' => false,
	//     )
	// );

	// protected static $_has_many = array(
	//     'decks' => array(
	//         'key_from' => 'id',
	//         'model_to' => 'Model_Friend',
	//         'key_to' => 'user_id',
	//         'cascade_save' => true,
	//         'cascade_delete' => false,
	//     )
	// );
	
	// protected static $_has_many = array(
	//     'notifications' => array(
	//         'key_from' => 'id',
	//         'model_to' => 'Model_Notification',
	//         'key_to' => 'friend_id',
	//         'cascade_save' => true,
	//         'cascade_delete' => false,
	//     )
	// );

	protected static $_table_name = 'users';


	/**
	 * 
	 * @param  interger $user_id
	 * @return Model_User 
	 */
	public static function get_by_id($user_id)
	{
		return static::query()->where('id', $user_id)->get_one();
	}


	/**
	 * 
	 * @param  string $username
	 * @return Model_User 
	 */
	public static function get_by_username($username)
	{
		return static::query()->where('username', $username)->get_one();
	}


	/**
	 * Update the user information
	 * Users can update their email address,
	 * username and add their name
	 * 
	 * @param  [type] $user_info 
	 * @return [type]            
	 */
	public static function update_user($user_info)
	{

		$user = $user_info['user'];


		// Checking if they have updated their name
		if($user->name != $user_info['new_info']['name'])
		{
			$user->name = $user_info['new_info']['name'];
		}
		else
		{
			// No change
		}


		// Checking if they have updated their email
		if($user->email != $user_info['new_info']['email'])
		{
			$user->email = $user_info['new_info']['email'];
		}
		else
		{
			// No change
		}


		// Checking if they have updated their username
		if($user->username != $user_info['new_info']['username'])
		{
			$check_username = static::query()
										->select('username')
										->where('username', $user_info['new_info']['username'])	
										->get_one();

			if(isset($check_username))
			{
				// I want to change this to check on keyup when they are typing in the
				// desired username. 
				echo 'Username taken, throw error message to have them select another one.';
			}
			else
			{
				$user->username = $user_info['new_info']['username'];
			}
		}
		else
		{
			// Not updating username
		}

		// Checking if they are updating their password
		if($user_info['new_info']['o-password'] != null)
		{
			if($user_info['new_info']['new-password'] == $user_info['new_info']['c-password'])
			{
				$update_pass = Auth::change_password($user_info['new_info']['o-password'], $user_info['new_info']['new-password'], $user->username);

				if(!$update_pass)
				{
					echo 'Old password is incorrect, show error message on form.';
				}	
			}
			else
			{
				echo 'New password and confirm password are incorrect, show error message on form.';
			}
		}


		$user->save();
	}



	/**
	 * Check if the user has an 
	 * existing account with
	 * logging in with Facebook
	 * 
	 * @param  array   $fb_user 
	 * @return boolean          
	 * @return array   $user    
	 */
	public static function is_member($fb_user)
	{
		// echo '<pre>';
		// var_dump($user);
		// echo '</pre>';
		
		$user = static::query()
							->where('facebook_id', $fb_user['id'])
							->or_where('email', $fb_user['email'])
							->get_one();
		if($user == null)
		{
			return false;
		}
		else
		{

			// Checking if the user already had an account
			// and storing their facebook_id with their account
			if($user->facebook_id == null)
			{
				$user->facebook_id = $fb_user['id'];

				$user->save();
			}

			return $user;
		}
		
	}


	/**
	 * Search by username
	 * @param  string $search_terms
	 * @return array  $users
	 */
	public static function search_users($search_terms)
	{

		$results = DB::select()
							->from('users')
							->where('username', 'LIKE', '%'.$search_terms.'%')
							->as_object('Model_User')->execute();

		foreach($results as $result)
		{
			$users[] = $result;
		}

		if(isset($users))
		{
			return $users;
		}
	}



	public static function get_recent_activity($user_id)
	{

		/* CREATING RECENT ACTIVITY
		
		(
		 	SELECT user_id, studied_at, 'studied' AS `type`, created_at
		 	FROM recently_studied 
			WHERE user_id = 3
		)
		UNION
		(
			SELECT user_id, friend_id, 'friend' AS `type`, created_at
			FROM friends
			WHERE user_id = 3 OR friend_id = 3
		)
		UNION
		(
			SELECT user_id, score, 'score' AS `type`, created_at
			FROM scores
			WHERE user_id = 3
		)
		UNION
		(
			SELECT user_id, deck_id, 'liked_deck' AS `type`, created_at
			FROM likes
			WHERE user_id = 3
		)
		UNION
		(
			SELECT user_id, id, 'created_deck' AS `type`, created_at
			FROM decks
			WHERE user_id = 3
		)
		ORDER BY created_at DESC; */


		$query = '(SELECT user_id, studied_at, "studied" AS `type`, created_at 
				   FROM recently_studied 
				   WHERE user_id = ' . $user_id . '
				  )
				  UNION
				  (
				  	SELECT user_id, friend_id, "friend" AS `type`, created_at 
				  	FROM friends 
				  	WHERE user_id = 3 OR friend_id =' . $user_id . '
				  )
				  UNION
				  (
					SELECT user_id, score, "score" AS `type`, created_at
					FROM scores
					WHERE user_id = ' . $user_id . '
				  )
				  UNION
				  (
					SELECT user_id, deck_id, "liked_deck" AS `type`, created_at
					FROM likes
					WHERE user_id = ' . $user_id . '
				  )
				  UNION
				  (
				  	SELECT user_id, id, "created_deck" AS `type`, created_at
				  	FROM decks
				  	WHERE user_id = ' . $user_id . '
				)
				ORDER BY created_at DESC'
		;

		// echo $query;

		$results = \DB::query($query)->as_object()->execute();

		foreach($results as $r)
		{
			echo '<pre>';
			var_dump($r->type);
			echo '</pre>';
		}
	}





	/**
	 * [total_notifications description]
	 * @return [type] [description]
	 */
	public function total_notifications()
	{
		return Model_Notification::get_count($this->id);
	}

	public function get_notifications()
	{
		return Model_Notification::get_notifications($this->id);
	}

	/**
	 * [profile_url description]
	 * @return [type] [description]
	 */
	public function profile_url()
	{
		return 'profile/view/'.$this->username;
	}


	/**
	 * [image_url description]
	 * @return [type] [description]
	 */
	public function image_url()
	{
		return 'profile_photos/thumbs/' . $this->profile_image;
	}

	/**
	 * [get_decks description]
	 * @return [type] [description]
	 */
	public function get_decks()
	{
		return Model_Deck::get_users_decks($this->id, 'newest');
	}

	/**
	 * [total_decks description]
	 * @return [type] [description]
	 */
	public function total_decks()
	{
		return Model_Deck::get_total_decks($this->id);
	}
	
	/**
	 * [get_friends description]
	 * @return [type] [description]
	 */
	public function get_friends()
	{
		return Model_Friend::get_friends($this->id);
	}


	/**
	 * [is_friends_with description]
	 * @param  [type]  $user_id [description]
	 * @return boolean          [description]
	 */
	public function is_friends_with($user_id)
	{
		return Model_Friend::check_friendship($this->id, $user_id);
	}


	/**
	 * [is_pending_friend description]
	 * @param  [type]  $user_id [description]
	 * @return boolean          [description]
	 */
	public function is_pending_friend($user_id)
	{
		return Model_Notification::check_pending($this->id, $user_id);
	}

	/**
	 * [get_points description]
	 * @return [type] [description]
	 */
	public function get_points()
	{
		return Model_Point::get_points($this->id);
	}

	/**
	 * [check_level description]
	 * @param  [type] $points [description]
	 * @return [type]         [description]
	 */
	public function check_level($points)
	{
		return Model_Level::check_level($points);
	}

	/**
	 * [points_to_level description]
	 * @param  [type] $points [description]
	 * @return [type]         [description]
	 */
	public function points_to_level($points, $level)
	{
		return Model_Level::points_to_level($points, $level);
	}

	/**
	 * [get_recently_studied description]
	 * @return [type] [description]
	 */
	public function get_recently_studied()
	{
		return Model_Studied::get_recently_studied($this->id);
	}




	/**
	 * Format the created_at field
	 * @param  string $format
	 * @return string
	 */
	public function date($format = "M d, Y")
	{
		return date($format, $this->created_at);
	}


}
