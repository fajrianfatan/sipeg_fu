<?php
  //error_reporting(0);
  if($this->session->userdata('level') =="admin"){
  $id  = $this->session->userdata('id_user');
  $data= $this->db->get_where('user',array('id_user'=>$id))->row_array();
  }
?>
<?php if($this->session->userdata('level') == "admin"){ ?>
    <div class="nav_menu">
<div class="nav toggle">
    <a id="menu_toggle"><i class="fa fa-bars"></i></a>
</div>
<nav class="nav navbar-nav">
<ul class=" navbar-right">
    <li class="nav-item dropdown open" style="padding-left: 15px;">
    <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
        <img src="<?php echo base_url('assets/directory/foto user/'.$foto_user)?>" alt=""><strong><?php echo ucfirst($user_name); ?></strong>
    </a>
    <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
        <a class="dropdown-item"  href="javascript:;"> Profil</a>
        
    <a class="dropdown-item"  href="javascript:;">Tentang</a>
        <a class="dropdown-item"  href="<?php echo base_url('auth/logout') ?>"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
    </div>
</ul>
</nav>
</div>
<?php }elseif($this->session->userdata('level') == "pegawai"){ ?>
<div class="nav_menu">
<div class="nav toggle">
    <a id="menu_toggle"><i class="fa fa-bars"></i></a>
</div>
<nav class="nav navbar-nav">
<ul class=" navbar-right">
    <li class="nav-item dropdown open" style="padding-left: 15px;">
    <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
        <img src="<?php echo base_url('assets/directory/foto pegawai/'.$foto_pegawai)?>" alt=""><strong><?php echo ucfirst($username); ?></strong>
    </a>
    <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
        <a class="dropdown-item"  href="<?php echo base_url('pegawai/profil') ?>"> Profil</a>
        
    <a class="dropdown-item"  href="javascript:;">Tentang</a>
        <a class="dropdown-item"  href="<?php echo base_url('auth/logout') ?>"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
    </div>
</ul>
</nav>
</div>
<?php } ?>