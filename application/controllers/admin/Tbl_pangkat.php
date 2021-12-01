<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tbl_pangkat extends CI_Controller {

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
			'tbl_pangkat' => $this->Tbl_pangkat_model->tampil_data()->result(),
			'user_name' => $data->username,
			'level' => $data->level,
			'foto_user' => $data->foto_user,
			'judul' => 'Daftar Pangkat Pegawai',
            'judul2' => 'Control Panel',
            'judul3' => 'Daftar Pangkat Pegawai'
		);
		
        $this->load->view('admin/tbl_pangkat',$data);   
	}

	public function input()
	{
		$dataInput = $this->User_model->ambil_data($this->session->userdata['username']);
		$dataInput = array(
			'user_name' => $dataInput->username,
			'level' => $dataInput->level,
			'foto_user' => $dataInput->foto_user,
			'id_pangkat' => set_value('id_pangkat'),
			'pangkat' => set_value('pangkat'),
			'judul' => 'Tambah Daftar Pangkat Pegawai',
            'judul2' => 'Control Panel',
            'judul3' => 'Tambah Daftar Pangkat Pegawai'
		);
		$this->load->view('admin/tbl_pangkat_tambah',$dataInput);
	}

	public function input_aksi()
	{	
		$id_pangkat = $this->input->post('id_pangkat');
		$pangkat = $this->input->post('pangkat');
		
		$DataInsert = array(
			'id_pangkat' => $id_pangkat,
			'pangkat' => $pangkat,
		);

		$this->Tbl_pangkat_model->input_data($DataInsert);
		$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible " role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
		</button>
		Data pangkat pegawai berhasil ditambahkan.</div>');
		redirect(base_url('admin/tbl_pangkat'));
	}

	public function edit($id)
	{
		$recordpangkat = $this->Tbl_pangkat_model->getDataPangkatDetail($id);
		//echo "<pre>";
		//print_r($recordUser);
		//echo "<pre>";
		$data = $this->User_model->ambil_data($this->session->userdata['username']);
		$data = array(
			'tbl_pangkat' => $recordpangkat,
			'user_name' => $data->username,
			'level' => $data->level,
			'foto_user' => $data->foto_user,
			'judul' => 'Ubah Daftar Pangkat Pegawai',
            'judul2' => 'Control Panel',
            'judul3' => 'Ubah Daftar Pangkat Pegawai'
		);
		
		$this->load->view('admin/tbl_pangkat_edit',$data);
	}

	public function AksiEdit()
	{
		$id_pangkat = $this->input->post('id_pangkat');
		$pangkat = $this->input->post('pangkat');

		$DataUpdate = array(
			'pangkat'=> $pangkat,
		);
		//echo "<pre>";
		//print_r($DataUpdate);
		//echo "<pre>";
		$this->Tbl_pangkat_model->editDatapangkat($DataUpdate, $id_pangkat);
		$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible " role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
		</button>
		Data pangkat pegawai berhasil diubah.</div>');
		redirect('admin/tbl_pangkat');
	}

	public function deletePangkat($id_pangkat)
	{
		$this->Tbl_pangkat_model->deleteDatapangkat($id_pangkat);
		$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible " role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
		</button>
		Data pangkat pegawai berhasil dihapus.</div>');
		redirect('admin/tbl_pangkat');
	}
}
