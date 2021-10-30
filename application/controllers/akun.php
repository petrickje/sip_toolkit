<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Akun extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('User');
		$this->load->model('update_akun');
		$this->load->model('Data_Toolkit');
	}



	public function update()
	{
		$where = array(
			'nim' => $_SESSION['nim']
		);
		$data['user'] = $this->User->cek_login("user", $where)->result();
		$data['user_all'] = $this->User->retrieve_user("user")->result();
		$this->load->view('user/header');
		$this->load->view('user/sidebar', $data);
		$this->load->view('kelola_akun');
		$this->load->view('user/footer');
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

	public function toolkit_saya()
	{
		$nim = $_SESSION['nim'];
		$where = array(
			'nim' => $_SESSION['nim']
		);
		$data['user'] = $this->User->cek_login("user", $where)->result();
		$where1 = array(
			'id_peminjam' => $_SESSION['nim']
		);

		$data['toolkit'] = $this->Data_Toolkit->daftar_peminjaman("peminjaman", $where1)->result();



		$where2 = array(
			'id_pemegang' => $_SESSION['nim'],
			'status ' => '1'
		);

		$data['peminjaman'] = $this->Data_Toolkit->daftar_peminjaman("peminjaman", $where2)->result();

		$this->load->view('user/header');
		$this->load->view('user/sidebar', $data);
		$this->load->view('user/toolkit_saya', $data);
		$this->load->view('user/footer');
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
			'resi_pengembalian' => $this->input->post('resi')
		);
		$this->Data_Toolkit->update_toolkit("peminjaman", $id_peminjaman, $where);
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
