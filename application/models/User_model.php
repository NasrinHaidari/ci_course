<?php
class User_model extends CI_Model{
	
	public function get_users($limit, $offset) {
		
		//$this->db->where(['column_name != '=>'column_value']); // check multiple condition
		//$this->db->where(['name '=>'Nasrin']); // not equal
		// return $this->db->where('id',1)->get('users')->result(); 
		return $this->db->get('users', $limit, $offset)->result();
		// result ==> return an array
	}
	
	public function save_user($date) {
		return $this->db->insert('users',$date);
	}
	
	public function DeleteUser($id) {
				$this->db->where('id',$id);
		return $this->db->delete('users');
	}

	public function getSingleUser($id){
		$this->db->where('id',$id);
		return	$this->db->get('users')->row();
		// row ==> return just one user by id with an object
	}
	
	public function update_user($data,$id) {
		$this->db->where('id',$id);
		return $this->db->update('users',$data);
	}
	
	public function checkLogin($username,$password) {
		$this->db->where(['user_name'=>$username,'password'=>$password]);
		return $this->db->get('users')->row();
	}
}
?>







