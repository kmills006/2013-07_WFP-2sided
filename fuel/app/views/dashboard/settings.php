<? 
	
	// echo '<pre>';
	// var_dump($user_info);
	// echo '</pre>';

?>			


			<div class="content user-dashboard sizer">
    			<h1>Dashboard</h1>
    			
				<div class="ud-tabs">
					<?	
						echo Html::anchor('dashboard', 'Study', array('class' => 'study'));
						echo Html::anchor('dashboard/notifications', 'Notifications', array('class' => 'notifications'));
						echo Html::anchor('dashboard/achievements', 'Achievements', array('class' => 'achievements'));
						echo Html::anchor('dashboard/settings', 'Settings', array('class' => 'ud-tab-active settings'));
					?>
				</div>

				<div id="settings" class="ud-tab-content">
				  	<h2>User Settings</h2>
				
				  		<?
				  			echo Form::open('user/settings');

				  			echo Asset::img('profile_photos/'.$user_info->profile_image, array('width' => 150, 'height' => 150, 'alt' => $user_info->username.' profile image'));
				  			echo Form::input('picture', null, array('type' => 'file'));
				  		?>

				  			<div class='fake-file'><p>Change Image</p></div>

				  			<div class="sm-btns">
			    				<? if($user_info->facebook_id == null): ?>

			    					<p class="sm-btn fb-btn"><span>Link to Facebook</span></p>

								<? elseif($user_info->twitter_id == null): ?>

			    					<p class="sm-btn twitter-btn"><span>Link to Twitter</span></p>

			    				<? endif; ?>
			    			</div>

			    			<div class='clearfix'></div>

				  		<?
				  		
				  			echo Form::label('Name', 'name');
				  			echo Form::input('name', $user_info->name, array('type' => 'text', 'class' => 'settings-name'));


				  			echo Form::label('Email Address', 'email');
				  			echo Form::input('email', $user_info->email, array('type' => 'text'));


				  			echo Form::label('Username', 'username');
				  			echo Form::input('username', $user_info->username, array('type' => 'text'));

				  			echo html_tag('p', array(
				  								'class' => 'change-password',
				  			), 'Change Password');

				  			echo Form::label('Old Password', 'o-password');
				  			echo Form::input('o-password', null, array('type' => 'password'));

				  			echo Form::label('New Password', 'new-password');
				  			echo Form::input('new-password', null, array('type' => 'password'));

				  			echo Form::label('Confirm New Password', 'c-password');
				  			echo Form::input('c-password', null, array('type' => 'password'));

				  			echo Form::button('submit', 'Save');

				  		?>

				  			<p><a href="#">Cancel</a></p>

				  		<?

				  			echo Form::close();
				  		?>
				  </div>
			</div>