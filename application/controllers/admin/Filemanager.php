<?php

defined('BASEPATH') or exit('No direct script access allowed');

class filemanager extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        // Security check if the user is admin
        if (!$this->ion_auth->logged_in()) {
            // redirect them to the login page
            redirect('admin/auth/login', 'refresh');
        } else if (!$this->ion_auth->is_admin()) // remove this elseif if you want to enable this for non-admins
        {   // redirect them to the home page because they must be an administrator to view this
            show_error('You must be an administrator to view this page.');
        }
    }

    public function index()
    {
        $this->load->view('back/filemanager');
    }

    function elfinder_init()
    {
        $this->load->helper('my_helper');
        $opts = initialize_elfinder();
        $this->load->library('elfinder_lib', $opts);
    }
}

/* End of file filemanager.php */
