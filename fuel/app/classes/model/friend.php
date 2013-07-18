<?

class Model_Friend extends \Orm\Model
{

	protected static $_properties = array(
		'id',
		'user_id',
		'friend_id',
		'status',
		'created_at',
		'updated_at',
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

	protected static $_belongs_to = array(
	    'users' => array(
	        'key_from' => 'user_id',
	        'model_to' => 'Model_User',
	        'key_to' => 'id',
	        'cascade_save' => true,
	        'cascade_delete' => false,
	    )
	);

	protected static $_table_name = 'friends';


	/**
	 * Get a list of all of the users friends
	 * @param  interger $user_id
	 * @return array
	 */
	public static function get_friends($user_id)
	{
		$query = static::query()
							->where(array('status', 1))
							->where(array('user_id', $user_id))
							->or_where(array('friend_id', $user_id))
							->get();
		
		foreach($query as $friend)
		{

			if($friend->user_id == $user_id)
			{
				// I added them as a friend
				// search for their information
				// using friend->friend_id
				$results = DB::select('users.id', 'users.username', 'users.profile_image')
									->from('users')
									->join('friends')
									->on('friends.friend_id', '=', 'users.id')
									->where('users.id', $friend->friend_id)
									->limit(1)
									->as_object('Model_User')->execute();
				
					
				foreach($results as $r)
				{
					$friends[] = $r;
				} 
				
			}
			else
			{
				// They added me as a friend
				// search for their information
				// user friend->user_id
				$results = DB::select('users.id', 'users.username', 'users.profile_image')
									->from('users')
									->join('friends')
									->on('friends.user_id', '=', 'users.id')
									->where('users.id', $friend->user_id)
									->limit(1)
									->as_object('Model_User')->execute();


				foreach($results as $r)
				{
					$friends[] = $r;
				} 
			}
		}
		
		if(isset($friends))
		{
			return $friends;
		}
		
	}





	/**
	 * Check whether or not two users are friends
	 * @param  integer $user_id      ID of the friend whose profile or decks are being viewd
	 * @param  integer $current_user ID of the currently logged in user
	 * @return bool
	 */
	public static function check_friendship($user_id, $current_user)
	{
		$query = static::query()
							->where('status', 1)
							->where('user_id', $user_id)
							->where('friend_id', $current_user)
							->or_where('user_id', $current_user)
							->where('friend_id', $user_id)
							->get();

		if(empty($query) == true)
		{
			return false;
		}
		else
		{
			return true;
		}
	}



	/**
	 * Add new friends
	 * @param array $notification
	 */
	public static function add_new($notification)
	{
		$new_friends = static::forge(array(
						'user_id'   => $notification->user_id,
						'friend_id' => $notification->friend_id,
						'status'    => 1,
		));

		if($new_friends->save())
		{
			return true;
		}
		else
		{
			return false;
		}
	}



}