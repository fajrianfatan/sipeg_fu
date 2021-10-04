<!DOCTYPE html>
<html lang="en">
  <head>
  <?php $this->load->view('tempelate/header');?>
  </head>
  
  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        
      <?php $this->load->view('tempelate/sidebar');?>
            </div>
            <!-- /sidebar menu -->

            
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
                  <h2><?php echo $judul3;?><small><?php echo ucfirst($level);?></small></h2>
                  
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <?php echo $this->session->flashdata('pesan')?>
                    <div class="col-md-3 col-sm-3  profile_left">
                      <div class="profile_img">
                        <div id="crop-avatar">
                          <!-- Current avatar -->
                          <img width="240px"class="img-responsive avatar-view" src="<?php echo base_url('assets/directory/foto pegawai/'.$foto)?>" alt="Avatar" title="Change the avatar">
                        </div>
                      </div>
                      <br>

                      <a href="<?php echo base_url('pegawai/profil/edit')?>/<?php echo $id_pegawai ?>"class="btn btn-success"><i class="fa fa-edit m-right-xs"></i>Ubah Profil</a>
                      <br />

                    </div>
                    <div class="col-md-6">
                        <div class="profile-head">
                        <h3><?php echo ucfirst($nama);?>, <?php echo ucfirst($gelar);?></h3>
                                    <h6>
                                    NIP : <?php echo ucfirst($nip);?>
                                    </h6>
                                    <h6>
                                    NIDN : <?php echo ucfirst($nidn);?>
                                    </h6>
                                    <p class="proile-rating">Jenis Pegawai : <span><?php echo ucfirst($jenis_pegawai);?></span></p>
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Profil Singkat</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Lebih Lanjut</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- <div class="col-md-8"> -->
                    <div class="tab-content profile-tab" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <!-- <div class="col-md-6 col-sm-6  "> -->
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Profil Singkat</h2>
                    <!-- <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="#">Settings 1</a>
                            <a class="dropdown-item" href="#">Settings 2</a>
                          </div>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul> -->
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Kategori</th>
                          <th>Biodata</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <th scope="row">1</th>
                          <td>Username Akun</td>
                          <td><?php echo ucfirst($username);?></td>
                        </tr>
                        <tr>
                          <th scope="row">2</th>
                          <td>Nama Lengkap</td>
                          <td><?php echo ucfirst($nama);?></td>
                        </tr>
                        <tr>
                          <th scope="row">3</th>
                          <td>Gelar</td>
                          <td><?php echo ucfirst($gelar);?></td>
                        </tr>
                        <tr>
                          <th scope="row">4</th>
                          <td>Jurusan/Prodi</td>
                          <td><?php echo ucfirst($jurusan);?></td>
                        </tr>
                        <tr>
                          <th scope="row">5</th>
                          <td>Pangkat</td>
                          <td><?php echo ucfirst($pangkat);?></td>
                        </tr>
                        <tr>
                          <th scope="row">6</th>
                          <td>Golongan dan Ruang</td>
                          <td><?php echo ucfirst($gol_ruang);?></td>
                        </tr>
                        <tr>
                          <th scope="row">7</th>
                          <td>Jabatan</td>
                          <td><?php echo ucfirst($jabatan);?></td>
                        </tr>
                        <tr>
                          <th scope="row">8</th>
                          <td>NIDN</td>
                          <td><?php echo ucfirst($nidn);?></td>
                        </tr>
                        <tr>
                          <th scope="row">9</th>
                          <td>Alamat Lengkap</td>
                          <td><?php echo ucfirst($alamat);?> <?php echo ucfirst($kelurahan);?> 
                          <?php echo ucfirst($kecamatan);?> <?php echo ucfirst($kota);?> <?php echo ucfirst($provinsi);?></td>
                        </tr>
                      </tbody>
                    </table>

                  </div>
                </div>
              </div>
            <div class="tab-pane fade" id="profile" role="tabpanel" aria-h4ledby="profile-tab">
            <br>
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Lebih Lanjut</h2>
                    <!-- <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="#">Settings 1</a>
                            <a class="dropdown-item" href="#">Settings 2</a>
                          </div>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul> -->
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Kategori</th>
                          <th>Biodata</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <th scope="row">1</th>
                          <td>Jenis Kelamin</td>
                          <td><?php echo ucfirst($jenis_kelamin);?></td>
                        </tr>
                        <tr>
                          <th scope="row">2</th>
                          <td>Tempat/Tanggal Lahir</td>
                          <td><?php echo ucfirst($tempat_lahir);?>, <?php echo ucfirst($tanggal_lahir);?></td>
                        </tr>
                        <tr>
                          <th scope="row">3</th>
                          <td>Agama</td>
                          <td><?php echo ucfirst($agama);?></td>
                        </tr>
                        <tr>
                          <th scope="row">4</th>
                          <td>Pendidikan Terakhir</td>
                          <td><?php echo ucfirst($pendidikan);?></td>
                        </tr>
                        <tr>
                          <th scope="row">5</th>
                          <td>Status Menikah</td>
                          <td><?php echo ucfirst($status_nikah);?></td>
                        </tr>
                        <tr>
                          <th scope="row">6</th>
                          <td>Nomor HP/Telepon</td>
                          <td><?php echo ucfirst($telp);?></td>
                        </tr>
                        <tr>
                          <th scope="row">7</th>
                          <td>Status Pegawai</td>
                          <td><?php echo ucfirst($status_pegawai);?></td>
                        </tr>
                        <tr>
                          <th scope="row">8</th>
                          <td>Satuan Kerja</td>
                          <td><?php echo ucfirst($satuan_kerja);?></td>
                        </tr>
                        <tr>
                          <th scope="row">9</th>
                          <td>Satuan Organisasi</td>
                          <td><?php echo ucfirst($satuan_org);?></td>
                        </tr>
                        <tr>
                          <th scope="row">10</th>
                          <td>KGB Pegawai</td>
                          <td><?php echo ucfirst($kgb_pegawai);?></td>
                        </tr>
                        <tr>
                          <th scope="row">11</th>
                          <td>Nomor Kartu Pegawai</td>
                          <td><?php echo ucfirst($karpeg);?></td>
                        </tr>
                        <tr>
                          <th scope="row">12</th>
                          <td>Nomor karis</td>
                          <td><?php echo ucfirst($karis);?></td>
                        </tr>
                        <tr>
                          <th scope="row">13</th>
                          <td>Nomor KPE</td>
                          <td><?php echo ucfirst($kpe);?></td>
                        </tr>
                        <tr>
                          <th scope="row">14</th>
                          <td>Nomor Taspen</td>
                          <td><?php echo ucfirst($taspen);?></td>
                        </tr>
                        <tr>
                          <th scope="row">15</th>
                          <td>NPWP</td>
                          <td><?php echo ucfirst($npwp);?></td>
                        </tr>
                      </tbody>
                    </table>

                  </div>
                </div>
              </div>
                            </div>
                        </div>
                    </div>
                  </div>
              </div>
              <div class="x_content">

              
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
    <!-- Custom Theme Scripts -->
    <script src="<?php echo base_url()?>assets/build/js/custom.min.js"></script>
    
  </body>
</html>
