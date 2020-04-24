-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 16, 2020 at 11:01 AM
-- Server version: 5.7.29-0ubuntu0.18.04.1
-- PHP Version: 7.2.28-3+ubuntu18.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `trans_jateng`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `master_shelter`
--

CREATE TABLE `master_shelter` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_koridor` int(11) NOT NULL,
  `nama` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lokasi` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `longitude` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `latitude` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '0:nonaktif, 1:aktif',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `master_shelter`
--

INSERT INTO `master_shelter` (`id`, `id_koridor`, `nama`, `lokasi`, `longitude`, `latitude`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'SHELTER101', 'Pasar Johar A', '110.42423849334634', '-6.971491325045505', 1, '2020-01-06 01:07:56', '2020-01-06 01:07:56'),
(2, 1, 'SHELTER102', 'BCA PEMUDA', '110.41815921664238', '-6.97595455388004', 1, '2020-01-07 02:04:35', '2020-01-07 02:04:35'),
(3, 1, 'SHELTER103', 'BALAI KOTA PEMUDA', '110.41240339047964', '-6.9815046439873045', 1, '2020-01-10 22:57:33', '2020-01-10 22:57:33'),
(4, 1, 'SHELTER104', 'KATEDRAL', '110.40910676121712', '-6.985923629204256', 1, '2020-01-10 22:58:13', '2020-01-10 22:58:13'),
(5, 1, 'SHELTER105', 'RS KARIADI', '110.40668874979019', '-6.9934778343724595', 1, '2020-01-10 23:00:09', '2020-01-10 23:00:09'),
(6, 1, 'SHELTER106', 'NGALIK A', '110.40761411190033', '-6.99661395838059', 1, '2020-01-10 23:31:18', '2020-01-10 23:31:18'),
(7, 1, 'SHELTER107', 'GAJAH MUNGKUR B', '110.40890157222748', '-7.0044115811597', 1, '2020-01-12 18:57:21', '2020-01-12 18:57:21'),
(8, 1, 'SHELTER108', 'SHELTER POIN ELISABETH', '110.4169388115406', '-7.007837808464386', 1, '2020-01-12 18:58:50', '2020-01-12 18:58:50'),
(9, 1, 'SHELTER109', 'KAGOK B', '110.41614353656769', '-7.011777805621665', 1, '2020-01-12 18:59:39', '2020-01-12 18:59:39'),
(10, 1, 'SHELTER110', 'AKPOL B', '110.41867566319326', '-7.016732318831205', 1, '2020-01-12 19:00:46', '2020-01-12 19:00:46'),
(11, 1, 'SHELTER111', 'DON BOSCO A', '110.42007833719254', '-7.022160070912603', 1, '2020-01-12 19:01:36', '2020-01-12 19:01:36'),
(12, 1, 'SHELTER112', 'KESATRIAN I', '110.41845291852951', '-7.02983747396762', 1, '2020-01-12 19:02:32', '2020-01-12 19:02:32'),
(13, 1, 'SHELTER113', 'PASAR JATINGALEH 1', '110.4181444644928', '-7.032094883193109', 1, '2020-01-12 19:03:14', '2020-01-12 19:03:14'),
(14, 1, 'SHELTER114', 'NGESREP B', '110.42155489325523', '-7.044289494877446', 1, '2020-01-12 19:03:56', '2020-01-12 19:03:56'),
(15, 1, 'SHELTER115', 'TEMBALANG B', '110.42039752006531', '-7.047539740018242', 1, '2020-01-12 19:10:10', '2020-01-12 19:10:10'),
(16, 1, 'SHELTER116', 'SRONDOL I', '110.41884183883667', '-7.050089875448798', 1, '2020-01-12 19:11:10', '2020-01-12 19:11:10'),
(17, 1, 'SHELTER117', 'SRONDOL 1', '110.41786551475525', '-7.05130903753256', 1, '2020-01-12 19:46:51', '2020-01-12 19:46:51'),
(18, 1, 'SHELTER118', 'PASAR BANYUMANIK', '110.41408360004425', '-7.060226391848036', 1, '2020-01-12 19:48:16', '2020-01-12 19:48:16'),
(19, 1, 'SHELTER119', 'MAKODAM I', '110.41265666484833', '-7.063764005099858', 1, '2020-01-12 19:49:20', '2020-01-12 19:49:20'),
(20, 1, 'SHELTER120', 'SD PUDAK PAYUNG I', '110.41226372122765', '-7.065511506851545', 1, '2020-01-12 19:50:51', '2020-01-12 19:50:51');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2016_06_01_000001_create_oauth_auth_codes_table', 1),
(4, '2016_06_01_000002_create_oauth_access_tokens_table', 1),
(5, '2016_06_01_000003_create_oauth_refresh_tokens_table', 1),
(6, '2016_06_01_000004_create_oauth_clients_table', 1),
(7, '2016_06_01_000005_create_oauth_personal_access_clients_table', 1),
(8, '2019_08_19_000000_create_failed_jobs_table', 1),
(9, '2019_12_09_060917_create_user_profiles_table', 1),
(10, '2019_12_09_061142_sys_permission', 1),
(11, '2019_12_09_061210_create_sys_menus_table', 1),
(12, '2019_12_09_061225_create_sys_menu_groups_table', 1),
(13, '2019_12_09_061253_create_ms_koridors_table', 1),
(14, '2019_12_09_061303_create_ms_buses_table', 1),
(15, '2019_12_09_061335_create_ms_penumpangs_table', 1),
(16, '2019_12_09_061347_create_ms_liburs_table', 1),
(17, '2019_12_09_061407_create_transaksis_table', 1),
(18, '2019_12_09_061418_create_problems_table', 1),
(19, '2019_12_19_084702_create_ms_devices_table', 1),
(20, '2020_01_02_103337_create_sessions_table', 1),
(21, '2020_01_06_142421_create_master_shelters_table', 1),
(22, '2020_01_08_143049_create_ms_pembayarans_table', 1),
(23, '2020_01_08_153754_create_ms_penumpang_bayars_table', 1),
(24, '2020_01_15_145550_create_muatan_buses_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ms_bus`
--

CREATE TABLE `ms_bus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_koridor` int(11) NOT NULL,
  `nama` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `merk` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_pol` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `longitude` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `latitude` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '0:nonaktif, 1:aktif',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ms_bus`
--

INSERT INTO `ms_bus` (`id`, `id_koridor`, `nama`, `merk`, `no_pol`, `longitude`, `latitude`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'Bus 01 - Koridor 1', '101', 'H 1111 AA', NULL, NULL, 1, '2019-12-12 18:04:48', '2019-12-12 18:04:48'),
(2, 1, 'BUS102', 'BUS', 'H 8892 GG', NULL, NULL, 1, '2020-01-05 20:34:00', '2020-01-05 20:34:00'),
(3, 2, 'BUS101', 'MERCEDES BENZ', 'H 4272 AA', NULL, NULL, 1, '2020-01-07 02:25:18', '2020-01-07 02:25:18');

-- --------------------------------------------------------

--
-- Table structure for table `ms_devices`
--

CREATE TABLE `ms_devices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `imei` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode` varchar(5) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1:aktif, 0:nonaktif',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ms_devices`
--

INSERT INTO `ms_devices` (`id`, `nama`, `imei`, `kode`, `status`, `created_at`, `updated_at`) VALUES
(1, 'DEVICE I', '1', 'D0001', 1, '2020-02-06 08:21:25', '2020-02-06 08:21:25'),
(2, 'DEVICE II', '868029030517106', 'D0002', 1, '2020-02-06 08:21:25', '2020-02-06 08:21:25');

-- --------------------------------------------------------

--
-- Table structure for table `ms_koridor`
--

CREATE TABLE `ms_koridor` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `koridor` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rute` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `trip_a` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `trip_b` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `longitude_a` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `latitude_a` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `longitude_b` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `latitude_b` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '0:nonaktif, 1:aktif',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ms_koridor`
--

INSERT INTO `ms_koridor` (`id`, `koridor`, `rute`, `trip_a`, `trip_b`, `longitude_a`, `latitude_a`, `longitude_b`, `latitude_b`, `status`, `created_at`, `updated_at`) VALUES
(1, 'KORIDOR I', 'Tawang-Bawen', 'Tawang', 'Bawen', '110.42908199313702', '-6.96491656547724', '110.43380163063567', '-7.245483124736961', 1, '2019-12-12 15:02:16', '2019-12-12 15:02:16');

-- --------------------------------------------------------

--
-- Table structure for table `ms_libur`
--

CREATE TABLE `ms_libur` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tanggal` date NOT NULL,
  `id_penumpang` int(11) NOT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ms_pembayaran`
--

CREATE TABLE `ms_pembayaran` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci,
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '0:nonaktif, 1:aktif',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ms_pembayaran`
--

INSERT INTO `ms_pembayaran` (`id`, `nama`, `keterangan`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Regular', 'Cash', 1, '2020-01-08 01:15:43', '2020-01-08 01:15:43'),
(2, 'Ovo', 'Dompet Digital', 1, '2020-01-08 01:28:42', '2020-01-08 01:28:42'),
(3, 'Gopay', 'Dompet Digital', 1, '2020-01-08 01:29:02', '2020-01-08 01:29:02'),
(5, 'Tiket Manual', 'Jika android device error', 1, '2020-01-10 00:29:30', '2020-01-10 00:29:30');

-- --------------------------------------------------------

--
-- Table structure for table `ms_penumpang`
--

CREATE TABLE `ms_penumpang` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `jenis` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` decimal(6,2) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '0:nonaktif, 1:aktif',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ms_penumpang`
--

INSERT INTO `ms_penumpang` (`id`, `jenis`, `harga`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Umum', '4000.00', 1, '2020-02-06 08:21:25', '2020-02-06 08:21:25'),
(2, 'Veteran', '2000.00', 1, '2020-02-06 08:21:25', '2020-02-06 08:21:25'),
(3, 'Pelajar', '2000.00', 1, '2020-02-06 08:21:25', '2020-02-06 08:21:25'),
(4, 'Buruh', '4000.00', 1, '2020-02-06 08:21:25', '2020-02-06 08:21:25'),
(99, 'Transit', '0.00', 1, '2020-02-06 08:21:25', '2020-02-06 08:21:25');

-- --------------------------------------------------------

--
-- Table structure for table `ms_penumpang_bayar`
--

CREATE TABLE `ms_penumpang_bayar` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_penumpang` int(11) NOT NULL,
  `id_pembayaran` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ms_penumpang_bayar`
--

INSERT INTO `ms_penumpang_bayar` (`id`, `id_penumpang`, `id_pembayaran`, `created_at`, `updated_at`) VALUES
(7, 3, 1, '2020-01-08 02:23:19', '2020-01-08 02:23:19'),
(8, 3, 3, '2020-01-08 02:23:19', '2020-01-08 02:23:19'),
(9, 4, 1, '2020-01-08 02:23:32', '2020-01-08 02:23:32'),
(10, 4, 3, '2020-01-08 02:23:32', '2020-01-08 02:23:32'),
(16, 2, 1, '2020-01-08 02:30:52', '2020-01-08 02:30:52'),
(17, 2, 3, '2020-01-08 02:30:52', '2020-01-08 02:30:52'),
(22, 99, 1, '2020-01-13 02:17:01', '2020-01-13 02:17:01'),
(26, 1, 1, '2020-02-21 06:58:14', '2020-02-21 06:58:14'),
(27, 1, 3, '2020-02-21 06:58:14', '2020-02-21 06:58:14');

-- --------------------------------------------------------

--
-- Table structure for table `ms_tiket`
--

CREATE TABLE `ms_tiket` (
  `id` int(11) NOT NULL,
  `kode` varchar(10) DEFAULT NULL,
  `tipe` int(11) NOT NULL,
  `awal` int(11) NOT NULL,
  `akhir` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `sisa` int(11) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '0:nonaktif, 1:aktif',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ms_tiket`
--

INSERT INTO `ms_tiket` (`id`, `kode`, `tipe`, `awal`, `akhir`, `qty`, `sisa`, `status`, `created_at`, `updated_at`) VALUES
(1, 'T0001', 1, 101, 250, 150, 130, 1, '2020-02-15 03:27:44', '2020-02-15 03:27:44'),
(2, 'T0002', 4, 1, 100, 100, 74, 1, '2020-02-21 07:56:18', '2020-02-21 07:56:18');

-- --------------------------------------------------------

--
-- Table structure for table `muatan_bus`
--

CREATE TABLE `muatan_bus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `idPenumpang` int(2) NOT NULL DEFAULT '0',
  `id_koridor` tinyint(4) NOT NULL,
  `id_shelter` tinyint(4) NOT NULL,
  `id_bus` tinyint(4) NOT NULL,
  `username` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shift` tinyint(4) NOT NULL,
  `tanggal` date NOT NULL,
  `tipe` tinyint(4) NOT NULL COMMENT '1:tiket manual, 2:e-ticketing',
  `arah` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1:naik, 2:turun',
  `total` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `muatan_bus`
--

INSERT INTO `muatan_bus` (`id`, `idPenumpang`, `id_koridor`, `id_shelter`, `id_bus`, `username`, `shift`, `tanggal`, `tipe`, `arah`, `total`, `created_at`, `updated_at`) VALUES
(45, 2, 1, 1, 1, 'agg', 1, '2020-02-21', 2, 1, 1, '2020-02-21 02:09:18', '2020-02-21 02:09:18'),
(46, 3, 1, 2, 1, 'agg', 1, '2020-02-21', 2, 1, 1, '2020-02-21 02:09:18', '2020-02-21 02:09:18'),
(47, 99, 1, 2, 1, 'agg', 1, '2020-02-21', 2, 1, 1, '2020-02-21 02:09:18', '2020-02-21 02:09:18'),
(48, 88, 1, 1, 1, 'agg', 1, '2020-02-21', 2, 2, 1, '2020-02-21 02:21:08', '2020-02-21 02:21:08'),
(49, 88, 1, 2, 1, 'agg', 1, '2020-02-21', 2, 2, 1, '2020-02-21 02:21:29', '2020-02-21 02:21:29'),
(50, 4, 1, 3, 1, 'agg', 1, '2020-02-21', 2, 1, 1, '2020-02-21 03:40:57', '2020-02-21 03:40:57'),
(51, 2, 1, 4, 1, 'agg', 1, '2020-02-21', 2, 1, 1, '2020-02-21 03:40:57', '2020-02-21 03:40:57'),
(52, 88, 1, 3, 1, 'agg', 1, '2020-02-21', 2, 2, 1, '2020-02-21 03:43:19', '2020-02-21 03:43:19'),
(53, 88, 1, 4, 1, 'agg', 1, '2020-02-21', 2, 2, 1, '2020-02-21 03:43:19', '2020-02-21 03:43:19'),
(54, 2, 1, 5, 1, 'agg', 1, '2020-02-21', 2, 1, 1, '2020-02-21 03:48:09', '2020-02-21 03:48:09'),
(55, 88, 1, 5, 1, 'agg', 1, '2020-02-21', 2, 2, 1, '2020-02-21 03:53:17', '2020-02-21 03:53:17'),
(56, 2, 1, 5, 1, 'agg', 1, '2020-02-21', 2, 1, 1, '2020-02-21 06:51:14', '2020-02-21 06:51:14'),
(57, 2, 1, 1, 1, 'dev', 1, '2020-02-21', 2, 1, 1, '2020-02-21 06:51:14', '2020-02-21 06:51:14'),
(58, 99, 1, 1, 1, 'dev', 1, '2020-02-21', 2, 1, 1, '2020-02-21 06:51:14', '2020-02-21 06:51:14'),
(59, 2, 1, 1, 1, 'dev', 1, '2020-02-21', 2, 1, 1, '2020-02-21 06:54:46', '2020-02-21 06:54:46'),
(60, 2, 1, 4, 1, 'dev', 1, '2020-02-21', 2, 1, 1, '2020-02-21 06:54:46', '2020-02-21 06:54:46'),
(61, 4, 1, 4, 1, 'dev', 1, '2020-02-21', 2, 1, 1, '2020-02-21 06:54:46', '2020-02-21 06:54:46'),
(62, 3, 1, 6, 1, 'dev', 1, '2020-02-21', 2, 1, 1, '2020-02-21 06:54:46', '2020-02-21 06:54:46'),
(63, 4, 1, 8, 1, 'dev', 1, '2020-02-21', 2, 1, 1, '2020-02-21 06:54:46', '2020-02-21 06:54:46'),
(64, 88, 1, 8, 1, 'dev', 1, '2020-02-21', 2, 2, 3, '2020-02-21 07:01:17', '2020-02-21 07:01:17'),
(65, 88, 1, 9, 1, 'dev', 1, '2020-02-21', 2, 2, 5, '2020-02-21 07:01:17', '2020-02-21 07:01:17');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `problems`
--

CREATE TABLE `problems` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_koridor` int(11) NOT NULL,
  `id_bus` int(11) NOT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `longitude` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `latitude` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `trip` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shift` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0' COMMENT '0:belum dilihat, 1:sudah dilihat',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `problems`
--

INSERT INTO `problems` (`id`, `id_koridor`, `id_bus`, `keterangan`, `username`, `longitude`, `latitude`, `trip`, `shift`, `status`, `created_at`, `updated_at`) VALUES
(9, 1, 1, 'Ganguan Teknis Kendaraan', 'agg', '110.3888434', '-6.9904052', 'AB', 1, 0, '2020-02-21 02:21:51', '2020-02-21 02:21:51'),
(10, 1, 1, 'Ada Kecelakaan', 'agg', '110.3888451', '-6.9903959', 'AB', 1, 0, '2020-02-21 03:54:37', '2020-02-21 03:54:37'),
(11, 1, 1, 'Ganguan Teknis Kendaraan', 'dev', '110.3686753', '-6.9873282', 'AB', 1, 1, '2020-02-21 07:04:41', '2020-02-21 07:04:41'),
(12, 1, 1, 'Ganguan Kendaraan', 'dev', '110.3686753', '-6.9873282', 'AB', 1, 1, '2020-02-21 07:04:44', '2020-02-21 07:04:44');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sys_menus`
--

CREATE TABLE `sys_menus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_group` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `segment_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ord` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sys_menus`
--

INSERT INTO `sys_menus` (`id`, `id_group`, `name`, `segment_name`, `url`, `ord`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'Company Info', 'company-info', 'dashboard/system/company-info', 1, 0, '2020-02-06 08:21:25', '2020-02-06 08:21:25'),
(2, 1, 'Menu Group', 'menu-group', 'dashboard/system/menu-group', 2, 0, '2020-02-06 08:21:25', '2020-02-06 08:21:25'),
(3, 1, 'Menu', 'menu', 'dashboard/system/menu', 3, 0, '2020-02-06 08:21:25', '2020-02-06 08:21:25'),
(4, 2, 'User Management', 'user-management', 'dashboard/master/user-management', 1, 0, '2020-02-06 08:21:25', '2020-02-06 08:21:25'),
(5, 2, 'Koridor', 'koridor', 'dashboard/master/koridor', 2, 0, '2020-02-06 08:21:25', '2020-02-06 08:21:25'),
(6, 2, 'Shelter', 'shelter', 'dashboard/master/shelter', 3, 0, '2020-02-06 08:21:25', '2020-02-06 08:21:25'),
(7, 2, 'Bus', 'bus', 'dashboard/master/bus', 4, 0, '2020-02-06 08:21:25', '2020-02-06 08:21:25'),
(8, 2, 'Penumpang', 'penumpang', 'dashboard/master/penumpang', 5, 0, '2020-02-06 08:21:25', '2020-02-06 08:21:25'),
(9, 2, 'Hari Libur', 'hari-libur', 'dashboard/master/hari-libur', 6, 0, '2020-02-06 08:21:25', '2020-02-06 08:21:25'),
(10, 2, 'Device', 'device', 'dashboard/master/device', 7, 0, '2020-02-06 08:21:25', '2020-02-06 08:21:25'),
(11, 3, 'Tiket Offline', 'tiket-offline', 'dashboard/penjualan/tiket-offline', 1, 0, '2020-02-06 08:21:25', '2020-02-06 08:21:25'),
(12, 4, 'Transaksi Petugas', 'transaksi-petugas', 'dashboard/laporan/transaksi-petugas', 2, 0, '2020-02-06 08:21:25', '2020-02-06 08:21:25'),
(13, 0, 'Top Transaksi Petugas', 'top-transaksi-petugas', 'dashboard/laporan/top-transaksi-petugas', 3, 0, '2020-02-06 08:21:25', '2020-02-06 08:21:25'),
(14, 4, 'Transaksi per Jenis', 'transaksi-per-jenis', 'dashboard/laporan/transaksi-per-jenis', 4, 0, '2020-02-06 08:21:25', '2020-02-06 08:21:25'),
(15, 4, 'Transaksi per Bus/Shelter', 'transaksi-bus-shelter', 'dashboard/laporan/transaksi-bus-shelter', 5, 0, '2020-02-06 08:21:25', '2020-02-06 08:21:25'),
(16, 4, 'Transaksi per Koridor', 'transaksi-per-koridor', 'dashboard/laporan/transaksi-per-koridor', 6, 0, '2020-02-06 08:21:25', '2020-02-06 08:21:25'),
(17, 5, 'Bus Report', 'bus-report', 'dashboard/problem/bus-report', 1, 0, '2020-02-06 08:21:25', '2020-02-06 08:21:25'),
(18, 4, 'Monitoring Penumpang', 'monitoring-penumpang', 'dashboard/laporan/monitoring-penumpang', 1, 0, '2020-02-13 04:47:20', '2020-02-13 04:47:20'),
(19, 2, 'Tiket', 'tiket', 'dashboard/master/tiket', 8, 0, '2020-02-14 06:59:40', '2020-02-14 06:59:40');

-- --------------------------------------------------------

--
-- Table structure for table `sys_menu_groups`
--

CREATE TABLE `sys_menu_groups` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `segment_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ord` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sys_menu_groups`
--

INSERT INTO `sys_menu_groups` (`id`, `name`, `segment_name`, `icon`, `ord`, `status`, `created_at`, `updated_at`) VALUES
(1, 'System Utility', 'system', 'fas fa-cogs', 1, 0, NULL, NULL),
(2, 'Master Data', 'master', 'fas fa-database', 2, 0, NULL, NULL),
(3, 'Penjualan', 'penjualan', 'fas fa-bus-alt', 3, 0, NULL, NULL),
(4, 'Laporan', 'laporan', 'fas fa-chart-line', 4, 0, NULL, NULL),
(5, 'Problem', 'problem', 'fas fa-exclamation-triangle', 5, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sys_permission`
--

CREATE TABLE `sys_permission` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_menu` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sys_permission`
--

INSERT INTO `sys_permission` (`id`, `username`, `id_menu`, `created_at`, `updated_at`) VALUES
(1, 'agg', 1, '2020-02-13 02:52:14', '2020-02-13 02:52:14'),
(2, 'agg', 2, '2020-02-13 02:52:14', '2020-02-13 02:52:14'),
(3, 'agg', 3, '2020-02-13 02:52:14', '2020-02-13 02:52:14'),
(4, 'agg', 4, '2020-02-13 02:52:14', '2020-02-13 02:52:14'),
(5, 'agg', 5, '2020-02-13 02:52:14', '2020-02-13 02:52:14'),
(6, 'agg', 6, '2020-02-13 02:52:14', '2020-02-13 02:52:14'),
(7, 'agg', 7, '2020-02-13 02:52:14', '2020-02-13 02:52:14'),
(8, 'agg', 8, '2020-02-13 02:52:14', '2020-02-13 02:52:14'),
(9, 'agg', 9, '2020-02-13 02:52:14', '2020-02-13 02:52:14'),
(10, 'agg', 10, '2020-02-13 02:52:14', '2020-02-13 02:52:14'),
(11, 'agg', 11, '2020-02-13 02:52:14', '2020-02-13 02:52:14'),
(12, 'agg', 12, '2020-02-13 02:52:14', '2020-02-13 02:52:14'),
(13, 'agg', 13, '2020-02-13 02:52:14', '2020-02-13 02:52:14'),
(14, 'agg', 14, '2020-02-13 02:52:14', '2020-02-13 02:52:14'),
(15, 'agg', 15, '2020-02-13 02:52:14', '2020-02-13 02:52:14'),
(16, 'agg', 16, '2020-02-13 02:52:14', '2020-02-13 02:52:14'),
(17, 'agg', 17, '2020-02-13 02:52:14', '2020-02-13 02:52:14');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `no_transaksi` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_transaksi` date NOT NULL,
  `jam_transaksi` time NOT NULL,
  `id_penumpang` int(11) NOT NULL,
  `id_koridor` int(11) NOT NULL,
  `id_bus` int(11) NOT NULL,
  `id_shelter` int(11) NOT NULL,
  `trip_a` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `trip_b` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shift` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `opsi_bayar` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` decimal(6,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id`, `no_transaksi`, `tgl_transaksi`, `jam_transaksi`, `id_penumpang`, `id_koridor`, `id_bus`, `id_shelter`, `trip_a`, `trip_b`, `shift`, `username`, `opsi_bayar`, `harga`, `created_at`, `updated_at`) VALUES
(121, '200221-01-002-0000', '2020-02-21', '09:07:33', 2, 1, 1, 1, 'Tawang ', ' Bawen', 1, 'agg', '1', '2000.00', '2020-02-21 02:09:18', '2020-02-21 02:09:18'),
(122, '200221-01-002-0001', '2020-02-21', '09:07:44', 3, 1, 1, 2, 'Tawang ', ' Bawen', 1, 'agg', '1', '2000.00', '2020-02-21 02:09:18', '2020-02-21 02:09:18'),
(123, '200221-01-002-0000', '2020-02-21', '09:08:00', 99, 1, 1, 2, 'Tawang ', ' Bawen', 1, 'agg', '1', '0.00', '2020-02-21 02:09:18', '2020-02-21 02:09:18'),
(256, '200221-01-002-0001', '2020-02-21', '10:40:41', 2, 1, 1, 4, 'Tawang ', ' Bawen', 1, 'agg', '1', '2000.00', '2020-02-21 03:40:57', '2020-02-21 03:40:57'),
(297, '200221-01-002-0000', '2020-02-21', '10:48:01', 2, 1, 1, 5, 'Tawang ', ' Bawen', 1, 'agg', '1', '2000.00', '2020-02-21 03:48:09', '2020-02-21 03:48:09'),
(298, '101', '2020-02-21', '10:50:27', 4, 1, 1, 0, '', '', 1, 'dev', '0', '4000.00', '2020-02-21 03:50:27', '2020-02-21 03:50:27'),
(299, '102', '2020-02-21', '10:50:27', 4, 1, 1, 0, '', '', 1, 'dev', '0', '4000.00', '2020-02-21 03:50:27', '2020-02-21 03:50:27'),
(300, '103', '2020-02-21', '10:50:27', 4, 1, 1, 0, '', '', 1, 'dev', '0', '4000.00', '2020-02-21 03:50:27', '2020-02-21 03:50:27'),
(301, '104', '2020-02-21', '10:50:27', 4, 1, 1, 0, '', '', 1, 'dev', '0', '4000.00', '2020-02-21 03:50:27', '2020-02-21 03:50:27'),
(302, '105', '2020-02-21', '10:50:27', 4, 1, 1, 0, '', '', 1, 'dev', '0', '4000.00', '2020-02-21 03:50:27', '2020-02-21 03:50:27'),
(303, '106', '2020-02-21', '10:50:27', 4, 1, 1, 0, '', '', 1, 'dev', '0', '4000.00', '2020-02-21 03:50:27', '2020-02-21 03:50:27'),
(304, '107', '2020-02-21', '10:50:27', 4, 1, 1, 0, '', '', 1, 'dev', '0', '4000.00', '2020-02-21 03:50:27', '2020-02-21 03:50:27'),
(305, '108', '2020-02-21', '10:50:27', 4, 1, 1, 0, '', '', 1, 'dev', '0', '4000.00', '2020-02-21 03:50:27', '2020-02-21 03:50:27'),
(306, '109', '2020-02-21', '10:50:27', 4, 1, 1, 0, '', '', 1, 'dev', '0', '4000.00', '2020-02-21 03:50:27', '2020-02-21 03:50:27'),
(307, '110', '2020-02-21', '10:50:27', 4, 1, 1, 0, '', '', 1, 'dev', '0', '4000.00', '2020-02-21 03:50:27', '2020-02-21 03:50:27'),
(308, '111', '2020-02-21', '10:55:22', 4, 1, 1, 0, '', '', 1, 'dev', '0', '4000.00', '2020-02-21 03:55:22', '2020-02-21 03:55:22'),
(309, '112', '2020-02-21', '10:55:22', 4, 1, 1, 0, '', '', 1, 'dev', '0', '4000.00', '2020-02-21 03:55:22', '2020-02-21 03:55:22'),
(310, '113', '2020-02-21', '10:55:22', 4, 1, 1, 0, '', '', 1, 'dev', '0', '4000.00', '2020-02-21 03:55:22', '2020-02-21 03:55:22'),
(311, '114', '2020-02-21', '10:55:22', 4, 1, 1, 0, '', '', 1, 'dev', '0', '4000.00', '2020-02-21 03:55:22', '2020-02-21 03:55:22'),
(312, '115', '2020-02-21', '10:55:22', 4, 1, 1, 0, '', '', 1, 'dev', '0', '4000.00', '2020-02-21 03:55:22', '2020-02-21 03:55:22'),
(313, '116', '2020-02-21', '10:55:22', 4, 1, 1, 0, '', '', 1, 'dev', '0', '4000.00', '2020-02-21 03:55:22', '2020-02-21 03:55:22'),
(314, '117', '2020-02-21', '10:55:22', 4, 1, 1, 0, '', '', 1, 'dev', '0', '4000.00', '2020-02-21 03:55:22', '2020-02-21 03:55:22'),
(315, '118', '2020-02-21', '10:55:22', 4, 1, 1, 0, '', '', 1, 'dev', '0', '4000.00', '2020-02-21 03:55:22', '2020-02-21 03:55:22'),
(316, '119', '2020-02-21', '10:55:22', 4, 1, 1, 0, '', '', 1, 'dev', '0', '4000.00', '2020-02-21 03:55:22', '2020-02-21 03:55:22'),
(317, '120', '2020-02-21', '10:55:22', 4, 1, 1, 0, '', '', 1, 'dev', '0', '4000.00', '2020-02-21 03:55:22', '2020-02-21 03:55:22'),
(318, '200221-01-002-0000', '2020-02-21', '13:20:41', 2, 1, 1, 5, 'Tawang ', ' Bawen', 1, 'agg', '1', '2000.00', '2020-02-21 06:51:14', '2020-02-21 06:51:14'),
(319, '200221-01-001-0001', '2020-02-21', '13:48:36', 2, 1, 1, 1, 'Tawang ', ' Bawen', 1, 'dev', '1', '2000.00', '2020-02-21 06:51:14', '2020-02-21 06:51:14'),
(320, '200221-01-001-0001', '2020-02-21', '13:50:00', 99, 1, 1, 1, 'Tawang ', ' Bawen', 1, 'dev', '1', '0.00', '2020-02-21 06:51:14', '2020-02-21 06:51:14'),
(321, '200221-01-001-0000', '2020-02-21', '13:52:20', 2, 1, 1, 1, 'Tawang ', ' Bawen', 1, 'dev', '1', '2000.00', '2020-02-21 06:54:46', '2020-02-21 06:54:46'),
(322, '200221-01-001-0001', '2020-02-21', '13:53:12', 2, 1, 1, 4, 'Tawang ', ' Bawen', 1, 'dev', '1', '2000.00', '2020-02-21 06:54:46', '2020-02-21 06:54:46'),
(323, '200221-01-001-0002', '2020-02-21', '13:53:40', 4, 1, 1, 4, 'Tawang ', ' Bawen', 1, 'dev', '1', '4000.00', '2020-02-21 06:54:46', '2020-02-21 06:54:46'),
(324, '200221-01-001-0003', '2020-02-21', '13:54:03', 3, 1, 1, 6, 'Tawang ', ' Bawen', 1, 'dev', '1', '2000.00', '2020-02-21 06:54:46', '2020-02-21 06:54:46'),
(325, '200221-01-001-0004', '2020-02-21', '13:54:11', 4, 1, 1, 8, 'Tawang ', ' Bawen', 1, 'dev', '1', '4000.00', '2020-02-21 06:54:46', '2020-02-21 06:54:46'),
(326, '1', '2020-02-21', '14:57:53', 4, 1, 1, 0, '', '', 1, 'agg', '0', '4000.00', '2020-02-21 07:57:53', '2020-02-21 07:57:53'),
(327, '2', '2020-02-21', '14:57:53', 4, 1, 1, 0, '', '', 1, 'agg', '0', '4000.00', '2020-02-21 07:57:53', '2020-02-21 07:57:53'),
(328, '3', '2020-02-21', '14:57:53', 4, 1, 1, 0, '', '', 1, 'agg', '0', '4000.00', '2020-02-21 07:57:53', '2020-02-21 07:57:53'),
(329, '4', '2020-02-21', '14:57:53', 4, 1, 1, 0, '', '', 1, 'agg', '0', '4000.00', '2020-02-21 07:57:53', '2020-02-21 07:57:53'),
(330, '5', '2020-02-21', '14:57:53', 4, 1, 1, 0, '', '', 1, 'agg', '0', '4000.00', '2020-02-21 07:57:53', '2020-02-21 07:57:53'),
(331, '6', '2020-02-21', '14:57:53', 4, 1, 1, 0, '', '', 1, 'agg', '0', '4000.00', '2020-02-21 07:57:53', '2020-02-21 07:57:53'),
(332, '7', '2020-02-21', '14:57:53', 4, 1, 1, 0, '', '', 1, 'agg', '0', '4000.00', '2020-02-21 07:57:53', '2020-02-21 07:57:53'),
(333, '8', '2020-02-21', '14:57:53', 4, 1, 1, 0, '', '', 1, 'agg', '0', '4000.00', '2020-02-21 07:57:53', '2020-02-21 07:57:53'),
(334, '9', '2020-02-21', '14:57:53', 4, 1, 1, 0, '', '', 1, 'agg', '0', '4000.00', '2020-02-21 07:57:53', '2020-02-21 07:57:53'),
(335, '10', '2020-02-21', '14:57:53', 4, 1, 1, 0, '', '', 1, 'agg', '0', '4000.00', '2020-02-21 07:57:53', '2020-02-21 07:57:53'),
(336, '11', '2020-02-21', '14:57:53', 4, 1, 1, 0, '', '', 1, 'agg', '0', '4000.00', '2020-02-21 07:57:53', '2020-02-21 07:57:53'),
(337, '12', '2020-02-21', '14:57:53', 4, 1, 1, 0, '', '', 1, 'agg', '0', '4000.00', '2020-02-21 07:57:53', '2020-02-21 07:57:53'),
(338, '13', '2020-02-21', '14:57:53', 4, 1, 1, 0, '', '', 1, 'agg', '0', '4000.00', '2020-02-21 07:57:53', '2020-02-21 07:57:53'),
(339, '14', '2020-02-21', '14:57:53', 4, 1, 1, 0, '', '', 1, 'agg', '0', '4000.00', '2020-02-21 07:57:53', '2020-02-21 07:57:53'),
(340, '15', '2020-02-21', '14:57:53', 4, 1, 1, 0, '', '', 1, 'agg', '0', '4000.00', '2020-02-21 07:57:53', '2020-02-21 07:57:53'),
(341, '16', '2020-02-21', '14:57:53', 4, 1, 1, 0, '', '', 1, 'agg', '0', '4000.00', '2020-02-21 07:57:53', '2020-02-21 07:57:53'),
(342, '17', '2020-02-21', '14:57:53', 4, 1, 1, 0, '', '', 1, 'agg', '0', '4000.00', '2020-02-21 07:57:53', '2020-02-21 07:57:53'),
(343, '18', '2020-02-21', '14:57:53', 4, 1, 1, 0, '', '', 1, 'agg', '0', '4000.00', '2020-02-21 07:57:53', '2020-02-21 07:57:53'),
(344, '19', '2020-02-21', '14:57:53', 4, 1, 1, 0, '', '', 1, 'agg', '0', '4000.00', '2020-02-21 07:57:53', '2020-02-21 07:57:53'),
(345, '20', '2020-02-21', '14:57:53', 4, 1, 1, 0, '', '', 1, 'agg', '0', '4000.00', '2020-02-21 07:57:53', '2020-02-21 07:57:53'),
(346, '21', '2020-02-21', '14:57:53', 4, 1, 1, 0, '', '', 1, 'agg', '0', '4000.00', '2020-02-21 07:57:53', '2020-02-21 07:57:53'),
(347, '22', '2020-02-21', '14:57:53', 4, 1, 1, 0, '', '', 1, 'agg', '0', '4000.00', '2020-02-21 07:57:53', '2020-02-21 07:57:53'),
(348, '23', '2020-02-21', '14:57:53', 4, 1, 1, 0, '', '', 1, 'agg', '0', '4000.00', '2020-02-21 07:57:53', '2020-02-21 07:57:53'),
(349, '24', '2020-02-21', '14:57:53', 4, 1, 1, 0, '', '', 1, 'agg', '0', '4000.00', '2020-02-21 07:57:53', '2020-02-21 07:57:53'),
(350, '25', '2020-02-21', '14:57:53', 4, 1, 1, 0, '', '', 1, 'agg', '0', '4000.00', '2020-02-21 07:57:53', '2020-02-21 07:57:53'),
(351, '26', '2020-02-21', '14:57:53', 4, 1, 1, 0, '', '', 1, 'agg', '0', '4000.00', '2020-02-21 07:57:53', '2020-02-21 07:57:53');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `system` tinyint(4) NOT NULL COMMENT '0:all, 1:android, 2:web',
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '0:nonaktif, 1:aktif',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `name`, `email`, `email_verified_at`, `password`, `no_hp`, `system`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'dev', 'Developer', 'laurentiuskevin44@gmail.com', NULL, 'eyJpdiI6IkhjYnloSmkyVVJ1OW1GOUlncDNSNkE9PSIsInZhbHVlIjoicXNBUDJUY0s2SVdWQjVET1RpR3VyZz09IiwibWFjIjoiMzMyNGZmMGE1Mjk4Mzk2OTcxYTRkNzhkNzk0Zjg0NDAzMGU2MWQyZWI2NmM3OWVlY2Y5M2NkZTBmMjliYmQ3OSJ9', '081901115314', 0, 1, NULL, '2020-02-06 08:21:25', '2020-02-06 08:21:25'),
(2, 'agg', 'agung', 'craz.devteam@gmail.com', NULL, 'eyJpdiI6Ik5HSTl5WnRYeUtBZEFjZXVGdnhCQ1E9PSIsInZhbHVlIjoiSnpLUUdNWll5SXFkdjZkdnVlRENpUT09IiwibWFjIjoiYzQzYTczNzY2MGJkNTkyMDUzYWRlOWViZGE1YWRhNzkwZjk5ZGNjMWVlNjkwMWJiZjk2YmJmOWY0YTc3YjJhMSJ9', '', 0, 1, NULL, '2020-02-13 02:52:14', '2020-02-13 02:52:14');

-- --------------------------------------------------------

--
-- Table structure for table `user_profile`
--

CREATE TABLE `user_profile` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_sk` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_spk` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `tempat_lahir` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jenis_kelamin` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `jabatan` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `agama` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_ktp` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tingkat_pendidikan` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jurusan` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci,
  `foto` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_shelter`
--
ALTER TABLE `master_shelter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ms_bus`
--
ALTER TABLE `ms_bus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ms_devices`
--
ALTER TABLE `ms_devices`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ms_devices_nama_unique` (`nama`);

--
-- Indexes for table `ms_koridor`
--
ALTER TABLE `ms_koridor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ms_libur`
--
ALTER TABLE `ms_libur`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ms_pembayaran`
--
ALTER TABLE `ms_pembayaran`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ms_pembayaran_nama_unique` (`nama`);

--
-- Indexes for table `ms_penumpang`
--
ALTER TABLE `ms_penumpang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ms_penumpang_bayar`
--
ALTER TABLE `ms_penumpang_bayar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ms_tiket`
--
ALTER TABLE `ms_tiket`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `muatan_bus`
--
ALTER TABLE `muatan_bus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_access_tokens_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_personal_access_clients_client_id_index` (`client_id`);

--
-- Indexes for table `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `problems`
--
ALTER TABLE `problems`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD UNIQUE KEY `sessions_id_unique` (`id`);

--
-- Indexes for table `sys_menus`
--
ALTER TABLE `sys_menus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sys_menu_groups`
--
ALTER TABLE `sys_menu_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sys_permission`
--
ALTER TABLE `sys_permission`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_profile`
--
ALTER TABLE `user_profile`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `master_shelter`
--
ALTER TABLE `master_shelter`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `ms_bus`
--
ALTER TABLE `ms_bus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `ms_devices`
--
ALTER TABLE `ms_devices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `ms_koridor`
--
ALTER TABLE `ms_koridor`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `ms_libur`
--
ALTER TABLE `ms_libur`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ms_pembayaran`
--
ALTER TABLE `ms_pembayaran`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `ms_penumpang`
--
ALTER TABLE `ms_penumpang`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;
--
-- AUTO_INCREMENT for table `ms_penumpang_bayar`
--
ALTER TABLE `ms_penumpang_bayar`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `ms_tiket`
--
ALTER TABLE `ms_tiket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `muatan_bus`
--
ALTER TABLE `muatan_bus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;
--
-- AUTO_INCREMENT for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `problems`
--
ALTER TABLE `problems`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `sys_menus`
--
ALTER TABLE `sys_menus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `sys_menu_groups`
--
ALTER TABLE `sys_menu_groups`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `sys_permission`
--
ALTER TABLE `sys_permission`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=352;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `user_profile`
--
ALTER TABLE `user_profile`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
