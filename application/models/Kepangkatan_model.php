<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Kepangkatan_model extends CI_Model{

    public function tampil_data()
    {
        return $this->db->query("SELECT * FROM pegawai
        INNER JOIN kepangkatan ON pegawai.id_pegawai = kepangkatan.id_pegawai");
    }

    public function input_data($data)
    {
        $this->db->get('pegawai');
        $this->db->insert('kepangkatan',$data);
    }

    public function editDataKepangkatan($data, $id)
    {
        $this->db->where('id_kepangkatan', $id);
        $this->db->update('kepangkatan', $data);
    
    }
    
    public function getDataKepangkatanDetail($id)
    {
        $this->db->where('id_kepangkatan',$id);
        $query =  $this->db->get('kepangkatan');
        return $query->row();
    }

    public function tampil_data_aspeg()
    {
        $username = $this->session->userdata['username'];
        return $this->db->query("SELECT * FROM pegawai
        INNER JOIN kepangkatan ON pegawai.id_pegawai = kepangkatan.id_pegawai
        WHERE pegawai.username='$username'");
    }
  
    public function update_data($table, $data, $where)
    {
        $this->db->update($table, $data, $where);
    }
    
    public function deleteDataKepangkatan($id)
    {
        $this->db->where('id_kepangkatan',$id);
        $this->db->delete('kepangkatan');
    }

}
?>