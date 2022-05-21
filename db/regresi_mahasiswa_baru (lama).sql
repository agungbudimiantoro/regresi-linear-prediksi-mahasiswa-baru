-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 21, 2022 at 09:14 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `regresi_mahasiswa_baru`
--

-- --------------------------------------------------------

--
-- Table structure for table `perhitungan_prediksi`
--

CREATE TABLE IF NOT EXISTS `perhitungan_prediksi` (
`kd_hitung` int(11) NOT NULL,
  `kd_prodi` varchar(20) NOT NULL,
  `Id_thn_ajaran` varchar(20) NOT NULL,
  `Id_user` varchar(20) NOT NULL,
  `Biaya` varchar(50) NOT NULL,
  `jmlh_Pendaftar` varchar(50) NOT NULL,
  `jmlh_Mahasiswa_baru` varchar(50) NOT NULL,
  `kfsn_det` varchar(50) NOT NULL,
  `kfsn_korelasi` varchar(50) NOT NULL,
  `standar_eror` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `prodi`
--

CREATE TABLE IF NOT EXISTS `prodi` (
  `kd_prodi` varchar(20) NOT NULL,
  `nm_prodi` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prodi`
--

INSERT INTO `prodi` (`kd_prodi`, `nm_prodi`) VALUES
('PRD001', 'sistem informasi');

-- --------------------------------------------------------

--
-- Table structure for table `tahun_ajaran`
--

CREATE TABLE IF NOT EXISTS `tahun_ajaran` (
  `id_thn_ajaran` varchar(30) NOT NULL,
  `tahun_ajaran` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tahun_ajaran`
--

INSERT INTO `tahun_ajaran` (`id_thn_ajaran`, `tahun_ajaran`) VALUES
('THN001', '2022');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id_user` varchar(20) NOT NULL,
  `nm_user` varchar(40) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `email` varchar(40) NOT NULL,
  `level` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nm_user`, `username`, `password`, `email`, `level`) VALUES
('USR001', 'pimpinan', 'pimpinan', '123', 'pimpinan@gmail.com', 'pimpinan'),
('USR002', 'admin', 'admin', 'admin', 'admin@gmail.com', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `perhitungan_prediksi`
--
ALTER TABLE `perhitungan_prediksi`
 ADD PRIMARY KEY (`kd_hitung`);

--
-- Indexes for table `prodi`
--
ALTER TABLE `prodi`
 ADD PRIMARY KEY (`kd_prodi`);

--
-- Indexes for table `tahun_ajaran`
--
ALTER TABLE `tahun_ajaran`
 ADD PRIMARY KEY (`id_thn_ajaran`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `perhitungan_prediksi`
--
ALTER TABLE `perhitungan_prediksi`
MODIFY `kd_hitung` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
