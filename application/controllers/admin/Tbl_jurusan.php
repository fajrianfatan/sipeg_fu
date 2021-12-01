<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tbl_jurusan extends CI_Controller {

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
			'tbl_jurusan' => $this->Tbl_jurusan_model->tampil_data()->result(),
			'user_name' => $data->username,
			'level' => $data->level,
			'foto_user' => $data->foto_user,
			'judul' => 'Daftar Jurusan/Prodi',
            'judul2' => 'Control Panel',
            'judul3' => 'Daftar Jurusan/Prodi'
		);
		
        $this->load->view('admin/tbl_jurusan',$data);
	}

	public function input()
	{
		$dataInput = $this->User_model->ambil_data($this->session->userdata['username']);
		$dataInput = array(
			'user_name' => $dataInput->username,
			'level' => $dataInput->level,
			'foto_user' => $dataInput->foto_user,
			'id_jurusan' => set_value('id_jurusan'),
			'kode_jurusan' => set_value('kode_jurusan'),
			'jurusan' => set_value('jurusan'),
			'judul' => 'Tambah Daftar Jurusan/Prodi',
            'judul2' => 'Control Panel',
            'judul3' => 'Tambah Daftar Jurusan/Prodi'
		);
		$this->load->view('admin/tbl_jurusan_tambah',$dataInput);
	}

	public function input_aksi()
	{	
		$id_jurusan = $this->input->post('id_jurusan');
		$kode_jurusan = $this->input->post('kode_jurusan');
		$jurusan = $this->input->post('jurusan');
		
		$DataInsert = array(
			'id_jurusan' => $id_jurusan,
			'kode_jurusan' => $kode_jurusan,
			'jurusan' => $jurusan,
		);

		$this->Tbl_jurusan_model->input_data($DataInsert);
		$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible " role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
		</button>
		Data jurusan/prodi berhasil ditambahkan.</div>');
		redirect(base_url('admin/tbl_jurusan'));
	}

	public function edit($id)
	{
		$recordJurusan = $this->Tbl_jurusan_model->getDataJurusanDetail($id);
		//echo "<pre>";
		//print_r($recordUser);
		//echo "<pre>";
		$data = $this->User_model->ambil_data($this->session->userdata['username']);
		$data = array(
			'jurusan' => $recordJurusan,
			'user_name' => $data->username,
			'level' => $data->level,
			'foto_user' => $data->foto_user,
			'judul' => 'Ubah Daftar Jurusan/Prodi',
            'judul2' => 'Control Panel',
            'judul3' => 'Ubah Daftar Jurusan/Prodi'
		);
		
		$this->load->view('admin/tbl_jurusan_edit',$data);
	}

	public function AksiEdit()
	{
		$id_jurusan = $this->input->post('id_jurusan');
		$kode_jurusan = $this->input->post('kode_jurusan');
		$jurusan = $this->input->post('jurusan');

		$DataUpdate = array(
			'kode_jurusan'=> $kode_jurusan,
			'jurusan'=> $jurusan,
		);
		//echo "<pre>";
		//print_r($DataUpdate);
		//echo "<pre>";
		$this->Tbl_jurusan_model->editDataJurusan($DataUpdate, $id_jurusan);
		$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible " role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
		</button>
		Data jurusan/prodi berhasil diubah.</div>');
		redirect('admin/tbl_jurusan');
	}

	public function deleteJurusan($id_jurusan)
	{
		$this->Tbl_jurusan_model->deleteDataJurusan($id_jurusan);
		$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible " role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
		</button>
		Data jurusan/prodi berhasil dihapus.</div>');
		redirect('admin/tbl_jurusan');
	}
}
