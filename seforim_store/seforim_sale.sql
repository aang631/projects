-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 16, 2017 at 01:35 PM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `seforim_sale`
--

-- --------------------------------------------------------

--
-- Table structure for table `administrator`
--

CREATE TABLE `administrator` (
  `admin_Id` int(100) NOT NULL,
  `user_name` varchar(26) NOT NULL,
  `hash` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `administrator`
--

INSERT INTO `administrator` (`admin_Id`, `user_name`, `hash`) VALUES
(1, 'admin', '$2y$10$902TlnStxKoJkNV.qIbGp.GUhrLLhPjjh7lMU6rlYuTDz8.tdK5RK');

-- --------------------------------------------------------

--
-- Table structure for table `seforim`
--

CREATE TABLE `seforim` (
  `name` varchar(100) NOT NULL,
  `id` int(11) NOT NULL,
  `type` varchar(15) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `in_stock` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `seforim`
--

INSERT INTO `seforim` (`name`, `id`, `type`, `price`, `in_stock`) VALUES
('Igros Moshe', 1, 'Halacha', '100.00', 'Y'),
('Chumash Mikraos Gedolos', 2, 'Chumash', '110.50', 'Y'),
('Navi Mikraos Gedolos', 3, 'Nach', '219.99', 'N'),
('Frankel Edition Rambam', 4, 'Halacha', '250.00', 'Y'),
('Stone Chumash', 5, 'Chumash', '40.00', 'N'),
('Artscroll Siddur Ashkenaz', 6, 'Tefilla', '12.00', 'Y'),
('Zaichor Chanoch Mishnayos', 7, 'Mishnah', '175.50', 'Y'),
('Orchos Tzadikim', 8, 'Mussar', '7.25', 'N'),
('Dibros Moshe', 9, 'Gemara', '125.00', 'Y'),
('Darash Moshe', 10, 'Chumash', '15.00', 'Y'),
('Emes L''yaakov', 11, 'Chumash', '12.75', 'Y'),
('Kitzor Hilchos Shabbos', 12, 'Halacha', '10.00', 'Y'),
('The Shabbos Kitchen', 13, 'Halacha', '20.00', 'Y'),
('Minchas Chinuch', 14, 'Chumash', '55.00', 'Y'),
('Orchos Shabbos', 15, 'Halacha', '45.00', 'N'),
('Kahati-Entire Set', 16, 'Mishnah', '150.00', 'Y'),
('Kahati-Single Volume', 17, 'Mishnah', '19.75', 'Y'),
('Mesivta Bava Kamma Travel Edition', 20, 'Gemara', '39.65', 'Y'),
('Artscroll Brachos Full Sized Edition', 21, 'Gemara', '33.00', 'Y'),
('Peleh Yoetz', 22, 'Mussar', '14.00', 'Y'),
('Be''er Yosef Al Hatorah', 23, 'Chumash', '28.00', 'Y'),
('Dirshu Mishnah Brurah', 24, 'Halacha', '45.00', 'N'),
('Around the Maggid''s Table', 25, 'Other', '15.00', 'Y'),
('With Heart Full of Faith', 26, 'Mussar', '20.00', 'Y'),
('Chofetz Chaim', 27, 'Halacha', '10.00', 'Y'),
('Shmiras Halshon', 28, 'Mussar', '10.00', 'Y'),
('Shearim B''tfillah', 29, 'Tefilla', '8.50', 'Y'),
('Rav Schwab on Prayer', 30, 'Tefilla', '26.00', 'Y'),
('Kovetz Mifarshim Maseches Kiddushin', 31, 'Gemara', '42.00', 'Y'),
('Pathway to Prayer', 32, 'Tefilla', '8.00', 'Y'),
('Living Emunah', 33, 'Mussar', '13.00', 'Y'),
('Tikkun', 34, 'Chumash', '21.00', 'Y');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administrator`
--
ALTER TABLE `administrator`
  ADD PRIMARY KEY (`admin_Id`);

--
-- Indexes for table `seforim`
--
ALTER TABLE `seforim`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `administrator`
--
ALTER TABLE `administrator`
  MODIFY `admin_Id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `seforim`
--
ALTER TABLE `seforim`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
