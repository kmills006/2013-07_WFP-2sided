<? 

	
?>			

			<div class="content user-profile sizer" data-id="<?= $user_info->id ?>">
    			
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

    				<? if(empty($points)): ?>
    					<h2>Level <?= $level; ?></h2>

    					<div class="level-progress">
				 			<span><span></span></span>
				 		</div>

    						<p>Total StudyPoints <span class="total-points">0</span></p>
    				<? else: ?>
    					<h2>Level <?= $level->level; ?></h2>

    					<div class="level-progress">
				 			<span><span></span></span>
				 		</div>

    					<p>Total StudyPoints <span class="total-points points-till" data-points="<?= $points_to_level->points_between ?>" data-prevrequired="<?= $level->required_score; ?>"><?= $points->total_points; ?></span></p>
					
    				<? endif; ?>
    				
    				
				 	
				 	<div class="friends-list">
					 	<h2>Friends / <? if(count($friends) > 0)
									 	{
									 		echo count($friends);
									 	}
									 	else
									 	{
									 		?>0<?
									 	} ?></h2>

						<? if(isset($friends)): ?>
							<? foreach($friends as $friend): ?>
							 	<div class="friend">
									<? 
										if($friend->profile_image != NULL)
										{
											echo Asset::img('profile_photos/thumbs/'.$friend->profile_image, array('alt' => $friend->username.' profile image'));
										}
										else
										{
											echo Asset::img('profile_photos/thumbs/thumb_profile_placeholder.gif', array('alt', $friend->username.' profile image'));
										}
									?>
									
									<h3><?= Html::anchor($friend->profile_url(), $friend->username); ?></h3>
									<p>395 Points</p>
									
							 	</div>
					 	<? endforeach; ?>

					<? else: ?>
						<p>No Friends</p>
					<? endif; ?>
					 	
					 	<p><a href="#">View All</a></p>
					 
				 	</div>
				 	
    			</aside>
    			
    			  <div class="profile">
    			  	<div class="user-info">
					  	<h2><?= $user_info->username; ?></h2>	
					  	
					  	<? if($user_info->id == Session::get('user_id')){?>
					  			<!-- looking at your profile; check will be added if you have already added this friend --> 
					  	<? }else{ 

					  			if(!$friend_check)
					  			{
					  				if(!$check_pending): ?>
					  					<button class="add-friend" data-userid="<? echo $user_info->id ?>">Add Friend</button>
					  				<? else: ?>
										<button class="pending" data-userid="<? echo $user_info->id ?>">Pending</button>
					  				<? endif; 
					  			}
					  			else
					  			{ 
					  				// Users already friends
					  			}
					  	
					  		} ?>
					  		
					  		<div class="your-decks">
					  			<h3>Decks / <?= $deck_count; ?></h3>
					  			
					  			<p>Filter by:</p>
					  			<button class="filters activeFilter">Newest</button>
					  			<button class="filters">Oldest</button>
					  			<button class="filters">Highest Rating</button>
					  			<div class="clearfix"></div>
					  			
					  			<div class="decks">
						  			<? foreach($decks as $deck): ?>
							  			<div class="deck">
							  				<div class="deck-info">
								  				<p><?= Html::anchor('study/view/'.$deck->id, $deck->title); ?></p>
								  				<p>Total Cards: <?= $deck->card_count; ?></p>
								  				<p>Created on: <?= $deck->date(); ?></p>
							  				</div>
								  				
								  			<div class="deck-social">
								  				<p><?= Asset::img('icons/check_mark.png', array('alt' => 'Decking rating', 'width' => '25', 'height' => '20')); ?></p>
								  				<p><?= $deck->likes_count; ?></p>
								  			</div>
								  				
								  			<!-- <p><a href="#">Edit Deck</a> -->
							  			</div>
						  			<? endforeach; ?>

						  			<?= $pagination; ?>
						  		</div>
					  			
					  		</div> <!-- end of your-decks -->
					  		
					  		<div class="recent-activity">
					  			<h3>Recent Activity</h3>
					  			
					  				<? foreach($recent_activity as $ra): ?>

					  					<?
					  				// 		echo '<pre>';
											// var_dump($recent_activity);
											// echo '</pre>';
					  					?>

						  				<div class="activity">
						  					<p><?= $user_info->username . ' ' . $ra->message . ' ' . (isset($ra->title) ? Html::anchor('study/view/'.$ra->deck_id, $ra->title) : Html::anchor('profile/view/'.$ra->username, $ra->username)).'!';; ?></p>
						  					<p><?= $ra->created_at ?></p>
						  				</div>
						  			<? endforeach; ?>
					  		</div> <!-- end of recent-activity -->
					  		
					  		
					  	</div> <!-- end of user-info -->
				  </div> <!-- end of profile -->