-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 17 Nov 2019 pada 06.03
-- Versi server: 10.4.6-MariaDB
-- Versi PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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
-- Struktur dari tabel `data_pemilih`
--

CREATE TABLE `data_pemilih` (
  `id` int(9) NOT NULL,
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
-- Dumping data untuk tabel `data_pemilih`
--

INSERT INTO `data_pemilih` (`id`, `nis`, `username`, `password`, `nama`, `kelas`, `idkelas`, `jk`, `status`, `aktif`) VALUES
(3, '10013', '10013', '10013', 'Muji', '10 IPA 3', '3', 'L', 'Sudah Memilih', 1),
(4, '10112', '10112', '10112', '10112', '11 BB', '6', 'L', 'Belum Memilih', 0),
(5, '101156', '101156', '101156', 'Ham', '10 IPA 1', '1', 'L', 'Sudah Memilih', 1),
(6, '99999', '99999', '99999', 'Joni', '11 IPA 1', '5', 'L', 'Belum Memilih', 1),
(7, '3333', '3333', '3333', 'DF', '11 BB', '6', 'L', 'Belum Memilih', 1),
(9, '34344', '22222', '22222', 'Hun', '11 BB', '6', 'L', 'Belum Memilih', 0),
(10, '50505', '50505', '50505', 'ad', '10 IPA 3', '3', 'L', 'Belum Memilih', 1),
(11, '1234', '1234', '1234', 'Hun', '11 BB', '6', 'L', 'Belum Memilih', 0),
(12, '18693', '18693', '18693', 'asdsad', '11 BB', '6', 'P', 'Belum Memilih', 1),
(13, '123123', '333333', '123123', 'Muji', '11 IPS 2', '14', 'L', 'Belum Memilih', 1),
(14, '676799', '676799', '676799', 'Anasa', '11 IPA 1', '5', 'P', 'Sudah Memilih', 1),
(15, '90809', '90809', '90809', 'Burhan', '11 IPA 1', '5', 'L', 'Belum Memilih', 1),
(16, '58213', '58213', '58213', 'Doni', '11 BB', '6', 'L', 'Sudah Memilih', 1),
(21, '123', '123', '123', 'Jola', '11 IPA 1', '5', 'L', 'Belum Memilih', 1),
(22, '333', '333', '333', 'Halim', '10 IPA 1', '1', 'L', 'Sudah Memilih', 1),
(23, '1247', '1247', '1247', 'Raihan', '11 IPA 5', '7', 'L', 'Sudah Memilih', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_pemilihan`
--

CREATE TABLE `data_pemilihan` (
  `idpemilihan` int(9) NOT NULL,
  `tipe` varchar(9) NOT NULL,
  `idpemilih` varchar(9) NOT NULL,
  `idkandidat` varchar(9) NOT NULL,
  `waktu` timestamp(6) NOT NULL DEFAULT current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `data_pemilihan`
--

INSERT INTO `data_pemilihan` (`idpemilihan`, `tipe`, `idpemilih`, `idkandidat`, `waktu`) VALUES
(1, 'siswa', '16', '6', '2019-11-03 03:51:04.552347'),
(2, 'siswa', '16', '7', '2019-11-03 03:51:49.531571'),
(3, 'siswa', '16', '7', '2019-11-03 03:56:18.518054'),
(4, 'siswa', '16', '7', '2019-11-03 04:02:13.135030'),
(5, 'siswa', '3', '6', '2019-11-03 06:48:13.439061'),
(6, 'siswa', '5', '7', '2019-11-03 12:52:34.013495'),
(7, 'siswa', '14', '6', '2019-11-14 23:56:10.826824'),
(8, 'siswa', '23', '6', '2019-11-15 00:01:08.051030'),
(9, 'siswa', '22', '7', '2019-11-15 00:04:35.024002');

-- --------------------------------------------------------

--
-- Struktur dari tabel `groups`
--

CREATE TABLE `groups` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrator'),
(2, 'members', 'General User');

-- --------------------------------------------------------

--
-- Struktur dari tabel `import`
--

CREATE TABLE `import` (
  `id` int(11) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `dob` varchar(20) NOT NULL,
  `contact_no` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kandidat`
--

CREATE TABLE `kandidat` (
  `idkandidat` int(9) NOT NULL,
  `organisasi` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `nourut` varchar(9) NOT NULL,
  `jumlahsuara` varchar(9) NOT NULL,
  `visi` text NOT NULL,
  `misi` text NOT NULL,
  `foto` varchar(50) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kandidat`
--

INSERT INTO `kandidat` (`idkandidat`, `organisasi`, `nama`, `nourut`, `jumlahsuara`, `visi`, `misi`, `foto`, `status`) VALUES
(6, 'OSIS', 'OSMANSA', '01', '4', '<p>OSMANSA</p>', '<p>OSMANSA</p>', 'OSMASA.jpg', '1'),
(7, 'MPK', 'MPK', '02', '5', '<p>MPK</p>', '<p>MPK</p>', 'MPK_VEC.png', '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelas`
--

CREATE TABLE `kelas` (
  `idkelas` int(9) NOT NULL,
  `kelas` varchar(50) NOT NULL,
  `jumlah` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kelas`
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
(29, '12 BB', 36);

-- --------------------------------------------------------

--
-- Struktur dari tabel `login_attempts`
--

CREATE TABLE `login_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(254) NOT NULL,
  `activation_selector` varchar(255) DEFAULT NULL,
  `activation_code` varchar(255) DEFAULT NULL,
  `forgotten_password_selector` varchar(255) DEFAULT NULL,
  `forgotten_password_code` varchar(255) DEFAULT NULL,
  `forgotten_password_time` int(11) UNSIGNED DEFAULT NULL,
  `remember_selector` varchar(255) DEFAULT NULL,
  `remember_code` varchar(255) DEFAULT NULL,
  `created_on` int(11) UNSIGNED NOT NULL,
  `last_login` int(11) UNSIGNED DEFAULT NULL,
  `active` tinyint(1) UNSIGNED DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `email`, `activation_selector`, `activation_code`, `forgotten_password_selector`, `forgotten_password_code`, `forgotten_password_time`, `remember_selector`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`) VALUES
(1, '127.0.0.1', 'administrator', '$2y$12$d88xj0WgEOmJTcoe34Vao.aSEsdFWzk4c8HauQN3ZzFUHR5AnwlrC', 'admin@admin.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1268889823, 1573966978, 1, 'Administrator', 'Utama', 'ADMIN', '0'),
(2, '127.0.0.1', 'muhaqilanaufalhakim@gmail.com', '$2y$10$p8CgsbLyDxWgSbnzrxaR4uHgDOzfRTS8BqHyXDMOuUDVaG.sD7xyO', 'muhaqilanaufalhakim@gmail.com', NULL, NULL, '4468c1b04ef756ab2fac', '$2y$10$tR7JfkLl0vh7llHpz/5Xue3VQLCezovyCoYJcD1pSgB.Js2.QCT9i', 1569615610, NULL, NULL, 1569066245, NULL, 1, 'Administrator', 'Utama', 'Bagus21', '.');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users_groups`
--

CREATE TABLE `users_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `group_id` mediumint(8) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `users_groups`
--

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(8, 1, 1),
(9, 1, 2),
(6, 2, 1),
(7, 2, 2);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `data_pemilih`
--
ALTER TABLE `data_pemilih`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `data_pemilihan`
--
ALTER TABLE `data_pemilihan`
  ADD PRIMARY KEY (`idpemilihan`);

--
-- Indeks untuk tabel `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `import`
--
ALTER TABLE `import`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kandidat`
--
ALTER TABLE `kandidat`
  ADD PRIMARY KEY (`idkandidat`);

--
-- Indeks untuk tabel `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`idkelas`);

--
-- Indeks untuk tabel `login_attempts`
--
ALTER TABLE `login_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uc_email` (`email`),
  ADD UNIQUE KEY `uc_activation_selector` (`activation_selector`),
  ADD UNIQUE KEY `uc_forgotten_password_selector` (`forgotten_password_selector`),
  ADD UNIQUE KEY `uc_remember_selector` (`remember_selector`);

--
-- Indeks untuk tabel `users_groups`
--
ALTER TABLE `users_groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  ADD KEY `fk_users_groups_users1_idx` (`user_id`),
  ADD KEY `fk_users_groups_groups1_idx` (`group_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `data_pemilih`
--
ALTER TABLE `data_pemilih`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `data_pemilihan`
--
ALTER TABLE `data_pemilihan`
  MODIFY `idpemilihan` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `groups`
--
ALTER TABLE `groups`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `import`
--
ALTER TABLE `import`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kandidat`
--
ALTER TABLE `kandidat`
  MODIFY `idkandidat` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `kelas`
--
ALTER TABLE `kelas`
  MODIFY `idkelas` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT untuk tabel `login_attempts`
--
ALTER TABLE `login_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `users_groups`
--
ALTER TABLE `users_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `users_groups`
--
ALTER TABLE `users_groups`
  ADD CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
