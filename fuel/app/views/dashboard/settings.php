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
				  	
				  		<form>
				  			<img src="img/profile_placeholders/100x100_kmills006_placeholder.png" alt="Profile Image" width="100" height="100" />
				  			
				  			<input class="update-picture" type="file" name="upload-profile-image"/>
				  			<div class="fake-file"><p>Change Image</p></div>
				  			
				  			
				  			<div class="clearfix"></div>
				  			<label for="name">Name</label>
				  			<input type="text" name="name" value="Kristy" />
				  			
				  			<label for="email">Email Address</label>
				  			<input type="text" name="email" value="miller.kristy06@gmail.com" />
				  			
				  			<label for="username">Username</label>
				  			<input type="text" name="username" value="kmills006" />
				  			
				  			<p class="change-password"> Change Password </p>
				  			<label for="o-password">Old Password</label>
				  			<input type="text" name="o-password" />
				  			
				  			<label for="password">New Password</label>
				  			<input type="password" name="Password" />
				  			
				  			<label for="c-password">New Confirm Password</label>
				  			<input type="password" name="c-password" />
				  			
				  			
				  			<button>Save</button>
				  			<p><a href="#">Cancel</a></p>
				  		</form>
				  </div>
			</div>