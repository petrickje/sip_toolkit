<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Toolkit extends CI_Controller {

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
		$data['user'] = $this->User->cek_login("user",$where)->result();
		$this->load->view('admin/header');
		$this->load->view('admin/sidebar', $data);
		$this->load->view('pendaftaran_toolkit');
		$this->load->view('admin/footer');

	}

	public function aksi_tambah()
	{
		
		$where = array(
			'isi_toolkit' => $this->input->post('isi_toolkit'),
			'status' => $this->input->post('status'),
			'alamat' => $this->input->post('alamat'),
			);
		$data['toolkit'] = $this->Data_Toolkit->input_toolkit("toolkit",$where);
		redirect('Welcome/admin');

	}


}
