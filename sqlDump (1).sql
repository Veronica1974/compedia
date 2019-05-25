-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 26, 2019 at 12:37 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `compedia`
--
CREATE DATABASE IF NOT EXISTS `compedia` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `compedia`;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(45) DEFAULT NULL,
  `password` varchar(32) DEFAULT NULL,
  `first_name` varchar(45) DEFAULT NULL,
  `last_name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `first_name`, `last_name`) VALUES
(1, 'veronicadar01@gmail.com', 'tolmVPxLrI', 'Alice', 'Fox'),
(2, 'veronicadar02@gmail.com', '2Q7zaiVw64', 'Alex', 'Duna'),
(3, 'veronicadar03@gmail.com', '2Q7zaiVw64', 'Alex', 'Duna'),
(4, 'veronicadar04@gmail.com', '2Q7zaiVw64', 'Alex', 'Duna'),
(5, 'veronicadar05@gmail.com', 'f7KddgSv0r', 'Fany', 'Cohen'),
(6, 'veronicadar06@gmail.com', 'f7KddgSv0r', 'Fany', 'Cohen'),
(7, 'veronicadar07@gmail.com', '6ELnInEVyk', 'Nicol', 'Gonen'),
(8, 'veronicadar08@gmail.com', 'FRZTNGuXt4', 'Sarah', 'Hilei'),
(9, 'veronicadar09@gmail.com', 'mLeLjwmFx9', 'Angel', 'Juna'),
(10, 'veronicadar10@gmail.com', 'FJe9rooCnP', 'Filip', 'Zoob'),
(11, 'veronicadar11@gmail.com', '8okw35i1yP', 'Sfia', 'Valey'),
(12, 'veronicadar12@gmail.com', 'rnom0E88ks', 'Shomo', 'Uno'),
(13, 'veronicadar13@gmail.com', 'xZb3OxFajd', 'Ann', 'Shuner'),
(14, 'veronicadar14@gmail.com', '2MF7YHtYad', 'Dmitar', 'Samov'),
(15, 'veronicadar15@gmail.com', 'j6jNa2wzEk', 'Tina', 'Shoma'),
(16, 'veronicadar16@gmail.com', 'VMDhuScMJs', 'Alla', 'Fan'),
(17, 'veronicadar17@gmail.com', '9DwdiB7V0m', 'Zohar', 'Lavin'),
(18, 'veronicadar18@gmail.com', 'QNwfcQiGZO', 'Sivan', 'Sole');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
