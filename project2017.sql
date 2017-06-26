-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 26, 2017 at 03:21 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project2017`
--

-- --------------------------------------------------------

--
-- Table structure for table `lr_reminders`
--

CREATE TABLE `lr_reminders` (
  `reminder_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `emailTo` varchar(150) DEFAULT NULL,
  `message` text,
  `fileLink` text,
  `status` int(1) NOT NULL DEFAULT '1',
  `reminder_created_dt` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `lr_users`
--

CREATE TABLE `lr_users` (
  `user_id` int(11) NOT NULL,
  `email` varchar(150) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `first_name` varchar(25) DEFAULT NULL,
  `last_name` varchar(25) DEFAULT NULL,
  `gender` enum('male','female') DEFAULT NULL,
  `birth_year` int(4) DEFAULT NULL,
  `created_dt` timestamp NULL DEFAULT NULL,
  `login_dt` bigint(20) DEFAULT NULL,
  `emailFlag1` int(1) NOT NULL DEFAULT '0',
  `emailFlag1Date` bigint(20) DEFAULT NULL,
  `cronFlag` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `lr_reminders`
--
ALTER TABLE `lr_reminders`
  ADD PRIMARY KEY (`reminder_id`);

--
-- Indexes for table `lr_users`
--
ALTER TABLE `lr_users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `lr_reminders`
--
ALTER TABLE `lr_reminders`
  MODIFY `reminder_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `lr_users`
--
ALTER TABLE `lr_users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
