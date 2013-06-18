<?php

class Controller_Profile extends Controller_Template
{

	public function action_view($user_id)
	{

		// Setting up views
		$this->template->head    = View::forge('includes/head');

		if(Session::get('is_logged_in') == 1)
		{
			
			$this->template->header  = View::forge('includes/logged_in/header', array(
												'username' => Session::get('username'),
												'profile_image' => Model_User::get_by_id(Session::get('user_id'))->profile_image,

			));

		}
		else
		{
			$this->template->header  = View::forge('includes/logged_out/header');
		}

		$this->template->content = View::forge('profile/index', array(
											'user_info'  => Model_User::get_by_id($user_id),
											'deck_count' => Model_Deck::get_total_decks($user_id),
											'friends'    => Model_Friend::get_friends($user_id),
											'decks'		 => Model_Deck::get_users_decks($user_id),
		));
		
		$this->template->footer  = View::forge('includes/footer');
	}

}
