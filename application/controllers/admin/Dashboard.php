<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	
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
			'username' => $data->username,
			'level' => $data->level,
			'foto_user' => $data->foto_user,
			'judul' => 'Halaman Dashboard',
            'judul2' => 'Beranda',
            'judul3' => 'Halaman Dashboard'
		);
        $this->load->view('admin/dashboard', $data);
		

	}
}
