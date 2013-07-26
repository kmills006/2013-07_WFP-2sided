/*  
	2sided - The Social Way to Study
	Author: Kristy Miller
*/

(function($){


	/**
	* [shuffle description]
	* @param  {[type]} array [description]
	* @return {[type]}       [description]
	*/
	function shuffle(array) {
	  var copy = [], n = array.length, i;

	  // While there remain elements to shuffle…
	  while (n) {

	    // Pick a remaining element…
	    i = Math.floor(Math.random() * array.length);

	    // If not already shuffled, move it to the new array.
	    if (i in array) {
	      copy.push(array[i]);
	      delete array[i];
	      n--;
	    }
	  }

	  return copy;
	}




	/**
	 * Global Navigation
	 *
	 *  In the global navigation, when a user hovers over their profile image and username
		it will display a dropdown menu with links to their profile, dashboard, settings and
		logout 
	 */


	// Mouse over
	$(".dropdown").on("mouseover", function(e){
		console.log('mouseover');
		var userDDMenu = $(".user-dd");
		userDDMenu.css("display", "block");
	});
	

	// Mouse out
	$(".dropdown").on("mouseout", function(e){
		var userDDMenu = $(".user-dd");
		userDDMenu.css("display", "none");
	});


	// Drop down menu links
	var initDropdown = function()
	{	
		$('.user-dd li').on('click', function(e){
			
			switch($(this).text())
			{
				case 'Your Profile':
					
					// Load the logged in users profile page
					$.ajax({
						url:  'http://2sided.dev/2013-07_WFP-2sided/public/ajax/username',
						type: 'get',
						success: function(response){
							var username = JSON.parse(response);
							console.log(username);
							window.location.pathname = '/2013-07_WFP-2sided/public/profile/view/' + username;
						},
						error: function(response){
							console.log(response.responseText);
						}
					});
					
					break;

				case 'Dashboard':
					
					// Link to the user dashboard
					window.location.pathname = '/2013-07_WFP-2sided/public/dashboard';

					break;

				case 'Settings':
					
					// Link the user to the settings tab of the user dashboard
					window.location.pathname = '/2013-07_WFP-2sided/public/dashboard/settings';

					break;

				case 'Logout':

					// Logout the user
					window.location.pathname = '/2013-07_WFP-2sided/public/user/logout';

					break;

				default:
					// Default
					break;
			}

			return false;
			e.preventDefault();

		});
	}





	/**
	 * 
	 * Validation for login and sign up pages
	 * 
	 */
	var initValidation = function()
	{
		$('.login form').validationEngine();
		$('.signup form').validationEngine();
	}



	/**
	 *
	 * User Dashboard
	 * 
	 */
	
	
	/**
	 * Set Decks
	 *
	 * After a filter is selected, reorder the users decks
	 */
	var setDecks = function(response){
		var decks = $.parseJSON(response);

		var decksArea 	  = $('.decks'),
			sortedDecks   = ''
		;

		$.each(decks, function(key, value){

			// Formating date created
			var createdAt = new Date(value.created_at * 1000),
				month     = createdAt.getMonth() + 1,
				day       = createdAt.getDate(),
				year      = createdAt.getFullYear()
			;

			// Formating month
			switch(month){
				case 1:
					month = 'Jan';

					break;
				case 2:
					month = 'Feb';

					break;
				case 3:
					month = 'Mar';

					break;
				case 4:
					month = 'Apr';

					break;
				case 5:
					month = 'May';

					break;
				case 6:
					month = 'Jun';

					break;
				case 7:
					month = 'Jul';

					break;
				case 8:
					month = 'Aug';

					break;
				case 9:
					month = 'Sept';

					break;
				case 10:
					month = 'Oct';

					break;
				case 11:
					month = 'Nov';

					break;
				case 12:
					month = 'Dec';

					break;
			}

			var formatedDate = month + ' ' + day + ', ' + year;

			if(window.location.pathname == '/2013-07_WFP-2sided/public/dashboard')
			{
				sortedDecks += '<section class="deck"><div class="deck-info"><p><a href="study/cards/' + value.id +'">' + value.title + '</a></p><p>Total Cards: ' + value.card_count + '</p><p>Created on: ' + formatedDate + '</p></div><div class="deck-social"><p><img src="assets/img/icons/check_mark.png" alt="Rating Check Mark Icon" width="25" height="20"/></p><p>3</p><p><a href="#" class="share">Share Deck</a></p></div><p class="delect-deck">Delete Deck</p></section>';
			}
			else{
				sortedDecks += '<section class="deck"><div class="deck-info"><p><a href="study/cards/' + value.id +'">' + value.title + '</a></p><p>Total Cards: ' + value.card_count + '</p><p>Created on: ' + formatedDate + '</p></div><div class="deck-social"><p><img src="../../assets/img/icons/check_mark.png" alt="Rating Check Mark Icon" width="25" height="20"/></p><p>3</p><p></p></div></section>';
			}

			decksArea.html(sortedDecks);

		});
	}


	/**
	 * Sort Decks
	 *
	 * Ajax call to sort by either newest, oldest or highest rated decks
	 */
	var sortDecks = function(sort_by){
		var ajaxUrl = '';

		switch(sort_by){
			case 'newest':
				ajaxUrl = sort_by;

				break;

			case 'oldest':
				ajaxUrl = sort_by;

				break;

			case 'rating':
				ajaxUrl = sort_by;

				break;
		}

		$.ajax({
			url:  'http://2sided.dev/2013-07_WFP-2sided/public/ajax/' + ajaxUrl,
			type: 'post',
			data: {sort_by: sort_by},
			success: function(response){
				setDecks(response);
			},
			error: function(response){
				console.log(response.responseText);
			}
		});
	};

	
	/**
	 *
	 * Filter through the decks by either the newest, oldest or highest rating
	 * 
	 */
	var initFilters = function()
	{
		$('.filters').each(function(i){

			$(this).on('click', function(e){

				switch($(this).text())
				{
					case 'Newest':
						sortDecks('newest');

						break;

					case 'Oldest':
						sortDecks('oldest');

						break;

					case 'Highest Rating':
						sortDecks('rating');

						break;
				}

				return false;
			});

		});
	}

	/**
	 * 
	 * Delete Deck
	 *
	 */
	$('.delect-deck').on('click', function(e){
		var deck_id    = $(this).attr('data-id'),
			deck_title = $(this).attr('data-title')
		;


		alertify.set({
			labels: {
				ok: 'Confirm',
				cancel: 'Cancel'
			}
		});

		// Display confirm delete box
		alertify.confirm('Do you really want to delete ' + deck_title + '?', function (e) {
		    if (e) {
		    	// Delete the deck
		    	
		    	$.ajax({
					url:  'http://2sided.dev/2013-07_WFP-2sided/public/ajax/delete_deck',
					type: 'post',
					data: {
						deck_id: deck_id
					},
					success: function(response){
						if(JSON.parse(response).success == true)
						{
							alertify.success(deck_title + ' successfully deleted');

							$.ajax({
								url:  'http://2sided.dev/2013-07_WFP-2sided/public/ajax/newest',
								type: 'post',
								data: {newest: 'newest'},
								success: function(response){
									setDecks(response);
								},
								error: function(response){
									console.log(response.responseText);
								}
							});
						}
					},
					error: function(response){
						console.log(response.responseText);
					}
				});
		    	
		    } else {
		        // user clicked "cancel"
		        console.log('DONT Delete');
		    }
		});

		return false;
	});

	/**
	 * 
	 * Notifications
	 * 
	 */
	var initNotifications = function()
	{
		var notification_id = '',
			ajaxUrl = '';

		$('.friend-request').on('click', function(e){
			notification_id = $(this).attr('data-id');

			switch($(this).text())
			{
				case 'Accept':
					ajaxUrl = 'accept_friend';

					break;
				case 'Reject':
					ajaxUrl = 'delete_notification'

					break;
			}

			// User accepts or rejects friend request
			$.ajax({
				url:  'http://2sided.dev/2013-07_WFP-2sided/public/ajax/' + ajaxUrl,
				type: 'post',
				data: {
					notification_id: notification_id
				},
				success: function(response){
					var result = JSON.parse(response);

					console.log(response);

					if(!result.success)
					{
						console.log('Failed');
					}
					else
					{
						// Remove the notification from the users dashboard
						$('.user-notification[data-id="' + notification_id + '"]').remove();

						// Update the global navigation message icon
						$.ajax({
							url:  'http://2sided.dev/2013-07_WFP-2sided/public/ajax/user_id',
							type: 'get',
							success: function(response){
								var userID = JSON.parse(response).user_id;
								
								$.ajax({
									url:  'http://2sided.dev/2013-07_WFP-2sided/public/ajax/update_nav',
									type: 'post',
									data: {
										user_id: userID
									},
									success: function(response){
										var newCount = JSON.parse(response).notification_count;
										$('.notification-count').text(newCount);
										
										
									},
									error: function(response){
										console.log(response.responseText);
									}
								});
							},
							error: function(response){
								console.log(response.responseText);
							}
						});
					}
				},
				error: function(response){
					console.log(response.responseText);
				}
			}); 
		});

	}

	/**
	 * 
	 * User Settings
	 * 
	 */
	var initSettings = function(){

		// Change Profile Image
		// Before the user saves a new profile image,
		// they can see a preview of the new image
		$('.chan-image-btn').on('change', function(e){
            var newImage = e.currentTarget;

           if (newImage.files && newImage.files) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('.chan-image').attr('src', e.target.result);
                    
                    // $('.new-image').attr('src', e.target.result);
                }

                reader.readAsDataURL(newImage.files[0]);

                $('.fake-file p').text('Save');

                $('.fake-file p').on('click', function(e){
                	console.log('banan grams');
                });

                // $('.change-img-modal').reveal();

                // $('.new-image').Jcrop();
            }

		});
	}





	/**
	 *
	 *  Study Deck
	 * 
	 */
	
	// List View
	// Display cards in a table format
	var listViewDisplay = function(response){
		var cards     = $.parseJSON(response),
			cardTable = $('.card-table'),
			cardArea  = ''
		;

		// Remove the card view and display the list view
		$('.flashcard-view').css('display', 'none');
		$('.list').css('display', 'block');


		$.each(cards, function(key, value){
			cardArea += '<tr><td>' + value.term + '</td><td>' + value.definition + '</td></tr>';
		});

		cardTable.html(cardArea);
	}

	// Get all cards for the list view
	$('.list-view').on('click', function(e){

		var deck_id = $('.deck-title').attr('data-id');

		$.ajax({
			url:  'http://2sided.dev/2013-07_WFP-2sided/public/ajax/get_cards',
			type: 'post',
			data: {
				deck_id: deck_id
			},
			success: function(response){
				listViewDisplay(response);
			},
			error: function(response){
				console.log(response.responseText);
			}
		});
	});


	// Return to the flash card view
	$('.card-view').on('click', function(e){
		$('.list').css('display', 'none');
		$('.flashcard-view').css('display', 'block');
	});


	// Like Deck
	$('.like-btn').on('click', function(e){

		var ajaxUrl     = '',
			liked_btn   = $(this)
		;

		// If user is not logged in redirect them to login page
		if(liked_btn.attr('data-logged') == undefined)
		{
			window.location.pathname = '2013-07_WFP-2sided/public/user/login'; 
		}
		else
		{
			switch(liked_btn.text()){
				case 'Like':
					ajaxUrl = 'like_deck';

					break;

				case 'Unlike':
					ajaxUrl = 'unlike_deck';

					break;
			}

			// Either 'Like' or 'Unlike' a deck
			$.ajax({
				url:  'http://2sided.dev/2013-07_WFP-2sided/public/ajax/' + ajaxUrl,
				type: 'post',
				data: {
					deck_id: $(this).attr('data-id')
				},
				success: function(response){
					var results = JSON.parse(response).success;

					if(!results)
					{
						// Like failed
					}
					else
					{
						switch(liked_btn.text())
						{
							case 'Like':
									liked_btn.text('Unlike');
									liked_btn.addClass('liked-active');

									break;
							case 'Unlike':
									liked_btn.text('Like');
									liked_btn.removeClass('liked-active');

									break;
						}
					}
				},
				error: function(response){
					console.log(response.responseText);
				}
			});
		}
	});



	/**
	 * 
	 *  Resources
	 *
	 * 	Users have the option to flag any card when studying with either 'Practice More' or 'Mastered'
	 *
	 * 	If practice more is clicked, the card will appear more than once as the user cycles through the deck
	 * 
	 */
	
	// Checking if the user has any flagged cards
	var checkResource = function()
	{
		$.ajax({
			url:  'http://2sided.dev/2013-07_WFP-2sided/public/ajax/user_id',
			type: 'get',
			success: function(response){				
				$.ajax({
					url:  'http://2sided.dev/2013-07_WFP-2sided/public/ajax/check_resource',
					type: 'post',
					data:{
						user_id: JSON.parse(response).user_id,
						card_id: $('.current').attr('data-cardid'),
						deck_id: $('.current').attr('data-deckid')
					},
					success: function(response){
						var resource      = JSON.parse(response),
							practice_more = $('.practice-more'),
							mastered      = $('.mastered');

						if(resource == null)
						{
							$('.practice-more').removeClass('current').css('background-color', '#891616');
							$('.mastered').removeClass('current').css('background-color', '#0b6211');
							practice_more.removeAttr('data-id');
							mastered.removeAttr('data-id');
						}
						else
						{
							// If no resource remove active color
							if(practice_more.hasClass('checked'))
							{
								practice_more.removeClass('checked').removeAttr('data-id').css('background-color', '#891616');
							}
							else if(mastered.hasClass('checked'))
							{
								mastered.removeClass('checked').removeAttr('data-id').css('background-color', '#0b6211');
							}

							
							
							switch(resource.resource)
							{
								case 'practice':
									practice_more.addClass('checked').attr('data-id', resource.id).css('background-color', '#fa0000');

									break;

								case 'master':
									mastered.addClass('checked').attr('data-id', resource.id).css('background-color', '#28a831');

									break;
							}
						}
					},
					error: function(response){
						console.log(response.responseText);
					}
				});

			},
			error: function(response){
				console.log(response.responseText);
			}
		});
	}


	/**
	* 
	* Init Resources
	* 
	*/
	var initResources = function()
	{
		var resources = $('.resources'),
			user_id   = ''
		;

		$.ajax({
			url:  'http://2sided.dev/2013-07_WFP-2sided/public/ajax/user_id',
			type: 'get',
			success: function(response){
				user_id = JSON.parse(response).user_id;
			},
			error: function(response){
				console.log(response.responseText);
			}
		});


		// Practice More or Mastered click
		// Practice More' and 'Mastered' act as toggle buttons
		// If clicked, either the card will be in the database or not
			
		resources.on('click', function(e){

			// If user is logged out, redirect user to login page
			if(user_id == null)
			{
				window.location.pathname = '/2013-07_WFP-2sided/public/user/login';
			}


			// If there is a resource
			// Delete from database
			if($(e.currentTarget).attr('data-id'))
			{
				resource_id = $(e.currentTarget).attr('data-id');

				// console.log(e.currentTarget);

				$.ajax({
					url:  'http://2sided.dev/2013-07_WFP-2sided/public/ajax/delete_resource',
					type: 'post',
					data: {
						resource_id: resource_id
					},
					success: function(response){
						var result = JSON.parse(response);

						if(!result)
						{
							console.log('Failed');
						}
						else
						{
							if($(e.currentTarget).hasClass('practice-more'))
							{
								$('.practice-more').removeClass('current').removeAttr('data-id').css('background-color', '#891616');
							}
							else if($(e.currentTarget).hasClass('mastered'))
							{
								$('.mastered').removeClass('current').removeAttr('data-id').css('background-color', '#0b6211');
							}
							
						}
					},
					error: function(response){
						console.log(response.responseText);
					}
				});
			}
			else
			{
				// Add new resource to deck
				var resource  = '',
					deck_id   = $('.current').attr('data-deckid'),
					card_id   = $('.current').attr('data-cardid')
				;
				
				if($(e.currentTarget).hasClass('practice-more'))
				{
					resource = 'practice';
				}
				else if($(e.currentTarget).hasClass('mastered'))
				{
					resource = 'master';
				}

				
				$.ajax({
					url:  'http://2sided.dev/2013-07_WFP-2sided/public/ajax/save_resource',
					type: 'post',
					data: {
						user_id:  user_id,
						deck_id:  deck_id,
						card_id:  card_id,
						resource: resource
					},
					success: function(response){
						// console.log(response);

						checkResource();
						// initCards();
					},
					error: function(response){
						console.log(response.responseText);
					}
				});
			}

			return false;
		});
	}

	/**
	 *
	 * Keyboard Shortcuts
	 *
	 * Left Arrow - Previous Card
	 * Space Bar - Flip Card
	 * Right Arrow - NExt Card
	 * 
	 */
	var keyboardShortcuts = $('.keyboard-shortcuts');

	keyboardShortcuts.on('mouseover', function(e){
		$(this).tooltip({
			items: 'p[title]',
			content: '<p class="k-shortcut"><img src="../../assets/img/icons/keyboard_shortcuts.png" />Flip Card</p><p class="k-shortcut"><img src="../../assets/img/icons/keyboard_shortcuts.png" />Previous Card</p><p class="k-shortcut"><img src="../../assets/img/icons/keyboard_shortcuts.png" />Next Card</p>'
		});

	});


	/**
	 * 
	 * Display both sides of card
	 * 
	 */
	var bothSides = function()
	{
		$('.both-sides').on('change', function(e){
			if($('.definition').css('display') == 'none')
			{
				$('.keyboard-shortcuts').css('top', '160px');
				$('.definition').css('display', 'block');
			}
			else if($('.definition').css('display') == 'block')
			{
				$('.keyboard-shortcuts').css('top', '190px');
				$('.definition').css('display', 'none');
			}

		});
	};


	/**
	 * 
	 * Sort cards by either random order or alphabetical order
	 *
	 * ****** 7/25/2013 - Neither random or alphabetical order are working properly
	 * 
	 */
	var cardSort = function()
	{
		var random = $('.random'),
			az     = $('.az'),
			deck_id = $('.deck-title').attr('data-id');
		;

		// Alphabetical order
		az.on('click', function(e){
			$.ajax({
				url:  'http://2sided.dev/2013-07_WFP-2sided/public/ajax/sort_az',
				type: 'post',
				data: {
					deck_id: deck_id
				},
				success: function(response){
					console.log(response);
					var cards = $.parseJSON(response);

					console.log(cards);


					$.each(cards, function(key, value){
						console.log(value);

						// arr.push(value.term);
					});
				},
				error: function(response){
					console.log(response.responseText);
				}
			});
		});


		// Random
		random.on('click', function(e){
			$.ajax({
				url:  'http://2sided.dev/2013-07_WFP-2sided/public/ajax/sort_random',
				type: 'post',
				data: {
					deck_id: deck_id
				},
				success: function(response){
					console.log(response);
					var cards = $.parseJSON(response);

					// console.log(cards);

					// var arr = [];

					$.each(cards, function(value){
						console.log(value);

						// arr.push(value.term);
					});

					// arr.sort();
					// console.log(arr);
				},
				error: function(response){
					console.log(response.responseText);
				}
			});
		});
	}



	/**
	 * 
	 * Init Cards
	 *
	 * Card functionality
	 * 
	 */
	var initCards = function($resources){
		
		var cards   = $('.card'),
			count   = 0,
			user_id = '',
			resources = ''
		;

		// Adding new cards if there are any flagged
		var add_to_cards = function(arr){
			$.each(arr, function(key, value){
				var new_card = $('<div class="card" data-deckid="' + value.deck_id + '" data-cardid="' + value.card_id + '"><p class="term">' + value.term + '</p><p class="definition">' + value.definition + '</p><p class="keyboard-shortcuts" title="Keyboard shortcuts tooltip"><img src="../../assets/img/icons/keyboard_shortcuts.png" alt="Keyboard Shortcuts" /> Keyboard Shortcuts</p></div>');
				$('.cards').append(new_card);

				cards.push(new_card[0]);
			});
		};


		// 
		$.ajax({
			url:  'http://2sided.dev/2013-07_WFP-2sided/public/ajax/user_id',
			type: 'get',
			success: function(response){
				user_id = JSON.parse(response).user_id;

				// Get resources
				$.ajax({
					url:  'http://2sided.dev/2013-07_WFP-2sided/public/ajax/get_resources',
					type: 'post',
					data: {
						deck_id: $('.deck-title').attr('data-id'),
						user_id: user_id
					},
					success: function(response){
						resources = $.parseJSON(response);
						var new_card = [];

						if(resources == '')
						{
							$.each(cards, function(key, value){
								var card = $(this);

								if(key == 0)
								{
									card.addClass('current').css('display', 'block');
									$('.current .term').addClass('current-term');
								}

								card.attr('id', 'handle' + key);
							});
						}
						else
						{
							// Creating duplicates of the practice more cards
							var second_set = resources.slice();

							add_to_cards(resources);
							add_to_cards(second_set);

							// Shuffle all cards
							// 
							// ***** 7/25/2013 - Shuffle cards throwing error
							// 
							// cards = shuffle(cards);

							// Cycle through all cards
							$.each(cards, function(key, value){
								var card = $(this);

								// console.log(value);


								if(key === 0)
								{
									// console.log('here');

									card.addClass('current').css('display', 'block');
									$('.current .term').addClass('current-term');
								}

								card.attr('id', 'handle' + key);
							});
						}

					},
					error: function(response){
						console.log(response.responseText);
					}
				});
			},
			error: function(response){
				console.log(response.responseText);
			}
		});


		checkResource();
		bothSides();
		cardSort();


		// Flip Card Functionality
		var flipCard = function(e){
			
			var term = '';

			if(e.currentTarget)
			{
				term = $(e.currentTarget);
			}
			else
			{
				$.each($(e).children(), function(key, value){
					var v = $(value);

					if(v.hasClass('current-term') || v.hasClass('current-def'))
					{
						term = v;
					}

				});		
			}

			if(term.hasClass('term'))
			{
				/* term.animate({ 
						opacity: 0,
					    bottom: '+=80'
					    
					  }, 2000, function() {
					    // Animation complete.
					    console.log('animation finished');
				}); */

				$('.card .term').css('display', 'none');
				$('.card .term').removeClass('current-term');

				$('.card .definition').addClass('current-def');
				$('.card .definition').css('display', 'block');
			}
			if(term.hasClass('definition'))
			{
				$('.card .definition').css('display', 'none');
				$('.card .definition').removeClass('current-def');

				$('.card .term').addClass('current-term');
				$('.card .term').css('display', 'block');
			}

		}
		
		// Card click to change term
		$('.card p').on('click', function(e){
			flipCard(e);

			return false;
		}); // end of card click

		// Flip icon to change term
		$('.flip').on('click', function(e){
			flipCard($('.current'));

			return false;
		});


		// Go to the previous card in the deck
		var prevCard = function()
		{
			if(cards.hasClass('current') == true)
			{
				if($('.card.current').attr('id') == 'handle0' )
				{
					count = cards.length - 1;
				}

				$('.card.current').removeClass('current').css('display', 'none');
				$(cards[count]).addClass('current').css('display', 'block');

				count --;

				if(count === -1)
				{
					count = cards.length - 1;
				}

				checkResource();

				return false;
			}
			else
			{
				console.log('Not current');
			}
		}

		// Go to the next flash card in the deck
		var nextCard = function()
		{

			if(cards.hasClass('current') == true)
			{
				$('.card.current').removeClass('current').css('display', 'none');

				count ++; 
				$(cards[count]).addClass('current').css('display', 'block');

				if(count === cards.length -1)
				{
					count = -1;
				}
				
				checkResource();

				return false;
			}
			else
			{
				initCards();
			}
		}

		// Right Arrow Click
		$('.right-arrow').on('click', function(e){
			nextCard();

			return false;			
		});

		// Left Arrow Click
		$('.left-arrow').on('click', function(e){			
			prevCard();

			return false;
		});

		// Key Events
		var initKeys = function()
		{
			$(document).keydown(function(e){

				switch(e.keyCode){
					case 37:
						// Left Arrow
						prevCard();
						
						break;
					
					case 39:
						// Right Arrow
						nextCard();

						break;

					case 32:
						// Space Bar
						flipCard($('.current'));
						
						break;
				};

				return false;
			});
		}

		// Determining if we are on the correct page
		if(cards.length == 0)
		{
			console.log('on different page');
		}
		else
		{
			initKeys();
		}

	};







	/**
	 *
	 * Add New Term Functionality
	 * 
	 */
	var initAddTerm = function()
	{

		counter = $('.terms').children().length -1;

		$('.add-another-term').on('click', function(e){

			console.log(counter);
			
			counter = counter + 1;

			var newFields = '<div class="term"><label for="term' + counter + '">' + counter + '.</label><textarea class="opensans" placeholder="Term" name="term' + counter + '"></textarea><textarea class="opensans" placeholder="Definition" name="definition' + counter + '"></textarea></div>';

			$('.terms').append(newFields);

			return false;

		});

		$('.edit-add-another-term').on('click', function(e){

			counter = counter + 1;

			var newFields = '<div class="term"><label for="term' + counter + '">' + counter + '.</label><input type="hidden" name="' + counter + '" value="' + counter + '"/><textarea class="opensans" placeholder="Term" name="term' + counter + '"></textarea><textarea class="opensans" placeholder="Definition" name="definition' + counter + '"></textarea></div>';

			$('.terms').append(newFields);

			return false;

		});

	}





	/**
	 *
	 * Profile Page
	 * 
	 */
	 var initProfile = function()
	 {
	 	var userID   = '',
	 		friendID = $('.add-friend').attr('data-userid'),
	 		result   = ''
		;

	 	$('.add-friend').on('click', function(e){

	 		// Get IDs of the user who is trying to add a new friend
	 		$.ajax({
				url:  'http://2sided.dev/2013-07_WFP-2sided/public/ajax/user_id',
				type: 'get',
				success: function(response){
					userID = JSON.parse(response).user_id;

					// If there is no logged in user, redirect user to login
					if(userID == null)
					{
						window.location.pathname = '/2013-07_WFP-2sided/public/user/login'
					}
					else
					{
						// Add friends
				 		$.ajax({
							url:  'http://2sided.dev/2013-07_WFP-2sided/public/ajax/add_friend',
							type: 'post',
							data: {
								user_id:   userID,
								friend_id: friendID,
								message:   'friend'
							},
							success: function(response){
								var result = JSON.parse(response);

								if(result.success == true)
								{
									$('.add-friend').text('Pending');
									$('.add-friend').css('cursor', 'default');
								}
							},
							error: function(response){
								console.log(response.responseText);
							}
						});
					}
				},
				error: function(response){
					console.log(response.responseText);
				}
			});

	 	});
	 }




	/**
	*
	* Quiz
	* 
	*/

	var displayResults = function(score, skipped_questions, missed_questions, correct, deck_id)
	{
		// Save score
		$.ajax({
			url:  'http://2sided.dev/2013-07_WFP-2sided/public/ajax/save_score',
			type: 'post',
			data: {
				deck_id:  deck_id,
				score: score,
				total_correct:  correct
			},
			success: function(response){
				console.log(response);
			},
			error: function(response){
				console.log(response.responseText);
			}
		});
		

		$('.quiz-content .header h2').text('Results');
		$('.flash-card').css('display', 'none');
		$('.skip').css('display', 'none');
		$('.next').css('display', 'none');
		$('.results').css('display', 'block');


		var scoresDiv   = $('.scores'),
			scoresArea  = '',
			missedDiv   = $('.missed-questions'),
			missedArea  = '',
			skippedDiv  = $('.skipped-questions'),
			skippedArea = '',
			counter     = 1
		;

		// If all questions were skipped or missed
		if(score == '')
		{
			score = 0;
		}


		scoresArea = '<h2>Final Score: ' + score + '%</h2><h3>Correct: ' + correct + '</h3><h3>Incorrect: ' + $(missed_questions).length + '</h3><h3>Skipped: ' + $(skipped_questions).length + '</h3>';
		scoresDiv.html(scoresArea);

		if(missed_questions == '')
		{
			$('.results h4:first').css('display', 'none');
		}
		else
		{
			// Missed Questions
			$.each(missed_questions, function(key, value){
				var missed  = $(value)[0],
					choices = []
				;

				$.each(missed.choices, function(key, value){

	  				var choice = $(value).text();

	  				switch(key){
	  					case 0:
	  						key = 'a.';

	  						break;

	  					case 1:
	  						key = 'b.';

	  						break;

	  					case 2:
	  						key = 'c.';

	  						break;

	  					case 3:
	  						key = 'd.';

	  						break;
	  				}
	  				
	  				if(choice == missed.answer)
	  				{
	  					choices += '<ul><li class="correct">' + key + ' CORRECT: ' + $(value).text() + '</li></ul>';
	  				}
	  				else if(choice == missed.user_response)
	  				{
	  					choices += '<ul><li class="incorrect">' + key + ' INCORRECT: ' + $(value).text() + '</li></ul>';
	  				}
	  				else
	  				{
	  					choices += '<ul><li>' + key + ' ' + $(value).text() + '</li></ul>';		
	  				}
	  				
	  			});

	  			missedArea += '<li>' + counter + '. ' + missed.question + choices + '</li>';

	  			counter ++;

	  			missedDiv.html(missedArea)
			});
		}


		if(skipped_questions == '')
		{
			$('.results h4:last').css('display', 'none');
		}
		else
		{
			// Skipped Questions
	  		$.each(skipped_questions, function(key, value){
	  			var skipped = $(value)[0],
	  			    choices = []
	  			;

	  			$.each(skipped.choices, function(key, value){

	  				var choice = $(value).text();

	  				switch(key){
	  					case 0:
	  						key = 'a.';

	  						break;

	  					case 1:
	  						key = 'b.';

	  						break;

	  					case 2:
	  						key = 'c.';

	  						break;

	  					case 3:
	  						key = 'd.';

	  						break;
	  				}


	  				if(choice == skipped.answer)
	  				{
	  					choices += '<ul><li class="correct">' + key + ' CORRECT: ' + $(value).text() + '</li></ul>';	
	  				}else
	  				{
	  					choices += '<ul><li>' + key + ' ' + $(value).text() + '</li></ul>';
	  				}
	  			});

	  			skippedArea += '<li>' + counter + '. ' + skipped.question + choices + '</li>';

	  			counter ++;
	  		});

	  		skippedDiv.html(skippedArea);
		}

	}
	 

	/**
	 * Get Choices
	 * @param  {[type]} question [description]
	 * @param  {[type]} answer   [description]
	 * @param  {[type]} deck_id  [description]
	 * @param  {[type]} card_id  [description]
	 * @return {[type]}          [description]
	 */
	var getChoices = function(question, answer, deck_id, card_id)
	{
		$.ajax({
			url:  'http://2sided.dev/2013-07_WFP-2sided/public/ajax/get_choices/' + deck_id,
			type: 'post',
			data: {
				deck_id:  deck_id,
				question: question,
				card_id:  card_id
			},
			success: function(response){
				var choices     = $($.parseJSON(response).choices),
					answersForm = $('.quiz-content .flash-card form'),
					answersArea = ''

				;

				var current_card = {
							id: card_id, 
							definition: answer
				};

				choices.push(current_card);
				choices = shuffle(choices);

				$.each(choices, function(key, value){
					answersArea += '<div><input type="radio" name="' + value.id + 'choice" class="multiple-choice"/><label for="1">' + value.definition + '</label></div>';
				});

				answersForm.html(answersArea); 

			},
			error: function(response){
				console.log(response.responseText);
			}
		});
	}


	/**
	 * Init Questions
	 * @return {[type]} [description]
	 */
	var initQuestions = function()
	{
		var first_question 	   = $('.question').first().text(),
			first_answer       = $('.answer').first().text(),
			deck_id            = $('.deck-title').attr('data-id'),
			card_id            = $('.card').attr('data-id'),
			cards              = $('.card'),
			count              = 0,
			correct            = 0,
			skipped_questions  = [],
			missed_questions   = [],
			question_count     = $('.question-count'),
			score			   = '',
			score_display      = $('.score')
		;

		// Set the question number
		question_count.text(count + 1);


		// If you are at the quiz, get choices
		if(window.location.pathname == '/2013-07_WFP-2sided/public/quiz/questions/' + deck_id)
		{
			getChoices(first_question, first_answer, deck_id, card_id);
		}

		// Next Question
		$('.quiz-content .next').on('click', function(e){			
			if($('.multiple-choice').is(':checked'))
			{
				if(cards.hasClass('current') == true)
				{
					// Saving the users choice
					var user_response = $('.multiple-choice:radio:checked + label').text();

					if(count == 0)
					{
						if(user_response == first_answer)
						{
							// Correct answer, hooray!!
							correct ++;
						}
						else
						{
							// Sorry, wrong answer
							var missed_question = {
								question: $('.current .question').text(),
								answer: first_answer,
								user_response: user_response,
								choices: $('.current label')
							};

							missed_questions.push(missed_question);
						}
					}
					else
					{
						if(user_response == $('.current .answer').text())
						{
							// Correct answer, hooray!!
							correct ++;
						}
						else
						{
							// Sorry, wrong answer
							var missed_question = {
								question: $('.current .question').text(),
								answer: $('.current .answer').text(),
								user_response: user_response,
								choices: $('.current label')
							};

							missed_questions.push(missed_question);
						}
					}

					console.log(correct);

					// How many correct as the quiz progresses 
					$('.correct-score').text('Correct: ' + correct);


					// Remove the current card
					$('.card.current').removeClass('current').css('display', 'none');

					// Increment to the next card
					count ++; 

					// Display the new card
					$(cards[count]).addClass('current').css('display', 'block');

					score = 100/cards.length * correct;
					score = score.toFixed(2);
					score_display.text(score);

					// Get 3 new random answers to choose from
					var question = $('.current .question').text(),
						answer   = $('.current .answer').text(),
						card_id  = $('.current').attr('data-id')
					;

					if(count === cards.length)
					{
						// End of quiz
						displayResults(score, skipped_questions, missed_questions, correct, deck_id);
					}
					else
					{
						question_count.text(count + 1);
						getChoices(question, answer, deck_id, card_id);
					}
					
					return false;
				}
				else
				{
					console.log('Not current');
				}
			}
			else
			{
				console.log('Throw error message to remind user to either fill in answer or "Skip Question"');
			}

			return false;
		});


		// Skip Question
		$('.skip').on('click', function(e){
			var skipped_question = {
					question: $('.current .question').text(),
					answer: $('.current .answer').text(),
					choices: $('.current label')

			};

			skipped_questions.push(skipped_question);

			// Set skipped count
			$('.skipped').text('Skipped: ' + skipped_questions.length);

			// Remove the current card
			$('.card.current').removeClass('current').css('display', 'none');

			// Increment to the next card
			count ++; 

			// Display the new card
			$(cards[count]).addClass('current').css('display', 'block');

			// Get 3 new random answers to choose from
			var question = $('.current .question').text(),
				answer   = $('.current .answer').text(),
				card_id  = $('.current').attr('data-id')
			;


			if(count === cards.length)
			{
				displayResults(score, skipped_questions, missed_questions, correct, deck_id);
			}
			else
			{
				question_count.text(count + 1);
				getChoices(question, answer, deck_id, card_id);
			}
			
			return false;

		});

	}







	initAddTerm();
	initCards();
	initSettings();
	initFilters();
	initValidation();
	initDropdown();
	initProfile();
	initNotifications();
	initQuestions();
	initResources();

	
	
	
	
	
})(jQuery); // end private scope





