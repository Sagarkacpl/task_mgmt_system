-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 13, 2023 at 02:07 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `task_mgmt_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `ID` int(11) NOT NULL,
  `department_name` varchar(255) NOT NULL,
  `added_by` varchar(255) DEFAULT NULL,
  `deletedStatus` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`ID`, `department_name`, `added_by`, `deletedStatus`, `created_at`) VALUES
(1, 'IT', 'Admin', 0, '2023-09-13 05:02:00'),
(2, 'Account', 'Admin', 0, '2023-09-13 05:05:56'),
(3, 'Sales', 'Admin', 0, '2023-09-13 05:22:14'),
(4, 'Human Resources', 'Admin', 0, '2023-09-13 05:29:33'),
(5, 'Business Development', 'Admin', 0, '2023-09-13 05:30:59'),
(6, 'Board of Directors', 'Admin', 0, '2023-09-13 05:31:10'),
(7, 'Quality Assurance', 'Admin', 0, '2023-09-13 05:31:29'),
(8, 'Project Management', 'Admin', 0, '2023-09-13 05:31:47');

-- --------------------------------------------------------

--
-- Table structure for table `designation`
--

CREATE TABLE `designation` (
  `ID` int(11) NOT NULL,
  `designation_name` varchar(255) NOT NULL,
  `added_by` varchar(255) NOT NULL,
  `deletedStatus` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `designation`
--

INSERT INTO `designation` (`ID`, `designation_name`, `added_by`, `deletedStatus`, `created_at`) VALUES
(1, 'Manager', 'Admin', 0, '2023-09-13 06:09:36'),
(2, 'Sr. Manager', 'Admin', 0, '2023-09-13 06:13:26');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `Emp_id` varchar(255) DEFAULT NULL,
  `Name` varchar(255) DEFAULT NULL,
  `Phone_no` varchar(255) DEFAULT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `Password` varchar(255) DEFAULT NULL,
  `is_admin` int(11) NOT NULL DEFAULT 0,
  `Emp_deptment` varchar(255) DEFAULT NULL,
  `Emp_designation` varchar(255) DEFAULT NULL,
  `Date_of_Birth` varchar(255) DEFAULT NULL,
  `Emp_joining_date` date DEFAULT NULL,
  `Emp_reporting` varchar(255) DEFAULT NULL,
  `DeletedStatus` int(11) NOT NULL DEFAULT 0,
  `Created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `Emp_id`, `Name`, `Phone_no`, `Email`, `Password`, `is_admin`, `Emp_deptment`, `Emp_designation`, `Date_of_Birth`, `Emp_joining_date`, `Emp_reporting`, `DeletedStatus`, `Created_at`) VALUES
(1, NULL, 'Admin', '9876543210', 'admin@gmail.com', '202cb962ac59075b964b07152d234b70', 2, NULL, NULL, '1998-05-20', NULL, NULL, 0, '2023-09-12 04:54:37'),
(2, NULL, 'Manager', '9876543210', 'Manager@gmail.com', '202cb962ac59075b964b07152d234b70', 1, NULL, NULL, '2000-01-20', NULL, NULL, 0, '2023-09-12 05:40:08'),
(3, NULL, 'Employee', '9876543210', 'emp@gmail.com', '202cb962ac59075b964b07152d234b70', 0, NULL, NULL, '2001-05-10', NULL, NULL, 0, '2023-09-12 05:40:08'),
(8, 'ADEF1234', 'Mikayla Spears', '9876543210', 'cyxeqimyb@gmail.com', '202cb962ac59075b964b07152d234b70', 0, 'Project Management', 'Manager', '1984-06-13', '2003-05-27', 'Tempor ut veniam no', 0, '2023-09-13 10:38:45');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `designation`
--
ALTER TABLE `designation`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `designation`
--
ALTER TABLE `designation`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
