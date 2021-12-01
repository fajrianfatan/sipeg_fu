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
        if($passBaru == $ulangPass){
            $id = array('id_user'=>$id_user);
            $data = $data = array('password' => md5($passBaru));
            $this->User_model->update_data('user',$data,$id);
            
            redirect('auth/changed');
        }elseif($passBaru != $ulangPass){
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible " role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
            </button>
            Maaf. Password gagal diubah karena isi password baru dan konfirmasi password baru tidak cocok!.</div>');
            //die;
            $this->index();
        }else{
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible " role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
            </button>
            Maaf. Password gagal diubah!.</div>');
            $this->index();
            //die;
        }
        //}
    }
}