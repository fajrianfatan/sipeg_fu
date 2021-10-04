<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Tbl_jurusan_model extends CI_Model{

    public function tampil_data()
    {  
        return $this->db->get('tbl_jurusan');
    }

    public function input_data($data)
    {
        $this->db->insert('tbl_jurusan',$data);
    }

    public function editDataJurusan($data, $id)
    {
        $this->db->where('id_jurusan', $id);
        $this->db->update('tbl_jurusan', $data);
    
    }
    
    public function getDataJurusanDetail($id)
    {
        $this->db->where('id_jurusan',$id);
        $query =  $this->db->get('tbl_jurusan');
        return $query->row();
    }

    public function deleteDataJurusan($id)
    {
        $this->db->where('id_jurusan',$id);
        $this->db->delete('tbl_jurusan');
    }
}
?>