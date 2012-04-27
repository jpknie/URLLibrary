<h1>User Registration</h1>
<?php
	echo form_open($base_url . 'user/register');
	$username = array(
			'name' => 'username',
			'id' => 'username',
			'value' => ''
			);
	$realname = array(
			'name' => 'realname',
			'id' => 'realname',
			'value' => ''
	);
	$email = array(
			'name' => 'email',
			'id' => 'email',
			'value' => ''
	);
	$password = array(
			'name' => 'password',
			'id' => 'password',
			'value' => ''
	);
	$confirm_pass = array( 
			'name' => 'confirm_pass',
			'id' => 'confirm_pass',
			'value' => ''
	);
?>
<ul>
	<li>
		<label>User Name: </label>
		<div><?php echo form_input($username); ?></div>
	</li>
	<li>
		<label>Real Name: </label>
		<div><?php echo form_input($realname); ?></div>
	<li>
	<li>
		<label>Email Address: </label>
		<div><?php echo form_input($email);?> </div>
	</li>
	<li>
		<label>Password: </label>
		<div><?php echo form_password($password);?> </div>
	</li>
	<li>
		<label>Confirm Password: </label>
		<div><?php echo form_password($confirm_pass); ?></div>
	

	</li>
	
</ul>

<div>
	<?php
		echo form_submit(array('name' => 'register'), 'Register');
	?>
</div>
<div class='validation_errors'>
	<?php echo validation_errors(); ?>
</div>


	
	
<?php
	echo form_close();
?>