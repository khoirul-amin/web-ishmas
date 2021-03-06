<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sambutan extends CI_Controller {
	function __construct(){
		parent::__construct();		
		$this->load->model('Sambutan_m');
		date_default_timezone_set("Asia/Jakarta");
        // $this->load->helper('url');
    }

    public function index(){
        $get_session = $this->session->all_userdata();
		if(count($get_session) == 1){
			redirect(base_url("Login"));
		}else{
			$this->load->view('admin/sambutan');
		}
    }
    public function get_datatables(){
		$result=$this->Sambutan_m->get_sambutan()->result();
		$data = array();

		foreach($result as $sambutan){

			$where = array(
				"id" => $sambutan->id_admin
			);
			$admin = $this->Sambutan_m->get_admin($where)->result()[0];

			$row = array();
 

			$row[] = '<td>'.$sambutan->id.'</td>';
			$row[] = '<td></td><b>ID Admin: </b>'.$admin->id.' <br/><b>Admin : </b>'. $admin->nama.'</td>';
			$row[] = '<td><b>Judul : </b>'.$sambutan->judul. '<br/>	<b>Isi : </b>'. htmlspecialchars(substr($sambutan->isi, 0, 50)).'</td>';
			$row[] = '<td><b>Status : </b>'. $sambutan->status. '<br/><b>Created At : </b>'. $sambutan->created_at. '<br/><b>Updated At : </b>'. $sambutan->updated_at.'</td>';
			$row[] = "<td>
						<button type='button' class='btn btn-danger btn-sm pt-2 pb-2'>
							<i class='fas fa-trash-alt'></i>
						</button>
						<button type='button' onclick=\"setModalInformasi('$sambutan->id')\" 
							class='btn btn-warning btn-sm pt-2 pb-2'
							data-toggle='modal' data-target='#modalView'>
							<i class='fas fa-eye'></i>
						</button>
						<button type='button'
							onclick=\"updateInformasi('$sambutan->id')\"
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

		$result = $this->Sambutan_m->getByID($where)->result();

		return $this->output->set_output(json_encode($result[0]));
    }
    
    public function insertData(){

        $this->load->library('upload');
        $this->load->helper('file');

        $nama_banner = 'Kasek-'.date("Y-m-d_h:m:s");

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
                'judul' => $this->input->post('judul'),
                'isi' => $this->input->post('isi'),
                'image' => $file_name,
                'status' => $this->input->post('status'),
                'created_at' => date("Y-m-d H:m:s"),
                'id_admin' =>   $this->session->all_userdata()['user']->id
            );

            $this->Sambutan_m->insert_data($data);
            
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

        $cek_data = $this->Sambutan_m->getByID($where)->result()[0];

        if($_FILES["image"]["name"]){

            $this->load->library('upload');
            $this->load->helper('file');
    
            $nama_banner = 'Kasek-'.date("Y-m-d_h:m:s");
    
            $tipe_image = pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION);
            $file_name =  $nama_banner.'.'.$tipe_image;
    
            $config['upload_path']          = 'assets/images/imageUpload';
            $config['allowed_types']        = 'jpg|png|jpeg';
            $config['file_name'] = $file_name;
     
            $this->upload->initialize($config);

            if(file_exists('assets/images/imageUpload/'.$cek_data->image)){
                unlink('assets/images/imageUpload/'.$cek_data->image);
                if ( ! $this->upload->do_upload('image')){

                    $result = array(
                        'status' => FALSE,
                        'respMessage' => 'Update Data Gagal'
                    );
                    
                    echo json_encode($result);
                }else{
                    $data = array(
                        'judul' => $this->input->post('judul'),
                        'isi' => $this->input->post('isi'),
                        'image' => $file_name,
                        'status' => $this->input->post('status'),
                        'updated_at' => date("Y-m-d H:m:s"),
                        'id_admin' =>   $this->session->all_userdata()['user']->id
                    );

                    $this->Sambutan_m->update_data($data,$where);
                    
                    $result = array(
                        'status' => TRUE,
                        'respMessage' => 'Update Data Berhasil'
                    );
                    
                    echo json_encode($result);
                }
            }
            
        }else{
            $data = array(
                'judul' => $this->input->post('judul'),
                'isi' => $this->input->post('isi'),
                'status' => $this->input->post('status'),
                'updated_at' => date("Y-m-d H:m:s"),
                'id_admin' =>   $this->session->all_userdata()['user']->id
            );

            $this->Sambutan_m->update_data($data,$where);

            $result = array(
                'status' => TRUE,
                'respMessage' => 'Update Data Berhasil'
            );
            
            echo json_encode($result);
        }
    }
}
