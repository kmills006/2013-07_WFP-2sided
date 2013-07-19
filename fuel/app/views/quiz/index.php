<? 
    // echo '<pre>';
    // var_dump($cards);
    // echo '</pre>';
?>			

            <div class="content quiz sizer">
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
						

                        <h3>Instructions</h3>
                            <p>Select the correct definition for the term given. At the end of the quiz you will be awarded <span>StudyPoints</span> for your correct answers.</a>
    				</div>

    				<button>Start Over</button>
                    <button>End Quiz</button>					    				
    			</aside>
    			
    			<div class="quiz-content">
    				<div class="header">
    					<h2>Question  1 of <?= $card_count; ?></h2>
    				</div>
    				
    				<div class="flash-card">
                        <?= Asset::img('flashcards/left_arrow.png', array('alt' => 'Left arrow to switch flashcard', 'class' => 'controls left-arrow')); ?>
	    				
                        <? foreach($cards as $card): ?>
    	    				<div class="card" data-id="<?= $card->id; ?>">
                                <p class="question"><?= $card->term; ?></p>
                                <p class="answer"><?= $card->definition; ?></p>

                                <form>

                                </form>
    	    				</div>
                        <? endforeach; ?>
	    				
                        <?= Asset::img('flashcards/right_arrow.png', array('alt' => 'Right arrow to switch flashcard', 'class' => 'controls right-arrow')); ?>
	    				
                            <button class="skip">Skip Question</button>
                            <div class="flip"></div>
                            <button class="next">Next Question</button>
    				</div>
    			</div>
				
    		</div> <!-- end of content -->