<?php 
 
class Sambutan_m extends CI_Model{
	function get_data(){
		return $this->db->get('sambutan_kasek');
	}
    function get_berita(){
        return $this->db->get('sambutan_kasek');
    }
    function get_sambutan(){
        return $this->db->query('SELECT * FROM sambutan_kasek WHERE judul="Sambutan"');
    }
    function get_visi(){
        return $this->db->query('SELECT * FROM sambutan_kasek WHERE status="VisiMisi"');
    }
    function get_tentang(){
        return $this->db->query('SELECT * FROM sambutan_kasek WHERE status="Tentang"');
    }
    function get_sejarah(){
        return $this->db->query('SELECT * FROM sambutan_kasek WHERE status="Sejarah"');
    }
    function get_admin($where){
        return $this->db->get_where('users', $where);
    }
    function getByID($where){
        return $this->db->get_where('sambutan_kasek', $where);
    }
    function insert_data($data){
        $this->db->insert('sambutan_kasek', $data);
    }

    function update_data($data,$where){
        $this->db->where($where);
        $this->db->update('sambutan_kasek',$data);
    }
}