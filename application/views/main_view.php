	<div id="content">
		<h1>Welcome to URL Library!</h1>
		<?php
			if(!$loginfo) {
				echo "<p>" . anchor($base_url . 'user/login', 'Login') . " or " 
				 . anchor($base_url . 'user/register', 'Register') . " as a new user. </p>";
			}
			else { 
				echo "You are logged in. " . anchor($base_url . 'user/logout', 'Logout');
			}
		?>
		<hr>
		<!-- loop through all the users in db and loop their links and show theme here -->
		<?php
			foreach($links as $user => $u) {
				echo("<h2>Shared by $user</h2>");
				echo('</br');
				foreach($u as $url) {
					echo('</br>');
					echo anchor($base_url . 'shorturl/decode_url/' . $url->shorturl_code, $url->description);
				}
			}
		?>
	
	</div>
