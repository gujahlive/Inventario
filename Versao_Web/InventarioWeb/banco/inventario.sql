-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 22-Maio-2018 às 17:53
-- Versão do servidor: 10.1.31-MariaDB
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventario`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `equipamentos`
--

CREATE TABLE `equipamentos` (
  `id_equipamento` int(5) NOT NULL,
  `fk_funcionario` int(5) NOT NULL,
  `nome` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `marca` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `modelo` varchar(50) COLLATE utf8_bin NOT NULL,
  `num_serie` varchar(50) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcionario`
--

CREATE TABLE `funcionario` (
  `id_funcionario` int(5) NOT NULL,
  `nome_funcionario` varchar(30) DEFAULT NULL,
  `cpf` varchar(16) DEFAULT NULL,
  `cargo` varchar(36) DEFAULT NULL,
  `setor` varchar(36) DEFAULT NULL,
  `telefone_residencial` varchar(20) DEFAULT NULL,
  `telefone_celular` varchar(20) DEFAULT NULL,
  `data_nascimento` date DEFAULT NULL,
  `fk_endereco` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(5) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `senha` varchar(100) DEFAULT NULL,
  `foto` varchar(50) DEFAULT '../../imagens/padrao.png',
  `token` varchar(50) DEFAULT NULL,
  `tipo_usuario` enum('padrao','administrador') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `email`, `senha`, `foto`, `token`, `tipo_usuario`) VALUES
(1, 'gugas@gmail.com', '$2a$06$YUYzJirqcV0WEcDZ9q6nV.cluVYqXFxy.AdO4pocgzX1XK/S3w6mW', '../../imagens/padrao.png', NULL, 'administrador');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
