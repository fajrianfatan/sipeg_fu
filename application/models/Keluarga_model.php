<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Keluarga_model extends CI_Model{

    public function tampil_data()
    {
        return $this->db->query("SELECT * FROM pegawai
        INNER JOIN keluarga ON pegawai.id_pegawai = keluarga.id_pegawai");
    }

    public function input_data($data)
    {
        $this->db->get('pegawai');
        $this->db->insert('keluarga',$data);
    }

    public function editDataKeluarga($data, $id)
    {
        $this->db->where('id_keluarga', $id);
        $this->db->update('keluarga', $data);
    
    }
    
    public function getDataKeluargaDetail($id)
    {
        $this->db->where('id_keluarga',$id);
        $query =  $this->db->get('keluarga');
        return $query->row();
    }

    public function tampil_data_aspeg()
    {
        $username = $this->session->userdata['username'];
        return $this->db->query("SELECT * FROM pegawai
        INNER JOIN keluarga ON pegawai.id_pegawai = keluarga.id_pegawai
        WHERE pegawai.username='$username'");
    }
  
    public function update_data($table, $data, $where)
    {
        $this->db->update($table, $data, $where);
    }
    
    public function deleteDataKeluarga($id)
    {
        $this->db->where('id_keluarga',$id);
        $this->db->delete('keluarga');
    }

}
?>