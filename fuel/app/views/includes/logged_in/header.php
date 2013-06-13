		<div id="wrapper" class="logged-in">
    		<nav>
    			<div id="nav-sizer">
	    			<?= Html::anchor('landing', "<span class='logo-change'>2</span>SIDED", array('class' => 'logo')); ?>
	    			
	    			<form>
	    				<input type="text" name="search" placeholder="Search by title, tags or subject" />
	    			</form>
	    			
	    			<!-- Profile picture and username dropdown -->
	    			<? if(isset($username)):?>
	    			<? echo Html::anchor('dashboard', Asset::img('profile_placeholders/kmills006_placeholder.png').' '.$username, array('class' => 'globe-nav')); ?> 
	    			<? endif; ?>

	    			<div class='user-dd'>
	    				<? echo Html::anchor('profile', 'View Profile'); ?>
	    				<? echo Html::anchor('dashboard', 'Dashboard'); ?>
	    				<? echo Html::anchor('settings', 'Settings'); ?>
	    				<? echo Html::anchor('user/logout', 'Logout'); ?>
	    			</div>

	    			<a class="globe-nav" href="#"><? echo Asset::img('icons/new_notifications.png', array('width' => '30', 'height' => '21')); ?><span class="notifcation-count">18</span></a>
	    			<a class="globe-nav" href="#">Browse</a>
    			</div>
    		</nav>