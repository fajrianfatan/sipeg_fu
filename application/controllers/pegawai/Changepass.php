<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Changepass extends CI_Controller {
	
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
            'judul' => 'Ganti Password Akun',
            'judul2' => 'Profil Saya',
            'judul3' => 'Ganti Password Akun',
			
		);
        $this->load->view('pegawai/changepass', $data);
		
	}

    public function gantiPassAksi()
    {
        $passBaru = $this->input->post('passBaru');
		$ulangPass = $this->input->post('ulangPass');

        if($passBaru == $ulangPass){
            $data = array('password' => md5($passBaru));
            $id = $this->Pegawai_model->ambil_data($this->session->userdata['username']);
            $id = array('username' => $id->username);

            $this->Pegawai_model->update_data('pegawai',$data,$id);
            
            redirect('auth/changed');
        }elseif($passBaru != $ulangPass){
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible " role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
            </button>
            Maaf. Password gagal diubah karena isi password baru dan konfirmasi password baru tidak cocok!.</div>');
            $this->index();
        }else{
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible " role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
            </button>
            Maaf. Password gagal diubah!.</div>');
            $this->index();
        }
    }
}