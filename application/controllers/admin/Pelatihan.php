<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pelatihan extends CI_Controller {

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
			'pelatihan' => $this->Pelatihan_model->tampil_data()->result(),
			'username' => $data->username,
			'level' => $data->level,
			'foto_user' => $data->foto_user,
			'judul' => 'Data Pelatihan Pegawai',
            'judul2' => 'Riwayat Pendidikan dan Pelatihan Pegawai',
            'judul3' => 'Data Pelatihan Pegawai'
		);
		
        $this->load->view('admin/pelatihan',$data);
	}

	public function input()
	{
		$dataInput = $this->User_model->ambil_data($this->session->userdata['username']);
		$dataInput = array(
			'pegawai' => $this->Pegawai_model->tampil_data('pegawai')->result(),
			'username' => $dataInput->username,
			'level' => $dataInput->level,
			'foto_user' => $dataInput->foto_user,
			'id_pelatihan' => set_value('id_pelatihan'),
			'id_pegawai' => set_value('id_pegawai'),
			'nama_latihan' => set_value('nama_latihan'),
			'periode' => set_value('periode'),
			'jam' => set_value('jam'),
            'hari' => set_value('hari'),
            'bulan' => set_value('bulan'),
            'tahun' => set_value('tahun'),
            'tempat' => set_value('tempat'),
            'sumber_dana' => set_value('sumber_dana'),
            'penyelenggara' => set_value('penyelenggara'),
			'judul' => 'Tambah Data Pelatihan Pegawai',
            'judul2' => 'Riwayat Pendidikan dan Pelatihan Pegawai',
            'judul3' => 'Tambah Data Pelatihan Pegawai'
		);
		$this->load->view('admin/pelatihan_tambah',$dataInput);
	}

	public function input_aksi()
	{	
		$id_pelatihan = $this->input->post('id_pelatihan');
		$id_pegawai = $this->input->post('id_pegawai');
		$nama_latihan = $this->input->post('nama_latihan');
		$periode = $this->input->post('periode');
		$jam = $this->input->post('jam');
        $hari = $this->input->post('hari');
        $bulan = $this->input->post('bulan');
        $tahun = $this->input->post('tahun');
        $tempat = $this->input->post('tempat');
        $sumber_dana = $this->input->post('sumber_dana');
        $penyelenggara = $this->input->post('penyelenggara');
		
		$DataInsert = array(
			'id_pelatihan' => $id_pelatihan,
			'id_pegawai' => $id_pegawai,
			'nama_latihan' => $nama_latihan,
			'periode' => $periode,
			'jam' => $jam,
            'hari' => $hari,
            'bulan' => $bulan,
            'tahun' => $tahun,
            'tempat' => $tempat,
            'sumber_dana' => $sumber_dana,
            'penyelenggara' => $penyelenggara
		);
		// echo "<pre>";
		// print_r($DataInsert);
		// echo "<pre>";
		$this->Pelatihan_model->input_data($DataInsert);
		$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible " role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
		</button>
		Data pelatihan pegawai berhasil ditambahkan.</div>');
		redirect(base_url('admin/pelatihan'));
	}

	public function edit($id)
	{
		$recordPelatihan = $this->Pelatihan_model->getDataPelatihanDetail($id);
		//echo "<pre>";
		//print_r($recordUser);
		//echo "<pre>";
		$data = $this->User_model->ambil_data($this->session->userdata['username']);
		$data = array(
			'pegawai' => $this->Pegawai_model->tampil_data('pegawai')->result(),
			'pelatihan' => $recordPelatihan,
			'username' => $data->username,
			'level' => $data->level,
			'foto_user' => $data->foto_user,
			'judul' => 'Ubah Data Pelatihan Pegawai',
            'judul2' => 'Riwayat Pendidikan dan Pelatihan Pegawai',
            'judul3' => 'Ubah Data Pelatihan Pegawai'
		);
		
		$this->load->view('admin/pelatihan_edit',$data);
	}

	public function AksiEdit()
	{
		$id_pelatihan = $this->input->post('id_pelatihan');
		$id_pegawai = $this->input->post('id_pegawai');
		$nama_latihan = $this->input->post('nama_latihan');
		$periode = $this->input->post('periode');
		$jam = $this->input->post('jam');
		$hari = $this->input->post('hari');
		$bulan = $this->input->post('bulan');
		$tahun = $this->input->post('tahun');
		$tempat = $this->input->post('tempat');
		$sumber_dana = $this->input->post('sumber_dana');
		$penyelenggara = $this->input->post('penyelenggara');

		$DataUpdate = array(
			'id_pegawai'=> $id_pegawai,
			'nama_latihan'=> $nama_latihan,
			'periode'=> $periode,
			'jam'=> $jam,
			'hari'=> $hari,
			'bulan'=> $bulan,
			'tahun'=> $tahun,
			'tempat'=> $tempat,
			'sumber_dana'=> $sumber_dana,
			'penyelenggara'=> $penyelenggara,
		);
		//echo "<pre>";
		//print_r($DataUpdate);
		//echo "<pre>";
		$this->Pelatihan_model->editDataPelatihan($DataUpdate, $id_pelatihan);
		$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible " role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
		</button>
		Data pelatihan pegawai berhasil diubah.</div>');
		redirect('admin/pelatihan');
	}

	public function deletePelatihan($id_pelatihan)
	{
		$this->Pelatihan_model->deleteDataPelatihan($id_pelatihan);
		$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible " role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
		</button>
		Data pelatihan pegawai berhasil dihapus.</div>');
		redirect('admin/pelatihan');
	}
}
