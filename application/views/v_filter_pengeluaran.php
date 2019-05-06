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
                            <li><a href="<?php echo base_url('c_filter_pengeluaran/dashboard'); ?>">Dashboard</a></li>
                            <li><a href="<?php echo base_url('c_filter_pengeluaran/kategori'); ?>">Input Kategori</a></li>
                            <li><a href="<?php echo base_url('c_filter_pengeluaran/makanan'); ?>">Input Makanan</a></li>
                            <li><a href="<?php echo base_url('c_filter_pengeluaran/pemasok'); ?>">Input Pemasok</a></li>
                            <li><a href="<?php echo base_url('c_filter_pengeluaran/barang'); ?>">Input Barang</a></li>
                            <li>
                            	<a class="dropdown-toggle" data-toggle="dropdown" href="#" >Penerimaan Uang
                            	<span class="caret"></span>
                            	</a>
                            	<ul class="dropdown-menu" style="background-color: grey;"	>
    								<li><a href="<?php echo base_url('c_filter_pengeluaran/penerimaan'); ?>">Penerimaan</a></li>
    								<li><a href="<?php echo base_url('c_filter_pengeluaran/filter_penerimaan'); ?>">Filterisasi & Laporan</a></li>
  								</ul>
                            </li>
                            
                            <li>
                            	<a class="menu-top-active dropdown-toggle" data-toggle="dropdown" href="#">Pengeluaran Uang
                            	<span class="caret"></span>
                            	</a>
                            	<ul class="dropdown-menu" style="background-color: grey;"	>
    								<li><a href="<?php echo base_url('c_filter_pengeluaran/pengeluaran'); ?>">Pengeluaran</a></li>
    								<li><a href="<?php echo base_url('c_filter_pengeluaran'); ?>">Filterisasi & Laporan</a></li>
  								</ul>
                            </li>
                            <li><a href="<?php echo base_url('c_filter_pengeluaran/logout'); ?>index.php">Logout</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- MENU SECTION END-->

    <form method="post" action="<?php echo base_url('c_filter_pengeluaran/filter');  ?>">
    <div class="content-wrapper">
        <div class="container">
            <div class="row">
               <div class="col-md-12">
                    <h1 class="page-head-line" style="color: #0089FE; border-color: #0089FE;">Filterisasi Pengeluaran Uang</h1>
                </div>
            </div>
            <!-- FORM INPUT KATEGORI -->

            <div class="row" style="margin: auto;">
                <div class="col-md-6">
                     <div class="form-group">
                        <label>Tanggal Pengeluaran Masuk : </label>
                        <input type="date" class="form-control" name="tgl_awal" />
                        <label>Tanggal Pengeluaran Keluar : </label>
                        <input type="date" class="form-control" name="tgl_akhir" />
                        <label>Kategori</label>
                        <select class="form-control" name="kd_kategori">
                            <option value="">Pilih Kategori</option>
                            <?php foreach ($datakategori as $row): ?>
                                <option value="<?php echo $row->kd_kategori; ?>"><?php echo $row->nama_kategori; ?></option>
                            <?php endforeach ?>
                        </select>
                        <hr>
                        <button href="#" class="btn btn-info"><span class="glyphicon glyphicon-send"></span> &nbsp;Filter</button>&nbsp;
                     </div>
                </div>
            </div>
    </form>
            <div class="panel-heading">
                <?php if ($awal == false): ?>
                    <?php if ($tampildata): ?>
                        <?php $berhasil = $this->session->flashdata('success'); ?>
                        <?php if ($berhasil): ?>
                            <div class="alert alert-info">
                                <span>Filterisasi Berhasil</span>
                            </div>            
                        <?php endif; ?>
                    <?php else: ?>
                        <?php $gagal = $this->session->flashdata('error'); ?>
                        <?php if ($gagal): ?>
                            <div class="alert alert-danger">
                                <span>Filterisasi Gagal</span>
                            </div>            
                        <?php endif ?>
                    <?php endif; ?>
                <?php else: ?>

                <?php endif; ?>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tanggal</th>
                                <th>Kategori</th>
                                <th>Keterangan</th>
                                <th>Jumlah Penerimaan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no=1;$sum=0;foreach ($tampildata as $row): ?>
                            <?php $sum = $sum + $row->jumlah_pnglrn; ?>
                                <tr>
                                    <td><?php echo $no++ ?></td>
                                    <td><?php echo $row->tgl_pnglrn ?></td>
                                    <td><?php echo $row->nama_kategori ?></td>
                                    <td><?php echo $row->keterangan ?></td>
                                    <td><?php echo $row->jumlah_pnglrn ?></td>
                                </tr>
                            <?php endforeach; ?>
                            <tr>
                                <td colspan="4" align="right"><strong>Total Penerimaan</strong></td>
                                <td><?php echo $sum ?></td>
                            </tr>
                        </tbody>
                    </table>
                <form method="post" action="<?= base_url('c_filter_pengeluaran/excel');  ?>">
                    <input type="hidden" name="tgl_awal" value="<?= $tgl_awal ?>">
                    <input type="hidden" name="tgl_akhir" value="<?= $tgl_akhir ?>">
                    <input type="hidden" name="kd_kategori" value="<?= $kategori  ?>">
                    <?php if ($tampildata): ?>
                        <button type="submit" class="btn btn-success" ><span class="glyphicon glyphicon-pencil"></span> &nbsp;Excel</button>&nbsp;
                    <?php else: ?>                        
                        <button type="submit" class="btn btn-success" disabled><span class="glyphicon glyphicon-pencil"></span> &nbsp;Excel</button>&nbsp;
                    <?php endif; ?>
                    
                </form>
                </div>
            </div>
        </div>
    </div>
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
