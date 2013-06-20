			<div class="content login">	
				<div class="sm-btns">
    				<p class="sm-btn fb-btn"><span>Login with Facebook</span></p><p class="sm-btn twitter-btn"><span>Login with Twitter</span></p>
    			</div>

    			<div><span>or</span></div>
    				
    				
    			<?
    				echo Form::open('user/login');
    				
    				echo Form::input('username', '', array('id' => 'username', 'placeholder' => 'Username or Email', 'class' => 'opensans'));
    				echo Form::input('password', '', array('id' => 'password', 'placeholder' => 'Password', 'type' => 'password', 'class' => 'opensans'));
    				
    				echo Form::button('login_btn', 'Submit');
    				
    				echo Html::anchor('user/lost_password', 'Forgot your password?');
    				
    				echo Form::close();
    			?>
    			
    			
    			<div><button><? echo Html::anchor('signup/index', 'Join Now'); ?></button></div>
    			
    		</div> <!-- end of content -->