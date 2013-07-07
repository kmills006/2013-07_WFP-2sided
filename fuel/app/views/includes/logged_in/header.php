		<div id="wrapper" class="logged-in">
    		<nav>
    			<div class="sizer">
	    			<?= Html::anchor('landing', "<span class='logo-change'>2</span>SIDED", array('class' => 'logo')); ?>
	    			
	    			<form>
	    				<input type="text" name="search" placeholder="Search by title, tags or subject" class="opensans" />
	    			</form>
	    			
	    			<!-- Profile picture and username dropdown -->
	    			<?
	    				if(isset($username))
	    				{
	    					if(isset($profile_image) && $profile_image != null)
	    					{ ?>
	    										
	    						<a class="global-nav dropdown"><?= Asset::img('profile_photos/thumbs/'.$profile_image); ?><?= $username ?>
									<ul class="user-dd">
										<li>Profile</li>
										<li>Dashboard</li>
										<li>Settings</li>
										<li>Logout</li>
									</ul>
	    						</a>
				
	    					<? }
	    					else
	    					{
	    						echo Html::anchor('dashboard', Asset::img('profile_photos/thumbs/thumb_profile_placeholder.gif').' '.$username, array('class' => 'global-nav'));
	    					}
	    				}
	    			?>

	    			<a class="global-nav" href="#"><? echo Asset::img('icons/new_notifications.png', array('width' => '30', 'height' => '21')); ?><span class="notification-count">18</span></a>
	    			<a class="global-nav" href="#">Browse</a>
    			</div>
    		</nav>