<?php 
 
class Berita_m extends CI_Model{
    function get_berita(){
        return $this->db->get('berita');
    }
    function get_admin($where){
        return $this->db->get_where('users', $where);
    }
    function getByID($where){
        return $this->db->get_where('berita', $where);
    }
    function insert_data($data){
        $this->db->insert('berita', $data);
    }

    function update_data($data,$where){
        $this->db->where($where);
        $this->db->update('berita',$data);
    }


    function get_galeri_limit(){
        return $this->db->query('SELECT * FROM berita WHERE status="Active" ORDER BY id DESC LIMIT 5');
    }

    function get_galeri(){
        return $this->db->query('SELECT * FROM berita WHERE status="Active" ORDER BY id DESC');
    }

    function get_data_active(){
        return $this->db->query('SELECT * FROM berita WHERE status="Active" ORDER BY id DESC');
      }
}
