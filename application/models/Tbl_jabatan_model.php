<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Tbl_jabatan_model extends CI_Model{

    public function tampil_data()
    {
        return $this->db->get('tbl_jabatan');
    }

    public function input_data($data)
    {
        $this->db->insert('tbl_jabatan',$data);
    }

    public function editDataJabatan($data, $id)
    {
        $this->db->where('id_kat_jabatan', $id);
        $this->db->update('tbl_jabatan', $data);
    
    }
    
    public function getDataJabatanDetail($id)
    {
        $this->db->where('id_kat_jabatan',$id);
        $query =  $this->db->get('tbl_jabatan');
        return $query->row();
    }

    public function deleteDataJabatan($id)
    {
        $this->db->where('id_kat_jabatan',$id);
        $this->db->delete('tbl_jabatan');
    }
}
?>