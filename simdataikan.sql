-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 22 Apr 2025 pada 03.33
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `simdataikan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `ikan`
--

CREATE TABLE `ikan` (
  `kode_ikan` varchar(10) NOT NULL,
  `nama_ikan` varchar(100) NOT NULL,
  `jenis_ikan` varchar(50) NOT NULL,
  `berat_ikan` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `ikan`
--

INSERT INTO `ikan` (`kode_ikan`, `nama_ikan`, `jenis_ikan`, `berat_ikan`) VALUES
('01', 'bandeng', 'air tawar', 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `ikan`
--
ALTER TABLE `ikan`
  ADD PRIMARY KEY (`kode_ikan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
