<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Profil extends CI_Model{

    public function ambil_data($id)
    {
        $this->db->where('username', $id);
        return $this->db->get('user')->row();
    }

    public function tampil_data()
    {
        return $this->db->get('user');
    }

    public function input_data($data)
    {
        $this->db->insert('user',$data);
    }

    public function editDataUser($data, $id)
    {
        $this->db->where('id_user', $id);
        $this->db->update('user', $data);
    
    }
    
    public function getDataUserDetail($id)
    {
        $this->db->where('id_user',$id);
        $query =  $this->db->get('user');
        return $query->row();
    }

    public function deleteDataUser($id)
    {
        $this->db->where('id_user',$id);
        $this->db->delete('user');
    }
}
?>