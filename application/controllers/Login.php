<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	function __construct(){
		parent::__construct();		
		$this->load->model('Login_m');
        // $this->load->helper('url');
	}


	public function index()
	{
		$get_session = $this->session->all_userdata();
		if(count($get_session) == 1){
			$this->load->view('template/login');
		}else{
			redirect(base_url("Admin/Home"));
		}
	}
	

	public function go_login(){
		date_default_timezone_set("Asia/Jakarta");
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$where = array(
			'username' => $username,
			'password' => md5($password)
		);


		$res = $this->Login_m->get_login($where)->result();
		
		if(!$res){
			redirect(base_url("Login"));
		}else{
			$data = array(
				'token' => md5($username.$password.date("Y-m-d H:m:s")),
				'updated_at' =>  date("Y-m-d H:m:s")
			);
			$where_id = array(
				'id' => $res[0]->id
			);
			$this->Login_m->update_data($data, $where_id);

			$data_user = $this->Login_m->get_login($where_id)->result();

			$this->session->set_userdata('user',$data_user[0]);
 
			redirect(base_url("Admin/Home"));
		}
	}


	function logout(){
		$this->session->sess_destroy();
		redirect(base_url('login'));
	}
}
