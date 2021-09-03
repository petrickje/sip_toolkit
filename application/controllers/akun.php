<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Akun extends CI_Controller {

	public function __construct()
       {
            parent::__construct();
            $this->load->helper('url');
			$this->load->model('User');
	        $this->load->model('update_akun');
       }

	

	public function update()
	{
		$where = array(
			'nim' => $_SESSION['nim']
			);
		$data['user'] = $this->User->cek_login("user",$where)->result();
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
		$data['user'] = $this->User->cek_login("user",$where)->result();
		$data['user_all'] = $this->User->retrieve_user("user")->result();
		$this->load->view('admin/header');
		$this->load->view('admin/sidebar', $data);
		$this->load->view('kelola_akun_admin',$data);
		$this->load->view('admin/footer');

	}

	


}