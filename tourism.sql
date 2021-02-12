-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 13, 2020 at 03:19 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tourism`
--

-- --------------------------------------------------------

--
-- Table structure for table `book_flight`
--

CREATE TABLE `book_flight` (
  `id` int(11) NOT NULL,
  `user_name` varchar(255) DEFAULT NULL,
  `user_mobile` varchar(255) DEFAULT NULL,
  `user_email` varchar(255) DEFAULT NULL,
  `departure_flight_name` varchar(255) DEFAULT NULL,
  `return_flight_name` varchar(255) DEFAULT NULL,
  `departure_city` varchar(255) DEFAULT NULL,
  `return_city` varchar(255) DEFAULT NULL,
  `price` int(255) DEFAULT NULL,
  `depart_date` date DEFAULT NULL,
  `return_date` date DEFAULT NULL,
  `no_adult` int(100) DEFAULT NULL,
  `no_child` int(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `book_holiday`
--

CREATE TABLE `book_holiday` (
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `book_hotel`
--

CREATE TABLE `book_hotel` (
  `hotel_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `book_hotel_flight`
--

CREATE TABLE `book_hotel_flight` (
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `find_flight`
--

CREATE TABLE `find_flight` (
  `flight_id` int(11) NOT NULL,
  `flight_name` varchar(100) DEFAULT NULL,
  `flight_price` int(255) DEFAULT NULL,
  `flight_from` varchar(100) DEFAULT NULL,
  `flight_to` varchar(100) DEFAULT NULL,
  `flight_time` timestamp(6) NULL DEFAULT NULL,
  `flight_arrive` timestamp(6) NULL DEFAULT NULL,
  `flight_duration` timestamp(6) NULL DEFAULT NULL,
  `flight_logo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `find_holiday`
--

CREATE TABLE `find_holiday` (
  `holiday_id` int(11) NOT NULL,
  `holiday_img` varchar(1000) DEFAULT NULL,
  `holiday_desc` varchar(100) DEFAULT NULL,
  `holiday_hotel` varchar(100) DEFAULT NULL,
  `holiday_city` varchar(100) DEFAULT NULL,
  `holiday_price` varchar(10000) DEFAULT NULL,
  `holiday_title` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `find_hotel`
--

CREATE TABLE `find_hotel` (
  `hotel_id` int(11) NOT NULL,
  `hotel_name` varchar(20) DEFAULT NULL,
  `hotel_city` varchar(20) DEFAULT NULL,
  `hotel_price` varchar(1000) DEFAULT NULL,
  `hotel_img` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `mysliderdb`
--

CREATE TABLE `mysliderdb` (
  `id` int(10) NOT NULL,
  `slidername` varchar(255) NOT NULL,
  `sliderimage` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mysliderdb`
--

INSERT INTO `mysliderdb` (`id`, `slidername`, `sliderimage`) VALUES
(1, 'slider 1', '1.jpg'),
(2, 'slider 2', '2.jpg'),
(3, 'slider 3', '3.jpg'),
(4, 'slider 4', '4.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `signup`
--

CREATE TABLE `signup` (
  `id` int(11) NOT NULL,
  `name` varchar(10) DEFAULT NULL,
  `email` varchar(20) DEFAULT NULL,
  `password` varchar(10) DEFAULT NULL,
  `mobile` varchar(12) DEFAULT NULL,
  `con_pass` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `book_flight`
--
ALTER TABLE `book_flight`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `book_hotel`
--
ALTER TABLE `book_hotel`
  ADD PRIMARY KEY (`hotel_id`);

--
-- Indexes for table `book_hotel_flight`
--
ALTER TABLE `book_hotel_flight`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `find_flight`
--
ALTER TABLE `find_flight`
  ADD PRIMARY KEY (`flight_id`);

--
-- Indexes for table `find_holiday`
--
ALTER TABLE `find_holiday`
  ADD PRIMARY KEY (`holiday_id`);

--
-- Indexes for table `find_hotel`
--
ALTER TABLE `find_hotel`
  ADD PRIMARY KEY (`hotel_id`);

--
-- Indexes for table `mysliderdb`
--
ALTER TABLE `mysliderdb`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `signup`
--
ALTER TABLE `signup`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `book_flight`
--
ALTER TABLE `book_flight`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `book_hotel`
--
ALTER TABLE `book_hotel`
  MODIFY `hotel_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `book_hotel_flight`
--
ALTER TABLE `book_hotel_flight`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `find_flight`
--
ALTER TABLE `find_flight`
  MODIFY `flight_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `find_holiday`
--
ALTER TABLE `find_holiday`
  MODIFY `holiday_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `find_hotel`
--
ALTER TABLE `find_hotel`
  MODIFY `hotel_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mysliderdb`
--
ALTER TABLE `mysliderdb`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `signup`
--
ALTER TABLE `signup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
