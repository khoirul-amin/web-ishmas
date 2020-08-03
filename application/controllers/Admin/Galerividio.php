<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Galerividio extends CI_Controller {
	function __construct(){
		parent::__construct();		
		$this->load->model('Galerividio_m');
        // $this->load->helper('url');
	}


	public function index()
	{
		$get_session = $this->session->all_userdata();
		if(count($get_session) == 1){
			redirect(base_url("Login"));
		}else{
			$this->load->view('admin/galeri_vidio');
		}
	}	
	public function get_datatables(){
		$result=$this->Galerividio_m->get_all_data()->result();
		$data = array();

		foreach($result as $informasi){


			$row = array();

			$row[] = '<td>'.$informasi->id.'</td>';
			$row[] = '<td>'.$informasi->kegiatan.'</td>';
			$row[] = '<td>'.$informasi->vidio.'</td>';
			// $row[] = '<td>'.$informasi->gambar6.'</td>';
			$row[] = "<td>
						<button type='button' class='btn btn-danger btn-sm pt-2 pb-2'>
							<i class='fas fa-trash-alt'></i>
						</button>
						<button type='button' onclick=\"setModalInformasi('$informasi->vidio')\" 
							class='btn btn-warning btn-sm pt-2 pb-2'
							data-toggle='modal' data-target='#modalView'>
							<i class='fas fa-eye'></i>
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

	function insertData(){
		$data = array(
			'kegiatan' => $this->input->post('kegiatan'),
			'vidio' => $this->input->post('vidio'),
			'diubah' => date("Y-m-d")
		);

		$this->Galerividio_m->insert_data($data);

		$result = array(
			'status' => TRUE,
			'respMessage' => 'Selesai Tambah Data'
		);
		echo json_encode($result);
	}

	public function updateData(){
		$data = array(
			'kegiatan' => $this->input->post('kegiatan'),
			'vidio' => $this->input->post('vidio'),
			'diubah' => date("Y-m-d")
		);

		$where = array(
			'id' => $this->input->post('id')
		);

		$this->Galerividio_m->update_data($data,$where);

		$result = array(
			'status' => TRUE,
			'respMessage' => 'Selesai Update Data'
		);
		echo json_encode($result);
	}

	function getByID($id){
		$where = array( 'id' => $id );

		$result = $this->Galerividio_m->getByID($where)->result();

		return $this->output->set_output(json_encode($result[0]));
	}
}
