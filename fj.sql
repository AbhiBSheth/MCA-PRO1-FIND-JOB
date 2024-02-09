-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 29, 2023 at 03:53 AM
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
-- Database: `fj`
--

-- --------------------------------------------------------

--
-- Table structure for table `appjob`
--

CREATE TABLE `appjob` (
  `id` int(3) NOT NULL,
  `em` varchar(50) NOT NULL,
  `job` varchar(20) NOT NULL,
  `ans` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `appjob`
--

INSERT INTO `appjob` (`id`, `em`, `job`, `ans`) VALUES
(1, 'user@gmail.com', '1', 'APPROVE'),
(2, 'user@gmail.com', '2', 'APPROVE');

-- --------------------------------------------------------

--
-- Table structure for table `co`
--

CREATE TABLE `co` (
  `id` int(3) NOT NULL,
  `conm` varchar(40) NOT NULL,
  `em` varchar(30) NOT NULL,
  `mob` varchar(10) NOT NULL,
  `ad` varchar(250) NOT NULL,
  `logo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `co`
--

INSERT INTO `co` (`id`, `conm`, `em`, `mob`, `ad`, `logo`) VALUES
(1, 'TCS', 'admin@tcs.com', '9090909090', 'Mumbai, Maharashtra, India', 'TCS-iON-Logo-RGB-Color.png'),
(2, 'ORACLE', 'admin@oracle.com', '9999999999', '2300 Oracle Way, Austin, Texas', 'oracle.png');

-- --------------------------------------------------------

--
-- Table structure for table `job`
--

CREATE TABLE `job` (
  `id` int(3) NOT NULL,
  `conm` varchar(40) NOT NULL,
  `job` varchar(40) NOT NULL,
  `city` varchar(40) NOT NULL,
  `jobtyp` varchar(100) NOT NULL,
  `sal` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `job`
--

INSERT INTO `job` (`id`, `conm`, `job`, `city`, `jobtyp`, `sal`) VALUES
(1, 'TCS', 'PL/SQL DEVLOPER', 'BENGALURU', 'Regular Employee\r\nYears of Experience\r\n6 to 10+ years', '15000'),
(2, 'ORACLE', 'FULL STACK DEVLOPER', 'JUNAGADH', 'Regular Employee\r\nYears of Experience\r\n6 to 10+ year', '35000');

-- --------------------------------------------------------

--
-- Table structure for table `us`
--

CREATE TABLE `us` (
  `id` int(3) NOT NULL,
  `em` varchar(30) NOT NULL,
  `mob` varchar(10) NOT NULL,
  `ad` varchar(250) NOT NULL,
  `greduation` varchar(50) NOT NULL,
  `hsc` varchar(50) NOT NULL,
  `deg` varchar(50) NOT NULL,
  `mas` varchar(50) NOT NULL,
  `photo` varchar(50) NOT NULL,
  `dob` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `us`
--

INSERT INTO `us` (`id`, `em`, `mob`, `ad`, `greduation`, `hsc`, `deg`, `mas`, `photo`, `dob`) VALUES
(1, 'user@gmail.com', '9999999999', 'asdfsdfdfdsfdsfdsfsdf', 'M.C.A', '80', '8', '8.1', 'OIP.jpg', '2000-05-10');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(3) NOT NULL,
  `fnm` varchar(50) NOT NULL,
  `em` varchar(30) NOT NULL,
  `un` varchar(10) NOT NULL,
  `ps` varchar(15) NOT NULL,
  `uac` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `fnm`, `em`, `un`, `ps`, `uac`) VALUES
(1, 'Admin', 'admin@findjob.com', 'admin', 'admin1', 'A'),
(2, 'USER', 'user@gmail.com', 'user', 'user', 'U'),
(3, 'RATAN TATA ', 'admin@tcs.com', 'tcs', 'tcs', 'C'),
(4, 'LARRY ELLISON', 'admin@oracle.com', 'oracle', 'oracle', 'C');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appjob`
--
ALTER TABLE `appjob`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `co`
--
ALTER TABLE `co`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `em` (`em`);

--
-- Indexes for table `job`
--
ALTER TABLE `job`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `us`
--
ALTER TABLE `us`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `em` (`em`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `em` (`em`),
  ADD UNIQUE KEY `un` (`un`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appjob`
--
ALTER TABLE `appjob`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `co`
--
ALTER TABLE `co`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `job`
--
ALTER TABLE `job`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `us`
--
ALTER TABLE `us`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
