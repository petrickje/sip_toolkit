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
	public function peminjaman()
	{
		$where = array(
			'id_peminjam' => $_SESSION['nim'],
			'id_toolkit' => $this->input->post('id_toolkit'),
			'id_pemegang' => $this->input->post('pemegang'),
			);
		$this->Data_Toolkit->peminjaman("pengajuan",$where);
		
		 redirect('Welcome/homepage');

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
	public function form_peminjaman()

	{

		$where1 = array(
			'nim' => $_SESSION['nim']
			);
	$data = $this->User->cek_login("user",$where1)->result();
	
	$where = array(
		'peminjam' => $_SESSION['nim'],
		'nama'=> $this->input->post('nama'),
		'id_toolkit' => $this->input->post('id_toolkit'),
		'alamat' => $this->input->post('alamat'),
		'waktu_kembali'=>'null',
		'status'=> 1

		);
				
	$this->Data_Toolkit->peminjaman("peminjaman",$where);
	$id_toolkit = $this->uri->segment(3, 0);
	$setuju = array(
		'status'=> 'dipinjam'

		);
	$this->Data_Toolkit->toolkit_update("toolkit",$setuju,$id_toolkit);

	
	 redirect('Welcome/homepage');

	 
}  
public function daftar_form_peminjaman(){
	$nim = $this->uri->segment(3, 0);
	$where = array('nim' => $_SESSION['nim']);
	$data['user'] = $this->User->cek_login("user",$where)->result();
	$where_toolkit=array(
		'status' => '1'
	);
	$data['peminjaman'] = $this->Data_Toolkit->retrieve_where("peminjaman",$where_toolkit)->result();
	$this->load->view('admin/sidebar', $data);
	$this->load->view('daftar_pengajuan', $data);
	$this->load->view('admin/footer');
 }
 public function penyetujuan()
 {
	$id_peminjaman = $this->uri->segment(3, 0);
	 $where = array(
		 'status'=> 2
	 );
	 $this->Data_Toolkit->update_toolkit("peminjaman",$where, $id_peminjaman);
	 
	 redirect('toolkit/daftar_form_peminjaman');
	 # code...
 }
 public function penolakan()
 {
	$id_peminjaman = $this->uri->segment(3, 0);
	 $where = array(
		 'status'=> 3
	 );
	 $this->Data_Toolkit->update_toolkit("peminjaman",$where, $id_peminjaman);
	 redirect('toolkit/daftar_form_peminjaman');
	 # code...
 }
} 
