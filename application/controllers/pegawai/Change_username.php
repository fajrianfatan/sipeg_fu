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

        if($unameBaru == $ulangUname){
            $data = array('username' => $unameBaru);
            $id = $this->Pegawai_model->ambil_data($this->session->userdata['username']);
            $id = array('id_pegawai' => $id->id_pegawai);

            $this->Pegawai_model->update_data('pegawai',$data,$id);
            
            redirect('auth/uchanged');
        }elseif($unameBaru != $ulangUname){
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible " role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
            </button>
            Maaf. Username gagal diubah karena isi username baru dan konfirmasi username baru tidak cocok!.</div>');
            $this->index();
        }else{
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible " role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
            </button>
            Maaf. Username gagal diubah!.</div>');
            $this->index();
        }
    }
}