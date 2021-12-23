<!DOCTYPE html>
<html lang="en">
  <head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<!-- Meta, title, CSS, favicons, etc. -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title><?php echo $judul;?></title>
	<!-- Select2 -->
	<link href="<?php echo base_url();?>assets/js/select2/dist/css/select2.min.css" rel="stylesheet" />
	<!-- Bootstrap -->
	<link href="<?php echo base_url();?>assets/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
	<!-- Font Awesome -->
	<link href="<?php echo base_url();?>assets/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
	<!-- iCheck -->
	<link href="<?php echo base_url();?>assets/vendors/iCheck/skins/flat/green.css" rel="stylesheet">
	<!-- bootstrap-wysiwyg -->
	<link href="<?php echo base_url();?>assets/vendors/google-code-prettify/bin/prettify.min.css" rel="stylesheet">
	<!-- Custom Theme Style -->
	<link href="<?php echo base_url();?>assets/build/css/custom.min.css" rel="stylesheet">
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
						<div class="col-md-12 col-sm-12 ">
							<div class="x_panel">
								<div class="x_title">
									<h2><?php echo $judul3;?></h2>
									
									<div class="clearfix"></div>
								</div>
								<div class="x_content">
								<p class="text-muted font-13 m-b-30">
								Masukkan data lampiran ijazah pendidikan terakhir pegawai. Untuk menghindari error/gagal saat menambah dan mengunggah data lampiran baru, silakan unggah file ijazah dengan ukuran maksimal 2 MB dan format PDF.
								</p>
									<br />
									<?php echo form_open_multipart('pegawai/pendidikan/AksiEdit')?>
                                        <div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align">ID PENDIDIKAN
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="text" name="id_pendidikan" class="form-control " value="<?php echo $pendidikan->id_pendidikan ?>"readonly>
											</div>
										</div>
										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align">Nama Pegawai</label>
											<div class="col-md-6 col-sm-6 ">
												<select class="form-control" name="id_pegawai" type="text">
												<?php 
													foreach ($pegawai as $peg) : 
													if($peg->id_pegawai == $pendidikan->id_pegawai){?>
														<option value="<?php echo $peg->id_pegawai ?>"><?php echo $peg->nama_pegawai; ?></option>
													<?php } ?>
													<?php endforeach; ?>
												</select>
											</div>
										</div>
										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align">Pendidikan Terakhir </label>
											<div class="col-md-6 col-sm-6 ">
												<select class="form-control" name="pend_terakhir" type="text">
													<option value="">-- Pilih Pendidikan Terakhir --</option>
													<?php foreach($tbl_pendidikan as $pend) : ?>
													<option value="<?php echo $pend->pendidikan ?>" <?= $pend->pendidikan == $pendidikan->pend_terakhir ? "selected" : null ?>><?php echo $pend->pendidikan; ?></option>
													<?php endforeach; ?>
												</select>
											</div>
										</div>
										<div class="item form-group">
											<label for="email" class="col-form-label col-md-3 col-sm-3 label-align">Tahun<span class="required">*</span></label>
											<div class="col-md-6 col-sm-6 ">
												<input name="tahun_pend" class="form-control" 
												maxlength="10" type="text" value="<?php echo $pendidikan->tahun_pend ?>">
											</div>
										</div>
                                        <div class="item form-group">
											<label  class="col-form-label col-md-3 col-sm-3 label-align">Lampiran Ijazah<br>Pendidikan Terakhir <span>*</span><br>(File Scan PDF/Gambar)</label>
											<div class="col-md-6 col-sm-6 ">
												<?php echo $pendidikan->lampiran_pend ?>
												<input  name="userfile" class="form-control" type="file" >
											</div>
										</div>
										<div class="ln_solid"></div>
										<div class="item form-group">
											<div class="col-md-6 col-sm-6 offset-md-3">
												<a href="<?php echo base_url('pegawai/pendidikan')?>"><button class="btn btn-primary" type="button">Cancel</button></a>
												<button class="btn btn-primary" type="reset">Reset</button>
												<button type="submit" class="btn btn-success">Submit</button>
											</div>
										</div>
									<?php echo form_close(); ?>
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
				<div class="pull-right">
					Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
				</div>
				<div class="clearfix"></div>
			</footer>
			<!-- /footer content -->
		</div>
	</div>

	<!-- jQuery -->
	<script src="<?php echo base_url();?>assets/vendors/jquery/dist/jquery.min.js"></script>
	<!-- Bootstrap -->
	<script src="<?php echo base_url();?>assets/vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
	<!-- FastClick -->
	<script src="<?php echo base_url();?>assets/vendors/fastclick/lib/fastclick.js"></script>

	<!-- iCheck -->
	<script src="<?php echo base_url();?>assets/vendors/iCheck/icheck.min.js"></script>
	<!-- bootstrap-wysiwyg -->
	<script src="<?php echo base_url();?>assets/vendors/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js"></script>
	<script src="<?php echo base_url();?>assets/vendors/jquery.hotkeys/jquery.hotkeys.js"></script>
	<script src="<?php echo base_url();?>assets/vendors/google-code-prettify/src/prettify.js"></script>
	<!-- jQuery Tags Input -->
	<script src="<?php echo base_url();?>assets/vendors/jquery.tagsinput/src/jquery.tagsinput.js"></script>
	<!-- Autosize -->
	<script src="<?php echo base_url();?>assets/vendors/autosize/dist/autosize.min.js"></script>
	<!-- jQuery autocomplete -->
	<script src="<?php echo base_url();?>assets/vendors/devbridge-autocomplete/dist/jquery.autocomplete.min.js"></script>
	<!-- Custom Theme Scripts -->
	<script src="<?php echo base_url();?>assets/build/js/custom.min.js"></script>
	<!-- Select2 Scripts -->
	<script src="<?php echo base_url();?>assets/js/select2/dist/js/select2.min.js"></script>
	<script type="text/javascript">
	// In your Javascript (external .js resource or <script> tag)
	function formatSearch(item) {
        var selectionText = item.text.split("|");
        var $returnString = $('<span>' + selectionText[0] + '</br><b>' + selectionText[1] + '</b></br>' + selectionText[2] +'</span>');
        return $returnString;
    };
    function formatSelected(item) {
        var selectionText = item.text.split("|");
        var $returnString = $('<span>' + selectionText[0].substring(0, 21) +'</span>');
        return $returnString;
    };
    $('.js-example-basic-single').select2({
        templateResult: formatSearch,
        templateSelection: formatSelected
    });
	</script>

</body></html>
