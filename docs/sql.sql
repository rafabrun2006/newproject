-- phpMyAdmin SQL Dump
-- version 3.4.9
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tempo de Geração: 05/04/2012 às 11h48min
-- Versão do Servidor: 5.5.8
-- Versão do PHP: 5.3.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Banco de Dados: `brunoti_padoliv`
--
CREATE DATABASE `brunoti_padoliv` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `brunoti_padoliv`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `despesas`
--

CREATE TABLE IF NOT EXISTS `despesas` (
  `cod` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `valor` double(8,2) NOT NULL,
  `data` date NOT NULL,
  `fornecedor` int(11) DEFAULT NULL,
  `cod_user` int(11) NOT NULL,
  PRIMARY KEY (`cod`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=47 ;

--
-- Extraindo dados da tabela `despesas`
--

INSERT INTO `despesas` (`cod`, `nome`, `valor`, `data`, `fornecedor`, `cod_user`) VALUES
(34, 'Compra peça do carro', 20.00, '2012-02-03', 0, 3),
(36, 'Pagamento Livro Joomla', 40.00, '2012-02-03', 0, 3),
(38, 'Compra de Oleo para Moto', 13.00, '2012-02-03', 0, 3),
(43, 'Cobrança de juros do banco', 11.00, '2012-02-08', 0, 3),
(46, 'vendas do dia', 7.00, '2012-04-05', 0, 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `fornecedores`
--

CREATE TABLE IF NOT EXISTS `fornecedores` (
  `cod` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `descricao` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `data_cadastro` date NOT NULL,
  `cnpj` int(11) DEFAULT NULL,
  `telefone` int(11) DEFAULT NULL,
  `email` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `uf` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `cod_user` int(11) NOT NULL,
  PRIMARY KEY (`cod`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Extraindo dados da tabela `fornecedores`
--

INSERT INTO `fornecedores` (`cod`, `nome`, `descricao`, `data_cadastro`, `cnpj`, `telefone`, `email`, `uf`, `cod_user`) VALUES
(5, 'Owen', 'Informatica', '2012-05-04', 0, 99031655, 'atendimento@owen.com.br', 'GO', 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `receitas`
--

CREATE TABLE IF NOT EXISTS `receitas` (
  `cod` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `valor` double NOT NULL,
  `data` date NOT NULL,
  `cod_user` int(11) NOT NULL,
  PRIMARY KEY (`cod`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=59 ;

--
-- Extraindo dados da tabela `receitas`
--

INSERT INTO `receitas` (`cod`, `nome`, `valor`, `data`, `cod_user`) VALUES
(55, 'Salario do Mes', 500, '2012-04-05', 3),
(58, 'vendas do dia', 7, '2012-04-05', 5);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `cod` int(11) NOT NULL AUTO_INCREMENT,
  `nome_usuario` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `senha` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`cod`,`nome_usuario`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`cod`, `nome_usuario`, `senha`) VALUES
(5, 'rafael', 'ranelore'),
(3, 'bruno', 'ranelore');
