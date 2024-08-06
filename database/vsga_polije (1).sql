-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 18, 2024 at 05:17 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vsga_polije`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_buku`
--

CREATE TABLE `tb_buku` (
  `id` int NOT NULL,
  `judul` varchar(50) DEFAULT NULL,
  `pengarang` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `penerbit` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `gambar` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_buku`
--

INSERT INTO `tb_buku` (`id`, `judul`, `pengarang`, `penerbit`, `gambar`) VALUES
(1, 'Staff JTI Inovation', 'polije', 'informasi ini ', 'Buku -Staff JTI Inovation.png'),
(2, 'rektor', 'minimal haru s good looking dll', 'bagian devisi jurusan TI', 'Buku-rektor.jpeg'),
(3, 'Staff JTI Inovation', 'informasi ini disampaikan pada web yang selalu akan di update tiap harinya jangan lupa follow up untuk mengetehui informasi terupdate lainnya', 'Gramedia Pustaka Utama', 'Buku-Staff JTI Inovation.jpeg'),
(4, 'Teknisi ahli', 'minimal d3,s1,s2,s3,s teh', 'memiliki keahlian dan keminatan pada bidang tersebut ', 'Buku-Teknisi ahli.jpeg'),
(5, 'Staf ahli', 'lulusan d3 jurusan Teknologi Informasi', 'pengalaman kerja minimal 2 tahun', 'Buku-Staf ahli.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id` int NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `no_wa` varchar(50) DEFAULT NULL,
  `level` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id`, `nama`, `username`, `password`, `no_wa`, `level`) VALUES
(1, 'Admin ', 'admin@gmail.com', 'a91ea0aae4194a31b03d3edf8a4a271e7ae7edf8', '087865354344', '1'),
(2, 'Vicky', 'vicky@gmail.com', '64706328d494b2459f1b8ffdbd18a05cab8ebfb8', '0892140940', '2'),
(3, 'P', 'p@gmail.com', 'a91ea0aae4194a31b03d3edf8a4a271e7ae7edf8', '081231312', '2'),
(4, 'O', 'o@gmail.com', 'a91ea0aae4194a31b03d3edf8a4a271e7ae7edf8', '08456789098', '2'),
(5, 'Vickyy', 'vickyW@gmai.com', '601f1889667efaebb33b8c12572835da3f027f78', '098265782478', '2'),
(6, 'Vicky Prasetyo', 'vicky12@gmail.com', '601f1889667efaebb33b8c12572835da3f027f78', '082144233366', '2'),
(7, 'Vicky Fernando Anggara Putra Ikhwanto', 'v@gmail.com', 'a91ea0aae4194a31b03d3edf8a4a271e7ae7edf8', '-888188188189', '2'),
(8, 'Sovia Lajuba', 'vq@gmail.com', '601f1889667efaebb33b8c12572835da3f027f78', '134123441234', ''),
(9, 'admin', 'admin@admin.com', 'd033e22ae348aeb5660fc2140aec35850c4da997', '08234567654', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_buku`
--
ALTER TABLE `tb_buku`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_buku`
--
ALTER TABLE `tb_buku`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
