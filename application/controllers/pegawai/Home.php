<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	
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
			'judul' => 'Halaman Utama',
            'judul2' => 'Beranda',
            'judul3' => 'Halaman Utama'
		);
        $this->load->view('pegawai/home', $data);
		

	}
}
