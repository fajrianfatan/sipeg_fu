<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Tbl_kelurahan_model extends CI_Model
{

    public function tampil_data()
    {
        return $this->db->get('villages');
    }

    public function input_data($data)
    {
        $this->db->insert('villages', $data);
    }

    public function editDataKelurahan($data, $id)
    {
        $this->db->where('id', $id);
        $this->db->update('villages', $data);
    }

    public function getDataKelurahanDetail($id)
    {
        $this->db->where('id', $id);
        $query =  $this->db->get('villages');
        return $query->row();
    }

    public function deleteDataKelurahan($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('villages');
    }
}