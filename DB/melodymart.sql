-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 05, 2024 at 10:31 AM
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
-- Database: `melodymart`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(3) NOT NULL,
  `categoryName` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `categoryName`) VALUES
(1, 'String Instruments'),
(2, 'Woodwind Instruments'),
(3, 'Brass Instruments'),
(4, 'Percussion Instruments'),
(5, 'Keyboard Instruments'),
(6, 'Electronic Instruments');

-- --------------------------------------------------------

--
-- Table structure for table `instrument`
--

CREATE TABLE `instrument` (
  `id` int(3) NOT NULL,
  `name` varchar(100) NOT NULL,
  `quantity` int(2) NOT NULL,
  `category` varchar(100) NOT NULL,
  `price` int(7) NOT NULL,
  `image` varchar(100) NOT NULL,
  `status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `instrument`
--

INSERT INTO `instrument` (`id`, `name`, `quantity`, `category`, `price`, `image`, `status`) VALUES
(11, 'Violin', 3, 'String Instruments', 2000, 'uploads/violoin.png', 1),
(12, 'Trumpet', 17, 'Brass Instruments', 3300, 'uploads/trumpet.png', 1),
(13, 'Drum', 21, 'Percussion Instruments', 5000, 'uploads/drum.png', 1),
(14, 'Piano', 13, 'Keyboard Instruments', 7700, 'uploads/piano.png', 1),
(15, 'Synthesizer', 15, 'Electronic Instruments', 8000, 'uploads/final.png', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` int(3) NOT NULL,
  `saleId` varchar(6) NOT NULL,
  `date` varchar(20) NOT NULL,
  `totAmount` int(100) NOT NULL,
  `totQty` int(100) NOT NULL,
  `userName` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id`, `saleId`, `date`, `totAmount`, `totQty`, `userName`) VALUES
(50, 'S0001', '2024-01-15 17:48:39', 1063800, 12, 'test');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(3) NOT NULL,
  `userName` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `tel` int(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `userName`, `email`, `address`, `tel`, `password`, `role`) VALUES
(1, 'ransi', 'xiojanadithya@gmail.com', 'Kotugoda', 774477984, 'kkl', 'customer'),
(3, 'test', 'test@gmail.com', '277/A', 774477984, 'kkl', 'customer'),
(4, 'admin', '', '', 0, 'admin', 'admin'),
(5, 'new', 'new', 'new', 774477984, 'kkl', 'customer'),
(6, 'adhi', 'xiojanadithya@gmail.com1', '277/A', 774477984, 'kkl', 'customer');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `instrument`
--
ALTER TABLE `instrument`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
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
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `instrument`
--
ALTER TABLE `instrument`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
