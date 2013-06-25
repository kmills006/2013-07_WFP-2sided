			<div class="content login">	
				<div class="sm-btns">
    				<p class="sm-btn fb-btn"><?= Html::anchor('user/facebook', 'Login with Facebook'); ?></p><p class="sm-btn twitter-btn"><?= Html::anchor('user/twitter', 'Login with Twitter'); ?></p>
    			</div>

    			<div><span>or</span></div>
    				
    				
    			<?
    				echo Form::open('user/login');
    				
    				echo Form::input('username', '', array(
                                                        'id'                              => 'username',
                                                        'placeholder'                     => 'Username or Email',
                                                        'class'                           => 'opensans validate[required]',
                                                        'data-errormessage-value-missing' => 'Email or Username is required',
                                                        'data-prompt-position'            => 'rightCenter:50,55',
                    ));

    				echo Form::input('password', '', array(
                                                        'id' => 'password', 
                                                        'placeholder' => 'Password', 
                                                        'type' => 'password', 
                                                        'class' => 'opensans validate[required]',
                                                        'data-errormessage-value-missing' => 'Password is required',
                                                        'data-prompt-position'            => 'bottomCenter:50,55',
                    ));
    				
    				echo Form::button('login_btn', 'Submit');
    				
    				echo Html::anchor('user/lost_password', 'Forgot your password?');
    				
    				echo Form::close();
    			?>
    			
    			
    			<div><button><? echo Html::anchor('signup/index', 'Join Now'); ?></button></div>
    			
    		</div> <!-- end of content -->