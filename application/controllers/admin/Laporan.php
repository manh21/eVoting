<?php
defined('BASEPATH') or exit('No direct script access allowed');


/**
 *
 * Controller Laporan
 *
 * This controller for laporan
 *
 * @package   CodeIgniter
 * @category  Controller CI
 *
 */

class Laporan extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->library('ion_auth', 'form_validation', 'session');
    $this->load->helper('url', 'language');
    $this->load->model('Home_model');
  }

  public function index()
  {
    if (!$this->ion_auth->logged_in()) {
      // redirect them to the login page
      redirect('admin/auth/login', 'refresh');
    } else if (!$this->ion_auth->is_admin()) // remove this elseif if you want to enable this for non-admins
    {   // redirect them to the home page because they must be an administrator to view this
      show_error('You must be an administrator to view this page.');
    }

    // Settings Data
    $q = $this->Home_model->get_all('id', 'settings', 'ASC');
    $setting_data = $q[0];

    $data = array(
      'setting_data' => $setting_data,
      'start' => 0,
    );

    // Load View
    $this->load->view('back/laporan/model_c', $data);
  }

  public function model_c1()
  {
    // Security check if the user is admin
    if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin()) {
      redirect('admin/auth', 'refresh');
    }

    // Settings Data
    $q = $this->Home_model->get_all('id', 'settings', 'ASC');
    $setting_data = $q[0];

    $data = array(
      'setting_data' => $setting_data,
      'start' => 0,
    );

    // Load View
    $this->load->view('back/laporan/model_c1', $data);
  }
}

/* End of file Laporan.php */
/* Location: ./application/controllers/admin/Laporan.php */
