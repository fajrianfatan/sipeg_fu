<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Change_username extends CI_Controller {
	
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
			'username' => $data->username,
            'foto_pegawai' => $data->foto_pegawai,
			'level' => 'pegawai',
            'judul' => 'Ganti Username Akun',
            'judul2' => 'Profil Saya',
            'judul3' => 'Ganti Username Akun',
			
		);
        $this->load->view('pegawai/change_username', $data);
		
	}

    public function gantiUnameAksi()
    {
        $unameBaru = $this->input->post('unameBaru');
		$ulangUname = $this->input->post('ulangUname');

        $this->form_validation->set_rules('unameBaru', 'Nama Pengguna', 'required|min_length[8]|max_length[16]|trim|xss_clean|matches[ulangUname]|is_unique[user.nama_user]'
			,array(
				'required'      => '%s wajib diisi.',
				'min_length'      => '%s harus terdiri dari minimal 8 karakter.',
				'max_length'      => '%s harus terdiri dari maksimal 16 karakter.',
				'is_unique'     => '%s telah digunakan.',
                'matches'     => '%s harus sama dengan Konfirmasi Username Baru.'
		));
		$this->form_validation->set_rules('ulangUname', 'Username', 'required|min_length[8]|max_length[16]|trim|xss_clean|matches[unameBaru]|is_unique[user.username]'
			,array(
				'required'      => '%s wajib diisi.',
				'min_length'      => '%s harus terdiri dari minimal 8 karakter.',
				'max_length'      => '%s harus terdiri dari maksimal 16 karakter.',
				'is_unique'     => '%s telah digunakan.',
                'matches'     => '%s harus sama dengan Username Baru.'
		));
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible " role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
			</button>
			Gagal. Terdapat kesalahan saat mengganti username.</div>');
        if ($this->form_validation->run() == FALSE)
		{
			$this->index();
			return;
        }else{
            $data = array('username' => $unameBaru);
            $id = $this->Pegawai_model->ambil_data($this->session->userdata['username']);
            $id = array('id_pegawai' => $id->id_pegawai);

            $this->Pegawai_model->update_data('pegawai',$data,$id);
            
            redirect('auth/uchanged');
        }
    }
}