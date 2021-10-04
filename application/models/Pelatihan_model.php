<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Pelatihan_model extends CI_Model{

    public function tampil_data()
    { 
        return $this->db->query("SELECT * FROM pegawai
        INNER JOIN pelatihan ON pegawai.id_pegawai = pelatihan.id_pegawai");
    }

    public function input_data($data)
    {
        $this->db->insert('pelatihan',$data);
    }

    public function editDataPelatihan($data, $id)
    {
        $this->db->where('id_pelatihan', $id);
        $this->db->update('pelatihan', $data);
    
    }
    
    public function getDataPelatihanDetail($id)
    {
        $this->db->where('id_pelatihan',$id);
        $query =  $this->db->get('pelatihan');
        return $query->row();
    }

    public function tampil_data_aspeg()
    {
        $username = $this->session->userdata['username'];
        return $this->db->query("SELECT * FROM pegawai
        INNER JOIN pelatihan ON pegawai.id_pegawai = pelatihan.id_pegawai
        WHERE pegawai.username='$username'");

    }

    public function deleteDataPelatihan($id)
    {
        $this->db->where('id_pelatihan',$id);
        $this->db->delete('pelatihan');
    }
}
?>