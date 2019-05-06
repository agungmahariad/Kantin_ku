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
                    <strong>Selamat Datang : <?php echo $nama_admin; ?></strong>
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
                            <li><a href="<?php echo base_url('c_pemasok/dashboard'); ?>">Dashboard</a></li>
                            <li><a href="<?php echo base_url('c_pemasok/kategori'); ?>">Input Kategori</a></li>
                            <li><a href="<?php echo base_url('c_pemasok/makanan'); ?>">Input Makanan</a></li>
                            <li><a class="menu-top-active" href="<?php echo base_url('c_pemasok') ?>">Input Pemasok</a></li>
                            <li><a href="<?php echo base_url('c_pemasok/barang'); ?>">Input Barang</a></li>
                            <li>
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#">Penerimaan Uang
                                <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu" style="background-color: grey;"   >
                                    <li><a href="<?php echo base_url('c_pemasok/penerimaan'); ?>">Penerimaan</a></li>
                                    <li><a href="<?php echo base_url('c_pemasok/filter_penerimaan'); ?>">Filterisasi & Laporan</a></li>
                                </ul>
                            </li>
                            
                            <li>
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#">Pengeluaran Uang
                                <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu" style="background-color: grey;"   >
                                    <li><a href="<?php echo base_url('c_pemasok/pengeluaran'); ?>">Pengeluaran</a></li>
                                    <li><a href="<?php echo base_url('c_pemasok/filter_pengeluaran'); ?>">Filterisasi & Laporan</a></li>
                                </ul>
                            </li>
                            <li><a href="<?php echo base_url('c_pemasok/logout'); ?>">Logout</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- MENU SECTION END-->
    
    <?php if ($edit == FALSE): ?>
        <form method="post" action="<?php echo base_url('c_pemasok/inputdata'); ?>">
    <?php else: ?>
        <form method="post" action="<?php echo base_url('c_pemasok/updatedata/'.$edit['kd_pemasok']) ?>">
    <?php endif; ?>
    <div class="content-wrapper">
        <div class="container">
             <div class="row">
                <div class="col-md-12">
                    <h1 class="page-head-line" style="color: #0089FE; border-color: #0089FE;">Pemasok</h1>
                </div>
            </div>

            <!-- FORM INPUT KATEGORI -->
            <div class="row" style="margin: auto;">
                <div class="col-md-6">
                    <label>Kode Pemasok</label>
                    <?php if ($edit == false): ?>
                    <input type="text" class="form-control" value="<?php echo $kode ?>" name="kd_pemasok" readonly />    
                    <?php else: ?>
                    <input type="text" class="form-control" value="<?php echo $edit['kd_pemasok'] ?>" name="kd_pemasok" readonly />
                    <?php endif ?>
                    
                    <label>Nama Pemasok</label>
                    <input type="text" class="form-control" value="<?= $edit['nama_pemasok']; ?>" name="pemasok" required />
                    <label>No Telepon</label>
                    <input type="number" class="form-control" value="<?= $edit['no_telepon']; ?>" name="telepon" required>
                    <label>Alamat</label>
                    <textarea class="form-control" name="alamat"><?php echo $edit['alamat']; ?></textarea>
                    <hr>
                        <?php if ($edit == FALSE): ?>
                            <button name="simpan" id="simpan" class="btn btn-info"><span class="glyphicon glyphicon-send"></span> &nbsp;Simpan</button>
                        <?php else: ?>
                            <button name="Update" id="update" class="btn btn-info"><span class="glyphicon glyphicon-send"></span> &nbsp;Update</button>
                            <a href="<?php echo base_url('c_pemasok'); ?>"  class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span> &nbsp;Batal</a>
                        <?php endif ?>
                </div>
            </div>
            <div class="panel-heading">Data Pemasok</div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>ID Pemasok</th>
                                <th>Nama Pemasok</th>
                                <th>No Telepon</th>
                                <th>Alamat</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $no = 1 ?>
                        <?php if (count($datapemasok)): ?>
                            <?php foreach ($datapemasok as $row): ?>
                                <tr>
                                    <td><?php echo $no++ ?></td>
                                    <td><?php echo $row->kd_pemasok; ?></td>
                                    <td><?php echo $row->nama_pemasok; ?></td>
                                    <td><?php echo $row->no_telepon; ?></td>
                                    <td><?php echo $row->alamat; ?></td>
                                    <td>
                                        <a href="<?php echo base_url('c_pemasok/editdata/').$row->kd_pemasok; ?>" class="btn btn-success">Ubah</a>
                                        <a href="<?php echo base_url('c_pemasok/deletedata/').$row->kd_pemasok; ?>" class="btn btn-danger">Hapus</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <td colspan="6" align="center">Tidak ada data !</td>
                        <?php endif ?>
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
    <script src="<?= base_url(); ?>assets/js/jquery-1.11.1.js"></script>
    <!-- BOOTSTRAP SCRIPTS  -->
    <script src="<?= base_url(); ?>assets/js/bootstrap.js"></script>
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