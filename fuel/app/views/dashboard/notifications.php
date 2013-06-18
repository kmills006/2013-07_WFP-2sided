    		<div class="content user-dashboard">
    			<h1>Dashboard</h1>

				<div class="ud-tabs">
					<?	
						echo Html::anchor('dashboard', 'Study', array('class' => 'study'));
						echo Html::anchor('dashboard/notifications', 'Notifications', array('class' => 'ud-tab-active notifications'));
						echo Html::anchor('dashboard/achievements', 'Achievements', array('class' => 'achievements'));
						echo Html::anchor('dashboard/settings', 'Settings', array('class' => 'settings'));
					?>
				</div>
				  
				  <div id="notifications" class="ud-tab-content">
				  	<h2>kmills006 New Notifications</h2>
				  	
				  		<section class="user-notification">
				  			<img src="img/profile_placeholders/sara_englishbee.jpg" alt="User profile thumbnail" width="50" width="50"/>
				  			<p>May 10th, 2013</p>
				  			<p><a href="#">bumblebizzle86</a> wants to be friends</p>
				  			
				  			<button>Reject</button>
				  			<button>Accept</button>
				  		</section>
				  		
				  		<section class="user-notification">
				  			<img src="img/profile_placeholders/catie_miller.jpg" alt="User profile thumbnail" width="50" width="50"/>
				  			<p>May 10th, 2013</p>
				  			<p><a href="#">catiem16</a> wants to be friends</p>
				  			
				  			<button>Reject</button>
				  			<button>Accept</button>
				  		</section>
				  		
				  		<section class="user-notification">
				  			<img src="img/profile_placeholders/brittany_conrad.jpg" alt="User profile thumbnail" width="50" width="50"/>
				  			<p>May 08th, 2013</p>
				  			<p><a href="#">brittanysuzanne</a> wants to be friends</p>
				  			
				  			<button>Reject</button>
				  			<button>Accept</button>
				  		</section>
				  		
				  		<section class="user-notification">
				  			<img src="img/profile_placeholders/george_olsen.jpg" alt="User profile thumbnail" width="50" width="50"/>
				  			<p>May 05th, 2013</p>
				  			<p><a href="#">georgeolsen</a> wants to be friends</p>
				  			
				  			<button>Reject</button>
				  			<button>Accept</button>
				  		</section>
				  		
				  		<section class="user-notification">
				  			<img src="img/profile_placeholders/lauren_borkovich.jpg" alt="User profile thumbnail" width="50" width="50"/>
				  			<p>May 01th, 2013</p>
				  			<p><a href="#">lalashly</a> wants to be friends</p>
				  			
				  			<button>Reject</button>
				  			<button>Accept</button>
				  		</section>
				  		
				  		<section class="user-notification">
				  			<img src="img/profile_placeholders/tara_manus.jpg" alt="User profile thumbnail" width="50" width="50"/>
				  			<p>Apr 30th, 2013</p>
				  			<p><a href="#">tarman</a> wants to be friends</p>
				  			
				  			<button>Reject</button>
				  			<button>Accept</button>
				  		</section>
				  		
				  		<section class="user-notification">
				  			<img src="img/profile_placeholders/tara_manus.jpg" alt="User profile thumbnail" width="50" width="50"/>
				  			<p>Apr 30th, 2013</p>
				  			<p><a href="#">tarman</a> challenges you to <a href="#">Huck Fin</a></p>
				  			
				  			<button>Reject</button>
				  			<button>Accept</button>
				  		</section>
				  </div>			  
				
    		</div> <!-- end of content -->