<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tbl_agama extends CI_Controller {

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
			'tbl_agama' => $this->Tbl_agama_model->tampil_data()->result(),
			'user_name' => $data->username,
			'level' => $data->level,
			'foto_user' => $data->foto_user,
			'judul' => 'Daftar Agama',
            'judul2' => 'Control Panel',
            'judul3' => 'Daftar Agama'
		);
		
        $this->load->view('admin/tbl_agama',$data);  
	}

	public function input()
	{
		$dataInput = $this->User_model->ambil_data($this->session->userdata['username']);
		$dataInput = array(
			'user_name' => $dataInput->username,
			'level' => $dataInput->level,
			'foto_user' => $dataInput->foto_user,
			'id_agama' => set_value('id_agama'),
			'agama' => set_value('agama'),
			'judul' => 'Tambah Daftar Agama',
            'judul2' => 'Control Panel',
            'judul3' => 'Tambah Daftar Agama'
		);
		$this->load->view('admin/tbl_agama_tambah',$dataInput);
	}

	public function input_aksi()
	{	
		$id_agama = $this->input->post('id_agama');
		$agama = $this->input->post('agama');
		
		$DataInsert = array(
			'id_agama' => $id_agama,
			'agama' => $agama,
		);

		$this->Tbl_agama_model->input_data($DataInsert);
		$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible " role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
		</button>
		Data agama berhasil ditambahkan.</div>');
		redirect(base_url('admin/tbl_agama'));
	}

	public function edit($id)
	{
		$recordAgama = $this->Tbl_agama_model->getDataAgamaDetail($id);
		//echo "<pre>";
		//print_r($recordUser);
		//echo "<pre>";
		$data = $this->User_model->ambil_data($this->session->userdata['username']);
		$data = array(
			'tbl_agama' => $recordAgama,
			'user_name' => $data->username,
			'level' => $data->level,
			'foto_user' => $data->foto_user,
			'judul' => 'Ubah Data Agama',
            'judul2' => 'Control Panel',
            'judul3' => 'Ubah Data Agama'
		);
		
		$this->load->view('admin/tbl_agama_edit',$data);
	}

	public function AksiEdit()
	{
		$id_agama = $this->input->post('id_agama');
		$agama = $this->input->post('agama');

		$DataUpdate = array(
			'agama'=> $agama,
		);
		//echo "<pre>";
		//print_r($DataUpdate);
		//echo "<pre>";
		$this->Tbl_agama_model->editDataAgama($DataUpdate, $id_agama);
		$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible " role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
		</button>
		Data agama berhasil diubah.</div>');
		redirect('admin/tbl_agama');
	}

	public function deleteAgama($id_agama)
	{
		$this->Tbl_agama_model->deleteDataAgama($id_agama);
		$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible " role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
		</button>
		Data agama berhasil dihapus.</div>');
		redirect('admin/tbl_agama');
	}
}
