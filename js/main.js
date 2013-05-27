/*  
	Your Project Title
	Author: You
*/

(function($){


	/* In the global navigation, when a user hovers over their profile image and username
	it will display a dropdown menu with links to their profile, dashboard, settings and
	logout */
	
	$(".user-dd").on("mouseover", function(e){
		var userDDMenu = $(".user-dd ul");
		userDDMenu.css("display", "block");
	});
	
	$(".user-dd").on("mouseout", function(e){
		var userDDMenu = $(".user-dd ul");
		userDDMenu.css("display", "none");
	});
		
	
})(jQuery); // end private scope





