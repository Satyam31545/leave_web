-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 04, 2021 at 09:27 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 5.6.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `leave_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `leave_table`
--

CREATE TABLE `leave_table` (
  `id` int(18) NOT NULL,
  `username` varchar(20) NOT NULL,
  `CL` int(5) NOT NULL DEFAULT '24',
  `EL` int(5) NOT NULL DEFAULT '0',
  `DL` int(5) NOT NULL DEFAULT '0',
  `ML` int(5) NOT NULL DEFAULT '0',
  `LWP` int(5) NOT NULL DEFAULT '0',
  `HD` int(5) NOT NULL DEFAULT '0',
  `SL` int(5) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `leave_table`
--

INSERT INTO `leave_table` (`id`, `username`, `CL`, `EL`, `DL`, `ML`, `LWP`, `HD`, `SL`) VALUES
(1, 'satyamsingh', 24, 4, 4, 0, 4, 4, -10),
(2, 'shivam', 24, 4, 4, 4, 4, 4, 4),
(3, 'rahul', 24, -13, 4, 4, 4, 4, 4),
(4, 'arjun', 24, 4, 4, 4, 4, 4, 4),
(5, 'mukesh', 24, 4, 4, 4, 4, 4, 4),
(8, 'bhim', 24, 0, 0, 0, 0, 0, 0),
(10, 'mohit', 24, 0, 0, 0, 0, 0, 0),
(11, 'nisant', 24, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `id` int(18) NOT NULL,
  `username` varchar(20) NOT NULL,
  `coordinator_status` varchar(5) NOT NULL DEFAULT 'no',
  `admin_status` varchar(5) NOT NULL DEFAULT 'no',
  `rejection` varchar(5) NOT NULL DEFAULT 'no',
  `apply_date` date NOT NULL,
  `from_date` date NOT NULL,
  `to_date` date NOT NULL,
  `total_leave` int(10) NOT NULL,
  `reason` varchar(100) NOT NULL,
  `leave_address` varchar(50) NOT NULL,
  `leave_type` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`id`, `username`, `coordinator_status`, `admin_status`, `rejection`, `apply_date`, `from_date`, `to_date`, `total_leave`, `reason`, `leave_address`, `leave_type`) VALUES
(17, 'satyamsingh', 'no', 'yes', 'no', '2021-11-04', '2021-11-12', '2021-11-16', 4, 'gh', 'panjab', 'CL'),
(18, 'shivam', 'yes', 'yes', 'no', '2021-11-04', '2021-11-07', '2021-11-09', 2, 'sgf', 'varanasi', 'CL'),
(19, 'satyamsingh', 'yes', 'yes', 'no', '2021-11-08', '2021-11-27', '2021-12-08', 11, '', '', 'CL'),
(20, 'satyamsingh', 'yes', 'yes', 'no', '2021-11-08', '2021-11-11', '2021-11-25', 14, 'fgfg', 'beach', 'LWP'),
(21, 'satyamsingh', 'yes', 'yes', 'no', '2021-11-08', '2021-11-11', '2021-11-25', 14, 'fgfg', 'beach', 'ML'),
(22, 'satyamsingh', 'yes', 'yes', 'no', '2021-11-09', '2021-11-10', '2021-11-10', 6, 'dfdg', '', 'EL'),
(23, 'satyamsingh', 'yes', 'yes', 'no', '2021-11-09', '2021-11-12', '2021-11-26', 14, '', '', 'HD'),
(24, 'rahul', 'yes', 'yes', 'no', '2021-11-11', '0000-00-00', '0000-00-00', 0, '', '', 'CL'),
(25, 'rahul', 'no', 'no', 'no', '2021-11-11', '2021-11-12', '2021-11-25', 13, '', '', 'CL'),
(26, 'rahul', 'yes', 'yes', 'no', '2021-11-11', '2021-11-09', '2021-11-26', 17, '', '', 'EL'),
(27, 'rahul', 'no', 'no', 'yes', '2021-11-11', '2021-11-20', '2021-11-25', 5, '', '', 'EL'),
(28, 'mukesh', 'no', 'no', 'no', '2021-11-11', '2021-11-12', '2021-11-19', 7, '', '', 'CL'),
(29, 'mukesh', 'no', 'no', 'no', '2021-11-11', '2021-11-20', '2021-11-26', 6, '', '', 'EL'),
(30, 'mukesh', 'no', 'no', 'no', '2021-11-11', '2021-11-24', '2021-11-13', 11, '', '', 'CL'),
(31, 'mukesh', 'no', 'no', 'no', '2021-11-11', '2021-11-19', '2021-11-26', 7, '', '', 'EL'),
(32, 'mukesh', 'no', 'no', 'no', '2021-11-11', '2021-11-19', '2021-11-25', 6, '', '', 'EL'),
(33, 'rahul', 'yes', 'yes', 'no', '2021-11-11', '0000-00-00', '0000-00-00', 0, '', '', 'CL'),
(34, 'rahul', 'no', 'no', 'yes', '2021-11-11', '0000-00-00', '0000-00-00', 0, '', '', 'CL'),
(35, 'rahul', 'yes', 'yes', 'no', '2021-11-11', '0000-00-00', '0000-00-00', 0, '', '', 'CL'),
(36, 'satyamsingh', 'no', 'yes', 'no', '2021-11-12', '2021-11-10', '2021-11-10', 1, '', 'ffffffffffffg', 'HD'),
(37, 'satyamsingh', 'yes', 'yes', 'no', '2021-11-16', '2021-11-28', '2021-12-02', 4, 'bngf', 'varanasi', 'ML'),
(38, 'satyamsingh', 'no', 'yes', 'no', '2021-11-17', '2021-11-18', '2021-11-27', 9, 'hfg', 'mumbai', 'CL'),
(39, 'satyamsingh', 'no', 'yes', 'no', '2021-11-17', '2021-11-25', '2021-12-02', 7, 'fdsgf', 'dfgd', 'ML'),
(40, 'satyamsingh', 'no', 'yes', 'no', '2021-11-17', '2021-11-19', '2021-11-19', 1, '', 'mumbai', 'HD'),
(41, 'satyamsingh', 'no', 'yes', 'no', '2021-12-04', '2021-12-16', '2021-12-18', 2, 'hgj', 'mumbai', 'CL'),
(42, 'satyamsingh', 'no', 'yes', 'no', '2021-12-04', '2021-12-15', '2021-12-15', 1, 'jbuhy', 'panjab', 'HD');

-- --------------------------------------------------------

--
-- Table structure for table `user_table`
--

CREATE TABLE `user_table` (
  `userid` int(11) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `secret_word` varchar(20) NOT NULL,
  `position` int(10) NOT NULL,
  `sex` varchar(10) NOT NULL,
  `mobile_no` varchar(20) NOT NULL,
  `address` varchar(100) NOT NULL,
  `coordinator` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_table`
--

INSERT INTO `user_table` (`userid`, `fullname`, `username`, `password`, `secret_word`, `position`, `sex`, `mobile_no`, `address`, `coordinator`) VALUES
(4, 'satyam singh', 'satyamsingh', 'satyam', 'dook', 2, '1', '6393892679', 'go ', 'shivam'),
(5, 'shivam singh', 'shivam', 'shivam', 'book', 1, '0', '9800008909', '56/67 M', 'shivam'),
(6, 'rahul singh', 'rahul', 'rahul', 'book', 0, '0', '9889898988', 'goa', 'satyamsingh'),
(7, 'mukesh', 'mukesh', 'mukesh', 'book', 1, '0', '9889898000', '54ttgr', 'shivam'),
(10, 'mohit', 'mohit', 'mohit', 'book', 0, '0', '9889898988', '54ttgr', 'satyamsingh'),
(11, 'Nisant', 'nisant', 'nisant', 'book', 1, '0', '9889898988', '56/67 Ma', 'satyamsingh');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `leave_table`
--
ALTER TABLE `leave_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_table`
--
ALTER TABLE `user_table`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `leave_table`
--
ALTER TABLE `leave_table`
  MODIFY `id` int(18) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `id` int(18) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `user_table`
--
ALTER TABLE `user_table`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
