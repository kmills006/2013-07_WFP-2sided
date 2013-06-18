			<div class="content user-dashboard">
    			<h1>Dashboard</h1>
    			
				<div id="tabs">
				  <ul class="ud-tabs">
				    <li><?= Html::anchor('dashboard', 'Study'); ?></li>
				    <li><?= Html::anchor('dashboard/notifications', 'Notifications'); ?></li>
				    <li><?= Html::anchor('dashboard/achievements', 'Achievements'); ?></li>
				    <li class="ud-tab-active"><?= Html::anchor('dashboard/settings', 'Settings'); ?></li>
				  </ul>

				<div id="settings" class="ud-tab-content">
				  	<h2>User Settings</h2>
				
				  		<?
				  			echo Form::open('user/settings');

				  			echo Asset::img('profile_photos/'.$user_info->profile_image, array('width' => 100, 'height' => 100, 'alt' => $user_info->username.' profile image'));

				  			echo Form::input('picture', null, array('type' => 'file'));
				  		?>

				  			<div class='fake-file'><p>Change Image</p></div>

				  			<div class='clearfix'></div>

				  		<?
				  		
				  			echo Form::label('Name', 'name');
				  			echo Form::input('name', null, array('type' => 'text'));


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