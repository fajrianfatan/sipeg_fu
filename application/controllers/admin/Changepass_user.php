<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Changepass_user extends CI_Controller {
	
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
			'user_name' => $data->username,
			'level' => $data->level,
            'foto_user' => $data->foto_user,
            'judul' => 'Ganti Password Akun User',
            'judul2' => 'Data User/Hak Akses',
            'judul3' => 'Ganti Password Akun User',
			
		);
        $this->load->view('admin/changepass_user', $data);
		
	}

    public function gantiPassAksi()
    {
        $id_user = $this->input->post('id_user');
        $passBaru = $this->input->post('passBaru');
		$ulangPass = $this->input->post('ulangPass');
        $this->form_validation->set_rules('passBaru', 'Password', 'required|min_length[8]|max_length[16]|trim|xss_clean|matches[ulangPass]'
			,array(
				'required'      => '%s wajib diisi.',
				'min_length'      => '%s harus terdiri dari minimal 8 karakter.',
				'max_length'      => '%s harus terdiri dari maksimal 16 karakter.',
				'matches'     => '%s harus sama dengan konfirmasi password.'
		));
		$this->form_validation->set_rules('ulangPass', 'Konfirmasi password', 'required|min_length[8]|max_length[16]|trim|xss_clean|matches[passBaru]'
			,array(
				'required'      => '%s wajib diisi.',
				'min_length'      => '%s harus terdiri dari minimal 8 karakter.',
				'max_length'      => '%s harus terdiri dari maksimal 16 karakter.',
				'matches'     => '%s harus sama dengan password baru.'
		));
		$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible " role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
			</button>
			Gagal. Terdapat kesalahan saat mengganti password.</div>');
		if ($this->form_validation->run() == FALSE)
		{
			
			$this->index();
			return;
        }else{
            $id = array('id_user'=>$id_user);
            $data = $data = array('password' => md5($passBaru));
            $this->User_model->update_data('user',$data,$id);
            
            redirect('auth/changed');
        }
        //}
    }
}