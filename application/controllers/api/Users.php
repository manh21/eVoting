<?php
defined('BASEPATH') or exit('No direct script access allowed');

// Use RESTFul API server
use chriskacerguis\RestServer\RestController;


class Users extends RestController
{

    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->load->model('Api_model');
    }

    /**
     * User Login API
     * --------------------
     * @param: username or nis
     * @param: password
     * --------------------------
     * @method : POST
     * @link: api/user/login
     */

    public function login_post()
    {
        header("Access-Control-Allow-Origin: *");

        # XSS Filtering (https://www.codeigniter.com/user_guide/libraries/security.html)
        $_POST = $this->security->xss_clean($_POST);

        # Form Validation
        $this->form_validation->set_rules('username', 'username', 'trim|required');
        $this->form_validation->set_rules('password', 'password', 'trim|required|max_length[100]');
        if ($this->form_validation->run() == FALSE) {
            // Form Validation Errors
            $message = array(
                'status' => false,
                'error' => $this->form_validation->error_array(),
                'message' => validation_errors()
            );

            $this->response($message, 404);
        } else {
            // Load Login Function
            $output = $this->Api_model->user_login($this->input->post('username'), $this->input->post('password'));
            if (!empty($output) and $output != FALSE) {

                // Cek user sudah aktif atau belum
                if ($output->aktif == 0) {
                    // Login Error
                    $message = [
                        'status' => false,
                        'message' => "User tidak aktif"
                    ];
                    $this->response($message, 401);
                } else {

                    // Load Authorization Token Library
                    $this->load->library('Authorization_Token');

                    // Generate Token
                    $token_data['id'] = $output->id;
                    $token_data['nama'] = $output->nama;
                    $token_data['username'] = $output->username;
                    $token_data['status'] = $output->status;
                    $token_data['aktif'] = $output->aktif;
                    $token_data['level'] = "siswa";
                    $token_data['time'] = time();

                    $user_token = $this->authorization_token->generateToken($token_data);

                    $return_data = [
                        'userid'    => $output->id,
                        'nama'      => $output->nama,
                        'status'    => $output->status,
                        'aktif'     => $output->aktif,
                        "level"     => 'siswa',
                        'token'     => $user_token,
                    ];

                    // Login Success
                    $message = [
                        'status' => true,
                        'data' => $return_data,
                        'message' => "User login successful"
                    ];
                    $this->response($message, 200);
                }
            } else {
                // Login Error
                $message = [
                    'status' => false,
                    'message' => "Invalid Username or Password"
                ];
                $this->response($message, 404);
            }
        }
    }
}
