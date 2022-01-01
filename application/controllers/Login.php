<?php
class Login extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('Users');
    }


    function login()
    {
        $nim = $this->input->post('nim');
        $password = $this->input->post('password');
        $where = array(
            'nim' => $nim,
            'password' => md5($password)
        );
        $data['users'] = $this->Users->cek_login("users", $where)->result();

        if ($data['users']) {

            foreach ($data['users'] as $row) {
                $approval = $row->approval;
            }
            if ($approval == "0") {
                $this->session->set_flashdata('message', 'Akun anda belum di approve!');
                redirect('Welcome/login');
            } else {


                $data_session = array(
                    'nim' => $nim,

                );

                $this->session->set_userdata($data_session);

                if ($access == "1") {
                    redirect('Welcome/admin');
                } else {
                    redirect('Welcome/homepage');
                }
            }
        } else {
            // echo "Username dan password salah !";
            $this->session->set_flashdata('message', 'Login Failed! ');
            redirect('Welcome/login');
        }
    }

    // function register()
    // {
    //     $nim = $this->input->post('nim');
    //     $nama = $this->input->post('nama');
    //     $nomor_hp = $this->input->post('nomor_hp');
    //     $alamat = $this->input->post('alamat');
    //     $password = $this->input->post('password');
    //     $data = array(
    //         'nim' => $nim,
    //         'password' => md5($password),
    //         'nama' => $nama,
    //         'nomor_hp' => $nomor_hp,
    //         'alamat' => $alamat,
    //         'access' => '2'
    //     );
    //     $this->User->input_user("user", $data);
    //     redirect(base_url());
    // }


    function register()
    {
        $nim = $this->input->post('nim');
        $nama = $this->input->post('nama');
        $nomor_hp = $this->input->post('nomor_hp');
        $alamat = $this->input->post('alamat');
        $password = $this->input->post('password');

        // This is Library for uploading image
        // Don`t forget to give "writing access" to your "upload/ktm" directory 
        // If youre using Linux, do this command "sudo chmod 777 -R /var/www/html/beritacoding/upload/ktm/"
        $file_name = $nim . "-" . $nama . "-KTM"; // for more complex name, please use time() method to create your file_name (if you need)
        $config['upload_path']          = FCPATH . '/upload/ktm/';
        $config['allowed_types']        = 'gif|jpg|jpeg|png';
        $config['file_name']            = $file_name;
        $config['overwrite']            = true;

        // Load your library : Read the docs here https://codeigniter.com/userguide3/libraries/file_uploading.html
        $this->load->library('upload', $config);
        // uploading your file
        $this->upload->do_upload('ktm');
        // preparation for save
        $uploaded_data = $this->upload->data();

        if ($uploaded_data['file_size'] > 500) {
            $this->session->set_flashdata('xwu', 'Ukuran gambar melebih kapasitas ');
            redirect('Welcome/register');
        } else {
            $data = array(
                'nim' => $nim,
                'password' => md5($password),
                'nama' => $nama,
                'nomor_hp' => $nomor_hp,
                'alamat' => $alamat,
                'access' => '2',
                'approval' => '0',
                'ktm' => $uploaded_data['file_name'],
            );
            // var_dump($data);
            // die;

            $this->Users->input_users("users", $data);
            redirect(base_url('Welcome/login'));
        }

        // merge into $data array to save

        // need to validate in case it will throw an error


        // incase you need to read the image, use this :
        // $images = FCPATH . '/upload/ktm/'. $data['ktm']; OR  $images = base_url('upload/ktm' . $data['ktm']);
    }

    function logout()
    {
        $this->session->sess_destroy();
        redirect(base_url('Welcome/login'));
    }
}
