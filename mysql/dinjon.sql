-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 25, 2016 at 06:57 PM
-- Server version: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dinjon`
--

-- --------------------------------------------------------

--
-- Table structure for table `product_details`
--

CREATE TABLE IF NOT EXISTS `product_details` (
  `id` int(11) NOT NULL,
  `title` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `content_sample` text CHARACTER SET utf8 NOT NULL,
  `content_details` text CHARACTER SET utf8 NOT NULL,
  `img_url` varchar(200) CHARACTER SET utf8 NOT NULL,
  `create_dt` datetime NOT NULL,
  `order` int(5) NOT NULL,
  `project` int(5) DEFAULT NULL,
  `type` int(11) DEFAULT NULL,
  `inner` int(5) DEFAULT NULL,
  `lang` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `index_s_banner` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product_details`
--

INSERT INTO `product_details` (`id`, `title`, `content_sample`, `content_details`, `img_url`, `create_dt`, `order`, `project`, `type`, `inner`, `lang`, `index_s_banner`) VALUES
(6, 'zzz', '<p>asd</p>\r\n', '<p>ccx</p>\r\n', '', '2016-05-25 22:44:41', 2, 3, 5, 14, 'ch', 0),
(7, 'zz', '<p>ff</p>\r\n', '<p>a</p>\r\n', '', '2016-05-26 00:26:40', 1, 3, 5, 14, 'ch', 1),
(8, 'gghhh', '', '', '', '2016-05-26 00:26:59', 3, 3, 5, 14, 'ch', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `product_details`
--
ALTER TABLE `product_details`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `product_details`
--
ALTER TABLE `product_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
