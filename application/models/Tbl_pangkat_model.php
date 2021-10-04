<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Tbl_pangkat_model extends CI_Model{

    public function tampil_data()
    {
        return $this->db->get('tbl_pangkat');
    }

    public function input_data($data)
    {
        $this->db->insert('tbl_pangkat',$data);
    }

    public function editDataPangkat($data, $id)
    {
        $this->db->where('id_pangkat', $id);
        $this->db->update('tbl_pangkat', $data);
    
    }
    
    public function getDataPangkatDetail($id)
    {
        $this->db->where('id_pangkat',$id);
        $query =  $this->db->get('tbl_pangkat');
        return $query->row();
    }

    public function deleteDataPangkat($id)
    {
        $this->db->where('id_pangkat',$id);
        $this->db->delete('tbl_pangkat');
    }
}
?>