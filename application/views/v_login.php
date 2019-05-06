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
    <link href="<?= base_url() ?>assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONT AWESOME ICONS  -->
    <link href="<?= base_url() ?>assets/css/font-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLE  -->
    <link href="<?= base_url() ?>assets/css/style.css" rel="stylesheet" />
</head>
<body>
    <header style="background: #085170;">
        <div class="container">
            <center><span style="font-family: bebas; font-size: 15px;">Kantin.Ku</span></center>
        </div>
    </header>
    <!-- HEADER END-->
    <div class="navbar navbar-inverse set-radius-zero" style="background: linear-gradient(141deg, #0089FE 0%, #1FB8DB 51%, #29E491 75%); height: 200px;">
        <div class="container">
            <div class="navbar-header">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <a class="navbar-brand" href="index.html">
                    <img src="<?= base_url() ?>assets/img/round.png" style="width: 120%; margin-top: -20px;">
                </a>
            </div>
        </div>
    </div>
    <!-- LOGO HEADER END-->

    <form method="post" action="<?php echo base_url('c_login/login') ?>">
    <div class="content-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4 class="page-head-line" style="color: #0089FE; border-color: #0089FE;">Silahkan Login</h4>
                </div>
            </div>
            <div class="row" style="margin-top: 8%;">
                <div class="col-md-6">
                    <label>Username</label>
                    <input type="text" class="form-control" name="username" id="username" />
                    <label>Password</label>
                    <input type="password" class="form-control" name="password" id="password" />
                    <hr>
                    <button type="submit" name="login" class="btn btn-info" id="login"><span class="glyphicon glyphicon-user"></span> &nbsp;Log In</button>&nbsp;
                </div>
                <div class="col-md-6">
                    <div class="alert alert-success">
                        <strong> Fungsi Program:</strong>
                        <ul>
                            <li>Menginput Kategori Barang</li>
                            <li>Menginput Nama Barang</li>
                            <li>Menginput & Filterisasi Laporan Penerimaan</li>
                            <li>Menginput & Filterisasi Laporan Pengeluaran</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </form>
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
    <script src="<?= base_url() ?>assets/js/jquery-1.11.1.js"></script>
    <!-- BOOTSTRAP SCRIPTS  -->
    <script src="<?= base_url() ?>assets/js/bootstrap.js"></script>
</body>
</html>
<style>
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