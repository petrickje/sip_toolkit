<?php 
 
class Data_Toolkit extends CI_Model{	


	function input_toolkit($table,$data){		
		$this->db->insert($table, $data);
	}	
	function retrieve_data($table){		
		return $this->db->get($table);
	}	

	function retrieve_where($table,$where){		
		return $this->db->get_where($table,$where);
	}	
	
	function peminjaman($table,$data){		
		$this->db->insert($table, $data);
	}	
}