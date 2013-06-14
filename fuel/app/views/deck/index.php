			<div class="content create-deck">
    			<a href="user_dashboard.html" class="back-to-dash">Back to Dashboard</a>
    			
    			<aside>
				 	<h3>Create New Deck</h3>

				 	<p>Bulbasaur Ivysaur Venusaur Charmander Charmeleon Charizard Squirtle Wartortle Blastoise Caterpie Metapod Butterfree Weedle Kakuna Beedrill Pidgey Pidgeotto Pidgeot Rattata Raticate Spearow Fearow Ekans Arbok Pikachu Raichu Sandshrew Sandslash Nidoran Nidorina Nidoqueen Nidoran Nidorino Nidoking Clefairy Clefable Vulpix Ninetales Jigglypuff Wigglytuff Zubat Golbat Oddish Gloom Vileplume Paras Parasect Venonat Venomoth Diglett Dugtrio Meowth Persian Psyduck Golduck Mankey Primeape Growlithe Arcanine </p>
    			</aside>
    			
    			  <div class="new-deck-info">
    			  	<h3>About Your New Flash Card Set</h3>

	    			  	<?  echo Form::open('deck/save');

		    			  	echo Form::input('title', '', array('placeholder' => 'Title'));

		    			  	echo Form::label('Public', 'privacy');
		    			  	echo Form::radio('privacy', 'Public', true);

		    			  	echo Form::label('Private', 'privacy');
		    			  	echo Form::radio('privacy', 'Private');

		    			  	echo Form::input('subjects', '', array('placeholder' => 'Subjects'));

		    			  	echo Form::input('tags', '', array('placeholder' => 'Tags')); ?>

		    			  	<h3>Enter Terms</h3>

		    			  

		    			  <? 
		    			  	 echo Form::label('1.', 'term');
		    			  	 echo Form::input('term', 'Term'); 
		    			  	 echo Form::textarea('definition', 'Definition');

		    			  	 echo Form::label('2.', 'term');
		    			  	 echo Form::input('term', 'Term'); 
		    			  	 echo Form::textarea('definition', 'Definition');

		    			  	 echo Form::label('3.', 'term');
		    			  	 echo Form::input('term', 'Term'); 
		    			  	 echo Form::textarea('definition', 'Definition');

		    			  	 echo Form::label('4.', 'term');
		    			  	 echo Form::input('term', 'Term'); 
		    			  	 echo Form::textarea('definition', 'Definition');
		    			  ?>


		    			  	<? echo Form::close(); ?>
				  </div> <!-- end of profile -->