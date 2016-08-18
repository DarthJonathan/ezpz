-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 18, 2016 at 12:18 PM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ezpz`
--

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE `order_detail` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `options` varchar(255) DEFAULT NULL,
  `qty` int(11) NOT NULL,
  `sub_total` int(11) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_detail`
--

INSERT INTO `order_detail` (`id`, `order_id`, `product_id`, `options`, `qty`, `sub_total`, `created`) VALUES
(17, 18, 1, NULL, 3, 30000, '2016-08-12 02:36:44'),
(18, 18, 2, NULL, 2, 40000, '2016-08-12 02:36:44'),
(19, 19, 1, NULL, 30, 3000, '2016-08-12 03:55:44'),
(20, 20, 1, NULL, 30, 3000, '2016-08-12 03:56:20'),
(21, 21, 1, NULL, 30, 3000, '2016-08-12 03:58:13'),
(22, 22, 1, NULL, 30, 3000, '2016-08-12 03:59:08'),
(23, 23, 1, NULL, 30, 3000, '2016-08-12 04:00:23'),
(24, 24, 1, NULL, 30, 3000, '2016-08-12 04:00:48'),
(25, 25, 1, NULL, 30, 3000, '2016-08-12 04:01:14'),
(26, 26, 2, NULL, 100, 15000, '2016-08-12 06:51:16'),
(27, 27, 2, NULL, 300, 45000, '2016-08-12 06:52:26'),
(28, 28, 1, NULL, 20, 2000, '2016-08-12 06:59:30'),
(29, 29, 1, NULL, 20, 2000, '2016-08-12 06:59:31'),
(30, 30, 1, NULL, 3, 300, '2016-08-12 07:01:08'),
(31, 31, 1, NULL, 3, 300, '2016-08-12 07:01:08'),
(32, 32, 1, NULL, 3, 300, '2016-08-12 07:02:08'),
(33, 33, 1, NULL, 3, 300, '2016-08-12 07:04:18'),
(34, 34, 1, NULL, 3, 300, '2016-08-12 07:05:11'),
(35, 35, 1, NULL, 3, 300, '2016-08-12 07:05:13'),
(36, 36, 1, NULL, 3, 300, '2016-08-12 07:05:36'),
(37, 37, 1, NULL, 3, 300, '2016-08-12 07:06:11'),
(38, 38, 1, NULL, 3, 300, '2016-08-12 07:08:46'),
(39, 39, 1, NULL, 4, 400, '2016-08-12 07:09:44');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
