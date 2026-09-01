-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 25, 2026 at 04:42 AM
-- Server version: 8.4.3
-- PHP Version: 8.3.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `silognesas`
--

-- --------------------------------------------------------

--
-- Table structure for table `auth_activation_attempts`
--

CREATE TABLE `auth_activation_attempts` (
  `id` int UNSIGNED NOT NULL,
  `ip_address` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `user_agent` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `auth_groups`
--

CREATE TABLE `auth_groups` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `auth_groups`
--

INSERT INTO `auth_groups` (`id`, `name`, `description`) VALUES
(4, 'superadmin', 'Super Admin'),
(5, 'guru', 'Guru'),
(6, 'siswa', 'Siswa');

-- --------------------------------------------------------

--
-- Table structure for table `auth_groups_permissions`
--

CREATE TABLE `auth_groups_permissions` (
  `group_id` int UNSIGNED NOT NULL DEFAULT '0',
  `permission_id` int UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `auth_groups_users`
--

CREATE TABLE `auth_groups_users` (
  `group_id` int UNSIGNED NOT NULL DEFAULT '0',
  `user_id` int UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `auth_groups_users`
--

INSERT INTO `auth_groups_users` (`group_id`, `user_id`) VALUES
(4, 4),
(5, 5),
(6, 6),
(6, 7),
(6, 8),
(6, 9),
(6, 10);

-- --------------------------------------------------------

--
-- Table structure for table `auth_logins`
--

CREATE TABLE `auth_logins` (
  `id` int UNSIGNED NOT NULL,
  `ip_address` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `user_id` int UNSIGNED DEFAULT NULL,
  `date` datetime NOT NULL,
  `success` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `auth_logins`
--

INSERT INTO `auth_logins` (`id`, `ip_address`, `email`, `user_id`, `date`, `success`) VALUES
(1, '::1', 'adminsuper', NULL, '2026-07-05 15:32:36', 0),
(2, '::1', 'adminsuper', NULL, '2026-07-05 15:32:54', 0),
(3, '::1', 'adminsuper', NULL, '2026-07-05 15:33:16', 0),
(4, '::1', 'adminsuper12', 4, '2026-07-05 16:04:39', 0),
(5, '::1', 'superadmin12@gmail.com', 4, '2026-07-05 16:09:29', 1),
(6, '::1', 'superadmin12@gmail.com', 4, '2026-07-05 16:15:27', 1),
(7, '::1', 'superadmin12@gmail.com', 4, '2026-07-05 16:27:56', 1),
(8, '::1', 'gurulogistik@gmail.com', 5, '2026-07-05 16:30:18', 1),
(9, '::1', 'siswa@gmail.com', 6, '2026-07-05 16:32:19', 1),
(10, '::1', 'superadmin12@gmail.com', 4, '2026-07-05 16:32:57', 1),
(11, '::1', 'superadmin12@gmail.com', 4, '2026-07-06 03:06:51', 1),
(12, '::1', 'ghazyxlogistik', NULL, '2026-07-06 03:21:28', 0),
(13, '::1', 'ghazyxlogistik', NULL, '2026-07-06 03:21:53', 0),
(14, '::1', 'ghazyxlogistik', NULL, '2026-07-06 03:22:08', 0),
(15, '::1', 'ghazyxlogistik', NULL, '2026-07-06 03:22:23', 0),
(16, '::1', 'superadmin12@gmail.com', 4, '2026-07-06 03:23:32', 1),
(17, '::1', 'ghazyxlogistik', NULL, '2026-07-06 03:23:48', 0),
(18, '::1', 'superadmin12@gmail.com', 4, '2026-07-06 03:24:35', 1),
(19, '::1', 'ghazy10@gmail.com', 7, '2026-07-06 03:26:34', 1),
(20, '::1', 'superadmin12@gmail.com', 4, '2026-07-06 03:28:53', 1),
(21, '::1', 'ghazy10@gmail.com', 7, '2026-07-06 03:31:52', 1),
(22, '::1', 'superadmin12@gmail.com', 4, '2026-07-06 03:34:22', 1),
(23, '::1', 'siswa@gmail.com', 6, '2026-07-06 03:34:34', 1),
(24, '::1', 'superadmin12@gmail.com', 4, '2026-07-06 03:35:09', 1),
(25, '::1', 'siswa@gmail.com', 6, '2026-07-06 03:35:19', 1),
(26, '::1', 'superadmin12@gmail.com', 4, '2026-07-06 03:39:32', 1),
(27, '::1', 'ghazyxlogistik12', NULL, '2026-07-06 03:41:37', 0),
(28, '::1', 'ghazyxlogistik12', NULL, '2026-07-06 03:41:53', 0),
(29, '::1', 'superadmin12@gmail.com', 4, '2026-07-06 03:41:56', 1),
(30, '::1', 'ghazyxlogistik12', NULL, '2026-07-06 03:42:10', 0),
(31, '::1', 'ghazyxlogistik12', NULL, '2026-07-06 03:42:22', 0),
(32, '::1', 'superadmin12@gmail.com', 4, '2026-07-06 03:42:26', 1),
(33, '::1', 'ghazy15@gmail.com', 8, '2026-07-06 03:42:43', 1),
(34, '::1', 'superadmin12@gmail.com', 4, '2026-07-06 03:42:54', 1),
(35, '::1', 'asep13', NULL, '2026-07-06 03:43:41', 0),
(36, '::1', 'superadmin12@gmail.com', 4, '2026-07-06 03:45:59', 1),
(37, '::1', 'batagorasep@gmail.com', 10, '2026-07-06 03:46:54', 1),
(38, '::1', 'superadmin12@gmail.com', 4, '2026-07-06 03:47:03', 1),
(39, '::1', 'asepbatagor', NULL, '2026-07-06 03:47:20', 0),
(40, '::1', 'batagorasep@gmail.com', 10, '2026-07-06 03:47:27', 1),
(41, '::1', 'superadmin12@gmail.com', 4, '2026-07-06 03:47:39', 1),
(42, '::1', 'superadmin12@gmail.com', 4, '2026-07-06 13:34:55', 1),
(43, '::1', 'superadmin12@gmail.com', 4, '2026-08-02 14:13:25', 1),
(44, '::1', 'superadmin12@gmail.com', 4, '2026-08-02 14:36:49', 1),
(45, '::1', 'superadmin12@gmail.com', 4, '2026-08-12 11:11:30', 1),
(46, '::1', 'superadmin12@gmail.com', 4, '2026-08-12 13:37:44', 1),
(47, '::1', 'superadmin12@gmail.com', 4, '2026-08-12 15:44:25', 1),
(48, '::1', 'superadmin12@gmail.com', 4, '2026-08-14 08:40:22', 1),
(49, '::1', 'asepbatagor', NULL, '2026-08-14 09:01:24', 0),
(50, '::1', 'asep13', NULL, '2026-08-14 09:01:28', 0),
(51, '::1', 'asep13', NULL, '2026-08-14 09:01:37', 0),
(52, '::1', 'superadmin12@gmail.com', 4, '2026-08-14 09:01:42', 1),
(53, '::1', 'siswa@gmail.com', 6, '2026-08-14 09:01:56', 1),
(54, '::1', 'superadmin12@gmail.com', 4, '2026-08-14 09:03:03', 1),
(55, '::1', 'superadmin12@gmail.com', 4, '2026-08-14 09:03:29', 1),
(56, '::1', 'gurulogistik@gmail.com', 5, '2026-08-14 09:03:47', 1),
(57, '::1', 'superadmin12@gmail.com', 4, '2026-08-14 18:19:22', 1),
(58, '::1', 'gurulogistik@gmail.com', 5, '2026-08-14 18:30:24', 1),
(59, '::1', 'siswa@gmail.com', 6, '2026-08-14 18:31:26', 1),
(60, '::1', 'gurulogistik@gmail.com', 5, '2026-08-14 18:31:44', 1),
(61, '::1', 'gurulogistik@gmail.com', 5, '2026-08-14 18:32:19', 1),
(62, '::1', 'siswa@gmail.com', 6, '2026-08-14 18:32:32', 1),
(63, '::1', 'siswa@gmail.com', 6, '2026-08-14 18:36:00', 1),
(64, '::1', 'gurulogistik@gmail.com', 5, '2026-08-14 18:43:15', 1),
(65, '::1', 'siswa@gmail.com', 6, '2026-08-14 18:43:59', 1),
(66, '::1', 'gurulogistik@gmail.com', 5, '2026-08-14 18:53:23', 1),
(67, '::1', 'siswa@gmail.com', 6, '2026-08-14 18:53:33', 1),
(68, '::1', 'gurulogistik@gmail.com', 5, '2026-08-14 18:55:41', 1),
(69, '::1', 'superadmin12@gmail.com', 4, '2026-08-14 18:55:55', 1),
(70, '::1', 'siswa@gmail.com', 6, '2026-08-14 18:58:06', 1),
(71, '::1', 'gurulogistik@gmail.com', 5, '2026-08-14 18:58:52', 1),
(72, '::1', 'siswa@gmail.com', 6, '2026-08-14 18:59:02', 1),
(73, '::1', 'superadmin12@gmail.com', 4, '2026-08-14 18:59:16', 1),
(74, '::1', 'gurulogistik@gmail.com', 5, '2026-08-14 18:59:29', 1),
(75, '::1', 'superadmin12@gmail.com', 4, '2026-08-22 14:52:33', 1),
(76, '::1', 'superadmin12@gmail.com', 4, '2026-08-25 03:52:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `auth_permissions`
--

CREATE TABLE `auth_permissions` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `auth_reset_attempts`
--

CREATE TABLE `auth_reset_attempts` (
  `id` int UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `ip_address` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `user_agent` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `auth_tokens`
--

CREATE TABLE `auth_tokens` (
  `id` int UNSIGNED NOT NULL,
  `selector` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `hashedValidator` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `user_id` int UNSIGNED NOT NULL,
  `expires` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `auth_users_permissions`
--

CREATE TABLE `auth_users_permissions` (
  `user_id` int UNSIGNED NOT NULL DEFAULT '0',
  `permission_id` int UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id_barang` int NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `stok` int NOT NULL,
  `satuan` enum('buah','lusin','box','rim') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `harga_barang` bigint NOT NULL,
  `status` enum('aktif','nonaktif') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT 'aktif',
  `id_supplier` int NOT NULL,
  `id_gudang` int NOT NULL,
  `id_rak` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `nama_barang`, `stok`, `satuan`, `harga_barang`, `status`, `id_supplier`, `id_gudang`, `id_rak`) VALUES
(1, 'Seragam Putih SMA Lengan Panjang', 1000, 'buah', 130000, 'aktif', 1, 1, 2),
(2, 'Seragam Putih SMA Lengan Pendek', 1000, 'buah', 100000, 'aktif', 1, 1, 2),
(3, 'Seragam Batik Lengan Panjang', 1000, 'buah', 130000, 'aktif', 1, 1, 2),
(4, 'Seragam Batik Lengan Pendek', 1000, 'buah', 100000, 'aktif', 1, 1, 2),
(5, 'Seragam Jurusan Lengan Panjang', 1000, 'buah', 130000, 'aktif', 1, 1, 2),
(6, 'Seragam Jurusan Lengan Pendek', 1000, 'buah', 100000, 'aktif', 1, 1, 2),
(7, 'Seragam Pramuka Lengan Panjang', 1000, 'buah', 130000, 'aktif', 1, 1, 2),
(8, 'Seragam Pramuka Lengan Pendek', 1000, 'buah', 100000, 'aktif', 1, 1, 2),
(9, 'Topi Sekolah', 1000, 'buah', 15000, 'aktif', 1, 1, 2),
(10, 'Baret Pramuka', 1000, 'buah', 15000, 'aktif', 1, 1, 2),
(11, 'Topi Boni Pramuka', 0, 'buah', 15000, 'aktif', 1, 1, 2),
(12, 'Badge Seragam Putih', 0, 'buah', 10000, 'aktif', 1, 1, 2),
(13, 'Badge Seragam Pramuka', 0, 'buah', 10000, 'aktif', 1, 1, 2),
(14, 'Sabuk Sekolah', 0, 'buah', 15000, 'aktif', 1, 1, 2),
(15, 'Kaos kaki putih', 0, 'buah', 5000, 'aktif', 1, 1, 2),
(16, 'Kaos kaki pramuka', 0, 'buah', 5000, 'aktif', 1, 1, 2),
(17, 'Kertas HVS A4 70 GSM', 0, 'rim', 50000, 'aktif', 2, 2, 3),
(18, 'Kertas HVS A4 80 GSM', 0, 'rim', 60000, 'aktif', 2, 2, 3),
(19, 'Kertas HVS F4 70 GSM', 0, 'rim', 55000, 'aktif', 2, 2, 3),
(20, 'Pulpen Ballpoint Hitam', 0, 'box', 35000, 'aktif', 3, 2, 3),
(21, 'Pulpen Ballpoint Biru', 0, 'box', 35000, 'aktif', 3, 2, 3),
(22, 'Pulpen Ballpoint Merah', 0, 'box', 35000, 'aktif', 3, 2, 3),
(23, 'Pensil 2B', 0, 'box', 28000, 'aktif', 3, 2, 3);

-- --------------------------------------------------------

--
-- Table structure for table `gudang`
--

CREATE TABLE `gudang` (
  `id_gudang` int NOT NULL,
  `gudang` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `status` enum('aktif','nonaktif') NOT NULL DEFAULT 'aktif'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `gudang`
--

INSERT INTO `gudang` (`id_gudang`, `gudang`, `status`) VALUES
(1, 'Gudang A', 'aktif'),
(2, 'Gudang B', 'aktif'),
(3, 'Gudang C', 'aktif'),
(4, 'Gudang D', 'aktif');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint UNSIGNED NOT NULL,
  `version` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `class` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `group` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `namespace` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `time` int NOT NULL,
  `batch` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '2017-11-20-223112', 'Myth\\Auth\\Database\\Migrations\\CreateAuthTables', 'default', 'Myth\\Auth', 1775630899, 1);

-- --------------------------------------------------------

--
-- Table structure for table `rak`
--

CREATE TABLE `rak` (
  `id_rak` int NOT NULL,
  `rak` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `status` enum('aktif','nonaktif') NOT NULL DEFAULT 'aktif'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `rak`
--

INSERT INTO `rak` (`id_rak`, `rak`, `status`) VALUES
(1, 'Makanan', 'aktif'),
(2, 'Seragam', 'aktif'),
(3, 'ATK', 'aktif'),
(4, 'Sabun', 'nonaktif'),
(5, 'Bahan Pokok', 'nonaktif'),
(6, 'Bengkel', 'nonaktif');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `id_supplier` int NOT NULL,
  `nama_supplier` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `status` varchar(20) DEFAULT 'aktif'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`id_supplier`, `nama_supplier`, `email`, `alamat`, `no_hp`, `status`) VALUES
(1, 'PT. Wijaya Kusuma', 'wijayakusuma@gmail.com', 'Pekalongan, Jawa Timur', '0216524478', 'aktif'),
(2, 'PT. Wirajaya', 'wirajaya@gmail.com', 'Surabaya, Jawa Timur', '021654644', 'aktif'),
(3, 'PT. Berkah Sentosa ', 'berkahsentosa@gmail.com', 'Malang', '0457546545', 'aktif'),
(4, 'PT. Garuda Sakti', 'garudasakti@gmail.com', 'Semarang, Jawa Tengah', '035645147', 'aktif'),
(5, 'PT. Indah Jaya', 'indahjaya@gmail.com', 'JL. Mekar sari no 83, babakan sari Bandung', '02283756412', 'aktif'),
(6, 'PT. Rahman', 'rahman@gmail.com', 'Jaga karsa, Jakarta Selatan ', '02198674523', 'aktif'),
(7, 'PT. Sejahtera', 'sejahtera@gmail.com', 'JL.RE Marta dinata NO.5 Bogor', '02517611901', 'aktif'),
(8, 'PT. Dua putri', 'duaputri@gmail.com', 'JL. Sri gunting NO.1 Bandung', '02211235476', 'aktif');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int NOT NULL,
  `tanggal` date NOT NULL,
  `jenis_transaksi` enum('masuk','keluar') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `jumlah` int NOT NULL,
  `keterangan` text NOT NULL,
  `id_barang` int NOT NULL,
  `id_supplier` int DEFAULT NULL,
  `id_user` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `tanggal`, `jenis_transaksi`, `jumlah`, `keterangan`, `id_barang`, `id_supplier`, `id_user`) VALUES
(1, '2026-08-24', 'masuk', 1000, 'Seragam Lengan Panjang Masuk', 1, 1, 4),
(2, '2026-08-24', 'masuk', 1000, 'Seragam Lengan Pendek Masuk', 2, 1, 4),
(3, '2026-08-24', 'masuk', 1000, 'Seragam Batik Lengan Panjang Masuk', 3, 1, 4),
(4, '2026-08-24', 'masuk', 1000, 'Seragam Batik Lengan Pendek Masuk', 4, 1, 4),
(5, '2026-08-24', 'masuk', 1000, 'Seragam Jurusan Lengan Panjang Masuk', 5, 1, 4),
(6, '2026-08-24', 'masuk', 1000, 'Seragam Jurusan Lengan Pendek Masuk', 6, 1, 4),
(7, '2026-08-24', 'masuk', 1000, 'Seragam Pramuka Lengan Panjang Masuk', 7, 1, 4),
(8, '2026-08-24', 'masuk', 1000, 'Seragam Pramuka Lengan Pendek Masuk', 8, 1, 4),
(9, '2026-08-24', 'masuk', 1000, 'Topi Sekolah Masuk', 9, 1, 4),
(10, '2026-08-24', 'masuk', 1000, 'Baret Pramuka Masuk', 10, 1, 4);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `username` varchar(30) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `password_hash` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `reset_hash` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `reset_at` datetime DEFAULT NULL,
  `reset_expires` datetime DEFAULT NULL,
  `activate_hash` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `status_message` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `force_pass_reset` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `username`, `password_hash`, `reset_hash`, `reset_at`, `reset_expires`, `activate_hash`, `status`, `status_message`, `active`, `force_pass_reset`, `created_at`, `updated_at`, `deleted_at`) VALUES
(4, 'superadmin12@gmail.com', 'adminsuper12', '$2y$10$VpJpo8OGjV8F.pDHKXfZ7eFCUCW8Vw.ankfUmHYc/x/fslRVQDp8e', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2026-07-05 16:02:42', '2026-07-05 16:02:42', NULL),
(5, 'gurulogistik@gmail.com', 'gurulogistik', '$2y$10$Ylae/XcC9iGNhUkwfcl7FOJJWhXh1S.hKgTqND0ftx9ZfBGC6aEXi', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2026-07-05 16:28:57', '2026-08-14 09:03:35', NULL),
(6, 'siswa@gmail.com', 'siswalogistik', '$2y$10$qbx.sghBQfUFE.6cnLteze.JkcCBZ8AvrTtoHX7B/6YKhvQZ.OC/K', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2026-07-05 16:32:10', '2026-07-05 16:32:10', NULL),
(7, 'ghazy10@gmail.com', 'ghazyxlogistik', '$2y$10$KO1fqm7isZzBNBL6VI.YHebBNESPQCr7L0t2ePLndpu9ns93J1OZa', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2026-07-06 03:15:57', '2026-07-06 03:40:33', '2026-07-06 03:40:33'),
(8, 'ghazy15@gmail.com', 'ghazyxlogistik12', '$2y$10$/uSfl4Fv2.7YzLAbCZ/mmeUZGC5POqj5clJ7ps.HHzgsCV3VI4UF2', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2026-07-06 03:41:08', '2026-07-06 03:46:07', '2026-07-06 03:46:07'),
(9, 'aseptambalban@gmail.com', 'asep13', '$2y$10$2RK4NFKc16CaWU9LhDKjMuy300EwmKotsMIIrfJlqpKFXlFrZ1ywu', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2026-07-06 03:43:26', '2026-07-06 03:46:10', '2026-07-06 03:46:10'),
(10, 'batagorasep@gmail.com', 'asepbatagor', '$2y$10$8EuoNEWNDdvz7GOjPV1nuOlRUHyA4ZJP6qyv6rl/6pjQG7nehEGjy', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2026-07-06 03:46:39', '2026-07-06 03:47:10', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `auth_activation_attempts`
--
ALTER TABLE `auth_activation_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_groups`
--
ALTER TABLE `auth_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_groups_permissions`
--
ALTER TABLE `auth_groups_permissions`
  ADD KEY `auth_groups_permissions_permission_id_foreign` (`permission_id`),
  ADD KEY `group_id_permission_id` (`group_id`,`permission_id`);

--
-- Indexes for table `auth_groups_users`
--
ALTER TABLE `auth_groups_users`
  ADD KEY `auth_groups_users_user_id_foreign` (`user_id`),
  ADD KEY `group_id_user_id` (`group_id`,`user_id`);

--
-- Indexes for table `auth_logins`
--
ALTER TABLE `auth_logins`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email` (`email`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `auth_permissions`
--
ALTER TABLE `auth_permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_reset_attempts`
--
ALTER TABLE `auth_reset_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_tokens`
--
ALTER TABLE `auth_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `auth_tokens_user_id_foreign` (`user_id`),
  ADD KEY `selector` (`selector`);

--
-- Indexes for table `auth_users_permissions`
--
ALTER TABLE `auth_users_permissions`
  ADD KEY `auth_users_permissions_permission_id_foreign` (`permission_id`),
  ADD KEY `user_id_permission_id` (`user_id`,`permission_id`);

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`),
  ADD KEY `id_supplier` (`id_supplier`),
  ADD KEY `id_gudang` (`id_gudang`),
  ADD KEY `id_rak` (`id_rak`);

--
-- Indexes for table `gudang`
--
ALTER TABLE `gudang`
  ADD PRIMARY KEY (`id_gudang`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rak`
--
ALTER TABLE `rak`
  ADD PRIMARY KEY (`id_rak`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id_supplier`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_barang` (`id_barang`),
  ADD KEY `id_supplier` (`id_supplier`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `auth_activation_attempts`
--
ALTER TABLE `auth_activation_attempts`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `auth_groups`
--
ALTER TABLE `auth_groups`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `auth_logins`
--
ALTER TABLE `auth_logins`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `auth_permissions`
--
ALTER TABLE `auth_permissions`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `auth_reset_attempts`
--
ALTER TABLE `auth_reset_attempts`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `auth_tokens`
--
ALTER TABLE `auth_tokens`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `gudang`
--
ALTER TABLE `gudang`
  MODIFY `id_gudang` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `rak`
--
ALTER TABLE `rak`
  MODIFY `id_rak` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id_supplier` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `auth_groups_permissions`
--
ALTER TABLE `auth_groups_permissions`
  ADD CONSTRAINT `auth_groups_permissions_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `auth_groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_groups_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `auth_permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `auth_groups_users`
--
ALTER TABLE `auth_groups_users`
  ADD CONSTRAINT `auth_groups_users_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `auth_groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_groups_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `auth_tokens`
--
ALTER TABLE `auth_tokens`
  ADD CONSTRAINT `auth_tokens_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `auth_users_permissions`
--
ALTER TABLE `auth_users_permissions`
  ADD CONSTRAINT `auth_users_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `auth_permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_users_permissions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `barang_ibfk_1` FOREIGN KEY (`id_rak`) REFERENCES `rak` (`id_rak`),
  ADD CONSTRAINT `barang_ibfk_2` FOREIGN KEY (`id_gudang`) REFERENCES `gudang` (`id_gudang`),
  ADD CONSTRAINT `barang_ibfk_3` FOREIGN KEY (`id_supplier`) REFERENCES `supplier` (`id_supplier`);

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `fk_transaksi_user` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`id_supplier`) REFERENCES `supplier` (`id_supplier`),
  ADD CONSTRAINT `transaksi_ibfk_2` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
