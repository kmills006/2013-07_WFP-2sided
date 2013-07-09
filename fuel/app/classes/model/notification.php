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
	 * [get_notifications description]
	 * @param  interger $user_id
	 * @return array    $notifications
	 */
	public static function get_notifications($user_id)
	{
		$query = static::query()
						->where('user_id', $user_id)
						->where('status', 0)
						->get();

		// echo '<pre>';
		// var_dump($notifications);
		// echo '</pre>';
		
		foreach($query as $notification)
		{
			$results = DB::select('users.id', 'users.username', 'users.profile_image', 'notifications.message', 'notifications.created_at')
								->from('users')
								->join('notifications')
								->on('users.id', '=', 'notifications.friend_id')
								->where('users.id', $notification->friend_id)
								->limit(1)
								->as_object('Model_User')->execute();
			
			foreach($results as $r)
			{
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


			// echo '<pre>';
			// var_dump($notification);
			// echo '</pre>';

		}



		// Check if there are any notifications
		if(isset($notifications))
		{
			return $notifications;
		}
	}



	public static function get_count($user_id)
	{
		return static::query()
							->where(array(
										'user_id' => $user_id,
										'status'  => 0,
							))
							->count();
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