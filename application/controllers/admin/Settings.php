<?php
defined('BASEPATH') or exit('No direct script access allowed');


/**
 *
 * Controller Settings
 *
 */

class Settings extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->library('ion_auth', 'form_validation', 'session', 'form_helper');
    $this->load->model('Setting_model');
    $this->load->helper('url', 'language', 'form', 'file');
  }

  public function index()
  {
    // Security Check
    if (!$this->ion_auth->logged_in()) {
      // redirect them to the login page
      redirect('admin/auth/login', 'refresh');
    } else if (!$this->ion_auth->is_admin()) // remove this elseif if you want to enable this for non-admins
    {   // redirect them to the home page because they must be an administrator to view this
      show_error('You must be an administrator to view this page.');
    }

    $q = $this->Setting_model->get_all('id', 'settings', 'ASC');
    $row = $this->Setting_model->get_by_id('id', $q[0]->id, 'settings');

    $data = array(
      'action' => base_url('admin/settings/update_action'),
      'button' => 'Save Changes',
      'id' => set_value('id', $row->id),
      'penyelenggara' => set_value('penyelenggara', $row->penyelenggara)
    );

    // Load View
    $this->load->view('back/settings', $data);;
  }

  public function update_action()
  {
    // Security check if the user is admin
    if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin()) {
      redirect('admin/auth', 'refresh');
    }

    $this->_rules();

    if ($this->form_validation->run() == FALSE) {
      $this->index();
    } else {
      $data = array(
        'id' => $this->input->post('id', TRUE),
        'penyelenggara' => $this->input->post('penyelenggara', TRUE)
      );

      $this->Setting_model->update('id', $this->input->post('id', TRUE), 'settings', $data);
      $this->session->set_flashdata(
        'message',
        '<div class="alert alert-info alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h4><i class="icon fa fa-info"></i> Alert!</h4>
        Update Record Success </div>'
      );
      redirect('admin/settings', 'refresh');
    }
  }

  public function reset_data_pemilih()
  {
    // Security check if the user is admin
    if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin()) {
      redirect('admin/auth', 'refresh');
    }

    $this->Setting_model->emtpy_table('data_pemilih');
    $this->session->set_flashdata(
      'message',
      '<div class="alert alert-info alert-dismissible">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      <h4><i class="icon fa fa-info"></i> Alert!</h4>
      Reset Record Success </div>'
    );
    redirect('admin/settings', 'refresh');
  }

  public function reset_data_kandidat()
  {
    // Security check if the user is admin
    if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin()) {
      redirect('admin/auth', 'refresh');
    }

    $this->Setting_model->emtpy_table('kandidat');
    $this->session->set_flashdata(
      'message',
      '<div class="alert alert-info alert-dismissible">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      <h4><i class="icon fa fa-info"></i> Alert!</h4>
      Reset Record Success </div>'
    );
    redirect('admin/settings', 'refresh');
  }

  public function reset_data_kelas()
  {
    // Security check if the user is admin
    if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin()) {
      redirect('admin/auth', 'refresh');
    }

    $this->Setting_model->emtpy_table('kelas');
    $this->session->set_flashdata(
      'message',
      '<div class="alert alert-info alert-dismissible">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      <h4><i class="icon fa fa-info"></i> Alert!</h4>
      Reset Record Success </div>'
    );
    redirect('admin/settings', 'refresh');
  }

  public function reset_pemilihan()
  {
    // Security check if the user is admin
    if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin()) {
      redirect('admin/auth', 'refresh');
    }

    $this->Setting_model->emtpy_table('data_pemilihan');
    $pemilihData = $this->Setting_model->get_all('id', 'data_pemilih', 'ASC');

    if (!empty($pemilihData)) {
      foreach ($pemilihData as $pemilih) {
        $id = $pemilih->id;
        $data = array(
          'status' => 'Belum Memilih'
        );

        // Update Database
        $this->Setting_model->update('id', $id, 'data_pemilih', $data);
      }
    }

    $this->session->set_flashdata(
      'message',
      '<div class="alert alert-info alert-dismissible">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      <h4><i class="icon fa fa-info"></i> Alert!</h4>
      Reset Record Success </div>'
    );
    redirect('admin/settings', 'refresh');
  }

  public function _rules()
  {
    $this->form_validation->set_rules('penyelenggara', 'penyelenggara', 'trim|required');

    $this->form_validation->set_rules('id', 'id', 'trim');
    $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
  }
}


/* End of file Settings.php */
/* Location: ./application/controllers/Settings.php */
