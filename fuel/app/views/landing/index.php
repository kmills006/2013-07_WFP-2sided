    		<div class="content landing">
    	
	    		<div class="cta-search sizer">
	    			<h1>What do you want to study today?</h1>
	    				
	    				<?= Form::open('search'); ?>
	    					<select class="top-cat">
	    						<option value="default">Top Tags</option>
	    						<option value="arts">Arts</option>
	    						<option value="literature">Literature</option>
	    						<option value="vocabulary">Vocabulary</option>
	    						<option value="languages">Languages</option>
	    						<option value="math">Math</option>
	    						<option value="science">Science</option>
	    						<option value="history">History</option>
	    						<option value="standardized">Standardized Test</option>
	    					</select>
	    					
	    					<p>or</p>
	    					
	    					<?
	    						echo Form::input('search', '', array('placeholder' => 'Search by title, tags or user'));
	    						echo Form::button('search-btn', 'Search', array('class' => 'opensans'));

	    						echo Form::close();
	    					?>
	    		</div> <!-- end of cta-search -->
	    		
	    		
	    		<div class="about">
	    			<div class="sizer">
		    			<div>
		    				<div>
								<? echo Asset::img('icons/globe.png', array('alt' => 'Globe icon to describe studying')); ?>
		    				</div>
		    				
		    				<h2>Study Anywhere</h2>
		    				
		    				<p>Caramels croissant toffee applicake brownie carrot cake. Candy canes lemon drops lemon drops pudding lemon drops jujubes toffee cookie. Jujubes applicake chocolate cake. Apple pie faworki icing tootsie roll liquorice.</p>
		    				
		    			</div>
		    			
		    			<div>
		    				<div>
		    					<? echo Asset::img('icons/challenge.png', array('alt' => 'Sword icon representing challenging friends')); ?>
		    				</div>
		    				
		    				<h2>Challenge Your Friends</h2>
		    				
		    				<p>Gummi bears powder macaroon jelly beans chocolate bar chocolate. Donut wafer chocolate faworki jujubes topping tootsie roll halvah apple pie. Gummies cookie candy. Cookie candy canes jelly marshmallow cotton candy applicake cake.</p>
		    				
		    			</div>
		    			
		    			<div>
		    				<div>
		    					<? echo Asset::img('icons/medal.png', array('alt' => 'Medal icon to describe earning achievements')); ?>
		    				</div>
		    				
		    				<h2>Earn Achievements</h2>
		    				
		    				<p>Bear claw biscuit lollipop marzipan marzipan croissant. Pudding marzipan cupcake topping biscuit apple pie. Candy danish jujubes toffee wypas. Dessert chocolate jelly beans marshmallow faworki.</p>
		    				
		    			</div>
		    			
	    			</div> <!-- end of sizer -->
	    		</div> <!-- end of about -->
    		</div> <!-- end of content -->