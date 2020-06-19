<?php 
 
class Literasi_m extends CI_Model{
    function get_berita(){
        return $this->db->get('literasi');
    }
    function get_admin($where){
        return $this->db->get_where('users', $where);
    }
    function getByID($where){
        return $this->db->get_where('literasi', $where);
    }
    function insert_data($data){
        $this->db->insert('literasi', $data);
    }

    function update_data($data,$where){
        $this->db->where($where);
        $this->db->update('literasi',$data);
    }

    function get_data_active(){
        return $this->db->query('SELECT * FROM literasi WHERE status="Active" ORDER BY id DESC');
      }
}
