-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 22, 2025 at 09:06 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sdn_3_celep`
--

-- --------------------------------------------------------

--
-- Table structure for table `carousel_images`
--

CREATE TABLE `carousel_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `order` int(11) NOT NULL DEFAULT 0,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(7, '2014_10_12_000000_create_users_table', 1),
(8, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(9, '2019_08_19_000000_create_failed_jobs_table', 1),
(10, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(11, '2024_03_21_create_carousel_images_table', 1),
(12, '2025_03_21_182757_create_frontends_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
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
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','guru','siswa') NOT NULL DEFAULT 'siswa',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@example.com', '$2y$12$xfesL1YMmYWiYO73Q03mV.N7Ju.BtSkvYo1row.82kdePUujpBgGi', 'admin', '2025-03-21 11:50:18', '2025-03-21 11:50:18'),
(19, 'Siswa 4', 'siswa4@example.com', '$2y$12$u6fvlmzQvCvBB6iBLJZM8eEKMJ9w7BwEL6UGg0kW6YSCHlIfhnigq', 'siswa', '2025-03-21 22:33:04', '2025-03-21 22:33:04'),
(20, 'Siswa 5', 'siswa5@example.com', '$2y$12$c2lTUctyKtEsdetzsQJJIuSIwtZvXvZDnE1jJdWyYfHs.6dMz.jdm', 'siswa', '2025-03-21 22:33:04', '2025-03-21 22:33:04'),
(21, 'Siswa 6', 'siswa6@example.com', '$2y$12$wjDar5QZMbpk4LxqDXGToeJsHeOqCFdpFjtlQLB4rc4Zv/oPHv886', 'siswa', '2025-03-21 22:33:05', '2025-03-21 22:33:05'),
(22, 'Siswa 7', 'siswa7@example.com', '$2y$12$JJJ4DjonkYwc.sA/DzxHvuwND2rXWLfJZIDlw32lwxJP/4lmDIenG', 'siswa', '2025-03-21 22:33:05', '2025-03-21 22:33:05'),
(23, 'Siswa 8', 'siswa8@example.com', '$2y$12$v3QJSgzudE/9DHfiptRn6Oc8OCoWFVu6SniabhtkT7p4SsqIZH9uW', 'siswa', '2025-03-21 22:33:05', '2025-03-21 22:33:05'),
(24, 'Siswa 9', 'siswa9@example.com', '$2y$12$4jW2Ag88N5uGNHlL1cpQwOMNMLZESCjM0Fz3EZpc8yn3WSFDjjKsi', 'siswa', '2025-03-21 22:33:05', '2025-03-21 22:33:05'),
(25, 'Siswa 10', 'siswa10@example.com', '$2y$12$.pCtiY63TgWLGU7PzPIbSuT5cI69Z/GaEStH/80TbBlzVcQtrmjFq', 'siswa', '2025-03-21 22:33:05', '2025-03-21 22:33:05'),
(26, 'Siswa 11', 'siswa11@example.com', '$2y$12$QFqpRLnRBFvzGfyooBAthO3BtJtADblifi3njiJiFIttITWq0Wr/K', 'siswa', '2025-03-21 22:33:06', '2025-03-21 22:33:06'),
(27, 'Siswa 12', 'siswa12@example.com', '$2y$12$w5l8V5xev9iMmp731F3Vl.22WDuSPP/GaoqolidMPmVhODXhG90wa', 'siswa', '2025-03-21 22:33:06', '2025-03-21 22:33:06'),
(30, 'Siswa 15', 'siswa15@example.com', '$2y$12$hOsyrxSlQt/aMRNA9du0Vebe6ijDNnBgpd9qbcekUN0XpwHDQYrdq', 'siswa', '2025-03-21 22:33:07', '2025-03-21 22:33:07'),
(31, 'Siswa 16', 'siswa16@example.com', '$2y$12$y.fgH80.NPOuB3itX5ZMEeSBVPL.zZhq6lV.CykVrp.preXA8xCcG', 'siswa', '2025-03-21 22:33:07', '2025-03-21 22:33:07'),
(32, 'Siswa 17', 'siswa17@example.com', '$2y$12$BtGh.wgCZt0bMhG9VNj4teacFMAFrK7byACT43lE50TVJQ5d6NxdC', 'siswa', '2025-03-21 22:33:07', '2025-03-21 22:33:07'),
(33, 'Siswa 18', 'siswa18@example.com', '$2y$12$z8ox2aZmpEDrdhbctccS1O47.Xf.B3PEVOXVwzQx1u0ciQKfro./y', 'siswa', '2025-03-21 22:33:07', '2025-03-21 22:33:07'),
(34, 'Siswa 19', 'siswa19@example.com', '$2y$12$XcN1MvH3Adm8vLNXCaFkTe0Ar5XzlqmgSwBIDwMiBamHAYWhU3oL2', 'siswa', '2025-03-21 22:33:07', '2025-03-21 22:33:07'),
(35, 'Siswa 20', 'siswa20@example.com', '$2y$12$oFJQk58OgLCZHQDR9wscneeTVsZsDed9KQwFPxM8I33nrdUmb9ZMK', 'siswa', '2025-03-21 22:33:08', '2025-03-21 22:33:08'),
(39, 'Admin2', 'admin2@example.com', '$2y$12$.oapqHYH8dY0hSSISpvFpeBS9FjCQ9Vr.h1C3nYmqUd5QxDg7Vcxq', 'admin', '2025-03-21 23:25:41', '2025-03-21 23:25:41');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carousel_images`
--
ALTER TABLE `carousel_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

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
-- AUTO_INCREMENT for table `carousel_images`
--
ALTER TABLE `carousel_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
