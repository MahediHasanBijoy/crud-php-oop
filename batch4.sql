-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 31, 2022 at 08:27 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `batch4`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_student`
--

CREATE TABLE `tbl_student` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_student`
--

INSERT INTO `tbl_student` (`id`, `name`, `email`, `status`) VALUES
(12, 'sujon', 'sujon@gmail.com', 2),
(13, 'putin', 'putin@gmail.com', 1),
(14, 'putin', 'putin@gmail.com', 2),
(15, 'putin', 'putin@gmail.com', 1),
(16, 'putin', 'putin@gmail.com', 1),
(18, 'Modi', 'modi@gmail.com', 2),
(20, 'putin', 'putin@gmail.com', 1),
(21, 'putin', 'putin@gmail.com', 1),
(22, 'putin', 'putin@gmail.com', 1),
(23, 'putin', 'putin@gmail.com', 2),
(24, 'putin', 'putin@gmail.com', 1),
(25, 'putin', 'putin@gmail.com', 1),
(26, 'putin', 'putin@gmail.com', 2),
(27, 'putin', 'putin@gmail.com', 1),
(28, 'putin', 'putin@gmail.com', 1),
(29, 'putin', 'putin@gmail.com', 2),
(30, 'putin', 'putin@gmail.com', 1),
(31, 'putin', 'putin@gmail.com', 1),
(32, 'putin', 'putin@gmail.com', 2),
(33, 'putin', 'putin@gmail.com', 1),
(34, 'putin', 'putin@gmail.com', 1),
(35, 'Bijoy', 'bijoycse2014@gmail.com', 0),
(36, 'joe biden', 'biden@gmail.com', 1),
(37, 'smith', 'smith@gmail.com', 1),
(38, 'smith', 'smith@gmail.com', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_student`
--
ALTER TABLE `tbl_student`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_student`
--
ALTER TABLE `tbl_student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
