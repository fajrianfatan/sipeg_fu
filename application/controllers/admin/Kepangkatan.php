<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kepangkatan extends CI_Controller {

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
		$data["kepangkatan"] = directory_map('.assets/directory/sk kepangkatan/');
		$data = $this->User_model->ambil_data($this->session->userdata['username']);
		$data = array(
			'kepangkatan' => $this->Kepangkatan_model->tampil_data()->result(),
			'user_name' => $data->username,
			'level' => $data->level,
			'foto_user' => $data->foto_user,
			'judul' => 'Lampiran SK Kepangkatan',
            'judul2' => 'Riwayat Pekerjaan dan Penghargaan atau Tanda Jasa',
            'judul3' => 'Lampiran SK Kepangkatan'
		);
		$this->load->helper('download');
        $this->load->view('admin/kepangkatan',$data); 
	}

	public function input()
	{
		$dataInput = $this->User_model->ambil_data($this->session->userdata['username']);
		//$dataInput = $this->kepangkatan_model->tampil_data($this->session->userdata['id_pegawai']);
		//$dataInput['pegawai'] = $this->pegawai_model->tampil_data('pegawai')->result();
		$dataInput = array(
			'tbl_gol_ruang' => $this->Tbl_golruang_model->tampil_data('tbl_gol_ruang')->result(),
			'tbl_jabatan' => $this->Tbl_jabatan_model->tampil_data('tbl_jabatan')->result(),
			'tbl_pendidikan' => $this->Tbl_pendidikan_model->tampil_data('tbl_pendidikan')->result(),
			'tbl_pangkat' => $this->Tbl_pangkat_model->tampil_data('tbl_pangkat')->result(),
			'tbl_jenis_pegawai' => $this->Tbl_jenis_pegawai_model->tampil_data('tbl_jenis_pegawai')->result(),
			'pegawai' => $this->Pegawai_model->tampil_data('pegawai')->result(),
			'user_name' => $dataInput->username,
			'level' => $dataInput->level,
			'foto_user' => $dataInput->foto_user,
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
			'lampiran_sk_pangkat' => set_value('lampiran_sk_pangkat'),
			'judul' => 'Tambah Lampiran SK Kepangkatan',
            'judul2' => 'Riwayat Pekerjaan dan Penghargaan atau Tanda Jasa',
            'judul3' => 'Tambah Lampiran SK Kepangkatan'
		);
		$this->load->view('admin/kepangkatan_tambah',$dataInput);
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
			//$config['file_name']           = 'foto-'.$id_pegawai.date('ymd');

			$this->upload->initialize($config);

			if ( ! $this->upload->do_upload('lampiran_sk_pangkat'))
			{
				$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible " role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
				</button>
				Gagal mengunggah lampiran SK kepangkatan pegawai. Silakan ulangi</div>');
				redirect('admin/kepangkatan');
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
		$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible " role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
		</button>
		Data lampiran SK kepangkatan pegawai berhasil diunggah dan ditambahkan.</div>');
		redirect(base_url('admin/kepangkatan'));
	}

	public function edit($id)
	{
		$recordKepangkatan = $this->Kepangkatan_model->getDataKepangkatanDetail($id);
		//echo "<pre>";
		//print_r($recordUser);
		//echo "<pre>";
		$data = $this->User_model->ambil_data($this->session->userdata['username']);
		$data = array(
			'tbl_gol_ruang' => $this->Tbl_golruang_model->tampil_data('tbl_gol_ruang')->result(),
			'tbl_jabatan' => $this->Tbl_jabatan_model->tampil_data('tbl_jabatan')->result(),
			'tbl_pendidikan' => $this->Tbl_pendidikan_model->tampil_data('tbl_pendidikan')->result(),
			'tbl_pangkat' => $this->Tbl_pangkat_model->tampil_data('tbl_pangkat')->result(),
			'tbl_jenis_pegawai' => $this->Tbl_jenis_pegawai_model->tampil_data('tbl_jenis_pegawai')->result(),
			'pegawai' => $this->Pegawai_model->tampil_data('pegawai')->result(),
			'kepangkatan' => $recordKepangkatan,
			'user_name' => $data->username,
			'level' => $data->level,
			'foto_user' => $data->foto_user,
			'judul' => 'Ubah Lampiran SK Kepangkatan',
            'judul2' => 'Riwayat Pekerjaan dan Penghargaan atau Tanda Jasa',
            'judul3' => 'Ubah Lampiran SK Kepangkatan'
		);
		
		$this->load->view('admin/kepangkatan_edit',$data);
	}

	public function AksiEdit()
	{
		$id_kepangkatan = $this->input->post('id_kepangkatan');
		$id_pegawai = $this->input->post('id_pegawai');
		$jenis_pegawai = $this->input->post('jenis_pegawai');
		$pangkat = $this->input->post('pangkat');
		$gol_ruang = $this->input->post('gol_ruang');
		$no_sk_pangkat = $this->input->post('no_sk_pangkat');
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
			//$config['file_name']           = 'foto-'.$id_pegawai.date('ymd');

			$this->upload->initialize($config);

			if ($this->upload->do_upload('userfile'))
			{
				$userfile = $this->upload->data('file_name');
				$id = array('id_kepangkatan'=>$id_kepangkatan);
				$DataUpdate = array(
					'id_pegawai'=> $id_pegawai,
					'jenis_pegawai'=> $jenis_pegawai,
					'pangkat'=> $pangkat,
					'gol_ruang'=> $gol_ruang,
					'no_sk_pangkat'=> $no_sk_pangkat,
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
				redirect('admin/kepangkatan');
			}
			else
			{
				$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible " role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
            </button>
            Maaf. Data lampiran SK kepangkatan pegawai gagal diubah karena kesalahan pada unggah file. Mohon gunakan file lampiran SK yang sesuai.</div>');
			redirect('admin/kepangkatan');
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
			redirect('admin/kepangkatan');
		}else{
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible " role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
			</button>
			Data lampiran SK kepangkatan pegawai gagal diubah karena kesalahan pengisian form. Silakan cek kembali.</div>');
			redirect('admin/kepangkatan');
		}
		
	}

	public function deleteKepangkatan($id_kepangkatan)
	{
		$this->Kepangkatan_model->deleteDataKepangkatan($id_kepangkatan);
		$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible " role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
		</button>
		Data Lampiran SK Kepangkatan pegawai berhasil dihapus.</div>');
		redirect('admin/kepangkatan');
	}

}
