			<div class="content signup">
    			<h1>Sign up and start studying today</h1>
    	
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