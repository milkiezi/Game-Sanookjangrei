-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 17, 2020 at 11:10 PM
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
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(50) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` int(30) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `username`, `password`, `email`, `phone`, `image`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin@gmail.com', 865471530, 'jerryic.jpg'),
(5, 'test', '098f6bcd4621d373cade4e832627b4f6', 'test@gmail.com', 865471530, 'tomic.png'),
(8, 'test5', '098f6bcd4621d373cade4e832627b4f6', 'test5@gmail.com', 865471530, 'kurumi.jpg'),
(9, 'milkmeister3', '218fd070720f9c6bb143fed4df6fa390', 'milkmeister@gmail.com', 865471530, 'usagyu.jpg'),
(10, 'tomtom', 'dbf2641b360d20ed942a79b59d0cd5bd', 'tomtom@gmail.com', 885492165, 'pikachu.jpg');

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

-- --------------------------------------------------------

--
-- Table structure for table `reply`
--

CREATE TABLE `reply` (
  `replyID` int(5) NOT NULL,
  `questionID` int(5) NOT NULL,
  `createDate` date NOT NULL,
  `details` text CHARACTER SET utf8 NOT NULL,
  `name` varchar(20) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_thai_520_w2;

--
-- Dumping data for table `reply`
--

INSERT INTO `reply` (`replyID`, `questionID`, `createDate`, `details`, `name`) VALUES
(1, 4, '2020-12-14', 'อันนี้น่าจะปกตินะ 555555555555', 'admin'),
(2, 2, '2020-12-11', 'เอิ่มมม ยังไม่ได้ซื้อเลย', 'admin'),
(3, 2, '2020-12-12', 'ผมว่าสนุกนะ แต่คุ้มไหมนี้น่าจะแล้วแต่คน 55', 'tomtom'),
(4, 3, '2020-12-08', '<3', 'tomtom');

-- --------------------------------------------------------

--
-- Table structure for table `webboard`
--

CREATE TABLE `webboard` (
  `questionID` int(5) NOT NULL,
  `createDate` date NOT NULL,
  `question` varchar(255) CHARACTER SET utf8 NOT NULL,
  `details` text CHARACTER SET utf8 NOT NULL,
  `name` varchar(20) CHARACTER SET utf8 NOT NULL,
  `reply` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_thai_520_w2;

--
-- Dumping data for table `webboard`
--

INSERT INTO `webboard` (`questionID`, `createDate`, `question`, `details`, `name`, `reply`) VALUES
(1, '2020-12-08', 'ยินดีต้อนรับทุกคนนะครับ', 'นี้เป็น webboard ซึ่งใช้คุยในเรื่องเกมและเว็บไซต์นี้ครับ', 'admin', 1),
(2, '2020-12-11', 'อยากให้ รีวิว เกม cyberpunk มากครับ ', 'กำลังคิดว่าจะซื้อ แต่ไม่รู้ว่าคุ้มไหมครับ  คนที่ซื้อแล้วช่วยป้ายยาหน่อยครับ', 'milkmeister3', 2),
(4, '2020-12-14', 'มีปัญหากับเกม amongus ครับ', 'ทุกวันนี้ไม่มีเพื่อนคบแล้วตั้งแต่เล่น amongus ฮืออออ', 'test5', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rating_data`
--
ALTER TABLE `rating_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reply`
--
ALTER TABLE `reply`
  ADD PRIMARY KEY (`replyID`);

--
-- Indexes for table `webboard`
--
ALTER TABLE `webboard`
  ADD PRIMARY KEY (`questionID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `rating_data`
--
ALTER TABLE `rating_data`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
