-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 22, 2020 at 11:21 AM
-- Server version: 5.7.24
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `homework-copy`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `image`, `created_at`, `updated_at`) VALUES
(5, 'FOOTWARE', 'Footware.jpeg', '2020-11-11 05:29:22', '2020-11-11 05:29:22'),
(6, 'ACCESSORIES', 'accessories.jpeg', '2020-11-11 05:30:17', '2020-11-11 05:30:17'),
(7, 'SHIRTING', 'shirting.jpeg', '2020-11-11 05:30:46', '2020-11-11 05:30:46'),
(8, 'OUTERWARE', 'outerware.jpeg', '2020-11-11 05:30:59', '2020-11-11 05:30:59');

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
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2020_10_02_042325_create_sessions_table', 1),
(7, '2020_10_02_102037_create_categories_table', 1),
(8, '2020_10_02_102038_create_products_table', 1),
(9, '2020_10_03_101829_create_orders_table', 1),
(10, '2020_10_04_112450_crate_oredr_products_table', 1),
(11, '2020_10_05_100334_create_roles_table', 1),
(12, '2020_10_05_100628_create_role_user_table', 1),
(13, '2020_11_04_064930_create_product_sell_counts_table', 1),
(14, '2020_11_22_062903_add_socialite_service_to_users_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `itemCount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `grandTotal` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `paymentMethod` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'cash on delivery',
  `isPaid` tinyint(1) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `name`, `email`, `address`, `itemCount`, `grandTotal`, `paymentMethod`, `isPaid`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'Tansib -Al- Muhaimin', 'tansib.muhaimin@northsouth.edu', 'Bashundhara', '5', '788.08', 'cash_on_delivery', 0, 0, '2020-11-11 05:49:04', '2020-11-11 05:49:04'),
(2, 3, 'Shohag', 'shohag@gmail.com', 'Bashundhara', '3', '1510.65', 'cash_on_delivery', 0, 0, '2020-11-13 03:51:29', '2020-11-13 03:51:29'),
(3, 3, 'Shohag', 'shohag@gmail.com', 'Bashundhara', '3', '1510.65', 'cash_on_delivery', 0, 0, '2020-11-13 04:17:50', '2020-11-13 04:17:50');

-- --------------------------------------------------------

--
-- Table structure for table `order_product`
--

CREATE TABLE `order_product` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `price` double(8,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_product`
--

INSERT INTO `order_product` (`id`, `product_id`, `order_id`, `price`, `quantity`, `created_at`, `updated_at`) VALUES
(1, 3, 1, 257.41, 1, '2020-11-11 05:49:04', '2020-11-11 05:49:04'),
(2, 19, 1, 158.39, 1, '2020-11-11 05:49:04', '2020-11-11 05:49:04'),
(3, 11, 1, 104.86, 2, '2020-11-11 05:49:04', '2020-11-11 05:49:04'),
(4, 9, 1, 129.38, 1, '2020-11-11 05:49:04', '2020-11-11 05:49:04'),
(5, 1, 1, 33.18, 1, '2020-11-11 05:49:04', '2020-11-11 05:49:04'),
(6, 3, 2, 257.41, 3, '2020-11-13 03:51:29', '2020-11-13 03:51:29'),
(7, 3, 3, 257.41, 3, '2020-11-13 04:17:50', '2020-11-13 04:17:50'),
(8, 19, 3, 158.39, 4, '2020-11-13 04:17:50', '2020-11-13 04:17:50'),
(9, 11, 3, 104.86, 1, '2020-11-13 04:17:50', '2020-11-13 04:17:50');

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
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
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
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `featured` tinyint(1) NOT NULL DEFAULT '0',
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `category_id`, `image`, `featured`, `description`, `price`, `created_at`, `updated_at`) VALUES
(1, 'Ms. Amelie Wiza', 8, 'outerware-3.jpg', 1, 'Repellat et eius perferendis nesciunt perferendis. Quidem rerum vel doloribus illum.', 33.18, '2020-11-11 04:33:14', '2020-11-11 07:45:15'),
(2, 'Al Kuvalis', 7, 'shirting-1.jpg', 0, 'Optio officia quis blanditiis sed autem. Deleniti illo dolorum animi quas quis. Perferendis ipsa non reprehenderit.', 19.61, '2020-11-11 04:33:14', '2020-11-13 04:39:28'),
(3, 'Brannon Dare', 6, 'accessories-5.jpg', 1, 'Occaecati provident dolore qui odio neque. Nihil veritatis modi voluptatibus voluptatum et veritatis. Doloribus adipisci eum voluptatem soluta nam sed consequatur et.', 257.41, '2020-11-11 04:33:14', '2020-11-11 08:15:18'),
(4, 'Mrs. Mattie Goodwin III', 5, 'footware-1.jpg', 0, 'Deserunt est et quis. Dolor sunt deserunt nobis eos aut sed. Labore nam dolorum voluptate placeat est. Vel aperiam quo temporibus laudantium dolores esse cum adipisci.', 189.69, '2020-11-11 04:33:14', '2020-11-13 04:46:55'),
(5, 'Mr. Blair McCullough I', 8, 'outerware-2.jpg', 1, 'Quis non qui unde voluptas. Non fugiat eaque soluta sit consectetur. Hic quia saepe iure quisquam eveniet voluptatem. Est aut in accusamus aut non non.', 144.04, '2020-11-11 04:33:14', '2020-11-11 07:42:28'),
(6, 'Rashad Corkery DVM', 7, 'shirting-2.jpg', 0, 'Consequatur asperiores nesciunt est quia inventore autem. Aspernatur omnis pariatur expedita non. Ut provident officia laudantium voluptatibus voluptas.', 160.70, '2020-11-11 04:33:14', '2020-11-13 04:39:43'),
(7, 'Miss Elody Champlin', 6, 'accessories-3.jpg', 0, 'Doloremque voluptate corrupti mollitia unde omnis ad. Dignissimos dolor dicta consequatur reiciendis nemo rerum. In corrupti ullam et sequi nihil soluta laborum.', 282.82, '2020-11-11 04:33:14', '2020-11-11 08:10:19'),
(8, 'Cedrick Mosciski', 5, 'footware-2.jpg', 0, 'Et illo nostrum maiores. Doloribus adipisci sint voluptas alias veritatis ratione nemo. Sit et quod tempora iure. Nihil quisquam aperiam quidem quas maxime explicabo.', 115.00, '2020-11-11 04:33:14', '2020-11-13 04:47:07'),
(9, 'Darius Kilback', 8, 'outerware-4.png', 0, 'Cumque quisquam ex dolor aut eius atque. Recusandae aut magnam commodi possimus quia. Quis molestias expedita aut consequatur omnis inventore vitae a.', 129.38, '2020-11-11 04:33:14', '2020-11-11 07:47:04'),
(10, 'Prof. Ezequiel Mitchell DDS', 7, 'shirting-3.jpg', 0, 'Aut natus consequuntur inventore commodi possimus. Sint libero unde ut nobis. Dolores aliquam optio nobis nemo dicta corporis.', 76.67, '2020-11-11 04:33:14', '2020-11-13 04:40:06'),
(11, 'Colby Quigley', 6, 'accessories-2.jpg', 1, 'Aut sunt impedit at iusto. Laboriosam tempora quidem necessitatibus ratione. Iure odit qui dolores assumenda. Esse et aut neque dolorem. Dolores laborum et iure id praesentium sed et.', 104.86, '2020-11-11 04:33:14', '2020-11-11 08:01:24'),
(12, 'Estella Goyette', 5, 'footware-3.jpg', 0, 'Dicta dicta ea consequatur delectus quo iure. Iste ipsam doloribus fugit assumenda temporibus expedita perspiciatis. Quod vitae laborum dignissimos.', 126.66, '2020-11-11 04:33:14', '2020-11-13 04:47:39'),
(13, 'Prof. Napoleon Harvey', 8, 'outerware-5.jpg', 0, 'Corrupti sed unde adipisci minima autem maiores consequatur. Iure delectus voluptatem eveniet molestias repellendus modi. Animi enim veritatis maiores quia enim consequatur.', 215.73, '2020-11-11 04:33:14', '2020-11-11 07:50:57'),
(14, 'Braxton Schiller', 7, 'shirting-4.jpg', 0, 'Voluptate eveniet consequatur officia adipisci. Repellat officia ut voluptatum earum. Rem at modi inventore qui dolorem ad quis. Quia et consequatur eligendi quod qui.', 225.67, '2020-11-11 04:33:14', '2020-11-13 04:40:25'),
(15, 'Vaughn Batz', 6, 'accessories-4.jpg', 1, 'Placeat earum consequatur nihil ratione beatae deleniti recusandae. Sed assumenda quasi maxime laudantium aut. Et quidem saepe repudiandae.', 231.04, '2020-11-11 04:33:14', '2020-11-11 08:12:05'),
(16, 'Mr. Obie Howell', 5, 'footware-4.jpg', 0, 'Enim eaque quis dicta iure reprehenderit odio et. Qui veniam itaque magnam cumque et laborum deleniti. Dicta hic est est voluptas. Accusantium mollitia unde cupiditate doloremque omnis excepturi.', 95.66, '2020-11-11 04:33:14', '2020-11-13 04:48:03'),
(17, 'Alivia D\'Amore', 8, 'outerware-6.jpg', 0, 'Dicta mollitia rerum totam ut dolorem eaque. Minus consequuntur eum harum. Quam consequuntur aspernatur molestiae.', 278.92, '2020-11-11 04:33:14', '2020-11-11 07:52:42'),
(18, 'Mr. Augustus Prosacco', 7, 'shirting-5.jpg', 0, 'Quaerat et dignissimos voluptas a. Vitae eos odio quia illum qui. Distinctio molestias qui hic expedita nihil sed.', 143.11, '2020-11-11 04:33:14', '2020-11-13 04:41:26'),
(19, 'Brigitte Ondricka', 6, 'accessories-1.jpg', 1, 'Officiis vel eaque ratione odit. Et dolorem et odit culpa odio dicta porro. Vel qui vitae quidem aperiam totam enim. Atque at et ipsum non iusto blanditiis nesciunt.', 158.39, '2020-11-11 04:33:14', '2020-11-11 07:59:57'),
(20, 'Ms. Bernita Murazik', 5, NULL, 0, 'Beatae aliquam occaecati occaecati corporis. Quidem nam voluptas ut nisi. Rem qui voluptatem voluptatibus ea nam.', 261.35, '2020-11-11 04:33:14', '2020-11-11 05:43:14');

-- --------------------------------------------------------

--
-- Table structure for table `product_sell_counts`
--

CREATE TABLE `product_sell_counts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `sell_count` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_sell_counts`
--

INSERT INTO `product_sell_counts` (`id`, `product_id`, `sell_count`, `created_at`, `updated_at`) VALUES
(1, 3, 2, NULL, '2020-11-13 04:17:50'),
(2, 19, 2, NULL, '2020-11-13 04:17:50'),
(3, 11, 2, NULL, '2020-11-13 04:17:50'),
(4, 9, 1, NULL, NULL),
(5, 1, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Admin', '2020-11-11 04:34:20', '2020-11-11 04:34:20'),
(2, 'User', '2020-11-11 04:34:30', '2020-11-11 04:34:30'),
(3, 'Sub Admin', '2020-11-11 04:34:43', '2020-11-11 04:34:43'),
(4, 'Normal User', '2020-11-13 00:22:32', '2020-11-13 00:22:32');

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`id`, `role_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 4, 3, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('2etCPZekptTnyRyhfhiKf3zM0S93tQdAJuw12l0C', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.198 Safari/537.36', 'YTo3OntzOjY6Il90b2tlbiI7czo0MDoiTnRtOFZlTG5halh2a3laU3pGNzZvdzR3VDBYQ1Q0anl1U0xkT2NSTyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzI6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9jYXJ0L29yZGVyIjt9czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czo0MToiaHR0cDovLzEyNy4wLjAuMTo4MDAwL2NhcnQvYWRkLXRvLWNhcnQvMTIiO31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO3M6MTc6InBhc3N3b3JkX2hhc2hfd2ViIjtzOjYwOiIkMnkkMTAkUUhLWm01OWR5MldocFlBdlVzVFlIT3NBcDVGMHBUZ2sydmNvU2JQNWZOWDY2NE90bC8vNksiO3M6MTI6IjFfY2FydF9pdGVtcyI7TzozMjoiRGFycnlsZGVjb2RlXENhcnRcQ2FydENvbGxlY3Rpb24iOjE6e3M6ODoiACoAaXRlbXMiO2E6MTp7aToxMTtPOjMyOiJEYXJyeWxkZWNvZGVcQ2FydFxJdGVtQ29sbGVjdGlvbiI6Mjp7czo5OiIAKgBjb25maWciO2E6Njp7czoxNDoiZm9ybWF0X251bWJlcnMiO2I6MDtzOjg6ImRlY2ltYWxzIjtpOjA7czo5OiJkZWNfcG9pbnQiO3M6MToiLiI7czoxMzoidGhvdXNhbmRzX3NlcCI7czoxOiIsIjtzOjc6InN0b3JhZ2UiO047czo2OiJldmVudHMiO047fXM6ODoiACoAaXRlbXMiO2E6Nzp7czoyOiJpZCI7aToxMTtzOjQ6Im5hbWUiO3M6MTM6IkNvbGJ5IFF1aWdsZXkiO3M6NToicHJpY2UiO2Q6MTA0Ljg2O3M6ODoicXVhbnRpdHkiO2k6MztzOjEwOiJhdHRyaWJ1dGVzIjtPOjQxOiJEYXJyeWxkZWNvZGVcQ2FydFxJdGVtQXR0cmlidXRlQ29sbGVjdGlvbiI6MTp7czo4OiIAKgBpdGVtcyI7YTow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', 1606042353),
('i2UCtP6ipro1eGCt9247X33lPSfIXOOUdNE22vdJ', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.198 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoidmZEQjdzR05sMWJkZHJzMGtFT0VVTHhXM1ZsUmRyMURadHVmeEtJYiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6MzoidXJsIjthOjE6e3M6ODoiaW50ZW5kZWQiO3M6NDE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9jYXJ0L2FkZC10by1jYXJ0LzE1Ijt9czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTtzOjE3OiJwYXNzd29yZF9oYXNoX3dlYiI7czo2MDoiJDJ5JDEwJFFIS1ptNTlkeTJXaHBZQXZVc1RZSE9zQXA1RjBwVGdrMnZjb1NiUDVmTlg2NjRPdGwvLzZLIjt9', 1606037904);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci,
  `isAdmin` tinyint(1) NOT NULL DEFAULT '0',
  `isSuperAdmin` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `service_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `service_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `isAdmin`, `isSuperAdmin`, `created_at`, `updated_at`, `service_name`, `service_id`) VALUES
(1, 'Admin', 'tansib.muhaimin@northsouth.edu', '$2y$10$QHKZm59dy2WhpYAvUsTYHOsAp5F0pTgk2vcoSbP5fNX664Otl//6K', NULL, NULL, 1, 1, '2020-11-11 04:33:14', '2020-11-11 04:33:14', NULL, NULL),
(2, 'Muttakin', 'tansib.muttakin@yahoo.com', '$2y$10$fBSnijgNS57trkr5wsvsI.I19SMolbdKbUkscpecoXGOxgBHumDz6', NULL, NULL, 0, 0, '2020-11-11 04:33:14', '2020-11-11 04:33:14', NULL, NULL),
(3, 'Shohag', 'shohag@gmail.com', '$2y$10$6tAQ61DIZpVxFHxi6YGqlePQ3gEMk1TnaAL6ZC81YeJUcuB0tezwS', NULL, NULL, 0, 0, '2020-11-13 00:22:32', '2020-11-13 00:22:32', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
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
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`);

--
-- Indexes for table `order_product`
--
ALTER TABLE `order_product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_product_product_id_foreign` (`product_id`),
  ADD KEY `order_product_order_id_foreign` (`order_id`);

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_category_id_foreign` (`category_id`);

--
-- Indexes for table `product_sell_counts`
--
ALTER TABLE `product_sell_counts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_sell_counts_product_id_foreign` (`product_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_user_role_id_foreign` (`role_id`),
  ADD KEY `role_user_user_id_foreign` (`user_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `order_product`
--
ALTER TABLE `order_product`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `product_sell_counts`
--
ALTER TABLE `product_sell_counts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `role_user`
--
ALTER TABLE `role_user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `order_product`
--
ALTER TABLE `order_product`
  ADD CONSTRAINT `order_product_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_product_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_sell_counts`
--
ALTER TABLE `product_sell_counts`
  ADD CONSTRAINT `product_sell_counts_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
