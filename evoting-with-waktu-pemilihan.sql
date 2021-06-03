-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 12, 2021 at 04:51 PM
-- Server version: 8.0.21
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `evoting`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_pemilih`
--

CREATE TABLE `data_pemilih` (
  `id` bigint NOT NULL,
  `nis` varchar(9) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `kelas` varchar(20) NOT NULL,
  `idkelas` varchar(9) NOT NULL,
  `jk` varchar(1) NOT NULL,
  `status` varchar(50) NOT NULL,
  `aktif` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_pemilih`
--

INSERT INTO `data_pemilih` (`id`, `nis`, `username`, `password`, `nama`, `kelas`, `idkelas`, `jk`, `status`, `aktif`) VALUES
(29268, '333', '333', '333', 'Halim', '10 IPA 1', '1', 'L', 'Belum Memilih', 1),
(29269, '123', '123', '123', 'Jola', '11 IPA 1', '5', 'L', 'Belum Memilih', 1),
(29270, '58213', '58213', '58213', 'Doni', '11 BB', '6', 'L', 'Belum Memilih', 1),
(29271, '90809', '90809', '90809', 'Burhan', '11 IPA 1', '5', 'L', 'Belum Memilih', 1),
(29272, '676799', '676799', '676799', 'Anasa', '11 IPA 1', '5', 'P', 'Belum Memilih', 1),
(29273, '123123', '123123', '123123', 'Muji', '11 IPS 2', '14', 'L', 'Belum Memilih', 1),
(29274, '18693', '18693', '18693', 'asdsad', '11 BB', '6', 'P', 'Belum Memilih', 1),
(29275, '1234', '1234', '1234', 'Hun', '11 BB', '6', 'L', 'Belum Memilih', 1),
(29276, '50505', '50505', '50505', 'ad', '10 IPA 3', '3', 'L', 'Belum Memilih', 1),
(29277, '34344', '22222', '22222', 'Hun', '11 BB', '6', 'L', 'Belum Memilih', 1),
(29278, '3333', '525', '525', 'DF', '11 BB', '6', 'L', 'Belum Memilih', 1),
(29279, '99999', '99999', '99999', 'Joni', '11 IPA 1', '5', 'L', 'Belum Memilih', 1),
(29280, '101156', '101156', '101156', 'Ham', '10 IPA 1', '1', 'L', 'Belum Memilih', 1),
(29281, '10112', '1011295s5', '10112', '10112', '11 BB', '6', 'L', 'Belum Memilih', 1),
(29282, '10013', '100137888', '10013', 'Muji', '10 IPA 3', '3', 'L', 'Belum Memilih', 1),
(29283, '10011', 'qweqe12', 'qweqwe', 'Naufal', '11 IPA 5', '7', 'L', 'Belum Memilih', 1),
(29284, '333', '333', '333', '333', '12 IPA 5', '21', 'L', 'Belum Memilih', 1);

-- --------------------------------------------------------

--
-- Table structure for table `data_pemilihan`
--

CREATE TABLE `data_pemilihan` (
  `idpemilihan` int NOT NULL,
  `tipe` varchar(9) NOT NULL,
  `idpemilih` varchar(9) NOT NULL,
  `idkandidat` varchar(9) NOT NULL,
  `waktu` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` mediumint UNSIGNED NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrator'),
(2, 'members', 'General User');

-- --------------------------------------------------------

--
-- Table structure for table `import`
--

CREATE TABLE `import` (
  `id` int NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `dob` varchar(20) NOT NULL,
  `contact_no` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `kandidat`
--

CREATE TABLE `kandidat` (
  `idkandidat` int NOT NULL,
  `organisasi` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `nourut` varchar(9) NOT NULL,
  `jumlahsuara` varchar(9) NOT NULL,
  `visi` text NOT NULL,
  `misi` text NOT NULL,
  `foto` varchar(50) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `idkelas` int NOT NULL,
  `kelas` varchar(50) NOT NULL,
  `jumlah` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`idkelas`, `kelas`, `jumlah`) VALUES
(1, '10 IPA 1', 36),
(2, '10 IPA 2', 36),
(3, '10 IPA 3', 36),
(4, '10 BB', 36),
(5, '11 IPA 1', 36),
(6, '11 BB', 36),
(7, '11 IPA 5', 36),
(8, '11 IPA 4', 36),
(9, '11 IPA 3', 36),
(10, '11 IPA 2', 36),
(11, '11 IPA 6', 36),
(12, '11 IPA 7', 36),
(13, '11 IPS 1', 36),
(14, '11 IPS 2', 36),
(15, '11 IPS 3', 36),
(16, '11 IPS 4', 36),
(17, '12 IPA 1', 36),
(18, '12 IPA 2', 36),
(19, '12 IPA 3', 36),
(20, '12 IPA 4', 36),
(21, '12 IPA 5', 36),
(22, '12 IPA 6', 36),
(24, '12 IPA 7', 36),
(25, '12 IPS 1', 36),
(26, '12 IPS 2', 36),
(27, '12 IPS 3', 36),
(28, '12 IPS 4', 36),
(29, '12 BB', 36),
(30, '12 IPS 4', 36),
(31, '12 IPS 3', 36),
(32, '12 IPS 2', 36),
(33, '12 IPS 1', 36),
(34, '12 IPA 7', 36),
(35, '12 IPA 6', 36),
(36, '12 IPA 5', 36),
(37, '12 IPA 4', 36),
(38, '12 IPA 3', 36),
(39, '12 IPA 2', 36),
(40, '12 IPA 1', 36),
(41, '12 BB', 36),
(42, '11 IPS 4', 36),
(43, '11 IPS 3', 36),
(44, '11 IPS 2', 36),
(45, '11 IPS 1', 36),
(46, '11 IPA 7', 36),
(47, '11 IPA 6', 36),
(48, '11 IPA 5', 36),
(49, '11 IPA 4', 36),
(50, '11 IPA 3', 36),
(51, '11 IPA 2', 36),
(52, '11 IPA 1', 36),
(53, '11 BB', 36),
(54, '10 IPA 3', 36),
(55, '10 IPA 2', 36),
(56, '10 IPA 1', 36),
(57, '10 BB', 36);

-- --------------------------------------------------------

--
-- Table structure for table `login_attempts`
--

CREATE TABLE `login_attempts` (
  `id` int UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `penyelenggara` text NOT NULL,
  `tps` text NOT NULL,
  `provinsi` text NOT NULL,
  `kota` text NOT NULL,
  `kecamatan` text NOT NULL,
  `kelurahan` text NOT NULL,
  `alamat` text NOT NULL,
  `mulai` datetime NOT NULL DEFAULT '2021-03-13 21:00:00',
  `selesai` datetime NOT NULL DEFAULT '2021-03-13 21:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `timestamp`, `penyelenggara`, `tps`, `provinsi`, `kota`, `kecamatan`, `kelurahan`, `alamat`, `mulai`, `selesai`) VALUES
(1, '2019-12-03 19:35:11', 'E-Voting SMANSA', '01', 'Jawa Tengah', 'Surakarta', 'Kartasura', 'Pabelan', 'UMS Secretariat, Main Building Siti Walidah UMS, Jl. A. Yani No.284, Pabelan, Kartasura, Kota Surakarta, Jawa Tengah 57162', '2021-03-12 22:30:00', '2021-03-12 23:25:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(254) NOT NULL,
  `activation_selector` varchar(255) DEFAULT NULL,
  `activation_code` varchar(255) DEFAULT NULL,
  `forgotten_password_selector` varchar(255) DEFAULT NULL,
  `forgotten_password_code` varchar(255) DEFAULT NULL,
  `forgotten_password_time` int UNSIGNED DEFAULT NULL,
  `remember_selector` varchar(255) DEFAULT NULL,
  `remember_code` varchar(255) DEFAULT NULL,
  `created_on` int UNSIGNED NOT NULL,
  `last_login` int UNSIGNED DEFAULT NULL,
  `active` tinyint UNSIGNED DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `email`, `activation_selector`, `activation_code`, `forgotten_password_selector`, `forgotten_password_code`, `forgotten_password_time`, `remember_selector`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`) VALUES
(1, '127.0.0.1', 'administrator', '$2y$12$d88xj0WgEOmJTcoe34Vao.aSEsdFWzk4c8HauQN3ZzFUHR5AnwlrC', 'admin@admin.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1268889823, 1615554891, 1, 'Administrator', 'Utama', 'ADMIN', '0');

-- --------------------------------------------------------

--
-- Table structure for table `users_groups`
--

CREATE TABLE `users_groups` (
  `id` int UNSIGNED NOT NULL,
  `user_id` int UNSIGNED NOT NULL,
  `group_id` mediumint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users_groups`
--

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(8, 1, 1),
(9, 1, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_pemilih`
--
ALTER TABLE `data_pemilih`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_pemilihan`
--
ALTER TABLE `data_pemilihan`
  ADD PRIMARY KEY (`idpemilihan`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `import`
--
ALTER TABLE `import`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kandidat`
--
ALTER TABLE `kandidat`
  ADD PRIMARY KEY (`idkandidat`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`idkelas`);

--
-- Indexes for table `login_attempts`
--
ALTER TABLE `login_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uc_email` (`email`),
  ADD UNIQUE KEY `uc_activation_selector` (`activation_selector`),
  ADD UNIQUE KEY `uc_forgotten_password_selector` (`forgotten_password_selector`),
  ADD UNIQUE KEY `uc_remember_selector` (`remember_selector`);

--
-- Indexes for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  ADD KEY `fk_users_groups_users1_idx` (`user_id`),
  ADD KEY `fk_users_groups_groups1_idx` (`group_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_pemilih`
--
ALTER TABLE `data_pemilih`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29285;

--
-- AUTO_INCREMENT for table `data_pemilihan`
--
ALTER TABLE `data_pemilihan`
  MODIFY `idpemilihan` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` mediumint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `import`
--
ALTER TABLE `import`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kandidat`
--
ALTER TABLE `kandidat`
  MODIFY `idkandidat` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `idkelas` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `login_attempts`
--
ALTER TABLE `login_attempts`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users_groups`
--
ALTER TABLE `users_groups`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
