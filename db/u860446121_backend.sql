-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 27, 2022 at 06:57 AM
-- Server version: 10.5.12-MariaDB-cll-lve
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u860446121_backend`
--

-- --------------------------------------------------------

--
-- Table structure for table `brosur`
--

CREATE TABLE `brosur` (
  `id` int(11) NOT NULL,
  `nama_brosur` varchar(30) NOT NULL,
  `deskripsi_brosur` text NOT NULL,
  `thumb_brosur` varchar(30) NOT NULL,
  `file_brosur` varchar(30) NOT NULL,
  `link_youtube` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `brosur`
--

INSERT INTO `brosur` (`id`, `nama_brosur`, `deskripsi_brosur`, `thumb_brosur`, `file_brosur`, `link_youtube`) VALUES
(2, '123123', 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0987654321', 'default.png', 'default.pdf', '7ENFw_tB-Tc'),
(3, 'Test 2', 'testing testing testing abc', 'default.png', 'default.pdf', 'mT9IEg5nk3o'),
(4, 'Test 3', 'adfdafdafadf', 'default.png', 'default.pdf', 'T0gXpG9Meb8'),
(5, 'Test 4', 'a', 'default.png', 'default.pdf', 'T0gXpG9Meb8'),
(6, 'Test 5', 'adfadfadf', 'Test_5.jpg', 'default.pdf', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `penawaran`
--

CREATE TABLE `penawaran` (
  `id_penawaran` int(10) NOT NULL,
  `kode_penawaran` varchar(25) NOT NULL,
  `id_pengguna` int(5) NOT NULL,
  `id_produk` int(5) NOT NULL,
  `qty_penawaran` int(10) NOT NULL,
  `tgl_penawaran` varchar(15) NOT NULL,
  `status_penawaran` varchar(20) DEFAULT 'sedang diproses'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `penawaran`
--

INSERT INTO `penawaran` (`id_penawaran`, `kode_penawaran`, `id_pengguna`, `id_produk`, `qty_penawaran`, `tgl_penawaran`, `status_penawaran`) VALUES
(139, 'SIP-10102022ad9f7', 12, 5, 1, '10/10/2022', 'sedang diproses'),
(140, 'SIP-10102022ad9f7', 12, 3, 1, '10/10/2022', 'sedang diproses'),
(141, 'SIP-101020223e4ab', 1, 3, 4, '10/10/2022', 'sedang diproses'),
(142, 'SIP-1710202234879', 12, 6, 3, '17/10/2022', 'sedang diproses'),
(143, 'SIP-1710202234879', 12, 5, 2, '17/10/2022', 'sedang diproses');

--
-- Triggers `penawaran`
--
DELIMITER $$
CREATE TRIGGER `delete_penawaran` AFTER DELETE ON `penawaran` FOR EACH ROW BEGIN
	update produk set quantity_produk = quantity_produk + old.qty_penawaran
	where id_produk = old.id_produk;
    END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `insert_penawaran` AFTER INSERT ON `penawaran` FOR EACH ROW BEGIN
    UPDATE produk SET quantity_produk = quantity_produk - new.qty_penawaran
    WHERE id_produk = new.id_produk;

    END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `id_pengguna` int(11) NOT NULL,
  `nama_pengguna` char(30) NOT NULL,
  `email_pengguna` varchar(40) NOT NULL,
  `telepon_pengguna` char(12) NOT NULL,
  `instansi_pengguna` varchar(50) DEFAULT NULL,
  `id_role` int(2) NOT NULL,
  `username_pengguna` varchar(20) NOT NULL,
  `password_pengguna` varchar(50) NOT NULL,
  `foto_pengguna` varchar(50) NOT NULL DEFAULT 'default.png',
  `terverifikasi` int(2) NOT NULL DEFAULT 0,
  `last_login` date NOT NULL,
  `date_created` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id_pengguna`, `nama_pengguna`, `email_pengguna`, `telepon_pengguna`, `instansi_pengguna`, `id_role`, `username_pengguna`, `password_pengguna`, `foto_pengguna`, `terverifikasi`, `last_login`, `date_created`) VALUES
(1, 'Muhamad Yulianto', 'admin@admin.com', '00888089821', 'Hamma Creative', 1, 'admin', '66a8a3971e7e9e73318f028c15a83ecf54fd3797', 'Muhamad_Yulianto.png', 1, '2022-09-11', '2022-09-11'),
(5, 'rindah', 'rindahdwi@gmail.com', '08123123123', 'Trita', 2, 'rindah', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'default.jpg', 1, '0000-00-00', '2022-09-12'),
(12, 'Mimin', 'mimin@mail.com', '2313121212', 'HammaCreative', 3, 'mimin', '66a8a3971e7e9e73318f028c15a83ecf54fd3797', 'Mimin.png', 1, '0000-00-00', '2022-10-06'),
(13, 'delviroandikafurqon', 'delviro@gmail.com', '08123123123', 'Sri Intan Perkasa', 1, 'delviro', '7b2e9f54cdff413fcde01f330af6896c3cd7e6cd', 'delviro.jpg', 1, '0000-00-00', '2022-10-07');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(10) NOT NULL,
  `kode_produk` int(50) NOT NULL,
  `nama_produk` varchar(200) NOT NULL,
  `jenis_produk` varchar(100) NOT NULL,
  `harga_produk` int(100) NOT NULL,
  `quantity_produk` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `kode_produk`, `nama_produk`, `jenis_produk`, `harga_produk`, `quantity_produk`) VALUES
(2, 1111, 'abc', 'X-Ray', 100000, 130),
(3, 3033, 'mouse', 'Umum', 5000, 0),
(4, 0, 'Keyboard', 'Umum', 150000, 24),
(5, 222345, 'Hardisk', 'X-Ray', 100000, 54),
(6, 101, 'SSD', 'X-Ray', 2500, 10),
(7, 102, 'FDD', 'Umum', 3000, 7);

-- --------------------------------------------------------

--
-- Table structure for table `role_pengguna`
--

CREATE TABLE `role_pengguna` (
  `id_role` int(2) NOT NULL,
  `nama_role` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `role_pengguna`
--

INSERT INTO `role_pengguna` (`id_role`, `nama_role`) VALUES
(1, 'Superadmin'),
(2, 'Admin'),
(3, 'Pengguna');

-- --------------------------------------------------------

--
-- Table structure for table `token_pengguna`
--

CREATE TABLE `token_pengguna` (
  `id_token` int(11) NOT NULL,
  `email` varchar(30) NOT NULL,
  `token` text NOT NULL,
  `date_created` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_penawaran`
-- (See below for the actual view)
--
CREATE TABLE `view_penawaran` (
`kode_penawaran` varchar(25)
,`instansi` varchar(50)
,`tgl_penawaran` varchar(15)
,`total` decimal(65,0)
,`status` varchar(20)
);

-- --------------------------------------------------------

--
-- Structure for view `view_penawaran`
--
DROP TABLE IF EXISTS `view_penawaran`;

CREATE ALGORITHM=UNDEFINED DEFINER=`u860446121_sriintan`@`%` SQL SECURITY DEFINER VIEW `view_penawaran`  AS   (select `penawaran`.`kode_penawaran` AS `kode_penawaran`,`pengguna`.`instansi_pengguna` AS `instansi`,`penawaran`.`tgl_penawaran` AS `tgl_penawaran`,sum(`penawaran`.`qty_penawaran` * `produk`.`harga_produk`) AS `total`,`penawaran`.`status_penawaran` AS `status` from ((`penawaran` join `produk`) join `pengguna`) where `penawaran`.`id_produk` = `produk`.`id_produk` and `penawaran`.`id_pengguna` = `pengguna`.`id_pengguna` group by `penawaran`.`kode_penawaran`)  ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brosur`
--
ALTER TABLE `brosur`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `penawaran`
--
ALTER TABLE `penawaran`
  ADD PRIMARY KEY (`id_penawaran`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id_pengguna`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `role_pengguna`
--
ALTER TABLE `role_pengguna`
  ADD PRIMARY KEY (`id_role`);

--
-- Indexes for table `token_pengguna`
--
ALTER TABLE `token_pengguna`
  ADD PRIMARY KEY (`id_token`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brosur`
--
ALTER TABLE `brosur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `penawaran`
--
ALTER TABLE `penawaran`
  MODIFY `id_penawaran` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=144;

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id_pengguna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `role_pengguna`
--
ALTER TABLE `role_pengguna`
  MODIFY `id_role` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `token_pengguna`
--
ALTER TABLE `token_pengguna`
  MODIFY `id_token` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
