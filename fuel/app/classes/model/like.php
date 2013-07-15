<?

class Model_Like extends \Orm\Model
{

	protected static $_properties = array(
		'id',
		'deck_id',
		'user_id',
		'rating',
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
	        'key_from' => 'deck_id',
	        'model_to' => 'Model_Deck',
	        'key_to' => 'id',
	        'cascade_save' => true,
	        'cascade_delete' => false,
	    )
	);

	protected static $_table_name = 'likes';



	/**
	 * [like_deck description]
	 * @param  integer $deck_id 
	 */
	public static function like_deck($deck_id)
	{
		$like = static::forge(array(
					'deck_id' => $deck_id,
					'user_id' => Session::get('user_id'),
					'rating'  => 1,
		));

		$like->save();
	}


	public static function get_likes($deck_id)
	{

	}

	public static function check_like($deck_id)
	{
		$liked = static::query()
							->where('deck_id', '=', $deck_id)
							->where('user_id', '=', Session::get('user_id'))
							->get();

		if(!$liked)
		{
			// User has not liked this flash card deck yet
			// Like button should appear
			return false;
		}
		else
		{
			// User has already liked this flash card deck
			// Liked button should appear and be able to toggle off 
			// if they choose to change their like
			return true;
		}
	}

}