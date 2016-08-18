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
-- Table structure for table `order_history`
--

CREATE TABLE `order_history` (
  `id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `code` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `total_product` int(11) NOT NULL,
  `total_qty` int(11) NOT NULL,
  `total_price` int(11) NOT NULL,
  `delivery_cost` int(11) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_history`
--

INSERT INTO `order_history` (`id`, `status`, `code`, `user_id`, `total_product`, `total_qty`, `total_price`, `delivery_cost`, `created`) VALUES
(18, 0, 'a7322', 33, 2, 5, 70000, 0, '2016-08-12 02:36:44'),
(20, 1, '36472', 33, 1, 30, 3000, 0, '2016-08-12 03:56:20'),
(21, 0, '481dd', 33, 1, 30, 3000, 0, '2016-08-12 03:58:13'),
(22, 0, '0dfca', 33, 1, 30, 3000, 0, '2016-08-12 03:59:08'),
(23, 0, 'a131c', 33, 1, 30, 3000, 0, '2016-08-12 04:00:23'),
(24, 0, '2db8c', 33, 1, 30, 3000, 0, '2016-08-12 04:00:48'),
(25, 1, '61b42', 33, 1, 30, 3000, 0, '2016-08-12 04:01:14'),
(27, 0, 'a02df', 33, 1, 300, 45000, 0, '2016-08-12 06:52:26'),
(28, 0, '103c6', 33, 1, 20, 2000, 0, '2016-08-12 06:59:30'),
(29, 1, '717ae', 33, 1, 20, 2000, 0, '2016-08-12 06:59:31'),
(30, 0, '48f52', 33, 1, 3, 300, 0, '2016-08-12 07:01:08'),
(31, 1, 'b2279', 33, 1, 3, 300, 0, '2016-08-12 07:01:08'),
(32, 0, '28bb7', 33, 1, 3, 300, 0, '2016-08-12 07:02:08'),
(33, 0, '6f3a7', 33, 1, 3, 300, 0, '2016-08-12 07:04:18'),
(34, 0, '5285d', 33, 1, 3, 300, 0, '2016-08-12 07:05:11'),
(35, 0, '51000', 33, 1, 3, 300, 0, '2016-08-12 07:05:13'),
(36, 0, '29574', 33, 1, 3, 300, 0, '2016-08-12 07:05:36'),
(37, 0, 'd1d2d', 33, 1, 3, 300, 0, '2016-08-12 07:06:11'),
(38, 0, '954f4', 33, 1, 3, 300, 0, '2016-08-12 07:08:46'),
(39, 1, 'c7023', 33, 1, 4, 400, 0, '2016-08-12 07:09:44');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `order_history`
--
ALTER TABLE `order_history`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `order_history`
--
ALTER TABLE `order_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
