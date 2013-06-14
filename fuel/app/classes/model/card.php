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

			$card = static::forge(array(
						'deck_id'	 => $cards['deck_id'],
						'term'       => $card[0],
						'definition' => $card[1],
			));

			$card->save();
		}
	}



}