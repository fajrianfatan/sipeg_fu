<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pegawai extends CI_Controller {

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
			'pegawai' => $this->Pegawai_model->tampil_data()->result(),
			'username' => $data->username,
			'level' => $data->level,
			'foto_user' => $data->foto_user,
			'judul' => 'Daftar Pegawai',
			'judul2' => 'Data Pegawai',
			'judul3' => 'Daftar Pegawai'
		);

        $this->load->view('admin/pegawai',$data); 
	}

	public function input()
	{
		
		$dataInput = $this->User_model->ambil_data($this->session->userdata['username']);
		$dataInput = array(
			
			'tbl_gol_ruang' => $this->Tbl_golruang_model->tampil_data('tbl_gol_ruang')->result(),
			'tbl_jabatan' => $this->Tbl_jabatan_model->tampil_data('tbl_jabatan')->result(),
			'tbl_pendidikan' => $this->Tbl_pendidikan_model->tampil_data('tbl_pendidikan')->result(),
			'tbl_pangkat' => $this->Tbl_pangkat_model->tampil_data('tbl_pangkat')->result(),
			'tbl_jenis_pegawai' => $this->Tbl_jenis_pegawai_model->tampil_data('tbl_jenis_pegawai')->result(),
			'tbl_jurusan' => $this->Tbl_jurusan_model->tampil_data('jurusan')->result(),
			'tbl_jenis_kelamin' => $this->Tbl_jenis_kelamin_model->tampil_data('tbl_jenis_kelamin')->result(),
			'tbl_agama' => $this->Tbl_agama_model->tampil_data('tbl_agama')->result(),
			'tbl_status_menikah' => $this->Tbl_status_menikah_model->tampil_data('tbl_status_menikah')->result(),
			'username' => $dataInput->username,
			'level' => $dataInput->level,
			'foto_user' => $dataInput->foto_user,
			'judul' => 'Tambah Daftar Pegawai',
			'judul2' => 'Data Pegawai',
			'judul3' => 'Tambah Daftar Pegawai',
			'id_pegawai' => set_value('id_pegawai'),
			'nip' => set_value('nip'),
			'nama_pegawai' => set_value('nama_pegawai'),
			'gelar_pegawai' => set_value('gelar_pegawai'),
			'jenis_kelamin' => set_value('jenis_kelamin'),
			'foto_pegawai' => set_value('foto_pegawai'),
			'agama' => set_value('agama'),
			'pendidikan' => set_value('pendidikan'),
			'status_nikah' => set_value('status_nikah'),
			'alamat' => set_value('alamat'),
			'kelurahan' => set_value('kelurahan'),
			'kecamatan' => set_value('kecamatan'),
			'kota' => set_value('kota'),
			'provinsi' => set_value('provinsi'),
			
			'tempat_lahir' => set_value('tempat_lahir'),
			'tanggal_lahir' => set_value('tanggal_lahir'),
			'username' => set_value('username'),
			'password' => set_value('password'),
			'status_pegawai' => set_value('status_pegawai'),
			'jenis_pegawai' => set_value('jenis_pegawai'),
			'satuan_kerja' => set_value('satuan_kerja'),
			'jabatan' => set_value('jabatan'),
			'gol_ruang' => set_value('gol_ruang'),
			'satuan_org' => set_value('satuan_org'),
			'kgb_pegawai' => set_value('kgb_pegawai'),
			'pangkat' => set_value('pangkat'),
			'karpeg' => set_value('karpeg'),
			'karis' => set_value('karis'),
			'kpe' => set_value('kpe'),
			'taspen' => set_value('taspen'),
			'npwp' => set_value('npwp'),
			'nidn' => set_value('nidn'),
			'jurusan' => set_value('jurusan'),
			'telp' => set_value('telp')
		);
		$this->load->view('admin/pegawai_tambah',$dataInput);
	}

	public function input_aksi()
	{	
		$id_pegawai = $this->input->post('id_pegawai');
		$nip = $this->input->post('nip');
		$nama_pegawai = $this->input->post('nama_pegawai');
		$gelar_pegawai = $this->input->post('gelar_pegawai');
		$jenis_kelamin = $this->input->post('jenis_kelamin');
		$foto_pegawai = $_FILES['foto_pegawai'];
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
		$username = $this->input->post('username');
		$password = $this->input->post('password');
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

		if ($foto_pegawai=''){}
		else{
			$config['upload_path']          = './assets/directory/foto pegawai';
			$config['allowed_types']        = 'jpg|png';
			$config['max_size']             = 2000;
			$config['max_width']            = 600;
			$config['max_height']           = 400;
			$config['file_name']           = 'foto-'.$nama_pegawai.date('ymd');
            $this->load->library('upload');
			$this->upload->initialize($config);

			if ( ! $this->upload->do_upload('foto_pegawai'))
			{
		// 		echo "<pre>";
		// print_r($foto_pegawai);
		// echo "<pre>";
				$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible " role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
            </button>
            Maaf. Data Pegawai gagal diubah karena ukuran foto terlalu besar. Mohon gunakan file gambar dengan ukuran yang sesuai.</div>');
			redirect('admin/pegawai');
			}
			else
			{
					$foto_pegawai = $this->upload->data('file_name');
			$DataInsert = array(
			'id_pegawai' => $id_pegawai,
			'nip' => $nip, 
			'nama_pegawai' => $nama_pegawai, 
			'gelar_pegawai' => $gelar_pegawai, 
			'jenis_kelamin' => $jenis_kelamin, 
			'foto_pegawai' => $foto_pegawai, 
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
			'username'=> $username,
			'password'=> MD5($password), 
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
		// echo "<pre>";
		// print_r($DataInsert);
		// echo "<pre>";
		$this->Pegawai_model->input_data($DataInsert,'pegawai');
		$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible " role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
		</button>
		Data pegawai berhasil ditambahkan.</div>');
		redirect('admin/pegawai'); 
			}
		}
		
		
	}
	
	public function failed(){
		show_404();
	}
	public function edit($id)
	{
		$recordPegawai = $this->Pegawai_model->getDataPegawaiDetail($id);
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
			'tbl_jurusan' => $this->Tbl_jurusan_model->tampil_data('jurusan')->result(),
			'tbl_jenis_kelamin' => $this->Tbl_jenis_kelamin_model->tampil_data('tbl_jenis_kelamin')->result(),
			'tbl_agama' => $this->Tbl_agama_model->tampil_data('tbl_agama')->result(),
			'tbl_status_menikah' => $this->Tbl_status_menikah_model->tampil_data('tbl_status_menikah')->result(),
			'pegawai' => $recordPegawai,
			'username' => $data->username,
			'level' => $data->level,
			'foto_user' => $data->foto_user,
			'judul' => 'Ubah Daftar Pegawai',
			'judul2' => 'Data Pegawai',
			'judul3' => 'Ubah Daftar Pegawai'
		);	
		$this->load->view('admin/pegawai_edit',$data);
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
		$username = $this->input->post('username');
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
				$id = array('id_pegawai' => $id_pegawai);
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
					'username'=> $username,
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
				Data pegawai berhasil diubah.</div>');
				$this->Pegawai_model->update_data('pegawai',$DataUpdate,$id);
				redirect('admin/pegawai');
			}
			else
			{
				$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible " role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
            </button>
            Maaf. Data Pegawai gagal diubah karena kesalahan pada unggah foto. Mohon gunakan file gambar yang sesuai.</div>');
			redirect('admin/pegawai');
			}
		}elseif($foto_pegawai='userfile'){
			$id = array('id_pegawai' => $id_pegawai);
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
				'username'=> $username,
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
			Data pegawai berhasil diubah.</div>');
			// $this->pegawai_model->editDataPegawai($DataUpdate, $id_pegawai);
			$this->Pegawai_model->update_data('pegawai',$DataUpdate,$id);
			redirect('admin/pegawai');
		}else{
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible " role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
            </button>
            Maaf. Data pegawai gagal diubah karena kesalahan pengisian form. Silakan cek kembali.</div>');
			redirect('admin/pegawai/index');
		}
	}

	public function deletePegawai($id_pegawai)
	{
		$this->Pegawai_model->deleteDataPegawai($id_pegawai);
		$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible " role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
		</button>
		Data pegawai berhasil dihapus.</div>');
		redirect('admin/pegawai');
	}
}
