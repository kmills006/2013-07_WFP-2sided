<?

class Model_Resource extends \Orm\Model
{
	protected static $_properties = array(
		'id',
		'user_id',
		'deck_id',
		'card_id',
		'resource',
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


	protected static $_table_name = 'resources';



	/**
	 * [get_resources description]
	 * @param  [type] $user_id [description]
	 * @param  [type] $deck_id [description]
	 * @return [type]          [description]
	 */
	public static function get_resources($user_id, $deck_id)
	{
		// return static::query()
		// 					->where('user_id', $user_id)
		// 					->where('deck_id', $deck_id)
		// 					->get();
		
		return DB::select()
					->from('resources')
					->join('cards')
					->on('cards.id', '=', 'resources.card_id')
					->where('resources.user_id', $user_id)
					->where('resources.deck_id', $deck_id)
					->where('resource', 'practice')
					->as_object()->execute();  

		// echo '<pre>';
		// var_dump(count($resources);
		// echo '</pre>';
	}



	/**
	 * [save_resource description]
	 * @param  [type] $new_resource [description]
	 * @return [type]               [description]
	 */
	public static function save_resource($new_resource)
	{
		var_dump($new_resource);

		$new_resource = static::forge(array(
									'user_id'  => $new_resource['user_id'],
									'deck_id'  => $new_resource['deck_id'],
									'card_id'  => $new_resource['card_id'],
									'resource' => $new_resource['resource']
		));

		// var_dump($new_resource);

		if($new_resource->save())
		{
			return $new_resource;
		}
		else
		{
			return false;
		}
	}



	/**
	 * [check_resource description]
	 * @param  [type] $user_id [description]
	 * @param  [type] $card_id [description]
	 * @param  [type] $deck_id [description]
	 * @return [type]          [description]
	 */
	public static function check_resource($user_id, $card_id, $deck_id)
	{
		return static::query()
						->where('user_id', $user_id)
						->where('card_id', $card_id)
						->where('deck_id', $deck_id)
						->get_one();
	}


	/**
	 * [delete_resource description]
	 * @param  [type] $resource_id [description]
	 * @return [type]              [description]
	 */
	public static function delete_resource($resource_id)
	{
		$resource = static::query()
								->where('id', $resource_id)
								->get_one();

		if($resource->delete())
		{
			return true;
		}
		else
		{
			return false;
		}
	}




}