<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Informasi extends CI_Controller {
	function __construct(){
		parent::__construct();		
		$this->load->model('Informasi_m');
		date_default_timezone_set("Asia/Jakarta");
        // $this->load->helper('url');
    }

    public function index()
	{
		$get_session = $this->session->all_userdata();
		if(count($get_session) == 1){
			redirect(base_url("Login"));
		}else{
			$this->load->view('admin/informasi');
		}
	}
	public function get_datatables(){
		$result=$this->Informasi_m->get_informasi()->result();
		$data = array();

		foreach($result as $informasi){

			$where = array(
				"id" => $informasi->id_admin
			);
			$admin = $this->Informasi_m->get_admin($where)->result()[0];

			$row = array();

			$row[] = '<td>'.$informasi->id.'</td>';
			$row[] = '<td></td><b>ID Admin: </b>'.$admin->id.' <br/><b>Admin : </b>'. $admin->nama.'</td>';
			$row[] = '<td><b>Judul : </b>'.$informasi->judul. '<br/>	<b>Isi : </b>'. htmlspecialchars(substr($informasi->isi, 0, 50)).'</td>';
			$row[] = '<td><b>Status : </b>'. $informasi->status. '<br/><b>Created At : </b>'. $informasi->created_at. '<br/><b>Updated At : </b>'. $informasi->updated_at.'</td>';
			$row[] = "<td>
						<button type='button' class='btn btn-danger btn-sm pt-2 pb-2'>
							<i class='fas fa-trash-alt'></i>
						</button>
						<button type='button' onclick=\"setModalInformasi('$informasi->id')\" 
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
	public function getByID($id){
		$where = array( 'id' => $id );

		$result = $this->Informasi_m->getByID($where)->result();

		return $this->output->set_output(json_encode($result[0]));
	}
	public function updateData(){
		$data = array(
			'judul' => $this->input->post('judul'),
			'id_admin'=> $this->session->all_userdata()['user']->id,
			'isi' => $this->input->post('isi'),
			'status' => $this->input->post('status'),
			'updated_at' => date("Y-m-d H:m:s")
		);
		$where = array(
			'id' => $this->input->post('id')
		);

		$this->Informasi_m->update_data($data,$where);

		$result = array(
			'status' => TRUE,
			'respMessage' => 'Selesai Update Data'
		);
		echo json_encode($result);
	}
	public function insertData(){
		$data = array(
			'judul' => $this->input->post('judul'),
			'id_admin'=> $this->session->all_userdata()['user']->id,
			'isi' => $this->input->post('isi'),
			'status' => $this->input->post('status'),
			'created_at' => date("Y-m-d H:m:s")
		);

		$this->Informasi_m->insert_data($data);

		$result = array(
			'status' => TRUE,
			'respMessage' => 'Selesai Tambah Data'
		);
		echo json_encode($result);
	}
}