		<div id="wrapper">
    		<nav>
    			<div id="nav-sizer">
	    			<a class="logo" href="index.html"><span class="logo-change">2</span>SIDED</a>
	    			
	    			<form>
	    				<input type="text" name="search" placeholder="Search by title, tags or subject" />
	    			</form>
	    			
	    			<!-- Profile picture and username dropdown -->
	    			<a class="globe-nav user-dd" href="#"><? echo Asset::img('profile_placeholders/kmills006_placeholder.png'); ?>kmills006
	    			
		    			<ul class="dd-menu">
		    				<li><!-- <? echo Html::anchor('profile', 'View Profile'); ?> -->View Profile</li>
		    				<li><!-- <? echo Html::anchor('dashboard', 'Dashboard'); ?> -->Dashboard</li>
		    				<li><!-- <? echo Html::anchor('settings', 'Settings'); ?> -->Settings</li>
		    				<li><!-- <? echo Html::anchor('logout', 'Logout'); ?> -->Logout</li>
		    			</ul>
		    	
	    			</a>

<!-- 					<? echo Html::anchor('dashboard', 'kmills006', array('class' => 'globe-nav')); echo Asset::img('profile_placeholders/kmills006_placeholder.png'); ?> -->
	    			
	    			<a class="globe-nav" href="#"><? echo Asset::img('icons/new_notifications.png', array('width' => '30', 'height' => '21')); ?><span class="notifcation-count">18</span></a>
	    			<a class="globe-nav" href="#">Browse</a>
    			</div>
    		</nav>