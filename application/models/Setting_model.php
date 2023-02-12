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
  public $table = 'settings';
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

  // empty table
  public function empty_table($table)
  {
    $this->db->empty_table($table);
  }

  // get by name 
  function get_by_name($name)
  {
      $this->db->where('name', $name);
      return $this->db->get($this->table)->row();
  }

  // set by name
  function set_by_name($name, $value)
  {
      $this->db->where('name', $name);
      $this->db->update($this->table, array('value' => $value));
  }

  // set by id
  function set_by_id($id, $value)
  {
      $this->db->where($this->id, $id);
      $this->db->update($this->table, array('value' => $value));
  }
  
  public function create($key = null, $value = null)
  {
      $this->db->insert($this->table, array(
          'key'  => $key,
          'value' => $value
      ));

      return true;
  }

  // update data
  public function update($key = null, $value = null)
  {
      $data = $this->retrieve($key);

      $this->db->update($this->table, array('key' => $key, 'value' => $value), array('id' => $data['id']));
      return true;
  }

  // update data pemilih
  function update_pemilih($q, $id, $table, $data) {
      $this->db->where($q, $id);
      $this->db->update($table, $data);
  }


  // delete data
  function delete($id)
  {
      $this->db->where($this->id, $id);
      $this->db->delete($this->table);
  }

  /**
   * Method untuk mendapatkan informasi pengaturan
   *
   * @param  string $key
   * @return array
   */
  public function retrieve($key)
  {
      $this->db->where('key', $key);
      $result = $this->db->get($this->table, 1);
      return $result->row_array();
  }
}

/* End of file Setting_model.php */
/* Location: ./application/models/Setting_model.php */
