<?php
//error_reporting(0);
if ($this->session->userdata('level') == "admin") {
  $id  = $this->session->userdata('id_user');
  $data = $this->db->get_where('user', array('id_user' => $id))->row_array();
}
?>
<div class="col-md-3 left_col">
    <div class="left_col scroll-view">
        <!--<div class="navbar nav_title" style="border: 0;">
    <a href="#" class="site_title"><i class="fa fa-paw"></i> <span>Sipeg Ushuluddin</span></a>
  </div>-->
        <div class="navbar nav_title" style="border: 0;">
            <a href="#" class="site_title"><img width="15%"
                    src="<?php echo base_url('assets/directory/uin_logo_sm.png') ?>" alt="..."> <span>Sipeg
                    Ushuluddin</span></a>
        </div>
        <div class="clearfix"></div>



        <!-- SIDEBAR QUERY MENU -->

        <?php if ($this->session->userdata('level') == "admin") { ?>
        <!-- menu profile quick info -->

        <div class="profile clearfix">
            <div class="profile_pic">
                <img src="<?php echo base_url('assets/directory/foto user/' . $foto_user) ?>" alt="..."
                    class="img-circle profile_img">
            </div>
            <div class="profile_info">
                <span>Selamat Datang,</span>
                <h2><strong><?php echo ucfirst($user_name); ?></strong></h2>
            </div>
            <div class="clearfix"></div>
        </div>
        <!-- /menu profile quick info -->

        <br />
        <!-- sidebar menu -->
        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
                <h3>Menu Admin</h3>
                <ul class="nav side-menu">
                    <li><a><i class="fa fa-home"></i> Beranda <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="<?php echo base_url('admin/dashboard') ?>">Halaman Dashboard</a></li>
                        </ul>
                    </li>

                    <li><a><i class="fa fa-database"></i> Data Pegawai <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="<?php echo base_url('admin/pegawai') ?>">Daftar Pegawai</a></li>
                            <li><a href="<?php echo base_url('admin/keluarga') ?>">Riwayat Keluarga</a></li>
                            <li><a href="<?php echo base_url('admin/changepass_pegawai') ?>"><b>Ganti Password Akun
                                        Pegawai</b></a></li>
                        </ul>
                    </li>
                    <li><a><i class="fa fa-graduation-cap"></i> Riwayat Pendidikan dan Pelatihan <span
                                class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="<?php echo base_url('admin/pendidikan') ?>">Riwayat Pendidikan</a></li>
                            <li><a href="<?php echo base_url('admin/pelatihan') ?>">Riwayat Pelatihan</a></li>
                        </ul>
                    </li>
                    <li><a><i class="fa fa-folder"></i> Riwayat Pekerjaan dan Penghargaan <span
                                class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="<?php echo base_url('admin/kepangkatan') ?>">Lampiran SK Kepangkatan</a></li>
                            <li><a href="<?php echo base_url('admin/jabatan') ?>">Lampiran SK Jabatan</a></li>
                            <li><a href="<?php echo base_url('admin/penghargaan') ?>">Data Penghargaan atau Tanda
                                    Jasa</a></li>
                        </ul>
                    </li>
                    <li><a><i class="fa fa-key"></i> Data User/Hak Akses <span class="fa fa-chevron-down"></span> </a>
                        <ul class="nav child_menu">
                            <li><a href="<?php echo base_url('admin/user') ?>">Daftar User</a></li>
                            <li><a href="<?php echo base_url('admin/changepass_user') ?>"><b>Ganti Password Akun
                                        User</b></a></li>
                        </ul>
                    </li>
                    <li><a><i class="fa fa-cog"></i> Data Master <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <!-- <li><a href="<?php echo base_url('admin/tbl_pangkat') ?>">Daftar Pangkat Pegawai</a></li> -->
                            <li><a href="<?php echo base_url('admin/tbl_jabatan') ?>">Daftar Jabatan Pegawai</a></li>
                            <!-- <li><a href="<?php echo base_url('admin/tbl_gol_ruang') ?>">Daftar Golongan/Ruang
                                    Pegawai</a></li> -->
                            <li><a href="<?php echo base_url('admin/tbl_jenis_pegawai') ?>">Daftar Jenis Pegawai</a>
                            </li>
                            <li><a href="<?php echo base_url('admin/tbl_pendidikan') ?>">Daftar Pendidikan Pegawai</a>
                            </li>
                            <li><a href="<?php echo base_url('admin/tbl_jurusan') ?>">Daftar Jurusan/Prodi</a></li>
                            <li><a href="<?php echo base_url('admin/tbl_pekerjaan') ?>">Daftar Pekerjaan Pegawai</a>
                            </li>
                            <li><a href="<?php echo base_url('admin/tbl_keluarga') ?>">Daftar Keluarga</a></li>
                            <!-- <li><a href="<?php echo base_url('admin/tbl_status_menikah') ?>">Daftar Status
                                    Pernikahan</a></li> -->
                            <!-- <li><a href="<?php echo base_url('admin/tbl_agama') ?>">Daftar Agama</a></li> -->
                            <!-- <li><a href="<?php echo base_url('admin/tbl_jenis_kelamin') ?>">Daftar Jenis Kelamin</a>
                            </li> -->
                        </ul>
                    </li>
                    <br>
                    <li><a href="<?php echo base_url('auth/logout') ?>"><i class="fa fa-sign-out"></i> Logout </a>

                    </li>
                </ul>
            </div>
        </div>
        <?php } elseif ($this->session->userdata('level') == "pegawai") { ?>
        <!-- menu profile quick info -->

        <div class="profile clearfix">
            <div class="profile_pic">
                <img src="<?php echo base_url('assets/directory/foto pegawai/' . $foto_pegawai) ?>" alt="..."
                    class="img-circle profile_img">
            </div>
            <div class="profile_info">
                <span>Selamat Datang,</span>
                <h2><strong><?php echo ucfirst($username); ?></strong></h2>
            </div>
            <div class="clearfix"></div>
        </div>
        <!-- /menu profile quick info -->

        <br />
        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
                <h3>Menu Pegawai</h3>
                <ul class="nav side-menu">
                    <li><a><i class="fa fa-home"></i> Beranda <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="<?php echo base_url('pegawai/home') ?>">Halaman Utama</a></li>
                        </ul>
                    </li>
                    <li><a><i class="fa fa-home"></i> Profil Saya <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">

                            <li><a href="<?php echo base_url('pegawai/profil') ?>">Data Diri Pegawai</a></li>
                            <li><a href="<?php echo base_url('pegawai/keluarga') ?>">Riwayat Keluarga</a></li>
                            <li><a href="<?php echo base_url('pegawai/changepass') ?>">Ganti Password Akun</a></li>
                            <li><a href="<?php echo base_url('pegawai/change_username') ?>">Ganti Username Akun</a></li>
                        </ul>
                    </li>
                    <li><a><i class="fa fa-graduation-cap"></i> Riwayat Pendidikan dan Pelatihan <span
                                class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="<?php echo base_url('pegawai/pendidikan') ?>">Riwayat Pendidikan</a></li>
                            <li><a href="<?php echo base_url('pegawai/pelatihan') ?>">Riwayat Pelatihan</a></li>
                        </ul>
                    </li>
                    <li><a><i class="fa fa-folder"></i> Riwayat Pekerjaan dan Penghargaan <span
                                class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="<?php echo base_url('pegawai/kepangkatan') ?>">Lampiran SK Kepangkatan</a></li>
                            <li><a href="<?php echo base_url('pegawai/jabatan') ?>">Lampiran SK Jabatan</a></li>
                            <li><a href="<?php echo base_url('pegawai/penghargaan') ?>">Data Penghargaan atau Tanda
                                    Jasa</a></li>
                        </ul>
                    </li>

                    <br>
                    <li><a href="<?php echo base_url('auth/logout') ?>"><i class="fa fa-sign-out"></i> Logout </a>

                    </li>
                </ul>
            </div>
        </div>
        <?php } ?>