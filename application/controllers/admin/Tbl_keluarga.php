<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tbl_keluarga extends CI_Controller {

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
			'tbl_keluarga' => $this->Tbl_keluarga_model->tampil_data()->result(),
			'username' => $data->username,
			'level' => $data->level,
			'foto_user' => $data->foto_user,
			'judul' => 'Daftar Keluarga',
            'judul2' => 'Control Panel',
            'judul3' => 'Daftar Keluarga'
		);
		
        $this->load->view('admin/tbl_keluarga',$data);  
	}

	public function input()
	{
		$dataInput = $this->User_model->ambil_data($this->session->userdata['username']);
		$dataInput = array(
			'username' => $dataInput->username,
			'level' => $dataInput->level,
			'foto_user' => $dataInput->foto_user,
			'id_keluarga' => set_value('id_keluarga'),
			'keluarga' => set_value('keluarga'),
			'judul' => 'Tambah Data Keluarga',
            'judul2' => 'Control Panel',
            'judul3' => 'Tambah Data Keluarga'
		);
		$this->load->view('admin/tbl_keluarga_tambah',$dataInput);
	}

	public function input_aksi()
	{	
		$id_keluarga = $this->input->post('id_keluarga');
		$keluarga = $this->input->post('keluarga');
		
		$DataInsert = array(
			'id_keluarga' => $id_keluarga,
			'keluarga' => $keluarga,
		);

		$this->Tbl_keluarga_model->input_data($DataInsert);
		$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible " role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
		</button>
		Data keluarga berhasil ditambahkan.</div>');
		redirect(base_url('admin/tbl_keluarga'));
	}

	public function edit($id)
	{
		$recordKeluarga = $this->Tbl_keluarga_model->getDataKeluargaDetail($id);
		//echo "<pre>";
		//print_r($recordUser);
		//echo "<pre>";
		$data = $this->User_model->ambil_data($this->session->userdata['username']);
		$data = array(
			'tbl_keluarga' => $recordKeluarga,
			'username' => $data->username,
			'level' => $data->level,
			'foto_user' => $data->foto_user,
			'judul' => 'Ubah Data Keluarga',
            'judul2' => 'Control Panel',
            'judul3' => 'Ubah Data Keluarga'
		);
		
		$this->load->view('admin/tbl_keluarga_edit',$data);
	}

	public function AksiEdit()
	{
		$id_keluarga = $this->input->post('id_keluarga');
		$keluarga = $this->input->post('keluarga');

		$DataUpdate = array(
			'keluarga'=> $keluarga,
		);
		//echo "<pre>";
		//print_r($DataUpdate);
		//echo "<pre>";
		$this->Tbl_keluarga_model->editDataKeluarga($DataUpdate, $id_keluarga);
		$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible " role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
		</button>
		Data keluarga berhasil diubah.</div>');
		redirect('admin/tbl_keluarga');
	}

	public function deleteKeluarga($id_keluarga)
	{
		$this->Tbl_keluarga_model->deleteDataKeluarga($id_keluarga);
		$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible " role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
		</button>
		Data keluarga berhasil dihapus.</div>');
		redirect('admin/tbl_keluarga');
	}
}
