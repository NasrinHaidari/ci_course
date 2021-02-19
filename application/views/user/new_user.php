<div>
	<h1 style="margin-bottom:50px; text-align:center; border-bottom:1px solid #ddd">Register New User</h1>
	<div>
		<?php
			echo $this->session->userdata('validation');
		?>
	</div>
	
<?php
$attribute= array(
	'method'=>'post',
	'enctype'=>'multipart/form-data',
	'class'=>'user_registration_form'
);
// the first parameter give link, and the secound parameter give attribute 
	echo form_open('user/create_user', $attribute);
	?>
		<div class="row">
			<div class="col-md-6 form-group">
			<?php
				$attribute= array(
					'class'=>'form-control',
					'name'=>'name',
					'placeholder'=>'Enter your user name'
				);
				echo form_label('Name');
				echo form_input($attribute);
			
			?>
			</div>
			
			<div class="col-md-6 form-group">
			<?php
				$attribute= array(
					'class'=>'form-control',
					'name'=>'last_name',
					'placeholder'=>'Enter your last name'
				);
				echo form_label('Last Name');
				echo form_input($attribute);
			
			?>
			</div>
			
			<div class="col-md-6 form-group">
				<label>Photo</label>
				<input type="file" class="form-control" name="user_photo" />
			</div>
			
			<div class="col-md-6 form-group">
			<?php
				$attribute= array(
					'class'=>'form-control',
					'name'=>'email',
					'placeholder'=>'Enter your Email'
				);
				echo form_label('Email');
				echo form_input($attribute);
			
			?>
			</div>
			<div class="col-md-6 form-group">
			<?php
				$attribute= array(
					'class'=>'form-control',
					'name'=>'phone',
					'placeholder'=>'Enter your phone'
				);
				echo form_label('phone');
				echo form_input($attribute);
			
			?>
			</div>
			
			<div class="col-md-6 form-group">
			<?php
				$attribute= array(
					'class'=>'form-control',
					'name'=>'user_name',
					'placeholder'=>'Enter your username'
				);
				echo form_label('User Name');
				echo form_input($attribute);
			
			?>
			</div>
			
			<div class="col-md-6 form-group">
			<?php
				$attribute= array(
					'class'=>'form-control',
					'name'=>'password',
					'placeholder'=>'Enter your password'
				);
				echo form_label('password');
				echo form_password($attribute);
			
			?>
			</div>
			
			<div class="col-md-12 form-group">
				<?php
					$attribute= array(
						'class'=>'form-control btn btn-primary',
						'value'=>'submit'
					);
					echo form_submit($attribute);
				
				?>
			</div>
				
				
				
			
		</div>
	<?php
	echo form_close();
?>
</div>