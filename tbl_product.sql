-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 08, 2021 at 12:54 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cedhosting`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `id` int(11) NOT NULL,
  `prod_parent_id` int(11) NOT NULL,
  `prod_name` varchar(100) NOT NULL,
  `html` varchar(250) NOT NULL,
  `prod_available` tinyint(1) NOT NULL,
  `prod_launch_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`id`, `prod_parent_id`, `prod_name`, `html`, `prod_available`, `prod_launch_date`) VALUES
(1, 0, 'Hosting', '', 1, '2020-12-09 14:34:49'),
(3, 1, 'Linux Hosting', 'linuxhosting.php', 1, '2021-01-13 19:11:29'),
(4, 1, 'Windows Hosting', '', 1, '2021-01-13 19:14:01'),
(5, 1, 'Mac Hosting', '', 1, '2021-01-15 10:34:25'),
(6, 1, 'Cms hosting', '', 1, '2021-01-15 12:19:26'),
(7, 2, 'linux', '', 1, '2021-01-15 15:14:42'),
(8, 2, 'linux', '', 1, '2021-01-15 15:17:33'),
(10, 2, 'windows', 'windows.php', 1, '2021-01-15 15:21:23'),
(12, 2, 'Mac Hosting', 'linix.php', 1, '2021-01-15 15:32:16'),
(13, 2, 'Mac Hosting', 'cat.php', 1, '2021-01-15 15:33:33'),
(14, 2, 'mac', 'mac.php', 1, '2021-01-15 15:39:24'),
(15, 2, 'w', 'windows.php', 1, '2021-01-15 16:45:44'),
(16, 2, 'm', 'cat.php', 1, '2021-01-15 16:49:22'),
(19, 2, 'ssf', 'mac.php', 1, '2021-01-15 17:12:06'),
(20, 2, 'asd', 'cat.php', 1, '2021-01-18 18:21:17'),
(22, 2, 'cms hosting', 'cmshosting.php', 1, '2021-02-06 10:56:43');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
