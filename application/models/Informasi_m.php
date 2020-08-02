<?php 
 
class Informasi_m extends CI_Model{


	function get_informasi(){
    return $this->db->get('informasi');
  }
  function get_admin($where){
    return $this->db->get_where('users', $where);
  }
    
  function getByID($where){
    return $this->db->get_where('informasi', $where);
  }

  function update_data($data,$where){
    $this->db->where($where);
    $this->db->update('informasi',$data);
  }

  function insert_data($data){
    $this->db->insert('informasi', $data);
  }

  function jumlah_data(){
    return $this->db->get('informasi')->num_rows();
  }

  function get_data_limit(){
		return  $this->db->query('SELECT * FROM informasi WHERE status="Active" LIMIT 3');
  }

  function get_data(){
		return  $this->db->query('SELECT * FROM informasi WHERE status="Active"');		
	}
}