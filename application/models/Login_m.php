<?php 
 
class Login_m extends CI_Model{
	function get_login($where){
		return $this->db->get_where('users', $where);
    }
    
    function update_data($data,$where){
		$this->db->where($where);
		$this->db->update('users',$data);
    }
}