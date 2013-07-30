    		<div class="content user-dashboard sizer">
    			<h1>Dashboard</h1>
    			
				<div class="ud-tabs">
					<?	
						echo Html::anchor('dashboard', 'Study', array('class' => 'study'));
						echo Html::anchor('dashboard/notifications', 'Notifications', array('class' => 'notifications'));
						echo Html::anchor('dashboard/achievements', 'Achievements', array('class' => 'ud-tab-active achievements'));
						echo Html::anchor('dashboard/settings', 'Settings', array('class' => 'settings'));
					?>
				</div>
				  
				   <div id="achievements" class="ud-tab-content">
					 <h2>Achievements</h2>
					 
					 	<? if(empty($points)): ?>
					 		<h3>StudyPoints / Level <?= $level; ?></h3>
					 	
					 		<p>Total Points: <span class="total-points">0</span></p>
					 		
					 		<p><span class="points-till" data-points="2" data-required="2">50</span> points needed to reach level 2</p>
						<? else: ?>
							<h3>StudyPoints / Level <?= $level->level; ?></h3>
					 	
					 		<p>Total Points: <span class="total-points"><?= $points->total_points ?></span></p>
							<p><span class="points-till" data-points="<?= $points_to_level->points_between ?>" data-required="<?= $level->required_score ?>"><?= $points_to_level->points_till ?></span> points needed to reach level <?= $level->level + 1; ?></p>
					 	<? endif; ?>
					 	
					 	<div class="level-progress">
					 		<span><span></span></span>
					 	</div>
					 	
					 	<div class="badges">
					 	
						 	<h3>Badges Received</h3>
						 	
						 	<div class="badge">
						 		<img src="../assets/img/badges/badge.png" width="70" height="59" alt="Achievement Badge" />
						 		<p>Connected to Facebook</p>
						 	</div>
						 	
						 	<div class="badge">
						 		<img src="../assets/img/badges/badge.png" width="70" height="59" alt="Achievement Badge" />
						 		<p>Connected to Twitter</p>
						 	</div>
						 	
						 	<div class="badge">
						 		<img src="../assets/img/badges/badge.png" width="70" height="59" alt="Achievement Badge" />
						 		<p>1st Deck Created</p>
						 	</div>
						 	
						 	<div class="badge">
						 		<img src="../assets/img/badges/badge.png" width="70" height="59" alt="Achievement Badge" />
						 		<p>Aced 1st Quiz</p>
						 	</div>
						 	
						 	<div class="badge">
						 		<img src="../assets/img/badges/badge.png" width="70" height="59" alt="Achievement Badge" />
						 		<p>Won 1st Challenge</p>
						 	</div>
						 	
						 	<div class="badge">
						 		<img src="../assets/img/badges/badge.png" width="70" height="59" alt="Achievement Badge" />
						 		<p>Won 5 Challenges Back to Back</p>
						 	</div>

					 	</div> <!-- end of badges -->
				  </div> <!-- end ud-tab-content -->		  
				
    		</div> <!-- end of content -->