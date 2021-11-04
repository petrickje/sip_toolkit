-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 30, 2021 at 04:06 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sip_toolkit`
--

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman`
--

CREATE TABLE `peminjaman` (
  `id_peminjaman` int(15) NOT NULL,
  `id_peminjam` varchar(15) NOT NULL,
  `waktu_pinjam` timestamp NULL DEFAULT current_timestamp(),
  `waktu_kembali` date DEFAULT NULL,
  `id_toolkit` int(15) NOT NULL,
  `status` int(5) DEFAULT NULL,
  `id_pemegang` varchar(50) NOT NULL,
  `resi_peminjaman` varchar(50) DEFAULT NULL,
  `resi_pengembalian` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `peminjaman`
--

INSERT INTO `peminjaman` (`id_peminjaman`, `id_peminjam`, `waktu_pinjam`, `waktu_kembali`, `id_toolkit`, `status`, `id_pemegang`, `resi_peminjaman`, `resi_pengembalian`) VALUES
(11, '21120117120021', '2021-10-28 14:25:46', NULL, 10, 5, '1', 'jnt8788', NULL),
(12, '21120117120028', '2021-10-28 14:48:22', NULL, 10, 1, '21120117120021', '', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `toolkit`
--

CREATE TABLE `toolkit` (
  `id_toolkit` int(100) NOT NULL,
  `isi_toolkit` varchar(255) NOT NULL,
  `status` varchar(10) NOT NULL,
  `id_pemegang` varchar(20) DEFAULT NULL,
  `created_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `toolkit`
--

INSERT INTO `toolkit` (`id_toolkit`, `isi_toolkit`, `status`, `id_pemegang`, `created_at`) VALUES
(10, 'NUC 100%, \r\nARDUINO 90%', '1', '21120117120021', '2021-10-20'),
(11, 'Spartan Board 50%\r\nJumper 10pcs\r\nLED 5 Pcs', '1', '1', '2021-10-20'),
(12, 'BredBoard 1 Pcs\r\nLED 6 PCs\r\nNUC 1 PCs', '1', '1', '2021-10-27'),
(13, 'coba', '1', '1', '2021-10-27'),
(14, 'babi lah bujanks', '1', '1', '2021-10-27');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(100) NOT NULL,
  `nim` varchar(15) NOT NULL,
  `password` varchar(40) NOT NULL,
  `nama` varchar(40) NOT NULL,
  `nomor_hp` varchar(14) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `access` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nim`, `password`, `nama`, `nomor_hp`, `alamat`, `access`) VALUES
(3, '21120117120028', 'c4ca4238a0b923820dcc509a6f75849b', 'petrickju', '0813819294944', 'Jl.NIlam N0 1 Sambirotoo', '2'),
(4, '1', 'c4ca4238a0b923820dcc509a6f75849b', 'Admin Lab', '081381929497', 'Lab Tekkom', '1'),
(5, '21120117120026', 'c4ca4238a0b923820dcc509a6f75849b', 'Gredo', '081234567', 'Semarang', '2'),
(6, '21120117120021', 'c4ca4238a0b923820dcc509a6f75849b', 'Tukimin', '0987212', 'Bekasi', '2'),
(8, '12', 'c20ad4d76fe97759aa27a0c99bff6710', 'coba', '23121', 'Test', '2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`id_peminjaman`),
  ADD KEY `id_toolkit` (`id_toolkit`);

--
-- Indexes for table `toolkit`
--
ALTER TABLE `toolkit`
  ADD PRIMARY KEY (`id_toolkit`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `nim` (`nim`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `id_peminjaman` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `toolkit`
--
ALTER TABLE `toolkit`
  MODIFY `id_toolkit` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD CONSTRAINT `peminjaman_ibfk_2` FOREIGN KEY (`id_toolkit`) REFERENCES `toolkit` (`id_toolkit`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
