<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct()
       {
            parent::__construct();
            $this->load->helper('url');
			$this->load->model('User');
			$this->load->model('Data_Toolkit');
       }

	public function index()
	{
		
		$this->load->view('login');
	}

	public function homepage()
	{
		$where_toolkit=array(
			'status' => 'tersedia'
		);
		$data['toolkit'] = $this->Data_Toolkit->retrieve_where("toolkit",$where_toolkit)->result();
		$where = array(
			'nim' => $_SESSION['nim']
			);
		$data['user'] = $this->User->cek_login("user",$where)->result();
		$this->load->view('user/header');
		    $this->load->view('user/sidebar', $data);
            $this->load->view('user/toolkit_tersedia',$data);
            $this->load->view('user/footer');
	}

	public function Admin()
	{
		$where = array(
			'nim' => $_SESSION['nim']
			);
		$data['user'] = $this->User->cek_login("user",$where)->result();
		$data['toolkit'] = $this->Data_Toolkit->retrieve_data("toolkit")->result();
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
