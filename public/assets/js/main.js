/*  
	Your Project Title
	Author: You
*/

(function($){


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
						url:  'http://localhost:9999/2013-07_WFP-2sided/public/ajax/user_id',
						type: 'get',
						success: function(response){
							var userID = JSON.parse(response);
							window.location.pathname = '/2013-07_WFP-2sided/public/profile/view/' + userID.user_id;
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

	var initFilters = function()
	{
		$('.filters').each(function(i){

			$(this).on('click', function(e){

				switch($(this).text())
				{
					case 'Newest':
						$.ajax({
							url:  'http://localhost:9999/2013-07_WFP-2sided/public/ajax/newest',
							type: 'post',
							data: {newest: 'newest'},
							success: function(response){
								setDecks(response);
							},
							error: function(response){
								console.log(response.responseText);
							}
						});

						break;

					case 'Oldest':
						$.ajax({
							url:  'http://localhost:9999/2013-07_WFP-2sided/public/ajax/oldest',
							type: 'post',
							data: {oldest: 'oldest'},
							success: function(response){
								setDecks(response);
							},
							error: function(response){
								console.log(response.responseText);
							}
						});

						break;

					case 'Highest Rating':
						console.log('Highest Rating');

						break;

					default:

						break;
				}

				return false;
			});

		});
	}


	/**
	 * 
	 * User Settings
	 *
	 */
	var initSettings = function()
	{
		$('.settings-name').on('keyup', function(e){

			/* $.ajax({
				url:  'index.php/user/check_username',
				type: 'post',
				data: { 
						new_name: $(this).val() 
				},
				success: function(response){
					console.log(response);
				},
				error: function(response){
					console.log(response.responseText);
				}
			}); */

		});



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
	 * Card Functionality
	 *
	 * 
	 */
	

	var initCards = function(){

		$('.card').first().addClass('active-card').css('display', 'block');

		var activeCard = $('.active-card'); 
		
		// Card click to change term
		$('.card p').on('click', function(e){

			
			console.log(e.currentTarget);


			// if($(e.currentTarget).hasClass('term'))
			// {
			// 	$('.card .term').css('display', 'none');
			// 	$('.card .definition').css('display', 'block');
			// }
			// if($(e.currentTarget).hasClass('definition'))
			// {
			// 	$('.card .definition').css('display', 'none');
			// 	$('.card .term').css('display', 'block');
			// };

			return false;

		}); // end of card click


		// Right Arrow Click
		$('.right-arrow').on('click', function(e){
			
			console.log($('.active-card').next()	);

			if($('active-card').next())
			{
				$('.active-card').removeClass('active-card').css('display', 'none').next().addClass('active-card').css('display', 'block');
			}
			// $('.active-card').removeClass('active-card').css('display', 'none');
			

			return false;
		});

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
	 		friendID = $('.add-friend').attr('data-userid')
		;

	 	$('.add-friend').on('click', function(e){

	 		// Get IDs of the user who is trying to add a new friend
	 		$.ajax({
				url:  'http://localhost:9999/2013-07_WFP-2sided/public/ajax/user_id',
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
							url:  'http://localhost:9999/2013-07_WFP-2sided/public/ajax/add_friend',
							type: 'post',
							data: {
								user_id:   userID,
								friend_id: friendID,
								message:   'friend'
							},
							success: function(response){
								console.log(response);
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

	initAddTerm();
	initCards();
	initSettings();
	initFilters();
	initValidation();
	initDropdown();
	initProfile();

	
	
	
	
	
})(jQuery); // end private scope





