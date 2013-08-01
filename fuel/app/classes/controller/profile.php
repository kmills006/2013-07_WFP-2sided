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

		$points = $user->get_points();

		if(!isset($points))
		{
			// echo 'No points, try again.';

			$level = 1;
			$points_to_level = 50;
		}
		else
		{
			// echo 'POINTS HOOORAY!';

			$level = $user->check_level($user->get_points()->total_points);
			$points_to_level = $user->points_to_level($user->get_points()->total_points, $user->check_level($points->total_points));
		}

		$this->template->content = View::forge('profile/index', array(
			'user_info'       => $user,
			'decks'           => $user->get_decks(),
			'deck_count'      => $user->total_decks(),
			'friends'         => $user->get_friends(),
			'friend_check'    => $user->is_friends_with($this->user->id),
			'check_pending'   => $user->is_pending_friend($this->user->id),
			'recent_activity' => Model_User::get_recent_activity($user->id),
			'points'          => $points,
			'level'           => $level,
			'points_to_level' => $points_to_level,
		));
		
		
	}

}
