<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Tbl_status_menikah_model extends CI_Model{

    public function tampil_data()
    {
        return $this->db->get('tbl_status_menikah');
    }

    public function input_data($data)
    {
        $this->db->insert('tbl_status_menikah',$data);
    }

    public function editDataStatusMenikah($data, $id)
    {
        $this->db->where('id_status_menikah', $id);
        $this->db->update('tbl_status_menikah', $data);
    
    }
    
    public function getDataStatusMenikahDetail($id)
    {
        $this->db->where('id_status_menikah',$id);
        $query =  $this->db->get('tbl_status_menikah');
        return $query->row();
    }

    public function deleteDataStatusMenikah($id)
    {
        $this->db->where('id_status_menikah',$id);
        $this->db->delete('tbl_status_menikah');
    }
}
?>