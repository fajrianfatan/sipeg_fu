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
        <div>
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
                    
                    <a href="<?php echo base_url('admin/kepangkatan/input')?>"><button class="btn btn-sm btn-primary">Tambah SK Kepangkatan</button></a>
                    <table id="datatable-buttons" class="table table-striped table-bordered" style="width:100%">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Nama Pegawai</th>
                          <th>Jenis SK</th>
                          <th>Pangkat</th>
                          <th>Gol</th>
                          <th>No. SK</th>
                          <th>TGL SK</th>
                          <th>TMT SK</th>
                          <th>Gaji Pokok</th>
                          <th>PAK</th>
                          <th>Lampiran SK</th>
                          <th>Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $no = 1;
                        foreach ($kepangkatan as $pkt): ?>
                        <tr>
                          <td width="20px"><?php echo $no++ ?></td>
                          <td width="50%"><?php echo $pkt->nama_pegawai ?>, <?php echo $pkt->gelar_pegawai ?></td>
                          <td><?php echo $pkt->jenis_pegawai ?></td>
                          <td><?php echo $pkt->pangkat?></td>
                          <td><?php echo $pkt->gol_ruang ?></td>
                          <td><?php echo $pkt->no_sk_pangkat ?></td>
                          <td><?php echo $pkt->tgl_sk_pangkat ?></td>
                          <td><?php echo $pkt->tmt_sk_pangkat ?></td>
                          <td><?php echo $pkt->gaji_pokok_pangkat ?></td>
                          <td><?php echo $pkt->pak ?></td>
                          <td><?php echo $pkt->lampiran_sk_pangkat ?></td>
                          <td width="20px"><a href="<?php echo base_url('admin/kepangkatan/edit')?>/<?php echo $pkt->id_kepangkatan ?>"><div class="btn btn-sm btn-primary" >Ubah</div></a>
                          <a href="<?php echo base_url("./assets/directory/sk kepangkatan/$pkt->lampiran_sk_pangkat") ?>"><div class="btn btn-sm btn-success" >Unduh</div></a>
                          <a href="<?php echo base_url('admin/kepangkatan/deleteKepangkatan')?>/<?php echo $pkt->id_kepangkatan ?>"><div class="btn btn-sm btn-danger" >Hapus</div></td>
                        <?php endforeach;?>
                      </tbody>
                    </table>
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
