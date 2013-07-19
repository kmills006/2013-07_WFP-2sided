<?

class Model_Card extends \Orm\Model
{

	protected static $_properties = array(
		'id',
		'deck_id',
		'term',
		'definition',
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
	        'key_from' => 'id',
	        'model_to' => 'Model_Deck',
	        'key_to' => 'deck_id',
	        'cascade_save' => true,
	        'cascade_delete' => true,
	    )
	);

	protected static $_table_name = 'cards';



	/**
	 * [save_cards description]
	 * @param  array $cards [description]
	 */
	public static function save_cards($cards)
	{

		// Removing the deck id from the array
		$deck_id = array_pop($cards);

		foreach($cards as $card)
		{

			if($card[0] == "" || $card[1] == "") 
			{
				// If either the term or definition is blank,
				// do not add it to the database.
			}
			else
			{
				
				$card = static::forge(array(
							'deck_id'	 => $deck_id,
							'term'       => $card[0],
							'definition' => $card[1],
				));

				$card->save();
			}
		}
	}



	/**
	 * [get_all_cards description]
	 * @param  integer $deck_id [description]
	 * @return array            [description]
	 */
	public static function get_all_cards($deck_id)
	{
	
		// return static::query()->where(array('deck_id' => $deck_id))->get();
		
		$cards = static::query()
							->where(array(
								'deck_id' => $deck_id,
							))
							->order_by(DB::expr('RAND()'))
							->get();

		// Setting the position depending
		// on the number of cards in 
		// the deck
		$counter = 0;

		foreach($cards as $card)
		{
			$counter = $counter + 1;

			$card->position = $counter;
		}

		return $cards;
	
	}


	/**
	 * [get_card_count description]
	 * @param  integer $deck_id [description]
	 * @return integer          [description]
	 */
	public static function get_card_count($deck_id)
	{
		return static::query()->where(array('deck_id' => $deck_id))->count();
	}



	public static function update_cards($cards_info)
	{

		$deck_id = array_pop($cards_info);

		// echo '<pre>';
		// var_dump($cards_info);
		// echo '</pre>';
		
		foreach($cards_info as $card)
		{			
			$user_card = static::query()
									->where('id', $card[0])
									->get_one();


			// If record does not exist
			// add new card to deck
			if(!$user_card)
			{
				$new_card = static::forge(array(
								'deck_id'    => $deck_id,
								'term'       => $card[1],
								'definition' => $card[2],
				));

				$new_card->save();
			}
			else
			{
				// Checking if the term has been updated
				if($user_card->term != $card[1])
				{
					$user_card->term = $card[1];
				}
				else
				{
					// echo 'Term stays the same';
				}

				// Checking if the definition has been updated
				if($user_card->definition != $card[2])
				{
					$user_card->definition = $card[2];
				}
				else
				{
					// echo 'Definition stays the same';
				}

				$user_card->save();
			}
		}

	}



	public static function get_choices($post)
	{
		$deck_id  = $post['deck_id'];
		$question = $post['question'];
		$card_id   = $post['card_id'];

		$choices = DB::select('id', 'definition')
							->from('cards')
							->where('term', '!=', $question)
							->where('deck_id', $deck_id)
							->order_by(DB::expr('RAND()'))
							->limit(3)
							->as_object('Model_Card')->execute();

		// echo '<pre>';
		// var_dump($choices);
		// echo '</pre>';
		
		$current_card = array(
			'definition' => $question,
			'id'         => $card_id,
		);

		array_push($choices, $current_card);
		
		return $choices;
 	}



	/* public static function get_questions($deck_id)
	{
		$cards = static::query()
							->where(array(
								'deck_id' => $deck_id,
							))
							->get();
		
		$keys = array_keys($cards);
		shuffle($keys);

		// Setting random order for questions
		foreach($keys as $key)
		{
			$questions[$key] = $cards[$key];
		}

		// Setting question number
		$counter = 0;

		foreach($questions as $card)
		{
			$counter = $counter + 1;
			$card->position = $counter;
		}

		// echo '<pre>';
		// var_dump($questions);
		// echo '</pre>';

		return $questions;
	} /* 

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