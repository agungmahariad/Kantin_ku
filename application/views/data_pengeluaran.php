<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
    <link rel="icon" href="<?= base_url(); ?>assets/img/icon.png" sizes="32x32">
    <!-- BOOTSTRAP CORE STYLE  -->
    <link href="<?= base_url(); ?>assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONT AWESOME ICONS  -->
    <link href="<?= base_url(); ?>assets/css/font-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLE  -->
    <link href="<?= base_url(); ?>assets/css/style.css" rel="stylesheet" />
<body>
	<div class="row" style="margin: auto;">
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover" border="1">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tanggal</th>
                                <th>Kategori</th>
                                <th>Keterangan</th>
                                <th>Jumlah Pengeluaran</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (count($tampildata)): ?>
                                <?php $no=1;$sum=0; foreach ($tampildata as $row): ?>
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
                                    <td colspan="4" align="right"><strong>Total Pengeluaran</strong></td>
                                    <td><?php echo $sum; ?></td>
                                </tr>
                            <?php else: ?>
                                <tr>
                                    <td colspan="5" align="center">No Data Record !</td>
                                </tr>
                                <tr>
                                    <td colspan="4" align="right">Total Pengeluaran</td>
                                    <td align="center">-</td>
                                </tr>
                            <?php endif ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>
</html>