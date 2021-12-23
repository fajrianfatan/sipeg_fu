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
                                    
									<?php echo form_open_multipart('pegawai/profil/AksiEdit')?>
							<div class="item form-group">
									<input type="hidden" name="id" id="id" value="<?php echo $pegawai->id_pegawai ?>" >
                                <input type="hidden" name="id_pegawai" id="id_pegawai" value="<?php echo $pegawai->id_pegawai ?>" >
                                <label class="col-form-label col-md-3 col-sm-3 label-align">ID PEGAWAI
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="text" name="id_pegawai" class="form-control "
                                        value="<?php echo $pegawai->id_pegawai ?>" readonly>
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">NIP
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="text" name="nip" class="form-control "
                                    maxlength = "18"
                                        value="<?php echo $pegawai->nip ?>">
                                    <?php echo form_error('nip', '<div class="text-danger">', '</div>'); ?>
                                </div>
                            </div>
                            <div class="item form-group">
                                <label for="email" class="col-form-label col-md-3 col-sm-3 label-align">Nama
                                    Pegawai</label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input name="nama_pegawai" class="form-control" type="text"
                                    maxlength = "60"
                                        value="<?php echo $pegawai->nama_pegawai ?>">
                                    <?php echo form_error('nama_pegawai', '<div class="text-danger">', '</div>'); ?>
                                </div>
                            </div>
                            <div class="item form-group">
                                <label for="email" class="col-form-label col-md-3 col-sm-3 label-align">Gelar
                                    Pegawai</label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input name="gelar_pegawai" class="form-control" type="text"
                                    maxlength = "32"
                                        value="<?php echo $pegawai->gelar_pegawai ?>">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Jenis Kelamin <span
                                        class="required"> *</span></label>
                                <div class="col-md-6 col-sm-6 ">
                                    <select class="form-control" name="jenis_kelamin" required="required" type="text">
                                        <option value="">-- Pilih Jenis Kelamin --</option>
                                        <?php foreach ($tbl_jenis_kelamin as $jk) : ?>
                                        <option value="<?php echo $jk->jenis_kelamin ?>"
                                            <?= $jk->jenis_kelamin == $pegawai->jenis_kelamin ? "selected" : null ?>>
                                            <?php echo $jk->jenis_kelamin; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Foto Pegawai</label><br>
                                <div class="col-md-6 col-sm-6 ">
                                    <img width="200px"
                                        src="<?php echo base_url() . 'assets/directory/foto pegawai/' . $pegawai->foto_pegawai ?> ">
                                    <br>
                                    <input name="userfile" class="form-control" type="file">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Agama <span
                                        class="required"> *</span></label>
                                <div class="col-md-6 col-sm-6 ">
                                    <select class="form-control" name="agama" required="required" type="text">
                                        <option value="">-- Pilih Agama --</option>
                                        <?php foreach ($tbl_agama as $agama) : ?>
                                        <option value="<?php echo $agama->agama ?>"
                                            <?= $agama->agama == $pegawai->agama ? "selected" : null ?>>
                                            <?php echo $agama->agama; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Pendidikan Terakhir </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <select class="form-control" name="pendidikan" required="required" type="text">
                                        <option value="">-- Pilih Pendidikan Terakhir --</option>
                                        <?php foreach ($tbl_pendidikan as $pend) : ?>
                                        <option value="<?php echo $pend->pendidikan ?>"
                                            <?= $pend->pendidikan == $pegawai->pendidikan ? "selected" : null ?>>
                                            <?php echo $pend->pendidikan; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Status Pernikahan <span
                                        class="required"> *</span></label>
                                <div class="col-md-6 col-sm-6 ">
                                    <select class="form-control" name="status_nikah" required="required" type="text">
                                        <option value="">-- Pilih Status Pernikahan --</option>
                                        <?php foreach ($tbl_status_menikah as $nikah) : ?>
                                        <option value="<?php echo $nikah->status_menikah ?>"
                                            <?= $nikah->status_menikah == $pegawai->status_nikah ? "selected" : null ?>>
                                            <?php echo $nikah->status_menikah; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="item form-group">
                                <label for="provinsi" class="col-form-label col-md-3 col-sm-3 label-align">Provinsi
                                    <span class="required"> *</span></label>
                                <div class="col-md-6 col-sm-6 ">
                                    <select class="form-control" name="provinsi" id="provinsi" required="required"
                                        type="text">
                                        <option value="">-- Pilih Provinsi --</option>
                                        <?php foreach ($dataProvinsi as $prov) : ?>
                                        <option value="<?php echo $prov['id'] ?>">
                                            <?php echo $prov['nama']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Kota/Kabupaten<span
                                        class="required"> *</span></label>
                                <div class="col-md-6 col-sm-6 ">
                                    <select class="form-control" id="kota" name="kota" required="required">
                                        <option value="">-- Pilih Kabupaten/Kota --</option>
                                    </select>
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Kecamatan<span
                                        class="required"> *</span></label>
                                <div class="col-md-6 col-sm-6 ">
                                    <select class="form-control" id="kecamatan" name="kecamatan" required="required">
                                        <option value="">-- Pilih Kecamatan --</option>
                                    </select>
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Kelurahan/desa<span
                                        class="required"> *</span></label>
                                <div class="col-md-6 col-sm-6 ">
                                    <select class="form-control" id="kelurahan" name="kelurahan" required="required">
                                        <option value="">-- Pilih Kelurahan/Desa --</option>
                                    </select>
                                </div>
                            </div>
                            <div class="item form-group">
                                <label for="email" class="col-form-label col-md-3 col-sm-3 label-align">Alamat</label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input name="alamat" class="form-control" type="text"
                                    maxlength = "60"
                                        value="<?php echo $pegawai->alamat ?>">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label for="email" class="col-form-label col-md-3 col-sm-3 label-align">Tempat
                                    Lahir</label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input name="tempat_lahir" class="form-control" type="text"
                                    maxlength = "60"
                                        value="<?php echo $pegawai->tempat_lahir ?>">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Tanggal Lahir
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input id="birthday" name="tanggal_lahir" class="date-picker form-control"
                                        value="<?php echo $pegawai->tanggal_lahir ?>" required="required" type="text"
                                        onfocus="this.type='date'" onmouseover="this.type='date'"
                                        onclick="this.type='date'" onblur="this.type='text'"
                                        onmouseout="timeFunctionLong(this)">
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
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Status Pegawai <span
                                        class="required"> *</span></label>
                                <div class="col-md-6 col-sm-6 ">
                                    <select class="form-control" name="status_pegawai" required="required" type="text">
                                        <option value="AKTIF">AKTIF</option>
                                        <option value="TIDAK AKTIF">TIDAK AKTIF</option>
                                    </select>
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Jenis Pegawai </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <select class="form-control" name="jenis_pegawai" required="required" type="text">
                                        <option value="">-- Pilih Jenis Pegawai --</option>
                                        <?php foreach ($tbl_jenis_pegawai as $jenis) : ?>
                                        <option value="<?php echo $jenis->jenis_pegawai ?>"
                                            <?= $jenis->jenis_pegawai == $pegawai->jenis_pegawai ? "selected" : null ?>>
                                            <?php echo $jenis->jenis_pegawai; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="item form-group">
                                <label for="email" class="col-form-label col-md-3 col-sm-3 label-align">Satuan
                                    Kerja</label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input name="satuan_kerja" class="form-control" type="text"
                                    maxlength = "60"
                                        value="<?php echo $pegawai->satuan_kerja ?>">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Jabatan Pegawai </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <select class="form-control" name="jabatan" required="required" type="text">
                                        <option value="">-- Pilih Jabatan Pegawai --</option>
                                        <?php foreach ($tbl_jabatan as $jbtn) : ?>
                                        <option value="<?php echo $jbtn->jabatan ?>"
                                            <?= $jbtn->jabatan == $pegawai->jabatan ? "selected" : null ?>>
                                            <?php echo $jbtn->jabatan; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Golongan atau Ruang </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <select class="form-control" name="gol_ruang" required="required" type="text">
                                        <option value="">-- Pilih Gol/Ruang --</option>
                                        <?php foreach ($tbl_gol_ruang as $gol) : ?>
                                        <option value="<?php echo $gol->gol_ruang ?>"
                                            <?= $gol->gol_ruang == $pegawai->gol_ruang ? "selected" : null ?>>
                                            <?php echo $gol->gol_ruang; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="item form-group">
                                <label for="email" class="col-form-label col-md-3 col-sm-3 label-align">Satuan
                                    Organisasi</label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input name="satuan_org" class="form-control" type="text"
                                    maxlength = "60"
                                        value="<?php echo $pegawai->satuan_org ?>">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label for="email" class="col-form-label col-md-3 col-sm-3 label-align">KGB
                                    Pegawai</label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input name="kgb_pegawai" class="form-control" type="text"
                                    maxlength = "18"
                                        value="<?php echo $pegawai->kgb_pegawai ?>">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Pangkat </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <select class="form-control" name="pangkat" required="required" type="text">
                                        <option value="">-- Pilih Pangkat --</option>
                                        <?php foreach ($tbl_pangkat as $pkt) : ?>
                                        <option value="<?php echo $pkt->pangkat ?>"
                                            <?= $pkt->pangkat == $pegawai->pangkat ? "selected" : null ?>>
                                            <?php echo $pkt->pangkat; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="item form-group">
                                <label for="email" class="col-form-label col-md-3 col-sm-3 label-align">Karpeg</label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input name="karpeg" class="form-control" type="text"
                                    maxlength = "18"
                                        value="<?php echo $pegawai->karpeg ?>">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label for="email" class="col-form-label col-md-3 col-sm-3 label-align">Karis</label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input name="karis" class="form-control" type="text"
                                    maxlength = "16"
                                        value="<?php echo $pegawai->karis ?>">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label for="email" class="col-form-label col-md-3 col-sm-3 label-align">KPE</label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input name="kpe" class="form-control" type="text"
                                    maxlength = "18"
                                        value="<?php echo $pegawai->kpe ?>">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label for="email" class="col-form-label col-md-3 col-sm-3 label-align">Taspen</label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input name="taspen" class="form-control" type="text"
                                    maxlength = "15"
                                        value="<?php echo $pegawai->taspen ?>">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label for="email" class="col-form-label col-md-3 col-sm-3 label-align">NPWP</label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input name="npwp" class="form-control" type="text"
                                    maxlength = "15"
                                        value="<?php echo $pegawai->npwp ?>">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label for="email" class="col-form-label col-md-3 col-sm-3 label-align">NIDN</label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input name="nidn" class="form-control" type="text"
                                    maxlength = "16"
                                        value="<?php echo $pegawai->nidn ?>">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Jurusan/Prodi </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <select class="form-control" name="jurusan" required="required" type="text">
                                        <option value="">-- Pilih Jurusan/Prodi --</option>
                                        <?php foreach ($tbl_jurusan as $jrs) : ?>
                                        <option value="<?php echo $jrs->jurusan ?>"
                                            <?= $jrs->jurusan == $pegawai->jurusan ? "selected" : null ?>>
                                            <?php echo $jrs->jurusan; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="item form-group">
                                <label for="email" class="col-form-label col-md-3 col-sm-3 label-align">Nomor
                                    Telepon/HP</label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input name="telp" class="form-control" type="text"
                                    maxlength = "15"
                                        value="<?php echo $pegawai->telp ?>">
                                </div>
                            </div>
										<div class="ln_solid"></div>
										<div class="item form-group">
											<div class="col-md-6 col-sm-6 offset-md-3">
												<a href="<?php echo base_url('pegawai/profil')?>"><button class="btn btn-primary" type="button">Cancel</button></a>
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

	<script src="<?php echo base_url(); ?>assets/vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="<?php echo base_url(); ?>assets/vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- FastClick -->
    <script src="<?php echo base_url(); ?>assets/vendors/fastclick/lib/fastclick.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="<?php echo base_url(); ?>assets/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="<?php echo base_url(); ?>assets/vendors/iCheck/icheck.min.js"></script>
    <!-- bootstrap-wysiwyg -->
    <script src="<?php echo base_url(); ?>assets/vendors/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendors/jquery.hotkeys/jquery.hotkeys.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendors/google-code-prettify/src/prettify.js"></script>
    <!-- jQuery Tags Input -->
    <script src="<?php echo base_url(); ?>assets/vendors/jquery.tagsinput/src/jquery.tagsinput.js"></script>
    <!-- Autosize -->
    <script src="<?php echo base_url(); ?>assets/vendors/autosize/dist/autosize.min.js"></script>
    <!-- jQuery autocomplete -->
    <script src="<?php echo base_url(); ?>assets/vendors/devbridge-autocomplete/dist/jquery.autocomplete.min.js"></script>
    <!-- jQuery validation -->
    <script src="<?php echo base_url(); ?>assets/vendors/jquery/dist/jquery.validate.js"></script>
    </script>
    <!-- Custom Theme Scripts -->
    <script src="<?php echo base_url(); ?>assets/build/js/custom.min.js"></script>
	<script>

$(document).ready(function() {
	$('#provinsi').change(function() {
		var id = $(this).val();
		$.ajax({
			type: "POST",
			url: "<?= base_url('pegawai/profil/getDataKabupaten') ?>",
			data: {
				id: id
			},
			dataType: "JSON",
			success: function(response) {
				$('#kota').html(response);
			}
		});
	});
	$('#kota').change(function() {
		var id = $(this).val();
		$.ajax({
			type: "POST",
			url: "<?= base_url('pegawai/profil/getDataKecamatan') ?>",
			data: {
				id: id
			},
			dataType: "JSON",
			success: function(response) {
				$('#kecamatan').html(response);
			}
		});
	});
	$('#kecamatan').change(function() {
		var id = $(this).val();
		$.ajax({
			type: "POST",
			url: "<?= base_url('pegawai/profil/getDataDesa') ?>",
			data: {
				id: id
			},
			dataType: "JSON",
			success: function(response) {
				$('#kelurahan').html(response);
			}
		});
	});

	// var idPegawai = "<?= $pegawai->id_pegawai?>"
	// $.ajax({
	// 	type: "GET",
	// 	url: "<?= base_url('pegawai/edit/')?>" + idPegawai + "/json",
	// 	dataType: "JSON",
	// 	success: function(response){
	// 		console.log(response);
	// 	}
	// })
})
</script>
</body></html>
