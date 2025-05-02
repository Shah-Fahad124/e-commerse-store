-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 02, 2025 at 11:24 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e-commerce-store`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_by` bigint(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `name`, `description`, `image`, `created_by`, `created_at`) VALUES
(3, 'Amiri', 'Amiri', NULL, 1, '2024-02-28 16:38:08'),
(4, 'Balenciaga', 'Balenciaga', NULL, 1, '2024-02-28 16:39:58'),
(5, 'Bape', 'Bape', NULL, 1, '2024-02-28 16:40:12'),
(6, 'Celine', 'Celine', NULL, 1, '2024-02-28 16:40:31'),
(7, 'Chrome Hearts', 'Chrome Hearts', NULL, 1, '2024-02-28 16:40:48'),
(8, 'Comme Des Garçons', 'Comme Des Garçons', NULL, 1, '2024-02-28 16:41:31'),
(9, 'Denim Tears', 'Denim Tears', NULL, 1, '2024-02-28 16:41:50'),
(10, 'Dior', 'Dior', NULL, 1, '2024-02-28 16:42:06'),
(11, 'Enfants Riches Déprimés', 'Enfants Riches Déprimés', NULL, 1, '2024-02-28 16:43:09'),
(12, 'Gallery Dept.', 'Gallery Dept.', NULL, 1, '2024-02-28 16:43:35'),
(13, 'Givenchy', 'Givenchy', NULL, 1, '2024-02-28 16:44:02'),
(14, 'Gucci', 'Gucci', NULL, 1, '2024-02-28 16:44:16'),
(15, 'Kapital', 'Kapital', NULL, 1, '2024-02-28 16:44:53'),
(16, 'Lanvin', 'Lanvin', NULL, 1, '2024-02-28 16:45:17'),
(17, 'Louis Vuitton', 'Louis Vuitton', NULL, 1, '2024-02-28 16:45:45'),
(18, 'Off-White', 'Off-White', NULL, 1, '2024-02-28 16:46:09'),
(19, 'Palm Angels', 'Palm Angels', NULL, 1, '2024-02-28 16:46:28'),
(20, 'Rick Owens', 'Rick Owens', NULL, 1, '2024-02-28 16:46:45'),
(21, 'Saint Laurent', 'Saint Laurent', NULL, 1, '2024-02-28 16:46:59'),
(22, 'Supreme', 'Supreme', NULL, 1, '2024-02-28 16:47:16'),
(23, 'Vlone', 'Vlone', NULL, 1, '2024-02-28 16:47:29');

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `size` varchar(255) DEFAULT NULL,
  `color` varchar(255) DEFAULT NULL,
  `condition` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_by` bigint(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `image`, `created_by`, `created_at`) VALUES
(1, 'Shoes', 'Here is the description for the shoes category', '1745843271_shoes Category.jpg', 1, '2025-04-28 12:27:53'),
(2, 'Watches', 'The watches category description is here.', '1745843554_watches category.jpg', 1, '2025-04-28 12:32:36'),
(3, 'Bags', 'Here is the bags description.', '1745843594_bags Category.jpg', 1, '2025-04-28 12:33:15'),
(4, 'Shirts', 'The description for the sirts is here', '1745843703_parker-burchfield-tvG4WvjgsEY-unsplash.jpg', 1, '2025-04-28 12:35:04'),
(5, 'Mobiles', 'The description for the mobiles is here', '1745843797_obi-2JrpkyZ2ruQ-unsplash.jpg', 1, '2025-04-28 12:36:42');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `shipping_address` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `email`, `address`, `shipping_address`, `created_at`) VALUES
(13, 'testing', 'zawetamixy@mailinator.com', 'Debitis ea facilis c', 'Deserunt est fugiat ', '2024-02-29 13:23:36'),
(14, 'testing', 'test@gmail.com', 'IT park Peshawar', 'IT park Peshawar', '2024-02-29 13:25:22'),
(15, 'rusepo@mailinator.com', 'dygelewode@mailinator.com', 'Placeat ut non sed ', 'Officiis in occaecat', '2024-02-29 15:02:44'),
(16, 'doriruzy@mailinator.com', 'zoqifuf@mailinator.com', 'Voluptatem Animi m', 'Placeat temporibus ', '2024-03-04 08:32:48'),
(17, 'vabame@mailinator.com', 'bizyd@mailinator.com', 'Officiis assumenda n', 'Esse voluptas dolore', '2024-03-06 16:07:46'),
(38, 'cyroc@mailinator.com', 'wyzogyk@mailinator.com', 'Quod ipsa autem iru', 'Quis minima necessit', '2024-03-06 18:40:01'),
(39, 'lureqapiwy@mailinator.com', 'fejynep@mailinator.com', 'Soluta tempor nisi n', 'Qui officiis fugit ', '2024-03-06 18:41:21'),
(40, 'asdsadas', 'sikemytiry@mailinator.com', 'Quia hic dolore non ', 'Non dolorem est aut ', '2024-03-06 18:42:26'),
(41, 'ruhaguvyl@mailinator.com', 'kepofo@mailinator.com', 'Velit incidunt elig', 'Voluptatem Esse ve', '2024-03-06 18:44:15'),
(42, 'jizysik@mailinator.com', 'tuwacuxyl@mailinator.com', 'Adipisicing et ea ar', 'Illum assumenda ut ', '2024-03-06 18:49:31'),
(43, 'asd', 'shayan@gmail.com', 'IT park Peshawar\r\nIT park Peshawar', 'IT park Peshawar\r\nIT park Peshawar', '2024-03-06 18:54:09'),
(44, 'bogado@mailinator.com', 'femy@mailinator.com', 'Elit aperiam minim ', 'Expedita consectetur', '2024-03-06 19:00:18'),
(45, 'bogado@mailinator.com', 'femy@mailinator.com', 'Elit aperiam minim ', 'Expedita consectetur', '2024-03-06 19:01:11'),
(46, 'pevula@mailinator.com', 'dokaxalawe@mailinator.com', 'In enim quaerat dign', 'Fugit animi culpa ', '2024-03-06 19:08:44'),
(47, 'kysexovovu@mailinator.com', 'worakuj@mailinator.com', 'Ipsum autem veritati', 'Eu est deserunt illu', '2024-03-06 19:10:09');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `total_price` int(11) NOT NULL,
  `payment_method` varchar(255) NOT NULL,
  `status` enum('pending','complete','cancel') NOT NULL DEFAULT 'pending',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `product_id`, `customer_id`, `quantity`, `price`, `total_price`, `payment_method`, `status`, `created_at`) VALUES
(22, 8, 15, 1, 810, 810, 'cash-on-delivery', 'pending', '2024-02-29 15:02:44'),
(23, 8, 17, 1, 810, 810, 'cash-on-delivery', 'pending', '2024-03-06 16:07:47'),
(24, 8, 38, 1, 810, 810, 'cash-on-delivery', 'pending', '2024-03-06 18:40:01'),
(25, 8, 39, 1, 810, 810, 'cash-on-delivery', 'pending', '2024-03-06 18:41:21'),
(26, 8, 40, 1, 810, 810, 'cash-on-delivery', 'pending', '2024-03-06 18:42:26'),
(27, 9, 42, 1, 3600, 3600, 'cash-on-delivery', 'pending', '2024-03-06 18:49:32'),
(28, 8, 43, 1, 810, 810, 'cash-on-delivery', 'pending', '2024-03-06 18:54:09'),
(29, 8, 47, 1, 810, 810, 'cash-on-delivery', 'pending', '2024-03-06 19:10:09');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `order_id` int(11) DEFAULT NULL,
  `payment` varchar(255) NOT NULL,
  `card_number` varchar(255) NOT NULL,
  `card_expirymonth` varchar(255) NOT NULL,
  `card_expiryyear` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `paymentid` varchar(255) NOT NULL,
  `added_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `quantity` decimal(10,0) DEFAULT NULL,
  `size` varchar(255) DEFAULT NULL,
  `color` varchar(255) DEFAULT NULL,
  `conditions` varchar(255) DEFAULT NULL,
  `featured` int(10) NOT NULL DEFAULT 0,
  `category_id` bigint(20) DEFAULT NULL,
  `brand_id` bigint(20) DEFAULT NULL,
  `created_by` bigint(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `title`, `description`, `image`, `price`, `quantity`, `size`, `color`, `conditions`, `featured`, `category_id`, `brand_id`, `created_by`, `created_at`) VALUES
(1, 'Smart Shoes', 'The description of the shoes is here.', NULL, 400.00, 2, '10', 'blue', 'new', 0, 1, 3, 1, '2025-04-29 05:50:25'),
(2, 'New Shoes Design', 'The description of the shoes is here.', NULL, 500.00, 3, '12', 'black', 'new', 0, 1, 4, 1, '2025-04-29 05:51:24'),
(3, 'Amazing Quality Shoes', 'The description of the shoes is here.', NULL, 6000.00, 5, 'brown', 'dark blue', 'new', 0, 1, 5, 1, '2025-04-29 05:52:33'),
(4, 'New Style Shoes', 'The description of the shoes is here.', NULL, 7000.00, 6, '9', 'black', 'new', 0, 1, 5, 1, '2025-04-29 05:53:44'),
(5, 'Sports Shoes', 'The description of the shoes is here.', NULL, 9000.00, 5, '8', 'brown', 'new', 0, 1, 6, 1, '2025-04-29 07:39:50'),
(6, 'Iphone 12', 'The description of the mobile is here.', NULL, 8000.00, 3, '7 inch', 'black', 'use', 0, 5, 11, 1, '2025-04-29 05:56:16'),
(7, 'Infinix hot 50', 'The description of the mobile is here.', NULL, 50000.00, 3, 'medium', 'black', 'new', 0, 5, 13, 1, '2025-04-29 05:57:21'),
(8, 'samsung phone', 'The description of the mobile is here.', NULL, 6800.00, 2, 'medium', 'white', 'use', 0, 5, 13, 1, '2025-04-29 05:58:21');

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_images` longtext NOT NULL,
  `created_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `product_id`, `product_images`, `created_by`) VALUES
(1, 1, '1745905825_shoes1.jpg', 0),
(2, 2, '1745905884_shoes2.jpg', 0),
(3, 3, '1745905953_shoes3.jpg', 0),
(4, 4, '1745906024_shoes5.jpg', 0),
(5, 5, '1745906085_shoes6.jpg', 0),
(6, 6, '1745906176_mobile1.jpg', 0),
(7, 7, '1745906241_mobile2.jpg', 0),
(8, 8, '1745906301_mobile3.jpg', 0),
(9, 1, '1746167949_shoes3.jpg', 0),
(10, 2, '1746170532_shoes5.jpg', 0),
(11, 6, '1746170552_mobile3.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` int(2) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `status`, `created_at`) VALUES
(1, 'Admin', 'admin@admin.com', '827ccb0eea8a706c4c34a16891f84e7b', 1, '2025-04-21 05:06:39'),
(2, 'Shah Fahad', 'www.fahadkhan00087@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', 0, '2025-04-22 04:46:49'),
(3, 'Shah Fahad', 'www.fahadk00087@gmail.com', '8277e0910d750195b448797616e091ad', 0, '2025-04-22 07:24:23'),
(4, 'd', 'www.fahaan00087@gmail.com', '8277e0910d750195b448797616e091ad', 0, '2025-04-22 07:26:39'),
(5, 'Shah Fahad', 'www.faha087@gmail.com', '8277e0910d750195b448797616e091ad', 0, '2025-04-22 07:59:36'),
(6, 'Shah Fahad', 'www.fahadkhan00087@gmail.co', 'c4ca4238a0b923820dcc509a6f75849b', 0, '2025-04-22 09:25:05');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
