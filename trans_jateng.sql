-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 21 Jan 2020 pada 22.12
-- Versi server: 10.4.8-MariaDB
-- Versi PHP: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
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
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_shelter`
--

CREATE TABLE `master_shelter` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_koridor` int(11) NOT NULL,
  `nama` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lokasi` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `longitude` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `latitude` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '0:nonaktif, 1:aktif',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `master_shelter`
--

INSERT INTO `master_shelter` (`id`, `id_koridor`, `nama`, `lokasi`, `longitude`, `latitude`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'SHELTER101', 'Pasar Johar A', '110.42423849334634', '-6.971491325045505', 1, '2020-01-06 08:07:56', '2020-01-06 08:07:56'),
(2, 1, 'SHELTER102', 'BCA PEMUDA', '110.41815921664238', '-6.97595455388004', 1, '2020-01-07 09:04:35', '2020-01-07 09:04:35'),
(3, 1, 'SHELTER103', 'BALAI KOTA PEMUDA', '110.41240339047964', '-6.9815046439873045', 1, '2020-01-11 05:57:33', '2020-01-11 05:57:33'),
(4, 1, 'SHELTER104', 'KATEDRAL', '110.40910676121712', '-6.985923629204256', 1, '2020-01-11 05:58:13', '2020-01-11 05:58:13'),
(5, 1, 'SHELTER105', 'RS KARIADI', '110.40668874979019', '-6.9934778343724595', 1, '2020-01-11 06:00:09', '2020-01-11 06:00:09'),
(6, 1, 'SHELTER106', 'NGALIK A', '110.40761411190033', '-6.99661395838059', 1, '2020-01-11 06:31:18', '2020-01-11 06:31:18'),
(7, 1, 'SHELTER107', 'GAJAH MUNGKUR B', '110.40890157222748', '-7.0044115811597', 1, '2020-01-13 01:57:21', '2020-01-13 01:57:21'),
(8, 1, 'SHELTER108', 'SHELTER POIN ELISABETH', '110.4169388115406', '-7.007837808464386', 1, '2020-01-13 01:58:50', '2020-01-13 01:58:50'),
(9, 1, 'SHELTER109', 'KAGOK B', '110.41614353656769', '-7.011777805621665', 1, '2020-01-13 01:59:39', '2020-01-13 01:59:39'),
(10, 1, 'SHELTER110', 'AKPOL B', '110.41867566319326', '-7.016732318831205', 1, '2020-01-13 02:00:46', '2020-01-13 02:00:46'),
(11, 1, 'SHELTER111', 'DON BOSCO A', '110.42007833719254', '-7.022160070912603', 1, '2020-01-13 02:01:36', '2020-01-13 02:01:36'),
(12, 1, 'SHELTER112', 'KESATRIAN I', '110.41845291852951', '-7.02983747396762', 1, '2020-01-13 02:02:32', '2020-01-13 02:02:32'),
(13, 1, 'SHELTER113', 'PASAR JATINGALEH 1', '110.4181444644928', '-7.032094883193109', 1, '2020-01-13 02:03:14', '2020-01-13 02:03:14'),
(14, 1, 'SHELTER114', 'NGESREP B', '110.42155489325523', '-7.044289494877446', 1, '2020-01-13 02:03:56', '2020-01-13 02:03:56'),
(15, 1, 'SHELTER115', 'TEMBALANG B', '110.42039752006531', '-7.047539740018242', 1, '2020-01-13 02:10:10', '2020-01-13 02:10:10'),
(16, 1, 'SHELTER116', 'SRONDOL I', '110.41884183883667', '-7.050089875448798', 1, '2020-01-13 02:11:10', '2020-01-13 02:11:10'),
(17, 1, 'SHELTER117', 'SRONDOL 1', '110.41786551475525', '-7.05130903753256', 1, '2020-01-13 02:46:51', '2020-01-13 02:46:51'),
(18, 1, 'SHELTER118', 'PASAR BANYUMANIK', '110.41408360004425', '-7.060226391848036', 1, '2020-01-13 02:48:16', '2020-01-13 02:48:16'),
(19, 1, 'SHELTER119', 'MAKODAM I', '110.41265666484833', '-7.063764005099858', 1, '2020-01-13 02:49:20', '2020-01-13 02:49:20'),
(20, 1, 'SHELTER120', 'SD PUDAK PAYUNG I', '110.41226372122765', '-7.065511506851545', 1, '2020-01-13 02:50:51', '2020-01-13 02:50:51');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(2, '2019_12_19_084702_create_ms_devices_table', 1),
(3, '2020_01_02_103337_create_sessions_table', 2),
(4, '2020_01_06_142421_create_master_shelters_table', 3),
(5, '2020_01_08_143049_create_ms_pembayarans_table', 4),
(6, '2020_01_08_153754_create_ms_penumpang_bayars_table', 5),
(7, '2019_12_09_061407_create_transaksis_table', 6),
(8, '2020_01_15_145550_create_muatan_buses_table', 7);

-- --------------------------------------------------------

--
-- Struktur dari tabel `ms_bus`
--

CREATE TABLE `ms_bus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_koridor` int(11) NOT NULL,
  `nama` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `merk` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_pol` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `longitude` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `latitude` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) DEFAULT 1 COMMENT '0:nonaktif, 1:aktif',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `ms_bus`
--

INSERT INTO `ms_bus` (`id`, `id_koridor`, `nama`, `merk`, `no_pol`, `longitude`, `latitude`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'BUS 1', 'BUS', 'H 1111 AA', NULL, NULL, 1, '2019-12-13 01:04:48', '2019-12-13 01:04:48'),
(2, 1, 'BUS102', 'BUS', 'H 8892 GG', NULL, NULL, 1, '2020-01-06 03:34:00', '2020-01-06 03:34:00'),
(3, 2, 'BUS101', 'MERCEDES BENZ', 'H 4272 AA', NULL, NULL, 1, '2020-01-07 09:25:18', '2020-01-07 09:25:18');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ms_devices`
--

CREATE TABLE `ms_devices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `imei` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode` varchar(5) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1:aktif, 0:nonaktif',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `ms_devices`
--

INSERT INTO `ms_devices` (`id`, `nama`, `imei`, `kode`, `status`, `created_at`, `updated_at`) VALUES
(1, 'XKevin', '99001024535470', 'D0001', 1, '2019-12-19 02:44:48', '2019-12-19 02:44:48'),
(2, 'KVN', '99001024535471', 'D0002', 1, '2019-12-19 02:46:33', '2019-12-19 02:46:33'),
(3, 'TRIAL01', '9900102453547', 'D0003', 1, '2019-12-19 06:37:30', '2019-12-19 06:37:30'),
(4, 'TRIAL02', '990010245354', 'D0004', 1, '2019-12-19 06:37:38', '2019-12-19 06:37:38'),
(5, 'TRIAL03', '99001024535', 'D0005', 1, '2019-12-19 06:37:46', '2019-12-19 06:37:46'),
(6, 'TRIAL04', '990010245354701', 'D0006', 1, '2019-12-19 06:37:56', '2019-12-19 06:37:56'),
(7, 'TRIAL05', '99001024535472', 'D0007', 1, '2019-12-19 06:38:09', '2019-12-19 06:38:09'),
(8, 'TRIAL06', '9900102453542', 'D0008', 1, '2019-12-19 06:38:19', '2019-12-19 06:38:19'),
(9, 'TRIAL07', '99001024535477', 'D0009', 1, '2019-12-19 06:38:41', '2019-12-19 06:38:41'),
(10, 'TRIAL08', '99001024535478', 'D0010', 1, '2019-12-19 06:38:48', '2019-12-19 06:38:48'),
(11, 'TRIAL09', '99001024535479', 'D0011', 1, '2019-12-19 06:38:55', '2019-12-19 06:38:55'),
(12, 'TRIAL10', '99001024535480', 'D0012', 1, '2019-12-19 06:39:05', '2019-12-19 06:39:05'),
(13, 'AGUNG', '868029030517106', 'D0013', 1, '2020-01-03 07:06:02', '2020-01-03 07:06:02'),
(14, 'WAVE', '865398031380662', 'D0014', 1, '2020-01-06 01:46:46', '2020-01-06 01:46:46');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ms_koridor`
--

CREATE TABLE `ms_koridor` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `koridor` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rute` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `trip_a` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `trip_b` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `longitude_a` varchar(35) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `latitude_a` varchar(35) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `longitude_b` varchar(35) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `latitude_b` varchar(35) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) DEFAULT 1 COMMENT '0:nonaktif, 1:aktif',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `ms_koridor`
--

INSERT INTO `ms_koridor` (`id`, `koridor`, `rute`, `trip_a`, `trip_b`, `longitude_a`, `latitude_a`, `longitude_b`, `latitude_b`, `status`, `created_at`, `updated_at`) VALUES
(1, 'KORIDOR I', 'Tawang-Bawen', 'Tawang', 'Bawen', '110.42908199313702', '-6.96491656547724', '110.43380163063567', '-7.245483124736961', 1, '2019-12-12 22:02:16', '2019-12-12 22:02:16');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ms_libur`
--

CREATE TABLE `ms_libur` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tanggal` date NOT NULL,
  `id_penumpang` int(11) NOT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `ms_libur`
--

INSERT INTO `ms_libur` (`id`, `tanggal`, `id_penumpang`, `keterangan`, `created_at`, `updated_at`) VALUES
(3, '2019-12-20', 2, NULL, '2019-12-16 01:00:45', '2019-12-16 01:00:45'),
(4, '2019-12-16', 3, NULL, '2019-12-16 01:00:45', '2019-12-16 01:00:45'),
(5, '2019-12-16', 4, NULL, '2019-12-16 01:00:45', '2019-12-16 01:00:45'),
(6, '2019-12-17', 3, NULL, '2019-12-16 22:05:59', '2019-12-16 22:05:59'),
(9, '2019-12-25', 2, NULL, '2019-12-17 09:41:39', '2019-12-17 09:41:39'),
(10, '2019-12-25', 3, NULL, '2019-12-17 09:41:39', '2019-12-17 09:41:39'),
(14, '2020-01-25', 4, 'Imlek', '2020-01-06 02:30:26', '2020-01-06 02:30:26'),
(15, '2020-01-25', 5, 'Imlek', '2020-01-06 02:30:26', '2020-01-06 02:30:26'),
(19, '2020-01-07', 3, NULL, '2020-01-07 03:41:27', '2020-01-07 03:41:27');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ms_pembayaran`
--

CREATE TABLE `ms_pembayaran` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '0:nonaktif, 1:aktif',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `ms_pembayaran`
--

INSERT INTO `ms_pembayaran` (`id`, `nama`, `keterangan`, `status`, `created_at`, `updated_at`) VALUES
(0, 'Tiket Manual', 'Jika android device error', 1, '2020-01-10 07:29:30', '2020-01-10 07:29:30'),
(1, 'Regular', 'Cash', 1, '2020-01-08 08:15:43', '2020-01-08 08:15:43'),
(2, 'Ovo', 'Dompet Digital', 1, '2020-01-08 08:28:42', '2020-01-08 08:28:42'),
(3, 'Gopay', 'Dompet Digital', 1, '2020-01-08 08:29:02', '2020-01-08 08:29:02');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ms_penumpang`
--

CREATE TABLE `ms_penumpang` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `jenis` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` decimal(6,2) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `ms_penumpang`
--

INSERT INTO `ms_penumpang` (`id`, `jenis`, `harga`, `status`, `created_at`, `updated_at`) VALUES
(2, 'Umum', '4000.00', 1, '2019-12-15 23:23:08', '2019-12-15 23:23:08'),
(3, 'Veteran', '2000.00', 1, '2019-12-15 23:52:30', '2019-12-15 23:52:30'),
(4, 'Pelajar', '2000.00', 1, '2019-12-15 23:54:12', '2019-12-15 23:54:12'),
(5, 'Buruh', '2000.00', 1, '2019-12-19 09:18:50', '2019-12-19 09:18:50'),
(99, 'Transit', '0.00', 1, '2019-12-28 03:39:47', '2019-12-28 03:39:47'),
(101, 'Lansia', '2000.00', 1, '2020-01-08 08:51:21', '2020-01-08 08:51:21');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ms_penumpang_bayar`
--

CREATE TABLE `ms_penumpang_bayar` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_penumpang` int(11) NOT NULL,
  `id_pembayaran` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `ms_penumpang_bayar`
--

INSERT INTO `ms_penumpang_bayar` (`id`, `id_penumpang`, `id_pembayaran`, `created_at`, `updated_at`) VALUES
(4, 101, 1, '2020-01-08 09:22:29', '2020-01-08 09:22:29'),
(7, 3, 1, '2020-01-08 09:23:19', '2020-01-08 09:23:19'),
(8, 3, 3, '2020-01-08 09:23:19', '2020-01-08 09:23:19'),
(9, 4, 1, '2020-01-08 09:23:32', '2020-01-08 09:23:32'),
(10, 4, 3, '2020-01-08 09:23:32', '2020-01-08 09:23:32'),
(11, 5, 1, '2020-01-08 09:23:43', '2020-01-08 09:23:43'),
(12, 5, 3, '2020-01-08 09:23:43', '2020-01-08 09:23:43'),
(16, 2, 1, '2020-01-08 09:30:52', '2020-01-08 09:30:52'),
(17, 2, 3, '2020-01-08 09:30:52', '2020-01-08 09:30:52'),
(22, 99, 1, '2020-01-13 09:17:01', '2020-01-13 09:17:01');

-- --------------------------------------------------------

--
-- Struktur dari tabel `muatan_bus`
--

CREATE TABLE `muatan_bus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_koridor` tinyint(4) NOT NULL,
  `id_shelter` tinyint(4) NOT NULL,
  `id_bus` tinyint(4) NOT NULL,
  `username` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shift` tinyint(4) NOT NULL,
  `tanggal` date NOT NULL,
  `tipe` tinyint(4) NOT NULL COMMENT '1:tiket manual, 2:e-ticketing',
  `arah` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1:naik, 2:turun',
  `total` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `muatan_bus`
--

INSERT INTO `muatan_bus` (`id`, `id_koridor`, `id_shelter`, `id_bus`, `username`, `shift`, `tanggal`, `tipe`, `arah`, `total`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 'dev', 1, '2020-01-15', 2, 1, 5, NULL, NULL),
(2, 1, 1, 1, 'dev', 1, '2020-01-15', 2, 2, 4, NULL, NULL),
(3, 1, 1, 1, 'agg', 1, '2020-01-20', 2, 1, 1, '2020-01-20 09:18:31', '2020-01-20 09:18:31'),
(4, 1, 1, 1, 'agg', 1, '2020-01-20', 2, 1, 1, '2020-01-20 09:18:31', '2020-01-20 09:18:31');

-- --------------------------------------------------------

--
-- Struktur dari tabel `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `oauth_clients`
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

--
-- Dumping data untuk tabel `oauth_clients`
--

INSERT INTO `oauth_clients` (`id`, `user_id`, `name`, `secret`, `redirect`, `personal_access_client`, `password_client`, `revoked`, `created_at`, `updated_at`) VALUES
(1, NULL, 'TRANS JATENG Personal Access Client', 'ERQ3Q3CuyWUagR2yqmSDwTig6YawDVC59OjmXHFR', 'http://localhost', 1, 0, 0, '2019-12-16 20:02:31', '2019-12-16 20:02:31'),
(2, NULL, 'TRANS JATENG Password Grant Client', 'gpPZr5vVFMDtTPAd3SrKVYaV81l9Hozza7FHxfUS', 'http://localhost', 0, 1, 0, '2019-12-16 20:02:31', '2019-12-16 20:02:31');

-- --------------------------------------------------------

--
-- Struktur dari tabel `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `oauth_personal_access_clients`
--

INSERT INTO `oauth_personal_access_clients` (`id`, `client_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2019-12-16 20:02:31', '2019-12-16 20:02:31');

-- --------------------------------------------------------

--
-- Struktur dari tabel `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `problems`
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
  `status` int(11) NOT NULL DEFAULT 0 COMMENT '0:belum dilihat, 1:sudah dilihat',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `problems`
--

INSERT INTO `problems` (`id`, `id_koridor`, `id_bus`, `keterangan`, `username`, `longitude`, `latitude`, `trip`, `shift`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'COBA', 'dev', '', '', 'AB', 2, 1, '2019-12-23 07:12:19', '2019-12-23 07:12:19'),
(2, 1, 1, 'COBA', 'dev', '', '', 'AB', 2, 1, '2019-12-23 07:13:14', '2019-12-23 07:13:14'),
(3, 1, 1, 'COBA', 'dev', '', '', 'AB', 2, 0, '2019-12-23 07:14:32', '2019-12-23 07:14:32'),
(4, 1, 1, 'Lantas Padat', 'agg', '0', '0', 'AB', 2, 1, '2019-12-27 02:19:32', '2019-12-27 02:19:32'),
(5, 1, 1, 'Ganguan Kendaraan', 'agg', '0', '0', 'AB', 2, 1, '2019-12-27 02:23:30', '2019-12-27 02:23:30'),
(6, 1, 1, 'Ganguan Kendaraan', 'agg', '0', '0', 'AB', 1, 1, '2019-12-27 02:25:05', '2019-12-27 02:25:05'),
(7, 1, 1, 'Ada Kecelakaan', 'agg', '0', '0', 'AB', 2, 1, '2019-12-27 08:20:36', '2019-12-27 08:20:36'),
(8, 1, 1, 'Ganguan Teknis Kendaraan', 'agg', '110.42347404159905', '-6.989239886915921', 'AB', 1, 1, '2019-12-28 02:07:01', '2019-12-28 02:07:01'),
(9, 1, 2, 'Ada Orang Sakit', 'agg', '110.57758641371518', '-7.337181851366997', 'AB', 1, 1, '2020-01-06 06:21:46', '2020-01-06 06:21:46'),
(10, 1, 2, 'Lantas Padat', 'agg', '-6.9903936', '110.386652', 'AB', 1, 1, '2020-01-08 07:17:59', '2020-01-08 07:17:59'),
(11, 1, 2, 'Lantas Padat', 'agg', '-6.9903936', '110.386652', 'BA', 1, 0, '2020-01-13 09:13:25', '2020-01-13 09:13:25'),
(12, 1, 1, 'Ada Kecelakaan', 'agg', '110.3888129', '-6.990391', 'AB', 1, 0, '2020-01-20 04:29:45', '2020-01-20 04:29:45'),
(13, 1, 1, 'Ada Orang Sakit', 'agg', '110.3888129', '-6.990391', 'AB', 1, 0, '2020-01-20 04:29:48', '2020-01-20 04:29:48'),
(14, 1, 1, 'Ganguan Teknis Kendaraan', 'agg', '110.3888129', '-6.990391', 'AB', 1, 0, '2020-01-20 04:29:51', '2020-01-20 04:29:51'),
(15, 1, 1, 'Ada Orang Sakit', 'agg', '110.3887973', '-6.990382', 'AB', 1, 0, '2020-01-20 09:21:11', '2020-01-20 09:21:11'),
(16, 1, 1, 'Ada Orang Sakit', 'agg', '110.3887973', '-6.990382', 'AB', 1, 0, '2020-01-20 09:21:14', '2020-01-20 09:21:14'),
(17, 1, 1, 'Ganguan Teknis Kendaraan', 'agg', '110.3887973', '-6.990382', 'AB', 1, 0, '2020-01-20 09:21:16', '2020-01-20 09:21:16'),
(18, 1, 1, 'Ganguan Teknis Kendaraan', 'agg', '110.3888001', '-6.9903834', 'AB', 1, 0, '2020-01-21 02:20:40', '2020-01-21 02:20:40');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('H11QwWjEYXOIUTLcH7I0ND05NRXDgL063Ur77tEr', NULL, '192.168.100.112', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.130 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiVEM5R00wWmY4clFuU2RnSmI5UzdHVHZEY2tvZGdxQW5QV2JXMEZkbSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzM6Imh0dHA6Ly8xOTIuMTY4LjEwMC4xMTI6ODAwMC9sb2dpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1579511895);

-- --------------------------------------------------------

--
-- Struktur dari tabel `sys_menus`
--

CREATE TABLE `sys_menus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_group` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `segment_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ord` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `sys_menus`
--

INSERT INTO `sys_menus` (`id`, `id_group`, `name`, `segment_name`, `url`, `ord`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'Company Info', 'company-info', 'dashboard/system/company-info', 1, 0, '2019-12-09 23:37:30', '2019-12-09 23:37:30'),
(2, 1, 'Menu Group', 'menu-group', 'dashboard/system/menu-group', 2, 0, '2019-12-09 23:39:29', '2019-12-09 23:39:29'),
(3, 1, 'Menu', 'menu', 'dashboard/system/menu', 3, 0, '2019-12-09 23:39:52', '2019-12-09 23:39:52'),
(4, 2, 'User Management', 'user-management', 'dashboard/master/user-management', 1, 0, '2019-12-11 21:30:13', '2019-12-11 21:30:13'),
(5, 2, 'Koridor', 'koridor', 'dashboard/master/koridor', 2, 0, '2019-12-12 15:54:11', '2019-12-12 15:54:11'),
(6, 2, 'Bus', 'bus', 'dashboard/master/bus', 4, 0, '2019-12-13 00:21:52', '2019-12-13 00:21:52'),
(7, 2, 'Penumpang', 'penumpang', 'dashboard/master/penumpang', 6, 0, '2019-12-15 19:14:56', '2019-12-15 19:14:56'),
(8, 2, 'Hari Libur', 'hari-libur', 'dashboard/master/hari-libur', 7, 0, '2019-12-15 23:31:29', '2019-12-15 23:31:29'),
(9, 3, 'Tiket Manual', 'tiket-offline', 'dashboard/penjualan/tiket-offline', 1, 0, '2019-12-16 01:45:48', '2019-12-16 01:45:48'),
(10, 2, 'Device', 'device', 'dashboard/master/device', 8, 0, '2019-12-17 09:51:19', '2019-12-17 09:51:19'),
(11, 4, 'Bus Report', 'bus-report', 'dashboard/problem/bus-report', 1, 0, '2019-12-23 06:46:18', '2019-12-23 06:46:18'),
(12, 5, 'Transaksi Petugas', 'transaksi-petugas', 'dashboard/laporan/transaksi-petugas', 1, 0, '2019-12-26 07:51:33', '2019-12-26 07:51:33'),
(13, 5, 'TOP Transaksi Petugas', 'top-transaksi-petugas', 'dashboard/laporan/top-transaksi-petugas', 2, 0, '2019-12-26 07:52:04', '2019-12-26 07:52:04'),
(14, 5, 'Transaksi Per Jenis', 'transaksi-per-jenis', 'dashboard/laporan/transaksi-per-jenis', 3, 0, '2019-12-28 02:48:26', '2019-12-28 02:48:26'),
(15, 5, 'Transaksi Bus/Shelter', 'transaksi-bus-shelter', 'dashboard/laporan/transaksi-bus-shelter', 5, 0, '2019-12-30 06:28:20', '2019-12-30 06:28:20'),
(16, 5, 'Transaksi per Koridor', 'transaksi-per-koridor', 'dashboard/laporan/transaksi-per-koridor', 4, 0, '2019-12-30 07:51:56', '2019-12-30 07:51:56'),
(17, 2, 'Shelter', 'shelter', 'dashboard/master/shelter', 3, 0, '2020-01-06 07:14:12', '2020-01-06 07:14:12'),
(18, 2, 'Pembayaran', 'pembayaran', 'dashboard/master/pembayaran', 5, 0, '2020-01-08 04:29:53', '2020-01-08 04:29:53');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sys_menu_groups`
--

CREATE TABLE `sys_menu_groups` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `segment_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ord` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `sys_menu_groups`
--

INSERT INTO `sys_menu_groups` (`id`, `name`, `segment_name`, `icon`, `ord`, `status`, `created_at`, `updated_at`) VALUES
(1, 'System Utility', 'system', 'fas fa-cogs', 1, 0, '2019-12-09 21:49:19', '2019-12-09 21:49:19'),
(2, 'Master Data', 'master', 'fas fa-database', 2, 0, '2019-12-11 21:28:41', '2019-12-11 21:28:41'),
(3, 'Penjualan', 'penjualan', 'fas fa-bus-alt', 3, 0, '2019-12-16 01:44:41', '2019-12-16 01:44:41'),
(4, 'Problem', 'problem', 'fas fa-exclamation-triangle', 5, 0, '2019-12-23 06:45:38', '2019-12-23 06:45:38'),
(5, 'Laporan', 'laporan', 'fas fa-chart-line', 4, 0, '2019-12-26 07:46:55', '2019-12-26 07:46:55');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sys_permission`
--

CREATE TABLE `sys_permission` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_menu` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `sys_permission`
--

INSERT INTO `sys_permission` (`id`, `username`, `id_menu`, `created_at`, `updated_at`) VALUES
(1, 'kvn', 4, '2019-12-11 21:52:54', '2019-12-11 21:52:54'),
(30, 'agg', 4, '2019-12-17 19:43:09', '2019-12-17 19:43:09'),
(31, 'agg', 5, '2019-12-17 19:43:09', '2019-12-17 19:43:09'),
(32, 'agg', 6, '2019-12-17 19:43:09', '2019-12-17 19:43:09'),
(33, 'agg', 7, '2019-12-17 19:43:09', '2019-12-17 19:43:09'),
(34, 'agg', 8, '2019-12-17 19:43:09', '2019-12-17 19:43:09'),
(35, 'agg', 10, '2019-12-17 19:43:09', '2019-12-17 19:43:09'),
(36, 'agg', 9, '2019-12-17 19:43:09', '2019-12-17 19:43:09'),
(37, 'coba', 4, '2019-12-23 09:11:22', '2019-12-23 09:11:22'),
(38, 'trial', 4, '2019-12-30 09:05:01', '2019-12-30 09:05:01'),
(39, 'trial', 5, '2019-12-30 09:05:01', '2019-12-30 09:05:01'),
(40, 'trial', 6, '2019-12-30 09:05:01', '2019-12-30 09:05:01'),
(41, 'trial', 7, '2019-12-30 09:05:01', '2019-12-30 09:05:01'),
(42, 'trial', 8, '2019-12-30 09:05:01', '2019-12-30 09:05:01'),
(43, 'trial', 10, '2019-12-30 09:05:01', '2019-12-30 09:05:01'),
(44, 'trial', 9, '2019-12-30 09:05:01', '2019-12-30 09:05:01'),
(45, 'trial', 12, '2019-12-30 09:05:01', '2019-12-30 09:05:01'),
(46, 'trial', 13, '2019-12-30 09:05:01', '2019-12-30 09:05:01'),
(47, 'trial', 14, '2019-12-30 09:05:01', '2019-12-30 09:05:01'),
(48, 'trial', 16, '2019-12-30 09:05:01', '2019-12-30 09:05:01'),
(49, 'trial', 15, '2019-12-30 09:05:01', '2019-12-30 09:05:01'),
(50, 'trial', 11, '2019-12-30 09:05:01', '2019-12-30 09:05:01'),
(51, 'TRIAL2', 4, '2019-12-31 04:41:40', '2019-12-31 04:41:40'),
(52, 'TRIAL2', 5, '2019-12-31 04:41:40', '2019-12-31 04:41:40'),
(53, 'TRIAL2', 6, '2019-12-31 04:41:40', '2019-12-31 04:41:40'),
(54, 'TRIAL2', 7, '2019-12-31 04:41:40', '2019-12-31 04:41:40'),
(55, 'TRIAL2', 8, '2019-12-31 04:41:40', '2019-12-31 04:41:40'),
(56, 'TRIAL2', 10, '2019-12-31 04:41:40', '2019-12-31 04:41:40'),
(57, 'TRIAL2', 9, '2019-12-31 04:41:40', '2019-12-31 04:41:40'),
(58, 'TRIAL2', 12, '2019-12-31 04:41:40', '2019-12-31 04:41:40'),
(59, 'TRIAL2', 13, '2019-12-31 04:41:40', '2019-12-31 04:41:40'),
(60, 'TRIAL2', 14, '2019-12-31 04:41:40', '2019-12-31 04:41:40'),
(61, 'TRIAL2', 16, '2019-12-31 04:41:40', '2019-12-31 04:41:40'),
(62, 'TRIAL2', 15, '2019-12-31 04:41:40', '2019-12-31 04:41:40'),
(63, 'TRIAL2', 11, '2019-12-31 04:41:40', '2019-12-31 04:41:40'),
(64, 'widiyanto', 4, '2020-01-06 03:31:17', '2020-01-06 03:31:17'),
(65, 'widiyanto', 5, '2020-01-06 03:31:17', '2020-01-06 03:31:17'),
(66, 'widiyanto', 6, '2020-01-06 03:31:17', '2020-01-06 03:31:17'),
(67, 'widiyanto', 7, '2020-01-06 03:31:17', '2020-01-06 03:31:17'),
(68, 'widiyanto', 8, '2020-01-06 03:31:17', '2020-01-06 03:31:17'),
(69, 'widiyanto', 10, '2020-01-06 03:31:17', '2020-01-06 03:31:17'),
(70, 'widiyanto', 9, '2020-01-06 03:31:17', '2020-01-06 03:31:17'),
(71, 'widiyanto', 12, '2020-01-06 03:31:17', '2020-01-06 03:31:17'),
(72, 'widiyanto', 13, '2020-01-06 03:31:17', '2020-01-06 03:31:17'),
(73, 'widiyanto', 14, '2020-01-06 03:31:17', '2020-01-06 03:31:17'),
(74, 'widiyanto', 16, '2020-01-06 03:31:17', '2020-01-06 03:31:17'),
(75, 'widiyanto', 15, '2020-01-06 03:31:17', '2020-01-06 03:31:17'),
(76, 'widiyanto', 11, '2020-01-06 03:31:17', '2020-01-06 03:31:17');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
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
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id`, `no_transaksi`, `tgl_transaksi`, `jam_transaksi`, `id_penumpang`, `id_koridor`, `id_bus`, `id_shelter`, `trip_a`, `trip_b`, `shift`, `username`, `opsi_bayar`, `harga`, `created_at`, `updated_at`) VALUES
(1, '200114-01-003-0000', '2020-01-14', '13:59:34', 5, 1, 1, 1, 'Bawen ', ' Tawang', 1, 'agg', '1', '2000.00', '2020-01-14 07:00:24', '2020-01-14 07:00:24'),
(2, '200114-01-003-0001', '2020-01-14', '13:59:36', 101, 1, 1, 1, 'Bawen ', ' Tawang', 1, 'agg', '1', '2000.00', '2020-01-14 07:00:25', '2020-01-14 07:00:25'),
(3, '200114-01-003-0002', '2020-01-14', '13:59:38', 5, 1, 1, 1, 'Bawen ', ' Tawang', 1, 'agg', '3', '2000.00', '2020-01-14 07:00:25', '2020-01-14 07:00:25'),
(4, '200114-01-003-0003', '2020-01-14', '13:59:48', 2, 1, 1, 1, 'Bawen ', ' Tawang', 1, 'agg', '3', '4000.00', '2020-01-14 07:00:25', '2020-01-14 07:00:25'),
(5, '200114-01-003-0004', '2020-01-14', '13:59:51', 3, 1, 1, 1, 'Bawen ', ' Tawang', 1, 'agg', '3', '2000.00', '2020-01-14 07:00:25', '2020-01-14 07:00:25'),
(6, '200114-01-003-0000', '2020-01-14', '14:02:26', 5, 1, 1, 1, 'Bawen ', ' Tawang', 1, 'agg', '1', '2000.00', '2020-01-14 07:02:56', '2020-01-14 07:02:56'),
(7, '200114-01-003-0001', '2020-01-14', '14:02:27', 5, 1, 1, 1, 'Bawen ', ' Tawang', 1, 'agg', '1', '2000.00', '2020-01-14 07:02:56', '2020-01-14 07:02:56'),
(8, '200114-01-003-0002', '2020-01-14', '14:02:28', 5, 1, 1, 1, 'Bawen ', ' Tawang', 1, 'agg', '1', '2000.00', '2020-01-14 07:02:56', '2020-01-14 07:02:56'),
(9, '200114-01-003-0003', '2020-01-14', '14:02:30', 101, 1, 1, 1, 'Bawen ', ' Tawang', 1, 'agg', '1', '2000.00', '2020-01-14 07:02:56', '2020-01-14 07:02:56'),
(10, '200114-01-003-0004', '2020-01-14', '14:02:31', 5, 1, 1, 1, 'Bawen ', ' Tawang', 1, 'agg', '3', '2000.00', '2020-01-14 07:02:56', '2020-01-14 07:02:56'),
(11, '200114-01-003-0005', '2020-01-14', '14:02:33', 2, 1, 1, 1, 'Bawen ', ' Tawang', 1, 'agg', '1', '4000.00', '2020-01-14 07:02:56', '2020-01-14 07:02:56'),
(12, 'TRN-202013-00-1', '2020-01-14', '14:02:00', 99, 1, 1, 1, 'Bawen ', ' Tawang', 1, 'agg', '1', '0.00', '2020-01-14 07:02:56', '2020-01-14 07:02:56'),
(13, '200114-01-003-0000', '2020-01-14', '14:28:11', 5, 1, 1, 1, 'Bawen ', ' Tawang', 1, 'agg', '1', '2000.00', '2020-01-14 07:28:21', '2020-01-14 07:28:21'),
(14, '200114-01-003-0000', '2020-01-14', '14:31:26', 101, 1, 1, 1, 'Bawen ', ' Tawang', 1, 'agg', '1', '2000.00', '2020-01-14 07:32:38', '2020-01-14 07:32:38'),
(15, '200114-01-003-0000', '2020-01-14', '14:31:26', 101, 1, 1, 1, 'Bawen ', ' Tawang', 1, 'agg', '1', '2000.00', '2020-01-14 07:32:39', '2020-01-14 07:32:39'),
(16, '200114-01-003-0000', '2020-01-14', '14:35:06', 5, 1, 1, 1, 'Bawen ', ' Tawang', 1, 'agg', '1', '2000.00', '2020-01-14 07:36:13', '2020-01-14 07:36:13'),
(17, '200114-01-003-0001', '2020-01-14', '14:35:21', 5, 1, 1, 1, 'Bawen ', ' Tawang', 1, 'agg', '1', '2000.00', '2020-01-14 07:36:13', '2020-01-14 07:36:13'),
(18, '200114-01-003-0002', '2020-01-14', '14:35:26', 101, 1, 1, 1, 'Bawen ', ' Tawang', 1, 'agg', '1', '2000.00', '2020-01-14 07:36:13', '2020-01-14 07:36:13'),
(19, 'TRN-202013-00-1', '2020-01-14', '14:36:00', 99, 1, 1, 1, 'Bawen ', ' Tawang', 1, 'agg', '1', '0.00', '2020-01-14 07:36:13', '2020-01-14 07:36:13'),
(23, '200120-01-003-0000', '2020-01-20', '16:10:42', 5, 1, 1, 1, 'Bawen ', ' Tawang', 1, 'agg', '1', '2000.00', '2020-01-20 09:18:31', '2020-01-20 09:18:31'),
(24, '200120-01-003-0001', '2020-01-20', '16:11:47', 5, 1, 1, 1, 'Bawen ', ' Tawang', 1, 'agg', '1', '2000.00', '2020-01-20 09:18:31', '2020-01-20 09:18:31');

-- --------------------------------------------------------

--
-- Struktur dari tabel `trial`
--

CREATE TABLE `trial` (
  `nama` varchar(5) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `trial`
--

INSERT INTO `trial` (`nama`, `tanggal`) VALUES
('1', '2020-01-06 04:01:25');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `system` tinyint(4) NOT NULL COMMENT '0:all, 1:android, 2:web',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '0:nonaktif, 1:aktif',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `username`, `name`, `email`, `email_verified_at`, `password`, `no_hp`, `system`, `remember_token`, `status`, `created_at`, `updated_at`) VALUES
(1, 'dev', 'Developer', 'laurentiuskevin44@gmail.com', NULL, 'eyJpdiI6Ik4rWkhDYTA0VHQ2V2RXK1pSdk9tdXc9PSIsInZhbHVlIjoiMEZkTmpVbXB6ZVB4SHRqRDZZOTdBZz09IiwibWFjIjoiOWI4YmEwNmI2Y2VmZjBiZDAyZThlODI5YzIzNjBmNDNlMzM3MWNjOWZmNjUzM2UwZThkMDFlMjVlNzNjN2JjYSJ9', '081901115314', 0, NULL, 1, '2019-12-09 20:54:12', '2019-12-09 20:54:12'),
(2, 'kvn', 'Kevin', NULL, NULL, 'eyJpdiI6Ik9maGYzZitrSFNhcTI5MnM1a21IWnc9PSIsInZhbHVlIjoibklBSWdyTCt6Q3o1WGlQMzllRERqQT09IiwibWFjIjoiMDU5ZWFhZmM2OTUzOGZhYWUxZDhlMTA1MWI2ODM0MGNjYzMyODcyMDcyMjgyMmRiMjgwYTlhMzNmMjJkZWE1NSJ9', NULL, 0, NULL, 1, '2019-12-11 21:52:54', '2019-12-11 21:52:54'),
(3, 'agg', 'Agung', NULL, NULL, 'eyJpdiI6Ikh1WmRnMG4yeDB5NVh2cjlkMk1LalE9PSIsInZhbHVlIjoicGt2QU5zRkc2RERacGFKZ3F0a0FMdz09IiwibWFjIjoiZTQ2MWEwZDRlODY0NGU3NDdkODUxNzhiMmRlMWUzZmU4M2QwZGEyY2JiODZiYjRlYmY2OGRlYTUxYzcwZDZmYyJ9', NULL, 1, NULL, 1, '2019-12-17 19:17:59', '2019-12-17 19:17:59'),
(4, 'coba', 'coba', NULL, NULL, 'eyJpdiI6IkhhXC9BZStZR25xMHN0clpqY3h1VUp3PT0iLCJ2YWx1ZSI6IkR3NTBFbjZzUTV2aUFTcE9YMEVIVXc9PSIsIm1hYyI6ImI3NzU0Mzg0NDI4MDI2MjBlODk2MTkxNDZkMGEyOGJhMDgwZDU0MWQwNWMwNTI1ZDA3ZjUyZjAwMDQ4NDU3NTcifQ==', NULL, 0, NULL, 0, '2019-12-23 09:11:22', '2019-12-23 09:11:22'),
(5, 'trial', 'TRIAL ACCOUNT', NULL, NULL, 'eyJpdiI6IllSN1lKbmJFR3ZKWVEyUzR5ZnJvbEE9PSIsInZhbHVlIjoiYjJIYmRQMWM5OGkxYVhGSlpWbGZSQT09IiwibWFjIjoiYjgzZTIyZjE5ZWQ5MTQyMTMwYjViOGI4MDU0NjJkMWI4YTMxNGIwN2EyODUzMWYwYjlkODU5MmI1MzljMGU3ZiJ9', '', 0, NULL, 1, '2019-12-30 09:05:00', '2019-12-30 09:05:00'),
(6, 'TRIAL2', 'TRIAL SYSTEM', NULL, NULL, 'eyJpdiI6IlBuWDZSMCs4T1U1UGM0SDFMbFRGTWc9PSIsInZhbHVlIjoicXVuSnJ4MitFc0dlUlRrdnI0dHFMQT09IiwibWFjIjoiMDc0ZTMwYTA2OWNhNTZjOTNkZmI1ZjZhZWU4YjI3MTliM2JhMjhiZDJhODFiYTM4M2U5ODgyMzU0ZWViYjQzZCJ9', '', 0, NULL, 1, '2019-12-31 04:41:40', '2019-12-31 04:41:40'),
(7, 'widiyanto', 'Widiyanto', NULL, NULL, 'eyJpdiI6ImpqOGlGTjJGdUZJdE5rd0ZXRlZOaEE9PSIsInZhbHVlIjoiVVgweExkRzBBV09QYWVnaklxcytGUT09IiwibWFjIjoiMWJjOWFjN2IwOTFhZTg3NzcxNjZjOTZiZmM4NmZjNzVhMmRjODQ2NzMzYTQ0ZDBhZWM1ODY2OWZmZmZjNzVmOCJ9', '', 0, NULL, 1, '2020-01-06 03:31:17', '2020-01-06 03:31:17');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_profile`
--

CREATE TABLE `user_profile` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_sk` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_spk` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tempat_lahir` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `jenis_kelamin` varchar(1) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jabatan` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `agama` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_ktp` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tingkat_pendidikan` varchar(5) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jurusan` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `foto` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `user_profile`
--

INSERT INTO `user_profile` (`id`, `username`, `no_sk`, `no_spk`, `tempat_lahir`, `tgl_lahir`, `jenis_kelamin`, `alamat`, `jabatan`, `agama`, `no_ktp`, `tingkat_pendidikan`, `jurusan`, `keterangan`, `foto`, `created_at`, `updated_at`) VALUES
(1, 'dev', NULL, NULL, NULL, '2019-01-20', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'dev.jpg', '2019-12-11 20:33:55', '2019-12-11 21:27:45');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `master_shelter`
--
ALTER TABLE `master_shelter`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `ms_bus`
--
ALTER TABLE `ms_bus`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `ms_devices`
--
ALTER TABLE `ms_devices`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ms_devices_nama_unique` (`nama`);

--
-- Indeks untuk tabel `ms_koridor`
--
ALTER TABLE `ms_koridor`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `ms_libur`
--
ALTER TABLE `ms_libur`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `ms_pembayaran`
--
ALTER TABLE `ms_pembayaran`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ms_pembayaran_nama_unique` (`nama`);

--
-- Indeks untuk tabel `ms_penumpang`
--
ALTER TABLE `ms_penumpang`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `ms_penumpang_bayar`
--
ALTER TABLE `ms_penumpang_bayar`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `muatan_bus`
--
ALTER TABLE `muatan_bus`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_access_tokens_user_id_index` (`user_id`);

--
-- Indeks untuk tabel `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Indeks untuk tabel `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_personal_access_clients_client_id_index` (`client_id`);

--
-- Indeks untuk tabel `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `problems`
--
ALTER TABLE `problems`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `sessions`
--
ALTER TABLE `sessions`
  ADD UNIQUE KEY `sessions_id_unique` (`id`);

--
-- Indeks untuk tabel `sys_menus`
--
ALTER TABLE `sys_menus`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `sys_menu_groups`
--
ALTER TABLE `sys_menu_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `sys_permission`
--
ALTER TABLE `sys_permission`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_profile`
--
ALTER TABLE `user_profile`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `master_shelter`
--
ALTER TABLE `master_shelter`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `ms_bus`
--
ALTER TABLE `ms_bus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `ms_devices`
--
ALTER TABLE `ms_devices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `ms_koridor`
--
ALTER TABLE `ms_koridor`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `ms_libur`
--
ALTER TABLE `ms_libur`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `ms_pembayaran`
--
ALTER TABLE `ms_pembayaran`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `ms_penumpang`
--
ALTER TABLE `ms_penumpang`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT untuk tabel `ms_penumpang_bayar`
--
ALTER TABLE `ms_penumpang_bayar`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `muatan_bus`
--
ALTER TABLE `muatan_bus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `problems`
--
ALTER TABLE `problems`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `sys_menus`
--
ALTER TABLE `sys_menus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `sys_menu_groups`
--
ALTER TABLE `sys_menu_groups`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `sys_permission`
--
ALTER TABLE `sys_permission`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `user_profile`
--
ALTER TABLE `user_profile`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
