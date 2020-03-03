<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Userauth extends CI_Controller
{

    /**
     * Index Page for this controller.
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->library('form_validation', 'session');
        $this->load->helper('url', 'language');
        $this->load->model('Userauth_model');
    }

    public function index()
    {
        // Security check if the user is alreadey logged in
        if (cek_login_bol()) {
            redirect(base_url());
        } else {
            $data['title'] = 'E-Voting';
            $data['identity'] = [
                'name' => 'username',
                'id' => 'username',
                'type' => 'text',
                'class' => 'form-control',
                'placeholder' => 'Username',
            ];
            $data['password'] = [
                'name' => 'password',
                'id' => 'password',
                'type' => 'password',
                'class' => 'form-control',
                'placeholder' => 'Password',
            ];
            $data['action'] = site_url('user/Userauth/login');
            $this->load->view('front/login', $data);
        }
    }

    public function login()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters("", "");

        $this->form_validation->set_rules('username', 'username', 'required');
        $this->form_validation->set_rules('password', 'password', 'required');

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-danger alert-dismissible"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>' . validation_errors() . '</div>'
            );
            redirect('user/Userauth', 'refresh');
        } else {

            // Define var dari login.php
            $username = $this->input->post('username');
            $password = $this->input->post('password');

            // data dari models
            $q_data = $this->Userauth_model->akses($username, $password);
            $a_data = $q_data->row();

            // Apakah user ada atau tidak
            if ($q_data->num_rows() > 0) {

                // Cek user apakah sudah aktif
                if ($a_data->aktif == 1) {

                    // data pada user
                    $data_login = $q_data->row_array();
                    $ses_nama_user = $a_data->nama;

                    // Session data
                    $userdata             = array(
                        "logged"               => true,
                        "userid"               => $data_login['id'],
                        "username"             => $data_login['username'],
                        "nama"                 => $data_login['nama'],
                        "level"                => 'siswa',
                        "status"               => $data_login['status'],
                        "aktif"                => $data_login['aktif'],
                    );

                    // set session user data
                    $this->session->set_userdata($userdata);
                    $this->session->set_flashdata(
                        'message',
                        '<div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        Login Berhasil </div>'
                    );

                    redirect('vote', 'refresh');
                } else {

                    // Username dan password tidak ditemukan
                    $this->session->set_flashdata(
                        'message',
                        '<div class="alert alert-warning alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        User belum aktif </div>'
                    );

                    // Directed to login page
                    redirect('user/Userauth', 'refresh');
                }
            } else {

                // Username dan password tidak ditemukan
                $this->session->set_flashdata(
                    'message',
                    '<div class="alert alert-warning alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    Username Atau Password Salah </div>'
                );

                // Directed to login page
                redirect('user/Userauth', 'refresh');
            }
        }
    }

    public function logout()
    {
        $userdata = array(
            "logged"               => false,
            "userid"               => "",
            "username"             => "",
            "nama"                 => "",
            "level"                => "",
            "status"               => "",
            "aktif"                => "",
        );
        $this->session->set_userdata($userdata);

        // Directed to login page
        redirect(base_url(), 'refresh');
    }
}

/* End of file Userauth.php */
