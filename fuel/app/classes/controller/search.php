<?

class Controller_Search extends Controller_App
{


	public function post_index()
	{
		$this->template->content = View::forge('search/index', array(
											'decks' => Model_Deck::search_decks(Input::post('search')),
											'tags'  => Model_Tag::search_tags(Input::post('search')),
											'users' => Model_User::search_users(Input::post('search')),
		));	
	}

}