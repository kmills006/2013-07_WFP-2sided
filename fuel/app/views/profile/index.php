<? 
	// echo '<pre>';
	// var_dump($decks);
	// echo '</pre>';
?>			

			<div class="content user-profile">
    			<a href="user_dashboard.html" class="back-to-dash">Back to Dashboard</a>
    			
    			<aside>
    				<!-- <img src="assets/img/profile_placeholders/kmills006_profile-placeholder.png" alt="Profile Image" width="200" height="200" /> -->
    				<? 
    					if($user_info->profile_image != NULL)
    					{
    						echo Asset::img('profile_photos/'.$user_info->profile_image, array('alt' => $user_info->username.' profile image'));
    					}
    					else
    					{
							echo Asset::img('profile_photos/profile_placeholder.gif', array('alt' => $user_info->username.' profile image'));
    					}
    				?>
    				
    				
    				<div class="level-progress">
				 		<span><span></span></span>
				 		<span><span></span></span>
				 		<span><span></span></span>
				 		<span><span></span></span>
				 	</div>
				 	
    				<p>Total StudyPoints <span>123</span></p>
					
				 	
				 	<div class="friends-list">
					 	<h2>Friends / <? if(count($friends) > 0)
									 	{
									 		echo count($friends);
									 	}
									 	else
									 	{
									 		?>0<?
									 	} ?></h2>
					 	

					 	<section class="friend">
							<img src="assets/img/profile_placeholders/brittany_conrad.jpg" alt="Profile Picture" />
							
							<h3><a href="#">brittsuzanne</a></h3>
							<p>395 Points</p>
							
					 	</section>
					 	
					 	<p><a href="#">View All</a></p>
					 
				 	</div>
				 	
    			</aside>
    			
    			  <div class="profile">
    			  	<div class="user-info">
					  	<h2><?= $user_info->username; ?></h2>	
					  	
					  	<button>Add Friend</button>	
					  		
					  		<div class="your-decks">
					  			<h3>Decks / <?= $deck_count; ?></h3>
					  			
					  			<p>Filter by:</p>
					  			<button class="filters activeFilter">Newest</button>
					  			<button class="filters">Oldest</button>
					  			<button class="filters">Highest Rating</button>
					  			<div class="clearfix"></div>
					  			
					  			<? foreach($decks as $deck): ?>
					  			<section class="deck">
					  				<section class="deck-info">
						  				<p><?= Html::anchor('study/cards/'.$deck->id, $deck->title); ?></p>
						  				<p>Total Cards: 57</p>
						  				<p>Created on: <?= $deck->date(); ?></p>
					  				</section>
						  				
						  			<section class="deck-social">
						  				<p><?= Asset::img('icons/check_mark.png', array('alt' => 'Decking rating', 'width' => '25', 'height' => '20')); ?></p>
						  				<p>3</p>
						  				<p><a href="#" class="share">Share Deck</a></p>
						  			</section>
						  				
						  			<p><a href="#">Edit Deck</a>
					  			</section>
					  			<? endforeach; ?>
					  			
					  		</div> <!-- end of your-decks -->
					  		
					  		<div class="recent-activity">
					  			<h3>Recent Activity</h3>
					  			
					  				<div class="activity">
					  					<p><?= $user_info->username; ?> is now friends with <a href="#">bumblebuzzle86</a></p>
					  					<p>March 20th, 2013</p>
					  				</div>
					  		</div> <!-- end of recent-activity -->
					  		
					  		
					  	</div> <!-- end of user-info -->
				  </div> <!-- end of profile -->