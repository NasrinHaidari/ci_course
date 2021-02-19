<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
	// if the username or password was incorrect, return in this function
		$this->load->view('login');
	}
	
	function check_login(){
		$username=$this->input->post('username');
		$password=$this->input->post('password');
		
		$this->load->model('user_model');
		$result=$this->user_model->checkLogin($username,$password);
		
		// print_r($result);exit();
		
		if($result){
			
			// set_userdata --> save data for always until we delete that
			 $this->session->set_userdata('user_id',$result->id);
			 $this->session->set_userdata('user_name',$result->user_name);
			 $this->session->set_userdata('photo',$result->photo);
			 $this->session->set_userdata('user_role',$result->user_role);
			 $this->session->set_userdata('is_logedin',true);
			 
			 redirect('welcome/home'); 
		} 
		else {
			// set_falsh --> session Is running for just one time 
			$this->session->set_flashdata('msg','UserName or password is wrong');
			
			//echo $this->session->flashdata['msg'];
			redirect('/');
		}
	}
	
	public function home() {
	//	if the username or password was correct, return in this function
		$date['main_content']='home';
		$this->load->view('layout/main',$date);
	}
	
	public function logout() {
		 $this->session->unset_userdata('user_id');
		 $this->session->unset_userdata('user_name');
		 $this->session->unset_userdata('photo');
		 $this->session->unset_userdata('is_logedin');
		 
		 redirect('/'); 
	}
}






