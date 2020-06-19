<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	function __construct(){
		parent::__construct();		
		// $this->load->model('Sambutan_m');
        // $this->load->helper('url');
	}


	public function index()
	{
		$get_session = $this->session->all_userdata();
		if(count($get_session) == 1){
			redirect(base_url("Login"));
		}else{
			$this->load->view('admin/index');
		}
	}
}
