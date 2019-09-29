<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Data_pemilih extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->library('ion_auth', 'form_validation', 'session', 'form_helper');
        $this->load->helper('url', 'language');
        $this->load->model('Data_pemilih_model');
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

        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));

        if ($q <> '') {
            $config['base_url'] = base_url() . 'data_pemilih/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'data_pemilih/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'data_pemilih/index.html';
            $config['first_url'] = base_url() . 'data_pemilih/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Data_pemilih_model->total_rows($q);
        $data_pemilih = $this->Data_pemilih_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'data_pemilih_data' => $data_pemilih,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('back/data_pemilih/data_pemilih_list', $data);
    }

    public function read($id)
    {
        // Security check if the user is admin
        if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin()) {
            redirect('admin/auth', 'refresh');
        }

        $row = $this->Data_pemilih_model->get_by_id($id);
        $getKelas = $this->Data_pemilih_model->getKelas_by_idkelas($id);

        if ($row) {
            $data = array(
                'id' => $row->id,
                'nis' => $row->nis,
                'username' => $row->username,
                'password' => $row->password,
                'nama' => $row->nama,
                'kelas' => $getKelas->kelas,
                'idkelas' => $row->idkelas,
                'jk' => $row->jk,
                'status' => $row->status,
                'aktif' => $row->aktif,
            );
            $this->load->view('back/data_pemilih/data_pemilih_read', $data);
        } else {
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-warning alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-warning"></i> Alert!</h4>
                Record Not Found </div>'
            );
            redirect('admin/pemilih', 'refresh');
        }
    }

    public function create()
    {
        // Security check if the user is admin
        if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin()) {
            redirect('admin/auth', 'refresh');
        }
        $data = array(
            'button' => 'Create',
            'action' => site_url('admin/data_pemilih/create_action'),
            'id' => set_value('id'),
            'nis' => set_value('nis'),
            'username' => set_value('username'),
            'password' => set_value('password'),
            'nama' => set_value('nama'),
            'kelas' => set_value('kelas'),
            'idkelas' => set_value('idkelas'),
            'jk' => set_value('jk'),
            'status' => set_value('status'),
            'aktif' => set_value('aktif'),
            'dd_kelas' => $this->Data_pemilih_model->kelasDropdown(),
            'kelas_selected' => $this->input->post('kelas') ? $this->input->post('kelas') : '', // untuk edit ganti '' menjadi data dari database misalnya $row->kelas
        );
        $this->load->view('back/data_pemilih/data_pemilih_form', $data);
    }

    public function create_action()
    {
        // Security check if the user is admin
        if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin()) {
            redirect('admin/auth', 'refresh');
        }

        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $getKelas = $this->Data_pemilih_model->getKelas($this->input->post('kelas'));

            $data = array(
                'nis' => $this->input->post('nis', TRUE),
                'username' => $this->input->post('username', TRUE),
                'password' => $this->input->post('password', TRUE),
                'nama' => $this->input->post('nama', TRUE),
                'kelas' => $getKelas->kelas,
                'idkelas' => $this->input->post('kelas'),
                'jk' => $this->input->post('jk', TRUE),
                'status' => 'Belum Memilih',
                'aktif' => '1',
            );

            $this->Data_pemilih_model->insert($data);
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-check"></i> Success!</h4>
                Create Record Success. </div>'
            );
            redirect('admin/pemilih', 'refresh');
        }
    }

    public function edit($id)
    {
        // Security check if the user is admin
        if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin()) {
            redirect('admin/auth', 'refresh');
        }

        $row = $this->Data_pemilih_model->get_by_id($id);
        $getKelas = $this->Data_pemilih_model->getKelas($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('admin/data_pemilih/update_action'),
                'id' => set_value('id', $row->id),
                'nis' => set_value('nis', $row->nis),
                'username' => set_value('username', $row->username),
                'password' => set_value('password', $row->password),
                'nama' => set_value('nama', $row->nama),
                'kelas' => set_value('kelas', $row->kelas),
                'idkelas' => set_value('idkelas', $row->idkelas),
                'jk' => set_value('jk', $row->jk),
                'status' => set_value('status', $row->status),
                'aktif' => set_value('aktif', $row->aktif),
                'dd_kelas' => $this->Data_pemilih_model->kelasDropdown(),
                'kelas_selected' => $this->input->post('kelas') ? $this->input->post('kelas') : $row->idkelas, // untuk edit ganti '' menjadi data dari database misalnya $row->kelas    
            );
            $this->load->view('back/data_pemilih/data_pemilih_form', $data);
        } else {
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-warning alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-warning"></i> Alert!</h4>
                Record Not Found </div>'
            );
            redirect('admin/pemilih', 'refresh');
        }
    }

    /**
     * Deactivate the user
     *
     * @param int|string|null $id The user ID
     */
    public function deactivate($id)
    {
        // Security check if the user is admin
        if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin()) {
            redirect('admin/auth', 'refresh');
        }

        $id = (int) $id;

        $data = array(
            'aktif' => '0',
        );

        $this->Data_pemilih_model->update($id, $data);
        $this->session->set_flashdata(
            'message',
            '<div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="icon fa fa-check"></i> Success!</h4>
            Berhasil menonaktifkan pemilih. </div>'
        );
        redirect('admin/pemilih', 'refresh');
    }

    /**
     * Activate the user
     *
     * @param int|string|null $id The user ID
     */
    public function Activate($id)
    {
        // Security check if the user is admin
        if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin()) {
            redirect('admin/auth', 'refresh');
        }

        $id = (int) $id;

        $data = array(
            'aktif' => '1',
        );

        $this->Data_pemilih_model->update($id, $data);
        $this->session->set_flashdata(
            'message',
            '<div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="icon fa fa-check"></i> Success!</h4>
            Berhasil mengaktfikan pemilih. </div>'
        );
        redirect('admin/pemilih', 'refresh');
    }

    public function update_action()
    {
        // Security check if the user is admin
        if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin()) {
            redirect('admin/auth', 'refresh');
        }

        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $getKelas = $this->Data_pemilih_model->getKelas($this->input->post('kelas'));

            $data = array(
                'nis' => $this->input->post('nis', TRUE),
                'username' => $this->input->post('username', TRUE),
                'password' => $this->input->post('password', TRUE),
                'nama' => $this->input->post('nama', TRUE),
                'kelas' => $getKelas->kelas,
                'idkelas' => $this->input->post('kelas'),
                'jk' => $this->input->post('jk', TRUE),
            );

            $this->Data_pemilih_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-info alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-info"></i> Alert!</h4>
                Update Record Success </div>'
            );
            redirect('admin/pemilih', 'refresh');
        }
    }

    public function delete($id)
    {
        // Security check if the user is admin
        if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin()) {
            redirect('admin/auth', 'refresh');
        }

        $row = $this->Data_pemilih_model->get_by_id($id);

        if ($row) {
            $this->Data_pemilih_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect('admin/pemilih', 'refresh');
        } else {
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-warning alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-warning"></i> Alert!</h4>
                Record Not Found </div>'
            );
            redirect('admin/pemilih', 'refresh');
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('nis', 'nis', 'trim|required');
        $this->form_validation->set_rules('nama', 'nama', 'trim|required');
        $this->form_validation->set_rules('jk', 'Jenis Kelamin', 'trim|required');

        $this->form_validation->set_rules('id', 'id', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
}

/* End of file Data_pemilih.php */
/* Location: ./application/controllers/Data_pemilih.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-09-29 00:00:34 */
/* http://harviacode.com */
