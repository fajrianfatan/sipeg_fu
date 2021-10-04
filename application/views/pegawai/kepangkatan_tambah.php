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
							<h3>Riwayat Pekerjaan dan Penghargaan atau Tanda Jasa</h3>
						</div>
	                </div>
					<div class="clearfix"></div>
					<div class="row">
						<div class="col-md-12 col-sm-12 ">
							<div class="x_panel">
								<div class="x_title">
									<h2>Form Tambah Lampiran SK Kepangkatan</h2>
									
									<div class="clearfix"></div>
								</div>
								<div class="x_content">
								<p class="text-muted font-13 m-b-30">
								Masukkan data lampiran SK kepangkatan pegawai. Untuk menghindari error/gagal saat menambah dan mengunggah data lampiran SK kepangkatan pegawai baru, silakan unggah file SK kepangkatan dengan ukuran maksimal 2 MB dan format PDF.
								</p>
									<br />
									<?php echo form_open_multipart('pegawai/kepangkatan/input_aksi')?>
										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align">ID KEPANGKATAN
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="text" name="id_kepangkatan" class="form-control " placeholder="Kolom ini akan terisi otomatis" disabled>
											</div>
										</div>
										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align">Nama Pegawai<span class="required"> *</span></label>
											<div class="col-md-6 col-sm-6 ">
												<select class="js-example-basic-single col-md-12 col-sm-6" name="id_pegawai" required="required" >
													<option value="">-- Pilih Nama Pegawai --</option>
													<?php foreach($pegawai as $peg) : ?>
													<option value="<?php echo $peg->id_pegawai ?>"><?php echo $peg->nama_pegawai; ?>, <?php echo $peg->gelar_pegawai; ?>|<?php echo $peg->nip; ?>|<?php echo $peg->jurusan; ?></option>
													<?php endforeach; ?>
												</select>
											</div>
										</div>
										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align">Jenis SK <span class="required"> *</span></label>
											<div class="col-md-6 col-sm-6 ">
												<select class="form-control" name="jenis_pegawai" required="required" type="text">
													<option value="">-- Pilih Jenis SK Pangkat --</option>
													<?php foreach($tbl_jenis_pegawai as $jenis) : ?>
													<option value="<?php echo $jenis->jenis_pegawai ?>"><?php echo $jenis->jenis_pegawai; ?></option>
													<?php endforeach; ?>
												</select>
											</div>
										</div>
										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align">Pangkat <span class="required"> *</span></label>
											<div class="col-md-6 col-sm-6 ">
												<select class="form-control" name="pangkat" required="required" type="text">
													<option value="">-- Pilih Pangkat --</option>
													<?php foreach($tbl_pangkat as $pkt) : ?>
													<option value="<?php echo $pkt->pangkat ?>"><?php echo $pkt->pangkat; ?></option>
													<?php endforeach; ?>
												</select>
											</div>
										</div>
										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align">Golongan atau Ruang <span class="required"> *</span></label>
											<div class="col-md-6 col-sm-6 ">
												<select class="form-control" name="gol_ruang" required="required" type="text">
													<option value="">-- Pilih Gol/Ruang --</option>
													<?php foreach($tbl_gol_ruang as $gol) : ?>
													<option value="<?php echo $gol->gol_ruang ?>"><?php echo $gol->gol_ruang; ?></option>
													<?php endforeach; ?>
												</select>
											</div>
										</div>
										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align">No SK Kepangkatan <span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="text" name="no_sk_pangkat" required="required" class="form-control" placeholder="1/VII/Kemenag/2021..">
											</div>
										</div>
										
										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align">TGL Terbit SK Kepangkatan <span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input id="pkt" name="tgl_sk_pangkat" class="date-picker form-control" placeholder="dd-mm-yyyy" type="text" required="required" type="text" onfocus="this.type='date'" onmouseover="this.type='date'" onclick="this.type='date'" onblur="this.type='text'" onmouseout="timeFunctionLong(this)">
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
											<label class="col-form-label col-md-3 col-sm-3 label-align">TMT Berlaku SK Kepangkatan<span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input id="tmtpkt" name="tmt_sk_pangkat" class="date-picker form-control" placeholder="dd-mm-yyyy" type="text" required="required" type="text" onfocus="this.type='date'" onmouseover="this.type='date'" onclick="this.type='date'" onblur="this.type='text'" onmouseout="timeFunctionLong(this)">
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
											<label for="email" class="col-form-label col-md-3 col-sm-3 label-align">Gaji Pokok Kepangkatan <span class="required">*</span></label>
											<div class="col-md-6 col-sm-6 ">
												<input required="required" name="gaji_pokok_pangkat" class="form-control" type="text" >
											</div>
										</div>
										<div class="item form-group">
											<label for="email" class="col-form-label col-md-3 col-sm-3 label-align">PAK <span class="required">*</span></label>
											<div class="col-md-6 col-sm-6 ">
												<input required="required" name="pak" class="form-control" type="text" >
											</div>
										</div>
                                        <div class="item form-group">
											<label  class="col-form-label col-md-3 col-sm-3 label-align">Lampiran SK Kepangkatan <span class="required">*</span><br> File Scan PDF/Gambar</label>
											<div class="col-md-6 col-sm-6 ">
												<input  name="lampiran_sk_pangkat" class="form-control" type="file" >
											</div>
										</div>
										<div class="ln_solid"></div>
										<div class="item form-group">
											<div class="col-md-6 col-sm-6 offset-md-3">
												<a href="<?php echo base_url('pegawai/kepangkatan')?>"><button class="btn btn-primary" type="button">Cancel</button></a>
												<button class="btn btn-primary" type="reset">Reset</button>
												<button type="submit" class="btn btn-success">Submit</button>
											</div>
										</div>
									<?php echo form_close(); ?>
								</div>
							</div>
						</div>
					</div>

					
							</form>
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
