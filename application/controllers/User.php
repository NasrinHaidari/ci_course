<?php

class User extends CI_Controller{
	// this method just access in this controller and we want to 
	// avoid to write [$this->load->model('User_model')]
	function __construct(){
		parent:: __construct();
		$this->load->model('User_model');
		
	}
	
	
	public function user_list(){
		// offset ==> means our Start point
		// 3 ==> means start from 3 parameter form url
		$offset=$this->uri->segment(3);
		
		if(!$this->session->userdata('language')){
			$this->lang->load('label','english');
		}
		else{ 
			$this->lang->load('label',$this->session->userdata['language']);
		}
		
		$config['total_rows']=$this->db->count_all('users');
		$config['per_page']=4;
		$config['base_url']=base_url().'index.php/user/user_list';
		
		$this->pagination->initialize($config);
		
		
		$data['main_content']='user/user_list_view';
		$data['users']=$this->User_model->get_users($config['per_page'], $offset);
		//  $data['users'] ---> users is our index
		
		$this->load->view('layout/main', $data);
	}	
	
	public function add_user() {
		$data['main_content']='user/new_user';
		$this->load->view('layout/main', $data);
	}
	
	public function create_user() {
		
		$name=$this->input->post('name');
		$lastname=$this->input->post('last_name');
		$email=$this->input->post('email');
		$phone=$this->input->post('phone');
		$user_name=$this->input->post('user_name');
		$password=$this->input->post('password');
		
		
		
		$validate=array(
			array(
				'field'=>'name',
				'label'=>'First Name', // with this name, we access to name field
				'rules'=>'required'
			),
			array(
				'field'=>'user_name',
				'label'=>'User Name',
				'rules'=>'required|min_length[5]|is_unique[users.user_name]'
			),
			array(
				'field'=>'password',
				'label'=>'Password',
				'rules'=>'required|min_length[6]'
			),
		);
		
		$this->load->library('form_validation');
		$this->form_validation->set_rules($validate);
	
		// run means perform the validation 
		if(	$this->form_validation->run()==false){
			
			$this->session->set_flashdata('validation',validation_errors());
			redirect('user/add_user');
		}
		
		
		
		if($_FILES['user_photo']['name']){
			
			$config['file_name']=time();
			$config['allowed_types']='jpg|png|jpeg|gif';
		 	$config['upload_path']='upload_image';
			$config['max_size']='3000';
			
			
			$this->load->library('upload');
			// check setting of $config
			$this->upload->initialize($config);
			
			
			// after giving the $config properity, upload file
			if($this->upload->do_upload('user_photo')){
				$uploadData=$this->upload->data(); // result of this return an array
				$photo_name=$uploadData['file_name'];
			} else{ 
				echo "something wrang happen";
			}
			
		}else{
			$photo_name="default.png";
		}
		
		$data= array(
			'name'=>$name,
			'lastname'=>$lastname,
			'email'=>$email,
			'phone'=>$phone,
			'user_name'=>$user_name,
			'password'=>$password,
			'photo'=>$photo_name,
			'created_by'=>$this->session->userdata['user_id'],
		);
		
		$this->User_model->save_user($data);
		
		redirect('user/user_list');
	}
	
	function user_delete($id) {
		$this->User_model->DeleteUser($id);
		
		redirect('user/user_list');
	}
	
	public function edit_user($id) {
		$data['single_user']= $this->User_model->getSingleUser($id);
		// print_r($data['user']);
		$data['main_content']='user/edit_user';
		$this->load->view('layout/main', $data);
	}
	
	public function update_user() {
		$name=$this->input->post('name');
		$lastname=$this->input->post('last_name');
		$email=$this->input->post('email');
		$phone=$this->input->post('phone');
		$user_name=$this->input->post('user_name');
		$password=$this->input->post('password');
		
		$id=$this->input->post('user_id');
		
		$data= array(
			'name'=>$name,
			'lastname'=>$lastname,
			'email'=>$email,
			'phone'=>$phone,
			'user_name'=>$user_name,
		);
		
		if($password !=""){
			$data['password']=$password;
		}
		
		$this->User_model->update_user($data,$id);
		
		redirect('user/user_list');
	}

	function change_language($lan) {
		$this->session->set_userdata('language',$lan);
		// echo $this->session->userdata['language'];
		redirect($_SERVER['HTTP_REFERER']);
	}
}
?>


