    	<div id="wrapper" class="logged-out">
    		<nav>
    			<div id="nav-sizer">
	    			<?= Html::anchor('landing', "<span class='logo-change'>2</span>SIDED", array('class' => 'logo')); ?>

					<? echo Html::anchor('user/login', 'Login', array('class' => 'globe-nav'));?>
					<? echo Html::anchor('user/signup', 'Sign Up', array('class' => 'globe-nav'));?>
	    			<a class="globe-nav" href="#">Browse</a>
    			</div>
    		</nav>