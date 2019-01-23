-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 24, 2018 at 12:31 AM
-- Server version: 10.1.8-MariaDB
-- PHP Version: 5.6.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `flochest`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` int(11) NOT NULL,
  `caption` varchar(255) DEFAULT NULL,
  `description` text,
  `pictureurl` varchar(255) DEFAULT NULL,
  `productid` int(11) DEFAULT NULL,
  `datecreated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `caption`, `description`, `pictureurl`, `productid`, `datecreated`) VALUES
(1, 'Tampax Lite', NULL, 'tampax.png', 1, '2018-04-23 00:00:00'),
(2, 'Lil-Lets Lite', NULL, 'litlets.png', 1, '2018-04-23 00:00:00'),
(3, 'Tampax Regular', NULL, 'tampax.png', 2, '2018-04-23 00:00:00'),
(4, 'Lil-Lets Regular', NULL, 'litlets.png', 2, '2018-04-23 00:00:00'),
(6, 'Always Infinity Normal', NULL, 'always.png', 3, '2018-04-23 00:00:00'),
(7, 'Bodyform Ultra Normal', NULL, 'bodyform.png', 3, '2018-04-23 00:00:00'),
(10, 'Always Infinity Normal With Wings', NULL, 'always.png', 6, '2018-04-23 00:00:00'),
(11, 'Bodyform Ultra Normal With Wings', NULL, 'bodyform.png', 6, '2018-04-23 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `caption` varchar(255) DEFAULT NULL,
  `description` text,
  `datecreated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `caption`, `description`, `datecreated`) VALUES
(1, 'Tampons', NULL, '2018-04-22 00:00:00'),
(2, 'Pads', NULL, '2018-04-22 00:00:00'),
(3, 'Mixed', NULL, '2018-04-22 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `caption` varchar(255) DEFAULT NULL,
  `description` text,
  `categoryid` int(11) DEFAULT NULL,
  `datecreated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `caption`, `description`, `categoryid`, `datecreated`) VALUES
(1, 'Lite', NULL, 1, '2018-04-04 00:00:00'),
(2, 'Regular', NULL, 1, '2018-04-17 00:00:00'),
(3, 'Normal', NULL, 2, '2018-04-04 00:00:00'),
(6, 'Normal-Plus', NULL, 2, '2018-04-04 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
