<!DOCTYPE html>
<html lang="en">
  <head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<!-- Meta, title, CSS, favicons, etc. -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title><?php echo $judul;?></title>

	<!-- Bootstrap -->
	<link href="<?php echo base_url();?>assets/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
	<!-- Font Awesome -->
	<link href="<?php echo base_url();?>assets/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
	<!-- iCheck -->
	<link href="<?php echo base_url();?>assets/vendors/iCheck/skins/flat/green.css" rel="stylesheet">
	<!-- bootstrap-wysiwyg -->
	<link href="<?php echo base_url();?>assets/vendors/google-code-prettify/bin/prettify.min.css" rel="stylesheet"><!-- Custom Theme Style -->
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
									<br />
                                    
									<?php echo form_open_multipart('admin/jabatan/AksiEdit')?>
									<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align">ID JABATAN
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="text" name="id_jabatan" class="form-control " value="<?php echo $jabatan->id_jabatan ?>"readonly>
											</div>
										</div>
										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align">Nama Pegawai<span class="required"> *</span></label>
											<div class="col-md-6 col-sm-6 ">
												<select class="form-control" name="id_pegawai" required="required" type="text"
												maxlength="60">
												<?php 
													foreach ($pegawai as $peg) : 
													if($peg->id_pegawai == $jabatan->id_pegawai){?>
														<option value="<?php echo $peg->id_pegawai ?>"><?php echo $peg->nama_pegawai; ?></option>
													<?php } ?>
													<?php endforeach; ?>
												</select>
											</div>
										</div>
										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align">Jabatan Pegawai <span class="required"> *</span></label>
											<div class="col-md-6 col-sm-6 ">
												<select class="form-control" name="jabatan" required="required" type="text">
													<option value="">-- Pilih Jabatan Pegawai --</option>
													<?php foreach($tbl_jabatan as $jbtn) : ?>
													<option value="<?php echo $jbtn->jabatan ?>" <?= $jbtn->jabatan == $jabatan->jabatan ? "selected" : null ?>><?php echo $jbtn->jabatan; ?></option>
													<?php endforeach; ?>
												</select>
											</div>
										</div>
										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align">TMT Berlaku SK Jabatan <span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input id="tmtjbtn" name="tmt_sk_jabatan" class="date-picker form-control" value="<?php echo $jabatan->tmt_sk_jabatan ?>" required="required" type="text" onfocus="this.type='date'" onmouseover="this.type='date'" onclick="this.type='date'" onblur="this.type='text'" onmouseout="timeFunctionLong(this)">
												<script>
													function timeFunctionLong(input) {
														setTimeout(function() {
															input.type = 'text';
														}, 60000);
													}
												</script>
											</div>
										</div>
										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align">Golongan atau Ruang <span class="required"> *</span></label>
											<div class="col-md-6 col-sm-6 ">
												<select class="form-control" name="gol_ruang" required="required" type="text">
													<option value="">-- Pilih Gol/Ruang --</option>
													<?php foreach($tbl_gol_ruang as $gol) : ?>
													<option value="<?php echo $gol->gol_ruang ?>"<?= $gol->gol_ruang == $jabatan->gol_ruang ? "selected" : null ?>><?php echo $gol->gol_ruang; ?></option>
													<?php endforeach; ?>
												</select>
											</div>
										</div>
										<div class="item form-group">
											<label for="email" class="col-form-label col-md-3 col-sm-3 label-align">Gaji Pokok Jabatan</label>
											<div class="col-md-6 col-sm-6 ">
												<input required="required" name="gaji_pokok_jabatan" class="form-control" 
												maxlength="32" type="text" value="<?php echo $jabatan->gaji_pokok_jabatan ?>" >
											</div>
										</div>
                                        <div class="item form-group">
											<label  class="col-form-label col-md-3 col-sm-3 label-align"> Lampiran SK Jabatan <span>*</span><br> File Scan PDF/Gambar</label>
											<div class="col-md-6 col-sm-6 ">
												<?php echo $jabatan->lampiran_sk_jabatan ?>
												<input  name="userfile" class="form-control" type="file" >
											</div>
										</div>		
										<div class="ln_solid"></div>
										<div class="item form-group">
											<div class="col-md-6 col-sm-6 offset-md-3">
												<a href="<?php echo base_url('admin/jabatan')?>"><button class="btn btn-primary" type="button">Cancel</button></a>
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

</body></html>
