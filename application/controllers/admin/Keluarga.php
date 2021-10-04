<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Keluarga extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		if($this->session->userdata('level') != 'admin'){
			redirect('auth/kicked');
			exit;
		}
	}

	public function index()
	{
		$data = $this->User_model->ambil_data($this->session->userdata['username']);
		$data = array(
			'keluarga' => $this->Keluarga_model->tampil_data()->result(),
			'username' => $data->username,
			'level' => $data->level,
			'foto_user' => $data->foto_user,
			'judul' => 'Riwayat Keluarga Pegawai',
            'judul2' => 'Data Pegawai',
            'judul3' => 'Riwayat Keluarga Pegawai'
		);
		
        $this->load->view('admin/keluarga',$data);
	}

	public function input()
	{
		$dataInput = $this->User_model->ambil_data($this->session->userdata['username']);
		$dataInput = array(
			'pegawai' => $this->Pegawai_model->tampil_data('pegawai')->result(),
			'tbl_keluarga' => $this->Tbl_keluarga_model->tampil_data('tbl_keluarga')->result(),
			'tbl_jenis_kelamin' => $this->Tbl_jenis_kelamin_model->tampil_data('tbl_jenis_kelamin')->result(),
			'tbl_pekerjaan' => $this->Tbl_pekerjaan_model->tampil_data('tbl_pekerjaan')->result(),
			'username' => $dataInput->username,
			'level' => $dataInput->level,
			'foto_user' => $dataInput->foto_user,
			'id_keluarga' => set_value('id_keluarga'),
			'id_pegawai' => set_value('id_pegawai'),
			'nama_anggota' => set_value('nama_anggota'),
			'tempat_lahir_anggota' => set_value('tempat_lahir_anggota'),
			'tgl_lahir_anggota' => set_value('tgl_lahir_anggota'),
            'jk' => set_value('jk'),
            'sebagai' => set_value('sebagai'),
            'pekerjaan' => set_value('pekerjaan'),
			'judul' => 'Tambah Data Keluarga',
            'judul2' => 'Data Pegawai',
            'judul3' => 'Tambah Data Keluarga'
		);
		$this->load->view('admin/keluarga_tambah',$dataInput);
	}

	public function input_aksi()
	{	
		$id_keluarga = $this->input->post('id_keluarga');
		$id_pegawai = $this->input->post('id_pegawai');
		$nama_anggota = $this->input->post('nama_anggota');
		$tempat_lahir_anggota = $this->input->post('tempat_lahir_anggota');
		$tgl_lahir_anggota = $this->input->post('tgl_lahir_anggota');
        $jk = $this->input->post('jk');
        $sebagai = $this->input->post('sebagai');
        $pekerjaan = $this->input->post('pekerjaan');
		
		$DataInsert = array(
			'id_keluarga' => $id_keluarga,
			'id_pegawai' => $id_pegawai,
			'nama_anggota' => $nama_anggota,
			'tempat_lahir_anggota' => $tempat_lahir_anggota,
			'tgl_lahir_anggota' => $tgl_lahir_anggota,
            'jk' => $jk,
            'sebagai' => $sebagai,
            'pekerjaan' => $pekerjaan,
		);
		// echo "<pre>";
		// print_r($DataInsert);
		// echo "<pre>";
		$this->Keluarga_model->input_data($DataInsert);
		$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible " role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
		</button>
		Data keluarga pegawai berhasil ditambahkan.</div>');
		redirect(base_url('admin/keluarga'));
	}

	public function edit($id)
	{
		$recordKeluarga = $this->Keluarga_model->getDataKeluargaDetail($id);
		//echo "<pre>";
		//print_r($recordUser);
		//echo "<pre>";
		$data = $this->User_model->ambil_data($this->session->userdata['username']);
		$data = array(
			'pegawai' => $this->Pegawai_model->tampil_data('pegawai')->result(),
			'tbl_keluarga' => $this->Tbl_keluarga_model->tampil_data('tbl_keluarga')->result(),
			'tbl_jenis_kelamin' => $this->Tbl_jenis_kelamin_model->tampil_data('tbl_jenis_kelamin')->result(),
			'tbl_pekerjaan' => $this->Tbl_pekerjaan_model->tampil_data('tbl_pekerjaan')->result(),
			'keluarga' => $recordKeluarga,
			'username' => $data->username,
			'level' => $data->level,
			'foto_user' => $data->foto_user,
			'judul' => 'Ubah Data Keluarga',
            'judul2' => 'Data Pegawai',
            'judul3' => 'Ubah Data Keluarga'
		);
		
		$this->load->view('admin/keluarga_edit',$data);
	}

	public function AksiEdit()
	{
		$id_keluarga = $this->input->post('id_keluarga');
		$id_pegawai = $this->input->post('id_pegawai');
		$nama_anggota = $this->input->post('nama_anggota');
		$tempat_lahir_anggota = $this->input->post('tempat_lahir_anggota');
		$tgl_lahir_anggota = $this->input->post('tgl_lahir_anggota');
        $jk = $this->input->post('jk');
        $sebagai = $this->input->post('sebagai');
        $pekerjaan = $this->input->post('pekerjaan');

		$DataUpdate = array(
			'id_keluarga'=> $id_keluarga,
			'nama_anggota'=> $nama_anggota,
			'tempat_lahir_anggota'=> $tempat_lahir_anggota,
			'tgl_lahir_anggota'=> $tgl_lahir_anggota,
            'jk'=> $jk,
            'sebagai'=> $sebagai,
            'pekerjaan'=> $pekerjaan
		);
		//echo "<pre>";
		//print_r($DataUpdate);
		//echo "<pre>";
		$this->Keluarga_model->editDataKeluarga($DataUpdate, $id_keluarga);
		$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible " role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
		</button>
		Data keluarga pegawai berhasil diubah.</div>');
		redirect('admin/keluarga');
	}

	public function deleteKeluarga($id_keluarga)
	{
		$this->Keluarga_model->deleteDataKeluarga($id_keluarga);
		$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible " role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
		</button>
		Data keluarga pegawai berhasil dihapus.</div>');
		redirect('admin/keluarga');
	}
}
