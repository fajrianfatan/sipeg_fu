<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_controller
{
	
	function __construct()
	{
	parent::__construct();	 
	$this->load->model('Login_model');
	
	}

  public function index()
  {
    // $this->session->set_flashdata('pesan', '<div class="alert alert-warning alert-dismissible " role="alert">
		// 	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
		// 	</button>
		// 	Silahkan login terlebih dahulu untuk masuk.</div>');
   	if(isset($_POST['login'])){

      $username=autentikasi($this->input->post('username'));
      $password=autentikasi($this->input->post('password'));

     
      //cek data login
      $admin  = $this->Login_model->admin($username,md5($password));
      $pegawai= $this->Login_model->pegawai($username,md5($password));

      if($admin->num_rows() > 0 ){
        $DataAdmin=$admin->row_array();
        $sessionAdmin = array(
            'admin'    => TRUE,

            'username' => $DataAdmin['username'],
            'password' => $DataAdmin['password'],

            'level'    => $DataAdmin['level'] );        
        $this->session->set_userdata($sessionAdmin);
          if($this->session->userdata('level') == "admin")
          {
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible " role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
          </button>
          Login Berhasil!.</div>');
            redirect(site_url('admin/dashboard'));
          }
      }elseif($pegawai->num_rows() > 0){
          $DataPegawai=$pegawai->row_array();
          $sessionPegawai = array(
              'pegawai'    => TRUE,
              'username'  => $DataPegawai['username'],
              'password'  => $DataPegawai['password'],
              'status_pegawai'  => $DataPegawai['status_pegawai'],
              'level'     => 'pegawai',
          );
                 
          $this->session->set_userdata($sessionPegawai);
          if($this->session->userdata('status_pegawai') == "aktif")
          {
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible " role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
          </button>
          Login Berhasil!.</div>');
            redirect(site_url('pegawai/home'));
          }else{
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible " role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
          </button>
          Maaf. Akun pegawai yang anda gunakan tidak aktif! Silakan hubungi admin.</div>');
          redirect(base_url('auth'));
          }
      }else{
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible " role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
        </button>
        Maaf. Username dan password yang anda masukkan salah!.</div>');
        redirect(base_url('auth'));
      }
    }else{ 
      $data = array(
                  'judul' =>'Halaman Login Sipeg Ushuluddin');
      $this->load->view('login',$data);
    }
  }

  public function changed()
  {
    $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible " role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
    </button>
    Password berhasil diubah! Silakan Login kembali dengan password baru anda.</div>');
    $this->index();
    // redirect('auth');
    $this->session->sess_destroy();
  }

  public function uchanged()
  {
    $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible " role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
    </button>
    Username berhasil diubah! Silakan Login kembali dengan username baru anda.</div>');
    $this->index();
    // redirect('auth');
    $this->session->sess_destroy();
  }

  public function success()
  {
    $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible " role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
			</button>
			Data user berhasil diubah. Silakan login kembali</div>');
    $this->index();
    // redirect('auth');
    $this->session->sess_destroy();
  }

  public function kicked()
  {
    $this->session->set_flashdata('pesan', '<div class="alert alert-warning alert-dismissible " role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
			</button>
			Silahkan login terlebih dahulu untuk masuk.</div>');
    $this->index();
    // redirect('auth');
    $this->session->sess_destroy();
  }

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('auth');
	}

}
