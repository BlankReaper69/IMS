-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 03, 2024 at 07:56 PM
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
-- Database: `point_of_sale`
--
CREATE DATABASE IF NOT EXISTS `point_of_sale` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `point_of_sale`;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `date_created` datetime NOT NULL,
  `updated_At` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `firstname`, `lastname`, `address`, `contact`, `date_created`, `updated_At`) VALUES
(1, 'Menard', 'Perez', 'address', '12345', '2024-05-03 05:09:48', '2024-05-03 05:09:48'),
(2, 'test', 'test', 'test', 'test', '2024-05-03 05:11:21', '2024-05-03 05:11:21'),
(3, 'Menard', 'Perez', 'Address', '12345', '2024-05-03 05:11:48', '2024-05-03 05:11:48'),
(4, 'twat', 'test', 'twats', 'test', '2024-05-03 11:16:11', '2024-05-03 11:16:11'),
(5, 'test', 'testq', '', '', '2024-05-03 11:18:30', '2024-05-03 11:18:30'),
(6, '', '', '', '', '2024-05-03 11:20:22', '2024-05-03 11:20:22'),
(7, '', '', '', '', '2024-05-03 11:32:18', '2024-05-03 11:32:18'),
(8, '', '', '', '', '2024-05-03 12:34:26', '2024-05-03 12:34:26'),
(9, '', '', '', '', '2024-05-03 12:35:33', '2024-05-03 12:35:33'),
(10, '', '', '', '', '2024-05-03 12:36:43', '2024-05-03 12:36:43'),
(11, 'Menard', 'Perez', 'address', '123341', '2024-05-03 13:39:47', '2024-05-03 13:39:47'),
(12, '', '', '', '', '2024-05-03 14:13:17', '2024-05-03 14:13:17'),
(13, '', '', '', '', '2024-05-03 14:14:10', '2024-05-03 14:14:10'),
(14, '', '', '', '', '2024-05-03 14:14:35', '2024-05-03 14:14:35'),
(15, '', '', '', '', '2024-05-03 14:15:14', '2024-05-03 14:15:14'),
(16, '', '', '', '', '2024-05-03 14:15:35', '2024-05-03 14:15:35'),
(17, '', '', '', '', '2024-05-04 00:42:07', '2024-05-04 00:42:07'),
(18, '', '', '', '', '2024-05-04 01:44:50', '2024-05-04 01:44:50');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` int(11) NOT NULL,
  `total_amount` decimal(10,2) NOT NULL,
  `amount_tendered` decimal(10,2) NOT NULL,
  `change_amt` decimal(10,2) NOT NULL,
  `date_Created` datetime NOT NULL,
  `date_Updated` datetime NOT NULL,
  `customer_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id`, `total_amount`, `amount_tendered`, `change_amt`, `date_Created`, `date_Updated`, `customer_id`) VALUES
(1, 37.00, 40.00, 3.00, '2024-05-03 05:09:48', '2024-05-03 05:09:48', 1),
(2, 10.00, 10.00, 0.00, '2024-05-03 05:11:21', '2024-05-03 05:11:21', 2),
(3, 37.00, 40.00, 3.00, '2024-05-03 05:11:48', '2024-05-03 05:11:48', 3),
(4, 11.50, 12.00, 0.50, '2024-05-03 11:16:11', '2024-05-03 11:16:11', 4),
(5, 11.50, 12.00, 0.50, '2024-05-03 11:18:30', '2024-05-03 11:18:30', 5),
(6, 11.50, 12.00, 0.50, '2024-05-03 11:20:22', '2024-05-03 11:20:22', 6),
(7, 15.50, 16.00, 0.50, '2024-05-03 11:32:18', '2024-05-03 11:32:18', 7),
(8, 11.50, 12.00, 0.50, '2024-05-03 12:34:26', '2024-05-03 12:34:26', 8),
(9, 15.50, 20.00, 4.50, '2024-05-03 12:35:34', '2024-05-03 12:35:34', 9),
(10, 11.50, 12.00, 0.50, '2024-05-03 12:36:43', '2024-05-03 12:36:43', 10),
(11, 41.00, 42.00, 1.00, '2024-05-03 13:39:47', '2024-05-03 13:39:47', 11),
(12, 11.50, 12.00, 0.50, '2024-05-03 14:13:17', '2024-05-03 14:13:17', 12),
(13, 11.50, 12.00, 0.50, '2024-05-03 14:14:10', '2024-05-03 14:14:10', 13),
(14, 10.00, 10.00, 0.00, '2024-05-03 14:14:35', '2024-05-03 14:14:35', 14),
(15, 11.50, 12.00, 0.50, '2024-05-03 14:15:14', '2024-05-03 14:15:14', 15),
(16, 37.00, 40.00, 3.00, '2024-05-03 14:15:35', '2024-05-03 14:15:35', 16),
(17, 57.00, 60.00, 3.00, '2024-05-04 00:42:07', '2024-05-04 00:42:07', 17),
(18, 27.00, 30.00, 3.00, '2024-05-04 01:44:50', '2024-05-04 01:44:50', 18);

-- --------------------------------------------------------

--
-- Table structure for table `salesitems`
--

CREATE TABLE `salesitems` (
  `id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `sales_id` int(11) NOT NULL,
  `quantity` int(11) DEFAULT NULL,
  `unit_price` decimal(10,2) DEFAULT NULL,
  `sub_total` decimal(10,2) DEFAULT NULL,
  `date_Created` datetime DEFAULT NULL,
  `updated_At` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `salesitems`
--

INSERT INTO `salesitems` (`id`, `product_id`, `sales_id`, `quantity`, `unit_price`, `sub_total`, `date_Created`, `updated_At`) VALUES
(1, 1, 1, 1, 12.00, 12.00, '2024-05-03 05:09:48', '2024-05-03 05:09:48'),
(2, 2, 1, 1, 16.00, 16.00, '2024-05-03 05:09:48', '2024-05-03 05:09:48'),
(3, 3, 1, 1, 10.00, 10.00, '2024-05-03 05:09:48', '2024-05-03 05:09:48'),
(4, 3, 2, 1, 10.00, 10.00, '2024-05-03 05:11:21', '2024-05-03 05:11:21'),
(5, 1, 3, 1, 12.00, 12.00, '2024-05-03 05:11:48', '2024-05-03 05:11:48'),
(6, 2, 3, 1, 16.00, 16.00, '2024-05-03 05:11:48', '2024-05-03 05:11:48'),
(7, 3, 3, 1, 10.00, 10.00, '2024-05-03 05:11:48', '2024-05-03 05:11:48'),
(8, 1, 4, 1, 12.00, 12.00, '2024-05-03 11:16:11', '2024-05-03 11:16:11'),
(9, 1, 5, 1, 12.00, 12.00, '2024-05-03 11:18:30', '2024-05-03 11:18:30'),
(10, 1, 6, 1, 12.00, 12.00, '2024-05-03 11:20:22', '2024-05-03 11:20:22'),
(11, 2, 7, 1, 16.00, 16.00, '2024-05-03 11:32:18', '2024-05-03 11:32:18'),
(12, 1, 8, 1, 11.50, 11.50, '2024-05-03 12:34:26', '2024-05-03 12:34:26'),
(13, 2, 9, 1, 15.50, 15.50, '2024-05-03 12:35:34', '2024-05-03 12:35:34'),
(14, 1, 10, 1, 11.50, 11.50, '2024-05-03 12:36:43', '2024-05-03 12:36:43'),
(15, 2, 11, 2, 15.50, 31.00, '2024-05-03 13:39:47', '2024-05-03 13:39:47'),
(16, 3, 11, 1, 10.00, 10.00, '2024-05-03 13:39:47', '2024-05-03 13:39:47'),
(17, 1, 12, 1, 11.50, 11.50, '2024-05-03 14:13:17', '2024-05-03 14:13:17'),
(18, 1, 13, 1, 11.50, 11.50, '2024-05-03 14:14:10', '2024-05-03 14:14:10'),
(19, 3, 14, 1, 10.00, 10.00, '2024-05-03 14:14:35', '2024-05-03 14:14:35'),
(20, 1, 15, 1, 11.50, 11.50, '2024-05-03 14:15:14', '2024-05-03 14:15:14'),
(21, 1, 16, 1, 11.50, 11.50, '2024-05-03 14:15:35', '2024-05-03 14:15:35'),
(22, 2, 16, 1, 15.50, 15.50, '2024-05-03 14:15:35', '2024-05-03 14:15:35'),
(23, 3, 16, 1, 10.00, 10.00, '2024-05-03 14:15:35', '2024-05-03 14:15:35'),
(24, 1, 17, 1, 11.50, 11.50, '2024-05-04 00:42:07', '2024-05-04 00:42:07'),
(25, 2, 17, 1, 15.50, 15.50, '2024-05-04 00:42:07', '2024-05-04 00:42:07'),
(26, 3, 17, 3, 10.00, 30.00, '2024-05-04 00:42:07', '2024-05-04 00:42:07'),
(27, 1, 18, 1, 11.50, 11.50, '2024-05-04 01:44:50', '2024-05-04 01:44:50'),
(28, 2, 18, 1, 15.50, 15.50, '2024-05-04 01:44:50', '2024-05-04 01:44:50');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_customer_id` (`customer_id`);

--
-- Indexes for table `salesitems`
--
ALTER TABLE `salesitems`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `sales_fk_1` (`sales_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `salesitems`
--
ALTER TABLE `salesitems`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `sales`
--
ALTER TABLE `sales`
  ADD CONSTRAINT `fk_customer_id` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`);

--
-- Constraints for table `salesitems`
--
ALTER TABLE `salesitems`
  ADD CONSTRAINT `sales_fk_1` FOREIGN KEY (`sales_id`) REFERENCES `sales` (`id`),
  ADD CONSTRAINT `salesitems_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `inventory`.`products` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
