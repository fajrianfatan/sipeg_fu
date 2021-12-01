<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Tbl_kota_model extends CI_Model
{

    public function tampil_data()
    {
        return $this->db->get('districts');
    }

    public function input_data($data)
    {
        $this->db->insert('districts', $data);
    }

    public function editDataKota($data, $id)
    {
        $this->db->where('id', $id);
        $this->db->update('districts', $data);
    }

    public function getDataKotaDetail($id)
    {
        $this->db->where('id', $id);
        $query =  $this->db->get('districts');
        return $query->row();
    }

    public function deleteDataKota($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('districts');
    }
}