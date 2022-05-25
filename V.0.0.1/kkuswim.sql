-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 23, 2022 at 04:38 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kkuswim`
--

-- --------------------------------------------------------

--
-- Table structure for table `listprogram`
--

CREATE TABLE `listprogram` (
  `id` int(11) NOT NULL,
  `list` varchar(90) NOT NULL,
  `age` varchar(10) NOT NULL,
  `sex` varchar(10) NOT NULL,
  `dateprogram` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `listprogram`
--

INSERT INTO `listprogram` (`id`, `list`, `age`, `sex`, `dateprogram`) VALUES
(1, 'แข่งว่ายน้ำประจำปีบ้านหนอวคิโมจี๊ 2022', 'ไม่เกิน 18', 'ชาย', '2022-05-19'),
(3, 'แข่งว่ายน้ำกระชับมิตรแดนคนหล่อ ประจำปี2022', 'รุ่นประชาช', 'ชาย', '2022-06-10');

-- --------------------------------------------------------

--
-- Table structure for table `record`
--

CREATE TABLE `record` (
  `id` int(11) NOT NULL,
  `list` varchar(50) NOT NULL,
  `age` varchar(40) NOT NULL,
  `sex` varchar(10) NOT NULL,
  `statistics` varchar(20) NOT NULL,
  `number` varchar(10) NOT NULL,
  `style` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `record`
--

INSERT INTO `record` (`id`, `list`, `age`, `sex`, `statistics`, `number`, `style`) VALUES
(1, 'แข่งว่ายน้ำประจำปีบ้านหนองกกกอก 2022', 'ไม่เกิน 15 ปี', 'ชาย', '13:10', '3', 'IM'),
(4, 'แข่งว่ายน้ำบ้านหนองคิโมจี๊ ครั้งที่1', 'ไม่เกิน 18 ปี', 'ชาย', '01:05', '2', 'Freestyle'),
(5, 'แข่งว่ายน้ำ บ้านหนองอีโต้ง', 'รุ่นประชาชน', 'ชาย', '03:12', '3', 'Butterfly'),
(8, 'แข่งว่ายน้ำการกุศลครั้งที่2 ประจำปี 2565', 'รุ่นประชาชน', 'หญิง', '02:22', '1', 'Butterfly');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `listprogram`
--
ALTER TABLE `listprogram`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `record`
--
ALTER TABLE `record`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `listprogram`
--
ALTER TABLE `listprogram`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `record`
--
ALTER TABLE `record`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
