<?php 
 
class Kalender_m extends CI_Model{


	function get_data(){
    return $this->db->get('kalender');
  }
  function getByID($where){
    return $this->db->get_where('kalender', $where);
  }

  function update_data($data,$where){
    $this->db->where($where);
    $this->db->update('kalender',$data);
  }

  function insert_data($data){
    $this->db->insert('kalender', $data);
  }


}