-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 16, 2022 at 06:49 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_apotek`
--

-- --------------------------------------------------------

--
-- Table structure for table `t_detailobat`
--

CREATE TABLE `t_detailobat` (
  `no_resep` int(11) NOT NULL,
  `kode_obat` int(11) DEFAULT NULL,
  `dosis` varchar(255) DEFAULT NULL,
  `sub_total` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_detailobat`
--

INSERT INTO `t_detailobat` (`no_resep`, `kode_obat`, `dosis`, `sub_total`) VALUES
(4, 9, 'pasien dewasa adalah 50 mg 1 kali sehari. Dosis dapat ditingkatkan menjadi 50 mg 3 kali sehari. Jika diperlukan, dosis dapat ditingkatkan menjadi 100 mg 3 kali sehari setelah 6–8 minggu. Dosis maksimal 200 mg 3 kali sehari', 15390),
(5, 10, 'Dewasa: Sebagai terapi tunggal, dosis awal 15 mg, 1 kali sehari. Sebagai terapi tambahan bersama lithium atau valporate, dosis awal 10–15 mg, 1 kali sehari. Dosis dapat ditingkatkan sesuai kondisi pasien. Dosis maksimal 30 mg per hari.', 5856000),
(6, 11, 'Dosis umum allylestrenol yang diberikan dokter untuk mencegah keguguran adalah 5 mg, 3 kali sehari selama 5–7 hari. Durasi pengobatan mungkin akan diperpanjang sesuai dengan kondisi pasien.', 7500000),
(7, 12, 'LANSIA (atau debil) dosis awal setengah dosis dewasa. ANAK: dosis awal 25-50 mcg/kg bb/hari dalam 2 dosis terbagi, maksimal 10 mg. Remaja sampai 30 mg/sehari. Terapi tambahan jangka pendek pada ansietas berat, DEWASA: 500 mcg, 2 kali sehari.', 4500000),
(8, 13, '1. Rhinitis. Dewasa: loratadine 10 mg yang dikonsumsi 2 kali sehari. Anak usia di atas 6 tahun: 10 mg yang dikonsumsi 2 kali sehari.', 400000);

-- --------------------------------------------------------

--
-- Table structure for table `t_obat`
--

CREATE TABLE `t_obat` (
  `kode_obat` int(11) NOT NULL,
  `nama_obat` varchar(20) DEFAULT NULL,
  `jenis_obat` varchar(20) DEFAULT NULL,
  `kategori` varchar(255) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_obat`
--

INSERT INTO `t_obat` (`kode_obat`, `nama_obat`, `jenis_obat`, `kategori`, `harga`, `jumlah`) VALUES
(9, 'Acarbose', 'tablet', 'Antidiabetes', 1539, 10),
(10, 'Aripiprazole ', 'tablet', 'antipsikotik ', 292800, 20),
(11, 'Allylestrenol', 'tablet', 'Terapi pengganti hormon progesteron', 150000, 50),
(12, 'Haloperidol', 'tablet', 'obat keras', 45000, 100),
(13, 'Loratadine', 'alergi', 'antihistamin ', 4000, 100);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `t_detailobat`
--
ALTER TABLE `t_detailobat`
  ADD PRIMARY KEY (`no_resep`),
  ADD KEY `kode_obat` (`kode_obat`);

--
-- Indexes for table `t_obat`
--
ALTER TABLE `t_obat`
  ADD PRIMARY KEY (`kode_obat`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `t_detailobat`
--
ALTER TABLE `t_detailobat`
  MODIFY `no_resep` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `t_obat`
--
ALTER TABLE `t_obat`
  MODIFY `kode_obat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `t_detailobat`
--
ALTER TABLE `t_detailobat`
  ADD CONSTRAINT `t_detailobat_ibfk_1` FOREIGN KEY (`kode_obat`) REFERENCES `t_obat` (`kode_obat`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
