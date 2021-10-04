<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Tbl_pekerjaan_model extends CI_Model{

    public function tampil_data()
    {
        return $this->db->get('tbl_pekerjaan');
    }

    public function input_data($data)
    {
        $this->db->insert('tbl_pekerjaan',$data);
    }

    public function editDataPekerjaan($data, $id)
    {
        $this->db->where('id_pekerjaan', $id);
        $this->db->update('tbl_pekerjaan', $data);
    
    }
    
    public function getDataPekerjaanDetail($id)
    {
        $this->db->where('id_pekerjaan',$id);
        $query =  $this->db->get('tbl_pekerjaan');
        return $query->row();
    }

    public function deleteDataPekerjaan($id)
    {
        $this->db->where('id_pekerjaan',$id);
        $this->db->delete('tbl_pekerjaan');
    }
}
?>