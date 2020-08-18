<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Agenda extends CI_Controller {
	function __construct(){
		parent::__construct();		
		$this->load->model('Agenda_m');
		date_default_timezone_set("Asia/Jakarta");
        // $this->load->helper('url');
    }

    function index(){
        $get_session = $this->session->all_userdata();
		if(count($get_session) == 1){
			redirect(base_url("Login"));
		}else{
			$this->load->view('admin/agenda');
		}
    }
	public function get_datatables(){

		$result=$this->Agenda_m->get_data()->result();
		$data = array();

		foreach($result as $informasi){

			$row = array();

			$row[] = '<td>'.$informasi->id.'</td>';
            $row[] = '<td>'.$informasi->judul.'</td>';
            $row[] = '<td>'.$informasi->tanggal.'</td>';
            $row[] = '<td>'.$informasi->waktu.'</td>';
            $row[] = '<td>'.$informasi->tempat.'</td>';
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

		$result = $this->Agenda_m->getByID($where)->result();

		return $this->output->set_output(json_encode($result[0]));
	}
	public function updateData(){
		$data = array(
			'keterangan' => $this->input->post('keterangan'),
			'judul' => $this->input->post('judul'),
			'waktu' => $this->input->post('waktu'),
			'tanggal' => $this->input->post('tanggal'),
			'tempat' => $this->input->post('tempat')
		);
		$where = array(
			'id' => $this->input->post('id')
		);

		$this->Agenda_m->update_data($data,$where);

		$result = array(
			'status' => TRUE,
			'respMessage' => 'Selesai Update Data'
		);
		echo json_encode($result);
	}
	public function insertData(){
		$data = array(
			'keterangan' => $this->input->post('keterangan'),
			'judul' => $this->input->post('judul'),
			'waktu' => $this->input->post('waktu'),
			'tanggal' => $this->input->post('tanggal'),
			'tempat' => $this->input->post('tempat')
		);

		$this->Agenda_m->insert_data($data);

		$result = array(
			'status' => TRUE,
			'respMessage' => 'Selesai Tambah Data'
		);
		echo json_encode($result);
	}
}