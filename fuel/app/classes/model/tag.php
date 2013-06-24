<?

class Model_Tag extends \Orm\Model
{
		protected static $_properties = array(
		'id',
		'deck_id',
		'tag_name',
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
	        'key_from' => 'deck_id',
	        'model_to' => 'Model_Deck',
	        'key_to' => 'id',
	        'cascade_save' => true,
	        'cascade_delete' => false,
	    )
	);

	protected static $_table_name = 'tags';


	/**
	 * [get_tags description]
	 * @param  [type] $deck_id [description]
	 * @return [type]          [description]
	 */
	public static function get_tags($deck_id)
	{
		return static::query()
							->where('deck_id', $deck_id)
							->get();
	}
}