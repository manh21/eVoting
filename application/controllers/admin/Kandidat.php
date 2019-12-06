<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Kandidat extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->library('ion_auth', 'form_validation', 'session', 'form_helper');
        $this->load->model('Kandidat_model');
        $this->load->helper('url', 'language', 'form', 'file');
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
            $config['base_url'] = base_url() . 'kandidat/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'kandidat/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'kandidat/index.html';
            $config['first_url'] = base_url() . 'kandidat/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Kandidat_model->total_rows($q);
        $kandidat = $this->Kandidat_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'kandidat_data' => $kandidat,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('back/kandidat/kandidat_list', $data);
    }

    public function read($id)
    {

        // Security check if the user is admin
        if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin()) {
            redirect('admin/auth', 'refresh');
        }

        $row = $this->Kandidat_model->get_by_id($id);
        if ($row) {
            $data = array(
                'idkandidat' => $row->idkandidat,
                'organisasi' => $row->organisasi,
                'nama' => $row->nama,
                'nourut' => $row->nourut,
                'visi' => $row->visi,
                'misi' => $row->misi,
                'foto' => $row->foto,
                'status' => $row->status,
                'jumlahsuara' => $row->jumlahsuara
            );
            $this->load->view('back/kandidat/kandidat_read', $data);
        } else {
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-warning alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                Record Not Found </div>'
            );
            redirect('admin/kandidat', 'refresh');
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
            'action' => site_url('admin/kandidat/create_action'),
            'idkandidat' => set_value('idkandidat'),
            'organisasi' => set_value('organisasi'),
            'nama' => set_value('nama'),
            'nourut' => set_value('nourut'),
            'visi' => set_value('visi'),
            'misi' => set_value('misi'),
            'foto' => set_value('foto'),
        );
        $this->load->view('back/kandidat/kandidat_form', $data);
    }

    public function create_action()
    {

        // Security check if the user is admin
        if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin()) {
            redirect('admin/auth', 'refresh');
        }

        $config['upload_path'] = './assets/uploads/kandidat';
        $config['allowed_types'] = 'jpeg|jpg|png|gif';
        $config['remove_spaces'] = TRUE;

        $this->load->helper('file');
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        $this->form_validation->set_rules('image', 'Upload File', 'callback_checkFileValidation');
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {

            if ($this->upload->do_upload('image')) {

                $upload_data = $this->upload->data();
                $fileName = $upload_data['file_name']; //Nama File
                $fileType = $upload_data['file_ext']; //Extension File

                // File Stored Path
                $inputFileName = $upload_data['full_path'];

                $data = array(
                    'organisasi' => $this->input->post('organisasi', TRUE),
                    'nama' => $this->input->post('nama', TRUE),
                    'nourut' => $this->input->post('nourut', TRUE),
                    'visi' => $this->input->post('visi', TRUE),
                    'misi' => $this->input->post('misi', TRUE),
                    'foto' => $fileName,
                    'status' => '1',
                );

                $this->Kandidat_model->insert($data);
                $this->session->set_flashdata(
                    'message',
                    '<div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    Create Record Success. </div>'
                );
                redirect('admin/kandidat', 'refresh');
            } else {
                $this->create();
                $data['error_msg'] = $this->upload->display_errors();
            }
        }
    }

    public function edit($id)
    {

        // Security check if the user is admin
        if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin()) {
            redirect('admin/auth', 'refresh');
        }

        $row = $this->Kandidat_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('admin/kandidat/update_action'),
                'idkandidat' => set_value('idkandidat', $row->idkandidat),
                'organisasi' => set_value('organisasi', $row->organisasi),
                'nama' => set_value('nama', $row->nama),
                'nourut' => set_value('nourut', $row->nourut),
                'visi' => set_value('visi', $row->visi),
                'misi' => set_value('misi', $row->misi),
                'foto' => set_value('foto', $row->foto),
            );
            $this->load->view('back/kandidat/kandidat_form', $data);
        } else {
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-warning alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                Record Not Found </div>'
            );
            redirect('admin/kandidat', 'refresh');
        }
    }

    public function update_action()
    {

        // Security check if the user is admin
        if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin()) {
            redirect('admin/auth', 'refresh');
        }

        $config['upload_path'] = './assets/uploads/kandidat';
        $config['allowed_types'] = 'jpeg|jpg|png|gif';
        $config['remove_spaces'] = TRUE;

        $this->load->helper('file');
        $this->load->library('upload', $config);
        $this->form_validation->set_rules('image', 'Upload File', 'callback_checkFileValidation');
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->edit($this->input->post('idkandidat', TRUE));
        } else {

            if ($this->upload->do_upload('image')) {

                $upload_data = $this->upload->data();
                $fileName = $upload_data['file_name']; //Nama File
                $fileType = $upload_data['file_ext']; //Extension File

                // File Stored Path
                $inputFileName = $upload_data['full_path'];

                $data = array(
                    'organisasi' => $this->input->post('organisasi', TRUE),
                    'nama' => $this->input->post('nama', TRUE),
                    'nourut' => $this->input->post('nourut', TRUE),
                    'jumlahsuara' => $this->input->post('jumlahsuara', TRUE),
                    'visi' => $this->input->post('visi', TRUE),
                    'misi' => $this->input->post('misi', TRUE),
                    'foto' => $fileName,
                );

                $this->Kandidat_model->update($this->input->post('idkandidat', TRUE), $data);
                $this->session->set_flashdata(
                    'message',
                    '<div class="alert alert-info alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4><i class="icon fa fa-info"></i> Alert!</h4>
                    Update Record Success </div>'
                );
                redirect('admin/kandidat', 'refresh');
            } else {
                $data = array(
                    'organisasi' => $this->input->post('organisasi', TRUE),
                    'nama' => $this->input->post('nama', TRUE),
                    'nourut' => $this->input->post('nourut', TRUE),
                    'jumlahsuara' => $this->input->post('jumlahsuara', TRUE),
                    'visi' => $this->input->post('visi', TRUE),
                    'misi' => $this->input->post('misi', TRUE),
                );

                $this->Kandidat_model->update($this->input->post('idkandidat', TRUE), $data);
                $this->session->set_flashdata(
                    'message',
                    '<div class="alert alert-info alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4><i class="icon fa fa-info"></i> Alert!</h4>
                    Update Record Success </div>'
                );
                redirect('admin/kandidat', 'refresh');
            }
        }
    }

    public function delete($id)
    {

        // Security check if the user is admin
        if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin()) {
            redirect('admin/auth', 'refresh');
        }

        $row = $this->Kandidat_model->get_by_id($id);
        $image = $row->foto;

        if ($row) {
            $this->Kandidat_model->delete($id);
            unlink('./assets/uploads/kandidat/' . $image);
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                Delete Record Success </div>'
            );
            redirect('admin/kandidat', 'refresh');
        } else {
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-warning alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                Record Not Found </div>'
            );
            redirect('admin/kandidat', 'refresh');
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

        $this->Kandidat_model->update($id, $data);
        $this->session->set_flashdata(
            'message',
            '<div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            Berhasil menonaktifkan pemilih. </div>'
        );
        redirect('admin/kandidat', 'refresh');
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

        $this->Kandidat_model->update($id, $data);
        $this->session->set_flashdata(
            'message',
            '<div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            Berhasil mengaktfikan pemilih. </div>'
        );
        redirect('admin/kandidat', 'refresh');
    }

    public function _rules()
    {

        // Security check if the user is admin
        if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin()) {
            redirect('admin/auth', 'refresh');
        }

        $this->form_validation->set_rules('nama', 'nama', 'trim|required');
        $this->form_validation->set_rules('nourut', 'nourut', 'trim|required');
        $this->form_validation->set_rules('visi', 'visi', 'trim|required');
        $this->form_validation->set_rules('misi', 'misi', 'trim|required');

        $this->form_validation->set_rules('idkandidat', 'idkandidat', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    /*
     * file value and type check during validation
     */
    public function checkFileValidation($str)
    {

        // Security check if the user is admin
        if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin()) {
            redirect('admin/auth', 'refresh');
        }

        $allowed_mime_type_arr = array(
            'image/gif',
            'image/jpeg',
            'image/pjpeg',
            'image/png',
            'image/x-png'
        );

        $mime = get_mime_by_extension($_FILES['image']['name']);
        if (isset($_FILES['image']['name']) && $_FILES['image']['name'] != "") {
            if (in_array($mime, $allowed_mime_type_arr)) {
                return true;
            } else {
                $this->form_validation->set_message('checkFileValidation', 'Please select only gif/jpg/png file.');
                return false;
            }
        } else {
            $this->form_validation->set_message('checkFileValidation', 'Please choose a file to upload.');
            return false;
        }
    }
}

/* End of file Kandidat.php */
/* Location: ./application/controllers/admin/Kandidat.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-10-06 02:46:26 */
/* http://harviacode.com */
