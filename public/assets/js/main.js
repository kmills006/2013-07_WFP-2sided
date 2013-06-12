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
	
	// $(".user-dd").on("mouseover", function(e){
	// 	var userDDMenu = $(".dd-menu");
	// 	userDDMenu.css("display", "block");
	// });
	
	// $(".user-dd").on("mouseout", function(e){
	// 	var userDDMenu = $(".dd-menu");
	// 	userDDMenu.css("display", "none");
	// });
	
	if(window.location.pathname == "/2sided/public/study"){
		$('.card').click(function(){
			$(this).rotate3Di('toggle', 1000);
		});
	};
		
		
		
	/* User Dashboard 
	------------------
	------------------
	----------------*/
	
	if(window.location.pathname == "/2sided/public/dashboard"){
		/* On the user dashboard, tabs are used on the left side to control
		what information is being displayed */
/* 		$( "#tabs" ).tabs(); */

		// Setting the global navigation tab icons
		$(".ud-tabs li").each(function(i){
			var udTabItem = $(this);
			
			console.log(udTabItem);
			
			switch(udTabItem.text()){
				case "Study":
					udTabItem.css("background-image", "url(assets/img/icons/active_user_globe.png)");
					udTabItem.css("background-size", "36px 45px");
					break;
					
				case "Notifications":
					udTabItem.css("background-image", "url(assets/img/icons/notifications.png)");
					udTabItem.css("background-size", "35px 25px");
					break;
					
				case "Achievements":
					udTabItem.css("background-image", "url(assets/img/icons/achievement.png)");
					udTabItem.css("background-size", "35px 44px");
					break;
					
				case "Settings":
					udTabItem.css("background-image", "url(assets/img/icons/settings.png)");
					udTabItem.css("background-size", "50px 35px");
					break;
					
			} // End of switch
		});
		
		
		// Storing the study tab content
		var studyContent = $(".ud-tab-content").html();
	
		
		// User dashboard tab click
		$(".ud-tabs li").on("click", function(e){
		
			var clickedTab = $(this);
			
			switch(clickedTab.text()){
				case "Study":
						$(".ud-tab-content").html(studyContent);
					break;
					
				case "Notifications":

					$('.ud-tab-content').html('<h2>kmills006 New Notifications</h2><section class="user-notification"><img src="assets/img/profile_placeholders/sara_englishbee.jpg" alt="User profile thumbnail" width="50" height="50" /><p>May 10th, 2013</p><p><a href="#">bumblebizzle86</a> wants to be friends</p><button>Reject</button><button>Accept</button></section>');	
						
					break;
					
				case "Achievements":
					
					$('.ud-tab-content').html('<h2>Achievements</h2><h3>Study Points</h3><p>Total Points: <span>123</span></p><p>203 StudyPoints needed to reach level 3</p><div class="level-progress"><span><span></span></span><span><span></span></span><span><span></span></span><span><span></span></span></div><div class="badges"><h3>Badges Received</h3><div class="badge"><img src="assets/img/badges/badge.png" width="70" height="59" alt="Achievement Badge" /><p>Connected to Facebook</p></div></div>');
					
					break;
					
				
				case "Settings":
				
					$('.ud-tab-content').html('<h2>User Settings</h2><form><img src="assets/img/profile_placeholders/100x100_kmills006_placeholder.png" alt="Profile Image" width="100" height="100" /><input class="update-picture" type="file" name="upload-profile-image"/><div class="fake-file"><p>Change Image</p></div><div class="clearfix"></div><label for="name">Name</label><input type="text" name="name" value="Kristy" /><label for="email">Email Address</label><input type="text" name="email" value="miller.kristy06@gmail.com" /><label for="username">Username</label><input type="text" name="username" value="kmills006" /><p class="change-password"> Change Password </p><label for="o-password">Old Password</label><input type="text" name="o-password" /><label for="password">New Password</label><input type="password" name="Password" /><label for="c-password">New Confirm Password</label><input type="password" name="c-password" /><button>Save</button><p><a href="#">Cancel</a></p></form>');	
					break;
					
				default:
				
					break;
			};
			
			// Removing the active class
			var prevActiveTab = $(".ud-tab-active a");
			
			console.log(prevActiveTab);
			
			switch(prevActiveTab.text()){
				case "Study":
					prevActiveTab.css("background-image", "url(assets/img/icons/user_globe.png)");
					prevActiveTab.css("background-size", "36px 45px");
					break;
					
				case "Notifications":
					prevActiveTab.css("background-image", "url(assets/img/icons/notifications.png)");
					prevActiveTab.css("background-size", "35px 25px");
					break;
					
				case "Achievements":
					prevActiveTab.css("background-image", "url(assets/img/icons/achievement.png)");
					prevActiveTab.css("background-size", "35px 44px");
					break;
					
				case "Settings":
					prevActiveTab.css("background-image", "url(assets/img/icons/settings.png)");
					prevActiveTab.css("background-size", "50px 35px");
					break;
					
			} // End of switch
			
			$(".ud-tab-active").removeClass("ud-tab-active");
	
	
		
			// Adding the active class to the clicked tab
			$(this).attr("class", "ud-tab-active");
			
			var newActiveTab = $(".ud-tab-active a");
			// Setting the new active icon
			switch(newActiveTab.text()){
				case "Study":
					newActiveTab.css("background-image", "url(assets/img/icons/active_user_globe.png)");
					newActiveTab.css("background-size", "36px 45px");
				
					break;
				case "Notifications":
					newActiveTab.css("background-image", "url(assets/img/icons/active_notifications.png)");
					newActiveTab.css("background-size", "35px 25px");
					
					break;
				case "Achievements":
					newActiveTab.css("background-image", "url(assets/img/icons/active_achievement.png)");
					newActiveTab.css("background-size", "35px 44px");
					
					break;
					
				case "Settings":
					newActiveTab.css("background-image", "url(assets/img/icons/active_settings.png)");
					newActiveTab.css("background-size", "50px 35px");
					
					break;
			};
	
	
	
			
		}); // End of user dashboard tab
	} // End of user dashboard window.location
	
	
	
	
	
	
})(jQuery); // end private scope





