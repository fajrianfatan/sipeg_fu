<!DOCTYPE html>
<html lang="en">

<head>
  <?php $this->load->view('tempelate/header'); ?>
  <!-- Bootstrap -->
  <link href="https://cdn.datatables.net/1.11.0/css/jquery.dataTables.min.css">
  <!-- <link href="https://cdn.datatables.net/buttons/2.0.0/css/buttons.dataTables.min.css"> -->

  <!-- Datatables -->

  <link href="<?php echo base_url() ?>assets/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
  <link href="<?php echo base_url() ?>assets/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
  <link href="<?php echo base_url() ?>assets/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
  <link href="<?php echo base_url() ?>assets/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
  <link href="<?php echo base_url() ?>assets/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">
</head>


</head>

<body class="nav-md">
  <div class="container body">
    <div class="main_container">
      <div>
        <?php $this->load->view('tempelate/sidebar'); ?>
      </div>
      <!-- /sidebar menu -->


    </div>
  </div>

  <!-- top navigation -->
  <div class="top_nav">
    <?php $this->load->view('tempelate/topnav'); ?>
  </div>
  <!-- /top navigation -->

  <!-- page content -->
  <div class="right_col" role="main">
    <div class="">
      <div class="page-title">
        <div class="title_left">
          <h3><?php echo $judul2; ?></h3>
        </div>
        

      </div>
      
      
      
      <div class="clearfix"></div>

      <div class="row">
        <div class="col-md-12 col-sm-12  ">
          <div class="x_panel">
            
            <div class="x_title">
              <h2><?php echo $judul3; ?> |<small><?php echo ucfirst($level); ?></small></h2>
              
              <div class="clearfix"></div>
            </div>
            <div class="x_content">
              <div class="row">
                <div class="col-sm-12">
                  <div class="card-box table-responsive">
                  <?php echo $this->session->flashdata('pesan')?>
                    <p class="text-muted font-13 m-b-30">
                      Catatan : Pastikan data pegawai terkelola dengan baik. Apabila anda menghapus data pegawai, maka seluruh data lainnya yang berkaitan dengan pegawai yang bersangkutan akan terhapus.
                    </p>
                    <a href="<?php echo base_url('admin/pegawai/input') ?>"><button class="btn btn-sm btn-primary">Tambah Pegawai</button></a>
                    <table id="datatable-buttons" class="table table-striped table-bordered datatable-buttons" style="width:100%">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Foto</th>
                          <th>NIP</th>
                          <th>Nama Pegawai</th>
                          <th>Jurusan/Prodi</th>
                          <th>Pangkat</th>
                          <th>Gol</th>
                          <th>Jabatan</th>
                          <th>Username</th>
                          <th>Agama</th>
                          <th>Jenis Kelamin</th>
                          <th>Pendidikan</th>
                          <th>Status Pegawai</th>
                          <th>Alamat Lengkap</th>
                          <th>Aksi</th>
                        </tr>
                      </thead>


                      <tbody>
                        <?php
                        $no = 1;
                        foreach ($pegawai as $peg) : ?>
                          <tr>
                            <td><?php echo $no++ ?></td>
                            <td width="5%">
                              <img width="100%" src="<?php echo base_url('assets/directory/foto pegawai/' . $peg->foto_pegawai); ?>">
                            </td>
                            <td><?php echo $peg->nip ?></td>
                            <td width="100%"><?php echo $peg->nama_pegawai ?>, <?php echo $peg->gelar_pegawai ?></td>
                            <td><?php echo $peg->jurusan ?></td>
                            <td><?php echo $peg->pangkat ?></td>
                            <td><?php echo $peg->gol_ruang ?></td>
                            <td><?php echo $peg->jabatan ?></td>
                            <td><?php echo $peg->username ?></td>
                            <td><?php echo $peg->agama ?></td>
                            <td><?php echo $peg->jenis_kelamin ?></td>
                            <td><?php echo $peg->pendidikan ?></td>
                            <td><?php echo $peg->status_pegawai ?></td>
                            <td><?php echo $peg->alamat ?> <?php echo $peg->kelurahan ?>, <?php echo $peg->kecamatan ?>, <?php echo $peg->kota ?></td>
                            <td>
                              <a href="<?php echo base_url('admin/pegawai/edit') ?>/<?php echo $peg->id_pegawai ?>"><div class="btn btn-sm btn-primary">Ubah</div></a>
                              <a href="<?php echo base_url('admin/pegawai/deletePegawai') ?>/<?php echo $peg->id_pegawai ?>"><div class="btn btn-sm btn-danger">Hapus</div></a>
                            </td>
                          </tr>
                        <?php endforeach; ?>

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

        <?php $this->load->view('tempelate/footer'); ?>
      </footer>
      <!-- /footer content -->
    </div>
  </div>
    <!-- jQuery -->
    <script src="<?php echo base_url() ?>assets/vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="<?php echo base_url() ?>assets/vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- FastClick -->
    <script src="<?php echo base_url() ?>assets/vendors/fastclick/lib/fastclick.js"></script>
    <!-- iCheck -->
    <script src="<?php echo base_url() ?>assets/vendors/iCheck/icheck.min.js"></script>
    <!-- Datatables -->
    <script src="<?php echo base_url() ?>assets/vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url() ?>assets/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="<?php echo base_url() ?>assets/vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="<?php echo base_url() ?>assets/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="<?php echo base_url() ?>assets/vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="<?php echo base_url() ?>assets/vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="<?php echo base_url() ?>assets/vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="<?php echo base_url() ?>assets/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="<?php echo base_url() ?>assets/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="<?php echo base_url() ?>assets/vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="<?php echo base_url() ?>assets/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="<?php echo base_url() ?>assets/vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
    <script src="<?php echo base_url() ?>assets/vendors/jszip/dist/jszip.min.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="<?php echo base_url() ?>assets/build/js/custom.min.js"></script>

    // <script>
    //   $(document).ready(function() {
    //     $('#datatable-buttons').DataTable();
    //   });
    // </script>
</body>

</html>