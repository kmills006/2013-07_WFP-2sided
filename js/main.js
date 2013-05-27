/*  
	Your Project Title
	Author: You
*/

(function($){


	/* In the global navigation, when a user hovers over their profile image and username
	it will display a dropdown menu with links to their profile, dashboard, settings and
	logout */
	
	$(".user-dd").hover(function(e){
		var userDDMenu = $(".user-dd-menu");
		userDDMenu.css("display", "block");
	});
		
	
})(jQuery); // end private scope





