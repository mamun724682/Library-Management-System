-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 10, 2018 at 11:03 PM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.1.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lms2`
--

-- --------------------------------------------------------

--
-- Table structure for table `book_managements`
--

CREATE TABLE `book_managements` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `author` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `edition` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `session` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `page` int(11) NOT NULL,
  `publisher` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `language` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isbn` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `purchase_date` date NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` double(8,2) NOT NULL,
  `shelf_id` int(10) UNSIGNED NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `book_managements`
--

INSERT INTO `book_managements` (`id`, `title`, `author`, `edition`, `session`, `category_id`, `page`, `publisher`, `language`, `isbn`, `purchase_date`, `quantity`, `price`, `shelf_id`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Data Structure', 'Mamun', '5th', '2018-2019', 1, 500, 'Gono Bishwabidyalay', 'English', '544464', '2018-09-13', 54, 200.00, 1, 'default.jpg', '2018-10-05 12:34:38', '2018-10-05 12:34:38'),
(2, 'Algorithm', 'Tony', '6th', '2018-2019', 2, 505, 'Gono Bishwabidyalay', 'English', '5444646', '2018-09-13', 8, 205.00, 1, 'default.jpg', '2018-10-05 12:34:38', '2018-10-05 12:34:38');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'CSE', '2018-10-05 12:34:37', '2018-10-05 12:34:37'),
(2, 'BBA', '2018-10-05 12:34:37', '2018-10-05 12:34:37');

-- --------------------------------------------------------

--
-- Table structure for table `fines`
--

CREATE TABLE `fines` (
  `id` int(10) UNSIGNED NOT NULL,
  `issue_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `fine` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `issue_books`
--

CREATE TABLE `issue_books` (
  `id` int(10) UNSIGNED NOT NULL,
  `book_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `issue_date` date NOT NULL,
  `return_date` date NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `issue_books`
--

INSERT INTO `issue_books` (`id`, `book_id`, `user_id`, `issue_date`, `return_date`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 3, '2018-10-09', '2018-10-02', 1, '2018-10-05 14:04:44', '2018-10-05 14:05:49'),
(2, 1, 3, '2018-09-28', '2018-10-05', 1, '2018-10-05 14:07:49', '2018-10-05 14:12:52'),
(3, 2, 2, '2018-10-01', '2018-10-04', 1, '2018-10-05 14:23:16', '2018-10-05 14:23:39'),
(4, 2, 2, '2018-10-01', '2018-10-03', 1, '2018-10-05 14:24:22', '2018-10-13 14:38:04'),
(5, 1, 3, '2018-10-01', '2018-10-06', 1, '2018-10-13 14:38:40', '2018-10-10 14:40:38'),
(6, 1, 2, '2018-10-01', '2018-10-05', 1, '2018-10-10 14:58:49', '2018-10-10 15:00:37');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_09_11_104518_create_categories_table', 1),
(4, '2018_09_11_114306_create_shelves_table', 1),
(5, '2018_09_11_121254_create_book_managements_table', 1),
(6, '2018_09_13_110220_create_issue_books_table', 1),
(7, '2018_09_27_105316_create_notices_table', 1),
(8, '2018_10_04_102807_create_fines_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `notices`
--

CREATE TABLE `notices` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notices`
--

INSERT INTO `notices` (`id`, `title`, `description`, `image`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'updated', '<p>jbig,vjh,jgchgcjchggchnfejfldskfhdslfkkkkkkkkkkkkkkkkkkkkkksd;hfgdskfdsjfsdhlfkdshhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhh;;;;;;;;;;;;;</p>', '1538766988.png', 'updated', '2018-10-05 13:16:29', '2018-10-05 13:16:29');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `shelves`
--

CREATE TABLE `shelves` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shelves`
--

INSERT INTO `shelves` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Shelf 1', '2018-10-05 12:34:37', '2018-10-05 12:34:37'),
(2, 'Shelf 2', '2018-10-05 12:34:37', '2018-10-05 12:34:37');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT '0',
  `is_approved` tinyint(1) NOT NULL DEFAULT '0',
  `reg_as` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `identity` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `is_admin`, `is_approved`, `reg_as`, `avatar`, `identity`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@admin.com', '$2y$10$I5qIqS/5BAOwjG0nxk4qCuNOgYklq9F/Ax.vXBof4k573ByydEWHG', 1, 1, '1', 'avatar.jpg', 'default.png', 'ogQGtCkTYWbNTXSjwpSBqQrZXpq6ninNhaBwlUEf9snxpfHBcyBnZUJSXWUw', '2018-10-05 12:34:37', '2018-10-05 12:34:37'),
(2, 'User', 'user@user.com', '$2y$10$EfDPfbbfjWxxupPAeMR7IOzlRLG/7eihKzg4XYjt/gCDLuzDF9suy', 0, 1, '1', 'avatar.jpg', 'default.png', 'joXY3Wg3RYSCLreL8NorSE9KA3qAJn41O1CHKMHHxy1AsLvYScNbxNwY5bmf', '2018-10-05 12:34:37', '2018-10-05 12:34:37'),
(3, 'Rachael D Rice', 'bossbd@gmail.com', '$2y$10$xFE5xz36bJMpkX6QixAp2uj3F5i4Cu0v5nhgmaJw7UDNHtnfCZ46W', 0, 1, '1', '1538768867MaxPixel.freegreatpicture.com-Sony-Gaming-Video-Games-Ps4-Controller-Playstation-2619483.jpg', '1538768867IMG_20180919_113233.jpg', 'fcysQOdLlj0JNUnlDi2XOSOebn42Ji0BpD7Ur7fHHyh3rYMVdDCG3J6dXr8X', '2018-10-05 13:47:47', '2018-10-05 14:03:29');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `book_managements`
--
ALTER TABLE `book_managements`
  ADD PRIMARY KEY (`id`),
  ADD KEY `book_managements_category_id_index` (`category_id`),
  ADD KEY `book_managements_shelf_id_index` (`shelf_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fines`
--
ALTER TABLE `fines`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `issue_books`
--
ALTER TABLE `issue_books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notices`
--
ALTER TABLE `notices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `shelves`
--
ALTER TABLE `shelves`
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
-- AUTO_INCREMENT for table `book_managements`
--
ALTER TABLE `book_managements`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `fines`
--
ALTER TABLE `fines`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `issue_books`
--
ALTER TABLE `issue_books`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `notices`
--
ALTER TABLE `notices`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `shelves`
--
ALTER TABLE `shelves`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `book_managements`
--
ALTER TABLE `book_managements`
  ADD CONSTRAINT `book_managements_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `book_managements_shelf_id_foreign` FOREIGN KEY (`shelf_id`) REFERENCES `shelves` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
