-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 28, 2019 at 06:06 PM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `perpustakaan`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `admin_id` int(11) NOT NULL AUTO_INCREMENT,
  `admin_nama` varchar(255) NOT NULL,
  `admin_username` varchar(255) NOT NULL,
  `admin_password` varchar(255) NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_nama`, `admin_username`, `admin_password`) VALUES
(1, 'Admin', 'admin', '21232f297a57a5a743894a0e4a801fc3'),
(2, 'User', 'user', 'ee11cbb19052e40b07aac0ca060c23ee');

-- --------------------------------------------------------

--
-- Table structure for table `anggota`
--

CREATE TABLE IF NOT EXISTS `anggota` (
  `anggota_id` int(11) NOT NULL AUTO_INCREMENT,
  `anggota_nama` varchar(255) NOT NULL,
  `anggota_alamat` text NOT NULL,
  `anggota_jk` varchar(255) NOT NULL,
  `anggota_hp` varchar(255) NOT NULL,
  `anggota_ktp` varchar(255) NOT NULL,
  PRIMARY KEY (`anggota_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=33 ;

--
-- Dumping data for table `anggota`
--

INSERT INTO `anggota` (`anggota_id`, `anggota_nama`, `anggota_alamat`, `anggota_jk`, `anggota_hp`, `anggota_ktp`) VALUES
(12, 'Hendrik Adi Saputra', 'Jl kH yusuf 50 tasikmadu Lowokwaru Malang', '1', '+628988373566', '3573215165165165'),
(31, 'Adi Nugraha', 'Jl Ijen Malang', '1', '+6287546313513', '3576546546546545'),
(32, 'Borzoi', 'Jl Jalan', '1', '+6288965465432', '35415468478/4654');

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE IF NOT EXISTS `buku` (
  `buku_id` int(11) NOT NULL AUTO_INCREMENT,
  `buku_judul` varchar(255) NOT NULL,
  `buku_penulis` varchar(255) NOT NULL,
  `buku_tahun` int(11) NOT NULL,
  `buku_status` int(11) NOT NULL,
  PRIMARY KEY (`buku_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`buku_id`, `buku_judul`, `buku_penulis`, `buku_tahun`, `buku_status`) VALUES
(4, 'Harry Potter', 'Andrea', 1990, 2),
(9, 'Ayat Ayat Cinta', 'Aku', 2015, 2),
(10, 'Dilan 1990', 'Aku', 1992, 1);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE IF NOT EXISTS `transaksi` (
  `transaksi_id` int(11) NOT NULL AUTO_INCREMENT,
  `transaksi_karyawan` int(11) NOT NULL,
  `transaksi_anggota` int(11) NOT NULL,
  `transaksi_buku` int(11) NOT NULL,
  `transaksi_tgl_pinjam` date NOT NULL,
  `transaksi_tgl_kembali` date NOT NULL,
  `transaksi_harga` int(11) NOT NULL,
  `transaksi_denda` int(11) NOT NULL,
  `transaksi_tgl` date NOT NULL,
  `transaksi_totaldenda` int(11) NOT NULL,
  `transaksi_status` int(11) NOT NULL,
  `transaksi_dikembalikan` date NOT NULL,
  PRIMARY KEY (`transaksi_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`transaksi_id`, `transaksi_karyawan`, `transaksi_anggota`, `transaksi_buku`, `transaksi_tgl_pinjam`, `transaksi_tgl_kembali`, `transaksi_harga`, `transaksi_denda`, `transaksi_tgl`, `transaksi_totaldenda`, `transaksi_status`, `transaksi_dikembalikan`) VALUES
(16, 1, 12, 4, '2019-01-08', '2019-01-26', 50000, 5000, '2019-01-08', 25000, 1, '2019-01-31'),
(18, 1, 12, 4, '2019-01-08', '2019-01-10', 5000, 2000, '2019-01-08', 14000, 1, '2019-01-17'),
(20, 2, 12, 4, '2019-01-08', '2019-01-31', 6000, 1000, '2019-01-08', 2000, 1, '2019-02-02'),
(21, 1, 31, 9, '2019-01-11', '2019-01-14', 5000, 2000, '2019-01-11', 0, 0, '0000-00-00'),
(22, 1, 32, 10, '2019-01-26', '2019-01-28', 10000, 5000, '2019-01-26', 15000, 1, '2019-01-31');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
