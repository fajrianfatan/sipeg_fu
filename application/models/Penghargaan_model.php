<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Penghargaan_model extends CI_Model{

    public function tampil_data()
    { 
        return $this->db->query("SELECT * FROM pegawai
        INNER JOIN penghargaan ON pegawai.id_pegawai = penghargaan.id_pegawai");
    }

    public function input_data($data)
    {
        $this->db->insert('penghargaan',$data);
    }

    public function editDataPenghargaan($data, $id)
    {
        $this->db->where('id_penghargaan', $id);
        $this->db->update('penghargaan', $data);
    
    }
    
    public function getDataPenghargaanDetail($id)
    {
        $this->db->where('id_penghargaan',$id);
        $query =  $this->db->get('penghargaan');
        return $query->row();
    }

    public function tampil_data_aspeg()
    {
        $username = $this->session->userdata['username'];
        return $this->db->query("SELECT * FROM pegawai
        INNER JOIN penghargaan ON pegawai.id_pegawai = penghargaan.id_pegawai
        WHERE pegawai.username='$username'");

    }

    public function deleteDataPenghargaan($id)
    {
        $this->db->where('id_penghargaan',$id);
        $this->db->delete('penghargaan');
    }
}
?>