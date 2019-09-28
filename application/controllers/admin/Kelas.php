<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Kelas extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->library('ion_auth', 'form_validation', 'session');
        $this->load->helper('url', 'language');
        $this->load->model('Kelas_model');
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
            $config['base_url'] = base_url() . 'admin/kelas/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'admin/kelas/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'admin/kelas/index.html';
            $config['first_url'] = base_url() . 'admin/kelas/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Kelas_model->total_rows($q);
        $kelas = $this->Kelas_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'kelas_data' => $kelas,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('back/kelas/kelas_list', $data);
    }

    public function read($id)
    {
        // Security check if the user is admin
        if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin()) {
            redirect('admin/auth', 'refresh');
        }

        $row = $this->Kelas_model->get_by_id($id);
        if ($row) {
            $data = array(
                'idkelas' => $row->idkelas,
                'kelas' => $row->kelas,
                'jumlah' => $row->jumlah,
            );
            $this->load->view('back/kelas/kelas_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect('admin/kelas', 'refresh');
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
            'action' => base_url('admin/kelas/create_action'),
            'idkelas' => set_value('idkelas'),
            'kelas' => set_value('kelas'),
            'jumlah' => set_value('jumlah'),
        );
        $this->load->view('back/kelas/kelas_form', $data);
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
            $data = array(
                'kelas' => $this->input->post('kelas', TRUE),
                'jumlah' => $this->input->post('jumlah', TRUE),
            );

            $this->Kelas_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect('admin/kelas', 'refresh');
        }
    }

    public function edit($id)
    {
        // Security check if the user is admin
        if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin()) {
            redirect('admin/auth', 'refresh');
        }

        $row = $this->Kelas_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => base_url('admin/kelas/update_action'),
                'idkelas' => set_value('idkelas', $row->idkelas),
                'kelas' => set_value('kelas', $row->kelas),
                'jumlah' => set_value('jumlah', $row->jumlah),
            );
            $this->load->view('back/kelas/kelas_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect('admin/kelas', 'refresh');
        }
    }

    public function update_action()
    {
        // Security check if the user is admin
        if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin()) {
            redirect('admin/auth', 'refresh');
        }

        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('idkelas', TRUE));
        } else {
            $data = array(
                'kelas' => $this->input->post('kelas', TRUE),
                'jumlah' => $this->input->post('jumlah', TRUE),
            );

            $this->Kelas_model->update($this->input->post('idkelas', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect('admin/kelas', 'refresh');
        }
    }

    public function delete($id)
    {
        // Security check if the user is admin
        if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin()) {
            redirect('admin/auth', 'refresh');
        }

        $row = $this->Kelas_model->get_by_id($id);

        if ($row) {
            $this->Kelas_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect('admin/kelas', 'refresh');
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect('admin/kelas', 'refresh');
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('kelas', 'kelas', 'trim|required');
        $this->form_validation->set_rules('jumlah', 'jumlah', 'trim|required');

        $this->form_validation->set_rules('idkelas', 'idkelas', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        // Security check if the user is admin
        if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin()) {
            redirect('admin/auth', 'refresh');
        }

        $this->load->helper('exportexcel');
        $namaFile = "kelas.xls";
        $judul = "kelas";
        $tablehead = 0;
        $tablebody = 1;
        $nourut = 1;
        //penulisan header
        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
        header("Content-Type: application/force-download");
        header("Content-Type: application/octet-stream");
        header("Content-Type: application/download");
        header("Content-Disposition: attachment;filename=" . $namaFile . "");
        header("Content-Transfer-Encoding: binary ");

        xlsBOF();

        $kolomhead = 0;
        xlsWriteLabel($tablehead, $kolomhead++, "No");
        xlsWriteLabel($tablehead, $kolomhead++, "Kelas");
        xlsWriteLabel($tablehead, $kolomhead++, "Jumlah");

        foreach ($this->Kelas_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
            xlsWriteLabel($tablebody, $kolombody++, $data->kelas);
            xlsWriteNumber($tablebody, $kolombody++, $data->jumlah);

            $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }
}

/* End of file Kelas.php */
/* Location: ./application/controllers/Kelas.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-09-28 16:38:47 */
/* http://harviacode.com */
