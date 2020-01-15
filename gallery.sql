-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 15, 2020 at 07:46 PM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gallery`
--

-- --------------------------------------------------------

--
-- Table structure for table `photos`
--

CREATE TABLE `photos` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `caption` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `filename` varchar(255) NOT NULL,
  `alternateText` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `size` int(11) NOT NULL,
  `uploadedAt` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `photos`
--

INSERT INTO `photos` (`id`, `title`, `caption`, `description`, `filename`, `alternateText`, `type`, `size`, `uploadedAt`) VALUES
(8, 'egfsadsgadsg', 'gfhj', 'gdfj', '14e5517bf4fa0d5705892c9e68ca5d55.jpg', 'gfj', 'image/jpeg', 199973, '0000-00-00 00:00:00'),
(9, 'test', '', '', '2.jpg', '', 'image/jpeg', 10473, '0000-00-00 00:00:00'),
(10, 'reyhsdhfgj', '', '', '1231182_566955016675216_252835338_n.jpg', '', 'image/jpeg', 39698, '0000-00-00 00:00:00'),
(11, 'sfdfdsh', '', '', 'carrier_mini_2_1.jpg', '', 'image/jpeg', 2805, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `userImage` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `first_name`, `last_name`, `userImage`) VALUES
(10, 'riko', '123', 'rikokor', 'rikorikorikoko', '14e5517bf4fa0d5705892c9e68ca5d55.jpg'),
(12, 'gfhgfsdj', 'gsfjgfdsjgfsd', 'gsfjgfsjg', 'gfsjgfsjjgf', ''),
(13, 'gfhjfgsjfjfsdgjgjfs', 'gfsjgfsjjgsfjg', 'sdfghsfgdhjs', 'fgsjgdfjgfdkdhggkdk', ''),
(14, 'asgfdsagd', 'asdfhadfshfadh', 'adfhadfhfad', 'afdhfadhfadhafdh', ''),
(15, 'sdgdsag', 'dsagsdaghsadh', 'dsahgsdahdfsah', 'adsfhafdhfd', ''),
(16, 'dfgjgfd', 'dgfjgdfj', 'gfdjgdfj', 'gfdjgfdj', '14e5517bf4fa0d5705892c9e68ca5d55.jpg'),
(17, 'gfjhgfdj', 'gdfjjgdfjdgf', 'gdfjggddgjf', 'gfdjgdfjdfdfgj', 'Keno1.jpg'),
(18, 'gfjhgfdj', 'gdfjjgdfjdgf', 'gdfjggddgjf', 'gfdjgdfjdfdfgj', 'Keno1.jpg'),
(19, 'gdfjgffdj', 'dfgjgdfjdgf', 'dgfdjdfjg', 'gdfjjgdfjddj', 'Keno1.jpg'),
(20, 'uilkilo', 'ilgikjl', 'gkhjlgl', 'ghjlghjl', 'Keno1.jpg'),
(21, '', '', '', '', ''),
(22, 'fgdhgdfsh', 'gfjhgfdj', 'gdfjgdfj', 'fgdjgfdj', ''),
(23, '', '', '', '', ''),
(24, '', '', '', '', ''),
(25, 'hgfkjhgf', 'hgfjhfgkj', 'fhgkfhg', 'fhkhfgkg', ''),
(26, '', '', '', '', ''),
(27, '', '', '', '', ''),
(28, '', '', '', '', ''),
(29, '', '', '', '', ''),
(30, '', '', '', '', ''),
(31, '', '', '', '', ''),
(32, '', '', '', '', ''),
(33, '', '', '', '', ''),
(34, 'ghjdgdhj', 'dghfjdghfk', 'dfgkjgdf', 'dfgkjdgfkfkg', ''),
(35, '', '', '', '', ''),
(36, '', '', '', '', 'Keno1.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `photos`
--
ALTER TABLE `photos`
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
-- AUTO_INCREMENT for table `photos`
--
ALTER TABLE `photos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
