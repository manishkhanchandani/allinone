-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 14, 2017 at 05:32 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `day1`
--

-- --------------------------------------------------------

--
-- Table structure for table `first_table`
--

CREATE TABLE `first_table` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `gender` enum('male','female') DEFAULT NULL,
  `description` text,
  `marital_status` varchar(50) DEFAULT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `access_level` enum('member','admin') NOT NULL DEFAULT 'member'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `fourth_table`
--

CREATE TABLE `fourth_table` (
  `id` int(11) NOT NULL,
  `category` varchar(255) DEFAULT NULL,
  `sorting` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `fourth_table`
--

INSERT INTO `fourth_table` (`id`, `category`, `sorting`) VALUES
(1, 'Jobs', 1),
(2, 'Personals', 2),
(3, 'Services', 3),
(4, 'Sale', 4),
(5, 'Buy', 5),
(6, 'Gigs', 6);

-- --------------------------------------------------------

--
-- Table structure for table `second_table`
--

CREATE TABLE `second_table` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `second_table`
--

INSERT INTO `second_table` (`id`, `name`) VALUES
(1, 'manny');

-- --------------------------------------------------------

--
-- Table structure for table `third_table`
--

CREATE TABLE `third_table` (
  `id` int(11) NOT NULL,
  `firstName` varchar(50) DEFAULT NULL,
  `secondName` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `third_table`
--

INSERT INTO `third_table` (`id`, `firstName`, `secondName`) VALUES
(1, 'manny', 'here'),
(2, 'mamik', 'here');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `first_table`
--
ALTER TABLE `first_table`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `fourth_table`
--
ALTER TABLE `fourth_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `second_table`
--
ALTER TABLE `second_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `third_table`
--
ALTER TABLE `third_table`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `first_table`
--
ALTER TABLE `first_table`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `fourth_table`
--
ALTER TABLE `fourth_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `second_table`
--
ALTER TABLE `second_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `third_table`
--
ALTER TABLE `third_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
