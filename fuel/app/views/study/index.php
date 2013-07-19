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
						<h2 class="deck-title" data-id="<?= $deck_info->id; ?>"><?= $deck_info->title ?></h2>
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
                                echo Form::button($tag->tag_name, $tag->tag_name,array('class' => 'tags'));
                            }
                        } 
                        if(count($tags) == 0){ ?>
                            <p>No tags</p>
                       <? } ?>
    				</div>

    				
    				<div class="header">
    					<h2>Stats Against Deck</h2>
    				</div>
    				
    				<div class="quiz-stats">

                        <? if(Session::get('is_logged_in') === 1){
                            if(!$quiz_score): ?>
                                <p>No past scores</p>

                                <?= html_tag('p', array(), Html::anchor('quiz/questions/'.$deck_info->id, 'Test Your Knowledge')); ?>
                            <? else: ?>
                                <p>Last quiz on <?= $quiz_score->date(); ?></p>
                            
                                <h3>Score <?= $quiz_score->score; ?>%</h3>
                                
                                <?= html_tag('p', array(), Html::anchor('quiz/questions/'.$deck_info->id, 'Test Your Knowledge')); ?>
                            <? endif; ?>
                        <? }else
                        { ?>
                            <p>Please login to take quiz on <?= $deck_info->title; ?> </p>
                            <button><?= Html::anchor('user/login', 'Login'); ?></button>
                        <? } ?> 
    				</div>
    							    				
    			</aside>
    			
    			<div class="study-content">
    				<div class="header">
    					<a href="#" class="active-study-tab card-view">Card View</a>
    					<a href="#" class="list-view">List View</a>
    				</div>
    				
    				
                    <div class="flashcard-view">
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
                                                                    'class'       => 'small-btn like-btn',
                                                                    'data-id'     => $deck_info->id,
                                                                    'data-logged' => Session::get('is_logged_in'),
                                ));

                                // var_dump(Session::get('is_logged_in'));
                            }
                            else
                            {
                                // if you have already liked this deck, you can unlike it
                                echo Form::button('like', 'Unlike', array(
                                                                    'class'   => 'small-btn like-btn liked-active',
                                                                    'data-id' => $deck_info->id,
                                                                    'data-logged' => Session::get('is_logged_in'),
                                ));
                            }
                        } ?>
        				
        				
        				
        				<div class="flash-card">
                            <?= Asset::img('flashcards/left_arrow.png', array('alt' => 'Left arrow to switch flashcard', 'class' => 'controls left-arrow')); ?>
    	    				
                            <? foreach($cards as $card): ?>
        	    				<div class="card">
        		    					<p class='term'><?= $card->term; ?></p>
                                        <p class='definition'><?= $card->definition; ?></p>
        		    					
                                        <p class="keyboard-shortcuts" title="Keyboard shortcuts tooltip"><?= Asset::img('icons/keyboard_shortcuts.png', array('alt' => 'Keyboard Shortcuts')); ?> Keyboard Shortcuts</p>
        	    				</div>
                            <? endforeach; ?>
    	    				
                            <?= Asset::img('flashcards/right_arrow.png', array('alt' => 'Right arrow to switch flashcard', 'class' => 'controls right-arrow')); ?>
    	    				<div class="practice-more"></div>
    	    				<div class="flip"></div>
    	    				<div class="mastered"></div>
        				</div>
                    </div>

                    <div class="list">
                        
                        <table>
                            <!-- <caption>List View</caption> -->

                            <thead>
                                <th>Term</th>
                                <th rowspan="2">Definition</th>
                            </thead>

                            <tbody class='card-table'>
                                    
                            </tbody>
                        </table>

                    </div>
    			</div>
				
    		</div> <!-- end of content -->