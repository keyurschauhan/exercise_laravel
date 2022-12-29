-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 29, 2022 at 06:47 AM
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
-- Database: `exercise`
--

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` int(11) NOT NULL,
  `state_id` int(11) NOT NULL DEFAULT 0,
  `name` varchar(255) DEFAULT NULL,
  `created_by` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_by` int(11) NOT NULL DEFAULT 0,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `state_id`, `name`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
(1, 3, 'Rajkot', 6, '2022-12-28 11:00:37', 6, '2022-12-28 11:25:22'),
(2, 1, 'Surat', 6, '2022-12-28 11:03:42', 0, '2022-12-28 11:03:42'),
(3, 4, 'Rajkot', 7, '2022-12-28 23:55:39', 0, '2022-12-28 23:55:39'),
(4, 4, 'Surat', 7, '2022-12-28 23:55:52', 0, '2022-12-28 23:55:52'),
(5, 5, 'Delhi-West', 7, '2022-12-28 23:56:12', 0, '2022-12-28 23:56:12');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `created_by` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_by` int(11) NOT NULL DEFAULT 0,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `name`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
(1, 'India', 6, '2022-12-28 07:04:31', 0, '2022-12-28 07:59:09'),
(4, 'USA', 6, '2022-12-28 07:51:38', 6, '2022-12-28 07:59:45'),
(6, 'Canada', 6, '2022-12-28 08:50:56', 6, '2022-12-28 09:29:04'),
(7, 'India', 7, '2022-12-28 23:51:50', 0, '2022-12-28 23:51:50'),
(8, 'USA', 7, '2022-12-28 23:56:30', 0, '2022-12-28 23:56:30');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `code` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `city_id` int(11) NOT NULL DEFAULT 0,
  `pincode` varchar(30) DEFAULT NULL,
  `phone_no` varchar(20) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `web_address` text DEFAULT NULL,
  `gst` varchar(20) DEFAULT NULL,
  `pan` varchar(20) DEFAULT NULL,
  `payment_terms` varchar(255) DEFAULT NULL,
  `created_by` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_by` int(11) NOT NULL DEFAULT 0,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `code`, `name`, `address`, `city_id`, `pincode`, `phone_no`, `email`, `web_address`, `gst`, `pan`, `payment_terms`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
(1, 'C001', 'test', 'rajkot', 2, '360002', '9898989898', 'test@gmail.com', 'mytest.com', '56RT45454545455', '3434323232', NULL, 6, '2022-12-28 20:36:58', 0, '2022-12-28 23:05:45'),
(2, 'C002', 'Roy', NULL, 1, '360002', '9898989898', 'test@gmail.com', 'mytest.com', NULL, NULL, NULL, 6, '2022-12-28 20:37:23', 0, '2022-12-28 23:41:03'),
(5, 'C01', 'Customer-1', 'Rajkot', 3, NULL, '4564564535', 'cus1@gmail.com', 'cust1.com', 'RETD00034544444', '454545ER23', 'Online', 7, '2022-12-29 00:00:10', 0, '2022-12-29 00:02:51');

-- --------------------------------------------------------

--
-- Table structure for table `customer_contact_details`
--

CREATE TABLE `customer_contact_details` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL DEFAULT 0,
  `contact_name` varchar(255) DEFAULT NULL,
  `designation` varchar(50) DEFAULT NULL,
  `phone_no` varchar(20) DEFAULT NULL,
  `mobile_no` varchar(20) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `send_sms_report` tinyint(4) NOT NULL DEFAULT 0,
  `send_sms_invoice` tinyint(4) NOT NULL DEFAULT 0,
  `send_email_report` tinyint(4) NOT NULL DEFAULT 0,
  `send_email_invoice` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer_contact_details`
--

INSERT INTO `customer_contact_details` (`id`, `customer_id`, `contact_name`, `designation`, `phone_no`, `mobile_no`, `email`, `send_sms_report`, `send_sms_invoice`, `send_email_report`, `send_email_invoice`, `created_at`, `updated_at`) VALUES
(35, 1, 'test', NULL, '987987987', '4545454545', 'test@gmail.com', 1, 1, 1, 0, '2022-12-28 23:23:27', '2022-12-28 23:23:27'),
(36, 1, 'test', 'accountant', '6546546544', '4545454545', 'test@gmail.com', 1, 1, 1, 0, '2022-12-28 23:23:27', '2022-12-28 23:23:27'),
(37, 1, 'My Test', NULL, NULL, '3434534343', 'test1@gmail.com', 0, 1, 1, 0, '2022-12-28 23:23:27', '2022-12-28 23:23:27'),
(44, 2, 'test', NULL, NULL, '5656565656', NULL, 0, 1, 0, 0, '2022-12-28 23:41:03', '2022-12-28 23:41:03'),
(45, 2, 'Test1', NULL, NULL, NULL, 'test@gmail.com', 0, 0, 1, 0, '2022-12-28 23:41:03', '2022-12-28 23:41:03'),
(56, 5, 'Contact-1', 'Accountant', '6546546545', '3456455445', 'contact1@gmail.com', 0, 0, 0, 1, '2022-12-29 00:13:46', '2022-12-29 00:13:46'),
(57, 5, 'Contact-2', 'Manager', '6549778888', '3434343434', 'contact2@gmail.com', 1, 0, 0, 0, '2022-12-29 00:13:46', '2022-12-29 00:13:46'),
(58, 5, 'Contact-3', 'Sales', '7878787878', NULL, NULL, 1, 0, 1, 1, '2022-12-29 00:13:46', '2022-12-29 00:13:46');

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
(6, '2022_12_22_151849_create_products_table', 2);

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
-- Table structure for table `states`
--

CREATE TABLE `states` (
  `id` int(11) NOT NULL,
  `country_id` int(11) NOT NULL DEFAULT 0,
  `name` varchar(255) DEFAULT NULL,
  `code` int(11) NOT NULL DEFAULT 0,
  `created_by` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_by` int(11) NOT NULL DEFAULT 0,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`id`, `country_id`, `name`, `code`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
(1, 1, 'Gujrat', 1, 6, '2022-12-28 09:28:25', 6, '2022-12-28 09:32:30'),
(3, 6, 'Texas', 0, 6, '2022-12-28 09:35:50', 6, '2022-12-28 23:41:34'),
(4, 7, 'Gujrat', 1, 7, '2022-12-28 23:55:03', 0, '2022-12-28 23:55:03'),
(5, 7, 'Delhi', 2, 7, '2022-12-28 23:55:21', 0, '2022-12-28 23:55:21'),
(6, 8, 'Texas', 0, 7, '2022-12-28 23:57:00', 0, '2022-12-28 23:57:00');

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
(1, 'Barney Kunde II', 'strosin.torey@example.org', '2022-12-22 05:40:59', '$2y$10$hq3Mrvc3x94roXNLSXFSMuQubAKdkPnWkCmS2ID3KFSiBx9tJ.1Oa', '7ozzyN6byh', '2022-12-22 05:40:59', '2022-12-22 05:40:59'),
(2, 'Ford Moore', 'mytest090901@gmail.com', '2022-12-22 05:40:59', '$2y$10$MkZ7Qpi/NcFWC/Zcb5sqPu4d0AHnU/Y4EKFIgFlPnP.sl1zgh8pCq', 'FxTkhLWhCfH9j2gqabJeg2uIdRakQsoDgu6EdutBAnLcwESFUCzLjC9YHSLP', '2022-12-22 05:40:59', '2022-12-23 00:47:03'),
(3, 'Trinity Wehner', 'plockman@example.com', '2022-12-22 05:40:59', '$2y$10$hq3Mrvc3x94roXNLSXFSMuQubAKdkPnWkCmS2ID3KFSiBx9tJ.1Oa', 'XbXfXwxPLV', '2022-12-22 05:40:59', '2022-12-22 05:40:59'),
(5, 'Keyur Chauhan', 'ck@gmail.com', NULL, '$2y$10$hq3Mrvc3x94roXNLSXFSMuQubAKdkPnWkCmS2ID3KFSiBx9tJ.1Oa', NULL, '2022-12-22 11:43:53', '2022-12-22 11:43:53'),
(6, 'Admin', 'admin@gmail.com', NULL, '$2y$10$1zjsUEvEBsNANYHcdwkRFe7adKbApPwGOVpWA3MPCvW.6WMmVLYaO', NULL, '2022-12-23 00:39:55', '2022-12-23 00:39:55'),
(7, 'TEST', 'TEST34@GMAIL.COM', NULL, '$2y$10$xh/RFU/GHu5JMTFgOi2C.OOIMgZfNEzPBp5GF2r0YdTrITWmollna', NULL, '2022-12-28 23:43:19', '2022-12-28 23:43:19');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_contact_details`
--
ALTER TABLE `customer_contact_details`
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
-- Indexes for table `states`
--
ALTER TABLE `states`
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
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `customer_contact_details`
--
ALTER TABLE `customer_contact_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `states`
--
ALTER TABLE `states`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
