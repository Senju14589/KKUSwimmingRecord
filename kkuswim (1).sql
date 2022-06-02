-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 01, 2022 at 06:23 AM
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
(1, 'พุฒิพงศ์ ', 'สักแสน ', 'หวาย', 'ชาย', '2000-08-24', 9, 'Avatar/1.jpg', 1, 1),
(2, 'ณัฐดนัย', 'วินทะไชย', 'เตเต้', 'ชาย', '2000-04-15', 21, 'Avatar/2.jpg', 2, 1),
(3, 'ธนากร', 'น้อนฟิว', 'ฟิว', 'ชาย', '2000-07-27', 20, 'Avatar/3.jpg', 3, 1),
(8, 'ชาญชล', 'คนโก้', 'ชล', 'ชาย', '2000-07-14', 21, 'Avatar/8.jpg', 8, 1),
(9, 'ภาณุพงษ์', 'สุขส่ง', 'โอม', 'ชาย', '2000-06-21', 21, 'Avatar/9.jpg', 9, 1);

-- --------------------------------------------------------

--
-- Table structure for table `inquiry`
--

CREATE TABLE `inquiry` (
  `inquiry_id` int(11) NOT NULL,
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

INSERT INTO `inquiry` (`inquiry_id`, `study`, `location`, `anytime`, `level`, `pool`, `disease`, `details`) VALUES
(1, 'YES', 'คณะสหวิทยาการ', '2022-05-07', 'elite level swimming', 'ปานกลาง', 'NO', 'วอเอ๊ะๆๆๆ                                                                                                '),
(2, 'YES', 'คณะสหวิทยาการ', '2022-03-25', 'aeg group swimming', 'ชอบน้ำมาก', 'NO', 'เต้ไม่ชอบกินผักนะครับ'),
(3, 'YES', 'KKU Swimming', '2022-04-27', 'senior swimming', 'คุ้นเคย', 'NO', 'ไม่มีอะไรครับ แค่เทสระบบๆ'),
(8, 'YES', 'วิทยาเขตหนองคาย', '2022-01-27', 'aeg group swimming', 'ชอบน้ำมาก', 'NO', 'ทดสอบระบบเพื่อความปัง'),
(9, 'YES', 'KKBS', '2022-03-16', 'learn to swim', 'ค่อนข้างกลัวน้ำ', 'YES', 'กินเยอะๆระวังเขาไม่รักนะครับ');

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
(2, 'แข่งว่ายน้ำกระชับมิตรแดนคนหล่อ ประจำปี2022', 'รุ่นประชาช', 'ชาย', '2022-06-10');

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
(1, 'พ่อน้องหวายเอง', 'ยังอยู่ด้วยกัน', '0643469907', 'Puttipong1458998@gmail.com', 'แม่หวายเอง', 'ยังอยู่ด้วยกัน', '0988241642', 'senju7x@gmail.com', 'มหาวิทยาลัยขอนแก่น วิทยาเขตหนองคาย', 1),
(2, 'พ่อเต้เอง', 'ยังอยู่ด้วยกัน', '0667223311', 'qbc@gmail.com', 'แม่เต้เอง', 'ยังอยู่ด้วยกัน', '0994772205', 'samsung@gmail.com', 'KKU NKC', 2),
(3, 'พ่อฟิว', 'ยังอยู่ด้วยกัน', '0875210033', 'ooo@gmail.com', 'แม่ฟิว', 'ยังอยู่ด้วยกัน', '0953213212', 'ooo@gmail.com', 'อยู่ชัยภูมิ', 3),
(8, 'พ่อชลเอง', 'ยังอยู่ด้วยกัน', '0994772210', 'move@gmail.com', 'แม่ชลเอง', 'ยังอยู่ด้วยกัน', '0875201647', 'jklpo@gmail.com', 'บ้านหนองเดิ่น จังหวัดหนองคาย ', 8),
(9, 'พ่อโอมเด้ออ', 'ยังอยู่ด้วยกัน', '0994225164', 'gth@gmail.com', 'แม่โอมเองเด้อ', 'ยังอยู่ด้วยกัน', '0655554555', 'marvel@gmail.com', 'นครพนมเปรน', 9);

-- --------------------------------------------------------

--
-- Table structure for table `record`
--

CREATE TABLE `record` (
  `record_id` int(11) NOT NULL,
  `day` date NOT NULL,
  `poise` varchar(50) NOT NULL,
  `distance` varchar(20) NOT NULL,
  `timer` time NOT NULL,
  `babydetail_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `record`
--

INSERT INTO `record` (`record_id`, `day`, `poise`, `distance`, `timer`, `babydetail_id`) VALUES
(1, '2022-05-18', 'Freestyle', '100', '01:11:00', 1),
(2, '2022-05-30', 'Breaststroke', '200', '00:03:35', 1),
(11, '2022-05-18', 'Backstroke', '50', '07:27:00', 2),
(12, '2022-05-19', 'Backstroke', '100', '01:29:00', 3),
(13, '2022-05-13', 'IM', '200', '10:40:00', 8);

-- --------------------------------------------------------

--
-- Table structure for table `statswim`
--

CREATE TABLE `statswim` (
  `id` int(20) NOT NULL,
  `distance` varchar(50) NOT NULL,
  `no` int(20) NOT NULL,
  `sex` enum('ชาย','girl') NOT NULL,
  `8_9` varchar(20) NOT NULL,
  `10_11` varchar(20) NOT NULL,
  `12_13` varchar(20) NOT NULL,
  `14_15` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `statswim`
--

INSERT INTO `statswim` (`id`, `distance`, `no`, `sex`, `8_9`, `10_11`, `12_13`, `14_15`) VALUES
(1, 'Freestyle 50', 1, 'ชาย', '32', '30', '27', '26'),
(2, 'Freestyle 50', 2, 'ชาย', '34', '31', '27', '27'),
(3, 'Freestyle 50', 3, 'ชาย', '36', '32', '28', '28'),
(4, 'Freestyle 50', 4, 'ชาย', '36', '33', '28', '28'),
(5, 'Freestyle 50', 5, 'ชาย', '36', '33', '28', '28'),
(6, 'Freestyle 50', 6, 'ชาย', '37', '33', '29', '28'),
(7, 'Freestyle 50', 7, 'ชาย', '37', '33', '29', '29'),
(8, 'Freestyle 50', 8, 'ชาย', '37', '34', '29', '29'),
(9, 'Freestyle 50', 1, 'girl', '35', '29', '0', '0'),
(10, 'Freestyle 50', 2, 'girl', '36', '30', '0', '0'),
(11, 'Freestyle 50', 3, 'girl', '36', '32', '0', '0'),
(12, 'Freestyle 50', 4, 'girl', '36', '32', '0', '0'),
(13, 'Freestyle 50', 5, 'girl', '37', '33', '0', '0'),
(14, 'Freestyle 50', 6, 'girl', '38', '33', '0', '0'),
(15, 'Freestyle 50', 7, 'girl', '38', '34', '0', '0'),
(16, 'Freestyle 50', 8, 'girl', '38', '34', '0', '0'),
(17, 'Freestyle 100', 1, 'ชาย', '1:11.66', '1:05.70', '1:00.72', '57.55'),
(18, 'Freestyle 100', 2, 'ชาย', '1:14.39', '1:09.14', '1:01.01', '58.25'),
(19, 'Freestyle 100', 3, 'ชาย', '1:15.53', '1:09.24', '1:01.09', '1:00.46'),
(20, 'Freestyle 100', 4, 'ชาย', '1:19.27', '1:10.67', '1:02.10', '1:02.77'),
(21, 'Freestyle 100', 5, 'ชาย', '1:19.53', '1:10.96', '1:03.25', '1:03.91'),
(22, 'Freestyle 100', 6, 'ชาย', '1:20.34', '1:11.31', '1:04.33', '1:04.84'),
(23, 'Freestyle 100', 7, 'ชาย', '1:20.47', '1:13.03', '1:04.65', '1:05.45'),
(24, 'Freestyle 100', 8, 'ชาย', '1:20.51', '1:14.54', '1:05.85', '1:05.94'),
(25, 'Freestyle 100', 1, 'girl', '1:14.56', '1:02.09', '', ''),
(26, 'Freestyle 100', 2, 'girl', '1:16.64', '1:06.97', '', ''),
(27, 'Freestyle 100', 3, 'girl', '1:16.65', '1:08.29', '', ''),
(28, 'Freestyle 100', 4, 'girl', '1:18.35', '1:11.74', '', ''),
(29, 'Freestyle 100', 5, 'girl', '1:18.70', '1:12.46', '', ''),
(30, 'Freestyle 100', 6, 'girl', '1:19.04', '1:13.55', '', ''),
(31, 'Freestyle 100', 7, 'girl', '1:20.02', '1:14.18', '', ''),
(32, 'Freestyle 100', 8, 'girl', '1:20.91', '1:14.54', '', ''),
(33, 'Freestyle 200', 1, 'ชาย', '2:36.75', '2:26.94', '2:14.65', '2:05.87'),
(34, 'Freestyle 200', 2, 'ชาย', '2:46.48', '2:30.49', '2:18.51', '2:10.93'),
(35, 'Freestyle 200', 3, 'ชาย', '2:47.33', '2:30.59', '2:21.00', '2:14.03'),
(36, 'Freestyle 200', 4, 'ชาย', '2:46.64', '2:39.22', '2:23.92', '2:15.30'),
(37, 'Freestyle 200', 5, 'ชาย', '2:48.05', '2:45.20', '2:28.43', '2:18.00'),
(38, 'Freestyle 200', 6, 'ชาย', '2:49.25', '2:45.26', '2:30.05', '2:21.13'),
(39, 'Freestyle 200', 7, 'ชาย', '2:54.05', '2:48.31', '2:31.32', '2:26.26'),
(40, 'Freestyle 200', 8, 'ชาย', '2:57.41', '2:49.70', '2:1.59', '2:37.23'),
(41, 'Freestyle 200', 1, 'girl', '2:37.44', '2:12.86', '', ''),
(42, 'Freestyle 200', 2, 'girl', '2:28.84', '2:27.76', '', ''),
(43, 'Freestyle 200', 3, 'girl', '2:50.45', '2:28.74', '', ''),
(44, 'Freestyle 200', 4, 'girl', '2:51.75', '2:40.10', '', ''),
(45, 'Freestyle 200', 5, 'girl', '2:54.75', '2:42.84', '', ''),
(46, 'Freestyle 200', 6, 'girl', '2:55.33', '2:46.22', '', ''),
(47, 'Freestyle 200', 7, 'girl', '3:01.21', '2:48.90', '', ''),
(48, 'Freestyle 200', 8, 'girl', '3:11.51', '2:51.92', '', ''),
(49, 'Backstroke 50', 1, 'ชาย', '38.58', '35.21', '30.96', '30.09'),
(50, 'Backstroke 50', 2, 'ชาย', '39.64', '35.97', '31.56', '30.38'),
(51, 'Freestyle 50', 3, 'ชาย', '40.44', '36.18', '32.17', '31.26'),
(52, 'Backstroke 50', 4, 'ชาย', '40.78', '37.66', '32.24', '31.55'),
(53, 'Backstroke 50', 5, 'ชาย', '41.05', '37.8', '32.31', '32.9'),
(54, 'Backstroke 50', 6, 'ชาย', '41.27', '37.86', '32.88', '33.65'),
(55, 'Backstroke 50', 7, 'ชาย', '42.71', '40.27', '33.99', '34.13'),
(56, 'Backstroke 50', 8, 'ชาย', '43.78', '40.38', '34.05', '34.61'),
(57, 'Backstroke 100', 1, 'ชาย', '', '', '1:09.25', '1:05.83'),
(58, 'Backstroke 100', 2, 'ชาย', '', '', '1:10.39', '1:07.73'),
(59, 'Backstroke 100', 3, 'ชาย', '', '', '1:10.69', '1:10.85'),
(60, 'Backstroke 100', 4, 'ชาย', '', '', '1:11.00', '1:12.22'),
(61, 'Backstroke 100', 5, 'ชาย', '', '', '1:12.83', '1:14.25'),
(62, 'Backstroke 100', 6, 'ชาย', '', '', '1:15.70', '1:24.32'),
(63, 'Backstroke 100', 7, 'ชาย', '', '', '1:16.98', '1:24.68'),
(64, 'Backstroke 100', 8, 'ชาย', '', '', '1:26.53', '1:26.28'),
(65, 'Backstroke 50', 1, 'girl', '41.19', '37.4', '', ''),
(66, 'Backstroke 50', 2, 'girl', '41.33', '39.19', '', ''),
(67, 'Backstroke 50', 3, 'girl', '41.97', '39.2', '', ''),
(68, 'Backstroke 50', 4, 'girl', '42.12', '39.35', '', ''),
(69, 'Backstroke 50', 5, 'girl', '42.84', '40.07', '', ''),
(70, 'Backstroke 50', 6, 'girl', '43.34', '43.92', '', ''),
(71, 'Backstroke 50', 7, 'girl', '43.39', '46.04', '', ''),
(72, 'Backstroke 50', 8, 'girl', '47.04', '46.64', '', ''),
(73, 'Butterfly 50', 1, 'ชาย', '36.09', '33.38', '28.21', '28.26'),
(74, 'Butterfly 50', 2, 'ชาย', '37.34', '33.48', '28.85', '29.74'),
(75, 'Butterfly 50', 3, 'ชาย', '38.03', '33.65', '30.08', '29.92'),
(76, 'Butterfly 50', 4, 'ชาย', '38.53', '38.13', '30.6', '30.15'),
(77, 'Butterfly 50', 5, 'ชาย', '38.74', '38.35', '30.74', '30.7'),
(78, 'Butterfly 50', 6, 'ชาย', '40.01', '39.32', '31.09', '32.77'),
(79, 'Butterfly 50', 7, 'ชาย', '40.92', '39.34', '32.3', '33.25'),
(80, 'Butterfly 50', 8, 'ชาย', '44.59', '39.58', '32.71', '33.58'),
(81, 'Butterfly 50', 1, 'girl', '36.92', '35.38', '', ''),
(82, 'Butterfly 50', 2, 'girl', '38.1', '36.29', '', ''),
(83, 'Butterfly 50', 3, 'girl', '39.76', '37.35', '', ''),
(84, 'Butterfly 50', 4, 'girl', '41.16', '38.14', '', ''),
(85, 'Butterfly 50', 5, 'girl', '41.82', '39.66', '', ''),
(86, 'Butterfly 50', 6, 'girl', '43.09', '40.19', '', ''),
(87, 'Butterfly 50', 7, 'girl', '45.61', '40.69', '', ''),
(88, 'Butterfly 50', 8, 'girl', '47.99', '41.04', '', ''),
(89, 'Butterfly 100', 1, 'ชาย', '', '', '1:03.00', '1:02.42'),
(90, 'Butterfly 100', 2, 'ชาย', '', '', '1:03.46', '1:05.26'),
(91, 'Butterfly 100', 3, 'ชาย', '', '', '1:07.01', '1:06.58'),
(92, 'Butterfly 100', 4, 'ชาย', '', '', '1:11.24', '1:07.64'),
(93, 'Butterfly 100', 5, 'ชาย', '', '', '1:16.73', '1:09.61'),
(94, 'Butterfly 100', 6, 'ชาย', '', '', '1:16.82', '1:11.62'),
(95, 'Butterfly 100', 7, 'ชาย', '', '', '1:21.03', '1:16.28'),
(96, 'Butterfly 100', 8, 'ชาย', '', '', '1:21.89', '1:22.79'),
(97, 'Breaststroke 50', 1, 'ชาย', '41.2', '38.43', '37.45', '32.73'),
(98, 'Breaststroke 50', 2, 'ชาย', '44.97', '40.59', '37.57', '33.42'),
(99, 'Breaststroke 50', 3, 'ชาย', '48.53', '40.82', '37.73', '33.47'),
(100, 'Breaststroke 50', 4, 'ชาย', '50.96', '41.4', '37.81', '34.41'),
(101, 'Breaststroke 50', 5, 'ชาย', '51.65', '43.6', '38.63', '34.61'),
(102, 'Breaststroke 50', 6, 'ชาย', '52.61', '43.96', '38.82', '35.34'),
(103, 'Breaststroke 50', 7, 'ชาย', '52.78', '44.51', '39.65', '36.61'),
(104, 'Breaststroke 50', 8, 'ชาย', '54.16', '44.54', '39.75', '38.29'),
(105, 'Breaststroke 50', 1, 'girl', '42.5', '40.12', '', ''),
(106, 'Breaststroke 50', 2, 'girl', '47.52', '42.44', '', ''),
(107, 'Breaststroke 50', 3, 'girl', '47.89', '42.95', '', ''),
(108, 'Breaststroke 50', 4, 'girl', '50.98', '42.96', '', ''),
(109, 'Breaststroke 50', 5, 'girl', '52.41', '44.73', '', ''),
(110, 'Breaststroke 50', 6, 'girl', '54.6', '45.38', '', ''),
(111, 'Breaststroke 50', 7, 'girl', '54.7', '46.18', '', ''),
(112, 'Breaststroke 50', 8, 'girl', '54.83', '46.42', '', ''),
(113, 'Breaststroke 100', 1, 'ชาย', '', '', '1:21.59', '1:12.20'),
(114, 'Breaststroke 100', 2, 'ชาย', '', '', '1:23.36', '1:14.43'),
(115, 'Breaststroke 100', 3, 'ชาย', '', '', '1:23.75', '1:14.59'),
(116, 'Breaststroke 100', 4, 'ชาย', '', '', '1:24.87', '1:14.78'),
(117, 'Breaststroke 100', 5, 'ชาย', '', '', '1:28.15', '1:14.99'),
(118, 'Breaststroke 100', 6, 'ชาย', '', '', '1:32.55', '1:15.85'),
(119, 'Breaststroke 100', 7, 'ชาย', '', '', '1:33.09', '1:17.50'),
(120, 'Breaststroke 100', 8, 'ชาย', '', '', '1:33.32', '1:25.92'),
(121, 'IM 200', 1, 'ชาย', '2:54.60', '2:4.89', '2:25.29', '2:22.75'),
(122, 'IM 200', 2, 'ชาย', '3:00.10', '2:48.68', '2:34.27', '2:24.66'),
(123, 'IM 200', 3, 'ชาย', '3:03.70', '2:56.14', '2:35.06', '2:30.15'),
(124, 'IM 200', 4, 'ชาย', '3:04.60', '3:04.55', '2:42.55', '2:33.61'),
(125, 'IM 200', 5, 'ชาย', '3:14.62', '3:10.06', '2:42.97', '2:36.17'),
(126, 'IM 200', 6, 'ชาย', '3:17.21', '3:13.05', '2:46.09', '2:48.57'),
(127, 'IM 200', 7, 'ชาย', '3:32.00', '3:17.14', '2:46:94', '2:48.89'),
(128, 'IM 200', 8, 'ชาย', '3:33.76', '3:37.30', '2:51.64', '2:49.72'),
(129, 'IM 200', 1, 'girl', '2:56.66', '2:59.13', '', ''),
(130, 'IM 200', 2, 'girl', '3:05.68', '3:04.70', '', ''),
(131, 'IM 200', 3, 'girl', '3:23.97', '3:06.43', '', ''),
(132, 'IM 200', 4, 'girl', '3:29.03', '3:08.00', '', ''),
(133, 'IM 200', 5, 'girl', '3:31.42', '3:08.79', '', ''),
(134, 'IM 200', 6, 'girl', '3:40.98', '3:23.64', '', ''),
(135, 'IM 200', 7, 'girl', '3:50.96', '3:50.82', '', ''),
(136, 'IM 200', 8, 'girl', '3:57.99', 'SCR', '', '');

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
  ADD PRIMARY KEY (`inquiry_id`);

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
  ADD PRIMARY KEY (`record_id`);

--
-- Indexes for table `statswim`
--
ALTER TABLE `statswim`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `babydetail`
--
ALTER TABLE `babydetail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `inquiry`
--
ALTER TABLE `inquiry`
  MODIFY `inquiry_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `listprogram`
--
ALTER TABLE `listprogram`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `parentdetail`
--
ALTER TABLE `parentdetail`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `record`
--
ALTER TABLE `record`
  MODIFY `record_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `statswim`
--
ALTER TABLE `statswim`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=137;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
