-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 04, 2019 at 12:55 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

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
-- Table structure for table `hasil`
--

CREATE TABLE `hasil` (
  `id` int(11) NOT NULL,
  `soal_id` int(11) NOT NULL,
  `soal_judul_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `jawaban` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hasil`
--

INSERT INTO `hasil` (`id`, `soal_id`, `soal_judul_id`, `student_id`, `jawaban`) VALUES
(36, 1, 1, 1, 1),
(37, 2, 1, 1, 3),
(38, 3, 1, 1, 3),
(39, 4, 1, 1, 2),
(40, 5, 1, 1, 5),
(41, 6, 1, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `masters`
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
-- Table structure for table `materi`
--

CREATE TABLE `materi` (
  `id` int(11) NOT NULL,
  `mentor_id` int(11) NOT NULL,
  `pelajaran_id` int(11) NOT NULL,
  `materi` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `judul_materi` varchar(191) NOT NULL,
  `cover` varchar(255) NOT NULL DEFAULT 'materi_default.jpg',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `materi`
--

INSERT INTO `materi` (`id`, `mentor_id`, `pelajaran_id`, `materi`, `judul_materi`, `cover`, `created_at`, `updated_at`) VALUES
(34010001, 124030092, 401, 'asd', 'asd', '1562119575_1649750473.jpeg', '2019-07-02 19:06:15', '2019-07-02 19:06:15');

-- --------------------------------------------------------

--
-- Table structure for table `mentors`
--

CREATE TABLE `mentors` (
  `id` int(20) NOT NULL,
  `name` varchar(191) NOT NULL,
  `foto` varchar(191) NOT NULL DEFAULT 'user/mentor_default.jpg',
  `email` varchar(191) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `password` varchar(191) NOT NULL,
  `email_verified_at` varchar(191) DEFAULT NULL,
  `remember_token` varchar(191) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mentors`
--

INSERT INTO `mentors` (`id`, `name`, `foto`, `email`, `tanggal_lahir`, `password`, `email_verified_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(1240391, 'qweqwe', 'user/mentor_default.jpg', 'wahyuchandra110we9@gmail.com', '1997-06-24', '$2y$10$ZYgKdFt.3AjQ0S0RZcZsFeXMWN38hU..d2/LJqlSfNDUHxa/2QFfG', NULL, NULL, '2019-07-03 00:57:33', '2019-07-02 17:43:47'),
(124030092, 'qweqwe', 'user/mentor_default.jpg', 'admin@mozart.com', '2019-07-24', '$2y$10$lxiwBve64CB97lwdjSYXXewatXKTa5uf9VJYEBO2WfNDtcAlnjNDa', NULL, NULL, '2019-07-02 18:02:02', '2019-07-02 18:02:02'),
(125040093, 'wahyu chandra nugroho', 'user/mentor_default.jpg', 'wahyuchandra1109@gmail.com', '2019-07-25', '$2y$10$pHwzQkK2NXI/G2qtvPGwFeES.Xvsu/fF.XzQhXsjdzajmfFND.VOm', NULL, NULL, '2019-07-03 19:09:40', '2019-07-03 19:09:40');

-- --------------------------------------------------------

--
-- Table structure for table `mentor_student`
--

CREATE TABLE `mentor_student` (
  `id` int(11) NOT NULL,
  `mentor_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `date_follow` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mentor_student`
--

INSERT INTO `mentor_student` (`id`, `mentor_id`, `student_id`, `date_follow`) VALUES
(1, 1, 1, '2019-06-29 05:00:42');

-- --------------------------------------------------------

--
-- Table structure for table `nilai`
--

CREATE TABLE `nilai` (
  `id` int(11) NOT NULL,
  `soal_judul_id` int(11) NOT NULL,
  `nilai` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `tanggal_selesai` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `tanggal_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nilai`
--

INSERT INTO `nilai` (`id`, `soal_judul_id`, `nilai`, `student_id`, `tanggal_selesai`, `tanggal_update`) VALUES
(4, 1, 4, 1, '2019-07-01 00:59:55', '2019-07-01 01:00:21');

-- --------------------------------------------------------

--
-- Table structure for table `pelajaran`
--

CREATE TABLE `pelajaran` (
  `id` int(11) NOT NULL,
  `materi_id` int(11) NOT NULL,
  `nama_pelajaran` varchar(191) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelajaran`
--

INSERT INTO `pelajaran` (`id`, `materi_id`, `nama_pelajaran`, `created_at`, `updated_at`) VALUES
(401, 1, 'Matematika', '2019-07-03 02:01:24', '2019-06-29 04:41:07'),
(402, 2, 'IPA', '2019-07-03 02:01:43', '2019-06-29 04:41:29');

-- --------------------------------------------------------

--
-- Table structure for table `soal`
--

CREATE TABLE `soal` (
  `id` int(11) NOT NULL,
  `mentor_id` int(11) NOT NULL,
  `soal_judul_id` bigint(20) NOT NULL,
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

--
-- Dumping data for table `soal`
--

INSERT INTO `soal` (`id`, `mentor_id`, `soal_judul_id`, `pertanyaan`, `pilihan1`, `pilihan2`, `pilihan3`, `pilihan4`, `pilihan5`, `pilihan_benar`, `created_at`, `updated_at`) VALUES
(7, 1, 50092010001, 'apakah', '11', '12', '13', '14', '15', '1', '2019-07-03 04:49:05', '2019-07-02 21:00:35'),
(8, 1, 50092010001, 'pertanyaan2', '21', '22', '23', '24', '25', '2', '2019-07-03 04:49:08', '2019-07-02 21:00:35'),
(9, 1, 50092010001, 'pertanyaan3', '31', '32', '33', '34', '35', '3', '2019-07-03 04:49:11', '2019-07-02 21:00:35'),
(10, 1, 50092010001, 'pertanyaan4', '41', '42', '43', '44', '45', '4', '2019-07-03 04:49:14', '2019-07-02 21:00:35'),
(11, 1, 50092010001, 'pertanyaan5', '51', '52', '53', '54', '55', '5', '2019-07-03 04:49:17', '2019-07-02 21:00:35');

-- --------------------------------------------------------

--
-- Table structure for table `soal_judul`
--

CREATE TABLE `soal_judul` (
  `id` bigint(20) NOT NULL,
  `mentor_id` int(11) NOT NULL,
  `pelajaran_id` int(11) NOT NULL,
  `judul` varchar(191) NOT NULL,
  `jumlah_soal` int(11) NOT NULL,
  `waktu_pengerjaan` int(11) NOT NULL,
  `dibuat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `diupdate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `soal_judul`
--

INSERT INTO `soal_judul` (`id`, `mentor_id`, `pelajaran_id`, `judul`, `jumlah_soal`, `waktu_pengerjaan`, `dibuat`, `diupdate`) VALUES
(50092010001, 124030092, 401, 'Quiz IPA 1', 5, 30, '2019-07-03 04:46:43', '2019-07-02 20:58:18'),
(5009340110002, 125040093, 401, 'quiz', 5, 30, '2019-07-03 19:32:27', '2019-07-03 19:32:27'),
(5009340140110003, 125040093, 401, 'quiz', 5, 30, '2019-07-03 19:33:34', '2019-07-03 19:33:34');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(20) NOT NULL,
  `mentor_id` int(11) DEFAULT NULL,
  `socialite_id` int(11) DEFAULT NULL,
  `socialite_name` varchar(191) DEFAULT NULL,
  `name` varchar(191) NOT NULL,
  `foto` varchar(191) DEFAULT 'user/user_default.png',
  `email` varchar(191) NOT NULL,
  `no_telepon` varchar(191) DEFAULT NULL,
  `password` varchar(191) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `remember_token` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `mentor_id`, `socialite_id`, `socialite_name`, `name`, `foto`, `email`, `no_telepon`, `password`, `email_verified_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(211040001, NULL, NULL, NULL, 'wahyu chandra nugroho', 'user/user_default.png', 'wahyuchandra1109@gmail.com', NULL, '$2y$10$Hibtnr2FCEJ8bg7YUzxNRezox4dtKy12h/GJAGO.svDWg0GoznDay', '2019-07-04 03:04:20', NULL, '2019-07-03 20:04:20', '2019-07-03 20:04:20');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `hasil`
--
ALTER TABLE `hasil`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `masters`
--
ALTER TABLE `masters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `materi`
--
ALTER TABLE `materi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mentors`
--
ALTER TABLE `mentors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mentor_student`
--
ALTER TABLE `mentor_student`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pelajaran`
--
ALTER TABLE `pelajaran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `soal`
--
ALTER TABLE `soal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `soal_judul`
--
ALTER TABLE `soal_judul`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `hasil`
--
ALTER TABLE `hasil`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `mentor_student`
--
ALTER TABLE `mentor_student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `nilai`
--
ALTER TABLE `nilai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pelajaran`
--
ALTER TABLE `pelajaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=403;

--
-- AUTO_INCREMENT for table `soal`
--
ALTER TABLE `soal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
