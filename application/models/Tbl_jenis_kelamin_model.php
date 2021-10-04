<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Tbl_jenis_kelamin_model extends CI_Model{

    public function tampil_data()
    {
        return $this->db->get('tbl_jenis_kelamin');
    }

    public function input_data($data)
    {
        $this->db->insert('tbl_jenis_kelamin',$data);
    }

    public function editDataJenisKelamin($data, $id)
    {
        $this->db->where('id_jenis_kelamin', $id);
        $this->db->update('tbl_jenis_kelamin', $data);
    
    }
    
    public function getDataJenisKelaminDetail($id)
    {
        $this->db->where('id_jenis_kelamin',$id);
        $query =  $this->db->get('tbl_jenis_kelamin');
        return $query->row();
    }

    public function deleteDataJenisKelamin($id)
    {
        $this->db->where('id_jenis_kelamin',$id);
        $this->db->delete('tbl_jenis_kelamin');
    }
}
?>