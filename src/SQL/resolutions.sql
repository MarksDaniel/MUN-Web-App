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
-- Table structure for table `resolutions`
--

CREATE TABLE `resolutions` (
  `id` int(10) NOT NULL,
  `committee` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `topic` varchar(270) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `fullname` varchar(35) COLLATE utf8_unicode_ci NOT NULL,
  `position` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `resolution_filename` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `editor` varchar(35) COLLATE utf8_unicode_ci NOT NULL,
  `approver` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `resolutions`
--

INSERT INTO `resolutions` (`id`, `committee`, `topic`, `username`, `fullname`, `position`, `resolution_filename`, `status`, `editor`, `approver`) VALUES
(12, 'Special Conference (SPECON)', 'The rise of digital authoritarianism', 'specon', 'SPECON fullname', 'chairman', 'specon-Digital authoritarianism.docx', 'being edited', 'ED1 fullname', ''),
(23, 'General Assembly 3 (GA3)', 'Net neutrality as a means of ensuring social equality', 'ga3', 'GA3 fullname', 'member', 'ga3-Net neutrality - social equality.docx', 'edited', 'ED1 fullname ', ''),
(28, 'General Assembly 4 (GA4)', 'The development of cyber peacekeeping', 'ga4', 'GA4 fullname', 'member', 'ga4-The development of cyber peacekeeping.docx', 'approved', 'ED1 fullname ', 'SECR1 fullname '),
(37, 'Human Rights Council (HRC)', 'The violation of the rights of Uyghur people', 'hrc', 'HRC fullname', 'member', 'hrc-The violation of the rights of Uyghur people.docx', 'being edited', 'ED2 fullname', ''),
(48, 'Economic and Social Council (ECOSOC)', 'Improving SMEs competitiveness and entrepreneurship in Industry 4.0 for productivity and inclusive growth and development', 'ecosoc', 'ECOSOC fullname', 'chairman', 'ecosoc-Improving SMEs competitiveness and entrepreneurship.docx', 'edited', 'ED1 fullname', ''),
(54, 'Economic and Social Council (ECOSOC)', 'Social impact of selective medical treatment', 'ecosoc', 'ECOSOC fullname', 'chairman', 'ecosoc-Social impact of selective medical treatment.docx', 'new', '', ''),
(58, 'General Assembly 1 (GA1)', 'Addressing the challenges of increased autonomy in weapon systems', 'ga1', 'GA1 fullname', 'member', 'ga1-the challenges of increased autonomy in weapon systems.docx', 'being edited', 'ED3 fullname', ''),
(79, 'Environment Commission 1 (EC1)', 'The environmental consequences of industrial cyber attacks', 'ec1', 'EC1 fullname', 'chairman', 'ec1-environmental consequences of industrial cyber attacks.docx', 'new', '', ''),
(87, 'Human Rights Council (HRC)', 'The issue of female foeticide and girl infanticide', 'hrc', 'HRC fullname', 'chairman', 'hrc-female foeticide and girl infanticide.docx', 'approved', 'ED2 fullname ', 'SECR4 fullname '),
(88, 'General Assembly 2 (GA2)', 'Financing alternatives in the new Digital Era', 'ga2', 'GA2 fullname', 'member', 'ga2-Financing alternatives in the new Digital Era.docx', 'edited', 'ED3 fullname', ''),
(93, 'Environment Commission 2 (EC2)', 'Single-use plastics as a roadmap for sustainability', 'ec2', 'EC2 fullname', 'member', 'ec2-Single-use plastics .docx', 'new', '', ''),
(121, 'Environment Commission 2 (EC2)', 'Addressing the e-waste challenge through an interdisciplinary approach', 'ec2', 'EC2 fullname', 'member', 'ec2-the e-waste challenge.docx', 'being edited', 'ED1 fullname', ''),
(122, 'General Assembly 6 (GA6)', 'Establishing a stronger international legal framework on cyberwarfare', 'ga6', 'GA6 fullname', 'member', 'ga6-a stronger international legal framework on cyberwarfare.docx', 'new', '', ''),
(123, 'Special Conference (SPECON)', 'E-Democracy: Citizens? participation in the digital age', 'specon', 'SPECON fullname', 'member', 'specon-Citizensâ€™ participation in the digital age.docx', 'new', '', ''),
(124, 'Special Conference (SPECON)', 'State response in addressing new challenges in cyber conflicts', 'specon', 'SPECON fullname', 'member', 'specon-addressing new challenges in cyber conflicts.docx', 'being approved', 'ED 1 fullname', 'SECR4 fullname '),
(126, 'General Assembly 1 (GA1)', 'Towards unilateral cyber security measures against non-state actors', 'ga1', 'GA1 fullname', 'chairman', 'ga1-towards unilateral cyber security measures against non-state actors.docx', 'new', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `resolutions`
--
ALTER TABLE `resolutions`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `resolutions`
--
ALTER TABLE `resolutions`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=127;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
