	<div id="content">
		<h1>Edit your link</h1>
	<?php
		echo form_open($base_url . 'url/editLink');
		$urlref = array(
			'name' => 'url',
			'id' => 'url',
			'value' => set_value('url')
			);
		$description = array(
			'name' => 'description',
			'id' => 'description',
			'value' => ''
			);
		?>
	<ul>
		<li>
			<label>URL: </label>
			<?php echo form_input($urlref); ?>
		</li>
		<li>
			<label>Description: </label>
			<?php echo form_textarea($description); ?>
		</li>
	</ul>
	<?php
		echo form_submit(array('name' => 'createurl'), 'Create');
	?>
	<div class='validation_errors'>
		<?php echo validation_errors(); ?>
	</div>
	<?php
		echo form_close();
	?>
	</div>
