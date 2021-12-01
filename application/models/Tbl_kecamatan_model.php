<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Tbl_kecamatan_model extends CI_Model
{

    public function tampil_data()
    {
        return $this->db->get('regencies');
    }

    public function input_data($data)
    {
        $this->db->insert('regencies', $data);
    }

    public function editDataKecamatan($data, $id)
    {
        $this->db->where('id', $id);
        $this->db->update('regencies', $data);
    }

    public function getDataKecamatanDetail($id)
    {
        $this->db->where('id', $id);
        $query =  $this->db->get('regencies');
        return $query->row();
    }

    public function deleteDataKecamatan($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('regencies');
    }
}