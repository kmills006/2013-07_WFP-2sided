<?

	// echo '<pre>';
	// var_dump($notifications);
	// echo '</pre>';

?>
			<div class="content user-dashboard sizer">
    			<h1>Dashboard</h1>

				<div class="ud-tabs">
					<?	
						echo Html::anchor('dashboard', 'Study', array('class' => 'study'));
						echo Html::anchor('dashboard/notifications', 'Notifications', array('class' => 'ud-tab-active notifications'));
						echo Html::anchor('dashboard/achievements', 'Achievements', array('class' => 'achievements'));
						echo Html::anchor('dashboard/settings', 'Settings', array('class' => 'settings'));
					?>
				</div>
				  
				  <div id="notifications" class="ud-tab-content">
				  	<h2><?= $username; ?> New Notifications</h2>
				  	

						<? if(isset($notifications))
						{
							foreach($notifications as $notification): ?>
						  		<div class="user-notification" data-id="<?= $notification->notification_id; ?>">
						  			<? if($notification->profile_image != null)
						  			   {
						  			   		echo Asset::img('profile_photos/thumbs/'.$notification->profile_image, array('alt' => $notification->username.' profile image'));
						  			   }
						  			   else{
						  			   		echo Asset::img('profile_photos/thumbs/thumb_profile_placeholder.gif', array('alt' => $notification->username.' profile image'));
						  			   } ?>
							  			<!-- <img src="img/profile_placeholders/sara_englishbee.jpg" alt="User profile thumbnail" width="50" width="50"/> -->
							  			<p><?= $notification->date(); ?></p>
							  			<!-- <p><a href=""><?= $notification->username; ?></a> <?= $notification->message; ?></p> -->
							  			<p><?= Html::anchor('profile/view/'.$notification->id, $notification->username); ?><?= $notification->message;?></p>							  			
							  			<button class="reject friend-request" data-id="<?= $notification->notification_id; ?>">Reject</button>
							  			<button class="accept friend-request" data-id="<?= $notification->notification_id; ?>">Accept</button>
						  		</div>
				  			<? endforeach;
						}
						else
						{ ?>

							<div class="user-notification">
								<p>No New Notifications</p>
							</div>

						<? } ?>

						
				  </div>			  
				
    		</div> <!-- end of content -->