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

	// $(".user-dd").on("mouseover", function(e){
	// 	var userDDMenu = $(".dd-menu");
	// 	userDDMenu.css("display", "block");
	// });
	
	// $(".user-dd").on("mouseout", function(e){
	// 	var userDDMenu = $(".dd-menu");
	// 	userDDMenu.css("display", "none");
	// });
		
		
		


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



		// Change Image
		$('.chan-image-btn').on('change', function(e){

			console.log('File changed');
            var newImage = e.currentTarget;

            if (newImage.files && newImage.files) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('.chan-image').attr('src', e.target.result);
                }

                reader.readAsDataURL(newImage.files[0]);
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

			var newFields = '<div class="term"><label for="term' + counter + '">' + counter + '.</label><input type="hidden" name="' + counter + '" value="' + counter + '"/><input type="text" placeholder="Term" name="term' + counter + '"/><textarea class="opensans" placeholder="Definition" name="definition' + counter + '"></textarea></div>';

			$('.terms').append(newFields);

			return false;

		});

	}


	initAddTerm();
	initCards();
	initSettings();

	
	
	
	
	
})(jQuery); // end private scope





