-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 10-Mar-2022 às 03:42
-- Versão do servidor: 10.4.22-MariaDB
-- versão do PHP: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `dev3n201`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tarefa`
--

CREATE TABLE `tarefa` (
  `id` int(11) NOT NULL,
  `nome` varchar(60) NOT NULL,
  `dataInicio` date NOT NULL,
  `status` varchar(10) NOT NULL,
  `emailUsuario` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tarefa`
--

INSERT INTO `tarefa` (`id`, `nome`, `dataInicio`, `status`, `emailUsuario`) VALUES
(20, 'Teste', '2022-03-08', 'Aberta', 'guga10machado@hotmail.com'),
(30, 'Teste', '2022-03-03', 'Aberta', 'guga10machado@hotmail.com');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `tarefa`
--
ALTER TABLE `tarefa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fkUsuarioTarefa` (`emailUsuario`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tarefa`
--
ALTER TABLE `tarefa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `tarefa`
--
ALTER TABLE `tarefa`
  ADD CONSTRAINT `fkUsuarioTarefa` FOREIGN KEY (`emailUsuario`) REFERENCES `usuario` (`email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
