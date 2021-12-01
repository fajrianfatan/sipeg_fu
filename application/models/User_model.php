<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class User_model extends CI_Model{

    public function ambil_nama($data)
    {
        // $this->db->where('username');
        return $this->db->get('user',$data)->row();
    }

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

    public function update_data($table, $data, $where)
    {
        $this->db->update($table, $data, $where);
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