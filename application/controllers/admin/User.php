<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('level') != 'admin') {
			redirect('auth/kicked');
			exit;
		}
	}

	public function index()
	{
		$data = $this->User_model->ambil_data($this->session->userdata['username']);

		$data = array(
			'user' => $this->User_model->tampil_data()->result(),
			'user_name' => $data->username,
			'level' => $data->level,
			'foto_user' => $data->foto_user,
			'judul' => 'Daftar User',
			'judul2' => 'Data User/Hak Akses',
			'judul3' => 'Daftar User'
		);

		$this->load->view('admin/user', $data);
	}

	public function input()
	{
		$dataInput = $this->User_model->ambil_data($this->session->userdata['username']);
		$dataInput = array(
			'user_name' => $dataInput->username,
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
		$this->load->view('admin/user_tambah', $dataInput);
	}

	public function input_aksi()
	{
		$id_user = $this->input->post('id_user');
		$nama_user = $this->input->post('nama_user');
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$passwordconf = $this->input->post('passwordconf');
		$level = $this->input->post('level');
		$foto_user = $_FILES['foto_user'];
		$this->form_validation->set_rules('nama_user', 'Nama Pengguna', 'required|min_length[8]|max_length[16]|trim|xss_clean|is_unique[user.nama_user]'
			,array(
				'required'      => '%s wajib diisi.',
				'min_length'      => '%s harus terdiri dari minimal 8 karakter.',
				'max_length'      => '%s harus terdiri dari maksimal 16 karakter.',
				'is_unique'     => '%s telah digunakan.'
		));
		$this->form_validation->set_rules('username', 'Username', 'required|min_length[8]|max_length[16]|trim|xss_clean|is_unique[user.username]'
			,array(
				'required'      => '%s wajib diisi.',
				'min_length'      => '%s harus terdiri dari minimal 8 karakter.',
				'max_length'      => '%s harus terdiri dari maksimal 16 karakter.',
				'is_unique'     => '%s telah digunakan.'
		));
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[8]|max_length[16]|trim|xss_clean|matches[passwordconf]'
			,array(
				'required'      => '%s wajib diisi.',
				'min_length'      => '%s harus terdiri dari minimal 8 karakter.',
				'max_length'      => '%s harus terdiri dari maksimal 16 karakter.',
				'matches'     => '%s harus sama dengan konfirmasi password.'
		));
		$this->form_validation->set_rules('passwordconf', 'Konfirmasi password', 'required|min_length[8]|max_length[16]|trim|xss_clean|matches[password]'
			,array(
				'required'      => '%s wajib diisi.',
				'min_length'      => '%s harus terdiri dari minimal 8 karakter.',
				'max_length'      => '%s harus terdiri dari maksimal 16 karakter.',
				'matches'     => '%s harus sama dengan password baru.'
		));
		
		if ($this->form_validation->run() == FALSE)
		{
			// $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible " role="alert">
			// <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
			// </button>
			// Username telah digunakan oleh pengguna lain. Mohon gunakan username lain.</div>');
			$this->input();
			return;
		}
		else
		{
			if ($foto_user = '') {
			} else {
				$config['upload_path']          = './assets/directory/foto user';
				$config['allowed_types']        = 'jpg|png';
				$config['max_size']             = 2000;
				$config['max_width']            = 600;
				$config['max_height']           = 400;
				$config['file_name']           = 'foto-' . $username . date('ymd');
	
				$this->upload->initialize($config);
	
				if (!$this->upload->do_upload('foto_user')) {
					echo "upload gagal";
					die();
				} else {
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
			'user_name' => $data->username,
			'level' => $data->level,
			'foto_user' => $data->foto_user,
			'judul' => 'Ubah Data User',
			'judul2' => 'Data User/Hak Akses',
			'judul3' => 'Ubah Data User'
		);

		$this->load->view('admin/user_edit', $data);
	}

	public function AksiEdit()
	{
		$id = $this->input->post('id');
		$id_user = $this->input->post('id_user');
		$old_nama_user = $this->input->post('old_nama_user');
		$nama_user = $this->input->post('nama_user');
		$old_username = $this->input->post('old_username');
		$username = $this->input->post('username');
		$level = $this->input->post('level');
		$foto_user = $_FILES['userfile']['name'];
		if($old_nama_user !== $nama_user || $old_username !== $username)
		{
			$this->form_validation->set_rules('nama_user', 'Nama Pengguna', 'required|min_length[8]|max_length[16]|trim|xss_clean|is_unique[user.nama_user]'
			,array(
				'required'      => '%s wajib diisi.',
				'min_length'      => '%s harus terdiri dari minimal 8 karakter.',
				'max_length'      => '%s harus terdiri dari maksimal 16 karakter.',
				'is_unique'     => '%s telah digunakan.'
			));
			$this->form_validation->set_rules('username', 'Username', 'required|min_length[8]|max_length[16]|trim|xss_clean|is_unique[user.username]'
				,array(
					'required'      => '%s wajib diisi.',
					'min_length'      => '%s harus terdiri dari minimal 8 karakter.',
					'max_length'      => '%s harus terdiri dari maksimal 16 karakter.',
					'is_unique'     => '%s telah digunakan.'
			));
			if ($this->form_validation->run() == FALSE)
			{
				// $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible " role="alert">
				// <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
				// </button>
				// Username telah digunakan oleh pengguna lain. Mohon gunakan username lain.</div>');
				$this->edit($id);
				return;
			}
			else{
				if ($foto_user) {
					$config['upload_path']          = './assets/directory/foto user';
					$config['allowed_types']        = 'jpg|png';
					$config['max_size']             = 2000;
					$config['max_width']            = 600;
					$config['max_height']           = 400;
					$config['file_name']           = 'foto-' . $username . date('ymd');

					$this->upload->initialize($config);

					if ($this->upload->do_upload('userfile')) {
						$userfile = $this->upload->data('file_name');
						$id = array('id_user' => $id_user);
						$DataUpdate = array(
							'username' => $username,
							'nama_user' => $nama_user,
							'level' => $level,
							'foto_user' => $userfile
						);
						$this->User_model->update_data('user', $DataUpdate, $id);

						redirect('auth/success');
					} else {
						$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible " role="alert">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
						</button>
						Maaf. Data User gagal diubah karena kesalahan pada unggah foto. Mohon gunakan file gambar yang sesuai.</div>');
						redirect('admin/user');
					}
				} elseif ($foto_user = 'userfile') {
					$id = array('id_user' => $id_user);
					$DataUpdate = array(
						'username' => $username,
						'nama_user' => $nama_user,
						'level' => $level
					);
					$this->User_model->update_data('user', $DataUpdate, $id);

					redirect('auth/success');
				} else {
					$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible " role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
					</button>
					Maaf. Data pegawai gagal diubah karena kesalahan pengisian form. Silakan cek kembali.</div>');
					redirect('admin/user');
				}
			}
		}
		else{
		
		// if ($this->form_validation->run() == FALSE)
		// {
		// 	// $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible " role="alert">
		// 	// <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
		// 	// </button>
		// 	// Username telah digunakan oleh pengguna lain. Mohon gunakan username lain.</div>');
		// 	$this->edit($id);
		// 	return;
		// }
		// else{
			if ($foto_user) {
				$config['upload_path']          = './assets/directory/foto user';
				$config['allowed_types']        = 'jpg|png';
				$config['max_size']             = 2000;
				$config['max_width']            = 600;
				$config['max_height']           = 400;
				$config['file_name']           = 'foto-' . $username . date('ymd');

				$this->upload->initialize($config);

				if ($this->upload->do_upload('userfile')) {
					$userfile = $this->upload->data('file_name');
					$id = array('id_user' => $id_user);
					$DataUpdate = array(
						'username' => $username,
						'nama_user' => $nama_user,
						'level' => $level,
						'foto_user' => $userfile
					);
					$this->User_model->update_data('user', $DataUpdate, $id);

					redirect('auth/success');
				} else {
					$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible " role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
					</button>
					Maaf. Data User gagal diubah karena kesalahan pada unggah foto. Mohon gunakan file gambar yang sesuai.</div>');
					redirect('admin/user');
				}
			} elseif ($foto_user = 'userfile') {
				$id = array('id_user' => $id_user);
				$DataUpdate = array(
					'username' => $username,
					'nama_user' => $nama_user,
					'level' => $level
				);
				$this->User_model->update_data('user', $DataUpdate, $id);

				redirect('auth/success');
			} else {
				$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible " role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
				</button>
				Maaf. Data pegawai gagal diubah karena kesalahan pengisian form. Silakan cek kembali.</div>');
				redirect('admin/user');
			}
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