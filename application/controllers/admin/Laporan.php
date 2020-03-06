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
  }

  public function daftar_hadir()
  {
    // Settings Data
    $q = $this->Home_model->get_all('id', 'settings', 'ASC');
    $setting_data = $q[0];

    $data_pemilih = $this->Home_model->get_all('id', 'data_pemilih', 'ASC');

    $data = array(
      "penyelenggara" => $setting_data->penyelenggara,
      "data_pemilih" => $data_pemilih,
      "start" => 0,
      "dataku" => array(
        "url" => site_url(),
      )
    );

    $this->load->view('back/laporan/daftar_hadir', $data);
  }
}

/* End of file Laporan.php */
/* Location: ./application/controllers/admin/Laporan.php */
