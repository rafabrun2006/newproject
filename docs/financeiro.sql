-- phpMyAdmin SQL Dump
-- version 3.3.3
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tempo de Geração: Mai 21, 2013 as 10:26 PM
-- Versão do Servidor: 5.1.50
-- Versão do PHP: 5.3.9-ZS5.6.0

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de Dados: `financeiro`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `despesa`
--

CREATE TABLE IF NOT EXISTS `despesa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `valor` double(8,2) NOT NULL,
  `data_despesa` date NOT NULL,
  `fornecedor_id` int(11) DEFAULT NULL,
  `data_pagamento` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fornecedor_id` (`fornecedor_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=47 ;

--
-- Extraindo dados da tabela `despesa`
--

INSERT INTO `despesa` (`id`, `descricao`, `valor`, `data_despesa`, `fornecedor_id`, `data_pagamento`) VALUES
(34, 'Compra pe', 20.00, '2012-02-03', 5, '0000-00-00'),
(36, 'Pagamento Livro Joomla', 40.00, '2012-02-03', 5, '0000-00-00'),
(43, 'Cobran', 11.00, '2012-02-08', 5, '0000-00-00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `fornecedor`
--

CREATE TABLE IF NOT EXISTS `fornecedor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `descricao` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `data_cadastro` date NOT NULL,
  `cnpj` int(11) DEFAULT NULL,
  `telefone` int(11) DEFAULT NULL,
  `email` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `endereco` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `cidade_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Extraindo dados da tabela `fornecedor`
--

INSERT INTO `fornecedor` (`id`, `nome`, `descricao`, `data_cadastro`, `cnpj`, `telefone`, `email`, `endereco`, `cidade_id`) VALUES
(5, 'Owen', 'Informatica', '2012-05-04', 0, 99031655, 'atendimento@owen.com.br', 'GO', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `receita`
--

CREATE TABLE IF NOT EXISTS `receita` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `valor` double NOT NULL,
  `data` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=59 ;

--
-- Extraindo dados da tabela `receita`
--

INSERT INTO `receita` (`id`, `descricao`, `valor`, `data`) VALUES
(55, 'Salario do Mes', 500, '2012-04-05'),
(58, 'vendas do dia', 7, '2012-04-05');

-- --------------------------------------------------------

--
-- Estrutura da tabela `registro_lancamento`
--

CREATE TABLE IF NOT EXISTS `registro_lancamento` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lancamento_id` int(11) NOT NULL,
  `data_lancamento` date NOT NULL,
  `usuario_id` int(11) NOT NULL,
  UNIQUE KEY `id` (`id`),
  KEY `usuario_id` (`usuario_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Extraindo dados da tabela `registro_lancamento`
--


-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `senha` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `nome` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `cpf` int(15) NOT NULL,
  `email` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id`, `senha`, `nome`, `cpf`, `email`) VALUES
(3, 'ranelore', '', 0, 0),
(5, 'ranelore', '', 0, 0);

-- --------------------------------------------------------

--
-- Estrutura stand-in para visualizar `vw_despesa_fornecedor`
--
CREATE TABLE IF NOT EXISTS `vw_despesa_fornecedor` (
`id` int(11)
,`descricao` varchar(150)
,`valor` double(8,2)
,`data_despesa` date
,`fornecedor_id` int(11)
,`data_pagamento` date
,`nome` varchar(200)
,`email` varchar(200)
,`fornecedor_descricao` varchar(250)
,`data_cadastro` date
,`cnpj` int(11)
,`telefone` int(11)
,`endereco` varchar(100)
,`cidade_id` int(11)
);
-- --------------------------------------------------------

--
-- Estrutura para visualizar `vw_despesa_fornecedor`
--
DROP TABLE IF EXISTS `vw_despesa_fornecedor`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_despesa_fornecedor` AS select `d`.`id` AS `id`,`d`.`descricao` AS `descricao`,`d`.`valor` AS `valor`,`d`.`data_despesa` AS `data_despesa`,`d`.`fornecedor_id` AS `fornecedor_id`,`d`.`data_pagamento` AS `data_pagamento`,`f`.`nome` AS `nome`,`f`.`email` AS `email`,`f`.`descricao` AS `fornecedor_descricao`,`f`.`data_cadastro` AS `data_cadastro`,`f`.`cnpj` AS `cnpj`,`f`.`telefone` AS `telefone`,`f`.`endereco` AS `endereco`,`f`.`cidade_id` AS `cidade_id` from (`despesa` `d` join `fornecedor` `f` on((`d`.`fornecedor_id` = `f`.`id`)));

--
-- Restrições para as tabelas dumpadas
--

--
-- Restrições para a tabela `despesa`
--
ALTER TABLE `despesa`
  ADD CONSTRAINT `despesa_ibfk_1` FOREIGN KEY (`fornecedor_id`) REFERENCES `fornecedor` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restrições para a tabela `registro_lancamento`
--
ALTER TABLE `registro_lancamento`
  ADD CONSTRAINT `registro_lancamento_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `registro_lancamento` (`usuario_id`);
