				<div class="content search-results sizer">
					<h2>Search Results</h2>

						<div class="results-decks">
							<h3>Decks</h3>

								<? if(isset($decks))
								{
									foreach($decks as $deck): ?>
							  			<div class="deck">
							  				<div class="deck-info">
								  				<p><?= Html::anchor('study/view/'.$deck->id, $deck->title); ?></p>
								  				<p>Total Cards: <?= $deck->card_count; ?></p>
								  				<p>Created on: <?= $deck->date(); ?></p>
							  				</div>
							  			</div>
						  			<? endforeach;
								}
								else
								{ ?>
									<p>No Decks Found</p>
								<? } ?>
							


						</div>

						<div class="tags">
							<h3>Tags</h3>

							<? if(isset($tags))
							{
								foreach($tags as $tag)
								{
									echo Form::button($tag->tag_name);
								}
							}
							else
							{
								echo "No tags.";
							} ?>
						</div>


						<div class="users">
							<h3>Users</h3>

							<? if(isset($users))
							{
								foreach($users as $user)
								{
									if(isset($user->profile_image) && $user->profile_image != null){
										echo Asset::img('profile_photos/thumbs/'.$user->profile_image, array('alt' => $user->username.' profile image'));
									}
									else
									{
										echo Asset::img('profile_photos/thumbs/thumb_profile_placeholder.gif');
									}

									// Username
									echo html_tag('a', array(
														'href' => 'profile/view/'.$user->id,							
									), $user->username);

									echo html_tag('p', array(), '283 points');
								}
							}
							else
							{
								echo "No users.";
							} ?>
						</div>

				</div>