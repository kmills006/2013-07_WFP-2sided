<?php

class Controller_Profile extends Controller_App
{

	public function post_profile($username)
	{
		var_dump(Input::post());
	}




	public function action_view($username)
	{
		$user = Model_User::get_by_username($username);

		if (! isset($user))
		{
			throw new HttpNotFoundException;
		}

		$this->template->content = View::forge('profile/index', array(
			'user_info'     => $user,
			'decks'         => $user->get_decks(),
			'deck_count'    => $user->total_decks(),
			'friends'       => $user->get_friends(),
			'friend_check'  => $user->is_friends_with($this->user->id),
			'check_pending' => $user->is_pending_friend($this->user->id),
		));
		
		
	}

}
