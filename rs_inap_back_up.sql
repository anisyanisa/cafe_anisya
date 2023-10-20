-- phpMyAdmin SQL Dump
-- version 2.10.3
-- http://www.phpmyadmin.net
-- 
-- Host: localhost
-- Waktu pembuatan: 25. September 2015 jam 22:44
-- Versi Server: 5.0.51
-- Versi PHP: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- 
-- Database: `rs_inap`
-- 

-- --------------------------------------------------------

-- 
-- Struktur dari tabel `cek_in`
-- 

CREATE TABLE `cek_in` (
  `nocekin` char(20) NOT NULL,
  `idpasien` char(20) default NULL,
  `tanggalmasuk` date default NULL,
  `iddokter` char(20) default NULL,
  `idkamar` char(20) default NULL,
  `status` char(2) default NULL,
  `diagnosa` text,
  PRIMARY KEY  (`nocekin`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- 
-- Dumping data untuk tabel `cek_in`
-- 

INSERT INTO `cek_in` VALUES ('IN001', 'P0019', '2015-08-17', 'D003', 'K008', '2', 'jantung');
INSERT INTO `cek_in` VALUES ('IN0010', 'P0015', '2015-08-16', 'D004', 'K003', '2', 'Usus Buntu');
INSERT INTO `cek_in` VALUES ('IN0011', 'P0026', '2015-08-15', 'D004', 'K002', '2', 'Deman Tinggi');
INSERT INTO `cek_in` VALUES ('IN0012', 'P0028', '2015-08-14', 'D001', 'K003', '1', 'Sariawan');
INSERT INTO `cek_in` VALUES ('IN0013', 'P0025', '2015-08-12', 'D001', 'K006', '2', 'Jantung');
INSERT INTO `cek_in` VALUES ('IN0014', 'P0029', '2015-08-11', 'D0010', 'K001', '2', 'Cek Kehamilan');
INSERT INTO `cek_in` VALUES ('IN0015', 'P0031', '2015-08-11', 'D0011', 'K001', '1', 'Cek Kehamilan');
INSERT INTO `cek_in` VALUES ('IN0016', 'P0030', '2015-08-21', 'D005', 'K001', '1', 'Jantung');
INSERT INTO `cek_in` VALUES ('IN0017', 'P001', '2015-08-05', 'D001', 'K003', '', 'Geger Otak bbb');
INSERT INTO `cek_in` VALUES ('IN0018', 'P0034', '2015-08-05', 'D0010', 'K001', '1', 'Melahirkan n');
INSERT INTO `cek_in` VALUES ('IN0019', 'P0035', '2015-08-01', 'D001', 'K002', '1', 'Sariawan');
INSERT INTO `cek_in` VALUES ('IN002', 'P0021', '2015-08-19', 'D004', 'K007', '1', 'Usus');
INSERT INTO `cek_in` VALUES ('IN0020', 'P0037', '2015-08-01', 'D001', 'K001', '1', 'Jantung  bbb');
INSERT INTO `cek_in` VALUES ('IN0021', 'P0038', '2015-08-07', 'D0011', 'K002', '', 'Melahirkan');
INSERT INTO `cek_in` VALUES ('IN0022', 'P0041', '2015-08-06', 'D0011', 'K004', '', 'melahirkan');
INSERT INTO `cek_in` VALUES ('IN0023', 'P0039', '2015-08-05', 'D0010', 'K002', '', 'Melahirkan');
INSERT INTO `cek_in` VALUES ('IN0024', 'P006', '2015-08-29', 'D0010', 'K0025', '1', 'hamil');
INSERT INTO `cek_in` VALUES ('IN0025', 'P0014', '2015-08-01', 'D001', 'K0042', '1', 'Ginjal');
INSERT INTO `cek_in` VALUES ('IN0026', 'P002', '2015-09-01', 'D001', 'K0030', '1', 'Jantung');
INSERT INTO `cek_in` VALUES ('IN0029', 'P0078', '2015-09-07', 'D001', 'K0012', '2', 'Sakit Kepala');
INSERT INTO `cek_in` VALUES ('IN003', 'P0023', '2015-08-13', 'D002', 'K0011', '1', 'Paru-paru Basah');
INSERT INTO `cek_in` VALUES ('IN004', 'P003', '2015-08-12', 'D004', 'K0010', '1', 'Bedah Plastik');
INSERT INTO `cek_in` VALUES ('IN005', 'P0018', '2015-08-11', 'D003', 'K009', '1', 'Jantung Koroner');
INSERT INTO `cek_in` VALUES ('IN006', 'P0027', '2015-08-10', 'D004', 'K003', '2', 'Kulit');
INSERT INTO `cek_in` VALUES ('IN007', 'P004', '2015-08-09', 'D001', 'K003', '', 'Deman Tinggi');
INSERT INTO `cek_in` VALUES ('IN008', 'P009', '2015-08-08', 'D003', 'K001', '1', 'Paru-Paru Basah');
INSERT INTO `cek_in` VALUES ('IN009', 'P0036', '2015-08-07', 'D003', 'K002', '2', 'Jantung');

-- --------------------------------------------------------

-- 
-- Struktur dari tabel `cek_out`
-- 

CREATE TABLE `cek_out` (
  `nocekout` char(20) NOT NULL,
  `nocekin` char(20) default NULL,
  `tanggalcekout` date default NULL,
  `lama_inap` int(11) default NULL,
  `total_biaya` int(11) default NULL,
  `keterangan` varchar(20) default NULL,
  PRIMARY KEY  (`nocekout`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- 
-- Dumping data untuk tabel `cek_out`
-- 

INSERT INTO `cek_out` VALUES ('OUT001', 'IN009', '2015-08-19', 1, 35000, 'Sembuh');
INSERT INTO `cek_out` VALUES ('OUT002', 'IN006', '2015-08-20', 10, 2398000, 'Sembuh');
INSERT INTO `cek_out` VALUES ('OUT003', 'IN001', '2015-08-27', 10, 3567000, 'Sembuh');
INSERT INTO `cek_out` VALUES ('OUT004', 'IN0013', '2015-09-12', 31, 9498500, 'Sembuh');
INSERT INTO `cek_out` VALUES ('OUT005', 'IN0014', '2015-09-25', 45, 10575000, 'Sembuh');

-- --------------------------------------------------------

-- 
-- Struktur dari tabel `dokter`
-- 

CREATE TABLE `dokter` (
  `iddokter` char(20) NOT NULL,
  `namadokter` varchar(50) default NULL,
  `kategoridokter` varchar(30) default NULL,
  `jeniskelamin` char(10) default NULL,
  `tarif` int(11) default NULL,
  PRIMARY KEY  (`iddokter`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- 
-- Dumping data untuk tabel `dokter`
-- 

INSERT INTO `dokter` VALUES ('D001', 'dr. Harefa, SpPD', 'Spesialis Penyakit Dalam', 'Laki-laki', 200000);
INSERT INTO `dokter` VALUES ('D0010', 'dr. Mohammad Alam Patria, SpOG', 'Spesialis Bidan', 'Laki-laki', 200000);
INSERT INTO `dokter` VALUES ('D0011', 'dr. Susanti Apriani, SpOG', 'Spesialis Bidan', 'Perempuan', 200000);
INSERT INTO `dokter` VALUES ('D0012', 'dr. Nofriyeni', 'Spesialis Bidan', 'Perempuan', 200000);
INSERT INTO `dokter` VALUES ('D0013', 'dr. Risnelly S, SpA', 'Spesialis Anak', 'Perempuan', 200000);
INSERT INTO `dokter` VALUES ('D0014', 'dr. Erly Wirdayani, SpA', 'Spesialis Anak', 'Perempuan', 200000);
INSERT INTO `dokter` VALUES ('D0015', 'dr. Yulivia Mutiara Ardian', 'Spesialis Anak', 'Perempuan', 200000);
INSERT INTO `dokter` VALUES ('D0016', 'dr. Venny Ardila', 'Spesialis Perinatologi', 'Perempuan', 200000);
INSERT INTO `dokter` VALUES ('D0017', 'dr. Daril Arrasyid, SpS', 'Spesialis Neurologi', 'Laki-laki', 200000);
INSERT INTO `dokter` VALUES ('D0018', 'dr. Dona Hamrita', 'Spesialis Neurologi', 'Perempuan', 200000);
INSERT INTO `dokter` VALUES ('D0019', 'dr. Rahman G', 'Poliklinik Umum', 'Laki-laki', 200000);
INSERT INTO `dokter` VALUES ('D002', 'dr. Arkademi, Sp.PD', 'Spesialis Penyakit Dalam', 'Laki-laki', 200000);
INSERT INTO `dokter` VALUES ('D0020', 'drg. Dasmizar', 'Spesialis Gigi', 'Laki-laki', 200000);
INSERT INTO `dokter` VALUES ('D0021', 'drg. Novia Wiranti', 'Spesialis Gigi', 'Perempuan', 200000);
INSERT INTO `dokter` VALUES ('D0022', 'drg. Norma Bayunita', 'Spesialis Gigi', 'Perempuan', 200000);
INSERT INTO `dokter` VALUES ('D0023', 'dr. Siti Aisah', 'Poliklinik Bedah', 'Perempuan', 200000);
INSERT INTO `dokter` VALUES ('D0024', 'dr. Harmen, SpM', 'Spesialis Mata', 'Laki-laki', 200000);
INSERT INTO `dokter` VALUES ('D0025', 'dr. Yandrison, SpM', 'Spesialis Mata', 'Laki-laki', 200000);
INSERT INTO `dokter` VALUES ('D0026', 'dr. Rony Yuliwansyah, SpPD', 'Spesialis Jantung', 'Laki-laki', 200000);
INSERT INTO `dokter` VALUES ('D0027', 'dr. Novialdi, SpTHT', 'Spesialis THT', 'Laki-laki', 200000);
INSERT INTO `dokter` VALUES ('D0028', 'dr. syamsudin', 'Spesialis Bidan', 'Laki-laki', 150000);
INSERT INTO `dokter` VALUES ('D003', 'dr. Fani Marisa', 'Spesialis Penyakit Dalam', 'Laki-laki', 200000);
INSERT INTO `dokter` VALUES ('D004', 'dr. Asuar MS, SpB', 'Dokter Bedah', 'Laki-laki', 200000);
INSERT INTO `dokter` VALUES ('D005', 'dr. Hartuti, MKM', 'Spesialis Penyakit Dalam', 'Laki-laki', 200000);
INSERT INTO `dokter` VALUES ('D006', 'dr. Kurniady,SpB', 'Spesialis Bedah', 'Laki-laki', 200000);
INSERT INTO `dokter` VALUES ('D007', 'dr. Charlie Dycky A, SpB', 'Spesialis Bedah', 'Laki-laki', 200000);
INSERT INTO `dokter` VALUES ('D008', 'dr. Kusnedi', 'Spesialis Bedah', 'Laki-laki', 200000);
INSERT INTO `dokter` VALUES ('D009', 'dr. H. Muslim Nur, SpOG', 'Spesialis Bidan', 'Laki-laki', 200000);

-- --------------------------------------------------------

-- 
-- Struktur dari tabel `jenispelayanan`
-- 

CREATE TABLE `jenispelayanan` (
  `idjenispelayanan` char(20) NOT NULL,
  `namapelayanan` varchar(25) default NULL,
  `tarifpelayanan` int(11) default NULL,
  PRIMARY KEY  (`idjenispelayanan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- 
-- Dumping data untuk tabel `jenispelayanan`
-- 

INSERT INTO `jenispelayanan` VALUES ('PL001', 'pasang infus	', 12000);
INSERT INTO `jenispelayanan` VALUES ('PL0010', 'membersihkan luka	', 7500);
INSERT INTO `jenispelayanan` VALUES ('PL0011', 'klisma (Huknah)', 12000);
INSERT INTO `jenispelayanan` VALUES ('PL0012', 'tindakan bolus', 12000);
INSERT INTO `jenispelayanan` VALUES ('PL0013', 'obat suppos', 4000);
INSERT INTO `jenispelayanan` VALUES ('PL0014', 'sooling kantong kencing (', 12000);
INSERT INTO `jenispelayanan` VALUES ('PL0015', 'refresing luka bakar', 24000);
INSERT INTO `jenispelayanan` VALUES ('PL0016', 'febriding', 7500);
INSERT INTO `jenispelayanan` VALUES ('PL0017', 'transfusi', 20000);
INSERT INTO `jenispelayanan` VALUES ('PL0018', 'redresing ganggren kecil	', 8000);
INSERT INTO `jenispelayanan` VALUES ('PL0019', 'injeksi', 35000);
INSERT INTO `jenispelayanan` VALUES ('PL002', 'kontrol infus	', 7500);
INSERT INTO `jenispelayanan` VALUES ('PL0020', 'tes pel ', 35000);
INSERT INTO `jenispelayanan` VALUES ('PL003', 'dawer kateter', 12000);
INSERT INTO `jenispelayanan` VALUES ('PL004', 'pasang oksigen', 12000);
INSERT INTO `jenispelayanan` VALUES ('PL005', 'pasang magslang', 12000);
INSERT INTO `jenispelayanan` VALUES ('PL006', 'memberi makan personde	', 12000);
INSERT INTO `jenispelayanan` VALUES ('PL007', 'spooling lambung', 12000);
INSERT INTO `jenispelayanan` VALUES ('PL008', 'suction', 12000);
INSERT INTO `jenispelayanan` VALUES ('PL009', 'infusion pump', 17500);

-- --------------------------------------------------------

-- 
-- Struktur dari tabel `kamar`
-- 

CREATE TABLE `kamar` (
  `idkamar` char(20) NOT NULL,
  `namakamar` varchar(20) default NULL,
  `jeniskamar` char(4) default NULL,
  `kapasitas` varchar(3) default NULL,
  `fasilitas` text,
  `tarif` int(11) default NULL,
  PRIMARY KEY  (`idkamar`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- 
-- Dumping data untuk tabel `kamar`
-- 

INSERT INTO `kamar` VALUES ('K001', 'Pasir Putih', 'Umum', '6', 'Kipas Angin', 35000);
INSERT INTO `kamar` VALUES ('K0010', 'Seruni', 'VIP', '1', 'TV,AC,Tempat Tidur Keluarga', 150000);
INSERT INTO `kamar` VALUES ('K0011', 'Adelwis', 'VIP', '1', 'TV,AC,Tempat Tidur Keluarga', 150000);
INSERT INTO `kamar` VALUES ('K0012', 'Manderubiah 1', 'Umum', '2', 'Kipas Angin', 35000);
INSERT INTO `kamar` VALUES ('K0013', 'Manderubiah 2', 'Umum', '2', 'Kipas Angin', 35000);
INSERT INTO `kamar` VALUES ('K0014', 'Manderubiah 3', 'Umum', '2', 'Kipas Angin', 35000);
INSERT INTO `kamar` VALUES ('K0015', 'Manderubiah 4', 'Umum', '4', 'Kipas Angin', 35000);
INSERT INTO `kamar` VALUES ('K0016', 'Manderubiah 5', 'Umum', '4', 'Kipas Angin', 35000);
INSERT INTO `kamar` VALUES ('K0017', 'Manderubiah 6', 'Umum', '2', 'Kipas Angin', 35000);
INSERT INTO `kamar` VALUES ('K0018', 'Manderubiah 7', 'Umum', '2', 'Kipas Angin', 35000);
INSERT INTO `kamar` VALUES ('K0019', 'Manderubiah 8', 'Umum', '2', 'Kipas Angin', 35000);
INSERT INTO `kamar` VALUES ('K002', 'Batu Kureta', 'Umum', '6', 'Kipas Angin', 35000);
INSERT INTO `kamar` VALUES ('K0020', 'Manderubiah 9', 'Umum', '4', 'Kipas Angin', 35000);
INSERT INTO `kamar` VALUES ('K0021', 'Manderubiah 10', 'Umum', '4', 'Kipas Angin', 35000);
INSERT INTO `kamar` VALUES ('K0022', 'Kelas 1', 'Umum', '2', 'Kipas Angin', 35000);
INSERT INTO `kamar` VALUES ('K0023', 'Mickey Mouse 1', 'Umum', '1', 'Kipas Angin', 35000);
INSERT INTO `kamar` VALUES ('K0024', 'Saun The Sheep', 'Umum', '3', 'Kipas Angin', 35000);
INSERT INTO `kamar` VALUES ('K0025', 'Doraemon(ISOLASI)', 'Umum', '1', 'Kipas Angin', 35000);
INSERT INTO `kamar` VALUES ('K0026', 'Barby (semi intensif', 'Umum', '4', 'Kipas Angin', 35000);
INSERT INTO `kamar` VALUES ('K0027', 'Spongebob (infeksi)', 'Umum', '5', 'Kipas Angin', 35000);
INSERT INTO `kamar` VALUES ('K0028', 'Hello Kitty', 'Umum', '4', 'Kipas Angin', 35000);
INSERT INTO `kamar` VALUES ('K0029', 'Upin Ipin (infeksi g', 'Umum', '5', 'Kipas Angin', 35000);
INSERT INTO `kamar` VALUES ('K003', 'Pantai Carocok', 'Umum', '5', 'Kipas Angin', 35000);
INSERT INTO `kamar` VALUES ('K0030', 'Kelas I', 'Umum', '1', 'Kipas Angin', 35000);
INSERT INTO `kamar` VALUES ('K0031', 'Kelas I', 'Umum', '1', 'Kipas Angin', 35000);
INSERT INTO `kamar` VALUES ('K0032', 'Kelas II', 'Umum', '3', 'Kipas Angin', 35000);
INSERT INTO `kamar` VALUES ('K0033', 'Ruang Post SC', 'Umum', '9', 'Kipas Angin', 35000);
INSERT INTO `kamar` VALUES ('K0034', 'ISOLASI', 'Umum', '2', 'Kipas Angin', 35000);
INSERT INTO `kamar` VALUES ('K0035', 'Ginekologi', 'Umum', '4', 'Kipas Angin', 35000);
INSERT INTO `kamar` VALUES ('K0036', 'Ruangan Tambahan', 'Umum', '3', 'Kipas Angin', 35000);
INSERT INTO `kamar` VALUES ('K0037', 'Observasi', 'Umum', '3', 'Kipas Angin', 35000);
INSERT INTO `kamar` VALUES ('K0038', 'Pulau Kerabak', 'Umum', '3', 'Kipas Angin', 35000);
INSERT INTO `kamar` VALUES ('K0039', 'Pulau Cubadak', 'Umum', '7', 'Kipas Angin', 35000);
INSERT INTO `kamar` VALUES ('K004', 'Panasahan', 'Umum', '6', 'Kipas Angin', 35000);
INSERT INTO `kamar` VALUES ('K0040', 'Luka Bakar', 'Umum', '2', 'Kipas Angin', 35000);
INSERT INTO `kamar` VALUES ('K0041', 'Tetanus', 'Umum', '1', 'Kipas Angin', 35000);
INSERT INTO `kamar` VALUES ('K0042', 'Pulau Air', 'Umum', '6', 'Kipas Angin', 35000);
INSERT INTO `kamar` VALUES ('K0043', 'Pulau Semangki', 'Umum', '7', 'Kipas Angin', 35000);
INSERT INTO `kamar` VALUES ('K0044', 'tes kamar ', 'Umum', '56', 'TV,AC,Kipas Angin,Tempat Tidur Keluarga', 50000);
INSERT INTO `kamar` VALUES ('K005', 'Jembatan Aka', 'Umum', '6', 'Kipas Angin', 40000);
INSERT INTO `kamar` VALUES ('K006', 'Ravlesia', 'Umum', '1', 'TV,Kipas Angin,Tempat Tidur Keluarga', 100000);
INSERT INTO `kamar` VALUES ('K007', 'Flamboyan', 'Umum', '1', 'TV,Kipas Angin,Tempat Tidur Keluarga', 100000);
INSERT INTO `kamar` VALUES ('K008', 'Mawar', 'VIP', '1', 'TV,AC,Tempat Tidur Keluarga', 150000);
INSERT INTO `kamar` VALUES ('K009', 'Melati', 'VIP', '1', 'TV,AC,Tempat Tidur Keluarga', 150000);

-- --------------------------------------------------------

-- 
-- Struktur dari tabel `pasien`
-- 

CREATE TABLE `pasien` (
  `idpasien` char(20) NOT NULL,
  `nik` char(20) default NULL,
  `namapasien` varchar(30) default NULL,
  `tgllahir` date default NULL,
  `jeniskelamin` char(10) default NULL,
  `alamat` text,
  `telp` char(12) default NULL,
  `pekerjaan` varchar(20) default NULL,
  `status` char(6) default NULL,
  PRIMARY KEY  (`idpasien`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- 
-- Dumping data untuk tabel `pasien`
-- 

INSERT INTO `pasien` VALUES ('P001', '87777777777777777', 'Rio Dermawan', '0000-00-00', 'Laki-laki', 'Painan', '089676865757', 'Mahasiswa', 'Inap');
INSERT INTO `pasien` VALUES ('P0010', '1231371731773', 'Ade Putri', '1993-06-20', 'Perempuan', 'Air Bangis', '083453523424', 'PNS', 'Jalan');
INSERT INTO `pasien` VALUES ('P0011', '3897548237845', 'Restu Kaswandi', '1993-05-19', 'Laki-laki', 'Pasaman', '096347623476', 'Mahasiswa', 'Jalan');
INSERT INTO `pasien` VALUES ('P0012', '3131313131234', 'Muslihan Halim Riyan', '1992-05-11', 'Laki-laki', 'Payakumbuh', '085279855896', 'Swasta', 'Jalan');
INSERT INTO `pasien` VALUES ('P0013', '1238193717319', 'Rozi Hartono', '1990-02-09', 'Laki-laki', 'Padang', '086354987667', 'Mahasiswa', 'Jalan');
INSERT INTO `pasien` VALUES ('P0014', '1928313123813', 'Suharti Bohas', '1993-09-23', 'Perempuan', 'Pasaman', '087685849494', 'Mahasiswa', 'Inap');
INSERT INTO `pasien` VALUES ('P0016', '2111313131434', 'Herik Pratama Syahputra', '1992-05-11', 'Laki-laki', 'Solok', '085223454596', 'Swasta', 'Jalan');
INSERT INTO `pasien` VALUES ('P0017', '2111313131534', 'Feri Irawan', '1992-05-11', 'Laki-laki', 'Solok', '083423454596', 'Swasta', 'Inap');
INSERT INTO `pasien` VALUES ('P0018', '3221313132112', 'Wendi Cagur', '1991-11-09', 'Laki-laki', 'Pariaman', '085263574411', 'Wirausaha', 'Inap');
INSERT INTO `pasien` VALUES ('P0019', '1236764434678', 'Fitria Wulan Dari', '1993-04-12', 'Perempuan', 'Babukik Kamang Mudik', '082390690243', 'Mahasiswi', 'Keluar');
INSERT INTO `pasien` VALUES ('P002', '1238193717319', 'Ahmad Syarif', '1992-06-11', 'Laki-laki', 'Pasaman', '085263574493', 'Mahasiswa', 'Inap');
INSERT INTO `pasien` VALUES ('P0020', '3425262728282', 'Aldi Septiadi', '1998-07-15', 'Laki-laki', 'Pekan Kamis', '082390905467', 'Siswa', 'Jalan');
INSERT INTO `pasien` VALUES ('P0021', '2896717161818', 'Ilhamdi', '1990-06-23', 'Laki-laki', 'Tarusan', '085263908907', 'Wiraswasta', 'Inap');
INSERT INTO `pasien` VALUES ('P0022', '1267897363738', 'Robby Idrus', '1992-07-04', 'Laki-laki', 'Tarusan', '082390687653', 'Wirausaha', 'Jalan');
INSERT INTO `pasien` VALUES ('P0023', '1283931919391', 'Rahmat Gusman', '1991-06-09', 'Laki-laki', 'Painan', '082390347980', 'Mahasiswa', 'Inap');
INSERT INTO `pasien` VALUES ('P0024', '1233544758585', 'Ahmad Arif', '1994-12-23', 'Laki-laki', 'Tarusan', '085263690834', 'Mahsiswa', 'Jalan');
INSERT INTO `pasien` VALUES ('P0025', '1234677343533', 'Yeni Rosiyan', '1992-04-30', 'Perempuan', 'Painan', '083390864756', 'Mahasiswi', 'Keluar');
INSERT INTO `pasien` VALUES ('P0026', '1372627284474', 'Kitra Hadi Maulana', '1988-09-16', 'Laki-laki', 'Tarusan', '082340989342', 'Wirausaha', '');
INSERT INTO `pasien` VALUES ('P0027', '1231313131312', 'Voni Six', '1990-10-23', 'Perempuan', 'Padang', '082323424234', 'Guru', 'Keluar');
INSERT INTO `pasien` VALUES ('P0028', '1245628292929', 'Hari Syafran', '1992-04-06', 'Laki-laki', 'Tarusan', '082340989342', 'Mahasiswa', 'Inap');
INSERT INTO `pasien` VALUES ('P0029', '1235782378237', 'Putri Ayu', '1990-08-07', 'Perempuan', 'Tarusan', '085263690769', 'Mahasiswi', 'Keluar');
INSERT INTO `pasien` VALUES ('P003', '09101152611083', 'Feri Asrizal', '1991-11-21', 'Laki-laki', 'kuningan kebon', '082365899856', 'Pegawai Negeri', 'Inap');
INSERT INTO `pasien` VALUES ('P0030', '1345678923567', 'Danil', '1991-07-06', 'Laki-laki', 'Tarusan', '083456746567', 'Mahasiswa', 'Inap');
INSERT INTO `pasien` VALUES ('P0031', '1233424324247', 'Rini', '1989-08-06', 'Perempuan', 'Painan', '082346674775', 'Wirausaha', 'Inap');
INSERT INTO `pasien` VALUES ('P0032', '1321423534645', 'Wingky Pribadi', '1989-08-05', 'Laki-laki', 'Tarusan', '083425789999', 'Mahasiswa', NULL);
INSERT INTO `pasien` VALUES ('P0033', '4564532543252', 'Suriyadinata', '1992-11-04', 'Laki-laki', 'Padang', '089546949654', 'Mahasiswa', 'Inap');
INSERT INTO `pasien` VALUES ('P0034', '1213242543562', 'Lestario Nofianto', '1989-02-07', 'Laki-laki', 'Painan', '086784667854', 'Mahasiswa', 'Inap');
INSERT INTO `pasien` VALUES ('P0035', '1236425677787', 'Afrinaldi', '1990-08-24', 'Laki-laki', 'Painan', '089745788999', 'Mahasiswa', 'Inap');
INSERT INTO `pasien` VALUES ('P0036', '1243567788543', 'M Arif', '1989-08-07', 'Laki-laki', 'Tarusan', '089867444577', 'Mahasiswa', 'Keluar');
INSERT INTO `pasien` VALUES ('P0037', '1324324924234', 'Laren Amir', '1989-03-08', 'Laki-laki', 'Painan', '089785534677', 'Polisi', 'Inap');
INSERT INTO `pasien` VALUES ('P0038', '1234353255464', 'Anggun Sahira', '1991-03-06', 'Perempuan', 'Painan', '089785688434', 'Mahasiswi', 'Inap');
INSERT INTO `pasien` VALUES ('P0039', '1235435364575', 'Vione Erika', '1992-03-07', 'Perempuan', 'Painan', '086756656566', 'Mahasiswi', 'Inap');
INSERT INTO `pasien` VALUES ('P004', '3221313132145', 'Efri Kurniawan', '1991-07-19', 'Laki-laki', 'Tarusan', '089978676554', 'Wirausaha', 'Inap');
INSERT INTO `pasien` VALUES ('P0040', '3221313132156', 'Widiya Hayunda', '1992-01-10', 'Perempuan', 'Laban, Salido', '086354987666', 'Mahasiswi', 'Jalan');
INSERT INTO `pasien` VALUES ('P0041', '1213242543554', 'Marta Hadi', '1990-02-02', 'Laki-laki', 'Sago', '081992118991', 'Wirausaha', 'Inap');
INSERT INTO `pasien` VALUES ('P0042', '3423123131231', 'Resti Saputri', '1991-04-10', 'Perempuan', 'Salido', '087847564773', 'Guru', '');
INSERT INTO `pasien` VALUES ('P0043', '2445656764865', 'Abdurrahman', '1992-01-19', 'Laki-laki', 'Salido, Kampung Luar', '089787666665', 'Polisi', '');
INSERT INTO `pasien` VALUES ('P0044', '1324234344534', 'Ilham Dirgantara', '1993-09-10', 'Laki-laki', 'Muaro Psar Baru Bayang', '098757484847', 'PNS', '');
INSERT INTO `pasien` VALUES ('P0045', '1323676876867', 'Fajride Candra', '1991-10-10', 'Laki-laki', 'Salido', '087767888322', 'Wiraswasta', '');
INSERT INTO `pasien` VALUES ('P0046', '1821938193718', 'Fajri Marfin', '1992-10-10', 'Laki-laki', 'Salido, Laban', '089987665556', 'Mahasiswa', '');
INSERT INTO `pasien` VALUES ('P0047', '1345234254242', 'Beni Oktaferi', '1991-08-10', 'Laki-laki', 'Sawahlunto', '085465453543', 'Mahasiswa', '');
INSERT INTO `pasien` VALUES ('P0048', '1342456788978', 'Joni Ermon', '1990-07-27', 'Laki-laki', 'Surian, Solok', '089876745735', 'Mahasiswa', '');
INSERT INTO `pasien` VALUES ('P0049', '1324268765756', 'Maifitrio', '1992-09-24', 'Laki-laki', 'Tarusan', '089797656564', 'TNI', '');
INSERT INTO `pasien` VALUES ('P005', '1213812381637', 'Fernanda Luki', '1990-11-24', 'Laki-laki', 'Pasaman', '085263574434', 'Mahasiswa', '');
INSERT INTO `pasien` VALUES ('P0050', '1326757567575', 'Mairiza Azari', '1992-04-19', 'Laki-laki', 'Padang', '087899929222', 'Mahasiswa', '');
INSERT INTO `pasien` VALUES ('P0051', '1356765757656', 'Rifan Gusrianto', '1992-10-09', 'Laki-laki', 'Pariaman', '087343453424', 'Mahasiswa', '');
INSERT INTO `pasien` VALUES ('P0052', '1363883457565', 'Ratna Restu', '1992-03-19', 'Laki-laki', 'Painan', '094353363524', 'Pengusaha', '');
INSERT INTO `pasien` VALUES ('P0053', '3534637237282', 'remon malin', '1993-06-26', 'Laki-laki', 'painan', '082177775454', 'pengusaha', '');
INSERT INTO `pasien` VALUES ('P0054', '3456721345637', 'mia aggraini', '1984-05-21', 'Perempuan', 'painan', '087895234342', 'ibu rumah tangga', '');
INSERT INTO `pasien` VALUES ('P0055', '4523232345556', 'riki kardo', '1994-03-12', 'Laki-laki', 'suratiah', '087834321657', 'mahasiswa', '');
INSERT INTO `pasien` VALUES ('P0056', '5467838548297', 'masrul', '1965-06-23', 'Laki-laki', 'batang kapas', '082145332765', 'petani', '');
INSERT INTO `pasien` VALUES ('P0057', '6576729875934', 'amry', '1971-08-23', 'Laki-laki', 'balai salasa', '082365473728', 'pns', '');
INSERT INTO `pasien` VALUES ('P0058', '2349765421347', 'jonardi', '1981-03-14', 'Laki-laki', 'tapan', '085274564213', 'petani', '');
INSERT INTO `pasien` VALUES ('P0059', '5432728643321', 'nurdin alam syah', '1955-03-23', 'Laki-laki', 'pesisir selatan', '082176323546', 'wiraswasta', '');
INSERT INTO `pasien` VALUES ('P006', '8347248721847', 'Adra Junatan', '1991-01-19', 'Laki-laki', 'Solok', '087512313212', 'Mahasiswa', 'Inap');
INSERT INTO `pasien` VALUES ('P0060', '7685443200978', 'zainal abiddin', '1962-06-23', 'Laki-laki', 'balai baru', '087534362421', 'petani', '');
INSERT INTO `pasien` VALUES ('P0061', '3423343223412', 'ebiet', '1993-04-12', 'Laki-laki', 'painan', '082354678666', 'pelajar', '');
INSERT INTO `pasien` VALUES ('P0062', '7654322984455', 'siti aisyah', '1972-03-12', 'Perempuan', 'painan', '082145463212', 'ibu rumah tangga', '');
INSERT INTO `pasien` VALUES ('P0063', '3425356172572', 'laras', '1994-06-21', 'Perempuan', 'kambang', '082345654321', 'pelajar', '');
INSERT INTO `pasien` VALUES ('P0064', '5464321879099', 'dia rusnilawati', '1988-09-23', 'Perempuan', 'kambang', '082325434343', 'pelajar', '');
INSERT INTO `pasien` VALUES ('P0065', '4353217689764', 'ade putry ', '1990-10-26', 'Perempuan', 'painan', '082367676854', 'mahasiswa', '');
INSERT INTO `pasien` VALUES ('P0066', '4321908768555', 'masrizal', '1975-11-23', 'Laki-laki', 'tapan', '087892324564', 'wiraswasta', '');
INSERT INTO `pasien` VALUES ('P0067', '2345987000344', 'nike', '1998-04-23', 'Perempuan', 'surantiah', '081274567687', 'pelajar', '');
INSERT INTO `pasien` VALUES ('P0068', '6576453421998', 'aceng', '1997-03-12', 'Laki-laki', 'bayang', '082354678976', 'pelajar', '');
INSERT INTO `pasien` VALUES ('P0069', '4567787804558', 'puji lestrai', '1994-12-28', 'Perempuan', 'koto baru bayang', '082384856721', 'pelajar', '');
INSERT INTO `pasien` VALUES ('P007', '1238193717319', 'Dian Fahrozi Arman', '1991-01-12', 'Laki-laki', 'Pariaman', '085263574493', 'Mahasiswa', 'Inap');
INSERT INTO `pasien` VALUES ('P0070', '1345620384943', 'doni', '1982-09-05', 'Laki-laki', 'painan', '082345676321', 'petani', '');
INSERT INTO `pasien` VALUES ('P0071', '2343242342345', 'jamaludin', '1977-02-12', 'Laki-laki', 'batang kapas', '085274553212', 'pegawai sipil', '');
INSERT INTO `pasien` VALUES ('P0072', '6565676329183', 'rosdiana', '1975-03-12', 'Perempuan', 'bayang', '086542332123', 'inu rumah tangga', '');
INSERT INTO `pasien` VALUES ('P0073', '5435347235234', 'nurcahaya', '1964-10-30', 'Perempuan', 'paianan', '087895343214', 'petani', '');
INSERT INTO `pasien` VALUES ('P0074', '6576675668565', 'surti', '1981-04-21', 'Laki-laki', 'koto baru', '085454434341', 'pegawai sipil', '');
INSERT INTO `pasien` VALUES ('P0075', '4546373645352', 'mandaro basa', '1949-11-11', 'Laki-laki', 'kampuang tuo', '082365765847', 'wiraswasta', '');
INSERT INTO `pasien` VALUES ('P0076', '1324533453534', 'Andre Taulani', '1987-07-17', 'Laki-laki', 'Painan', '098966656555', 'Wirausaha', '');
INSERT INTO `pasien` VALUES ('P0077', '1238193717334', 'Rika Anggraini', '1985-11-20', 'Perempuan', 'Padang', '086565634243', 'IRT', '');
INSERT INTO `pasien` VALUES ('P0078', '76567565699800008', 'Ary Pratama Syaputra', '1991-09-09', 'Laki-laki', 'Duri Riau', '090879787686', 'Entertaiment', '');
INSERT INTO `pasien` VALUES ('P008', '09101152611089', 'bayu', '2011-11-21', 'Laki-laki', 'Jalan Tanjung Sabar No. 11', '082365899856', 'Pegawai Negeri', 'Jalan');
INSERT INTO `pasien` VALUES ('P009', '3221313132139', 'Agung Priadinata', '1993-04-19', 'Laki-laki', 'Painan', '081993415678', 'Polisi', 'Inap');

-- --------------------------------------------------------

-- 
-- Struktur dari tabel `pelayanan`
-- 

CREATE TABLE `pelayanan` (
  `idpelayanan` char(20) NOT NULL,
  `idjenispelayanan` char(20) default NULL,
  `idpasien` char(20) default NULL,
  `iddokter` char(20) NOT NULL,
  `tanggal` date default NULL,
  `jumlah` int(11) default NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- 
-- Dumping data untuk tabel `pelayanan`
-- 

INSERT INTO `pelayanan` VALUES ('PLY001', 'PL0010', 'P0012', 'D002', '2015-08-17', 1);
INSERT INTO `pelayanan` VALUES ('PLY002', 'PL0010', 'P0013', 'D003', '2015-08-18', 2);
INSERT INTO `pelayanan` VALUES ('PLY003', 'PL0010', 'P0016', 'D002', '2015-08-16', 2);
INSERT INTO `pelayanan` VALUES ('PLY004', 'PL0011', 'P0022', 'D005', '2015-08-15', 3);
INSERT INTO `pelayanan` VALUES ('PLY005', 'PL0016', 'P0020', 'D003', '2015-08-14', 2);
INSERT INTO `pelayanan` VALUES ('PLY006', 'PL0011', 'P0024', 'D004', '2015-08-13', 2);
INSERT INTO `pelayanan` VALUES ('PLY0012', 'PL0018', 'P0023', 'D002', '2015-08-18', 2);
INSERT INTO `pelayanan` VALUES ('PLY0013', 'PL001', 'P0027', 'D004', '2015-08-18', 4);
INSERT INTO `pelayanan` VALUES ('PLY0014', 'PL001', 'P0019', 'D003', '2015-08-11', 1);
INSERT INTO `pelayanan` VALUES ('PLY0015', 'PL0011', 'P0019', 'D003', '2015-08-11', 1);
INSERT INTO `pelayanan` VALUES ('PLY0016', 'PL0013', 'P0019', 'D003', '2015-08-11', 1);
INSERT INTO `pelayanan` VALUES ('PLY0017', 'PL0011', 'P0019', 'D003', '2015-08-11', 2);
INSERT INTO `pelayanan` VALUES ('PLY0018', 'PL0010', 'P0019', 'D003', '2015-08-11', 2);
INSERT INTO `pelayanan` VALUES ('PLY0020', 'PL0010', 'P0025', 'D001', '2015-07-01', 1);
INSERT INTO `pelayanan` VALUES ('PLY0021', 'PL0010', 'P0011', 'D001', '2015-07-01', 1);
INSERT INTO `pelayanan` VALUES ('PLY0022', 'PL0010', 'P0078', 'D001', '2015-09-07', 1);
INSERT INTO `pelayanan` VALUES ('PLY0023', 'PL0010', 'P0078', 'D001', '2015-09-07', 1);
INSERT INTO `pelayanan` VALUES ('PLY0023', 'PL0012', 'P0078', 'D001', '2015-09-07', 1);
INSERT INTO `pelayanan` VALUES ('PLY0025', 'PL001', 'P0078', 'D001', '2015-09-07', 1);
INSERT INTO `pelayanan` VALUES ('PLY0026', 'PL001', 'P0025', 'D001', '2015-09-11', 2);
INSERT INTO `pelayanan` VALUES ('PLY0026', 'PL0010', 'P0025', 'D001', '2015-09-11', 2);
INSERT INTO `pelayanan` VALUES ('PLY0026', 'PL0012', 'P0025', 'D001', '2015-09-11', 7);
INSERT INTO `pelayanan` VALUES ('PLY0026', 'PL0013', 'P0025', 'D001', '2015-09-11', 2);
INSERT INTO `pelayanan` VALUES ('PLY0026', 'PL0014', 'P0025', 'D001', '2015-09-11', 4);
INSERT INTO `pelayanan` VALUES ('PLY0039', 'PL001', 'P0040', 'D001', '2015-09-12', 1);
INSERT INTO `pelayanan` VALUES ('PLY0039', 'PL0010', 'P0040', 'D001', '2015-09-12', 11);
INSERT INTO `pelayanan` VALUES ('PLY0041', 'PL001', 'P0040', 'D001', '2015-09-12', 22);
INSERT INTO `pelayanan` VALUES ('PLY0042', 'PL001', 'P0040', 'D001', '2015-09-12', 11);
INSERT INTO `pelayanan` VALUES ('PLY0042', 'PL0010', 'P0040', 'D001', '2015-09-12', 22);
INSERT INTO `pelayanan` VALUES ('PLY0044', 'PL0010', 'P0040', 'D001', '2015-09-12', 2);
INSERT INTO `pelayanan` VALUES ('PLY0046', 'PL001', 'P0040', 'D001', '2015-09-12', 2);
INSERT INTO `pelayanan` VALUES ('PLY0052', 'PL004', 'P0040', 'D001', '2015-09-12', 1);
INSERT INTO `pelayanan` VALUES ('PLY007', 'PL001', 'P0021', 'D004', '2015-09-14', 11);
INSERT INTO `pelayanan` VALUES ('PLY0054', 'PL0011', 'P0010', 'D001', '2015-09-13', 32);
INSERT INTO `pelayanan` VALUES ('PLY0054', 'PL0012', 'P0010', 'D001', '2015-09-13', 23);
INSERT INTO `pelayanan` VALUES ('PLY0054', 'PL0013', 'P0010', 'D001', '2015-09-13', 23);
INSERT INTO `pelayanan` VALUES ('PLY0055', 'PL001', 'P0010', 'D001', '2015-09-13', 22);
INSERT INTO `pelayanan` VALUES ('PLY0055', 'PL0010', 'P0010', 'D001', '2015-09-13', 22);
INSERT INTO `pelayanan` VALUES ('PLY0056', 'PL0011', 'P0028', 'D001', '2015-09-15', 3);
INSERT INTO `pelayanan` VALUES ('PLY0056', 'PL001', 'P0028', 'D001', '2015-09-16', 3);
INSERT INTO `pelayanan` VALUES ('PLY0057', 'PL001', 'P0040', 'D001', '2015-09-14', 3);
INSERT INTO `pelayanan` VALUES ('PLY0057', 'PL0010', 'P0040', 'D001', '2015-09-14', 3);
INSERT INTO `pelayanan` VALUES ('PLY0057', 'PL0011', 'P0040', 'D001', '2015-09-14', 3);
INSERT INTO `pelayanan` VALUES ('PLY0056', 'PL0013', 'P0028', 'D001', '2015-09-08', 2);
INSERT INTO `pelayanan` VALUES ('PLY0056', 'PL001', 'P0028', 'D001', '2015-09-12', 2);

-- --------------------------------------------------------

-- 
-- Struktur dari tabel `user`
-- 

CREATE TABLE `user` (
  `iduser` char(20) NOT NULL,
  `namauser` varchar(30) default NULL,
  `username` varchar(20) default NULL,
  `password` varchar(10) default NULL,
  `level` char(16) default NULL,
  PRIMARY KEY  (`iduser`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- 
-- Dumping data untuk tabel `user`
-- 

INSERT INTO `user` VALUES ('U001', 'Yelnovri', 'admin', 'admin', 'superuser');
INSERT INTO `user` VALUES ('U002', 'suharti', 'wati', 'wati', 'pelayanan');
INSERT INTO `user` VALUES ('U003', 'wawan suherman', 'wawan', 'wawan', 'admin_pembayaran');
INSERT INTO `user` VALUES ('U004', 'robi candra', 'robi', 'robi', 'pimpinan');
INSERT INTO `user` VALUES ('U005', 'wiwi karmila', 'wiwi', 'wiwi', 'admin');
