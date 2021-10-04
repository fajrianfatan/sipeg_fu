<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Pendidikan_model extends CI_Model{

    public function tampil_data()
    {
        return $this->db->query("SELECT * FROM pegawai
        INNER JOIN pendidikan ON pegawai.id_pegawai = pendidikan.id_pegawai");
    }

    public function input_data($data)
    {
        $this->db->get('pegawai');
        $this->db->insert('pendidikan',$data);
    }

    public function editDataPendidikan($data, $id)
    {
        $this->db->where('id_pendidikan', $id);
        $this->db->update('pendidikan', $data);
    
    }
    
    public function getDataPendidikanDetail($id)
    {
        $this->db->where('id_pendidikan',$id);
        $query =  $this->db->get('pendidikan');
        return $query->row();
    }

    public function tampil_data_aspeg()
    {
        $username = $this->session->userdata['username'];
        return $this->db->query("SELECT * FROM pegawai
        INNER JOIN pendidikan ON pegawai.id_pegawai = pendidikan.id_pegawai
        WHERE pegawai.username='$username'");
    }
  
    public function update_data($table, $data, $where)
    {
        $this->db->update($table, $data, $where);
    }
    
    public function deleteDataPendidikan($id)
    {
        $this->db->where('id_pendidikan',$id);
        $this->db->delete('pendidikan');
    }

}
?>