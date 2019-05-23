-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 23, 2019 at 06:30 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `stock_planner`
--

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
  `ID` int(10) UNSIGNED ZEROFILL NOT NULL,
  `username` varchar(30) NOT NULL,
  `senha` varchar(40) NOT NULL,
  `nome` varchar(80) NOT NULL,
  `email` varchar(60) NOT NULL,
  `dataUltimoAcesso` datetime NOT NULL,
  `dataCadastro` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`ID`, `username`, `senha`, `nome`, `email`, `dataUltimoAcesso`, `dataCadastro`) VALUES
(0000000001, 'lais', '123456', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(0000000002, 'lais', '123456', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(0000000003, 'gih', '12345', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(0000000004, 'gigi@gmail.com', '71b3b26aaa319e0cdf6fdb8429c112b0', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(0000000005, 'lala@gmail.com', 'bba321cd21fd697cc21b5beaab2e0193', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(0000000006, 'lala@gmail.com', 'd41d8cd98f00b204e9800998ecf8427e', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(0000000007, 'lala@gmail.com', 'd41d8cd98f00b204e9800998ecf8427e', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(0000000008, 'lalal', '789', 'lais', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(0000000009, 'lalal', '789', 'lais', '', '2019-05-20 16:02:15', '2019-05-20 16:02:15'),
(0000000010, 'gi', '456123', 'giovanna', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(0000000011, 'gi', '456123', 'giovanna', '', '2019-05-20 16:06:10', '2019-05-20 16:06:10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `ID` int(10) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
