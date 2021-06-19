-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 19, 2021 at 10:47 PM
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
('baki@du.ac', 'ec72fe3ed086cc8af1b493e323da557e', NULL, NULL, '2', NULL, 0, NULL),
('mimma@du.ac', '3cf90e68437e4b53d24e8e09b9941950', NULL, NULL, '5', NULL, 0, NULL),
('sakib@du.ac', '28e9ae3ae3f544edf077eae414725fa2', 'Sakib', '19-20', '8', 'PGD', 0, NULL),
('naima@du.ac', '680907fe81ee50cca424604ce8f8b111', NULL, NULL, NULL, '27', 0, NULL),
('ahmed@du.ac', '9193ce3b31332b03f7d8af056c692b84', NULL, NULL, NULL, '39', 0, NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
