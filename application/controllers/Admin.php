<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('User');
		$this->load->model('Update_Akun');
		$this->load->model('Data_Toolkit');
		$this->load->helper('url');
	}

	public function tersedia()
	{

		$where_user = array(
			'nim' => $_SESSION['nim']
		);
		$data['user'] = $this->User->cek_login("user", $where_user)->result();
		$where_toolkit = array(
			'status' => '1'
		);
		$data['toolkit'] = $this->Data_Toolkit->toolkit_tersedia("toolkit", $where_toolkit)->result();
		// $data['toolkit'] = $this->Data_Toolkit->retrieve_where("toolkit", $where_toolkit)->result();
		$this->load->view('admin/sidebar', $data);
		$this->load->view('toolkit_tersediaa');
		$this->load->view('admin/footer');
	}
	public function dipinjam()
	{

		$where_user = array(
			'nim' => $_SESSION['nim']
		);
		$data['user'] = $this->User->cek_login("user", $where_user)->result();
		$where_toolkit = array(
			'status' => '2'
		);
		$data['toolkit'] = $this->Data_Toolkit->toolkit_tersedia("toolkit", $where_toolkit)->result();

		$this->load->view('admin/sidebar', $data);
		$this->load->view('toolkit_dipinjam', $data);
		$this->load->view('admin/footer');
	}
	public function edit()
	{
		$nim = $this->uri->segment(3, 0);
		$where = array('nim' => $_SESSION['nim']);
		$where_user = array(
			'nim' => $this->input->post('nim'),
			'nama' => $this->input->post('nama'),
			'alamat' => $this->input->post('alamat'),
			'nomor_hp' => $this->input->post('nomor_hp'),
			'access' => $this->input->post('access'),
		);
		if ($this->input->post('password')) $where_user['password'] = md5($this->input->post('password'));
		$this->Update_Akun->update_user('user', $where_user, $nim);
		$data['user'] = $this->User->cek_login("user", $where)->result();
		$data['user_all'] = $this->User->retrieve_user("user")->result();
		$this->load->view('admin/sidebar', $data);
		$this->load->view('kelola_akun_admin', $data);
		$this->load->view('admin/footer');
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
		$this->load->view('kelola_akun_admin', $data,);
		$this->load->view('admin/footer');
	}
	public function delet_akun()
	{
		$nim = $this->uri->segment(3, 0);
		$this->Update_Akun->delete('user', $nim);
		$this->update_admin();
	}
	public function riwayat_peminjaman()
	{



		$where = array(
			'nim' => $_SESSION['nim']
		);
		$data['user'] = $this->User->cek_login("user", $where)->result();
		$where1 = array(
			'status' => 5
		);

		$data['riwayat'] = $this->Data_Toolkit->riwayat_peminjaman("peminjaman", $where1)->result();



		$this->load->view('admin/header');
		$this->load->view('admin/sidebar', $data);
		$this->load->view('riwayat_peminjaman', $data,);
		$this->load->view('admin/footer');
	}
}
