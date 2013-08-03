<?


class Model_Badge extends \Orm\Model
{

		protected static $_properties = array(
		'id',
		'user_id',
		'badge_id',
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



	protected static $_table_name = 'user_badges';



	/**
	 * [get_badges description]
	 * @param  [type] $user_id [description]
	 * @return [type]          [description]
	 */
	public static function get_badges($user_id)
	{
		$badges = static::query()
							->where('user_id', $user_id)
							->get();

		foreach($badges as $badge)
		{
			$badge_info = DB::select()
								->from('badges')
								->where('id', $badge->badge_id)
								->as_object()->execute();

			$badge->name = $badge_info[0]->badge_name;
			$badge->img = $badge_info[0]->badge_img;
		}

		return $badges;
	}



}