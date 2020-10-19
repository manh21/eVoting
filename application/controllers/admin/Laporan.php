<?php
defined('BASEPATH') or exit('No direct script access allowed');


//PhpSpreadsheet
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
// End load library phpspreadsheet


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
    $this->load->model('Laporan_model');

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

  public function hasil()
  {
    // Jumlah Kelas
    // $jumlahKelas = $this->Laporan_model->total_rows('kelas');
    // Jumlah Data Pemilih
    // $jumlahDataPemilih = $this->Laporan_model->total_rows('data_pemilih');
    // Jumlah Kandidat
    $jumlahKandidat = $this->Laporan_model->total_rows('kandidat');
    // Mengambil semua kandidat data
    $kandidatData = $this->Laporan_model->get_all('nourut', 'kandidat');
    
    // Create new Spreadsheet object
    $spreadsheet = new Spreadsheet();

    // Set document properties
    $spreadsheet->getProperties()->setCreator('System - System21')
      ->setLastModifiedBy('System21')
      ->setTitle('Hasil Pemilihan')
      ->setSubject('Hasil Pemilihan')
      ->setDescription('Hasil Pemilihan - Generate by System21');

    // Add some data
    $spreadsheet->setActiveSheetIndex(0)
      ->setCellValue('A1', 'ID Kandidat')
      ->setCellValue('B1', 'No Urut')
      ->setCellValue('C1', 'Organisasi')
      ->setCellValue('D1', 'Nama Kandidat')
      ->setCellValue('E1', 'Jumlah Suara');

    // Miscellaneous glyphs, UTF-8
    $i = 2;
    // Cek apakah terdapat data?
    if ($jumlahKandidat > 0) {
      foreach ($kandidatData as $row) {
        // Menghitung perolehan suara dari database
        // Berdasarkan idkandidat yang ada
        $jumlahSuara = $this->Laporan_model->tampil_data('idkandidat', $row->idkandidat, 'data_pemilihan');

        $spreadsheet->setActiveSheetIndex(0)
          ->setCellValue('A' . $i, $row->idkandidat)
          ->setCellValue('B' . $i, $row->nourut)
          ->setCellValue('C' . $i, $row->organisasi)
          ->setCellValue('D' . $i, $row->nama)
          ->setCellValue('E' . $i, $jumlahSuara);
        $i++;

      };
    }

    // Rename worksheet
    $spreadsheet->getActiveSheet()->setTitle('Hasil Pemilihan ' . date('d-m-Y H'));

    // Set active sheet index to the first sheet, so Excel opens this as the first sheet
    $spreadsheet->setActiveSheetIndex(0);

    // Redirect output to a client’s web browser (Xlsx)
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment;filename="Hasil Pemilihan.xlsx"');
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
}

/* End of file Laporan.php */
/* Location: ./application/controllers/admin/Laporan.php */
