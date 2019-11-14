-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 13 Nov 2019 pada 08.53
-- Versi server: 10.4.8-MariaDB
-- Versi PHP: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `database_blk`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`username`, `password`, `created_at`, `updated_at`) VALUES
('admin', '$2y$10$CDc6G0qQ/lOc5XcE8w/N9./Ud.iJrSJXux/6gu8theOHpIdxDK2uK', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `cities`
--

CREATE TABLE `cities` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_provinsi` int(11) NOT NULL,
  `provinsi` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kodepos` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `cities`
--

INSERT INTO `cities` (`id`, `id_provinsi`, `provinsi`, `nama`, `type`, `kodepos`, `created_at`, `updated_at`) VALUES
(1, 21, 'Nanggroe Aceh Darussalam (NAD)', 'Aceh Barat', 'Kabupaten', '23681', '2019-11-07 19:44:28', '2019-11-07 19:44:28'),
(2, 21, 'Nanggroe Aceh Darussalam (NAD)', 'Aceh Barat Daya', 'Kabupaten', '23764', '2019-11-07 19:44:28', '2019-11-07 19:44:28'),
(3, 21, 'Nanggroe Aceh Darussalam (NAD)', 'Aceh Besar', 'Kabupaten', '23951', '2019-11-07 19:44:28', '2019-11-07 19:44:28'),
(4, 21, 'Nanggroe Aceh Darussalam (NAD)', 'Aceh Jaya', 'Kabupaten', '23654', '2019-11-07 19:44:28', '2019-11-07 19:44:28'),
(5, 21, 'Nanggroe Aceh Darussalam (NAD)', 'Aceh Selatan', 'Kabupaten', '23719', '2019-11-07 19:44:28', '2019-11-07 19:44:28'),
(6, 21, 'Nanggroe Aceh Darussalam (NAD)', 'Aceh Singkil', 'Kabupaten', '24785', '2019-11-07 19:44:28', '2019-11-07 19:44:28'),
(7, 21, 'Nanggroe Aceh Darussalam (NAD)', 'Aceh Tamiang', 'Kabupaten', '24476', '2019-11-07 19:44:28', '2019-11-07 19:44:28'),
(8, 21, 'Nanggroe Aceh Darussalam (NAD)', 'Aceh Tengah', 'Kabupaten', '24511', '2019-11-07 19:44:28', '2019-11-07 19:44:28'),
(9, 21, 'Nanggroe Aceh Darussalam (NAD)', 'Aceh Tenggara', 'Kabupaten', '24611', '2019-11-07 19:44:28', '2019-11-07 19:44:28'),
(10, 21, 'Nanggroe Aceh Darussalam (NAD)', 'Aceh Timur', 'Kabupaten', '24454', '2019-11-07 19:44:28', '2019-11-07 19:44:28'),
(11, 21, 'Nanggroe Aceh Darussalam (NAD)', 'Aceh Utara', 'Kabupaten', '24382', '2019-11-07 19:44:29', '2019-11-07 19:44:29'),
(12, 32, 'Sumatera Barat', 'Agam', 'Kabupaten', '26411', '2019-11-07 19:44:29', '2019-11-07 19:44:29'),
(13, 23, 'Nusa Tenggara Timur (NTT)', 'Alor', 'Kabupaten', '85811', '2019-11-07 19:44:29', '2019-11-07 19:44:29'),
(14, 19, 'Maluku', 'Ambon', 'Kota', '97222', '2019-11-07 19:44:29', '2019-11-07 19:44:29'),
(15, 34, 'Sumatera Utara', 'Asahan', 'Kabupaten', '21214', '2019-11-07 19:44:29', '2019-11-07 19:44:29'),
(16, 24, 'Papua', 'Asmat', 'Kabupaten', '99777', '2019-11-07 19:44:29', '2019-11-07 19:44:29'),
(17, 1, 'Bali', 'Badung', 'Kabupaten', '80351', '2019-11-07 19:44:29', '2019-11-07 19:44:29'),
(18, 13, 'Kalimantan Selatan', 'Balangan', 'Kabupaten', '71611', '2019-11-07 19:44:29', '2019-11-07 19:44:29'),
(19, 15, 'Kalimantan Timur', 'Balikpapan', 'Kota', '76111', '2019-11-07 19:44:29', '2019-11-07 19:44:29'),
(20, 21, 'Nanggroe Aceh Darussalam (NAD)', 'Banda Aceh', 'Kota', '23238', '2019-11-07 19:44:29', '2019-11-07 19:44:29'),
(21, 18, 'Lampung', 'Bandar Lampung', 'Kota', '35139', '2019-11-07 19:44:29', '2019-11-07 19:44:29'),
(22, 9, 'Jawa Barat', 'Bandung', 'Kabupaten', '40311', '2019-11-07 19:44:29', '2019-11-07 19:44:29'),
(23, 9, 'Jawa Barat', 'Bandung', 'Kota', '40111', '2019-11-07 19:44:29', '2019-11-07 19:44:29'),
(24, 9, 'Jawa Barat', 'Bandung Barat', 'Kabupaten', '40721', '2019-11-07 19:44:29', '2019-11-07 19:44:29'),
(25, 29, 'Sulawesi Tengah', 'Banggai', 'Kabupaten', '94711', '2019-11-07 19:44:29', '2019-11-07 19:44:29'),
(26, 29, 'Sulawesi Tengah', 'Banggai Kepulauan', 'Kabupaten', '94881', '2019-11-07 19:44:29', '2019-11-07 19:44:29'),
(27, 2, 'Bangka Belitung', 'Bangka', 'Kabupaten', '33212', '2019-11-07 19:44:29', '2019-11-07 19:44:29'),
(28, 2, 'Bangka Belitung', 'Bangka Barat', 'Kabupaten', '33315', '2019-11-07 19:44:30', '2019-11-07 19:44:30'),
(29, 2, 'Bangka Belitung', 'Bangka Selatan', 'Kabupaten', '33719', '2019-11-07 19:44:30', '2019-11-07 19:44:30'),
(30, 2, 'Bangka Belitung', 'Bangka Tengah', 'Kabupaten', '33613', '2019-11-07 19:44:30', '2019-11-07 19:44:30'),
(31, 11, 'Jawa Timur', 'Bangkalan', 'Kabupaten', '69118', '2019-11-07 19:44:30', '2019-11-07 19:44:30'),
(32, 1, 'Bali', 'Bangli', 'Kabupaten', '80619', '2019-11-07 19:44:30', '2019-11-07 19:44:30'),
(33, 13, 'Kalimantan Selatan', 'Banjar', 'Kabupaten', '70619', '2019-11-07 19:44:30', '2019-11-07 19:44:30'),
(34, 9, 'Jawa Barat', 'Banjar', 'Kota', '46311', '2019-11-07 19:44:30', '2019-11-07 19:44:30'),
(35, 13, 'Kalimantan Selatan', 'Banjarbaru', 'Kota', '70712', '2019-11-07 19:44:30', '2019-11-07 19:44:30'),
(36, 13, 'Kalimantan Selatan', 'Banjarmasin', 'Kota', '70117', '2019-11-07 19:44:30', '2019-11-07 19:44:30'),
(37, 10, 'Jawa Tengah', 'Banjarnegara', 'Kabupaten', '53419', '2019-11-07 19:44:30', '2019-11-07 19:44:30'),
(38, 28, 'Sulawesi Selatan', 'Bantaeng', 'Kabupaten', '92411', '2019-11-07 19:44:30', '2019-11-07 19:44:30'),
(39, 5, 'DI Yogyakarta', 'Bantul', 'Kabupaten', '55715', '2019-11-07 19:44:30', '2019-11-07 19:44:30'),
(40, 33, 'Sumatera Selatan', 'Banyuasin', 'Kabupaten', '30911', '2019-11-07 19:44:30', '2019-11-07 19:44:30'),
(41, 10, 'Jawa Tengah', 'Banyumas', 'Kabupaten', '53114', '2019-11-07 19:44:30', '2019-11-07 19:44:30'),
(42, 11, 'Jawa Timur', 'Banyuwangi', 'Kabupaten', '68416', '2019-11-07 19:44:30', '2019-11-07 19:44:30'),
(43, 13, 'Kalimantan Selatan', 'Barito Kuala', 'Kabupaten', '70511', '2019-11-07 19:44:30', '2019-11-07 19:44:30'),
(44, 14, 'Kalimantan Tengah', 'Barito Selatan', 'Kabupaten', '73711', '2019-11-07 19:44:30', '2019-11-07 19:44:30'),
(45, 14, 'Kalimantan Tengah', 'Barito Timur', 'Kabupaten', '73671', '2019-11-07 19:44:30', '2019-11-07 19:44:30'),
(46, 14, 'Kalimantan Tengah', 'Barito Utara', 'Kabupaten', '73881', '2019-11-07 19:44:30', '2019-11-07 19:44:30'),
(47, 28, 'Sulawesi Selatan', 'Barru', 'Kabupaten', '90719', '2019-11-07 19:44:30', '2019-11-07 19:44:30'),
(48, 17, 'Kepulauan Riau', 'Batam', 'Kota', '29413', '2019-11-07 19:44:30', '2019-11-07 19:44:30'),
(49, 10, 'Jawa Tengah', 'Batang', 'Kabupaten', '51211', '2019-11-07 19:44:30', '2019-11-07 19:44:30'),
(50, 8, 'Jambi', 'Batang Hari', 'Kabupaten', '36613', '2019-11-07 19:44:30', '2019-11-07 19:44:30'),
(51, 11, 'Jawa Timur', 'Batu', 'Kota', '65311', '2019-11-07 19:44:30', '2019-11-07 19:44:30'),
(52, 34, 'Sumatera Utara', 'Batu Bara', 'Kabupaten', '21655', '2019-11-07 19:44:30', '2019-11-07 19:44:30'),
(53, 30, 'Sulawesi Tenggara', 'Bau-Bau', 'Kota', '93719', '2019-11-07 19:44:30', '2019-11-07 19:44:30'),
(54, 9, 'Jawa Barat', 'Bekasi', 'Kabupaten', '17837', '2019-11-07 19:44:30', '2019-11-07 19:44:30'),
(55, 9, 'Jawa Barat', 'Bekasi', 'Kota', '17121', '2019-11-07 19:44:30', '2019-11-07 19:44:30'),
(56, 2, 'Bangka Belitung', 'Belitung', 'Kabupaten', '33419', '2019-11-07 19:44:30', '2019-11-07 19:44:30'),
(57, 2, 'Bangka Belitung', 'Belitung Timur', 'Kabupaten', '33519', '2019-11-07 19:44:30', '2019-11-07 19:44:30'),
(58, 23, 'Nusa Tenggara Timur (NTT)', 'Belu', 'Kabupaten', '85711', '2019-11-07 19:44:30', '2019-11-07 19:44:30'),
(59, 21, 'Nanggroe Aceh Darussalam (NAD)', 'Bener Meriah', 'Kabupaten', '24581', '2019-11-07 19:44:30', '2019-11-07 19:44:30'),
(60, 26, 'Riau', 'Bengkalis', 'Kabupaten', '28719', '2019-11-07 19:44:30', '2019-11-07 19:44:30'),
(61, 12, 'Kalimantan Barat', 'Bengkayang', 'Kabupaten', '79213', '2019-11-07 19:44:30', '2019-11-07 19:44:30'),
(62, 4, 'Bengkulu', 'Bengkulu', 'Kota', '38229', '2019-11-07 19:44:30', '2019-11-07 19:44:30'),
(63, 4, 'Bengkulu', 'Bengkulu Selatan', 'Kabupaten', '38519', '2019-11-07 19:44:30', '2019-11-07 19:44:30'),
(64, 4, 'Bengkulu', 'Bengkulu Tengah', 'Kabupaten', '38319', '2019-11-07 19:44:30', '2019-11-07 19:44:30'),
(65, 4, 'Bengkulu', 'Bengkulu Utara', 'Kabupaten', '38619', '2019-11-07 19:44:30', '2019-11-07 19:44:30'),
(66, 15, 'Kalimantan Timur', 'Berau', 'Kabupaten', '77311', '2019-11-07 19:44:30', '2019-11-07 19:44:30'),
(67, 24, 'Papua', 'Biak Numfor', 'Kabupaten', '98119', '2019-11-07 19:44:30', '2019-11-07 19:44:30'),
(68, 22, 'Nusa Tenggara Barat (NTB)', 'Bima', 'Kabupaten', '84171', '2019-11-07 19:44:30', '2019-11-07 19:44:30'),
(69, 22, 'Nusa Tenggara Barat (NTB)', 'Bima', 'Kota', '84139', '2019-11-07 19:44:30', '2019-11-07 19:44:30'),
(70, 34, 'Sumatera Utara', 'Binjai', 'Kota', '20712', '2019-11-07 19:44:31', '2019-11-07 19:44:31'),
(71, 17, 'Kepulauan Riau', 'Bintan', 'Kabupaten', '29135', '2019-11-07 19:44:31', '2019-11-07 19:44:31'),
(72, 21, 'Nanggroe Aceh Darussalam (NAD)', 'Bireuen', 'Kabupaten', '24219', '2019-11-07 19:44:31', '2019-11-07 19:44:31'),
(73, 31, 'Sulawesi Utara', 'Bitung', 'Kota', '95512', '2019-11-07 19:44:31', '2019-11-07 19:44:31'),
(74, 11, 'Jawa Timur', 'Blitar', 'Kabupaten', '66171', '2019-11-07 19:44:31', '2019-11-07 19:44:31'),
(75, 11, 'Jawa Timur', 'Blitar', 'Kota', '66124', '2019-11-07 19:44:31', '2019-11-07 19:44:31'),
(76, 10, 'Jawa Tengah', 'Blora', 'Kabupaten', '58219', '2019-11-07 19:44:31', '2019-11-07 19:44:31'),
(77, 7, 'Gorontalo', 'Boalemo', 'Kabupaten', '96319', '2019-11-07 19:44:31', '2019-11-07 19:44:31'),
(78, 9, 'Jawa Barat', 'Bogor', 'Kabupaten', '16911', '2019-11-07 19:44:31', '2019-11-07 19:44:31'),
(79, 9, 'Jawa Barat', 'Bogor', 'Kota', '16119', '2019-11-07 19:44:31', '2019-11-07 19:44:31'),
(80, 11, 'Jawa Timur', 'Bojonegoro', 'Kabupaten', '62119', '2019-11-07 19:44:31', '2019-11-07 19:44:31'),
(81, 31, 'Sulawesi Utara', 'Bolaang Mongondow (Bolmong)', 'Kabupaten', '95755', '2019-11-07 19:44:31', '2019-11-07 19:44:31'),
(82, 31, 'Sulawesi Utara', 'Bolaang Mongondow Selatan', 'Kabupaten', '95774', '2019-11-07 19:44:31', '2019-11-07 19:44:31'),
(83, 31, 'Sulawesi Utara', 'Bolaang Mongondow Timur', 'Kabupaten', '95783', '2019-11-07 19:44:31', '2019-11-07 19:44:31'),
(84, 31, 'Sulawesi Utara', 'Bolaang Mongondow Utara', 'Kabupaten', '95765', '2019-11-07 19:44:31', '2019-11-07 19:44:31'),
(85, 30, 'Sulawesi Tenggara', 'Bombana', 'Kabupaten', '93771', '2019-11-07 19:44:31', '2019-11-07 19:44:31'),
(86, 11, 'Jawa Timur', 'Bondowoso', 'Kabupaten', '68219', '2019-11-07 19:44:31', '2019-11-07 19:44:31'),
(87, 28, 'Sulawesi Selatan', 'Bone', 'Kabupaten', '92713', '2019-11-07 19:44:31', '2019-11-07 19:44:31'),
(88, 7, 'Gorontalo', 'Bone Bolango', 'Kabupaten', '96511', '2019-11-07 19:44:31', '2019-11-07 19:44:31'),
(89, 15, 'Kalimantan Timur', 'Bontang', 'Kota', '75313', '2019-11-07 19:44:31', '2019-11-07 19:44:31'),
(90, 24, 'Papua', 'Boven Digoel', 'Kabupaten', '99662', '2019-11-07 19:44:32', '2019-11-07 19:44:32'),
(91, 10, 'Jawa Tengah', 'Boyolali', 'Kabupaten', '57312', '2019-11-07 19:44:32', '2019-11-07 19:44:32'),
(92, 10, 'Jawa Tengah', 'Brebes', 'Kabupaten', '52212', '2019-11-07 19:44:32', '2019-11-07 19:44:32'),
(93, 32, 'Sumatera Barat', 'Bukittinggi', 'Kota', '26115', '2019-11-07 19:44:32', '2019-11-07 19:44:32'),
(94, 1, 'Bali', 'Buleleng', 'Kabupaten', '81111', '2019-11-07 19:44:32', '2019-11-07 19:44:32'),
(95, 28, 'Sulawesi Selatan', 'Bulukumba', 'Kabupaten', '92511', '2019-11-07 19:44:32', '2019-11-07 19:44:32'),
(96, 16, 'Kalimantan Utara', 'Bulungan (Bulongan)', 'Kabupaten', '77211', '2019-11-07 19:44:32', '2019-11-07 19:44:32'),
(97, 8, 'Jambi', 'Bungo', 'Kabupaten', '37216', '2019-11-07 19:44:32', '2019-11-07 19:44:32'),
(98, 29, 'Sulawesi Tengah', 'Buol', 'Kabupaten', '94564', '2019-11-07 19:44:32', '2019-11-07 19:44:32'),
(99, 19, 'Maluku', 'Buru', 'Kabupaten', '97371', '2019-11-07 19:44:32', '2019-11-07 19:44:32'),
(100, 19, 'Maluku', 'Buru Selatan', 'Kabupaten', '97351', '2019-11-07 19:44:32', '2019-11-07 19:44:32'),
(101, 30, 'Sulawesi Tenggara', 'Buton', 'Kabupaten', '93754', '2019-11-07 19:44:32', '2019-11-07 19:44:32'),
(102, 30, 'Sulawesi Tenggara', 'Buton Utara', 'Kabupaten', '93745', '2019-11-07 19:44:32', '2019-11-07 19:44:32'),
(103, 9, 'Jawa Barat', 'Ciamis', 'Kabupaten', '46211', '2019-11-07 19:44:32', '2019-11-07 19:44:32'),
(104, 9, 'Jawa Barat', 'Cianjur', 'Kabupaten', '43217', '2019-11-07 19:44:32', '2019-11-07 19:44:32'),
(105, 10, 'Jawa Tengah', 'Cilacap', 'Kabupaten', '53211', '2019-11-07 19:44:32', '2019-11-07 19:44:32'),
(106, 3, 'Banten', 'Cilegon', 'Kota', '42417', '2019-11-07 19:44:32', '2019-11-07 19:44:32'),
(107, 9, 'Jawa Barat', 'Cimahi', 'Kota', '40512', '2019-11-07 19:44:32', '2019-11-07 19:44:32'),
(108, 9, 'Jawa Barat', 'Cirebon', 'Kabupaten', '45611', '2019-11-07 19:44:32', '2019-11-07 19:44:32'),
(109, 9, 'Jawa Barat', 'Cirebon', 'Kota', '45116', '2019-11-07 19:44:32', '2019-11-07 19:44:32'),
(110, 34, 'Sumatera Utara', 'Dairi', 'Kabupaten', '22211', '2019-11-07 19:44:32', '2019-11-07 19:44:32'),
(111, 24, 'Papua', 'Deiyai (Deliyai)', 'Kabupaten', '98784', '2019-11-07 19:44:32', '2019-11-07 19:44:32'),
(112, 34, 'Sumatera Utara', 'Deli Serdang', 'Kabupaten', '20511', '2019-11-07 19:44:32', '2019-11-07 19:44:32'),
(113, 10, 'Jawa Tengah', 'Demak', 'Kabupaten', '59519', '2019-11-07 19:44:32', '2019-11-07 19:44:32'),
(114, 1, 'Bali', 'Denpasar', 'Kota', '80227', '2019-11-07 19:44:32', '2019-11-07 19:44:32'),
(115, 9, 'Jawa Barat', 'Depok', 'Kota', '16416', '2019-11-07 19:44:32', '2019-11-07 19:44:32'),
(116, 32, 'Sumatera Barat', 'Dharmasraya', 'Kabupaten', '27612', '2019-11-07 19:44:32', '2019-11-07 19:44:32'),
(117, 24, 'Papua', 'Dogiyai', 'Kabupaten', '98866', '2019-11-07 19:44:32', '2019-11-07 19:44:32'),
(118, 22, 'Nusa Tenggara Barat (NTB)', 'Dompu', 'Kabupaten', '84217', '2019-11-07 19:44:32', '2019-11-07 19:44:32'),
(119, 29, 'Sulawesi Tengah', 'Donggala', 'Kabupaten', '94341', '2019-11-07 19:44:32', '2019-11-07 19:44:32'),
(120, 26, 'Riau', 'Dumai', 'Kota', '28811', '2019-11-07 19:44:32', '2019-11-07 19:44:32'),
(121, 33, 'Sumatera Selatan', 'Empat Lawang', 'Kabupaten', '31811', '2019-11-07 19:44:33', '2019-11-07 19:44:33'),
(122, 23, 'Nusa Tenggara Timur (NTT)', 'Ende', 'Kabupaten', '86351', '2019-11-07 19:44:33', '2019-11-07 19:44:33'),
(123, 28, 'Sulawesi Selatan', 'Enrekang', 'Kabupaten', '91719', '2019-11-07 19:44:33', '2019-11-07 19:44:33'),
(124, 25, 'Papua Barat', 'Fakfak', 'Kabupaten', '98651', '2019-11-07 19:44:33', '2019-11-07 19:44:33'),
(125, 23, 'Nusa Tenggara Timur (NTT)', 'Flores Timur', 'Kabupaten', '86213', '2019-11-07 19:44:33', '2019-11-07 19:44:33'),
(126, 9, 'Jawa Barat', 'Garut', 'Kabupaten', '44126', '2019-11-07 19:44:33', '2019-11-07 19:44:33'),
(127, 21, 'Nanggroe Aceh Darussalam (NAD)', 'Gayo Lues', 'Kabupaten', '24653', '2019-11-07 19:44:33', '2019-11-07 19:44:33'),
(128, 1, 'Bali', 'Gianyar', 'Kabupaten', '80519', '2019-11-07 19:44:33', '2019-11-07 19:44:33'),
(129, 7, 'Gorontalo', 'Gorontalo', 'Kabupaten', '96218', '2019-11-07 19:44:33', '2019-11-07 19:44:33'),
(130, 7, 'Gorontalo', 'Gorontalo', 'Kota', '96115', '2019-11-07 19:44:33', '2019-11-07 19:44:33'),
(131, 7, 'Gorontalo', 'Gorontalo Utara', 'Kabupaten', '96611', '2019-11-07 19:44:33', '2019-11-07 19:44:33'),
(132, 28, 'Sulawesi Selatan', 'Gowa', 'Kabupaten', '92111', '2019-11-07 19:44:33', '2019-11-07 19:44:33'),
(133, 11, 'Jawa Timur', 'Gresik', 'Kabupaten', '61115', '2019-11-07 19:44:33', '2019-11-07 19:44:33'),
(134, 10, 'Jawa Tengah', 'Grobogan', 'Kabupaten', '58111', '2019-11-07 19:44:33', '2019-11-07 19:44:33'),
(135, 5, 'DI Yogyakarta', 'Gunung Kidul', 'Kabupaten', '55812', '2019-11-07 19:44:33', '2019-11-07 19:44:33'),
(136, 14, 'Kalimantan Tengah', 'Gunung Mas', 'Kabupaten', '74511', '2019-11-07 19:44:33', '2019-11-07 19:44:33'),
(137, 34, 'Sumatera Utara', 'Gunungsitoli', 'Kota', '22813', '2019-11-07 19:44:33', '2019-11-07 19:44:33'),
(138, 20, 'Maluku Utara', 'Halmahera Barat', 'Kabupaten', '97757', '2019-11-07 19:44:33', '2019-11-07 19:44:33'),
(139, 20, 'Maluku Utara', 'Halmahera Selatan', 'Kabupaten', '97911', '2019-11-07 19:44:33', '2019-11-07 19:44:33'),
(140, 20, 'Maluku Utara', 'Halmahera Tengah', 'Kabupaten', '97853', '2019-11-07 19:44:33', '2019-11-07 19:44:33'),
(141, 20, 'Maluku Utara', 'Halmahera Timur', 'Kabupaten', '97862', '2019-11-07 19:44:33', '2019-11-07 19:44:33'),
(142, 20, 'Maluku Utara', 'Halmahera Utara', 'Kabupaten', '97762', '2019-11-07 19:44:34', '2019-11-07 19:44:34'),
(143, 13, 'Kalimantan Selatan', 'Hulu Sungai Selatan', 'Kabupaten', '71212', '2019-11-07 19:44:34', '2019-11-07 19:44:34'),
(144, 13, 'Kalimantan Selatan', 'Hulu Sungai Tengah', 'Kabupaten', '71313', '2019-11-07 19:44:34', '2019-11-07 19:44:34'),
(145, 13, 'Kalimantan Selatan', 'Hulu Sungai Utara', 'Kabupaten', '71419', '2019-11-07 19:44:34', '2019-11-07 19:44:34'),
(146, 34, 'Sumatera Utara', 'Humbang Hasundutan', 'Kabupaten', '22457', '2019-11-07 19:44:34', '2019-11-07 19:44:34'),
(147, 26, 'Riau', 'Indragiri Hilir', 'Kabupaten', '29212', '2019-11-07 19:44:34', '2019-11-07 19:44:34'),
(148, 26, 'Riau', 'Indragiri Hulu', 'Kabupaten', '29319', '2019-11-07 19:44:34', '2019-11-07 19:44:34'),
(149, 9, 'Jawa Barat', 'Indramayu', 'Kabupaten', '45214', '2019-11-07 19:44:34', '2019-11-07 19:44:34'),
(150, 24, 'Papua', 'Intan Jaya', 'Kabupaten', '98771', '2019-11-07 19:44:34', '2019-11-07 19:44:34'),
(151, 6, 'DKI Jakarta', 'Jakarta Barat', 'Kota', '11220', '2019-11-07 19:44:34', '2019-11-07 19:44:34'),
(152, 6, 'DKI Jakarta', 'Jakarta Pusat', 'Kota', '10540', '2019-11-07 19:44:34', '2019-11-07 19:44:34'),
(153, 6, 'DKI Jakarta', 'Jakarta Selatan', 'Kota', '12230', '2019-11-07 19:44:34', '2019-11-07 19:44:34'),
(154, 6, 'DKI Jakarta', 'Jakarta Timur', 'Kota', '13330', '2019-11-07 19:44:34', '2019-11-07 19:44:34'),
(155, 6, 'DKI Jakarta', 'Jakarta Utara', 'Kota', '14140', '2019-11-07 19:44:34', '2019-11-07 19:44:34'),
(156, 8, 'Jambi', 'Jambi', 'Kota', '36111', '2019-11-07 19:44:34', '2019-11-07 19:44:34'),
(157, 24, 'Papua', 'Jayapura', 'Kabupaten', '99352', '2019-11-07 19:44:34', '2019-11-07 19:44:34'),
(158, 24, 'Papua', 'Jayapura', 'Kota', '99114', '2019-11-07 19:44:34', '2019-11-07 19:44:34'),
(159, 24, 'Papua', 'Jayawijaya', 'Kabupaten', '99511', '2019-11-07 19:44:34', '2019-11-07 19:44:34'),
(160, 11, 'Jawa Timur', 'Jember', 'Kabupaten', '68113', '2019-11-07 19:44:34', '2019-11-07 19:44:34'),
(161, 1, 'Bali', 'Jembrana', 'Kabupaten', '82251', '2019-11-07 19:44:34', '2019-11-07 19:44:34'),
(162, 28, 'Sulawesi Selatan', 'Jeneponto', 'Kabupaten', '92319', '2019-11-07 19:44:34', '2019-11-07 19:44:34'),
(163, 10, 'Jawa Tengah', 'Jepara', 'Kabupaten', '59419', '2019-11-07 19:44:34', '2019-11-07 19:44:34'),
(164, 11, 'Jawa Timur', 'Jombang', 'Kabupaten', '61415', '2019-11-07 19:44:34', '2019-11-07 19:44:34'),
(165, 25, 'Papua Barat', 'Kaimana', 'Kabupaten', '98671', '2019-11-07 19:44:34', '2019-11-07 19:44:34'),
(166, 26, 'Riau', 'Kampar', 'Kabupaten', '28411', '2019-11-07 19:44:34', '2019-11-07 19:44:34'),
(167, 14, 'Kalimantan Tengah', 'Kapuas', 'Kabupaten', '73583', '2019-11-07 19:44:34', '2019-11-07 19:44:34'),
(168, 12, 'Kalimantan Barat', 'Kapuas Hulu', 'Kabupaten', '78719', '2019-11-07 19:44:34', '2019-11-07 19:44:34'),
(169, 10, 'Jawa Tengah', 'Karanganyar', 'Kabupaten', '57718', '2019-11-07 19:44:34', '2019-11-07 19:44:34'),
(170, 1, 'Bali', 'Karangasem', 'Kabupaten', '80819', '2019-11-07 19:44:34', '2019-11-07 19:44:34'),
(171, 9, 'Jawa Barat', 'Karawang', 'Kabupaten', '41311', '2019-11-07 19:44:34', '2019-11-07 19:44:34'),
(172, 17, 'Kepulauan Riau', 'Karimun', 'Kabupaten', '29611', '2019-11-07 19:44:34', '2019-11-07 19:44:34'),
(173, 34, 'Sumatera Utara', 'Karo', 'Kabupaten', '22119', '2019-11-07 19:44:34', '2019-11-07 19:44:34'),
(174, 14, 'Kalimantan Tengah', 'Katingan', 'Kabupaten', '74411', '2019-11-07 19:44:34', '2019-11-07 19:44:34'),
(175, 4, 'Bengkulu', 'Kaur', 'Kabupaten', '38911', '2019-11-07 19:44:34', '2019-11-07 19:44:34'),
(176, 12, 'Kalimantan Barat', 'Kayong Utara', 'Kabupaten', '78852', '2019-11-07 19:44:34', '2019-11-07 19:44:34'),
(177, 10, 'Jawa Tengah', 'Kebumen', 'Kabupaten', '54319', '2019-11-07 19:44:34', '2019-11-07 19:44:34'),
(178, 11, 'Jawa Timur', 'Kediri', 'Kabupaten', '64184', '2019-11-07 19:44:34', '2019-11-07 19:44:34'),
(179, 11, 'Jawa Timur', 'Kediri', 'Kota', '64125', '2019-11-07 19:44:34', '2019-11-07 19:44:34'),
(180, 24, 'Papua', 'Keerom', 'Kabupaten', '99461', '2019-11-07 19:44:34', '2019-11-07 19:44:34'),
(181, 10, 'Jawa Tengah', 'Kendal', 'Kabupaten', '51314', '2019-11-07 19:44:35', '2019-11-07 19:44:35'),
(182, 30, 'Sulawesi Tenggara', 'Kendari', 'Kota', '93126', '2019-11-07 19:44:35', '2019-11-07 19:44:35'),
(183, 4, 'Bengkulu', 'Kepahiang', 'Kabupaten', '39319', '2019-11-07 19:44:35', '2019-11-07 19:44:35'),
(184, 17, 'Kepulauan Riau', 'Kepulauan Anambas', 'Kabupaten', '29991', '2019-11-07 19:44:35', '2019-11-07 19:44:35'),
(185, 19, 'Maluku', 'Kepulauan Aru', 'Kabupaten', '97681', '2019-11-07 19:44:35', '2019-11-07 19:44:35'),
(186, 32, 'Sumatera Barat', 'Kepulauan Mentawai', 'Kabupaten', '25771', '2019-11-07 19:44:35', '2019-11-07 19:44:35'),
(187, 26, 'Riau', 'Kepulauan Meranti', 'Kabupaten', '28791', '2019-11-07 19:44:35', '2019-11-07 19:44:35'),
(188, 31, 'Sulawesi Utara', 'Kepulauan Sangihe', 'Kabupaten', '95819', '2019-11-07 19:44:35', '2019-11-07 19:44:35'),
(189, 6, 'DKI Jakarta', 'Kepulauan Seribu', 'Kabupaten', '14550', '2019-11-07 19:44:35', '2019-11-07 19:44:35'),
(190, 31, 'Sulawesi Utara', 'Kepulauan Siau Tagulandang Biaro (Sitaro)', 'Kabupaten', '95862', '2019-11-07 19:44:35', '2019-11-07 19:44:35'),
(191, 20, 'Maluku Utara', 'Kepulauan Sula', 'Kabupaten', '97995', '2019-11-07 19:44:35', '2019-11-07 19:44:35'),
(192, 31, 'Sulawesi Utara', 'Kepulauan Talaud', 'Kabupaten', '95885', '2019-11-07 19:44:35', '2019-11-07 19:44:35'),
(193, 24, 'Papua', 'Kepulauan Yapen (Yapen Waropen)', 'Kabupaten', '98211', '2019-11-07 19:44:35', '2019-11-07 19:44:35'),
(194, 8, 'Jambi', 'Kerinci', 'Kabupaten', '37167', '2019-11-07 19:44:35', '2019-11-07 19:44:35'),
(195, 12, 'Kalimantan Barat', 'Ketapang', 'Kabupaten', '78874', '2019-11-07 19:44:35', '2019-11-07 19:44:35'),
(196, 10, 'Jawa Tengah', 'Klaten', 'Kabupaten', '57411', '2019-11-07 19:44:35', '2019-11-07 19:44:35'),
(197, 1, 'Bali', 'Klungkung', 'Kabupaten', '80719', '2019-11-07 19:44:35', '2019-11-07 19:44:35'),
(198, 30, 'Sulawesi Tenggara', 'Kolaka', 'Kabupaten', '93511', '2019-11-07 19:44:35', '2019-11-07 19:44:35'),
(199, 30, 'Sulawesi Tenggara', 'Kolaka Utara', 'Kabupaten', '93911', '2019-11-07 19:44:35', '2019-11-07 19:44:35'),
(200, 30, 'Sulawesi Tenggara', 'Konawe', 'Kabupaten', '93411', '2019-11-07 19:44:35', '2019-11-07 19:44:35'),
(201, 30, 'Sulawesi Tenggara', 'Konawe Selatan', 'Kabupaten', '93811', '2019-11-07 19:44:35', '2019-11-07 19:44:35'),
(202, 30, 'Sulawesi Tenggara', 'Konawe Utara', 'Kabupaten', '93311', '2019-11-07 19:44:35', '2019-11-07 19:44:35'),
(203, 13, 'Kalimantan Selatan', 'Kotabaru', 'Kabupaten', '72119', '2019-11-07 19:44:35', '2019-11-07 19:44:35'),
(204, 31, 'Sulawesi Utara', 'Kotamobagu', 'Kota', '95711', '2019-11-07 19:44:35', '2019-11-07 19:44:35'),
(205, 14, 'Kalimantan Tengah', 'Kotawaringin Barat', 'Kabupaten', '74119', '2019-11-07 19:44:35', '2019-11-07 19:44:35'),
(206, 14, 'Kalimantan Tengah', 'Kotawaringin Timur', 'Kabupaten', '74364', '2019-11-07 19:44:35', '2019-11-07 19:44:35'),
(207, 26, 'Riau', 'Kuantan Singingi', 'Kabupaten', '29519', '2019-11-07 19:44:35', '2019-11-07 19:44:35'),
(208, 12, 'Kalimantan Barat', 'Kubu Raya', 'Kabupaten', '78311', '2019-11-07 19:44:35', '2019-11-07 19:44:35'),
(209, 10, 'Jawa Tengah', 'Kudus', 'Kabupaten', '59311', '2019-11-07 19:44:35', '2019-11-07 19:44:35'),
(210, 5, 'DI Yogyakarta', 'Kulon Progo', 'Kabupaten', '55611', '2019-11-07 19:44:35', '2019-11-07 19:44:35'),
(211, 9, 'Jawa Barat', 'Kuningan', 'Kabupaten', '45511', '2019-11-07 19:44:36', '2019-11-07 19:44:36'),
(212, 23, 'Nusa Tenggara Timur (NTT)', 'Kupang', 'Kabupaten', '85362', '2019-11-07 19:44:36', '2019-11-07 19:44:36'),
(213, 23, 'Nusa Tenggara Timur (NTT)', 'Kupang', 'Kota', '85119', '2019-11-07 19:44:36', '2019-11-07 19:44:36'),
(214, 15, 'Kalimantan Timur', 'Kutai Barat', 'Kabupaten', '75711', '2019-11-07 19:44:36', '2019-11-07 19:44:36'),
(215, 15, 'Kalimantan Timur', 'Kutai Kartanegara', 'Kabupaten', '75511', '2019-11-07 19:44:36', '2019-11-07 19:44:36'),
(216, 15, 'Kalimantan Timur', 'Kutai Timur', 'Kabupaten', '75611', '2019-11-07 19:44:36', '2019-11-07 19:44:36'),
(217, 34, 'Sumatera Utara', 'Labuhan Batu', 'Kabupaten', '21412', '2019-11-07 19:44:36', '2019-11-07 19:44:36'),
(218, 34, 'Sumatera Utara', 'Labuhan Batu Selatan', 'Kabupaten', '21511', '2019-11-07 19:44:36', '2019-11-07 19:44:36'),
(219, 34, 'Sumatera Utara', 'Labuhan Batu Utara', 'Kabupaten', '21711', '2019-11-07 19:44:36', '2019-11-07 19:44:36'),
(220, 33, 'Sumatera Selatan', 'Lahat', 'Kabupaten', '31419', '2019-11-07 19:44:36', '2019-11-07 19:44:36'),
(221, 14, 'Kalimantan Tengah', 'Lamandau', 'Kabupaten', '74611', '2019-11-07 19:44:36', '2019-11-07 19:44:36'),
(222, 11, 'Jawa Timur', 'Lamongan', 'Kabupaten', '64125', '2019-11-07 19:44:36', '2019-11-07 19:44:36'),
(223, 18, 'Lampung', 'Lampung Barat', 'Kabupaten', '34814', '2019-11-07 19:44:36', '2019-11-07 19:44:36'),
(224, 18, 'Lampung', 'Lampung Selatan', 'Kabupaten', '35511', '2019-11-07 19:44:36', '2019-11-07 19:44:36'),
(225, 18, 'Lampung', 'Lampung Tengah', 'Kabupaten', '34212', '2019-11-07 19:44:36', '2019-11-07 19:44:36'),
(226, 18, 'Lampung', 'Lampung Timur', 'Kabupaten', '34319', '2019-11-07 19:44:36', '2019-11-07 19:44:36'),
(227, 18, 'Lampung', 'Lampung Utara', 'Kabupaten', '34516', '2019-11-07 19:44:36', '2019-11-07 19:44:36'),
(228, 12, 'Kalimantan Barat', 'Landak', 'Kabupaten', '78319', '2019-11-07 19:44:36', '2019-11-07 19:44:36'),
(229, 34, 'Sumatera Utara', 'Langkat', 'Kabupaten', '20811', '2019-11-07 19:44:36', '2019-11-07 19:44:36'),
(230, 21, 'Nanggroe Aceh Darussalam (NAD)', 'Langsa', 'Kota', '24412', '2019-11-07 19:44:36', '2019-11-07 19:44:36'),
(231, 24, 'Papua', 'Lanny Jaya', 'Kabupaten', '99531', '2019-11-07 19:44:36', '2019-11-07 19:44:36'),
(232, 3, 'Banten', 'Lebak', 'Kabupaten', '42319', '2019-11-07 19:44:36', '2019-11-07 19:44:36'),
(233, 4, 'Bengkulu', 'Lebong', 'Kabupaten', '39264', '2019-11-07 19:44:36', '2019-11-07 19:44:36'),
(234, 23, 'Nusa Tenggara Timur (NTT)', 'Lembata', 'Kabupaten', '86611', '2019-11-07 19:44:36', '2019-11-07 19:44:36'),
(235, 21, 'Nanggroe Aceh Darussalam (NAD)', 'Lhokseumawe', 'Kota', '24352', '2019-11-07 19:44:36', '2019-11-07 19:44:36'),
(236, 32, 'Sumatera Barat', 'Lima Puluh Koto/Kota', 'Kabupaten', '26671', '2019-11-07 19:44:37', '2019-11-07 19:44:37'),
(237, 17, 'Kepulauan Riau', 'Lingga', 'Kabupaten', '29811', '2019-11-07 19:44:37', '2019-11-07 19:44:37'),
(238, 22, 'Nusa Tenggara Barat (NTB)', 'Lombok Barat', 'Kabupaten', '83311', '2019-11-07 19:44:37', '2019-11-07 19:44:37'),
(239, 22, 'Nusa Tenggara Barat (NTB)', 'Lombok Tengah', 'Kabupaten', '83511', '2019-11-07 19:44:37', '2019-11-07 19:44:37'),
(240, 22, 'Nusa Tenggara Barat (NTB)', 'Lombok Timur', 'Kabupaten', '83612', '2019-11-07 19:44:37', '2019-11-07 19:44:37'),
(241, 22, 'Nusa Tenggara Barat (NTB)', 'Lombok Utara', 'Kabupaten', '83711', '2019-11-07 19:44:37', '2019-11-07 19:44:37'),
(242, 33, 'Sumatera Selatan', 'Lubuk Linggau', 'Kota', '31614', '2019-11-07 19:44:37', '2019-11-07 19:44:37'),
(243, 11, 'Jawa Timur', 'Lumajang', 'Kabupaten', '67319', '2019-11-07 19:44:37', '2019-11-07 19:44:37'),
(244, 28, 'Sulawesi Selatan', 'Luwu', 'Kabupaten', '91994', '2019-11-07 19:44:37', '2019-11-07 19:44:37'),
(245, 28, 'Sulawesi Selatan', 'Luwu Timur', 'Kabupaten', '92981', '2019-11-07 19:44:37', '2019-11-07 19:44:37'),
(246, 28, 'Sulawesi Selatan', 'Luwu Utara', 'Kabupaten', '92911', '2019-11-07 19:44:37', '2019-11-07 19:44:37'),
(247, 11, 'Jawa Timur', 'Madiun', 'Kabupaten', '63153', '2019-11-07 19:44:37', '2019-11-07 19:44:37'),
(248, 11, 'Jawa Timur', 'Madiun', 'Kota', '63122', '2019-11-07 19:44:37', '2019-11-07 19:44:37'),
(249, 10, 'Jawa Tengah', 'Magelang', 'Kabupaten', '56519', '2019-11-07 19:44:37', '2019-11-07 19:44:37'),
(250, 10, 'Jawa Tengah', 'Magelang', 'Kota', '56133', '2019-11-07 19:44:37', '2019-11-07 19:44:37'),
(251, 11, 'Jawa Timur', 'Magetan', 'Kabupaten', '63314', '2019-11-07 19:44:37', '2019-11-07 19:44:37'),
(252, 9, 'Jawa Barat', 'Majalengka', 'Kabupaten', '45412', '2019-11-07 19:44:37', '2019-11-07 19:44:37'),
(253, 27, 'Sulawesi Barat', 'Majene', 'Kabupaten', '91411', '2019-11-07 19:44:37', '2019-11-07 19:44:37'),
(254, 28, 'Sulawesi Selatan', 'Makassar', 'Kota', '90111', '2019-11-07 19:44:37', '2019-11-07 19:44:37'),
(255, 11, 'Jawa Timur', 'Malang', 'Kabupaten', '65163', '2019-11-07 19:44:37', '2019-11-07 19:44:37'),
(256, 11, 'Jawa Timur', 'Malang', 'Kota', '65112', '2019-11-07 19:44:37', '2019-11-07 19:44:37'),
(257, 16, 'Kalimantan Utara', 'Malinau', 'Kabupaten', '77511', '2019-11-07 19:44:37', '2019-11-07 19:44:37'),
(258, 19, 'Maluku', 'Maluku Barat Daya', 'Kabupaten', '97451', '2019-11-07 19:44:37', '2019-11-07 19:44:37'),
(259, 19, 'Maluku', 'Maluku Tengah', 'Kabupaten', '97513', '2019-11-07 19:44:37', '2019-11-07 19:44:37'),
(260, 19, 'Maluku', 'Maluku Tenggara', 'Kabupaten', '97651', '2019-11-07 19:44:37', '2019-11-07 19:44:37'),
(261, 19, 'Maluku', 'Maluku Tenggara Barat', 'Kabupaten', '97465', '2019-11-07 19:44:37', '2019-11-07 19:44:37'),
(262, 27, 'Sulawesi Barat', 'Mamasa', 'Kabupaten', '91362', '2019-11-07 19:44:37', '2019-11-07 19:44:37'),
(263, 24, 'Papua', 'Mamberamo Raya', 'Kabupaten', '99381', '2019-11-07 19:44:37', '2019-11-07 19:44:37'),
(264, 24, 'Papua', 'Mamberamo Tengah', 'Kabupaten', '99553', '2019-11-07 19:44:38', '2019-11-07 19:44:38'),
(265, 27, 'Sulawesi Barat', 'Mamuju', 'Kabupaten', '91519', '2019-11-07 19:44:38', '2019-11-07 19:44:38'),
(266, 27, 'Sulawesi Barat', 'Mamuju Utara', 'Kabupaten', '91571', '2019-11-07 19:44:38', '2019-11-07 19:44:38'),
(267, 31, 'Sulawesi Utara', 'Manado', 'Kota', '95247', '2019-11-07 19:44:38', '2019-11-07 19:44:38'),
(268, 34, 'Sumatera Utara', 'Mandailing Natal', 'Kabupaten', '22916', '2019-11-07 19:44:38', '2019-11-07 19:44:38'),
(269, 23, 'Nusa Tenggara Timur (NTT)', 'Manggarai', 'Kabupaten', '86551', '2019-11-07 19:44:38', '2019-11-07 19:44:38'),
(270, 23, 'Nusa Tenggara Timur (NTT)', 'Manggarai Barat', 'Kabupaten', '86711', '2019-11-07 19:44:38', '2019-11-07 19:44:38'),
(271, 23, 'Nusa Tenggara Timur (NTT)', 'Manggarai Timur', 'Kabupaten', '86811', '2019-11-07 19:44:38', '2019-11-07 19:44:38'),
(272, 25, 'Papua Barat', 'Manokwari', 'Kabupaten', '98311', '2019-11-07 19:44:38', '2019-11-07 19:44:38'),
(273, 25, 'Papua Barat', 'Manokwari Selatan', 'Kabupaten', '98355', '2019-11-07 19:44:38', '2019-11-07 19:44:38'),
(274, 24, 'Papua', 'Mappi', 'Kabupaten', '99853', '2019-11-07 19:44:38', '2019-11-07 19:44:38'),
(275, 28, 'Sulawesi Selatan', 'Maros', 'Kabupaten', '90511', '2019-11-07 19:44:38', '2019-11-07 19:44:38'),
(276, 22, 'Nusa Tenggara Barat (NTB)', 'Mataram', 'Kota', '83131', '2019-11-07 19:44:38', '2019-11-07 19:44:38'),
(277, 25, 'Papua Barat', 'Maybrat', 'Kabupaten', '98051', '2019-11-07 19:44:38', '2019-11-07 19:44:38'),
(278, 34, 'Sumatera Utara', 'Medan', 'Kota', '20228', '2019-11-07 19:44:38', '2019-11-07 19:44:38'),
(279, 12, 'Kalimantan Barat', 'Melawi', 'Kabupaten', '78619', '2019-11-07 19:44:38', '2019-11-07 19:44:38'),
(280, 8, 'Jambi', 'Merangin', 'Kabupaten', '37319', '2019-11-07 19:44:38', '2019-11-07 19:44:38'),
(281, 24, 'Papua', 'Merauke', 'Kabupaten', '99613', '2019-11-07 19:44:38', '2019-11-07 19:44:38'),
(282, 18, 'Lampung', 'Mesuji', 'Kabupaten', '34911', '2019-11-07 19:44:38', '2019-11-07 19:44:38'),
(283, 18, 'Lampung', 'Metro', 'Kota', '34111', '2019-11-07 19:44:38', '2019-11-07 19:44:38'),
(284, 24, 'Papua', 'Mimika', 'Kabupaten', '99962', '2019-11-07 19:44:38', '2019-11-07 19:44:38'),
(285, 31, 'Sulawesi Utara', 'Minahasa', 'Kabupaten', '95614', '2019-11-07 19:44:38', '2019-11-07 19:44:38'),
(286, 31, 'Sulawesi Utara', 'Minahasa Selatan', 'Kabupaten', '95914', '2019-11-07 19:44:39', '2019-11-07 19:44:39'),
(287, 31, 'Sulawesi Utara', 'Minahasa Tenggara', 'Kabupaten', '95995', '2019-11-07 19:44:39', '2019-11-07 19:44:39'),
(288, 31, 'Sulawesi Utara', 'Minahasa Utara', 'Kabupaten', '95316', '2019-11-07 19:44:39', '2019-11-07 19:44:39'),
(289, 11, 'Jawa Timur', 'Mojokerto', 'Kabupaten', '61382', '2019-11-07 19:44:39', '2019-11-07 19:44:39'),
(290, 11, 'Jawa Timur', 'Mojokerto', 'Kota', '61316', '2019-11-07 19:44:39', '2019-11-07 19:44:39'),
(291, 29, 'Sulawesi Tengah', 'Morowali', 'Kabupaten', '94911', '2019-11-07 19:44:39', '2019-11-07 19:44:39'),
(292, 33, 'Sumatera Selatan', 'Muara Enim', 'Kabupaten', '31315', '2019-11-07 19:44:39', '2019-11-07 19:44:39'),
(293, 8, 'Jambi', 'Muaro Jambi', 'Kabupaten', '36311', '2019-11-07 19:44:39', '2019-11-07 19:44:39'),
(294, 4, 'Bengkulu', 'Muko Muko', 'Kabupaten', '38715', '2019-11-07 19:44:39', '2019-11-07 19:44:39'),
(295, 30, 'Sulawesi Tenggara', 'Muna', 'Kabupaten', '93611', '2019-11-07 19:44:39', '2019-11-07 19:44:39'),
(296, 14, 'Kalimantan Tengah', 'Murung Raya', 'Kabupaten', '73911', '2019-11-07 19:44:39', '2019-11-07 19:44:39'),
(297, 33, 'Sumatera Selatan', 'Musi Banyuasin', 'Kabupaten', '30719', '2019-11-07 19:44:39', '2019-11-07 19:44:39'),
(298, 33, 'Sumatera Selatan', 'Musi Rawas', 'Kabupaten', '31661', '2019-11-07 19:44:39', '2019-11-07 19:44:39'),
(299, 24, 'Papua', 'Nabire', 'Kabupaten', '98816', '2019-11-07 19:44:39', '2019-11-07 19:44:39'),
(300, 21, 'Nanggroe Aceh Darussalam (NAD)', 'Nagan Raya', 'Kabupaten', '23674', '2019-11-07 19:44:39', '2019-11-07 19:44:39'),
(301, 23, 'Nusa Tenggara Timur (NTT)', 'Nagekeo', 'Kabupaten', '86911', '2019-11-07 19:44:39', '2019-11-07 19:44:39'),
(302, 17, 'Kepulauan Riau', 'Natuna', 'Kabupaten', '29711', '2019-11-07 19:44:39', '2019-11-07 19:44:39'),
(303, 24, 'Papua', 'Nduga', 'Kabupaten', '99541', '2019-11-07 19:44:39', '2019-11-07 19:44:39'),
(304, 23, 'Nusa Tenggara Timur (NTT)', 'Ngada', 'Kabupaten', '86413', '2019-11-07 19:44:39', '2019-11-07 19:44:39'),
(305, 11, 'Jawa Timur', 'Nganjuk', 'Kabupaten', '64414', '2019-11-07 19:44:39', '2019-11-07 19:44:39'),
(306, 11, 'Jawa Timur', 'Ngawi', 'Kabupaten', '63219', '2019-11-07 19:44:39', '2019-11-07 19:44:39'),
(307, 34, 'Sumatera Utara', 'Nias', 'Kabupaten', '22876', '2019-11-07 19:44:39', '2019-11-07 19:44:39'),
(308, 34, 'Sumatera Utara', 'Nias Barat', 'Kabupaten', '22895', '2019-11-07 19:44:39', '2019-11-07 19:44:39'),
(309, 34, 'Sumatera Utara', 'Nias Selatan', 'Kabupaten', '22865', '2019-11-07 19:44:39', '2019-11-07 19:44:39'),
(310, 34, 'Sumatera Utara', 'Nias Utara', 'Kabupaten', '22856', '2019-11-07 19:44:39', '2019-11-07 19:44:39'),
(311, 16, 'Kalimantan Utara', 'Nunukan', 'Kabupaten', '77421', '2019-11-07 19:44:39', '2019-11-07 19:44:39'),
(312, 33, 'Sumatera Selatan', 'Ogan Ilir', 'Kabupaten', '30811', '2019-11-07 19:44:39', '2019-11-07 19:44:39'),
(313, 33, 'Sumatera Selatan', 'Ogan Komering Ilir', 'Kabupaten', '30618', '2019-11-07 19:44:39', '2019-11-07 19:44:39'),
(314, 33, 'Sumatera Selatan', 'Ogan Komering Ulu', 'Kabupaten', '32112', '2019-11-07 19:44:39', '2019-11-07 19:44:39'),
(315, 33, 'Sumatera Selatan', 'Ogan Komering Ulu Selatan', 'Kabupaten', '32211', '2019-11-07 19:44:39', '2019-11-07 19:44:39'),
(316, 33, 'Sumatera Selatan', 'Ogan Komering Ulu Timur', 'Kabupaten', '32312', '2019-11-07 19:44:39', '2019-11-07 19:44:39'),
(317, 11, 'Jawa Timur', 'Pacitan', 'Kabupaten', '63512', '2019-11-07 19:44:39', '2019-11-07 19:44:39'),
(318, 32, 'Sumatera Barat', 'Padang', 'Kota', '25112', '2019-11-07 19:44:39', '2019-11-07 19:44:39'),
(319, 34, 'Sumatera Utara', 'Padang Lawas', 'Kabupaten', '22763', '2019-11-07 19:44:39', '2019-11-07 19:44:39'),
(320, 34, 'Sumatera Utara', 'Padang Lawas Utara', 'Kabupaten', '22753', '2019-11-07 19:44:39', '2019-11-07 19:44:39'),
(321, 32, 'Sumatera Barat', 'Padang Panjang', 'Kota', '27122', '2019-11-07 19:44:39', '2019-11-07 19:44:39'),
(322, 32, 'Sumatera Barat', 'Padang Pariaman', 'Kabupaten', '25583', '2019-11-07 19:44:39', '2019-11-07 19:44:39'),
(323, 34, 'Sumatera Utara', 'Padang Sidempuan', 'Kota', '22727', '2019-11-07 19:44:39', '2019-11-07 19:44:39'),
(324, 33, 'Sumatera Selatan', 'Pagar Alam', 'Kota', '31512', '2019-11-07 19:44:39', '2019-11-07 19:44:39'),
(325, 34, 'Sumatera Utara', 'Pakpak Bharat', 'Kabupaten', '22272', '2019-11-07 19:44:40', '2019-11-07 19:44:40'),
(326, 14, 'Kalimantan Tengah', 'Palangka Raya', 'Kota', '73112', '2019-11-07 19:44:40', '2019-11-07 19:44:40'),
(327, 33, 'Sumatera Selatan', 'Palembang', 'Kota', '30111', '2019-11-07 19:44:40', '2019-11-07 19:44:40'),
(328, 28, 'Sulawesi Selatan', 'Palopo', 'Kota', '91911', '2019-11-07 19:44:40', '2019-11-07 19:44:40'),
(329, 29, 'Sulawesi Tengah', 'Palu', 'Kota', '94111', '2019-11-07 19:44:40', '2019-11-07 19:44:40'),
(330, 11, 'Jawa Timur', 'Pamekasan', 'Kabupaten', '69319', '2019-11-07 19:44:40', '2019-11-07 19:44:40'),
(331, 3, 'Banten', 'Pandeglang', 'Kabupaten', '42212', '2019-11-07 19:44:40', '2019-11-07 19:44:40'),
(332, 9, 'Jawa Barat', 'Pangandaran', 'Kabupaten', '46511', '2019-11-07 19:44:40', '2019-11-07 19:44:40'),
(333, 28, 'Sulawesi Selatan', 'Pangkajene Kepulauan', 'Kabupaten', '90611', '2019-11-07 19:44:40', '2019-11-07 19:44:40'),
(334, 2, 'Bangka Belitung', 'Pangkal Pinang', 'Kota', '33115', '2019-11-07 19:44:40', '2019-11-07 19:44:40'),
(335, 24, 'Papua', 'Paniai', 'Kabupaten', '98765', '2019-11-07 19:44:40', '2019-11-07 19:44:40'),
(336, 28, 'Sulawesi Selatan', 'Parepare', 'Kota', '91123', '2019-11-07 19:44:40', '2019-11-07 19:44:40'),
(337, 32, 'Sumatera Barat', 'Pariaman', 'Kota', '25511', '2019-11-07 19:44:40', '2019-11-07 19:44:40'),
(338, 29, 'Sulawesi Tengah', 'Parigi Moutong', 'Kabupaten', '94411', '2019-11-07 19:44:40', '2019-11-07 19:44:40'),
(339, 32, 'Sumatera Barat', 'Pasaman', 'Kabupaten', '26318', '2019-11-07 19:44:40', '2019-11-07 19:44:40'),
(340, 32, 'Sumatera Barat', 'Pasaman Barat', 'Kabupaten', '26511', '2019-11-07 19:44:40', '2019-11-07 19:44:40'),
(341, 15, 'Kalimantan Timur', 'Paser', 'Kabupaten', '76211', '2019-11-07 19:44:40', '2019-11-07 19:44:40'),
(342, 11, 'Jawa Timur', 'Pasuruan', 'Kabupaten', '67153', '2019-11-07 19:44:40', '2019-11-07 19:44:40'),
(343, 11, 'Jawa Timur', 'Pasuruan', 'Kota', '67118', '2019-11-07 19:44:40', '2019-11-07 19:44:40'),
(344, 10, 'Jawa Tengah', 'Pati', 'Kabupaten', '59114', '2019-11-07 19:44:40', '2019-11-07 19:44:40'),
(345, 32, 'Sumatera Barat', 'Payakumbuh', 'Kota', '26213', '2019-11-07 19:44:40', '2019-11-07 19:44:40'),
(346, 25, 'Papua Barat', 'Pegunungan Arfak', 'Kabupaten', '98354', '2019-11-07 19:44:40', '2019-11-07 19:44:40'),
(347, 24, 'Papua', 'Pegunungan Bintang', 'Kabupaten', '99573', '2019-11-07 19:44:40', '2019-11-07 19:44:40'),
(348, 10, 'Jawa Tengah', 'Pekalongan', 'Kabupaten', '51161', '2019-11-07 19:44:40', '2019-11-07 19:44:40'),
(349, 10, 'Jawa Tengah', 'Pekalongan', 'Kota', '51122', '2019-11-07 19:44:40', '2019-11-07 19:44:40'),
(350, 26, 'Riau', 'Pekanbaru', 'Kota', '28112', '2019-11-07 19:44:40', '2019-11-07 19:44:40'),
(351, 26, 'Riau', 'Pelalawan', 'Kabupaten', '28311', '2019-11-07 19:44:40', '2019-11-07 19:44:40'),
(352, 10, 'Jawa Tengah', 'Pemalang', 'Kabupaten', '52319', '2019-11-07 19:44:40', '2019-11-07 19:44:40'),
(353, 34, 'Sumatera Utara', 'Pematang Siantar', 'Kota', '21126', '2019-11-07 19:44:40', '2019-11-07 19:44:40'),
(354, 15, 'Kalimantan Timur', 'Penajam Paser Utara', 'Kabupaten', '76311', '2019-11-07 19:44:40', '2019-11-07 19:44:40'),
(355, 18, 'Lampung', 'Pesawaran', 'Kabupaten', '35312', '2019-11-07 19:44:40', '2019-11-07 19:44:40'),
(356, 18, 'Lampung', 'Pesisir Barat', 'Kabupaten', '35974', '2019-11-07 19:44:40', '2019-11-07 19:44:40'),
(357, 32, 'Sumatera Barat', 'Pesisir Selatan', 'Kabupaten', '25611', '2019-11-07 19:44:40', '2019-11-07 19:44:40'),
(358, 21, 'Nanggroe Aceh Darussalam (NAD)', 'Pidie', 'Kabupaten', '24116', '2019-11-07 19:44:40', '2019-11-07 19:44:40'),
(359, 21, 'Nanggroe Aceh Darussalam (NAD)', 'Pidie Jaya', 'Kabupaten', '24186', '2019-11-07 19:44:41', '2019-11-07 19:44:41'),
(360, 28, 'Sulawesi Selatan', 'Pinrang', 'Kabupaten', '91251', '2019-11-07 19:44:41', '2019-11-07 19:44:41'),
(361, 7, 'Gorontalo', 'Pohuwato', 'Kabupaten', '96419', '2019-11-07 19:44:41', '2019-11-07 19:44:41'),
(362, 27, 'Sulawesi Barat', 'Polewali Mandar', 'Kabupaten', '91311', '2019-11-07 19:44:41', '2019-11-07 19:44:41'),
(363, 11, 'Jawa Timur', 'Ponorogo', 'Kabupaten', '63411', '2019-11-07 19:44:41', '2019-11-07 19:44:41'),
(364, 12, 'Kalimantan Barat', 'Pontianak', 'Kabupaten', '78971', '2019-11-07 19:44:41', '2019-11-07 19:44:41'),
(365, 12, 'Kalimantan Barat', 'Pontianak', 'Kota', '78112', '2019-11-07 19:44:41', '2019-11-07 19:44:41'),
(366, 29, 'Sulawesi Tengah', 'Poso', 'Kabupaten', '94615', '2019-11-07 19:44:41', '2019-11-07 19:44:41'),
(367, 33, 'Sumatera Selatan', 'Prabumulih', 'Kota', '31121', '2019-11-07 19:44:41', '2019-11-07 19:44:41'),
(368, 18, 'Lampung', 'Pringsewu', 'Kabupaten', '35719', '2019-11-07 19:44:41', '2019-11-07 19:44:41'),
(369, 11, 'Jawa Timur', 'Probolinggo', 'Kabupaten', '67282', '2019-11-07 19:44:41', '2019-11-07 19:44:41'),
(370, 11, 'Jawa Timur', 'Probolinggo', 'Kota', '67215', '2019-11-07 19:44:41', '2019-11-07 19:44:41'),
(371, 14, 'Kalimantan Tengah', 'Pulang Pisau', 'Kabupaten', '74811', '2019-11-07 19:44:41', '2019-11-07 19:44:41'),
(372, 20, 'Maluku Utara', 'Pulau Morotai', 'Kabupaten', '97771', '2019-11-07 19:44:41', '2019-11-07 19:44:41'),
(373, 24, 'Papua', 'Puncak', 'Kabupaten', '98981', '2019-11-07 19:44:41', '2019-11-07 19:44:41'),
(374, 24, 'Papua', 'Puncak Jaya', 'Kabupaten', '98979', '2019-11-07 19:44:41', '2019-11-07 19:44:41'),
(375, 10, 'Jawa Tengah', 'Purbalingga', 'Kabupaten', '53312', '2019-11-07 19:44:41', '2019-11-07 19:44:41'),
(376, 9, 'Jawa Barat', 'Purwakarta', 'Kabupaten', '41119', '2019-11-07 19:44:41', '2019-11-07 19:44:41'),
(377, 10, 'Jawa Tengah', 'Purworejo', 'Kabupaten', '54111', '2019-11-07 19:44:41', '2019-11-07 19:44:41'),
(378, 25, 'Papua Barat', 'Raja Ampat', 'Kabupaten', '98489', '2019-11-07 19:44:41', '2019-11-07 19:44:41'),
(379, 4, 'Bengkulu', 'Rejang Lebong', 'Kabupaten', '39112', '2019-11-07 19:44:41', '2019-11-07 19:44:41'),
(380, 10, 'Jawa Tengah', 'Rembang', 'Kabupaten', '59219', '2019-11-07 19:44:41', '2019-11-07 19:44:41'),
(381, 26, 'Riau', 'Rokan Hilir', 'Kabupaten', '28992', '2019-11-07 19:44:41', '2019-11-07 19:44:41'),
(382, 26, 'Riau', 'Rokan Hulu', 'Kabupaten', '28511', '2019-11-07 19:44:41', '2019-11-07 19:44:41'),
(383, 23, 'Nusa Tenggara Timur (NTT)', 'Rote Ndao', 'Kabupaten', '85982', '2019-11-07 19:44:41', '2019-11-07 19:44:41'),
(384, 21, 'Nanggroe Aceh Darussalam (NAD)', 'Sabang', 'Kota', '23512', '2019-11-07 19:44:41', '2019-11-07 19:44:41'),
(385, 23, 'Nusa Tenggara Timur (NTT)', 'Sabu Raijua', 'Kabupaten', '85391', '2019-11-07 19:44:41', '2019-11-07 19:44:41'),
(386, 10, 'Jawa Tengah', 'Salatiga', 'Kota', '50711', '2019-11-07 19:44:41', '2019-11-07 19:44:41'),
(387, 15, 'Kalimantan Timur', 'Samarinda', 'Kota', '75133', '2019-11-07 19:44:41', '2019-11-07 19:44:41'),
(388, 12, 'Kalimantan Barat', 'Sambas', 'Kabupaten', '79453', '2019-11-07 19:44:42', '2019-11-07 19:44:42'),
(389, 34, 'Sumatera Utara', 'Samosir', 'Kabupaten', '22392', '2019-11-07 19:44:42', '2019-11-07 19:44:42'),
(390, 11, 'Jawa Timur', 'Sampang', 'Kabupaten', '69219', '2019-11-07 19:44:42', '2019-11-07 19:44:42'),
(391, 12, 'Kalimantan Barat', 'Sanggau', 'Kabupaten', '78557', '2019-11-07 19:44:42', '2019-11-07 19:44:42'),
(392, 24, 'Papua', 'Sarmi', 'Kabupaten', '99373', '2019-11-07 19:44:42', '2019-11-07 19:44:42'),
(393, 8, 'Jambi', 'Sarolangun', 'Kabupaten', '37419', '2019-11-07 19:44:42', '2019-11-07 19:44:42'),
(394, 32, 'Sumatera Barat', 'Sawah Lunto', 'Kota', '27416', '2019-11-07 19:44:42', '2019-11-07 19:44:42'),
(395, 12, 'Kalimantan Barat', 'Sekadau', 'Kabupaten', '79583', '2019-11-07 19:44:42', '2019-11-07 19:44:42'),
(396, 28, 'Sulawesi Selatan', 'Selayar (Kepulauan Selayar)', 'Kabupaten', '92812', '2019-11-07 19:44:42', '2019-11-07 19:44:42'),
(397, 4, 'Bengkulu', 'Seluma', 'Kabupaten', '38811', '2019-11-07 19:44:42', '2019-11-07 19:44:42'),
(398, 10, 'Jawa Tengah', 'Semarang', 'Kabupaten', '50511', '2019-11-07 19:44:42', '2019-11-07 19:44:42'),
(399, 10, 'Jawa Tengah', 'Semarang', 'Kota', '50135', '2019-11-07 19:44:42', '2019-11-07 19:44:42'),
(400, 19, 'Maluku', 'Seram Bagian Barat', 'Kabupaten', '97561', '2019-11-07 19:44:42', '2019-11-07 19:44:42'),
(401, 19, 'Maluku', 'Seram Bagian Timur', 'Kabupaten', '97581', '2019-11-07 19:44:42', '2019-11-07 19:44:42'),
(402, 3, 'Banten', 'Serang', 'Kabupaten', '42182', '2019-11-07 19:44:42', '2019-11-07 19:44:42'),
(403, 3, 'Banten', 'Serang', 'Kota', '42111', '2019-11-07 19:44:42', '2019-11-07 19:44:42'),
(404, 34, 'Sumatera Utara', 'Serdang Bedagai', 'Kabupaten', '20915', '2019-11-07 19:44:42', '2019-11-07 19:44:42'),
(405, 14, 'Kalimantan Tengah', 'Seruyan', 'Kabupaten', '74211', '2019-11-07 19:44:42', '2019-11-07 19:44:42'),
(406, 26, 'Riau', 'Siak', 'Kabupaten', '28623', '2019-11-07 19:44:42', '2019-11-07 19:44:42'),
(407, 34, 'Sumatera Utara', 'Sibolga', 'Kota', '22522', '2019-11-07 19:44:42', '2019-11-07 19:44:42'),
(408, 28, 'Sulawesi Selatan', 'Sidenreng Rappang/Rapang', 'Kabupaten', '91613', '2019-11-07 19:44:42', '2019-11-07 19:44:42'),
(409, 11, 'Jawa Timur', 'Sidoarjo', 'Kabupaten', '61219', '2019-11-07 19:44:42', '2019-11-07 19:44:42'),
(410, 29, 'Sulawesi Tengah', 'Sigi', 'Kabupaten', '94364', '2019-11-07 19:44:42', '2019-11-07 19:44:42'),
(411, 32, 'Sumatera Barat', 'Sijunjung (Sawah Lunto Sijunjung)', 'Kabupaten', '27511', '2019-11-07 19:44:42', '2019-11-07 19:44:42'),
(412, 23, 'Nusa Tenggara Timur (NTT)', 'Sikka', 'Kabupaten', '86121', '2019-11-07 19:44:42', '2019-11-07 19:44:42'),
(413, 34, 'Sumatera Utara', 'Simalungun', 'Kabupaten', '21162', '2019-11-07 19:44:42', '2019-11-07 19:44:42'),
(414, 21, 'Nanggroe Aceh Darussalam (NAD)', 'Simeulue', 'Kabupaten', '23891', '2019-11-07 19:44:42', '2019-11-07 19:44:42'),
(415, 12, 'Kalimantan Barat', 'Singkawang', 'Kota', '79117', '2019-11-07 19:44:42', '2019-11-07 19:44:42'),
(416, 28, 'Sulawesi Selatan', 'Sinjai', 'Kabupaten', '92615', '2019-11-07 19:44:42', '2019-11-07 19:44:42'),
(417, 12, 'Kalimantan Barat', 'Sintang', 'Kabupaten', '78619', '2019-11-07 19:44:42', '2019-11-07 19:44:42'),
(418, 11, 'Jawa Timur', 'Situbondo', 'Kabupaten', '68316', '2019-11-07 19:44:42', '2019-11-07 19:44:42'),
(419, 5, 'DI Yogyakarta', 'Sleman', 'Kabupaten', '55513', '2019-11-07 19:44:42', '2019-11-07 19:44:42'),
(420, 32, 'Sumatera Barat', 'Solok', 'Kabupaten', '27365', '2019-11-07 19:44:42', '2019-11-07 19:44:42'),
(421, 32, 'Sumatera Barat', 'Solok', 'Kota', '27315', '2019-11-07 19:44:42', '2019-11-07 19:44:42'),
(422, 32, 'Sumatera Barat', 'Solok Selatan', 'Kabupaten', '27779', '2019-11-07 19:44:42', '2019-11-07 19:44:42'),
(423, 28, 'Sulawesi Selatan', 'Soppeng', 'Kabupaten', '90812', '2019-11-07 19:44:42', '2019-11-07 19:44:42'),
(424, 25, 'Papua Barat', 'Sorong', 'Kabupaten', '98431', '2019-11-07 19:44:42', '2019-11-07 19:44:42'),
(425, 25, 'Papua Barat', 'Sorong', 'Kota', '98411', '2019-11-07 19:44:42', '2019-11-07 19:44:42'),
(426, 25, 'Papua Barat', 'Sorong Selatan', 'Kabupaten', '98454', '2019-11-07 19:44:42', '2019-11-07 19:44:42'),
(427, 10, 'Jawa Tengah', 'Sragen', 'Kabupaten', '57211', '2019-11-07 19:44:42', '2019-11-07 19:44:42'),
(428, 9, 'Jawa Barat', 'Subang', 'Kabupaten', '41215', '2019-11-07 19:44:42', '2019-11-07 19:44:42'),
(429, 21, 'Nanggroe Aceh Darussalam (NAD)', 'Subulussalam', 'Kota', '24882', '2019-11-07 19:44:42', '2019-11-07 19:44:42'),
(430, 9, 'Jawa Barat', 'Sukabumi', 'Kabupaten', '43311', '2019-11-07 19:44:42', '2019-11-07 19:44:42'),
(431, 9, 'Jawa Barat', 'Sukabumi', 'Kota', '43114', '2019-11-07 19:44:43', '2019-11-07 19:44:43'),
(432, 14, 'Kalimantan Tengah', 'Sukamara', 'Kabupaten', '74712', '2019-11-07 19:44:43', '2019-11-07 19:44:43'),
(433, 10, 'Jawa Tengah', 'Sukoharjo', 'Kabupaten', '57514', '2019-11-07 19:44:43', '2019-11-07 19:44:43'),
(434, 23, 'Nusa Tenggara Timur (NTT)', 'Sumba Barat', 'Kabupaten', '87219', '2019-11-07 19:44:43', '2019-11-07 19:44:43'),
(435, 23, 'Nusa Tenggara Timur (NTT)', 'Sumba Barat Daya', 'Kabupaten', '87453', '2019-11-07 19:44:43', '2019-11-07 19:44:43'),
(436, 23, 'Nusa Tenggara Timur (NTT)', 'Sumba Tengah', 'Kabupaten', '87358', '2019-11-07 19:44:43', '2019-11-07 19:44:43'),
(437, 23, 'Nusa Tenggara Timur (NTT)', 'Sumba Timur', 'Kabupaten', '87112', '2019-11-07 19:44:43', '2019-11-07 19:44:43'),
(438, 22, 'Nusa Tenggara Barat (NTB)', 'Sumbawa', 'Kabupaten', '84315', '2019-11-07 19:44:43', '2019-11-07 19:44:43'),
(439, 22, 'Nusa Tenggara Barat (NTB)', 'Sumbawa Barat', 'Kabupaten', '84419', '2019-11-07 19:44:43', '2019-11-07 19:44:43'),
(440, 9, 'Jawa Barat', 'Sumedang', 'Kabupaten', '45326', '2019-11-07 19:44:43', '2019-11-07 19:44:43'),
(441, 11, 'Jawa Timur', 'Sumenep', 'Kabupaten', '69413', '2019-11-07 19:44:43', '2019-11-07 19:44:43'),
(442, 8, 'Jambi', 'Sungaipenuh', 'Kota', '37113', '2019-11-07 19:44:43', '2019-11-07 19:44:43'),
(443, 24, 'Papua', 'Supiori', 'Kabupaten', '98164', '2019-11-07 19:44:43', '2019-11-07 19:44:43'),
(444, 11, 'Jawa Timur', 'Surabaya', 'Kota', '60119', '2019-11-07 19:44:43', '2019-11-07 19:44:43'),
(445, 10, 'Jawa Tengah', 'Surakarta (Solo)', 'Kota', '57113', '2019-11-07 19:44:43', '2019-11-07 19:44:43'),
(446, 13, 'Kalimantan Selatan', 'Tabalong', 'Kabupaten', '71513', '2019-11-07 19:44:43', '2019-11-07 19:44:43'),
(447, 1, 'Bali', 'Tabanan', 'Kabupaten', '82119', '2019-11-07 19:44:43', '2019-11-07 19:44:43'),
(448, 28, 'Sulawesi Selatan', 'Takalar', 'Kabupaten', '92212', '2019-11-07 19:44:43', '2019-11-07 19:44:43'),
(449, 25, 'Papua Barat', 'Tambrauw', 'Kabupaten', '98475', '2019-11-07 19:44:43', '2019-11-07 19:44:43'),
(450, 16, 'Kalimantan Utara', 'Tana Tidung', 'Kabupaten', '77611', '2019-11-07 19:44:43', '2019-11-07 19:44:43'),
(451, 28, 'Sulawesi Selatan', 'Tana Toraja', 'Kabupaten', '91819', '2019-11-07 19:44:43', '2019-11-07 19:44:43'),
(452, 13, 'Kalimantan Selatan', 'Tanah Bumbu', 'Kabupaten', '72211', '2019-11-07 19:44:43', '2019-11-07 19:44:43'),
(453, 32, 'Sumatera Barat', 'Tanah Datar', 'Kabupaten', '27211', '2019-11-07 19:44:43', '2019-11-07 19:44:43'),
(454, 13, 'Kalimantan Selatan', 'Tanah Laut', 'Kabupaten', '70811', '2019-11-07 19:44:43', '2019-11-07 19:44:43'),
(455, 3, 'Banten', 'Tangerang', 'Kabupaten', '15914', '2019-11-07 19:44:43', '2019-11-07 19:44:43'),
(456, 3, 'Banten', 'Tangerang', 'Kota', '15111', '2019-11-07 19:44:43', '2019-11-07 19:44:43'),
(457, 3, 'Banten', 'Tangerang Selatan', 'Kota', '15332', '2019-11-07 19:44:43', '2019-11-07 19:44:43'),
(458, 18, 'Lampung', 'Tanggamus', 'Kabupaten', '35619', '2019-11-07 19:44:43', '2019-11-07 19:44:43'),
(459, 34, 'Sumatera Utara', 'Tanjung Balai', 'Kota', '21321', '2019-11-07 19:44:43', '2019-11-07 19:44:43'),
(460, 8, 'Jambi', 'Tanjung Jabung Barat', 'Kabupaten', '36513', '2019-11-07 19:44:43', '2019-11-07 19:44:43'),
(461, 8, 'Jambi', 'Tanjung Jabung Timur', 'Kabupaten', '36719', '2019-11-07 19:44:44', '2019-11-07 19:44:44'),
(462, 17, 'Kepulauan Riau', 'Tanjung Pinang', 'Kota', '29111', '2019-11-07 19:44:44', '2019-11-07 19:44:44'),
(463, 34, 'Sumatera Utara', 'Tapanuli Selatan', 'Kabupaten', '22742', '2019-11-07 19:44:44', '2019-11-07 19:44:44'),
(464, 34, 'Sumatera Utara', 'Tapanuli Tengah', 'Kabupaten', '22611', '2019-11-07 19:44:44', '2019-11-07 19:44:44'),
(465, 34, 'Sumatera Utara', 'Tapanuli Utara', 'Kabupaten', '22414', '2019-11-07 19:44:44', '2019-11-07 19:44:44');
INSERT INTO `cities` (`id`, `id_provinsi`, `provinsi`, `nama`, `type`, `kodepos`, `created_at`, `updated_at`) VALUES
(466, 13, 'Kalimantan Selatan', 'Tapin', 'Kabupaten', '71119', '2019-11-07 19:44:44', '2019-11-07 19:44:44'),
(467, 16, 'Kalimantan Utara', 'Tarakan', 'Kota', '77114', '2019-11-07 19:44:44', '2019-11-07 19:44:44'),
(468, 9, 'Jawa Barat', 'Tasikmalaya', 'Kabupaten', '46411', '2019-11-07 19:44:44', '2019-11-07 19:44:44'),
(469, 9, 'Jawa Barat', 'Tasikmalaya', 'Kota', '46116', '2019-11-07 19:44:44', '2019-11-07 19:44:44'),
(470, 34, 'Sumatera Utara', 'Tebing Tinggi', 'Kota', '20632', '2019-11-07 19:44:44', '2019-11-07 19:44:44'),
(471, 8, 'Jambi', 'Tebo', 'Kabupaten', '37519', '2019-11-07 19:44:44', '2019-11-07 19:44:44'),
(472, 10, 'Jawa Tengah', 'Tegal', 'Kabupaten', '52419', '2019-11-07 19:44:44', '2019-11-07 19:44:44'),
(473, 10, 'Jawa Tengah', 'Tegal', 'Kota', '52114', '2019-11-07 19:44:44', '2019-11-07 19:44:44'),
(474, 25, 'Papua Barat', 'Teluk Bintuni', 'Kabupaten', '98551', '2019-11-07 19:44:44', '2019-11-07 19:44:44'),
(475, 25, 'Papua Barat', 'Teluk Wondama', 'Kabupaten', '98591', '2019-11-07 19:44:44', '2019-11-07 19:44:44'),
(476, 10, 'Jawa Tengah', 'Temanggung', 'Kabupaten', '56212', '2019-11-07 19:44:44', '2019-11-07 19:44:44'),
(477, 20, 'Maluku Utara', 'Ternate', 'Kota', '97714', '2019-11-07 19:44:44', '2019-11-07 19:44:44'),
(478, 20, 'Maluku Utara', 'Tidore Kepulauan', 'Kota', '97815', '2019-11-07 19:44:44', '2019-11-07 19:44:44'),
(479, 23, 'Nusa Tenggara Timur (NTT)', 'Timor Tengah Selatan', 'Kabupaten', '85562', '2019-11-07 19:44:44', '2019-11-07 19:44:44'),
(480, 23, 'Nusa Tenggara Timur (NTT)', 'Timor Tengah Utara', 'Kabupaten', '85612', '2019-11-07 19:44:44', '2019-11-07 19:44:44'),
(481, 34, 'Sumatera Utara', 'Toba Samosir', 'Kabupaten', '22316', '2019-11-07 19:44:44', '2019-11-07 19:44:44'),
(482, 29, 'Sulawesi Tengah', 'Tojo Una-Una', 'Kabupaten', '94683', '2019-11-07 19:44:44', '2019-11-07 19:44:44'),
(483, 29, 'Sulawesi Tengah', 'Toli-Toli', 'Kabupaten', '94542', '2019-11-07 19:44:44', '2019-11-07 19:44:44'),
(484, 24, 'Papua', 'Tolikara', 'Kabupaten', '99411', '2019-11-07 19:44:44', '2019-11-07 19:44:44'),
(485, 31, 'Sulawesi Utara', 'Tomohon', 'Kota', '95416', '2019-11-07 19:44:44', '2019-11-07 19:44:44'),
(486, 28, 'Sulawesi Selatan', 'Toraja Utara', 'Kabupaten', '91831', '2019-11-07 19:44:45', '2019-11-07 19:44:45'),
(487, 11, 'Jawa Timur', 'Trenggalek', 'Kabupaten', '66312', '2019-11-07 19:44:45', '2019-11-07 19:44:45'),
(488, 19, 'Maluku', 'Tual', 'Kota', '97612', '2019-11-07 19:44:45', '2019-11-07 19:44:45'),
(489, 11, 'Jawa Timur', 'Tuban', 'Kabupaten', '62319', '2019-11-07 19:44:45', '2019-11-07 19:44:45'),
(490, 18, 'Lampung', 'Tulang Bawang', 'Kabupaten', '34613', '2019-11-07 19:44:45', '2019-11-07 19:44:45'),
(491, 18, 'Lampung', 'Tulang Bawang Barat', 'Kabupaten', '34419', '2019-11-07 19:44:45', '2019-11-07 19:44:45'),
(492, 11, 'Jawa Timur', 'Tulungagung', 'Kabupaten', '66212', '2019-11-07 19:44:45', '2019-11-07 19:44:45'),
(493, 28, 'Sulawesi Selatan', 'Wajo', 'Kabupaten', '90911', '2019-11-07 19:44:45', '2019-11-07 19:44:45'),
(494, 30, 'Sulawesi Tenggara', 'Wakatobi', 'Kabupaten', '93791', '2019-11-07 19:44:45', '2019-11-07 19:44:45'),
(495, 24, 'Papua', 'Waropen', 'Kabupaten', '98269', '2019-11-07 19:44:45', '2019-11-07 19:44:45'),
(496, 18, 'Lampung', 'Way Kanan', 'Kabupaten', '34711', '2019-11-07 19:44:45', '2019-11-07 19:44:45'),
(497, 10, 'Jawa Tengah', 'Wonogiri', 'Kabupaten', '57619', '2019-11-07 19:44:45', '2019-11-07 19:44:45'),
(498, 10, 'Jawa Tengah', 'Wonosobo', 'Kabupaten', '56311', '2019-11-07 19:44:45', '2019-11-07 19:44:45'),
(499, 24, 'Papua', 'Yahukimo', 'Kabupaten', '99041', '2019-11-07 19:44:45', '2019-11-07 19:44:45'),
(500, 24, 'Papua', 'Yalimo', 'Kabupaten', '99481', '2019-11-07 19:44:45', '2019-11-07 19:44:45'),
(501, 5, 'DI Yogyakarta', 'Yogyakarta', 'Kota', '55111', '2019-11-07 19:44:45', '2019-11-07 19:44:45');

-- --------------------------------------------------------

--
-- Struktur dari tabel `galeri`
--

CREATE TABLE `galeri` (
  `kd_galeri` int(10) UNSIGNED NOT NULL,
  `url_galeri` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kd_media` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `galeri`
--

INSERT INTO `galeri` (`kd_galeri`, `url_galeri`, `kd_media`, `created_at`, `updated_at`) VALUES
(11, 'aksed3t83zzjewnkxzou', 1143, '2019-11-08 20:10:25', '2019-11-08 20:10:25'),
(12, 'jtm78qggtklsrtyyjsz1', 1143, '2019-11-08 20:10:29', '2019-11-08 20:10:29');

-- --------------------------------------------------------

--
-- Struktur dari tabel `gelombang`
--

CREATE TABLE `gelombang` (
  `kd_gelombang` int(11) NOT NULL,
  `nama_gelombang` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `gelombang`
--

INSERT INTO `gelombang` (`kd_gelombang`, `nama_gelombang`, `created_at`, `updated_at`) VALUES
(1543, 'Gelombang 1', '2019-11-08 02:39:49', '2019-11-08 02:39:49'),
(1544, 'Gelombang 2', '2019-11-08 17:42:46', '2019-11-08 17:42:46');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori_konten`
--

CREATE TABLE `kategori_konten` (
  `kd_kategori_konten` int(11) NOT NULL,
  `kategori_konten` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kategori_konten`
--

INSERT INTO `kategori_konten` (`kd_kategori_konten`, `kategori_konten`, `created_at`, `updated_at`) VALUES
(1311, 'Berita', '2019-11-07 19:46:52', '2019-11-07 19:46:52'),
(1312, 'Lowongan Kerja', '2019-11-07 19:46:59', '2019-11-07 19:46:59'),
(1313, 'Pengumuman', '2019-11-07 19:47:05', '2019-11-07 19:47:05');

-- --------------------------------------------------------

--
-- Struktur dari tabel `konten`
--

CREATE TABLE `konten` (
  `kd_konten` int(10) UNSIGNED NOT NULL,
  `judul_konten` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isi_konten` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `kd_kategori` int(11) NOT NULL,
  `foto` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_rilis` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `link`
--

CREATE TABLE `link` (
  `kd_link` int(10) UNSIGNED NOT NULL,
  `link` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_dinas_terkait` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `media`
--

CREATE TABLE `media` (
  `kd_media` int(11) NOT NULL,
  `nama_media` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `media`
--

INSERT INTO `media` (`kd_media`, `nama_media`, `created_at`, `updated_at`) VALUES
(1143, 'Foto', '2019-11-07 17:00:00', '2019-11-07 17:00:00'),
(1144, 'Video', '2019-11-07 17:00:00', '2019-11-07 17:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `member`
--

CREATE TABLE `member` (
  `kd_pengguna` int(11) NOT NULL,
  `nomor_ktp` bigint(20) NOT NULL,
  `nama_lengkap` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tempat_lahir` int(11) NOT NULL,
  `tgl_lahir` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_kelamin` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat_lengkap` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `provinsi` int(11) NOT NULL,
  `kabupaten_kota` int(11) NOT NULL,
  `kodepos` int(11) NOT NULL,
  `pend_terakhir` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `thn_ijazah` int(11) DEFAULT NULL,
  `nomor_kontak` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ukuran_baju` varchar(3) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ukuran_sepatu` int(11) DEFAULT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `member`
--

INSERT INTO `member` (`kd_pengguna`, `nomor_ktp`, `nama_lengkap`, `tempat_lahir`, `tgl_lahir`, `jenis_kelamin`, `alamat_lengkap`, `provinsi`, `kabupaten_kota`, `kodepos`, `pend_terakhir`, `thn_ijazah`, `nomor_kontak`, `ukuran_baju`, `ukuran_sepatu`, `username`, `password`, `email`, `created_at`, `updated_at`) VALUES
(1000000001, 3245678756, 'Harsa Yamani', 108, '03/23/1999', 'L', 'Jalan Mahoni Selatan Blok J16 Griya Sunyaragi Permai', 9, 109, 45116, 'SMA/MA/SMK', 2017, '+628977025416', 'M', 42, '5dc54b821a9de', '$2y$10$QUB.uNZhIIkKmFGF/F6a2udIyzwOBItpW4LpruqGPOz6JXiRDDuQW', 'harsayamani@gmail.com', '2019-11-08 04:05:12', '2019-11-08 04:05:12');

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
(17, '2019_10_04_080236_create_admin_table', 1),
(18, '2019_10_04_080455_create_member_table', 1),
(19, '2019_10_04_080539_create_profil_table', 1),
(20, '2019_10_04_080614_create_slide_table', 1),
(21, '2019_10_04_080648_create_konten_table', 1),
(22, '2019_10_04_080730_create_kategori_konten_table', 1),
(23, '2019_10_04_080800_create_galeri_table', 1),
(24, '2019_10_04_080841_create_link_table', 1),
(25, '2019_10_04_080923_create_skema_pelatihan_table', 1),
(26, '2019_10_04_081003_create_program_pelatihan_table', 1),
(27, '2019_10_04_081058_create_gelombang_table', 1),
(28, '2019_10_04_081204_create_pendaftaran_program_table', 1),
(29, '2019_10_04_081238_create_sertifikat_table', 1),
(30, '2019_10_07_140346_create_media_table', 1),
(31, '2019_10_11_014959_create_province_table', 1),
(32, '2019_10_11_015216_create_cities_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pendaftaran_program`
--

CREATE TABLE `pendaftaran_program` (
  `kd_pendaftaran` int(11) NOT NULL,
  `kd_pengguna` int(11) NOT NULL,
  `kd_skema` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pendaftaran_program`
--

INSERT INTO `pendaftaran_program` (`kd_pendaftaran`, `kd_pengguna`, `kd_skema`, `status`, `created_at`, `updated_at`) VALUES
(2000000001, 1000000001, 1323, 1, '2019-11-12 20:10:41', '2019-11-12 20:10:41');

-- --------------------------------------------------------

--
-- Struktur dari tabel `profil`
--

CREATE TABLE `profil` (
  `kd_profil` int(11) NOT NULL,
  `visi_misi` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `profil_lembaga` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `kontak` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `program_pelatihan`
--

CREATE TABLE `program_pelatihan` (
  `kd_program` int(11) NOT NULL,
  `nama_program` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `detail_program` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `program_pelatihan`
--

INSERT INTO `program_pelatihan` (`kd_program`, `nama_program`, `detail_program`, `created_at`, `updated_at`) VALUES
(1243, 'Kehlian Menjahit', '<p>Dalam keahlian menjahit dibutuhkan</p>', '2019-11-08 08:35:24', '2019-11-08 08:35:24'),
(1244, 'Keahlian Bengkel', '<p>dsfsfsdfsgs</p>', '2019-11-08 17:43:09', '2019-11-08 17:43:09');

-- --------------------------------------------------------

--
-- Struktur dari tabel `province`
--

CREATE TABLE `province` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `province`
--

INSERT INTO `province` (`id`, `nama`, `created_at`, `updated_at`) VALUES
(1, 'Bali', '2019-11-07 19:44:45', '2019-11-07 19:44:45'),
(2, 'Bangka Belitung', '2019-11-07 19:44:45', '2019-11-07 19:44:45'),
(3, 'Banten', '2019-11-07 19:44:45', '2019-11-07 19:44:45'),
(4, 'Bengkulu', '2019-11-07 19:44:45', '2019-11-07 19:44:45'),
(5, 'DI Yogyakarta', '2019-11-07 19:44:45', '2019-11-07 19:44:45'),
(6, 'DKI Jakarta', '2019-11-07 19:44:46', '2019-11-07 19:44:46'),
(7, 'Gorontalo', '2019-11-07 19:44:46', '2019-11-07 19:44:46'),
(8, 'Jambi', '2019-11-07 19:44:46', '2019-11-07 19:44:46'),
(9, 'Jawa Barat', '2019-11-07 19:44:46', '2019-11-07 19:44:46'),
(10, 'Jawa Tengah', '2019-11-07 19:44:46', '2019-11-07 19:44:46'),
(11, 'Jawa Timur', '2019-11-07 19:44:46', '2019-11-07 19:44:46'),
(12, 'Kalimantan Barat', '2019-11-07 19:44:46', '2019-11-07 19:44:46'),
(13, 'Kalimantan Selatan', '2019-11-07 19:44:46', '2019-11-07 19:44:46'),
(14, 'Kalimantan Tengah', '2019-11-07 19:44:46', '2019-11-07 19:44:46'),
(15, 'Kalimantan Timur', '2019-11-07 19:44:46', '2019-11-07 19:44:46'),
(16, 'Kalimantan Utara', '2019-11-07 19:44:46', '2019-11-07 19:44:46'),
(17, 'Kepulauan Riau', '2019-11-07 19:44:46', '2019-11-07 19:44:46'),
(18, 'Lampung', '2019-11-07 19:44:46', '2019-11-07 19:44:46'),
(19, 'Maluku', '2019-11-07 19:44:46', '2019-11-07 19:44:46'),
(20, 'Maluku Utara', '2019-11-07 19:44:46', '2019-11-07 19:44:46'),
(21, 'Nanggroe Aceh Darussalam (NAD)', '2019-11-07 19:44:46', '2019-11-07 19:44:46'),
(22, 'Nusa Tenggara Barat (NTB)', '2019-11-07 19:44:46', '2019-11-07 19:44:46'),
(23, 'Nusa Tenggara Timur (NTT)', '2019-11-07 19:44:46', '2019-11-07 19:44:46'),
(24, 'Papua', '2019-11-07 19:44:46', '2019-11-07 19:44:46'),
(25, 'Papua Barat', '2019-11-07 19:44:46', '2019-11-07 19:44:46'),
(26, 'Riau', '2019-11-07 19:44:46', '2019-11-07 19:44:46'),
(27, 'Sulawesi Barat', '2019-11-07 19:44:46', '2019-11-07 19:44:46'),
(28, 'Sulawesi Selatan', '2019-11-07 19:44:46', '2019-11-07 19:44:46'),
(29, 'Sulawesi Tengah', '2019-11-07 19:44:46', '2019-11-07 19:44:46'),
(30, 'Sulawesi Tenggara', '2019-11-07 19:44:46', '2019-11-07 19:44:46'),
(31, 'Sulawesi Utara', '2019-11-07 19:44:46', '2019-11-07 19:44:46'),
(32, 'Sumatera Barat', '2019-11-07 19:44:46', '2019-11-07 19:44:46'),
(33, 'Sumatera Selatan', '2019-11-07 19:44:46', '2019-11-07 19:44:46'),
(34, 'Sumatera Utara', '2019-11-07 19:44:46', '2019-11-07 19:44:46');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sertifikat`
--

CREATE TABLE `sertifikat` (
  `kd_sertifikat` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar_sertifikat` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kd_pengguna` int(11) NOT NULL,
  `kd_program` int(11) NOT NULL,
  `tgl_terbit` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_kadaluarsa` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `skema_pelatihan`
--

CREATE TABLE `skema_pelatihan` (
  `kd_skema` int(11) NOT NULL,
  `kd_program` int(11) NOT NULL,
  `kd_gelombang` int(11) NOT NULL,
  `waktu_buka` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `waktu_tutup` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `waktu_seleksi` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kuota` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `skema_pelatihan`
--

INSERT INTO `skema_pelatihan` (`kd_skema`, `kd_program`, `kd_gelombang`, `waktu_buka`, `waktu_tutup`, `waktu_seleksi`, `kuota`, `created_at`, `updated_at`) VALUES
(1323, 1243, 1543, '11/13/2019', '11/27/2019', '11/28/2019', 20, '2019-11-12 17:01:29', '2019-11-12 17:01:29'),
(1324, 1244, 1543, '11/15/2019', '11/17/2019', '11/18/2019', 23, '2019-11-12 17:27:15', '2019-11-12 17:27:15');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`username`);

--
-- Indeks untuk tabel `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `galeri`
--
ALTER TABLE `galeri`
  ADD PRIMARY KEY (`kd_galeri`);

--
-- Indeks untuk tabel `gelombang`
--
ALTER TABLE `gelombang`
  ADD PRIMARY KEY (`kd_gelombang`);

--
-- Indeks untuk tabel `kategori_konten`
--
ALTER TABLE `kategori_konten`
  ADD PRIMARY KEY (`kd_kategori_konten`);

--
-- Indeks untuk tabel `konten`
--
ALTER TABLE `konten`
  ADD PRIMARY KEY (`kd_konten`);

--
-- Indeks untuk tabel `link`
--
ALTER TABLE `link`
  ADD PRIMARY KEY (`kd_link`);

--
-- Indeks untuk tabel `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`kd_media`);

--
-- Indeks untuk tabel `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`kd_pengguna`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pendaftaran_program`
--
ALTER TABLE `pendaftaran_program`
  ADD PRIMARY KEY (`kd_pendaftaran`);

--
-- Indeks untuk tabel `profil`
--
ALTER TABLE `profil`
  ADD PRIMARY KEY (`kd_profil`);

--
-- Indeks untuk tabel `program_pelatihan`
--
ALTER TABLE `program_pelatihan`
  ADD PRIMARY KEY (`kd_program`);

--
-- Indeks untuk tabel `province`
--
ALTER TABLE `province`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `sertifikat`
--
ALTER TABLE `sertifikat`
  ADD PRIMARY KEY (`kd_sertifikat`);

--
-- Indeks untuk tabel `skema_pelatihan`
--
ALTER TABLE `skema_pelatihan`
  ADD PRIMARY KEY (`kd_skema`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `cities`
--
ALTER TABLE `cities`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=502;

--
-- AUTO_INCREMENT untuk tabel `galeri`
--
ALTER TABLE `galeri`
  MODIFY `kd_galeri` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `konten`
--
ALTER TABLE `konten`
  MODIFY `kd_konten` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `link`
--
ALTER TABLE `link`
  MODIFY `kd_link` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT untuk tabel `province`
--
ALTER TABLE `province`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
