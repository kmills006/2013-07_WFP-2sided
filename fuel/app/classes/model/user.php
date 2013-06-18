
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

	protected static $_has_many = array(
	    'decks' => array(
	        'key_from' => 'id',
	        'model_to' => 'Model_Friend',
	        'key_to' => 'user_id',
	        'cascade_save' => true,
	        'cascade_delete' => false,
	    )
	);

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


}
