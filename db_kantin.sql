-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 02, 2019 at 02:21 PM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_kantin`
--

-- --------------------------------------------------------

--
-- Stand-in structure for view `q_penerimaan`
-- (See below for the actual view)
--
CREATE TABLE `q_penerimaan` (
`kd_barang` varchar(6)
,`kd_kategori` varchar(6)
,`nama_kategori` varchar(100)
,`kd_makanan` varchar(6)
,`nama_makanan` varchar(100)
,`kd_pemasok` varchar(6)
,`nama_pemasok` varchar(100)
,`harga_satuan` int(11)
,`harga_jual` int(11)
,`jumlah_makanan` int(11)
,`jumlah_pnrm` int(11)
,`tgl_pnrm` date
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `q_pengeluaran`
-- (See below for the actual view)
--
CREATE TABLE `q_pengeluaran` (
`kd_pengeluaran` varchar(6)
,`kd_kategori` varchar(6)
,`nama_kategori` varchar(100)
,`keterangan` text
,`jumlah_pnglrn` int(100)
,`tgl_pnglrn` date
);

-- --------------------------------------------------------

--
-- Table structure for table `tb_barang`
--

CREATE TABLE `tb_barang` (
  `kd_barang` varchar(6) NOT NULL,
  `kd_pemasok` varchar(6) NOT NULL,
  `kd_kategori` varchar(6) NOT NULL,
  `kd_makanan` varchar(6) NOT NULL,
  `harga_satuan` int(11) NOT NULL,
  `harga_jual` int(11) NOT NULL,
  `jumlah_makanan` int(11) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_barang`
--

INSERT INTO `tb_barang` (`kd_barang`, `kd_pemasok`, `kd_kategori`, `kd_makanan`, `harga_satuan`, `harga_jual`, `jumlah_makanan`, `tanggal`) VALUES
('KB0001', 'KP0001', 'KK0001', 'KM0001', 800, 1000, 50, '2018-06-01'),
('KB0002', 'KP0001', 'KK0002', 'KM0003', 900, 1000, 50, '2018-06-01'),
('KB0003', 'KP0002', 'KK0001', 'KM0002', 1800, 2000, 2000, '2018-06-02'),
('KB0004', 'KP0005', 'KK0004', 'KM0007', 900, 1000, 10, '2018-07-03');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kategori`
--

CREATE TABLE `tb_kategori` (
  `kd_kategori` varchar(6) NOT NULL,
  `nama_kategori` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_kategori`
--

INSERT INTO `tb_kategori` (`kd_kategori`, `nama_kategori`) VALUES
('KK0001', 'Makanan'),
('KK0002', 'Minuman'),
('KK0003', 'Barang');

-- --------------------------------------------------------

--
-- Table structure for table `tb_makanan`
--

CREATE TABLE `tb_makanan` (
  `kd_makanan` varchar(6) NOT NULL,
  `kd_kategori` varchar(6) NOT NULL,
  `nama_makanan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_makanan`
--

INSERT INTO `tb_makanan` (`kd_makanan`, `kd_kategori`, `nama_makanan`) VALUES
('KM0001', 'KK0001', 'Bakpau'),
('KM0002', 'KK0001', 'Roti'),
('KM0003', 'KK0002', 'Teh Manis'),
('KM0004', 'KK0002', 'Susu'),
('KM0005', 'KK0003', 'Piring'),
('KM0006', 'KK0003', 'Gelas'),
('KM0007', 'KK0004', 'makanan enak');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pemasok`
--

CREATE TABLE `tb_pemasok` (
  `kd_pemasok` varchar(6) NOT NULL,
  `nama_pemasok` varchar(100) NOT NULL,
  `no_telepon` varchar(15) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pemasok`
--

INSERT INTO `tb_pemasok` (`kd_pemasok`, `nama_pemasok`, `no_telepon`, `alamat`) VALUES
('KP0001', 'Agung Mahariyad', '085885559424', 'Pasir Muncang'),
('KP0002', 'Ahmad Rahbar', '088808718305', 'Pasir Muncang\r\n'),
('KP0003', 'Daniel Alex Syarif', '089889998778', 'Cibedug'),
('KP0004', 'Davi Jordani Setiawan', '08678767878767', 'Cisarua'),
('KP0005', 'kami', '08112233445566', 'dirumah');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pnglrn_uang`
--

CREATE TABLE `tb_pnglrn_uang` (
  `kd_pengeluaran` varchar(6) NOT NULL,
  `kd_kategori` varchar(6) NOT NULL,
  `keterangan` text NOT NULL,
  `jumlah_pnglrn` int(100) NOT NULL,
  `tgl_pnglrn` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pnglrn_uang`
--

INSERT INTO `tb_pnglrn_uang` (`kd_pengeluaran`, `kd_kategori`, `keterangan`, `jumlah_pnglrn`, `tgl_pnglrn`) VALUES
('KP0001', 'KK0001', 'abis', 10000, '2018-06-01'),
('KP0002', 'KK0002', 'Lagi gak haus', 100, '2018-06-01'),
('KP0003', 'KK0001', 'kenyang', 50, '2018-06-02'),
('KP0004', 'KK0004', 'ga laku', 10, '2018-07-03');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pnrm_uang`
--

CREATE TABLE `tb_pnrm_uang` (
  `kd_barang` varchar(6) NOT NULL,
  `kd_pemasok` varchar(6) NOT NULL,
  `kd_kategori` varchar(6) NOT NULL,
  `kd_makanan` varchar(6) NOT NULL,
  `harga_satuan` int(11) NOT NULL,
  `harga_jual` int(11) NOT NULL,
  `jumlah_makanan` int(11) NOT NULL,
  `jumlah_pnrm` int(11) NOT NULL,
  `tgl_pnrm` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pnrm_uang`
--

INSERT INTO `tb_pnrm_uang` (`kd_barang`, `kd_pemasok`, `kd_kategori`, `kd_makanan`, `harga_satuan`, `harga_jual`, `jumlah_makanan`, `jumlah_pnrm`, `tgl_pnrm`) VALUES
('KB0001', 'KP0001', 'KK0001', 'KM0001', 800, 1000, 50, 50000, '2018-06-01'),
('KB0002', 'KP0001', 'KK0002', 'KM0003', 900, 1000, 50, 50001, '2018-06-01'),
('KB0003', 'KP0002', 'KK0001', 'KM0002', 1800, 2000, 2000, 40000, '2018-06-02'),
('KB0004', 'KP0005', 'KK0004', 'KM0007', 900, 1000, 10, 10000, '2018-07-03');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `nama` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`nama`, `username`, `password`) VALUES
('Sherlock Holmes', 'admin', 'admin1');

-- --------------------------------------------------------

--
-- Structure for view `q_penerimaan`
--
DROP TABLE IF EXISTS `q_penerimaan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `q_penerimaan`  AS  select `tb_barang`.`kd_barang` AS `kd_barang`,`tb_kategori`.`kd_kategori` AS `kd_kategori`,`tb_kategori`.`nama_kategori` AS `nama_kategori`,`tb_makanan`.`kd_makanan` AS `kd_makanan`,`tb_makanan`.`nama_makanan` AS `nama_makanan`,`tb_pemasok`.`kd_pemasok` AS `kd_pemasok`,`tb_pemasok`.`nama_pemasok` AS `nama_pemasok`,`tb_pnrm_uang`.`harga_satuan` AS `harga_satuan`,`tb_pnrm_uang`.`harga_jual` AS `harga_jual`,`tb_pnrm_uang`.`jumlah_makanan` AS `jumlah_makanan`,`tb_pnrm_uang`.`jumlah_pnrm` AS `jumlah_pnrm`,`tb_pnrm_uang`.`tgl_pnrm` AS `tgl_pnrm` from ((((`tb_pnrm_uang` join `tb_barang` on((`tb_barang`.`kd_barang` = `tb_pnrm_uang`.`kd_barang`))) join `tb_kategori` on((`tb_kategori`.`kd_kategori` = `tb_pnrm_uang`.`kd_kategori`))) join `tb_makanan` on((`tb_makanan`.`kd_makanan` = `tb_pnrm_uang`.`kd_makanan`))) join `tb_pemasok` on((`tb_pemasok`.`kd_pemasok` = `tb_pnrm_uang`.`kd_pemasok`))) ;

-- --------------------------------------------------------

--
-- Structure for view `q_pengeluaran`
--
DROP TABLE IF EXISTS `q_pengeluaran`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `q_pengeluaran`  AS  select `tb_pnglrn_uang`.`kd_pengeluaran` AS `kd_pengeluaran`,`tb_kategori`.`kd_kategori` AS `kd_kategori`,`tb_kategori`.`nama_kategori` AS `nama_kategori`,`tb_pnglrn_uang`.`keterangan` AS `keterangan`,`tb_pnglrn_uang`.`jumlah_pnglrn` AS `jumlah_pnglrn`,`tb_pnglrn_uang`.`tgl_pnglrn` AS `tgl_pnglrn` from (`tb_pnglrn_uang` join `tb_kategori` on((`tb_pnglrn_uang`.`kd_kategori` = `tb_kategori`.`kd_kategori`))) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_barang`
--
ALTER TABLE `tb_barang`
  ADD PRIMARY KEY (`kd_barang`);

--
-- Indexes for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  ADD PRIMARY KEY (`kd_kategori`);

--
-- Indexes for table `tb_makanan`
--
ALTER TABLE `tb_makanan`
  ADD PRIMARY KEY (`kd_makanan`);

--
-- Indexes for table `tb_pemasok`
--
ALTER TABLE `tb_pemasok`
  ADD PRIMARY KEY (`kd_pemasok`);

--
-- Indexes for table `tb_pnglrn_uang`
--
ALTER TABLE `tb_pnglrn_uang`
  ADD PRIMARY KEY (`kd_pengeluaran`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`nama`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
