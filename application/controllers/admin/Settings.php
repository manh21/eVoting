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
    $this->load->model('Kandidat_model');
    $this->load->helper('url', 'language', 'form', 'file');

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
        $this->_rules();
        if ($this->form_validation->run() == true) {

            foreach ($_POST as $key => $val) {
                # cek ada tidak, kalo ada update
                $retrieve = $this->Setting_model->retrieve($key);
                if (!empty($retrieve)) {
                    $this->Setting_model->update($key, $val);
                } else {
                    $this->Setting_model->create($key, $val);
                }
            }

            // Check and create folder
            if (!is_dir(get_path_file())) {
                mkdir(get_path_file(), 0777, true);
            }

            # untuk upload gambar
            foreach ($_FILES as $key => $val) {
                if (!empty($val['tmp_name'])) {
                    $config = array();
                    $config['upload_path']   = get_path_file();
                    $config['allowed_types'] = 'jpg|jpeg|png|gif';
                    $config['file_name']     = $key;
                    $this->load->library('upload', $config);
                    $this->upload->initialize($config);

                    if ($this->upload->do_upload($key)) {
                        # hapus file sebelumnya
                        $old_file = get_pengaturan($key, 'value');
                        if (is_file(get_path_file($old_file))) {
                            unlink(get_path_file($old_file));
                        }

                        $upload_data = $this->upload->data();

                        $retrieve = $this->Setting_model->retrieve($key);
                        if (!empty($retrieve)) {
                            $this->Setting_model->update($key, $upload_data['file_name']);
                        } else {
                            $this->Setting_model->create($key, $upload_data['file_name']);
                        }
                    }
                }
            }

            $this->session->set_flashdata('settings', successAlert('success', 'Pengaturan berhasil diperbaharui.'));
            redirect('admin/settings');
        }
        
        $this->load->view('back/settings');
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
        $this->Setting_model->update_pemilih('id', $id, 'data_pemilih', $data);
        
        $this->Kandidat_model->reset_jumlah_suara();
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
    $this->form_validation->set_rules('site_name', 'site_name', 'trim');
    $this->form_validation->set_rules('site_title', 'site_title', 'trim');
    $this->form_validation->set_rules('site_description', 'site_description', 'trim');

    $this->form_validation->set_rules('id', 'id', 'trim');
    $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
  }
}


/* End of file Settings.php */
/* Location: ./application/controllers/admin/ Settings.php */
