<?php 
 
class Galerividio_m extends CI_Model{
    function get_all_data(){
        return $this->db->get('galeri_vidio');
    }
    function insert_data($data){
        $this->db->insert('galeri_vidio', $data);
    }
    function getByID($where){
        return $this->db->get_where('galeri_vidio', $where);
    }
    function update_data($data,$where){
      $this->db->where($where);
      $this->db->update('galeri_vidio',$data);
    }
}
