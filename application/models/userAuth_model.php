<?php

defined('BASEPATH') or exit('No direct script access allowed');

class userAuth_model extends CI_Model
{
    public $table = 'data_pemilih';
    public $id = 'id';
    public $order = 'DESC';

    public function akses($username, $password)
    {
        //password menggunakan md5 hash
        $password2 = md5($password);

        $this->db->where('username', $username);
        $this->db->where('password', $password);
        return $this->db->get('data_pemilih');
    }
}

/* End of file userAuth_model.php */
