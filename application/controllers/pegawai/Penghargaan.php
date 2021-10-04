<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penghargaan extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		if($this->session->userdata('level') != 'pegawai'){
			redirect('auth/kicked');
			exit;
		}
	}

	public function index()
	{
		$data = $this->Pegawai_model->ambil_data($this->session->userdata['username']);
		$data = array(
			'penghargaan' => $this->Penghargaan_model->tampil_data_aspeg()->result(),
			'username' => $data->username,
			'foto_pegawai' => $data->foto_pegawai,
			'level' => 'pegawai',
			'judul' => 'Data Penghargaan atau Tanda Jasa',
            'judul2' => 'Riwayat Pekerjaan dan Penghargaan',
            'judul3' => 'Data Penghargaan atau Tanda Jasa'
		);
        $this->load->view('pegawai/penghargaan',$data);
	}

	public function input()
	{
		$dataInput = $this->Pegawai_model->ambil_data($this->session->userdata['username']);
		$dataInput = array(
			'pegawai' => $this->Pegawai_model->tampil_data_aspeg()->result(),
			'username' => $dataInput->username,
			'foto_pegawai' => $dataInput->foto_pegawai,
			'level' => 'pegawai',
			'judul' => 'Tambah Data Penghargaan atau Tanda Jasa',
            'judul2' => 'Riwayat Pekerjaan dan Penghargaan',
            'judul3' => 'Tambah Data Penghargaan atau Tanda Jasa',
			'id_penghargaan' => set_value('id_penghargaan'),
			'id_pegawai' => set_value('id_pegawai'),
			'nama_penghargaan' => set_value('nama_penghargaan'),
			'tahun_penghargaan' => set_value('tahun_penghargaan'),
			'pemberi_penghargaan' => set_value('pemberi_penghargaan')
		);
		$this->load->view('pegawai/penghargaan_tambah',$dataInput);
	}

	public function input_aksi()
	{	
		$id_penghargaan = $this->input->post('id_penghargaan');
		$id_pegawai = $this->input->post('id_pegawai');
		$nama_penghargaan = $this->input->post('nama_penghargaan');
		$tahun_penghargaan = $this->input->post('tahun_penghargaan');
		$pemberi_penghargaan = $this->input->post('pemberi_penghargaan');
		
		$DataInsert = array(
			'id_penghargaan' => $id_penghargaan,
			'id_pegawai' => $id_pegawai,
			'nama_penghargaan' => $nama_penghargaan,
			'tahun_penghargaan' => $tahun_penghargaan,
			'pemberi_penghargaan' => $pemberi_penghargaan,
		);
		$this->Penghargaan_model->input_data($DataInsert);
		$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible " role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
		</button>
		Data penghargaan atau tanda jasa pegawai berhasil ditambahkan.</div>');
		redirect('pegawai/penghargaan');
	}

	public function edit($id)
	{
		$recordPenghargaan = $this->Penghargaan_model->getDataPenghargaanDetail($id);
		//echo "<pre>";
		//print_r($recordUser);
		//echo "<pre>";
		$data = $this->Pegawai_model->ambil_data($this->session->userdata['username']);
		$data = array(
			'pegawai' => $this->Pegawai_model->tampil_data_aspeg()->result(),
			'penghargaan' => $recordPenghargaan,
			'username' => $data->username,
			'foto_pegawai' => $data->foto_pegawai,
			'level' => 'pegawai',
			'judul' => 'Ubah Data Penghargaan atau Tanda Jasa',
            'judul2' => 'Riwayat Pekerjaan dan Penghargaan',
            'judul3' => 'Ubah Data Penghargaan atau Tanda Jasa',
		);
		$this->load->view('pegawai/penghargaan_edit',$data);
	}

	public function AksiEdit()
	{
		$id_penghargaan = $this->input->post('id_penghargaan');
		$id_pegawai = $this->input->post('id_pegawai');
		$nama_penghargaan = $this->input->post('nama_penghargaan');
		$tahun_penghargaan = $this->input->post('tahun_penghargaan');
		$pemberi_penghargaan = $this->input->post('pemberi_penghargaan');

		$DataUpdate = array(
			'id_pegawai'=> $id_pegawai,
			'nama_penghargaan'=> $nama_penghargaan,
			'tahun_penghargaan'=> $tahun_penghargaan,
			'pemberi_penghargaan'=> $pemberi_penghargaan,
		);
		//echo "<pre>";
		//print_r($DataUpdate);
		//echo "<pre>";
		$this->Penghargaan_model->editDataPenghargaan($DataUpdate, $id_penghargaan);
		$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible " role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
		</button>
		Data penghargaan atau tanda jasa pegawai berhasil diubah.</div>');
		redirect('pegawai/penghargaan');
	}

	public function deletePenghargaan($id_penghargaan)
	{
		$this->Penghargaan_model->deleteDataPenghargaan($id_penghargaan);
		$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible " role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
		</button>
		Data penghargaan atau tanda jasa pegawai berhasil dihapus.</div>');
		redirect('pegawai/penghargaan');
	}
}
