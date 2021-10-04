<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tbl_pendidikan extends CI_Controller {

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
			'tbl_pendidikan' => $this->Tbl_pendidikan_model->tampil_data()->result(),
			'username' => $data->username,
			'level' => $data->level,
			'foto_user' => $data->foto_user,
			'judul' => 'Daftar Pendidikan Pegawai',
            'judul2' => 'Control Panel',
            'judul3' => 'Daftar Pendidikan Pegawai'
		);
		
        $this->load->view('admin/tbl_pendidikan',$data);

	}

	public function input()
	{
		$data = $this->User_model->ambil_data($this->session->userdata['username']);
		$dataInput = array(
			'username' => $data->username,
			'level' => $data->level,
			'foto_user' => $data->foto_user,
			'id_pendidikan' => set_value('id_pendidikan'),
			'pendidikan' => set_value('pendidikan'),
			'judul' => 'Tambah Daftar Pendidikan Pegawai',
            'judul2' => 'Control Panel',
            'judul3' => 'Tambah Daftar Pendidikan Pegawai'
		);
		$this->load->view('admin/tbl_pendidikan_tambah',$dataInput);
	}

	public function input_aksi()
	{	
		$id_pendidikan = $this->input->post('id_pendidikan');
		$pendidikan = $this->input->post('pendidikan');
		
		$DataInsert = array(
			'id_pendidikan' => $id_pendidikan,
			'pendidikan' => $pendidikan,
		);

		$this->Tbl_pendidikan_model->input_data($DataInsert);
		$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible " role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
		</button>
		Data pendidikan pegawai berhasil ditambahkan.</div>');
		redirect(base_url('admin/tbl_pendidikan'));
	}

	public function edit($id)
	{
		$recordPendidikan = $this->Tbl_pendidikan_model->getDataPendidikanDetail($id);
		//echo "<pre>";
		//print_r($recordUser);
		//echo "<pre>";
		$data = $this->User_model->ambil_data($this->session->userdata['username']);
		$data = array(
			'tbl_pendidikan' => $recordPendidikan,
			'username' => $data->username,
			'level' => $data->level,
			'foto_user' => $data->foto_user,
			'judul' => 'Ubah Daftar Pendidikan Pegawai',
            'judul2' => 'Control Panel',
            'judul3' => 'Ubah Daftar Pendidikan Pegawai'
		);
		
		$this->load->view('admin/tbl_pendidikan_edit',$data);
	}

	public function AksiEdit()
	{
		$id_pendidikan = $this->input->post('id_pendidikan');
		$pendidikan = $this->input->post('pendidikan');

		$DataUpdate = array(
			'pendidikan'=> $pendidikan,
		);
		//echo "<pre>";
		//print_r($DataUpdate);
		//echo "<pre>";
		$this->Tbl_pendidikan_model->editDataPendidikan($DataUpdate, $id_pendidikan);
		$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible " role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
		</button>
		Data pendidikan pegawai berhasil diubah.</div>');
		redirect('admin/tbl_pendidikan');
	}

	public function deletePendidikan($id_pendidikan)
	{
		$this->Tbl_pendidikan_model->deleteDataPendidikan($id_pendidikan);
		$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible " role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
		</button>
		Data pendidikan pegawai berhasil dihapus.</div>');
		redirect('admin/tbl_pendidikan');
	}
}
