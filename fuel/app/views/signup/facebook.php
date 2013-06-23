			<div class="content signup facebook">
    			<h1>Sign up with Facebook</h1>

    			<?
    				echo Form::open('user/signup');
    				
                    echo Form::label('Suggested Username', 'username', array('class' => 'sug-username'));
    				echo Form::input('username', $facebook_user['username'], array('placeholder' => 'Suggested Username', 'class' => 'opensans'));

                    // echo Form::label('Email Address', 'email');
    				echo Form::input('email', $facebook_user['email'], array('placeholder' => 'Email', 'class' => 'opensans'));

                    // echo Form::label('Password', 'password');
    				echo Form::input('password', '', array('placeholder' => 'Password', 'type' => 'password', 'class' => 'opensans'));
                    echo Form::input('facebook_id', $facebook_user['id'], array('type' => 'hidden'));
    				
    				echo Form::button('Submit');
    				
    				echo Form::close();
    			?>
    			
    			<p>Already a member? <span class="login-link"><a href="login">Login Now</a></span></p>
    			
    		</div> <!-- end of content -->