-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 24, 2024 at 03:55 PM
-- Server version: 8.0.30
-- PHP Version: 8.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel_ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` bigint UNSIGNED NOT NULL,
  `blog_category_id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `publish_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `discription` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `thumbnail` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tag` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `blog_categories`
--

CREATE TABLE `blog_categories` (
  `id` bigint UNSIGNED NOT NULL,
  `blog_category_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blog_categories`
--

INSERT INTO `blog_categories` (`id`, `blog_category_name`, `slug`, `created_at`, `updated_at`) VALUES
(2, 'Campaign', 'campaign', NULL, NULL),
(3, 'offer', 'offer', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint UNSIGNED NOT NULL,
  `brand_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand_slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand_logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fornt_page` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `brand_name`, `brand_slug`, `brand_logo`, `fornt_page`, `created_at`, `updated_at`) VALUES
(3, 'Rich man', 'rich-man', 'public/files/brand/rich-man.png', NULL, NULL, NULL),
(7, 'Easy', 'easy', 'public/files/brand/laravel.png', NULL, NULL, NULL),
(8, 'China', 'china', 'public/files/brand/china.png', NULL, NULL, NULL),
(9, 'D-link', 'd-link', 'public/files/brand/d-link.png', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `campaigns`
--

CREATE TABLE `campaigns` (
  `id` bigint UNSIGNED NOT NULL,
  `campaign_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `start_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `end_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int DEFAULT NULL,
  `discount` int DEFAULT NULL,
  `campaign_logo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `campaigns`
--

INSERT INTO `campaigns` (`id`, `campaign_title`, `start_date`, `end_date`, `status`, `discount`, `campaign_logo`, `created_at`, `updated_at`) VALUES
(6, 'Ramadan offer', '2024-03-11', '2024-04-09', 1, 10, 'public/files/campaign/1794035646775368.avif', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint UNSIGNED NOT NULL,
  `category_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `show_homepage` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `category_slug`, `category_logo`, `show_homepage`, `created_at`, `updated_at`) VALUES
(11, 'Shirt', 'shirt', NULL, 1, NULL, NULL),
(12, 'Shoe', 'shoe', NULL, 1, NULL, NULL),
(13, 'Pant', 'pant', NULL, 2, NULL, NULL),
(14, 'Fruits', 'fruits', NULL, 1, NULL, NULL),
(18, 'Electronics', 'electronics', 'public/files/category/electronics.jpg', 1, '2024-03-22 23:20:42', '2024-03-22 23:20:42');

-- --------------------------------------------------------

--
-- Table structure for table `childcategories`
--

CREATE TABLE `childcategories` (
  `id` bigint UNSIGNED NOT NULL,
  `category_id` bigint UNSIGNED NOT NULL,
  `subcategory_id` bigint UNSIGNED NOT NULL,
  `childcategory_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `childcategory_slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `childcategories`
--

INSERT INTO `childcategories` (`id`, `category_id`, `subcategory_id`, `childcategory_name`, `childcategory_slug`, `created_at`, `updated_at`) VALUES
(3, 11, 5, 't-shirt', 't-shirt', NULL, NULL),
(4, 11, 6, 't-shirt', 't-shirt', NULL, NULL),
(5, 12, 7, 'sliper', 'sliper', NULL, NULL),
(7, 13, 9, 'jeans pant', 'jeans-pant', NULL, NULL),
(8, 14, 11, 'green apple', 'green-apple', NULL, NULL),
(9, 18, 12, 'Wifi Router', 'wifi-router', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` bigint UNSIGNED NOT NULL,
  `coupon_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `valid_date` date DEFAULT NULL,
  `type` int DEFAULT NULL,
  `coupon_amount` int NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `coupon_code`, `valid_date`, `type`, `coupon_amount`, `status`, `created_at`, `updated_at`) VALUES
(20, '101', '2024-06-29', 1, 200, '1', NULL, NULL),
(21, '102', '2024-02-28', 2, 5000, '2', NULL, NULL),
(22, '103', '2024-03-01', 1, 10000, '2', NULL, NULL),
(23, '104', '2024-03-31', 2, 1000, '2', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
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
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2024_02_06_060227_create_categories_table', 2),
(7, '2024_02_07_055140_create_subcategory_table', 3),
(8, '2024_02_07_064123_create_subcategories_table', 4),
(9, '2024_02_07_064634_create_subcategories_table', 5),
(10, '2024_02_07_155547_create_childcategories_table', 6),
(11, '2024_02_17_034800_create_brands_table', 7),
(13, '2024_02_19_163221_create_seos_table', 8),
(15, '2024_02_20_031054_create_smtps_table', 9),
(17, '2024_02_20_033610_create_pages_table', 10),
(18, '2024_02_20_152335_create_products_table', 11),
(19, '2024_02_20_155104_create_warehouses_table', 12),
(20, '2024_02_22_023838_create_settings_table', 13),
(21, '2024_02_23_153842_create_coupons_table', 14),
(23, '2024_02_25_144210_create_pickup_points_table', 15),
(24, '2024_03_15_101122_create_reviews_table', 16),
(25, '2024_03_18_050630_create_wishlists_table', 17),
(26, '2024_03_19_101811_create_campaigns_table', 18),
(27, '2024_03_30_062753_create_websitereviews_table', 19),
(28, '2024_03_31_041346_create_shipings_table', 20),
(29, '2024_04_03_054540_create_newsletters_table', 21),
(30, '2024_04_04_075055_create_orders_table', 22),
(31, '2024_04_04_075211_create_order_details_table', 22),
(32, '2024_04_24_061812_create_ticktes_table', 23),
(33, '2024_04_24_143336_create_replies_table', 24),
(34, '2024_04_28_043918_add_date_to_replies_table', 25),
(35, '2024_04_29_025008_create_payment_gateway_bd_table', 26),
(36, '2014_10_12_000000_create_users_table', 27),
(37, '2024_05_05_033821_create_blog_categories_table', 28),
(38, '2024_05_05_034228_create_blogs_table', 28);

-- --------------------------------------------------------

--
-- Table structure for table `newsletters`
--

CREATE TABLE `newsletters` (
  `id` bigint UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `newsletters`
--

INSERT INTO `newsletters` (`id`, `email`, `created_at`, `updated_at`) VALUES
(1, 'srrakibkhan4@gmail.com', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` int NOT NULL,
  `c_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `c_phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `c_country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `c_shipping_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `c_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `c_zip_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `c_city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `c_extra_phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subtotal` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `coupon_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `coupon_discount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `after_discount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tax` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_charge` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int DEFAULT '0',
  `date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `month` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `year` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `c_name`, `c_phone`, `c_country`, `c_shipping_address`, `c_email`, `c_zip_code`, `c_city`, `c_extra_phone`, `subtotal`, `total`, `coupon_code`, `coupon_discount`, `after_discount`, `payment_type`, `tax`, `shipping_charge`, `order_id`, `status`, `date`, `month`, `year`, `created_at`, `updated_at`) VALUES
(2, 1, 'Admin', '01762906608', 'bangladesh', 'baligram', 'srrakibkhan4@gmail.com', '8284', 'barishal', NULL, '12250.00', '12250.00', NULL, NULL, NULL, 'paypal', '0', '0', '6610fc3bd2932', 0, '06-04-24', 'April', '2024', NULL, NULL),
(4, 1, 'Admin', '017xxxxxxxx', 'bangladesh', 'baligram', 'srrakibkhan4@gmail.com', '8284', 'barishal', NULL, '2450.00', '2450.00', NULL, NULL, NULL, 'paypal', '0', '0', '662752ca702ba', 1, '23-04-24', 'April', '2024', NULL, NULL),
(5, 1, 'Admin', '017xxxxxxxx', NULL, NULL, 'srrakibkhan4@gmail.com', NULL, NULL, NULL, '250.00', '250.00', NULL, NULL, NULL, 'Amarpay', '0', '0', '663090ddcedaf', 1, '30-04-24', 'April', '2024', NULL, NULL),
(6, 1, 'Admin', '017xxxxxxxx', NULL, NULL, 'srrakibkhan4@gmail.com', NULL, NULL, NULL, '250.00', '250.00', NULL, NULL, NULL, 'Amarpay', '0', '0', '663091478aadd', 1, '30-04-24', 'April', '2024', NULL, NULL),
(7, 1, 'Admin', '017xxxxxxxx', NULL, NULL, 'srrakibkhan4@gmail.com', NULL, NULL, NULL, '1250.00', '1250.00', NULL, NULL, NULL, 'Amarpay', '0', '0', '6630934168230', 1, '30-04-24', 'April', '2024', NULL, NULL),
(8, 1, 'Admin', '017xxxxxxxx', 'bangladesh', 'baligram', 'srrakibkhan@gmail.com', NULL, 'barishal', '0174879573', '2450.00', '2450.00', NULL, NULL, NULL, 'Amarpay', '0', '0', '66309e6209b8a', 1, '30-04-24', 'April', '2024', NULL, NULL),
(9, 1, 'Admin', '017xxxxxxxx', 'bangladesh', 'katakhali', 'srrakibkhan4@gmail.com', '8284', 'barishal', '0174879573', '100.00', '100.00', NULL, NULL, NULL, 'Amarpay', '0', '0', '6630a0524bb55', 1, '30-04-24', 'April', '2024', NULL, NULL),
(10, 1, 'Admin', '017xxxxxxxx', 'bangladesh', 'baligram', 'srrakibkhan4@gmail.com', '8284', 'barishal', '0174879573', '2450.00', '2450.00', NULL, NULL, NULL, 'Amarpay', '0', '0', '6631d8c4b37bc', 1, '24-05-01', 'May', '2024', NULL, NULL),
(11, 2, 'Customer', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '600.00', '600.00', NULL, NULL, NULL, 'Hand Cash', '0', '0', '6665b79b2aa5d', 0, '09-06-24', 'June', '2024', NULL, NULL),
(12, 1, 'Admin', '01749', 'bangladesh', 'baligram', 'srrakibkhan4@gmail.com', '8284', 'barishal', '0174879573', '600.00', '600.00', NULL, NULL, NULL, 'Amarpay', '0', '0', '6682f19bad6be', 1, '01-07-24', 'July', '2024', NULL, NULL),
(13, 1, 'Admin', '01749', 'bangladesh', 'baligram', 'srrakibkhan4@gmail.com', 'Not-Available', '', 'Not-Available', '600.00', '600.00', NULL, NULL, NULL, 'Amarpay', '0', '0', '668432df37670', 1, '02-07-24', 'July', '2024', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` bigint UNSIGNED NOT NULL,
  `order_id` int DEFAULT NULL,
  `product_id` int DEFAULT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `size` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `single_price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subtotal_price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `product_id`, `product_name`, `color`, `size`, `quantity`, `single_price`, `subtotal_price`, `created_at`, `updated_at`) VALUES
(2, 2, 11, 'D-link  wifi Router', NULL, NULL, '5', '2450', '12250', NULL, NULL),
(4, 4, 11, 'D-link  wifi Router', NULL, NULL, '1', '2450', '2450', NULL, NULL),
(5, 6, 9, 'Apple', 'green', NULL, '1', '250', '250', NULL, NULL),
(6, 7, 9, 'Apple', 'green', NULL, '5', '250', '1250', NULL, NULL),
(7, 8, 11, 'D-link  wifi Router', NULL, NULL, '1', '2450', '2450', NULL, NULL),
(8, 9, 5, 'pant', 'red', 'xl', '1', '100', '100', NULL, NULL),
(9, 10, 11, 'D-link  wifi Router', NULL, NULL, '1', '2450', '2450', NULL, NULL),
(10, 12, 10, 'casual shoe', 'red', '38', '1', '600', '600', NULL, NULL),
(11, 13, 10, 'casual shoe', 'red', '38', '1', '600', '600', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` bigint UNSIGNED NOT NULL,
  `page_position` int DEFAULT NULL,
  `page_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `page_slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `page_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `page_description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `page_position`, `page_name`, `page_slug`, `page_title`, `page_description`, `created_at`, `updated_at`) VALUES
(5, 1, 'page one', 'page-one', 'This is page one', '<p><strong style=\"margin: 0px; padding: 0px; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\">Lorem Ipsum</strong><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\">&nbsp;es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido usó una galería de textos y los mezcló de tal manera que logró hacer un libro de textos especimen. No sólo sobrevivió 500 años, sino que tambien ingresó como texto de relleno en documentos electrónicos, quedando esencialmente igual al original. Fue popularizado en los 60s con la creación de las hojas \"Letraset\", las cuales contenian pasajes de Lorem Ipsum, y más recientemente con software de autoedición, como por ejemplo Aldus PageMaker, el cual incluye versiones de Lorem Ipsum.</span><br></p>', NULL, NULL),
(6, 2, 'page two', 'page-two', 'this is page two', '<p><strong style=\"margin: 0px; padding: 0px; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\">Lorem Ipsum</strong><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\">&nbsp;es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido usó una galería de textos y los mezcló de tal manera que logró hacer un libro de textos especimen. No sólo sobrevivió 500 años, sino que tambien ingresó como texto de relleno en documentos electrónicos, quedando esencialmente igual al original. Fue popularizado en los 60s con la creación de las hojas \"Letraset\", las cuales contenian pasajes de Lorem Ipsum, y más recientemente con software de autoedición, como por ejemplo Aldus PageMaker, el cual incluye versiones de Lorem Ipsum.</span><br></p>', NULL, NULL),
(7, 1, 'page three', 'page-three', 'this is page three', '<p><strong style=\"margin: 0px; padding: 0px; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\">Lorem Ipsum</strong><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\">&nbsp;es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido usó una galería de textos y los mezcló de tal manera que logró hacer un libro de textos especimen. No sólo sobrevivió 500 años, sino que tambien ingresó como texto de relleno en documentos electrónicos, quedando esencialmente igual al original. Fue popularizado en los 60s con la creación de las hojas \"Letraset\", las cuales contenian pasajes de Lorem Ipsum, y más recientemente con software de autoedición, como por ejemplo Aldus PageMaker, el cual incluye versiones de Lorem Ipsum.</span><br></p>', NULL, NULL),
(8, 2, 'page four', 'page-four', 'this is page four', '<p><strong style=\"margin: 0px; padding: 0px; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\">Lorem Ipsum</strong><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\">&nbsp;es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido usó una galería de textos y los mezcló de tal manera que logró hacer un libro de textos especimen. No sólo sobrevivió 500 años, sino que tambien ingresó como texto de relleno en documentos electrónicos, quedando esencialmente igual al original. Fue popularizado en los 60s con la creación de las hojas \"Letraset\", las cuales contenian pasajes de Lorem Ipsum, y más recientemente con software de autoedición, como por ejemplo Aldus PageMaker, el cual incluye versiones de Lorem Ipsum.</span><br></p>', NULL, NULL);

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
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_reset_tokens`
--

INSERT INTO `password_reset_tokens` (`email`, `token`, `created_at`) VALUES
('admin@gmail.com', '$2y$12$yNSQlGR05S933d14/zm4qee3WO.Wioi9Ds9dMoW8/R/Rl4TcvbGVG', '2024-02-05 21:17:19'),
('srrakibkhan4@gmail.com', '$2y$12$OzDrowbEczPlQCNCpQBtOehGsTupeYnN42NhmDXP33D9K0UkJOFTu', '2024-02-05 21:16:21');

-- --------------------------------------------------------

--
-- Table structure for table `payment_gateway_bd`
--

CREATE TABLE `payment_gateway_bd` (
  `id` bigint UNSIGNED NOT NULL,
  `getway_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `store_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `signature_key` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payment_gateway_bd`
--

INSERT INTO `payment_gateway_bd` (`id`, `getway_name`, `store_id`, `signature_key`, `status`, `created_at`, `updated_at`) VALUES
(1, 'aamarpay', 'aamarpaytest', 'dbb74894e82415a2f7ff0ec3a97e4183', 1, NULL, NULL),
(2, 'shurjoPay', 'shurkljflkas', 'fasdfsda', NULL, NULL, NULL),
(3, 'sslcommerz', 'gdfgdsfg', 'sdgdfsgdfsg', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pickup_points`
--

CREATE TABLE `pickup_points` (
  `id` bigint UNSIGNED NOT NULL,
  `pickup_point_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pickup_point_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pickup_point_phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pickup_point_phone_two` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pickup_points`
--

INSERT INTO `pickup_points` (`id`, `pickup_point_name`, `pickup_point_address`, `pickup_point_phone`, `pickup_point_phone_two`, `created_at`, `updated_at`) VALUES
(1, 'baligram', 'baligram, bakergonj, barishal', '0124578', '01245', NULL, NULL),
(3, 'sadar road', 'barishal', '01245625', '0123456', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint UNSIGNED NOT NULL,
  `category_id` bigint UNSIGNED NOT NULL,
  `subcategory_id` bigint UNSIGNED NOT NULL,
  `childcategory_id` int DEFAULT NULL,
  `brand_id` int DEFAULT NULL,
  `pickup_point_id` int DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `unit` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tags` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `size` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `purchase_price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `selling_price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `discount_price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stock_quantity` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `warehouse` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `thumbnail` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `images` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `featured` int DEFAULT NULL,
  `today_deal` int DEFAULT NULL,
  `status` int DEFAULT NULL,
  `product_slider` int DEFAULT '0',
  `product_views` int DEFAULT '0',
  `trendy` int DEFAULT '0',
  `flash_deal_id` int DEFAULT NULL,
  `cash_on_delivery` int DEFAULT NULL,
  `admin_id` int DEFAULT NULL,
  `date` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `month` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `subcategory_id`, `childcategory_id`, `brand_id`, `pickup_point_id`, `name`, `slug`, `code`, `unit`, `tags`, `color`, `size`, `video`, `purchase_price`, `selling_price`, `discount_price`, `stock_quantity`, `warehouse`, `description`, `thumbnail`, `images`, `featured`, `today_deal`, `status`, `product_slider`, `product_views`, `trendy`, `flash_deal_id`, `cash_on_delivery`, `admin_id`, `date`, `month`, `created_at`, `updated_at`) VALUES
(1, 11, 6, 4, 3, 3, 't-shirt', 't-shirt', '101', 'pcs', 'tag', 'red', '10', 'fdsafsdf', '500', '1000', '100', '10', 'warehouse 101', 'fdfdsfdaf', '65de1d345ce07.jpg', '[\"1792074353921566.jpg\",\"1792074353951235.jpg\"]', 1, 0, 0, 0, 0, 0, NULL, NULL, 1, '27,02,2024', 'February', NULL, NULL),
(2, 11, 6, 4, 3, 1, 'jama', 'jama', '102', 'pcs', 'jama', 'red,white', 'xl', 'FF-102', '500', '1000', '100', '10', 'warehouse 102', 'this product is very usefull', '65dea8dea0260.jpg', '[\"1792111846251529.jpg\",\"1792111846414141.jpg\",\"1792111846490600.jpg\"]', 1, 0, 1, 0, 0, 1, NULL, NULL, 1, '28,02,2024', 'February', NULL, NULL),
(3, 12, 7, 5, 7, 1, 'juta', 'juta', '103', 'pcs', 'juta sliper women shoe', 'red,white', '10', 'fsadfasdf', '500', '1000', '100', '10', 'warehouse 103', 'sadfasdf', '65dea9a074a7d.jpg', '[\"1792112048295788.jpg\"]', 1, 0, 1, 0, 4, 0, NULL, NULL, 1, '28,02,2024', 'February', NULL, '2024-03-28 23:04:37'),
(4, 11, 6, 4, 3, 1, 'shirt', 'shirt', '105', 'pcs', 'shirt', 'red,white', 'L', 'sdfsadfdsf', '500', '1000', '100', '10', 'warehouse 103', 'fsdfdsfsdafd', '65deab62e1aed.jpg', '[\"1792112520751602.jpg\",\"1792112520812332.jpg\"]', 1, 1, 1, 0, 2, 1, NULL, NULL, 1, '28,02,2024', 'February', NULL, '2024-03-21 23:19:43'),
(5, 13, 9, 7, 3, 3, 'pant', 'pant', '106', 'pcs', 'pant', 'red', 'xl', 'asdfsdafsd', '500', '1000', '100', '10', NULL, 'sdafsdfdsf', '65deac18ea784.jpg', '[\"1792112711788878.jpg\"]', 1, 0, 1, 0, 14, 0, NULL, NULL, 1, '28,02,2024', 'February', NULL, '2024-04-30 01:38:53'),
(6, 13, 9, 7, 3, 1, 'pant', 'pant', '107', 'pcs', 'pant', 'red,white', '10', 'sdafsadf', '500', '1000', '100', '10', 'warehouse 101', 'adfadfd', '65deaca90251e.jpg', '[\"1792112862612438.jpg\"]', 1, 1, 1, 0, 14, 0, NULL, NULL, 1, '28,02,2024', 'February', NULL, '2024-04-30 01:38:53'),
(7, 13, 9, 7, 3, 1, 'pant', 'pant', '108', 'pcs', 'pant', 'red', '10', 'fsdafdsf', '500', '1000', '100', '10', 'warehouse 101', 'fdafdsaf', '65dead87859dd.jpg', '[\"1792113095842923.jpg\"]', 1, 0, 1, 0, 14, 0, NULL, NULL, 1, '28,02,2024', 'February', NULL, '2024-04-30 01:38:53'),
(8, 12, 8, NULL, 3, 3, 'shoe', 'shoe', '112', 'pcs', 'shoe case', 'red,white', '10,11,12,13,14,15,16,17', 'dsfsdfsdaf', '500', '1000', '100', '10', 'warehouse 101', 'this is an amaging product', '65e91f6855042.jpg', '[\"1792830866404507.jpg\",\"1792830866578039.jpg\"]', 1, 1, 1, 1, 40, 0, NULL, NULL, 1, '07,03,2024', 'March', NULL, '2024-04-03 03:23:03'),
(9, 14, 11, 8, 8, 1, 'Apple', '996dda23', '130', 'kg', 'apple green apple', 'green', NULL, 'fdasfdsf', '200', '250', NULL, '30', 'warehouse 101', 'this is good apple', '65eebe9db732b.jpg', '[\"1793217198755721.jpg\",\"1793217198854972.jpg\"]', 1, 0, 1, NULL, 12, 1, NULL, NULL, 1, '11,03,2024', 'March', NULL, '2024-04-30 00:43:02'),
(10, 12, 8, NULL, 8, 1, 'casual shoe', '6d33140c', '120', 'pcs', 'juta, shoe', 'red,black,blue', '38,39,40', 'ffdfasdf', '500', '600', NULL, '10', 'warehouse 101', 'this is a hot product', '65f3c5f6806e2.jpg', '[\"1793562772741733.jpg\",\"1793562772794502.jpg\"]', 1, 0, 1, NULL, 73, 1, NULL, NULL, 1, '15,03,2024', 'March', NULL, '2024-07-02 11:02:38'),
(11, 18, 12, 9, 9, 3, 'D-link  wifi Router', '8e6fb915', 'router-101', 'pcs', 'router,wifi,net accessories', NULL, NULL, NULL, '2100', '2500', '2450', '30', 'warehouse 101', 'this produt is a great wifi product', '65fe9c506f62a.jpg', '[\"1794307498211425.jpg\",\"1794307498280797.jpg\"]', 1, 1, 1, NULL, 86, NULL, NULL, NULL, 1, '23,03,2024', 'March', NULL, '2024-06-30 11:12:10');

-- --------------------------------------------------------

--
-- Table structure for table `replies`
--

CREATE TABLE `replies` (
  `id` bigint UNSIGNED NOT NULL,
  `ticket_id` bigint UNSIGNED NOT NULL,
  `user_id` int NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `review` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rating` int DEFAULT NULL,
  `review_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `review_month` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `review_year` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `user_id`, `product_id`, `review`, `rating`, `review_date`, `review_month`, `review_year`, `created_at`, `updated_at`) VALUES
(1, 1, 8, 'this product is joss', 2, '2024', 'March', NULL, NULL, NULL),
(2, 1, 10, 'this product is also chep', 4, '16-03-2024', 'March', 2024, NULL, NULL),
(3, 2, 8, 'this product is awesome', 5, '18-03-2024', 'March', 2024, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `seos`
--

CREATE TABLE `seos` (
  `id` bigint UNSIGNED NOT NULL,
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_author` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_tag` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_keyword` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `google_varification` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `google_analytics` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alexa_varification` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `google_adsense` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `seos`
--

INSERT INTO `seos` (`id`, `meta_title`, `meta_author`, `meta_tag`, `meta_description`, `meta_keyword`, `google_varification`, `google_analytics`, `alexa_varification`, `google_adsense`, `created_at`, `updated_at`) VALUES
(1, 'ABC market', 'ABC coder', 'online shop, online bazar, online dokan', 'this is a online market platform', 'meta 123', 'Google verifiacion', 'Google Analytics', 'Alexa varification', 'Google adsense', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint UNSIGNED NOT NULL,
  `currency` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_one` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_two` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `main_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `support_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `favicon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci,
  `facebook` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linkedin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `youtube` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `currency`, `phone_one`, `phone_two`, `main_email`, `support_email`, `logo`, `favicon`, `address`, `facebook`, `twitter`, `instagram`, `linkedin`, `youtube`, `created_at`, `updated_at`) VALUES
(1, '$', '01749436376', '01762906608', 'main@gmail.com', 'support@gmail.com', 'public/files/settings/cuserssrappdatalocaltempphp5ff4tmp.jpg', 'public/files/settings/cuserssrappdatalocaltempphp59c7tmp.png', 'barishal', 'https://www.facebook.com/profile.php?id=100012266416729', 'twiter', 'insatagram', 'linkedin', 'youtube', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `shipings`
--

CREATE TABLE `shipings` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `shiping_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shiping_phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shiping_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shiping_country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shiping_city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shiping_zipcode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shiping_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `smtps`
--

CREATE TABLE `smtps` (
  `id` bigint UNSIGNED NOT NULL,
  `mailer` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `host` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `port` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `smtps`
--

INSERT INTO `smtps` (`id`, `mailer`, `host`, `port`, `user_name`, `password`, `created_at`, `updated_at`) VALUES
(1, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `subcategories`
--

CREATE TABLE `subcategories` (
  `id` bigint UNSIGNED NOT NULL,
  `category_id` bigint UNSIGNED NOT NULL,
  `subcategory_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subcategory_slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subcategories`
--

INSERT INTO `subcategories` (`id`, `category_id`, `subcategory_name`, `subcategory_slug`, `created_at`, `updated_at`) VALUES
(5, 11, 'Women shirt', 'women-shirt', NULL, NULL),
(6, 11, 'Men shirt', 'men-shirt', NULL, NULL),
(7, 12, 'Women shoe', 'women-shoe', NULL, NULL),
(8, 12, 'Men shoe', 'men-shoe', NULL, NULL),
(9, 13, 'Women pant', 'women-pant', NULL, NULL),
(10, 13, 'Men pant', 'men-pant', NULL, NULL),
(11, 14, 'Apple', 'apple', NULL, NULL),
(12, 18, 'Network Accessories', 'network-accessories', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ticktes`
--

CREATE TABLE `ticktes` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` int DEFAULT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `service` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `priority` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` text COLLATE utf8mb4_unicode_ci,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int DEFAULT '0',
  `date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `access_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_admin` tinyint(1) DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `phone`, `avatar`, `provider`, `provider_id`, `access_token`, `is_admin`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@gmail.com', NULL, '$2y$12$R/eJxzmQzaJfkzym3tuiOu4JunOT17UxN5jHK.AY7yE7jKgxTEP2m', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL),
(2, 'Customer', 'customer@gmail.com', NULL, '$2y$12$uwIEKwjkmbm1N10g9nCDx.BEDrZQsXud//YLUJog36PILRT5MFIr.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 'samima', 'sa4570423@gmail.com', NULL, '$2y$12$E8SopHdpcyqlxUSfNMpOiO6Xi5tfTzAg/yG7CY17CE1QrDVA76z1K', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-05-21 11:28:25', '2024-05-21 11:28:25');

-- --------------------------------------------------------

--
-- Table structure for table `warehouses`
--

CREATE TABLE `warehouses` (
  `id` bigint UNSIGNED NOT NULL,
  `warehouse_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `warehouse_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `warehouse_phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `warehouses`
--

INSERT INTO `warehouses` (`id`, `warehouse_name`, `warehouse_address`, `warehouse_phone`, `created_at`, `updated_at`) VALUES
(1, 'warehouse 101', 'barishal, Sadar Road', '012340', NULL, NULL),
(2, 'warehouse 102', 'barishal, Alekanda', '012145220', NULL, NULL),
(4, 'warehouse 103', 'barishal, Rupatoli', '01214', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `websitereviews`
--

CREATE TABLE `websitereviews` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `review` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rating` int DEFAULT NULL,
  `review_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `websitereviews`
--

INSERT INTO `websitereviews` (`id`, `user_id`, `name`, `review`, `rating`, `review_date`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'Admin', 'Your product and your service also good', 5, '2024-03-30', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `wishlists`
--

CREATE TABLE `wishlists` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wishlists`
--

INSERT INTO `wishlists` (`id`, `user_id`, `product_id`, `created_at`, `updated_at`) VALUES
(14, 2, 11, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `blogs_blog_category_id_foreign` (`blog_category_id`);

--
-- Indexes for table `blog_categories`
--
ALTER TABLE `blog_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `campaigns`
--
ALTER TABLE `campaigns`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `childcategories`
--
ALTER TABLE `childcategories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `childcategories_category_id_foreign` (`category_id`),
  ADD KEY `childcategories_subcategory_id_foreign` (`subcategory_id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
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
-- Indexes for table `newsletters`
--
ALTER TABLE `newsletters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `payment_gateway_bd`
--
ALTER TABLE `payment_gateway_bd`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `pickup_points`
--
ALTER TABLE `pickup_points`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_category_id_foreign` (`category_id`),
  ADD KEY `products_subcategory_id_foreign` (`subcategory_id`);

--
-- Indexes for table `replies`
--
ALTER TABLE `replies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `replies_ticket_id_foreign` (`ticket_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reviews_user_id_foreign` (`user_id`),
  ADD KEY `reviews_product_id_foreign` (`product_id`);

--
-- Indexes for table `seos`
--
ALTER TABLE `seos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shipings`
--
ALTER TABLE `shipings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `shipings_user_id_foreign` (`user_id`);

--
-- Indexes for table `smtps`
--
ALTER TABLE `smtps`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subcategories`
--
ALTER TABLE `subcategories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subcategories_category_id_foreign` (`category_id`);

--
-- Indexes for table `ticktes`
--
ALTER TABLE `ticktes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `warehouses`
--
ALTER TABLE `warehouses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `websitereviews`
--
ALTER TABLE `websitereviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `websitereviews_user_id_foreign` (`user_id`);

--
-- Indexes for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD PRIMARY KEY (`id`),
  ADD KEY `wishlists_user_id_foreign` (`user_id`),
  ADD KEY `wishlists_product_id_foreign` (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `blog_categories`
--
ALTER TABLE `blog_categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `campaigns`
--
ALTER TABLE `campaigns`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `childcategories`
--
ALTER TABLE `childcategories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `newsletters`
--
ALTER TABLE `newsletters`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `payment_gateway_bd`
--
ALTER TABLE `payment_gateway_bd`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pickup_points`
--
ALTER TABLE `pickup_points`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `replies`
--
ALTER TABLE `replies`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `seos`
--
ALTER TABLE `seos`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `shipings`
--
ALTER TABLE `shipings`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `smtps`
--
ALTER TABLE `smtps`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `subcategories`
--
ALTER TABLE `subcategories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `ticktes`
--
ALTER TABLE `ticktes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `warehouses`
--
ALTER TABLE `warehouses`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `websitereviews`
--
ALTER TABLE `websitereviews`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `wishlists`
--
ALTER TABLE `wishlists`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `blogs`
--
ALTER TABLE `blogs`
  ADD CONSTRAINT `blogs_blog_category_id_foreign` FOREIGN KEY (`blog_category_id`) REFERENCES `blog_categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `childcategories`
--
ALTER TABLE `childcategories`
  ADD CONSTRAINT `childcategories_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `childcategories_subcategory_id_foreign` FOREIGN KEY (`subcategory_id`) REFERENCES `subcategories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `products_subcategory_id_foreign` FOREIGN KEY (`subcategory_id`) REFERENCES `subcategories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `replies`
--
ALTER TABLE `replies`
  ADD CONSTRAINT `replies_ticket_id_foreign` FOREIGN KEY (`ticket_id`) REFERENCES `ticktes` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `reviews_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `shipings`
--
ALTER TABLE `shipings`
  ADD CONSTRAINT `shipings_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `subcategories`
--
ALTER TABLE `subcategories`
  ADD CONSTRAINT `subcategories_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `websitereviews`
--
ALTER TABLE `websitereviews`
  ADD CONSTRAINT `websitereviews_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD CONSTRAINT `wishlists_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `wishlists_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
