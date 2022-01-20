<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Data_pemilih_model extends CI_Model
{

    public $table = 'data_pemilih';
    public $id = 'id';
    public $order = 'DESC';
    private $_batchImport;

    function __construct()
    {
        parent::__construct();
    }

    // get all
    function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }

    // get total rows
    function total_rows($q = NULL)
    {
        $this->db->like('id', $q);
        $this->db->or_like('nis', $q);
        $this->db->or_like('username', $q);
        $this->db->or_like('password', $q);
        $this->db->or_like('nama', $q);
        $this->db->or_like('kelas', $q);
        $this->db->or_like('idkelas', $q);
        $this->db->or_like('jk', $q);
        $this->db->or_like('status', $q);
        $this->db->or_like('aktif', $q);
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL)
    {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id', $q);
        $this->db->or_like('nis', $q);
        $this->db->or_like('username', $q);
        $this->db->or_like('password', $q);
        $this->db->or_like('nama', $q);
        $this->db->or_like('kelas', $q);
        $this->db->or_like('idkelas', $q);
        $this->db->or_like('jk', $q);
        $this->db->or_like('status', $q);
        $this->db->or_like('aktif', $q);
        $this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

    // update data
    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }

    // kelas dropdown menu
    function kelasDropdown()
    {
        // ambil data dari db
        $this->db->order_by('kelas', 'asc');
        $result = $this->db->get('kelas');
        // bikin array
        // please select berikut ini merupakan tambahan saja agar saat pertama
        // diload akan ditampilkan text please select.
        $dd[''] = 'Please Select';
        if ($result->num_rows() > 0) {
            foreach ($result->result() as $row) {
                // tentukan value (sebelah kiri) dan labelnya (sebelah kanan)
                $dd[$row->idkelas] = $row->kelas;
            }
        }
        return $dd;
    }

    // ambil kelas dari idkelas
    public function getKelas($id)
    {
        $q = $this->db->select('*')
            ->where(['kelas.idkelas' => $id])
            ->get('kelas');
        // return ($q->num_rows() > 0) ? $q->row() : row();
        if ($q->num_rows() > 0) {
            return $q->row();
        } else {
            return false;
        }
    }

    // getKelas data by idkelas
    function getKelas_by_idkelas($id)
    {
        $q = $this->db->select('data_pemilih.idkelas, kelas.*')
            ->join('kelas', 'data_pemilih.idkelas = kelas.idkelas')
            ->where(['data_pemilih.id' => $id])
            ->get('data_pemilih');
        // return ($q->num_rows() > 0) ? $q->row() : row();
        if ($q->num_rows() > 0) {
            return $q->row();
        } else {
            return false;
        }
    }

    // get_idKelas
    function get_idKelas($kelas)
    {
        $q = $this->db->select('*')
            ->where(['kelas.kelas' => $kelas])
            ->get('kelas');
        // return ($q->num_rows() > 0) ? $q->row() : row();       
        if ($q->num_rows() > 0) {
            return $q->row();
        } else {
            return false;
        }
    }

    // Batch Import
    public function setBatchImport($batchImport)
    {
        $this->_batchImport = $batchImport;
    }

    // save data
    public function importData()
    {
        $data = $this->_batchImport;
        $this->db->insert_batch($this->table, $data);
    }

    // Get settings data all
    public function settings_data_all()
    {
        $this->db->order_by('id', 'ASC');
        return $this->db->get('settings')->result();
    }

    // Get settings data by id
    public function settings_data_by_id($id)
    {
        $this->db->where('id', $id);
        return $this->db->get('settings')->row();
    }

     /**
     * Delete data vote user
     *
     * @param int $id The user ID
     * 
     * return boolean true
     */

    public function delete_data_vote_user($id)
    {
        $id = (int) $id;

        $this->db->where('idpemilih', $id);
        $this->db->delete('data_pemilihan');
        return true;
        
    }

    /**
     * Check if exist user
     * @param   string  username
     * @param   string  nis
     * @return  boolean
     */
    public function is_exist($username, $nis)
    {
        $this->db->where('username', $username);
        $this->db->or_where('nis', $nis);
        $q = $this->db->get('data_pemilih');
        if($q->num_rows() > 0){
            return true;
        }

        return false;
    }
}

/* End of file Data_pemilih_model.php */
/* Location: ./application/models/Data_pemilih_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-09-29 00:00:34 */
/* http://harviacode.com */
