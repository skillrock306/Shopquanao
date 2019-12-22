-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 22, 2019 at 03:41 AM
-- Server version: 5.7.21
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `voyager`
--

-- --------------------------------------------------------

--
-- Table structure for table `attributes`
--

DROP TABLE IF EXISTS `attributes`;
CREATE TABLE IF NOT EXISTS `attributes` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `status` enum('ACTIVE','INACTIVE') CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT 'ACTIVE',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attributes`
--

INSERT INTO `attributes` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Màu', 'ACTIVE', '2019-11-17 21:21:16', '2019-11-17 21:21:16'),
(2, 'Size', 'ACTIVE', '2019-11-17 21:21:26', '2019-11-17 21:21:26');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `parent_id` int(10) UNSIGNED DEFAULT NULL,
  `order` int(11) NOT NULL DEFAULT '1',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `categories_slug_unique` (`slug`),
  KEY `categories_parent_id_foreign` (`parent_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `parent_id`, `order`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, NULL, 1, 'Category 1', 'category-1', '2019-11-04 02:15:27', '2019-11-04 02:15:27'),
(2, NULL, 1, 'Category 2', 'category-2', '2019-11-04 02:15:27', '2019-11-04 02:15:27');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

DROP TABLE IF EXISTS `customers`;
CREATE TABLE IF NOT EXISTS `customers` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `phone_number` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `sex` tinyint(1) NOT NULL,
  `status` enum('ACTIVE','INACTIVE') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'ACTIVE',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `date`, `phone_number`, `email`, `password`, `sex`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Nguyễn Tấn Trung', '2019-11-11', '013123123', 'nguyentantrung3006@gmail.com', '12345678', 1, 'ACTIVE', '2019-11-18 01:05:30', '2019-11-18 01:13:52');

-- --------------------------------------------------------

--
-- Table structure for table `data_rows`
--

DROP TABLE IF EXISTS `data_rows`;
CREATE TABLE IF NOT EXISTS `data_rows` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `data_type_id` int(10) UNSIGNED NOT NULL,
  `field` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `required` tinyint(1) NOT NULL DEFAULT '0',
  `browse` tinyint(1) NOT NULL DEFAULT '1',
  `read` tinyint(1) NOT NULL DEFAULT '1',
  `edit` tinyint(1) NOT NULL DEFAULT '1',
  `add` tinyint(1) NOT NULL DEFAULT '1',
  `delete` tinyint(1) NOT NULL DEFAULT '1',
  `details` text COLLATE utf8mb4_unicode_ci,
  `order` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `data_rows_data_type_id_foreign` (`data_type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=96 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `data_rows`
--

INSERT INTO `data_rows` (`id`, `data_type_id`, `field`, `type`, `display_name`, `required`, `browse`, `read`, `edit`, `add`, `delete`, `details`, `order`) VALUES
(1, 1, 'id', 'number', 'ID', 1, 0, 0, 0, 0, 0, NULL, 1),
(2, 1, 'name', 'text', 'Name', 1, 1, 1, 1, 1, 1, NULL, 2),
(3, 1, 'email', 'text', 'Email', 1, 1, 1, 1, 1, 1, NULL, 3),
(4, 1, 'password', 'password', 'Password', 1, 0, 0, 1, 1, 0, NULL, 4),
(5, 1, 'remember_token', 'text', 'Remember Token', 0, 0, 0, 0, 0, 0, NULL, 5),
(6, 1, 'created_at', 'timestamp', 'Created At', 0, 1, 1, 0, 0, 0, NULL, 6),
(7, 1, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, NULL, 7),
(8, 1, 'avatar', 'image', 'Avatar', 0, 1, 1, 1, 1, 1, NULL, 8),
(9, 1, 'user_belongsto_role_relationship', 'relationship', 'Role', 0, 1, 1, 1, 1, 0, '{\"model\":\"TCG\\\\Voyager\\\\Models\\\\Role\",\"table\":\"roles\",\"type\":\"belongsTo\",\"column\":\"role_id\",\"key\":\"id\",\"label\":\"display_name\",\"pivot_table\":\"roles\",\"pivot\":0}', 10),
(10, 1, 'user_belongstomany_role_relationship', 'relationship', 'Roles', 0, 1, 1, 1, 1, 0, '{\"model\":\"TCG\\\\Voyager\\\\Models\\\\Role\",\"table\":\"roles\",\"type\":\"belongsToMany\",\"column\":\"id\",\"key\":\"id\",\"label\":\"display_name\",\"pivot_table\":\"user_roles\",\"pivot\":\"1\",\"taggable\":\"0\"}', 11),
(11, 1, 'settings', 'hidden', 'Settings', 0, 0, 0, 0, 0, 0, NULL, 12),
(12, 2, 'id', 'number', 'ID', 1, 0, 0, 0, 0, 0, NULL, 1),
(13, 2, 'name', 'text', 'Name', 1, 1, 1, 1, 1, 1, NULL, 2),
(14, 2, 'created_at', 'timestamp', 'Created At', 0, 0, 0, 0, 0, 0, NULL, 3),
(15, 2, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, NULL, 4),
(16, 3, 'id', 'number', 'ID', 1, 0, 0, 0, 0, 0, NULL, 1),
(17, 3, 'name', 'text', 'Name', 1, 1, 1, 1, 1, 1, NULL, 2),
(18, 3, 'created_at', 'timestamp', 'Created At', 0, 0, 0, 0, 0, 0, NULL, 3),
(19, 3, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, NULL, 4),
(20, 3, 'display_name', 'text', 'Display Name', 1, 1, 1, 1, 1, 1, NULL, 5),
(21, 1, 'role_id', 'text', 'Role', 1, 1, 1, 1, 1, 1, NULL, 9),
(22, 4, 'id', 'number', 'ID', 1, 0, 0, 0, 0, 0, NULL, 1),
(23, 4, 'parent_id', 'select_dropdown', 'Parent', 0, 0, 1, 1, 1, 1, '{\"default\":\"\",\"null\":\"\",\"options\":{\"\":\"-- None --\"},\"relationship\":{\"key\":\"id\",\"label\":\"name\"}}', 2),
(24, 4, 'order', 'text', 'Order', 1, 1, 1, 1, 1, 1, '{\"default\":1}', 3),
(25, 4, 'name', 'text', 'Name', 1, 1, 1, 1, 1, 1, NULL, 4),
(26, 4, 'slug', 'text', 'Slug', 1, 1, 1, 1, 1, 1, '{\"slugify\":{\"origin\":\"name\"}}', 5),
(27, 4, 'created_at', 'timestamp', 'Created At', 0, 0, 1, 0, 0, 0, NULL, 6),
(28, 4, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, NULL, 7),
(29, 5, 'id', 'number', 'ID', 1, 0, 0, 0, 0, 0, NULL, 1),
(30, 5, 'author_id', 'text', 'Author', 1, 0, 1, 1, 0, 1, NULL, 2),
(31, 5, 'category_id', 'text', 'Category', 1, 0, 1, 1, 1, 0, NULL, 3),
(32, 5, 'title', 'text', 'Title', 1, 1, 1, 1, 1, 1, NULL, 4),
(33, 5, 'excerpt', 'text_area', 'Excerpt', 1, 0, 1, 1, 1, 1, NULL, 5),
(34, 5, 'body', 'rich_text_box', 'Body', 1, 0, 1, 1, 1, 1, NULL, 6),
(35, 5, 'image', 'image', 'Post Image', 0, 1, 1, 1, 1, 1, '{\"resize\":{\"width\":\"1000\",\"height\":\"null\"},\"quality\":\"70%\",\"upsize\":true,\"thumbnails\":[{\"name\":\"medium\",\"scale\":\"50%\"},{\"name\":\"small\",\"scale\":\"25%\"},{\"name\":\"cropped\",\"crop\":{\"width\":\"300\",\"height\":\"250\"}}]}', 7),
(36, 5, 'slug', 'text', 'Slug', 1, 0, 1, 1, 1, 1, '{\"slugify\":{\"origin\":\"title\",\"forceUpdate\":true},\"validation\":{\"rule\":\"unique:posts,slug\"}}', 8),
(37, 5, 'meta_description', 'text_area', 'Meta Description', 1, 0, 1, 1, 1, 1, NULL, 9),
(38, 5, 'meta_keywords', 'text_area', 'Meta Keywords', 1, 0, 1, 1, 1, 1, NULL, 10),
(39, 5, 'status', 'select_dropdown', 'Status', 1, 1, 1, 1, 1, 1, '{\"default\":\"DRAFT\",\"options\":{\"PUBLISHED\":\"published\",\"DRAFT\":\"draft\",\"PENDING\":\"pending\"}}', 11),
(40, 5, 'created_at', 'timestamp', 'Created At', 0, 1, 1, 0, 0, 0, NULL, 12),
(41, 5, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, NULL, 13),
(42, 5, 'seo_title', 'text', 'SEO Title', 0, 1, 1, 1, 1, 1, NULL, 14),
(43, 5, 'featured', 'checkbox', 'Featured', 1, 1, 1, 1, 1, 1, NULL, 15),
(44, 6, 'id', 'number', 'ID', 1, 0, 0, 0, 0, 0, NULL, 1),
(45, 6, 'author_id', 'text', 'Author', 1, 0, 0, 0, 0, 0, NULL, 2),
(46, 6, 'title', 'text', 'Title', 1, 1, 1, 1, 1, 1, NULL, 3),
(47, 6, 'excerpt', 'text_area', 'Excerpt', 1, 0, 1, 1, 1, 1, NULL, 4),
(48, 6, 'body', 'rich_text_box', 'Body', 1, 0, 1, 1, 1, 1, NULL, 5),
(49, 6, 'slug', 'text', 'Slug', 1, 0, 1, 1, 1, 1, '{\"slugify\":{\"origin\":\"title\"},\"validation\":{\"rule\":\"unique:pages,slug\"}}', 6),
(50, 6, 'meta_description', 'text', 'Meta Description', 1, 0, 1, 1, 1, 1, NULL, 7),
(51, 6, 'meta_keywords', 'text', 'Meta Keywords', 1, 0, 1, 1, 1, 1, NULL, 8),
(52, 6, 'status', 'select_dropdown', 'Status', 1, 1, 1, 1, 1, 1, '{\"default\":\"INACTIVE\",\"options\":{\"INACTIVE\":\"INACTIVE\",\"ACTIVE\":\"ACTIVE\"}}', 9),
(53, 6, 'created_at', 'timestamp', 'Created At', 1, 1, 1, 0, 0, 0, NULL, 10),
(54, 6, 'updated_at', 'timestamp', 'Updated At', 1, 0, 0, 0, 0, 0, NULL, 11),
(55, 6, 'image', 'image', 'Page Image', 0, 1, 1, 1, 1, 1, NULL, 12),
(56, 7, 'status', 'select_dropdown', 'Status', 1, 1, 1, 1, 1, 1, '{\"default\":\"ACTIVE\",\"options\":{\"ACTIVE\":\"active\",\"INACTIVE\":\"inactive\"}}', 3),
(57, 7, 'created_at', 'timestamp', 'Created At', 0, 1, 1, 0, 0, 0, NULL, 4),
(58, 7, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, NULL, 5),
(59, 7, 'id', 'number', 'ID', 1, 0, 0, 0, 0, 0, NULL, 1),
(60, 7, 'name', 'text', 'Name', 1, 1, 1, 1, 1, 1, NULL, 2),
(61, 8, 'status', 'select_dropdown', 'Status', 1, 1, 1, 1, 1, 1, '{\"default\":\"ACTIVE\",\"options\":{\"ACTIVE\":\"active\",\"INACTIVE\":\"inactive\"}}', 4),
(62, 8, 'created_at', 'timestamp', 'Created At', 0, 1, 1, 0, 0, 0, '{}', 5),
(63, 8, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 6),
(64, 8, 'id', 'number', 'ID', 1, 0, 0, 0, 0, 0, '{}', 1),
(65, 8, 'name', 'text', 'Name', 1, 1, 1, 1, 1, 1, '{}', 2),
(66, 8, 'attribute_id', 'select_dropdown', 'Attribute', 0, 0, 1, 1, 1, 1, '{\"default\":\"\",\"null\":\"\",\"options\":{\"\":\"-- None --\"},\"relationship\":{\"key\":\"id\",\"label\":\"name\"}}', 3),
(67, 10, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1),
(68, 10, 'name', 'text', 'Name', 1, 1, 1, 1, 1, 1, '{}', 2),
(69, 10, 'date', 'text', 'Date', 1, 1, 1, 1, 1, 1, '{}', 3),
(70, 10, 'phone_number', 'text', 'Phone Number', 1, 1, 1, 1, 1, 1, '{}', 4),
(71, 10, 'email', 'text', 'Email', 1, 1, 1, 1, 1, 1, '{}', 5),
(72, 10, 'password', 'text', 'Password', 1, 1, 1, 1, 1, 1, '{}', 6),
(73, 10, 'sex', 'text', 'Sex', 1, 1, 1, 1, 1, 1, '{}', 7),
(74, 10, 'status', 'text', 'Status', 1, 1, 1, 1, 1, 1, '{}', 8),
(75, 10, 'created_at', 'timestamp', 'Created At', 0, 1, 1, 0, 0, 0, '{}', 9),
(76, 10, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 10),
(77, 11, 'id', 'number', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1),
(78, 11, 'code', 'text', 'Code', 1, 1, 1, 1, 1, 1, '{}', 2),
(79, 11, 'customer_id', 'number', 'Customer Id', 1, 1, 1, 1, 1, 1, '{}', 3),
(80, 11, 'total', 'text', 'Total', 1, 1, 1, 1, 1, 1, '{}', 4),
(81, 11, 'discount', 'text', 'Discount', 1, 1, 1, 1, 1, 1, '{}', 5),
(82, 11, 'fee', 'text', 'Fee', 1, 1, 1, 1, 1, 1, '{}', 6),
(83, 11, 'shipping_address_id', 'number', 'Shipping Address Id', 1, 1, 1, 1, 1, 1, '{}', 7),
(84, 11, 'product_total', 'text', 'Product Total', 1, 1, 1, 1, 1, 1, '{}', 8),
(85, 11, 'status', 'text', 'Status', 1, 1, 1, 1, 1, 1, '{}', 9),
(86, 11, 'created_at', 'timestamp', 'Created At', 0, 1, 1, 0, 0, 0, '{}', 10),
(87, 11, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 11),
(88, 12, 'id', 'number', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1),
(89, 12, 'code', 'text', 'Code', 1, 1, 1, 1, 1, 1, '{}', 2),
(90, 12, 'name', 'text', 'Name', 1, 1, 1, 1, 1, 1, '{}', 3),
(91, 12, 'description', 'text', 'Description', 1, 1, 1, 1, 1, 1, '{}', 4),
(92, 12, 'status', 'text', 'Status', 1, 1, 1, 1, 1, 1, '{}', 5),
(93, 12, 'created_at', 'timestamp', 'Created At', 0, 1, 1, 0, 0, 0, '{}', 6),
(94, 12, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 7),
(95, 8, 'code', 'text', 'Code', 1, 1, 1, 1, 1, 1, '{}', 3);

-- --------------------------------------------------------

--
-- Table structure for table `data_types`
--

DROP TABLE IF EXISTS `data_types`;
CREATE TABLE IF NOT EXISTS `data_types` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name_singular` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name_plural` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `model_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `policy_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `controller` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `generate_permissions` tinyint(1) NOT NULL DEFAULT '0',
  `server_side` tinyint(4) NOT NULL DEFAULT '0',
  `details` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `data_types_name_unique` (`name`),
  UNIQUE KEY `data_types_slug_unique` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `data_types`
--

INSERT INTO `data_types` (`id`, `name`, `slug`, `display_name_singular`, `display_name_plural`, `icon`, `model_name`, `policy_name`, `controller`, `description`, `generate_permissions`, `server_side`, `details`, `created_at`, `updated_at`) VALUES
(1, 'users', 'users', 'User', 'Users', 'voyager-person', 'TCG\\Voyager\\Models\\User', 'TCG\\Voyager\\Policies\\UserPolicy', 'TCG\\Voyager\\Http\\Controllers\\VoyagerUserController', '', 1, 0, NULL, '2019-11-04 02:15:15', '2019-11-04 02:15:15'),
(2, 'menus', 'menus', 'Menu', 'Menus', 'voyager-list', 'TCG\\Voyager\\Models\\Menu', NULL, '', '', 1, 0, NULL, '2019-11-04 02:15:15', '2019-11-04 02:15:15'),
(3, 'roles', 'roles', 'Role', 'Roles', 'voyager-lock', 'TCG\\Voyager\\Models\\Role', NULL, '', '', 1, 0, NULL, '2019-11-04 02:15:15', '2019-11-04 02:15:15'),
(4, 'categories', 'categories', 'Category', 'Categories', 'voyager-categories', 'TCG\\Voyager\\Models\\Category', NULL, '', '', 1, 0, NULL, '2019-11-04 02:15:27', '2019-11-04 02:15:27'),
(5, 'posts', 'posts', 'Post', 'Posts', 'voyager-news', 'TCG\\Voyager\\Models\\Post', 'TCG\\Voyager\\Policies\\PostPolicy', '', '', 1, 0, NULL, '2019-11-04 02:15:27', '2019-11-04 02:15:27'),
(6, 'pages', 'pages', 'Page', 'Pages', 'voyager-file-text', 'TCG\\Voyager\\Models\\Page', NULL, '', '', 1, 0, NULL, '2019-11-04 02:15:27', '2019-11-04 02:15:27'),
(7, 'attributes', 'attributes', 'Attribute', 'Attributes', 'voyager-lock', 'TCG\\Voyager\\Models\\Attribute', NULL, '', '', 1, 0, NULL, '2019-11-04 02:15:27', '2019-11-04 02:15:27'),
(8, 'properties', 'properties', 'Property', 'Properties', 'voyager-tv', 'TCG\\Voyager\\Models\\Property', NULL, NULL, NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"desc\",\"default_search_key\":null,\"scope\":null}', '2019-11-04 02:15:27', '2019-12-12 07:05:09'),
(10, 'customers', 'customers', 'Customer', 'Customers', 'voyager-people', 'TCG\\Voyager\\Models\\Customer', NULL, NULL, NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}', '2019-11-18 01:00:32', '2019-11-18 01:13:39'),
(11, 'orders', 'orders', 'Order', 'Orders', 'voyager-receipt', 'TCG\\Voyager\\Models\\Order', NULL, NULL, NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null}', '2019-11-18 02:14:22', '2019-11-18 02:14:22'),
(12, 'products', 'products', 'Product', 'Products', 'voyager-bread', 'TCG\\Voyager\\Models\\Product', NULL, NULL, NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null}', '2019-11-18 02:30:15', '2019-11-18 02:30:15');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

DROP TABLE IF EXISTS `menus`;
CREATE TABLE IF NOT EXISTS `menus` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `menus_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'admin', '2019-11-04 02:15:15', '2019-11-04 02:15:15');

-- --------------------------------------------------------

--
-- Table structure for table `menu_items`
--

DROP TABLE IF EXISTS `menu_items`;
CREATE TABLE IF NOT EXISTS `menu_items` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `menu_id` int(10) UNSIGNED DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `target` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '_self',
  `icon_class` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `order` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `route` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parameters` text COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`),
  KEY `menu_items_menu_id_foreign` (`menu_id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menu_items`
--

INSERT INTO `menu_items` (`id`, `menu_id`, `title`, `url`, `target`, `icon_class`, `color`, `parent_id`, `order`, `created_at`, `updated_at`, `route`, `parameters`) VALUES
(1, 1, 'Dashboard', '', '_self', 'voyager-boat', NULL, NULL, 1, '2019-11-04 02:15:15', '2019-11-04 02:15:15', 'voyager.dashboard', NULL),
(2, 1, 'Media', '', '_self', 'voyager-images', NULL, NULL, 4, '2019-11-04 02:15:15', '2019-11-04 05:42:44', 'voyager.media.index', NULL),
(3, 1, 'Users', '', '_self', 'voyager-person', NULL, NULL, 3, '2019-11-04 02:15:15', '2019-11-04 02:15:15', 'voyager.users.index', NULL),
(4, 1, 'Roles', '', '_self', 'voyager-lock', NULL, NULL, 2, '2019-11-04 02:15:15', '2019-11-04 02:15:15', 'voyager.roles.index', NULL),
(5, 1, 'Tools', '', '_self', 'voyager-tools', NULL, NULL, 13, '2019-11-04 02:15:15', '2019-11-18 02:41:52', NULL, NULL),
(6, 1, 'Menu Builder', '', '_self', 'voyager-list', NULL, 5, 1, '2019-11-04 02:15:15', '2019-11-04 05:42:44', 'voyager.menus.index', NULL),
(7, 1, 'Database', '', '_self', 'voyager-data', NULL, 5, 2, '2019-11-04 02:15:15', '2019-11-04 05:42:44', 'voyager.database.index', NULL),
(8, 1, 'Compass', '', '_self', 'voyager-compass', NULL, 5, 3, '2019-11-04 02:15:15', '2019-11-04 05:42:44', 'voyager.compass.index', NULL),
(9, 1, 'BREAD', '', '_self', 'voyager-bread', NULL, 5, 4, '2019-11-04 02:15:15', '2019-11-04 05:42:44', 'voyager.bread.index', NULL),
(10, 1, 'Settings', '', '_self', 'voyager-settings', NULL, NULL, 14, '2019-11-04 02:15:15', '2019-11-18 02:41:52', 'voyager.settings.index', NULL),
(11, 1, 'Categories', '', '_self', 'voyager-categories', NULL, NULL, 7, '2019-11-04 02:15:27', '2019-11-04 05:42:44', 'voyager.categories.index', NULL),
(12, 1, 'Posts', '', '_self', 'voyager-news', NULL, NULL, 5, '2019-11-04 02:15:27', '2019-11-04 05:42:44', 'voyager.posts.index', NULL),
(13, 1, 'Pages', '', '_self', 'voyager-file-text', NULL, NULL, 6, '2019-11-04 02:15:27', '2019-11-04 05:42:44', 'voyager.pages.index', NULL),
(14, 1, 'Hooks', '', '_self', 'voyager-hook', NULL, 5, 5, '2019-11-04 02:15:27', '2019-11-04 05:42:44', 'voyager.hooks', NULL),
(15, 1, 'Attributes', '', '_self', 'voyager-lock', '#000000', NULL, 8, '2019-11-04 05:42:36', '2019-11-04 05:42:44', 'voyager.attributes.index', NULL),
(16, 1, 'Properties', '', '_self', 'voyager-tv', '#000000', NULL, 9, '2019-11-04 05:58:35', '2019-11-04 05:58:40', 'voyager.properties.index', NULL),
(17, 1, 'Customers', '', '_self', 'voyager-people', NULL, NULL, 10, '2019-11-18 01:00:34', '2019-11-18 01:01:54', 'voyager.customers.index', NULL),
(18, 1, 'Orders', '', '_self', 'voyager-receipt', NULL, NULL, 11, '2019-11-18 02:14:23', '2019-11-18 02:41:49', 'voyager.orders.index', NULL),
(19, 1, 'Products', '', '_self', 'voyager-bread', NULL, NULL, 12, '2019-11-18 02:30:15', '2019-11-18 02:41:52', 'voyager.products.index', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2016_01_01_000000_add_voyager_user_fields', 1),
(4, '2016_01_01_000000_create_data_types_table', 1),
(5, '2016_05_19_173453_create_menu_table', 1),
(6, '2016_10_21_190000_create_roles_table', 1),
(7, '2016_10_21_190000_create_settings_table', 1),
(8, '2016_11_30_135954_create_permission_table', 1),
(9, '2016_11_30_141208_create_permission_role_table', 1),
(10, '2016_12_26_201236_data_types__add__server_side', 1),
(11, '2017_01_13_000000_add_route_to_menu_items_table', 1),
(12, '2017_01_14_005015_create_translations_table', 1),
(13, '2017_01_15_000000_make_table_name_nullable_in_permissions_table', 1),
(14, '2017_03_06_000000_add_controller_to_data_types_table', 1),
(15, '2017_04_21_000000_add_order_to_data_rows_table', 1),
(16, '2017_07_05_210000_add_policyname_to_data_types_table', 1),
(17, '2017_08_05_000000_add_group_to_settings_table', 1),
(18, '2017_11_26_013050_add_user_role_relationship', 1),
(19, '2017_11_26_015000_create_user_roles_table', 1),
(20, '2018_03_11_000000_add_user_settings', 1),
(21, '2018_03_14_000000_add_details_to_data_types_table', 1),
(22, '2018_03_16_000000_make_settings_value_nullable', 1),
(23, '2019_08_19_000000_create_failed_jobs_table', 1),
(24, '2016_01_01_000000_create_pages_table', 2),
(25, '2016_01_01_000000_create_posts_table', 2),
(26, '2016_02_15_204651_create_categories_table', 2),
(27, '2017_04_11_000000_alter_post_nullable_fields_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `code` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `customer_id` int(10) NOT NULL,
  `total` int(10) NOT NULL,
  `discount` int(10) NOT NULL,
  `fee` int(10) NOT NULL,
  `shipping_address_id` int(10) NOT NULL,
  `product_total` int(10) NOT NULL,
  `status` enum('ACTIVE','INACTIVE') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'ACTIVE',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

DROP TABLE IF EXISTS `order_details`;
CREATE TABLE IF NOT EXISTS `order_details` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `order_id` int(10) NOT NULL,
  `product_id` int(10) NOT NULL,
  `variant_id` int(10) NOT NULL,
  `quantity` int(10) NOT NULL,
  `product_price` int(10) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

DROP TABLE IF EXISTS `pages`;
CREATE TABLE IF NOT EXISTS `pages` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `author_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `excerpt` text COLLATE utf8mb4_unicode_ci,
  `body` text COLLATE utf8mb4_unicode_ci,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci,
  `meta_keywords` text COLLATE utf8mb4_unicode_ci,
  `status` enum('ACTIVE','INACTIVE') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'INACTIVE',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `pages_slug_unique` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `author_id`, `title`, `excerpt`, `body`, `image`, `slug`, `meta_description`, `meta_keywords`, `status`, `created_at`, `updated_at`) VALUES
(1, 0, 'Hello World', 'Hang the jib grog grog blossom grapple dance the hempen jig gangway pressgang bilge rat to go on account lugger. Nelsons folly gabion line draught scallywag fire ship gaff fluke fathom case shot. Sea Legs bilge rat sloop matey gabion long clothes run a shot across the bow Gold Road cog league.', '<p>Hello World. Scallywag grog swab Cat o\'nine tails scuttle rigging hardtack cable nipper Yellow Jack. Handsomely spirits knave lad killick landlubber or just lubber deadlights chantey pinnace crack Jennys tea cup. Provost long clothes black spot Yellow Jack bilged on her anchor league lateen sail case shot lee tackle.</p>\n<p>Ballast spirits fluke topmast me quarterdeck schooner landlubber or just lubber gabion belaying pin. Pinnace stern galleon starboard warp carouser to go on account dance the hempen jig jolly boat measured fer yer chains. Man-of-war fire in the hole nipperkin handsomely doubloon barkadeer Brethren of the Coast gibbet driver squiffy.</p>', 'pages/page1.jpg', 'hello-world', 'Yar Meta Description', 'Keyword1, Keyword2', 'ACTIVE', '2019-11-04 02:15:27', '2019-11-04 02:15:27');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
CREATE TABLE IF NOT EXISTS `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `table_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `permissions_key_index` (`key`)
) ENGINE=InnoDB AUTO_INCREMENT=67 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `key`, `table_name`, `created_at`, `updated_at`) VALUES
(1, 'browse_admin', NULL, '2019-11-04 02:15:15', '2019-11-04 02:15:15'),
(2, 'browse_bread', NULL, '2019-11-04 02:15:15', '2019-11-04 02:15:15'),
(3, 'browse_database', NULL, '2019-11-04 02:15:15', '2019-11-04 02:15:15'),
(4, 'browse_media', NULL, '2019-11-04 02:15:15', '2019-11-04 02:15:15'),
(5, 'browse_compass', NULL, '2019-11-04 02:15:15', '2019-11-04 02:15:15'),
(6, 'browse_menus', 'menus', '2019-11-04 02:15:15', '2019-11-04 02:15:15'),
(7, 'read_menus', 'menus', '2019-11-04 02:15:15', '2019-11-04 02:15:15'),
(8, 'edit_menus', 'menus', '2019-11-04 02:15:15', '2019-11-04 02:15:15'),
(9, 'add_menus', 'menus', '2019-11-04 02:15:15', '2019-11-04 02:15:15'),
(10, 'delete_menus', 'menus', '2019-11-04 02:15:15', '2019-11-04 02:15:15'),
(11, 'browse_roles', 'roles', '2019-11-04 02:15:15', '2019-11-04 02:15:15'),
(12, 'read_roles', 'roles', '2019-11-04 02:15:15', '2019-11-04 02:15:15'),
(13, 'edit_roles', 'roles', '2019-11-04 02:15:15', '2019-11-04 02:15:15'),
(14, 'add_roles', 'roles', '2019-11-04 02:15:15', '2019-11-04 02:15:15'),
(15, 'delete_roles', 'roles', '2019-11-04 02:15:15', '2019-11-04 02:15:15'),
(16, 'browse_users', 'users', '2019-11-04 02:15:15', '2019-11-04 02:15:15'),
(17, 'read_users', 'users', '2019-11-04 02:15:15', '2019-11-04 02:15:15'),
(18, 'edit_users', 'users', '2019-11-04 02:15:15', '2019-11-04 02:15:15'),
(19, 'add_users', 'users', '2019-11-04 02:15:15', '2019-11-04 02:15:15'),
(20, 'delete_users', 'users', '2019-11-04 02:15:15', '2019-11-04 02:15:15'),
(21, 'browse_settings', 'settings', '2019-11-04 02:15:15', '2019-11-04 02:15:15'),
(22, 'read_settings', 'settings', '2019-11-04 02:15:15', '2019-11-04 02:15:15'),
(23, 'edit_settings', 'settings', '2019-11-04 02:15:15', '2019-11-04 02:15:15'),
(24, 'add_settings', 'settings', '2019-11-04 02:15:15', '2019-11-04 02:15:15'),
(25, 'delete_settings', 'settings', '2019-11-04 02:15:15', '2019-11-04 02:15:15'),
(26, 'browse_categories', 'categories', '2019-11-04 02:15:27', '2019-11-04 02:15:27'),
(27, 'read_categories', 'categories', '2019-11-04 02:15:27', '2019-11-04 02:15:27'),
(28, 'edit_categories', 'categories', '2019-11-04 02:15:27', '2019-11-04 02:15:27'),
(29, 'add_categories', 'categories', '2019-11-04 02:15:27', '2019-11-04 02:15:27'),
(30, 'delete_categories', 'categories', '2019-11-04 02:15:27', '2019-11-04 02:15:27'),
(31, 'browse_posts', 'posts', '2019-11-04 02:15:27', '2019-11-04 02:15:27'),
(32, 'read_posts', 'posts', '2019-11-04 02:15:27', '2019-11-04 02:15:27'),
(33, 'edit_posts', 'posts', '2019-11-04 02:15:27', '2019-11-04 02:15:27'),
(34, 'add_posts', 'posts', '2019-11-04 02:15:27', '2019-11-04 02:15:27'),
(35, 'delete_posts', 'posts', '2019-11-04 02:15:27', '2019-11-04 02:15:27'),
(36, 'browse_pages', 'pages', '2019-11-04 02:15:27', '2019-11-04 02:15:27'),
(37, 'read_pages', 'pages', '2019-11-04 02:15:27', '2019-11-04 02:15:27'),
(38, 'edit_pages', 'pages', '2019-11-04 02:15:27', '2019-11-04 02:15:27'),
(39, 'add_pages', 'pages', '2019-11-04 02:15:27', '2019-11-04 02:15:27'),
(40, 'delete_pages', 'pages', '2019-11-04 02:15:27', '2019-11-04 02:15:27'),
(41, 'browse_hooks', NULL, '2019-11-04 02:15:27', '2019-11-04 02:15:27'),
(42, 'browse_attributes', 'attributes', '2019-11-04 02:15:27', '2019-11-04 02:15:27'),
(43, 'read_attributes', 'attributes', '2019-11-04 02:15:27', '2019-11-04 02:15:27'),
(44, 'edit_attributes', 'attributes', '2019-11-04 02:15:27', '2019-11-04 02:15:27'),
(45, 'add_attributes', 'attributes', '2019-11-04 02:15:27', '2019-11-04 02:15:27'),
(46, 'delete_attributes', 'attributes', '2019-11-04 02:15:27', '2019-11-04 02:15:27'),
(47, 'browse_properties', 'properties', '2019-11-04 02:15:27', '2019-11-04 02:15:27'),
(48, 'read_properties', 'properties', '2019-11-04 02:15:27', '2019-11-04 02:15:27'),
(49, 'edit_properties', 'properties', '2019-11-04 02:15:27', '2019-11-04 02:15:27'),
(50, 'add_properties', 'properties', '2019-11-04 02:15:27', '2019-11-04 02:15:27'),
(51, 'delete_properties', 'properties', '2019-11-04 02:15:27', '2019-11-04 02:15:27'),
(52, 'browse_customers', 'customers', '2019-11-18 01:00:33', '2019-11-18 01:00:33'),
(53, 'read_customers', 'customers', '2019-11-18 01:00:33', '2019-11-18 01:00:33'),
(54, 'edit_customers', 'customers', '2019-11-18 01:00:33', '2019-11-18 01:00:33'),
(55, 'add_customers', 'customers', '2019-11-18 01:00:33', '2019-11-18 01:00:33'),
(56, 'delete_customers', 'customers', '2019-11-18 01:00:33', '2019-11-18 01:00:33'),
(57, 'browse_orders', 'orders', '2019-11-18 02:14:23', '2019-11-18 02:14:23'),
(58, 'read_orders', 'orders', '2019-11-18 02:14:23', '2019-11-18 02:14:23'),
(59, 'edit_orders', 'orders', '2019-11-18 02:14:23', '2019-11-18 02:14:23'),
(60, 'add_orders', 'orders', '2019-11-18 02:14:23', '2019-11-18 02:14:23'),
(61, 'delete_orders', 'orders', '2019-11-18 02:14:23', '2019-11-18 02:14:23'),
(62, 'browse_products', 'products', '2019-11-18 02:30:15', '2019-11-18 02:30:15'),
(63, 'read_products', 'products', '2019-11-18 02:30:15', '2019-11-18 02:30:15'),
(64, 'edit_products', 'products', '2019-11-18 02:30:15', '2019-11-18 02:30:15'),
(65, 'add_products', 'products', '2019-11-18 02:30:15', '2019-11-18 02:30:15'),
(66, 'delete_products', 'products', '2019-11-18 02:30:15', '2019-11-18 02:30:15');

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

DROP TABLE IF EXISTS `permission_role`;
CREATE TABLE IF NOT EXISTS `permission_role` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `permission_role_permission_id_index` (`permission_id`),
  KEY `permission_role_role_id_index` (`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permission_role`
--

INSERT INTO `permission_role` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(13, 1),
(14, 1),
(15, 1),
(16, 1),
(17, 1),
(18, 1),
(19, 1),
(20, 1),
(21, 1),
(22, 1),
(23, 1),
(24, 1),
(25, 1),
(26, 1),
(27, 1),
(28, 1),
(29, 1),
(30, 1),
(31, 1),
(32, 1),
(33, 1),
(34, 1),
(35, 1),
(36, 1),
(37, 1),
(38, 1),
(39, 1),
(40, 1),
(42, 1),
(43, 1),
(44, 1),
(45, 1),
(46, 1),
(47, 1),
(48, 1),
(49, 1),
(50, 1),
(51, 1),
(52, 1),
(53, 1),
(54, 1),
(55, 1),
(56, 1),
(57, 1),
(58, 1),
(59, 1),
(60, 1),
(61, 1),
(62, 1),
(63, 1),
(64, 1),
(65, 1),
(66, 1);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `author_id` int(11) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `seo_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `excerpt` text COLLATE utf8mb4_unicode_ci,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci,
  `meta_keywords` text COLLATE utf8mb4_unicode_ci,
  `status` enum('PUBLISHED','DRAFT','PENDING') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'DRAFT',
  `featured` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `posts_slug_unique` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `author_id`, `category_id`, `title`, `seo_title`, `excerpt`, `body`, `image`, `slug`, `meta_description`, `meta_keywords`, `status`, `featured`, `created_at`, `updated_at`) VALUES
(1, 0, NULL, 'Lorem Ipsum Post', NULL, 'This is the excerpt for the Lorem Ipsum Post', '<p>This is the body of the lorem ipsum post</p>', 'posts/post1.jpg', 'lorem-ipsum-post', 'This is the meta description', 'keyword1, keyword2, keyword3', 'PUBLISHED', 0, '2019-11-04 02:15:27', '2019-11-04 02:15:27'),
(2, 0, NULL, 'My Sample Post', NULL, 'This is the excerpt for the sample Post', '<p>This is the body for the sample post, which includes the body.</p>\n                <h2>We can use all kinds of format!</h2>\n                <p>And include a bunch of other stuff.</p>', 'posts/post2.jpg', 'my-sample-post', 'Meta Description for sample post', 'keyword1, keyword2, keyword3', 'PUBLISHED', 0, '2019-11-04 02:15:27', '2019-11-04 02:15:27'),
(3, 0, NULL, 'Latest Post', NULL, 'This is the excerpt for the latest post', '<p>This is the body for the latest post</p>', 'posts/post3.jpg', 'latest-post', 'This is the meta description', 'keyword1, keyword2, keyword3', 'PUBLISHED', 0, '2019-11-04 02:15:27', '2019-11-04 02:15:27'),
(4, 0, NULL, 'Yarr Post', NULL, 'Reef sails nipperkin bring a spring upon her cable coffer jury mast spike marooned Pieces of Eight poop deck pillage. Clipper driver coxswain galleon hempen halter come about pressgang gangplank boatswain swing the lead. Nipperkin yard skysail swab lanyard Blimey bilge water ho quarter Buccaneer.', '<p>Swab deadlights Buccaneer fire ship square-rigged dance the hempen jig weigh anchor cackle fruit grog furl. Crack Jennys tea cup chase guns pressgang hearties spirits hogshead Gold Road six pounders fathom measured fer yer chains. Main sheet provost come about trysail barkadeer crimp scuttle mizzenmast brig plunder.</p>\n<p>Mizzen league keelhaul galleon tender cog chase Barbary Coast doubloon crack Jennys tea cup. Blow the man down lugsail fire ship pinnace cackle fruit line warp Admiral of the Black strike colors doubloon. Tackle Jack Ketch come about crimp rum draft scuppers run a shot across the bow haul wind maroon.</p>\n<p>Interloper heave down list driver pressgang holystone scuppers tackle scallywag bilged on her anchor. Jack Tar interloper draught grapple mizzenmast hulk knave cable transom hogshead. Gaff pillage to go on account grog aft chase guns piracy yardarm knave clap of thunder.</p>', 'posts/post4.jpg', 'yarr-post', 'this be a meta descript', 'keyword1, keyword2, keyword3', 'PUBLISHED', 0, '2019-11-04 02:15:27', '2019-11-04 02:15:27');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `code` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` enum('ACTIVE','INACTIVE') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'ACTIVE',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `code` (`code`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `code`, `name`, `description`, `status`, `created_at`, `updated_at`) VALUES
(11, '123abc', 'abcaaa12', 'abcdsdasdasdasdasdasdsad1231313', 'ACTIVE', '2019-11-25 06:42:20', '2019-12-12 06:01:33'),
(12, 'abc123', 'abc456', 'abcd', 'ACTIVE', '2019-11-28 06:02:13', '2019-11-28 06:02:13'),
(13, 'abc456', 'AAAAAAAAA', 'tyeyeryeryery', 'ACTIVE', '2019-12-20 21:59:51', '2019-12-20 21:59:51'),
(14, 'ABV23', 'BBBBBBBBBBB', 'TTTTTTTTTTTTT', 'ACTIVE', '2019-12-20 22:00:16', '2019-12-20 22:01:05');

-- --------------------------------------------------------

--
-- Table structure for table `product_categories`
--

DROP TABLE IF EXISTS `product_categories`;
CREATE TABLE IF NOT EXISTS `product_categories` (
  `id` int(10) DEFAULT NULL,
  `category_id` int(10) NOT NULL,
  `product_id` int(10) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`category_id`,`product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product_categories`
--

INSERT INTO `product_categories` (`id`, `category_id`, `product_id`, `created_at`, `updated_at`) VALUES
(NULL, 1, 11, '2019-12-12 06:01:33', '2019-12-12 06:01:33'),
(NULL, 1, 13, '2019-12-20 21:59:51', '2019-12-20 21:59:51'),
(NULL, 1, 14, '2019-12-20 22:01:05', '2019-12-20 22:01:05'),
(NULL, 2, 11, '2019-12-12 06:01:33', '2019-12-12 06:01:33'),
(NULL, 2, 12, '2019-11-28 06:02:14', '2019-12-12 06:00:24'),
(NULL, 2, 14, '2019-12-20 22:01:05', '2019-12-20 22:01:05');

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

DROP TABLE IF EXISTS `product_images`;
CREATE TABLE IF NOT EXISTS `product_images` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `product_id` int(10) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `property_id` int(10) NOT NULL,
  `is_default` tinyint(2) NOT NULL,
  `ordering` int(10) NOT NULL,
  `status` enum('ACTIVE','INACTIVE') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'ACTIVE',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `product_id`, `name`, `property_id`, `is_default`, `ordering`, `status`, `created_at`, `updated_at`) VALUES
(6, 11, '11_1575945488_1_1.png', 1, 0, 1, 'ACTIVE', '2019-12-09 19:38:08', '2019-12-09 19:38:08'),
(7, 11, '11_1575945500_1_1.png', 1, 0, 1, 'ACTIVE', '2019-12-09 19:38:20', '2019-12-09 19:38:20'),
(8, 11, '11_1575946586_1_1.png', 1, 1, 1, 'ACTIVE', '2019-12-09 19:56:26', '2019-12-09 19:56:26'),
(9, 11, '11_1575946605_1_1.png', 1, 0, 1, 'ACTIVE', '2019-12-09 19:56:45', '2019-12-09 19:56:45'),
(10, 11, '11_1575946680_1_1.png', 1, 0, 1, 'ACTIVE', '2019-12-09 19:58:00', '2019-12-09 19:58:00'),
(11, 11, '11_1575946933_1_1.png', 1, 0, 1, 'ACTIVE', '2019-12-09 20:02:13', '2019-12-09 20:02:13'),
(12, 11, '11_1575947179_1_1.png', 1, 0, 1, 'ACTIVE', '2019-12-09 20:06:19', '2019-12-09 20:06:19'),
(13, 11, '11_1575947194_1_1.png', 1, 0, 1, 'ACTIVE', '2019-12-09 20:06:34', '2019-12-09 20:06:34');

-- --------------------------------------------------------

--
-- Table structure for table `product_variants`
--

DROP TABLE IF EXISTS `product_variants`;
CREATE TABLE IF NOT EXISTS `product_variants` (
  `id` int(11) DEFAULT NULL,
  `variant_id` int(10) NOT NULL,
  `property_id` int(10) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`variant_id`,`property_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product_variants`
--

INSERT INTO `product_variants` (`id`, `variant_id`, `property_id`, `created_at`, `updated_at`) VALUES
(NULL, 7, 1, '2019-11-28 07:33:46', '2019-11-28 07:33:46'),
(NULL, 7, 2, '2019-11-28 07:33:46', '2019-11-28 07:33:46'),
(NULL, 8, 2, '2019-12-12 06:30:18', '2019-12-12 06:30:18'),
(NULL, 8, 3, '2019-12-12 06:30:18', '2019-12-12 06:30:18');

-- --------------------------------------------------------

--
-- Table structure for table `properties`
--

DROP TABLE IF EXISTS `properties`;
CREATE TABLE IF NOT EXISTS `properties` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `attribute_id` int(10) DEFAULT NULL,
  `status` enum('ACTIVE','INACTIVE') CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT 'ACTIVE',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `properties_attribute_id_foreign` (`attribute_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `properties`
--

INSERT INTO `properties` (`id`, `code`, `name`, `attribute_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'xanh', 'Xanh', 1, 'ACTIVE', '2019-11-17 21:50:18', '2019-11-17 21:50:18'),
(2, 'xl', 'XL', 2, 'ACTIVE', '2019-11-17 21:50:48', '2019-11-17 21:50:58'),
(3, 'red', 'Red', 1, 'ACTIVE', '2019-12-11 17:00:00', '2019-12-11 17:00:00'),
(4, 'l', 'L', 2, 'ACTIVE', '2019-12-11 17:00:00', '2019-12-11 17:00:00'),
(5, 'yellow', 'Yellow', 1, 'ACTIVE', '2019-12-12 07:05:42', '2019-12-12 07:05:42');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `display_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Administrator', '2019-11-04 02:15:15', '2019-11-04 02:15:15'),
(2, 'user', 'Normal User', '2019-11-04 02:15:15', '2019-11-04 02:15:15');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

DROP TABLE IF EXISTS `settings`;
CREATE TABLE IF NOT EXISTS `settings` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci,
  `details` text COLLATE utf8mb4_unicode_ci,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order` int(11) NOT NULL DEFAULT '1',
  `group` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `settings_key_unique` (`key`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `key`, `display_name`, `value`, `details`, `type`, `order`, `group`) VALUES
(1, 'site.title', 'Site Title', 'Site Title', '', 'text', 1, 'Site'),
(2, 'site.description', 'Site Description', 'Site Description', '', 'text', 2, 'Site'),
(3, 'site.logo', 'Site Logo', '', '', 'image', 3, 'Site'),
(4, 'site.google_analytics_tracking_id', 'Google Analytics Tracking ID', '', '', 'text', 4, 'Site'),
(5, 'admin.bg_image', 'Admin Background Image', '', '', 'image', 5, 'Admin'),
(6, 'admin.title', 'Admin Title', 'Voyager', '', 'text', 1, 'Admin'),
(7, 'admin.description', 'Admin Description', 'Welcome to Voyager. The Missing Admin for Laravel', '', 'text', 2, 'Admin'),
(8, 'admin.loader', 'Admin Loader', '', '', 'image', 3, 'Admin'),
(9, 'admin.icon_image', 'Admin Icon Image', '', '', 'image', 4, 'Admin'),
(10, 'admin.google_analytics_client_id', 'Google Analytics Client ID (used for admin dashboard)', '', '', 'text', 1, 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `shipping_addresses`
--

DROP TABLE IF EXISTS `shipping_addresses`;
CREATE TABLE IF NOT EXISTS `shipping_addresses` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `customer_id` int(10) NOT NULL,
  `customer_address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `is_default` tinyint(1) NOT NULL,
  `created_ad` timestamp NULL DEFAULT NULL,
  `updated_ad` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `translations`
--

DROP TABLE IF EXISTS `translations`;
CREATE TABLE IF NOT EXISTS `translations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `table_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `column_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foreign_key` int(10) UNSIGNED NOT NULL,
  `locale` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `translations_table_name_column_name_foreign_key_locale_unique` (`table_name`,`column_name`,`foreign_key`,`locale`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `translations`
--

INSERT INTO `translations` (`id`, `table_name`, `column_name`, `foreign_key`, `locale`, `value`, `created_at`, `updated_at`) VALUES
(1, 'data_types', 'display_name_singular', 5, 'pt', 'Post', '2019-11-04 02:15:27', '2019-11-04 02:15:27'),
(2, 'data_types', 'display_name_singular', 6, 'pt', 'Página', '2019-11-04 02:15:27', '2019-11-04 02:15:27'),
(3, 'data_types', 'display_name_singular', 1, 'pt', 'Utilizador', '2019-11-04 02:15:27', '2019-11-04 02:15:27'),
(4, 'data_types', 'display_name_singular', 4, 'pt', 'Categoria', '2019-11-04 02:15:27', '2019-11-04 02:15:27'),
(5, 'data_types', 'display_name_singular', 2, 'pt', 'Menu', '2019-11-04 02:15:27', '2019-11-04 02:15:27'),
(6, 'data_types', 'display_name_singular', 3, 'pt', 'Função', '2019-11-04 02:15:27', '2019-11-04 02:15:27'),
(7, 'data_types', 'display_name_plural', 5, 'pt', 'Posts', '2019-11-04 02:15:27', '2019-11-04 02:15:27'),
(8, 'data_types', 'display_name_plural', 6, 'pt', 'Páginas', '2019-11-04 02:15:27', '2019-11-04 02:15:27'),
(9, 'data_types', 'display_name_plural', 1, 'pt', 'Utilizadores', '2019-11-04 02:15:27', '2019-11-04 02:15:27'),
(10, 'data_types', 'display_name_plural', 4, 'pt', 'Categorias', '2019-11-04 02:15:27', '2019-11-04 02:15:27'),
(11, 'data_types', 'display_name_plural', 2, 'pt', 'Menus', '2019-11-04 02:15:27', '2019-11-04 02:15:27'),
(12, 'data_types', 'display_name_plural', 3, 'pt', 'Funções', '2019-11-04 02:15:27', '2019-11-04 02:15:27'),
(13, 'categories', 'slug', 1, 'pt', 'categoria-1', '2019-11-04 02:15:27', '2019-11-04 02:15:27'),
(14, 'categories', 'name', 1, 'pt', 'Categoria 1', '2019-11-04 02:15:27', '2019-11-04 02:15:27'),
(15, 'categories', 'slug', 2, 'pt', 'categoria-2', '2019-11-04 02:15:27', '2019-11-04 02:15:27'),
(16, 'categories', 'name', 2, 'pt', 'Categoria 2', '2019-11-04 02:15:27', '2019-11-04 02:15:27'),
(17, 'pages', 'title', 1, 'pt', 'Olá Mundo', '2019-11-04 02:15:27', '2019-11-04 02:15:27'),
(18, 'pages', 'slug', 1, 'pt', 'ola-mundo', '2019-11-04 02:15:27', '2019-11-04 02:15:27'),
(19, 'pages', 'body', 1, 'pt', '<p>Olá Mundo. Scallywag grog swab Cat o\'nine tails scuttle rigging hardtack cable nipper Yellow Jack. Handsomely spirits knave lad killick landlubber or just lubber deadlights chantey pinnace crack Jennys tea cup. Provost long clothes black spot Yellow Jack bilged on her anchor league lateen sail case shot lee tackle.</p>\r\n<p>Ballast spirits fluke topmast me quarterdeck schooner landlubber or just lubber gabion belaying pin. Pinnace stern galleon starboard warp carouser to go on account dance the hempen jig jolly boat measured fer yer chains. Man-of-war fire in the hole nipperkin handsomely doubloon barkadeer Brethren of the Coast gibbet driver squiffy.</p>', '2019-11-04 02:15:27', '2019-11-04 02:15:27'),
(20, 'menu_items', 'title', 1, 'pt', 'Painel de Controle', '2019-11-04 02:15:27', '2019-11-04 02:15:27'),
(21, 'menu_items', 'title', 2, 'pt', 'Media', '2019-11-04 02:15:27', '2019-11-04 02:15:27'),
(22, 'menu_items', 'title', 12, 'pt', 'Publicações', '2019-11-04 02:15:27', '2019-11-04 02:15:27'),
(23, 'menu_items', 'title', 3, 'pt', 'Utilizadores', '2019-11-04 02:15:27', '2019-11-04 02:15:27'),
(24, 'menu_items', 'title', 11, 'pt', 'Categorias', '2019-11-04 02:15:27', '2019-11-04 02:15:27'),
(25, 'menu_items', 'title', 13, 'pt', 'Páginas', '2019-11-04 02:15:27', '2019-11-04 02:15:27'),
(26, 'menu_items', 'title', 4, 'pt', 'Funções', '2019-11-04 02:15:27', '2019-11-04 02:15:27'),
(27, 'menu_items', 'title', 5, 'pt', 'Ferramentas', '2019-11-04 02:15:27', '2019-11-04 02:15:27'),
(28, 'menu_items', 'title', 6, 'pt', 'Menus', '2019-11-04 02:15:27', '2019-11-04 02:15:27'),
(29, 'menu_items', 'title', 7, 'pt', 'Base de dados', '2019-11-04 02:15:27', '2019-11-04 02:15:27'),
(30, 'menu_items', 'title', 10, 'pt', 'Configurações', '2019-11-04 02:15:27', '2019-11-04 02:15:27');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `role_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'users/default.png',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `settings` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `users_role_id_foreign` (`role_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role_id`, `name`, `email`, `avatar`, `email_verified_at`, `password`, `remember_token`, `settings`, `created_at`, `updated_at`) VALUES
(1, 1, 'Admin', 'admin@admin.com', 'users/default.png', NULL, '$2y$10$/t96jagppgfaFY0RJE40FO5UDUjvT8KYEhXaVhop5UCVbfy3MI6Za', 'TnJGVlSZVGrPE5FPLcX48TIOvwIyw7SHTgk9nNN2QAgwgSeC6s9qrsDn4bZX', NULL, '2019-11-04 02:15:27', '2019-11-04 02:15:27');

-- --------------------------------------------------------

--
-- Table structure for table `user_roles`
--

DROP TABLE IF EXISTS `user_roles`;
CREATE TABLE IF NOT EXISTS `user_roles` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  PRIMARY KEY (`user_id`,`role_id`),
  KEY `user_roles_user_id_index` (`user_id`),
  KEY `user_roles_role_id_index` (`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `variants`
--

DROP TABLE IF EXISTS `variants`;
CREATE TABLE IF NOT EXISTS `variants` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `product_id` int(10) NOT NULL,
  `code` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `stock` int(10) NOT NULL,
  `price` int(10) NOT NULL,
  `discount` int(10) NOT NULL,
  `status` enum('ACTIVE','INACTIVE') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'ACTIVE',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `variants`
--

INSERT INTO `variants` (`id`, `product_id`, `code`, `stock`, `price`, `discount`, `status`, `created_at`, `updated_at`) VALUES
(7, 11, '123abc-xl-xanh', 2, 90000, 8000, 'ACTIVE', '2019-11-28 07:33:46', '2019-12-20 22:11:43'),
(8, 11, '123abc-xl-red', 10, 10000, 5000, 'ACTIVE', '2019-12-12 06:30:18', '2019-12-12 07:03:34');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `data_rows`
--
ALTER TABLE `data_rows`
  ADD CONSTRAINT `data_rows_data_type_id_foreign` FOREIGN KEY (`data_type_id`) REFERENCES `data_types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `menu_items`
--
ALTER TABLE `menu_items`
  ADD CONSTRAINT `menu_items_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `properties`
--
ALTER TABLE `properties`
  ADD CONSTRAINT `properties_attribute_id_foreign` FOREIGN KEY (`attribute_id`) REFERENCES `attributes` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);

--
-- Constraints for table `user_roles`
--
ALTER TABLE `user_roles`
  ADD CONSTRAINT `user_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_roles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
