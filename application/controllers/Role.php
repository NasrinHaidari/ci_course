<?php
class role extends CI_Controller{
	
	function __construct() {
		parent::__construct();
		$this->load->model('role_model');
	}
	
	
	public function view_roles() {
		
		$data['roles']=$this->role_model->get_roles();
		$data['main_content']='role/index';
		
		$this->load->view('layout/main',$data);
	}
	
	public function add_role_form() {
		$data['main_content']='role/add_role';
		$this->load->view('layout/main',$data);
	}
	
    function create_role() {
		
		$role=$this->input->post('role_name');
		$userid=$this->session->userdata('user_id');
		
		$roledata=array(
			'name'=>$role,
			'created_by'=>$userid
		);
		
		$this->role_model->createRole($roledata);
		$lastRoleId=$this->role_model->get_last_role_id();
		
		$permissiondata['role_id']=$lastRoleId;
		
		if($this->input->post('user_list')) {
			$permissiondata['permission_id']=1;
			$this->role_model->insertPermission($permissiondata);
		}
		
		if($this->input->post('add_user')) {
			$permissiondata['permission_id']=2;
			$this->role_model->insertPermission($permissiondata);
		}
		
		if($this->input->post('edit_user')) {
			$permissiondata['permission_id']=3;
			$this->role_model->insertPermission($permissiondata);
		}
		
		if($this->input->post('delete_user')) {
			$permissiondata['permission_id']=4;
			$this->role_model->insertPermission($permissiondata);
		}
		
		if($this->input->post('role_list')) {
			$permissiondata['permission_id']=5;
			$this->role_model->insertPermission($permissiondata);
		}
		
		if($this->input->post('add_role')) {
			$permissiondata['permission_id']=6;
			$this->role_model->insertPermission($permissiondata);
		}
		
		if($this->input->post('edit_role')) {
			$permissiondata['permission_id']=7;
			$this->role_model->insertPermission($permissiondata);
		}
		
		if($this->input->post('delete_role')) {
			$permissiondata['permission_id']=8;
			$this->role_model->insertPermission($permissiondata);
		}
		
		redirect("role/view_roles");
	}
	
	
	
	public function deleteRole() {
		$id=$this->input->post('id');
		
		$res=$this->role_model->delete_role($id);
		if($res){
			$msg="Role Deleted Successfully";
			$class="alert success";
		} 
		else {
			$msg="Please try again!";
			$class="alert danger";
		}
		
		$this->session->set_flashdata('message',$msg);
		$this->session->set_flashdata('class',$class);
		redirect("role/view_roles");
		
	}
	
	public function editRole($id) {
		$data['main_content']='role/edit_role';
		
		$data['user_list']=$this->role_model->roleHasPermission($id,1);
		$data['add_user']=$this->role_model->roleHasPermission($id,2);
		$data['edit_user']=$this->role_model->roleHasPermission($id,3);
		$data['delete_user']=$this->role_model->roleHasPermission($id,4);
		$data['role_list']=$this->role_model->roleHasPermission($id,5);
		$data['add_role']=$this->role_model->roleHasPermission($id,6);
		$data['edit_role']=$this->role_model->roleHasPermission($id,7);
		$data['delete_role']=$this->role_model->roleHasPermission($id,8);
		
		$data['roles']=$this->role_model->singleRole($id);
		
		$this->load->view('layout/main',$data);
	}
	
	public function update_role() {
		
		$role=$this->input->post('role_name');
		$id=$this->input->post('id');
		
		$roledata=array(
			'name'=>$role
		);
		
		$this->role_model->updateRole($roledata,$id);
		$this->role_model->deleteOldPermission($id);
		
		$permissiondata['role_id']=$id;
		
		if($this->input->post('user_list')) {
			$permissiondata['permission_id']=1;
			$this->role_model->insertPermission($permissiondata);
		}
		
		if($this->input->post('add_user')) {
			$permissiondata['permission_id']=2;
			$this->role_model->insertPermission($permissiondata);
		}
		
		if($this->input->post('edit_user')) {
			$permissiondata['permission_id']=3;
			$this->role_model->insertPermission($permissiondata);
		}
		
		if($this->input->post('delete_user')) {
			$permissiondata['permission_id']=4;
			$this->role_model->insertPermission($permissiondata);
		}
		
		if($this->input->post('role_list')) {
			$permissiondata['permission_id']=5;
			$this->role_model->insertPermission($permissiondata);
		}
		
		if($this->input->post('add_role')) {
			$permissiondata['permission_id']=6;
			$this->role_model->insertPermission($permissiondata);
		}
		
		if($this->input->post('edit_role')) {
			$permissiondata['permission_id']=7;
			$this->role_model->insertPermission($permissiondata);
		}
		
		if($this->input->post('delete_role')) {
			$permissiondata['permission_id']=8;
			$this->role_model->insertPermission($permissiondata);
		}
		
		redirect("role/view_roles");
		
	}
	
}


?>


















