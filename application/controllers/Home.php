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

		$result = $this->Informasi_m->get_data_limit()->result();
		$berita = $this->Berita_m->get_galeri_limit()->result();
		$literasi = $this->Literasi_m->get_galeri_limit()->result();

		$data['sambutan'] = $this->Sambutan_m->get_data()->result();

		$row = array();
		$rowberita = array();

		foreach($result as $informasi){
			$where = array(
				"id" => $informasi->id_admin
			);
			$admin = $this->Informasi_m->get_admin($where)->result()[0];

			$col = array();

			$col['id'] = $informasi->id;
			$col['id_admin'] = $admin->id;
			$col['nama_admin'] = $admin->nama;
			// $col['image'] = $informasi->image;
			$col['judul'] = $informasi->judul;
			$col['isi'] = $informasi->isi;
			$col['status'] = $informasi->status;
			$col['created_at'] = $this->generateDate($informasi->created_at);
			$col['updated_at'] = $informasi->updated_at;

			$row[] = $col;
		};
		foreach($berita as $berita){
			$where = array(
				"id" => $berita->id_admin
			);
			$admin = $this->Berita_m->get_admin($where)->result()[0];

			$col1 = array();

			$col1['id'] = $berita->id;
			$col1['id_admin'] = $admin->id;
			$col1['nama_admin'] = $admin->nama;
			$col1['judul'] = $berita->judul;
			$col1['image'] = $berita->image;
			$col1['isi'] = $berita->isi;
			$col1['ket'] = 'Berita';
			$col1['status'] = $berita->status;
			$col1['created_at'] = $this->generateDate($berita->created_at);
			$col1['updated_at'] = $berita->updated_at;

			$rowberita[] = $col1;
		};
		foreach($literasi as $literasi){
			$where = array(
				"id" => $literasi->id_admin
			);
			$admin = $this->Berita_m->get_admin($where)->result()[0];

			$col1 = array();

			$col1['id'] = $literasi->id;
			$col1['id_admin'] = $admin->id;
			$col1['nama_admin'] = $admin->nama;
			$col1['judul'] = $literasi->judul;
			$col1['image'] = $literasi->image;
			$col1['isi'] = $literasi->isi;
			$col1['ket'] = 'Literasi';
			$col1['status'] = $literasi->status;
			$col1['created_at'] = $this->generateDate($literasi->created_at);
			$col1['updated_at'] = $literasi->updated_at;

			$rowberita[] = $col1;
		};
		$data['informasi'] = json_decode(json_encode($row), FALSE);
		$data['berita'] = json_decode(json_encode($rowberita), FALSE);
		$data['galeri'] = $this->Berita_m->get_galeri_limit()->result();
		$data['galeri1'] = $this->Literasi_m->get_galeri_limit()->result();
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
			$col['image'] = $informasi->image;
			$col['judul'] = $informasi->judul;
			$col['isi'] = $informasi->isi;
			$col['status'] = $informasi->status;
			$col['created_at'] = $this->generateDate($informasi->created_at);
			$col['updated_at'] = $informasi->updated_at;

			$row[] = $col;
		};
		$data['informasi'] = json_decode(json_encode($row), FALSE);
		$data['pengumuman'] = $this->Informasi_m->get_data_limit()->result();
		$data['list_informasi'] = $this->Berita_m->get_galeri_limit()->result();
		$data['galeri'] = $this->Berita_m->get_galeri_limit()->result();
		$data['galeri1'] = $this->Literasi_m->get_galeri_limit()->result();
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
			$col['image'] = $informasi->image;
			$col['isi'] = $informasi->isi;
			$col['status'] = $informasi->status;
			$col['created_at'] = $this->generateDate($informasi->created_at);
			$col['updated_at'] = $informasi->updated_at;

			$row[] = $col;
		};
		$data['informasi'] = json_decode(json_encode($row), FALSE);
		$data['pengumuman'] = $this->Informasi_m->get_data_limit()->result();
		$data['list_informasi'] = $this->Berita_m->get_galeri_limit()->result();
		$data['galeri'] = $this->Berita_m->get_galeri_limit()->result();
		$data['galeri1'] = $this->Literasi_m->get_galeri_limit()->result();
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
		$data['pengumuman'] = $this->Informasi_m->get_data_limit()->result();
		$data['list_informasi'] = $this->Berita_m->get_galeri_limit()->result();
		$data['galeri'] = $this->Berita_m->get_galeri_limit()->result();
		$data['galeri1'] = $this->Literasi_m->get_galeri_limit()->result();

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
		$data['pengumuman'] = $this->Informasi_m->get_data_limit()->result();
		$data['list_informasi'] = $this->Berita_m->get_galeri_limit()->result();
		$data['galeri'] = $this->Berita_m->get_galeri_limit()->result();
		$data['galeri1'] = $this->Literasi_m->get_galeri_limit()->result();

		$this->load->view('landing/view_artikel', $data);
	}

	public function galeri(){
		$data['literasi'] = $this->Literasi_m->get_data_active()->result(); 
		$data['berita'] = $this->Berita_m->get_data_active()->result();
		$data['pengumuman'] = $this->Informasi_m->get_data_limit()->result();
		$data['list_informasi'] = $this->Berita_m->get_galeri_limit()->result();
		$data['galeri'] = $this->Berita_m->get_galeri_limit()->result();
		$data['galeri1'] = $this->Literasi_m->get_galeri_limit()->result();
		$this->load->view('landing/galeri', $data);
	}

	function generateDate($data){
		$date = strtotime($data);
		$newformat = date('d-M-Y',$date);
		return $newformat;
	}

}
