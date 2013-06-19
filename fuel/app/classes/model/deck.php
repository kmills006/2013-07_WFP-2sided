
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
	        'key_from' => 'id',
	        'model_to' => 'Model_Card',
	        'key_to' => 'deck_id',
	        'cascade_save' => true,
	        'cascade_delete' => false,
	    )
	);

	protected static $_table_name = 'decks';



	/**
	 * [get_users_decks description]
	 * @param  integer $user_id [description]
	 * @return array   $decks   [description]
	 */
	public static function get_users_decks($user_id)
	{

		if($user_id != Session::get('user_id'))
		{
			// Viewing someone else's profile page
			$decks = static::query()
								->where(array(
									'user_id' => $user_id,
									'privacy' => 0,
								))
								->order_by('created_at', 'desc')
								->get();		
		}
		else
		{
			// Viewing your own profile page
			// Will need to update to include
			// if the two uses are friends
			$decks = static::query()->where(array('user_id' => $user_id))->order_by('created_at', 'desc')->get();

		}		

		// Attempting to get the card count of each deck
		foreach($decks as $deck)
		{			
			$cards = DB::select()
								->from('cards')
								->join('decks')
								->on('cards.deck_id', '=', 'decks.id')
								->where('cards.deck_id', $deck->id)
								->as_object()->execute();  					
			
			$card_count = count($cards);

			$deck->card_count = $card_count;
		}

		return $decks;
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

		return $deck;
	}


	/**
	 * [update_deck description]
	 * @param  [type] $deck_info [description]
	 * @return [type]            [description]
	 */
	public static function update_deck($deck_info)
	{
		// echo '<pre>';
		// var_dump($deck_info);
		// echo '</pre>';

		$deck = $deck_info['orig_info'];

		// Check if the deck title was updated
		if($deck->title != $deck_info['title'])
		{
			$deck->title = $deck_info['title'];
		}	
		else
		{
			// Title doesn't change
		}

		// Checking if the privacy was updated
		if($deck->privacy == 0)
		{
			if($deck_info['privacy'] == 'Public')
			{
				// Deck privacy is staying public
				// no change needed
			}
			else
			{
				// Deck privacy is changing to private
				$deck->privacy = 1;
			}
		}
		else
		{
			if($deck_info['privacy'] == 'Private')
			{
				// Deck privacy is staying private
				// no change needed
			}
			else
			{
				// Deck privacy is changing to public
				$deck->privacy = 0;
			}
		}

		// echo '<pre>';
		// var_dump($deck);
		// echo '</pre>';
		
		$deck->save();
	}


	public static function delete_deck($deck_id)
	{
		$deck = static::query()
							->where('id', $deck_id)
							->get_one();

		$deck->delete();

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