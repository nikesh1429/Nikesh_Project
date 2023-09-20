-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 17, 2023 at 04:54 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mystore`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `brand_id` int(11) NOT NULL,
  `brand_title` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`brand_id`, `brand_title`) VALUES
(1, 'Samsung'),
(2, 'Apple'),
(3, 'Fire Boltt'),
(4, 'Fastrack'),
(5, 'boAt'),
(6, 'OPPO'),
(7, 'Noise');

-- --------------------------------------------------------

--
-- Table structure for table `cart_details`
--

CREATE TABLE `cart_details` (
  `product_id` int(11) NOT NULL,
  `ip_address` varchar(225) NOT NULL,
  `quantity` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart_details`
--

INSERT INTO `cart_details` (`product_id`, `ip_address`, `quantity`) VALUES
(2, '::1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `category_title` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_title`) VALUES
(1, 'Smart Watch'),
(2, 'Ear Buds'),
(3, 'Smart Phone');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_title` text NOT NULL,
  `product_description` text NOT NULL,
  `product_keywords` text NOT NULL,
  `category_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `product_image1` varchar(255) NOT NULL,
  `product_image2` varchar(255) NOT NULL,
  `product_image3` varchar(255) NOT NULL,
  `product_price` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_title`, `product_description`, `product_keywords`, `category_id`, `brand_id`, `product_image1`, `product_image2`, `product_image3`, `product_price`, `date`, `status`) VALUES
(1, 'Galaxy A23', ' Qualcomm Snapdragon 680 processor, 4GB, 6GB, or 8GB of RAM, and 64GB or 128GB of storage. The phone has a 50MP + 5MP + 2MP rear camera and an 8MP front camera', 'samsung', 3, 1, 'iphone14.png', 'iphone14.png', 'iphone14.png', 315, '2023-09-16 05:03:58', 'true'),
(2, 'iPhone 14', '6.1-inch (155 mm) display with Super Retina XDR OLED technology at a resolution of 2532 × 1170 pixels and a pixel density of about 460 PPI with a refresh rate of 60 Hz.', 'iphone', 3, 2, 'iphone14.png', 'apple_watch1.png', 'iphone14.png', 500, '2023-09-16 05:01:51', 'true'),
(3, 'OPPO A57', ' Size, 6.56 inches, 103.4 cm2 (~84.0% screen-to-body ratio) ; Resolution, 720 x 1612 pixels, 20:9 ratio (~269 ppi density) ; OS, Android 12, ColorOS 12.1.', 'Oppo', 3, 6, 'peeble_watch2.png', 'apple_watch1.png', 'a23.png', 100, '2023-09-16 05:03:04', 'true'),
(4, 'FireBoltt Tank', 'Fire-Boltt Tank Smartwatch with Bluetooth Calling, 46.5mm (1.85″) inch Display, 123 sports mode, SpO2 Monitoring, Voice Assistant, and IP67 water resistant', 'tank,fireboltt,watch', 1, 3, 'fireboltt_watch2.png', 'fireboltt_watch2.png', 'fireboltt_watch3.png', 50, '2023-09-16 04:52:22', 'true'),
(6, 'Noise Pluse 2', 'Noise Pulse 2 Max 1.85\" Display, Bluetooth Calling Smart Watch, 10 Days Battery, 550 NITS Brightness, Smart DND, 100 Sports Modes, Smartwatch for Men and Women', 'Noise,watch', 1, 7, 'noice_watch3.png', 'noice_watch2.png', 'noice_watch1.png', 40, '2023-09-16 05:04:28', 'true'),
(7, 'FireBoltt Phoenix', 'Fire-Boltt Phoenix Smart Watch with Bluetooth Calling 1.3\",120+ Sports Modes, 240 * 240 PX High Res with SpO2, Heart Rate Monitoring & IP67 Rating (Silver Grey)', 'fireboltt,watch', 1, 3, 'fireboltt_watch1.png', 'fireboltt_watch3.png', 'fireboltt_watch3.png', 60, '2023-09-16 05:00:20', 'true');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `cart_details`
--
ALTER TABLE `cart_details`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
