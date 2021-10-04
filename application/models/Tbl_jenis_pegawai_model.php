<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Tbl_jenis_pegawai_model extends CI_Model{

    public function tampil_data()
    {
        return $this->db->get('tbl_jenis_pegawai');
    }

    public function input_data($data)
    {
        $this->db->insert('tbl_jenis_pegawai',$data);
    }

    public function editDataJenis($data, $id)
    {
        $this->db->where('id_jenis_pegawai', $id);
        $this->db->update('tbl_jenis_pegawai', $data);
    
    }
    
    public function getDataJenisDetail($id)
    {
        $this->db->where('id_jenis_pegawai',$id);
        $query =  $this->db->get('tbl_jenis_pegawai');
        return $query->row();
    }

    public function deleteDataJenis($id)
    {
        $this->db->where('id_jenis_pegawai',$id);
        $this->db->delete('tbl_jenis_pegawai');
    }
}
?>