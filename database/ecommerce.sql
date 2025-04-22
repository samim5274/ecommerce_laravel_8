-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 22, 2025 at 01:53 PM
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
(1, 'Shamim Hossain', 'samim@gmail.com', '$2y$10$Q3ef2a6IXyBJ4GTg1OChTObnquGhPfRXNh8dn2KUfvJGLW.AyR1gC', NULL, '123456789', 'Dhaka', '2025-04-20', 1, 0, 0, '2025-04-20 05:57:49', '2025-04-20 05:57:49'),
(2, 'Muhaiminul Islam', 'mohaiminul@gmail.com', '$2y$10$6hLlVrXcEthNwWLa0T7A8uumDScK8LptdB2Xxio8Adua7VhRllHXq', NULL, '123456789', 'Dhaka', '2025-04-20', 1, 0, 0, '2025-04-20 05:59:02', '2025-04-20 05:59:02'),
(3, 'Akbor Hossain', 'akbor@gmail.com', '$2y$10$71nCi43Du2RsTPxS.H6YI.RdtYzA9Fi6RConDWbXgNdPsS5DqSyUG', NULL, '123456789', 'Dhaka', '2025-04-21', 1, 0, 0, '2025-04-20 23:16:02', '2025-04-20 23:16:02'),
(4, 'Shamim Hossain', 'samim@gamil.com', '$2y$10$Ykn.fDYiEsm3.gxRk45uU.eGh71tNxGO.3PLotnu6ewhsijdRClhm', NULL, '123456789', 'Dhaka', '2025-04-21', 1, 0, 0, '2025-04-21 07:14:01', '2025-04-21 07:14:01'),
(5, 'Shamim Hossain', 'samim1@gmail.com', '$2y$10$neLAW.JodELkbt3ZluaHOepOfNm6EnRfKQNMViN.wpKtI7BRrGXdm', NULL, '123456789', 'Dhaka', '2025-04-21', 1, 0, 0, '2025-04-21 11:18:22', '2025-04-21 11:18:22'),
(6, 'Shamim', 'asdf@gmail.com', '$2y$10$7lLxcYPvn/Mv2uAXxPq7gO5oYmds3wUOOgE7Keqf2.LDXGfON08c6', NULL, '123456789', 'Dhaka', '2025-04-22', 1, 0, 0, '2025-04-22 03:05:59', '2025-04-22 03:05:59');

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
(1, 6, 1650.00, 'pending', '2025-04-22', '2025-04-22 04:06:04', '2025-04-22 04:06:04'),
(2, 6, 1650.00, 'pending', '2025-04-22', '2025-04-22 04:06:20', '2025-04-22 04:06:20'),
(3, 6, 628.00, 'pending', '2025-04-22', '2025-04-22 04:08:24', '2025-04-22 04:08:24'),
(4, 6, 228.00, 'pending', '2025-04-22', '2025-04-22 04:43:54', '2025-04-22 04:43:54'),
(5, 6, 912.00, 'pending', '2025-04-22', '2025-04-22 04:46:52', '2025-04-22 04:46:52'),
(6, 6, 1844.00, 'pending', '2025-04-22', '2025-04-22 04:49:47', '2025-04-22 04:49:47'),
(7, 6, 260.00, 'pending', '2025-04-22', '2025-04-22 05:02:40', '2025-04-22 05:02:40'),
(8, 5, 3711.00, 'pending', '2025-04-22', '2025-04-22 05:52:56', '2025-04-22 05:52:56');

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
(1, 1, 2, 'Butter', 1, 150.00, 0.00, '2025-04-22 04:06:04', '2025-04-22 04:06:04'),
(2, 1, 1, 'Fruts', 1, 1500.00, 0.00, '2025-04-22 04:06:04', '2025-04-22 04:06:04'),
(3, 2, 1, 'Fruts', 1, 1500.00, 0.00, '2025-04-22 04:06:20', '2025-04-22 04:06:20'),
(4, 2, 2, 'Butter', 1, 150.00, 0.00, '2025-04-22 04:06:20', '2025-04-22 04:06:20'),
(5, 3, 5, 'Tomato Such', 1, 380.00, 0.00, '2025-04-22 04:08:24', '2025-04-22 04:08:24'),
(6, 3, 4, 'Orange Juice', 1, 240.00, 0.00, '2025-04-22 04:08:24', '2025-04-22 04:08:24'),
(7, 3, 3, 'Green Ful Kofi', 1, 8.00, 0.00, '2025-04-22 04:08:24', '2025-04-22 04:08:24'),
(8, 4, 4, 'Orange Juice', 1, 228.00, 5.00, '2025-04-22 04:43:54', '2025-04-22 04:43:54'),
(9, 5, 4, 'Orange Juice', 4, 228.00, 5.00, '2025-04-22 04:46:52', '2025-04-22 04:46:52'),
(10, 6, 3, 'Green Ful Kofi', 3, 8.00, 0.00, '2025-04-22 04:49:47', '2025-04-22 04:49:47'),
(11, 6, 2, 'Butter', 2, 150.00, 0.00, '2025-04-22 04:49:47', '2025-04-22 04:49:47'),
(12, 6, 5, 'Tomato Such', 4, 380.00, 0.00, '2025-04-22 04:49:47', '2025-04-22 04:49:47'),
(13, 7, 4, 'Orange Juice', 1, 228.00, 5.00, '2025-04-22 05:02:40', '2025-04-22 05:02:40'),
(14, 7, 3, 'Green Ful Kofi', 4, 8.00, 0.00, '2025-04-22 05:02:40', '2025-04-22 05:02:40'),
(15, 8, 2, 'Butter', 1, 150.00, 0.00, '2025-04-22 05:52:56', '2025-04-22 05:52:56'),
(16, 8, 3, 'Green Ful Kofi', 1, 8.00, 0.00, '2025-04-22 05:52:56', '2025-04-22 05:52:56'),
(17, 8, 4, 'Orange Juice', 1, 228.00, 5.00, '2025-04-22 05:52:56', '2025-04-22 05:52:56'),
(18, 8, 6, 'Mixed Vasitble', 4, 831.25, 5.00, '2025-04-22 05:52:56', '2025-04-22 05:52:56');

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
(6, 'Mixed Vasitble', 'MV', 'kg', '1kg', 875.00, 500.00, 5.00, 5.00, '/img/uploads/pdr-1745317157-1.jpg', '2025-04-22 04:19:17', '2025-04-22 04:19:17');

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
