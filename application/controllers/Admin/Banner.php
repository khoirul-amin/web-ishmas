<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Banner extends CI_Controller {
	function __construct(){
		parent::__construct();		
		$this->load->model('Banner_m');
        // $this->load->helper('url');
    }

    public function index()
	{
		$get_session = $this->session->all_userdata();
		if(count($get_session) == 1){
			redirect(base_url("Login"));
		}else{
			$this->load->view('admin/banner');
		}
	}

	public function get_datatables(){
		$result = $this->Banner_m->get_all_banner()->result();
		$data = array();

		foreach($result as $result){
			$col = array();

			$col[] ='<td><b>ID Banner :</b>'.$result->id.'</td>'; 
			$col[] ='<td><b>Images :</b>'.$result->images.'</td>'; 
			$col[] ='<td><b>Judul :</b>'.$result->images.'<br/><b>Deskripsi :</b>'.$result->desk.'</td>';
			$col[] ='<td><b>Status :</b>'.$result->status.'<br/><b>Created At :</b>'.$result->created_at.'<br/><b>Updated At</b>'.$result->updated_at.'</td>';
			$col[] = "<td>
				<button type='button' class='btn btn-danger btn-sm pt-2 pb-2'>
					<i class='fas fa-trash-alt'></i>
				</button>
				<button type='button' onclick=\"setModalInformasi('$result->id')\" 
					class='btn btn-warning btn-sm pt-2 pb-2'
					data-toggle='modal' data-target='#modalView'>
					<i class='fas fa-eye'></i>
				</button>
				<button type='button'
					onclick=\"updateInformasi('$result->id')\"
					class='btn btn-success btn-sm pt-2 pb-2'
					data-toggle='modal' data-target='#modalForm'> 
					<i class='fas fa-pencil-alt'></i>
				</button>
				</td>";
			$data[] = $col;
		}

		$output = array(
            "data" => $data,
        );
        echo json_encode($output);
	}

	public function insertData(){

        $this->load->library('upload');
        $this->load->helper('file');

        $nama_banner = 'Banner-'.date("Y-m-d_h:m:s");

        $tipe_image = pathinfo($_FILES["images"]["name"], PATHINFO_EXTENSION);
        $file_name =  $nama_banner.'.'.$tipe_image;

		$config['upload_path']          = 'assets/images/imageUpload';
		$config['allowed_types']        = 'jpg|png|jpeg';
        $config['file_name'] = $file_name;
 
        $this->upload->initialize($config);
 
		if ( ! $this->upload->do_upload('images')){
            $result = array(
                'status' => FALSE,
                'respMessage' => 'Tambah Data Gagal'
            );
            
		    echo json_encode($result);
		}else{

            $data = array(
                'title' => $this->input->post('title'),
                'desk' => $this->input->post('desk'),
                'images' => $file_name,
                'status' => $this->input->post('status'),
                'created_at' => date("Y-m-d H:m:s")
            );

            $this->Banner_m->insert_data($data);
            
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

        $cek_data = $this->Banner_m->getByID($where)->result()[0];

        if($_FILES["images"]["name"]){

            $this->load->library('upload');
            $this->load->helper('file');
    
            $nama_banner = 'Banner-'.date("Y-m-d_h:m:s");
    
            $tipe_image = pathinfo($_FILES["images"]["name"], PATHINFO_EXTENSION);
            $file_name =  $nama_banner.'.'.$tipe_image;
    
            $config['upload_path']          = 'assets/images/imageUpload';
            $config['allowed_types']        = 'jpg|png|jpeg';
            $config['file_name'] = $file_name;
     
            $this->upload->initialize($config);

            if(file_exists('assets/images/imageUpload/'.$cek_data->images)){
                unlink('assets/images/imageUpload/'.$cek_data->images);
                if ( ! $this->upload->do_upload('images')){

                    $result = array(
                        'status' => FALSE,
                        'respMessage' => 'Update Data Gagal'
                    );
                    
                    echo json_encode($result);
                }else{
                    $data = array(
						'title' => $this->input->post('title'),
						'desk' => $this->input->post('desk'),
						'images' => $file_name,
						'status' => $this->input->post('status'),
						'updated_at' => date("Y-m-d H:m:s")
                    );

                    $this->Banner_m->update_data($data,$where);
                    
                    $result = array(
                        'status' => TRUE,
                        'respMessage' => 'Update Data Berhasil'
                    );
                    
                    echo json_encode($result);
                }
            }
            
        }else{
            $data = array(
				'title' => $this->input->post('title'),
				'desk' => $this->input->post('desk'),
				// 'images' => $file_name,
				'status' => $this->input->post('status'),
				'updated_at' => date("Y-m-d H:m:s")
            );

            $this->Banner_m->update_data($data,$where);

            $result = array(
                'status' => TRUE,
                'respMessage' => 'Update Data Berhasil'
            );
            
            echo json_encode($result);
        }
	}
	

	public function getByID($id){
		$where = array( 'id' => $id );

		$result = $this->Banner_m->getByID($where)->result();

		return $this->output->set_output(json_encode($result[0]));
	}
}