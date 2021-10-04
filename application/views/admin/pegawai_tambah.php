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
								Masukkan data lengkap pegawai. Untuk menghindari error/gagal saat menambah data pegawai baru, silakan unggah foto pegawai dengan ukuran maksimal 2 MB dan resolusi 600x400 pixel.
								</p>
									<br />
									<?php echo form_open_multipart('admin/pegawai/input_aksi')?>
									
										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align">ID PEGAWAI
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="text" name="id_pegawai" class="form-control " placeholder="Kolom ini akan terisi otomatis" disabled>
											</div>
										</div>
										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align">NIP <span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input required="required" type="text" name="nip" class="form-control " placeholder="Contoh : 197001012005..">
											</div>
										</div>
										<div class="item form-group">
											<label for="email" class="col-form-label col-md-3 col-sm-3 label-align"> Nama Pegawai <span class="required">*</span></label>
											<div class="col-md-6 col-sm-6 ">
												<input required="required" name="nama_pegawai" class="form-control" type="text" placeholder="(Nama lengkap anda)">
											</div>
										</div>
										<div class="item form-group">
											<label for="email" class="col-form-label col-md-3 col-sm-3 label-align"> Gelar Pegawai <span class="required">*</span></label>
											<div class="col-md-6 col-sm-6 ">
												<input name="gelar_pegawai" class="form-control" type="text" placeholder="Contoh : M.Ag., Dr.">
											</div>
										</div>
										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align">Jenis Kelamin <span class="required"> *</span></label>
											<div class="col-md-6 col-sm-6 ">
												<select class="form-control" name="jenis_kelamin" required="required" type="text">
													<option value="">-- Pilih Jenis Kelamin --</option>
													<?php foreach($tbl_jenis_kelamin as $jk) : ?>
													<option value="<?php echo $jk->jenis_kelamin ?>"><?php echo $jk->jenis_kelamin; ?></option>
													<?php endforeach; ?>
												</select>
											</div>
										</div>
										<div class="item form-group">
											<label for="email" class="col-form-label col-md-3 col-sm-3 label-align"> Username Akun <span class="required">*</span></label>
											<div class="col-md-6 col-sm-6 ">
												<input required="required" name="username" class="form-control" type="text">
											</div>
										</div>
										<div class="item form-group">
											<label for="email" class="col-form-label col-md-3 col-sm-3 label-align"> Password Akun <span class="required">*</span></label>
											<div class="col-md-6 col-sm-6 ">
												<input required="required" name="password" class="form-control" type="password" >
											</div>
										</div>
										<div class="item form-group">
											<label  class="col-form-label col-md-3 col-sm-3 label-align"> Foto Pegawai <span class="required">*</span></label>
											<div class="col-md-6 col-sm-6 ">
												<input  name="foto_pegawai" class="form-control" type="file" >
											</div>
										</div>
										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align">Agama <span class="required"> *</span></label>
											<div class="col-md-6 col-sm-6 ">
												<select class="form-control" name="agama" required="required" type="text">
													<option value="">-- Pilih Agama --</option>
													<?php foreach($tbl_agama as $agama) : ?>
													<option value="<?php echo $agama->agama ?>"><?php echo $agama->agama; ?></option>
													<?php endforeach; ?>
												</select>
											</div>
										</div>
										
										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align">Pendidikan Terakhir <span class="required"> *</span></label>
											<div class="col-md-6 col-sm-6 ">
												<select class="form-control" name="pendidikan" required="required" type="text">
													<option value="">-- Pilih Pendidikan Terakhir --</option>
													<?php foreach($tbl_pendidikan as $pend) : ?>
													<option value="<?php echo $pend->pendidikan ?>"><?php echo $pend->pendidikan; ?></option>
													<?php endforeach; ?>
												</select>
											</div>
										</div>
										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align">Status Pernikahan <span class="required"> *</span></label>
											<div class="col-md-6 col-sm-6 ">
												<select class="form-control" name="status_nikah" required="required" type="text">
													<option value="">-- Pilih Status Pernikahan --</option>
													<?php foreach($tbl_status_menikah as $nikah) : ?>
													<option value="<?php echo $nikah->status_menikah ?>"><?php echo $nikah->status_menikah; ?></option>
													<?php endforeach; ?>
												</select>
											</div>
										</div>
										<div class="item form-group">
											<label for="email" class="col-form-label col-md-3 col-sm-3 label-align">Alamat <span class="required">*</span></label>
											<div class="col-md-6 col-sm-6 ">
												<input required="required" name="alamat" class="form-control" type="text" placeholder="(Alamat lengkap anda)">
											</div>
										</div>
										<div class="item form-group">
											<label for="email" class="col-form-label col-md-3 col-sm-3 label-align">Kelurahan/Desa <span class="required">*</span></label>
											<div class="col-md-6 col-sm-6 ">
												<input required="required" name="kelurahan" class="form-control" type="text" >
											</div>
										</div>
										<div class="item form-group">
											<label for="email" class="col-form-label col-md-3 col-sm-3 label-align">Kecamatan <span class="required">*</span></label>
											<div class="col-md-6 col-sm-6 ">
												<input required="required" name="kecamatan" class="form-control" type="text" >
											</div>
										</div>
										<div class="item form-group">
											<label for="email" class="col-form-label col-md-3 col-sm-3 label-align">Kota/Kabupaten <span class="required">*</span></label>
											<div class="col-md-6 col-sm-6 ">
												<input required="required" name="kota" class="form-control" type="text" >
											</div>
										</div>
										<div class="item form-group">
											<label for="email" class="col-form-label col-md-3 col-sm-3 label-align">Provinsi <span class="required">*</span></label>
											<div class="col-md-6 col-sm-6 ">
												<input required="required" name="provinsi" class="form-control" type="text" >
											</div>
										</div>
										<div class="item form-group">
											<label for="email" class="col-form-label col-md-3 col-sm-3 label-align">Tempat Lahir <span class="required">*</span></label>
											<div class="col-md-6 col-sm-6 ">
												<input required="required" name="tempat_lahir" class="form-control" type="text" >
											</div>
										</div>
										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align">Tanggal Lahir <span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input id="birthday" name="tanggal_lahir" class="date-picker form-control" placeholder="dd-mm-yyyy" type="text" required="required" type="text" onfocus="this.type='date'" onmouseover="this.type='date'" onclick="this.type='date'" onblur="this.type='text'" onmouseout="timeFunctionLong(this)">
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
											<label class="col-form-label col-md-3 col-sm-3 label-align">Status Pegawai <span class="required"> *</span></label>
											<div class="col-md-6 col-sm-6 ">
												<select class="form-control" name="status_pegawai" required="required" type="text">
													<option value="aktif">AKTIF</option>
													<option value="tidak aktif">TIDAK AKTIF</option>
												</select>
											</div>
										</div>
										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align">Jenis Pegawai <span class="required"> *</span></label>
											<div class="col-md-6 col-sm-6 ">
												<select class="form-control" name="jenis_pegawai" required="required" type="text">
													<option value="">-- Pilih Jenis Pegawai --</option>
													<?php foreach($tbl_jenis_pegawai as $jenis) : ?>
													<option value="<?php echo $jenis->jenis_pegawai ?>"><?php echo $jenis->jenis_pegawai; ?></option>
													<?php endforeach; ?>
												</select>
											</div>
										</div>
										<div class="item form-group">
											<label for="email" class="col-form-label col-md-3 col-sm-3 label-align">Satuan Kerja <span class="required">*</span></label>
											<div class="col-md-6 col-sm-6 ">
												<input required="required" name="satuan_kerja" class="form-control" type="text" >
											</div>
										</div>
										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align">Jabatan Pegawai <span class="required"> *</span></label>
											<div class="col-md-6 col-sm-6 ">
												<select class="form-control" name="jabatan" required="required" type="text">
													<option value="">-- Pilih Jabatan Pegawai --</option>
													<?php foreach($tbl_jabatan as $jbtn) : ?>
													<option value="<?php echo $jbtn->jabatan ?>"><?php echo $jbtn->jabatan; ?></option>
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
											<label for="email" class="col-form-label col-md-3 col-sm-3 label-align">Satuan Organisasi <span class="required">*</span></label>
											<div class="col-md-6 col-sm-6 ">
												<input required="required" name="satuan_org" class="form-control" type="text" >
											</div>
										</div>
										<div class="item form-group">
											<label for="email" class="col-form-label col-md-3 col-sm-3 label-align">KGB Pegawai <span class="required">*</span></label>
											<div class="col-md-6 col-sm-6 ">
												<input required="required" name="kgb_pegawai" class="form-control" type="text" >
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
											<label for="email" class="col-form-label col-md-3 col-sm-3 label-align">Karpeg <span class="required">*</span></label>
											<div class="col-md-6 col-sm-6 ">
												<input required="required" name="karpeg" class="form-control" type="text" >
											</div>
										</div>
										<div class="item form-group">
											<label for="email" class="col-form-label col-md-3 col-sm-3 label-align">Karis <span class="required">*</span></label>
											<div class="col-md-6 col-sm-6 ">
												<input required="required" name="karis" class="form-control" type="text" >
											</div>
										</div>
										<div class="item form-group">
											<label for="email" class="col-form-label col-md-3 col-sm-3 label-align">KPE <span class="required">*</span></label>
											<div class="col-md-6 col-sm-6 ">
												<input required="required" name="kpe" class="form-control" type="text">
											</div>
										</div>
										<div class="item form-group">
											<label for="email" class="col-form-label col-md-3 col-sm-3 label-align">Taspen <span class="required">*</span></label>
											<div class="col-md-6 col-sm-6 ">
												<input required="required" name="taspen" class="form-control" type="text" >
											</div>
										</div>
										<div class="item form-group">
											<label for="email" class="col-form-label col-md-3 col-sm-3 label-align">NPWP <span class="required">*</span></label>
											<div class="col-md-6 col-sm-6 ">
												<input required="required" name="npwp" class="form-control" type="text" >
											</div>
										</div>
										<div class="item form-group">
											<label for="email" class="col-form-label col-md-3 col-sm-3 label-align">NIDN <span class="required">*</span></label>
											<div class="col-md-6 col-sm-6 ">
												<input required="required" name="nidn" class="form-control" type="text" >
											</div>
										</div>
										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align">Jurusan/Prodi <span class="required"> *</span></label>
											<div class="col-md-6 col-sm-6 ">
												<select class="form-control" name="jurusan" required="required" type="text">
													<option value="">-- Pilih Jurusan/Prodi --</option>
													<?php foreach($tbl_jurusan as $jrs) : ?>
													<option value="<?php echo $jrs->jurusan ?>"><?php echo $jrs->jurusan; ?></option>
													<?php endforeach; ?>
												</select>
											</div>
										</div>
										<div class="item form-group">
											<label for="email" class="col-form-label col-md-3 col-sm-3 label-align">Nomor Telepon/HP <span class="required">*</span></label>
											<div class="col-md-6 col-sm-6 ">
												<input required="required" name="telp" class="form-control" type="text" placeholder="(Nomor aktif yang dapat dihubungi)">
											</div>
										</div>
										
										<div class="ln_solid"></div>
										<div class="item form-group">
											<div class="col-md-6 col-sm-6 offset-md-3">
												<a href="<?php echo base_url('admin/pegawai')?>"><button class="btn btn-primary" type="button">Cancel</button></a>
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
	<script src="<?php echo base_url();?>assets/build/js/custom.min.js"></script>

</body></html>
