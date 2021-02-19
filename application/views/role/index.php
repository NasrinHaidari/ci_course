
<?php if($this->session->flashdata('message')){ ?>
	<div class="alert <?php echo $this->session->flashdata('class'); ?>">
		<p>
			<?php echo $this->session->flashdata('message'); ?>
		</p>
	</div>
<?php } ?>


<?php
	$ci=get_instance();
	$ci->load->model('role_model');
	$userrole=$this->session->userdata('user_role');
?>				



<div>
<?php
if($ci->role_model->roleHasPermission($userrole,6)) {

	$attr=array(
	'class'=>"btn btn-info",
	'id'=>"new_role_id"
	);


	echo anchor('role/add_role_form', 'New Role', $attr);
	
}
?>

</div>

<table class="table table-striped">
	<thead>
		<tr>
			<th>No.</th>
			<th>Name</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
		<?php
		$counter=1;
			foreach($roles as $rl){
		?>
		<tr>
			<td><?php echo $counter; ?></td>
			<td><?php echo $rl->name; ?></td>
			<td>
			
			<?php 
			if($ci->role_model->roleHasPermission($userrole,8)) {
			
				$attr=array(
					'class'=>"role_delete",
					'style'=>"display:inline"
				);
				
				echo form_open('role/deleteRole',$attr); ?>
				<input type="hidden" name="id" value="<?php echo $rl->id; ?>"/>
				<button type="submit" class="btn btn-danger" onclick="return confirmation();">Delete</button>
				<?php echo form_close(); 
			}
			?>
			
			<?php
			if($ci->role_model->roleHasPermission($userrole,7)) {
				
				$linkAttr=array(
				'class'=>"btn btn-primary"
				);
				
				echo anchor('role/editRole/'.$rl->id,'Edit',$linkAttr);
			
			}
			?>
			</td>
		</tr>		
		<?php
			}
		
		?>
	</tbody>
</table>

<script>
	function confirmation() {
		var cn=confirm("Are you sure to delete?");
		return cn;
	}
</script>





