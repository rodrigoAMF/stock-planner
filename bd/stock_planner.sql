-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 03-Jun-2019 às 18:30
-- Versão do servidor: 10.1.36-MariaDB
-- versão do PHP: 7.2.11

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
('2020S1', 2020, 1),
('2020S2', 2020, 2),
('2021S1', 2021, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `ID` int(10) UNSIGNED NOT NULL,
  `username` varchar(30) NOT NULL,
  `senha` varchar(40) NOT NULL,
  `nome` varchar(80) NOT NULL,
  `email` varchar(60) NOT NULL,
  `dataUltimoAcesso` datetime NOT NULL,
  `dataCadastro` datetime NOT NULL,
  `tipoUsuario` int(2) NOT NULL DEFAULT '2'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`ID`, `username`, `senha`, `nome`, `email`, `dataUltimoAcesso`, `dataCadastro`, `tipoUsuario`) VALUES
(1, 'rodrigoamf', '202cb962ac59075b964b07152d234b70', 'Rodrigo Araújo Marinho Franco', 'rodrigoamf@outlook.com', '2019-05-27 14:01:30', '2019-05-22 12:00:00', 1),
(2, 'laismr', 'bb03e43ffe34eeb242a2ee4a4f125e56', 'Laís Magalhães', 'lais.magalhaes13@gmail.com', '2019-05-27 13:42:45', '2019-05-27 13:00:00', 2),
(3, 'nadianogues', '202cb962ac59075b964b07152d234b70', 'Nadia Nogues de Almeida', 'nadianogues19@gmail.com', '2019-05-27 13:42:45', '2019-05-27 13:00:00', 2),
(4, 'gabii6431', '202cb962ac59075b964b07152d234b70', 'Gabriela dos Reis Garcia', 'gabii6431@gmail.com', '2019-05-30 15:43:03', '2019-05-27 13:00:00', 1),
(5, 'luziane', '202cb962ac59075b964b07152d234b70', 'luziane', 'freitas.lu@outlook.com', '2019-05-27 13:42:45', '2019-05-27 13:00:00', 2),
(6, 'naat-alves', '202cb962ac59075b964b07152d234b70', 'Natasha', 'nathy-ac@hotmail.com', '2019-05-27 15:41:12', '2019-05-27 13:00:00', 2),
(7, 'matheusmelo', '202cb962ac59075b964b07152d234b70', 'Matheus Augusto Melo dos Santos Franco', 'matheus.franco@alunos.ifsuldeminas.edu.br', '2019-05-30 15:38:38', '2019-05-27 13:00:00', 2),
(8, 'giovanna', '202cb962ac59075b964b07152d234b70', 'Giovanna Verola', 'giovanna.verola2016@gmail.com', '2019-05-27 13:42:45', '2019-05-27 13:00:00', 2);

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
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

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
