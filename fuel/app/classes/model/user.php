
<?php

class Model_User extends \Orm\Model
{
	protected static $_properties = array(
		'id',
		'username',
		'password',
		'email',
		'date_of_registration',
		'last_login',
		'profile_image',
		'facebook_id',
		'twitter_id',
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

	protected static $_table_name = 'users';

	public static function check_user($username, $password)
	{
		// $user = $query->where('username', $username);
		return static::find()->where('username', '=', $username);
	}

}
