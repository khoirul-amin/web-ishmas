<?php 
 
class Banner_m extends CI_Model{
	function get_banner($where){
		return $this->db->get_where('banner', $where);
    }
    
    function banner_data($data,$where){
      $this->db->where($where);
      $this->db->update('users',$data);
    }
    function get_all_banner(){
        return $this->db->get('banner');
    }
    function insert_data($data){
        $this->db->insert('banner', $data);
    }
    function getByID($where){
        return $this->db->get_where('banner', $where);
    }

    function update_data($data,$where){
      $this->db->where($where);
      $this->db->update('banner',$data);
    }

    function get_banner_active(){
      return $this->db->query('SELECT * FROM banner WHERE status="Active"');
    }

}