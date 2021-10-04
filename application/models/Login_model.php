<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Login_model extends CI_Model{
    
    function __construct()
    {
    parent::__construct();
    }
        
    public function admin($username='',$password='')
    {
    return $this->db->query("SELECT * from user where username='$username' AND password='$password' limit 1");
    }

    public function pegawai($username='',$password='')
    {
    return $this->db->query("SELECT * from pegawai where username='$username' AND password='$password' limit 1");
    }
  
}
?>