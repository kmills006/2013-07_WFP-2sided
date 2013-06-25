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


	/**
	 * [save_tags description]
	 * @param  [type] $tags [description]
	 */
	public static function save_tags($tags)
	{

		// Removing the deck id from the array
		$deck_id = array_pop($tags);

		foreach($tags as $tag)
		{
			$tag = static::forge(array(
							'deck_id'  => $deck_id,
							'tag_name' => $tag,
			));

			$tag->save();
		}
	}



	public static function search_tags($search_term)
	{
		$results = DB::select()
						->from('tags')
						->where('tag_name', 'LIKE', '%'.$search_term.'%')
						->as_object('Model_Tag')->execute();

		foreach($results as $result)
		{
			$tags[] = $result;
		}

		if(isset($tags))
		{
			return $tags;
		}
	}


}