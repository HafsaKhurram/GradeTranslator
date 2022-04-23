-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 22, 2022 at 12:31 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gradetranslator`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_classroom`
--

CREATE TABLE `tb_classroom` (
  `Class_ID` int(5) NOT NULL,
  `Class_title` varchar(50) NOT NULL,
  `Class_code` varchar(10) NOT NULL,
  `Instructor_code` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_classroom`
--

INSERT INTO `tb_classroom` (`Class_ID`, `Class_title`, `Class_code`, `Instructor_code`) VALUES
(1, 'Science General', 'SE-001', 'F2022'),
(2, 'Software Engineering', 'SE-007', 'F2021'),
(3, 'Data Structures', 'DS-345', 'Fac-543');

-- --------------------------------------------------------

--
-- Table structure for table `tb_login`
--

CREATE TABLE `tb_login` (
  `id` int(5) NOT NULL,
  `username` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `password` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_login`
--

INSERT INTO `tb_login` (`id`, `username`, `password`, `status`) VALUES
(2, 'admin', '4d08bbcc27a726596aeaf572be232a80', 1),
(3, 'Admin', '4d08bbcc27a726596aeaf572be232a80', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_classroom`
--
ALTER TABLE `tb_classroom`
  ADD PRIMARY KEY (`Class_ID`);

--
-- Indexes for table `tb_login`
--
ALTER TABLE `tb_login`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_classroom`
--
ALTER TABLE `tb_classroom`
  MODIFY `Class_ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_login`
--
ALTER TABLE `tb_login`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
