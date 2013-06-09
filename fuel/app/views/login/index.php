				<div class="sm-btns">
    				<p class="sm-btn fb-btn"><span>Login with Facebook</span></p><p class="sm-btn twitter-btn"><span>Login with Twitter</span></p>
    			</div>

    			<div><span>or</span></div>
    				
    				
    			<?
    				echo Form::open('authentication/check_user');
    				
    				echo Form::input('username', '', array('id' => 'username', 'placeholder' => 'Username or Email'));
    				echo Form::input('password', '', array('id' => 'password', 'placeholder' => 'Password'));
    				
    				echo Form::button('login_btn', 'Submit');
    				
    				echo Html::anchor('authentication/lost_password', 'Forgot your password?');
    				
    				echo Form::close();
    			?>
    			
    			
    			<div><? echo Form::button('authentication/sign_up', 'Join Now'); ?></div>
    			
    		</div> <!-- end of content -->