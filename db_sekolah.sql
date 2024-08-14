-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 14, 2024 at 05:52 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_sekolah`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_berita`
--

CREATE TABLE `tb_berita` (
  `judul` varchar(50) NOT NULL,
  `waktu` date NOT NULL,
  `gambar` varchar(200) NOT NULL,
  `deskripsi` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_berita`
--

INSERT INTO `tb_berita` (`judul`, `waktu`, `gambar`, `deskripsi`) VALUES
('Teknologi', '2024-08-14', '../uploads/gambar2.jpg', 'asdasd'),
('Festival', '2024-08-11', '../uploads/a.jpeg', 'asdasdasdas');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kontak`
--

CREATE TABLE `tb_kontak` (
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `pesan` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_kontak`
--

INSERT INTO `tb_kontak` (`nama`, `email`, `pesan`) VALUES
('rudolf', 'rudolf@gmail.com', 'asdasd'),
('rudolf', 'rudolf@gmail.com', 'asdasd'),
('asd', 'asda@aasd', 'asdas'),
('ridho', 'admin@admin.com', 'asdasd'),
('Mochamad Ridho', 'Riedbless17@gmail.com', 'asdasda'),
('Mochamad Ridho', 'Riedbless17@gmail.com', 'asdasda'),
('Mochamad Ridho', 'Riedbless17@gmail.com', 'asdasda');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
