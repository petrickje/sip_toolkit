<?php

class Users extends CI_Model
{
	function cek_login($table, $where)
	{
		return $this->db->get_where($table, $where);
	}

	function input_users($table, $data)
	{
		$this->db->insert($table, $data);
	}
	function retrieve_users($table)
	{
		return $this->db->get($table);
	}
	function input_user($table, $data)
	{
		$this->db->insert($table, $data);
	}
	function retrieve_data($table)
	{
		return $this->db->get($table);
	}

	function retrieve_where($table, $where)
	{
		return $this->db->get_where($table, $where);
	}

	function update_user($table, $where, $nim)
	{
		$this->db->where('nim', $nim);
		$this->db->update($table, $where);
	}
	function delete($tables, $nim)
	{
		$this->db->where('nim', $nim);
		$this->db->delete($tables);
	}
}
