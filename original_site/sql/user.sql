-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 19, 2021 at 01:46 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.1

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
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(40) NOT NULL,
  `last_login` datetime NOT NULL,
  `is_deleted` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `first_name`, `last_name`, `email`, `password`, `last_login`, `is_deleted`) VALUES
(1, 'Chiran', 'Jeewantha', 'chiran@mail.com', '1e842ed9731ff7f4c285a489915ab27c080351c7', '2021-02-01 23:31:15', 0),
(8, 'Tilanka', 'Mihingu', 'tilanka@mail.com', '79d4653acaaef5206c8f76d7360293433bac2002', '2021-02-01 22:35:33', 0),
(9, 'Lahiru', 'Pramod', 'lahiru@mail.com', '69da57e37688862d78e5c6a1918f71240309b291', '0000-00-00 00:00:00', 0),
(10, 'Pasindu', 'Heshan', 'Pasindu@mail.com', '919ea7f4ef0086ba977ad98f35cd84697c122c16', '2021-02-01 22:00:54', 0),
(11, 'Sachin', 'Rasangika', 'sachin@mail.com', '0fc83ce725ddd115812a733c50ab11e9ab4e90c0', '0000-00-00 00:00:00', 0),
(12, 'Sirisena', 'Maama', 'sirisena@mail.com', '9b4f0452c7b4a73e94a819db1781185f1b1d91cd', '2021-02-01 23:27:23', 0),
(13, 'Kamal', 'Silva', 'kamal@gmail.com', 'e449cd93478796f92c998742aebe4e9608df155b', '2021-04-16 16:41:29', 0),
(14, 'gihan', 'venura', 'gihan@gmail.com', 'c97513735fe599a3379c325a032baa948d07eccf', '2021-04-17 12:32:04', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
