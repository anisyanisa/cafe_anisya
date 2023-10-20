-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 28, 2016 at 04:52 PM
-- Server version: 5.6.21
-- PHP Version: 5.5.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `lazara`
--

-- --------------------------------------------------------

--
-- Table structure for table `bahan`
--

CREATE TABLE IF NOT EXISTS `bahan` (
  `id_bahan` varchar(15) NOT NULL,
  `nama_bahan` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `bayar`
--

CREATE TABLE IF NOT EXISTS `bayar` (
  `no_transaksi` varchar(20) NOT NULL,
  `bayar` double NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bayar`
--

INSERT INTO `bayar` (`no_transaksi`, `bayar`, `status`) VALUES
('TRANS001', 100000, 'SELESAI');

-- --------------------------------------------------------

--
-- Table structure for table `beli_bahan`
--

CREATE TABLE IF NOT EXISTS `beli_bahan` (
  `id_transaksi` varchar(15) NOT NULL,
  `tgl_transaksi` date NOT NULL,
  `id_bahan` varchar(15) NOT NULL,
  `qty` int(11) NOT NULL,
  `harga_beli` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `kasir`
--

CREATE TABLE IF NOT EXISTS `kasir` (
  `kd_kasir` varchar(15) NOT NULL,
  `nik` varchar(18) NOT NULL,
  `nama_kasir` varchar(25) NOT NULL,
  `jekel` varchar(12) NOT NULL,
  `tempat_lahir` varchar(15) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat_kasir` text NOT NULL,
  `nohp_kasir` varchar(25) NOT NULL,
  `tgl_bergabung` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kasir`
--

INSERT INTO `kasir` (`kd_kasir`, `nik`, `nama_kasir`, `jekel`, `tempat_lahir`, `tanggal_lahir`, `alamat_kasir`, `nohp_kasir`, `tgl_bergabung`) VALUES
('P001', '123', 'anisya nugroho', 'Perempuan', 'Bukittinggi', '1991-07-05', 'Jl. Aru Jaya No. 1 RT 1 RW 3 L', '082386726226', '2010-02-12'),
('P002', '321', 'Pradipta', 'Laki-laki', 'Padang', '2016-01-30', 'Jl. Aru Jaya No. 1 RT 1 RW 3 Lubeg', '082386726226', '2012-09-12');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE IF NOT EXISTS `kategori` (
  `id_kategori` varchar(15) NOT NULL,
  `nama_kategori` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
('KTGR001', 'Makanan Basah'),
('KTGR003', 'Makanan Kering'),
('KTGR004', 'Minuman Keras'),
('KTGR005', 'Minuman Ringan');

-- --------------------------------------------------------

--
-- Table structure for table `meja`
--

CREATE TABLE IF NOT EXISTS `meja` (
  `no_meja` varchar(5) NOT NULL,
  `kapasitas` int(11) NOT NULL,
  `ket` varchar(15) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `meja`
--

INSERT INTO `meja` (`no_meja`, `kapasitas`, `ket`, `status`) VALUES
('01', 4, 'Reguler', 'Tersedia'),
('02', 4, 'Reguler', 'Tidak Tersedia'),
('03', 4, 'Reguler', 'Tersedia'),
('04', 4, 'Reguler', 'Tersedia'),
('05', 3, 'Reguler', 'Tidak Tersedia'),
('06', 3, 'Reguler', 'Tersedia'),
('07', 3, 'Reguler', 'Tersedia'),
('08', 4, 'Reguler', 'Tersedia'),
('09', 4, 'Reguler', 'Tersedia'),
('10', 3, 'Reguler', 'Tidak Tersedia'),
('11', 15, 'VIP Room', 'Tersedia');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE IF NOT EXISTS `menu` (
  `id_menu` varchar(10) NOT NULL,
  `nama_menu` varchar(25) NOT NULL,
  `harga` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id_menu`, `nama_menu`, `harga`) VALUES
('MENU001', 'Mie Rebus', 15000),
('MENU002', 'Mie Goreng Keriting', 15000),
('MENU003', 'Kangkung Tumis', 12000),
('MENU004', 'Fanta Susu', 12000);

-- --------------------------------------------------------

--
-- Table structure for table `menukategori`
--

CREATE TABLE IF NOT EXISTS `menukategori` (
  `id_menu` varchar(15) NOT NULL,
  `id_kategori` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menukategori`
--

INSERT INTO `menukategori` (`id_menu`, `id_kategori`) VALUES
('MENU001', 'KTGR001'),
('MENU002', 'KTGR003'),
('MENU003', 'KTGR001'),
('MENU004', 'KTGR005');

-- --------------------------------------------------------

--
-- Table structure for table `persediaan`
--

CREATE TABLE IF NOT EXISTS `persediaan` (
  `id_menu` varchar(15) NOT NULL,
  `tanggal` date NOT NULL,
  `stock` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `persediaan`
--

INSERT INTO `persediaan` (`id_menu`, `tanggal`, `stock`) VALUES
('MENU002', '2016-09-03', 20);

-- --------------------------------------------------------

--
-- Table structure for table `pesanan`
--

CREATE TABLE IF NOT EXISTS `pesanan` (
  `no_transaksi` varchar(15) NOT NULL,
  `tgl_transaksi` date NOT NULL,
  `id_menu` varchar(15) NOT NULL,
  `qty` int(11) NOT NULL,
  `no_meja` varchar(15) NOT NULL,
  `kd_kasir` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pesanan`
--

INSERT INTO `pesanan` (`no_transaksi`, `tgl_transaksi`, `id_menu`, `qty`, `no_meja`, `kd_kasir`) VALUES
('TRANS001', '2016-09-03', 'MENU001', 2, '01', 'Yelnovri'),
('TRANS001', '2016-09-03', 'MENU001', 3, '02', 'Yelnovri'),
('TRANS001', '2016-09-03', 'MENU001', 2, '03', 'Yelnovri'),
('TRANS001', '2016-09-03', 'MENU002', 2, '01', 'Yelnovri'),
('TRANS001', '2016-09-03', 'MENU002', 3, '02', 'Yelnovri'),
('TRANS001', '2016-09-03', 'MENU002', 2, '03', 'Yelnovri'),
('TRANS001', '2016-09-03', 'MENU003', 2, '01', 'Yelnovri');

-- --------------------------------------------------------

--
-- Table structure for table `pesanan_temp`
--

CREATE TABLE IF NOT EXISTS `pesanan_temp` (
  `no_transaksi` varchar(15) NOT NULL,
  `tgl_transaksi` date NOT NULL,
  `id_menu` varchar(15) NOT NULL,
  `qty` int(11) NOT NULL,
  `no_meja` varchar(15) NOT NULL,
  `kd_kasir` varchar(15) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pesanan_temp`
--

INSERT INTO `pesanan_temp` (`no_transaksi`, `tgl_transaksi`, `id_menu`, `qty`, `no_meja`, `kd_kasir`, `status`) VALUES
('TRANS001', '2016-09-09', 'MENU001', 1, '02', 'Yelnovri', 'BELUM SELESAI'),
('TRANS002', '2016-09-21', 'MENU001', 1, '05', 'Yelnovri', 'BELUM SELESAI');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `iduser` char(20) NOT NULL,
  `namauser` varchar(30) DEFAULT NULL,
  `username` varchar(20) DEFAULT NULL,
  `password` varchar(10) DEFAULT NULL,
  `level` char(16) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`iduser`, `namauser`, `username`, `password`, `level`) VALUES
('U001', 'Yelnovri', 'admin', 'admin', 'superuser'),
('U002', 'suharti', 'wati', 'wati', 'pelayanan'),
('U003', 'wawan suherman', 'wawan', 'wawan', 'admin_pembayaran'),
('U004', 'robi candra', 'robi', 'robi', 'pimpinan'),
('U005', 'wiwi karmila', 'wiwi', 'wiwi', 'admin'),
('U006', 'anisya', 'anisya', 'anisya', 'kasir');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bahan`
--
ALTER TABLE `bahan`
 ADD PRIMARY KEY (`id_bahan`);

--
-- Indexes for table `bayar`
--
ALTER TABLE `bayar`
 ADD PRIMARY KEY (`no_transaksi`);

--
-- Indexes for table `beli_bahan`
--
ALTER TABLE `beli_bahan`
 ADD PRIMARY KEY (`id_transaksi`,`id_bahan`);

--
-- Indexes for table `kasir`
--
ALTER TABLE `kasir`
 ADD PRIMARY KEY (`kd_kasir`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
 ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `meja`
--
ALTER TABLE `meja`
 ADD PRIMARY KEY (`no_meja`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
 ADD PRIMARY KEY (`id_menu`);

--
-- Indexes for table `menukategori`
--
ALTER TABLE `menukategori`
 ADD PRIMARY KEY (`id_menu`,`id_kategori`);

--
-- Indexes for table `persediaan`
--
ALTER TABLE `persediaan`
 ADD PRIMARY KEY (`id_menu`,`tanggal`);

--
-- Indexes for table `pesanan`
--
ALTER TABLE `pesanan`
 ADD PRIMARY KEY (`no_transaksi`,`tgl_transaksi`,`id_menu`,`no_meja`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
