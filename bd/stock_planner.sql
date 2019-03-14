-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 14-Mar-2019 às 21:08
-- Versão do servidor: 10.1.34-MariaDB
-- PHP Version: 7.2.8

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
-- Estrutura da tabela `categoria`
--

CREATE TABLE `categoria` (
  `id` int(6) NOT NULL,
  `nome` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `categoria`
--

INSERT INTO `categoria` (`id`, `nome`) VALUES
(1, 'Resistor'),
(2, 'teste');

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

CREATE TABLE `produtos` (
  `nome` varchar(100) NOT NULL,
  `descricao` text,
  `identificacao` varchar(50) NOT NULL,
  `catmat` int(6) NOT NULL,
  `categoria` int(6) DEFAULT NULL,
  `posicao` varchar(3) NOT NULL,
  `estoque_ideal` int(6) NOT NULL,
  `quantidade` int(6) NOT NULL,
  `id` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`nome`, `descricao`, `identificacao`, `catmat`, `categoria`, `posicao`, `estoque_ideal`, `quantidade`, `id`) VALUES
('Resistor 330ohm', 'Um resistor legal', '87822', 111111, 1, '1A', 100, 2, 1),
('Resistor 2', 'adasd', 'dasdasds', 111, 1, '1A', 200, 10, 2),
('TEste', 'ASDASAS', 'dasdsa', 55, 1, '1A', 55, 55, 3),
('TEste', 'ASDASAS', 'dasdsa', 55, 1, '1A', 55, 55, 4),
('TEste', 'ASDASAS', 'dasdsa', 55, 1, '1A', 55, 55, 5),
('Natasha', 'asdasdas', '1a', 555, 1, '1a', 55, 55, 6),
('sdc', '534535', '354534', 35, 45345, '345', 3454, 345, 7),
('Rodrigo', 'dasdas', '12', 1212, 2122, '221', 2121, 1212, 8),
('Rodrigo2', 'sAasASa', 'asdsa', 564564, 65465465, '654', 4564, 6546, 9);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
