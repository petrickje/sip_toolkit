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
		$this->load->view('kelola_akun_admin');
		$this->load->view('admin/footer');

	}

	public function update_akun()
	{
		$nim= $this->input->post('nim');
		$where = array(
			
			'nama' => $this->input->post('nama'),
			'alamat' => $this->input->post('alamat'),
            'nomor_hp' => $this->input->post('nomor_hp'),
            'password' => md5($this->input->post('password'))
			);
		$data['user'] = $this->update_akun->update_user("user",$where,$nim);
		redirect('Welcome/homepage');

	}


}