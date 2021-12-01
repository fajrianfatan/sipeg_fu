<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tbl_jabatan extends CI_Controller {

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
			'tbl_jabatan' => $this->Tbl_jabatan_model->tampil_data()->result(),
			'user_name' => $data->username,
			'level' => $data->level,
			'foto_user' => $data->foto_user,
			'judul' => 'Daftar Jabatan Pegawai',
            'judul2' => 'Control Panel',
            'judul3' => 'Daftar Jabatan Pegawai'
		);
		
        $this->load->view('admin/tbl_jabatan',$data);
	}

	public function input()
	{
		$dataInput = $this->User_model->ambil_data($this->session->userdata['username']);
		$dataInput = array(
			'user_name' => $dataInput->username,
			'level' => $dataInput->level,
			'foto_user' => $dataInput->foto_user,
			'id_kat_jabatan' => set_value('id_kat_jabatan'),
			'jabatan' => set_value('jabatan'),
			'judul' => 'Tambah Daftar Jabatan Pegawai',
            'judul2' => 'Control Panel',
            'judul3' => 'Tambah Daftar Jabatan Pegawai'
		);
		$this->load->view('admin/tbl_jabatan_tambah',$dataInput);
	}

	public function input_aksi()
	{	
		$id_kat_jabatan = $this->input->post('id_kat_jabatan');
		$jabatan = $this->input->post('jabatan');
		
		$DataInsert = array(
			'id_kat_jabatan' => $id_kat_jabatan,
			'jabatan' => $jabatan,
		);

		$this->Tbl_jabatan_model->input_data($DataInsert);
		$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible " role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
		</button>
		Data jabatan pegawai berhasil ditambahkan.</div>');
		redirect(base_url('admin/tbl_jabatan'));
	}

	public function edit($id)
	{
		$recordjabatan = $this->Tbl_jabatan_model->getDataJabatanDetail($id);
		//echo "<pre>";
		//print_r($recordUser);
		//echo "<pre>";
		$data = $this->User_model->ambil_data($this->session->userdata['username']);
		$data = array(
			'tbl_jabatan' => $recordjabatan,
			'user_name' => $data->username,
			'level' => $data->level,
			'foto_user' => $data->foto_user,
			'judul' => 'Ubah Daftar Jabatan Pegawai',
            'judul2' => 'Control Panel',
            'judul3' => 'Ubah Daftar Jabatan Pegawai'
		);
		
		$this->load->view('admin/tbl_jabatan_edit',$data);
	}

	public function AksiEdit()
	{
		$id_kat_jabatan = $this->input->post('id_kat_jabatan');
		$jabatan = $this->input->post('jabatan');

		$DataUpdate = array(
			'jabatan'=> $jabatan,
		);
		//echo "<pre>";
		//print_r($DataUpdate);
		//echo "<pre>";
		$this->Tbl_jabatan_model->editDataJabatan($DataUpdate, $id_kat_jabatan);
		$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible " role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
		</button>
		Data jabatan pegawai berhasil diubah.</div>');
		redirect('admin/tbl_jabatan');
	}

	public function deleteDataJabatan($id_kat_jabatan)
	{
		$this->Tbl_jabatan_model->deleteDataJabatan($id_kat_jabatan);
		$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible " role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
		</button>
		Data jabatan pegawai berhasil dihapus.</div>');
		redirect('admin/tbl_jabatan');
	}
}
