<?

class Model_Card extends \Orm\Model
{

	protected static $_properties = array(
		'id',
		'deck_id',
		'term',
		'definition',
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
	    'decks' => array(
	        'key_from' => 'id',
	        'model_to' => 'Model_Deck',
	        'key_to' => 'deck_id',
	        'cascade_save' => true,
	        'cascade_delete' => false,
	    )
	);

	protected static $_table_name = 'cards';



	/**
	 * Save Cards
	 *
	 * Saves all new flash cards when a new deck is created
	 */
	public static function save_cards($cards)
	{

		foreach($cards as $card)
		{

			
			if($card[0] == "" && $card[1] == "") 
			{
				echo "Blank";
			}else{
				$card = static::forge(array(
							'deck_id'	 => $cards['deck_id'],
							'term'       => $card[0],
							'definition' => $card[1],
				));

				$card->save();
			}
		}
	}

	/**
	 * Get All Cards
	 *
	 * Returns all the cards in a particular deck
	 */
	public static function get_all_cards($deck_id)
	{
		return static::query()->where(array('deck_id' => $deck_id))->get();
	}



}