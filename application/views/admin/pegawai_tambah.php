<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?php echo $judul; ?></title>
    <!-- Select2 -->
    <link href="<?php echo base_url(); ?>assets/js/select2/dist/css/select2.min.css" rel="stylesheet" />
    <!-- Bootstrap -->
    <link href="<?php echo base_url(); ?>assets/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?php echo base_url(); ?>assets/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="<?php echo base_url(); ?>assets/vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- bootstrap-wysiwyg -->
    <link href="<?php echo base_url(); ?>assets/vendors/google-code-prettify/bin/prettify.min.css" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="<?php echo base_url(); ?>assets/build/css/custom.min.css" rel="stylesheet">
</head>

<body class="nav-md">
    <div class="container body">
        <div class="main_container">
            <?php $this->load->view('tempelate/sidebar'); ?>
        </div>
        <!-- /sidebar menu -->


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
                <div class="col-md-12 col-sm-12 ">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2><?php echo $judul3; ?></h2>

                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <p class="text-muted font-13 m-b-30">
                                Masukkan data lengkap pegawai. Untuk menghindari error/gagal saat menambah data pegawai
                                baru, silakan unggah foto pegawai dengan ukuran maksimal 2 MB dan resolusi 600x400
                                pixel.
                            </p>
                            <br />
                            <?php echo form_open_multipart('admin/pegawai/input_aksi') ?>

                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">ID PEGAWAI
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="text" name="id_pegawai" class="form-control "
                                        placeholder="Kolom ini akan terisi otomatis" disabled>
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">NIP <span
                                        class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input required="required" type="text" name="nip" id="nip" class="form-control " value="<?php echo set_value('nip');?>"
                                        placeholder="Contoh : 197001012005..">
                                        <?php echo form_error('nip', '<div class="text-danger">', '</div>'); ?>
                                </div>
                            </div>
                            <div class="item form-group">
                                <label for="email" class="col-form-label col-md-3 col-sm-3 label-align"> Nama Pegawai
                                    <span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input required="required" name="nama_pegawai" class="form-control" type="text" value="<?php echo set_value('nama_pegawai');?>"
                                        placeholder="(Nama lengkap anda)">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label for="email" class="col-form-label col-md-3 col-sm-3 label-align"> Gelar Pegawai
                                    <span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input name="gelar_pegawai" class="form-control" type="text" value="<?php echo set_value('gelar_pegawai');?>"
                                        placeholder="Contoh : M.Ag., Dr.">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Jenis Kelamin <span
                                        class="required"> *</span></label>
                                <div class="col-md-6 col-sm-6 ">
                                    <select class="form-control" name="jenis_kelamin" required="required" type="text" value="<?php echo set_value('jenis_kelamin');?>">
                                        <option value="">-- Pilih Jenis Kelamin --</option>
                                        <?php foreach ($tbl_jenis_kelamin as $jk) : ?>
                                        <option value="<?php echo $jk->jenis_kelamin ?>">
                                            <?php echo $jk->jenis_kelamin; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="item form-group">
                                <label for="email" class="col-form-label col-md-3 col-sm-3 label-align"> Username Akun
                                    <span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input required="required" name="username" id="username" class="form-control" type="text">
                                    <?php echo form_error('username', '<div class="text-danger">', '</div>'); ?>
                                </div>
                            </div>
                            <div class="item form-group">
                                <label for="email" class="col-form-label col-md-3 col-sm-3 label-align"> Password Akun Pegawai
                                    <span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input required="required" name="password" id="password" class="form-control" type="password">
                                </div>
                                <?php echo form_error('password', '<div class="text-danger">', '</div>'); ?>
                            </div>
                            <div class="item form-group">
                                <label for="email" class="col-form-label col-md-3 col-sm-3 label-align"> Konfirmasi Password Akun Pegawai
                                    <span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input required="required" name="passwordconf" id="passwordconf" class="form-control" type="password">
                                </div>
                                <?php echo form_error('passwordconf', '<div class="text-danger">', '</div>'); ?>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align"> Foto Pegawai <span
                                        class="required">*</span></label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input name="foto_pegawai" class="form-control" type="file">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Agama <span
                                        class="required"> *</span></label>
                                <div class="col-md-6 col-sm-6 ">
                                    <select class="form-control" name="agama" required="required" type="text" value="<?php echo set_value('agama');?>">
                                        <option value="">-- Pilih Agama --</option>
                                        <?php foreach ($tbl_agama as $agama) : ?>
                                        <option value="<?php echo $agama->agama ?>"><?php echo $agama->agama; ?>
                                        </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>

                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Pendidikan Terakhir <span
                                        class="required"> *</span></label>
                                <div class="col-md-6 col-sm-6 ">
                                    <select class="form-control" name="pendidikan" required="required" type="text" value="<?php echo set_value('pendidikan');?>">
                                        <option value="">-- Pilih Pendidikan Terakhir --</option>
                                        <?php foreach ($tbl_pendidikan as $pend) : ?>
                                        <option value="<?php echo $pend->pendidikan ?>"><?php echo $pend->pendidikan; ?>
                                        </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Status Pernikahan <span
                                        class="required"> *</span></label>
                                <div class="col-md-6 col-sm-6 ">
                                    <select class="form-control" name="status_nikah" required="required" type="text" value="<?php echo set_value('status_nikah');?>">
                                        <option value="">-- Pilih Status Pernikahan --</option>
                                        <?php foreach ($tbl_status_menikah as $nikah) : ?>
                                        <option value="<?php echo $nikah->status_menikah ?>">
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
                                        type="text" value="<?php echo set_value('provinsi');?>">
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
                                    <select class="form-control" id="kota" name="kota" required="required" value="<?php echo set_value('kota');?>">
                                        <option value="">-- Pilih Kabupaten/Kota --</option>
                                    </select>
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Kecamatan<span
                                        class="required"> *</span></label>
                                <div class="col-md-6 col-sm-6 ">
                                    <select class="form-control" id="kecamatan" name="kecamatan" required="required" value="<?php echo set_value('kecamatan');?>">
                                        <option value="">-- Pilih Kecamatan --</option>
                                    </select>
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Kelurahan/desa<span
                                        class="required"> *</span></label>
                                <div class="col-md-6 col-sm-6 ">
                                    <select class="form-control" id="kelurahan" name="kelurahan" required="required" value="<?php echo set_value('kelurahan');?>">
                                        <option value="">-- Pilih Kelurahan/Desa --</option>
                                    </select>
                                </div>
                            </div>
                            <div class="item form-group">
                                <label for="email" class="col-form-label col-md-3 col-sm-3 label-align">Alamat <span
                                        class="required">*</span></label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input required="required" name="alamat" class="form-control" type="text" value="<?php echo set_value('alamat');?>"
                                        placeholder="(Alamat lengkap anda)">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label for="email" class="col-form-label col-md-3 col-sm-3 label-align">Tempat Lahir
                                    <span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input required="required" name="tempat_lahir" class="form-control" type="text" value="<?php echo set_value('tempat_lahir');?>">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Tanggal Lahir <span
                                        class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input id="birthday" name="tanggal_lahir" class="date-picker form-control" value="<?php echo set_value('tanggal_lahir');?>"
                                        placeholder="dd-mm-yyyy" type="text" required="required" type="text"
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
                                    <select class="form-control" name="status_pegawai" required="required" type="text" value="<?php echo set_value('status_pegawai');?>">
                                        <option value="aktif">AKTIF</option>
                                        <option value="tidak aktif">TIDAK AKTIF</option>
                                    </select>
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Jenis Pegawai <span
                                        class="required"> *</span></label>
                                <div class="col-md-6 col-sm-6 ">
                                    <select class="form-control" name="jenis_pegawai" required="required" type="text" value="<?php echo set_value('jenis_pegawai');?>">
                                        <option value="">-- Pilih Jenis Pegawai --</option>
                                        <?php foreach ($tbl_jenis_pegawai as $jenis) : ?>
                                        <option value="<?php echo $jenis->jenis_pegawai ?>">
                                            <?php echo $jenis->jenis_pegawai; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="item form-group">
                                <label for="email" class="col-form-label col-md-3 col-sm-3 label-align">Satuan Kerja
                                    <span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input required="required" name="satuan_kerja" class="form-control" type="text" value="<?php echo set_value('satuan_kerja');?>">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Jabatan Pegawai <span
                                        class="required"> *</span></label>
                                <div class="col-md-6 col-sm-6 ">
                                    <select class="form-control" name="jabatan" required="required" type="text" value="<?php echo set_value('jabatan');?>">
                                        <option value="">-- Pilih Jabatan Pegawai --</option>
                                        <?php foreach ($tbl_jabatan as $jbtn) : ?>
                                        <option value="<?php echo $jbtn->jabatan ?>"><?php echo $jbtn->jabatan; ?>
                                        </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Golongan atau Ruang <span
                                        class="required"> *</span></label>
                                <div class="col-md-6 col-sm-6 ">
                                    <select class="form-control" name="gol_ruang" required="required" type="text" value="<?php echo set_value('gol_ruang');?>">
                                        <option value="">-- Pilih Gol/Ruang --</option>
                                        <?php foreach ($tbl_gol_ruang as $gol) : ?>
                                        <option value="<?php echo $gol->gol_ruang ?>"><?php echo $gol->gol_ruang; ?>
                                        </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="item form-group">
                                <label for="email" class="col-form-label col-md-3 col-sm-3 label-align">Satuan
                                    Organisasi <span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input required="required" name="satuan_org" class="form-control" type="text" value="<?php echo set_value('satuan_org');?>">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label for="email" class="col-form-label col-md-3 col-sm-3 label-align">KGB Pegawai
                                    <span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input required="required" name="kgb_pegawai" class="form-control" type="text" value="<?php echo set_value('kgb_pegawai');?>">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Pangkat <span
                                        class="required"> *</span></label>
                                <div class="col-md-6 col-sm-6 ">
                                    <select class="form-control" name="pangkat" required="required" type="text" value="<?php echo set_value('pangkat');?>">
                                        <option value="">-- Pilih Pangkat --</option>
                                        <?php foreach ($tbl_pangkat as $pkt) : ?>
                                        <option value="<?php echo $pkt->pangkat ?>"><?php echo $pkt->pangkat; ?>
                                        </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="item form-group">
                                <label for="email" class="col-form-label col-md-3 col-sm-3 label-align">Karpeg <span
                                        class="required">*</span></label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input required="required" name="karpeg" class="form-control" type="text" value="<?php echo set_value('karpeg');?>">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label for="email" class="col-form-label col-md-3 col-sm-3 label-align">Karis <span
                                        class="required">*</span></label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input required="required" name="karis" class="form-control" type="text" value="<?php echo set_value('karis');?>">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label for="email" class="col-form-label col-md-3 col-sm-3 label-align">KPE <span
                                        class="required">*</span></label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input required="required" name="kpe" class="form-control" type="text" value="<?php echo set_value('kpe');?>">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label for="email" class="col-form-label col-md-3 col-sm-3 label-align">Taspen <span
                                        class="required">*</span></label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input required="required" name="taspen" class="form-control" type="text" value="<?php echo set_value('taspen');?>">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label for="email" class="col-form-label col-md-3 col-sm-3 label-align">NPWP <span
                                        class="required">*</span></label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input required="required" name="npwp" class="form-control" type="text" value="<?php echo set_value('npwp');?>">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label for="email" class="col-form-label col-md-3 col-sm-3 label-align">NIDN <span
                                        class="required">*</span></label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input required="required" name="nidn" class="form-control" type="text" value="<?php echo set_value('nidn');?>">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Jurusan/Prodi <span
                                        class="required"> *</span></label>
                                <div class="col-md-6 col-sm-6 ">
                                    <select class="form-control" name="jurusan" required="required" type="text" value="<?php echo set_value('jurusan');?>">
                                        <option value="">-- Pilih Jurusan/Prodi --</option>
                                        <?php foreach ($tbl_jurusan as $jrs) : ?>
                                        <option value="<?php echo $jrs->jurusan ?>"><?php echo $jrs->jurusan; ?>
                                        </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="item form-group">
                                <label for="email" class="col-form-label col-md-3 col-sm-3 label-align">Nomor Telepon/HP
                                    <span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input required="required" name="telp" class="form-control" type="text" value="<?php echo set_value('telp');?>"
                                        placeholder="(Nomor aktif yang dapat dihubungi)">
                                </div>
                            </div>

                            <div class="ln_solid"></div>
                            <div class="item form-group">
                                <div class="col-md-6 col-sm-6 offset-md-3">
                                    <a href="<?php echo base_url('admin/pegawai') ?>"><button class="btn btn-primary"
                                            type="button">Cancel</button></a>
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
    <script src="<?php echo base_url(); ?>assets/vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="<?php echo base_url(); ?>assets/vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- FastClick -->
    <script src="<?php echo base_url(); ?>assets/vendors/fastclick/lib/fastclick.js"></script>
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
    <script src="<?php echo base_url(); ?>assets/vendors/devbridge-autocomplete/dist/jquery.autocomplete.min.js">
    </script>
    <script src="<?php echo base_url(); ?>assets/build/js/custom.min.js"></script>
    <!-- Select2 Scripts -->
    <script src="<?php echo base_url(); ?>assets/js/select2/dist/js/select2.min.js"></script>
    <script>
    $(document).ready(function() {
        $('#provinsi').change(function() {
            var id = $(this).val();
            $.ajax({
                type: "POST",
                url: "<?= base_url('admin/pegawai/getDataKabupaten') ?>",
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
                url: "<?= base_url('admin/pegawai/getDataKecamatan') ?>",
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
                url: "<?= base_url('admin/pegawai/getDataDesa') ?>",
                data: {
                    id: id
                },
                dataType: "JSON",
                success: function(response) {
                    $('#kelurahan').html(response);
                }
            });
        });
    })
    </script>

    <!-- AJAX DATA DAERAH INDONESIA -->
    <!-- <script type="text/javascript">
    function dataProvinsi() {
        $('.provinsi-select2').select2({
            minimumInputLength: 2,
            allowClear: true,
            placeholder: 'Cari Provinsi',
            ajax: {
                // beforeSend: function(xhr) {
                //     xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
                // },
                url: "",
                // type: 'POST',
                delay: 500,
                dataType: 'json',
                // success: function(data) {
                //     console.log(data);
                // },
                // Additional AJAX parameters go here; see the end of this chapter for the full code of this example
                data: function(params) {
                    return {
                        search: params.term
                    }
                },
                processResults: function(data, page) {
                    return {
                        result: data
                    }
                }
            }
        });
    }
    $(document).ready(function() {
        dataProvinsi();
    });
    </script> -->
    <!-- <script type="text/javascript">
    // In your Javascript (external .js resource or <script> tag)
    function formatSearch(item) {
        var selectionText = item.text.split("|");
        var $returnString = $('<span>' + selectionText[0] + '</br><b>' + selectionText[1] + '</b></br>' + selectionText[
            2] + '</span>');
        return $returnString;
    };

    function formatSelected(item) {
        var selectionText = item.text.split("|");
        var $returnString = $('<span>' + selectionText[0].substring(0, 21) + '</span>');
        return $returnString;
    };
    $('.js-example-basic-single').select2({
        templateResult: formatSearch,
        templateSelection: formatSelected
    });
    </script> -->
    <!-- <script>
    $(document).ready(function() {
        $.ajax({
            type: "GET",
            url: "http://dev.farizdotid.com/api/daerahindonesia/provinsi?id_provinsi",
            success: function(data) {
                // for (let i = 0; i < data.length; i++) {
                //     data[i].text = data[i].nama;
                // }
                var data_provinsi = $.map(data.provinsi, function(obj) {
                    obj.text = obj.text || obj
                        .nama; // replace name with the property used for the text
                    return obj;
                });
                // console.log(data_provinsi);
                $('.provinsi-select2').select2({
                    data: data_provinsi

                    // var id_provinsi_terpilih = data;
                    // alert(id_provinsi_terpilih);
                    // data: data_provinsi
                });
                // $('.provinsi-select2').on("change", function(id_provinsi_terpilih) {
                //     // console.log(e)
                //     data: data_provinsi
                //     var id_provinsi_terpilih = data;
                //     alert(data);
                // });
            }
        });

        $.ajax({
            type: "GET",
            url: "http://dev.farizdotid.com/api/daerahindonesia/kota?id_provinsi=11",
            success: function(data) {
                // for (let i = 0; i < data.length; i++) {
                //     data[i].text = data[i].nama;
                // }
                var data_provinsi = $.map(data.kota_kabupaten, function(obj) {
                    obj.text = obj.text || obj
                        .nama; // replace name with the property used for the text
                    return obj;
                });

                console.log(data_provinsi);
                $('.kota-select2').select2({
                    data: data_provinsi
                    // var id_provinsi_terpilih
                    // alert(id_provinsi_terpilih);

                });
            }
        });

        $.ajax({
            type: "GET",
            url: "http://dev.farizdotid.com/api/daerahindonesia/kecamatan?id_kota=3214",
            success: function(data) {
                // for (let i = 0; i < data.length; i++) {
                //     data[i].text = data[i].nama;
                // }
                var data_provinsi = $.map(data.kecamatan, function(obj) {
                    obj.text = obj.text || obj
                        .nama; // replace name with the property used for the text
                    return obj;
                });

                console.log(data_provinsi);
                $('.kecamatan-select2').select2({
                    data: data_provinsi
                });
            }
        });

        $.ajax({
            type: "GET",
            url: "http://dev.farizdotid.com/api/daerahindonesia/kelurahan?id_kecamatan=3214080",
            success: function(data) {
                // for (let i = 0; i < data.length; i++) {
                //     data[i].text = data[i].nama;
                // }
                var data_provinsi = $.map(data.kelurahan, function(obj) {
                    obj.text = obj.text || obj
                        .nama; // replace name with the property used for the text
                    return obj;
                });

                console.log(data_provinsi);
                $('.kelurahan-select2').select2({
                    data: data_provinsi
                });
            }
        });
    });
    </script> -->
</body>

</html>