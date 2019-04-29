-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
<<<<<<< HEAD
-- Generation Time: 29-Abr-2019 às 18:24
=======
-- Generation Time: 29-Abr-2019 às 18:34
>>>>>>> master
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
(2, 'teste'),
(3, 'profit');

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

CREATE TABLE `produtos` (
  `nome` varchar(100) NOT NULL,
  `descricao` text,
  `identificacao` varchar(50) NOT NULL,
  `categoria` int(6) DEFAULT NULL,
  `posicao` varchar(3) NOT NULL,
  `estoque_ideal` int(6) NOT NULL,
  `id` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`nome`, `descricao`, `identificacao`, `categoria`, `posicao`, `estoque_ideal`, `id`) VALUES
('Rodrigo5', '77', '55', 3, '55', 55, 1),
('gabi', '55', '55', 3, '55', 55, 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos_semestre`
--

CREATE TABLE `produtos_semestre` (
  `id_semestre` varchar(6) NOT NULL,
  `id_produto` int(6) NOT NULL,
  `quantidade` int(6) NOT NULL,
  `catmat` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `produtos_semestre`
--

INSERT INTO `produtos_semestre` (`id_semestre`, `id_produto`, `quantidade`, `catmat`) VALUES
('1S2019', 1, 77, 55),
('1S2019', 2, 55, 55);

-- --------------------------------------------------------

--
-- Estrutura da tabela `semestre`
--

CREATE TABLE `semestre` (
  `id` varchar(6) NOT NULL,
  `ano` int(4) NOT NULL,
  `numero` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `semestre`
--

INSERT INTO `semestre` (`id`, `ano`, `numero`) VALUES
('1S2019', 2019, 1),
('2S2019', 2019, 2);

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
-- Indexes for table `produtos_semestre`
--
ALTER TABLE `produtos_semestre`
<<<<<<< HEAD
  ADD PRIMARY KEY (`id_semestre`,`id_produto`);
=======
  ADD PRIMARY KEY (`id_semestre`,`id_produto`),
  ADD KEY `excluir_produto` (`id_produto`);
>>>>>>> master

--
-- Indexes for table `semestre`
--
ALTER TABLE `semestre`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
<<<<<<< HEAD
=======

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `produtos_semestre`
--
ALTER TABLE `produtos_semestre`
  ADD CONSTRAINT `excluir_produto` FOREIGN KEY (`id_produto`) REFERENCES `produtos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `excluir_semestre` FOREIGN KEY (`id_semestre`) REFERENCES `semestre` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
>>>>>>> master
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
