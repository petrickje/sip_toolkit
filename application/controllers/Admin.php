<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
       {
            parent::__construct();
            $this->load->helper('url');
			$this->load->model('User');
			$this->load->model('Data_Toolkit');
       }

	public function tersedia()
	{
		$where_toolkit=array(
			'status' => 'tersedia'
		);
		$where_user = array(
			'nim' => $_SESSION['nim']
			);
		$data['user'] = $this->User->cek_login("user",$where_user)->result();
		$data['toolkit'] = $this->Data_Toolkit->retrieve_where("toolkit",$where_toolkit)->result();
		$this->load->view('admin/sidebar', $data);
        $this->load->view('user/toolkit_tersedia', $data);
        $this->load->view('admin/footer');
        
	}
    public function dipinjam()
	{
		$where_toolkit=array(
			'status' => 'dipinjam'
		);
		$where_user = array(
			'nim' => $_SESSION['nim']
			);
		$data['user'] = $this->User->cek_login("user",$where_user)->result();
		$data['toolkit'] = $this->Data_Toolkit->retrieve_where("toolkit",$where_toolkit)->result();
		
		$this->load->view('admin/sidebar', $data);
        $this->load->view('toolkit_dipinjam', $data);
        $this->load->view('admin/footer');
        
	}

}