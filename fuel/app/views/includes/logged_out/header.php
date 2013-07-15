    	<div id="wrapper" class="logged-out">
    		<nav>
    			<div class="sizer">
	    			<?= Html::anchor('landing', "<span class='logo-change'>2</span>SIDED", array('class' => 'logo')); ?>

					<? echo Html::anchor('user/login', 'Login', array('class' => 'global-nav nav'));?>
					<? echo Html::anchor('user/signup', 'Sign Up', array('class' => 'global-nav nav'));?>
	    			<a class="global-nav nav" href="#">Browse</a>
    			</div>
    		</nav>