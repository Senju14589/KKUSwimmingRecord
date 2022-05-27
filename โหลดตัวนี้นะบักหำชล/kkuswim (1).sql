-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 27, 2022 at 05:23 AM
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
-- Table structure for table `babydetail`
--

CREATE TABLE `babydetail` (
  `id` int(11) NOT NULL,
  `name` varchar(30) DEFAULT NULL,
  `lastname` varchar(30) DEFAULT NULL,
  `nickname` varchar(20) DEFAULT NULL,
  `sexbaby` varchar(10) DEFAULT NULL,
  `birthday` date NOT NULL,
  `agebaby` int(10) NOT NULL,
  `image` varchar(250) NOT NULL,
  `parent_id` int(10) NOT NULL,
  `status` int(10) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `babydetail`
--

INSERT INTO `babydetail` (`id`, `name`, `lastname`, `nickname`, `sexbaby`, `birthday`, `agebaby`, `image`, `parent_id`, `status`) VALUES
(1, 'พุฒิพงศ์ สักแสน ', 'สักแสน ', 'หวาย', 'ชาย', '2000-08-24', 21, 'Avatar/1.jpg', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `inquiry`
--

CREATE TABLE `inquiry` (
  `quiry_id` int(11) NOT NULL,
  `study` varchar(20) DEFAULT NULL,
  `location` varchar(100) DEFAULT NULL,
  `anytime` date DEFAULT NULL,
  `level` varchar(50) DEFAULT NULL,
  `pool` varchar(50) DEFAULT NULL,
  `disease` varchar(20) DEFAULT NULL,
  `details` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `inquiry`
--

INSERT INTO `inquiry` (`quiry_id`, `study`, `location`, `anytime`, `level`, `pool`, `disease`, `details`) VALUES
(1, 'YES', 'คณะสหวิทยาการ', '2022-05-07', 'elite level swimming', 'ชอบน้ำมาก', 'YES', 'ง่วงนอนมากๆเลยนะครับ');

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
-- Table structure for table `parentdetail`
--

CREATE TABLE `parentdetail` (
  `id` int(10) NOT NULL,
  `namefather` varchar(50) DEFAULT NULL,
  `rsfather` varchar(30) DEFAULT NULL,
  `phonefather` varchar(10) DEFAULT NULL,
  `emailfather` varchar(50) DEFAULT NULL,
  `namemother` varchar(50) DEFAULT NULL,
  `rsmother` varchar(30) DEFAULT NULL,
  `phonemother` varchar(10) DEFAULT NULL,
  `emailmother` varchar(50) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `quiry_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `parentdetail`
--

INSERT INTO `parentdetail` (`id`, `namefather`, `rsfather`, `phonefather`, `emailfather`, `namemother`, `rsmother`, `phonemother`, `emailmother`, `address`, `quiry_id`) VALUES
(1, 'พ่อน้องหวายเอง', 'ยังอยู่ด้วยกัน', '0643469907', 'Puttipong1458998@gmail.com', 'แม่หวายเอง', 'ยังอยู่ด้วยกัน', '0988241642', 'senju7x@gmail.com', 'มหาวิทยาลัยขอนแก่น วิทยาเขตหนองคาย', 1);

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
-- Indexes for table `babydetail`
--
ALTER TABLE `babydetail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK` (`parent_id`);

--
-- Indexes for table `inquiry`
--
ALTER TABLE `inquiry`
  ADD PRIMARY KEY (`quiry_id`);

--
-- Indexes for table `listprogram`
--
ALTER TABLE `listprogram`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `parentdetail`
--
ALTER TABLE `parentdetail`
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
-- AUTO_INCREMENT for table `babydetail`
--
ALTER TABLE `babydetail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `inquiry`
--
ALTER TABLE `inquiry`
  MODIFY `quiry_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `listprogram`
--
ALTER TABLE `listprogram`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `parentdetail`
--
ALTER TABLE `parentdetail`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `record`
--
ALTER TABLE `record`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
