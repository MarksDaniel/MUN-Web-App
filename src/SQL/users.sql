-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 29, 2019 at 11:37 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cgsmun_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `fullname` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `role` varchar(9) COLLATE utf8_unicode_ci NOT NULL,
  `position` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `committee` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `fullname`, `role`, `position`, `committee`) VALUES
(1, 'admin1', 'admin', 'Marks Daniel', 'admin', '', ''),
(2, 'editor1', 'editor', 'ED1 fullname', 'editor', '', ''),
(3, 'editor2', 'editor', 'ED2 fullname', 'editor', '', ''),
(4, 'ga1', 'comm', 'GA1 fullname', 'comm', 'chairman', 'General Assembly 1 (GA1)'),
(5, 'ga2', 'comm', 'GA2 fullname', 'comm', 'member', 'General Assembly 2 (GA2)'),
(6, 'editor3', 'editor', 'ED3 fullname', 'editor', '', ''),
(7, 'editor4', 'editor', 'ED4 fullname', 'editor', '', ''),
(8, 'ga3', 'comm', 'GA3 fullname', 'comm', 'member', 'General Assembly 3 (GA3)'),
(9, 'ga4', 'comm', 'GA4 fullname', 'comm', 'member', 'General Assembly 4 (GA4)'),
(11, 'ecosoc', 'comm', 'ECOSOC fullname', 'comm', 'chairman', 'Economic and Social Council (ECOSOC)'),
(12, 'hrc', 'comm', 'HRC fullname', 'comm', 'chairman', 'Human Rights Council (HRC)'),
(13, 'ec1', 'comm', 'EC1 fullname', 'comm', 'member', 'Environment Commission 1 (EC1)'),
(14, 'specon', 'comm', 'SPECON fullname', 'comm', 'member', 'Special Conference (SPECON)'),
(16, 'ga6', 'comm', 'GA6 fullname', 'comm', 'member', 'General Assembly 6 (GA6)'),
(17, 'ec2', 'comm', 'EC2 fullname', 'comm', 'chairman', 'Environment Commission 2 (EC2)'),
(28, 'secr1', 'secr', 'SECR1 fullname ', 'secret', 'secretariat', ''),
(29, 'secr2', 'secr', 'SECR2 fullname ', 'secret', 'secretariat', ''),
(30, 'secr3', 'secr', 'SECR3 fullname ', 'secret', 'secretariat', ''),
(31, 'secr4', 'secr', 'SECR4 fullname ', 'secret', 'secretariat', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
