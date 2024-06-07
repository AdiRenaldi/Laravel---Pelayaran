-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 10, 2023 at 06:54 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pelayaran`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `role_id`, `nama`, `username`, `password`, `created_at`, `updated_at`) VALUES
(1, 1, 'Admin', 'admin', '$2y$10$2/sO9W8wkzRok1PoCDL5OuvICAZ0Ng4c3U3Fbxkk/RyuTnV.PuXYO', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `administrasi`
--

CREATE TABLE `administrasi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kapal_id` bigint(20) UNSIGNED NOT NULL,
  `laporanKedatangan` int(11) NOT NULL,
  `daftarAwak` int(11) NOT NULL,
  `suratPernyataan` int(11) NOT NULL,
  `bukuKesehatan` int(11) NOT NULL,
  `menifesPenumpang` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `administrasi`
--

INSERT INTO `administrasi` (`id`, `kapal_id`, `laporanKedatangan`, `daftarAwak`, `suratPernyataan`, `bukuKesehatan`, `menifesPenumpang`, `created_at`, `updated_at`) VALUES
(1, 1, 3, 2, 3, 2, 2, '2023-08-04 09:01:45', '2023-08-04 09:01:45'),
(2, 2, 4, 4, 3, 3, 3, '2023-08-04 09:06:27', '2023-08-04 09:06:27');

-- --------------------------------------------------------

--
-- Table structure for table `bobot_administrasi`
--

CREATE TABLE `bobot_administrasi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kapal_id` bigint(20) UNSIGNED NOT NULL,
  `kriteria_1` varchar(200) NOT NULL,
  `kriteria_2` varchar(200) NOT NULL,
  `kriteria_3` varchar(200) NOT NULL,
  `kriteria_4` varchar(200) NOT NULL,
  `kriteria_5` varchar(200) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bobot_administrasi`
--

INSERT INTO `bobot_administrasi` (`id`, `kapal_id`, `kriteria_1`, `kriteria_2`, `kriteria_3`, `kriteria_4`, `kriteria_5`, `created_at`, `updated_at`) VALUES
(1, 1, '3', '2', '3', '3', '3', '2023-08-04 09:01:45', '2023-08-04 09:01:45'),
(2, 2, '4', '4', '3', '4', '4', '2023-08-04 09:06:27', '2023-08-04 09:06:27');

-- --------------------------------------------------------

--
-- Table structure for table `bobot_mesin`
--

CREATE TABLE `bobot_mesin` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kapal_id` bigint(20) UNSIGNED NOT NULL,
  `kriteria_1` varchar(200) NOT NULL,
  `kriteria_2` varchar(200) NOT NULL,
  `kriteria_3` varchar(200) NOT NULL,
  `kriteria_4` varchar(200) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bobot_mesin`
--

INSERT INTO `bobot_mesin` (`id`, `kapal_id`, `kriteria_1`, `kriteria_2`, `kriteria_3`, `kriteria_4`, `created_at`, `updated_at`) VALUES
(1, 1, '3', '3', '3', '3.5', '2023-08-04 09:01:45', '2023-08-04 09:01:45'),
(2, 2, '4', '4', '4', '3.5', '2023-08-04 09:06:27', '2023-08-04 09:06:27');

-- --------------------------------------------------------

--
-- Table structure for table `bobot_navigasi`
--

CREATE TABLE `bobot_navigasi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kapal_id` bigint(20) UNSIGNED NOT NULL,
  `kriteria_1` varchar(200) NOT NULL,
  `kriteria_2` varchar(200) NOT NULL,
  `kriteria_3` varchar(200) NOT NULL,
  `kriteria_4` varchar(200) NOT NULL,
  `kriteria_5` varchar(200) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bobot_navigasi`
--

INSERT INTO `bobot_navigasi` (`id`, `kapal_id`, `kriteria_1`, `kriteria_2`, `kriteria_3`, `kriteria_4`, `kriteria_5`, `created_at`, `updated_at`) VALUES
(1, 1, '3', '3', '2', '4', '3.5', '2023-08-04 09:01:45', '2023-08-04 09:01:45'),
(2, 2, '4', '3', '4', '3.5', '3.5', '2023-08-04 09:06:27', '2023-08-04 09:06:27');

-- --------------------------------------------------------

--
-- Table structure for table `bobot_nilai_gab`
--

CREATE TABLE `bobot_nilai_gab` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sesuaiDibutuhkan` int(11) NOT NULL,
  `kelebihan_1_tingkat` varchar(200) NOT NULL,
  `kekurangan_1_tingkat` varchar(200) NOT NULL,
  `kelebihan_2_tingkat` varchar(200) NOT NULL,
  `kekurangan_2_tingkat` varchar(200) NOT NULL,
  `kelebihan_3_tingkat` varchar(200) NOT NULL,
  `kekurangan_3_tingkat` varchar(200) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bobot_nilai_gab`
--

INSERT INTO `bobot_nilai_gab` (`id`, `sesuaiDibutuhkan`, `kelebihan_1_tingkat`, `kekurangan_1_tingkat`, `kelebihan_2_tingkat`, `kekurangan_2_tingkat`, `kelebihan_3_tingkat`, `kekurangan_3_tingkat`, `created_at`, `updated_at`) VALUES
(1, 4, '3.5', '3', '2.5', '2', '1.5', '1', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `gap_administrasi`
--

CREATE TABLE `gap_administrasi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kapal_id` bigint(20) UNSIGNED NOT NULL,
  `kriteria_1` int(11) NOT NULL,
  `kriteria_2` int(11) NOT NULL,
  `kriteria_3` int(11) NOT NULL,
  `kriteria_4` int(11) NOT NULL,
  `kriteria_5` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gap_administrasi`
--

INSERT INTO `gap_administrasi` (`id`, `kapal_id`, `kriteria_1`, `kriteria_2`, `kriteria_3`, `kriteria_4`, `kriteria_5`, `created_at`, `updated_at`) VALUES
(1, 1, -1, -2, -1, -1, -1, '2023-08-04 09:01:45', '2023-08-04 09:01:45'),
(2, 2, 0, 0, -1, 0, 0, '2023-08-04 09:06:27', '2023-08-04 09:06:27');

-- --------------------------------------------------------

--
-- Table structure for table `gap_mesin`
--

CREATE TABLE `gap_mesin` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kapal_id` bigint(20) UNSIGNED NOT NULL,
  `kriteria_1` int(11) NOT NULL,
  `kriteria_2` int(11) NOT NULL,
  `kriteria_3` int(11) NOT NULL,
  `kriteria_4` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gap_mesin`
--

INSERT INTO `gap_mesin` (`id`, `kapal_id`, `kriteria_1`, `kriteria_2`, `kriteria_3`, `kriteria_4`, `created_at`, `updated_at`) VALUES
(1, 1, -1, -1, -1, 1, '2023-08-04 09:01:45', '2023-08-04 09:01:45'),
(2, 2, 0, 0, 0, 1, '2023-08-04 09:06:27', '2023-08-04 09:06:27');

-- --------------------------------------------------------

--
-- Table structure for table `gap_navigasi`
--

CREATE TABLE `gap_navigasi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kapal_id` bigint(20) UNSIGNED NOT NULL,
  `kriteria_1` int(11) NOT NULL,
  `kriteria_2` int(11) NOT NULL,
  `kriteria_3` int(11) NOT NULL,
  `kriteria_4` int(11) NOT NULL,
  `kriteria_5` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gap_navigasi`
--

INSERT INTO `gap_navigasi` (`id`, `kapal_id`, `kriteria_1`, `kriteria_2`, `kriteria_3`, `kriteria_4`, `kriteria_5`, `created_at`, `updated_at`) VALUES
(1, 1, -1, -1, -2, 0, 1, '2023-08-04 09:01:45', '2023-08-04 09:01:45'),
(2, 2, 0, -1, 0, 1, 1, '2023-08-04 09:06:27', '2023-08-04 09:06:27');

-- --------------------------------------------------------

--
-- Table structure for table `hasil_peringkat`
--

CREATE TABLE `hasil_peringkat` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `nilai_akhir` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kapal`
--

CREATE TABLE `kapal` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_kapal` varchar(255) NOT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `pemilik` varchar(255) NOT NULL,
  `gt` bigint(20) NOT NULL,
  `tahun` bigint(20) NOT NULL,
  `jenis_kapal` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kapal`
--

INSERT INTO `kapal` (`id`, `nama_kapal`, `slug`, `pemilik`, `gt`, `tahun`, `jenis_kapal`, `created_at`, `updated_at`) VALUES
(1, 'KM. Nur Rizki', 'km-nur-rizki', 'PT. Nur Rizki', 35, 2006, 'Penumpang', '2023-08-04 09:01:45', '2023-09-07 23:14:09'),
(2, 'KM. NAPOLEON 77', 'km-napoleon-77', 'PT. AKSAR SAPUTRA LINES', 698, 2016, 'Penumpang', '2023-08-04 09:06:27', '2023-08-04 09:06:27');

-- --------------------------------------------------------

--
-- Table structure for table `kariawan`
--

CREATE TABLE `kariawan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kariawan`
--

INSERT INTO `kariawan` (`id`, `role_id`, `nama`, `username`, `password`, `created_at`, `updated_at`) VALUES
(4, 3, 'Naila', 'naila', '$2y$10$H1LgfsbYP85/pQGEQ3l5CedY.WQI3EzvSsOto1uBt0tmdB8FtRrpa', '2023-07-31 04:11:36', '2023-07-31 10:56:28'),
(5, 3, 'Kariawan', 'kariawan', '$2y$10$HbntzfzFNrZjMkqA31PnNOS8TTOly/P2svG329LBkBIfau970SBk2', '2023-07-31 11:00:14', '2023-07-31 11:00:44');

-- --------------------------------------------------------

--
-- Table structure for table `kriteria_aspek_administrasi`
--

CREATE TABLE `kriteria_aspek_administrasi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kapal_id` bigint(20) UNSIGNED NOT NULL,
  `kriteria_1` varchar(255) NOT NULL,
  `kriteria_2` varchar(255) NOT NULL,
  `kriteria_3` varchar(255) NOT NULL,
  `kriteria_4` varchar(255) NOT NULL,
  `kriteria_5` varchar(255) NOT NULL,
  `cf` varchar(255) NOT NULL,
  `sf` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kriteria_aspek_administrasi`
--

INSERT INTO `kriteria_aspek_administrasi` (`id`, `kapal_id`, `kriteria_1`, `kriteria_2`, `kriteria_3`, `kriteria_4`, `kriteria_5`, `cf`, `sf`, `created_at`, `updated_at`) VALUES
(1, 1, '3', '2', '3', '3', '3', '2.67', '3.00', '2023-08-04 09:01:45', '2023-08-04 09:01:45'),
(2, 2, '4', '4', '3', '4', '4', '3.67', '4.00', '2023-08-04 09:06:27', '2023-08-04 09:06:27');

-- --------------------------------------------------------

--
-- Table structure for table `kriteria_aspek_mesin`
--

CREATE TABLE `kriteria_aspek_mesin` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kapal_id` bigint(20) UNSIGNED NOT NULL,
  `kriteria_1` varchar(255) NOT NULL,
  `kriteria_2` varchar(255) NOT NULL,
  `kriteria_3` varchar(255) NOT NULL,
  `kriteria_4` varchar(255) NOT NULL,
  `cf` varchar(255) NOT NULL,
  `sf` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kriteria_aspek_mesin`
--

INSERT INTO `kriteria_aspek_mesin` (`id`, `kapal_id`, `kriteria_1`, `kriteria_2`, `kriteria_3`, `kriteria_4`, `cf`, `sf`, `created_at`, `updated_at`) VALUES
(1, 1, '3', '3', '3', '3.5', '3.00', '3.25', '2023-08-04 09:01:45', '2023-08-04 09:01:45'),
(2, 2, '4', '4', '4', '3.5', '4.00', '3.75', '2023-08-04 09:06:27', '2023-08-04 09:06:27');

-- --------------------------------------------------------

--
-- Table structure for table `kriteria_aspek_navigasi`
--

CREATE TABLE `kriteria_aspek_navigasi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kapal_id` bigint(20) UNSIGNED NOT NULL,
  `kriteria_1` varchar(255) NOT NULL,
  `kriteria_2` varchar(255) NOT NULL,
  `kriteria_3` varchar(255) NOT NULL,
  `kriteria_4` varchar(255) NOT NULL,
  `kriteria_5` varchar(255) NOT NULL,
  `cf` varchar(255) NOT NULL,
  `sf` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kriteria_aspek_navigasi`
--

INSERT INTO `kriteria_aspek_navigasi` (`id`, `kapal_id`, `kriteria_1`, `kriteria_2`, `kriteria_3`, `kriteria_4`, `kriteria_5`, `cf`, `sf`, `created_at`, `updated_at`) VALUES
(1, 1, '3', '3', '2', '4', '3.5', '2.67', '3.75', '2023-08-04 09:01:45', '2023-08-04 09:01:45'),
(2, 2, '4', '3', '4', '3.5', '3.5', '3.67', '3.50', '2023-08-04 09:06:27', '2023-08-04 09:06:27');

-- --------------------------------------------------------

--
-- Table structure for table `mesin`
--

CREATE TABLE `mesin` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kapal_id` bigint(20) UNSIGNED NOT NULL,
  `mesinUtama` int(11) NOT NULL,
  `mesinBantu` int(11) NOT NULL,
  `teganganListrik` int(11) NOT NULL,
  `bahanBakar` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mesin`
--

INSERT INTO `mesin` (`id`, `kapal_id`, `mesinUtama`, `mesinBantu`, `teganganListrik`, `bahanBakar`, `created_at`, `updated_at`) VALUES
(1, 1, 3, 2, 2, 3, '2023-08-04 09:01:45', '2023-08-04 09:01:45'),
(2, 2, 4, 3, 3, 3, '2023-08-04 09:06:27', '2023-08-04 09:06:27');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_07_22_172512_create_admin_table', 1),
(6, '2023_07_22_174256_create_kariawan_table', 2),
(7, '2023_07_22_174851_create_pimpinan_table', 3),
(8, '2023_07_22_180926_create_kapal_table', 4),
(9, '2023_07_22_181718_create_spesifikasi_table', 5),
(10, '2023_07_22_181846_create_hasil_peringkat_table', 6),
(11, '2023_07_22_182333_create_testing_table', 7),
(12, '2023_07_22_182915_create_subspesifikasi_table', 8),
(13, '2023_07_22_184408_create_role_table', 9),
(15, '2023_07_22_190616_add_role_id_column_to_admin_table', 10),
(16, '2023_07_22_191118_add_role_id_column_to_kariawan_table', 11),
(17, '2023_07_22_191224_add_role_id_column_to_pimpinan_table', 12),
(18, '2023_07_27_121633_create_administrasi_table', 13),
(19, '2023_07_27_123834_create_mesin_table', 14),
(20, '2023_07_27_124247_create_navigasi_table', 15),
(24, '2023_07_29_120349_create_target_administrasi_table', 16),
(25, '2023_07_29_121104_create_target_mesin_table', 16),
(26, '2023_07_29_121302_create_target_navigasi_table', 16),
(33, '2023_07_29_133939_create_gap_administrasi_table', 17),
(34, '2023_07_29_134107_create_gap_mesin_table', 17),
(35, '2023_07_29_134128_create_gap_navigasi_table', 17),
(36, '2023_07_29_155351_create_bobot_nilai_gab_table', 18),
(37, '2023_07_29_162520_create_bobot_administrasi_table', 19),
(38, '2023_07_29_162540_create_bobot_mesin_table', 19),
(39, '2023_07_29_162556_create_bobot_navigasi_table', 19),
(40, '2023_07_29_210157_create_kriteria_aspek_administrasi_table', 20),
(41, '2023_07_29_210247_create_kriteria_aspek_mesin_table', 20),
(42, '2023_07_29_210310_create_kriteria_aspek_navigasi_table', 20),
(43, '2023_07_29_224042_create_total_kriteria_aspek_administrasi_table', 21),
(44, '2023_07_29_224058_create_total_kriteria_aspek_mesin_table', 21),
(45, '2023_07_29_224114_create_total_kriteria_aspek_navigasi_table', 21),
(46, '2023_07_29_231951_create_rengking_table', 22);

-- --------------------------------------------------------

--
-- Table structure for table `navigasi`
--

CREATE TABLE `navigasi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kapal_id` bigint(20) UNSIGNED NOT NULL,
  `perlengkapanNavigasi` int(11) NOT NULL,
  `perangkatRadio` int(11) NOT NULL,
  `izinKomunikasiRadio` int(11) NOT NULL,
  `dayaApungPenolong` int(11) NOT NULL,
  `labelKapal` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `navigasi`
--

INSERT INTO `navigasi` (`id`, `kapal_id`, `perlengkapanNavigasi`, `perangkatRadio`, `izinKomunikasiRadio`, `dayaApungPenolong`, `labelKapal`, `created_at`, `updated_at`) VALUES
(1, 1, 3, 3, 1, 3, 3, '2023-08-04 09:01:45', '2023-08-04 09:01:45'),
(2, 2, 4, 3, 3, 4, 3, '2023-08-04 09:06:27', '2023-08-04 09:06:27');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pimpinan`
--

CREATE TABLE `pimpinan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pimpinan`
--

INSERT INTO `pimpinan` (`id`, `role_id`, `nama`, `username`, `password`, `created_at`, `updated_at`) VALUES
(1, 2, 'Pimpinan', 'pimpinan', '$2y$10$Fmvh5uqpy7EzI.OVL1pUCeQKME4AjJYcvOLh/a0ZgHr7DcepgTPk6', NULL, '2023-07-31 10:55:39'),
(4, 2, 'Sultan', 'sultan', '$2y$10$sANieiiQvhLckAbM3m5fb.XtLl2E851C3FRric2/0F6r1mYY3AbZK', '2023-07-31 10:59:54', '2023-07-31 11:01:31'),
(5, 2, 'Andre', 'andre', '$2y$10$KD0Bhy35Z.s6SsTj5EImFuyBk4YFp5kgeOSo1yPx4ZBeJiLYCU7oG', '2023-08-01 14:00:48', '2023-08-01 14:00:48');

-- --------------------------------------------------------

--
-- Table structure for table `rengking`
--

CREATE TABLE `rengking` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kapal_id` bigint(20) UNSIGNED NOT NULL,
  `niaa` varchar(255) NOT NULL,
  `niam` varchar(255) NOT NULL,
  `nianp` varchar(255) NOT NULL,
  `hasilAkhir` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rengking`
--

INSERT INTO `rengking` (`id`, `kapal_id`, `niaa`, `niam`, `nianp`, `hasilAkhir`, `created_at`, `updated_at`) VALUES
(1, 1, '2.80', '3.10', '3.10', '2.980', '2023-08-04 09:01:45', '2023-08-04 09:01:45'),
(2, 2, '3.80', '3.90', '3.60', '3.770', '2023-08-04 09:06:27', '2023-08-04 09:06:27');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `nama`, `created_at`, `updated_at`) VALUES
(1, 'Admin', NULL, NULL),
(2, 'Pimpinan', NULL, NULL),
(3, 'Kariawan', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `target_administrasi`
--

CREATE TABLE `target_administrasi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `laporanKedatangan` int(11) NOT NULL,
  `daftarAwak` int(11) NOT NULL,
  `suratPernyataan` int(11) NOT NULL,
  `bukuKesehatan` int(11) NOT NULL,
  `menifesPenumpang` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `target_administrasi`
--

INSERT INTO `target_administrasi` (`id`, `laporanKedatangan`, `daftarAwak`, `suratPernyataan`, `bukuKesehatan`, `menifesPenumpang`, `created_at`, `updated_at`) VALUES
(1, 4, 4, 4, 3, 3, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `target_mesin`
--

CREATE TABLE `target_mesin` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `mesinUtama` int(11) NOT NULL,
  `mesinBantu` int(11) NOT NULL,
  `teganganListrik` int(11) NOT NULL,
  `bahanBakar` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `target_mesin`
--

INSERT INTO `target_mesin` (`id`, `mesinUtama`, `mesinBantu`, `teganganListrik`, `bahanBakar`, `created_at`, `updated_at`) VALUES
(1, 4, 3, 3, 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `target_navigasi`
--

CREATE TABLE `target_navigasi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `perlengkapanNavigasi` int(11) NOT NULL,
  `perangkatRadio` int(11) NOT NULL,
  `izinKomunikasiRadio` int(11) NOT NULL,
  `dayaApungPenolong` int(11) NOT NULL,
  `labelKapal` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `target_navigasi`
--

INSERT INTO `target_navigasi` (`id`, `perlengkapanNavigasi`, `perangkatRadio`, `izinKomunikasiRadio`, `dayaApungPenolong`, `labelKapal`, `created_at`, `updated_at`) VALUES
(1, 4, 4, 3, 3, 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `total_kriteria_aspek_administrasi`
--

CREATE TABLE `total_kriteria_aspek_administrasi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kapal_id` bigint(20) UNSIGNED NOT NULL,
  `cf` varchar(255) NOT NULL,
  `sf` varchar(255) NOT NULL,
  `niaa` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `total_kriteria_aspek_administrasi`
--

INSERT INTO `total_kriteria_aspek_administrasi` (`id`, `kapal_id`, `cf`, `sf`, `niaa`, `created_at`, `updated_at`) VALUES
(1, 1, '2.67', '3.00', '2.80', '2023-08-04 09:01:45', '2023-08-04 09:01:45'),
(2, 2, '3.67', '4.00', '3.80', '2023-08-04 09:06:27', '2023-08-04 09:06:27');

-- --------------------------------------------------------

--
-- Table structure for table `total_kriteria_aspek_mesin`
--

CREATE TABLE `total_kriteria_aspek_mesin` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kapal_id` bigint(20) UNSIGNED NOT NULL,
  `cf` varchar(255) NOT NULL,
  `sf` varchar(255) NOT NULL,
  `niam` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `total_kriteria_aspek_mesin`
--

INSERT INTO `total_kriteria_aspek_mesin` (`id`, `kapal_id`, `cf`, `sf`, `niam`, `created_at`, `updated_at`) VALUES
(1, 1, '3.00', '3.25', '3.10', '2023-08-04 09:01:45', '2023-08-04 09:01:45'),
(2, 2, '4.00', '3.75', '3.90', '2023-08-04 09:06:27', '2023-08-04 09:06:27');

-- --------------------------------------------------------

--
-- Table structure for table `total_kriteria_aspek_navigasi`
--

CREATE TABLE `total_kriteria_aspek_navigasi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kapal_id` bigint(20) UNSIGNED NOT NULL,
  `cf` varchar(255) NOT NULL,
  `sf` varchar(255) NOT NULL,
  `nianp` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `total_kriteria_aspek_navigasi`
--

INSERT INTO `total_kriteria_aspek_navigasi` (`id`, `kapal_id`, `cf`, `sf`, `nianp`, `created_at`, `updated_at`) VALUES
(1, 1, '2.67', '3.75', '3.10', '2023-08-04 09:01:45', '2023-08-04 09:01:45'),
(2, 2, '3.67', '3.50', '3.60', '2023-08-04 09:06:27', '2023-08-04 09:06:27');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD KEY `admin_role_id_foreign` (`role_id`);

--
-- Indexes for table `administrasi`
--
ALTER TABLE `administrasi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `administrasi_kapal_id_foreign` (`kapal_id`);

--
-- Indexes for table `bobot_administrasi`
--
ALTER TABLE `bobot_administrasi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bobot_administrasi_kapal_id_foreign` (`kapal_id`);

--
-- Indexes for table `bobot_mesin`
--
ALTER TABLE `bobot_mesin`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bobot_mesin_kapal_id_foreign` (`kapal_id`);

--
-- Indexes for table `bobot_navigasi`
--
ALTER TABLE `bobot_navigasi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bobot_navigasi_kapal_id_foreign` (`kapal_id`);

--
-- Indexes for table `bobot_nilai_gab`
--
ALTER TABLE `bobot_nilai_gab`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `gap_administrasi`
--
ALTER TABLE `gap_administrasi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `gap_administrasi_kapal_id_foreign` (`kapal_id`);

--
-- Indexes for table `gap_mesin`
--
ALTER TABLE `gap_mesin`
  ADD PRIMARY KEY (`id`),
  ADD KEY `gap_mesin_kapal_id_foreign` (`kapal_id`);

--
-- Indexes for table `gap_navigasi`
--
ALTER TABLE `gap_navigasi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `gap_navigasi_kapal_id_foreign` (`kapal_id`);

--
-- Indexes for table `hasil_peringkat`
--
ALTER TABLE `hasil_peringkat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kapal`
--
ALTER TABLE `kapal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kariawan`
--
ALTER TABLE `kariawan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kariawan_role_id_foreign` (`role_id`);

--
-- Indexes for table `kriteria_aspek_administrasi`
--
ALTER TABLE `kriteria_aspek_administrasi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kriteria_aspek_administrasi_kapal_id_foreign` (`kapal_id`);

--
-- Indexes for table `kriteria_aspek_mesin`
--
ALTER TABLE `kriteria_aspek_mesin`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kriteria_aspek_mesin_kapal_id_foreign` (`kapal_id`);

--
-- Indexes for table `kriteria_aspek_navigasi`
--
ALTER TABLE `kriteria_aspek_navigasi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kriteria_aspek_navigasi_kapal_id_foreign` (`kapal_id`);

--
-- Indexes for table `mesin`
--
ALTER TABLE `mesin`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mesin_kapal_id_foreign` (`kapal_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `navigasi`
--
ALTER TABLE `navigasi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `navigasi_kapal_id_foreign` (`kapal_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `pimpinan`
--
ALTER TABLE `pimpinan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pimpinan_role_id_foreign` (`role_id`);

--
-- Indexes for table `rengking`
--
ALTER TABLE `rengking`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rengking_kapal_id_foreign` (`kapal_id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `target_administrasi`
--
ALTER TABLE `target_administrasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `target_mesin`
--
ALTER TABLE `target_mesin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `target_navigasi`
--
ALTER TABLE `target_navigasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `total_kriteria_aspek_administrasi`
--
ALTER TABLE `total_kriteria_aspek_administrasi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `total_kriteria_aspek_administrasi_kapal_id_foreign` (`kapal_id`);

--
-- Indexes for table `total_kriteria_aspek_mesin`
--
ALTER TABLE `total_kriteria_aspek_mesin`
  ADD PRIMARY KEY (`id`),
  ADD KEY `total_kriteria_aspek_mesin_kapal_id_foreign` (`kapal_id`);

--
-- Indexes for table `total_kriteria_aspek_navigasi`
--
ALTER TABLE `total_kriteria_aspek_navigasi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `total_kriteria_aspek_navigasi_kapal_id_foreign` (`kapal_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `administrasi`
--
ALTER TABLE `administrasi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `bobot_administrasi`
--
ALTER TABLE `bobot_administrasi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `bobot_mesin`
--
ALTER TABLE `bobot_mesin`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `bobot_navigasi`
--
ALTER TABLE `bobot_navigasi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `bobot_nilai_gab`
--
ALTER TABLE `bobot_nilai_gab`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gap_administrasi`
--
ALTER TABLE `gap_administrasi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `gap_mesin`
--
ALTER TABLE `gap_mesin`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `gap_navigasi`
--
ALTER TABLE `gap_navigasi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `hasil_peringkat`
--
ALTER TABLE `hasil_peringkat`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kapal`
--
ALTER TABLE `kapal`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `kariawan`
--
ALTER TABLE `kariawan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `kriteria_aspek_administrasi`
--
ALTER TABLE `kriteria_aspek_administrasi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `kriteria_aspek_mesin`
--
ALTER TABLE `kriteria_aspek_mesin`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `kriteria_aspek_navigasi`
--
ALTER TABLE `kriteria_aspek_navigasi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `mesin`
--
ALTER TABLE `mesin`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `navigasi`
--
ALTER TABLE `navigasi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pimpinan`
--
ALTER TABLE `pimpinan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `rengking`
--
ALTER TABLE `rengking`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `target_administrasi`
--
ALTER TABLE `target_administrasi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `target_mesin`
--
ALTER TABLE `target_mesin`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `target_navigasi`
--
ALTER TABLE `target_navigasi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `total_kriteria_aspek_administrasi`
--
ALTER TABLE `total_kriteria_aspek_administrasi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `total_kriteria_aspek_mesin`
--
ALTER TABLE `total_kriteria_aspek_mesin`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `total_kriteria_aspek_navigasi`
--
ALTER TABLE `total_kriteria_aspek_navigasi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `admin_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`);

--
-- Constraints for table `administrasi`
--
ALTER TABLE `administrasi`
  ADD CONSTRAINT `administrasi_kapal_id_foreign` FOREIGN KEY (`kapal_id`) REFERENCES `kapal` (`id`);

--
-- Constraints for table `bobot_administrasi`
--
ALTER TABLE `bobot_administrasi`
  ADD CONSTRAINT `bobot_administrasi_kapal_id_foreign` FOREIGN KEY (`kapal_id`) REFERENCES `kapal` (`id`);

--
-- Constraints for table `bobot_mesin`
--
ALTER TABLE `bobot_mesin`
  ADD CONSTRAINT `bobot_mesin_kapal_id_foreign` FOREIGN KEY (`kapal_id`) REFERENCES `kapal` (`id`);

--
-- Constraints for table `bobot_navigasi`
--
ALTER TABLE `bobot_navigasi`
  ADD CONSTRAINT `bobot_navigasi_kapal_id_foreign` FOREIGN KEY (`kapal_id`) REFERENCES `kapal` (`id`);

--
-- Constraints for table `gap_administrasi`
--
ALTER TABLE `gap_administrasi`
  ADD CONSTRAINT `gap_administrasi_kapal_id_foreign` FOREIGN KEY (`kapal_id`) REFERENCES `kapal` (`id`);

--
-- Constraints for table `gap_mesin`
--
ALTER TABLE `gap_mesin`
  ADD CONSTRAINT `gap_mesin_kapal_id_foreign` FOREIGN KEY (`kapal_id`) REFERENCES `kapal` (`id`);

--
-- Constraints for table `gap_navigasi`
--
ALTER TABLE `gap_navigasi`
  ADD CONSTRAINT `gap_navigasi_kapal_id_foreign` FOREIGN KEY (`kapal_id`) REFERENCES `kapal` (`id`);

--
-- Constraints for table `kariawan`
--
ALTER TABLE `kariawan`
  ADD CONSTRAINT `kariawan_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`);

--
-- Constraints for table `kriteria_aspek_administrasi`
--
ALTER TABLE `kriteria_aspek_administrasi`
  ADD CONSTRAINT `kriteria_aspek_administrasi_kapal_id_foreign` FOREIGN KEY (`kapal_id`) REFERENCES `kapal` (`id`);

--
-- Constraints for table `kriteria_aspek_mesin`
--
ALTER TABLE `kriteria_aspek_mesin`
  ADD CONSTRAINT `kriteria_aspek_mesin_kapal_id_foreign` FOREIGN KEY (`kapal_id`) REFERENCES `kapal` (`id`);

--
-- Constraints for table `kriteria_aspek_navigasi`
--
ALTER TABLE `kriteria_aspek_navigasi`
  ADD CONSTRAINT `kriteria_aspek_navigasi_kapal_id_foreign` FOREIGN KEY (`kapal_id`) REFERENCES `kapal` (`id`);

--
-- Constraints for table `mesin`
--
ALTER TABLE `mesin`
  ADD CONSTRAINT `mesin_kapal_id_foreign` FOREIGN KEY (`kapal_id`) REFERENCES `kapal` (`id`);

--
-- Constraints for table `navigasi`
--
ALTER TABLE `navigasi`
  ADD CONSTRAINT `navigasi_kapal_id_foreign` FOREIGN KEY (`kapal_id`) REFERENCES `kapal` (`id`);

--
-- Constraints for table `pimpinan`
--
ALTER TABLE `pimpinan`
  ADD CONSTRAINT `pimpinan_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`);

--
-- Constraints for table `rengking`
--
ALTER TABLE `rengking`
  ADD CONSTRAINT `rengking_kapal_id_foreign` FOREIGN KEY (`kapal_id`) REFERENCES `kapal` (`id`);

--
-- Constraints for table `total_kriteria_aspek_administrasi`
--
ALTER TABLE `total_kriteria_aspek_administrasi`
  ADD CONSTRAINT `total_kriteria_aspek_administrasi_kapal_id_foreign` FOREIGN KEY (`kapal_id`) REFERENCES `kapal` (`id`);

--
-- Constraints for table `total_kriteria_aspek_mesin`
--
ALTER TABLE `total_kriteria_aspek_mesin`
  ADD CONSTRAINT `total_kriteria_aspek_mesin_kapal_id_foreign` FOREIGN KEY (`kapal_id`) REFERENCES `kapal` (`id`);

--
-- Constraints for table `total_kriteria_aspek_navigasi`
--
ALTER TABLE `total_kriteria_aspek_navigasi`
  ADD CONSTRAINT `total_kriteria_aspek_navigasi_kapal_id_foreign` FOREIGN KEY (`kapal_id`) REFERENCES `kapal` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
