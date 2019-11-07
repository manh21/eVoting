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

        $array = array(
            'userName' => $firstName . ' ' . $lastName,
        );
        $this->session->set_userdata($array);

        // Jumlah Kelas
        $jumlahKelas = $this->Dashboard_model->total_rows('kelas');
        // Jumlah Data Pemilih
        $jumlahDataPemilih = $this->Dashboard_model->total_rows('data_Pemilih');
        // Jumlah Kandidat
        $jumlahKandidat = $this->Dashboard_model->total_rows('kandidat');
        // Jumlah Suara Masuk
        $jumlahSuara = $this->Dashboard_model->total_rows('kandidat');

        $kandidatData = $this->Dashboard_model->get_all('nourut', 'kandidat');

        $arrayJS = array();

        foreach($kandidatData as $q){
            
            $jumlahSuara = $this->Dashboard_model->tampil_data('idkandidat', $q->idkandidat ,'data_pemilihan');
            
            $arrayJS[] = $jumlahSuara;

        };

        $jumlahKandidat = $this->Dashboard_model->tampil_data('idkandidat', '1', 'data_pemilihan');

        $data = array(
            'jumlahKelas' => $jumlahKelas,
            'jumlahDataPemilih' => $jumlahDataPemilih,
            'jumlahKandidat' => $jumlahKandidat,
            'kandidatData' => $kandidatData,
            'jumlahSuara' =>$arrayJS,
        );

        // load default view
        $this->load->view('back/dashboard', $data);
    }
}
