<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Pegawai_model extends CI_Model
{


    public function ambil_data($id)
    {
        $this->db->where('username', $id);
        return $this->db->get('pegawai')->row();
    }

    public function ambil_pass($id)
    {
        $this->db->where('password', $id);
        return $this->db->get('pegawai')->row();
    }

    public function tampil_data()
    {
        $this->db->select('a.*, b.nama as provinsi,c.nama as kota,d.nama as kecamatan,e.nama as kelurahan');
        $this->db->from('pegawai as a');
        $this->db->join('wilayah_provinsi as b', 'a.provinsi=b.id');
        $this->db->join('wilayah_kabupaten as c', 'a.kota=c.id');
        $this->db->join('wilayah_kecamatan as d', 'a.kecamatan=d.id');
        $this->db->join('wilayah_desa as e', 'a.kelurahan=e.id');
        return $this->db->get();
    }

    public function input_data($data)
    {


        $this->db->insert('pegawai', $data);
    }

    public function editDataPegawai($data, $id)
    {
        $this->db->where('id_pegawai', $id);
        $this->db->update('pegawai', $data);
    }

    public function update_data($table, $data, $where)
    {
        $this->db->update($table, $data, $where);
    }

    public function get_data($table, $data, $where)
    {
        $this->db->get($table, $data, $where);
    }

    public function getDataPegawaiDetail($id)
    {
        $this->db->where('id_pegawai', $id);
        $query =  $this->db->get('pegawai');
        return $query->row();
    }

    public function tampil_data_aspeg()
    {
        $username = $this->session->userdata['username'];
        return $this->db->query("SELECT * FROM pegawai
        WHERE pegawai.username='$username'");
    }

    public function deleteDataPegawai($id)
    {
        $this->db->where('id_pegawai', $id);
        $this->db->delete(array('pegawai', 'kepangkatan', 'jabatan', 'penghargaan'));
    }
}