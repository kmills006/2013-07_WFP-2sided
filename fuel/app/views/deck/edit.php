<?

	// echo '<pre>';
	// var_dump($cards);
	// echo '</pre>';

?>


			<div class="content edit-deck sizer">
    			<!-- <a href="user_dashboard.html" class="back-to-dash">Back to Dashboard</a> -->
				<?= Html::anchor('dashboard', 'Back', array('class' => 'back')); ?>

    			<aside>
				 	<h3>Edit</h3>

				 	<p>Bulbasaur Ivysaur Venusaur Charmander Charmeleon Charizard Squirtle Wartortle Blastoise Caterpie Metapod Butterfree Weedle Kakuna Beedrill Pidgey Pidgeotto Pidgeot Rattata Raticate Spearow Fearow Ekans Arbok Pikachu Raichu Sandshrew Sandslash Nidoran Nidorina Nidoqueen Nidoran Nidorino Nidoking Clefairy Clefable Vulpix Ninetales Jigglypuff Wigglytuff Zubat Golbat Oddish Gloom Vileplume Paras Parasect Venonat Venomoth Diglett Dugtrio Meowth Persian Psyduck Golduck Mankey Primeape Growlithe Arcanine </p>
    			</aside>
    			
    			  <div class="new-deck-info">
    			  	<h3>Edit <?= $deck_info->title; ?></h3>

	    			  	<? echo Form::open('deck/update', array('id' => $deck_info->id)); ?>

	    			  		<div class="deck-info">

							<?  echo Form::input('title', $deck_info->title, array('placeholder' => 'Title'));

								echo Form::input('tags', '', array('placeholder' => 'Tags ex. History, Game Shows'));

								switch($deck_info->privacy)
								{
									case 0:
										echo Form::radio('privacy', 'Public', true);
										echo Form::label('Public', 'privacy');

										echo Form::radio('privacy', 'Private');
										echo Form::label('Private', 'privacy');

										break;
									case 1:
										echo Form::radio('privacy', 'Public');
										echo Form::label('Public', 'privacy');

										echo Form::radio('privacy', 'Private', true);
										echo Form::label('Private', 'privacy');

										break;
								}
							 ?>

							</div> <!-- end of deck-info -->

							<div class="terms">
								<h3>Enter Terms</h3>

								<? foreach($cards as $card): ?>
									<div class="term">
										<?  
											// echo '<pre>';
											// var_dump($card->id);
											// echo '</pre>';

											echo Form::label($card->position.'.', 'term');
											echo Form::input('card_id'.$card->id, $card->id, array('type' => 'hidden'));
											echo Form::textarea('term'.$card->position, $card->term, array('placeholder' => 'Term')); 
											echo Form::textarea('definition'.$card->position, $card->definition, array('placeholder' => 'Definition', 'class' => 'opensans')); ?>
									</div>
								<? endforeach; ?>

							</div> <!-- end of terms -->

							<? echo Html::anchor('#', Asset::img('icons/add_card.png')." Add another term by either clicking here or pressing TAB on the last input box.", array('class' => 'edit-add-another-term'));

							echo Form::button('submit', 'Submit');

							echo Form::close(); ?>

						</div><!-- end of deck-info -->
				  </div> <!-- end of profile -->