-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 23, 2022 at 01:30 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_login`
--

CREATE TABLE `admin_login` (
  `id` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_login`
--

INSERT INTO `admin_login` (`id`, `password`) VALUES
('A1', 'password123');

-- --------------------------------------------------------

--
-- Table structure for table `bill`
--

CREATE TABLE `bill` (
  `table_no` varchar(20) NOT NULL,
  `name` varchar(20) NOT NULL,
  `phone_no` bigint(20) NOT NULL,
  `total` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bill`
--

INSERT INTO `bill` (`table_no`, `name`, `phone_no`, `total`) VALUES
('12', 'Yakshith Rai M', 987654321, '650'),
('12', 'Yakshith Rai M', 987654321, '900'),
('31', 'Yakshith Rai M', 123, '250');

--
-- Triggers `bill`
--
DELIMITER $$
CREATE TRIGGER `delete_orders` AFTER INSERT ON `bill` FOR EACH ROW DELETE from orders where table_no=NEW.table_no
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `d_no` varchar(20) NOT NULL,
  `d_name` varchar(30) NOT NULL,
  `item_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`d_no`, `d_name`, `item_name`) VALUES
('d1', 'icecream', 'casata'),
('d1', 'icecream', 'faloda'),
('d1', 'ice-cream', 'fudge'),
('d1', 'icecream', 'tiramisu');

-- --------------------------------------------------------

--
-- Table structure for table `dept_login`
--

CREATE TABLE `dept_login` (
  `dept_id` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dept_login`
--

INSERT INTO `dept_login` (`dept_id`, `password`) VALUES
('a1', 'password123'),
('d1', 'password123'),
('d5', '123');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `item_name` varchar(50) NOT NULL,
  `price` float NOT NULL,
  `img` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`item_name`, `price`, `img`) VALUES
('fudge', 300, 'https://fthmb.tqn.com/yxDkW2x3QEogKjQG-x4sn-yFLeI=/1496x1394/filters:fill(auto,1)/fudge-566489823df78ce161b054b6.jpg'),
('tiramisu', 150, 'https://i2.wp.com/blog.hellofresh.com/wp-content/uploads/2018/02/HF171017_ExtraShot_372_NL_Tiramisu_Shot2_Frontal_Closeup_low.jpg?ssl=1'),
('casata', 100, 'https://4.imimg.com/data4/LP/KW/MY-16663006/cassata-ice-cream-500x500.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `name` varchar(30) NOT NULL,
  `table_no` int(30) NOT NULL,
  `phone_no` bigint(30) NOT NULL,
  `item_name` varchar(30) NOT NULL,
  `price` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `temp_order`
--

CREATE TABLE `temp_order` (
  `name` varchar(20) NOT NULL,
  `table_no` varchar(20) NOT NULL,
  `phone_no` bigint(20) NOT NULL,
  `item_name` varchar(20) NOT NULL,
  `price` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `temp_order`
--

INSERT INTO `temp_order` (`name`, `table_no`, `phone_no`, `item_name`, `price`) VALUES
('Yakshith Rai M', '12', 987654321, 'casata', '100'),
('Yakshith Rai M', '12', 987654321, 'casata', '100'),
('Yakshith Rai M', '12', 987654321, 'tiramisu', '150'),
('Yakshith Rai M', '12', 987654321, 'fudge', '300'),
('Yakshith Rai M', '12', 987654321, 'tiramisu', '150'),
('Yakshith Rai M', '12', 987654321, 'casata', '100');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_login`
--
ALTER TABLE `admin_login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`item_name`),
  ADD KEY `d_no` (`d_no`);

--
-- Indexes for table `dept_login`
--
ALTER TABLE `dept_login`
  ADD PRIMARY KEY (`dept_id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD KEY `item_name` (`item_name`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD KEY `item_name` (`item_name`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `department`
--
ALTER TABLE `department`
  ADD CONSTRAINT `department_ibfk_1` FOREIGN KEY (`d_no`) REFERENCES `dept_login` (`dept_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `items`
--
ALTER TABLE `items`
  ADD CONSTRAINT `items_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `department` (`item_name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `items` (`item_name`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
