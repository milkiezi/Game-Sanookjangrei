-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 17, 2020 at 11:12 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sqlgame`
--

-- --------------------------------------------------------

--
-- Table structure for table `rating_data`
--

CREATE TABLE `rating_data` (
  `id` int(10) NOT NULL,
  `page_id` int(10) NOT NULL,
  `username` varchar(255) NOT NULL,
  `rating` int(11) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rating_data`
--

INSERT INTO `rating_data` (`id`, `page_id`, `username`, `rating`, `status`) VALUES
(1, 1, 'admin', 5, 1),
(2, 5, 'admin', 5, 1),
(3, 1, 'test', 4, 1),
(8, 7, 'tomtom', 4, 1),
(9, 6, 'tomtom', 5, 1),
(11, 3, 'admin', 5, 1),
(12, 4, 'admin', 5, 1),
(13, 6, 'admin', 5, 1),
(14, 8, 'admin', 5, 1),
(15, 9, 'admin', 5, 1),
(16, 7, 'admin', 5, 1),
(17, 2, 'admin', 5, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `rating_data`
--
ALTER TABLE `rating_data`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `rating_data`
--
ALTER TABLE `rating_data`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
