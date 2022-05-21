-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 16, 2022 at 08:11 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `puskesmas`
--

-- --------------------------------------------------------

--
-- Table structure for table `dokter`
--

CREATE TABLE IF NOT EXISTS `dokter` (
  `kode_dokter` varchar(5) NOT NULL,
  `kode_pasien` varchar(5) NOT NULL,
  `hasil_diaknosa` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `kamar`
--

CREATE TABLE IF NOT EXISTS `kamar` (
  `kode_kamar` varchar(5) NOT NULL,
  `nama_kamar` varchar(6) NOT NULL,
  `jenis_kamar` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `kunjungan`
--

CREATE TABLE IF NOT EXISTS `kunjungan` (
  `kode_kunjungan` varchar(5) NOT NULL,
  `kode_pasien` varchar(5) NOT NULL,
  `tgl_kunjungan` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `obat`
--

CREATE TABLE IF NOT EXISTS `obat` (
  `kode_obat` varchar(5) NOT NULL,
  `nama_obat` varchar(25) NOT NULL,
  `jenis_obat` varchar(10) NOT NULL,
  `jumlah` varchar(3) NOT NULL,
  `tgl_masuk_obat` date NOT NULL,
  `tgl_keluar_obat` date NOT NULL,
  `kd_dokter` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pasien`
--

CREATE TABLE IF NOT EXISTS `pasien` (
  `kode_pasien` varchar(5) NOT NULL,
  `nama_pasien` varchar(25) NOT NULL,
  `umur` varchar(3) NOT NULL,
  `alamat_pasien` text NOT NULL,
  `pekerjaan` varchar(15) NOT NULL,
  `keluhan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `rawat_inap`
--

CREATE TABLE IF NOT EXISTS `rawat_inap` (
  `kode_rawat_inap` varchar(5) NOT NULL,
  `kode_pasien` varchar(5) NOT NULL,
  `kode_dokter` varchar(5) NOT NULL,
  `kode_kamar` varchar(5) NOT NULL,
  `kode_obat` varchar(5) NOT NULL,
  `tgl_masuk_rawat` date NOT NULL,
  `tgl_keluar_rawat` date NOT NULL,
  `biaya_rawat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `rawat_jalan`
--

CREATE TABLE IF NOT EXISTS `rawat_jalan` (
  `kode_rawat_jalan` varchar(5) NOT NULL,
  `kode_pasien` varchar(5) NOT NULL,
  `kode_kunjungan` varchar(5) NOT NULL,
  `kode_dokter` varchar(5) NOT NULL,
  `kode_obat` varchar(5) NOT NULL,
  `tgl_berobat` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id_user` varchar(5) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(10) NOT NULL,
  `level` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `level`) VALUES
('US001', 'admin', 'admin', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dokter`
--
ALTER TABLE `dokter`
 ADD PRIMARY KEY (`kode_dokter`);

--
-- Indexes for table `kamar`
--
ALTER TABLE `kamar`
 ADD PRIMARY KEY (`kode_kamar`);

--
-- Indexes for table `obat`
--
ALTER TABLE `obat`
 ADD PRIMARY KEY (`kode_obat`);

--
-- Indexes for table `pasien`
--
ALTER TABLE `pasien`
 ADD PRIMARY KEY (`kode_pasien`);

--
-- Indexes for table `rawat_inap`
--
ALTER TABLE `rawat_inap`
 ADD PRIMARY KEY (`kode_rawat_inap`);

--
-- Indexes for table `rawat_jalan`
--
ALTER TABLE `rawat_jalan`
 ADD PRIMARY KEY (`kode_rawat_jalan`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`id_user`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
