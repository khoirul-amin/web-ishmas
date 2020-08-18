<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Galerifoto extends CI_Controller {
	function __construct(){
		parent::__construct();		
		$this->load->model('Galerifoto_m');
        // $this->load->helper('url');
	}


	public function index()
	{
		$get_session = $this->session->all_userdata();
		if(count($get_session) == 1){
			redirect(base_url("Login"));
		}else{
			$this->load->view('admin/galeri_foto');
		}
	}
	public function get_datatables(){
		$result=$this->Galerifoto_m->get_all_data()->result();
		$data = array();

		foreach($result as $informasi){


			$row = array();

			$row[] = '<td>'.$informasi->id.'</td>';
			$row[] = '<td>'.$informasi->kegiatan.'</td>';
			$row[] = '<td><img width="100px" src="https://drive.google.com/uc?id='.$informasi->gambar1.'"/></td>';
			$row[] = '<td><img width="100px" src="https://drive.google.com/uc?id='.$informasi->gambar2.'"/></td>';
			$row[] = '<td><img width="100px" src="https://drive.google.com/uc?id='.$informasi->gambar3.'"/></td>';
			$row[] = '<td><img width="100px" src="https://drive.google.com/uc?id='.$informasi->gambar4.'"/></td>';
			$row[] = '<td><img width="100px" src="https://drive.google.com/uc?id='.$informasi->gambar5.'"/></td>';
			$row[] = '<td><img width="100px" src="https://drive.google.com/uc?id='.$informasi->gambar6.'"/></td>';
			// $row[] = '<td>'.$informasi->gambar6.'</td>';
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

	function insertData(){
		$data = array(
			'kegiatan' => $this->input->post('kegiatan'),
			'gambar1' => $this->input->post('image1'),
			'gambar2' => $this->input->post('image2'),
			'gambar3' => $this->input->post('image3'),
			'gambar4' => $this->input->post('image4'),
			'gambar5' => $this->input->post('image5'),
			'gambar6' => $this->input->post('image6'),
			'diubah' => date("Y-m-d")
		);

		$this->Galerifoto_m->insert_data($data);

		$result = array(
			'status' => TRUE,
			'respMessage' => 'Selesai Tambah Data'
		);
		echo json_encode($result);
	}

	public function updateData(){
		$data = array(
			'kegiatan' => $this->input->post('kegiatan'),
			'gambar1' => $this->input->post('image1'),
			'gambar2' => $this->input->post('image2'),
			'gambar3' => $this->input->post('image3'),
			'gambar4' => $this->input->post('image4'),
			'gambar5' => $this->input->post('image5'),
			'gambar6' => $this->input->post('image6'),
			'diubah' => date("Y-m-d")
		);

		$where = array(
			'id' => $this->input->post('id')
		);

		$this->Galerifoto_m->update_data($data,$where);

		$result = array(
			'status' => TRUE,
			'respMessage' => 'Selesai Update Data'
		);
		echo json_encode($result);
	}

	function getByID($id){
		$where = array( 'id' => $id );

		$result = $this->Galerifoto_m->getByID($where)->result();

		return $this->output->set_output(json_encode($result[0]));
	}
}
