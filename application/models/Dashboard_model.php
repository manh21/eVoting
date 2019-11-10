<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard_model extends CI_Model
{
    public $id = 'id';
    public $order = 'ASC';

    // Get All
    public function get_all($q, $table)
    {
        $this->db->order_by($q, $this->order);
        return $this->db->get($table)->result();
    }

    // Get by id
    public function get_by_id($q, $id, $table)
    {
        $this->db->where($q, $id);
        return $this->db->get($table)->row();
    }

    // Menghitung jumlah suara
    public function tampil_data($q, $idkandidat, $table)
    {
        $this->db->where($q, $idkandidat);
        return $this->db->count_all_results($table);
    }

    // get total rows
    function total_rows($table)
    {
        $this->db->from($table);
        return $this->db->count_all_results();
    }

    // update data
    function update($q, $id, $table, $data)
    {
        $this->db->where($q, $id);
        $this->db->update($table, $data);
    }
}

/* End of file Dashboard_modal.php */
