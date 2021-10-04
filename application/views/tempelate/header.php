<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <?php
        //error_reporting(0);
        if($this->session->userdata('level') =="admin"){
        $id  = $this->session->userdata('id_user');
        $data= $this->db->get_where('user',array('id_user'=>$id))->row_array();
        }elseif($this->session->userdata('level') == "user"){
        $id  = $this->session->userdata('id_user');
        $data= $this->db->get_where('user',array('id_user'=>$id))->row_array();
        }elseif($this->session->userdata('level') == "user"){
        $id  = $this->session->userdata('id_pegawai');
        $data= $this->db->get_where('pegawai',array('id_pegawai'=>$id))->row_array();
        }
        ?>
    <?php if($this->session->userdata('level') == "admin"){ ?>
        <title><?php echo $judul?></title>
    <?php }elseif($this->session->userdata('level') == "user"){ ?>
        <title><?php echo $judul?></title>
    <?php }elseif($this->session->userdata('level') == "pegawai"){ ?>
        <title><?php echo $judul?></title>
    <?php } ?>

    <!-- Bootstrap -->
    <link href="<?php echo base_url()?>assets/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?php echo base_url()?>assets/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <!-- <link href="<?php echo base_url()?>assets/vendors/nprogress/nprogress.css" rel="stylesheet"> -->

    <!-- Custom Theme Style -->
    <link href="<?php echo base_url()?>assets/build/css/custom.min.css" rel="stylesheet">
    