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
	        'cascade_delete' => true,
	    )
	);

	protected static $_table_name = 'cards';



	/**
	 * [save_cards description]
	 * @param  array $cards [description]
	 */
	public static function save_cards($cards)
	{

		foreach($cards as $card)
		{

			if($card[0] == "" || $card[1] == "") 
			{
				// If either the term or definition is blank,
				// do not add it to the database.
			}
			else
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



	/**
	 * [get_all_cards description]
	 * @param  integer $deck_id [description]
	 * @return array            [description]
	 */
	public static function get_all_cards($deck_id)
	{
	
		return static::query()->where(array('deck_id' => $deck_id))->get();
	
	}



	/**
	 * [get_card_count description]
	 * @param  integer $deck_id [description]
	 * @return integer          [description]
	 */
	public static function get_card_count($deck_id)
	{
		return static::query()->where(array('deck_id' => $deck_id))->count();
	}



}