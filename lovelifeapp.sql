-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 08, 2022 at 10:47 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lovelifeapp`
--

-- --------------------------------------------------------

--
-- Table structure for table `login_logs`
--

CREATE TABLE `login_logs` (
  `LOGIN_ID` int(11) NOT NULL,
  `LOGIN_IP` varchar(100) NOT NULL,
  `LOGIN_TIME` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `USER_ID` varchar(100) NOT NULL,
  `USER_FNAME` varchar(100) NOT NULL,
  `USER_LNAME` varchar(100) DEFAULT NULL,
  `USER_PWD` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`USER_ID`, `USER_FNAME`, `USER_LNAME`, `USER_PWD`) VALUES
('SHAFIQA@GMAIL.COM', 'SHAFIQA', 'RANI', '$2y$10$D0eA1T9jKLHm.lNyiTCEs.sDb3LKZ0GnKDL2S7bsvNT49KSTXzoYm'),
('nurul@gmail.com', 'nurul', 'shafiqa', '$2y$10$eVp5iva80K3x/XKeKvhNfu/eQUB5LPgyxgpFzZ0e3aeuIg0a2QoSm'),
('shafiqarani@gmail.com', 'shafiqa', 'rani', '$2y$10$Z1AHF83uZo84imto0y0OaOIfbby2v7xEcpM5GGBWoHAaibWMe1JFC'),
('eclipse304@gmail.com', 'eclipse', 'cat304', '$2y$10$orELc81KysB4HBN6uUrFTOc1IunZQ67v9ZGTSyq1yHXTo/ZC45F2W');

-- --------------------------------------------------------

--
-- Table structure for table `user_data`
--

CREATE TABLE `user_data` (
  `USER_ID` varchar(100) CHARACTER SET latin1 NOT NULL,
  `GENDER` varchar(10) CHARACTER SET latin1 NOT NULL,
  `WEIGHT` float NOT NULL,
  `AGE` int(11) NOT NULL,
  `HEIGHT` float NOT NULL,
  `ACTIVITY` varchar(100) CHARACTER SET latin1 NOT NULL,
  `LEVEL_PA` varchar(100) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

