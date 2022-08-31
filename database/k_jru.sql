-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 04, 2022 at 06:18 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `k_jru`
--

-- --------------------------------------------------------

--
-- Table structure for table `complaint`
--

CREATE TABLE `complaint` (
  `sno` int(115) NOT NULL,
  `c_id` varchar(225) NOT NULL,
  `com_des` varchar(225) NOT NULL,
  `e_no` varchar(225) NOT NULL,
  `com_cate` varchar(225) NOT NULL,
  `status` varchar(225) NOT NULL,
  `dt` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `complaint`
--

INSERT INTO `complaint` (`sno`, `c_id`, `com_des`, `e_no`, `com_cate`, `status`, `dt`) VALUES
(1, 'p-000001', 'parking is full', 'kush', 'parking deparment', 'Resolved', '2022-03-04 08:55:15');

-- --------------------------------------------------------

--
-- Table structure for table `com_type`
--

CREATE TABLE `com_type` (
  `sno` int(115) NOT NULL,
  `complaint_name` varchar(225) NOT NULL,
  `d_id` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `com_type`
--

INSERT INTO `com_type` (`sno`, `complaint_name`, `d_id`) VALUES
(0, 'parking is full', '1000');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `sno` int(115) NOT NULL,
  `dep_name` varchar(225) NOT NULL,
  `d_id` varchar(224) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`sno`, `dep_name`, `d_id`) VALUES
(1, 'parking deparment', '1000');

-- --------------------------------------------------------

--
-- Table structure for table `user_table`
--

CREATE TABLE `user_table` (
  `sno` int(225) NOT NULL,
  `f_name` varchar(225) NOT NULL,
  `l_name` varchar(225) NOT NULL,
  `gender` varchar(224) NOT NULL,
  `email` varchar(222) NOT NULL,
  `mobile_no` int(222) NOT NULL,
  `address` varchar(222) NOT NULL,
  `role` int(222) NOT NULL,
  `dep` varchar(222) NOT NULL,
  `dt` datetime NOT NULL DEFAULT current_timestamp(),
  `password` int(222) NOT NULL,
  `e_no` varchar(115) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_table`
--

INSERT INTO `user_table` (`sno`, `f_name`, `l_name`, `gender`, `email`, `mobile_no`, `address`, `role`, `dep`, `dt`, `password`, `e_no`) VALUES
(1, '$f_name', '$l_name', '$gender', '$email', 0, '$address', 1, '$dep', '2022-03-04 08:36:54', 0, 'admin'),
(2, 'kush', 'kush', 'M', 'skush@gmialc.', 93838183, 'tapkara', 3, '', '2022-03-04 08:53:27', 0, 'kush');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `complaint`
--
ALTER TABLE `complaint`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `user_table`
--
ALTER TABLE `user_table`
  ADD PRIMARY KEY (`sno`),
  ADD UNIQUE KEY `mobile_no` (`mobile_no`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `complaint`
--
ALTER TABLE `complaint`
  MODIFY `sno` int(115) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `sno` int(115) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_table`
--
ALTER TABLE `user_table`
  MODIFY `sno` int(225) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
