<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

//PhpSpreadsheet
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
// End load library phpspreadsheet

class Data_pemilih extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->library('ion_auth', 'form_validation', 'session', 'form_helper');
        $this->load->helper('url', 'language', 'form', 'file');
        $this->load->model('Data_pemilih_model');

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
            $config['base_url'] = base_url() . 'admin/data_pemilih/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'admin/data_pemilih/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'admin/data_pemilih/index.html';
            $config['first_url'] = base_url() . 'admin/data_pemilih/index.html';
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

        $data = array(
            'button' => 'Create',
            'action' => base_url('admin/data_pemilih/create_action'),
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
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $getKelas = $this->Data_pemilih_model->getKelas($this->input->post('kelas'));

            $nis = $this->input->post('nis', TRUE);
            $username = $this->input->post('username', TRUE);
            $password = $this->input->post('password', TRUE);

            if (empty($username) && empty($password)) {
                $username = $nis;
                $password = $nis;
            } elseif (!empty($username) && empty($password)) {
                $password = $nis;
            } elseif (empty($username) && empty(!$password)) {
                $username = $nis;
            }

            $data = array(
                'nis' => $nis,
                'username' => $username,
                'password' => $password,
                'nama' => $this->input->post('nama', TRUE),
                'kelas' => $getKelas->kelas,
                'idkelas' => $this->input->post('kelas', TRUE),
                'jk' => $this->input->post('jk', TRUE),
                'status' => 'Belum Memilih',
                'aktif' => '1',
            );

            $this->Data_pemilih_model->insert($data);
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                Create Record Success. </div>'
            );
            redirect('admin/pemilih', 'refresh');
        }
    }

    /**
     *
     *  Update data pemilih
     * 
     */
    public function update($id)
    {
        $row = $this->Data_pemilih_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => base_url('admin/data_pemilih/update_action'),
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
        $id = (int) $id;

        $data = array(
            'aktif' => '0',
        );

        $this->Data_pemilih_model->update($id, $data);
        $this->session->set_flashdata(
            'message',
            '<div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
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
        $id = (int) $id;

        $data = array(
            'aktif' => '1',
        );

        $this->Data_pemilih_model->update($id, $data);
        $this->session->set_flashdata(
            'message',
            '<div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            Berhasil mengaktfikan pemilih. </div>'
        );
        redirect('admin/pemilih', 'refresh');
    }

    /**
     * Activate the user
     *
     * @param int|string|null $id The user ID
     */
    public function reset_status($id)
    {
        $id = (int) $id;

        $data = array(
            'status' => 'Belum Memilih',
        );

        $this->Data_pemilih_model->update($id, $data);
        $this->session->set_flashdata(
            'message',
            '<div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            Berhasil mereset status pemilih. </div>'
        );
        redirect('admin/pemilih', 'refresh');
    }

    /**
     *
     *  Upload data sheet for data pemilih
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
                $sheetData = $spreadsheet->getActiveSheet()->toArray();

                // menghitung jumlah baris data yang ada
                $arrayCount = count($sheetData);
                $flag = 0;


                $createArray = array('nis', 'username', 'password', 'nama', 'kelas', 'jk');
                $makeArray = array('nis' => 'nis', 'username' => 'username', 'password' => 'password', 'nama' => 'nama', 'kelas' => 'kelas', 'jk' => 'jk');
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
                    for ($i = 1; $i < $arrayCount; $i++) {
                        $nis = $SheetDataKey['nis'];
                        $userName = $SheetDataKey['username'];
                        $password = $SheetDataKey['password'];
                        $nama = $SheetDataKey['nama'];
                        $kelas = $SheetDataKey['kelas'];
                        $jk = $SheetDataKey['jk'];

                        $nis = filter_var(trim($sheetData[$i][$nis]), FILTER_SANITIZE_STRING);
                        $userName = filter_var(trim($sheetData[$i][$userName]), FILTER_SANITIZE_STRING);
                        $password = filter_var(trim($sheetData[$i][$password]), FILTER_SANITIZE_STRING);
                        $nama = filter_var(trim($sheetData[$i][$nama]), FILTER_SANITIZE_STRING);
                        $kelas = filter_var(trim($sheetData[$i][$kelas]), FILTER_SANITIZE_STRING);
                        $jk = filter_var(trim($sheetData[$i][$jk]), FILTER_SANITIZE_STRING);

                        // Get idkelas
                        $idKelas = $this->Data_pemilih_model->get_idKelas($kelas);
                        if ($idKelas == false) {
                            $idKelas = '';
                        } else {
                            $idKelas = $idKelas->idkelas;
                        }
                        $fetchData[] = array(
                            'nis' => $nis,
                            'username' => $userName,
                            'password' => $password,
                            'nama' => $nama,
                            'kelas' => $kelas,
                            'jk' => $jk,
                            'status' => 'Belum Memilih',
                            'aktif' => '1',
                            'idkelas' => $idKelas,
                        );
                    }
                    $data['dataInfo'] = $fetchData;
                    $this->Data_pemilih_model->setBatchImport($fetchData);
                    $this->Data_pemilih_model->importData();
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
                redirect('admin/pemilih', 'refresh');
            }
        }
    }

    /**
     *
     *  Export data pemilih 
     * 
     *  @output Excel data sheet .xlsx
     * 
     */
    public function exportData()
    {
        $dataPemilih = $this->Data_pemilih_model->get_all();
        // Create new Spreadsheet object
        $spreadsheet = new Spreadsheet();

        // Set document properties
        $spreadsheet->getProperties()->setCreator('System - System21')
            ->setLastModifiedBy('System21')
            ->setTitle('Data Pemilih')
            ->setSubject('Data Pemilih')
            ->setDescription('Data Pemilih - Generate by System21');

        // Add some data
        $spreadsheet->setActiveSheetIndex(0)
            ->setCellValue('A1', 'nis')
            ->setCellValue('B1', 'username')
            ->setCellValue('C1', 'password')
            ->setCellValue('D1', 'nama')
            ->setCellValue('E1', 'kelas')
            ->setCellValue('F1', 'jk');

        // Miscellaneous glyphs, UTF-8
        $i = 2;
        foreach ($dataPemilih as $dataPemilih) {

            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A' . $i, $dataPemilih->nis)
                ->setCellValue('B' . $i, $dataPemilih->username)
                ->setCellValue('C' . $i, $dataPemilih->password)
                ->setCellValue('D' . $i, $dataPemilih->nama)
                ->setCellValue('E' . $i, $dataPemilih->kelas)
                ->setCellValue('F' . $i, $dataPemilih->jk);
            $i++;
        }

        // Rename worksheet
        $spreadsheet->getActiveSheet()->setTitle('Data Pemilih ' . date('d-m-Y H'));

        // Set active sheet index to the first sheet, so Excel opens this as the first sheet
        $spreadsheet->setActiveSheetIndex(0);

        // Redirect output to a client’s web browser (Xlsx)
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="Data Pemilih.xlsx"');
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
     *  Import data pemilih
     * 
     */
    public function import()
    {
        $data = array(
            'action' => base_url('admin/data_pemilih/do_upload'),
            'button' => 'Import',
        );
        $this->load->view('back/data_pemilih/data_pemilih_import', $data);
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
     *  Update Action data pemilih
     * 
     */
    public function update_action()
    {
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

    /**
     *
     *  Delete data pemilih
     * 
     */
    public function delete($id)
    {
        $row = $this->Data_pemilih_model->get_by_id($id);

        if ($row) {
            $this->Data_pemilih_model->delete($id);
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                Delete Record Success </div>'
            );
            redirect('admin/pemilih', 'refresh');
        } else {
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-warning alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
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

    /**
     *
     *  Cetak Data Pemilih
     * 
     */
    public function cetak()
    {
        // Data Pemilih
        $data_pemilih = $this->Data_pemilih_model->get_all();

        // Settings Data
        $q = $this->Data_pemilih_model->settings_data_all();
        $setting_data = $q[0];

        $data = array(
            "dataku" => array(
                "nama" => "Data Pemilih",
                "url" => site_url(),
            ),
            'data_pemilih_data' => $data_pemilih,
            'start' => 0,
            'setting_data' => $setting_data
        );
        $this->load->view('back/data_pemilih/data_pemilih_cetak', $data);
    }
}

/* End of file Data_pemilih.php */
/* Location: ./application/controllers/admin/Data_pemilih.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-09-29 00:00:34 */
/* http://harviacode.com */
