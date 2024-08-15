-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 15, 2024 at 01:07 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_umkm_pariwisata`
--

-- --------------------------------------------------------

--
-- Table structure for table `pesanan`
--

CREATE TABLE `pesanan` (
  `id_pesanan` bigint(20) NOT NULL,
  `nama_pemesan` varchar(125) NOT NULL,
  `nomor_hp` varchar(12) NOT NULL,
  `tanggal_mulai_wisata` date NOT NULL,
  `tanggal_pesanan` datetime NOT NULL,
  `durasi_wisata` int(11) NOT NULL,
  `id_paket_wisata` int(11) NOT NULL,
  `layanan_penginapan` tinyint(1) DEFAULT NULL,
  `layanan_transportasi` tinyint(1) DEFAULT NULL,
  `layanan_makanan` tinyint(1) DEFAULT NULL,
  `jumlah_peserta` int(11) NOT NULL,
  `harga_paket` decimal(10,2) DEFAULT NULL,
  `jumlah_tagihan` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pesanan`
--

INSERT INTO `pesanan` (`id_pesanan`, `nama_pemesan`, `nomor_hp`, `tanggal_mulai_wisata`, `tanggal_pesanan`, `durasi_wisata`, `id_paket_wisata`, `layanan_penginapan`, `layanan_transportasi`, `layanan_makanan`, `jumlah_peserta`, `harga_paket`, `jumlah_tagihan`) VALUES
(1, 'John Doe', '081234567890', '2024-08-15', '2024-08-08 12:00:00', 2, 1, 1, 1, 1, 2, 4400000.00, 8800000.00),
(5, 'Pak Wendi', '087216267361', '2002-02-02', '2024-08-08 00:00:00', 1, 0, 0, 1, 0, 2, 1200000.00, 2400000.00),
(11, 'GOJO', '09283717772', '2024-08-08', '2024-08-08 00:00:00', 1, 0, 1, 1, 0, 1, 2200000.00, 2200000.00),
(18, 'Sprei gratis', '087263711736', '2024-08-14', '2024-08-14 00:00:00', 1, 0, 127, 127, 0, 1, 2200000.00, 2200000.00);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id_pesanan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `id_pesanan` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
