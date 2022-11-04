<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Userauth_model extends CI_Model
{
    public $table = 'data_pemilih';
    public $id = 'id';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    public function akses($username, $password)
    {
        $this->db->where('username', $username);
        $this->db->where('password', $password);
        return $this->db->get('data_pemilih');
    }
}

/* End of file Userauth_model.php */
