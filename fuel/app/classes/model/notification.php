<?


class Model_Notification extends \Orm\Model
{


	protected static $_properties = array(
		'id',
		'user_id',
		'friend_id',
		'message',
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

	protected static $_table_name = 'notifications';


	/**
	 * Get all notifications the currently logged in user has
	 * @param  interger $user_id
	 * @return array    $notifications
	 */
	public static function get_notifications($user_id)
	{
		$query = static::query()
						->where('user_id', $user_id)
						->or_where('friend_id', $user_id)
						->where('status', 0)
						->get();
		
		foreach($query as $notification)
		{
			if($notification->user_id != $user_id)
			{
				$results = DB::select('users.id', 'users.username', 'users.profile_image', 'notifications.message', 'notifications.created_at')
								->from('users')
								->join('notifications')
								->on('users.id', '=', 'notifications.user_id')
								->where('users.id', $notification->user_id)
								->limit(1)
								->as_object('Model_User')->execute();
			}
			else
			{
				// Current user requested the new friend or challenge
				// Do not display in their notifications
			}
			

			// Checking for any results from DB
			if(isset($results))
			{
				foreach($results as $r)
				{
					// Set the notification->id for the ability to delete the record when needed
					$r->notification_id = $notification->id;

					switch($r->message)
					{
						case 'friend':

							$r->message = ' wants to be friends.';

							break;
						
						case 'challenge':
							$r->message = ' wants to challenge you.';

							break;
					}

					$notifications[] = $r;
				}	
			}
			else
			{
				// No results found
			}
		}

		// Check if there are any notifications
		if(isset($notifications))
		{
			return $notifications;
		}
	}


	/**
	 * Get the total number of notifications for a user
	 * @param  integer $user_id
	 * @return array
	 */
	public static function get_count($user_id)
	{
		return static::query()
						->where(array(
									'friend_id' => $user_id,
									'status'  => 0,
						))
						->count();
	}


	/**
	 * When a friend request is sent, add a new notification for the user to either accept or reject
	 * @param integer $user_id   ID of the user adding a new friend
	 * @param integer $friend_id ID of the user who is getting the friend request
	 * @param string  $message   Determines whether this new notification is a friend request or a challenge request
	 */
	public static function add_new($user_id, $friend_id, $message)
	{

		// Checking to make sure there is not already an existing request
		// from either the currect user logged in or the friend they are 
		// trying to notify
		$check_exists = static::query()
									->where('user_id', $user_id)
									->where('friend_id', $friend_id)
									->or_where('user_id', $friend_id)
									->where('friend_id', $user_id)
									->get();

		if(count($check_exists) == 0)
		{
			$notification = static::forge(array(
								'user_id'   => $user_id,
								'friend_id' => $friend_id,
								'message'	=> $message,
								'status'    => 0,

			));

			// If the notification was successfully saved
			// return true to change the button to from 
			// 'Add Friend' to 'Pending'
			if($notification->save())
			{
				return true;
			}
			else{
				return false;
			}
		}
		else
		{
			// Already existing notification
			// cannot add another
		}
	}




	/**
	 * Check whether the user has already sent the user whose profile or decks are being viewed a friend request
	 * that has not been answered
	 * @param  integer $user_id      ID of the user they are trying to add
	 * @param  integer $current_user ID of the currenly logged in user
	 * @return bool
	 */
	public static function check_pending($user_id, $current_user)
	{
		$check_pending = static::query()
									->where('status', 0)
									->where('user_id', $current_user)
									->where('friend_id', $user_id)
									->get();

		if(count($check_pending) != 0)
		{
			return true;
		}
		else
		{
			return false;
		}
	}



	/**
	 * Delete the notification
	 * Either by rejecting the request of accepting
	 * @param  integer $notification_id ID of the notification to be deleted
	 */
	public static function delete_request($notification_id)
	{
		$notification = static::find($notification_id);
		$notification->delete();
	}



	/**
	 * Format the date created at
	 * @param  string $format 
	 * @return string 
	 */
	public function date($format = "M d, Y")
	{
		return date($format, $this->created_at);
	}


}