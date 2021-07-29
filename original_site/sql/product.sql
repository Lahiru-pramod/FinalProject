-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 05, 2021 at 08:09 AM
-- Server version: 10.4.16-MariaDB
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `userdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `category` text NOT NULL,
  `image` varchar(200) DEFAULT NULL,
  `contact` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `description` text NOT NULL,
  `address` text NOT NULL,
  `special` varchar(100) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `title`, `category`, `image`, `contact`, `price`, `description`, `address`, `special`, `is_deleted`) VALUES
(6, 'lahiru', 'wedding items', 'back.jpg', 7698, 0, '986yjhgg nhigu nh', 'imghiuphuiopm', '', 0),
(7, 'court', 'wedding items', 'donerzz.jpg', 779980990, 0, 'you can order now.', 'Aparekka, Matara.', '', 0),
(8, 'buyiiu', 'wedding items', 'ice- cream.png', 0, 0, 'uyguu', 'oigiuny', '', 0),
(9, 'yutyiuh', 'wedding items', 'ice- cream.png', 0, 0, 'iuyghiuhiu', 'iuhihih', '', 0),
(10, '7y987', 'select...', 'high-rise-buildings-during-nighttime-1366957.jpg', 98, 0, 'oijhoioij', 'ojoijoijoim', '', 0),
(11, '7y987', 'wedding items', '92577cc6-3a9c-47de-bcbd-ccafffcbc28b.png', 98, 0, '0joij,p', 'jk0p9k,j90op,k', '', 0),
(12, 'i9yhoijoij', 'Cars', 'freestocks-BStW5kYXw4E-unsplash.jpg', 0, 0, 'oihoijoij', 'oijoij\'oijoijoi', '', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
