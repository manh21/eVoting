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

        $_data = $this->db->query("SELECT * FROM data_pemilih WHERE username = '$username' AND password = '$password' LIMIT 1 ");
        return $_data;
    }
}

/* End of file userAuth_model.php */
