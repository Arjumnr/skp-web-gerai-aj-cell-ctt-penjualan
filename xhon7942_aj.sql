-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 22 Feb 2024 pada 00.58
-- Versi server: 10.5.22-MariaDB-cll-lve
-- Versi PHP: 8.1.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `xhon7942_aj`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `barangs`
--

CREATE TABLE `barangs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_barang` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `kategori` enum('voucher','kartu_biasa','kartu_data','token','pulsa') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `modal` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `stok` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data untuk tabel `barangs`
--

INSERT INTO `barangs` (`id`, `nama_barang`, `gambar`, `kategori`, `modal`, `harga`, `stok`, `created_at`, `updated_at`) VALUES
(17, 'Voucher Tsel 7GB', 'GKL1_Telkomsel - Koleksilogo.com (1).png', 'voucher', '28000', '30000', '20', '2024-02-10 12:26:34', '2024-02-20 21:15:58'),
(19, 'Pulsa Tsel 20 Ribu', 'GKL1_Telkomsel - Koleksilogo.com (1).png', 'pulsa', '20500', '22000', '20', '2024-02-12 10:31:50', '2024-02-20 21:19:24'),
(20, 'Voucher Tri 8GB', 'pngwing.com (3).png', 'voucher', '38000', '40000', '10', '2024-02-12 10:33:18', '2024-02-21 09:12:03'),
(25, 'Voucher Tsel 1,5GB', 'GKL1_Telkomsel - Koleksilogo.com (1).png', 'voucher', '10000', '11000', '30', '2024-02-20 21:09:28', '2024-02-20 21:10:48'),
(26, 'Voucher Tsel 10GB', 'GKL1_Telkomsel - Koleksilogo.com (1).png', 'voucher', '36000', '38000', '20', '2024-02-20 21:10:26', '2024-02-20 21:10:26'),
(28, 'Token Listrik 20', 'token.png', 'token', '20500', '22500', '20', '2024-02-20 21:21:06', '2024-02-21 09:12:37'),
(29, 'Voucher XL 3GB', 'pngegg.png', 'voucher', '11000', '13000', '19', '2024-02-20 21:22:07', '2024-02-21 06:50:57'),
(30, 'Pulsa Tsel 50 Ribu', 'GKL1_Telkomsel - Koleksilogo.com (1).png', 'pulsa', '50500', '52000', '20', '2024-02-20 21:23:16', '2024-02-20 21:23:16'),
(31, 'Voucher XL 10GB', 'pngegg.png', 'voucher', '31000', '33000', '21', '2024-02-20 21:32:27', '2024-02-20 21:32:27'),
(32, 'Voucher Tsel 3GB', 'GKL1_Telkomsel - Koleksilogo.com (1).png', 'voucher', '14500', '16000', '20', '2024-02-20 21:33:52', '2024-02-20 21:33:52'),
(33, 'Pulsa Tsel 100 Ribu', 'GKL1_Telkomsel - Koleksilogo.com (1).png', 'pulsa', '100000', '102000', '10', '2024-02-20 21:34:43', '2024-02-20 21:34:43'),
(34, 'Kartu Tsel 33GB', 'GKL1_Telkomsel - Koleksilogo.com (1).png', 'kartu_data', '90000', '92000', '5', '2024-02-20 21:35:35', '2024-02-20 21:35:35'),
(35, 'Voucher Tsel 7GB', 'GKL1_Telkomsel - Koleksilogo.com (1).png', 'voucher', '28000', '30000', '10', '2024-02-20 21:36:33', '2024-02-20 21:36:33'),
(36, 'Token Listrik 50', 'token.png', 'token', '50500', '52000', '30', '2024-02-20 21:47:26', '2024-02-20 21:47:26'),
(37, 'Voucher Tri 3GB', 'pngwing.com (3).png', 'voucher', '10000', '12000', '20', '2024-02-21 06:36:24', '2024-02-21 06:42:43'),
(38, 'Voucher Tri 5GB', 'pngwing.com (3).png', 'voucher', '33000', '35000', '20', '2024-02-21 06:37:22', '2024-02-21 06:37:22'),
(39, 'Token Listrik 100', 'pngaaa.com-3544137.png', 'token', '100000', '102000', '5', '2024-02-21 06:40:56', '2024-02-21 06:40:56'),
(40, 'Kartu Perdana Tsel', 'GKL1_Telkomsel - Koleksilogo.com (1).png', 'kartu_biasa', '18000', '20000', '10', '2024-02-21 06:45:39', '2024-02-21 06:45:39'),
(41, 'Voucher Tri 18GB', 'pngwing.com (3).png', 'voucher', '60000', '62000', '10', '2024-02-21 06:47:14', '2024-02-21 06:47:14'),
(42, 'Voucher XL 15GB', 'pngegg.png', 'voucher', '43000', '45000', '10', '2024-02-21 09:47:01', '2024-02-21 09:47:01');

-- --------------------------------------------------------

--
-- Struktur dari tabel `keranjangs`
--

CREATE TABLE `keranjangs` (
  `id` int(11) NOT NULL,
  `barang_id` varchar(50) NOT NULL,
  `jumlah` varchar(50) NOT NULL,
  `total` varchar(50) NOT NULL,
  `user_id` varchar(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data untuk tabel `keranjangs`
--

INSERT INTO `keranjangs` (`id`, `barang_id`, `jumlah`, `total`, `user_id`, `status`, `created_at`, `updated_at`) VALUES
(37, '18', '1', '20000', '2', 0, '2024-02-16 16:00:30', '2024-02-16 16:00:30'),
(40, '17', '1', '13000', '2', 0, '2024-02-20 11:39:47', '2024-02-20 11:39:47'),
(41, '20', '1', '40000', '2', 0, '2024-02-20 14:15:12', '2024-02-20 14:15:12'),
(42, '18', '1', '20000', '4', 0, '2024-02-20 14:30:59', '2024-02-20 14:30:59'),
(43, '17', '1', '13000', '5', 0, '2024-02-20 18:04:41', '2024-02-20 18:04:41');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(3, '2024_02_01_171306_barang', 1),
(4, '2024_02_01_171530_provider', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pencatatans`
--

CREATE TABLE `pencatatans` (
  `id` int(11) NOT NULL,
  `barang_id` varchar(50) NOT NULL,
  `jumlah` varchar(50) NOT NULL,
  `total` varchar(50) NOT NULL,
  `user_id` varchar(11) DEFAULT NULL,
  `bukti_tf` varchar(200) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data untuk tabel `pencatatans`
--

INSERT INTO `pencatatans` (`id`, `barang_id`, `jumlah`, `total`, `user_id`, `bukti_tf`, `created_at`, `updated_at`) VALUES
(81, '25', '1', '11000', '1', NULL, '2024-01-01 09:40:00', NULL),
(82, '28', '1', '22500', '2', NULL, '2024-01-01 09:40:00', NULL),
(83, '29', '1', '13000', '3', NULL, '2024-01-01 09:40:00', NULL),
(84, '26', '1', '38000', '4', NULL, '2024-01-01 09:40:00', NULL),
(85, '19', '1', '22000', '5', NULL, '2024-01-02 09:40:00', NULL),
(86, '20', '1', '40000', '6', NULL, '2024-01-02 09:40:00', NULL),
(87, '36', '1', '52000', '7', NULL, '2024-01-02 09:40:00', NULL),
(88, '35', '1', '30000', '8', NULL, '2024-01-02 09:40:00', NULL),
(89, '25', '1', '11000', '9', NULL, '2024-01-02 09:40:00', NULL),
(90, '25', '1', '11000', '10', NULL, '2024-01-02 09:40:00', NULL),
(91, '28', '1', '22500', '11', NULL, '2024-01-02 09:40:00', NULL),
(92, '30', '1', '52000', '12', NULL, '2024-01-03 09:40:00', NULL),
(93, '25', '1', '11000', '13', NULL, '2024-01-03 09:40:00', NULL),
(94, '19', '1', '22000', '14', NULL, '2024-01-03 09:40:00', NULL),
(95, '28', '1', '22500', '15', NULL, '2024-01-03 09:40:00', NULL),
(96, '28', '1', '22500', '10', NULL, '2024-01-03 09:40:00', NULL),
(97, '25', '1', '11000', '1', NULL, '2024-01-03 09:40:00', NULL),
(98, '31', '1', '33000', '18', NULL, '2024-01-04 09:40:00', NULL),
(99, '28', '1', '22500', '4', NULL, '2024-01-04 09:40:00', NULL),
(100, '19', '1', '22000', '19', NULL, '2024-01-04 09:40:00', NULL),
(101, '26', '1', '38000', '3', NULL, '2024-01-04 09:40:00', NULL),
(102, '25', '1', '11000', '20', NULL, '2024-01-04 09:40:00', NULL),
(103, '34', '1', '92000', '21', NULL, '2024-01-04 09:40:00', NULL),
(104, '26', '1', '38000', '14', NULL, '2024-01-05 09:40:00', NULL),
(105, '33', '1', '102000', '22', NULL, '2024-01-05 09:40:00', NULL),
(106, '28', '1', '22500', '23', NULL, '2024-01-05 09:40:00', NULL),
(107, '25', '1', '11000', '15', NULL, '2024-01-05 09:40:00', NULL),
(108, '35', '1', '30000', '24', NULL, '2024-01-05 09:40:00', NULL),
(109, '28', '1', '22500', '25', NULL, '2024-01-06 09:40:00', NULL),
(110, '29', '1', '13000', '26', NULL, '2024-01-06 09:40:00', NULL),
(111, '25', '1', '11000', '9', NULL, '2024-01-06 09:40:00', NULL),
(112, '28', '1', '22500', '9', NULL, '2024-01-06 09:40:00', NULL),
(113, '28', '1', '22500', '8', NULL, '2024-01-06 09:40:00', NULL),
(114, '32', '1', '16000', '27', NULL, '2024-01-07 09:40:00', NULL),
(115, '25', '1', '11000', '29', NULL, '2024-01-07 09:40:00', NULL),
(116, '28', '1', '22500', '28', NULL, '2024-01-07 09:40:00', NULL),
(117, '19', '1', '22000', '7', NULL, '2024-01-07 09:40:00', NULL),
(118, '25', '1', '11000', '20', NULL, '2024-01-07 09:40:00', NULL),
(119, '29', '1', '13000', '30', NULL, '2024-01-08 09:40:00', NULL),
(120, '28', '1', '22500', '31', NULL, '2024-01-08 09:40:00', NULL),
(121, '33', '1', '102000', '32', NULL, '2024-01-08 09:40:00', NULL),
(122, '28', '1', '22500', '33', NULL, '2024-01-08 09:40:00', NULL),
(123, '25', '1', '11000', '34', NULL, '2024-01-08 09:40:00', NULL),
(124, '25', '1', '11000', '35', NULL, '2024-01-08 09:40:00', NULL),
(125, '28', '1', '22500', '2', NULL, '2024-01-09 09:40:00', NULL),
(126, '19', '1', '22000', '14', NULL, '2024-01-09 09:40:00', NULL),
(127, '25', '1', '11000', '15', NULL, '2024-01-09 09:40:00', NULL),
(128, '38', '1', '35000', '6', NULL, '2024-01-09 09:40:00', NULL),
(129, '29', '1', '13000', '3', NULL, '2024-01-09 09:40:00', NULL),
(130, '28', '1', '22500', '30', NULL, '2024-01-09 09:40:00', NULL),
(131, '28', '1', '22500', '3', NULL, '2024-01-09 09:40:00', NULL),
(132, '30', '1', '52000', '36', NULL, '2024-01-09 09:40:00', NULL),
(133, '37', '1', '12000', '37', NULL, '2024-01-10 09:40:00', NULL),
(134, '28', '1', '22500', '38', NULL, '2024-01-10 09:40:00', NULL),
(135, '25', '1', '11000', '38', NULL, '2024-01-10 09:40:00', NULL),
(136, '28', '1', '22500', '39', NULL, '2024-01-10 09:40:00', NULL),
(137, '32', '1', '16000', '40', NULL, '2024-01-10 09:40:00', NULL),
(138, '25', '1', '11000', '41', NULL, '2024-01-10 09:40:00', NULL),
(139, '25', '1', '11000', '42', NULL, '2024-01-10 09:40:00', NULL),
(140, '25', '1', '11000', '43', NULL, '2024-01-11 09:40:00', NULL),
(141, '28', '1', '22500', '44', NULL, '2024-01-11 09:40:00', NULL),
(142, '19', '1', '22000', '33', NULL, '2024-01-11 09:40:00', NULL),
(143, '25', '1', '11000', '1', NULL, '2024-01-11 09:40:00', NULL),
(144, '32', '1', '16000', '27', NULL, '2024-01-11 09:40:00', NULL),
(145, '26', '1', '38000', '45', NULL, '2024-01-12 09:40:00', NULL),
(146, '36', '1', '52000', '20', NULL, '2024-01-12 09:40:00', NULL),
(147, '29', '1', '13000', '23', NULL, '2024-01-12 09:40:00', NULL),
(148, '25', '1', '11000', '1', NULL, '2024-01-12 09:40:00', NULL),
(149, '19', '1', '22000', '5', NULL, '2024-01-12 09:40:00', NULL),
(150, '25', '1', '11000', '46', NULL, '2024-01-12 09:40:00', NULL),
(151, '28', '1', '22500', '15', NULL, '2024-01-15 09:40:50', NULL),
(152, '28', '1', '22500', '9', NULL, '2024-01-15 09:40:50', NULL),
(153, '19', '1', '22000', '47', NULL, '2024-01-15 09:40:50', NULL),
(154, '25', '1', '11000', '20', NULL, '2024-01-15 09:40:50', NULL),
(155, '25', '1', '11000', '10', NULL, '2024-01-15 09:40:50', NULL),
(156, '19', '1', '22000', '14', NULL, '2024-01-15 09:40:50', NULL),
(157, '28', '1', '22500', '58', NULL, '2024-01-17 09:40:50', NULL),
(158, '36', '1', '52000', '14', NULL, '2024-01-17 09:40:50', NULL),
(159, '29', '1', '13000', '2', NULL, '2024-01-17 09:40:50', NULL),
(160, '25', '1', '11000', '29', NULL, '2024-01-17 09:40:50', NULL),
(161, '37', '1', '12000', '37', NULL, '2024-01-18 09:40:50', NULL),
(162, '25', '1', '11000', '35', NULL, '2024-01-18 09:40:50', NULL),
(163, '28', '1', '22500', '48', NULL, '2024-01-18 09:40:50', NULL),
(164, '26', '1', '38000', '49', NULL, '2024-01-18 09:40:50', NULL),
(165, '35', '1', '30000', '50', NULL, '2024-01-18 09:40:50', NULL),
(166, '19', '1', '22000', '51', NULL, '2024-01-19 09:40:50', NULL),
(167, '28', '1', '22500', '52', NULL, '2024-01-19 09:40:50', NULL),
(168, '33', '1', '102000', '53', NULL, '2024-01-19 09:40:50', NULL),
(169, '28', '1', '22500', '12', NULL, '2024-01-19 09:40:50', NULL),
(170, '26', '1', '38000', '70', NULL, '2024-01-20 09:40:50', NULL),
(171, '37', '1', '12000', '54', NULL, '2024-01-20 09:40:50', NULL),
(172, '19', '1', '22000', '19', NULL, '2024-01-20 09:40:50', NULL),
(173, '29', '1', '13000', '3', NULL, '2024-01-20 09:40:50', NULL),
(174, '34', '1', '92000', '55', NULL, '2024-01-20 09:40:50', NULL),
(175, '25', '1', '11000', '38', NULL, '2024-01-21 09:40:50', NULL),
(176, '35', '1', '30000', '24', NULL, '2024-01-21 09:40:50', NULL),
(177, '25', '1', '11000', '13', NULL, '2024-01-21 09:40:50', NULL),
(178, '28', '1', '22500', '25', NULL, '2024-01-21 09:40:50', NULL),
(179, '25', '1', '11000', '29', NULL, '2024-01-22 09:40:50', NULL),
(180, '31', '1', '33000', '18', NULL, '2024-01-22 09:40:50', NULL),
(181, '25', '1', '11000', '15', NULL, '2024-01-22 09:40:50', NULL),
(182, '19', '1', '22000', '5', NULL, '2024-01-22 09:40:50', NULL),
(183, '29', '1', '13000', '30', NULL, '2024-01-22 09:40:50', NULL),
(184, '36', '1', '52000', '36', NULL, '2024-01-22 09:40:50', NULL),
(185, '25', '1', '11000', '56', NULL, '2024-01-23 09:40:50', NULL),
(186, '29', '1', '13000', '57', NULL, '2024-01-23 09:40:50', NULL),
(187, '32', '1', '16000', '40', NULL, '2024-01-23 09:40:50', NULL),
(188, '35', '1', '30000', '8', NULL, '2024-01-23 09:40:50', NULL),
(189, '25', '1', '11000', '13', NULL, '2024-01-23 09:40:50', NULL),
(190, '19', '1', '22000', '33', NULL, '2024-01-23 09:40:50', NULL),
(191, '28', '1', '22500', '56', NULL, '2024-01-24 09:40:50', NULL),
(192, '28', '1', '22500', '2', NULL, '2024-01-24 09:40:50', NULL),
(193, '25', '1', '11000', '46', NULL, '2024-01-24 09:40:50', NULL),
(194, '35', '1', '30000', '43', NULL, '2024-01-24 09:40:50', NULL),
(195, '28', '1', '22500', '23', NULL, '2024-01-24 09:40:50', NULL),
(196, '25', '2', '22000', '58', NULL, '2024-01-24 09:40:50', NULL),
(197, '28', '1', '22500', '4', NULL, '2024-01-25 09:40:50', NULL),
(198, '25', '1', '11000', '1', NULL, '2024-01-25 09:40:50', NULL),
(199, '33', '1', '102000', '59', NULL, '2024-01-25 09:40:50', NULL),
(200, '40', '1', '20000', '60', NULL, '2024-01-25 09:40:50', NULL),
(201, '34', '1', '92000', '61', NULL, '2024-01-26 09:40:50', NULL),
(202, '29', '1', '13000', '62', NULL, '2024-01-26 09:40:50', NULL),
(203, '19', '1', '22000', '7', NULL, '2024-01-26 09:40:50', NULL),
(204, '42', '1', '62000', '63', NULL, '2024-01-26 09:40:50', NULL),
(205, '32', '1', '16000', '29', NULL, '2024-01-27 09:40:50', NULL),
(206, '26', '1', '38000', '52', NULL, '2024-01-27 09:40:50', NULL),
(207, '42', '1', '45000', '23', NULL, '2024-01-27 09:40:50', NULL),
(208, '32', '1', '16000', '64', NULL, '2024-01-27 09:40:50', NULL),
(209, '28', '1', '22500', '65', NULL, '2024-01-27 09:40:50', NULL),
(210, '40', '1', '20000', '66', NULL, '2024-01-27 09:40:50', NULL),
(211, '32', '1', '16000', '67', NULL, '2024-01-27 09:40:50', NULL),
(212, '25', '2', '22000', '45', NULL, '2024-01-27 09:40:50', NULL),
(213, '37', '1', '12000', '54', NULL, '2024-01-28 09:40:50', NULL),
(214, '36', '1', '52000', '68', NULL, '2024-01-28 09:40:50', NULL),
(215, '25', '1', '11000', '20', NULL, '2024-01-28 09:40:50', NULL),
(216, '37', '1', '12000', '37', NULL, '2024-01-28 09:40:50', NULL),
(217, '30', '1', '52000', '69', NULL, '2024-01-28 09:40:50', NULL),
(218, '19', '1', '22000', '47', NULL, '2024-01-28 09:40:50', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `providers`
--

CREATE TABLE `providers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_provider` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data untuk tabel `providers`
--

INSERT INTO `providers` (`id`, `nama_provider`, `created_at`, `updated_at`) VALUES
(22, 'Telkomsel', NULL, NULL),
(23, 'XL', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(9) DEFAULT NULL,
  `username` varchar(9) DEFAULT NULL,
  `level` enum('admin','user') DEFAULT NULL,
  `password` varchar(71) DEFAULT NULL,
  `no_hp` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `level`, `password`, `no_hp`, `created_at`, `updated_at`) VALUES
(1, 'Agus', 'Agus', 'user', '$2y$12$gi/WS/atSPJaWKc5v5AHCOUOIbENllVbL3g7GMgZL016Lw6T3zDgm', '82290050132', '2024-02-01 10:31:35', NULL),
(2, 'Ari', 'Ari', 'user', '$2y$12$gi/WS/atSPJaWKc5v5AHCOUOIbENllVbL3g7GMgZL016Lw6T3zDgm', '82290050132', '2024-02-02 10:31:35', NULL),
(3, 'rahmat', 'rahmat', 'user', '$2y$12$gi/WS/atSPJaWKc5v5AHCOUOIbENllVbL3g7GMgZL016Lw6T3zDgm', '82290050132', '2024-02-03 10:31:35', NULL),
(4, 'saldi', 'saldi', 'user', '$2y$12$gi/WS/atSPJaWKc5v5AHCOUOIbENllVbL3g7GMgZL016Lw6T3zDgm', '82290050132', '2024-02-04 10:31:35', NULL),
(5, 'habib', 'habib', 'user', '$2y$12$gi/WS/atSPJaWKc5v5AHCOUOIbENllVbL3g7GMgZL016Lw6T3zDgm', '82290050132', '2024-02-05 10:31:35', NULL),
(6, 'dika', 'dika', 'user', '$2y$12$gi/WS/atSPJaWKc5v5AHCOUOIbENllVbL3g7GMgZL016Lw6T3zDgm', '82290050132', '2024-02-06 10:31:35', NULL),
(7, 'ahmad', 'ahmad', 'user', '$2y$12$gi/WS/atSPJaWKc5v5AHCOUOIbENllVbL3g7GMgZL016Lw6T3zDgm', '82290050132', '2024-02-07 10:31:35', NULL),
(8, 'sulfadeli', 'sulfadeli', 'user', '$2y$12$gi/WS/atSPJaWKc5v5AHCOUOIbENllVbL3g7GMgZL016Lw6T3zDgm', '82290050132', '2024-02-08 10:31:35', NULL),
(9, 'arjum', 'arjum', 'user', '$2y$12$gi/WS/atSPJaWKc5v5AHCOUOIbENllVbL3g7GMgZL016Lw6T3zDgm', '82290050132', '2024-02-09 10:31:35', NULL),
(10, 'wawan', 'wawan', 'user', '$2y$12$gi/WS/atSPJaWKc5v5AHCOUOIbENllVbL3g7GMgZL016Lw6T3zDgm', '82290050132', '2024-02-10 10:31:35', NULL),
(11, 'agung', 'agung', 'user', '$2y$12$gi/WS/atSPJaWKc5v5AHCOUOIbENllVbL3g7GMgZL016Lw6T3zDgm', '82290050132', '2024-02-11 10:31:35', NULL),
(12, 'widya', 'widya', 'user', '$2y$12$gi/WS/atSPJaWKc5v5AHCOUOIbENllVbL3g7GMgZL016Lw6T3zDgm', '82290050132', '2024-02-12 10:31:35', NULL),
(13, 'afdal', 'afdal', 'user', '$2y$12$gi/WS/atSPJaWKc5v5AHCOUOIbENllVbL3g7GMgZL016Lw6T3zDgm', '82290050132', '2024-02-13 10:31:35', NULL),
(14, 'aad', 'aad', 'user', '$2y$12$gi/WS/atSPJaWKc5v5AHCOUOIbENllVbL3g7GMgZL016Lw6T3zDgm', '82290050132', '2024-02-14 10:31:35', NULL),
(15, 'anjas', 'anjas', 'user', '$2y$12$gi/WS/atSPJaWKc5v5AHCOUOIbENllVbL3g7GMgZL016Lw6T3zDgm', '82290050132', '2024-02-15 10:31:35', NULL),
(17, 'ajcell', 'ajcell', 'admin', '$2y$12$gi/WS/atSPJaWKc5v5AHCOUOIbENllVbL3g7GMgZL016Lw6T3zDgm', '082237964475', '2024-02-21 03:44:55', NULL),
(18, 'aidil', 'aidil', 'user', '$2y$12$ZNKG6YT2iCkCYMHeS94WOOEtm/9WT19seY..Dfkw/efQSdEJB9Z4G', '08123456789', '2024-02-21 09:28:15', '2024-02-21 09:28:15'),
(19, 'wahyu', 'wahyu', 'user', '$2y$12$4gkWrekih4KhWWip63lNIuHTm4nxbXEjEPeTHxE15Yy2SaNIWbzLe', '081234552322', '2024-02-21 09:29:01', '2024-02-21 09:29:01'),
(20, 'sinta', 'sinta', 'user', '$2y$12$fETJNk0m5BuoWPz0aCW0z.s9GaRb0KLRDOPDZlnEru6aZr1u9NWym', '081234552322', '2024-02-21 09:29:29', '2024-02-21 09:29:29'),
(21, 'wila', 'wila', 'user', '$2y$12$h06pziEECpbuptMBWQ6LNeepz1VvKlD8FDHyqWMOnDdf58pnkud7i', '081234552322', '2024-02-21 09:29:45', '2024-02-21 09:29:45'),
(22, 'wira', 'wira', 'user', '$2y$12$WsJwZj0AQjpy4u3zbM20teSR5UURTHutrSaz9/sZXHDzgyDqH5XXm', '081234552211', '2024-02-21 09:30:11', '2024-02-21 09:30:11'),
(23, 'ayyub', 'ayyub', 'user', '$2y$12$WkmWbPvKnyT4EPnaK8J3U.BHS9bhioscpkvl1rICdmKXzLLUHbNDW', '081231212345', '2024-02-21 09:30:35', '2024-02-21 09:30:35'),
(24, 'akbar', 'akbar', 'user', '$2y$12$N4wlHhqPkYnodauLDTEUgu7nvEWt8M87qJyCuM9K5I0N2TuaqBVzW', '081231212345', '2024-02-21 09:31:00', '2024-02-21 09:31:00'),
(25, 'sasa', 'sasa', 'user', '$2y$12$UwOJVT3S0o0tUyiTTHVfcu7nqA8txPm9v2SgXTxueOsHl..9Yt0nu', '08123456789', '2024-02-21 09:31:22', '2024-02-21 09:31:22'),
(26, 'arif', 'arif', 'user', '$2y$12$.5fdZuH7.Ong86ddH1u8LOducvraufc7dFW1S2TsdVqVrmlRInLte', '081234552322', '2024-02-21 09:31:36', '2024-02-21 09:31:36'),
(27, 'alip', 'alip', 'user', '$2y$12$uqWowt/aUDe3Fs6icEW6DOoBQ3dDgcb5qJUJ4YzSGi.iI/xWPgWcC', '081234552211', '2024-02-21 09:32:03', '2024-02-21 09:32:03'),
(28, 'mail', 'mail', 'user', '$2y$12$pJ.GDchd0NfmLJ9fdHTGLucT1epXjJ6a4rLDdgFr3/0r/p2r5snZO', '08123456789', '2024-02-21 09:32:14', '2024-02-21 09:32:14'),
(29, 'lias', 'lias', 'user', '$2y$12$mbN0AUYbuM/PR8e7atdVSOcjOBRKXM31oW.4IQQQwG03/VNU4GOru', '081234552211', '2024-02-21 09:32:26', '2024-02-21 09:32:26'),
(30, 'juna', 'juna', 'user', '$2y$12$n7BMUHjgvrG4plXtPXrQ0ORp12eBJRQXw9zp5MZTFY8t3DuPLIKom', '082237964475', '2024-02-21 09:33:33', '2024-02-21 09:33:33'),
(31, 'cece', 'cece', 'user', '$2y$12$g2YqNKNesAAyOx3AIEc5Y.729cvM6YLnigmDjrfKfXFrHFEliPwZG', '081234552322', '2024-02-21 09:33:45', '2024-02-21 09:33:45'),
(32, 'wanda', 'wanda', 'user', '$2y$12$vZwecZzLwZwuhNAXvcLTZO49MefiFWpNWDmUtcW9XmQf.8NFf.Hwe', '08123456789', '2024-02-21 09:33:59', '2024-02-21 09:33:59'),
(33, 'gilang', 'gilang', 'user', '$2y$12$SrXhzKfcaCoSH.DTyQkdgOdneS4EfIiUcHO0WtStaAOjg7jrurwFy', '082237964475', '2024-02-21 09:34:13', '2024-02-21 09:34:13'),
(34, 'aldi', 'aldi', 'user', '$2y$12$fkIQXu3baR40TFEnOaLhXO7gzFgxbvBQciuzZ93D9v21AdmYOgy26', '081214768199', '2024-02-21 09:34:36', '2024-02-21 09:34:36'),
(35, 'fira', 'fira', 'user', '$2y$12$3FR.2S45g.l26UToY5We5etcfRhg.TV8y3P2t8HGok2wd5mW7qMT2', '082237964475', '2024-02-21 09:35:34', '2024-02-21 09:35:34'),
(36, 'pakherman', 'pakherman', 'user', '$2y$12$bGF0grOU2bi9JQKj9I8MGeW9mJ.rcEESwAnX3VdmgD35qZ4EfGQbK', '081234552322', '2024-02-21 09:36:28', '2024-02-21 09:36:28'),
(37, 'sape', 'sape', 'user', '$2y$12$ahNuVYDEQX6iS.fIFbDJLel41s8DwcHWZVydej24KW7SYFblsByey', '081231212345', '2024-02-21 09:36:46', '2024-02-21 09:36:46'),
(38, 'faiz', 'faiz', 'user', '$2y$12$m9JJEuVoVuwsdZi9kNG0VepHdlmloFMO1Mk3ZWS8swsqHhMISaX1K', '081214768199', '2024-02-21 09:37:01', '2024-02-21 09:37:01'),
(39, 'imma', 'imma', 'user', '$2y$12$3xj9uI5fCSUNufF/t1PaDusX865BJpIBN/QWQEZ34m4ojVgm1lTCa', '082133332111', '2024-02-21 09:37:28', '2024-02-21 09:37:28'),
(40, 'sanda', 'sanda', 'user', '$2y$12$fZi7MSB5kVUw.5911y3Ra.yCPZL7Y9sJakGAL0ZnAb4PpWL3W.9VC', '081214768199', '2024-02-21 09:37:41', '2024-02-21 09:37:41'),
(41, 'beni', 'beni', 'user', '$2y$12$KNDGhQ2DJH8Ll5aYc9t2d.Vh5kOzm6qh7RQ3hG9BfL91Q4CP/yyWu', '081234552322', '2024-02-21 09:37:52', '2024-02-21 09:37:52'),
(42, 'roby', 'roby', 'user', '$2y$12$y7RY6k9DYaiqhfJRaEubd.KYgbsUZbtTwWISjFUyCPKOkmigEQiiq', '081234552322', '2024-02-21 09:38:04', '2024-02-21 09:38:04'),
(43, 'rio', 'rio', 'user', '$2y$12$uZ5urbpHPLPv5XQz1NMrm.sn3VvyeJKinnfQbVEvmv/Qn6Bcj/fc.', '08123456789', '2024-02-21 09:38:21', '2024-02-21 09:38:21'),
(44, 'lisda', 'lisda', 'user', '$2y$12$2eSur/blQ/f.RCUol.ezheMsKxXBMgxulXwnu1N8jqxs/wT28Cxbu', '081234552322', '2024-02-21 09:38:31', '2024-02-21 09:38:31'),
(45, 'sahrul', 'sahrul', 'user', '$2y$12$3p9vdPSdCzqHgpGvDx5dJO4FVv1ei1pmroxURfsw7Qsb.V8jCO8AS', '08123456789', '2024-02-21 09:39:27', '2024-02-21 09:39:27'),
(46, 'caca', 'caca', 'user', '$2y$12$Kh1bhVOVLKut1gZ7.Wjmj.m3bUwwT14kJPDN6u9a16nkyPUd8skrW', '081214768199', '2024-02-21 09:39:48', '2024-02-21 09:39:48'),
(47, 'hikma', 'hikma', 'user', '$2y$12$xfzuxn5810hDhOFo7DqFgOJ/0L3Shmux2fZIMqN2mJmUEAt0a2lYC', '081234552211', '2024-02-21 09:40:07', '2024-02-21 09:40:07'),
(48, 'tilo', 'tilo', 'user', '$2y$12$po3XqmAXpa3wDjq00OcHFuhHj.xw71ik9ELnGtVRtypa6KNk9m3oK', '081231212345', '2024-02-21 09:40:21', '2024-02-21 09:40:21'),
(49, 'dinda', 'dinda', 'user', '$2y$12$0JJh.T19lFW.ooNf6mL5i.q6EnSEzDkAcLaItF1eYE.aNj8AfndIe', '081234552322', '2024-02-21 09:40:36', '2024-02-21 09:40:36'),
(50, 'risal', 'risal', 'user', '$2y$12$adzQZ9VXNu8z6N3oidSES.VEIa4IdFzXhzBxq622hH31nlqXQWPmu', '081231212345', '2024-02-21 09:40:50', '2024-02-21 09:40:50'),
(51, 'sandi', 'sandi', 'user', '$2y$12$yxKl8/acaFx4G4eGaM5jbesyBcnbQOjBSyLq94WWOmRFN.ml.iHme', '081234552322', '2024-02-21 09:41:06', '2024-02-21 09:41:06'),
(52, 'pani', 'pani', 'user', '$2y$12$qJR8IjZNlKD4fQW2sj0njuoEnE3oGahgeVFioLcaNgqtACvXRfi4C', '081234552211', '2024-02-21 09:41:20', '2024-02-21 09:41:20'),
(53, 'pakjaya', 'pakjaya', 'user', '$2y$12$YQtUaCvok8871Mwkih2gIu5G94vs0U3yQ.7sMAisaRgHX48fAJdxS', '081234552322', '2024-02-21 09:41:35', '2024-02-21 09:41:35'),
(54, 'kelvin', 'kelvin', 'user', '$2y$12$AcEE5RS6Y/n3E/v5EnXeSu.gLWEhzRk8WCVvT.zwXYTdFXNdDr0fG', '081234552322', '2024-02-21 09:41:49', '2024-02-21 09:41:49'),
(55, 'cali', 'cali', 'user', '$2y$12$Pc7FI8Jz11sVBV7LXDrW/epF6uyEz5aSNv9CO9p7G.inL4Toy.4i.', '081234552211', '2024-02-21 09:41:57', '2024-02-21 09:41:57'),
(56, 'ria', 'ria', 'user', '$2y$12$Fr9FrqWIfTPSo/z6DjoQm.Hu227yS7OcbsRi7He.EmEW8uzX3QU/G', '082237964475', '2024-02-21 09:42:17', '2024-02-21 09:42:17'),
(57, 'cakra', 'cakra', 'user', '$2y$12$2uYM4t0NIoNWVDaU7ybuzOhhmnO6/q6m8BKWQdPnqkXz4RdCi8LFm', '081231212345', '2024-02-21 09:42:30', '2024-02-21 09:42:30'),
(58, 'wikra', 'wikra', 'user', '$2y$12$PlCTJDGc8SCBBatX4ZZYQuF34Frf3W2rxoIvpNAUliIHetBC83u8y', '081231212345', '2024-02-21 09:42:51', '2024-02-21 09:42:51'),
(59, 'paklukman', 'paklukman', 'user', '$2y$12$qRfVOqMTWNekvDfOp2duY.5dE8PFgxTOU7Px5KpKaN6aBhdutUC9C', '08123456789', '2024-02-21 09:43:04', '2024-02-21 09:43:04'),
(60, 'fauza', 'fauza', 'user', '$2y$12$ojLcGo0zTjjhOzBtzwdb7eBb8/QeUqwnLtHPePjynRlGhIIdlyG9u', '081234552322', '2024-02-21 09:43:21', '2024-02-21 09:43:21'),
(61, 'akram', 'akram', 'user', '$2y$12$ssBHlDFekcjGUdwHagNYCOuIBQSyZbwVrK0PnYHDtbrSbmlX9C9la', '082237964475', '2024-02-21 09:43:32', '2024-02-21 09:43:32'),
(62, 'andika', 'andika', 'user', '$2y$12$5kAlz9O37je6k5mMeC4V1eIZUYQ9ZX5JW/GhuuqJrcFAgJgCmRW8G', '081231212345', '2024-02-21 09:43:44', '2024-02-21 09:43:44'),
(63, 'krisma', 'krisma', 'user', '$2y$12$Hq7wHsSnUSYkLONRNwqrAex26d8h5gVNV64IR9NDESyypo1emPLCu', '081214768199', '2024-02-21 09:43:57', '2024-02-21 09:43:57'),
(64, 'sabri', 'sabri', 'user', '$2y$12$acBwmbWB4GOCSNBfwAsgpOlQu/Lc1XeO8G5qWh.JslzhlOkd5fLgG', '081214768199', '2024-02-21 09:44:09', '2024-02-21 09:44:09'),
(65, 'dedi', 'dedi', 'user', '$2y$12$vfsQHSV0aqMx7u8.IH.T1.F.tYnEJOMKqx9J3Y1jaDaUf3vbfcIlK', '081214768199', '2024-02-21 09:44:19', '2024-02-21 09:44:19'),
(66, 'aslin', 'aslin', 'user', '$2y$12$2Emu8Fk.NDwlhnsEpOZ9ju7s3k82lHvtyNtALVu8WIYm7eApQz4N.', '08123456789', '2024-02-21 09:44:30', '2024-02-21 09:44:30'),
(67, 'dilla', 'dilla', 'user', '$2y$12$XmI2BQaMn4ruZqAHJrmwL.7/1USCqAzRw.hTCvuzgbfcHK7MozkaW', '082237964475', '2024-02-21 09:44:43', '2024-02-21 09:44:43'),
(68, 'mei', 'mei', 'user', '$2y$12$oe.lEaBHBYBuVBaJE7dUo.UBjb0TlbIB2oMv4mwdVIusl8fZxa7YG', '081234552322', '2024-02-21 09:44:56', '2024-02-21 09:44:56'),
(69, 'ika', 'ika', 'user', '$2y$12$CRsjwZ9VvPQGNshrkSveUOra/drm7gVTei7yRa2dxw0wD.y4Wj.sC', '081234552322', '2024-02-21 09:45:07', '2024-02-21 09:45:07'),
(70, 'safran', 'safran', 'user', '$2y$12$rhmW2vR7.n8IUlWRKmNNZu3c9CmNUAnoPL1gCgLf14Ce/a3dRbsIm', '081234552211', '2024-02-21 10:14:16', '2024-02-21 10:14:16');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `barangs`
--
ALTER TABLE `barangs`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `keranjangs`
--
ALTER TABLE `keranjangs`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pencatatans`
--
ALTER TABLE `pencatatans`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `providers`
--
ALTER TABLE `providers`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `barangs`
--
ALTER TABLE `barangs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT untuk tabel `keranjangs`
--
ALTER TABLE `keranjangs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `pencatatans`
--
ALTER TABLE `pencatatans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=219;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `providers`
--
ALTER TABLE `providers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
