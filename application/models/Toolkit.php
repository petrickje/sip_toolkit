<?php

class Toolkit extends CI_Model
{


	function input_toolkit($table, $data)
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

	function peminjaman($table, $data)
	{
		$this->db->insert($table, $data);
	}
	function update_toolkit($table, $data, $id_peminjaman)
	{
		$this->db->where('id_peminjaman', $id_peminjaman);
		$this->db->update($table, $data);
	}
	function toolkit_saya($table, $where1)
	{
		return $this->db->get_where($table, $where1,);
	}
	function toolkit_permintaan($table, $where2,)
	{
		return $this->db->get_where($table, $where2,);
	}
	function R_peminjaman($table, $data)
	{
		return $this->db->get_where($table, $data);
	}

	function toolkit_update($table, $setuju, $id_toolkit)
	{
		$this->db->where('id_toolkit', $id_toolkit);
		$this->db->update($table, $setuju);
	}

	function toolkit_tersedia($table, $status)
	{
		$this->db->select('toolkit.id,toolkit.status_toolkit, toolkit.isi_toolkit, users.nomor_hp, users.nama, users.alamat,toolkit.pemegang_id');
		$this->db->from($table);
		$this->db->join('users', 'users.nim = toolkit.pemegang_id', 'left');
		$this->db->where($status);
		$query = $this->db->get();
		return $query;
	}


	function daftar_peminjaman($table, $where)
	{
		$this->db->select('peminjaman.id, peminjaman.id_peminjam, peminjaman.waktu_pinjam, peminjaman.toolkit_id, peminjaman.status,
		users.nim, users.alamat, users.nama, users.nomor_hp, peminjaman.resi_peminjaman');
		$this->db->from($table);
		$this->db->join('users', 'users.nim = peminjaman.id_peminjam', 'left');
		$this->db->where($where);
		$this->db->order_by('peminjaman.waktu_pinjam', 'DESC');

		$query = $this->db->get();
		return $query;
	}
	function riwayat_peminjaman($table, $where,)
	{
		$this->db->select('peminjaman.id_peminjaman, peminjaman.id_peminjam, peminjaman.waktu_kembali,peminjaman.id_pemegang,peminjaman.waktu_pinjam,peminjaman.resi_pengembalian, peminjaman.id_toolkit, peminjaman.status,
		user.nim, user.alamat, user.nama, user.nomor_hp, peminjaman.resi_peminjaman');
		$this->db->from($table);
		$this->db->join('user', 'user.nim = peminjaman.id_peminjam', 'left');
		$this->db->where($where);
		$this->db->order_by('peminjaman.waktu_pinjam', 'DESC');


		$query = $this->db->get();
		return $query;
	}
	function riwayat_peminjaman_all($table)
	{
		$this->db->select('peminjaman.id_peminjaman, peminjaman.id_peminjam, peminjaman.waktu_kembali,peminjaman.id_pemegang,peminjaman.waktu_pinjam,peminjaman.resi_pengembalian, peminjaman.id_toolkit, peminjaman.status,
		user.nim, user.alamat, user.nama, user.nomor_hp, peminjaman.resi_peminjaman');
		$this->db->from($table);
		$this->db->join('user', 'user.nim = peminjaman.id_peminjam', 'left');
		$this->db->order_by('peminjaman.waktu_pinjam', 'DESC');


		$query = $this->db->get();
		return $query;
	}
	function delete_toolkit($tables, $id_toolkit)
	{
		$this->db->where('id_toolkit', $id_toolkit);
		$this->db->delete($tables);
	}
}
