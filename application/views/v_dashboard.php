<?php 
    if ($nama_admin == null) {
        echo "<script>alert('Masuk Dulu !')</script>";
        redirect('c_login','refresh');
    }
 ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Kantin.Ku</title>
    <!-- ICON -->
    <link rel="icon" href="<?= base_url(); ?>assets/img/icon.png" sizes="32x32">
    <!-- BOOTSTRAP CORE STYLE  -->
    <link href="<?= base_url()  ?>assets/css/bootstrap.css" rel="stylesheet"/>
    <!-- FONT AWESOME ICONS  -->
    <link href="<?= base_url()  ?>assets/css/font-awesome.css" rel="stylesheet"/>
    <!-- CUSTOM STYLE  -->
    <link href="<?= base_url()  ?>assets/css/style.css" rel="stylesheet" />
</head>
<body>
    <header style="background: #085170;">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <strong>Selamat Datang : <?php echo @$nama_admin ?></strong>
                </div>
            </div>
        </div>
    </header>
    <!-- HEADER END-->

    <div class="navbar navbar-inverse set-radius-zero" style="height: 132px; background: linear-gradient(141deg, #0089FE 0%, #1FB8DB 51%, #29E491 75%);">
        <div class="container">
            <div class="navbar-header">
                <a class="navbar-brand" href="#">
                    <img src="<?= base_url()  ?>assets/img/round.png" style="width: 90%; margin-top: -30px;">
                </a>
            </div>
        </div>
    </div>
    <!-- LOGO HEADER END-->

    <section class="menu-section"
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="navbar-collapse collapse ">
                        <ul id="menu-top" class="nav navbar-nav navbar-right">
                            <li><a class="menu-top-active" href="<?php echo base_url('c_dashboard'); ?>">Dashboard</a></li>
                            <li><a href="<?php echo base_url('c_dashboard/kategori'); ?>">Input Kategori</a></li>
                            <li><a href="<?php echo base_url('c_dashboard/makanan'); ?>">Input makanan</a></li>
                            <li><a href="<?php echo base_url('c_dashboard/pemasok'); ?>">Input Pemasok</a></li>
                            <li><a href="<?php echo base_url('c_dashboard/barang') ?>">Input Barang</a></li>
                            <li>
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#">Penerimaan Uang
                                <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu" style="background-color: grey;"   >
                                    <li><a href="<?php echo base_url('c_dashboard/penerimaan'); ?>">Penerimaan</a></li>
                                    <li><a href="<?php echo base_url('c_dashboard/filter_penerimaan'); ?>">Filterisasi & Laporan</a></li>
                                </ul>
                            </li>
                            
                            <li>
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#">Pengeluaran Uang
                                <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu" style="background-color: grey;"   >
                                    <li><a href="<?php echo base_url('c_dashboard/pengeluaran'); ?>">Pengeluaran</a></li>
                                    <li><a href="<?php echo base_url('c_dashboard/filter_pengeluaran'); ?>">Filterisasi & Laporan</a></li>
                                </ul>
                            </li>
                            <li><a href="<?php echo base_url('c_dashboard/logout'); ?>">Logout</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- MENU SECTION END-->

    <div class="content-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4 class="page-head-line" style="color: #0089FE; border-color: #0089FE;">Dashboard</h4>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="alert alert-success">
                        Dashboard Ini Mununjukan Cara Dan Informasi Tentang Penggunaan Kantin.Ku
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3 col-sm-3 col-xs-6">
                    <div class="dashboard-div-wrapper bk-clr-one">
                        <i  class="glyphicon glyphicon-th-list dashboard-div-icon"></i>
                        <br>
                        <span>
                            Dalam Dashboard "Kategori" Admin Dapat Membuat Sebuah Kategori Dimana Akan Digunakan Pada Dashboard "Input makanan"
                        </span>
                        <div class="progress progress-striped active">
                            <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%;">
                            </div>
                        </div>
                        <a href="<?php echo base_url('c_dashboard/kategori'); ?>" style="color: white;" ><h5>Kategori</h5></a>
                    </div>
                </div>
                <div class="col-md-3 col-sm-3 col-xs-6">
                    <div class="dashboard-div-wrapper bk-clr-two">
                        <i  class=" glyphicon glyphicon-barcode dashboard-div-icon" ></i>
                        <br>
                        <span>
                            Dalam Dashboard "Input makanan" Admin Dapat Mengkategorikan Sebuah makanan Agar makanan Tersusun Rapih Dalam Sebuah Data Tabel
                        </span>
                        <div class="progress progress-striped active">
                            <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width: 70%">
                            </div>
                        </div>
                        <a href="<?php echo base_url('c_dashboard/makanan'); ?>" style="color: white;"><h5>Kode makanan </h5></a>
                    </div>
                </div>
                <div class="col-md-3 col-sm-3 col-xs-6">
                    <div class="dashboard-div-wrapper bk-clr-three">
                        <i  class="glyphicon glyphicon-import dashboard-div-icon" ></i>
                        <br>
                        <span>
                            Dalam Dashboard "Penerimaan Uang" Admin Dapat Mengelola Penerimaan Uang Berdasarkan Tanggal Awal Hingga Tanggal Akhir Berdasarkan Kategori,Dan Dapat Mengetahui Jumlah Total Penerimaan
                        </span>
                        <div class="progress progress-striped active">
                            <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                            </div>
                        </div>
                        <a href="<?php echo base_url('c_dashboard/penerimaan'); ?>" style="color: white;"><h5>Penerimaan Uang </h5></a>
                    </div>
                </div>
                <div class="col-md-3 col-sm-3 col-xs-6">
                    <div class="dashboard-div-wrapper bk-clr-four">
                        <i  class="glyphicon glyphicon-export dashboard-div-icon" ></i>
                        <br>
                        <span>
                            Dalam Dashboard "Pengeluaran Uang" Admin Dapat Mengelola Pengeluaran Uang Berasarkan Tanggal Awal Hingga Tanggal Akhir Berdasarkan Kategori,Dan Dapat Mengetahui Jumlah Total Pengeluaran
                        </span>
                        <div class="progress progress-striped active">
                            <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: 50%">
                            </div>
                        </div>
                        <a href="<?php echo base_url('c_dashboard/pengeluaran'); ?>" style="color: white;"><h5>Pengeluaran Uang </h5></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- CONTENT-WRAPPER SECTION END-->

    <footer style="background: #0089FE;">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    &copy 2018 RPL XI-4 | By : <a href="http://www.youtube.com/" target="_blank">Tim4One</a>
                </div>
            </div>
        </div>
    </footer>
    <!-- FOOTER SECTION END-->

    <!-- CORE JQUERY SCRIPTS -->
    <script src="<?= base_url()  ?>assets/js/jquery-1.11.1.js"></script>
    <!-- BOOTSTRAP SCRIPTS  -->
    <script src="<?= base_url()  ?>assets/js/bootstrap.js"></script>
</body>
</html>
<style>
    body{
        overflow-x: hidden;
    }
    ::-webkit-scrollbar{
        width: 8px;
    }
    ::-webkit-scrollbar-thumb{
        background-color: #0089FE;
        border-radius: 10px;
    }
    ::-webkit-scrollbar-track{
        background-color: white;
    }
</style>
