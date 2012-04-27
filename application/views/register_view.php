	<div id="content">
<h1>User Registration</h1>
<?php
	echo form_open($base_url . 'user/register');
	$username = array(
			'name' => 'username',
			'id' => 'username',
			'value' => set_value('username')
			);
	$realname = array(
			'name' => 'realname',
			'id' => 'realname',
			'value' => set_value('realname')
	);
	$email = array(
			'name' => 'email',
			'id' => 'email',
			'value' => set_value('email')
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
		<?php echo form_input($username); ?>
	</li>
	<li>
		<label>Real Name: </label>
		<?php echo form_input($realname); ?>
	</li>
	<li>
		<label>Email Address: </label>
		<?php echo form_input($email);?>
	</li>
	<li>
		<label>Password: </label>
		<?php echo form_password($password);?>
		</li>
	<li>
		<label>Confirm Password: </label>
		<?php echo form_password($confirm_pass); ?>
	</li>
	
</ul>

<?php
	echo form_submit(array('name' => 'register'), 'Register');
?>
<div class='validation_errors'>
	<?php echo validation_errors(); ?>
</div>


	
	
<?php
	echo form_close();
?>
</div>
