			<div class="content signup">
    			<h1>Start studying today</h1>

                <div class="sm-btns">
                    <p class="sm-btn fb-btn"><?= Html::anchor('user/facebook', 'Sign Up with Facebook'); ?></p><p class="sm-btn twitter-btn"><?= Html::anchor('user/twitter', 'Sign Up with Twitter'); ?></p>
                </div>
    	
    			<?
    				echo Form::open('user/signup');

                     // Checking if there are any error
                    // messages from validation
                    if(isset($error_msg))
                    {
                        if(gettype($error_msg) == 'array')
                        {
                            foreach($error_msg as $error)
                            {              
                                echo html_tag('p', array(
                                                    'class' => 'form-errors',

                                ), $error->get_message());
                            }
                        }
                        else{
                            echo html_tag('p', array(
                                                    'class' => 'form-errors',

                                ), $error_msg);
                        }
                    }
    				

    				echo Form::input('username', '', array(
                                                        'placeholder'                     => 'Username',
                                                        'class'                           => 'opensans validate[required]',
                                                        'data-errormessage-value-missing' => 'Username is required.',
                                                        'data-prompt-position'            => 'rightCenter:50,55',
                    ));

    				
                    echo Form::input('email', '', array(
                                                    'placeholder'                     => 'Email',
                                                    'class'                           => 'opensans validate[required,custom[email]',
                                                    'data-errormessage-value-missing' => 'Email address is required.',
                                                    'data-prompt-position'            => 'rightCenter:50,63',
                    ));

    				
                    echo Form::input('password', '', array(
                                                        'placeholder'                     => 'Password',
                                                        'type'                            => 'password',
                                                        'class'                           => 'opensans validate[required]',
                                                        'data-errormessage-value-missing' => 'Password is required.',
                                                        'data-prompt-position'            => 'rightCenter:50,55',
                    ));

    				
    				echo Form::button('Submit');
    				
    				echo Form::close();
    			?>
    			
    			<p>Already a member? <span class="login-link"><a href="login">Login Now</a></span></p>
    			
    		</div> <!-- end of content -->