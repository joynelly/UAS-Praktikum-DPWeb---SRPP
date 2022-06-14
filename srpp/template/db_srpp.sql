-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 27, 2022 at 03:25 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_srpp`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_kurikulum_user`
--

CREATE TABLE `data_kurikulum_user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `data_kurikulum_utama_id` bigint(20) UNSIGNED NOT NULL,
  `sks` int(11) NOT NULL,
  `semester` int(11) NOT NULL,
  `ambil` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nilai` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mutu` decimal(3,2) DEFAULT NULL,
  `prioritas` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `data_kurikulum_utama`
--

CREATE TABLE `data_kurikulum_utama` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kurikulum_id` bigint(20) UNSIGNED NOT NULL,
  `kode_matkul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sks` int(11) NOT NULL,
  `semester` int(11) NOT NULL,
  `nama_matkul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kategori` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `data_kurikulum_utama`
--

INSERT INTO `data_kurikulum_utama` (`id`, `kurikulum_id`, `kode_matkul`, `sks`, `semester`, `nama_matkul`, `kategori`, `created_at`, `updated_at`) VALUES
(1, 3, 'KU100', 2, 1, 'Pendidikan Agama', 'MKU', '2022-05-26 15:59:08', '2022-05-26 15:59:08'),
(2, 3, 'KU105', 2, 1, 'Pendidikan Kewarganegaraan', 'MKU', '2022-05-26 15:59:08', '2022-05-26 15:59:08'),
(3, 3, 'KU106', 2, 1, 'Pendidikan Bahasa Indonesia', 'MKU', '2022-05-26 15:59:08', '2022-05-26 15:59:08'),
(4, 1, 'IK200', 3, 1, 'Arsitektur dan Organisasi Komputer', 'MKKIPS', '2022-05-26 15:59:08', '2022-05-26 15:59:08'),
(5, 1, 'IK100', 3, 1, 'Algoritma dan Pemrograman 1', 'MKKIPS', '2022-05-26 15:59:08', '2022-05-26 15:59:08'),
(6, 1, 'IK110', 3, 1, 'Kalkulus', 'MKKIPS', '2022-05-26 15:59:08', '2022-05-26 15:59:08'),
(7, 1, 'IK130', 3, 1, 'Logika Informatika', 'MKKIPS', '2022-05-26 15:59:08', '2022-05-26 15:59:08'),
(8, 1, 'IK260', 3, 1, 'Teori Bahasa dan Automata', 'MKKIPS', '2022-05-26 15:59:08', '2022-05-26 15:59:08'),
(9, 3, 'KU110', 2, 2, 'Pendidikan Pancasila', 'MKU', '2022-05-26 15:59:08', '2022-05-26 15:59:08'),
(10, 1, 'HU300', 2, 2, 'Pengantar Pendidikan', 'MKKU', '2022-05-26 15:59:08', '2022-05-26 15:59:08'),
(11, 1, 'IK220', 3, 2, 'Sistem Kontrol', 'MKKIPS', '2022-05-26 15:59:08', '2022-05-26 15:59:08'),
(12, 1, 'IK270', 3, 2, 'Rekayasa Perangkat Lunak', 'MKKIPS', '2022-05-26 15:59:08', '2022-05-26 15:59:08'),
(13, 1, 'IK230', 3, 2, 'Design dan Pemrograman Web', 'MKKIPS', '2022-05-26 15:59:08', '2022-05-26 15:59:08'),
(14, 1, 'IK160', 3, 2, 'Algoritma dan Pemrograman 2', 'MKKIPS', '2022-05-26 15:59:08', '2022-05-26 15:59:08'),
(15, 1, 'IK170', 3, 2, 'Sistem Basis Data', 'MKKIPS', '2022-05-26 15:59:08', '2022-05-26 15:59:08'),
(16, 1, 'IK310', 2, 2, 'Kriptografi', 'MKKIPS', '2022-05-26 15:59:08', '2022-05-26 15:59:08'),
(17, 1, 'IK280', 3, 3, 'Kecerdasan Buatan', 'MKKIPS', '2022-05-26 15:59:08', '2022-05-26 15:59:08'),
(18, 1, 'IK505', 3, 3, 'Data Mining and Warehouse', 'MKKIPS', '2022-05-26 15:59:08', '2022-05-26 15:59:08'),
(19, 1, 'IK207', 3, 3, 'Jaringan Komputer', 'MKKIPS', '2022-05-26 15:59:08', '2022-05-26 15:59:08'),
(20, 1, 'IK217', 3, 3, 'Sistem Informasi', 'MKKIPS', '2022-05-26 15:59:08', '2022-05-26 15:59:08'),
(21, 1, 'IK320', 3, 3, 'Grafika Komputer dan Multimedia', 'MKKIPS', '2022-05-26 15:59:08', '2022-05-26 15:59:08'),
(22, 1, 'IK500', 3, 3, 'Machine Learning', 'MKKIPS', '2022-05-26 15:59:08', '2022-05-26 15:59:08'),
(23, 1, 'IK240', 3, 3, 'Struktur Data', 'MKKIPS', '2022-05-26 15:59:08', '2022-05-26 15:59:08'),
(24, 1, 'IK300', 3, 4, 'Pemrograman Visual dan Piranti Bergerak', 'MKKIPS', '2022-05-26 15:59:08', '2022-05-26 15:59:08'),
(25, 1, 'IK290', 3, 4, 'Desain dan Pemrograman Berorientasi Objek', 'MKKIPS', '2022-05-26 15:59:08', '2022-05-26 15:59:08'),
(26, 1, 'IK237', 3, 4, 'Analisis dan Desain Algoritma', 'MKKIPS', '2022-05-26 15:59:08', '2022-05-26 15:59:08'),
(27, 1, 'IK400', 3, 4, 'Metodologi Penelitian', 'MKKIPS', '2022-05-26 15:59:08', '2022-05-26 15:59:08'),
(28, 1, 'IK545', 2, 4, 'Big Data Platforms', 'MKKIPS', '2022-05-26 15:59:08', '2022-05-26 15:59:08'),
(29, 1, 'PT502', 4, 4, 'Proyek Konsultasi', '-', '2022-05-26 15:59:08', '2022-05-26 15:59:08'),
(30, 1, 'IK250', 3, 4, 'Sistem Operasi', 'MKKIPS', '2022-05-26 15:59:08', '2022-05-26 15:59:08'),
(31, 1, 'KU300', 2, 5, 'Seminar Pendidikan Agama', 'MKU', '2022-05-26 15:59:08', '2022-05-26 15:59:08'),
(32, 1, 'IK140', 2, 5, 'Bahasa Inggris', 'MKKIPS', '2022-05-26 15:59:08', '2022-05-26 15:59:08'),
(33, 1, 'IK150', 2, 5, 'Statistika', 'MKKIPS', '2022-05-26 15:59:08', '2022-05-26 15:59:08'),
(34, 1, 'IK430', 2, 5, 'E-Business', 'MKKIPS', '2022-05-26 15:59:08', '2022-05-26 15:59:08'),
(35, 1, 'IK120', 2, 5, 'Paradigma Pemrograman', 'MKKIPS', '2022-05-26 15:59:08', '2022-05-26 15:59:08'),
(36, 1, 'MA100', 3, 6, 'MSTR (Matematika, Sains, Teknologi dan Rekayasa)', 'MKKF', '2022-05-26 15:59:08', '2022-05-26 15:59:08'),
(37, 3, 'KU400', 2, 6, 'Kuliah Kerja Nyata (KKN)', '-', '2022-05-26 15:59:08', '2022-05-26 15:59:08'),
(38, 1, 'IK420', 2, 6, 'Seminar', 'MKKIPS', '2022-05-26 15:59:08', '2022-05-26 15:59:08'),
(39, 1, 'IK180', 2, 6, 'Aljabar Linier dan Matriks', 'MKKIPS', '2022-05-26 15:59:08', '2022-05-26 15:59:08'),
(40, 1, 'IK227', 2, 6, 'Teknik Riset Operasi', 'MKKIPS', '2022-05-26 15:59:08', '2022-05-26 15:59:08'),
(41, 1, 'IK190', 2, 6, 'Etika Profesi Teknologi Informasi dan Komunikasi', 'MKKIPS', '2022-05-26 15:59:08', '2022-05-26 15:59:08'),
(42, 3, 'KU108', 2, 7, 'Pendidikan Jasmani dan Olahraga*', 'MKU', '2022-05-26 15:59:08', '2022-05-26 15:59:08'),
(43, 1, 'MA200', 3, 7, 'Aplikasi MSTR (Matematika, Sains, Teknologi dan Rekayasa)', 'MKKF', '2022-05-26 15:59:08', '2022-05-26 15:59:08'),
(44, 1, 'IK210', 2, 7, 'Metode Numerik', 'MKKPS', '2022-05-26 15:59:08', '2022-05-26 15:59:08'),
(45, 1, 'IK410', 2, 7, 'Kewirausahaan Ilmu Komputer', 'MKKIPS', '2022-05-26 15:59:08', '2022-05-26 15:59:08'),
(46, 1, 'IK360', 2, 7, 'Kapita Selekta', 'MKKIPS', '2022-05-26 15:59:08', '2022-05-26 15:59:08'),
(47, 3, 'IK598', 6, 8, 'Skripsi', '-', '2022-05-26 15:59:08', '2022-05-26 15:59:08'),
(48, 3, 'IK599', 0, 8, 'Ujian Sidang', '', '2022-05-26 15:59:08', '2022-05-26 15:59:08'),
(49, 3, 'IK590', 4, 8, 'Praktik Pengalaman Lapangan (PPL)', 'MKPPL', '2022-05-26 15:59:08', '2022-05-26 15:59:08'),
(50, 2, 'DK301', 2, 1, 'Psikologi Pendidikan dan Bimbingan', 'MKDK', '2022-05-26 15:59:08', '2022-05-26 15:59:08'),
(51, 2, 'IK131', 3, 1, 'Algoritma dan Pemrograman', 'MKKIPS', '2022-05-26 15:59:08', '2022-05-26 15:59:08'),
(52, 2, 'IK214', 3, 1, 'Desain Grafis', 'MKKIPS', '2022-05-26 15:59:08', '2022-05-26 15:59:08'),
(53, 2, 'IK121', 3, 1, 'Arsitektur dan Organisasi Komputer', 'MKKIPS', '2022-05-26 15:59:08', '2022-05-26 15:59:08'),
(54, 2, 'IK161', 3, 1, 'Kalkulus', 'MKKIPS', '2022-05-26 15:59:08', '2022-05-26 15:59:08'),
(55, 2, 'DK300', 2, 2, 'Landasan Pendidikan', 'MKDK', '2022-05-26 15:59:08', '2022-05-26 15:59:08'),
(56, 2, 'IK401', 2, 2, 'Strategi Pembelajaran Ilmu Komputer', 'MKKPBS', '2022-05-26 15:59:08', '2022-05-26 15:59:08'),
(57, 2, 'IK231', 2, 2, 'Paradigma Berpikir Komputasi', 'MKKIPS', '2022-05-26 15:59:08', '2022-05-26 15:59:08'),
(58, 2, 'IK221', 3, 2, 'Matematika Diskrit', 'MKKIPS', '2022-05-26 15:59:08', '2022-05-26 15:59:08'),
(59, 2, 'IK141', 3, 2, 'Struktur Data', 'MKKIPS', '2022-05-26 15:59:08', '2022-05-26 15:59:08'),
(60, 2, 'IK151', 2, 2, 'Bahasa Inggris', 'MKKIPS', '2022-05-26 15:59:08', '2022-05-26 15:59:08'),
(61, 2, 'IK113', 3, 2, 'Rangkaian Elektronika', 'MKKIPS', '2022-05-26 15:59:08', '2022-05-26 15:59:08'),
(62, 2, 'IK211', 3, 3, 'Sistem Basis Data', 'MKKIPS', '2022-05-26 15:59:08', '2022-05-26 15:59:08'),
(63, 2, 'IK311', 3, 3, 'Aljabar Linier dan Matriks', 'MKKIPS', '2022-05-26 15:59:08', '2022-05-26 15:59:08'),
(64, 2, 'IK281', 3, 3, 'Sistem Operasi', 'MKKIPS', '2022-05-26 15:59:08', '2022-05-26 15:59:08'),
(65, 2, 'IK171', 2, 3, 'Statistika', 'MKKIPS', '2022-05-26 15:59:08', '2022-05-26 15:59:08'),
(66, 2, 'IK213', 3, 3, 'Jaringan Komputer', 'MKKIPS', '2022-05-26 15:59:08', '2022-05-26 15:59:08'),
(67, 2, 'IK212', 3, 3, 'Pemrograman Internet', 'MKKIPS', '2022-05-26 15:59:08', '2022-05-26 15:59:08'),
(68, 2, 'IK403', 3, 3, 'Perencanaan Pembelajaran Ilmu Komputer', 'MKKPBS', '2022-05-26 15:59:08', '2022-05-26 15:59:08'),
(69, 2, 'IK331', 3, 3, 'Metodologi Penelitian Pendidikan Ilmu Komputer', 'MKKIPS', '2022-05-26 15:59:08', '2022-05-26 15:59:08'),
(70, 2, 'DK303', 2, 4, 'Kurikulum dan Pembelajaran', 'MKDK', '2022-05-26 15:59:08', '2022-05-26 15:59:08'),
(71, 2, 'DK304', 2, 4, 'Pengelolaan Pendidikan', 'MKDK', '2022-05-26 15:59:08', '2022-05-26 15:59:08'),
(72, 2, 'IK402', 3, 4, 'Evaluasi Pembelajaran Ilmu Komputer', 'MKKPBS', '2022-05-26 15:59:08', '2022-05-26 15:59:08'),
(73, 2, 'IK312', 3, 4, 'Rekayasa Perangkat Lunak', 'MKKIPS', '2022-05-26 15:59:08', '2022-05-26 15:59:08'),
(74, 2, 'IK314', 3, 4, 'Teknik Pengolahan Audio dan Video', 'MKKIPS', '2022-05-26 15:59:08', '2022-05-26 15:59:08'),
(75, 2, 'IK222', 3, 4, 'Pemrograman Berorientasi Objek', 'MKKIPS', '2022-05-26 15:59:08', '2022-05-26 15:59:08'),
(76, 2, 'IK404', 3, 5, 'Literasi TIK dan Media Pembelajaran Ilmu Komputer', 'MKKPBS', '2022-05-26 15:59:08', '2022-05-26 15:59:08'),
(77, 2, 'IK241', 3, 5, 'Metode Numerik', 'MKKIPS', '2022-05-26 15:59:08', '2022-05-26 15:59:08'),
(78, 2, 'IK321', 3, 5, 'Seminar', 'MKKIPS', '2022-05-26 15:59:08', '2022-05-26 15:59:08'),
(79, 2, 'IK322', 3, 5, 'Mobile Programming', 'MKKIPS', '2022-05-26 15:59:08', '2022-05-26 15:59:08'),
(80, 2, 'IK324', 3, 5, 'Animasi', 'MKKIPS', '2022-05-26 15:59:08', '2022-05-26 15:59:08'),
(81, 2, 'IK313', 3, 5, 'Administrasi Sistem dan Infra Struktur Jaringan', 'MKKIPS', '2022-05-26 15:59:08', '2022-05-26 15:59:08'),
(82, 2, 'IK111', 3, 6, 'Pengantar Konsep Teknologi Informasi', 'MKKIPS', '2022-05-26 15:59:08', '2022-05-26 15:59:08'),
(83, 2, 'IK261', 2, 7, 'Kewirausahaan', 'MKKIPS', '2022-05-26 15:59:08', '2022-05-26 15:59:08'),
(84, 2, 'IK251', 2, 7, 'Kapita Selekta', 'MKKIPS', '2022-05-26 15:59:08', '2022-05-26 15:59:08'),
(85, 2, 'IK271', 2, 7, 'Etika Profesi', 'MKKIPS', '2022-05-26 15:59:08', '2022-05-26 15:59:08'),
(86, 1, 'IK530', 3, 0, 'Mobile Application Development', 'MKKPS', '2022-05-26 15:59:08', '2022-05-26 15:59:08'),
(87, 1, 'IK350', 3, 0, 'Interaksi Manusia dan Komputer', 'MKKPS', '2022-05-26 15:59:08', '2022-05-26 15:59:08'),
(88, 1, 'IK510', 3, 0, 'Komputasi Paralel dan Terdistribusi', 'MKKPS', '2022-05-26 15:59:08', '2022-05-26 15:59:08'),
(89, 1, 'IK380', 2, 0, 'Basis Data Non Relational', 'MKKPS', '2022-05-26 15:59:08', '2022-05-26 15:59:08'),
(90, 1, 'IK330', 3, 0, 'Manajemen Proyek Perangkat Lunak', 'MKKPS', '2022-05-26 15:59:08', '2022-05-26 15:59:08'),
(91, 1, 'IK520', 3, 0, 'Project Keahlian', 'MKKIPS', '2022-05-26 15:59:08', '2022-05-26 15:59:08'),
(92, 1, 'IK501', 2, 0, 'Pengujian dan Pemeliharaan Perangkat Lunak', 'MKKPS', '2022-05-26 15:59:08', '2022-05-26 15:59:08'),
(93, 1, 'IK511', 2, 0, 'Rekayasa Aplikasi Kemaritiman', 'MKKIPS', '2022-05-26 15:59:08', '2022-05-26 15:59:08'),
(94, 1, 'IK521', 2, 0, 'Service Computing Engineering', 'MKKPS', '2022-05-26 15:59:08', '2022-05-26 15:59:08'),
(95, 1, 'IK531', 2, 0, 'Game Application Development', 'MKKPS', '2022-05-26 15:59:08', '2022-05-26 15:59:08'),
(96, 1, 'IK541', 3, 0, 'Teknik Interfacing', 'MKKPS', '2022-05-26 15:59:08', '2022-05-26 15:59:08'),
(97, 1, 'IK551', 3, 2, 'Manajemen Kualitas Perangkat Lunak', 'MKKPS', '2022-05-26 15:59:08', '2022-05-26 15:59:08'),
(98, 1, 'IK561', 2, 0, 'Rekayasa Aplikasi Bisnis', 'MKKPS', '2022-05-26 15:59:08', '2022-05-26 15:59:08'),
(99, 1, 'IK571', 3, 0, 'Rekayasa Informasi', 'MKKPS', '2022-05-26 15:59:08', '2022-05-26 15:59:08'),
(100, 1, 'IK581', 2, 0, 'Software Quality Assurance', 'MKKPS', '2022-05-26 15:59:08', '2022-05-26 15:59:08'),
(101, 1, 'IK591', 3, 0, 'Teknik Kompilasi', 'MKKPS', '2022-05-26 15:59:08', '2022-05-26 15:59:08'),
(102, 1, 'IK502', 2, 0, 'Pengolahan Citra Digital', 'MKKPS', '2022-05-26 15:59:08', '2022-05-26 15:59:08'),
(103, 1, 'IK512', 2, 0, 'Intelligent Games', 'MKKPS', '2022-05-26 15:59:08', '2022-05-26 15:59:08'),
(104, 1, 'IK522', 2, 0, 'Pengolahan Bahasa Alami', 'MKKPS', '2022-05-26 15:59:08', '2022-05-26 15:59:08'),
(105, 1, 'IK532', 3, 0, 'Deep Learning', 'MKKPS', '2022-05-26 15:59:08', '2022-05-26 15:59:08'),
(106, 1, 'IK542', 2, 0, 'Computer Vision', 'MKKPS', '2022-05-26 15:59:08', '2022-05-26 15:59:08'),
(107, 1, 'IK552', 2, 0, 'Internet of Things', 'MKKPS', '2022-05-26 15:59:08', '2022-05-26 15:59:08'),
(108, 1, 'IK562', 3, 0, 'Kontrol dan Robotika', 'MKKPS', '2022-05-26 15:59:08', '2022-05-26 15:59:08'),
(109, 1, 'IK572', 3, 0, 'Expert System', 'MKKPS', '2022-05-26 15:59:08', '2022-05-26 15:59:08'),
(110, 1, 'IK582', 3, 0, 'Speech Recognition and Synthesis', 'MKKPS', '2022-05-26 15:59:08', '2022-05-26 15:59:08'),
(111, 1, 'IK340', 2, 0, 'Sistem Cerdas', 'MKKPS', '2022-05-26 15:59:08', '2022-05-26 15:59:08'),
(112, 1, 'IK503', 2, 0, 'Teknik Audio dan Video', 'MKKPS', '2022-05-26 15:59:08', '2022-05-26 15:59:08'),
(113, 1, 'IK513', 2, 0, 'Game Programming', 'MKKPS', '2022-05-26 15:59:08', '2022-05-26 15:59:08'),
(114, 1, 'IK523', 2, 0, 'Visual Communication Design', 'MKKPS', '2022-05-26 15:59:08', '2022-05-26 15:59:08'),
(115, 1, 'IK533', 2, 0, 'Audio and Video Manipulation', 'MKKPS', '2022-05-26 15:59:08', '2022-05-26 15:59:08'),
(116, 1, 'IK543', 3, 0, 'Multimedia Production', 'MKKPS', '2022-05-26 15:59:08', '2022-05-26 15:59:08'),
(117, 1, 'IK553', 2, 0, 'Sosial dan Inovasi Media', 'MKKPS', '2022-05-26 15:59:08', '2022-05-26 15:59:08'),
(118, 1, 'IK563', 3, 0, 'Teknik Animasi', 'MKKPS', '2022-05-26 15:59:08', '2022-05-26 15:59:08'),
(119, 1, 'IK573', 3, 0, 'Open Distance Learning', 'MKKPS', '2022-05-26 15:59:08', '2022-05-26 15:59:08'),
(120, 1, 'IK504', 2, 0, 'Mobile Networking', 'MKKPS', '2022-05-26 15:59:08', '2022-05-26 15:59:08'),
(121, 1, 'IK514', 2, 0, 'Teknologi Cloud', 'MKKPS', '2022-05-26 15:59:08', '2022-05-26 15:59:08'),
(122, 1, 'IK524', 2, 0, 'Administrasi Jaringan', 'MKKPS', '2022-05-26 15:59:08', '2022-05-26 15:59:08'),
(123, 1, 'IK534', 3, 0, 'Teknologi Nirkabel', 'MKKPS', '2022-05-26 15:59:08', '2022-05-26 15:59:08'),
(124, 1, 'IK544', 2, 0, 'Komputer Forensik', 'MKKPS', '2022-05-26 15:59:08', '2022-05-26 15:59:08'),
(125, 1, 'IK554', 2, 0, 'Desain Jaringan Telekomunikasi', 'MKKPS', '2022-05-26 15:59:08', '2022-05-26 15:59:08'),
(126, 1, 'IK564', 3, 0, 'Keamanan Sistem Informasi', 'MKKPS', '2022-05-26 15:59:08', '2022-05-26 15:59:08'),
(127, 1, 'IK574', 3, 0, 'Jaringan Komputer Lanjut', 'MKKPS', '2022-05-26 15:59:08', '2022-05-26 15:59:08'),
(128, 1, 'IK515', 2, 0, 'Computational Statistics', 'MKKPS', '2022-05-26 15:59:08', '2022-05-26 15:59:08'),
(129, 1, 'IK525', 3, 0, 'Sistem Pendukung Keputusan', 'MKKPS', '2022-05-26 15:59:08', '2022-05-26 15:59:08'),
(130, 1, 'IK535', 2, 0, 'Data Visualization', 'MKKPS', '2022-05-26 15:59:08', '2022-05-26 15:59:08'),
(131, 1, 'IK555', 2, 0, 'Data Analysis', 'MKKPS', '2022-05-26 15:59:08', '2022-05-26 15:59:08'),
(132, 1, 'IK565', 2, 0, 'Time Series Data Analysis', 'MKKPS', '2022-05-26 15:59:08', '2022-05-26 15:59:08'),
(133, 1, 'IK575', 2, 0, 'Data Management', 'MKKPS', '2022-05-26 15:59:08', '2022-05-26 15:59:08'),
(134, 1, 'IK585', 3, 0, 'Financial Technology', 'MKKPS', '2022-05-26 15:59:08', '2022-05-26 15:59:08'),
(135, 1, 'IK370', 2, 0, 'Teknik Simulasi dan Pemodelan', 'MKKPS', '2022-05-26 15:59:08', '2022-05-26 15:59:08'),
(136, 1, 'IK506', 3, 0, 'Perencanaan Strategik Sistem Informasi', 'MKKPS', '2022-05-26 15:59:08', '2022-05-26 15:59:08'),
(137, 1, 'IK516', 2, 0, 'Arsitektur dan Integrasi Aplikasi Perusahaan', 'MKKPS', '2022-05-26 15:59:08', '2022-05-26 15:59:08'),
(138, 1, 'IK526', 2, 0, 'Sistem Informasi Akuntansi', 'MKKPS', '2022-05-26 15:59:08', '2022-05-26 15:59:08'),
(139, 1, 'IK536', 3, 0, 'Sistem Informasi Pendidikan', 'MKKPS', '2022-05-26 15:59:08', '2022-05-26 15:59:08'),
(140, 1, 'IK546', 2, 0, 'Audit Sistem Informasi', 'MKKPS', '2022-05-26 15:59:08', '2022-05-26 15:59:08'),
(141, 1, 'IK556', 2, 0, 'IT Infrastructure and Emerging Trends', 'MKKPS', '2022-05-26 15:59:08', '2022-05-26 15:59:08'),
(142, 1, 'IK566', 2, 0, 'Business Intelligence', 'MKKPS', '2022-05-26 15:59:08', '2022-05-26 15:59:08'),
(143, 1, 'IK576', 2, 0, 'Aplikasi Sistem Fungsi Bisnis', 'MKKPS', '2022-05-26 15:59:08', '2022-05-26 15:59:08'),
(144, 1, 'IK586', 3, 0, 'Sistem Informasi Geografis*', 'MKKPS', '2022-05-26 15:59:08', '2022-05-26 15:59:08'),
(145, 2, 'IK358', 3, 0, 'Perencanaan Strategi Teknologi Informasi', 'MKPP', '2022-05-26 15:59:08', '2022-05-26 15:59:08'),
(146, 2, 'IK318', 3, 0, 'Teknologi Antar Jaringan', 'MKPP', '2022-05-26 15:59:08', '2022-05-26 15:59:08'),
(147, 2, 'IK338', 3, 0, 'Teknologi Video Graphi', 'MKPP', '2022-05-26 15:59:08', '2022-05-26 15:59:08'),
(148, 2, 'IK347', 3, 0, 'Analisis dan Desain Algoritma', 'MKPP', '2022-05-26 15:59:08', '2022-05-26 15:59:08'),
(149, 2, 'IK317', 3, 0, 'Sistem Informasi Manajemen Pendidikan', 'MKPP', '2022-05-26 15:59:08', '2022-05-26 15:59:08'),
(150, 2, 'IK357', 3, 0, 'Interaksi Manusia dan Komputer', 'MKPP', '2022-05-26 15:59:08', '2022-05-26 15:59:08'),
(151, 2, 'IK377', 3, 0, 'Tatakelola Informasi', 'MKPP', '2022-05-26 15:59:08', '2022-05-26 15:59:08'),
(152, 2, 'IK348', 3, 0, 'Teknologi Desain Motiongrafis', 'MKPP', '2022-05-26 15:59:08', '2022-05-26 15:59:08'),
(153, 2, 'IK327', 3, 0, 'Kecerdasan Buatan', 'MKPP', '2022-05-26 15:59:08', '2022-05-26 15:59:08'),
(154, 2, 'IK368', 3, 0, 'Sistem Informasi', 'MKPP', '2022-05-26 15:59:08', '2022-05-26 15:59:08'),
(155, 2, 'IK337', 3, 0, 'Komputer dan Masyarakat', 'MKPP', '2022-05-26 15:59:08', '2022-05-26 15:59:08'),
(156, 2, 'IK387', 3, 0, 'Internet of Things', 'MKPP', '2022-05-26 15:59:08', '2022-05-26 15:59:08'),
(157, 2, 'IK378', 3, 0, 'M-Learning', 'MKPP', '2022-05-26 15:59:08', '2022-05-26 15:59:08'),
(158, 2, 'IK388', 3, 0, 'Keamanan Multimedia', 'MKPP', '2022-05-26 15:59:08', '2022-05-26 15:59:08'),
(159, 2, 'IK328', 3, 0, 'Digital Pedagogik', 'MKPP', '2022-05-26 15:59:08', '2022-05-26 15:59:08'),
(160, 2, 'IK367', 3, 0, 'Business Intelegence', 'MKPP', '2022-05-26 15:59:08', '2022-05-26 15:59:08');

-- --------------------------------------------------------

--
-- Table structure for table `kurikulum`
--

CREATE TABLE `kurikulum` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_kurikulum` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kurikulum`
--

INSERT INTO `kurikulum` (`id`, `nama_kurikulum`, `kode`, `created_at`, `updated_at`) VALUES
(1, 'Kurikulum Ilmu Komputer 2018', 'K181', '2022-05-26 15:39:52', '2022-05-26 15:39:52'),
(2, 'Kurikulum Pendidikan Ilmu Komputer 2018', 'K182', '2022-05-26 15:39:52', '2022-05-26 15:39:52'),
(3, 'Kurikulum Gabungan', 'K183', '2022-05-26 15:39:52', '2022-05-26 15:39:52');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_kelamin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_lahir` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tahun_masuk` year(4) NOT NULL,
  `total_mutu` decimal(3,2) NOT NULL,
  `total_sks` int(11) NOT NULL,
  `ipk` decimal(3,2) DEFAULT NULL,
  `nama_jurusan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `kurikulum_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `role`, `password`, `created_at`, `updated_at`) VALUES
(1, 'nellyjoy', 'nellyjoy@upi.edu', 'Admin', 'joyyy', '2022-05-27 01:00:16', '2022-05-27 01:00:16');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_kurikulum_user`
--
ALTER TABLE `data_kurikulum_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `data_kurikulum_user_user_id_foreign` (`user_id`),
  ADD KEY `data_kurikulum_user_data_kurikulum_utama_id_foreign` (`data_kurikulum_utama_id`);

--
-- Indexes for table `data_kurikulum_utama`
--
ALTER TABLE `data_kurikulum_utama`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `data_kurikulum_utama_kode_matkul_unique` (`kode_matkul`),
  ADD KEY `data_kurikulum_utama_kurikulum_id_foreign` (`kurikulum_id`);

--
-- Indexes for table `kurikulum`
--
ALTER TABLE `kurikulum`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kurikulum_kode_unique` (`kode`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `student_user_id_unique` (`user_id`),
  ADD KEY `student_kurikulum_id_foreign` (`kurikulum_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_username_unique` (`username`),
  ADD UNIQUE KEY `user_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_kurikulum_user`
--
ALTER TABLE `data_kurikulum_user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `data_kurikulum_utama`
--
ALTER TABLE `data_kurikulum_utama`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=161;

--
-- AUTO_INCREMENT for table `kurikulum`
--
ALTER TABLE `kurikulum`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `data_kurikulum_user`
--
ALTER TABLE `data_kurikulum_user`
  ADD CONSTRAINT `data_kurikulum_user_data_kurikulum_utama_id_foreign` FOREIGN KEY (`data_kurikulum_utama_id`) REFERENCES `data_kurikulum_utama` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `data_kurikulum_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `data_kurikulum_utama`
--
ALTER TABLE `data_kurikulum_utama`
  ADD CONSTRAINT `data_kurikulum_utama_kurikulum_id_foreign` FOREIGN KEY (`kurikulum_id`) REFERENCES `kurikulum` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `student_kurikulum_id_foreign` FOREIGN KEY (`kurikulum_id`) REFERENCES `kurikulum` (`id`),
  ADD CONSTRAINT `student_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
