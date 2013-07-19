<?

class Model_Score extends \Orm\Model
{
		protected static $_properties = array(
		'id',
		'user_id',
		'deck_id',
		'score',
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

	protected static $_table_name = 'scores';



	/**
	 * Get the lastest score from this quiz
	 * @param  integer $deck_id 
	 * @param  string  $user_id 
	 * @return array/boolean
	 */
	public static function get_last_score($deck_id, $user_id)
	{
		// SELECT *
		// FROM scores
		// WHERE user_id = '3' AND deck_id = '51c12d64eace1'
		// ORDER BY created_at DESC
		// LIMIT 1;
		
		$last_score = static::query()
								->where('user_id', $user_id)
								->where('deck_id', $deck_id)
								->order_by('created_at', 'desc')
								->limit(1)
								->get_one();

		if(count($last_score) == 0)
		{
			return false;
		}
		else
		{
			return $last_score;
		}
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