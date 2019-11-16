<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home_model extends CI_Model
{
    public $id = 'id';
    public $order = 'DESC';

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

    // get total rows
    function total_rows($table)
    {
        $this->db->from($table);
        return $this->db->count_all_results();
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

    // Menghitung jumlah suara
    public function tampil_data($q, $idkandidat, $table)
    {
        $this->db->where($q, $idkandidat);
        return $this->db->count_all_results($table);
    }
}

/* End of file Home_modal.php */
