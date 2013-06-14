			<div class="content create-deck">
    			<!-- <a href="user_dashboard.html" class="back-to-dash">Back to Dashboard</a> -->
				<?= Html::anchor('dashboard', 'Back to Dashboard', array('class' => 'back-to-dash')); ?>

    			<aside>
				 	<h3>Create New Deck</h3>

				 	<p>Bulbasaur Ivysaur Venusaur Charmander Charmeleon Charizard Squirtle Wartortle Blastoise Caterpie Metapod Butterfree Weedle Kakuna Beedrill Pidgey Pidgeotto Pidgeot Rattata Raticate Spearow Fearow Ekans Arbok Pikachu Raichu Sandshrew Sandslash Nidoran Nidorina Nidoqueen Nidoran Nidorino Nidoking Clefairy Clefable Vulpix Ninetales Jigglypuff Wigglytuff Zubat Golbat Oddish Gloom Vileplume Paras Parasect Venonat Venomoth Diglett Dugtrio Meowth Persian Psyduck Golduck Mankey Primeape Growlithe Arcanine </p>
    			</aside>
    			
    			  <div class="new-deck-info">
    			  	<h3>About Your New Flash Card Set</h3>

	    			  	<? echo Form::open('deck/save'); ?>

	    			  		<div class="deck-info">

							<?  echo Form::input('title', '', array('placeholder' => 'Title'));

								echo Form::input('tags', '', array('placeholder' => 'Tags'));

								echo Form::label('Public', 'privacy');
								echo Form::radio('privacy', 'Public', true);

								echo Form::label('Private', 'privacy');
								echo Form::radio('privacy', 'Private'); ?>

							</div> <!-- end of deck-info -->

							<div class="terms">
								<h3>Enter Terms</h3>

								<div class="term">

								<?  echo Form::label('1.', 'term');
									echo Form::input('term', '', array('placeholder' => 'Term')); 
									echo Form::textarea('definition', '', array('placeholder' => 'Definition', 'class' => 'opensans')); ?>
								</div>

								<div class="term">

								<?  echo Form::label('2.', 'term');
									echo Form::input('term', '', array('placeholder' => 'Term')); 
									echo Form::textarea('definition', '', array('placeholder' => 'Definition', 'class' => 'opensans')); ?>
								</div>

								<div class="term">

								<?  echo Form::label('3.', 'term');
									echo Form::input('term', '', array('placeholder' => 'Term')); 
									echo Form::textarea('definition', '', array('placeholder' => 'Definition', 'class' => 'opensans')); ?>
								</div>

								<div class="term">

								<?  echo Form::label('4.', 'term');
									echo Form::input('term', '', array('placeholder' => 'Term')); 
									echo Form::textarea('definition', '', array('placeholder' => 'Definition', 'class' => 'opensans')); ?>
								</div>

								<? echo Html::anchor('#', Asset::img('icons/add_card.png')." Add another term by either clicking here or pressing TAB on the last input box.");

								echo Form::button('submit', 'Submit');

								echo Form::close(); ?>

							</div> <!-- end of terms -->
						</div><!-- end of deck-info -->
				  </div> <!-- end of profile -->