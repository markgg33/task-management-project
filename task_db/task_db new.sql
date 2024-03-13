-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 13, 2024 at 07:39 AM
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
(14, 'TSKM-002', '1234', 'Joeanalyn', 'Grande', '1999-06-12', 'Male', 'Single', 'Filipino', '615 Raymond Tower Boni', 'Mandaluyong', '', 'Philippines', 'joeanalyn07@gmail.com', '09123456789', 'Part Time Employee', '2024-03-12', 'IT', 0x75706c6f6164732f494d475f32303231303731385f3136303835332e6a7067, '0000-00-00 00:00:00', ''),
(16, 'TSKM-004', '123', 'John Angelo', 'Mendoza', '1995-09-27', 'male', 'Single', 'Alien', 'A Luna pababa', 'Mandaluyong', '', 'Philippines', 'icyblazing@gmail.com', '09388817094', 'Permanent Position', '2024-03-13', 'IT', '', '2024-03-13 12:20:41', 'user'),
(17, 'TSKM-003', '123', 'Mark Francis', 'De Guzman', '1997-12-10', 'Male', 'Single', 'Filipino', '169 Monday St. Brgy. Poblacion, Mandaluyong City', 'Mandaluyong', '', 'Philippines', 'deguzmanmarkfrancisp@gmail.com', '09568014944', 'Permanent Position', '2024-03-13', 'IT', 0x75706c6f6164732f6d61726b79792e6a7067, '2024-03-13 12:56:31', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `task_list`
--

CREATE TABLE `task_list` (
  `task_id` int(11) NOT NULL,
  `emp_username` varchar(255) NOT NULL,
  `task_name` varchar(250) NOT NULL,
  `task_site` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `task_list`
--

INSERT INTO `task_list` (`task_id`, `emp_username`, `task_name`, `task_site`) VALUES
(22, 'TSKM-002', 'Gisingin si ajomama', 'PHONE 7:00pm'),
(23, 'TSKM-001', 'new one', 'PHONE 7:00pm'),
(24, 'TSKM-001', 'Gisingin si ajomama', 'PHONE 7:00pm'),
(26, 'TSKM-003', 'SSS Pension Update', 'SSS Gabbys'),
(27, 'TSKM-003', 'FTF Class', 'SJB Kalentong'),
(28, 'TSKM-003', 'Clean Room', 'Mark&#039;s Room');

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
  ADD PRIMARY KEY (`task_id`),
  ADD KEY `emp_username` (`emp_username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `login_users`
--
ALTER TABLE `login_users`
  MODIFY `emp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `task_list`
--
ALTER TABLE `task_list`
  MODIFY `task_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
