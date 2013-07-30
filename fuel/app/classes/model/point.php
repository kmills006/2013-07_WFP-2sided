<?

class Model_Point extends \Orm\Model
{
	protected static $_properties = array(
		'id',
		'user_id',
		'total_points',
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



	protected static $_table_name = 'study_points';


	/**
	 * [get_points description]
	 * @param  [type] $user_id [description]
	 * @return [type]          [description]
	 */
	public static function get_points($user_id)
	{
		return static::query()->where('user_id', $user_id)->get_one();
	}


	public static function save_points($post)
	{
		
		$user_points = static::query()
									->where('user_id', '=', Session::get('user_id'))
									->get_one();

		// echo '<pre>';
		// var_dump($post['total_points']);
		// echo '</pre>';
		
		$user_points->total_points = $user_points->total_points + $post['total_points'];
		$user_points->save();
	}
}