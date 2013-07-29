<? 

class Model_Level extends \Orm\Model
{

	protected static $_properties = array(
		'id',
		'level',
		'display_name',
		'required_score',
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



	protected static $_table_name = 'levels';


	/**
	 * [check_level description]
	 * @param  string $points [description]
	 * @return [type]         [description]
	 */
	public static function check_level($points = '')
	{
		return static::query()
							->where('required_score', '<=', $points)
							->limit(1)
							->order_by('required_score', 'desc')
							->get_one();
	}

	public static function points_to_level($points = '')
	{
		$next_level = static::query()
								->where('required_score', '>=', $points)
								->limit(1)
								->order_by('required_score', 'asc')
								->get_one();

		return $next_level->required_score - $points;
	}





}