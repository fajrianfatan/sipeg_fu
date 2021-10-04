<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tbl_gol_ruang extends CI_Controller {

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
			'tbl_gol_ruang' => $this->Tbl_golruang_model->tampil_data()->result(),
			'username' => $data->username,
			'level' => $data->level,
			'foto_user' => $data->foto_user,
			'judul' => 'Daftar Golongan/Ruang Pegawai',
            'judul2' => 'Control Panel',
            'judul3' => 'Daftar Golongan/Ruang Pegawai'
		);
		
        $this->load->view('admin/tbl_gol_ruang',$data);  
	}

	public function input()
	{
		$dataInput = $this->User_model->ambil_data($this->session->userdata['username']);
		$dataInput = array(
			'username' => $dataInput->username,
			'level' => $dataInput->level,
			'foto_user' => $dataInput->foto_user,
			'id_gol_ruang' => set_value('id_gol_ruang'),
			'gol_ruang' => set_value('gol_ruang'),
			'judul' => 'Tambah Daftar Golongan/Ruang Pegawai',
            'judul2' => 'Control Panel',
            'judul3' => 'Tambah Daftar Golongan/Ruang Pegawai'
		);
		$this->load->view('admin/tbl_gol_ruang_tambah',$dataInput);
	}

	public function input_aksi()
	{	
		$id_gol_ruang = $this->input->post('id_gol_ruang');
		$gol_ruang = $this->input->post('gol_ruang');
		
		$DataInsert = array(
			'id_gol_ruang' => $id_gol_ruang,
			'gol_ruang' => $gol_ruang,
		);

		$this->Tbl_golruang_model->input_data($DataInsert);
		$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible " role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
		</button>
		Data golongan/ruang pegawai berhasil ditambahkan.</div>');
		redirect(base_url('admin/tbl_gol_ruang'));
	}

	public function edit($id)
	{
		$recordGol_ruang = $this->Tbl_golruang_model->getDataGolRuangDetail($id);
		//echo "<pre>";
		//print_r($recordUser);
		//echo "<pre>";
		$data = $this->User_model->ambil_data($this->session->userdata['username']);
		$data = array(
			'tbl_gol_ruang' => $recordGol_ruang,
			'username' => $data->username,
			'level' => $data->level,
			'foto_user' => $data->foto_user,
			'judul' => 'Ubah Daftar Golongan/Ruang Pegawai',
            'judul2' => 'Control Panel',
            'judul3' => 'Ubah Daftar Golongan/Ruang Pegawai'
		);
		
		$this->load->view('admin/tbl_gol_ruang_edit',$data);
	}

	public function AksiEdit()
	{
		$id_gol_ruang = $this->input->post('id_gol_ruang');
		$gol_ruang = $this->input->post('gol_ruang');

		$DataUpdate = array(
			'gol_ruang'=> $gol_ruang,
		);
		//echo "<pre>";
		//print_r($DataUpdate);
		//echo "<pre>";
		$this->Tbl_golruang_model->editDataGolRuang($DataUpdate, $id_gol_ruang);
		$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible " role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
		</button>
		Data golongan/ruang pegawai berhasil diubah.</div>');
		redirect('admin/tbl_gol_ruang');
	}

	public function deleteGol_ruang($id_gol_ruang)
	{
		$this->Tbl_golruang_model->deleteDataGolRuang($id_gol_ruang);
		$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible " role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
		</button>
		Data golongan/ruang pegawai berhasil dihapus.</div>');
		redirect('admin/tbl_gol_ruang');
	}
}
