-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 08, 2024 at 04:57 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventory`
--

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `img` varchar(100) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `stock` int(11) NOT NULL,
  `created_At` datetime NOT NULL,
  `updated_At` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_name`, `description`, `img`, `price`, `stock`, `created_At`, `updated_At`) VALUES
(1, 'Milo', 'This a goddamn MILO', 'https://www.nestle.com/sites/default/files/milo-detail-brand-page.jpg', '11.50', 17, '2024-04-26 06:30:54', '2024-05-04 01:44:50'),
(2, 'Kisses', 'WALA KA NETO TRIAS', 'https://d2t3trus7wwxyy.cloudfront.net/catalog/product/h/e/hersheys-creamy-milk-chocolate-kisses-with', '15.50', 20, '2024-04-26 06:30:54', '2024-05-04 01:44:50'),
(3, 'Toblerone', 'Succulent', 'https://www.tinsflowershop.com/251-large_default/toblerone-milk-400g.jpg', '10.00', 0, '2024-05-01 08:18:42', '2024-05-04 00:42:07');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id`, `total_amount`, `amount_tendered`, `change_amt`, `date_Created`, `date_Updated`, `customer_id`) VALUES
(1, '37.00', '40.00', '3.00', '2024-05-03 05:09:48', '2024-05-03 05:09:48', 1),
(2, '10.00', '10.00', '0.00', '2024-05-03 05:11:21', '2024-05-03 05:11:21', 2),
(3, '37.00', '40.00', '3.00', '2024-05-03 05:11:48', '2024-05-03 05:11:48', 3),
(4, '11.50', '12.00', '0.50', '2024-05-03 11:16:11', '2024-05-03 11:16:11', 4),
(5, '11.50', '12.00', '0.50', '2024-05-03 11:18:30', '2024-05-03 11:18:30', 5),
(6, '11.50', '12.00', '0.50', '2024-05-03 11:20:22', '2024-05-03 11:20:22', 6),
(7, '15.50', '16.00', '0.50', '2024-05-03 11:32:18', '2024-05-03 11:32:18', 7),
(8, '11.50', '12.00', '0.50', '2024-05-03 12:34:26', '2024-05-03 12:34:26', 8),
(9, '15.50', '20.00', '4.50', '2024-05-03 12:35:34', '2024-05-03 12:35:34', 9),
(10, '11.50', '12.00', '0.50', '2024-05-03 12:36:43', '2024-05-03 12:36:43', 10),
(11, '41.00', '42.00', '1.00', '2024-05-03 13:39:47', '2024-05-03 13:39:47', 11),
(12, '11.50', '12.00', '0.50', '2024-05-03 14:13:17', '2024-05-03 14:13:17', 12),
(13, '11.50', '12.00', '0.50', '2024-05-03 14:14:10', '2024-05-03 14:14:10', 13),
(14, '10.00', '10.00', '0.00', '2024-05-03 14:14:35', '2024-05-03 14:14:35', 14),
(15, '11.50', '12.00', '0.50', '2024-05-03 14:15:14', '2024-05-03 14:15:14', 15),
(16, '37.00', '40.00', '3.00', '2024-05-03 14:15:35', '2024-05-03 14:15:35', 16),
(17, '57.00', '60.00', '3.00', '2024-05-04 00:42:07', '2024-05-04 00:42:07', 17),
(18, '27.00', '30.00', '3.00', '2024-05-04 01:44:50', '2024-05-04 01:44:50', 18);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `salesitems`
--

INSERT INTO `salesitems` (`id`, `product_id`, `sales_id`, `quantity`, `unit_price`, `sub_total`, `date_Created`, `updated_At`) VALUES
(1, 1, 1, 1, '12.00', '12.00', '2024-05-03 05:09:48', '2024-05-03 05:09:48'),
(2, 2, 1, 1, '16.00', '16.00', '2024-05-03 05:09:48', '2024-05-03 05:09:48'),
(3, 3, 1, 1, '10.00', '10.00', '2024-05-03 05:09:48', '2024-05-03 05:09:48'),
(4, 3, 2, 1, '10.00', '10.00', '2024-05-03 05:11:21', '2024-05-03 05:11:21'),
(5, 1, 3, 1, '12.00', '12.00', '2024-05-03 05:11:48', '2024-05-03 05:11:48'),
(6, 2, 3, 1, '16.00', '16.00', '2024-05-03 05:11:48', '2024-05-03 05:11:48'),
(7, 3, 3, 1, '10.00', '10.00', '2024-05-03 05:11:48', '2024-05-03 05:11:48'),
(8, 1, 4, 1, '12.00', '12.00', '2024-05-03 11:16:11', '2024-05-03 11:16:11'),
(9, 1, 5, 1, '12.00', '12.00', '2024-05-03 11:18:30', '2024-05-03 11:18:30'),
(10, 1, 6, 1, '12.00', '12.00', '2024-05-03 11:20:22', '2024-05-03 11:20:22'),
(11, 2, 7, 1, '16.00', '16.00', '2024-05-03 11:32:18', '2024-05-03 11:32:18'),
(12, 1, 8, 1, '11.50', '11.50', '2024-05-03 12:34:26', '2024-05-03 12:34:26'),
(13, 2, 9, 1, '15.50', '15.50', '2024-05-03 12:35:34', '2024-05-03 12:35:34'),
(14, 1, 10, 1, '11.50', '11.50', '2024-05-03 12:36:43', '2024-05-03 12:36:43'),
(15, 2, 11, 2, '15.50', '31.00', '2024-05-03 13:39:47', '2024-05-03 13:39:47'),
(16, 3, 11, 1, '10.00', '10.00', '2024-05-03 13:39:47', '2024-05-03 13:39:47'),
(17, 1, 12, 1, '11.50', '11.50', '2024-05-03 14:13:17', '2024-05-03 14:13:17'),
(18, 1, 13, 1, '11.50', '11.50', '2024-05-03 14:14:10', '2024-05-03 14:14:10'),
(19, 3, 14, 1, '10.00', '10.00', '2024-05-03 14:14:35', '2024-05-03 14:14:35'),
(20, 1, 15, 1, '11.50', '11.50', '2024-05-03 14:15:14', '2024-05-03 14:15:14'),
(21, 1, 16, 1, '11.50', '11.50', '2024-05-03 14:15:35', '2024-05-03 14:15:35'),
(22, 2, 16, 1, '15.50', '15.50', '2024-05-03 14:15:35', '2024-05-03 14:15:35'),
(23, 3, 16, 1, '10.00', '10.00', '2024-05-03 14:15:35', '2024-05-03 14:15:35'),
(24, 1, 17, 1, '11.50', '11.50', '2024-05-04 00:42:07', '2024-05-04 00:42:07'),
(25, 2, 17, 1, '15.50', '15.50', '2024-05-04 00:42:07', '2024-05-04 00:42:07'),
(26, 3, 17, 3, '10.00', '30.00', '2024-05-04 00:42:07', '2024-05-04 00:42:07'),
(27, 1, 18, 1, '11.50', '11.50', '2024-05-04 01:44:50', '2024-05-04 01:44:50'),
(28, 2, 18, 1, '15.50', '15.50', '2024-05-04 01:44:50', '2024-05-04 01:44:50');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `password` varchar(300) NOT NULL,
  `email` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `password`, `email`, `created_at`, `updated_at`) VALUES
(2, 'wylkynz', 'petilos', 'password', 'wylkynz@gmail.com', '2024-05-01 06:12:12', '2024-05-01 06:12:12'),
(3, 'Christine', 'Rolloque', '$2y$10$mXIgkXbnN6Y82ADWe9n14eImMCTeePQGYAch68Ge7DmxfZDIwR/Wa', 'RolloqueChristine@gmail.com', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'Wylkynz', 'Petilos', '$2y$10$b3kwJwwg6LSerbLdRqCWDeNweMF4Ou968g6Ws7wF.b2GXlogeorL6', 'PetilosWylkynz@gmail.com', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 'Wylkynz1', 'Petilos1', '$2y$10$2iIoXO/X/7lHKeR9L5Ey..0LQMP1KLUEVwTi.np/2fnpk70evCuKW', 'PetilosWylkynz1@gmail.com', '2024-05-07 02:11:25', '2024-05-07 02:11:25'),
(6, 'Wylkynz1', 'Petilos1', '$2y$10$7imi0KVXVRPAi91FQTylAOHnrYD/TNG04V27KEZ9oxhtSscvWvEmW', 'PetilosWylkynz1@gmail.com', '2024-05-07 02:16:24', '2024-05-07 02:16:24'),
(16, 'wylkynz', 'petilos', '$2y$10$WHHq4st47eNu5E.7xOJg9Oz758NVSiVeo5GFC4L6JvcwH17A6Goyu', 'sdasd', '2024-05-07 02:57:46', '2024-05-07 02:57:46'),
(17, 'Mary Christine', 'Rolloque', '$2y$10$ZOChHnmpcmqSyXnnkJHvpueoNTF7CMPAv/C9F9cB/YTRf9kBTDBaq', 'RolloqueMaryChristine@gmail.com', '2024-05-07 03:00:39', '2024-05-07 03:00:39'),
(18, 'Wylkynz', 'Petilos', '$2y$10$4kY4qrLKmRdgFzVtV6607.0ckDj3zjlLqWhLkA2FKXn9cq/gC81A2', 'petilos.wylknz.toralde@gmail.com', '2024-05-07 03:07:17', '2024-05-07 03:07:17'),
(19, 'kynz', 'petilos', '$2y$10$2DwRp37waR8h9GYgq0RAkeBnffv4JLuxj2143cMCJOua9K4OR/gPy', 'wylkynz', '2024-05-07 06:43:32', '2024-05-07 06:43:32'),
(20, 'f', 'l', '$2y$10$GxoJ/LCfznxffOCq75/Yh.O9bGwRuwHiW9mbJ8D9WFPin.zk0PmjK', 'e', '2024-05-07 06:44:36', '2024-05-07 06:44:36'),
(21, 'wylkynz', 'petilos', '$2y$10$j3igOp9Gbbhc.IVhCGLvu.wFLrzOBBP9fMLn/iJkPfVE32WG65VZ.', 'kynz', '2024-05-07 06:45:08', '2024-05-07 06:45:08'),
(22, '1', '2', '$2y$10$JKmwbmnLfprLMi7QXpbQl..Wn1kcE/TSyVsqOABFBwHyUHKgf0Csm', '3', '2024-05-07 06:50:39', '2024-05-07 06:50:39'),
(23, '2', '3', '$2y$10$IvrSXOhd9fHf5C/yajOp4eDnFfhnfqswd2KrXJYfsKldcym/r4gTS', '4', '2024-05-07 06:52:05', '2024-05-07 06:52:05'),
(24, 'hahah', 'ahhahah', '$2y$10$1BzsIVv2s.5f7LiFNIOg7uVCFZK5CvjOBQtVO/kJLTubqqw9sCySC', 'ahahah', '2024-05-07 06:52:49', '2024-05-07 06:52:49'),
(25, 'wqe', 'qwe', '$2y$10$jZODQa3n1IZ2gkp25gRe2O4OQkdA1st272/Bgaqwu4cOGe7Q5zFV6', 'qwe', '2024-05-07 06:54:58', '2024-05-07 06:54:58'),
(26, 'wqe', 'qwe', '$2y$10$7v2OwwKbs.RMQ3MmdT32vucjkODyc6QRn7zZeBw7WRIH4TLc.Alia', 'qwe', '2024-05-07 06:56:52', '2024-05-07 06:56:52'),
(27, 'sda', 'asda', '$2y$10$N/i4Ep9HdO4vI4VLgkb79uDTLYUrvAweAK.ONWGlkDGPVxJ5sUSjC', 'asd', '2024-05-07 06:58:38', '2024-05-07 06:58:38'),
(28, 'asd', 'asd', '$2y$10$wlVyeNaBatknA5RFM6MvLuaBUetH07n1PrBsuP5XzAQluF.FlZDaG', 'asd', '2024-05-07 07:01:49', '2024-05-07 07:01:49'),
(29, 'asd', 'asda', '$2y$10$dty41FkKmAnQ6LiDxMj4Sej/w8bBn1I7mjXlAdEqjxmaPaHyix.6W', 'sdas', '2024-05-07 07:02:19', '2024-05-07 07:02:19'),
(30, '', '', '$2y$10$/6CbI.jTmiP5nkzxQeeLme.HZxZxm1eItqFi37f.BugqMZ/I7VbvS', '', '2024-05-07 08:04:52', '2024-05-07 08:04:52'),
(31, 'wylkynz', 'petilos', '$2y$10$NTSR83JBhPuDHhrAjE0ZQOuwvwjzRECF/XgZsHrdcNW7.gAVCM/2O', 'rwsfs', '2024-05-07 22:40:30', '2024-05-07 22:40:30'),
(32, '', '', '$2y$10$ClBp8ICJZ9yjUnNuLDSEUe.uGtryKGO8BL.0sXuH692hKWSyEngVm', '', '2024-05-08 19:01:54', '2024-05-08 19:01:54'),
(33, 'gabe', 'perez', '$2y$10$ZvWihWzvbSnm.61P0B.NGu1HrGMdWfwEqdqTGNjYsxyJXvnZ0XXSa', 'gabeperez1@gmail.com', '2024-05-08 20:27:26', '2024-05-08 20:27:26');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
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
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

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
  ADD CONSTRAINT `salesitems_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
