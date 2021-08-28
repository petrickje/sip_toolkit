<?php 
 
class Update_akun extends CI_Model{	


	function input_user($table,$data){		
		$this->db->insert($table, $data);
	}	
	function retrieve_data($table){		
		return $this->db->get($table);
	}	

	function retrieve_where($table,$where){		
		return $this->db->get_where($table,$where);
	}	
    function update_user($table,$where,$nim){		
		$this->db->where('nim', $nim);
        $this->db->update($table, $where);
	}
}