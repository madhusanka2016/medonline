-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 04, 2018 at 07:00 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `medonline`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `user` varchar(200) NOT NULL,
  `i_id` int(11) NOT NULL,
  `i_name` varchar(50) NOT NULL,
  `i_qty` int(5) NOT NULL,
  `i_price` int(8) NOT NULL,
  `state` varchar(10) DEFAULT NULL,
  `orderid` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `user`, `i_id`, `i_name`, `i_qty`, `i_price`, `state`, `orderid`) VALUES
(1, 'smmailofficial1@gmail.com', 3, 'Sustegen Chocolate', 2, 1111, NULL, NULL),
(2, 'smmailofficial1@gmail.com', 3, 'Sustegen Chocolate', 4, 1111, NULL, NULL),
(3, 'smmailofficial1@gmail.com', 3, 'Sustegen Chocolate', 4, 1111, NULL, NULL),
(4, 'smmailofficial1@gmail.com', 3, 'Sustegen Chocolate', 4, 1111, NULL, NULL),
(5, 'smmailofficial1@gmail.com', 3, 'Sustegen Chocolate', 4, 1111, NULL, NULL),
(6, 'smmailofficial1@gmail.com', 2, 'aasa', 4, 0, NULL, NULL),
(7, 'smmailofficial1@gmail.com', 2, 'aasa', 4, 0, NULL, NULL),
(8, '{{ Auth::user()->email }}', 4, 'Sustegen Vanilla', 4, 1500, NULL, NULL),
(9, 'smmailofficial1@gmail.com', 4, 'Sustegen Vanilla', 2, 1500, NULL, NULL),
(10, 'smmailofficial1@gmail.com', 2, 'aasa', 1, 0, NULL, NULL),
(11, 'smmailofficial1@gmail.com', 2, 'aasa', 66, 0, NULL, NULL),
(12, 'smmailofficial1@gmail.com', 3, 'Sustegen Chocolate', 55, 1111, NULL, NULL),
(13, 'smmailofficial1@gmail.com', 2, 'aasa', 7, 0, NULL, NULL),
(14, 'smmailofficial1@gmail.com', 2, 'aasa', 7, 0, NULL, NULL),
(15, 'smmailofficial1@gmail.com', 2, 'aasa', 44, 0, NULL, NULL),
(16, 'smmailofficial1@gmail.com', 2, 'aasa', 44, 0, NULL, NULL),
(17, 'smmailofficial1@gmail.com', 2, 'aasa', 4, 0, NULL, NULL),
(18, 'smmailofficial1@gmail.com', 2, 'aasa', 4, 0, NULL, NULL),
(19, 'smmailofficial1@gmail.com', 4, 'Sustegen Vanilla', 70, 1500, NULL, NULL),
(20, 'smmailofficial1@gmail.com', 4, 'Sustegen Vanilla', 8, 1500, NULL, NULL),
(21, 'smmailofficial1@gmail.com', 2, 'aasa', 2, 0, 'order', 4),
(22, 'admin@admin.com', 2, 'aasa', 5, 0, 'order', 8),
(23, 'smmailofficial1@gmail.com', 2, 'aasa', 45454, 0, 'order', 9),
(24, 'cashier@cashier.com', 3, 'Sustegen Chocolate', 11, 1111, 'order', 5),
(26, 'cashier@cashier.com', 4, 'Sustegen Vanilla', 5, 1500, 'order', 7),
(27, 'admin@admin.com', 17, 'Assamodagam', 2, 200, 'cart', NULL),
(28, 'admin@admin.com', 22, 'MeBeoda 201', 1, 100, 'cart', NULL),
(29, 'smmailofficial1@gmail.com', 34, 'Rosiglitazone', 2, 640, 'order', 9);

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `id` int(11) NOT NULL,
  `i_name` varchar(50) NOT NULL,
  `i_cat` int(2) NOT NULL,
  `i_brand` varchar(50) NOT NULL,
  `i_des` varchar(501) NOT NULL,
  `i_price` int(10) NOT NULL,
  `i_qty` int(10) NOT NULL,
  `i_img` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`id`, `i_name`, `i_cat`, `i_brand`, `i_des`, `i_price`, `i_qty`, `i_img`) VALUES
(7, 'Ice Packets', 4, 'Keels', 'wounds', 20, 100, 'http://res.cloudinary.com/group-32/image/upload/v1535579727/Medoinline/First%20aid/ice-packets-3kg.jpg'),
(8, 'Cotton Wool', 4, 'Union Chemist', 'clean wounds', 25, 200, 'http://res.cloudinary.com/group-32/image/upload/v1535579726/Medoinline/First%20aid/absorbent-cotton-wool-500x500.jpg'),
(9, 'Bandage', 4, 'Union Chemist', 'To weap wounds', 20, 500, 'http://res.cloudinary.com/group-32/image/upload/v1535579726/Medoinline/First%20aid/D3844.jpg'),
(10, 'Surgical', 4, 'Union Chemist', 'Union chemist', 20, 300, 'http://res.cloudinary.com/group-32/image/upload/v1535579726/Medoinline/First%20aid/81DVMLjEdjL._SY355_.jpg'),
(11, 'Welless', 6, 'oriflame', 'For men', 6000, 50, 'http://res.cloudinary.com/group-32/image/upload/v1535580029/Medoinline/Wellness/wellness.jpg'),
(12, 'Beauty', 6, 'Oriflame', 'for women', 5000, 200, 'http://res.cloudinary.com/group-32/image/upload/v1535580032/Medoinline/Wellness/beauty.jpg'),
(13, 'Gold tablets', 6, 'Mass', 'For women', 6000, 50, 'http://res.cloudinary.com/group-32/image/upload/v1535580030/Medoinline/Wellness/gold.jpg'),
(14, 'Hair Natural Cammplex', 7, 'Orifame', 'for natural hair growth', 2000, 50, 'http://res.cloudinary.com/group-32/image/upload/v1535580208/Medoinline/Personal%20Care/hairnature.jpg'),
(15, 'oedo', 7, 'Lifehair', 'nutricomplex', 3000, 200, 'http://res.cloudinary.com/group-32/image/upload/v1535580209/Medoinline/Personal%20Care/oedo.jpg'),
(16, 'HairX', 7, 'Oriflame', 'damaged hair', 1500, 100, 'http://res.cloudinary.com/group-32/image/upload/v1535580208/Medoinline/Personal%20Care/hairx.jpg'),
(17, 'Assamodagam', 5, 'Siddalepa', 'For loose mortion', 200, 100, 'http://res.cloudinary.com/group-32/image/upload/v1535580695/Medoinline/mother%20and%20baby/asamodagam.jpg'),
(18, 'Jeewani', 5, 'Siddalepa', 'For loose mortion', 50, 200, 'http://res.cloudinary.com/group-32/image/upload/v1535580695/Medoinline/mother%20and%20baby/jeewani.jpg'),
(19, 'Cologne', 5, 'Jonson', 'To dry head', 350, 200, 'http://res.cloudinary.com/group-32/image/upload/v1535580694/Medoinline/mother%20and%20baby/babycologne.jpg'),
(20, 'Baby Cream', 5, 'Pears', 'To wet up the baby skin', 670, 100, 'http://res.cloudinary.com/group-32/image/upload/v1535580695/Medoinline/mother%20and%20baby/babycream.jpg'),
(21, 'Baby Soap', 5, 'Jonson', 'To use when barthing', 220, 200, 'http://res.cloudinary.com/group-32/image/upload/v1535580695/Medoinline/mother%20and%20baby/babysoap.jpg'),
(22, 'MeBeoda 201', 10, 'Wormin', 'Soap', 100, 50, 'http://res.cloudinary.com/group-32/image/upload/v1535580567/Medoinline/pet/download_2.jpg'),
(23, 'Dog Shampoo', 10, 'Top Dog', 'To use when bath', 240, 50, 'http://res.cloudinary.com/group-32/image/upload/v1535580567/Medoinline/pet/download_1.jpg'),
(24, 'Dog Soap', 10, 'Pet Dog', 'To wash', 650, 200, 'http://res.cloudinary.com/group-32/image/upload/v1535580567/Medoinline/pet/download.jpg'),
(25, 'Hydrogen Peroxide', 3, 'Union chemist', 'To clean wounds', 30, 500, 'http://res.cloudinary.com/group-32/image/upload/v1535580520/Medoinline/home/download_1.jpg'),
(26, 'Plaster', 3, 'Union chemist', 'To wrap wounds', 200, 20, 'http://res.cloudinary.com/group-32/image/upload/v1535580521/Medoinline/home/download.jpg'),
(27, 'Surgical Spirit', 3, 'Union chemist', 'To clean wounds', 150, 20, 'https://res.cloudinary.com/group-32/image/upload/v1535580520/Medoinline/home/41cWhfycnOL._SY355_.jpg'),
(28, 'Betadine', 3, 'Union chemist', 'To dry the wound', 200, 500, 'https://res.cloudinary.com/group-32/image/upload/v1535580521/Medoinline/home/81DVMLjEdjL._SY355_.jpg'),
(29, 'Cotton Wool', 3, 'Union chemist', 'To clean wounds', 100, 40, 'https://res.cloudinary.com/group-32/image/upload/v1535580521/Medoinline/home/absorbent-cotton-wool-500x500.jpg'),
(30, 'Dionil', 2, 'Amdimr', 'Foot wonds', 850, 200, 'https://res.cloudinary.com/group-32/image/upload/v1535580431/Medoinline/diabities/download_1.jpg'),
(31, 'Gliclaside', 1, 'Sumplx', 'To reduse diabitic level', 600, 500, 'https://res.cloudinary.com/group-32/image/upload/v1535580431/Medoinline/diabities/download.jpg'),
(32, 'Mixtard', 3, 'Jimplize', 'To foot care', 523, 200, 'https://res.cloudinary.com/group-32/image/upload/v1535580431/Medoinline/diabities/download_8.jpg'),
(33, 'Metformin', 2, 'demtax', 'To reduse diabitic level', 500, 100, 'https://res.cloudinary.com/group-32/image/upload/v1535580431/Medoinline/diabities/download_6.jpg'),
(34, 'Rosiglitazone', 1, 'Lipse', 'Eye droplets', 640, 510, 'https://res.cloudinary.com/group-32/image/upload/v1535580431/Medoinline/diabities/download_3.jpg'),
(35, 'Isophane Insuline', 1, 'Gymose', 'To skin rashers', 420, 500, 'https://res.cloudinary.com/group-32/image/upload/v1535580431/Medoinline/diabities/download_5.jpg'),
(36, 'Hum', 11, 'Nano', 'Body Building', 7000, 20, 'https://res.cloudinary.com/group-32/image/upload/v1535580623/Medoinline/Supplements/hum.jpg'),
(37, 'Sundown', 11, 'Clad', 'Active growth', 2000, 50, 'https://res.cloudinary.com/group-32/image/upload/v1535580624/Medoinline/Supplements/sundown.png'),
(38, 'Micogel', 8, 'Micoral', 'To dry skin', 100, 100, 'https://res.cloudinary.com/group-32/image/upload/v1535580594/Medoinline/skin/mico-gel-cream-500x500.jpg'),
(39, 'Softmycia', 8, 'Leben', 'To mouth wounds', 50, 100, 'https://res.cloudinary.com/group-32/image/upload/v1535580593/Medoinline/skin/download_3.jpg'),
(40, 'Metformin', 2, 'Aziro', 'medicine', 5, 500, 'http://res.cloudinary.com/group-32/image/upload/v1535579726/Medoinline/First%20aid/D3844.jpg');

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
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `orderid` int(11) NOT NULL,
  `user` varchar(100) NOT NULL,
  `price` int(6) NOT NULL,
  `state` varchar(10) NOT NULL,
  `payid` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `orderid`, `user`, `price`, `state`, `payid`) VALUES
(1, 1, 'smmailofficial1@gmail.com', 2385, 'Delivered', 0),
(3, 3, 'smmailofficial1@gmail.com', 0, 'Processing', 1),
(4, 4, 'smmailofficial1@gmail.com', 0, 'Processing', 1),
(5, 5, 'smmailofficial1@gmail.com', 0, 'Processing', 1),
(6, 6, 'cashier@cashier.com', 12221, 'Processing', 0),
(7, 7, 'cashier@cashier.com', 7500, 'Delivered', 0),
(8, 8, 'admin@admin.com', 0, 'Processing', 0),
(9, 9, 'smmailofficial1@gmail.com', 1280, 'Delivered', 1),
(10, 10, 'admin@admin.com', 500, 'Processing', 3);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int(11) NOT NULL,
  `user` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL,
  `card` int(20) NOT NULL,
  `owner` varchar(50) NOT NULL,
  `exp` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `user`, `type`, `card`, `owner`, `exp`) VALUES
(1, 'smmailofficial1@gmail.com', 'Visa', 455456, 'sdff', '45454'),
(2, 'smmailofficial1@gmail.com', 'Visa', 5245454, 'add', '4545'),
(3, 'admin@admin.com', 'Visa', 11111222, 'smmm', '033'),
(4, 'smmailofficial1@gmail.com', 'Visa', 1111, 'user', '21');

-- --------------------------------------------------------

--
-- Table structure for table `prec`
--

CREATE TABLE `prec` (
  `id` int(11) NOT NULL,
  `user` varchar(50) NOT NULL,
  `topic` varchar(50) NOT NULL,
  `desc` varchar(500) NOT NULL,
  `link` varchar(500) DEFAULT NULL,
  `payment` varchar(50) DEFAULT NULL,
  `repeat` varchar(10) NOT NULL,
  `price` int(5) DEFAULT NULL,
  `state` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prec`
--

INSERT INTO `prec` (`id`, `user`, `topic`, `desc`, `link`, `payment`, `repeat`, `price`, `state`) VALUES
(1, 'smmailofficial1@gmail.com', 'New', 'sffgfghfdgdgf', 'https://res.cloudinary.com/group-32/image/upload/v1535580594/Medoinline/skin/mico-gel-cream-500x500.jpg', 'Visa', 'Once', 2385, 'Delivered'),
(2, 'admin@admin.com', 'New2', 'Sustegen - Sustegen Chocolate', 'https://res.cloudinary.com/group-32/image/upload/v1535580594/Medoinline/skin/mico-gel-cream-500x500.jpg', 'Visa', 'Once', 1111, 'Delivered'),
(3, 'smmailofficial1@gmail.com', 'asas', 'Sustegen - Sustegen Chocolate', 'https://res.cloudinary.com/group-32/image/upload/v1535580594/Medoinline/skin/mico-gel-cream-500x500.jpg', 'Visa', 'Once', 2400, 'Delivered'),
(4, 'smmailofficial1@gmail.com', 'dsas', 'sdsad', 'sadasd', 'Visa', 'Once', NULL, 'Processing'),
(5, 'smmailofficial1@gmail.com', 'sdasd', 'sadad', 'asdadd', 'Visa', 'Once', NULL, 'Processing'),
(6, 'smmailofficial1@gmail.com', 'adds', 'asdadd', 'asdd', 'Visa', 'Once', NULL, 'Processing'),
(7, 'smmailofficial1@gmail.com', 'dasd', 'dfaff', 'fafad', 'Visa', 'Once', NULL, 'Processing'),
(8, 'smmailofficial1@gmail.com', 'sadfsdf', 'fdsdafsd', 'dfsfsdf', 'Visa', 'Once', NULL, 'Processing'),
(9, 'smmailofficial1@gmail.com', '4454', 'dfaf', 'adad', 'Visa', 'Once', NULL, 'Processing');

-- --------------------------------------------------------

--
-- Table structure for table `precitem`
--

CREATE TABLE `precitem` (
  `id` int(11) NOT NULL,
  `orderid` varchar(5) NOT NULL,
  `user` varchar(100) NOT NULL,
  `i_id` int(5) NOT NULL,
  `i_name` varchar(100) NOT NULL,
  `i_qty` varchar(50) NOT NULL,
  `i_price` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `precitem`
--

INSERT INTO `precitem` (`id`, `orderid`, `user`, `i_id`, `i_name`, `i_qty`, `i_price`) VALUES
(1, '1', 'smmailofficial1@gmail.com', 2, 'aasa', '10', 10),
(2, '1', 'smmailofficial1@gmail.com', 2, 'aasa', '3', 3),
(3, '1', 'smmailofficial1@gmail.com', 2, 'aasa', '3', 3),
(4, '1', 'smmailofficial1@gmail.com', 2, 'aasa', '3', 3),
(5, '1', 'smmailofficial1@gmail.com', 3, 'Sustegen Chocolate', '6', 6),
(6, '5', 'cashier@cashier.com', 2, 'aasa', '3', 0),
(7, '5', 'cashier@cashier.com', 3, 'Sustegen Chocolate', '2', 1111),
(8, '1', 'smmailofficial1@gmail.com', 2, 'aasa', '3', 0),
(9, '1', 'smmailofficial1@gmail.com', 3, 'Sustegen Chocolate', '2', 1111),
(10, '2', 'cashier@cashier.com', 3, 'Sustegen Chocolate', '1', 1111),
(11, '3', 'cashier@cashier.com', 31, 'Gliclaside', '2', 600),
(12, '3', 'cashier@cashier.com', 31, 'Gliclaside', '2', 600);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `ad1` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ad2` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ad3` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` int(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`, `ad1`, `ad2`, `ad3`, `phone`) VALUES
(1, 'S.m. Perera', 'smmailofficial@gmail.com', '$2y$10$m76vr9eIHQYrfbEL.3U8UegsHMDp8Nzdnlhro7e.txi/xOxpQt08m', 'Fsv7fCGyxv7CpOS7qXqWm9w7cJqvEP0zyxusK69ZqxR7ccyNzLVqRtYZLIGw', '2018-08-19 04:49:41', '2018-08-19 04:49:41', NULL, NULL, '', 0),
(2, 'S.m. Perera', 'smmailofficial1@gmail.com', '$2y$10$OFJtXYOoIh7CY.8FRhD31O4w/cNVlMkzSz1./289gj/0gL8lIX/jK', 'W4T6gM4lO665P4fpNf4JIQVg5ZdsKnEdwpb4qTY4FOlqsQo0SGl4HBotvUX8', '2018-08-19 05:34:09', '2018-08-19 05:34:09', 'address 1', 'address 2', 'address 3', 778519113),
(3, 'S.m. Perera', 'smmailofficial2@gmail.com', '$2y$10$lEFMoxgJUQvq.jaTXDN2GOnY3OcqpmX8l5ZH7i5QbgyrO5nK7tv9m', 'GPjNnGFJcXMJFFg7Pcjl4AaNthLECElKfVYGv5yFmw5lOnTVi4i9oOYcierp', '2018-08-21 02:26:02', '2018-08-21 02:26:02', NULL, NULL, NULL, NULL),
(4, 'New', 'smmailofficial1@gmail.comas', '$2y$10$IlXKL1kJ82ktcrO5/Auffu7K/c.BHQZBYGxhpBMnNy77tI9nQiHNm', 'KCOtxHtBjUgRsgbkTBS9m8Bb1QPX839XV7uoHAzAlqNLYBryuC7bO3amq8ri', '2018-08-27 10:22:32', '2018-08-27 10:22:32', NULL, NULL, NULL, NULL),
(5, 'Admin', 'admin@admin.com', '$2y$10$chjlilqpYpAQOUgMGYaM9uRwyZYoBWMzo1ozNRe0R1kvEx3gsCiGG', 'lHJKmlxmO487LMkQmIlO3aC09khjfl8zHD4xZrJIONXqiCbfn0rVma3K621x', '2018-08-28 07:06:40', '2018-08-28 07:06:40', NULL, NULL, NULL, NULL),
(6, 'Cashier', 'cashier@cashier.com', '$2y$10$UBTFgVMoKvzhJf/J18yHEuz5CoaETNYuQhL1jPGg962ctSv4GrHG6', 'F8DNKfjnH5chA1E6Hi8ulOBiYzKJtQ4hFTAPqgiCNqPrNFcMGbbbPe5KUocn', '2018-08-28 07:07:05', '2018-08-28 07:07:05', NULL, NULL, NULL, NULL),
(7, 'New3', 'smmailofficial3@gmail.com', '$2y$10$w5L/8Z6qrH90AMbrM8IIteQeTN3kwAmNfKS.8EOfA4l.OpmeP1gNi', 'JoHxSkGC09wt2zQwucfVH2hLR6tBWubDXY0Qj0zacxZwcbuJUZBCyxodiNLk', '2018-08-29 17:42:05', '2018-08-29 17:42:05', NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prec`
--
ALTER TABLE `prec`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `precitem`
--
ALTER TABLE `precitem`
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
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `prec`
--
ALTER TABLE `prec`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `precitem`
--
ALTER TABLE `precitem`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
