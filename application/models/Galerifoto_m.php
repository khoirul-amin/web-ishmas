<?php 
 
class Galerifoto_m extends CI_Model{
    function get_all_data(){
        return $this->db->get('galeri_foto');
    }
    function insert_data($data){
        $this->db->insert('galeri_foto', $data);
    }
    function getByID($where){
        return $this->db->get_where('galeri_foto', $where);
    }
    function update_data($data,$where){
      $this->db->where($where);
      $this->db->update('galeri_foto',$data);
    }
}
