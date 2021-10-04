<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tbl_status_menikah extends CI_Controller {

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
			'tbl_status_menikah' => $this->Tbl_status_menikah_model->tampil_data()->result(),
			'username' => $data->username,
			'level' => $data->level,
			'foto_user' => $data->foto_user,
			'judul' => 'Daftar Status Pernikahan Pegawai',
            'judul2' => 'Control Panel',
            'judul3' => 'Daftar Status Pernikahan Pegawai'
		);
		
        $this->load->view('admin/tbl_status_menikah',$data);  
	}

	public function input()
	{
		$dataInput = $this->User_model->ambil_data($this->session->userdata['username']);
		$dataInput = array(
			'username' => $dataInput->username,
			'level' => $dataInput->level,
			'foto_user' => $dataInput->foto_user,
			'id_status_menikah' => set_value('id_status_menikah'),
			'status_menikah' => set_value('status_menikah'),
			'judul' => 'Tambah Data Status Pernikahan Pegawai',
            'judul2' => 'Control Panel',
            'judul3' => 'Tambah Data Status Pernikahan Pegawai'
		);
		$this->load->view('admin/tbl_status_menikah_tambah',$dataInput);
	}

	public function input_aksi()
	{	
		$id_status_menikah = $this->input->post('id_status_menikah');
		$status_menikah = $this->input->post('status_menikah');
		
		$DataInsert = array(
			'id_status_menikah' => $id_status_menikah,
			'status_menikah' => $status_menikah,
		);

		$this->Tbl_status_menikah_model->input_data($DataInsert);
		$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible " role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
		</button>
		Data status pernikahan pegawai berhasil ditambahkan.</div>');
		redirect(base_url('admin/tbl_status_menikah'));
	}

	public function edit($id)
	{
		$recordStatusMenikah = $this->Tbl_status_menikah_model->getDataStatusMenikahDetail($id);
		//echo "<pre>";
		//print_r($recordUser);
		//echo "<pre>";
		$data = $this->User_model->ambil_data($this->session->userdata['username']);
		$data = array(
			'tbl_status_menikah' => $recordStatusMenikah,
			'username' => $data->username,
			'level' => $data->level,
			'foto_user' => $data->foto_user,
			'judul' => 'Ubah Data Status Pernikahan Pegawai',
            'judul2' => 'Control Panel',
            'judul3' => 'Ubah Data Status Pernikahan Pegawai'
		);
		
		$this->load->view('admin/tbl_status_menikah_edit',$data);
	}

	public function AksiEdit()
	{
		$id_status_menikah = $this->input->post('id_status_menikah');
		$status_menikah = $this->input->post('status_menikah');

		$DataUpdate = array(
			'status_menikah'=> $status_menikah,
		);
		//echo "<pre>";
		//print_r($DataUpdate);
		//echo "<pre>";
		$this->Tbl_status_menikah_model->editDataStatusMenikah($DataUpdate, $id_status_menikah);
		$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible " role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
		</button>
		Data status pernikahan pegawai berhasil diubah.</div>');
		redirect('admin/tbl_status_menikah');
	}

	public function deleteStatusMenikah($id_status_menikah)
	{
		$this->Tbl_status_menikah_model->deleteDataStatusMenikah($id_status_menikah);
		$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible " role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
		</button>
		Data status pernikahan pegawai berhasil dihapus.</div>');
		redirect('admin/tbl_status_menikah');
	}
}
