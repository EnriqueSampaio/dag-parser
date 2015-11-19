-- phpMyAdmin SQL Dump
-- version 4.5.1deb3
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 19, 2015 at 11:30 AM
-- Server version: 5.6.27-2
-- PHP Version: 5.6.14-1ubuntu1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dag_parser`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`) VALUES
(1, 'Educação', 'Essa categoria envolve gastos com escolas, universidades, pesquisas e outras fundações e eventos de cunho educacional.'),
(2, 'Política social', 'Essa categoria envolve gastos com instituições beficentes, intituições de cuidados na área da saúde, orfanatos etc.'),
(3, 'Saúde', 'Essa categoria envolve gastos com hospitais, postos de saúde, campanhas de vacinação etc.');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `population` int(11) NOT NULL,
  `founded` date NOT NULL,
  `added_on` date NOT NULL DEFAULT '0000-00-00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `name`, `population`, `founded`, `added_on`) VALUES
(2, 'Ribeirão preto', 666323, '1856-06-19', '2015-11-19');

-- --------------------------------------------------------

--
-- Table structure for table `investiments`
--

CREATE TABLE `investiments` (
  `id` int(10) UNSIGNED NOT NULL,
  `city_id` int(10) UNSIGNED NOT NULL,
  `domain` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `value` decimal(65,2) NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `keywords`
--

CREATE TABLE `keywords` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `keywords`
--

INSERT INTO `keywords` (`id`, `name`, `category_id`) VALUES
(5, 'apm', 1),
(6, 'escola', 1),
(7, 'hospital', 3),
(8, 'orfanato', 2),
(9, 'social', 2),
(10, 'beneficente', 2),
(11, 'grupo de apoio', 2),
(12, 'creche', 1);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2015_10_08_200222_create_cities_table', 1),
('2015_10_08_221412_create_investiments_table', 2),
('2015_10_13_204723_create_categories_table', 3),
('2015_10_13_205340_alter_investiments_table', 3),
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2015_10_08_200222_create_cities_table', 1),
('2015_10_08_221412_create_investiments_table', 2),
('2015_10_16_193500_create_keywords_table', 4),
('2015_10_16_200002_alter_cities_table', 5),
('2015_10_16_200032_alter_investiments_table', 5),
('2015_10_16_200218_alter_investiments_table', 6),
('2015_11_16_143611_change_value_from_double_to_decimal', 7);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_name_unique` (`name`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `investiments`
--
ALTER TABLE `investiments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `investiments_city_id_foreign` (`city_id`),
  ADD KEY `investiments_category_id_foreign` (`category_id`);

--
-- Indexes for table `keywords`
--
ALTER TABLE `keywords`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `keywords_name_unique` (`name`),
  ADD KEY `keywords_category_id_foreign` (`category_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

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
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `investiments`
--
ALTER TABLE `investiments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `keywords`
--
ALTER TABLE `keywords`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `investiments`
--
ALTER TABLE `investiments`
  ADD CONSTRAINT `investiments_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `investiments_city_id_foreign` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`);

--
-- Constraints for table `keywords`
--
ALTER TABLE `keywords`
  ADD CONSTRAINT `keywords_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
