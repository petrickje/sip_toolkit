<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Akun extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('Users');
		$this->load->model('Toolkit');
	}



	public function update()
	{
		$where = array(
			'nim' => $_SESSION['nim']
		);
		$data['users'] = $this->Users->cek_login("users", $where)->result();
		$data['users_all'] = $this->Users->retrieve_users("users")->result();
		$this->load->view('users/header');
		$this->load->view('users/sidebar', $data);
		$this->load->view('kelola_akun');
		$this->load->view('users/footer');
	}

	public function update_admin()
	{
		$where = array(
			'nim' => $_SESSION['nim']
		);
		$data['user'] = $this->User->cek_login("user", $where)->result();
		$data['user_all'] = $this->User->retrieve_user("user")->result();
		$this->load->view('admin/header');
		$this->load->view('admin/sidebar', $data);
		$this->load->view('kelola_akun_admin', $data);
		$this->load->view('admin/footer');
	}
	public function updateAkun()
	{
		$nim = $this->uri->segment(3, 0);
		$where = array('nim' => $_SESSION['nim']);
		$where_user = array(
			'nim' => $this->input->post('nim'),
			'nama' => $this->input->post('nama'),
			'alamat' => $this->input->post('alamat'),
			'nomor_hp' => $this->input->post('nomor_hp'),

		);
		$this->Users->update_user('users', $where_user, $nim);
		if ($this->input->post('password')) {
			$where_user['password'] = md5($this->input->post('password'));
			$this->Users->update_user('users', $where_user, $nim);
			$data['users'] = $this->Users->cek_login("users", $where)->result();
		}
		redirect('/Akun/update');
	}
	public function toolkit_saya()
	{
		$nim = $_SESSION['nim'];
		$where = array(
			'nim' => $_SESSION['nim']
		);
		$data['users'] = $this->Users->cek_login("users", $where)->result();
		$where1 = array(
			'id_peminjam' => $_SESSION['nim']
		);

		$data['toolkit'] = $this->Toolkit->daftar_peminjaman("peminjaman", $where1)->result();



		$where2 = array(
			'id_pemegang' => $_SESSION['nim'],
			'status ' => '1'
		);

		$data['peminjaman'] = $this->Toolkit->daftar_peminjaman("peminjaman", $where2)->result();

		$this->load->view('users/header');
		$this->load->view('users/sidebar', $data);
		$this->load->view('users/toolkit_saya', $data);
		$this->load->view('users/footer');
	}
	public function disetujui()
	{
		$id_peminjaman = $this->uri->segment(3, 0);
		$where = array(
			'status' => 3,

		);
		$this->Data_Toolkit->update_toolkit("peminjaman", $where, $id_peminjaman);
		$where = array(
			'id_pemegang' => $_SESSION['nim'],
		);
		$id_toolkit = $this->input->post('id_toolkit');
		$this->Data_Toolkit->toolkit_update("toolkit", $where, $id_toolkit);
		redirect('akun/toolkit_saya');
	}

	public function dikembalikan()
	{

		$id_peminjaman = $this->uri->segment(3, 0);
		$where = array(
			'status' => 4,
			'resi_pengembalian' => $this->input->post('resikembali')
		);
		$this->Data_Toolkit->update_toolkit("peminjaman",  $where, $id_peminjaman);
		redirect('akun/toolkit_saya');
	}

	public function diselesaikan()
	{
		$id_peminjaman = $this->uri->segment(3, 0);
		$where = array(
			'status' => 5
		);
		$this->Data_Toolkit->update_toolkit("peminjaman", $where, $id_peminjaman);


		$where1 = array(
			'status' => 1,
		);
		$id_toolkit = $this->input->post('id_toolkit');
		$this->Data_Toolkit->toolkit_update("toolkit", $where1, $id_toolkit);
		redirect('akun/toolkit_saya');
	}
}
