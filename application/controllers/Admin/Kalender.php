<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kalender extends CI_Controller {
	function __construct(){
		parent::__construct();		
		$this->load->model('Kalender_m');
		date_default_timezone_set("Asia/Jakarta");
        // $this->load->helper('url');
    }

    function index(){
        $get_session = $this->session->all_userdata();
		if(count($get_session) == 1){
			redirect(base_url("Login"));
		}else{
			$this->load->view('admin/kalender');
		}
    }
	public function get_datatables(){

		$result=$this->Kalender_m->get_data()->result();
		$data = array();

		foreach($result as $informasi){

			$row = array();

			$row[] = '<td>'.$informasi->id.'</td>';
            $row[] = '<td>'.$informasi->tanggal.'</td>';
            $row[] = '<td>'.$informasi->keterangan.'</td>';
            $row[] = "<td>
						<button type='button' class='btn btn-danger btn-sm pt-2 pb-2'>
							<i class='fas fa-trash-alt'></i>
						</button>
						<button type='button'
							onclick=\"updateInformasi('$informasi->id')\"
							class='btn btn-success btn-sm pt-2 pb-2'
							data-toggle='modal' data-target='#modalForm'> 
							<i class='fas fa-pencil-alt'></i>
						</button>
						</td>";

			$data[] = $row;
		}

		$output = array(
            "data" => $data,
        );
        echo json_encode($output);

	}
	public function getByID($id){
		$where = array( 'id' => $id );

		$result = $this->Kalender_m->getByID($where)->result();

		return $this->output->set_output(json_encode($result[0]));
	}
	public function updateData(){
		$data = array(
			'keterangan' => $this->input->post('keterangan'),
			'tanggal' => $this->input->post('tanggal')
		);
		$where = array(
			'id' => $this->input->post('id')
		);

		$this->Kalender_m->update_data($data,$where);

		$result = array(
			'status' => TRUE,
			'respMessage' => 'Selesai Update Data'
		);
		echo json_encode($result);
	}
	public function insertData(){
		$data = array(
			'keterangan' => $this->input->post('keterangan'),
			'tanggal' => $this->input->post('tanggal')
		);

		$this->Kalender_m->insert_data($data);

		$result = array(
			'status' => TRUE,
			'respMessage' => 'Selesai Tambah Data'
		);
		echo json_encode($result);
	}
}