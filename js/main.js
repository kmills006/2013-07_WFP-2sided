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
	
	if(window.location.pathname == "/wfp_2sided/user_dashboard.html"){
		/* On the user dashboard, tabs are used on the left side to control
		what information is being displayed */
		$( "#tabs" ).tabs();

		// Setting the global navigation tab icons
		$(".ud-tabs li a").each(function(i){
			var udTabItem = $(this);
			
			switch(udTabItem.text()){
				case "Study":
					udTabItem.css("background-image", "url(img/icons/active_user_globe.png)");
					udTabItem.css("background-size", "36px 45px");
					break;
					
				case "Notifications":
					udTabItem.css("background-image", "url(img/icons/notifications.png)");
					udTabItem.css("background-size", "35px 25px");
					break;
					
				case "Achievements":
					udTabItem.css("background-image", "url(img/icons/achievement.png)");
					udTabItem.css("background-size", "35px 44px");
					break;
					
				case "Settings":
					udTabItem.css("background-image", "url(img/icons/settings.png)");
					udTabItem.css("background-size", "50px 35px");
					break;
					
			} // End of switch
		});
	
		
		// User dashboard tab click
		$(".ud-tabs li").on("click", function(e){
			// Removing the active class
			var prevActiveTab = $(".ud-tab-active a");
			switch(prevActiveTab.text()){
				case "Study":
					prevActiveTab.css("background-image", "url(img/icons/user_globe.png)");
					prevActiveTab.css("background-size", "36px 45px");
					break;
					
				case "Notifications":
					prevActiveTab.css("background-image", "url(img/icons/notifications.png)");
					prevActiveTab.css("background-size", "35px 25px");
					break;
					
				case "Achievements":
					prevActiveTab.css("background-image", "url(img/icons/achievement.png)");
					prevActiveTab.css("background-size", "35px 44px");
					break;
					
				case "Settings":
					prevActiveTab.css("background-image", "url(img/icons/settings.png)");
					prevActiveTab.css("background-size", "50px 35px");
					break;
					
			} // End of switch
			
			$(".ud-tab-active").removeClass("ud-tab-active");
	
	
		
			// Adding the active class to the clicked tab
			$(this).attr("class", "ud-tab-active")
			
			var newActiveTab = $(".ud-tab-active a");
			// Setting the new active icon
			switch(newActiveTab.text()){
				case "Study":
					newActiveTab.css("background-image", "url(img/icons/active_user_globe.png)");
					newActiveTab.css("background-size", "36px 45px");
				
					break;
				case "Notifications":
					newActiveTab.css("background-image", "url(img/icons/active_notifications.png)");
					newActiveTab.css("background-size", "35px 25px");
					
					break;
				case "Achievements":
					newActiveTab.css("background-image", "url(img/icons/active_achievement.png)");
					newActiveTab.css("background-size", "35px 44px");
					
					break;
					
				case "Settings":
					newActiveTab.css("background-image", "url(img/icons/active_settings.png)");
					newActiveTab.css("background-size", "50px 35px");
					
					break;
			};
	
	
	
			
		}); // End of user dashboard tab
	} 
	
	
	
	
	
	
})(jQuery); // end private scope





