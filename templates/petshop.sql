-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Máquina: localhost
-- Data de Criação: 15-Maio-2019 às 00:49
-- Versão do servidor: 5.6.12-log
-- versão do PHP: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de Dados: `petshop`
--
CREATE DATABASE IF NOT EXISTS `petshop` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `petshop`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `perfil_usuario`
--

CREATE TABLE IF NOT EXISTS `perfil_usuario` (
  `cd_perfil` int(11) NOT NULL AUTO_INCREMENT,
  `nm_perfil` varchar(50) NOT NULL,
  `ds_cor` varchar(20) NOT NULL,
  `ds_imagem` varchar(100) NOT NULL,
  PRIMARY KEY (`cd_perfil`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Extraindo dados da tabela `perfil_usuario`
--

INSERT INTO `perfil_usuario` (`cd_perfil`, `nm_perfil`, `ds_cor`, `ds_imagem`) VALUES
(1, 'Administrador', 'danger', ''),
(2, 'cliente', 'success', ''),
(3, 'atendente', 'info', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pets`
--

CREATE TABLE IF NOT EXISTS `pets` (
  `cd_pet` int(11) NOT NULL AUTO_INCREMENT,
  `cd_usuario` int(11) NOT NULL,
  `nm_pet` varchar(100) NOT NULL,
  `cd_raca_pet` int(11) NOT NULL,
  `cd_tipo_shampoo` int(11) NOT NULL,
  `ds_info` text NOT NULL,
  PRIMARY KEY (`cd_pet`),
  KEY `cd_tipo_shampoo` (`cd_tipo_shampoo`),
  KEY `cd_raca_pet` (`cd_raca_pet`),
  KEY `cd_usuario` (`cd_usuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Extraindo dados da tabela `pets`
--

INSERT INTO `pets` (`cd_pet`, `cd_usuario`, `nm_pet`, `cd_raca_pet`, `cd_tipo_shampoo`, `ds_info`) VALUES
(1, 1, 'Totó', 1, 1, 'Informações do pet'),
(2, 54, '54y54', 2, 1, '654645646'),
(3, 54, '54y54', 2, 1, '654645646'),
(4, 54, 'gdfgdfgd', 1, 1, 'gdfgdfgdfgfd'),
(6, 54, 'Dogão', 1, 1, 'Dogão ');

-- --------------------------------------------------------

--
-- Estrutura da tabela `raca_pet`
--

CREATE TABLE IF NOT EXISTS `raca_pet` (
  `cd_raca_pet` int(11) NOT NULL AUTO_INCREMENT,
  `nm_raca_pet` varchar(100) NOT NULL,
  `cd_tipo_pet` int(11) NOT NULL,
  PRIMARY KEY (`cd_raca_pet`),
  KEY `cd_tipo_pet` (`cd_tipo_pet`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Extraindo dados da tabela `raca_pet`
--

INSERT INTO `raca_pet` (`cd_raca_pet`, `nm_raca_pet`, `cd_tipo_pet`) VALUES
(1, 'Bulldog', 1),
(2, 'Pug', 1),
(3, 'Siamês', 2),
(4, 'Normal', 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipo_pet`
--

CREATE TABLE IF NOT EXISTS `tipo_pet` (
  `cd_tipo_pet` int(11) NOT NULL AUTO_INCREMENT,
  `nm_tipo_pet` varchar(100) NOT NULL,
  PRIMARY KEY (`cd_tipo_pet`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `tipo_pet`
--

INSERT INTO `tipo_pet` (`cd_tipo_pet`, `nm_tipo_pet`) VALUES
(1, 'Cachorro'),
(2, 'Gato');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipo_shampoo_pet`
--

CREATE TABLE IF NOT EXISTS `tipo_shampoo_pet` (
  `cd_tipo_shampoo` int(11) NOT NULL AUTO_INCREMENT,
  `nm_tipo_shampoo` varchar(100) NOT NULL,
  PRIMARY KEY (`cd_tipo_shampoo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `tipo_shampoo_pet`
--

INSERT INTO `tipo_shampoo_pet` (`cd_tipo_shampoo`, `nm_tipo_shampoo`) VALUES
(1, 'Normal'),
(2, 'Sensitivo');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `cd_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `nm_usuario` varchar(100) NOT NULL,
  `cd_perfil` int(11) NOT NULL,
  `ds_email` varchar(100) NOT NULL,
  `ds_senha` varchar(200) NOT NULL,
  `fg_ativo` int(11) NOT NULL,
  `tp_sexo` enum('F','M','I') NOT NULL,
  `dt_nascimento` date NOT NULL,
  `fg_idoso` int(11) NOT NULL,
  `fg_vip` int(11) NOT NULL,
  `fg_nec_especial` int(11) NOT NULL,
  `ds_nec_especial` int(11) NOT NULL,
  `dt_cadastro` varchar(500) NOT NULL,
  `dt_alteracao_senha` datetime NOT NULL,
  PRIMARY KEY (`cd_usuario`),
  KEY `cd_perfil` (`cd_perfil`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=56 ;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`cd_usuario`, `nm_usuario`, `cd_perfil`, `ds_email`, `ds_senha`, `fg_ativo`, `tp_sexo`, `dt_nascimento`, `fg_idoso`, `fg_vip`, `fg_nec_especial`, `ds_nec_especial`, `dt_cadastro`, `dt_alteracao_senha`) VALUES
(1, 'Joe Montana', 1, 'joe@montana.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 1, 'F', '0000-00-00', 0, 0, 0, 0, '', '0000-00-00 00:00:00'),
(2, 'Pepe Legal', 2, 'pepe@legal.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 1, 'F', '0000-00-00', 0, 0, 0, 0, '', '0000-00-00 00:00:00'),
(3, 'trytrytr', 2, 'ytrytryrt', '7c4a8d09ca3762af61e59520943dc26494f8941b', 1, 'F', '0000-00-00', 0, 0, 0, 0, '', '0000-00-00 00:00:00'),
(4, 'fdgdf', 2, 'gdfgdf', 'ca72ad5776506837f71775b648c7fb49d57fcfd0', 1, 'F', '0000-00-00', 0, 0, 0, 0, '', '0000-00-00 00:00:00'),
(5, 'pepe legal', 2, 'pepe@legal.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 1, 'F', '0000-00-00', 0, 0, 0, 0, '', '0000-00-00 00:00:00'),
(6, 'pepe legal', 2, 'pepe@legal.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 1, 'F', '0000-00-00', 0, 0, 0, 0, '', '0000-00-00 00:00:00'),
(7, 'Boris Casoi', 2, 'boris@casoi.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 1, 'F', '0000-00-00', 0, 0, 0, 0, '', '0000-00-00 00:00:00'),
(54, 'Seu Cliente', 2, 'seu@cliente.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 1, 'F', '0000-00-00', 0, 0, 0, 0, '', '0000-00-00 00:00:00'),
(55, 'Pépe', 2, 'pepe@legal.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 1, 'I', '0000-00-00', 1, 1, 1, 0, '2019-05-14 21:49:11', '0000-00-00 00:00:00');

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `pets`
--
ALTER TABLE `pets`
  ADD CONSTRAINT `pets_ibfk_1` FOREIGN KEY (`cd_tipo_shampoo`) REFERENCES `tipo_shampoo_pet` (`cd_tipo_shampoo`),
  ADD CONSTRAINT `pets_ibfk_2` FOREIGN KEY (`cd_raca_pet`) REFERENCES `raca_pet` (`cd_raca_pet`),
  ADD CONSTRAINT `pets_ibfk_3` FOREIGN KEY (`cd_usuario`) REFERENCES `usuario` (`cd_usuario`);

--
-- Limitadores para a tabela `raca_pet`
--
ALTER TABLE `raca_pet`
  ADD CONSTRAINT `raca_pet_ibfk_1` FOREIGN KEY (`cd_tipo_pet`) REFERENCES `tipo_pet` (`cd_tipo_pet`);

--
-- Limitadores para a tabela `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`cd_perfil`) REFERENCES `perfil_usuario` (`cd_perfil`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
