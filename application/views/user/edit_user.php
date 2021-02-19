<div>
	<h1 style="margin-bottom:50px; text-align:center; border-bottom:1px solid #ddd">Edit User</h1>
<?php
$attribute= array(
	'method'=>'post',
	'enctype'=>'multipart/form-data',
	'class'=>'user_registration_form'
);
// the first parameter give link, and the secound parameter give attribute 
	echo form_open('user/update_user', $attribute);
	?>
	
	<input type="hidden" name="user_id" value="<?php echo $single_user->id ?>"/>
	
		<div class="row">
			<div class="col-md-6 form-group">
			<?php
				$attribute= array(
					'class'=>'form-control',
					'name'=>'name',
					'value'=>$single_user->name,
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
					'value'=>$single_user->lastname,
				);
				echo form_label('Last Name');
				echo form_input($attribute);
			
			?>
			</div>
			
			<div class="col-md-6 form-group">
			<?php
				$attribute= array(
					'class'=>'form-control',
					'name'=>'email',
					'value'=>$single_user->email,
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
					'value'=>$single_user->phone,
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
					'value'=>$single_user->user_name,
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
					'placeholder'=>'If you want to change password, Enter your new password',
					// 'value'=>$single_user->password,
				);
				echo form_label('password');
				echo form_password($attribute);
			
			?>
			</div>
			
			<div class="col-md-6 form-group">
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