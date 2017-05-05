-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 05, 2017 at 02:21 
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crypto`
--

-- --------------------------------------------------------

--
-- Table structure for table `daily`
--

CREATE TABLE `daily` (
  `id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `paket_id` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `join_member`
--

CREATE TABLE `join_member` (
  `id` int(11) NOT NULL,
  `kepala` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `kiri` int(11) NOT NULL DEFAULT '0',
  `kanan` int(11) NOT NULL DEFAULT '0',
  `paket` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `join_member`
--

INSERT INTO `join_member` (`id`, `kepala`, `parent_id`, `member_id`, `kiri`, `kanan`, `paket`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 53, 0, 1, 1, '2017-05-05 04:17:34', '2017-05-05 04:17:34'),
(2, 1, 1, 54, 1, 0, 1, '2017-05-05 04:18:03', '2017-05-05 04:18:03'),
(3, 1, 53, 55, 0, 1, 1, '2017-05-05 04:18:26', '2017-05-05 04:18:26'),
(4, 1, 54, 56, 1, 0, 1, '2017-05-05 04:19:07', '2017-05-05 04:19:07'),
(5, 1, 53, 57, 0, 1, 1, '2017-05-05 04:19:34', '2017-05-05 04:19:34');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `paket`
--

CREATE TABLE `paket` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `price` int(11) NOT NULL DEFAULT '0',
  `daily` float NOT NULL DEFAULT '0',
  `monthly` float NOT NULL DEFAULT '0',
  `contract` int(11) NOT NULL DEFAULT '0',
  `total_benefit` int(11) NOT NULL DEFAULT '0',
  `referal` int(11) NOT NULL DEFAULT '0',
  `pairing` int(11) NOT NULL DEFAULT '0',
  `max_pairing` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `paket`
--

INSERT INTO `paket` (`id`, `nama`, `price`, `daily`, `monthly`, `contract`, `total_benefit`, `referal`, `pairing`, `max_pairing`, `created_at`, `updated_at`) VALUES
(1, 'Trial', 50, 0.4, 12, 180, 172, 5, 0, 0, '2017-04-26 04:54:23', '2017-04-26 04:54:23'),
(2, 'Ceres', 250, 0.5, 15, 180, 190, 6, 6, 125, '2017-04-26 04:54:23', '2017-05-02 22:17:50'),
(3, 'Vesta', 500, 0.6, 18, 180, 208, 7, 7, 250, '2017-04-26 04:54:23', '2017-04-26 04:54:23'),
(4, 'Hygiea', 1000, 0.6, 18, 180, 208, 8, 8, 500, '2017-04-26 04:54:23', '2017-04-26 04:54:23'),
(5, 'Interamnia', 2500, 0.6, 18, 180, 208, 9, 9, 1250, '2017-04-26 04:54:23', '2017-04-26 04:54:23'),
(6, 'Hektor', 5000, 0.7, 21, 180, 226, 10, 10, 2500, '2017-04-26 04:54:23', '2017-04-26 04:54:23'),
(7, 'Themis', 10000, 0.7, 21, 180, 226, 10, 10, 5000, '2017-04-26 04:54:23', '2017-04-26 04:54:23'),
(8, 'Toutatis', 50000, 0.7, 21, 180, 226, 10, 10, 25000, '2017-04-26 04:54:23', '2017-04-26 04:54:23');

-- --------------------------------------------------------

--
-- Table structure for table `referal`
--

CREATE TABLE `referal` (
  `id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `paket_id` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `paket_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `payment` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `paket` int(11) NOT NULL,
  `passport` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `utility` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `wallet` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` enum('admin','member','','') COLLATE utf8mb4_unicode_ci NOT NULL,
  `sejak` datetime NOT NULL,
  `hingga` datetime NOT NULL,
  `aktif` int(11) NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `address`, `phone`, `email`, `paket`, `passport`, `utility`, `wallet`, `password`, `level`, `sejak`, `hingga`, `aktif`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '8998912898', 'admin@admin.com', 2, '776656AAD', 'asgjhagsjhgasj', 'admin@admin.com', '$2y$10$aDT1VA9MnqWuF4jItyKu/u0XWOcURpzeywuOxz8LB9TX4QrP6nIC2', 'admin', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 'O7boEeAULajN6xH0QGHzSYIWN2moKEd6FVK2CMUNbcrkt3ObABcelYjYsDpN', '2017-04-25 23:01:30', '2017-04-26 06:51:36');

-- --------------------------------------------------------

--
-- Table structure for table `wallet`
--

CREATE TABLE `wallet` (
  `id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `type` enum('daily','pair','referal','') NOT NULL,
  `money` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `daily`
--
ALTER TABLE `daily`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `join_member`
--
ALTER TABLE `join_member`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `paket`
--
ALTER TABLE `paket`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `referal`
--
ALTER TABLE `referal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wallet`
--
ALTER TABLE `wallet`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `daily`
--
ALTER TABLE `daily`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `join_member`
--
ALTER TABLE `join_member`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `paket`
--
ALTER TABLE `paket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `referal`
--
ALTER TABLE `referal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;
--
-- AUTO_INCREMENT for table `wallet`
--
ALTER TABLE `wallet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
