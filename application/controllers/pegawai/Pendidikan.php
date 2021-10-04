<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pendidikan extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('level') != 'pegawai') {
			redirect('auth/kicked');
			exit;
		}
	}

	public function index()
	{
		$data["pendidikan"] = directory_map('.assets/directory/pendidikan/');
		$data = $this->Pegawai_model->ambil_data($this->session->userdata['username']);
		$data = array(
			'pendidikan' => $this->Pendidikan_model->tampil_data_aspeg()->result(),
			'username' => $data->username,
			'foto_pegawai' => $data->foto_pegawai,
			'level' => 'pegawai',
			'judul' => 'Data Pendidikan Pegawai',
			'judul2' => 'Riwayat Pendidikan dan Pelatihan',
			'judul3' => 'Data Pendidikan Pegawai'
		);
		$this->load->helper('download');
		$this->load->view('pegawai/pendidikan', $data);
	}

	public function input()
	{
		$dataInput = $this->Pegawai_model->ambil_data($this->session->userdata['username']);
		$dataInput = array(
			'tbl_gol_ruang' => $this->Tbl_golruang_model->tampil_data('tbl_gol_ruang')->result(),
			'tbl_jabatan' => $this->Tbl_jabatan_model->tampil_data('tbl_jabatan')->result(),
			'pegawai' => $this->Pegawai_model->tampil_data_aspeg()->result(),
			'username' => $dataInput->username,
			'foto_pegawai' => $dataInput->foto_pegawai,
			'level' => 'pegawai',
			'judul' => 'Tambah Lampiran SK Jabatan',
			'judul2' => 'Riwayat Pekerjaan dan Penghargaan',
			'judul3' => 'Tambah Lampiran SK Jabatan',
			'id_jabatan' => set_value('id_jabatan'),
			'id_pegawai' => set_value('id_pegawai'),
			'jabatan' => set_value('jabatan'),
			'tmt_sk_jabatan' => set_value('tmt_sk_jabatan'),
			'gol_ruang' => set_value('gol_ruang'),
			'gaji_pokok_jabatan' => set_value('gaji_pokok_jabatan'),
			'lampiran_sk_jabatan' => set_value('lampiran_sk_jabatan')
		);
		$this->load->view('pegawai/jabatan_tambah', $dataInput);
	}

	public function input_aksi()
	{
		$id_jabatan = $this->input->post('id_jabatan');
		$id_pegawai = $this->input->post('id_pegawai');
		$jabatan = $this->input->post('jabatan');
		$tmt_sk_jabatan = $this->input->post('tmt_sk_jabatan');
		$gol_ruang = $this->input->post('gol_ruang');
		$gaji_pokok_jabatan = $this->input->post('gaji_pokok_jabatan');
		$lampiran_sk_jabatan = $_FILES['lampiran_sk_jabatan'];

		if ($lampiran_sk_jabatan = '') {
		} else {
			$config['upload_path']          = './assets/directory/sk jabatan';
			$config['allowed_types']        = 'pdf';
			//$config['max_size']             = 0;
			//$config['max_width']            = 1024;
			//$config['max_height']           = 768;
			//$config['file_name']           = 'foto-'.$nama_pegawai.date('ymd');

			$this->upload->initialize($config);

			if (!$this->upload->do_upload('lampiran_sk_jabatan')) {
				$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible " role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
				</button>
				Gagal mengunggah lampiran SK jabatan pegawai karena kesalahan input data atau lampiran file yang tidak sesuai. Silakan coba lagi.</div>');
				redirect('pegawai/jabatan');
			} else {
				$lampiran_sk_jabatan = $this->upload->data('file_name');
			}
		}
		$DataInsert = array(
			'id_jabatan' => $id_jabatan,
			'id_pegawai' => $id_pegawai,
			'jabatan' => $jabatan,
			'tmt_sk_jabatan' => $tmt_sk_jabatan,
			'gol_ruang' => $gol_ruang,
			'gaji_pokok_jabatan' => $gaji_pokok_jabatan,
			'lampiran_sk_jabatan' => $lampiran_sk_jabatan
		);

		$this->Jabatan_model->input_data($DataInsert);
		$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible " role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
		</button>
		Data lampiran SK jabatan pegawai berhasil diunggah dan ditambahkan.</div>');
		redirect(base_url('pegawai/jabatan'));
	}

	public function edit($id)
	{
		$recordJabatan = $this->Jabatan_model->getJabatanDetail($id);
		//echo "<pre>";
		//print_r($recordUser);
		//echo "<pre>";
		$data = $this->Pegawai_model->ambil_data($this->session->userdata['username']);
		$data = array(
			'pegawai' => $this->Pegawai_model->tampil_data('pegawai')->result(),
			'tbl_jabatan' => $this->Tbl_jabatan_model->tampil_data('tbl_jabatan')->result(),
			'tbl_gol_ruang' => $this->Tbl_golruang_model->tampil_data('tbl_gol_ruang')->result(),
			'jabatan' => $recordJabatan,
			'username' => $data->username,
			'foto_pegawai' => $data->foto_pegawai,
			'level' => 'pegawai',
			'judul' => 'Ubah Lampiran SK Jabatan',
			'judul2' => 'Riwayat Pekerjaan dan Penghargaan',
			'judul3' => 'Ubah Lampiran SK Jabatan'
		);

		$this->load->view('pegawai/jabatan_edit', $data);
	}

	public function AksiEdit()
	{
		$id_jabatan = $this->input->post('id_jabatan');
		$id_pegawai = $this->input->post('id_pegawai');
		$jabatan = $this->input->post('jabatan');
		$tmt_sk_jabatan = $this->input->post('tmt_sk_jabatan');
		$gol_ruang = $this->input->post('gol_ruang');
		$gaji_pokok_jabatan = $this->input->post('gaji_pokok_jabatan');
		$lampiran_sk_jabatan = $_FILES['userfile']['name'];
		if ($lampiran_sk_jabatan) {
			$config['upload_path']          = './assets/directory/sk jabatan';
			$config['allowed_types']        = 'pdf';
			//$config['max_size']             = 0;
			//$config['max_width']            = 1024;
			//$config['max_height']           = 768;
			//$config['file_name']           = 'foto-'.$nama_pegawai.date('ymd');

			$this->upload->initialize($config);

			if ($this->upload->do_upload('userfile')) {
				$userfile = $this->upload->data('file_name');
				$id = array('id_jabatan' => $id_jabatan);
				$DataUpdate = array(
					'id_pegawai' => $id_pegawai,
					'jabatan' => $jabatan,
					'tmt_sk_jabatan' => $tmt_sk_jabatan,
					'gol_ruang' => $gol_ruang,
					'gaji_pokok_jabatan' => $gaji_pokok_jabatan,
					'lampiran_sk_jabatan' => $userfile
				);
				$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible " role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
				</button>
				Data lampiran SK jabatan pegawai berhasil diubah.</div>');
				$this->Jabatan_model->update_data('jabatan', $DataUpdate, $id);
				redirect('pegawai/jabatan');
			} else {
				$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible " role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
            </button>
            Maaf. Data lampiran SK jabatan pegawai gagal diubah karena kesalahan pada unggah file. Mohon gunakan file lampiran SK yang sesuai.</div>');
				redirect('pegawai/jabatan');
			}
		} elseif ($lampiran_sk_jabatan = 'userfile') {
			$id = array('id_jabatan' => $id_jabatan);
			$DataUpdate = array(
				'id_pegawai' => $id_pegawai,
				'jabatan' => $jabatan,
				'tmt_sk_jabatan' => $tmt_sk_jabatan,
				'gol_ruang' => $gol_ruang,
				'gaji_pokok_jabatan' => $gaji_pokok_jabatan
			);
			$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible " role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
			</button>
			Data lampiran SK jabatan pegawai berhasil diubah.</div>');
			$this->Jabatan_model->update_data('jabatan', $DataUpdate, $id);
			redirect('pegawai/jabatan');
		}
	}

	public function deleteJabatan($id_jabatan)
	{
		$this->Jabatan_model->deleteJabatan($id_jabatan);
		$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible " role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
		</button>
		Data lampiran SK jabatan pegawai berhasil dihapus.</div>');
		redirect('pegawai/jabatan');
	}
}