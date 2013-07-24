<?

class Model_Resourse extends \Orm\Model
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


	public static function save_resource($new_resource)
	{
		$new_resource = static::forge(array(
									'user_id'  => $new_resource['user_id'],
									'deck_id'  => $new_resource['deck_id'],
									'card_id'  => $new_resource['card_id'],
									'resource' => $new_resource['resource'],
		));

		$new_resource->save();
	}




}