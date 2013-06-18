		<div id="wrapper" class="logged-in">
    		<nav>
    			<div id="nav-sizer">
	    			<?= Html::anchor('landing', "<span class='logo-change'>2</span>SIDED", array('class' => 'logo')); ?>
	    			
	    			<form>
	    				<input type="text" name="search" placeholder="Search by title, tags or subject" />
	    			</form>
	    			
	    			<!-- Profile picture and username dropdown -->
	    			<?
	    				if(isset($username))
	    				{
	    					if(isset($profile_image) && $profile_image != null)
	    					{
	    						echo Html::anchor('dashboard', Asset::img('profile_photos/thumbs/'.$profile_image).' '.$username, array('class' => 'globe-nav'));
	    					}
	    					else
	    					{
	    						echo Html::anchor('dashboard', Asset::img('profile_photos/thumbs/thumb_profile_placeholder.gif').' '.$username, array('class' => 'globe-nav'));
	    					}
	    				}
	    			?>

	    			<div class='user-dd'>
	    				<? echo Html::anchor('profile/view/'.Session::get('user_id'), 'View Profile'); ?>
	    				<? echo Html::anchor('dashboard', 'Dashboard'); ?>
	    				<? echo Html::anchor('dashboard/settings', 'Settings'); ?>
	    				<? echo Html::anchor('user/logout', 'Logout'); ?>
	    			</div>

	    			<a class="globe-nav" href="#"><? echo Asset::img('icons/new_notifications.png', array('width' => '30', 'height' => '21')); ?><span class="notifcation-count">18</span></a>
	    			<a class="globe-nav" href="#">Browse</a>
    			</div>
    		</nav>