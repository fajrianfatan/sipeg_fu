<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tbl_jenis_pegawai extends CI_Controller {

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
			'tbl_jenis_pegawai' => $this->Tbl_jenis_pegawai_model->tampil_data()->result(),
			'username' => $data->username,
			'level' => $data->level,
			'foto_user' => $data->foto_user,
			'judul' => 'Daftar Jenis Pegawai',
            'judul2' => 'Control Panel',
            'judul3' => 'Daftar Jenis Pegawai'
		);
		
        $this->load->view('admin/tbl_jenis_pegawai',$data);   
	}

	public function input()
	{
		$dataInput = $this->User_model->ambil_data($this->session->userdata['username']);
		$dataInput = array(
			'username' => $dataInput->username,
			'level' => $dataInput->level,
			'foto_user' => $dataInput->foto_user,
			'id_jenis_pegawai' => set_value('id_jenis_pegawai'),
			'jenis_pegawai' => set_value('jenis_pegawai'),
			'judul' => 'Tambah Daftar Jenis Pegawai',
            'judul2' => 'Control Panel',
            'judul3' => 'Tambah Daftar Jenis Pegawai'
		);
		$this->load->view('admin/tbl_jenis_pegawai_tambah',$dataInput);
	}

	public function input_aksi()
	{	
		$id_jenis_pegawai = $this->input->post('id_jenis_pegawai');
		$jenis_pegawai = $this->input->post('jenis_pegawai');
		
		$DataInsert = array(
			'id_jenis_pegawai' => $id_jenis_pegawai,
			'jenis_pegawai' => $jenis_pegawai,
		);

		$this->Tbl_jenis_pegawai_model->input_data($DataInsert);
		$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible " role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
		</button>
		Data jenis pegawai berhasil ditambahkan.</div>');
		redirect(base_url('admin/tbl_jenis_pegawai'));
	}

	public function edit($id)
	{
		$recordJenis = $this->Tbl_jenis_pegawai_model->getDataJenisDetail($id);
		//echo "<pre>";
		//print_r($recordUser);
		//echo "<pre>";
		$data = $this->User_model->ambil_data($this->session->userdata['username']);
		$data = array(
			'tbl_jenis_pegawai' => $recordJenis,
			'username' => $data->username,
			'level' => $data->level,
			'foto_user' => $data->foto_user,
			'judul' => 'Ubah Daftar Jenis Pegawai',
            'judul2' => 'Control Panel',
            'judul3' => 'Ubah Daftar Jenis Pegawai'
		);
		
		$this->load->view('admin/tbl_jenis_pegawai_edit',$data);
	}

	public function AksiEdit()
	{
		$id_jenis_pegawai = $this->input->post('id_jenis_pegawai');
		$jenis_pegawai = $this->input->post('jenis_pegawai');

		$DataUpdate = array(
			'jenis_pegawai'=> $jenis_pegawai,
		);
		//echo "<pre>";
		//print_r($DataUpdate);
		//echo "<pre>";
		$this->Tbl_jenis_pegawai_model->editDataJenis($DataUpdate, $id_jenis_pegawai);
		$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible " role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
		</button>
		Data jenis pegawai berhasil diubah.</div>');
		redirect('admin/tbl_jenis_pegawai');
	}

	public function deleteJenis($id_jenis_pegawai)
	{
		$this->Tbl_jenis_pegawai_model->deleteDataJenis($id_jenis_pegawai);
		$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible " role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
		</button>
		Data jenis pegawai berhasil dihapus.</div>');
		redirect('admin/tbl_jenis_pegawai');
	}
}
