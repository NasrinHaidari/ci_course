<div class="col-md-6">
	<h1 style="margin-bottom:50px; text-align:center; border-bottom:1px solid #ddd">Login User</h1>
<?php
$attribute= array(
	'method'=>'post',
	'enctype'=>'multipart/form-data',
	'class'=>'user_registration_form'
);
// the first parameter give link, and the secound parameter give attribute 
	echo form_open('welcome/check_login', $attribute);
	?>
	
	<div class="form-group">
		<label class="control-label" for="inputSuccess">UserName</label>
		<input type="text" class="form-control" name="username">
	</div>
	<div class="form-group">
		<label class="control-label" for="inputSuccess">Password </label>
		<input type="password" name="password" class="form-control">
	</div>
	<div class="form-group">
		<input type="submit" value="Login" class="form-control">
	</div>
	
	
	<?php 
		echo form_close();
	?>
	
	<h3>
		<?php
			echo $this->session->flashdata('msg');
		?>
	</h3>
	
</div>