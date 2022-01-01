<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('Users');
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
			'toolkit.status_toolkit' => '1'
		);
		$data['toolkit'] = $this->Data_Toolkit->toolkit_tersedia("toolkit", $where_toolkit)->result();
		$where = array(
			'nim' => $_SESSION['nim']
		);
		$where1 = array(
			'access' => "1"
		);



		$data['users'] = $this->Users->cek_login("users", $where)->result();
		$data['users_toolkit'] = $this->Users->cek_login("users", $where1)->result();
		$this->load->view('users/header');
		$this->load->view('users/sidebar', $data);
		$this->load->view('users/toolkit_tersedia', $data);
		$this->load->view('users/footer');
	}

	public function Admin()
	{
		$where_toolkit = array();
		$data['toolkit'] = $this->Data_Toolkit->toolkit_tersedia("toolkit", $where_toolkit)->result();
		$where = array(
			'nim' => $_SESSION['nim']
		);


		$data['users'] = $this->Users->cek_login("users", $where)->result();

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
