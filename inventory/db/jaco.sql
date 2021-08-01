-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 24, 2021 at 09:29 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jaco`
--

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `id` int(11) NOT NULL,
  `services_id` int(11) NOT NULL,
  `supplier` varchar(255) DEFAULT NULL,
  `coder_client` varchar(255) DEFAULT NULL,
  `Faturazione` varchar(255) DEFAULT NULL,
  `RIMBORSI` varchar(255) DEFAULT NULL,
  `note_ft` varchar(255) DEFAULT NULL,
  `imponible` varchar(255) DEFAULT NULL,
  `costo` int(11) DEFAULT NULL,
  `UTILE` int(11) DEFAULT NULL,
  `margin` varchar(100) DEFAULT NULL,
  `invoice_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`id`, `services_id`, `supplier`, `coder_client`, `Faturazione`, `RIMBORSI`, `note_ft`, `imponible`, `costo`, `UTILE`, `margin`, `invoice_id`) VALUES
(1, 0, 'uiouiuiou', 'iuoiuioun9898908', 'iuojkljiyoyo', '98808908jkljklj', '998jklkkj', '9989', 878, 9111, '1137.6993166287', 'INV0001'),
(2, 4, 'uikljk', 'ljkjlkjlk', 'jlkkjm,', 'gbv hn ', '90898', '90809809', 898, 90808911, '10112450.890869', 'INV0002'),
(3, 0, 'uiouiuiousf', 'sffssf', 'sfsfsf', 'sfsf', 'sffssf', '2332', 2323, 9, '100.38743004735', 'INV0003'),
(4, 4, '23', '2322', '322', '32', '2323', '2332', 2323, 9, '100.38743004735', 'INV0004'),
(5, 5, '121', '21212', '121212', '1212', '12', '1221', 12, 1209, '10175', 'INV0005');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` int(11) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `description`) VALUES
(2, 'Glass2');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `contact_email` varchar(255) DEFAULT NULL,
  `pr_number` varchar(255) NOT NULL,
  `pr_status` varchar(255) DEFAULT NULL,
  `delivery_date` varchar(255) DEFAULT NULL,
  `tagging_req` varchar(11) DEFAULT NULL,
  `approval_req` varchar(255) DEFAULT NULL,
  `associated_systems` int(11) NOT NULL,
  `no_of_items` varchar(255) DEFAULT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_by` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `services2`
--

CREATE TABLE `services2` (
  `id` int(11) NOT NULL,
  `part_no` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `quantity` varchar(255) DEFAULT NULL,
  `ppu` varchar(255) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `rec_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `service_type`
--

CREATE TABLE `service_type` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `service_type`
--

INSERT INTO `service_type` (`id`, `name`) VALUES
(1, 'Service1'),
(2, 'Service2');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(32) NOT NULL,
  `role` int(4) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`, `role`, `status`, `date_created`) VALUES
(1, 'Waqar', 'Aslam', 'admin@admin.com', '21232f297a57a5a743894a0e4a801fc3', 1, 1, '2019-12-01 05:06:20'),
(5, 'Manager', 'User', 'manager@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 2, 1, '2021-03-09 14:39:12'),
(6, 'Driver', '1 ID6', 'waqarmian69@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 3, 1, '2021-03-09 14:39:38');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle`
--

CREATE TABLE `vehicle` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vehicle`
--

INSERT INTO `vehicle` (`id`, `name`) VALUES
(1, 'Car'),
(2, 'Minivan'),
(3, 'Minibus');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services2`
--
ALTER TABLE `services2`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service_type`
--
ALTER TABLE `service_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vehicle`
--
ALTER TABLE `vehicle`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `services2`
--
ALTER TABLE `services2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `service_type`
--
ALTER TABLE `service_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `vehicle`
--
ALTER TABLE `vehicle`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
