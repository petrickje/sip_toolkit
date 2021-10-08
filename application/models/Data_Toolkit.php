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
	function update_toolkit($table, $data, $id_peminjaman){
		$this->db->where('id_peminjaman', $id_peminjaman);
		$this->db->update($table, $data);
		
	}
	function toolkit_saya($table,$where1){		
		return $this->db->get_where($table,$where1);
		

	}	
	function toolkit_update($table,$setuju,$id_toolkit){
		$this->db->where('id_toolkit', $id_toolkit);
		$this->db->update($table, $setuju);
	}
}