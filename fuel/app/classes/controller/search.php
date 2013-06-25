<?

class Controller_Search extends Controller_Template
{


	public function post_index()
	{
		// Setting up views
		$this->template->head    = View::forge('includes/head');

		if(Session::get('is_logged_in') != 1)
		{
			$this->template->header  = View::forge('includes/logged_out/header');
		}
		else
		{
			$this->template->header  = View::forge('includes/logged_in/header', array(
												'username'      => Model_User::get_by_id(Session::get('user_id'))->username,
												'profile_image' => Model_User::get_by_id(Session::get('user_id'))->profile_image,
			));
		}

		$this->template->content = View::forge('search/index', array(
											'decks' => Model_Deck::search_decks(Input::post('search')),
											'tags'  => Model_Tag::search_tags(Input::post('search')),
											'users' => Model_User::search_users(Input::post('search')),
		));

		$this->template->footer  = View::forge('includes/footer');
		
	}

}