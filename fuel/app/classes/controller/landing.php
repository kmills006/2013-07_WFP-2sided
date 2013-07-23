<?php

	class Controller_Landing extends Controller_App
	{
	
		public function action_index()
		{
			$this->template->content = View::forge('landing/index');		
		}
	}
