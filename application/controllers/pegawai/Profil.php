<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profil extends CI_Controller {
	
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
            'kepangkatan' => $this->Pegawai_model->tampil_data_aspeg()->result(),
			'username' => $data->username,
			'foto_pegawai' => $data->foto_pegawai,
			'level' => 'pegawai',
            'judul' => 'Data Diri Pegawai',
            'judul2' => 'Profil Saya',
            'judul3' => 'Data Diri Pegawai',
            'id_pegawai' => $data->id_pegawai,
            'nip' => $data->nip,
            'nama' => $data->nama_pegawai,
			'gelar' => $data->gelar_pegawai,
			'jenis_kelamin' => $data->jenis_kelamin,
			'foto' => $data->foto_pegawai,
			'agama' => $data->agama,
			'pendidikan' => $data->pendidikan,
			'status_nikah' => $data->status_nikah,
			'alamat' => $data->alamat,
			'kelurahan' => $data->kelurahan,
			'kecamatan' => $data->kecamatan,
			'kota' => $data->kota,
			'provinsi' => $data->provinsi,
			'tempat_lahir' => $data->tempat_lahir,
			'tanggal_lahir' => $data->tanggal_lahir,
			// 'password' => $data->password,
			'status_pegawai' => $data->status_pegawai,
			'jenis_pegawai' => $data->jenis_pegawai,
			'satuan_kerja' => $data->satuan_kerja,
			'jabatan' => $data->jabatan,
			'gol_ruang' => $data->gol_ruang,
			'satuan_org' => $data->satuan_org,
			'kgb_pegawai' => $data->kgb_pegawai,
			'pangkat' => $data->pangkat,
			'karpeg' => $data->karpeg,
			'karis' => $data->karis,
			'kpe' => $data->kpe,
			'taspen' => $data->taspen,
			'npwp' => $data->npwp,
			'nidn' => $data->nidn,
			'jurusan' => $data->jurusan,
			'telp' => $data->telp
		);
        $this->load->view('pegawai/profil', $data);
	}

    public function edit($id)
	{
		$recordPegawai = $this->Pegawai_model->getDataPegawaiDetail($id);
		$data = $this->Pegawai_model->ambil_data($this->session->userdata['username']);
		$data = array(
			'tbl_gol_ruang' => $this->Tbl_golruang_model->tampil_data('tbl_gol_ruang')->result(),
			'tbl_jabatan' => $this->Tbl_jabatan_model->tampil_data('tbl_jabatan')->result(),
			'tbl_pendidikan' => $this->Tbl_pendidikan_model->tampil_data('tbl_pendidikan')->result(),
			'tbl_pangkat' => $this->Tbl_pangkat_model->tampil_data('tbl_pangkat')->result(),
			'tbl_jenis_pegawai' => $this->Tbl_jenis_pegawai_model->tampil_data('tbl_jenis_pegawai')->result(),
			'tbl_jurusan' => $this->Tbl_jurusan_model->tampil_data('jurusan')->result(),
			'pegawai' => $recordPegawai,
			'username' => $data->username,
			'foto_pegawai' => $data->foto_pegawai,
			'level' => 'pegawai',
            'judul' => 'Halaman Ubah Profil',
            'judul2' => 'Profil Saya',
            'judul3' => 'Halaman Ubah Profil'
		);
		$this->load->view('pegawai/profil_edit',$data);
	}

	public function AksiEdit()
	{
		$id_pegawai = $this->input->post('id_pegawai');
		$nip = $this->input->post('nip');
		$nama_pegawai = $this->input->post('nama_pegawai');
		$gelar_pegawai = $this->input->post('gelar_pegawai');
		$jenis_kelamin = $this->input->post('jenis_kelamin');
		$agama = $this->input->post('agama');
		$pendidikan = $this->input->post('pendidikan');
		$status_nikah = $this->input->post('status_nikah');
		$alamat = $this->input->post('alamat');
		$kelurahan = $this->input->post('kelurahan');
		$kecamatan = $this->input->post('kecamatan');
		$kota = $this->input->post('kota');
		$provinsi = $this->input->post('provinsi');
		$tempat_lahir = $this->input->post('tempat_lahir');
		$tanggal_lahir = $this->input->post('tanggal_lahir');
		$status_pegawai = $this->input->post('status_pegawai');
		$jenis_pegawai = $this->input->post('jenis_pegawai');
		$satuan_kerja = $this->input->post('satuan_kerja');
		$jabatan = $this->input->post('jabatan');
		$gol_ruang = $this->input->post('gol_ruang');
		$satuan_org = $this->input->post('satuan_org');
		$kgb_pegawai = $this->input->post('kgb_pegawai');
		$pangkat = $this->input->post('pangkat');
		$karpeg = $this->input->post('karpeg');
		$karis = $this->input->post('karis');
		$kpe = $this->input->post('kpe');
		$taspen = $this->input->post('taspen');
		$npwp = $this->input->post('npwp');
		$nidn = $this->input->post('nidn');
		$jurusan = $this->input->post('jurusan');
		$telp = $this->input->post('telp');

		$foto_pegawai = $_FILES['userfile']['name'];

		if($foto_pegawai){
			$config['upload_path']          = './assets/directory/foto pegawai';
			$config['allowed_types']        = 'jpg|png';
			$config['max_size']             = 2000;
			$config['max_width']            = 600;
			$config['max_height']           = 400;
			$config['file_name']           = 'foto-'.$nama_pegawai.date('ymd');

			$this->upload->initialize($config);

			if ($this->upload->do_upload('userfile'))
			{
				$userfile = $this->upload->data('file_name');
				$id = array('id_pegawai'=>$id_pegawai);
				$DataUpdate = array(
					'nip' => $nip, 
					'nama_pegawai' => $nama_pegawai, 
					'gelar_pegawai' => $gelar_pegawai, 
					'jenis_kelamin' => $jenis_kelamin, 
					'foto_pegawai' => $userfile, 
					'agama' => $agama, 
					'pendidikan' => $pendidikan, 
					'status_nikah' => $status_nikah, 
					'alamat' => $alamat, 
					'kelurahan' => $kelurahan, 
					'kecamatan' => $kecamatan, 
					'kota' => $kota, 
					'provinsi' => $provinsi, 
					'tempat_lahir' => $tempat_lahir, 
					'tanggal_lahir' => $tanggal_lahir,
					'status_pegawai' => $status_pegawai, 
					'jenis_pegawai' => $jenis_pegawai, 
					'satuan_kerja' => $satuan_kerja, 
					'jabatan' => $jabatan, 
					'gol_ruang' => $gol_ruang, 
					'satuan_org' => $satuan_org, 
					'kgb_pegawai' => $kgb_pegawai, 
					'pangkat' => $pangkat, 
					'karpeg' => $karpeg, 
					'karis' => $karis, 
					'kpe' => $kpe, 
					'taspen' => $taspen, 
					'npwp' => $npwp, 
					'nidn' => $nidn, 
					'jurusan' => $jurusan, 
					'telp' => $telp
				);
				$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible " role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
				</button>
				Data profil pegawai berhasil diubah.</div>');
				$this->Pegawai_model->update_data('pegawai',$DataUpdate,$id);
				redirect('pegawai/profil');
				
			}
			else
			{
				$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible " role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
            </button>
            Maaf. Data Pegawai gagal diubah karena kesalahan pada unggah foto. Mohon gunakan file gambar yang sesuai.</div>');
			redirect('pegawai/profil');
			}
		}
		elseif($foto_pegawai='userfile'){
			$id = array('id_pegawai'=>$id_pegawai);
			$DataUpdate = array(
				'nip' => $nip, 
				'nama_pegawai' => $nama_pegawai, 
				'gelar_pegawai' => $gelar_pegawai, 
				'jenis_kelamin' => $jenis_kelamin, 
				'agama' => $agama, 
				'pendidikan' => $pendidikan, 
				'status_nikah' => $status_nikah, 
				'alamat' => $alamat, 
				'kelurahan' => $kelurahan, 
				'kecamatan' => $kecamatan, 
				'kota' => $kota, 
				'provinsi' => $provinsi, 
				'tempat_lahir' => $tempat_lahir, 
				'tanggal_lahir' => $tanggal_lahir,
				'status_pegawai' => $status_pegawai, 
				'jenis_pegawai' => $jenis_pegawai, 
				'satuan_kerja' => $satuan_kerja, 
				'jabatan' => $jabatan, 
				'gol_ruang' => $gol_ruang, 
				'satuan_org' => $satuan_org, 
				'kgb_pegawai' => $kgb_pegawai, 
				'pangkat' => $pangkat, 
				'karpeg' => $karpeg, 
				'karis' => $karis, 
				'kpe' => $kpe, 
				'taspen' => $taspen, 
				'npwp' => $npwp, 
				'nidn' => $nidn, 
				'jurusan' => $jurusan, 
				'telp' => $telp
			);	
			$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible " role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
			</button>
			Data profil pegawai berhasil diubah.</div>');
			$this->Pegawai_model->update_data('pegawai',$DataUpdate,$id);
			redirect('pegawai/profil');
		}else{
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible " role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
            </button>
            Maaf. Data profil pegawai gagal diubah karena kesalahan pengisian form. Silakan cek kembali.</div>');
			redirect('pegawai/profil/');
		}

	}

}
