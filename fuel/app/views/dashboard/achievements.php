    		<div class="content user-dashboard">
    			<h1>Dashboard</h1>
    			
				<div class="ud-tabs">
					<?	
						echo Html::anchor('dashboard', 'Study');
						echo Html::anchor('dashboard/notifications', 'Notifications');
						echo Html::anchor('dashboard/achievements', 'Achievements', array('class' => 'ud-tab-active'));
						echo Html::anchor('dashboard/settings', 'Settings');
					?>
				</div>
				  
				   <div id="achievements" class="ud-tab-content">
					 <h2>Achievements</h2>
					 
					 	<h3>StudyPoints</h3>
					 	
					 	<p>Total Points: <span>123</span></p>
					 	<p>203 StudyPoints needed to reach level 3</p>
					 	
					 	<div class="level-progress">
					 		<span><span></span></span>
					 		<span><span></span></span>
					 		<span><span></span></span>
					 		<span><span></span></span>
					 	</div>
					 	
					 	<div class="badges">
					 	
						 	<h3>Badges Received</h3>
						 	
						 	<div class="badge">
						 		<img src="img/badges/badge.png" width="70" height="59" alt="Achievement Badge" />
						 		<p>Connected to Facebook</p>
						 	</div>
						 	
						 	<div class="badge">
						 		<img src="img/badges/badge.png" width="70" height="59" alt="Achievement Badge" />
						 		<p>Connected to Twitter</p>
						 	</div>
						 	
						 	<div class="badge">
						 		<img src="img/badges/badge.png" width="70" height="59" alt="Achievement Badge" />
						 		<p>1st Deck Created</p>
						 	</div>
						 	
						 	<div class="badge">
						 		<img src="img/badges/badge.png" width="70" height="59" alt="Achievement Badge" />
						 		<p>Aced 1st Quiz</p>
						 	</div>
						 	
						 	<div class="badge">
						 		<img src="img/badges/badge.png" width="70" height="59" alt="Achievement Badge" />
						 		<p>Won 1st Challenge</p>
						 	</div>
						 	
						 	<div class="badge">
						 		<img src="img/badges/badge.png" width="70" height="59" alt="Achievement Badge" />
						 		<p>Won 5 Challenges Back to Back</p>
						 	</div>

					 	</div> <!-- end of badges -->
				  </div> <!-- end ud-tab-content -->		  
				
    		</div> <!-- end of content -->