<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     *	- or -
     * 		http://example.com/index.php/welcome/index
     *	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->library('ion_auth', 'form_validation', 'session');
        $this->load->helper('url', 'language');
        $this->load->model('Home_model');
    }

    public function index()
    {
        // Security check if the user logged in
        if (!cek_login_bol()) {
            // redirect them to the login page
            redirect('user/userAuth', 'refresh');
        }

        $data = array(
            'title' => 'E-Voting',
        );

        $this->load->view('front/home', $data);
    }

    public function vote()
    {
        // Security check if the user is admin
        if (!cek_login_bol()) {
            redirect('user/userAuth', 'refresh');
        }

        $this->load->view('front/vote');
    }
}

/* End of file home.php */
