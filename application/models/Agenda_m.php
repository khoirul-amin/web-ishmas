<?php 
 
class Agenda_m extends CI_Model{


	function get_data(){
    return $this->db->get('agenda');
  }
  function getByID($where){
    return $this->db->get_where('agenda', $where);
  }

  function update_data($data,$where){
    $this->db->where($where);
    $this->db->update('agenda',$data);
  }

  function insert_data($data){
    $this->db->insert('agenda', $data);
  }


}