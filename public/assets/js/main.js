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


	/**
	 *
	 * Create dropdown menu for
	 * logged in users
	 * 
	 */
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
	var initDashboard = function()
	{
		$('.filters').each(function(i){

			$(this).on('click', function(e){

				switch($(this).text())
				{
					case 'Newest':
						console.log('Newest');

						$.ajax({
							url:  'http://localhost:9999/2013-07_WFP-2sided/public/ajax/sort_newest',
							type: 'get',
							success: function(response){
								console.log(response);
							},
							error: function(response){
								console.log(response.responseText);
							}
						});

						break;

					case 'Oldest':
						console.log('Oldest');

						break;

					case 'Highest Rating':
						console.log('Highest Rating');

						break;

					default:

						break;
				}

				return false;
				e.preventDefault();

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

			if($(e.currentTarget).hasClass('term'))
			{
				$('.card .term').css('display', 'none');
				$('.card .definition').css('display', 'block');
			}
			if($(e.currentTarget).hasClass('definition'))
			{
				$('.card .definition').css('display', 'none');
				$('.card .term').css('display', 'block');
			};

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


	initAddTerm();
	initCards();
	initSettings();
	initDashboard();
	initValidation();
	initDropdown();

	
	
	
	
	
})(jQuery); // end private scope





