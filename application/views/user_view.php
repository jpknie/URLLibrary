	<div id="content">
		<?=anchor($base_url, 'Home');?>
		<h1>User page</h1>
		<h2>Account information</h2>
		<p>Username: <?=$userdata['username']?></p>
		<p>Real name: <?=$userdata['realname']?></p>
		<p>Email address: <?=$userdata['email']?></p>
		<hr>
		<h1>Your Shared links</h1>
		<!-- loop through all the users in db and loop their links and show theme here -->
		<?=anchor($base_url . 'url/createlink', 'Share new link..');?>
	</div>
