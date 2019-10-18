<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Kandidat extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Kandidat_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
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
        $this->load->view('kandidat/kandidat_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Kandidat_model->get_by_id($id);
        if ($row) {
            $data = array(
		'idkandidat' => $row->idkandidat,
		'organisasi' => $row->organisasi,
		'nama' => $row->nama,
		'nourut' => $row->nourut,
		'jumlahsuara' => $row->jumlahsuara,
		'visi' => $row->visi,
		'misi' => $row->misi,
		'foto' => $row->foto,
		'status' => $row->status,
	    );
            $this->load->view('kandidat/kandidat_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('kandidat'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('kandidat/create_action'),
	    'idkandidat' => set_value('idkandidat'),
	    'organisasi' => set_value('organisasi'),
	    'nama' => set_value('nama'),
	    'nourut' => set_value('nourut'),
	    'jumlahsuara' => set_value('jumlahsuara'),
	    'visi' => set_value('visi'),
	    'misi' => set_value('misi'),
	    'foto' => set_value('foto'),
	    'status' => set_value('status'),
	);
        $this->load->view('kandidat/kandidat_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'organisasi' => $this->input->post('organisasi',TRUE),
		'nama' => $this->input->post('nama',TRUE),
		'nourut' => $this->input->post('nourut',TRUE),
		'jumlahsuara' => $this->input->post('jumlahsuara',TRUE),
		'visi' => $this->input->post('visi',TRUE),
		'misi' => $this->input->post('misi',TRUE),
		'foto' => $this->input->post('foto',TRUE),
		'status' => $this->input->post('status',TRUE),
	    );

            $this->Kandidat_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('kandidat'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Kandidat_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('kandidat/update_action'),
		'idkandidat' => set_value('idkandidat', $row->idkandidat),
		'organisasi' => set_value('organisasi', $row->organisasi),
		'nama' => set_value('nama', $row->nama),
		'nourut' => set_value('nourut', $row->nourut),
		'jumlahsuara' => set_value('jumlahsuara', $row->jumlahsuara),
		'visi' => set_value('visi', $row->visi),
		'misi' => set_value('misi', $row->misi),
		'foto' => set_value('foto', $row->foto),
		'status' => set_value('status', $row->status),
	    );
            $this->load->view('kandidat/kandidat_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('kandidat'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('idkandidat', TRUE));
        } else {
            $data = array(
		'organisasi' => $this->input->post('organisasi',TRUE),
		'nama' => $this->input->post('nama',TRUE),
		'nourut' => $this->input->post('nourut',TRUE),
		'jumlahsuara' => $this->input->post('jumlahsuara',TRUE),
		'visi' => $this->input->post('visi',TRUE),
		'misi' => $this->input->post('misi',TRUE),
		'foto' => $this->input->post('foto',TRUE),
		'status' => $this->input->post('status',TRUE),
	    );

            $this->Kandidat_model->update($this->input->post('idkandidat', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('kandidat'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Kandidat_model->get_by_id($id);

        if ($row) {
            $this->Kandidat_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('kandidat'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('kandidat'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('organisasi', 'organisasi', 'trim|required');
	$this->form_validation->set_rules('nama', 'nama', 'trim|required');
	$this->form_validation->set_rules('nourut', 'nourut', 'trim|required');
	$this->form_validation->set_rules('jumlahsuara', 'jumlahsuara', 'trim|required');
	$this->form_validation->set_rules('visi', 'visi', 'trim|required');
	$this->form_validation->set_rules('misi', 'misi', 'trim|required');
	$this->form_validation->set_rules('foto', 'foto', 'trim|required');
	$this->form_validation->set_rules('status', 'status', 'trim|required');

	$this->form_validation->set_rules('idkandidat', 'idkandidat', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Kandidat.php */
/* Location: ./application/controllers/Kandidat.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-10-06 02:46:26 */
/* http://harviacode.com */