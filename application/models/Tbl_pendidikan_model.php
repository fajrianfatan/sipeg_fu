<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Tbl_pendidikan_model extends CI_Model{

    public function tampil_data()
    {
        return $this->db->get('tbl_pendidikan');
    }

    public function input_data($data)
    {
        $this->db->insert('tbl_pendidikan',$data);
    }

    public function editDataPendidikan($data, $id)
    {
        $this->db->where('id_pendidikan', $id);
        $this->db->update('tbl_pendidikan', $data);
    
    }
    
    public function getDataPendidikanDetail($id)
    {
        $this->db->where('id_pendidikan',$id);
        $query =  $this->db->get('tbl_pendidikan');
        return $query->row();
    }

    public function deleteDataPendidikan($id)
    {
        $this->db->where('id_pendidikan',$id);
        $this->db->delete('tbl_pendidikan');
    }
}
?>