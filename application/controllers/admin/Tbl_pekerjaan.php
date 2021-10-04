<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tbl_pekerjaan extends CI_Controller {

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
			'tbl_pekerjaan' => $this->Tbl_pekerjaan_model->tampil_data()->result(),
			'username' => $data->username,
			'level' => $data->level,
			'foto_user' => $data->foto_user,
			'judul' => 'Daftar Pekerjaan Pegawai',
            'judul2' => 'Control Panel',
            'judul3' => 'Daftar Pekerjaan Pegawai'
		);
		
        $this->load->view('admin/tbl_pekerjaan',$data);  
	}

	public function input()
	{
		$dataInput = $this->User_model->ambil_data($this->session->userdata['username']);
		$dataInput = array(
			'username' => $dataInput->username,
			'level' => $dataInput->level,
			'foto_user' => $dataInput->foto_user,
			'id_pekerjaan' => set_value('id_pekerjaan'),
			'pekerjaan' => set_value('pekerjaan'),
			'judul' => 'Tambah Data Pekerjaan Pegawai',
            'judul2' => 'Control Panel',
            'judul3' => 'Tambah Data Pekerjaan Pegawai'
		);
		$this->load->view('admin/tbl_pekerjaan_tambah',$dataInput);
	}

	public function input_aksi()
	{	
		$id_pekerjaan = $this->input->post('id_pekerjaan');
		$pekerjaan = $this->input->post('pekerjaan');
		
		$DataInsert = array(
			'id_pekerjaan' => $id_pekerjaan,
			'pekerjaan' => $pekerjaan,
		);

		$this->Tbl_pekerjaan_model->input_data($DataInsert);
		$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible " role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
		</button>
		Data pekerjaan pegawai berhasil ditambahkan.</div>');
		redirect(base_url('admin/tbl_pekerjaan'));
	}

	public function edit($id)
	{
		$recordPekerjaan = $this->Tbl_pekerjaan_model->getDataPekerjaanDetail($id);
		//echo "<pre>";
		//print_r($recordUser);
		//echo "<pre>";
		$data = $this->User_model->ambil_data($this->session->userdata['username']);
		$data = array(
			'tbl_pekerjaan' => $recordPekerjaan,
			'username' => $data->username,
			'level' => $data->level,
			'foto_user' => $data->foto_user,
			'judul' => 'Ubah Data Pekerjaan Pegawai',
            'judul2' => 'Control Panel',
            'judul3' => 'Ubah Data Pekerjaan Pegawai'
		);
		
		$this->load->view('admin/tbl_pekerjaan_edit',$data);
	}

	public function AksiEdit()
	{
		$id_pekerjaan = $this->input->post('id_pekerjaan');
		$pekerjaan = $this->input->post('pekerjaan');

		$DataUpdate = array(
			'pekerjaan'=> $pekerjaan,
		);
		//echo "<pre>";
		//print_r($DataUpdate);
		//echo "<pre>";
		$this->Tbl_pekerjaan_model->editDataPekerjaan($DataUpdate, $id_pekerjaan);
		$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible " role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
		</button>
		Data pekerjaan pegawai berhasil diubah.</div>');
		redirect('admin/tbl_pekerjaan');
	}

	public function deletePekerjaan($id_pekerjaan)
	{
		$this->Tbl_pekerjaan_model->deleteDataPekerjaan($id_pekerjaan);
		$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible " role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
		</button>
		Data pekerjaan pegawai berhasil dihapus.</div>');
		redirect('admin/tbl_pekerjaan');
	}
}
