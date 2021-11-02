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
-- Table structure for table `topics`
--

CREATE TABLE `topics` (
  `id` int(10) NOT NULL,
  `committee` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `topic` varchar(270) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `topics`
--

INSERT INTO `topics` (`id`, `committee`, `topic`) VALUES
(1, 'General Assembly 1 (GA1)', 'Towards unilateral cyber security measures against non-state actors'),
(2, 'General Assembly 1 (GA1)', 'The issue of terrorism by states and non-state actors in relation to energy issues'),
(3, 'General Assembly 1 (GA1)', 'Addressing the challenges of increased autonomy in weapon systems'),
(4, 'General Assembly 2 (GA2)', 'Financing alternatives in the new Digital Era'),
(5, 'General Assembly 2 (GA2)', 'External debt sustainability and development'),
(6, 'General Assembly 2 (GA2)', 'Establishing the framework to support the development of green economy'),
(7, 'General Assembly 3 (GA3)', 'Net neutrality as a means of ensuring social equality'),
(8, 'General Assembly 3 (GA3)', 'Art digitalization as a means of preserving cultural heritage and cultural diversity'),
(9, 'General Assembly 3 (GA3)', 'Humanitarian response to urban crises in light of the New Urban Agenda'),
(10, 'General Assembly 4 (GA4)', 'The development of cyber peacekeeping'),
(11, 'General Assembly 4 (GA4)', 'Addressing the rise of the alt-right movement'),
(12, 'General Assembly 4 (GA4)', 'The situation in Western Sahara'),
(13, 'General Assembly 6 (GA6)', 'Establishing a stronger international legal framework on cyberwarfare'),
(14, 'General Assembly 6 (GA6)', 'Criminal accountability of UN officials and experts on mission'),
(15, 'General Assembly 6 (GA6)', 'The question of digital data use in criminal investigations'),
(19, 'Economic and Social Council (ECOSOC)', 'Improving SMEs competitiveness and entrepreneurship in Industry 4.0 for productivity and inclusive growth and development'),
(20, 'Economic and Social Council (ECOSOC)', 'Addressing the environmental impact of corporate social responsibility'),
(21, 'Economic and Social Council (ECOSOC)', 'The provision of international aid towards Argentina?s economic recovery'),
(22, 'Economic and Social Council (ECOSOC)', 'Social impact of selective medical treatment'),
(23, 'Human Rights Council (HRC)', 'The use of digital technologies for the promotion of inclusive practices in education'),
(24, 'Human Rights Council (HRC)', 'The issue of female foeticide and girl infanticide'),
(25, 'Human Rights Council (HRC)', 'Ensuring government assistance to victims of acid violence'),
(26, 'Human Rights Council (HRC)', 'The violation of the rights of Uyghur people'),
(27, 'Environment Commission 1 (EC1)', 'The environmental consequences of industrial cyber attacks'),
(28, 'Environment Commission 1 (EC1)', 'The role of the Global Initiative on Food Loss and Waste Reduction in sustainable development'),
(29, 'Environment Commission 1 (EC1)', 'Environmental consequences of producing weapons of mass destruction (WMD)'),
(30, 'Environment Commission 2 (EC2)', 'Addressing the e-waste challenge through an interdisciplinary approach'),
(31, 'Environment Commission 2 (EC2)', 'Addressing the challenges of mountainous biodiversity'),
(32, 'Environment Commission 2 (EC2)', 'Single-use plastics as a roadmap for sustainability'),
(33, 'Special Conference (SPECON)', 'State response in addressing new challenges in cyber conflicts'),
(34, 'Special Conference (SPECON)', 'Achieving intergovernmental open access data sharing'),
(35, 'Special Conference (SPECON)', 'The rise of digital authoritarianism'),
(36, 'Special Conference (SPECON)', 'E-Democracy: Citizens? participation in the digital age');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `topics`
--
ALTER TABLE `topics`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `topics`
--
ALTER TABLE `topics`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
