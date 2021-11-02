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
-- Table structure for table `committees`
--

CREATE TABLE `committees` (
  `id` int(10) NOT NULL,
  `CommitteeName` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `CommitteeShort` varchar(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `committees`
--

INSERT INTO `committees` (`id`, `CommitteeName`, `CommitteeShort`) VALUES
(1, 'General Assembly 1 (GA1)', 'GA1'),
(2, 'General Assembly 2 (GA2)', 'GA2'),
(3, 'General Assembly 3 (GA3)', 'GA3'),
(4, 'General Assembly 4 (GA4)', 'GA4'),
(6, 'General Assembly 6 (GA6)', 'GA6'),
(7, 'Economic and Social Council (ECOSOC)', 'ECOSOC'),
(8, 'Human Rights Council (HRC)', 'HRC'),
(9, 'Environment Commission 1 (EC1)', 'EC1'),
(10, 'Environment Commission 2 (EC2)', 'EC2'),
(11, 'Special Conference (SPECON)', 'SPECON');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `committees`
--
ALTER TABLE `committees`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `committees`
--
ALTER TABLE `committees`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
