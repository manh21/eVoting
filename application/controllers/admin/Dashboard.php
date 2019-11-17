<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/dashboard
     *	- or -
     * 		http://example.com/index.php/dashboard/index
     *	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/dashboard/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->library('ion_auth', 'form_validation', 'session');
        $this->load->helper('url', 'language');
        $this->load->model('Dashboard_model');
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

        // get user data
        $user = $this->ion_auth->user()->row();
        $firstName = $user->first_name;
        $lastName = $user->last_name;
        // Set session untuk nama user yang terlogin
        $username = array(
            'userName' => $firstName . ' ' . $lastName,
        );
        $this->session->set_userdata($username);

        // Jumlah Kelas
        $jumlahKelas = $this->Dashboard_model->total_rows('kelas');
        // Jumlah Data Pemilih
        $jumlahDataPemilih = $this->Dashboard_model->total_rows('data_Pemilih');
        // Jumlah Kandidat
        $jumlahKandidat = $this->Dashboard_model->total_rows('kandidat');
        // Menghitung jumlah suara yang sudah masuk ke dalam database
        $jumlahSuaraMasuk = $this->Dashboard_model->total_rows('data_pemilihan');
        // Mengambil semua kandidat data
        $kandidatData = $this->Dashboard_model->get_all('nourut', 'kandidat');

        // Declare arrayJS sebelum foreach
        $arrayJS = array();
        // Cek apakah terdapat data?
        if ($jumlahKandidat > 0) {
            foreach ($kandidatData as $row) {
                // Menghitung perolehan suara dari database
                // Berdasarkan idkandidat yang ada
                $jumlahSuara = $this->Dashboard_model->tampil_data('idkandidat', $row->idkandidat, 'data_pemilihan');
                $updateData = array(
                    'jumlahsuara' => $jumlahSuara,
                );
                // Update jumlah suara counter ke database
                $this->Dashboard_model->update('idkandidat', $row->idkandidat, 'kandidat', $updateData);
                // Data ini digunakan untuk menunjukan hasil perolehan suara di dalam dashboard admin
                $a = array(
                    'idKandidat' => $row->idkandidat,
                    'noUrut' => $row->nourut,
                    'organisasi' => $row->organisasi,
                    'nama' => $row->nama,
                    'jumlahSuara' => $jumlahSuara,
                    'foto' => $row->foto,
                );
                // Menyimpan semua data dalam bentuk array
                $arrayJS[] = $a;
            };
        }

        $data = array(
            'jumlahKelas' => $jumlahKelas,
            'jumlahDataPemilih' => $jumlahDataPemilih,
            'jumlahKandidat' => $jumlahKandidat,
            'jumlahSuaraMasuk' => $jumlahSuaraMasuk,
            'kandidatData' => $arrayJS,
        );

        // load dashboard view
        $this->load->view('back/dashboard', $data);
    }
}
