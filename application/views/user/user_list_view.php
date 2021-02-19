<table class="table table-striped">
	<thead>
		<tr>
			<th><?php echo $this->lang->line('nu') ?></th>
			<th><?php echo $this->lang->line('name') ?></th>
			<th><?php echo $this->lang->line('last_name') ?></th>
			<th><?php echo $this->lang->line('email') ?></th>
			<th><?php echo $this->lang->line('phone') ?></th>
			<th><?php echo $this->lang->line('user_name') ?></th>
			<th><?php echo $this->lang->line('operation') ?></th>
		</tr>
	</thead>
	<tbody>
	<?php $counter=1;
	foreach($users as $us){
	?>
		<tr>
			<td><?php echo $counter ?></td>
			<td><?php echo $us->name ?></td>
			<td><?php echo $us->lastname ?></td>
			<td><?php echo $us->email ?></td>
			<td><?php echo $us->phone ?></td>
			<td><?php echo $us->user_name ?></td>
			<td>
			<?php
				$ci=get_instance();
				$ci->load->model('role_model');
				$userrole=$this->session->userdata('user_role');
				
				if($ci->role_model->roleHasPermission($userrole,4)) {
			?>
				<button class="btn btn-danger" onclick="confirmDelete(<?php echo $us->id; ?>);">Delete</button>
			<?php
				}
			?>
				<?php
				if($ci->role_model->roleHasPermission($userrole,3)) {
				
					 $attr= array(
					 'class'=>"btn btn-primary",
					 'id'=> "edit_user",
					 //'target'=>"_blank",
					 
					 );
					?>
					<?php echo anchor('user/edit_user/'.$us->id, 'Edit', $attr); 
				}
				?>
			</td>
		</tr>
		<?php $counter ++;
	}
		?>
	</tbody>
</table>
<?php echo $this->pagination->create_links(); ?>

<div class="col-sm-6">
<div class="dataTables_paginate paging_simple_numbers" id="dataTables-example_paginate">
<ul class="pagination">
<li class="paginate_button previous disabled" aria-controls="dataTables-example" tabindex="0" id="dataTables-example_previous">
<a href="#">Previous</a></li><li class="paginate_button active" aria-controls="dataTables-example" tabindex="0"><a href="#">1</a>
</li>
<li class="paginate_button " aria-controls="dataTables-example" tabindex="0"><a href="#">2</a>
</li>
</li><li class="paginate_button next" aria-controls="dataTables-example" tabindex="0" id="dataTables-example_next">
<a href="#">Next</a>
</li>
</ul>
</div>
</div>

<script>
var base_url="<?php echo base_url('/'); ?>";
	function confirmDelete(id) {
		var res= confirm("Do you want to delete this row?");
		
		if(res==true) {
			window.location.assign(base_url+'index.php/'+'user/user_delete/'+id);
		} else {
			
		}
	}
</script>





