/*  
	Your Project Title
	Author: You
*/

(function($){


	/* Global Navigation
	--------------------
	--------------------
	------------------*/
	
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
		
		
		
	/* User Dashboard 
	------------------
	------------------
	----------------*/
	
	/* On the user dashboard, tabs are used on the left side to control
	what information is being displayed */
	$( "#tabs" ).tabs();
	
	/* Changing the active state on the user dashboard tag navigation */
	$(".ud-tabs li").on("click", function(e){
		
		// Removing the active icon
		var activeTabIcon = $(".ud-tab-active img");
		switch(activeTabIcon.attr("src")){
			case "img/icons/active_user_globe.png":
				activeTabIcon.attr("src", "img/icons/user_globe.png");
				
				break;
			case "img/icons/active_notifications.png":
				activeTabIcon.attr("src", "img/icons/notifications.png");

				break;
			case "img/icons/active_achievement.png":
				activeTabIcon.attr("src", "img/icons/achievement.png");
				break;
				
			case "img/icons/active_settings.png":
				activeTabIcon.attr("src", "img/icons/settings.png");
				break;
		}
		
		// Removing the active class
		$(".ud-tab-active").removeClass("ud-tab-active");



		// Adding the active class to the clicked tab
		$(this).attr("class", "ud-tab-active");
		
		// Setting the new active icon
		var newActiveIcon = $(".ud-tab-active img");
		switch(newActiveIcon.attr("src")){
			case "img/icons/user_globe.png":
				newActiveIcon.attr("src", "img/icons/active_user_globe.png");
				
				break;
			case "img/icons/notifications.png":
				newActiveIcon.attr("src", "img/icons/active_notifications.png");
				
				break;
			case "img/icons/achievement.png":
				newActiveIcon.attr("src", "img/icons/active_achievement.png");
				
				break;
				
			case "img/icons/settings.png":
				newActiveIcon.attr("src", "img/icons/active_settings.png");
				
				break;
		}



		
	}); // End of user dashboard tab click
	
	
	
	
	
	
})(jQuery); // end private scope





