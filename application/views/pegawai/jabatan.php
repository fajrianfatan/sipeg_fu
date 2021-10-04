<!DOCTYPE html>
<html lang="en">
  <head>
  <?php $this->load->view('tempelate/header');?>
  <link href="cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    
    <!-- Datatables -->
    
    <link href="<?php echo base_url()?>assets/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url()?>assets/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url()?>assets/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url()?>assets/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url()?>assets/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">

    
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        
      <?php $this->load->view('tempelate/sidebar');?>
            </div>
            <!-- /sidebar menu -->

            
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
        <?php $this->load->view('tempelate/topnav');?>
          </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3><?php echo $judul2;?></h3>
              </div>

              
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12  ">
              <div class="x_panel">
                  <div class="x_title">
                    <h2><?php echo $judul3;?> |<small><?php echo ucfirst($level);?></small></h2>
                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                      <div class="row">
                          <div class="col-sm-12">
                            <div class="card-box table-responsive">
                            <?php echo $this->session->flashdata('pesan')?>
                    
                    <a href="<?php echo base_url('pegawai/jabatan/input')?>"><button class="btn btn-sm btn-primary">Tambah SK Jabatan</button></a>
                    <table id="datatable-buttons" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                          <th>No</th>
                          <th>Nama Pegawai</th>
                          <th>Jabatan</th>
                          <th>TMT SK</th>
                          <th>Gol/Ruang</th>
                          <th>Gaji Pokok</th>
                          <th>Lampiran SK</th>
                          <th>Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $no = 1;
                        foreach ($jabatan as $jbtn): ?>
                        <tr>
                          <td width="5%"><?php echo $no++ ?></td>
                          <td width="100%"><?php echo $jbtn->nama_pegawai ?>, <?php echo $jbtn->gelar_pegawai ?></td>
                          <td><?php echo $jbtn->jabatan ?></td>
                          <td><?php echo $jbtn->tmt_sk_jabatan?></td>
                          <td><?php echo $jbtn->gol_ruang ?></td>
                          <td><?php echo $jbtn->gaji_pokok_jabatan ?></td>
                          <td><?php echo $jbtn->lampiran_sk_jabatan ?></td>
                          <td><a href="<?php echo base_url('pegawai/jabatan/edit')?>/<?php echo $jbtn->id_jabatan ?>"><div class="btn btn-sm btn-primary" >Ubah</div></a>
                          <a href="<?php echo base_url("./assets/directory/sk jabatan/$jbtn->lampiran_sk_jabatan") ?>"><div class="btn btn-sm btn-success" >Unduh</div></a>
                          <a href="<?php echo base_url('pegawai/jabatan/deleteJabatan')?>/<?php echo $jbtn->id_jabatan ?>"><div class="btn btn-sm btn-danger" >Hapus</div></td>
                        </tr>
                        <?php endforeach;?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          
          <?php $this->load->view('tempelate/footer');?>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src="<?php echo base_url()?>assets/vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
   <script src="<?php echo base_url()?>assets/vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- FastClick -->
    <script src="<?php echo base_url()?>assets/vendors/fastclick/lib/fastclick.js"></script>
    <!-- iCheck -->
    <script src="<?php echo base_url()?>assets/vendors/iCheck/icheck.min.js"></script>
    <!-- Datatables -->
    <script src="<?php echo base_url()?>assets/vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url()?>assets/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="<?php echo base_url()?>assets/vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="<?php echo base_url()?>assets/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="<?php echo base_url()?>assets/vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="<?php echo base_url()?>assets/vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="<?php echo base_url()?>assets/vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="<?php echo base_url()?>assets/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="<?php echo base_url()?>assets/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="<?php echo base_url()?>assets/vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="<?php echo base_url()?>assets/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="<?php echo base_url()?>assets/vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
    <script src="<?php echo base_url()?>assets/vendors/jszip/dist/jszip.min.js"></script>
    <!-- Custom Theme Scripts -->
    <script src="<?php echo base_url()?>assets/build/js/custom.min.js"></script>
  </body>
</html>
