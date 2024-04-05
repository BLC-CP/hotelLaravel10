-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 05, 2024 at 05:00 AM
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
-- Database: `eskola`
--

-- --------------------------------------------------------

--
-- Table structure for table `aldeias`
--

CREATE TABLE `aldeias` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nrn_aldeia` varchar(255) NOT NULL,
  `id_suku` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `aldeias`
--

INSERT INTO `aldeias` (`id`, `nrn_aldeia`, `id_suku`, `created_at`, `updated_at`) VALUES
(1, 'Titilari', 1, '2024-03-31 18:27:39', '2024-03-31 18:27:39'),
(2, 'Assalaino', 2, '2024-03-31 18:28:03', '2024-03-31 18:28:03');

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
-- Table structure for table `klientes`
--

CREATE TABLE `klientes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nrn_kliente` varchar(255) NOT NULL,
  `hela_fatin` varchar(255) NOT NULL,
  `id_aldeia` bigint(20) UNSIGNED NOT NULL,
  `id_kuartu` bigint(20) UNSIGNED NOT NULL,
  `data_checking` date NOT NULL,
  `data_checkout` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `klientes`
--

INSERT INTO `klientes` (`id`, `nrn_kliente`, `hela_fatin`, `id_aldeia`, `id_kuartu`, `data_checking`, `data_checkout`, `created_at`, `updated_at`) VALUES
(1, 'Adriana M. L. Magno', 'Mandarin', 1, 1, '2024-04-01', '2024-04-04', '2024-03-31 18:29:47', '2024-03-31 18:29:47'),
(2, 'Josefina Ribeiro', 'Delta', 2, 2, '2023-02-07', '2024-04-10', '2023-03-31 18:30:11', '2023-03-31 18:30:11');

-- --------------------------------------------------------

--
-- Table structure for table `kuartus`
--

CREATE TABLE `kuartus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nu_kuartu` varchar(255) NOT NULL,
  `tipu_kuartu` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kuartus`
--

INSERT INTO `kuartus` (`id`, `nu_kuartu`, `tipu_kuartu`, `created_at`, `updated_at`) VALUES
(1, '001', 'VIP', '2024-03-31 18:28:14', '2024-03-31 18:28:14'),
(2, '002', 'Economi', '2024-03-31 18:28:24', '2024-03-31 18:28:24');

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
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_03_15_061228_create_munisipius_table', 1),
(6, '2024_03_16_060453_create_postus_table', 1),
(7, '2024_03_16_060518_create_sukus_table', 1),
(8, '2024_03_16_060545_create_aldeias_table', 1),
(9, '2024_03_20_130701_create_nasauns_table', 1),
(10, '2024_03_20_131447_create_kuartus_table', 1),
(11, '2024_03_20_131523_create_klientes_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `munisipius`
--

CREATE TABLE `munisipius` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nrn_munisipiu` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `munisipius`
--

INSERT INTO `munisipius` (`id`, `nrn_munisipiu`, `created_at`, `updated_at`) VALUES
(1, 'Lautem', '2024-03-31 18:25:48', '2024-03-31 18:25:48'),
(2, 'Baucau', '2024-03-31 18:25:54', '2024-03-31 18:25:54'),
(3, 'Manatuto', '2024-03-31 18:26:04', '2024-03-31 18:26:04');

-- --------------------------------------------------------

--
-- Table structure for table `nasauns`
--

CREATE TABLE `nasauns` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nrn_nasaun` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nasauns`
--

INSERT INTO `nasauns` (`id`, `nrn_nasaun`, `created_at`, `updated_at`) VALUES
(1, 'Indonesia', '2024-03-31 18:25:24', '2024-03-31 18:25:24'),
(2, 'Filipina', '2024-03-31 18:25:32', '2024-03-31 18:25:32'),
(3, 'Timor Leste', '2024-03-31 18:25:38', '2024-03-31 18:25:38');

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
-- Table structure for table `postus`
--

CREATE TABLE `postus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nrn_postu` varchar(255) NOT NULL,
  `id_munisipiu` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `postus`
--

INSERT INTO `postus` (`id`, `nrn_postu`, `id_munisipiu`, `created_at`, `updated_at`) VALUES
(1, 'Lospalos', 1, '2024-03-31 18:26:16', '2024-03-31 18:26:16'),
(2, 'Baguia', 2, '2024-03-31 18:26:25', '2024-03-31 18:26:25'),
(3, 'Iliomar', 1, '2024-03-31 18:26:50', '2024-03-31 18:26:50');

-- --------------------------------------------------------

--
-- Table structure for table `sukus`
--

CREATE TABLE `sukus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nrn_suku` varchar(255) NOT NULL,
  `id_postu` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sukus`
--

INSERT INTO `sukus` (`id`, `nrn_suku`, `id_postu`, `created_at`, `updated_at`) VALUES
(1, 'Fuiloro', 1, '2024-03-31 18:27:02', '2024-03-31 18:27:02'),
(2, 'Samalari', 2, '2024-03-31 18:27:21', '2024-03-31 18:27:21');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `image`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(4, 'Brito L. da Conceicao', 'brito@gmail.com', '1712284281.png', NULL, '$2y$12$tIb1X6bmEafYloW2AtAdROhAqL0d2CZiogUwLCXtA5XYFsOzg4sN.', NULL, '2024-03-30 17:05:31', '2024-04-04 17:31:21'),
(6, 'Adriana M. L. Magno', 'adriana@gmail.com', '1712151192.png', NULL, '$2y$12$.50JXWRakt6gtJ3TRVRfn.I.eKtkkKcKd45s6FW8SJJbGoqGXt9Ke', NULL, '2024-04-03 04:33:12', '2024-04-03 04:33:12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aldeias`
--
ALTER TABLE `aldeias`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `klientes`
--
ALTER TABLE `klientes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kuartus`
--
ALTER TABLE `kuartus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `munisipius`
--
ALTER TABLE `munisipius`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nasauns`
--
ALTER TABLE `nasauns`
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
-- Indexes for table `postus`
--
ALTER TABLE `postus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sukus`
--
ALTER TABLE `sukus`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `aldeias`
--
ALTER TABLE `aldeias`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `klientes`
--
ALTER TABLE `klientes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `kuartus`
--
ALTER TABLE `kuartus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `munisipius`
--
ALTER TABLE `munisipius`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `nasauns`
--
ALTER TABLE `nasauns`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `postus`
--
ALTER TABLE `postus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sukus`
--
ALTER TABLE `sukus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
