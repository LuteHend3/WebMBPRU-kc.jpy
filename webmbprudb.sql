-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 21, 2018 at 03:06 AM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `webmbprudb`
--

-- --------------------------------------------------------

--
-- Table structure for table `administrasi`
--

CREATE TABLE IF NOT EXISTS `administrasi` (
  `id_administrasi` int(20) NOT NULL,
  `tgl_pengantaran` varchar(20) NOT NULL,
  `penerima_pengantaran` varchar(20) NOT NULL,
  `no_laporan` varchar(20) NOT NULL,
  `no_proyek` varchar(20) NOT NULL,
  `tgl` varchar(20) NOT NULL,
  `dn_nilaipasar` varchar(20) NOT NULL,
  `dn_nilailikuidasi` varchar(20) NOT NULL,
  `dn_nilailain` varchar(20) NOT NULL,
  `tgl_penilaian` varchar(20) NOT NULL,
  `kepemilikan` varchar(20) NOT NULL,
  `penttd_laporan` varchar(20) NOT NULL,
  `ket_kjpp` varchar(20) NOT NULL,
  `surat_order` varchar(20) NOT NULL,
  `sertifikat` varchar(20) NOT NULL,
  `proposal` varchar(20) NOT NULL,
  `surat_tugas` varchar(20) NOT NULL,
  `form_lapangan` varchar(20) NOT NULL,
  `spk` varchar(20) NOT NULL,
  `surat_representasi` varchar(20) NOT NULL,
  `ket_ltl` varchar(20) NOT NULL,
  `ket_data` varchar(20) NOT NULL,
  PRIMARY KEY (`id_administrasi`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `bdd`
--

CREATE TABLE IF NOT EXISTS `bdd` (
  `id_bdd` int(20) NOT NULL,
  `id_fee` int(20) NOT NULL,
  `id_surat` int(20) NOT NULL,
  `id_tugas` int(20) NOT NULL,
  `id_objek` int(20) NOT NULL,
  PRIMARY KEY (`id_bdd`),
  KEY `id_fee` (`id_fee`),
  KEY `id_surat` (`id_surat`),
  KEY `id_pemberi_tugas` (`id_tugas`),
  KEY `id_objek_penilaian` (`id_objek`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `divisi`
--

CREATE TABLE IF NOT EXISTS `divisi` (
  `id_divisi` int(20) NOT NULL,
  `nama_divisi` varchar(20) NOT NULL,
  PRIMARY KEY (`id_divisi`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `divisi`
--

INSERT INTO `divisi` (`id_divisi`, `nama_divisi`) VALUES
(1, 'Divisi BDD'),
(2, 'Divisi Keuangan'),
(3, 'Divisi Administrasi'),
(4, 'Divisi Teknik'),
(5, 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `fee`
--

CREATE TABLE IF NOT EXISTS `fee` (
  `id_fee` int(11) NOT NULL,
  `pro_fee` int(11) NOT NULL,
  `transport` int(11) NOT NULL,
  `fee_bank` int(11) NOT NULL,
  `ppn` int(11) NOT NULL,
  `fee_luar` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  PRIMARY KEY (`id_fee`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fee`
--

INSERT INTO `fee` (`id_fee`, `pro_fee`, `transport`, `fee_bank`, `ppn`, `fee_luar`, `total`) VALUES
(1, 50000, 40000, 80000, 100000, 70000, 340000);

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE IF NOT EXISTS `karyawan` (
  `id_karyawan` int(100) NOT NULL,
  `id_divisi` int(20) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `Jenis_kelamin` enum('L','P') NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `no_telp` varchar(100) NOT NULL,
  PRIMARY KEY (`id_karyawan`),
  KEY `id_divisi` (`id_divisi`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`id_karyawan`, `id_divisi`, `nama`, `Jenis_kelamin`, `email`, `password`, `alamat`, `no_telp`) VALUES
(123, 5, 'sans', 'L', 'sans@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 'JL. bangun no.2', '08451512'),
(999, 2, 'Jony', 'L', 'jon@gmail.com', '9baa1477f426a5d490e3add7b8fd7a9e', 'JL. kawai no.2', '0855186'),
(1010, 5, 'Andrew', 'L', 'andrewbelanda@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', 'JL. Nindya Karya no.9', '08252'),
(5252, 3, 'Sens', 'P', 'sens@gmail.com', '1a2dce562500f2e357c676d319b189b9', 'JL. Tua no.58', '0558478'),
(5555, 1, 'Sonya', 'P', 'sony@gmail.com', '61de962f19b684dc9ce24c0fdcdbd0de', 'JL. bhakti no.999', '081781');

-- --------------------------------------------------------

--
-- Table structure for table `keuangan`
--

CREATE TABLE IF NOT EXISTS `keuangan` (
  `id_keuangan` int(20) NOT NULL,
  `id_pem1` int(20) NOT NULL,
  `id_pem2` int(20) NOT NULL,
  `id_pen1` int(20) NOT NULL,
  `id_pen2` int(11) NOT NULL,
  PRIMARY KEY (`id_keuangan`),
  UNIQUE KEY `id_pen1` (`id_pen1`),
  KEY `id_pem1` (`id_pem1`),
  KEY `id_pem2` (`id_pem2`),
  KEY `id_pen1_2` (`id_pen1`),
  KEY `id_pen2` (`id_pen2`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `objek_penilaian`
--

CREATE TABLE IF NOT EXISTS `objek_penilaian` (
  `id_objek` int(20) NOT NULL,
  `alamat_objek` varchar(20) NOT NULL,
  `jumlah` varchar(20) NOT NULL,
  `tipe` varchar(20) NOT NULL,
  `lt` varchar(20) NOT NULL,
  `lb` varchar(20) NOT NULL,
  PRIMARY KEY (`id_objek`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `objek_penilaian`
--

INSERT INTO `objek_penilaian` (`id_objek`, `alamat_objek`, `jumlah`, `tipe`, `lt`, `lb`) VALUES
(1, 'Jl. mjy', '10', 'w', '89', '87'),
(2, 'Jl. kakak', '123', 'Luz', '566lt', '9090lb');

-- --------------------------------------------------------

--
-- Table structure for table `opp`
--

CREATE TABLE IF NOT EXISTS `opp` (
  `id_opp` int(20) NOT NULL,
  `no_opp` varchar(20) NOT NULL,
  `tgl_opp` varchar(20) NOT NULL,
  PRIMARY KEY (`id_opp`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran1`
--

CREATE TABLE IF NOT EXISTS `pembayaran1` (
  `id_pem1` int(20) NOT NULL,
  `tgl_pem1` varchar(20) NOT NULL,
  `jumlah_bayar1` varchar(20) NOT NULL,
  PRIMARY KEY (`id_pem1`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran2`
--

CREATE TABLE IF NOT EXISTS `pembayaran2` (
  `id_pem2` int(11) NOT NULL,
  `tgl_pem2` int(11) NOT NULL,
  `jumlah_bayar2` int(11) NOT NULL,
  `keterangan` int(11) NOT NULL,
  PRIMARY KEY (`id_pem2`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pemberi_tugas`
--

CREATE TABLE IF NOT EXISTS `pemberi_tugas` (
  `id_tugas` int(20) NOT NULL,
  `nama_bank` varchar(20) NOT NULL,
  `cabang` varchar(20) NOT NULL,
  `alamat_bank` text NOT NULL,
  `npwp` varchar(20) NOT NULL,
  `tipe_bank` varchar(20) NOT NULL,
  `badan_usaha` varchar(20) NOT NULL,
  `jenis_pekerjaan` varchar(20) NOT NULL,
  `org_bank` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `tujuan_penilaian` varchar(20) NOT NULL,
  `jenis_laporan` varchar(20) NOT NULL,
  PRIMARY KEY (`id_tugas`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pemberi_tugas`
--

INSERT INTO `pemberi_tugas` (`id_tugas`, `nama_bank`, `cabang`, `alamat_bank`, `npwp`, `tipe_bank`, `badan_usaha`, `jenis_pekerjaan`, `org_bank`, `email`, `tujuan_penilaian`, `jenis_laporan`) VALUES
(1, 'Bank BRI', 'Kloofkamp', 'JL. Kloofkamp no.1', 'ABCD', 'A BCD', 'ABCDD', 'meow', 'Supardi', 'supready@gmail.com', 'menang', 'ajg'),
(3, 'BB', 'wda', 'dederas', 'dw23', 'daf', 'fwf', 'fawf', 'fawf', 'sony@gmail.com', 'dawd', 'da');

-- --------------------------------------------------------

--
-- Table structure for table `penagihan1`
--

CREATE TABLE IF NOT EXISTS `penagihan1` (
  `id_pen1` int(20) NOT NULL,
  `no_kwitansi` varchar(20) NOT NULL,
  `tgl_pen1` varchar(20) NOT NULL,
  PRIMARY KEY (`id_pen1`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `penagihan2`
--

CREATE TABLE IF NOT EXISTS `penagihan2` (
  `id_pen2` int(20) NOT NULL,
  `no_invoice` varchar(20) NOT NULL,
  `tgl_pen2` varchar(20) NOT NULL,
  `no_faktur` varchar(20) NOT NULL,
  `tgl_faktur` varchar(20) NOT NULL,
  PRIMARY KEY (`id_pen2`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pendaftaran`
--

CREATE TABLE IF NOT EXISTS `pendaftaran` (
  `id_daftar` int(20) NOT NULL,
  `id_bdd` int(20) NOT NULL,
  `id_teknik` int(20) NOT NULL,
  `id_administrasi` int(20) NOT NULL,
  `id_keuangan` int(20) NOT NULL,
  PRIMARY KEY (`id_daftar`),
  KEY `id_bdd` (`id_bdd`),
  KEY `id_teknik` (`id_teknik`),
  KEY `id_administrasi` (`id_administrasi`),
  KEY `id_keuangan` (`id_keuangan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `spk`
--

CREATE TABLE IF NOT EXISTS `spk` (
  `id_spk` int(20) NOT NULL,
  `no_spk` varchar(20) NOT NULL,
  `tgl_spk` date NOT NULL,
  PRIMARY KEY (`id_spk`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `spk`
--

INSERT INTO `spk` (`id_spk`, `no_spk`, `tgl_spk`) VALUES
(1, 'SPK001', '2018-11-16'),
(2, 'SPK002', '2018-11-26'),
(3, 'SPK003', '2018-11-20');

-- --------------------------------------------------------

--
-- Table structure for table `spki`
--

CREATE TABLE IF NOT EXISTS `spki` (
  `id_spki` int(20) NOT NULL,
  `no_spki` varchar(20) NOT NULL,
  `tgl_spki` date NOT NULL,
  PRIMARY KEY (`id_spki`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `spki`
--

INSERT INTO `spki` (`id_spki`, `no_spki`, `tgl_spki`) VALUES
(1, 'SPKI001', '2018-11-20');

-- --------------------------------------------------------

--
-- Table structure for table `surat`
--

CREATE TABLE IF NOT EXISTS `surat` (
  `id_surat` int(20) NOT NULL,
  `id_spk` int(20) NOT NULL,
  `id_spki` int(20) NOT NULL,
  `id_surat_tugas` int(20) NOT NULL,
  `id_opp` int(11) NOT NULL,
  PRIMARY KEY (`id_surat`),
  KEY `id_spk` (`id_spk`),
  KEY `id_spki` (`id_spki`),
  KEY `id_surat_tugas` (`id_surat_tugas`),
  KEY `id_opp` (`id_opp`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `surat_tugas`
--

CREATE TABLE IF NOT EXISTS `surat_tugas` (
  `id_surat_tugas` int(20) NOT NULL,
  `no_surat` varchar(20) NOT NULL,
  `tgl_surat` varchar(20) NOT NULL,
  `surveyor` varchar(20) NOT NULL,
  PRIMARY KEY (`id_surat_tugas`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `teknik`
--

CREATE TABLE IF NOT EXISTS `teknik` (
  `id_teknik` int(11) NOT NULL,
  `tgl_inspeksi` date NOT NULL,
  `proses_pekerjaan` varchar(11) NOT NULL,
  `tgl_email` date NOT NULL,
  `tgl_fl` date NOT NULL,
  `tgl_rl` date NOT NULL,
  `tgl_email1` int(11) NOT NULL,
  `tgl_email2` date NOT NULL,
  `tgl_email3` date NOT NULL,
  `tgl_email4` date NOT NULL,
  `kelengkapan_berkas` varchar(11) NOT NULL,
  `keterangan` varchar(11) NOT NULL,
  PRIMARY KEY (`id_teknik`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `administrasi`
--
ALTER TABLE `administrasi`
  ADD CONSTRAINT `administrasi_ibfk_1` FOREIGN KEY (`id_administrasi`) REFERENCES `pendaftaran` (`id_administrasi`);

--
-- Constraints for table `bdd`
--
ALTER TABLE `bdd`
  ADD CONSTRAINT `bdd_ibfk_3` FOREIGN KEY (`id_fee`) REFERENCES `fee` (`id_fee`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `bdd_ibfk_1` FOREIGN KEY (`id_tugas`) REFERENCES `pemberi_tugas` (`id_tugas`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `bdd_ibfk_2` FOREIGN KEY (`id_objek`) REFERENCES `objek_penilaian` (`id_objek`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD CONSTRAINT `karyawan_ibfk_1` FOREIGN KEY (`id_divisi`) REFERENCES `divisi` (`id_divisi`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `keuangan`
--
ALTER TABLE `keuangan`
  ADD CONSTRAINT `keuangan_ibfk_1` FOREIGN KEY (`id_keuangan`) REFERENCES `pendaftaran` (`id_keuangan`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `keuangan_ibfk_2` FOREIGN KEY (`id_pem1`) REFERENCES `pembayaran1` (`id_pem1`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `keuangan_ibfk_3` FOREIGN KEY (`id_pen1`) REFERENCES `keuangan` (`id_pen1`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `opp`
--
ALTER TABLE `opp`
  ADD CONSTRAINT `opp_ibfk_1` FOREIGN KEY (`id_opp`) REFERENCES `surat` (`id_opp`);

--
-- Constraints for table `pembayaran1`
--
ALTER TABLE `pembayaran1`
  ADD CONSTRAINT `pembayaran1_ibfk_1` FOREIGN KEY (`id_pem1`) REFERENCES `keuangan` (`id_pem1`);

--
-- Constraints for table `pembayaran2`
--
ALTER TABLE `pembayaran2`
  ADD CONSTRAINT `pembayaran2_ibfk_1` FOREIGN KEY (`id_pem2`) REFERENCES `keuangan` (`id_pem2`);

--
-- Constraints for table `penagihan1`
--
ALTER TABLE `penagihan1`
  ADD CONSTRAINT `penagihan1_ibfk_1` FOREIGN KEY (`id_pen1`) REFERENCES `keuangan` (`id_pen1`);

--
-- Constraints for table `penagihan2`
--
ALTER TABLE `penagihan2`
  ADD CONSTRAINT `penagihan2_ibfk_1` FOREIGN KEY (`id_pen2`) REFERENCES `keuangan` (`id_pen2`);

--
-- Constraints for table `pendaftaran`
--
ALTER TABLE `pendaftaran`
  ADD CONSTRAINT `pendaftaran_ibfk_1` FOREIGN KEY (`id_bdd`) REFERENCES `bdd` (`id_bdd`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `pendaftaran_ibfk_2` FOREIGN KEY (`id_teknik`) REFERENCES `teknik` (`id_teknik`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `pendaftaran_ibfk_3` FOREIGN KEY (`id_administrasi`) REFERENCES `administrasi` (`id_administrasi`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `pendaftaran_ibfk_4` FOREIGN KEY (`id_keuangan`) REFERENCES `keuangan` (`id_keuangan`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `surat`
--
ALTER TABLE `surat`
  ADD CONSTRAINT `surat_ibfk_1` FOREIGN KEY (`id_surat`) REFERENCES `bdd` (`id_surat`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `surat_ibfk_3` FOREIGN KEY (`id_spki`) REFERENCES `spki` (`id_spki`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `surat_ibfk_4` FOREIGN KEY (`id_opp`) REFERENCES `opp` (`id_opp`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `surat_ibfk_7` FOREIGN KEY (`id_spk`) REFERENCES `spk` (`id_spk`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `surat_ibfk_8` FOREIGN KEY (`id_surat_tugas`) REFERENCES `surat_tugas` (`id_surat_tugas`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `surat_tugas`
--
ALTER TABLE `surat_tugas`
  ADD CONSTRAINT `surat_tugas_ibfk_1` FOREIGN KEY (`id_surat_tugas`) REFERENCES `surat` (`id_surat_tugas`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `teknik`
--
ALTER TABLE `teknik`
  ADD CONSTRAINT `teknik_ibfk_1` FOREIGN KEY (`id_teknik`) REFERENCES `pendaftaran` (`id_teknik`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
