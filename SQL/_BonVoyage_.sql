-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 03, 2020 at 04:27 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `voyage`
--

-- --------------------------------------------------------

--
-- Table structure for table `booked_room`
--

CREATE TABLE `booked_room` (
  `id` int(10) NOT NULL,
  `username` varchar(20) NOT NULL,
  `hotel` varchar(50) NOT NULL,
  `room` varchar(50) NOT NULL,
  `price` int(50) NOT NULL,
  `checkin` date NOT NULL,
  `checkout` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `client1`
--

CREATE TABLE `client1` (
  `first_name` varchar(10) NOT NULL,
  `middle_name` varchar(10) NOT NULL,
  `last_name` varchar(10) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `email` varchar(30) NOT NULL,
  `date` date NOT NULL,
  `from_city` varchar(20) NOT NULL,
  `from_country` varchar(20) NOT NULL,
  `to_city` varchar(20) NOT NULL,
  `to_country` varchar(20) NOT NULL,
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `client1`
--

INSERT INTO `client1` (`first_name`, `middle_name`, `last_name`, `phone`, `email`, `date`, `from_city`, `from_country`, `to_city`, `to_country`, `created_at`) VALUES
('aman', 'k', 'kumar', '8630664618', 'aman.as9070@gmail.com', '2020-04-09', 'AL', 'AF', 'AL', 'AF', '2020-04-01');

-- --------------------------------------------------------

--
-- Table structure for table `destination`
--

CREATE TABLE `destination` (
  `id` int(6) UNSIGNED NOT NULL,
  `username` varchar(30) NOT NULL,
  `place` varchar(30) NOT NULL,
  `from_date` date DEFAULT NULL,
  `return_date` date NOT NULL,
  `ref` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `destination`
--

INSERT INTO `destination` (`id`, `username`, `place`, `from_date`, `return_date`, `ref`) VALUES
(3, 'Aman77', 'Agra, India', '2020-03-01', '2020-03-05', ''),
(5, 'Aman77', 'Amalfi, Italy', '2020-03-13', '2020-03-11', '#ref300320-52086');

-- --------------------------------------------------------

--
-- Table structure for table `foodlist`
--

CREATE TABLE `foodlist` (
  `id` int(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `price` int(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `foodlist`
--

INSERT INTO `foodlist` (`id`, `name`, `image`, `price`) VALUES
(1, 'Baahubali Thali', 'Baahubali_Thali.jpg', 200),
(2, 'Burger', 'burger.jpg', 100),
(3, 'Cheese Sandwich', 'Cheese_Blast_Sandwich.jpg', 150),
(4, 'Chocolate Golgappe', 'Chocolate_Golgappe.jpg', 250),
(5, 'Chocolate Truffle', 'Chocolate_Hazelnut_Truffle.jpg', 180),
(6, 'Tea', 'tea.jpg', 50),
(7, 'Coffee', 'coffee.jpg', 100),
(8, 'French Fries', 'frenchfries.jpg', 150),
(9, 'Happy Choco', 'Happy_Happy_Choco_Chip_Shake.jpg', 250),
(10, 'Magnum Upside Down', 'Magnum_Upside_Down.jpg', 160),
(11, 'Masala Paneer Kathi_', 'Masala_Paneer_Kathi_Roll.jpg', 100),
(12, 'Meurig', 'Meurig.jpg', 100),
(13, 'Pakora', 'Pakora.jpg', 80),
(14, 'Paneer Pakora', 'paneer pakora.jpg', 100),
(15, 'Pizza', 'Pizza.jpg', 210),
(16, 'Puff', 'puff.jpg', 60),
(17, 'Veggie Roll', 'roll.jpg', 100),
(18, 'Samosa', 'samosa.jpg', 60),
(19, 'Veg Momos', 'Veg_Momos.jpg', 40),
(20, 'Asian Pasta', 'Asian_Pasta.jpg', 100);

-- --------------------------------------------------------

--
-- Table structure for table `hotel`
--

CREATE TABLE `hotel` (
  `id` int(10) NOT NULL,
  `name` text NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hotel`
--

INSERT INTO `hotel` (`id`, `name`, `image`) VALUES
(1, 'Beach House', 'BeachHouse.jpg'),
(2, 'Egyptian Hotel', 'Egyptianhotel.jpg'),
(3, 'JW green', 'JWgreen.jpg'),
(4, 'Mariott', 'Mariott.jpg'),
(5, 'Ocean Resort', 'OceanResort.jpg'),
(6, 'The Palace', 'ThePalace.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `order_placed`
--

CREATE TABLE `order_placed` (
  `id` int(10) NOT NULL,
  `username` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `phone_no` int(10) NOT NULL,
  `address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_placed`
--

INSERT INTO `order_placed` (`id`, `username`, `email`, `phone_no`, `address`) VALUES
(1, 'simikash', 'kashsim27@gmail.com', 2147483647, 'hbdgjsgd'),
(9, 'raj', 'aman.as9070@gmail.co', 2147483647, 'rajkumar street');

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `id` int(8) NOT NULL,
  `name` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `price` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`id`, `name`, `image`, `price`) VALUES
(1, 'Classic Room', 'ClassicRoom.jpg', 3000),
(2, 'Double Room', 'DoubleRoom.jpg', 2000),
(3, 'Duplex Room', 'DuplexRoom.jpg', 1500),
(4, 'Family Room', 'FamilyRoom.jpg', 4500),
(5, 'Luxury Room', 'LuxuryRoom.jpg', 5000),
(6, 'Suite', 'Suite.jpg', 8000);

-- --------------------------------------------------------

--
-- Table structure for table `signup1`
--

CREATE TABLE `signup1` (
  `id` int(6) UNSIGNED NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(60) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `gender` varchar(8) NOT NULL,
  `birthday` date DEFAULT NULL,
  `dp` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `signup1`
--

INSERT INTO `signup1` (`id`, `firstname`, `lastname`, `username`, `password`, `email`, `phone`, `gender`, `birthday`, `dp`) VALUES
(67, 'Diksha', 'Puri', 'diksha19', 'a46e4fa62bbe088f94d0e7cb68fe5f38', 'dikshapuri19@gmail.com', '9197979791', 'Female', '1999-11-19', '../voyage/uploads/diksha.jpeg'),
(68, 'Simran', 'Kashyap', 'simkash27', '09fe2c2743c68d295088ad31a790b164', 'simkash27@gmail.com', '8968116698', 'Female', '1998-07-27', '../voyage/uploads/simran.jpeg'),
(69, 'Aman', 'Kumar', 'Aman77', '424696d75c2bfeca30d67a5d2ecbd609', 'aman.as9070@gmail.com', '8630664618', 'Male', '1998-12-07', '../voyage/uploads/aman3.jpeg'),
(70, 'Aditya', 'Gupta', 'adipool', '0d62b07602f6fd7ff20a02bf998c9557', 'anujaditya02@gmail.com', '9718300170', 'Male', '1999-06-22', '../voyage/uploads/aditya2.jpeg'),
(83, 'Admin', 'Guest', 'User', 'f6fdffe48c908deb0f4c3bd36c032e72', 'user123@gmail.com', '0919797979', 'Male', '2020-04-08', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `price` double(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`id`, `name`, `image`, `price`) VALUES
(1, 'Amalfi, Italy', 'amalfi.jpg', 50000.00),
(2, 'Agra, India', 'agra.jpg', 30000.00),
(3, 'Rome', 'rome.jpg', 50000.00),
(4, 'The Great Wall, China', 'wall.jpg', 60000.00),
(5, 'Paris, France', 'paris.jpg', 90000.00),
(6, 'Pyramids, Egypt', 'pyramids.jpg', 70000.00);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booked_room`
--
ALTER TABLE `booked_room`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `destination`
--
ALTER TABLE `destination`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `foodlist`
--
ALTER TABLE `foodlist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_placed`
--
ALTER TABLE `order_placed`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `signup1`
--
ALTER TABLE `signup1`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booked_room`
--
ALTER TABLE `booked_room`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `destination`
--
ALTER TABLE `destination`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `foodlist`
--
ALTER TABLE `foodlist`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `order_placed`
--
ALTER TABLE `order_placed`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `signup1`
--
ALTER TABLE `signup1`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
