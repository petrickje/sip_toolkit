<?php
class Login extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('User');
    }


    function login()
    {
        $nim = $this->input->post('nim');
        $password = $this->input->post('password');
        $where = array(
            'nim' => $nim,
            'password' => md5($password)
        );
        $data['user'] = $this->User->cek_login("user", $where)->result();

        if ($data['user']) {

            foreach ($data['user'] as $row) {
                $access = $row->access;
            }

            $data_session = array(
                'nim' => $nim,

            );

            $this->session->set_userdata($data_session);

            if ($access == "1") {
                redirect('Welcome/admin');
            } else {
                redirect('Welcome/homepage');
            }
        } else {
            echo "Username dan password salah !";
        }
    }

    function register()
    {
        $nim = $this->input->post('nim');
        $nama = $this->input->post('nama');
        $nomor_hp = $this->input->post('nomor_hp');
        $alamat = $this->input->post('alamat');
        $password = $this->input->post('password');
        $data = array(
            'nim' => $nim,
            'password' => md5($password),
            'nama' => $nama,
            'nomor_hp' => $nomor_hp,
            'alamat' => $alamat,
            'access' => '2'
        );
        $this->User->input_user("user", $data);
        redirect(base_url());
    }

    function logout()
    {
        $this->session->sess_destroy();
        redirect(base_url());
    }
}
