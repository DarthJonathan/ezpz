-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 10, 2016 at 05:38 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 7.0.8

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
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `email`, `created`) VALUES
(1, 'admin', 'd3623c77578eebdac371c5f82d23c3fb4376396cdb4c7045c933398105db60f9e56c7c3f3af8474ee155a0804ea6f193e66555d76362ecf2675802e4f1a2387d', 'zonecaptain@gmail.com', '0000-00-00'),
(2, 'ipan', 'd3623c77578eebdac371c5f82d23c3fb4376396cdb4c7045c933398105db60f9e56c7c3f3af8474ee155a0804ea6f193e66555d76362ecf2675802e4f1a2387d', 'irpanwinata@gmail.com', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `dishes`
--

CREATE TABLE `dishes` (
  `id` int(20) NOT NULL,
  `restaurant_id` int(20) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` double NOT NULL,
  `description` text NOT NULL,
  `photo` varchar(255) NOT NULL,
  `available` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dishes`
--

INSERT INTO `dishes` (`id`, `restaurant_id`, `name`, `price`, `description`, `photo`, `available`) VALUES
(1, 1, 'Nasi Ayam', 20000, '', '', 1),
(2, 2, 'Nasi Goreng Gangster', 25000, '', '', 1),
(3, 8, 'Sety Bakar', 25, 'INI SETY DIBAKAR TRUS KULITNYA KAYA IRVAN', 'uploads/user/Moo Milk/menu/mickey_png__d_by_azul0123-d5p0y4o.png', 1),
(4, 2, 'Setyawan', 54, '', 'uploads/user/Nasi Goreng Mafia/menu/minion_png_by_isammyt-d6fn0fj.png', 1),
(5, 1, 'Felita', 4, '', 'uploads/user/Padang Sederhana/update_form_clients/cokecan.jpg', 1),
(6, 1, 'Felita', 4, '', 'uploads/user/Padang Sederhana/update_form_clients/cokecan.jpg', 1),
(7, 1, 'Felita', 4, '', 'uploads/user/Padang Sederhana/update_form_clients/cokecan.jpg', 1),
(8, 1, 'irvan', 3, '', 'uploads/user/Padang Sederhana/update_form_clients/Louis.png', 1),
(9, 1, 'jona', 2, '', 'uploads/user/Padang Sederhana/update_form_clients/Louis.png', 1),
(10, 1, 'tout', 32, '', 'uploads/user/Padang Sederhana/update_form_clients/cokecan.jpg', 1),
(11, 1, 'tout', 32, '', 'uploads/user/Padang Sederhana/update_form_clients/cokecan.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `drivers`
--

CREATE TABLE `drivers` (
  `id` int(20) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `firstname` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `ird` varchar(255) NOT NULL,
  `driver_licence` varchar(255) NOT NULL,
  `licence_type` varchar(255) NOT NULL,
  `photo_front` varchar(255) DEFAULT NULL,
  `photo_back` varchar(255) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `verification_code` varchar(255) DEFAULT NULL,
  `is_verified` int(20) DEFAULT NULL,
  `created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `drivers`
--

INSERT INTO `drivers` (`id`, `username`, `password`, `firstname`, `lastname`, `email`, `phone`, `address`, `ird`, `driver_licence`, `licence_type`, `photo_front`, `photo_back`, `photo`, `verification_code`, `is_verified`, `created`) VALUES
(1, 'John', 'd3623c77578eebdac371c5f82d23c3fb4376396cdb4c7045c933398105db60f9e56c7c3f3af8474ee155a0804ea6f193e66555d76362ecf2675802e4f1a2387d', NULL, NULL, 'jonathan.hosea@me.com', '+087884514310', 'Taman Pegangsaan Ind0ah Blok D no 11, kelapa gading', 'u3hekahbmdfbasf', 'sdkjhfkjsbdfsjdfsf', 'learner', NULL, NULL, NULL, '80cde59ca19c731a8838bcb70a80a64664e3fde1bd8b227317a8bd5658d4ad35', 0, '2016-08-05'),
(2, 'Felita', 'd3623c77578eebdac371c5f82d23c3fb4376396cdb4c7045c933398105db60f9e56c7c3f3af8474ee155a0804ea6f193e66555d76362ecf2675802e4f1a2387d', NULL, NULL, 'asdf@gmail.com', '+081316361519', 'Gad', '9090', '9090', 'learner', NULL, NULL, NULL, '30d44d37b1353cd9f23ca85a4173d9c26ff0fc9eca50bdff5b470036a9ebf7e9', 0, '2016-08-09');

-- --------------------------------------------------------

--
-- Table structure for table `restaurants`
--

CREATE TABLE `restaurants` (
  `id` int(20) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `cuisine` varchar(255) DEFAULT NULL,
  `opentime` time DEFAULT NULL,
  `closetime` time DEFAULT NULL,
  `opendays` varchar(255) DEFAULT NULL,
  `longitude` double DEFAULT NULL,
  `latitude` double DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `created` date DEFAULT NULL,
  `is_verified` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `restaurants`
--

INSERT INTO `restaurants` (`id`, `username`, `password`, `name`, `address`, `cuisine`, `opentime`, `closetime`, `opendays`, `longitude`, `latitude`, `photo`, `phone`, `email`, `created`, `is_verified`) VALUES
(1, 'Padang Sederhana', 'd3623c77578eebdac371c5f82d23c3fb4376396cdb4c7045c933398105db60f9e56c7c3f3af8474ee155a0804ea6f193e66555d76362ecf2675802e4f1a2387d', NULL, NULL, NULL, NULL, NULL, NULL, 106.90566340642113, -6.1594933036414785, NULL, NULL, 'zonecaptain@gmail.com', NULL, 0),
(2, 'Nasi Goreng Mafia', 'd3623c77578eebdac371c5f82d23c3fb4376396cdb4c7045c933398105db60f9e56c7c3f3af8474ee155a0804ea6f193e66555d76362ecf2675802e4f1a2387d', 'nasgor mafia', 'cemput', 'asian', '06:13:26', '23:48:37', 'Monday, Tuesday', 106.87433085214423, -6.176740140876901, NULL, NULL, 'nasgor_mafia@gmail.com', '2016-08-05', 0),
(3, 'King Cross', 'd3623c77578eebdac371c5f82d23c3fb4376396cdb4c7045c933398105db60f9e56c7c3f3af8474ee155a0804ea6f193e66555d76362ecf2675802e4f1a2387d', NULL, NULL, NULL, NULL, NULL, NULL, 106.89306474100874, -6.159684716067252, NULL, NULL, 'kingcross@gethassee.com', '2016-08-05', 0),
(8, 'Moo Milk', 'd3623c77578eebdac371c5f82d23c3fb4376396cdb4c7045c933398105db60f9e56c7c3f3af8474ee155a0804ea6f193e66555d76362ecf2675802e4f1a2387d', 'Moo Milk', 'Klp Cengkir Barat X FQ1/23', 'Italian', '14:13:00', '12:31:00', 'Thursday, Sunday', NULL, NULL, 'uploads/user/Moo Milk/photo.jpg', NULL, 'irpanwinata@gmail.comaasd', '2016-08-08', 0),
(9, 'reyner', '43edc', 'reyner', 'Plaza Pasifik blok B2 kav 47 lt.3', 'Italian', '14:13:00', '03:24:00', 'Saturday, Sunday', NULL, NULL, 'uploads/user/reyner/mickey_png__d_by_azul0123-d5p0y4o.png', NULL, 'rener@gethassee.com', '2016-08-08', 0),
(10, 'Daud Bar', '84dec', 'Mickey Steak', 'Jalan Mawar 1 no. 22-23', 'Asian, Indonesian', '03:13:00', '02:13:00', 'Wednesday, Thursday, Saturday', NULL, NULL, 'uploads/user/Mickey Steak/daud.jpg', NULL, 'mickeyjane@gmail.com', '2016-08-08', 0),
(11, 'DAWD', NULL, 'DAWD', 'HIBRIDA', 'Italian, Indonesian', '02:14:00', '15:24:00', 'Tuesday, Wednesday, Saturday', NULL, NULL, 'uploads/user/DAWD/photo.jpg', NULL, 'kvhnzz_95@hotmail.com', '2016-08-08', 0);

-- --------------------------------------------------------

--
-- Table structure for table `restaurant_time`
--

CREATE TABLE `restaurant_time` (
  `restaurant_id` varchar(255) DEFAULT NULL,
  `days` varchar(255) DEFAULT NULL,
  `opentime` time DEFAULT NULL,
  `closetime` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `firstname` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `telephone` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `verification_code` varchar(255) DEFAULT NULL,
  `is_verified` int(20) DEFAULT NULL,
  `created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `firstname`, `lastname`, `email`, `telephone`, `address`, `photo`, `verification_code`, `is_verified`, `created`) VALUES
(27, 'admin', '$2y$10$6831VbJjQQbz7hrkrp.UfuhgraZFZS3ANv26utgZNs9wC1TkYoHZW', NULL, NULL, 'zonecaptain@gmail.com', '+081619638800', 'TPI D 11\r\nTaman Pegangsaan Indah', NULL, NULL, 1, '0000-00-00'),
(28, 'sety', '$2y$10$k.vBoA68RNIq/w3jWZzR7eI.LJ55JPW0zssN23fYikdTFDtaTM28m', NULL, NULL, 'setyawansusanto99@outlook.com', '+123456789012', 'kelapagading', NULL, NULL, 1, '2016-08-05'),
(29, 'irvan', 'd3623c77578eebdac371c5f82d23c3fb4376396cdb4c7045c933398105db60f9e56c7c3f3af8474ee155a0804ea6f193e66555d76362ecf2675802e4f1a2387d', NULL, NULL, 'irpanwinata@gmail.com', '+812887688232', 'Klp Cengkir Barat X FQ1/23', NULL, '3d70b76dd8f9f2f653c31897cf09321f2ebb1d26b338e4a24c844159d7befb1e', 0, '2016-08-08'),
(30, 'gorlem', '$2y$10$uvtWNJEkgKrJy0tpActuyuidQgWiwT7c0e7iTkHCGTs3sU6d59Ari', NULL, NULL, 'felita@gethassee.com', '+081316361519', 'G', NULL, '00493d8e32fcac01c130e5562a8b1a8d64cdeba05bacc6314fca2761edc7d653', 0, '2016-08-09'),
(31, 'root', '$2y$10$rZLmcK757nlp1AgdA9A.7.4mb69oBXCpvS72MxoWKSgYoH.hsKb.m', NULL, NULL, 'setyawasusanto99@outlook.com', '+081316361519', 'G', NULL, 'e99cf5efd3b9b179ebee96fcb772770acdd5c5f21cb0677c1ffe1460f0f18875', 0, '2016-08-09'),
(32, 'abcde', 'd3623c77578eebdac371c5f82d23c3fb4376396cdb4c7045c933398105db60f9e56c7c3f3af8474ee155a0804ea6f193e66555d76362ecf2675802e4f1a2387d', NULL, NULL, 'abcedededed@gmail.com', '+081316361519', 'Gad', NULL, '63e3aec0cdfb430c8ef309ed8f466053a1d6c875c8313d41a062a0f1e7a37078', NULL, '2016-08-10'),
(33, 'adasdnadaksdjakld', '76ca1f4a7c8c852183794188a76538b2198992329c91d1f17e3c6043ba2a62cc9265ac9f84921ee1ea2089e01e89f4e6efa6a6cc4103ef5bd3b8b598a4168fa2', NULL, NULL, 'setyawansusanto99@gmail.com', '+081316361519', 'Gad', NULL, '507e9139e1feb3bc92e59a0d556d21550c32ce752100c7de9a3cd1dc7f0b0f92', NULL, '2016-08-10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dishes`
--
ALTER TABLE `dishes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `drivers`
--
ALTER TABLE `drivers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `restaurants`
--
ALTER TABLE `restaurants`
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
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `dishes`
--
ALTER TABLE `dishes`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `drivers`
--
ALTER TABLE `drivers`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `restaurants`
--
ALTER TABLE `restaurants`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
