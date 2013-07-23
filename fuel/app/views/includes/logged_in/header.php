		<div id="wrapper" class="logged-in">
    		<nav>
    			<div class="sizer">
	    			<? echo Html::anchor('landing', "<span class='logo-change'>2</span>SIDED", array('class' => 'logo')); 

	    				
	    				echo Form::open('search');
						echo Form::input('search', '', array(
														'placeholder' => 'Search by title, tags or user',
														'class'       => 'opensans nav-search'
						));

						echo Form::close();
					?>
	    			
	    			<!-- Profile picture and user->username dropdown -->
	    			<?
	    				if(isset($user->username))
	    				{
	    					if(isset($user->profile_image) && $user->profile_image != null)
	    					{ ?>
	    										
	    						<a class="global-nav dropdown"><?= Asset::img($user->image_url()); ?><span><?= $user->username ?></span>
									<ul class="user-dd">
										<li>Your Profile</li>
										<li>Dashboard</li>
										<li>Settings</li>
										<li>Logout</li>
									</ul>
	    						</a>
				
	    					<? }
	    					else
	    					{ ?>

	    						<a class="global-nav dropdown"><?= Asset::img('profile_photos/thumbs/thumb_profile_placeholder.gif'); ?><span><?= $user->username ?></span>
									<ul class="user-dd">
										<li>Your Profile</li>
										<li>Dashboard</li>
										<li>Settings</li>
										<li>Logout</li>
									</ul>
	    						</a>
	    						
	    					<? }
	    				}
	    			?>

	    			<?= Html::anchor('dashboard/notifications', Asset::img('icons/new_notifications.png', array('width' => '30', 'height' => '21')).' <span class="notification-count">'.$user->total_notifications().'</span>', array('class' => 'global-nav')) ?>

	    			<a class="global-nav nav" href="#">Browse</a>
    			</div>
    		</nav>