<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Tbl_keluarga_model extends CI_Model{

    public function tampil_data()
    {
        return $this->db->get('tbl_keluarga');
    }

    public function input_data($data)
    {
        $this->db->insert('tbl_keluarga',$data);
    }

    public function editDataKeluarga($data, $id)
    {
        $this->db->where('id_keluarga', $id);
        $this->db->update('tbl_keluarga', $data);
    
    }
    
    public function getDataKeluargaDetail($id)
    {
        $this->db->where('id_keluarga',$id);
        $query =  $this->db->get('tbl_keluarga');
        return $query->row();
    }

    public function deleteDataKeluarga($id)
    {
        $this->db->where('id_keluarga',$id);
        $this->db->delete('tbl_keluarga');
    }
}
?>