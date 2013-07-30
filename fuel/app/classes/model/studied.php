<? 


class Model_Studied extends \Orm\Model
{

	protected static $_properties = array(
		'id',
		'deck_id',
		'user_id',
		'studied_at',
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
		'Orm\Observer_StudiedAt' => array(
			'events' => array('before_insert'),
			'mysql_timestamp' => false,
		),
	);

	protected static $_table_name = 'recently_studied';


	/**
	 * [get_recently_studied description]
	 * @param  [type]  $user_id [description]
	 * @param  integer $amount  [description]
	 * @return [type]           [description]
	 */
	public static function get_recently_studied($user_id, $amount = 3)
	{
		$recently_studied = static::query()
										->where('user_id', '=', Session::get('user_id'))
										->limit($amount)
										->order_by('studied_at', 'desc')
										->get();
		
		if(isset($recently_studied))
		{
			$count = 0;

			foreach($recently_studied as $rs)
			{

				$count ++;

				$deck = DB::select()
								->from('decks')
								->where('decks.id', '=', $rs->deck_id)
								->as_object('Model_Deck')->execute();

				$rs->deck_info = $deck;
				$rs->position = $count;
			}

			return $recently_studied;
		}
		else
		{
			return false;
		}
	}


	/**
	 * [date description]
	 * @param  string $format [description]
	 * @return string         [description]
	 */
	public function date($format = "M d, Y - g:i a")
	{
		$days = floor((time() - $this->studied_at)/(60*60*24));

		if($days == 0)
		{
			$days = 'Today';
		}
		else
		{
			$days = $days.' days ago';
		}

		return $days;
	}



}