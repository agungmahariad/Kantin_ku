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
                            <li><a href="<?php echo base_url('c_penerimaan/dashboard'); ?>">Dashboard</a></li>
                            <li><a href="<?php echo base_url('c_penerimaan/kategori'); ?>">Input Kategori</a></li>
                            <li><a href="<?php echo base_url('c_penerimaan/makanan'); ?>">Input Makanan</a></li>
                            <li><a href="<?php echo base_url('c_penerimaan/pemasok'); ?>">Input Pemasok</a></li>
                            <li><a href="<?php echo base_url('c_penerimaan/barang'); ?>">Input Barang</a></li>
                            <li>
                                <a class="menu-top-active dropdown-toggle" data-toggle="dropdown" href="#">Penerimaan Uang
                                <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu" style="background-color: grey;"   >
                                    <li><a href="<?php echo base_url('c_penerimaan'); ?>">Penerimaan</a></li>
                                    <li><a href="<?php echo base_url('c_penerimaan/filter_penerimaan'); ?>">Filterisasi & Laporan</a></li>
                                </ul>
                            </li>
                            
                            <li>
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#">Pengeluaran Uang
                                <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu" style="background-color: grey;"   >
                                    <li><a href="<?php echo base_url('c_penerimaan/pengeluaran'); ?>">Pengeluaran</a></li>
                                    <li><a href="<?php echo base_url('c_penerimaan/filter_pengeluaran'); ?>">Filterisasi & Laporan</a></li>
                                </ul>
                            </li>
                            <li><a href="<?php echo base_url('c_penerimaan/logout'); ?>">Logout</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- MENU SECTION END-->

    <?php if ($input == FALSE): ?>

    <?php else: ?>
        <?php if ($edit == FALSE): ?>
            <form method="post" action="<?php echo base_url('c_penerimaan/inputdata'); ?>">
        <?php else: ?>
            <form method="post" action="<?php echo base_url('c_penerimaan/updatedata/').$edit['kd_barang']; ?>"></form>
        <?php endif ?>
    <?php endif ?>
    <div class="content-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="page-head-line" style="color: #0089FE; border-color: #0089FE;">Penerimaan Uang</h1>
                </div>
            </div>
            <!-- FORM INPUT KATEGORI -->
            <div class="row" style="margin: auto;">
                <div class="col-md-6">
                    <div class="form-group">
                        <fieldset>
                        </fieldset>
                    </div>
                </div>
            </div>
            <div class="panel-heading">Data Penerimaan</div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tanggal</th>
                                <th>Pemasok</th>
                                <th>Kategori</th>
                                <th>Nama</th>
                                <th>Harga Satuan</th>
                                <th>Harga Jual</th>
                                <th>Jumlah Makanan</th>
                                <th>Jumlah Penerimaan</th>
                                <?php if ($edit == FALSE): ?>
                                <?php else: ?>
                                    <th>Aksi</th>
                                <?php endif ?>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $no = 1 ?>
                        <?php if (count($datapenerima)): ?>
                            <?php foreach ($datapenerima as $row): ?>
                                <tr>
                                    <td><?php echo $no++ ?></td>
                                    <td><?php echo $row->tgl_pnrm; ?></td>
                                    <td><?php echo $row->nama_pemasok ?></td>
                                    <td><?php echo $row->nama_kategori ?></td>
                                    <td><?php echo $row->nama_makanan; ?></td>
                                    <td><?php echo $row->harga_satuan ?></td>
                                    <td><?php echo $row->harga_jual; ?></td>
                                    <td><?php echo $row->jumlah_makanan; ?></td>
                                    <input type="hidden" name="kd_barang<?php echo $no ?>" value="<?php echo $row->kd_barang ?>">
                                    <td>
                                    <?php if ($edit == FALSE): ?>
                                        <input type="number" value="<?php echo $row->jumlah_pnrm?>" class="form-control" name="uang<?php echo $no ?>">
                                    <?php else: ?>
                                        <?php echo $row->jumlah_pnrm ?>
                                    <?php endif ?>
                                    </td>
                                    <?php if ($edit == FALSE): ?>
                                    <?php else: ?>
                                    <td>
                                        <a href="<?php echo base_url('c_penerimaan/deletedata/').$row->kd_barang; ?>" class="btn btn-danger" name="delete">Hapus</a>
                                    </td>
                                    <?php endif; ?>
                                </tr>
                            <?php endforeach; ?>
                                <tr>
                                    <td colspan="8" align="right"><strong>Total Penerimaan</strong></td>
                                    <td colspan="2"><?php echo $total; ?></td>
                                </tr>   
                        <?php else: ?>
                            <tr>
                                <td colspan="10" align="center">Tidak Ada Data !</td>
                            </tr>
                        <?php endif; ?>
                        </tbody>
                    </table>
                    <?php if ($edit == FALSE): ?>
                        <button class="btn btn-info" name="input"><span class="glyphicon glyphicon-send"></span> Simpan Data</button>
                    <?php else: ?>
                        <a href="<?php echo base_url('c_penerimaan/inputuang'); ?>" class="btn btn-info">Input Data</a>
                    <?php endif ?>
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
    <!-- FOOTER SECTION END -->    

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

<script>

    <?php echo "var url = '".site_url()."';"; ?>

    $(document).ready(function(){
        $('#kategori').change(function(){
            if($(this).val() != ""){
                $.ajax({
                    url: url+'c_penerimaan/getMakanan/'+$(this).val(),
                    type: 'get',
                    dataType: 'html',
                    success: function(data){
                        $("#makanan").html(data);
                    },
                    error: function(e) {
                        alert(e);
                    }
                });
            }else{
                $("#makanan").html("<option value=''>Pilih Makanan</option>");
            }
        });
    });
</script>