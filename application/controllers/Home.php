<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	function __construct(){
		parent::__construct();		
		$this->load->model('Sambutan_m');
		$this->load->model('Informasi_m');
		$this->load->model('Berita_m');
		$this->load->model('Banner_m');
		$this->load->model('Literasi_m');
        // $this->load->helper('url');
	}


	public function index()
	{

		$result = $this->Informasi_m->get_data()->result();

		$data['sambutan'] = $this->Sambutan_m->get_data()->result();

		$row = array();

		foreach($result as $informasi){
			$where = array(
				"id" => $informasi->id_admin
			);
			$admin = $this->Informasi_m->get_admin($where)->result()[0];

			$col = array();

			$col['id'] = $informasi->id;
			$col['id_admin'] = $admin->id;
			$col['nama_admin'] = $admin->nama;
			$col['judul'] = $informasi->judul;
			$col['isi'] = $informasi->isi;
			$col['status'] = $informasi->status;
			$col['created_at'] = $this->generateDate($informasi->created_at);
			$col['updated_at'] = $informasi->updated_at;

			$row[] = $col;
		};
		$data['informasi'] = json_decode(json_encode($row), FALSE);
		$data['galeri'] = $this->Berita_m->get_galeri()->result();
		$data['banner'] = $this->Banner_m->get_banner_active()->result();
		$data['banner1'] = $this->Banner_m->get_banner_active()->result();

		$this->load->view('landing/index', $data);
	}


	function viewInformasi($id){
		$where = array( 'id' => $id );

		$informasi = $this->Informasi_m->getByID($where)->result();
		$where = array(
			"id" => $informasi[0]->id_admin
		);
		$admin = $this->Informasi_m->get_admin($where)->result()[0];

		$col = array();

		$col['id'] = $informasi[0]->id;
		$col['id_admin'] = $admin->id;
		$col['nama_admin'] = $admin->nama;
		$col['judul'] = $informasi[0]->judul;
		$col['isi'] = $informasi[0]->isi;
		$col['status'] = $informasi[0]->status;
		$col['created_at'] = $this->generateDate($informasi[0]->created_at);
		$col['updated_at'] = $informasi[0]->updated_at;

		$data['informasi'] = json_decode(json_encode($col), FALSE);
		$data['sambutan'] = $this->Sambutan_m->get_data()->result();

		$this->load->view('landing/view_informasi', $data);
	}

	public function sambutan(){
		$data['sambutan'] = $this->Sambutan_m->get_data()->result();

		$this->load->view('landing/view_sambutan', $data);

	}
	public function profil(){
		 
		$data['tentang'] = $this->Sambutan_m->get_tentang()->result()[0];
		$data['visimisi'] = $this->Sambutan_m->get_visi()->result()[0];
		$this->load->view('landing/visi_misi', $data);
	}
	public function sejarah(){
		$data['sejarah'] = $this->Sambutan_m->get_sejarah()->result()[0];
		$data['visimisi'] = $this->Sambutan_m->get_visi()->result()[0];
		$this->load->view('landing/sejarah', $data);
	}
	public function berita(){
		$result = $this->Berita_m->get_data_active()->result();
		$row = array();

		foreach($result as $informasi){
			$where = array(
				"id" => $informasi->id_admin
			);
			$admin = $this->Informasi_m->get_admin($where)->result()[0];

			$col = array();

			$col['id'] = $informasi->id;
			$col['id_admin'] = $admin->id;
			$col['nama_admin'] = $admin->nama;
			$col['judul'] = $informasi->judul;
			$col['isi'] = $informasi->isi;
			$col['status'] = $informasi->status;
			$col['created_at'] = $this->generateDate($informasi->created_at);
			$col['updated_at'] = $informasi->updated_at;

			$row[] = $col;
		};
		$data['informasi'] = json_decode(json_encode($row), FALSE);
		$data['list_informasi'] = json_decode(json_encode($row), FALSE);
		$this->load->view('landing/berita',$data);
	}

	public function literasi(){
		$result = $this->Literasi_m->get_data_active()->result();
		$row = array();

		foreach($result as $informasi){
			$where = array(
				"id" => $informasi->id_admin
			);
			$admin = $this->Informasi_m->get_admin($where)->result()[0];

			$col = array();

			$col['id'] = $informasi->id;
			$col['id_admin'] = $admin->id;
			$col['nama_admin'] = $admin->nama;
			$col['judul'] = $informasi->judul;
			$col['isi'] = $informasi->isi;
			$col['status'] = $informasi->status;
			$col['created_at'] = $this->generateDate($informasi->created_at);
			$col['updated_at'] = $informasi->updated_at;

			$row[] = $col;
		};
		$data['informasi'] = json_decode(json_encode($row), FALSE);
		$data['list_informasi'] = json_decode(json_encode($row), FALSE);
		$this->load->view('landing/literasi',$data);
	}

	public function viewBerita($id){
		$where = array( 'id' => $id );

		$informasi = $this->Berita_m->getByID($where)->result();
		$where = array(
			"id" => $informasi[0]->id_admin
		);
		$admin = $this->Informasi_m->get_admin($where)->result()[0];

		$col = array();

		$col['id'] = $informasi[0]->id;
		$col['id_admin'] = $admin->id;
		$col['image'] = $informasi[0]->image;
		$col['nama_admin'] = $admin->nama;
		$col['judul'] = $informasi[0]->judul;
		$col['isi'] = $informasi[0]->isi;
		$col['status'] = $informasi[0]->status;
		$col['created_at'] = $this->generateDate($informasi[0]->created_at);
		$col['updated_at'] = $informasi[0]->updated_at;

		$data['informasi'] = json_decode(json_encode($col), FALSE);
		$data['sambutan'] = $this->Sambutan_m->get_data()->result();

		$this->load->view('landing/view_artikel', $data);
	}
	public function viewLiterasi($id){
		$where = array( 'id' => $id );

		$informasi = $this->Literasi_m->getByID($where)->result();
		$where = array(
			"id" => $informasi[0]->id_admin
		);
		$admin = $this->Informasi_m->get_admin($where)->result()[0];

		$col = array();

		$col['id'] = $informasi[0]->id;
		$col['id_admin'] = $admin->id;
		$col['nama_admin'] = $admin->nama;
		$col['image'] = $informasi[0]->image;
		$col['judul'] = $informasi[0]->judul;
		$col['isi'] = $informasi[0]->isi;
		$col['status'] = $informasi[0]->status;
		$col['created_at'] = $this->generateDate($informasi[0]->created_at);
		$col['updated_at'] = $informasi[0]->updated_at;

		$data['informasi'] = json_decode(json_encode($col), FALSE);
		$data['sambutan'] = $this->Sambutan_m->get_data()->result();

		$this->load->view('landing/view_artikel', $data);
	}

	public function galeri(){
		$data['literasi'] = $this->Literasi_m->get_data_active()->result(); 
		// $data['kegiatan'] =; 
		$data['berita'] = $this->Berita_m->get_data_active()->result();
		$this->load->view('landing/galeri', $data);
	}

	function generateDate($data){
		$date = strtotime($data);
		$newformat = date('d-M-Y',$date);
		return $newformat;
	}

}
