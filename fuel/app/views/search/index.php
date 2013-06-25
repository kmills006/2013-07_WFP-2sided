				<div class="content search-results sizer">
					<h2>Search Results</h2>

						<div class="results-decks">
							<h3>Decks</h3>

								<? if(isset($decks))
								{
									foreach($decks as $deck): ?>
						  			<div class="deck">
						  				<div class="deck-info">
							  				<p><?= Html::anchor('study/cards/'.$deck->id, $deck->title); ?></p>
							  				<p>Total Cards: <?= $deck->card_count; ?></p>
							  				<p>Created on: <?= $deck->date(); ?></p>
						  				</div>
							  				
							  			<div class="deck-social">
							  				<p><?= Asset::img('icons/check_mark.png', array('alt' => 'Decking rating', 'width' => '25', 'height' => '20')); ?></p>
							  				<p>3</p>
							  				<!-- <p><a href="#" class="share">Share Deck</a></p> -->
							  			</div>
							  				
							  			<!-- <p><a href="#">Edit Deck</a> -->
						  			</div>
						  			<? endforeach;
								}
								else
								{ ?>
									<p>No Decks Found</p>
								<? } ?>
							


						</div>

						<div class="results-tags">
							<h3>Tags</h3>

							<? if(isset($tags))
							{
								foreach($tags as $tag)
								{
									var_dump($tag);
								}
							}
							else
							{
								echo "No tags.";
							} ?>
						</div>


						<div class="results-users">
							<h3>Users</h3>

							<? if(isset($users))
							{
								foreach($users as $user)
								{

									// echo '<pre>';
									// var_dump($user);
									// echo '</pre>';

									if(isset($user->profile_image) && $user->profile_image != null){
										echo Asset::img('profile_photos/thumbs/'.$user->profile_image, array('alt' => $user->username.' profile image'));
									}
									else
									{
										echo Asset::img('profile_photos/thumbs/thumb_profile_placeholder.gif');
									}
								}
							}
							else
							{
								echo "No users.";
							} ?>
						</div>

				</div>