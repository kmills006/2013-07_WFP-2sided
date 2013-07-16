<? 
    // echo '<pre>';
    // var_dump($deck_info->user_id);
    // echo '</pre>';
?>			

            <div class="content study-deck sizer">
                <?= Html::anchor('dashboard', 'Back to Dashboard', array('class' => 'back')); ?>
    			
    			<aside>
    			
    				<div class="header">

                        <? if(isset($deck_info->title)): ?>
						<h2><?= $deck_info->title ?></h2>
                        <? endif?>

						<!-- <p><img src="assets/img/icons/check_mark_white.png" alt="Rating Check Mark Icon" width="25" height="20"/>  237</p> -->
					</div>
					
    				<div class="sd-deck-info">
   						<p><?= Html::anchor('profile/view/'.$deck_info->user_id, $deck_owner); ?></p>
						<p>Total Cards: <?= $card_count; ?></p>
						<p>Created on <?= $deck_info->date(); ?></p>
						
						<h3>Tags</h3>
						
						<? if(isset($tags))
                        {
                            foreach($tags as $tag)
                            {
                                echo Form::button($tag->tag_name);
                            }
                        } 
                        else{
                            // No tags
                        }?>
    				</div>

    				
    				<div class="header">
    					<h2>Stats Against Deck</h2>
    				</div>
    				
    				<div class="quiz-stats">
    					<p>Last quiz on May 11th, 2013</p>
    					
    					<h3>Score 87%</h3>
    					
    					<!-- <p><a href="#">Test Your Knowledge</a></p> -->
                        <?= html_tag('p', array(), Html::anchor('quiz/questions/'.$deck_info->id, 'Test Your Knowledge')); ?>
 
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
    					<a href="#" class="list-view">List View</a>
    				</div>
    				
    				<button class="card-sort-active">Random Order</button>
    				<button>A-Z</button>
    				
    				<input type="checkbox" name="both-sides"/>
    				<label for="both-sides">Both Sides</label>
    				
    				
                    <? if($deck_info->user_id == Session::get('user_id'))
                    {
                        // if you are looking at your own deck, this button gives you the option to edit the deck
                        echo Form::button('edit', Html::anchor('deck/edit/'.$deck_info->id, 'Edit Deck', array('class' => 'small-btn')));
                    }
                    else
                    {
                        if(!$liked)
                        {
                             // if you are looking at someone else's deck, this button gives you the option to upvote that deck
                            echo Form::button('like', 'Like', array(
                                                                'class'   => 'small-btn like-btn',
                                                                'data-id' => $deck_info->id,
                            ));
                        }
                        else
                        {
                            // if you have already liked this deck, you can unlike it
                            echo Form::button('like', 'Liked', array(
                                                                'class'   => 'small-btn like-btn liked',
                                                                'data-id' => $deck_info->id,
                            ));
                        }
                    } ?>
    				
    				
    				
    				<div class="flash-card">
                        <?= Asset::img('flashcards/left_arrow.png', array('alt' => 'Left arrow to switch flashcard', 'class' => 'controls left-arrow')); ?>
	    				
                        <? foreach($cards as $card): ?>
    	    				<div class="card">
    		    					<p class='term'><?= $card->term; ?></p>
                                    <p class='definition'><?= $card->definition; ?></p>
    		    					
                                    <p><?= Asset::img('icons/keyboard_shortcuts.png', array('alt' => 'Keyboard Shortcuts')); ?> Keyboard Shortcuts</p>
    	    				</div>
                        <? endforeach; ?>
	    				
                        <?= Asset::img('flashcards/right_arrow.png', array('alt' => 'Right arrow to switch flashcard', 'class' => 'controls right-arrow')); ?>
	    				<div class="practice-more"></div>
	    				<div class="flip"></div>
	    				<div class="mastered"></div>
    				</div>
    			</div>
				
    		</div> <!-- end of content -->