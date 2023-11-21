-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 15, 2023 at 02:26 PM
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
-- Database: `tbooster`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` int(255) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `password`, `level`) VALUES
(1, 'plokijuhy', 1);

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `brand_id` varchar(255) NOT NULL,
  `logo` varchar(255) DEFAULT 'default.png',
  `brand_type` varchar(255) NOT NULL,
  `schedule` varchar(255) NOT NULL,
  `status` int(11) DEFAULT 0,
  `date_added` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`id`, `name`, `brand_id`, `logo`, `brand_type`, `schedule`, `status`, `date_added`) VALUES
(1, 'MTN', 'Sp3nDVaEy4', 'Sp3nDVaEy4.jpg', 'others', 'full_time', 1, 'October 28, 2023'),
(2, 'Airtel', '40eD8V7pxE', '40eD8V7pxE.jpg', 'posting', 'full_time', 1, 'October 28, 2023'),
(3, 'Gucci', 'f894SmXiMk', 'f894SmXiMk.jpg', 'posting', 'full_time', 1, 'October 28, 2023'),
(4, 'Tu face', 'JGCIci8xwg', 'JGCIci8xwg.jpg', 'posting', 'full_time', 1, 'October 28, 2023'),
(5, 'Gucci', 'c7I5SVqTYW', 'c7I5SVqTYW.jpg', 'others', 'full_time', 1, 'October 28, 2023'),
(6, 'Chioma Jesus', 'dsxAoGVZjv', 'dsxAoGVZjv.jpg', 'others', 'full_time', 1, 'October 28, 2023'),
(7, 'Kiku', 'SeWzdyhjn6', 'SeWzdyhjn6.jpg', 'others', 'full_time', 1, 'October 28, 2023'),
(8, 'Kiku', '0YCqMce2TP', '0YCqMce2TP.jpg', 'posting', 'part_time', 1, 'October 28, 2023'),
(10, 'Gucci', 'M73T9nXFbf', 'M73T9nXFbf.jpg', 'posting', 'part_time', 1, 'November 6, 2023'),
(11, 'part time', 'rKyRk0dWzM', 'rKyRk0dWzM.jpg', 'others', 'part_time', 1, 'November 6, 2023'),
(12, 'full time', 'X7sUQCSE9v', 'X7sUQCSE9v.jpg', 'others', 'full_time', 1, 'November 6, 2023'),
(13, 'full time post', 'k18VKtd57b', 'k18VKtd57b.jpg', 'posting', 'full_time', 1, 'November 6, 2023'),
(15, 'part time post', 'UXcFEzAfCy', 'UXcFEzAfCy.jpg', 'posting', 'part_time', 1, 'November 6, 2023'),
(16, 'HP Laptop', 'gA8xPsBMoh', 'gA8xPsBMoh.jpg', 'posting', 'part_time', 1, 'November 14, 2023'),
(17, 'Dell', 'w6WySDip8a', 'w6WySDip8a.jpg', 'others', 'part_time', 1, 'November 15, 2023');

-- --------------------------------------------------------

--
-- Table structure for table `completed`
--

CREATE TABLE `completed` (
  `id` int(11) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `brand_id` varchar(255) NOT NULL,
  `brand_type` varchar(255) NOT NULL,
  `price` double DEFAULT NULL,
  `status` int(11) DEFAULT 1,
  `payout_requested` int(11) NOT NULL DEFAULT 0,
  `is_paid` int(11) DEFAULT 0,
  `date_added` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `completed`
--

INSERT INTO `completed` (`id`, `user_id`, `brand_id`, `brand_type`, `price`, `status`, `payout_requested`, `is_paid`, `date_added`) VALUES
(2, '3', 'Sp3nDVaEy4', 'others', 345, 1, 0, 0, 'October 28, 2023'),
(3, '1', 'JGCIci8xwg', 'posting', 45, 0, 0, 0, 'October 28, 2023'),
(4, '1', '40eD8V7pxE', 'posting', 123, 1, 0, 1, 'October 28, 2023'),
(7, '6', '0YCqMce2TP', 'posting', NULL, 1, 0, 0, 'October 31, 2023'),
(8, '4', 'c7I5SVqTYW', 'others', 444, 1, 0, 0, 'October 31, 2023'),
(25, '1', 'f894SmXiMk', 'posting', 56, 1, 0, 1, 'November 6, 2023'),
(26, '4', 'X7sUQCSE9v', 'others', 200, 1, 0, 0, 'November 11, 2023'),
(27, '6', 'rKyRk0dWzM', 'others', 379, 1, 0, 1, 'November 14, 2023'),
(28, '6', 'M73T9nXFbf', 'posting', 4567, 1, 0, 1, 'November 14, 2023'),
(31, '5', 'UXcFEzAfCy', 'posting', 23, 1, 0, 1, 'November 14, 2023'),
(33, '5', 'M73T9nXFbf', 'posting', 4567, 1, 0, 1, 'November 14, 2023'),
(34, '7', 'M73T9nXFbf', 'posting', 4567, 1, 0, 1, 'November 14, 2023'),
(35, '7', 'Sp3nDVaEy4', 'others', 345, 1, 0, 1, 'November 14, 2023'),
(36, '7', 'X7sUQCSE9v', 'others', 200, 1, 0, 1, 'November 14, 2023'),
(37, '6', 'gA8xPsBMoh', 'posting', 346, 1, 0, 1, 'November 15, 2023'),
(38, '6', 'UXcFEzAfCy', 'posting', 23, 1, 0, 1, 'November 15, 2023'),
(39, '7', 'k18VKtd57b', 'posting', 167, 1, 0, 1, 'November 15, 2023'),
(40, '7', '40eD8V7pxE', 'posting', 123, 1, 0, 1, 'November 15, 2023'),
(41, '7', 'JGCIci8xwg', 'posting', 45, 1, 0, 1, 'November 15, 2023'),
(42, '7', 'SeWzdyhjn6', 'others', 1234, 1, 0, 1, 'November 15, 2023'),
(43, '6', 'w6WySDip8a', 'others', 1006, 1, 0, 1, 'November 15, 2023'),
(44, '5', 'gA8xPsBMoh', 'posting', 346, 1, 0, 1, 'November 15, 2023'),
(45, '5', 'rKyRk0dWzM', 'others', 379, 1, 0, 1, 'November 15, 2023'),
(46, '5', '0YCqMce2TP', 'posting', 123, 1, 0, 1, 'November 15, 2023'),
(47, '5', 'w6WySDip8a', 'others', 1006, 1, 0, 1, 'November 15, 2023'),
(48, '1', 'w6WySDip8a', 'others', 1006, 1, 0, 1, 'November 15, 2023');

-- --------------------------------------------------------

--
-- Table structure for table `downloads`
--

CREATE TABLE `downloads` (
  `id` int(11) NOT NULL,
  `brand_id` varchar(255) NOT NULL,
  `playstore` varchar(255) DEFAULT NULL,
  `appstore` varchar(255) DEFAULT NULL,
  `price` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `downloads`
--

INSERT INTO `downloads` (`id`, `brand_id`, `playstore`, `appstore`, `price`) VALUES
(1, 'Sp3nDVaEy4', 'google play', 'apple', 345),
(2, 'c7I5SVqTYW', NULL, NULL, NULL),
(3, 'dsxAoGVZjv', NULL, NULL, NULL),
(4, 'SeWzdyhjn6', NULL, NULL, NULL),
(5, 'rKyRk0dWzM', 'google play', 'apple', 356),
(6, 'X7sUQCSE9v', NULL, NULL, NULL),
(7, 'w6WySDip8a', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `follows`
--

CREATE TABLE `follows` (
  `id` int(11) NOT NULL,
  `brand_id` varchar(255) NOT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `instagram` varchar(255) DEFAULT NULL,
  `youtube` varchar(255) DEFAULT NULL,
  `twitter` varchar(255) DEFAULT NULL,
  `tiktok` varchar(255) DEFAULT NULL,
  `linkedin` varchar(255) DEFAULT NULL,
  `audiomack` varchar(255) DEFAULT NULL,
  `price` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `follows`
--

INSERT INTO `follows` (`id`, `brand_id`, `facebook`, `instagram`, `youtube`, `twitter`, `tiktok`, `linkedin`, `audiomack`, `price`) VALUES
(1, 'Sp3nDVaEy4', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 'c7I5SVqTYW', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 'dsxAoGVZjv', 'facebook', '', '', '', '', '', '', 10034),
(4, 'SeWzdyhjn6', '', '', '', '', '', '', 'aud', 1234),
(5, 'rKyRk0dWzM', '', '', '', '', '', '', '', 0),
(6, 'X7sUQCSE9v', '', '', '', '', '', 'ln', '', 100),
(7, 'w6WySDip8a', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` int(11) NOT NULL,
  `brand_id` varchar(255) NOT NULL,
  `whatsapp` varchar(255) DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `telegram` varchar(255) DEFAULT NULL,
  `price` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `brand_id`, `whatsapp`, `facebook`, `telegram`, `price`) VALUES
(1, 'Sp3nDVaEy4', NULL, NULL, NULL, NULL),
(2, 'c7I5SVqTYW', NULL, NULL, NULL, NULL),
(3, 'dsxAoGVZjv', NULL, NULL, NULL, NULL),
(4, 'SeWzdyhjn6', NULL, NULL, NULL, NULL),
(5, 'rKyRk0dWzM', 'join whatsapp', 'facebook', 'join telegram', 23),
(6, 'X7sUQCSE9v', NULL, NULL, NULL, NULL),
(7, 'w6WySDip8a', '', '', 'sfvdfvdfv', 1006);

-- --------------------------------------------------------

--
-- Table structure for table `jobpass`
--

CREATE TABLE `jobpass` (
  `id` int(11) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `date_added` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jobpass`
--

INSERT INTO `jobpass` (`id`, `owner`, `pass`, `date_added`) VALUES
(1, 'MIKE', '1234', 'DFGBDFGBD'),
(2, 'DFGBDFGBDFGNFGH', '2345', 'GNBFGNFGN'),
(3, 'FJHFYHJFGH', '676767', 'CGNHGHNFGH'),
(4, 'FGHNFHGHNCVHN', '787878', 'FGFNGNCBNCVBNC'),
(5, 'FNGNFGHNFGH', '45342', 'CGNFGHNCBVNCG'),
(6, 'MEGAMIKE', '090900', 'October 28, 2023'),
(7, 'MEGAMIKE', '20329', 'October 28, 2023'),
(9, 'WILLIAMS', '909090', 'November 14, 2023');

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `id` int(11) NOT NULL,
  `brand_id` varchar(255) NOT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `instagram` varchar(255) DEFAULT NULL,
  `youtube` varchar(255) DEFAULT NULL,
  `twitter` varchar(255) DEFAULT NULL,
  `tiktok` varchar(255) DEFAULT NULL,
  `linkedin` varchar(255) DEFAULT NULL,
  `audiomack` varchar(255) DEFAULT NULL,
  `price` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`id`, `brand_id`, `facebook`, `instagram`, `youtube`, `twitter`, `tiktok`, `linkedin`, `audiomack`, `price`) VALUES
(1, 'Sp3nDVaEy4', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 'c7I5SVqTYW', '', '', '', '', '', '', 'aud', 444),
(3, 'dsxAoGVZjv', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 'SeWzdyhjn6', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, 'rKyRk0dWzM', '', '', '', '', '', '', '', 0),
(6, 'X7sUQCSE9v', '', '', '', '', '', '', 'aud', 100),
(7, 'w6WySDip8a', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `posting`
--

CREATE TABLE `posting` (
  `id` int(11) NOT NULL,
  `brand_id` varchar(255) NOT NULL,
  `link` text DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `descr` varchar(255) NOT NULL,
  `price` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `posting`
--

INSERT INTO `posting` (`id`, `brand_id`, `link`, `image`, `descr`, `price`) VALUES
(1, '40eD8V7pxE', 'tgdfghdfghfg', '', '', 123),
(2, 'f894SmXiMk', 'sdfvdsfsdf', '', '', 56),
(3, 'JGCIci8xwg', 'dfgrtgrtg', '', '', 45),
(4, '0YCqMce2TP', 'link', '1699096566.jpg', 'desc', 123),
(6, 'M73T9nXFbf', 'https://twitter.com/thierry_bros/status/1720363764908806630', '1699261514.jpg', 'cghnd fghdrtdhtghdt', 4567),
(7, 'k18VKtd57b', 'link', '1699268843.jpg', 'dfvdfvdf  dc df df dfvdfvdvdfv', 167),
(9, 'UXcFEzAfCy', 'https://twitter.com/thierry_bros/status/1720363764908806630', '1699267629.jpg', 'fsdfsdf', 23),
(10, 'gA8xPsBMoh', 'csdcsdcs', '1699969337.jpg', 'scdvsdfvsdfv', 346);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `referrer` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `referrer`) VALUES
(1, 600);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `schedule` varchar(255) NOT NULL,
  `fullname` varchar(255) DEFAULT NULL,
  `bank` varchar(255) DEFAULT NULL,
  `acct_no` varchar(255) DEFAULT NULL,
  `jobpass` varchar(20) NOT NULL,
  `referral_link` varchar(255) NOT NULL,
  `referrer` varchar(255) DEFAULT NULL,
  `ref_paid` int(11) NOT NULL DEFAULT 0,
  `date_added` varchar(255) NOT NULL,
  `status` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `schedule`, `fullname`, `bank`, `acct_no`, `jobpass`, `referral_link`, `referrer`, `ref_paid`, `date_added`, `status`) VALUES
(1, 'mo6014245571@gmail.com', '06a2790da8a8272dcc615c1cb728a28d', 'full_time', 'Moses Kachibo', NULL, NULL, '12345', 'dfbdfgdfg', NULL, 0, 'October 28, 2023 - 1:16 pm', 1),
(2, 'salt.ogbuji@saltmts.com', 'fb5c7f9bb4b32ce2f3bff4662f1ab27b', 'full_time', 'Salt', NULL, NULL, '2345', '', NULL, 0, 'October 28, 2023 - 1:18 pm', 1),
(3, 'info@info.com', '47109d85485ac7e10202df587ae89377', 'full_time', 'Mark Fish', NULL, NULL, '676767', '', NULL, 0, 'October 28, 2023 - 1:19 pm', 1),
(4, 'saltngbusiness@gmail.com', 'fb5c7f9bb4b32ce2f3bff4662f1ab27b', 'full_time', 'John Kachibo', NULL, NULL, '787878', '', 'zdfsvdfvsdf', 1, 'October 28, 2023 - 1:52 pm', 1),
(5, 'salt1@salt.com', 'fb5c7f9bb4b32ce2f3bff4662f1ab27b', 'part_time', 'Cristiano Ronaldo Jr', 'Fidelity', '0011223344', '45342', 'sdfbsdfgbdscfgbdfcgb', NULL, 0, 'October 28, 2023 - 2:15 pm', 1),
(6, 'salt2@salt.com', '47109d85485ac7e10202df587ae89377', 'part_time', 'Ricardo Kaka', 'Access Bank', '434354656757', '1234', 'zdfsvdfvsdf', 'sdfbsdfgbdscfgbdfcgb', 1, 'October 28, 2023 - 2:16 pm', 1),
(7, 'info@gmail.com', 'fb5c7f9bb4b32ce2f3bff4662f1ab27b', 'full_time', 'Mark Steele', 'GTB', '98765435678', '909090', 'qAxejU1u49', 'zdfsvdfvsdf', 1, 'November 14, 2023 - 3:14 pm', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `brand_id` (`brand_id`);

--
-- Indexes for table `completed`
--
ALTER TABLE `completed`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `downloads`
--
ALTER TABLE `downloads`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `brand_id` (`brand_id`);

--
-- Indexes for table `follows`
--
ALTER TABLE `follows`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `brand_id` (`brand_id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `brand_id` (`brand_id`);

--
-- Indexes for table `jobpass`
--
ALTER TABLE `jobpass`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pass` (`pass`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `brand_id` (`brand_id`);

--
-- Indexes for table `posting`
--
ALTER TABLE `posting`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `brand_id` (`brand_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `completed`
--
ALTER TABLE `completed`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `downloads`
--
ALTER TABLE `downloads`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `follows`
--
ALTER TABLE `follows`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `jobpass`
--
ALTER TABLE `jobpass`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `posting`
--
ALTER TABLE `posting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `downloads`
--
ALTER TABLE `downloads`
  ADD CONSTRAINT `downloads_ibfk_1` FOREIGN KEY (`brand_id`) REFERENCES `brand` (`brand_id`) ON DELETE CASCADE;

--
-- Constraints for table `follows`
--
ALTER TABLE `follows`
  ADD CONSTRAINT `follows_ibfk_1` FOREIGN KEY (`brand_id`) REFERENCES `brand` (`brand_id`) ON DELETE CASCADE;

--
-- Constraints for table `groups`
--
ALTER TABLE `groups`
  ADD CONSTRAINT `groups_ibfk_1` FOREIGN KEY (`brand_id`) REFERENCES `brand` (`brand_id`) ON DELETE CASCADE;

--
-- Constraints for table `likes`
--
ALTER TABLE `likes`
  ADD CONSTRAINT `likes_ibfk_1` FOREIGN KEY (`brand_id`) REFERENCES `brand` (`brand_id`) ON DELETE CASCADE;

--
-- Constraints for table `posting`
--
ALTER TABLE `posting`
  ADD CONSTRAINT `posting_ibfk_1` FOREIGN KEY (`brand_id`) REFERENCES `brand` (`brand_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
