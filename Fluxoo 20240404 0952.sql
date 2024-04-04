-- MySQL Administrator dump 1.4
--
-- ------------------------------------------------------
-- Server version	5.5.5-10.4.28-MariaDB


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


--
-- Create schema fluxo
--

CREATE DATABASE IF NOT EXISTS fluxo;
USE fluxo;

--
-- Definition of table `adm`
--

DROP TABLE IF EXISTS `adm`;
CREATE TABLE `adm` (
  `idadm` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nomeAdm` varchar(75) NOT NULL DEFAULT '',
  `email` varchar(40) NOT NULL DEFAULT '',
  `senha` varchar(145) NOT NULL DEFAULT '',
  `cadastro` datetime DEFAULT NULL,
  `alteracao` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `ativo` char(1) NOT NULL DEFAULT 'A',
  PRIMARY KEY (`idadm`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `adm`
--

/*!40000 ALTER TABLE `adm` DISABLE KEYS */;
INSERT INTO `adm` (`idadm`,`nomeAdm`,`email`,`senha`,`cadastro`,`alteracao`,`ativo`) VALUES 
 (1,'Marco','marco@gmail.com','$2y$12$hmUTrCVVjKhil8nKmu.9j.Zcyp6jLeuyATLqyCuBuQ81Nx1aWjA0q','2024-04-03 09:34:09','2024-04-03 09:36:19','A'),
 (2,'Arthur','arthur@gmail.com','$2y$12$75w2TD.Zx6iVegIfc8KdouSSBTyywVh3T8SDa3JuG6q2LyoSNNQRS','2024-04-03 09:34:09','2024-04-03 09:36:37','A');
/*!40000 ALTER TABLE `adm` ENABLE KEYS */;


--
-- Definition of table `cliente`
--

DROP TABLE IF EXISTS `cliente`;
CREATE TABLE `cliente` (
  `idcliente` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nomeCliente` varchar(75) NOT NULL DEFAULT '',
  `contato` varchar(16) NOT NULL DEFAULT '',
  `email` varchar(70) NOT NULL DEFAULT '',
  `cadastro` datetime DEFAULT NULL,
  `alteracao` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `ativo` char(1) NOT NULL DEFAULT 'A',
  PRIMARY KEY (`idcliente`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cliente`
--

/*!40000 ALTER TABLE `cliente` DISABLE KEYS */;
INSERT INTO `cliente` (`idcliente`,`nomeCliente`,`contato`,`email`,`cadastro`,`alteracao`,`ativo`) VALUES 
 (1,'João Paulo','(33) 8421-4354','joão@gmail.com','2024-04-03 13:18:44','2024-04-03 13:19:12','A'),
 (14,'Marco A','(33) 9 9988-7764','marcoa@gmail.com','2024-04-04 09:38:44','2024-04-04 09:51:28','A');
/*!40000 ALTER TABLE `cliente` ENABLE KEYS */;


--
-- Definition of table `pedido`
--

DROP TABLE IF EXISTS `pedido`;
CREATE TABLE `pedido` (
  `idpedido` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `idadm` int(10) unsigned NOT NULL DEFAULT 0,
  `idcliente` int(10) unsigned NOT NULL DEFAULT 0,
  `idservico` int(10) unsigned NOT NULL DEFAULT 0,
  `valor` varchar(45) NOT NULL DEFAULT '',
  `dataInicio` date DEFAULT NULL,
  `dataFinal` date DEFAULT NULL,
  `tipoPagamento` char(5) NOT NULL DEFAULT '',
  `numeroParcelas` int(10) unsigned NOT NULL DEFAULT 0,
  `valorEntrada` varchar(45) NOT NULL DEFAULT '',
  `cadastro` datetime DEFAULT NULL,
  `alteracao` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `ativo` char(1) NOT NULL DEFAULT 'A',
  PRIMARY KEY (`idpedido`,`idadm`,`idcliente`,`idservico`),
  KEY `FK_pedido_adm` (`idadm`),
  KEY `FK_pedido_cliente` (`idcliente`),
  KEY `FK_pedido_servico` (`idservico`),
  CONSTRAINT `FK_pedido_adm` FOREIGN KEY (`idadm`) REFERENCES `adm` (`idadm`),
  CONSTRAINT `FK_pedido_cliente` FOREIGN KEY (`idcliente`) REFERENCES `cliente` (`idcliente`),
  CONSTRAINT `FK_pedido_servico` FOREIGN KEY (`idservico`) REFERENCES `servico` (`idservico`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pedido`
--

/*!40000 ALTER TABLE `pedido` DISABLE KEYS */;
INSERT INTO `pedido` (`idpedido`,`idadm`,`idcliente`,`idservico`,`valor`,`dataInicio`,`dataFinal`,`tipoPagamento`,`numeroParcelas`,`valorEntrada`,`cadastro`,`alteracao`,`ativo`) VALUES 
 (1,1,1,2,'100','2023-05-23','2023-06-22','vista',0,'20','2024-04-03 13:24:07','2024-04-03 13:24:17','A');
/*!40000 ALTER TABLE `pedido` ENABLE KEYS */;


--
-- Definition of table `servico`
--

DROP TABLE IF EXISTS `servico`;
CREATE TABLE `servico` (
  `idservico` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nomeServico` varchar(150) NOT NULL DEFAULT '',
  `cadastro` datetime DEFAULT NULL,
  `alterarcao` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `ativo` char(1) NOT NULL DEFAULT 'A',
  PRIMARY KEY (`idservico`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `servico`
--

/*!40000 ALTER TABLE `servico` DISABLE KEYS */;
INSERT INTO `servico` (`idservico`,`nomeServico`,`cadastro`,`alterarcao`,`ativo`) VALUES 
 (1,'Formatação de computadores','2024-04-03 13:21:30','2024-04-04 08:20:52','A'),
 (2,'Website completo','2024-04-03 13:21:30','2024-04-04 08:20:52','A'),
 (3,'Front-end','2024-04-03 13:21:30','2024-04-04 08:20:52','A'),
 (4,'Landing Page','2024-04-03 13:21:30','2024-04-04 08:20:54','A');
/*!40000 ALTER TABLE `servico` ENABLE KEYS */;




/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
