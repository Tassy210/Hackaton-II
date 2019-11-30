-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 30-Nov-2019 às 02:53
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
-- Database: `bakof`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `administrador`
--

CREATE TABLE `administrador` (
  `cpf` int(9) NOT NULL,
  `login` varchar(500) NOT NULL,
  `senha` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `carga`
--

CREATE TABLE `carga` (
  `idCarga` int(11) NOT NULL,
  `condicao` int(11) DEFAULT NULL,
  `numeroNota` int(11) DEFAULT NULL,
  `destino` varchar(100) DEFAULT NULL,
  `localSaida` varchar(100) DEFAULT NULL,
  `foto` varchar(50) DEFAULT NULL,
  `dt_cadastro` date DEFAULT NULL,
  `dt_saida` date DEFAULT NULL,
  `dt_chegada` date DEFAULT NULL,
  `id` int(11) NOT NULL,
  `d_percorrida` varchar(100) DEFAULT NULL,
  `d_tracada` varchar(100) DEFAULT NULL,
  `estatus` varchar(100) DEFAULT NULL,
  `descricao` varchar(300) DEFAULT NULL,
  `destinatario` varchar(100) DEFAULT NULL,
  `nomeProduto` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `comprovante`
--

CREATE TABLE `comprovante` (
  `idComprovante` int(11) NOT NULL,
  `idCarga` int(11) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcionario`
--

CREATE TABLE `funcionario` (
  `cpf` int(9) NOT NULL,
  `login` varchar(500) NOT NULL,
  `senha` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `motorista`
--

CREATE TABLE `motorista` (
  `id` int(32) NOT NULL,
  `nome` varchar(500) NOT NULL,
  `cnpj` int(9) NOT NULL,
  `placa` varchar(500) NOT NULL,
  `email` varchar(500) NOT NULL,
  `contabancaria` varchar(500) NOT NULL,
  `historico` varchar(500) NOT NULL,
  `senha` varchar(500) NOT NULL,
  `cpf` int(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`cpf`);

--
-- Indexes for table `carga`
--
ALTER TABLE `carga`
  ADD PRIMARY KEY (`idCarga`);

--
-- Indexes for table `comprovante`
--
ALTER TABLE `comprovante`
  ADD PRIMARY KEY (`idComprovante`),
  ADD KEY `idCarga` (`idCarga`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `funcionario`
--
ALTER TABLE `funcionario`
  ADD PRIMARY KEY (`cpf`);

--
-- Indexes for table `motorista`
--
ALTER TABLE `motorista`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ixMotCPF` (`cpf`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `administrador`
--
ALTER TABLE `administrador`
  MODIFY `cpf` int(9) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `carga`
--
ALTER TABLE `carga`
  MODIFY `idCarga` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `comprovante`
--
ALTER TABLE `comprovante`
  MODIFY `idComprovante` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `funcionario`
--
ALTER TABLE `funcionario`
  MODIFY `cpf` int(9) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `motorista`
--
ALTER TABLE `motorista`
  MODIFY `id` int(32) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `comprovante`
--
ALTER TABLE `comprovante`
  ADD CONSTRAINT `comprovante_ibfk_1` FOREIGN KEY (`idCarga`) REFERENCES `carga` (`idCarga`),
  ADD CONSTRAINT `comprovante_ibfk_2` FOREIGN KEY (`id`) REFERENCES `motorista` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
