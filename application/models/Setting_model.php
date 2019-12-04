<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 *
 * Model Setting_model
 *
 */

class Setting_model extends CI_Model
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

  // empty table
  public function emtpy_table($table)
  {
    $this->db->empty_table($table);
  }
}

/* End of file Setting_model.php */
/* Location: ./application/models/Setting_model.php */
