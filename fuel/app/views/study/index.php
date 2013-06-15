<? 
    echo '<pre>';
    var_dump($deck_info->created_at);
    echo '</pre>';
?>			

            <div class="content study-deck">
    			<!-- <a href="user_dashboard.html" class="back-to-dash">Back to Dashboard</a> -->
                <?= Html::anchor('dashboard', 'Back to Dashboard', array('class' => 'back-to-dash')); ?>
    			
    			<aside>
    			
    				<div class="header">

                        <? if(isset($deck_info->title)): ?>
						<h2><?= $deck_info->title ?></h2>
                        <? endif?>

						<!-- <p><img src="assets/img/icons/check_mark_white.png" alt="Rating Check Mark Icon" width="25" height="20"/>  237</p> -->
					</div>
					
    				<div class="sd-deck-info">
   						<p><a href="#"><?= $deck_owner; ?></a></p>
						<p>Total Cards: <?= $card_count; ?></p>
						<p>Created on <?= $deck_info->created_at; ?></p>
						
						<h3>Tags</h3>
						
						<button>jeopardy</button>
						<button>game show</button>
						<button>trivia</button>
    				</div>

    				
    				<div class="header">
    					<h2>Stats Against Deck</h2>
    				</div>
    				
    				<div class="quiz-stats">
    					<p>Last quiz on May 11th, 2013</p>
    					
    					<h3>Score 87%</h3>
    					
    					<p><a href="#">Test Your Knowledge</a></p>
 
    				</div>
    				
    				<div class="header">
						<h2>Challenge</h2>
					</div>
    				
    				<div class="challenge">
    					<p>Test your friends knowledge on this deck with a challenge, both of you will take the quiz on Jeopardy and highest score wins and receives StudyPoints</p>
    					
    					<p><a href="#">Select an Opponent</a></p>
    					
    				</div>					    				
    			</aside>
    			
    			<div class="study-content">
    				<div class="header">
    					<a href="#" class="active-study-tab">Card View</a>
    					<a href="#">List View</a>
    				</div>
    				
    				<button class="card-sort-active">Random Order</button>
    				<button>A-Z</button>
    				
    				<input type="checkbox" name="both-sides"/>
    				<label for="both-sides">Both Sides</label>
    				
    				<!-- if you are looking at your own deck, this button gives you the option to edit the deck -->
    				<button>Edit Deck</button>
    				
    				<!-- if you are looking at someone else's deck, this button gives you the option to upvote that deck -->
    				<button>Like Deck</button>
    				
    				
    				<div class="flash-card">
	    				<img src="assets/img/flashcards/left_arrow.png" alt="Left Arrow to switch flashcard" class="controls left-arrow"/>
	    				
	    				<div class="card">
		    					<p>US HISTORY: Only state carried by George McGovern in '72 election</p>
		    					
		    					<p><img src="assets/img/icons/keyboard_shortcuts.png" alt="Keyboard Shortcuts" /> Keyboard Shortcuts</p>
	    				</div>
	    				
	    				<img src="assets/img/flashcards/right_arrow.png" alt="Right Arrow to switch flashcard" class="controls right-arrow"/>
	    				<div class="practice-more"></div>
	    				<div class="flip"></div>
	    				<div class="mastered"></div>
    				</div>
    			</div>
				
    		</div> <!-- end of content -->