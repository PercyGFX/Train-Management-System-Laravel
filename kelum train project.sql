-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 28, 2023 at 06:55 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `train_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `live_locations`
--

CREATE TABLE `live_locations` (
  `id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `train_id` int(11) NOT NULL,
  `lat` double DEFAULT NULL,
  `lng` double DEFAULT NULL,
  `status` int(45) DEFAULT NULL,
  `delay_time` varchar(100) NOT NULL,
  `delay_status` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `live_locations`
--

INSERT INTO `live_locations` (`id`, `created_at`, `updated_at`, `deleted_at`, `train_id`, `lat`, `lng`, `status`, `delay_time`, `delay_status`) VALUES
(1, NULL, '2023-07-27 13:46:10', NULL, 5, 37.7749, -122.4194, 1, '02:30:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `loyalty_discounts`
--

CREATE TABLE `loyalty_discounts` (
  `id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `badge` varchar(45) DEFAULT NULL,
  `ticket_count` int(11) DEFAULT NULL,
  `dicount_precentage` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `loyalty_discounts`
--

INSERT INTO `loyalty_discounts` (`id`, `created_at`, `updated_at`, `deleted_at`, `badge`, `ticket_count`, `dicount_precentage`) VALUES
(1, NULL, '2023-07-28 04:34:24', NULL, 'Bronze', 1, 2),
(2, NULL, NULL, NULL, 'Gold', 200, 5),
(3, NULL, NULL, NULL, 'Platinum', 500, 7);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `passengers`
--

CREATE TABLE `passengers` (
  `id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `nic` varchar(45) DEFAULT NULL,
  `phone` varchar(45) DEFAULT NULL,
  `city` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `passengers`
--

INSERT INTO `passengers` (`id`, `created_at`, `updated_at`, `deleted_at`, `user_id`, `nic`, `phone`, `city`) VALUES
(1, NULL, NULL, NULL, 1, '6565464', '65464654', 'matara'),
(2, NULL, NULL, NULL, 2, '6564', '76575', 'Mtara'),
(3, NULL, NULL, NULL, 3, 'hgfhg', '786786', '87686'),
(4, '2023-07-28 04:07:51', '2023-07-28 04:07:51', NULL, 6, NULL, NULL, NULL),
(5, '2023-07-28 09:17:04', '2023-07-28 09:17:04', NULL, 4, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) NOT NULL,
  `token` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `order_id` varchar(45) DEFAULT NULL,
  `payment_id` varchar(45) DEFAULT NULL,
  `payhere_amount` varchar(45) DEFAULT NULL,
  `payhere_currency` varchar(45) DEFAULT NULL,
  `status_message` varchar(45) DEFAULT NULL,
  `card_expiry` varchar(45) DEFAULT NULL,
  `card_no` varchar(45) DEFAULT NULL,
  `method` varchar(45) DEFAULT NULL,
  `card_holder_name` varchar(45) DEFAULT NULL,
  `ticket_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE `tickets` (
  `id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `passenger_id` int(11) NOT NULL,
  `train_id` int(11) NOT NULL,
  `qty` int(11) DEFAULT NULL,
  `discount` varchar(45) DEFAULT NULL,
  `ticket_price` varchar(45) DEFAULT NULL,
  `totle_price` varchar(45) DEFAULT NULL,
  `status` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tickets`
--

INSERT INTO `tickets` (`id`, `created_at`, `updated_at`, `deleted_at`, `passenger_id`, `train_id`, `qty`, `discount`, `ticket_price`, `totle_price`, `status`) VALUES
(42, '2023-07-28 07:16:17', '2023-07-28 07:20:14', NULL, 4, 5, 3, '0', '200', '600', 'Completed'),
(43, '2023-07-28 07:20:28', '2023-07-28 07:20:28', NULL, 4, 5, 1, '4', '200', '196', 'Pending'),
(44, '2023-07-28 07:47:36', '2023-07-28 07:47:36', NULL, 4, 5, 3, '12', '200', '588', 'Pending'),
(45, '2023-07-28 08:58:01', '2023-07-28 08:58:01', NULL, 4, 5, 3, '12', '200', '588', 'Pending'),
(46, '2023-07-28 09:06:30', '2023-07-28 09:06:30', NULL, 4, 6, 3, '18', '300', '882', 'Pending'),
(47, '2023-07-28 09:10:24', '2023-07-28 09:10:24', NULL, 4, 6, 2, '12', '300', '588', 'Pending'),
(48, '2023-07-28 09:17:09', '2023-07-28 09:17:09', NULL, 5, 5, 2, '0', '200', '400', 'Pending'),
(49, '2023-07-28 10:36:16', '2023-07-28 10:36:16', NULL, 4, 5, 1, '4', '200', '196', 'Pending'),
(50, '2023-07-28 10:39:11', '2023-07-28 10:39:11', NULL, 4, 5, 1, '4', '200', '196', 'Pending'),
(51, '2023-07-28 10:40:03', '2023-07-28 10:40:03', NULL, 4, 5, 1, '4', '200', '196', 'Pending'),
(52, '2023-07-28 10:42:17', '2023-07-28 10:42:17', NULL, 4, 5, 1, '4', '200', '196', 'Pending'),
(53, '2023-07-28 10:42:32', '2023-07-28 10:42:32', NULL, 4, 5, 1, '4', '200', '196', 'Pending'),
(54, '2023-07-28 10:43:28', '2023-07-28 10:43:28', NULL, 4, 5, 1, '4', '200', '196', 'Pending'),
(55, '2023-07-28 10:43:36', '2023-07-28 10:43:36', NULL, 4, 5, 1, '4', '200', '196', 'Pending'),
(56, '2023-07-28 10:49:10', '2023-07-28 10:49:10', NULL, 4, 5, 1, '4', '200', '196', 'Pending'),
(57, '2023-07-28 10:49:46', '2023-07-28 10:49:46', NULL, 4, 5, 1, '4', '200', '196', 'Pending'),
(58, '2023-07-28 10:52:05', '2023-07-28 10:52:05', NULL, 4, 5, 1, '4', '200', '196', 'Pending'),
(59, '2023-07-28 10:52:21', '2023-07-28 10:52:21', NULL, 4, 5, 1, '4', '200', '196', 'Pending'),
(60, '2023-07-28 10:52:49', '2023-07-28 10:52:49', NULL, 4, 5, 1, '4', '200', '196', 'Pending'),
(61, '2023-07-28 10:53:30', '2023-07-28 10:53:30', NULL, 4, 5, 1, '4', '200', '196', 'Pending'),
(62, '2023-07-28 10:54:50', '2023-07-28 10:54:50', NULL, 4, 5, 1, '4', '200', '196', 'Pending'),
(63, '2023-07-28 10:57:18', '2023-07-28 10:57:18', NULL, 4, 5, 1, '4', '200', '196', 'Pending'),
(64, '2023-07-28 10:58:25', '2023-07-28 10:58:25', NULL, 4, 5, 1, '4', '200', '196', 'Pending'),
(65, '2023-07-28 10:59:22', '2023-07-28 10:59:22', NULL, 4, 5, 1, '4', '200', '196', 'Pending'),
(66, '2023-07-28 10:59:30', '2023-07-28 10:59:30', NULL, 4, 5, 1, '4', '200', '196', 'Pending'),
(67, '2023-07-28 11:01:07', '2023-07-28 11:01:07', NULL, 4, 5, 1, '4', '200', '196', 'Pending'),
(68, '2023-07-28 11:01:58', '2023-07-28 11:01:58', NULL, 4, 5, 3, '12', '200', '588', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `trains`
--

CREATE TABLE `trains` (
  `id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `name` varchar(45) DEFAULT NULL,
  `image` varchar(245) DEFAULT NULL,
  `from` varchar(45) DEFAULT NULL,
  `to` varchar(45) DEFAULT NULL,
  `date` varchar(45) DEFAULT NULL,
  `from_time` time DEFAULT NULL,
  `to_time` time DEFAULT NULL,
  `ticket_price` double DEFAULT NULL,
  `is_active` varchar(45) DEFAULT NULL,
  `seats` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `trains`
--

INSERT INTO `trains` (`id`, `created_at`, `updated_at`, `deleted_at`, `name`, `image`, `from`, `to`, `date`, `from_time`, `to_time`, `ticket_price`, `is_active`, `seats`) VALUES
(5, '2023-07-26 14:09:45', '2023-07-26 14:09:45', NULL, 'Ruhunu Kumari', 'train/pzCpMZVzyb0siDWPFZkK5JbWj0S2TaKOFmeDDnwn.jpg', 'Matara', 'Galle', '2023-07-12', '07:12:00', '12:03:00', 200, '1', 100),
(6, '2023-07-26 14:33:40', '2023-07-26 14:33:40', NULL, 'Galle Kumari', 'train/f1SkLkwCrczN7RppbsKmLdAwNhmScCCeCyEdczkI.jpg', 'Galle', 'Matara', '2023-07-19', '07:12:00', '07:15:00', 300, '1', 100),
(7, '2023-07-26 14:35:27', '2023-07-26 14:38:21', NULL, 'Trinko', 'train/g5AjC2Ulu9Z8aqWoDMdlr0rBv26EP8FpNnTjo1oj.jpg', 'Tinco', 'Kandy', '2023-07-30', '12:05:00', '17:06:00', 100, '0', 100),
(8, '2023-07-28 11:17:09', '2023-07-28 11:17:09', NULL, 'Kandy Kumari', 'train/9aQRiqfBA9puuHsCJUKGW7BwnXt7hhWEGBdcaZOu.jpg', 'Kandy', 'Colombo', '2023-07-30', '12:30:00', '13:34:00', 200, '1', 50);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fname` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `lname` varchar(45) DEFAULT NULL,
  `type` varchar(45) DEFAULT NULL,
  `status` varchar(45) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `lname`, `type`, `status`) VALUES
(1, 'Keshan', 'keshanribelz@gmail.com', NULL, '$2a$12$aDcYoz80jcM9eaYhx8Vn3OxA4F6Lh5uQyMsd.H0QajHSwdMtQYjCG', NULL, NULL, NULL, 'Chathuranga', 'Admin', 'Active'),
(2, 'Namal', 'isurangabtk@gmail.com', NULL, '123', NULL, NULL, NULL, 'Isuranga', 'Passenger', 'Active'),
(3, 'Nimal', 'cybermax098@gmail.com', NULL, 'hhgf', NULL, NULL, NULL, 'Kamal', 'Passenger', 'Active'),
(4, 'Namal', 'namal@gmail.com', NULL, '$2y$10$vpMqu30rVQB8JpJQRSq3LORcDB.bZMN7jpTYO0kRj70KH9KCEzdly', NULL, '2023-07-27 11:11:21', '2023-07-27 11:11:21', 'Bandara', 'Admin', 'Active'),
(5, 'Bandara', 'namal2@gmail.com', NULL, '$2y$10$m/b8lv22cdbagJN7nLmbwu2da1VtcyaFkR9Ux/tgJ6UysAE0FZX6q', NULL, '2023-07-27 11:41:47', '2023-07-27 11:41:47', 'Nimal', 'Passenger', 'Active'),
(6, 'Kamal', 'kamal@gmail.com', NULL, '$2y$10$nH1.UgvTh6vb5i/xPSIzrexgNRv3O7NMKHNq2Dabb3zeXWAdaUPKS', NULL, '2023-07-28 04:05:35', '2023-07-28 04:05:35', 'Silva', 'Passenger', 'Active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `live_locations`
--
ALTER TABLE `live_locations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_live_locations_tickets1_idx` (`train_id`);

--
-- Indexes for table `loyalty_discounts`
--
ALTER TABLE `loyalty_discounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `passengers`
--
ALTER TABLE `passengers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_passengers_users_idx` (`user_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_payments_tickets1_idx` (`ticket_id`);

--
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_tickets_passengers1_idx` (`passenger_id`),
  ADD KEY `fk_tickets_trains1_idx` (`train_id`);

--
-- Indexes for table `trains`
--
ALTER TABLE `trains`
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
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `live_locations`
--
ALTER TABLE `live_locations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `loyalty_discounts`
--
ALTER TABLE `loyalty_discounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `passengers`
--
ALTER TABLE `passengers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `trains`
--
ALTER TABLE `trains`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `live_locations`
--
ALTER TABLE `live_locations`
  ADD CONSTRAINT `fk_live_locations_tickets1` FOREIGN KEY (`train_id`) REFERENCES `trains` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
