
<?php

class Model_Deck extends \Orm\Model
{
	
	protected static $_properties = array(
		'id',
		'user_id',
		'title',
		'privacy',
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
	        'key_from' => 'id',
	        'model_to' => 'Model_User',
	        'key_to' => 'user_id',
	        'cascade_save' => true,
	        'cascade_delete' => false,
	    )
	);

	protected static $_table_name = 'decks';



	public static function get_users_decks($user_id)
	{

		return static::query()->where(array('user_id' => $user_id))->get();

	}

	public static function get_total_decks($user_id)
	{

		return static::query()->where('user_id', $user_id)->count();

	}



	public function date($format = "m/d/Y h:m a")
	{
		return date($format, $this->created_at);
	}
}