<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penghargaan extends CI_Controller {

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
			'penghargaan' => $this->Penghargaan_model->tampil_data()->result(),
			'username' => $data->username,
			'level' => $data->level,
			'foto_user' => $data->foto_user,
			'judul' => 'Data Penghargaan atau Tanda Jasa',
            'judul2' => 'Riwayat Pekerjaan dan Penghargaan atau Tanda Jasa',
            'judul3' => 'Data Penghargaan atau Tanda Jasa'
		);
		
        $this->load->view('admin/penghargaan',$data);
	}

	public function input()
	{
		$dataInput = $this->User_model->ambil_data($this->session->userdata['username']);
		$dataInput = array(
			'pegawai' => $this->Pegawai_model->tampil_data('pegawai')->result(),
			'username' => $dataInput->username,
			'level' => $dataInput->level,
			'foto_user' => $dataInput->foto_user,
			'id_penghargaan' => set_value('id_penghargaan'),
			'id_pegawai' => set_value('id_pegawai'),
			// 'nama_pegawai' => set_value('nama_pegawai'),
			'nama_penghargaan' => set_value('nama_penghargaan'),
			'tahun_penghargaan' => set_value('tahun_penghargaan'),
			'pemberi_penghargaan' => set_value('pemberi_penghargaan'),
			'judul' => 'Tambah Data Penghargaan atau Tanda Jasa',
            'judul2' => 'Riwayat Pekerjaan dan Penghargaan atau Tanda Jasa',
            'judul3' => 'Tambah Data Penghargaan atau Tanda Jasa'
		);
		$this->load->view('admin/penghargaan_tambah',$dataInput);
	}

	public function input_aksi()
	{	
		$id_penghargaan = $this->input->post('id_penghargaan');
		$id_pegawai = $this->input->post('id_pegawai');
		// $nama_pegawai = $this->input->post('nama_pegawai');
		$nama_penghargaan = $this->input->post('nama_penghargaan');
		$tahun_penghargaan = $this->input->post('tahun_penghargaan');
		$pemberi_penghargaan = $this->input->post('pemberi_penghargaan');
		
		$DataInsert = array(
			'id_penghargaan' => $id_penghargaan,
			'id_pegawai' => $id_pegawai,
			// 'nama_pegawai' => $nama_pegawai,
			'nama_penghargaan' => $nama_penghargaan,
			'tahun_penghargaan' => $tahun_penghargaan,
			'pemberi_penghargaan' => $pemberi_penghargaan,
		);
		// echo "<pre>";
		// print_r($DataInsert);
		// echo "<pre>";
		$this->Penghargaan_model->input_data($DataInsert);
		$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible " role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
		</button>
		Data penghargaan atau tanda jasa pegawai berhasil ditambahkan.</div>');
		redirect(base_url('admin/penghargaan'));
	}

	public function edit($id)
	{
		$recordPenghargaan = $this->Penghargaan_model->getDataPenghargaanDetail($id);
		//echo "<pre>";
		//print_r($recordUser);
		//echo "<pre>";
		$data = $this->User_model->ambil_data($this->session->userdata['username']);
		$data = array(
			'pegawai' => $this->Pegawai_model->tampil_data('pegawai')->result(),
			'penghargaan' => $recordPenghargaan,
			'username' => $data->username,
			'level' => $data->level,
			'foto_user' => $data->foto_user,
			'judul' => 'Ubah Data Penghargaan atau Tanda Jasa',
            'judul2' => 'Riwayat Pekerjaan dan Penghargaan atau Tanda Jasa',
            'judul3' => 'Ubah Data Penghargaan atau Tanda Jasa'
		);
		
		$this->load->view('admin/penghargaan_edit',$data);
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
		redirect('admin/penghargaan');
	}

	public function deletePenghargaan($id_penghargaan)
	{
		$this->Penghargaan_model->deleteDataPenghargaan($id_penghargaan);
		$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible " role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
		</button>
		Data penghargaan atau tanda jasa pegawai berhasil dihapus.</div>');
		redirect('admin/penghargaan');
	}
}
