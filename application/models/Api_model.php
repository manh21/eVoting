<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Api_model extends CI_Model
{
    public function user_login($username, $password)
    {
        $this->db->where('username', $username);
        $q = $this->db->get('data_pemilih');

        if ($q->num_rows()) {
            $user_pass = $q->row('password');
            if ($password === $user_pass) {
                return $q->row();
            }
            return FALSE;
        } else {
            return FALSE;
        }
    }

    // Get All
    public function get_all($q, $table, $order)
    {
        $this->db->order_by($q, $order);
        return $this->db->get($table)->result();
    }

    // Get by id
    public function get_by_id($q, $id, $table)
    {
        $this->db->where($q, $id);
        return $this->db->get($table)->row();
    }

    // insert data
    function insert($table, $data)
    {
        $this->db->insert($table, $data);
    }

    // Update data
    function update($q, $id, $table, $data)
    {
        $this->db->where($q, $id);
        $this->db->update($table, $data);
    }
}

/* End of file Api_model.php */
