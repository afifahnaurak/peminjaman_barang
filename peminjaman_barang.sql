-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 29, 2023 at 12:05 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `peminjaman_barang`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_barang`
--

CREATE TABLE `data_barang` (
  `id` int(11) NOT NULL,
  `kode_barang` varchar(30) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `merek_barang` varchar(50) NOT NULL,
  `tipe_barang` varchar(50) NOT NULL,
  `jumlah_barang` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_barang`
--

INSERT INTO `data_barang` (`id`, `kode_barang`, `nama_barang`, `merek_barang`, `tipe_barang`, `jumlah_barang`) VALUES
(1, 'B001', 'Proyektor', 'Toshiba', '-', 5),
(2, 'B002', 'Hard Disk', 'Samsung', '-', 3),
(3, 'B003', 'Converter HDMI to VGA', 'Vention', 'DVI M1', 10),
(4, 'B004', 'Flash Disk', 'SanDisk', '16 GB', 7),
(5, 'B005', 'Kabel LAN', '-', '-', 30),
(6, 'B006', 'Solder', 'Taffware', '20W – 200W', 15),
(7, 'B007', 'LAN Tester', 'Goodhand', 'CH-868', 45),
(8, 'B008', 'Kabel LAN', 'Commscope', 'CAT5E', 60),
(9, 'B009', 'Handskit', 'Mailtank', '110V 60W', 30),
(10, 'B010', 'Conector RJ45', 'Belden', 'CAT5E', 200),
(11, 'B011', 'AVO Meter', 'AVO Meter', 'DT830B', 20),
(12, 'B012', 'Plug Boot RJ45', 'Unity', 'CAT6', 200),
(13, 'B013', 'Kabel UTP', 'Systimax', '270 Mb/s', 270),
(14, 'B014', 'USB-C', 'OEM', 'C 3.1', 10),
(15, 'B015', 'Stop Kontak', 'Switch', 'F1-44', 20),
(16, 'B016', 'Speaker', 'Bowers & Wilkins', 'M1', 5),
(17, 'B017', 'Arduino UNO', 'Intel', 'Versi 1.0', 20),
(18, 'B018', 'LED', 'Lokal', '3Mm', 50),
(19, 'B019', 'Breadboard', 'CNC', 'DEV-0003', 10),
(20, 'B020', 'Kabel Jumper', 'Starlectric', 'DEV-0008', 20),
(21, 'B021', 'Isolasi Kabel', 'National', '19mm x 33mm ', 15),
(22, 'B022', 'Kabel USB Arduino', 'ArduinoCable', 'ArduinoCable', 5),
(23, 'B023', 'Kabel USB', 'Vention', 'Vention', 10),
(24, 'B024', 'Resistor', 'JRM', '27R', 30),
(25, 'B025', 'Router', 'TP-Link', 'TL-WR940N', 20);

-- --------------------------------------------------------

--
-- Table structure for table `data_peminjam`
--

CREATE TABLE `data_peminjam` (
  `id` int(11) NOT NULL,
  `kode_peminjam` varchar(20) NOT NULL,
  `nama_peminjam` varchar(100) NOT NULL,
  `prodi` varchar(50) NOT NULL,
  `kelas` varchar(20) NOT NULL,
  `nim` varchar(20) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_peminjam`
--

INSERT INTO `data_peminjam` (`id`, `kode_peminjam`, `nama_peminjam`, `prodi`, `kelas`, `nim`, `no_hp`, `foto`) VALUES
(28, 'P001', 'Afifah Naura Kamilia', 'D3 Teknik Informatika', 'IK-2D', '3.34.21.3.02', '082277862668', 'foto_nim/cat.jpg'),
(29, 'P002', 'Agustinus Ricad Simbolon', 'D3 Teknik Informatika', 'IK-2D', '3.34.21.3.03', '087824213690', 'foto_nim/bg.jpg'),
(30, 'P003', 'Salma Afdhila Khalda', 'D3 Teknik Informatika', 'IK-2D', '3.34.21.3.22', '085713593707', 'foto_nim/bggg.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman`
--

CREATE TABLE `peminjaman` (
  `id` int(11) NOT NULL,
  `kode_peminjaman` varchar(20) NOT NULL,
  `matkul` varchar(30) NOT NULL,
  `dosen` varchar(30) NOT NULL,
  `ruangan` varchar(30) NOT NULL,
  `kode_barang` varchar(30) NOT NULL,
  `kode_peminjam` varchar(30) NOT NULL,
  `tanggal_pinjam` date NOT NULL,
  `tanggal_kembali` date NOT NULL,
  `kode_status` enum('belum','sudah') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `peminjaman`
--

INSERT INTO `peminjaman` (`id`, `kode_peminjaman`, `matkul`, `dosen`, `ruangan`, `kode_barang`, `kode_peminjam`, `tanggal_pinjam`, `tanggal_kembali`, `kode_status`) VALUES
(26, 'PM0001', 'Pemrograman Web Dinamis', 'Amran Yobioktabera', 'Lab Pemrograman', 'B001', 'P001', '2022-12-25', '2022-12-25', 'sudah'),
(27, 'PM0002', 'Jaringan Komputer', 'Aisyatul Karima', 'Lab Jarkom', 'B002', 'P001', '2022-12-25', '2022-12-26', 'sudah'),
(30, 'PM0003', 'Sistem Basis Data', 'Slamet Handoko', 'Lab Multimedia', 'B003', 'P002', '2022-12-25', '2022-12-25', 'sudah'),
(31, 'PM0004', 'Jaringan Komputer', 'Aisyatul Karima', 'Lab Jarkom', 'B025', 'P003', '2022-12-25', '2023-01-25', 'sudah'),
(32, 'PM0005', 'Pemrograman Web Dinamis', 'Amran Yobioktabera', 'Lab Multimedia', 'B004', 'P003', '2022-12-26', '2022-12-26', 'belum');

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `id` int(11) NOT NULL,
  `kode_status` varchar(10) NOT NULL,
  `keterangan_status` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`id`, `kode_status`, `keterangan_status`) VALUES
(1, 'belum', 'Belum Dikembalikan'),
(2, 'sudah', 'Sudah Dikembalikan');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` int(11) NOT NULL,
  `kode_peminjam` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama_lengkap`, `no_hp`, `username`, `password`, `level`, `kode_peminjam`) VALUES
(1, 'admin', '081325555970', 'admin', 'admin123', 1, '0'),
(12, 'Afifah Naura Kamilia', '082277862668', 'P001', 'afifah123', 2, '28'),
(13, 'Agustinus Ricad Simbolon', '087824213690', 'P002', 'ricad123', 2, '29'),
(14, 'Salma Afdhila Khalda', '085713593707', 'P003', 'salma123', 2, '30');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_barang`
--
ALTER TABLE `data_barang`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kode_barang` (`kode_barang`);

--
-- Indexes for table `data_peminjam`
--
ALTER TABLE `data_peminjam`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_barang`
--
ALTER TABLE `data_barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `data_peminjam`
--
ALTER TABLE `data_peminjam`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
