<? 
	
	// echo '<pre>';
	// var_dump($badges);
	// echo '</pre>';

?>

    		<div class="content user-dashboard sizer">
    			<h1>Dashboard</h1>
    			
				<div class="ud-tabs">
					<?	
						echo Html::anchor('dashboard/study', 'Study', array('class' => 'study'));
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
							<p><span class="points-till" data-points="<?= $points_to_level->points_between ?>" data-prevrequired="<?= $level->required_score ?>"><?= $points_to_level->points_till ?></span> points needed to reach level <?= $level->level + 1; ?></p>
					 	<? endif; ?>
					 	
					 	<div class="level-progress">
					 		<span><span></span></span>
					 	</div>
					 	
					 	<div class="badges">
					 	
						 	<h3>Badges Received</h3>

						 	<? if(empty($badges)): ?>
								<p>No badges yet, the more you study and test your knowledge the faster you will receive your first badge!</p>
						 	<? else: ?>
						 		<? foreach($badges as $badge): ?>
								 	<div class="badge">
								 		<img src="../assets/img/badges/<?= $badge->img ?>" width="70" height="59" alt="Achievement Badge" />
								 		<p><?= $badge->name; ?></p>
							 		</div>
							 	<? endforeach; ?>
							<? endif; ?>

					 	</div> <!-- end of badges -->
				  </div> <!-- end ud-tab-content -->		  
				
    		</div> <!-- end of content -->