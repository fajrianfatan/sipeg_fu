<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

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
			'user' => $this->User_model->tampil_data()->result(),
			'username' => $data->username,
			'level' => $data->level,
			'foto_user' => $data->foto_user,
			'judul' => 'Daftar User',
            'judul2' => 'Data User/Hak Akses',
            'judul3' => 'Daftar User'
		);
		
        $this->load->view('admin/user',$data);
  
	}

	public function input()
	{
		$dataInput = $this->User_model->ambil_data($this->session->userdata['username']);
		$dataInput = array(
			'username' => $dataInput->username,
			'level' => $dataInput->level,
			'foto_user' => $dataInput->foto_user,
			'id_user' => set_value('id_user'),
			'nama_user' => set_value('nama_user'),
			'username' => set_value('username'),
			'password' => set_value('password'),
			'foto_user' => set_value('foto_user'),
			'level' => set_value('level'),
			'judul' => 'Tambah Data User',
            'judul2' => 'Data User/Hak Akses',
            'judul3' => 'Tambah Data User'

		);
		$this->load->view('admin/user_tambah',$dataInput);
	}

	public function input_aksi()
	{	
		$id_user = $this->input->post('id_user');
		$nama_user = $this->input->post('nama_user');
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$level = $this->input->post('level');
		$foto_user = $_FILES['foto_user'];
		
		if ($foto_user=''){}
		else{
			$config['upload_path']          = './assets/directory/foto user';
			$config['allowed_types']        = 'jpg|png';
			$config['max_size']             = 2000;
			$config['max_width']            = 600;
			$config['max_height']           = 400;
			$config['file_name']           = 'foto-'.$username.date('ymd');

			$this->upload->initialize($config);

			if ( ! $this->upload->do_upload('foto_user'))
			{
					echo "upload gagal"; die();
			}
			else
			{
					$foto_user = $this->upload->data('file_name');		
			}
		}
		$DataInsert = array(
			'id_user' => $id_user,
			'nama_user' => $nama_user,
			'username' => $username,
			'password' => MD5($password),
			'foto_user' => $foto_user,
			'level' => $level
		);
		$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible " role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
				</button>
				Data user berhasil ditambahkan.</div>');
		$this->User_model->input_data($DataInsert);
		redirect('admin/user');
	}

	public function edit($id)
	{
		$recordUser = $this->User_model->getDataUserDetail($id);
		//echo "<pre>";
		//print_r($recordUser);
		//echo "<pre>";
		$data = $this->User_model->ambil_data($this->session->userdata['username']);
		$data = array(
			'user' => $recordUser,
			'username' => $data->username,
			'level' => $data->level,
			'foto_user' => $data->foto_user,
			'judul' => 'Ubah Data User',
            'judul2' => 'Data User/Hak Akses',
            'judul3' => 'Ubah Data User'
		);
		
		$this->load->view('admin/user_edit',$data);
	}

	public function AksiEdit()
	{
		$id_user = $this->input->post('id_user');
		$nama_user = $this->input->post('nama_user');
		$username = $this->input->post('username');
		$level = $this->input->post('level');
		$foto_user = $_FILES['userfile']['name'];

		if($foto_user){
			$config['upload_path']          = './assets/directory/foto user';
			$config['allowed_types']        = 'jpg|png';
			$config['max_size']             = 2000;
			$config['max_width']            = 600;
			$config['max_height']           = 400;
			$config['file_name']           = 'foto-'.$username.date('ymd');

			$this->upload->initialize($config);

			if ($this->upload->do_upload('userfile'))
			{
				$userfile = $this->upload->data('file_name');
				$id = array('id_user'=>$id_user);
				$DataUpdate = array(
					'username'=> $username,
					'nama_user'=> $nama_user,
					'level'=> $level,
					'foto_user'=> $userfile
				);
				$this->User_model->update_data('user',$DataUpdate, $id);
				
				redirect('auth/success');
			}
			else
			{
				$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible " role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
				</button>
				Maaf. Data User gagal diubah karena kesalahan pada unggah foto. Mohon gunakan file gambar yang sesuai.</div>');
				redirect('admin/user');
			}
		}elseif($foto_user='userfile'){
			$id = array('id_user'=>$id_user);
			$DataUpdate = array(
				'username'=> $username,
				'nama_user'=> $nama_user,
				'level'=> $level
			);
			$this->User_model->update_data('user',$DataUpdate, $id);
			
			redirect('auth/success');
		}
		else{
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible " role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
			</button>
			Maaf. Data pegawai gagal diubah karena kesalahan pengisian form. Silakan cek kembali.</div>');
			redirect('admin/user');
		}
		//echo "<pre>";
		//print_r($DataUpdate);
		//echo "<pre>";
	}
	
	public function deleteUser($id_user)
	{
		$this->User_model->deleteDataUser($id_user);
		$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible " role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
		</button>
		Data user berhasil dihapus.</div>');
		redirect('admin/user');
	}
}
