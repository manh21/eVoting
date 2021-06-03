<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Controller Settings
 */
class Settings extends CI_Controller
{

  /**
   * Constructor
   * 
   * @return  void
   */
  public function __construct()
  {
    parent::__construct();
    $this->load->library('ion_auth', 'form_validation', 'session', 'form_helper');
    $this->load->model('Setting_model');
    $this->load->helper('url', 'language', 'form', 'file');

    // Security check if the user is admin
    if (!$this->ion_auth->logged_in()) {
      // redirect them to the login page
      redirect('admin/auth/login', 'refresh');
    } 
    else if (!$this->ion_auth->is_admin()) // remove this elseif if you want to enable this for non-admins
    {   
      // redirect them to the home page because they must be an administrator to view this
      show_error('You must be an administrator to view this page.');
    }
  }

  public function index()
  {
    $q = $this->Setting_model->get_all('id', 'settings', 'ASC');
    $row = $q[0];

    $mulai = DateTime::createFromFormat('Y-m-d H:i:s', $row->mulai)->format('d/m/Y H:i');
    $selesai = DateTime::createFromFormat('Y-m-d H:i:s', $row->selesai)->format('d/m/Y H:i');

    $data = [
      'action'        => site_url('admin/settings/update_action'),
      'button'        => 'Save Changes',
      'id'            => set_value('id', $row->id),
      'penyelenggara' => set_value('penyelenggara', $row->penyelenggara),
      'tps'           => set_value('tps', $row->tps),
      'provinsi'      => set_value('provinsi', $row->provinsi),
      'kota'          => set_value('kota', $row->kota),
      'kecamatan'     => set_value('kecamatan', $row->kecamatan),
      'kelurahan'     => set_value('kelurahan', $row->kelurahan),
      'alamat'        => set_value('alamat', $row->alamat),
      'mulai'         => set_value('mulai', $mulai),
      'selesai'       => set_value('selesai', $selesai),
    ];

    // Load View
    $this->load->view('back/settings', $data);
  }

  public function update_action()
  {
    // Set Rules
    $this->_rules();

    // Validation
    if(!$this->form_validation->run()) return $this->index();

    $waktu = preg_split('/-/',$this->input->post('waktu_pemilihan'));
    $mulai = DateTime::createFromFormat('d/m/Y H:i', trim($waktu[0]))->format('Y-m-d H:i:s');
    $selesai = DateTime::createFromFormat('d/m/Y H:i', trim($waktu[1]))->format('Y-m-d H:i:s');

    $data = [
      'id'            => $this->input->post('id', TRUE),
      'penyelenggara' => $this->input->post('penyelenggara', TRUE),
      'tps'           => $this->input->post('tps', TRUE),
      'provinsi'      => $this->input->post('provinsi', TRUE),
      'kota'          => $this->input->post('kota', TRUE),
      'kecamatan'     => $this->input->post('kecamatan', TRUE),
      'kelurahan'     => $this->input->post('kelurahan', TRUE),
      'alamat'        => $this->input->post('alamat', TRUE),
      'mulai'         => $mulai,
      'selesai'       => $selesai,
    ];

    $this->Setting_model->update('id', $this->input->post('id', TRUE), 'settings', $data);
    $this->session->set_flashdata(
      'message',
      '<div class="alert alert-info alert-dismissible">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      <h4><i class="icon fa fa-info"></i> Alert!</h4>
      Update Record Success </div>'
    );
    return redirect('admin/settings', 'refresh');
  }

  public function reset_data_pemilih()
  {
    $this->Setting_model->empty_table('data_pemilih');
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
    $this->Setting_model->empty_table('kandidat');
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
    $this->Setting_model->empty_table('kelas');
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
    $this->Setting_model->empty_table('data_pemilihan');
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
    $this->form_validation->set_rules('tps', 'tps', 'trim|required');
    $this->form_validation->set_rules('provinsi', 'provinsi', 'trim|required');
    $this->form_validation->set_rules('kota', 'kota', 'trim|required');
    $this->form_validation->set_rules('kecamatan', 'kecamatan', 'trim|required');
    $this->form_validation->set_rules('kelurahan', 'kelurahan', 'trim|required');
    $this->form_validation->set_rules('alamat', 'alamat', 'trim|required');
    $this->form_validation->set_rules('waktu_pemilihan', 'waktu_pemilihan', 'trim|required');

    $this->form_validation->set_rules('id', 'id', 'trim');
    $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
  }
}


/* End of file Settings.php */
/* Location: ./application/controllers/admin/ Settings.php */
