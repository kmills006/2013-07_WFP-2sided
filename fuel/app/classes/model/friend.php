<?

class Model_Friend extends \Orm\Model
{

	protected static $_properties = array(
		'id',
		'user_id',
		'friend_id',
		'status',
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
	 * [get_friends description]
	 * @param  interger $user_id [description]
	 * @return array          [description]
	 */
	public static function get_friends($user_id)
	{
		return static::query()
							->where(array('status', 1))
							->where(array('user_id', $user_id))
							->or_where(array('friend_id', $user_id))
							->get();
		

		// $friends = static::query('first', array(
		// 					'related' => array(
		// 						'users' => array(
		// 							'where' => array(
		// 								array('status', 1),
		// 								array('user_id', $user_id),
		// 							),
		// 							'or_where' => array('friend_id', $user_id),
		// 						),
		// 					),
		// 				));

		// echo '<pre>';
		// var_dump($friends);
		// echo '</pre>';

	}
}