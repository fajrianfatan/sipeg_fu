<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kepangkatan extends CI_Controller {

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
		$data["kepangkatan"] = directory_map('.assets/directory/sk kepangkatan/');
		$data = $this->Pegawai_model->ambil_data($this->session->userdata['username']);
		$data = array(
			'kepangkatan' => $this->Kepangkatan_model->tampil_data_aspeg()->result(),
			'username' => $data->username,
			'foto_pegawai' => $data->foto_pegawai,
			'level' => 'pegawai',
			'judul' => 'Lampiran SK Kepangkatan',
            'judul2' => 'Riwayat Pekerjaan dan Penghargaan',
            'judul3' => 'Lampiran SK Kepangkatan'
		);
		$this->load->helper('download');
        $this->load->view('pegawai/kepangkatan',$data); 
	}

	public function input()
	{
		$dataInput = $this->Pegawai_model->ambil_data($this->session->userdata['username']);
		$dataInput = array(
			'tbl_gol_ruang' => $this->Tbl_golruang_model->tampil_data('tbl_gol_ruang')->result(),
			'tbl_jabatan' => $this->Tbl_jabatan_model->tampil_data('tbl_jabatan')->result(),
			'tbl_pendidikan' => $this->Tbl_pendidikan_model->tampil_data('tbl_pendidikan')->result(),
			'tbl_pangkat' => $this->Tbl_pangkat_model->tampil_data('tbl_pangkat')->result(),
			'tbl_jenis_pegawai' => $this->Tbl_jenis_pegawai_model->tampil_data('tbl_jenis_pegawai')->result(),
			'pegawai' => $this->Pegawai_model->tampil_data_aspeg()->result(),
			'username' => $dataInput->username,
			'foto_pegawai' => $dataInput->foto_pegawai,
			'level' => 'pegawai',
			'judul' => 'Tambah Lampiran SK Kepangkatan',
            'judul2' => 'Riwayat Pekerjaan dan Penghargaan',
            'judul3' => 'Tambah Lampiran SK Kepangkatan',
			'id_kepangkatan' => set_value('id_kepangkatan'),
			'id_pegawai' => set_value('id_pegawai'),
			'no_sk_pangkat' => set_value('no_sk_pangkat'),
			'jenis_pegawai' => set_value('jenis_pegawai'),
			'pangkat' => set_value('pangkat'),
			'gol_ruang' => set_value('gol_ruang'),
			'tgl_sk_pangkat' => set_value('tgl_sk_pangkat'),
			'tmt_sk_pangkat' => set_value('tmt_sk_pangkat'),
			'gaji_pokok_pangkat' => set_value('gaji_pokok_pangkat'),
			'pak' => set_value('pak'),
			'lampiran_sk_pangkat' => set_value('lampiran_sk_pangkat')
		);
		$this->load->view('pegawai/kepangkatan_tambah',$dataInput);
	}

	public function input_aksi()
	{	
		$id_kepangkatan = $this->input->post('id_kepangkatan');
		$id_pegawai = $this->input->post('id_pegawai');
		$no_sk_pangkat = $this->input->post('no_sk_pangkat');
		$jenis_pegawai = $this->input->post('jenis_pegawai');
		$pangkat = $this->input->post('pangkat');
		$gol_ruang = $this->input->post('gol_ruang');
		$tgl_sk_pangkat = $this->input->post('tgl_sk_pangkat');
		$tmt_sk_pangkat = $this->input->post('tmt_sk_pangkat');
		$gaji_pokok_pangkat = $this->input->post('gaji_pokok_pangkat');
		$pak = $this->input->post('pak');
		$lampiran_sk_pangkat = $_FILES['lampiran_sk_pangkat'];

		if ($lampiran_sk_pangkat=''){}
		else{
			$config['upload_path']          = './assets/directory/sk kepangkatan';
			$config['allowed_types']        = 'pdf';
			//$config['max_size']             = 0;
			//$config['max_width']            = 1024;
			//$config['max_height']           = 768;
			//$config['file_name']           = 'foto-'.$nama_pegawai.date('ymd');

			$this->upload->initialize($config);

			if ( ! $this->upload->do_upload('lampiran_sk_pangkat'))
			{
				$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible " role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
				</button>
				Gagal mengunggah lampiran SK kepangkatan pegawai karena kesalahan input data atau lampiran file yang tidak sesuai. Silakan coba lagi.</div>');
				redirect('pegawai/kepangkatan');
			}
			else
			{
					$lampiran_sk_pangkat = $this->upload->data('file_name');		
			}
		}
		
		$DataInsert = array(
			'id_kepangkatan' => $id_kepangkatan,
			'id_pegawai' => $id_pegawai,
			'no_sk_pangkat' => $no_sk_pangkat,
			'jenis_pegawai' => $jenis_pegawai,
			'pangkat' => $pangkat,
			'gol_ruang' => $gol_ruang,
			'tgl_sk_pangkat' => $tgl_sk_pangkat,
			'tmt_sk_pangkat' => $tmt_sk_pangkat,
			'gaji_pokok_pangkat' => $gaji_pokok_pangkat,
			'pak' => $pak,
			'lampiran_sk_pangkat' => $lampiran_sk_pangkat
		);

		//echo "<pre>";
		//print_r($DataInsert);
		//echo "<pre>";
		$this->Kepangkatan_model->input_data($DataInsert, 'kepangkatan');
		redirect(base_url('pegawai/kepangkatan'));
	}

	public function edit($id)
	{
		$recordKepangkatan = $this->Kepangkatan_model->getDataKepangkatanDetail($id);
		//echo "<pre>";
		//print_r($recordUser);
		//echo "<pre>";
		$data = $this->Pegawai_model->ambil_data($this->session->userdata['username']);
		$data = array(
			'tbl_gol_ruang' => $this->Tbl_golruang_model->tampil_data('tbl_gol_ruang')->result(),
			'tbl_jabatan' => $this->Tbl_jabatan_model->tampil_data('tbl_jabatan')->result(),
			'tbl_pendidikan' => $this->Tbl_pendidikan_model->tampil_data('tbl_pendidikan')->result(),
			'tbl_pangkat' => $this->Tbl_pangkat_model->tampil_data('tbl_pangkat')->result(),
			'tbl_jenis_pegawai' => $this->Tbl_jenis_pegawai_model->tampil_data('tbl_jenis_pegawai')->result(),
			'pegawai' => $this->Pegawai_model->tampil_data('pegawai')->result(),
			'kepangkatan' => $recordKepangkatan,
			'username' => $data->username,
			'foto_pegawai' => $data->foto_pegawai,
			'level' => 'pegawai',
			'judul' => 'Ubah Lampiran SK Kepangkatan',
            'judul2' => 'Riwayat Pekerjaan dan Penghargaan',
            'judul3' => 'Ubah Lampiran SK Kepangkatan',
		);
		
		$this->load->view('pegawai/kepangkatan_edit',$data);
	}

	public function AksiEdit()
	{
		$id_kepangkatan = $this->input->post('id_kepangkatan');
		$id_pegawai = $this->input->post('id_pegawai');
		$no_sk_pangkat = $this->input->post('no_sk_pangkat');
		$jenis_pegawai = $this->input->post('jenis_pegawai');
		$pangkat = $this->input->post('pangkat');
		$gol_ruang = $this->input->post('gol_ruang');
		$tgl_sk_pangkat = $this->input->post('tgl_sk_pangkat');
		$tmt_sk_pangkat = $this->input->post('tmt_sk_pangkat');
		$gaji_pokok_pangkat = $this->input->post('gaji_pokok_pangkat');
		$pak = $this->input->post('pak');

		$lampiran_sk_pangkat = $_FILES['userfile']['name'];

		if($lampiran_sk_pangkat){
			$config['upload_path']          = './assets/directory/sk kepangkatan';
			$config['allowed_types']        = 'pdf';
			//$config['max_size']             = 0;
			//$config['max_width']            = 1024;
			//$config['max_height']           = 768;
			//$config['file_name']           = 'foto-'.$nama_pegawai.date('ymd');

			$this->upload->initialize($config);

			if ($this->upload->do_upload('userfile'))
			{
				$userfile = $this->upload->data('file_name');
				$id = array('id_kepangkatan' => $id_kepangkatan);
				$DataUpdate = array(
					'id_pegawai'=> $id_pegawai,
					'no_sk_pangkat'=> $no_sk_pangkat,
					'jenis_pegawai'=> $jenis_pegawai,
					'pangkat'=> $pangkat,
					'gol_ruang'=> $gol_ruang,
					'tgl_sk_pangkat'=> $tgl_sk_pangkat,
					'tmt_sk_pangkat'=> $tmt_sk_pangkat,
					'gaji_pokok_pangkat'=> $gaji_pokok_pangkat,
					'pak'=> $pak,
					'lampiran_sk_pangkat'=> $userfile
				);
				$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible " role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
				</button>
				Data lampiran SK kepangkatan pegawai berhasil diubah.</div>');
				$this->Kepangkatan_model->update_data('kepangkatan',$DataUpdate,$id);
				redirect('pegawai/kepangkatan');
			}
			else
			{
				$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible " role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
            </button>
            Maaf. Data lampiran SK kepangkatan pegawai gagal diubah karena kesalahan pada unggah file. Mohon gunakan file lampiran SK yang sesuai.</div>');
			redirect('pegawai/kepangkatan');
			}
		}
		elseif($lampiran_sk_pangkat='userfile')
		{
			$id = array('id_kepangkatan' => $id_kepangkatan);
			$DataUpdate = array(
				'id_pegawai'=> $id_pegawai,
				'no_sk_pangkat'=> $no_sk_pangkat,
				'jenis_pegawai'=> $jenis_pegawai,
				'pangkat'=> $pangkat,
				'gol_ruang'=> $gol_ruang,
				'tgl_sk_pangkat'=> $tgl_sk_pangkat,
				'tmt_sk_pangkat'=> $tmt_sk_pangkat,
				'gaji_pokok_pangkat'=> $gaji_pokok_pangkat,
				'pak'=> $pak
			);
			$this->Kepangkatan_model->update_data('kepangkatan',$DataUpdate,$id);
			$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible " role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
			</button>
			Data lampiran SK kepangkatan pegawai berhasil diubah.</div>');
			redirect('pegawai/kepangkatan');
		}else{
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible " role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
			</button>
			Data lampiran SK kepangkatan pegawai gagal diubah karena kesalahan pengisian form. Silakan cek kembali.</div>');
			redirect('pegawai/kepangkatan');
		}
	}

	public function deleteKepangkatan($id_kepangkatan)
	{
		$this->Kepangkatan_model->deleteDataKepangkatan($id_kepangkatan);
		$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible " role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
		</button>
		Data lampiran SK kepangkatan pegawai berhasil dihapus.</div>');
		redirect('pegawai/kepangkatan');
	}
}
