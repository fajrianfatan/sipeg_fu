<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Tbl_golruang_model extends CI_Model{

    public function tampil_data()
    {
        return $this->db->get('tbl_gol_ruang');
    }

    public function input_data($data)
    {
        $this->db->insert('tbl_gol_ruang',$data);
    }

    public function editDataGolRuang($data, $id)
    {
        $this->db->where('id_gol_ruang', $id);
        $this->db->update('tbl_gol_ruang', $data);
    
    }
    
    public function getDataGolRuangDetail($id)
    {
        $this->db->where('id_gol_ruang',$id);
        $query =  $this->db->get('tbl_gol_ruang');
        return $query->row();
    }

    public function deleteDataGolRuang($id)
    {
        $this->db->where('id_gol_ruang',$id);
        $this->db->delete('tbl_gol_ruang');
    }
}
?>