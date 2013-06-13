			<div class="content signup">
    			<h1>Sign up and start studying today</h1>
    	
    			<?
    				echo Form::open('user/signup');
    				
    				echo Form::input('username', '', array('placeholder' => 'Username'));
    				echo Form::input('email', '', array('placeholder' => 'Email'));
    				echo Form::input('password', '', array('placeholder' => 'Password', 'type' => 'password'));
    				
    				echo Form::button('Submit');
    				
    				echo Form::close();
    			?>
    			
    			<p>Already a member? <span class="login-link"><a href="login">Login Now</a></span></p>
    			
    		</div> <!-- end of content -->