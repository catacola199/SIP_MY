-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 04 Feb 2020 pada 19.08
-- Versi server: 10.4.10-MariaDB
-- Versi PHP: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jadwal_db`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `absensi`
--

CREATE TABLE `absensi` (
  `id` int(11) NOT NULL,
  `nisn` int(11) NOT NULL,
  `keterangan` varchar(10) NOT NULL,
  `tanggal` varchar(20) NOT NULL,
  `note` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `absensi`
--

INSERT INTO `absensi` (`id`, `nisn`, `keterangan`, `tanggal`, `note`) VALUES
(6, 84893977, 'Izin', '2020-02-03', 'Sakit Gigi'),
(7, 84893977, 'Izin', '2020-02-03', ' Sakit Maag');

-- --------------------------------------------------------

--
-- Struktur dari tabel `absensi_pengajar`
--

CREATE TABLE `absensi_pengajar` (
  `id_absensi` int(11) NOT NULL,
  `id_pengajar` int(20) NOT NULL,
  `status_kehadiran` int(11) NOT NULL,
  `note` text NOT NULL,
  `tgl_submit` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `absensi_pengajar`
--

INSERT INTO `absensi_pengajar` (`id_absensi`, `id_pengajar`, `status_kehadiran`, `note`, `tgl_submit`) VALUES
(1, 54, 3, 'Bolos', '2020-02-04'),
(5, 54, 1, 'Hadir', '2020-02-04');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwal`
--

CREATE TABLE `jadwal` (
  `id` int(11) NOT NULL,
  `hari` varchar(20) NOT NULL,
  `pukul` varchar(30) NOT NULL,
  `id_mapel` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jadwal`
--

INSERT INTO `jadwal` (`id`, `hari`, `pukul`, `id_mapel`) VALUES
(6, 'Senin', '08.00-09.00', 15),
(7, 'Selasa', '09.00-10.00', 15),
(8, 'Rabu', '08.00-9.30', 17),
(9, 'Kamis', '08.00-09.00', 16),
(10, 'Jum\'at', '08.00-09.00', 16);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` int(11) NOT NULL,
  `romawi` varchar(10) NOT NULL,
  `nama_kelas` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `romawi`, `nama_kelas`) VALUES
(1, 'X', 'Sepuluh'),
(2, 'XI', 'Sebelas'),
(3, 'XII', 'Duabelas');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ket_absensi`
--

CREATE TABLE `ket_absensi` (
  `id_ket` int(11) NOT NULL,
  `keterangan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `ket_absensi`
--

INSERT INTO `ket_absensi` (`id_ket`, `keterangan`) VALUES
(1, 'Hadir'),
(2, 'Izin'),
(3, 'Alfa');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mapel`
--

CREATE TABLE `mapel` (
  `id_mapel` int(11) NOT NULL,
  `nama_mapel` varchar(50) NOT NULL,
  `status_mapel` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `mapel`
--

INSERT INTO `mapel` (`id_mapel`, `nama_mapel`, `status_mapel`) VALUES
(15, 'Bahasa Indonesia', 1),
(16, 'Bahasa Inggris', 1),
(17, 'Matematika', 1),
(18, 'Bahasa Asing', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengajar`
--

CREATE TABLE `pengajar` (
  `id_pengajar` int(11) NOT NULL,
  `nik_nip` int(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `guru_mapel` int(11) NOT NULL,
  `kontak` varchar(15) NOT NULL,
  `email` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pengajar`
--

INSERT INTO `pengajar` (`id_pengajar`, `nik_nip`, `nama`, `guru_mapel`, `kontak`, `email`) VALUES
(54, 38959236, 'Jio Ashter S. Kom., M.Kom.', 18, '082177321451', 'testing@gmail.com'),
(55, 2147483647, 'Heru Iryawan S. Pd.', 15, '082178752145', 'iriyawan@gmail.com'),
(56, 2147483647, 'Jaka Susilo S.Pd', 17, '082345467777', 'jaka@gmail.com'),
(57, 2147483647, 'Ramadhan S.Kom., M.Kom', 18, '082345464748', 'ramadhan@gmail.com');

-- --------------------------------------------------------

--
-- Struktur dari tabel `peserta_didik`
--

CREATE TABLE `peserta_didik` (
  `nisn` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `kelas` varchar(5) NOT NULL,
  `prodi_id` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `peserta_didik`
--

INSERT INTO `peserta_didik` (`nisn`, `nama`, `kelas`, `prodi_id`) VALUES
(84893977, 'Jajang Supendi', 'XI', 'TKRO'),
(238325988, 'Suherman', 'XI', 'TKJ'),
(797565665, 'Agung Purwanto', 'XI', 'TKJ'),
(2147483647, 'Susi Pudjiastuti', 'XI', 'AKTN');

-- --------------------------------------------------------

--
-- Struktur dari tabel `prodi_jurusan`
--

CREATE TABLE `prodi_jurusan` (
  `id_prodi` varchar(10) NOT NULL,
  `nama_prodi` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `prodi_jurusan`
--

INSERT INTO `prodi_jurusan` (`id_prodi`, `nama_prodi`) VALUES
('AKTN', 'Akuntansi'),
('TKJ', 'Teknik Komputer & Jaringan'),
('TKRO', 'Teknik Kendaraan Ringan (Otomotif)');

-- --------------------------------------------------------

--
-- Struktur dari tabel `role`
--

CREATE TABLE `role` (
  `role_id` int(11) NOT NULL,
  `role_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `role`
--

INSERT INTO `role` (`role_id`, `role_name`) VALUES
(1, 'Admin'),
(2, 'Pengajar/Guru');

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `totalabsensi`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `totalabsensi` (
`totalabsensi` bigint(21)
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `totalpengajar`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `totalpengajar` (
`total_pengajar` bigint(21)
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `totalpeserta`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `totalpeserta` (
`total_peserta` bigint(21)
);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role` int(1) NOT NULL,
  `nickname` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `role`, `nickname`) VALUES
(4, 'admin@gmail.com', 'admin123', 1, 'Administrator'),
(6, 'user@test.com', 'uqwhuqwh', 2, 'Pengajar');

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `usertotal`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `usertotal` (
`total_user` bigint(21)
);

-- --------------------------------------------------------

--
-- Struktur untuk view `totalabsensi`
--
DROP TABLE IF EXISTS `totalabsensi`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `totalabsensi`  AS  select count(`absensi`.`keterangan`) AS `totalabsensi` from `absensi` ;

-- --------------------------------------------------------

--
-- Struktur untuk view `totalpengajar`
--
DROP TABLE IF EXISTS `totalpengajar`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `totalpengajar`  AS  select count(`pengajar`.`nama`) AS `total_pengajar` from `pengajar` ;

-- --------------------------------------------------------

--
-- Struktur untuk view `totalpeserta`
--
DROP TABLE IF EXISTS `totalpeserta`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `totalpeserta`  AS  select count(`peserta_didik`.`nama`) AS `total_peserta` from `peserta_didik` ;

-- --------------------------------------------------------

--
-- Struktur untuk view `usertotal`
--
DROP TABLE IF EXISTS `usertotal`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `usertotal`  AS  select count(`user`.`username`) AS `total_user` from `user` ;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `absensi`
--
ALTER TABLE `absensi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nisn` (`nisn`);

--
-- Indeks untuk tabel `absensi_pengajar`
--
ALTER TABLE `absensi_pengajar`
  ADD PRIMARY KEY (`id_absensi`),
  ADD KEY `status_kehadiran` (`status_kehadiran`),
  ADD KEY `nik_nip` (`id_pengajar`);

--
-- Indeks untuk tabel `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_mapel` (`id_mapel`);

--
-- Indeks untuk tabel `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indeks untuk tabel `ket_absensi`
--
ALTER TABLE `ket_absensi`
  ADD PRIMARY KEY (`id_ket`);

--
-- Indeks untuk tabel `mapel`
--
ALTER TABLE `mapel`
  ADD PRIMARY KEY (`id_mapel`);

--
-- Indeks untuk tabel `pengajar`
--
ALTER TABLE `pengajar`
  ADD PRIMARY KEY (`id_pengajar`),
  ADD KEY `guru_mapel` (`guru_mapel`);

--
-- Indeks untuk tabel `peserta_didik`
--
ALTER TABLE `peserta_didik`
  ADD PRIMARY KEY (`nisn`);

--
-- Indeks untuk tabel `prodi_jurusan`
--
ALTER TABLE `prodi_jurusan`
  ADD PRIMARY KEY (`id_prodi`);

--
-- Indeks untuk tabel `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`role_id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `absensi`
--
ALTER TABLE `absensi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `absensi_pengajar`
--
ALTER TABLE `absensi_pengajar`
  MODIFY `id_absensi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `ket_absensi`
--
ALTER TABLE `ket_absensi`
  MODIFY `id_ket` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `mapel`
--
ALTER TABLE `mapel`
  MODIFY `id_mapel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `pengajar`
--
ALTER TABLE `pengajar`
  MODIFY `id_pengajar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT untuk tabel `role`
--
ALTER TABLE `role`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `absensi`
--
ALTER TABLE `absensi`
  ADD CONSTRAINT `absensi_ibfk_1` FOREIGN KEY (`nisn`) REFERENCES `peserta_didik` (`nisn`);

--
-- Ketidakleluasaan untuk tabel `absensi_pengajar`
--
ALTER TABLE `absensi_pengajar`
  ADD CONSTRAINT `absensi_pengajar_ibfk_1` FOREIGN KEY (`status_kehadiran`) REFERENCES `ket_absensi` (`id_ket`),
  ADD CONSTRAINT `absensi_pengajar_ibfk_2` FOREIGN KEY (`id_pengajar`) REFERENCES `pengajar` (`id_pengajar`);

--
-- Ketidakleluasaan untuk tabel `jadwal`
--
ALTER TABLE `jadwal`
  ADD CONSTRAINT `jadwal_ibfk_1` FOREIGN KEY (`id_mapel`) REFERENCES `mapel` (`id_mapel`);

--
-- Ketidakleluasaan untuk tabel `pengajar`
--
ALTER TABLE `pengajar`
  ADD CONSTRAINT `pengajar_ibfk_1` FOREIGN KEY (`guru_mapel`) REFERENCES `mapel` (`id_mapel`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
