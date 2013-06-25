
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
	 * [get_by_id description]
	 * @param  [type] $user_id [description]
	 * @return [type]          [description]
	 */
	public static function get_by_id($user_id)
	{
		return static::query()->where(array('id' => $user_id))->get_one();
	}


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
	 * [is_member description]
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

		// echo '<pre>';
		// var_dump($users);
		// echo '</pre>';

		if(isset($users))
		{
			return $users;
		}
	}



	/**
	 * [date description]
	 * @param  string $format [description]
	 * @return string         [description]
	 */
	public function date($format = "M d, Y")
	{
		return date($format, $this->created_at);
	}


}
