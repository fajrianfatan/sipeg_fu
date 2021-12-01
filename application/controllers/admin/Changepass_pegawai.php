<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Changepass_pegawai extends CI_Controller {
	
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
			'user_name' => $data->username,
			'level' => $data->level,
            'foto_user' => $data->foto_user,
            'pegawai' => $this->Pegawai_model->tampil_data()->result(),
            'judul' => 'Ganti Password Akun Pegawai',
            'judul2' => 'Data Pegawai',
            'judul3' => 'Ganti Password Akun Pegawai'
		);
        $this->load->view('admin/changepass_pegawai', $data);
	}

    public function gantiPassAksi()
    {
        $id_pegawai = $this->input->post('id_pegawai');
        $passBaru = $this->input->post('passBaru');
		$ulangPass = $this->input->post('ulangPass');
        if($passBaru == $ulangPass){
            $data = array('password' => md5($passBaru));
            $id = array('id_pegawai' => $id_pegawai);
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
        //}
    }
}