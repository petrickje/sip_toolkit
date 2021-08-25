<?php 
 
class User extends CI_Model{	
	function cek_login($table,$where){		
		return $this->db->get_where($table,$where);
	}	

    function input_user($table,$data){		
		$this->db->insert($table, $data);
	}	
}