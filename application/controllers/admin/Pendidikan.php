<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pendidikan extends CI_Controller {

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
		$data["pendidikan"] = directory_map('.assets/directory/pendidikan/');
		$data = $this->User_model->ambil_data($this->session->userdata['username']);
		$data = array(
			'pendidikan' => $this->Pendidikan_model->tampil_data()->result(),
			'user_name' => $data->username,
			'level' => $data->level,
			'foto_user' => $data->foto_user,
			'judul' => 'Data Pendidikan Pegawai',
            'judul2' => 'Riwayat Pendidikan dan Pelatihan Pegawai',
            'judul3' => 'Data Pendidikan Pegawai'
		);
		$this->load->helper('download');
        $this->load->view('admin/pendidikan',$data);
	}

	public function input()
	{
		$dataInput = $this->User_model->ambil_data($this->session->userdata['username']);
		$dataInput = array(
			'tbl_pendidikan' => $this->Tbl_pendidikan_model->tampil_data('tbl_pendidikan')->result(),
			'pegawai' => $this->Pegawai_model->tampil_data('pegawai')->result(),
			'user_name' => $dataInput->username,
			'level' => $dataInput->level,
			'foto_user' => $dataInput->foto_user,
			'id_pendidikan' => set_value('id_pendidikan'),
			'id_pegawai' => set_value('id_pegawai'),
			'pend_terakhir' => set_value('pend_terakhir'),
			'tahun_pend' => set_value('tahun_pend'),
			'lampiran_pend' => set_value('lampiran_pend'),
			'judul' => 'Tambah Lampiran Ijazah Pendidikan Pegawai',
            'judul2' => 'Riwayat Pendidikan dan Pelatihan Pegawai',
            'judul3' => 'Tambah Lampiran Ijazah Pendidikan Pegawai'
		);
		$this->load->view('admin/pendidikan_tambah',$dataInput);
	}

	public function input_aksi()
	{	
		$id_pendidikan = $this->input->post('id_pendidikan');
		$id_pegawai = $this->input->post('id_pegawai');
		$pend_terakhir = $this->input->post('pend_terakhir');
		$tahun_pend = $this->input->post('tahun_pend');
		$lampiran_pend = $_FILES['lampiran_pend'];

		if ($lampiran_pend=''){}
		else{
			$config['upload_path']          = './assets/directory/pendidikan';
			$config['allowed_types']        = 'pdf';
			//$config['max_size']             = 0;
			//$config['max_width']            = 1024;
			//$config['max_height']           = 768;
			//$config['file_name']           = 'SK-'.$id_pegawai.date('ymd');

			$this->upload->initialize($config);

			if ( ! $this->upload->do_upload('lampiran_pend'))
			{
				$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible " role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
				</button>
				Gagal mengunggah lampiran ijazah pendidikan pegawai. Silakan ulangi</div>');
				redirect('admin/pendidikan/index');
			}
			else
			{
				$lampiran_pend = $this->upload->data('file_name');		
			}
		}
		$DataInsert = array(
			'id_pendidikan' => $id_pendidikan,
			'id_pegawai' => $id_pegawai,
			'pend_terakhir' => $pend_terakhir,
			'tahun_pend' => $tahun_pend,
			'lampiran_pend' => $lampiran_pend
		);

		$this->Pendidikan_model->input_data($DataInsert);
		$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible " role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
		</button>
		Data lampiran ijazah pendidikan pegawai berhasil diunggah dan ditambahkan.</div>');
		redirect(base_url('admin/pendidikan'));
	}

	public function edit($id)
	{
		$recordPendidikan = $this->Pendidikan_model->getDataPendidikanDetail($id);
		$data = $this->User_model->ambil_data($this->session->userdata['username']);
		$data = array(
			'pegawai' => $this->Pegawai_model->tampil_data('pegawai')->result(),
			'tbl_pendidikan' => $this->Tbl_pendidikan_model->tampil_data('tbl_pendidikan')->result(),
			'pendidikan' => $recordPendidikan,
			'user_name' => $data->username,
			'level' => $data->level,
			'foto_user' => $data->foto_user,
			'judul' => 'Ubah Riwayat Pendidikan',
            'judul2' => 'Riwayat Pendidikan dan Pelatihan Pegawai',
            'judul3' => 'Ubah Riwayat Pendidikan'
		);
		
		$this->load->view('admin/pendidikan_edit',$data);
	}

	public function AksiEdit()
	{
		$id_pendidikan = $this->input->post('id_pendidikan');
		$id_pegawai = $this->input->post('id_pegawai');
		$pend_terakhir = $this->input->post('pend_terakhir');
		$tahun_pend = $this->input->post('tahun_pend');
		
		$lampiran_pend = $_FILES['userfile']['name'];

		if($lampiran_pend){
			$config['upload_path']          = './assets/directory/pendidikan';
			$config['allowed_types']        = 'pdf';
			//$config['max_size']             = 0;
			//$config['max_width']            = 1024;
			//$config['max_height']           = 768;
			//$config['file_name']           = 'foto-'.$id_pegawai.date('ymd');

			$this->upload->initialize($config);

			if ($this->upload->do_upload('userfile'))
			{
				$userfile = $this->upload->data('file_name');
				$id = array('id_pendidikan'=>$id_pendidikan);
				$DataUpdate = array(
					'id_pegawai' => $id_pegawai,
					'pend_terakhir' => $pend_terakhir,
					'tahun_pend' => $tahun_pend,
					'lampiran_pend' => $userfile
				);
				$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible " role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
				</button>
				Data lampiran ijazah pendidikan pegawai berhasil diubah.</div>');
				$this->Pendidikan_model->update_data('pendidikan',$DataUpdate,$id);
				redirect('admin/pendidikan');
			}
			else
			{
				$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible " role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
            </button>
            Maaf. Data lampiran ijazah pendidikan pegawai gagal diubah karena kesalahan pada unggah file. Mohon gunakan file lampiran SK yang sesuai.</div>');	
			redirect('admin/pendidikan');
			}
		}
		elseif($lampiran_pend='userfile')
		{
			$id = array('id_pendidikan' => $id_pendidikan);
			$DataUpdate = array(
				'id_pegawai' => $id_pegawai,
				'pend_terakhir' => $pend_terakhir,
				'tahun_pend' => $tahun_pend
			);
			$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible " role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
			</button>
			Data lampiran ijazah pendidikan pegawai berhasil diubah.</div>');
			$this->Pendidikan_model->update_data('pendidikan',$DataUpdate,$id);
			redirect('admin/pendidikan');
		}
		
	}

	public function deletePendidikan($id_pendidikan)
	{
		$this->Pendidikan_model->deletePendidikan($id_pendidikan);
		$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible " role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
		</button>
		Data lampiran ijazah pendidikan pegawai berhasil dihapus.</div>');
		redirect('admin/pendidikan');
	}

}
