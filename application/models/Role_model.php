<?php
class role_model extends CI_Model{
	
	public function get_roles() {
		return $this->db->get('roles')->result(); // give list of role 
	}
	
	public function createRole($date) {
		return $this->db->insert('roles',$date);
	}
	
	public function get_last_role_id() {
		$this->db->order_by('id','DESC');
		return $this->db->get('roles')->row()->id;
	}
	
	public function insertPermission($data) {
		return $this->db->insert('role_has_permission',$data);
	}
	
	public function delete_role($id) {
		// delete the roles table
		$this->db->where('id',$id);
		$this->db->delete('roles');
		
		// delete the role_id from role_has_permission table
		// meanes delete the permission that set in role
		$this->db->where('role_id',$id);
		$this->db->delete('role_has_permission');
		
	}
	
	public function singleRole($id) {
		$this->db->where('id',$id);
		return $this->db->get('roles')->row();
	}
	
	public function roleHasPermission($role_id,$per_id){
		$this->db->where('role_id',$role_id);
		$this->db->where('permission_id',$per_id);
		return count($this->db->get('role_has_permission')->result());
	}
	
	public function updateRole($data, $id) {
		$this->db->where('id',$id);
		return $this->db->update('roles',$data);
	}
	
	public function deleteOldPermission($id) {
		$this->db->where('role_id',$id);
		$this->db->delete('role_has_permission');
	}
}

?>












