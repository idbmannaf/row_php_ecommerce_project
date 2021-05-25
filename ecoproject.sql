-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 25, 2021 at 03:30 PM
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
-- Database: `ecoproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adminId` int(11) NOT NULL,
  `adminName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adminUser` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adminEmail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adminPass` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` set('1','2','3') COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` tinyint(4) NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminId`, `adminName`, `adminUser`, `adminEmail`, `adminPass`, `status`, `level`, `created`) VALUES
(1, 'Super Admin', 'admin', 'admin@gmail.com', 'admin', '1', 0, '2021-04-05 11:26:29'),
(2, 'Abdul Mannaf', 'mannaf', 'mannaf@gmail.com', 'mannaf', '1', 0, '2021-04-05 12:59:46');

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `brandId` int(11) NOT NULL,
  `brandName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`brandId`, `brandName`, `created`, `updated`) VALUES
(2, 'SAMSUNG', '2021-04-05 18:21:47', NULL),
(3, 'iPhone', '2021-04-05 18:21:59', NULL),
(4, 'ACER', '2021-04-05 18:22:17', NULL),
(6, 'Panasonic', '2021-04-06 17:49:37', NULL),
(7, 'Microsoft', '2021-04-06 17:52:29', NULL),
(8, 'Cannon', '2021-04-06 19:32:46', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cartId` int(11) NOT NULL,
  `uid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prductId` int(11) NOT NULL,
  `productName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` float(10,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cartId`, `uid`, `prductId`, `productName`, `price`, `quantity`, `image`) VALUES
(91, 'g7kc7qk437qci7fctpqkoudort', 26, 'Lorem Ipsum is simply', 6000.55, 2, '896541e7e4.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `catId` int(11) NOT NULL,
  `catName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`catId`, `catName`, `created`, `updated`) VALUES
(5, 'Laptop', '2021-04-05 13:39:38', NULL),
(6, 'Electronic', '2021-04-05 15:10:48', NULL),
(10, 'Mobile', '2021-04-05 15:29:15', NULL),
(12, 'TV', '2021-04-05 15:32:38', NULL),
(13, 'Software', '2021-04-05 15:34:33', NULL),
(14, 'Sport', '2021-04-05 15:34:36', NULL),
(15, 'Accessories', '2021-04-05 15:34:58', NULL),
(16, 'Desktop', '2021-04-05 15:35:01', NULL),
(17, 'Clothing', '2021-04-05 15:35:11', NULL),
(27, 'Other', '2021-04-06 19:32:37', NULL),
(28, 'Camera', '2021-04-08 05:17:56', NULL),
(29, 'Tablet', '2021-04-08 17:30:24', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `id` int(11) NOT NULL,
  `countryName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`id`, `countryName`) VALUES
(1, 'Afghanistan'),
(2, 'Albania'),
(3, 'Algeria'),
(4, 'Argentina'),
(5, 'Armenia'),
(6, 'Aruba'),
(7, 'Australia'),
(8, 'Austria'),
(9, 'Azerbaijan'),
(10, 'Bahamas'),
(11, 'Bahrain'),
(12, 'Bangladesh');

-- --------------------------------------------------------

--
-- Table structure for table `customar`
--

CREATE TABLE `customar` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` int(11) NOT NULL,
  `zip` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pass` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customar`
--

INSERT INTO `customar` (`id`, `name`, `address`, `city`, `country`, `zip`, `phone`, `email`, `pass`) VALUES
(2, 'Mannfa', 'Bhety bangal para, Abadpukur hat', 'Naogaon', 2, '5890', '01744508287', 'mannaf444@gmail.com', '12345'),
(3, 'Galib Hossain', 'Madaripur, Dhaka', 'Dhaka', 12, '1200', '0174458796', 'admin@gmail.com', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `ordertable`
--

CREATE TABLE `ordertable` (
  `id` int(11) NOT NULL,
  `customarId` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `productName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` float(10,2) NOT NULL,
  `totalPrice` float(10,2) NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ordertable`
--

INSERT INTO `ordertable` (`id`, `customarId`, `productId`, `productName`, `quantity`, `price`, `totalPrice`, `image`, `date`, `status`) VALUES
(27, 3, 24, 'Lorem Ipsum is simply', 3, 850.65, 2551.95, '0b98c9023e.jpg', '2021-04-10 17:59:16', 1),
(29, 3, 27, 'EOS Rebel T8i EF-S 18-55mm IS STM Lens Kit', 3, 889.50, 2668.50, '5d021fa0ca.png', '2021-04-10 17:59:17', 0),
(30, 0, 27, 'EOS Rebel T8i EF-S 18-55mm IS STM Lens Kit', 3, 889.50, 2668.50, '5d021fa0ca.png', '2021-04-14 08:08:02', 1);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `productId` int(11) NOT NULL,
  `productName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brandId` int(11) NOT NULL,
  `catId` int(11) NOT NULL,
  `details` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` float(10,2) NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` tinyint(4) NOT NULL DEFAULT 0,
  `status` set('1','2','3') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`productId`, `productName`, `brandId`, `catId`, `details`, `price`, `image`, `type`, `status`, `created`) VALUES
(6, 'iPhone 12 Pro Max', 3, 10, 'Lorem Ipsum is simply dummy text of the printing and $at\'typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in th....', 200.00, '4ada0729bf.png', 1, '1', '2021-04-06 13:45:52'),
(7, 'Acer ENDURO Urban N3', 4, 5, 'With durability features, a bright screen, and long battery life, this slender and durable laptop is always ready to take you on new adventures far and wide. The Acer ENDURO Urban N3 combines highly technical features with a day-to-day style that lets you get away from the city and back into nature', 2000.00, 'fbe182dfc3.jpg', 0, '1', '2021-04-06 13:46:35'),
(8, '82\" 8K Smart QLED TV QA82Q800', 2, 12, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum', 6000.00, '242e507e32.jpg', 0, '1', '2021-04-06 13:47:04'),
(9, 'Apple iPhone 11 Pro', 3, 10, 'Apple iPhone 11 Pro is powered by the Apple A13 Bionic processor. The smartphone comes with a 5.8 inches Super Retina XDR OLED capacitive touchscreen and 1125 x 2436 pixels resolution. The screen of the device is protected by Scratch-resistant glass and oleophobic coating.\r\nThe rear camera consists of a 12 MP (wide) + 12 MP (telephoto) 2x optical zoom + 12 MP (ultrawide) lenses.\r....', 1200.00, 'eeb3c5ae53.jpg', 0, '1', '2021-04-06 14:34:19'),
(10, 'iPhone 9 Pro', 3, 10, 'Apple iPhone 9 smartphone runs on iOS v13.0 operating system. The phone is powered by Hexa Core (2.65 GHz, Dual core, Lightning + 1.8 GHz, Quad core, Thunder) processor.It runs on the Apple A13 Bionic Chipset. It has 4 GB RAM and 64 GB internal storage.Apple iPhone 9 smartphone has a OLED display. It measures 138.5 mm x 67.4 mm x 7.8 mm and weighs undefined. The s....', 6000.00, '7d35c06eb2.jpeg', 0, '1', '2021-04-06 14:37:04'),
(20, 'Lorem Ipsum is simply', 2, 6, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit....', 505.22, '603d9a8741.png', 0, '1', '2021-04-06 17:49:00'),
(21, 'Lorem ipsum panasonic', 6, 6, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem IpsumLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum', 620.87, 'c8af9bfeb1.jpg', 0, '1', '2021-04-06 17:50:12'),
(22, 'Lorem Ipsum is simply', 6, 6, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem IpsumLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum', 220.97, '930cf14d59.jpg', 1, '1', '2021-04-06 17:50:48'),
(23, 'Lorem Ipsum is simply', 6, 15, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem IpsumLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum', 680.20, '4d87f5d1ef.png', 0, '1', '2021-04-06 17:51:27'),
(24, 'Lorem Ipsum is simply', 4, 12, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem IpsumLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem IpsumLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem IpsumLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum', 850.65, '0b98c9023e.jpg', 0, '1', '2021-04-06 17:52:04'),
(25, 'Lorem Ipsum is simply', 7, 15, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum', 875.95, 'c12b2f7137.jpg', 0, '1', '2021-04-06 17:52:54'),
(26, 'Lorem Ipsum is simply', 2, 14, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum', 6000.55, '896541e7e4.jpg', 1, '1', '2021-04-06 17:53:31'),
(27, 'EOS Rebel T8i EF-S 18-55mm IS STM Lens Kit', 8, 28, 'The EOS Rebel T8i is the ideal introduction to an interchangeable lens camera, or for those looking for an affordable upgrade. Equipped with a 24.1 Megapixel CMOS (APS-C) sensor, DIGIC 8 image processor and an ISO range of 100-25600 (expandable to 51200**), the EOS Rebel T8i is our most advanced EOS Rebel yet, delivering high-quality performance that kicks your photos and videos up a notc....', 889.50, '5d021fa0ca.png', 0, '1', '2021-04-08 05:18:50');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminId`);

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`brandId`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cartId`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`catId`),
  ADD UNIQUE KEY `catName` (`catName`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customar`
--
ALTER TABLE `customar`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `ordertable`
--
ALTER TABLE `ordertable`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`productId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `adminId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `brandId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cartId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `catId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `customar`
--
ALTER TABLE `customar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ordertable`
--
ALTER TABLE `ordertable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `productId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
