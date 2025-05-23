-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 23, 2025 at 01:29 PM
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
-- Database: `ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `address` varchar(255) NOT NULL,
  `dob` date DEFAULT NULL,
  `departmentId` int(11) DEFAULT NULL,
  `role` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `photo`, `phone`, `address`, `dob`, `departmentId`, `role`, `status`, `created_at`, `updated_at`) VALUES
(7, 'Shamim Hossen', 'samim@gamil.com', '$2y$10$udiLhUumHqns5HECEvp79uxoAW/2WvDYRJL.dnLaml9GL6zRIJBlO', NULL, '123456789', 'Dhaka', '2025-04-22', 1, 0, 0, '2025-04-22 10:34:05', '2025-04-22 10:34:05');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2025_04_20_113635_create_admins_table', 2),
(14, '2025_04_21_064304_create_products_table', 3),
(15, '2025_04_22_092207_create_orders_table', 3),
(16, '2025_04_22_092220_create_order_items_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `userId` bigint(20) UNSIGNED DEFAULT NULL,
  `total` decimal(10,2) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'pending',
  `date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `userId`, `total`, `status`, `date`, `created_at`, `updated_at`) VALUES
(9, 7, 1217.25, 'completed', '2025-04-22', '2025-04-22 10:49:32', '2025-04-23 04:34:44'),
(10, 7, 1886.00, 'refunded', '2025-04-23', '2025-04-22 23:07:04', '2025-04-23 04:34:40'),
(11, 7, 600.00, 'cancelled', '2025-04-23', '2025-04-22 23:46:09', '2025-04-23 04:34:11'),
(12, 7, 3186.59, 'pending', '2025-04-23', '2025-04-22 23:57:37', '2025-04-23 04:39:20'),
(13, 7, 1886.00, 'in_progress', '2025-04-23', '2025-04-23 01:25:48', '2025-04-23 04:31:55'),
(14, 7, 72.84, 'pending', '2025-04-23', '2025-04-23 04:39:57', '2025-04-23 04:40:49');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `orderId` bigint(20) UNSIGNED NOT NULL,
  `productId` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `qty` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `discount` decimal(5,2) NOT NULL DEFAULT 0.00,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `orderId`, `productId`, `name`, `qty`, `price`, `discount`, `created_at`, `updated_at`) VALUES
(20, 9, 2, 'Butter', 1, 150.00, 0.00, '2025-04-22 10:49:32', '2025-04-22 10:49:32'),
(21, 9, 4, 'Orange Juice', 1, 228.00, 5.00, '2025-04-22 10:49:32', '2025-04-22 10:49:32'),
(22, 9, 6, 'Mixed Vasitble', 1, 831.25, 5.00, '2025-04-22 10:49:32', '2025-04-22 10:49:32'),
(23, 10, 1, 'Fruts', 1, 1500.00, 0.00, '2025-04-22 23:07:04', '2025-04-22 23:07:04'),
(24, 10, 2, 'Butter', 1, 150.00, 0.00, '2025-04-22 23:07:04', '2025-04-22 23:07:04'),
(25, 10, 3, 'Green Ful Kofi', 1, 8.00, 0.00, '2025-04-22 23:07:04', '2025-04-22 23:07:04'),
(26, 10, 4, 'Orange Juice', 1, 228.00, 5.00, '2025-04-22 23:07:04', '2025-04-22 23:07:04'),
(27, 11, 2, 'Butter', 4, 150.00, 0.00, '2025-04-22 23:46:09', '2025-04-22 23:46:09'),
(28, 12, 1, 'Fruts', 1, 1500.00, 0.00, '2025-04-22 23:57:37', '2025-04-22 23:57:37'),
(29, 12, 2, 'Butter', 1, 150.00, 0.00, '2025-04-22 23:57:37', '2025-04-22 23:57:37'),
(30, 12, 3, 'Green Ful Kofi', 1, 8.00, 0.00, '2025-04-22 23:57:37', '2025-04-22 23:57:37'),
(31, 12, 4, 'Orange Juice', 1, 228.00, 5.00, '2025-04-22 23:57:37', '2025-04-22 23:57:37'),
(32, 12, 5, 'Tomato Such', 1, 380.00, 0.00, '2025-04-22 23:57:37', '2025-04-22 23:57:37'),
(33, 12, 6, 'Mixed Vasitble', 1, 831.25, 5.00, '2025-04-22 23:57:37', '2025-04-22 23:57:37'),
(34, 12, 7, 'Avocado', 1, 24.50, 2.00, '2025-04-22 23:57:37', '2025-04-22 23:57:37'),
(35, 12, 8, 'Banana', 1, 7.84, 2.00, '2025-04-22 23:57:37', '2025-04-22 23:57:37'),
(36, 12, 9, 'Keukkomber', 1, 57.00, 5.00, '2025-04-22 23:57:37', '2025-04-22 23:57:37'),
(37, 13, 1, 'Fruts', 1, 1500.00, 0.00, '2025-04-23 01:25:48', '2025-04-23 01:25:48'),
(38, 13, 2, 'Butter', 1, 150.00, 0.00, '2025-04-23 01:25:48', '2025-04-23 01:25:48'),
(39, 13, 3, 'Green Ful Kofi', 1, 8.00, 0.00, '2025-04-23 01:25:48', '2025-04-23 01:25:48'),
(40, 13, 4, 'Orange Juice', 1, 228.00, 5.00, '2025-04-23 01:25:48', '2025-04-23 01:25:48'),
(41, 14, 3, 'Green Ful Kofi', 1, 8.00, 0.00, '2025-04-23 04:39:57', '2025-04-23 04:39:57'),
(42, 14, 8, 'Banana', 1, 7.84, 2.00, '2025-04-23 04:39:57', '2025-04-23 04:39:57'),
(43, 14, 9, 'Keukkomber', 1, 57.00, 5.00, '2025-04-23 04:39:57', '2025-04-23 04:39:57');

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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `productName` varchar(255) NOT NULL,
  `sku` varchar(255) NOT NULL,
  `unit` varchar(255) NOT NULL,
  `unitValue` varchar(255) NOT NULL,
  `sellingPrice` decimal(8,2) NOT NULL,
  `purchasePrice` decimal(8,2) NOT NULL,
  `discount` decimal(8,2) DEFAULT NULL,
  `tax` decimal(8,2) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `productName`, `sku`, `unit`, `unitValue`, `sellingPrice`, `purchasePrice`, `discount`, `tax`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Fruts', 'FT', 'piece', '1pcs', 1500.00, 1200.00, 0.00, 5.00, '/img/uploads/pdr-1745316328-1.jpg', '2025-04-22 04:05:28', '2025-04-22 04:05:28'),
(2, 'Butter', 'BT', 'piece', '1pcs', 150.00, 120.00, 0.00, 5.00, '/img/uploads/pdr-1745316355-1.jpg', '2025-04-22 04:05:55', '2025-04-22 04:05:55'),
(3, 'Green Ful Kofi', 'FGK', 'kg', '1kg', 8.00, 15.00, 0.00, 0.00, '/img/uploads/pdr-1745316439-1.jpg', '2025-04-22 04:07:19', '2025-04-22 04:07:19'),
(4, 'Orange Juice', 'OJ', 'piece', '1pcs', 240.00, 180.00, 5.00, 0.00, '/img/uploads/pdr-1745318356-1.png | /img/uploads/pdr-1745318356-2.png | /img/uploads/pdr-1745318356-3.jpg | /img/uploads/pdr-1745318356-4.jpg', '2025-04-22 04:07:54', '2025-04-22 04:39:16'),
(5, 'Tomato Such', 'TS', 'piece', '1pcs', 380.00, 250.00, 0.00, 0.00, '/img/uploads/pdr-1745316498-1.png', '2025-04-22 04:08:18', '2025-04-22 04:08:18'),
(6, 'Mixed Vasitble', 'MV', 'kg', '1kg', 875.00, 500.00, 5.00, 5.00, '/img/uploads/pdr-1745317157-1.jpg', '2025-04-22 04:19:17', '2025-04-22 04:19:17'),
(7, 'Avocado', 'avocado', 'piece', '1pcs', 25.00, 15.00, 2.00, 7.00, '/img/uploads/pdr-1745387805-1.png', '2025-04-22 23:56:45', '2025-04-22 23:56:45'),
(8, 'Banana', 'BNN', 'piece', '1pcs', 8.00, 5.00, 2.00, 7.00, '/img/uploads/pdr-1745387827-1.png', '2025-04-22 23:57:07', '2025-04-22 23:57:07'),
(9, 'Keukkomber', 'KKM', 'kg', '1kg', 60.00, 40.00, 5.00, 8.00, '/img/uploads/pdr-1745387849-1.png', '2025-04-22 23:57:29', '2025-04-22 23:57:29');

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
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'shamim hossain', 'samim@gmail.com', NULL, '$2y$10$ZWb8.KSJsL4GPFZsMGpOoOC.Ha09KO/ATSh6HM9N3JrQ6y6c/94zC', NULL, '2025-04-20 04:29:05', '2025-04-20 04:29:05');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

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
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
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
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
