<? 

	echo '<pre>';
	var_dump($pagination);
	echo '</pre>';

?>


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

				  	<? if(isset($user_info->name)): ?>
				  		<h2>Welcome back <?= $user_info->name; ?>!</h2>
				  	<? elseif(isset($user_info->username)):?>
				  		<h2>Welcome back <?= $user_info->username; ?>!</h2>
				 	<? else:?>
				 		<h2>Welcome back!</h2>
				  	<? endif; ?>
				  	
				  		<div class="recently-studied">
				  			<h3>Recently Studied</h3>
				  			
				  			<form>
				  				<select>
				  					<option>3</option>
				  					<option>10</option>
				  					<option>20</option>
				  				</select>
				  			</form>
				  			
				  			<div class="rs">
					  			<? foreach($recently_studied as $rs): ?>
									<div class="rs-item">
						  				<p><span><?= $rs->date(); ?></span><a href="#"><?= $rs->deck_info[0]->title; ?></a></p>
						  			</div>
						  		<? endforeach; ?>
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
				  			<div class="decks">
					  			<? foreach($decks as $deck): ?>
						  			<section class="deck">
						  				<div class="deck-info">
							  				<p><?= Html::anchor('study/view/'.$deck->id, $deck->title, array('data-id' => $deck->id)); ?></p>
							  				
							  				<? Session::set_flash('deck_id', $deck->id); ?>
							  				
							  				<p>Total Cards: <?= $deck->card_count; ?></p>
							  				<p>Created on: <?= $deck->date(); ?></p>
						  				</div>
							  				
							  			<div class="deck-social">
							  				<p><img src="assets/img/icons/check_mark.png" alt="Rating Check Mark Icon" width="25" height="20"/></p>
							  				<p><?= $deck->likes_count; ?></p>
							  				<p><a href="#" class="share">Share Deck</a></p>
							  			</div>
							  				
							  			<p class="delect-deck" data-id="<?= $deck->id; ?>" data-title="<?= $deck->title; ?>"><?= Html::anchor('#'.$deck->id, 'Delete Deck'); ?></p>
						  			</section>
					  			<? endforeach; ?>
					  		</div>
				  			

				  		</div>
				    </div> <!-- end of ud-tab-content -->		
				
    		</div> <!-- end of content -->