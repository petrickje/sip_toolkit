<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('User');
		$this->load->model('Data_Toolkit');
	}

	public function index()
	{

		$this->load->view('Tampilan_awal');
	}
	public function login()
	{

		$this->load->view('login');
	}

	public function homepage()
	{
		$where_toolkit = array(
			'toolkit.status' => '1'
		);
		$data['toolkit'] = $this->Data_Toolkit->toolkit_tersedia("toolkit", $where_toolkit)->result();
		$where = array(
			'nim' => $_SESSION['nim']
		);
		$where1 = array(
			'access' => "1"
		);



		$data['user'] = $this->User->cek_login("user", $where)->result();
		$data['user_toolkit'] = $this->User->cek_login("user", $where1)->result();
		$this->load->view('user/header');
		$this->load->view('user/sidebar', $data);
		$this->load->view('user/toolkit_tersedia', $data);
		$this->load->view('user/footer');
	}

	public function Admin()
	{
		$where_toolkit = array();
		$data['toolkit'] = $this->Data_Toolkit->toolkit_tersedia("toolkit", $where_toolkit)->result();
		$where = array(
			'nim' => $_SESSION['nim']
		);


		$data['user'] = $this->User->cek_login("user", $where)->result();

		$this->load->view('admin/header');
		$this->load->view('admin/sidebar', $data);
		$this->load->view('dashboard_admin', $data);
		$this->load->view('admin/footer');
	}





	public function register()
	{
		$this->load->view('register');
	}
}
