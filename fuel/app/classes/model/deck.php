
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
	 * Get Users Decks
	 * 
	 * Returns all of the users decks
	 */
	public static function get_users_decks($user_id)
	{

		return static::query()->where(array('user_id' => $user_id))->get();

	}

	/**
	 * Get Total Decks
	 *
	 * Returns the total count of the users decks
	 */
	public static function get_total_decks($user_id)
	{

		return static::query()->where('user_id', $user_id)->count();

	}


	/** 
	 * Save Deck
	 *
	 * Saves users newly created deck into the database
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
	 * Get Deck
	 *
	 * @return individual deck information 
	 */
	public static function get_deck($deck_id)
	{
		return static::query()->where(array('id' => $deck_id))->get_one();
	}



	public function date($format = "m/d/Y h:m a")
	{
		return date($format, $this->created_at);
	}
}