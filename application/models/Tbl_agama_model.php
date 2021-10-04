<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Tbl_agama_model extends CI_Model{

    public function tampil_data()
    {
        return $this->db->get('tbl_agama');
    }

    public function input_data($data)
    {
        $this->db->insert('tbl_agama',$data);
    }

    public function editDataAgama($data, $id)
    {
        $this->db->where('id_agama', $id);
        $this->db->update('tbl_agama', $data);
    
    }
    
    public function getDataAgamaDetail($id)
    {
        $this->db->where('id_agama',$id);
        $query =  $this->db->get('tbl_agama');
        return $query->row();
    }

    public function deleteDataAgama($id)
    {
        $this->db->where('id_agama',$id);
        $this->db->delete('tbl_agama');
    }
}
?>