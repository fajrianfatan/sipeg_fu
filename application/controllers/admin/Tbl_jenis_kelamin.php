<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tbl_jenis_kelamin extends CI_Controller {

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
			'tbl_jenis_kelamin' => $this->Tbl_jenis_kelamin_model->tampil_data()->result(),
			'username' => $data->username,
			'level' => $data->level,
			'foto_user' => $data->foto_user,
			'judul' => 'Data Jenis Kelamin',
            'judul2' => 'Control Panel',
            'judul3' => 'Data Jenis Kelamin'
		);
		
        $this->load->view('admin/tbl_jenis_kelamin',$data);  
	}

	public function input()
	{
		$dataInput = $this->User_model->ambil_data($this->session->userdata['username']);
		$dataInput = array(
			'username' => $dataInput->username,
			'level' => $dataInput->level,
			'foto_user' => $dataInput->foto_user,
			'id_jenis_kelamin' => set_value('id_jenis_kelamin'),
			'jenis_kelamin' => set_value('jenis_kelamin'),
			'judul' => 'Tambah Data Jenis Kelamin',
            'judul2' => 'Control Panel',
            'judul3' => 'Tambah Data Jenis Kelamin'
		);
		$this->load->view('admin/tbl_jenis_kelamin_tambah',$dataInput);
	}

	public function input_aksi()
	{	
		$id_jenis_kelamin = $this->input->post('id_jenis_kelamin');
		$jenis_kelamin = $this->input->post('jenis_kelamin');
		
		$DataInsert = array(
			'id_jenis_kelamin' => $id_jenis_kelamin,
			'jenis_kelamin' => $jenis_kelamin,
		);

		$this->Tbl_jenis_kelamin_model->input_data($DataInsert);
		$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible " role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
		</button>
		Data Jenis Kelamin berhasil ditambahkan.</div>');
		redirect(base_url('admin/tbl_jenis_kelamin'));
	}

	public function edit($id)
	{
		$recordJeniskelamin = $this->Tbl_jenis_kelamin_model->getDataJenisKelaminDetail($id);
		//echo "<pre>";
		//print_r($recordUser);
		//echo "<pre>";
		$data = $this->User_model->ambil_data($this->session->userdata['username']);
		$data = array(
			'tbl_jenis_kelamin' => $recordJeniskelamin,
			'username' => $data->username,
			'level' => $data->level,
			'foto_user' => $data->foto_user,
			'judul' => 'Ubah Data Jenis Kelamin',
            'judul2' => 'Control Panel',
            'judul3' => 'Ubah Data Jenis Kelamin'
		);
		
		$this->load->view('admin/tbl_jenis_kelamin_edit',$data);
	}

	public function AksiEdit()
	{
		$id_jenis_kelamin = $this->input->post('id_jenis_kelamin');
		$jenis_kelamin = $this->input->post('jenis_kelamin');

		$DataUpdate = array(
			'jenis_kelamin'=> $jenis_kelamin,
		);
		//echo "<pre>";
		//print_r($DataUpdate);
		//echo "<pre>";
		$this->Tbl_jenis_kelamin_model->editDataJenisKelamin($DataUpdate, $id_jenis_kelamin);
		$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible " role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
		</button>
		Data Jenis Kelamin berhasil diubah.</div>');
		redirect('admin/tbl_jenis_kelamin');
	}

	public function deleteJeniskelamin($id_jenis_kelamin)
	{
		$this->Tbl_jenis_kelamin_model->deleteDataJenisKelamin($id_jenis_kelamin);
		$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible " role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
		</button>
		Data Jenis Kelamin berhasil dihapus.</div>');
		redirect('admin/tbl_jenis_kelamin');
	}
}
