-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 22, 2022 at 07:43 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hgh`
--

-- --------------------------------------------------------

--
-- Table structure for table `appoinments`
--

CREATE TABLE `appoinments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `schedule_id` int(11) NOT NULL,
  `prescription` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `check` tinyint(1) NOT NULL DEFAULT 0,
  `payment` tinyint(1) NOT NULL DEFAULT 0,
  `patient_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `patient_age` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `patient_weight` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `test` tinyint(1) NOT NULL DEFAULT 0,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `appoinments`
--

INSERT INTO `appoinments` (`id`, `user_id`, `doctor_id`, `schedule_id`, `prescription`, `check`, `payment`, `patient_name`, `patient_age`, `patient_weight`, `test`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 12, 1, 1, NULL, 0, 0, 'Orli Sanchez', '22', '87', 0, '2022-08-05 17:22:09', '2022-08-05 16:34:27', '2022-08-05 17:22:09'),
(2, 12, 1, 1, NULL, 0, 0, 'Anastasia Fox', '50', '86', 1, '2022-08-05 17:22:11', '2022-08-05 17:10:26', '2022-08-05 17:22:11'),
(3, 12, 1, 1, '<p>zdvgdbv</p>', 1, 1, 'Gage Bolton', '67', '62', 1, NULL, '2022-08-05 17:22:18', '2022-08-06 14:10:41'),
(4, 12, 1, 1, NULL, 0, 0, 'Freya Dennis', '21', '45', 0, NULL, '2022-08-22 16:51:52', '2022-08-22 16:52:12');

-- --------------------------------------------------------

--
-- Table structure for table `app_tests`
--

CREATE TABLE `app_tests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `appoinment_id` int(11) NOT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `app_tests`
--

INSERT INTO `app_tests` (`id`, `appoinment_id`, `file`, `created_at`, `updated_at`) VALUES
(4, 3, '1659720248.pdf', '2022-08-05 17:24:08', '2022-08-05 17:24:08');

-- --------------------------------------------------------

--
-- Table structure for table `beds`
--

CREATE TABLE `beds` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT 0,
  `room_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bed_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'bed',
  `booked` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `beds`
--

INSERT INTO `beds` (`id`, `user_id`, `room_number`, `bed_number`, `type`, `booked`, `created_at`, `updated_at`) VALUES
(1, 0, '110', '112', 'Bed', 1, '2022-08-22 16:41:02', '2022-08-22 16:41:02'),
(2, 0, '110', '115', 'Bed', 0, '2022-08-22 16:41:56', '2022-08-22 16:41:56'),
(3, 0, '120', '121', 'OT', 0, '2022-08-22 16:42:09', '2022-08-22 16:42:09'),
(4, 0, '120', '122', 'OT', 1, '2022-08-22 16:42:19', '2022-08-22 16:42:19');

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `special_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `degree` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `details` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `price` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`id`, `user_id`, `special_id`, `degree`, `details`, `deleted_at`, `created_at`, `updated_at`, `price`) VALUES
(1, 2, '1', 'MD, PhD', '<p>Details</p>', NULL, '2022-06-07 15:07:30', '2022-08-05 16:10:00', 100);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` int(11) DEFAULT NULL,
  `body` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `seen` tinyint(1) NOT NULL DEFAULT 0,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `name`, `email`, `mobile`, `body`, `seen`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Nomlanga Bullock', 'cigo@mailinator.com', 50, 'Dolor voluptate quia', 1, '2022-05-24 16:26:52', '2022-05-24 16:13:26', '2022-05-24 16:26:52'),
(2, 'Kiayada Hopkins', 'gimoxyduwy@mailinator.com', 73, 'Delectus et consequ', 0, '2022-06-01 14:40:14', '2022-05-31 14:58:37', '2022-06-01 14:40:14'),
(3, 'Dennis Dawson', 'rivapedac@mailinator.com', 29, 'Ea tempora architect', 1, NULL, '2022-06-01 14:37:55', '2022-06-01 14:39:40'),
(4, 'sadia', 'sadia@gmail.com', 1915970075, 'Hllo thr', 1, NULL, '2022-06-28 09:09:35', '2022-06-28 09:11:27');

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
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2021_11_12_154844_add_role_to_users_table', 1),
(6, '2022_05_22_164241_create_roles_table', 2),
(9, '2014_10_12_000000_create_users_table', 5),
(10, '2022_05_23_215127_create_messages_table', 6),
(11, '2022_05_24_223028_add_image_to_users_table', 7),
(13, '2022_05_31_215755_create_specials_table', 9),
(14, '2022_05_25_221306_create_doctors_table', 10),
(16, '2022_06_08_204447_create_schedules_table', 12),
(18, '2022_08_05_215801_add_price_to_doctors_table', 14),
(20, '2022_06_07_215359_create_appoinments_table', 15),
(21, '2022_08_05_225751_create_app_tests_table', 16),
(23, '2022_08_06_111655_create_payments_table', 17),
(25, '2022_08_21_214352_create_beds_table', 18);

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
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `appoinment_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `transaction_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` double NOT NULL,
  `method` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `appoinment_id`, `user_id`, `mobile`, `transaction_id`, `amount`, `method`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 3, 12, '01915970075', 'jdafgbdsfgb123434', 100, 'Bkash', 1, NULL, '2022-08-06 06:53:49', '2022-08-06 14:06:38');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 1, NULL, '2022-05-22 11:04:53', '2022-05-22 11:04:53'),
(2, 'User', 1, NULL, '2022-05-22 11:14:06', '2022-05-22 11:14:06'),
(3, 'Doctor', 1, NULL, '2022-05-22 12:03:18', '2022-05-22 12:03:18');

-- --------------------------------------------------------

--
-- Table structure for table `schedules`
--

CREATE TABLE `schedules` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `day` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_time` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `end_time` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `schedules`
--

INSERT INTO `schedules` (`id`, `doctor_id`, `day`, `start_time`, `end_time`, `created_at`, `updated_at`) VALUES
(1, 1, 'Sunday', '2022-06-28 09:30:00', '2022-06-28 16:30:00', '2022-06-28 09:30:51', '2022-06-28 09:30:51'),
(2, 1, 'Tuesday', '2022-06-28 06:00:00', '2022-06-28 15:30:00', '2022-06-28 09:32:21', '2022-06-28 09:32:21');

-- --------------------------------------------------------

--
-- Table structure for table `specials`
--

CREATE TABLE `specials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `speciality` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` int(11) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `specials`
--

INSERT INTO `specials` (`id`, `speciality`, `position`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Cardiologists', 1, NULL, '2022-06-04 16:19:41', '2022-06-04 16:19:41'),
(2, 'Neurologists', 2, NULL, '2022-06-04 16:20:45', '2022-06-04 16:20:45');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` int(11) NOT NULL DEFAULT 2,
  `active` tinyint(1) NOT NULL DEFAULT 0,
  `last_login` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role_id`, `active`, `last_login`, `remember_token`, `created_at`, `updated_at`, `image`) VALUES
(1, 'Admin', 'admin@gmail.com', NULL, '$2y$10$qr9mAm8LDFkLc8bdmN4XF.iYfoyehOAbzIKQsleyZAYCziSt31xBW', 1, 1, '2022-08-22 22:11:47', NULL, '2022-05-23 16:42:52', '2022-08-22 16:11:47', NULL),
(2, 'Dr. Kazmi', 'kazmi@gmail.com', NULL, '$2y$10$DknRb4YQWk03XeeoYjbKweq5clVy8k38xzxnBI/aCVfrO2zx.YpE6', 3, 0, NULL, NULL, '2022-05-24 16:36:13', '2022-05-26 16:41:18', '1653583278.jpg'),
(3, 'Dr. Khairul Alam', 'khairul@gmail.com', NULL, '$2y$10$yr1STqNNCYbWjnIvGuSs3.dbvyv2o.s0JBHY80lyNbFjQaR5fgACe', 3, 0, NULL, NULL, '2022-05-27 17:09:04', '2022-05-27 17:14:15', '1653671655.png'),
(8, 'User', 'user@gmail.com', NULL, '$2y$10$pySw1ayZeN5D94bbbx8EcuwdfnEiYfhcPcVR7aNIxNY/vgHnMiy0G', 2, 0, NULL, NULL, '2022-06-07 15:42:34', '2022-06-07 15:42:34', NULL),
(9, 'tonoy', 'tonoy@gmail.com', NULL, '$2y$10$ubDIz3ySTNOIweg7RFHApOvMEweyEa0lLRFOIcOyX6P0oAz4r/Zca', 2, 0, NULL, NULL, '2022-06-28 08:39:53', '2022-06-28 08:55:00', NULL),
(12, 'Imam Hossain', 'imam@hamdarduniversity.edu.bd', NULL, '$2y$10$IEp5XnnC6GI2s86tvoWgeemkfHgzsbPfwq.KwbuAexzrC4MU/FTe6', 2, 0, NULL, NULL, '2022-08-05 15:34:20', '2022-08-06 05:15:16', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appoinments`
--
ALTER TABLE `appoinments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `app_tests`
--
ALTER TABLE `app_tests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `beds`
--
ALTER TABLE `beds`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `schedules`
--
ALTER TABLE `schedules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `specials`
--
ALTER TABLE `specials`
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
-- AUTO_INCREMENT for table `appoinments`
--
ALTER TABLE `appoinments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `app_tests`
--
ALTER TABLE `app_tests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `beds`
--
ALTER TABLE `beds`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `schedules`
--
ALTER TABLE `schedules`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `specials`
--
ALTER TABLE `specials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
