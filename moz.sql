-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 19 Jul 2019 pada 08.21
-- Versi server: 10.1.37-MariaDB
-- Versi PHP: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `moz`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `hasil`
--

CREATE TABLE `hasil` (
  `kode_soal` varchar(30) NOT NULL,
  `kode_judul_soal` varchar(25) NOT NULL,
  `id_student` varchar(25) NOT NULL,
  `jawaban` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `judul_soal`
--

CREATE TABLE `judul_soal` (
  `kode_judul_soal` varchar(25) NOT NULL,
  `id_mentor` varchar(25) NOT NULL,
  `kode_mapel` varchar(25) NOT NULL,
  `judul` varchar(191) NOT NULL,
  `jumlah_soal` int(11) NOT NULL,
  `tanggal_mulai` varchar(20) DEFAULT NULL,
  `tanggal_selesai` varchar(20) DEFAULT NULL,
  `dibuat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `diupdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `master`
--

CREATE TABLE `master` (
  `username` varchar(25) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `master`
--

INSERT INTO `master` (`username`, `password`) VALUES
('master', '$2y$10$.wFhvEMf8OSZqeSVulvfcO8iixNvHjubfY/O7JGDnXHinD6gbFw4C');

-- --------------------------------------------------------

--
-- Struktur dari tabel `masters`
--

CREATE TABLE `masters` (
  `id` int(10) NOT NULL,
  `name` varchar(191) NOT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `email_verified_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updatedd_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `materi`
--

CREATE TABLE `materi` (
  `kode_materi` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_mentor` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_mapel` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `judul_materi` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cover` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'cover_materi/cover_materi_default.jpg',
  `materi` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `dibuat` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `diupdate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `mentors`
--

CREATE TABLE `mentors` (
  `id_mentor` varchar(25) NOT NULL,
  `name` varchar(191) NOT NULL,
  `foto` varchar(191) NOT NULL DEFAULT 'user/mentor_default.jpg',
  `email` varchar(191) NOT NULL,
  `password` varchar(191) NOT NULL,
  `kuota` int(10) NOT NULL DEFAULT '30',
  `email_verified_at` varchar(191) DEFAULT NULL,
  `remember_token` varchar(191) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `mentor_student`
--

CREATE TABLE `mentor_student` (
  `kode_mengikuti` varchar(25) NOT NULL,
  `id_mentor` varchar(25) NOT NULL,
  `id_student` varchar(25) NOT NULL,
  `tanggal_mengikuti` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mentor_student`
--

INSERT INTO `mentor_student` (`kode_mengikuti`, `id_mentor`, `id_student`, `tanggal_mengikuti`) VALUES
('IKT-2-1-1', 'MNTR-2', 'STD-1', '2019-07-19 05:56:29');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(9, '2014_10_12_100000_create_password_resets_table', 1),
(10, '2019_06_20_044229_create_materi_table', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilai`
--

CREATE TABLE `nilai` (
  `kode_nilai` varchar(25) NOT NULL,
  `kode_judul_soal` varchar(25) NOT NULL,
  `nilai` int(20) NOT NULL,
  `id_student` varchar(25) NOT NULL,
  `status` varchar(20) DEFAULT NULL,
  `tanggal_selesai` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `tanggal_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('wa@gmail.com', '$2y$10$8Y6XU4S1/D3MGTNt.fNCCeBC966BgDECzg3GgoEY5TRRyW7DHqVQ2', '2019-07-18 22:52:06');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelajaran`
--

CREATE TABLE `pelajaran` (
  `kode_mapel` varchar(25) NOT NULL,
  `id_mentor` varchar(25) NOT NULL,
  `nama_pelajaran` varchar(191) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pelajaran`
--

INSERT INTO `pelajaran` (`kode_mapel`, `id_mentor`, `nama_pelajaran`, `created_at`, `updated_at`) VALUES
('MPL-1-1', 'MNTR-1', 'Matematika', '2019-07-18 23:14:31', '2019-07-18 23:14:31');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelajaran_student`
--

CREATE TABLE `pelajaran_student` (
  `kode_join_pelajaran_student` int(25) NOT NULL,
  `id_mentor` varchar(25) NOT NULL,
  `id_student` varchar(25) NOT NULL,
  `kode_mapel` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `soal`
--

CREATE TABLE `soal` (
  `kode_soal` varchar(30) NOT NULL,
  `id_mentor` varchar(25) NOT NULL,
  `kode_judul_soal` varchar(25) NOT NULL,
  `pertanyaan` varchar(191) NOT NULL,
  `pilihan1` varchar(191) NOT NULL,
  `pilihan2` varchar(191) NOT NULL,
  `pilihan3` varchar(191) NOT NULL,
  `pilihan4` varchar(191) NOT NULL,
  `pilihan5` varchar(191) NOT NULL,
  `pilihan_benar` varchar(191) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `students`
--

CREATE TABLE `students` (
  `id_student` varchar(25) NOT NULL,
  `mentor_id` int(11) DEFAULT NULL,
  `socialite_id` int(11) DEFAULT NULL,
  `socialite_name` varchar(191) DEFAULT NULL,
  `name` varchar(191) NOT NULL,
  `foto` varchar(191) DEFAULT 'user/user_default.png',
  `email` varchar(191) NOT NULL,
  `no_telepon` varchar(191) DEFAULT NULL,
  `password` varchar(191) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `remember_token` varchar(191) DEFAULT NULL,
  `tanggal_daftar` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `diupdate` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `hasil`
--
ALTER TABLE `hasil`
  ADD PRIMARY KEY (`kode_soal`);

--
-- Indeks untuk tabel `judul_soal`
--
ALTER TABLE `judul_soal`
  ADD PRIMARY KEY (`kode_judul_soal`);

--
-- Indeks untuk tabel `master`
--
ALTER TABLE `master`
  ADD PRIMARY KEY (`username`);

--
-- Indeks untuk tabel `masters`
--
ALTER TABLE `masters`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `materi`
--
ALTER TABLE `materi`
  ADD PRIMARY KEY (`kode_materi`);

--
-- Indeks untuk tabel `mentors`
--
ALTER TABLE `mentors`
  ADD PRIMARY KEY (`id_mentor`);

--
-- Indeks untuk tabel `mentor_student`
--
ALTER TABLE `mentor_student`
  ADD PRIMARY KEY (`kode_mengikuti`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`kode_nilai`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `pelajaran`
--
ALTER TABLE `pelajaran`
  ADD PRIMARY KEY (`kode_mapel`);

--
-- Indeks untuk tabel `pelajaran_student`
--
ALTER TABLE `pelajaran_student`
  ADD PRIMARY KEY (`kode_join_pelajaran_student`);

--
-- Indeks untuk tabel `soal`
--
ALTER TABLE `soal`
  ADD PRIMARY KEY (`kode_soal`);

--
-- Indeks untuk tabel `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id_student`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `pelajaran_student`
--
ALTER TABLE `pelajaran_student`
  MODIFY `kode_join_pelajaran_student` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
