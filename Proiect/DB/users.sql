-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 20, 2021 at 10:31 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `heromaze`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `level` int(11) NOT NULL,
  `points` int(11) NOT NULL,
  `wins` int(11) NOT NULL DEFAULT 0,
  `lost` int(11) NOT NULL DEFAULT 0,
  `question_id` int(11) NOT NULL DEFAULT 1,
  `isAdmin` int(11) NOT NULL DEFAULT 0,
  `picture` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `username`, `password`, `level`, `points`, `wins`, `lost`, `question_id`, `isAdmin`, `picture`) VALUES
(1, 'test', 'test', 'test', 'test', 5, 0, 11, 70, 1, 1, '1621532231-Bridal shower-17.jpg'),
(44, '[value-2]', '[value-3]', 'malina', '[value-5]', 0, 0, 0, 0, 1, 0, '[value-12]'),
(45, '[value-2]', '[value-3]', 'patricia', '[value-5]', 0, 0, 0, 0, 1, 0, '[value-12]'),
(46, '[value-2]', '[value-3]', 'mama', '[value-5]', 0, 0, 0, 0, 1, 0, '[value-12]'),
(48, '[value-2]', '[value-3]', 'gtgthg', '[value-5]', 0, 0, 0, 0, 1, 0, '[value-12]');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
