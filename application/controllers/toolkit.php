<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Toolkit extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('User');
		$this->load->model('Data_Toolkit');
	}



	public function pendaftaran()
	{
		$where = array(
			'nim' => $_SESSION['nim']
		);
		$data['user'] = $this->User->cek_login("user", $where)->result();
		$this->load->view('admin/header');
		$this->load->view('admin/sidebar', $data);
		$this->load->view('pendaftaran_toolkit');
		$this->load->view('admin/footer');
	}
	public function peminjaman()
	{
		$where = array(
			'id_peminjam' => $_SESSION['nim'],
			'id_toolkit' => $this->input->post('id_toolkit'),
			'id_pemegang' => $this->input->post('pemegang'),
		);
		$this->Data_Toolkit->peminjaman("pengajuan", $where);

		redirect('Welcome/homepage');
	}

	public function aksi_tambah()
	{

		$where = array(
			'isi_toolkit' => $this->input->post('isi_toolkit'),
			'status' => '1',
			'created_at' => date("Y-m-d"),
			'id_pemegang' => $_SESSION['nim'],
		);
		$data['toolkit'] = $this->Data_Toolkit->input_toolkit("toolkit", $where);
		redirect('Welcome/admin');
	}
	public function form_peminjaman()

	{
		$id_toolkit = $this->uri->segment(3, 0);
		$where1 = array(
			'nim' => $_SESSION['nim']
		);
		$data['user'] = $this->User->cek_login("user", $where1)->result();

		$where = array(
			'id_peminjam' => $_SESSION['nim'],
			'id_toolkit' => $id_toolkit,
			'status' => 1,
			'id_pemegang' => $this->input->post('id_pemegang'),
		);

		$this->Data_Toolkit->peminjaman("peminjaman", $where);


		$setuju = array(
			'status' => '2',

		);
		$this->Data_Toolkit->toolkit_update("toolkit", $setuju, $id_toolkit);


		redirect('Welcome/homepage');
	}
	public function daftar_form_peminjaman()
	{
		$where = array('nim' => $_SESSION['nim']);
		$data['user'] = $this->User->cek_login("user", $where)->result();

		$where_toolkit = array(
			'id_pemegang' => $_SESSION['nim'],
			'status ' => '1'
		);

		$data['peminjaman'] = $this->Data_Toolkit->daftar_peminjaman("peminjaman", $where_toolkit)->result();
		$where_selesai = array(
			'status ' => '4'

		);

		$data['selesai'] = $this->Data_Toolkit->daftar_peminjaman("peminjaman", $where_selesai)->result();


		$this->load->view('admin/sidebar', $data);
		$this->load->view('daftar_pengajuan', $data);
		$this->load->view('admin/footer');
	}
	public function penyetujuan()
	{
		$id_peminjaman = $this->uri->segment(3, 0);
		$where = array(
			'status' => 2,
			'resi_peminjaman' => $this->input->post('resi')
		);
		$this->Data_Toolkit->update_toolkit("peminjaman", $where, $id_peminjaman);

		redirect('toolkit/daftar_form_peminjaman');
		# code...
	}
	public function penyetujuanu()
	{
		$id_peminjaman = $this->uri->segment(3, 0);
		$where = array(
			'status' => 2,
			'resi_peminjaman' => $this->input->post('resi')
		);
		$this->Data_Toolkit->update_toolkit("peminjaman", $where, $id_peminjaman);
		$id_toolkit = $this->input->post('id_toolkit');
		$data = array(
			'status' => '2'

		);
		$this->Data_Toolkit->toolkit_update("toolkit", $data, $id_toolkit);
		redirect('toolkit/toolkit_saya');
		# code...
	}
	public function penolakan()
	{
		$id_peminjaman = $this->uri->segment(3, 0);
		$where = array(
			'status' => 6
		);
		$this->Data_Toolkit->update_toolkit("peminjaman", $where, $id_peminjaman);
		$id_toolkit = $this->input->post('id_toolkit');
		$data = array(
			'status' => '1'

		);
		$this->Data_Toolkit->toolkit_update("toolkit", $data, $id_toolkit);
		redirect('toolkit/daftar_form_peminjaman');
		# code...
	}
	public function penolakanu()
	{
		$id_peminjaman = $this->uri->segment(3, 0);
		$where = array(
			'status' => 6,

		);
		$this->Data_Toolkit->update_toolkit("peminjaman", $where, $id_peminjaman);
		$id_toolkit = $this->input->post('id_toolkit');
		$data = array(
			'status' => '1'

		);
		$this->Data_Toolkit->toolkit_update("toolkit", $data, $id_toolkit);
		redirect('toolkit/toolkit_saya');
		# code...
	}
	public function selesai()
	{

		$id_peminjaman = $this->uri->segment(3, 0);
		$where = array(
			'waktu_kembali' => date("Y-m-d"),
			'status' => 5
		);
		$this->Data_Toolkit->update_toolkit("peminjaman", $where, $id_peminjaman);
		$id_toolkit = $this->uri->segment(3, 0);
		$setuju = array(
			'status' => '1',
			'id_pemegang' => $_SESSION['nim'],

		);
		$this->Data_Toolkit->toolkit_update("toolkit", $setuju, $id_toolkit);
		redirect('toolkit/daftar_form_peminjaman');
		# code...
	}
}
