<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jabatan_model extends CI_Model{

    public function tampil_data()
    {  
        return $this->db->query("SELECT * FROM pegawai
        INNER JOIN jabatan ON pegawai.id_pegawai = jabatan.id_pegawai");
    }

    public function input_data($data)
    {
        $this->db->insert('jabatan',$data);
    }

    public function editDataJabatan($data, $id)
    {
        $this->db->where('id_jabatan', $id);
        $this->db->update('jabatan', $data);
    
    }

    public function editJabatan($data, $id)
    {
        $this->db->where('id_jabatan', $id);
        $this->db->update('jabatan', $data);
    
    }
    
    public function update_data($table, $data, $where)
    {
        $this->db->update($table, $data, $where);
    }
    
    public function getJabatanDetail($id)
    {
        $this->db->where('id_jabatan',$id);
        $query =  $this->db->get('jabatan');
        return $query->row();
    }

    public function tampil_data_aspeg()
    {
        $username = $this->session->userdata['username'];
        return $this->db->query("SELECT * FROM pegawai
        INNER JOIN jabatan ON pegawai.id_pegawai = jabatan.id_pegawai
        WHERE pegawai.username='$username'");

    }

    public function deleteJabatan($id)
    {
        $this->db->where('id_jabatan',$id);
        $this->db->delete('jabatan');
    }
}
?>