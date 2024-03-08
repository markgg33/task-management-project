-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 08, 2024 at 05:50 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `task_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `login_users`
--

CREATE TABLE `login_users` (
  `emp_id` int(11) NOT NULL,
  `emp_username` varchar(255) NOT NULL,
  `emp_pass` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `dob` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `nationality` varchar(255) NOT NULL,
  `address` longtext NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `emp_type` varchar(255) NOT NULL,
  `joining_date` varchar(255) NOT NULL,
  `department` varchar(255) NOT NULL,
  `photo` mediumblob NOT NULL,
  `created` datetime NOT NULL,
  `usertype` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login_users`
--

INSERT INTO `login_users` (`emp_id`, `emp_username`, `emp_pass`, `first_name`, `last_name`, `dob`, `gender`, `status`, `nationality`, `address`, `city`, `state`, `country`, `email`, `mobile`, `emp_type`, `joining_date`, `department`, `photo`, `created`, `usertype`) VALUES
(10, '2024-0001', '123', 'Mark Francis', 'De Guzman', '1997-12-10', 'Male', 'Single', 'Filipino', '169 Monday St. Brgy. Poblacion, Mandaluyong City', 'Mandaluyong', '', 'Philippines', 'deguzmanmarkfrancisp@gmail.com', '09568014944', 'Permanent Position', '2024-02-14', 'IT', 0x75706c6f6164732f57494e5f32303233303830355f31355f33385f30315f50726f2e6a7067, '2024-02-14 01:04:37', 'admin'),
(13, 'TSKM-001', '123', 'Mark Francis', 'De Guzman', '1997-12-10', 'Male', 'Single', 'Filipino', '169 B. Monday St. Mandaluyong City', 'Mandaluyong', '', 'Philippines', 'deguzmanmarkfrancisp@gmail.com', '09568014944', 'Permanent Position', '2024-03-08', 'IT', 0x75706c6f6164732f67656c6f2d3178312e6a7067, '2024-03-08 20:17:40', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `task_list`
--

CREATE TABLE `task_list` (
  `task_id` int(11) NOT NULL,
  `task_name` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `login_users`
--
ALTER TABLE `login_users`
  ADD PRIMARY KEY (`emp_id`);

--
-- Indexes for table `task_list`
--
ALTER TABLE `task_list`
  ADD PRIMARY KEY (`task_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `login_users`
--
ALTER TABLE `login_users`
  MODIFY `emp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `task_list`
--
ALTER TABLE `task_list`
  MODIFY `task_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
