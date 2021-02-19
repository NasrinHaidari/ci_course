
<?php echo form_open('role/create_role'); ?>
	<div class="col-md-12 form-group">
		<label for="role_name">Role Name</label>
		<input type="text" name="role_name" class="form-control" id="role_name" />
	</div>
	
	<div class="row">
		<div class="col-md-3">
		  <p>
			<label for="user_list">View User List</label>
			<input type="checkbox" name="user_list" id="user_list" />
		  </p>
		</div>
		
		<div class="col-md-3">
		  <p>
			<label for="add_user">Add User</label>
			<input type="checkbox" name="add_user" id="add_user" />
		  </p>
		</div>
		
		<div class="col-md-3">
		  <p>
			<label for="edit_user">Edit User</label>
			<input type="checkbox" name="edit_user" id="edit_user" />
		  </p>
		</div>
		
		<div class="col-md-3">
		  <p>
			<label for="delete_user">Delete User</label>
			<input type="checkbox" name="delete_user" id="delete_user" />
		  </p>
		</div>
		
	</div>
	
	
	<!--- ---->
	<div class="row">
		<div class="col-md-3">
		  <p>
			<label for="role_list">View Role List</label>
			<input type="checkbox" name="role_list" id="role_list" />
		  </p>
		</div>
		
		<div class="col-md-3">
		  <p>
			<label for="add_role">Add Role</label>
			<input type="checkbox" name="add_role" id="add_role" />
		  </p>
		</div>
		
		<div class="col-md-3">
		  <p>
			<label for="edit_role">Edit Role</label>
			<input type="checkbox" name="edit_role" id="edit_role" />
		  </p>
		</div>
		
		<div class="col-md-3">
		  <p>
			<label for="delete_role">Delete Role</label>
			<input type="checkbox" name="delete_role" id="delete_role" />
		  </p>
		</div>
		
	</div>

	
	
	
	<input type="submit" value="save" class="btn btn-primary" />
	
	
<?php echo form_close(); ?>