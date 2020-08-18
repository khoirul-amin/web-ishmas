<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Guru extends CI_Controller {
	function __construct(){
		parent::__construct();		
		$this->load->model('Guru_m');
		date_default_timezone_set("Asia/Jakarta");
        // $this->load->helper('url');
    }

    public function index(){
        $get_session = $this->session->all_userdata();
		if(count($get_session) == 1){
			redirect(base_url("Login"));
		}else{
			$this->load->view('admin/guru');
		}
    }
    public function get_datatables(){
		$result=$this->Guru_m->get_data()->result();
		$data = array();

		foreach($result as $berita){

			$row = array();
 

			$row[] = '<td>'.$berita->id.'</td>';
			$row[] = '<td>'. $berita->nama.'</td>';
			$row[] = '<td>'.$berita->mapel.'</td>';
			$row[] = '<td>'.$berita->poto.'</td>';
			$row[] = '<td>'.$berita->profil.'</td>';
			$row[] = "<td>
						<button type='button' class='btn btn-danger btn-sm pt-2 pb-2'>
							<i class='fas fa-trash-alt'></i>
						</button>
						<button type='button' onclick=\"setModalInformasi('$berita->id')\" 
							class='btn btn-warning btn-sm pt-2 pb-2'
							data-toggle='modal' data-target='#modalView'>
							<i class='fas fa-eye'></i>
						</button>
						<button type='button'
							onclick=\"updateInformasi('$berita->id')\"
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

		$result = $this->Guru_m->getByID($where)->result();

		return $this->output->set_output(json_encode($result[0]));
    }

    public function insertData(){

        $this->load->library('upload');
        $this->load->helper('file');

        $nama_banner = 'Guru-'.date("Y-m-d_h:m:s");

        $tipe_image = pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION);
        $file_name =  $nama_banner.'.'.$tipe_image;

		$config['upload_path']          = 'assets/images/imageUpload';
		$config['allowed_types']        = 'jpg|png|jpeg';
        $config['file_name'] = $file_name;
 
        $this->upload->initialize($config);
 
		if ( ! $this->upload->do_upload('image')){


            $result = array(
                'status' => FALSE,
                'respMessage' => 'Tambah Data Gagal'
            );
            
		    echo json_encode($result);
		}else{

            $data = array(
                'nama' => $this->input->post('nama'),
                'profil' => $this->input->post('profil'),
                'poto' => $file_name,
                'mapel' => $this->input->post('mapel')
            );

            $this->Guru_m->insert_data($data);
            
			$result = array(
                'status' => TRUE,
                'respMessage' => 'Selesai Tambah Data'
            );
            echo json_encode($result);
		}
    }


	public function updateData(){
        $where = array(
            'id' => $this->input->post('id')
        );

        $cek_data = $this->Guru_m->getByID($where)->result()[0];

        if($_FILES["image"]["name"]){

            $this->load->library('upload');
            $this->load->helper('file');
    
            $nama_banner = 'Berita-'.date("Y-m-d_h:m:s");
    
            $tipe_image = pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION);
            $file_name =  $nama_banner.'.'.$tipe_image;
    
            $config['upload_path']          = 'assets/images/imageUpload';
            $config['allowed_types']        = 'jpg|png|jpeg';
            $config['file_name'] = $file_name;
     
            $this->upload->initialize($config);

            if(file_exists('assets/images/imageUpload/'.$cek_data->poto)){
                unlink('assets/images/imageUpload/'.$cek_data->poto);
                if ( ! $this->upload->do_upload('image')){

                    $result = array(
                        'status' => FALSE,
                        'respMessage' => 'Update Data Gagal'
                    );
                    
                    echo json_encode($result);
                }else{
                    $data = array(
                        'nama' => $this->input->post('nama'),
                        'profil' => $this->input->post('profil'),
                        'poto' => $file_name,
                        'mapel' => $this->input->post('mapel')
                    );

                    $this->Guru_m->update_data($data,$where);
                    
                    $result = array(
                        'status' => TRUE,
                        'respMessage' => 'Update Data Berhasil'
                    );
                    
                    echo json_encode($result);
                }
            }
            
        }else{
            $data = array(
                'nama' => $this->input->post('nama'),
                'profil' => $this->input->post('profil'),
                'mapel' => $this->input->post('mapel')
            );

            $this->Guru_m->update_data($data,$where);

            $result = array(
                'status' => TRUE,
                'respMessage' => 'Update Data Berhasil'
            );
            
            echo json_encode($result);
        }
    }
}