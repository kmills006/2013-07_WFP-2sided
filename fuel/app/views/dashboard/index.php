    		<div class="content user-dashboard">
    			<h1>Dashboard</h1>
    			
				<div id="tabs">
				  <ul class="ud-tabs">
				    <li class="ud-tab-active">Study</li>
				    <li>Notifications</li>
				    <li>Achievements</a></li>
				    <li>Settings</li>
				  </ul>
				  
				  <div id="study" class="ud-tab-content">
				  	<? if(isset($username)): ?>
				  	<h2>Welcome back <?= $username; ?>!</h2>
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
				  			
				  			
				  			<section class="rs-item">
				  				<p><span>2 days ago</span><a href="#">Civil War Midterm</a></p>
				  			</section>
				  			
				  			<section class="rs-item">
				  				<p><span>8 days ago</span><a href="#">Cooking Terminology</a></p>
				  			</section>
				  			
				  			<section class="rs-item">
				  				<p><span>21 days ago</span><a href="#">First Year Spanish</a></p>
				  			</section>
				  			
				  		</div>
				  		
				  		
				  		<div class="your-decks">
				  			<h3>My Decks / 22</h3>
				  			
				  			<p>Filter by:</p>
				  			<button class="filters activeFilter">Newest</button>
				  			<button class="filters">Oldest</button>
				  			<button class="filters">Highest Rating</button>
				  			<button>Create New</button>
				  			<div class="clearfix"></div>
				  			

				  			<? foreach($decks as $deck): ?>
				  			<section class="deck">
				  				<section class="deck-info">
					  				<p><a href="study_deck.html"><?= $deck->title; ?></a></p>
					  				<p>Total Cards: 57</p>
					  				<p>Created on: <?= $deck->created_at; ?></p>
				  				</section>
					  				
					  			<section class="deck-social">
					  				<p><img src="assets/img/icons/check_mark.png" alt="Rating Check Mark Icon" width="25" height="20"/></p>
					  				<p>3</p>
					  				<p><a href="#">Share Deck</a></p>
					  			</section>
					  				
					  			<p><a href="#">Edit Deck</a>
				  			</section>
				  			<? endforeach; ?>

				  			<section class="deck">
				  				<section class="deck-info">
					  				<p><a href="study_deck.html">AP History 101</a></p>
					  				<p>Total Cards: 57</p>
					  				<p>Created on: May 20th, 2013</p>
				  				</section>
					  				
					  			<section class="deck-social">
					  				<p><img src="assets/img/icons/check_mark.png" alt="Rating Check Mark Icon" width="25" height="20"/></p>
					  				<p>3</p>
					  				<p><a href="#">Share Deck</a></p>
					  			</section>
					  				
					  			<p><a href="#">Edit Deck</a>
				  			</section>
				  			
				  			<section class="deck">
				  				<section class="deck-info">
					  				<p><a href="#">AP History 101</a></p>
					  				<p>Total Cards: 57</p>
					  				<p>Created on: May 20th, 2013</p>
				  				</section>
					  				
					  			<section class="deck-social">
					  				<p><img src="assets/img/icons/check_mark.png" alt="Rating Check Mark Icon" width="25" height="20"/></p>
					  				<p>3</p>
					  				<p><a href="#">Share Deck</a></p>
					  			</section>
					  				
					  			<p><a href="#">Edit Deck</a>
				  			</section>
				  			
				  			<section class="deck">
				  				<section class="deck-info">
					  				<p><a href="#">AP History 101</a></p>
					  				<p>Total Cards: 57</p>
					  				<p>Created on: May 20th, 2013</p>
				  				</section>
					  				
					  			<section class="deck-social">
					  				<p><img src="assets/img/icons/check_mark.png" alt="Rating Check Mark Icon" width="25" height="20"/></p>
					  				<p>3</p>
					  				<p><a href="#">Share Deck</a></p>
					  			</section>
					  				
					  			<p><a href="#">Edit Deck</a>
				  			</section>
				  			
				  			<section class="deck">
				  				<section class="deck-info">
					  				<p><a href="#">AP History 101</a></p>
					  				<p>Total Cards: 57</p>
					  				<p>Created on: May 20th, 2013</p>
				  				</section>
					  				
					  			<section class="deck-social">
					  				<p><img src="assets/img/icons/check_mark.png" alt="Rating Check Mark Icon" width="25" height="20"/></p>
					  				<p>3</p>
					  				<p><a href="#">Share Deck</a></p>
					  			</section>
					  				
					  			<p><a href="#">Edit Deck</a>
				  			</section>
				  			
				  			<section class="deck">
				  				<section class="deck-info">
					  				<p><a href="#">AP History 101</a></p>
					  				<p>Total Cards: 57</p>
					  				<p>Created on: May 20th, 2013</p>
				  				</section>
					  				
					  			<section class="deck-social">
					  				<p><img src="assets/img/icons/check_mark.png" alt="Rating Check Mark Icon" width="25" height="20"/></p>
					  				<p>3</p>
					  				<p><a href="#">Share Deck</a></p>
					  			</section>
					  				
					  			<p><a href="#">Edit Deck</a>
				  			</section>
				  			
				  			<section class="deck">
				  				<section class="deck-info">
					  				<p><a href="#">AP History 101</a></p>
					  				<p>Total Cards: 57</p>
					  				<p>Created on: May 20th, 2013</p>
				  				</section>
					  				
					  			<section class="deck-social">
					  				<p><img src="assets/img/icons/check_mark.png" alt="Rating Check Mark Icon" width="25" height="20"/></p>
					  				<p>3</p>
					  				<p><a href="#">Share Deck</a></p>
					  			</section>
					  				
					  			<p><a href="#">Edit Deck</a>
				  			</section>
				  			
				  		</div>
				  </div> <!-- end of ud-tab-content -->				  
			</div>
				
    		</div> <!-- end of content -->