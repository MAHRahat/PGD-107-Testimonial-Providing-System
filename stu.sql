-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 05, 2021 at 07:33 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `stu`
--

CREATE TABLE `stu` (
  `email` varchar(30) NOT NULL,
  `pass` varchar(64) NOT NULL,
  `name` varchar(30) DEFAULT NULL,
  `session` varchar(10) DEFAULT NULL,
  `roll` varchar(10) DEFAULT NULL,
  `degree` varchar(10) DEFAULT NULL,
  `status` tinyint(4) DEFAULT 0,
  `delivery` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stu`
--

INSERT INTO `stu` (`email`, `pass`, `name`, `session`, `roll`, `degree`, `status`, `delivery`) VALUES
('fountaein@yandex.com', '912ec803b2ce49e4a541068d495ab570', 'Rahat', '2019-20', '2003', 'PGD', 0, NULL),
('admin@iit.du.ac.bd', '21232f297a57a5a743894a0e4a801fc3', 'admin', NULL, NULL, NULL, 0, NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
