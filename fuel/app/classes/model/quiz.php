<?

class Model_Quiz extends \Orm\Model{
		protected static $_properties = array(
		'id',
		'deck_id',
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

	protected static $_table_name = 'quizzes';


	public static function get_quiz($deck_id)
	{
		$query = static::query()
							->where('deck_id', $deck_id)
							->get();

		foreach($query as $quiz)
		{
			// echo '<pre>';
			// var_dump($quiz->id);
			// echo '</pre>';
			
			$questions = DB::select()
								->from('answers')
								->join('questions')
								->on('answers.id', '=', 'questions.correct_answer_id')
								->where('quiz_id', $quiz->id)
								->as_object()->execute();

			// echo '<pre>';
			// var_dump($questions);
			// echo '</pre>';
		}
	}
}