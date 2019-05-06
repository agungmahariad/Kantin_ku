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
    <link href="<?= base_url() ?>assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONT AWESOME ICONS  -->
    <link href="<?= base_url() ?>assets/css/font-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLE  -->
    <link href="<?= base_url() ?>assets/css/style.css" rel="stylesheet" />
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
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse" style="border: none;">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">
                    <img src="<?= base_url() ?>assets/img/round.png" style="width: 90%; margin-top: -30px;">
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
                            <li><a href="<?php echo base_url('c_pengeluaran/dashboard'); ?>">Dashboard</a></li>
                            <li><a href="<?php echo base_url('c_pengeluaran/kategori'); ?>">Input Kategori</a></li>
                            <li><a href="<?php echo base_url('c_pengeluaran/makanan'); ?>">Input Makanan</a></li>
                            <li><a href="<?php echo base_url('c_pengeluaran/pemasok'); ?>">Input Pemasok</a></li>
                            <li><a href="<?php echo base_url('c_pengeluaran/barang') ?>">Input Barang</a></li>
                            <li>
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#">Penerimaan Uang
                                <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu" style="background-color: grey;"   >
                                    <li><a href="<?php echo base_url('c_pengeluaran/penerimaan'); ?>">Penerimaan</a></li>
                                    <li><a href="<?php echo base_url('c_pengeluaran/filter_penerimaan'); ?>">Filterisasi & Laporan</a></li>
                                </ul>
                            </li>
                            
                            <li>
                                <a class="menu-top-active dropdown-toggle" data-toggle="dropdown" href="#">Pengeluaran Uang
                                <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu" style="background-color: grey;"   >
                                    <li><a href="<?php echo base_url('c_pengeluaran'); ?>">Pengeluaran</a></li>
                                    <li><a href="<?php echo base_url('c_pengeluaran/filter_pengeluaran'); ?>">Filterisasi & Laporan</a></li>
                                </ul>
                            </li>
                            <li><a href="<?php echo base_url('c_pengeluaran/logout'); ?>">Logout</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- MENU SECTION END-->

    <?php if ($edit == FALSE): ?>
        <form method="post" action="<?php echo base_url('c_pengeluaran/inputdata'); ?>">
    <?php else: ?>
        <form method="post" action="<?php echo base_url('c_pengeluaran/updatedata/').$edit['kd_pengeluaran']; ?>">
    <?php endif ?>
    <div class="content-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="page-head-line" style="color: #0089FE; border-color: #0089FE;">Pengeluaran Uang</h1>
                </div>
            </div>

            <!-- FORM INPUT KATEGORI -->
            <div class="row" style="margin: auto;">
                <div class="col-md-6">
                    <div class="form-group">
                        <?php if ($edit == false): ?>
                        <input type="hidden" name="kd_pengeluaran" value="<?php echo $kode ?>">
                        <?php else: ?>
                        <input type="hidden" name="kd_pengeluaran" value="<?php echo $edit['kd_pengeluaran'] ?>">
                        <?php endif ?>
                        
                        <label>Tanggal : </label>
                        <input type="date" class="form-control" name="tanggal" value="<?php echo $edit['tgl_pnglrn']; ?>" required />
                        <label>Kategori</label>
                        <select class="form-control" name="kategori" required>
                        <?php if ($edit == FALSE): ?>
                            <option value="">Pilih kategori</option>
                            <?php foreach ($datakategori as $row): ?>
                                <option value="<?php echo $row->kd_kategori; ?>"><?php echo $row->nama_kategori; ?></option> 
                            <?php endforeach ?>
                        <?php else: ?>
                            <option value="">Pilih kategori</option>
                            <?php foreach ($datakategori as $row): ?>
                                <?php if ($row->kd_kategori == $edit['kd_kategori']): ?>
                                    <option value="<?php echo $row->kd_kategori; ?>" selected><?php echo $row->nama_kategori; ?></option>
                                <?php else: ?>    
                                    <option value="<?php echo $row->kd_kategori; ?>"><?php echo $row->nama_kategori; ?></option>
                                <?php endif ?>
                            <?php endforeach ?>
                        <?php endif ?>
                        </select>
                        <label>Keterangan : </label>
                        <input type="text" class="form-control" name="keterangan" value="<?php echo $edit['keterangan']; ?>" required />
                        <label>Jumlah Pengeluaran : </label>
                        <input type="number" class="form-control" name="jumlah" value="<?php echo $edit['jumlah_pnglrn']; ?>" required/>
                        <hr>
                        <?php if ($edit == FALSE): ?>
                            <button class="btn btn-info" name="update"><span class="glyphicon glyphicon-send"></span> &nbsp;Simpan</button>&nbsp;
                        <?php else: ?>
                            <button class="btn btn-info"><span class="glyphicon glyphicon-send"></span> &nbsp;Update</button>&nbsp;
                            <a href="<?php echo base_url('c_pengeluaran') ?>" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span> &nbsp;Batal</a>&nbsp;
                        <?php endif ?>
                    </div>
                </div>
            </div>
            <div class="panel-heading">Data Pengeluaran</div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tanggal</th>
                                <th>Kategori</th>
                                <th>Keterangan</th>
                                <th>Jumlah Pengeluaran</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $no = 1 ?>
                        <?php if (count($datapengeluaran)): ?>
                            <?php foreach ($datapengeluaran as $row): ?>
                            <tr>
                                <td><?php echo $no++ ?></td>
                                <td><?php echo $row->tgl_pnglrn; ?></td>
                                <td><?php echo $row->nama_kategori; ?></td>
                                <td><?php echo $row->keterangan; ?></td>
                                <td><?php echo $row->jumlah_pnglrn; ?></td>
                                <td>
                                    <a href="<?php echo base_url('c_pengeluaran/editdata/').$row->kd_pengeluaran; ?>" class="btn btn-success" name="edit">Ubah</a>
                                    <a href="<?php echo base_url('c_pengeluaran/deletedata/').$row->kd_pengeluaran; ?>" class="btn btn-danger">Hapus</a>
                                </td>
                            </tr>    
                            <?php endforeach; ?>
                            <tr>
                                <td colspan="4" align="right"><strong>Total Pengeluaran</strong></td>
                                <?php if (count($total)): ?>
                                    <td colspan="2"><?php echo $total; ?></td>
                                <?php else: ?>
                                    <td colspan="2">-</td>
                                <?php endif; ?>
                            </tr>
                        <?php else: ?>
                            <tr>
                                <td colspan="6" align="center">Tidak Ada Data !</td>
                            </tr>
                        <?php endif; ?>
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