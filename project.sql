-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 19, 2024 at 12:50 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `city` varchar(50) DEFAULT NULL,
  `area` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`city`, `area`) VALUES
('pune', 'ambegaon budruk'),
('pune', 'aundh'),
('pune', 'baner'),
('pune', 'bavdhan khurd'),
('pune', 'bavdhan budruk'),
('pune', 'balewadi'),
('pune', 'shivajinagar'),
('pune', 'bibvewadi'),
('pune', 'bhugaon'),
('pune', 'bhukum'),
('pune', 'dhankawadi'),
('pune', 'dhanori'),
('pune', 'dhayari'),
('pune', 'erandwane'),
('pune', 'fursungi'),
('pune', 'ghorpadi'),
('pune', 'hadapsar'),
('pune', 'hingne khurd'),
('pune', 'karve nagar'),
('pune', 'kalas'),
('pune', 'katraj'),
('pune', 'khadki'),
('pune', 'kharadi'),
('pune', 'kondhwa'),
('pune', 'koregaon park'),
('pune', 'kothrud'),
('pune', 'lohagaon'),
('pune', 'manjri'),
('pune', 'markal'),
('pune', 'mohammed wadi'),
('pune', 'mundhwa'),
('pune', 'nanded'),
('pune', 'parvati (parvati hill)'),
('pune', 'panmala'),
('pune', 'pashan'),
('pune', 'pirangut'),
('pune', 'shivane'),
('pune', 'sus'),
('pune', 'undri'),
('pune', 'vishrantwadi'),
('pune', 'vitthalwadi'),
('pune', 'vadgaon khurd'),
('pune', 'vadgaon budruk'),
('pune', 'vadgaon sheri'),
('pune', 'wagholi'),
('pune', 'wanwadi'),
('pune', 'warje'),
('pune', 'yerwada'),
('mumbai', 'colaba'),
('mumbai', 'fort'),
('mumbai', 'nariman point'),
('mumbai', 'marine lines'),
('mumbai', 'charni road'),
('mumbai', 'grant road'),
('mumbai', 'churchgate'),
('mumbai', 'girgaon'),
('mumbai', 'opera house'),
('mumbai', 'malabar hill'),
('mumbai', 'walkeshwar'),
('mumbai', 'kemps corner'),
('mumbai', 'tardeo'),
('mumbai', 'mahalaxmi'),
('mumbai', 'worli'),
('mumbai', 'lower parel'),
('mumbai', 'prabhadevi'),
('mumbai', 'dadar'),
('mumbai', 'shivaji park'),
('mumbai', 'matunga'),
('mumbai', 'mahim'),
('mumbai', 'sion'),
('mumbai', 'wadala'),
('mumbai', 'chembur'),
('mumbai', 'ghatkopar'),
('mumbai', 'vikhroli'),
('mumbai', 'kanjurmarg'),
('mumbai', 'powai'),
('mumbai', 'andheri'),
('mumbai', 'juhu'),
('mumbai', 'vile parle'),
('mumbai', 'santacruz'),
('mumbai', 'khar'),
('mumbai', 'bandra'),
('mumbai', 'dadar'),
('mumbai', 'prabhadevi'),
('mumbai', 'kurla'),
('mumbai', 'bhandup'),
('mumbai', 'mulund'),
('mumbai', 'nahur'),
('mumbai', 'govandi'),
('mumbai', 'mankhurd'),
('mumbai', 'trombay');

-- --------------------------------------------------------

--
-- Table structure for table `user_finder`
--

CREATE TABLE `user_finder` (
  `type` varchar(255) DEFAULT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_provider`
--

CREATE TABLE `user_provider` (
  `type` varchar(255) DEFAULT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `service_name` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `area` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `phonenumber` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user_finder`
--
ALTER TABLE `user_finder`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `user_provider`
--
ALTER TABLE `user_provider`
  ADD PRIMARY KEY (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
