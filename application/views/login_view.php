	<div id="content">
	<h1>Login</h1>
		<?php
		echo form_open($base_url . 'user/login');
		$username = array(
			'name' => 'username',
			'id' => 'username',
			'value' => set_value('username')
			);
		$password = array(
			'name' => 'password',
			'id' => 'password',
			'value' => ''
			);
		?>
	<ul>
		<li>
			<label>User Name: </label>
			<?php echo form_input($username); ?>
		</li>
		<li>
			<label>Password: </label>
			<?php echo form_password($password); ?>
		</li>
	</ul>
	<?php
		echo form_submit(array('name' => 'login'), 'Login');
	?>
	<div class='validation_errors'>
		<?php echo validation_errors(); ?>
	</div>
	<?php
		echo form_close();
	?>

	</div>
