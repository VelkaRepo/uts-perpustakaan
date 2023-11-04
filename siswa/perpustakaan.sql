-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 04, 2023 at 08:56 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perpustakaan`
--

-- --------------------------------------------------------

--
-- Table structure for table `anggota`
--

CREATE TABLE `anggota` (
  `id_anggota` int(11) NOT NULL,
  `nama` varchar(35) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(32) NOT NULL,
  `telp` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `anggota`
--

INSERT INTO `anggota` (`id_anggota`, `nama`, `username`, `password`, `telp`) VALUES
(1, 'Dionisius Lucky N', '8803202204', 'luckkkkyyyyy', '08583838383'),
(2, 'John Doe', 'johndoe123', 'mysecret123', '123-456-7890'),
(3, 'Jane Smith', 'janesmith456', 'janepass789', '987-654-3210'),
(4, 'Alice Johnson', 'alicej', 'alicepassword', '555-123-4567'),
(5, 'Bob Johnson', 'bobj', 'bobpass456', '444-789-1234'),
(6, 'John Doe', 'john.doe', 'password6', '081600000006'),
(7, 'Jane Smith', 'jane.smith', 'password7', '081600000007'),
(8, 'Michael Johnson', 'michael.johnson', 'password8', '081600000008'),
(9, 'Emily Davis', 'emily.davis', 'password9', '081600000009'),
(10, 'William Wilson', 'william.wilson', 'password10', '081600000010'),
(11, 'Olivia Martinez', 'olivia.martinez', 'password11', '081600000011'),
(12, 'James Lee', 'james.lee', 'password12', '081600000012'),
(13, 'Emma Brown', 'emma.brown', 'password13', '081600000013'),
(14, 'Benjamin Harris', 'benjamin.harris', 'password14', '081600000014'),
(15, 'Sophia Clark', 'sophia.clark', 'password15', '081600000015'),
(16, 'Liam Walker', 'liam.walker', 'password16', '081600000016'),
(17, 'Ava Green', 'ava.green', 'password17', '081600000017'),
(18, 'Noah Taylor', 'noah.taylor', 'password18', '081600000018'),
(19, 'Isabella Hall', 'isabella.hall', 'password19', '081600000019'),
(20, 'Mason White', 'mason.white', 'password20', '081600000020'),
(21, 'Oliver Lopez', 'oliver.lopez', 'password21', '081600000021'),
(22, 'Sophia Adams', 'sophia.adams', 'password22', '081600000022'),
(23, 'Liam Mitchell', 'liam.mitchell', 'password23', '081600000023'),
(24, 'Ava Scott', 'ava.scott', 'password24', '081600000024'),
(25, 'Emma Nelson', 'emma.nelson', 'password25', '081600000025');

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `kode_buku` char(6) NOT NULL,
  `judul` varchar(35) NOT NULL,
  `penulis` varchar(35) NOT NULL,
  `penerbit` varchar(35) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `stok` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`kode_buku`, `judul`, `penulis`, `penerbit`, `foto`, `stok`) VALUES
('A1', 'Harry Potter and the Deathly Hallow', 'JK. Rowling', ' Bloomsbury Publishing', 'Deathly Hallows.jpg', 2),
('A2', 'Don Quijote', 'Miguel de Cervantes', 'Francisco de Robles', 'Don_Quijote.jpg', 6),
('A3', 'The Lord of The Rings', 'J. R. R. Tolkien', 'Allen & Unwin', 'TLOR1.jpg', 1),
('A4', 'To Kill a Mockingbird', 'Harper Lee', 'J. B. Lippincott & Co.', 'MOCKINGBIRD.jpg', 2),
('A5', 'The Da Vinci Code', 'Dan Brown', 'Doubleday', 'Da Vinci Code.jpg', 2),
('B1', 'Educated: A Memoir', 'Tara Westover', 'Random House', 'Educated.jpg', 4),
('B2', 'Thinking, Fast and Slow', 'Daniel Kahneman', 'Farrar, Straus and Giroux', 'Thinking, Fast and Slow.jpg', 3),
('B3', 'Becoming', 'Michelle Obama', 'Crown Publishing Group', 'Becoming.jpg', 2),
('B4', 'The Wright Brothers', 'David McCullough', 'Simon & Schuster', 'The Wright Brothers.jpg', 2),
('B5', 'Outliers', 'Malcolm Gladwell', 'Little, Brown and Company', 'Outliers.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman`
--

CREATE TABLE `peminjaman` (
  `id_peminjaman` int(11) NOT NULL,
  `kode_buku` char(6) NOT NULL,
  `id_anggota` int(11) NOT NULL,
  `id_petugas` int(11) NOT NULL,
  `tgl_pinjam` date NOT NULL,
  `tgl_kembali` date NOT NULL,
  `status` enum('pengajuan','proses','selesai') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `peminjaman`
--

INSERT INTO `peminjaman` (`id_peminjaman`, `kode_buku`, `id_anggota`, `id_petugas`, `tgl_pinjam`, `tgl_kembali`, `status`) VALUES
(1, 'A1', 2, 98, '2023-11-02', '2023-11-09', 'proses'),
(2, 'B2', 4, 99, '2023-11-07', '2023-11-10', 'pengajuan'),
(3, 'A3', 4, 98, '2023-10-29', '2023-11-03', 'selesai');

-- --------------------------------------------------------

--
-- Table structure for table `petugas`
--

CREATE TABLE `petugas` (
  `id_petugas` int(11) NOT NULL,
  `nama_petugas` varchar(35) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(32) NOT NULL,
  `telp` varchar(13) NOT NULL,
  `level` enum('admin','petugas') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `petugas`
--

INSERT INTO `petugas` (`id_petugas`, `nama_petugas`, `username`, `password`, `telp`, `level`) VALUES
(98, 'petugas', 'perpus', '1227e3d2550306c3c01ca4f3f52552bc', '88878788', 'petugas'),
(99, 'admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', '999999999', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`id_anggota`);

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`kode_buku`);

--
-- Indexes for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`id_peminjaman`),
  ADD KEY `id_anggota` (`id_anggota`),
  ADD KEY `id_petugas` (`id_petugas`),
  ADD KEY `kode_buku` (`kode_buku`);

--
-- Indexes for table `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`id_petugas`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `anggota`
--
ALTER TABLE `anggota`
  MODIFY `id_anggota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `id_peminjaman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `petugas`
--
ALTER TABLE `petugas`
  MODIFY `id_petugas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD CONSTRAINT `peminjaman_ibfk_1` FOREIGN KEY (`id_anggota`) REFERENCES `anggota` (`id_anggota`),
  ADD CONSTRAINT `peminjaman_ibfk_2` FOREIGN KEY (`id_petugas`) REFERENCES `petugas` (`id_petugas`),
  ADD CONSTRAINT `peminjaman_ibfk_3` FOREIGN KEY (`kode_buku`) REFERENCES `buku` (`kode_buku`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
