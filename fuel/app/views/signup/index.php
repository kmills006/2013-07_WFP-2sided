			<div class="content signup">
    			<h1>Sign up and start studying today</h1>

                <div class="sm-btns">
                    <p class="sm-btn fb-btn"><?= Html::anchor('user/facebook', 'Sign Up with Facebook'); ?></p><p class="sm-btn twitter-btn"><?= Html::anchor('user/twitter', 'Sign Up with Twitter'); ?></p>
                </div>
    	
    			<?
    				echo Form::open('user/signup');
    				
    				echo Form::input('username', '', array('placeholder' => 'Username', 'class' => 'opensans'));
    				echo Form::input('email', '', array('placeholder' => 'Email', 'class' => 'opensans'));
    				echo Form::input('password', '', array('placeholder' => 'Password', 'type' => 'password', 'class' => 'opensans'));
    				
    				echo Form::button('Submit');
    				
    				echo Form::close();
    			?>
    			
    			<p>Already a member? <span class="login-link"><a href="login">Login Now</a></span></p>
    			
    		</div> <!-- end of content -->