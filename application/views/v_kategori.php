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
    <link href="<?= base_url(); ?>assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONT AWESOME ICONS  -->
    <link href="<?= base_url(); ?>assets/css/font-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLE  -->
    <link href="<?= base_url(); ?>assets/css/style.css" rel="stylesheet" />
</head>
<body>
    <header style="background: #085170;">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <strong>Selamat Datang : <?php echo @$nama_admin; ?></strong>
                </div>
            </div>
        </div>
    </header>
    <!-- HEADER END-->

    <div class="navbar navbar-inverse set-radius-zero" style="height: 132px; background: linear-gradient(141deg, #0089FE 0%, #1FB8DB 51%, #29E491 75%);">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse" style="border: none;">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">
                    <img src="<?= base_url(); ?>assets/img/round.png" style="width: 90%; margin-top: -30px;">
                </a>
            </div>
        </div>
    </div>
    <!-- LOGO HEADER END-->

    <section class="menu-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="navbar-collapse collapse ">
                        <ul id="menu-top" class="nav navbar-nav navbar-right">
                            <li><a href="<?php echo base_url('c_kategori/dashboard'); ?>">Dashboard</a></li>
                            <li><a class="menu-top-active" href="<?php echo base_url('c_kategori'); ?>">Input Kategori</a></li>
                            <li><a href="<?php echo base_url('c_kategori/makanan'); ?>">Input Makanan</a></li>
                            <li><a href="<?php echo base_url('c_kategori/pemasok'); ?>">Input Pemasok</a></li>
                            <li><a href="<?php echo base_url('c_kategori/barang'); ?>">Input Barang</a></li>
                            <li>
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#">Penerimaan Uang
                                <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu" style="background-color: grey;"   >
                                    <li><a href="<?php echo base_url('c_kategori/penerimaan'); ?>">Penerimaan</a></li>
                                    <li><a href="<?php echo base_url('c_kategori/filter_penerimaan'); ?>">Filterisasi & Laporan</a></li>
                                </ul>
                            </li>
                            
                            <li>
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#">Pengeluaran Uang
                                <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu" style="background-color: grey;"   >
                                    <li><a href="<?php echo base_url('c_kategori/pengeluaran'); ?>">Pengeluaran</a></li>
                                    <li><a href="<?php echo base_url('c_kategori/filter_pengeluaran'); ?>">Filterisasi & Laporan</a></li>
                                </ul>
                            </li>
                            <li><a href="<?php echo base_url('c_kategori/logout'); ?>">Logout</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- MENU SECTION END-->

    <?php if ($edit == FALSE): ?>
        <form method="post" action="<?php echo base_url('c_kategori/inputdata') ?>">
    <?php else: ?>
        <form method="post" action="<?php echo base_url('c_kategori/updatedata/'.$edit['kd_kategori']) ?>">
    <?php endif; ?>
    <div class="content-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="page-head-line" style="color: #0089FE; border-color: #0089FE;">Data Kategori</h1>
                </div>
            </div> 
            <!-- INPUT KATEGORI -->
            <div class="row" style="margin: auto;">
                <div class="col-md-6">
                    <label>Kode Kategori</label>
                    <?php if ($edit == false): ?>
                        <input type="text" class="form-control" name="kd_kategori" value="<?php echo $kode ?>" readonly>
                    <?php else: ?>
                        <input type="text" class="form-control" name="kd_kategori" value="<?php echo $edit['kd_kategori'] ?>" readonly>
                    <?php endif ?>
                    
                    <label>Nama Kategori</label>
                    <input type="text" class="form-control" name="nama_kategori" required value="<?= $edit['nama_kategori'] ?>">
                    <hr/>
                    <?php if ($edit == FALSE): ?>
                        <button name="simpan" id="simpan" class="btn btn-info"><span class="glyphicon glyphicon-send"></span> &nbsp;Simpan</button>
                    <?php else: ?>
                        <button name="update" id="update" class="btn btn-info"><span class="glyphicon glyphicon-send"></span> &nbsp;Update</button>
                        <a href="<?php echo base_url('c_kategori'); ?>"  class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span> &nbsp;Batal</a>
                    <?php endif; ?>
                </div>
            </div>
            <div class="panel-heading">
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>ID Kategori</th>
                                <th>Nama Kategori</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $no = 1; ?>
                        <?php if (count($tampildata)){ ?>
                            <?php foreach ($tampildata as $row): ?>
                                <tr>
                                    <td><?php echo $no++ ?></td>
                                    <td><?php echo $row->kd_kategori ?></td>
                                    <td><?php echo $row->nama_kategori ?></td>
                                    <td>
                                        <a href="<?php echo base_url('c_kategori/editdata/').$row->kd_kategori ?>" class="btn btn-success">Ubah</a>
                                        <a href="<?php echo base_url('c_kategori/deletedata/').$row->kd_kategori ?>" class="btn btn-danger">Hapus</a>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        <?php }else{ ?>
                            <td colspan="5" align="center">Tidak Ada Data !</td>
                        <?php } ?>
                        </tbody>
                    </table>
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
                    &copy 2018 RPL XI-4 | By : <a href="http://www.designbootstrap.com/" target="_blank">Tim4One</a>
                </div>
            </div>
        </div>
    </footer>
    <!-- FOOTER SECTION END-->

    <!-- CORE JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.11.1.js"></script>
    <!-- BOOTSTRAP SCRIPTS  -->
    <script src="assets/js/bootstrap.js"></script>
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
