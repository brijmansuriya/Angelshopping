-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 11, 2020 at 02:52 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `angel`
--

-- --------------------------------------------------------

--
-- Table structure for table `add_brand`
--

CREATE TABLE `add_brand` (
  `id` int(10) UNSIGNED NOT NULL,
  `brand_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand_desc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `add_brand`
--

INSERT INTO `add_brand` (`id`, `brand_name`, `brand_desc`, `created_at`, `updated_at`) VALUES
(1, 'vivo', 'vivo brand here..', '2020-11-07 23:23:00', '2020-11-09 05:58:53'),
(3, 'Nike', 'nike brand here', '2020-11-08 10:15:59', '2020-11-08 10:15:59'),
(4, 'uspolo', 'uspolo brand here', '2020-11-08 10:16:43', '2020-11-08 10:16:43'),
(5, 'Lenovo', 'lenovo brand here', '2020-11-09 07:18:58', '2020-11-09 07:18:58');

-- --------------------------------------------------------

--
-- Table structure for table `add_category`
--

CREATE TABLE `add_category` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_desc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `add_category`
--

INSERT INTO `add_category` (`id`, `category_name`, `category_desc`, `created_at`, `updated_at`) VALUES
(1, 'Men\'s fashion', 'mens item here...', '2020-11-07 23:21:05', '2020-11-07 23:32:43'),
(2, 'Women\'s Fashion', 'womens item here', '2020-11-07 23:21:55', '2020-11-07 23:21:55'),
(3, 'Electronic', 'electronic here', '2020-11-08 00:00:00', '2020-11-08 00:00:00'),
(5, 'Computers', 'Computers here.', '2020-11-09 07:16:53', '2020-11-09 07:16:53');

-- --------------------------------------------------------

--
-- Table structure for table `add_sub_category`
--

CREATE TABLE `add_sub_category` (
  `sc_id` int(10) UNSIGNED NOT NULL,
  `sc_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sc_desc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `c_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `add_sub_category`
--

INSERT INTO `add_sub_category` (`sc_id`, `sc_name`, `sc_desc`, `c_id`, `created_at`, `updated_at`) VALUES
(1, 'Shoes', 'shoes here...', 1, '2020-11-07 23:24:23', '2020-11-07 23:29:19'),
(2, 'tshirt', 'tshirt here', 1, '2020-11-07 23:32:27', '2020-11-07 23:32:27'),
(4, 'Mobile', 'mobile here', 3, '2020-11-08 00:00:29', '2020-11-08 00:00:29'),
(5, 'shoes', 'women shoes here', 2, '2020-11-08 10:17:49', '2020-11-08 10:17:49'),
(6, 'Leptop', 'Leptop here', 5, '2020-11-09 07:18:17', '2020-11-09 07:18:17');

-- --------------------------------------------------------

--
-- Table structure for table `admin_login`
--

CREATE TABLE `admin_login` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin_login`
--

INSERT INTO `admin_login` (`id`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'admin@gmail.com', 'admin123', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `c_id` int(10) UNSIGNED NOT NULL,
  `cartItem` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `cartsitemqty` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobileno` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`id`, `name`, `email`, `mobileno`, `message`, `created_at`, `updated_at`) VALUES
(1, 'ravi bagariya', 'ravibagariya@gmail.com', '8128220124', 'best website', '2020-11-08 23:20:10', '2020-11-08 23:20:10'),
(3, 'mansuriya', 'brijmansuriya711@gmail.com', '8141010131', 'best', '2020-11-09 10:47:32', '2020-11-09 10:47:32');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
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
(12, '2020_11_08_113854_order_masters', 3),
(26, '2014_10_12_000000_create_users_table', 4),
(27, '2014_10_12_100000_create_password_resets_table', 4),
(28, '2019_08_19_000000_create_failed_jobs_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `ordermasters`
--

CREATE TABLE `ordermasters` (
  `orderid` int(11) NOT NULL,
  `firstname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `house_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `street` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `district` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pincode` int(11) NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `ordertotalprice` double(8,2) NOT NULL,
  `orderstatus` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ordermasters`
--

INSERT INTO `ordermasters` (`orderid`, `firstname`, `lastname`, `mobile_no`, `email`, `house_no`, `street`, `city`, `district`, `state`, `pincode`, `user_id`, `ordertotalprice`, `orderstatus`, `order_date`, `created_at`, `updated_at`) VALUES
(202011111, 'ravi', 'bagariya', '8128220124', 'ravibagariya@gmail.com', '11', 'dhari', 'dhari', 'amreli', 'gujarat', 365640, 5, 33897.60, '2', '2020-11-11', '2020-11-11 06:59:17', '2020-11-11 06:59:17'),
(202011112, 'brij', 'mansuriya', '8141010131', 'brijmansuriya711@gmail.com', '12', 'moti mayad', 'motimayad', 'rajkot', 'gujarat', 360421, 7, 16628.00, '1', '2020-11-11', '2020-11-11 08:07:16', '2020-11-11 08:07:16');

-- --------------------------------------------------------

--
-- Table structure for table `ordersdetail`
--

CREATE TABLE `ordersdetail` (
  `order_id` int(10) UNSIGNED NOT NULL,
  `itemid` int(11) NOT NULL,
  `itemqtys` int(11) NOT NULL,
  `itemprice` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ordersdetail`
--

INSERT INTO `ordersdetail` (`order_id`, `itemid`, `itemqtys`, `itemprice`, `created_at`, `updated_at`) VALUES
(202011111, 1, 1, 7920.00, '2020-11-11 06:59:18', '2020-11-11 06:59:18'),
(202011111, 5, 1, 25977.60, '2020-11-11 06:59:18', '2020-11-11 06:59:18'),
(202011112, 1, 2, 7920.00, '2020-11-11 08:07:16', '2020-11-11 08:07:16'),
(202011112, 3, 1, 788.00, '2020-11-11 08:07:16', '2020-11-11 08:07:16');

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
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `p_id` int(10) UNSIGNED NOT NULL,
  `p_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `p_qty` int(11) NOT NULL,
  `p_listprice` double NOT NULL,
  `p_op` double NOT NULL,
  `p_suggesion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `p_desc` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `p_image` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `p_add_date` datetime NOT NULL,
  `p_gw` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `p_gw_desc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand_id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `subcategory_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`p_id`, `p_name`, `p_qty`, `p_listprice`, `p_op`, `p_suggesion`, `p_desc`, `p_image`, `p_add_date`, `p_gw`, `p_gw_desc`, `brand_id`, `category_id`, `subcategory_id`, `created_at`, `updated_at`) VALUES
(1, 'vivo', 10, 8000, 1, 'All', 'vivo v11 8 gb ram 32gb memory', '1604841420.jpg', '2020-11-08 11:24:35', 'Guarantee', '1year', 1, 3, 4, '2020-11-08 05:54:35', '2020-11-08 07:47:00'),
(2, 'Nike shoes', 10, 1500, 2, 'Female', 'Nike shoes \r\nbest quality here', '1604850598.jpg', '2020-11-08 21:19:58', 'Warranty', '1year', 3, 2, 5, '2020-11-08 15:49:58', '2020-11-08 15:49:58'),
(3, 'uspolo tshirt', 15, 800, 1.5, 'All', 'mens thsirt us polo\r\nbest qualiy and brand', '1604850721.jpg', '2020-11-08 21:22:01', 'Guarantee', '1year', 4, 1, 2, '2020-11-08 15:52:01', '2020-11-08 15:52:01'),
(5, 'Lenovo Ideapad Slim 3', 5, 31680, 18, 'All', 'Lenovo Ideapad Slim 3 AMD Ryzen 3 15.6 inch Laptop (4GB/1TB HDD/Windows 10/MS Office 2019/Platinum Grey/1.85Kg), 81W10057IN', '1604926295.jpg', '2020-11-09 18:21:35', 'Warranty', '1 year', 5, 5, 6, '2020-11-09 12:51:35', '2020-11-09 07:22:38');

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `firstname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobileno` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`user_id`, `firstname`, `lastname`, `gender`, `mobileno`, `email`, `password`, `created_at`, `updated_at`) VALUES
(5, 'ravi', 'bagariya', '0', '8128220124', 'ravibagariya@gmail.com', 'ravi123', '2020-11-09 11:09:04', '2020-11-11 08:15:35'),
(7, 'brij', 'mansuriya', '0', '8141010131', 'brijmansuriya711@gmail.com', 'brij1234', '2020-11-11 08:06:19', '2020-11-11 08:06:19');

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
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `add_brand`
--
ALTER TABLE `add_brand`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `add_category`
--
ALTER TABLE `add_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `add_sub_category`
--
ALTER TABLE `add_sub_category`
  ADD PRIMARY KEY (`sc_id`),
  ADD KEY `add_sub_category_c_id_foreign` (`c_id`);

--
-- Indexes for table `admin_login`
--
ALTER TABLE `admin_login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`c_id`),
  ADD KEY `cart_user_id_foreign` (`user_id`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ordermasters`
--
ALTER TABLE `ordermasters`
  ADD KEY `ordermasters_user_id_foreign` (`user_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`p_id`),
  ADD KEY `product_brand_id_foreign` (`brand_id`),
  ADD KEY `product_category_id_foreign` (`category_id`),
  ADD KEY `product_subcategory_id_foreign` (`subcategory_id`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`user_id`);

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
-- AUTO_INCREMENT for table `add_brand`
--
ALTER TABLE `add_brand`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `add_category`
--
ALTER TABLE `add_category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `add_sub_category`
--
ALTER TABLE `add_sub_category`
  MODIFY `sc_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `admin_login`
--
ALTER TABLE `admin_login`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `c_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `p_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `user_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `add_sub_category`
--
ALTER TABLE `add_sub_category`
  ADD CONSTRAINT `add_sub_category_c_id_foreign` FOREIGN KEY (`c_id`) REFERENCES `add_category` (`id`);

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `register` (`user_id`);

--
-- Constraints for table `ordermasters`
--
ALTER TABLE `ordermasters`
  ADD CONSTRAINT `ordermasters_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `register` (`user_id`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_brand_id_foreign` FOREIGN KEY (`brand_id`) REFERENCES `add_brand` (`id`),
  ADD CONSTRAINT `product_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `add_category` (`id`),
  ADD CONSTRAINT `product_subcategory_id_foreign` FOREIGN KEY (`subcategory_id`) REFERENCES `add_sub_category` (`sc_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
