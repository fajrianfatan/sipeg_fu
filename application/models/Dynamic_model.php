<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Dynamic_model extends CI_Model
{

    public function getDataProv()
    {
        return $this->db->get('wilayah_provinsi')->result_array();
    }

    public function getDataKabupaten($idprov)
    {
        return $this->db->get_where('wilayah_kabupaten', ['provinsi_id' => $idprov])->result();
    }

    public function getDataKecamatan($idkab)
    {
        return $this->db->get_where('wilayah_kecamatan', ['kabupaten_id' => $idkab])->result();
    }

    public function getDataDesa($idkec)
    {
        return $this->db->get_where('wilayah_desa', ['kecamatan_id' => $idkec])->result();
    }
    //FOR DATA PEGAWAI
    public function getAlamatProv()
    {
        return $this->db->query("SELECT * FROM wilayah_provinsi
        INNER JOIN pegawai ON wilayah_provinsi.id = pegawai.provinsi");
    }
    public function getAlamatKabupaten()
    {
        return $this->db->query("SELECT * FROM wilayah_kabupaten
        INNER JOIN pegawai ON wilayah_kabupaten.id = pegawai.kota");
    }
    public function getAlamatKecamatan()
    {
        return $this->db->query("SELECT * FROM wilayah_kecamatan
        INNER JOIN pegawai ON wilayah_kecamatan.id = pegawai.kecamatan");
    }
    public function getAlamatDesa()
    {
        return $this->db->query("SELECT * FROM wilayah_desa
        INNER JOIN pegawai ON wilayah_desa.id = pegawai.kelurahan");
    }
}