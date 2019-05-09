-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 09-Maio-2019 às 18:00
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
(3, 'profit'),
(5, 'mouse vermelho'),
(6, '');

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
('Rodrigo5 Alguma coisa', '77', '54', 3, '55', 55, 1),
('resistor', '44', '44x', 3, '44', 44, 4),
('teste', 'mouse vermelho', 'aaa48484844', 1, '96', 2, 7),
('teste77', 'mouse vermelho', 'aaa48484844', 1, '96', 2, 8),
('teste2', 'mouse vermelho', '123', 1, '96', 2, 9),
('Ooo', '55', '55', 3, '55', 55, 12),
('lapis', 'mouse vermelho', '123', 1, '96', 2, 22),
('livro', 'mouse vermelho', '123', 1, '96', 2, 23),
('Rodrigo', '55', '55', 6, '55', 55, 24),
(' Lais', ' 66', '66', 6, '66', 66, 26),
('Nadia', '66', '66', 6, '66', 66, 27),
(' Nadia', ' 66', '66', 6, '66', 66, 28),
('lu', '44', '444', 6, '44', 44, 29),
(' lu', ' 33', '33', 6, '33', 33, 30),
(' lu', ' 11', '11', 6, '11', 11, 31),
('lu', '11', '11', 6, '11', 11, 32),
('juju', '44', '44', 6, '44', 44, 33),
(' juju', ' 88', '88', 6, '88', 88, 34),
(' juju', ' 99', '99', 6, '99', 99, 35),
('gaga', '77', '77', 6, '77', 77, 36),
(' gaga', ' 33', '33', 6, '33', 33, 37),
('gaga', ' 88', '88', 6, '88', 88, 38),
('ro', '88', '88', 6, '88', 88, 39),
(' ro', ' 7', '77', 6, '77', 7, 40),
('ro', '99', '99', 6, '99', 99, 41),
('lady', '4477', '77', 6, '77', 77, 42),
(' lady', ' 66', '666', 6, '66', 66, 43),
('gg', ' 88', '66', 6, '88 ', 88, 44),
(' gg', ' 55', '55', 6, '55', 55, 45),
('op', '8855', '55', 6, '55', 55, 46),
(' op', ' 55', '55', 6, '55', 55, 47),
('yy', 'gaga', '11', 1, '55', 45, 48),
('yyy', 'gaga', '11', 1, '55', 45, 49),
('hhgfgh', 'gaga', '11', 1, '55', 45, 50),
('teresa', '11', '11', 6, '11', 11, 51),
(' teresa', ' 11', '11', 6, '11', 11, 52),
(' tereza', ' 55', '55', 6, '55', 55, 53),
('opp', '55', '55', 6, '55', 55, 54),
(' opp', ' 44', '44', 6, '44', 44, 55),
('hhgfgha', 'gaga', '11', 1, '55', 45, 56),
('ra', '66', '66', 6, '66', 66, 57),
(' ra', ' 55', '55', 6, '55', 55, 58),
('haha', '7', '7', 6, '7', 7, 59),
('nana', ' 6', '6', 6, '6', 6, 60),
(' nana', ' 44', '44', 6, '44', 44, 61),
(' rere', ' 77', '77', 6, '77', 77, 62),
('tata', ' 11', '11', 6, '11', 11, 63),
(' tata', ' 77', '77', 6, '77', 77, 64),
(' lolo', ' 7', '7', 6, '7', 7, 65),
('fafa', '88', '88', 6, '88', 88, 66),
(' fafa', ' 88', '88', 6, '88', 88, 67),
('resistor 5k', '11', '144', 6, '11', 11, 68),
(' resistor 5k', ' 11', '11', 6, '11', 11, 69),
('sai', '77', '77', 6, '77', 77, 70),
('caca', '44', '44', 6, '44', 44, 71),
('asas', '44', '44', 6, '44', 4, 76),
('cade', '88', '88', 6, '88', 8, 78),
('xuxa', '9', '9', 6, '9', 9, 79),
('toto', '666', '66', 6, '666', 666, 80),
('hahahahahha', '7', '77', 6, '77', 7, 81),
(' hahahahahha', ' 44', '44', 6, '44', 4, 82),
('riri', '66', '66', 6, '66', 66, 83),
('lalala', '7', '7', 6, '7', 7, 84),
(' lalala', ' 77', '77', 6, '77', 77, 85),
('dasdasdasdas', '5', '55', 6, '5', 5, 86),
('Nadia s2', '55', '55', 6, '55', 55, 87);

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
('2019S1', 1, 57, 95),
('2019S1', 4, 555555, 11111),
('2019S1', 7, 2, 456),
('2019S1', 8, 2, 456),
('2019S1', 9, 2, 456),
('2019S2', 22, 2, 456),
('2019S2', 23, 2, 456),
('2019S2', 24, 55, 55),
('2019S2', 26, 66, 66),
('2019S2', 27, 6666, 66),
('2019S2', 28, 66, 66),
('2019S2', 29, 44, 44),
('2019S2', 30, 33, 33),
('2019S2', 31, 11, 11),
('2019S2', 32, 11, 11),
('2019S2', 33, 44, 44),
('2019S2', 34, 88, 88),
('2019S2', 35, 99, 99),
('2019S2', 36, 77, 77),
('2019S2', 37, 33, 33),
('2019S2', 38, 88, 88),
('2019S2', 39, 88, 88),
('2019S2', 40, 77, 77),
('2019S2', 41, 999, 88),
('2019S2', 42, 77, 77),
('2019S2', 43, 66, 66),
('2019S2', 44, 88, 66),
('2019S2', 45, 55, 55),
('2019S2', 46, 55, 55),
('2019S2', 47, 55, 55),
('2019S2', 48, 55, 23),
('2019S2', 49, 55, 23),
('2019S2', 50, 55, 23),
('2019S2', 51, 11, 11),
('2019S2', 52, 11, 11),
('2019S2', 53, 55, 55),
('2019S2', 54, 55, 55),
('2019S2', 55, 44, 444),
('2019S2', 56, 55, 23),
('2019S2', 57, 66, 66),
('2019S2', 58, 55, 55),
('2019S2', 59, 7, 7),
('2019S2', 60, 6, 6),
('2019S2', 61, 44, 44),
('2019S2', 62, 77, 77),
('2019S2', 63, 11, 11),
('2019S2', 64, 77, 77),
('2019S2', 65, 7, 7),
('2019S2', 66, 88, 88),
('2019S2', 67, 88, 88),
('2019S2', 68, 11, 141),
('2019S2', 69, 11, 11),
('2019S2', 70, 77, 77),
('2019S2', 71, 44, 44),
('2019S2', 76, 7, 44),
('2019S2', 78, 8, 88),
('2019S2', 79, 9, 9),
('2019S2', 80, 666, 66),
('2019S2', 81, 7, 77),
('2019S2', 82, 4, 44),
('2019S2', 83, 66, 66),
('2019S2', 84, 7, 77),
('2019S2', 85, 77, 77),
('2019S2', 86, 55, 55),
('2019S2', 87, 55, 55);

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
('2019S1', 2019, 1),
('2019S2', 2019, 2),
('2020S1', 2020, 1);

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
  ADD PRIMARY KEY (`id_semestre`,`id_produto`),
  ADD KEY `excluir_produto` (`id_produto`);

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
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `produtos_semestre`
--
ALTER TABLE `produtos_semestre`
  ADD CONSTRAINT `excluir_produto` FOREIGN KEY (`id_produto`) REFERENCES `produtos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `excluir_semestre` FOREIGN KEY (`id_semestre`) REFERENCES `semestre` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
