<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

//PhpSpreadsheet
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
// End load library phpspreadsheet

class Kelas extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->library('ion_auth', 'form_validation', 'session');
        $this->load->helper('url', 'language');
        $this->load->model('Kelas_model');

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
        $row = $this->Kelas_model->get_by_id($id);
        if ($row) {
            $data = array(
                'idkelas' => $row->idkelas,
                'kelas' => $row->kelas,
                'jumlah' => $row->jumlah,
            );
            $this->load->view('back/kelas/kelas_read', $data);
        } else {
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                Record Not Found </div>'
            );
            redirect('admin/kelas', 'refresh');
        }
    }

    public function create()
    {
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
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
                'kelas' => $this->input->post('kelas', TRUE),
                'jumlah' => $this->input->post('jumlah', TRUE),
            );

            $this->Kelas_model->insert($data);
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                Create Record Success </div>'
            );
            redirect('admin/kelas', 'refresh');
        }
    }

    public function update($id)
    {
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
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                Record Not Found </div>'
            );
            redirect('admin/kelas', 'refresh');
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('idkelas', TRUE));
        } else {
            $data = array(
                'kelas' => $this->input->post('kelas', TRUE),
                'jumlah' => $this->input->post('jumlah', TRUE),
            );

            $this->Kelas_model->update($this->input->post('idkelas', TRUE), $data);
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                Update Record Success </div>'
            );
            redirect('admin/kelas', 'refresh');
        }
    }

    public function delete($id)
    {
        $row = $this->Kelas_model->get_by_id($id);

        if ($row) {
            $this->Kelas_model->delete($id);
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                Delete Record Success </div>'
            );
            redirect('admin/kelas', 'refresh');
        } else {
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                Record Not Found </div>'
            );
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

    /**
     *
     *  Upload data kelas
     * 
     */
    public function do_upload()
    {
        $config['upload_path'] = './assets/uploads/';
        $config['allowed_types'] = 'xlsx|xls|csv';
        $config['remove_spaces'] = TRUE;

        $this->load->library('upload', $config);
        $this->form_validation->set_rules('fileURL', 'Upload File', 'callback_checkFileValidation');

        if ($this->form_validation->run() == false) {
            $this->import();
        } else {

            if ($this->upload->do_upload('fileURL')) {

                $upload_data = $this->upload->data();
                $fileName = $upload_data['file_name']; //Nama File
                $fileType = $upload_data['file_ext'];

                $inputFileName = $upload_data['full_path'];

                // Creating a Reader
                if ($fileType == '.csv') {
                    $reader = new \PhpOffice\PhpSpreadsheet\Reader\Csv();
                } elseif ($fileType == '.xlsx') {
                    $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
                } else {
                    $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
                }

                // Loading a Spreadsheet File
                $spreadsheet = $reader->load($inputFileName);
                $sheetData = $spreadsheet->getActiveSheet()->toArray(null, true, true, true);

                // menghitung jumlah baris data yang ada
                $jumlah_baris = count($sheetData);
                $flag = 0;

                // array Count
                $createArray = array('kelas', 'jumlah');
                $makeArray = array('kelas' => 'kelas', 'jumlah' => 'jumlah');
                $SheetDataKey = array();
                foreach ($sheetData as $dataInSheet) {
                    foreach ($dataInSheet as $key => $value) {
                        if (in_array(trim($value), $createArray)) {
                            $value = preg_replace('/\s+/', '', $value);
                            $SheetDataKey[trim($value)] = $key;
                        }
                    }
                }

                $dataDiff = array_diff_key($makeArray, $SheetDataKey);
                if (empty($dataDiff)) {
                    $flag = 1;
                }

                // match excel sheet column
                if ($flag == 1) {
                    for ($i = 2; $i < $jumlah_baris; $i++) {
                        $kelas = $SheetDataKey['kelas'];
                        $jumlah = $SheetDataKey['jumlah'];

                        $kelas = filter_var(trim($sheetData[$i][$kelas]), FILTER_SANITIZE_STRING);
                        $jumlah = filter_var(trim($sheetData[$i][$jumlah]), FILTER_SANITIZE_STRING);

                        $fetchData[] = array(
                            'kelas' => $kelas,
                            'jumlah' => $jumlah,
                        );
                    }
                    $this->Kelas_model->setBatchImport($fetchData);
                    $this->Kelas_model->importData();
                } else {
                    $this->session->set_flashdata(
                        'message',
                        '<div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        Please import correct file, did not match excel sheet column </div>'
                    );
                    unlink('./assets/uploads/' . $fileName);
                }
                unlink('./assets/uploads/' . $fileName);
                $this->session->set_flashdata(
                    'message',
                    '<div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    Berhasil Mengimport Data </div>'
                );
                redirect('admin/kelas', 'refresh');
            }
        }
    }

    /**
     *
     *  Import data kelas
     * 
     */
    public function import()
    {
        $data = array(
            'action' => site_url('admin/kelas/do_upload'),
            'button' => 'Import',
        );
        $this->load->view('back/kelas/kelas_import', $data);
    }

    /**
     *
     *  checkFileValidation
     * 
     */
    public function checkFileValidation($string)
    {
        $file_mimes = array(
            'text/x-comma-separated-values',
            'text/comma-separated-values',
            'application/octet-stream',
            'application/vnd.ms-excel',
            'application/x-csv',
            'text/x-csv',
            'text/csv',
            'application/csv',
            'application/excel',
            'application/vnd.msexcel',
            'text/plain',
            'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'
        );

        if (isset($_FILES['fileURL']['name'])) {
            $arr_file = explode('.', $_FILES['fileURL']['name']);
            $extension = end($arr_file);
            if (($extension == 'xlsx' || $extension == 'xls' || $extension == 'csv') && in_array($_FILES['fileURL']['type'], $file_mimes)) {
                return true;
            } else {
                $this->form_validation->set_message('checkFileValidation', 'Please choose correct file.');
                return false;
            }
        } else {
            $this->form_validation->set_message('checkFileValidation', 'Please choose a file.');
            return false;
        }
    }

    /**
     *
     *  Export data kelas
     * 
     */
    public function exportData()
    {
        $dataKelas = $this->Kelas_model->get_all();
        // Create new Spreadsheet object
        $spreadsheet = new Spreadsheet();

        // Set document properties
        $spreadsheet->getProperties()->setCreator('System - System21')
            ->setLastModifiedBy('System21')
            ->setTitle('Data Kelas')
            ->setSubject('Data Kelas')
            ->setDescription('Data Kelas - Generate by System21');

        // Add some data
        $spreadsheet->setActiveSheetIndex(0)
            ->setCellValue('A1', 'kelas')
            ->setCellValue('B1', 'jumlah');

        // Miscellaneous glyphs, UTF-8
        $i = 2;
        foreach ($dataKelas as $kelas) {

            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A' . $i, $kelas->kelas)
                ->setCellValue('B' . $i, $kelas->jumlah);
            $i++;
        }

        // Rename worksheet
        $spreadsheet->getActiveSheet()->setTitle('Data Kelas ' . date('d-m-Y H'));

        // Set active sheet index to the first sheet, so Excel opens this as the first sheet
        $spreadsheet->setActiveSheetIndex(0);

        // Redirect output to a client’s web browser (Xlsx)
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="Data Kelas.xlsx"');
        header('Cache-Control: max-age=0');
        // If you're serving to IE 9, then the following may be needed
        header('Cache-Control: max-age=1');

        // If you're serving to IE over SSL, then the following may be needed
        header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
        header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); // always modified
        header('Cache-Control: cache, must-revalidate'); // HTTP/1.1
        header('Pragma: public'); // HTTP/1.0

        $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
        $writer->save('php://output');
        exit;
    }

    /**
     *
     *  Cetak Data Pemilih
     * 
     */
    public function cetak()
    {
        // Setting Data
        $q = $this->Kelas_model->settings_data_all();
        $setting_data = $q[0];

        // Data Kelas
        $kelas_data = $this->Kelas_model->get_all();

        $data = array(
            'setting_data' => $setting_data,
            'start' => 0,
            'kelas_data' => $kelas_data
        );
        $this->load->view('back/kelas/kelas_cetak', $data);
    }
}

/* End of file Kelas.php */
/* Location: ./application/controllers/admin/Kelas.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-09-28 16:38:47 */
/* http://harviacode.com */
