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
                  <h2><?php echo $judul3;?> |<small><?php echo ucfirst($level);?></small></h2>
                  
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                <?php echo $this->session->flashdata('pesan')?>
                  <div class="bs-example" data-example-id="simple-jumbotron">
                    <div class="jumbotron">
                      <h1>Selamat Datang di Sispeg Ushuluddin!</h1>
                      <p>Selamat datang <strong><?php echo ucfirst($username);?></strong>! Disini anda login sebagai <strong><?php echo ucfirst($level);?></strong></p>
                      <p>Website ini menyediakan fitur pengelolaan data kepegawaian berupa :
                        <br>1. Data Pegawai
                        <br>2. Riwayat Pekerjaan dan Penghargaan atau Tanda Jasa
                      </p>
                    </div>
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
    <!-- Custom Theme Scripts -->
    <script src="<?php echo base_url()?>assets/build/js/custom.min.js"></script>
    
  </body>
</html>
