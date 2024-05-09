-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 08, 2024 at 04:56 PM
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
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
