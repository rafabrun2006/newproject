-- phpMyAdmin SQL Dump
-- version 3.3.3
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tempo de Geração: Jun 09, 2013 as 06:47 PM
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
-- Estrutura da tabela `tb_despesa`
--

CREATE TABLE IF NOT EXISTS `tb_despesa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fornecedor_id` int(11) DEFAULT NULL,
  `usuario_id` int(11) DEFAULT NULL,
  `tipo_lancamento_id` int(11) DEFAULT NULL,
  `descricao` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `valor` double(8,2) NOT NULL,
  `data_despesa` date NOT NULL,
  `data_pagamento` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fornecedor_id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Extraindo dados da tabela `tb_despesa`
--

INSERT INTO `tb_despesa` (`id`, `fornecedor_id`, `usuario_id`, `tipo_lancamento_id`, `descricao`, `valor`, `data_despesa`, `data_pagamento`) VALUES
(1, 1, 1, 2, 'Outro gato', 2999.00, '2012-01-12', '2012-01-12'),
(2, 1, 1, 2, 'Material de limpeza', 2999.00, '2012-12-01', '2012-12-01'),
(4, 1, 1, 2, 'Pagamento de bebidas', 4.88, '2012-01-12', '2012-01-12');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_fornecedor`
--

CREATE TABLE IF NOT EXISTS `tb_fornecedor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `descricao` varchar(250) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `data_cadastro` date NOT NULL,
  `cnpj` int(11) DEFAULT NULL,
  `telefone` int(11) DEFAULT NULL,
  `email` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `endereco` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `cidade` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Extraindo dados da tabela `tb_fornecedor`
--

INSERT INTO `tb_fornecedor` (`id`, `nome`, `descricao`, `data_cadastro`, `cnpj`, `telefone`, `email`, `endereco`, `cidade`) VALUES
(1, 'JoÃ£o Jabae', 'Vendas do dia', '2012-12-31', 99999, 88888, 'outro@email.com', 'Quadra 10', 'Santa Maria'),
(4, 'James Bond', 'Material', '2013-09-06', 99999, 88888, 'email@gmail.com', 'Seu endereÃ§o mudou', 'Santa Maria');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_receita`
--

CREATE TABLE IF NOT EXISTS `tb_receita` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `valor` double NOT NULL,
  `data` date NOT NULL,
  `usuario_id` int(11) DEFAULT NULL,
  `tipo_lancamento_id` int(11) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Extraindo dados da tabela `tb_receita`
--

INSERT INTO `tb_receita` (`id`, `descricao`, `valor`, `data`, `usuario_id`, `tipo_lancamento_id`) VALUES
(2, 'Vendas', 2999, '2013-08-06', 1, 1),
(3, 'Outro gato', 2998, '2013-08-08', 1, 1),
(5, 'Vendas do dia', 2999, '2013-08-06', 1, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_registro_lancamento`
--

CREATE TABLE IF NOT EXISTS `tb_registro_lancamento` (
  `id` int(11) NOT NULL,
  `lancamento_id` int(11) NOT NULL,
  `data_lancamento` date NOT NULL,
  `usuario_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `usuario_id` (`usuario_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_registro_lancamento`
--


-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_tipo_lancamento`
--

CREATE TABLE IF NOT EXISTS `tb_tipo_lancamento` (
  `id` int(11) NOT NULL,
  `nome_tipo` char(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_tipo_lancamento`
--


-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_usuario`
--

CREATE TABLE IF NOT EXISTS `tb_usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `senha` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nome` varchar(80) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cpf` varchar(14) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `tb_usuario`
--

INSERT INTO `tb_usuario` (`id`, `senha`, `nome`, `cpf`, `email`) VALUES
(1, 'asdf', 'rafabrun2006', '55555', 'rafabrun2006@gmail.com');

-- --------------------------------------------------------

--
-- Estrutura stand-in para visualizar `vw_despesa_fornecedor`
--
CREATE TABLE IF NOT EXISTS `vw_despesa_fornecedor` (
`id` int(11)
,`descricao` varchar(150)
,`descricao_fornecedor` varchar(250)
,`valor` double(8,2)
,`data_despesa` date
,`fornecedor_id` int(11)
,`data_pagamento` date
,`nome` varchar(200)
,`email` varchar(200)
,`data_cadastro` date
,`cnpj` int(11)
,`telefone` int(11)
,`endereco` varchar(100)
,`cidade` varchar(200)
);
-- --------------------------------------------------------

--
-- Estrutura para visualizar `vw_despesa_fornecedor`
--
DROP TABLE IF EXISTS `vw_despesa_fornecedor`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_despesa_fornecedor` AS select `d`.`id` AS `id`,`d`.`descricao` AS `descricao`,`f`.`descricao` AS `descricao_fornecedor`,`d`.`valor` AS `valor`,`d`.`data_despesa` AS `data_despesa`,`d`.`fornecedor_id` AS `fornecedor_id`,`d`.`data_pagamento` AS `data_pagamento`,`f`.`nome` AS `nome`,`f`.`email` AS `email`,`f`.`data_cadastro` AS `data_cadastro`,`f`.`cnpj` AS `cnpj`,`f`.`telefone` AS `telefone`,`f`.`endereco` AS `endereco`,`f`.`cidade` AS `cidade` from (`tb_despesa` `d` join `tb_fornecedor` `f` on((`d`.`fornecedor_id` = `f`.`id`)));
