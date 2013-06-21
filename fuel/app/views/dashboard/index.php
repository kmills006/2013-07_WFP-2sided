    		<div class="content user-dashboard sizer">
    			<h1>Dashboard</h1>
    			
 				<div class="ud-tabs">
					<?	
						echo Html::anchor('dashboard', 'Study', array('class' => 'ud-tab-active study'));
						echo Html::anchor('dashboard/notifications', 'Notifications', array('class' => 'notifications'));
						echo Html::anchor('dashboard/achievements', 'Achievements', array('class' => 'achievements'));
						echo Html::anchor('dashboard/settings', 'Settings', array('class' => 'settings'));
					?>
				</div>
				  
				<div id="study" class="ud-tab-content">

				  	<? if(isset($name)): ?>
				  	<h2>Welcome back <?= $name; ?>!</h2>
				  	<? elseif(isset($username)):?>
				  	<h2>Welcome back <?= $username; ?>!</h2>
				 	<? else:?>
				 	<h2>Welcome back!</h2>
				  	<? endif; ?>
				  	
				  		<div class="recently-studied">
				  			<h3>Recently Studied</h3>
				  			
				  			<form>
				  				<select>
				  					<option>7 days</option>
				  					<option>30 days</option>
				  					<option>90 days</option>
				  				</select>
				  			</form>
				  			
				  			
				  			<div class="rs-item">
				  				<p><span>2 days ago</span><a href="#">Civil War Midterm</a></p>
				  			</div>
				  			
				  			<div class="rs-item">
				  				<p><span>8 days ago</span><a href="#">Cooking Terminology</a></p>
				  			</div>
				  			
				  			<div class="rs-item">
				  				<p><span>21 days ago</span><a href="#">First Year Spanish</a></p>
				  			</div>
				  			
				  		</div>
				  		
				  		
				  		<div class="your-decks">
				  			<h3>My Decks / <? if(isset($total_decks)): echo $total_decks; else: echo "0"; endif; ?></h3>
				  			
				  			<p>Filter by:</p>
				  			<button class="filters active-filter">Newest</button>
				  			<button class="filters">Oldest</button>
				  			<button class="filters">Highest Rating</button>
				  			<button class="create-new-btn right-btn"><?= Html::anchor('deck/create', 'Create New'); ?></button>
				  			<div class="clearfix"></div>
				  			

				  			<!-- Looping through all the users decks -->
				  			<? foreach($decks as $deck): ?>
				  			<section class="deck">
				  				<div class="deck-info">
					  				<p><?= Html::anchor('study/cards/'.$deck->id, $deck->title); ?></p>
					  				<p>Total Cards: <?= $deck->card_count; ?></p>
					  				<p>Created on: <?= $deck->date(); ?></p>
				  				</div>
					  				
					  			<div class="deck-social">
					  				<p><img src="assets/img/icons/check_mark.png" alt="Rating Check Mark Icon" width="25" height="20"/></p>
					  				<p>3</p>
					  				<p><a href="#" class="share">Share Deck</a></p>
					  			</div>
					  				
					  			<p class="delect-deck"><?= Html::anchor('deck/delete/'.$deck->id, 'Delete Deck'); ?></p>
				  			</section>
				  			<? endforeach; ?>
				  			

				  		</div>
				    </div> <!-- end of ud-tab-content -->		
				
    		</div> <!-- end of content -->