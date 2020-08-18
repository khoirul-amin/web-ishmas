<?php 
 
class Guru_m extends CI_Model{
    function get_data_limit(){
        return $this->db->query('SELECT * FROM guru LIMIT 5');
    }
    function get_data(){
        return $this->db->get('guru');
    }
    function getByID($where){
        return $this->db->get_where('guru', $where);
    }
    function insert_data($data){
        $this->db->insert('guru', $data);
    }
    function update_data($data,$where){
        $this->db->where($where);
        $this->db->update('guru',$data);
    }
}