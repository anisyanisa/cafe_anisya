-- MySQL Administrator dump 1.4
--
-- ------------------------------------------------------
-- Server version	5.6.21


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


--
-- Create schema cafe_anisya
--

CREATE DATABASE IF NOT EXISTS cafe_anisya;
USE cafe_anisya;

--
-- Temporary table structure for view `pesananperbulan`
--
DROP TABLE IF EXISTS `pesananperbulan`;
DROP VIEW IF EXISTS `pesananperbulan`;
CREATE TABLE `pesananperbulan` (
  `tgl` date,
  `jlh` decimal(32,0),
  `total` double
);

--
-- Temporary table structure for view `pesananpertanggal`
--
DROP TABLE IF EXISTS `pesananpertanggal`;
DROP VIEW IF EXISTS `pesananpertanggal`;
CREATE TABLE `pesananpertanggal` (
  `tgl` date,
  `jlh` int(11),
  `harga` double,
  `total` double,
  `id_menu` varchar(15)
);

--
-- Definition of table `bahan`
--

DROP TABLE IF EXISTS `bahan`;
CREATE TABLE `bahan` (
  `id_bahan` varchar(15) NOT NULL,
  `nama_bahan` varchar(25) NOT NULL,
  PRIMARY KEY (`id_bahan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bahan`
--

/*!40000 ALTER TABLE `bahan` DISABLE KEYS */;
SET AUTOCOMMIT=0;
INSERT INTO `bahan` (`id_bahan`,`nama_bahan`) VALUES 
 ('BHN001','Kecap Manis'),
 ('BHN002','Mie Kuning');
COMMIT;
/*!40000 ALTER TABLE `bahan` ENABLE KEYS */;


--
-- Definition of table `bayar`
--

DROP TABLE IF EXISTS `bayar`;
CREATE TABLE `bayar` (
  `no_transaksi` varchar(20) NOT NULL,
  `bayar` double NOT NULL,
  `status` varchar(20) NOT NULL,
  PRIMARY KEY (`no_transaksi`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bayar`
--

/*!40000 ALTER TABLE `bayar` DISABLE KEYS */;
SET AUTOCOMMIT=0;
INSERT INTO `bayar` (`no_transaksi`,`bayar`,`status`) VALUES 
 ('TRANS001',60000,'SELESAI'),
 ('TRANS002',17000,'SELESAI');
COMMIT;
/*!40000 ALTER TABLE `bayar` ENABLE KEYS */;


--
-- Definition of table `belibahan`
--

DROP TABLE IF EXISTS `belibahan`;
CREATE TABLE `belibahan` (
  `tgl_transaksi` date NOT NULL,
  `id_bahan` varchar(15) NOT NULL,
  `qty` int(11) NOT NULL,
  `id_satuan` varchar(20) NOT NULL,
  `harga_beli` double NOT NULL,
  PRIMARY KEY (`tgl_transaksi`,`id_bahan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `belibahan`
--

/*!40000 ALTER TABLE `belibahan` DISABLE KEYS */;
SET AUTOCOMMIT=0;
INSERT INTO `belibahan` (`tgl_transaksi`,`id_bahan`,`qty`,`id_satuan`,`harga_beli`) VALUES 
 ('2016-09-29','BHN001',4,'SAT001',20000);
COMMIT;
/*!40000 ALTER TABLE `belibahan` ENABLE KEYS */;


--
-- Definition of table `kasir`
--

DROP TABLE IF EXISTS `kasir`;
CREATE TABLE `kasir` (
  `kd_kasir` varchar(15) NOT NULL,
  `nik` varchar(18) NOT NULL,
  `nama_kasir` varchar(25) NOT NULL,
  `jekel` varchar(12) NOT NULL,
  `tempat_lahir` varchar(15) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat_kasir` text NOT NULL,
  `nohp_kasir` varchar(25) NOT NULL,
  `tgl_bergabung` date NOT NULL,
  PRIMARY KEY (`kd_kasir`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kasir`
--

/*!40000 ALTER TABLE `kasir` DISABLE KEYS */;
SET AUTOCOMMIT=0;
INSERT INTO `kasir` (`kd_kasir`,`nik`,`nama_kasir`,`jekel`,`tempat_lahir`,`tanggal_lahir`,`alamat_kasir`,`nohp_kasir`,`tgl_bergabung`) VALUES 
 ('P001','123','anisya nugroho','Perempuan','Bukittinggi','1991-07-05','Jl. Aru Jaya No. 1 RT 1 RW 3 L','082386726226','2010-02-12'),
 ('P002','321','Pradipta','Laki-laki','Padang','2016-01-30','Jl. Aru Jaya No. 1 RT 1 RW 3 Lubeg','082386726226','2012-09-12');
COMMIT;
/*!40000 ALTER TABLE `kasir` ENABLE KEYS */;


--
-- Definition of table `kategori`
--

DROP TABLE IF EXISTS `kategori`;
CREATE TABLE `kategori` (
  `id_kategori` varchar(15) NOT NULL,
  `nama_kategori` varchar(30) NOT NULL,
  PRIMARY KEY (`id_kategori`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

/*!40000 ALTER TABLE `kategori` DISABLE KEYS */;
SET AUTOCOMMIT=0;
INSERT INTO `kategori` (`id_kategori`,`nama_kategori`) VALUES 
 ('KTGR001','Makanan Basah'),
 ('KTGR003','Makanan Kering'),
 ('KTGR004','Minuman Keras'),
 ('KTGR005','Minuman Ringan');
COMMIT;
/*!40000 ALTER TABLE `kategori` ENABLE KEYS */;


--
-- Definition of table `meja`
--

DROP TABLE IF EXISTS `meja`;
CREATE TABLE `meja` (
  `no_meja` varchar(5) NOT NULL,
  `kapasitas` int(11) NOT NULL,
  `ket` varchar(15) NOT NULL,
  `status` varchar(20) NOT NULL,
  PRIMARY KEY (`no_meja`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `meja`
--

/*!40000 ALTER TABLE `meja` DISABLE KEYS */;
SET AUTOCOMMIT=0;
INSERT INTO `meja` (`no_meja`,`kapasitas`,`ket`,`status`) VALUES 
 ('01',4,'Reguler','Tersedia'),
 ('02',4,'Reguler','Tersedia'),
 ('03',4,'Reguler','Tersedia'),
 ('04',4,'Reguler','Tersedia'),
 ('05',3,'Reguler','Tersedia'),
 ('06',3,'Reguler','Tersedia'),
 ('07',3,'Reguler','Tersedia'),
 ('08',4,'Reguler','Tersedia'),
 ('09',4,'Reguler','Tersedia'),
 ('10',3,'Reguler','Tersedia'),
 ('11',15,'VIP Room','Tersedia');
COMMIT;
/*!40000 ALTER TABLE `meja` ENABLE KEYS */;


--
-- Definition of table `menu`
--

DROP TABLE IF EXISTS `menu`;
CREATE TABLE `menu` (
  `id_menu` varchar(10) NOT NULL,
  `nama_menu` varchar(25) NOT NULL,
  `modal` double NOT NULL,
  `harga` double NOT NULL,
  PRIMARY KEY (`id_menu`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu`
--

/*!40000 ALTER TABLE `menu` DISABLE KEYS */;
SET AUTOCOMMIT=0;
INSERT INTO `menu` (`id_menu`,`nama_menu`,`modal`,`harga`) VALUES 
 ('MENU001','Mie Rebus',0,15000),
 ('MENU002','Mie Goreng Keriting',0,15000),
 ('MENU003','Kangkung Tumis',0,12000),
 ('MENU004','Fanta Susu',0,12000);
COMMIT;
/*!40000 ALTER TABLE `menu` ENABLE KEYS */;


--
-- Definition of table `menukategori`
--

DROP TABLE IF EXISTS `menukategori`;
CREATE TABLE `menukategori` (
  `id_menu` varchar(15) NOT NULL,
  `id_kategori` varchar(15) NOT NULL,
  PRIMARY KEY (`id_menu`,`id_kategori`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menukategori`
--

/*!40000 ALTER TABLE `menukategori` DISABLE KEYS */;
SET AUTOCOMMIT=0;
INSERT INTO `menukategori` (`id_menu`,`id_kategori`) VALUES 
 ('MENU001','KTGR001'),
 ('MENU002','KTGR003'),
 ('MENU003','KTGR001'),
 ('MENU004','KTGR005');
COMMIT;
/*!40000 ALTER TABLE `menukategori` ENABLE KEYS */;


--
-- Definition of table `persediaan`
--

DROP TABLE IF EXISTS `persediaan`;
CREATE TABLE `persediaan` (
  `id_menu` varchar(15) NOT NULL,
  `tanggal` date NOT NULL,
  `stock` int(11) NOT NULL,
  PRIMARY KEY (`id_menu`,`tanggal`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `persediaan`
--

/*!40000 ALTER TABLE `persediaan` DISABLE KEYS */;
SET AUTOCOMMIT=0;
INSERT INTO `persediaan` (`id_menu`,`tanggal`,`stock`) VALUES 
 ('MENU002','2016-09-03',20);
COMMIT;
/*!40000 ALTER TABLE `persediaan` ENABLE KEYS */;


--
-- Definition of table `pesanan`
--

DROP TABLE IF EXISTS `pesanan`;
CREATE TABLE `pesanan` (
  `no_transaksi` varchar(15) NOT NULL,
  `tgl_transaksi` date NOT NULL,
  `id_menu` varchar(15) NOT NULL,
  `qty` int(11) NOT NULL,
  `no_meja` varchar(15) NOT NULL,
  `kd_kasir` varchar(15) NOT NULL,
  PRIMARY KEY (`no_transaksi`,`tgl_transaksi`,`id_menu`,`no_meja`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pesanan`
--

/*!40000 ALTER TABLE `pesanan` DISABLE KEYS */;
SET AUTOCOMMIT=0;
INSERT INTO `pesanan` (`no_transaksi`,`tgl_transaksi`,`id_menu`,`qty`,`no_meja`,`kd_kasir`) VALUES 
 ('TRANS001','2016-09-15','MENU001',2,'01','Yelnovri'),
 ('TRANS001','2016-09-15','MENU002',2,'01','Yelnovri'),
 ('TRANS001','2016-09-15','MENU003',2,'01','Yelnovri'),
 ('TRANS001','2016-09-15','MENU004',2,'01','Yelnovri'),
 ('TRANS001','2016-09-22','MENU001',1,'06','Yelnovri'),
 ('TRANS001','2016-09-22','MENU002',1,'06','Yelnovri'),
 ('TRANS001','2016-09-22','MENU004',2,'06','Yelnovri');
COMMIT;
/*!40000 ALTER TABLE `pesanan` ENABLE KEYS */;


--
-- Definition of table `pesanan_temp`
--

DROP TABLE IF EXISTS `pesanan_temp`;
CREATE TABLE `pesanan_temp` (
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

/*!40000 ALTER TABLE `pesanan_temp` DISABLE KEYS */;
SET AUTOCOMMIT=0;
COMMIT;
/*!40000 ALTER TABLE `pesanan_temp` ENABLE KEYS */;


--
-- Definition of table `satuan`
--

DROP TABLE IF EXISTS `satuan`;
CREATE TABLE `satuan` (
  `id_satuan` varchar(10) NOT NULL,
  `nama_satuan` varchar(25) NOT NULL,
  PRIMARY KEY (`id_satuan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `satuan`
--

/*!40000 ALTER TABLE `satuan` DISABLE KEYS */;
SET AUTOCOMMIT=0;
INSERT INTO `satuan` (`id_satuan`,`nama_satuan`) VALUES 
 ('SAT001','Botol'),
 ('SAT002','KG');
COMMIT;
/*!40000 ALTER TABLE `satuan` ENABLE KEYS */;


--
-- Definition of table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `iduser` char(20) NOT NULL,
  `namauser` varchar(30) DEFAULT NULL,
  `username` varchar(20) DEFAULT NULL,
  `password` varchar(10) DEFAULT NULL,
  `level` char(16) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

/*!40000 ALTER TABLE `user` DISABLE KEYS */;
SET AUTOCOMMIT=0;
INSERT INTO `user` (`iduser`,`namauser`,`username`,`password`,`level`) VALUES 
 ('U001','Yelnovri','admin','admin','superuser'),
 ('U002','suharti','wati','wati','pelayanan'),
 ('U003','wawan suherman','wawan','wawan','admin_pembayaran'),
 ('U004','robi candra','robi','robi','pimpinan'),
 ('U005','wiwi karmila','wiwi','wiwi','admin'),
 ('U006','anisya','anisya','anisya','kasir');
COMMIT;
/*!40000 ALTER TABLE `user` ENABLE KEYS */;


--
-- Definition of view `pesananperbulan`
--

DROP TABLE IF EXISTS `pesananperbulan`;
DROP VIEW IF EXISTS `pesananperbulan`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `pesananperbulan` AS select cast(`pesanan`.`tgl_transaksi` as date) AS `tgl`,sum(`pesanan`.`qty`) AS `jlh`,(`pesanan`.`qty` * `menu`.`harga`) AS `total` from (`pesanan` join `menu`) where (`menu`.`id_menu` = `pesanan`.`id_menu`) group by `pesanan`.`tgl_transaksi`;

--
-- Definition of view `pesananpertanggal`
--

DROP TABLE IF EXISTS `pesananpertanggal`;
DROP VIEW IF EXISTS `pesananpertanggal`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `pesananpertanggal` AS select cast(`pesanan`.`tgl_transaksi` as date) AS `tgl`,`pesanan`.`qty` AS `jlh`,`menu`.`harga` AS `harga`,(`pesanan`.`qty` * `menu`.`harga`) AS `total`,`pesanan`.`id_menu` AS `id_menu` from (`pesanan` join `menu`) where (`menu`.`id_menu` = `pesanan`.`id_menu`) order by `pesanan`.`tgl_transaksi`;



/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
