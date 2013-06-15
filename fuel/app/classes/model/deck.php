
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
	        'key_from' => 'user_id',
	        'model_to' => 'Model_User',
	        'key_to' => 'id',
	        'cascade_save' => true,
	        'cascade_delete' => false,
	    )
	);

	protected static $_has_many = array(
	    'cards' => array(
	        'key_from' => 'deck_id',
	        'model_to' => 'Model_Card',
	        'key_to' => 'id',
	        'cascade_save' => true,
	        'cascade_delete' => false,
	    )
	);

	protected static $_table_name = 'decks';



	/**
	 * [get_users_decks description]
	 * @param  integer $user_id [description]
	 * @return array            [description]
	 */
	public static function get_users_decks($user_id)
	{

		return static::query()->where(array('user_id' => $user_id))->get();
	
	}



	/**
	 * [get_total_decks description]
	 * @param  integer  $user_id [description]
	 * @return integer          [description]
	 */
	public static function get_total_decks($user_id)
	{
	
		 return static::query()->where('user_id', $user_id)->count();
	
	}



	/**
	 * [save_deck description]
	 * @param  array $new_deck [description]
	 */
	public static function save_deck($new_deck)
	{

		if($new_deck['privacy'] == 'Private')
		{
			$privacy = 1;
		}
		else
		{
			$privacy = 0;
		}
		
		$deck = static::forge(array(
					'user_id' => Session::get('user_id'),
					'id' 	  => $new_deck['id'],
					'title'   => $new_deck['title'],
					'privacy' => $privacy,
		));
		
		$deck->save();
	}



	/**
	 * [get_deck description]
	 * @param  string $deck_id [description]
	 * @return object $deck    [description]
	 */
	public static function get_deck($deck_id)
	{

		$deck = static::query()->where(array('id' => $deck_id))->get_one();
		$deck->created_at = date('M d, Y');

		return $deck;
	
	}



	/**
	 * [date description]
	 * @param  string $format [description]
	 * @return string         [description]
	 */
	public function date($format = "m/d/Y h:m a")
	{
		return date($format, $this->created_at);
	}
}