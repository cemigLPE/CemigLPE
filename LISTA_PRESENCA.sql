-- --------------------------------------------------------
-- Servidor:                     10.20.2.191
-- Versão do servidor:           5.5.29-0ubuntu0.12.04.1 - (Ubuntu)
-- OS do Servidor:               debian-linux-gnu
-- HeidiSQL Versão:              9.3.0.4984
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Copiando estrutura do banco de dados para LISTA_PRESENCA
CREATE DATABASE IF NOT EXISTS `LISTA_PRESENCA` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `LISTA_PRESENCA`;


-- Copiando estrutura para tabela LISTA_PRESENCA.LISTA
CREATE TABLE IF NOT EXISTS `LISTA` (
  `id_reuniao` int(11) NOT NULL,
  `matricula` char(7) NOT NULL,
  `nome_completo` varchar(100) DEFAULT NULL,
  `funcao` varchar(30) DEFAULT NULL,
  `empresa` varchar(50) DEFAULT NULL,
  `checkin` datetime DEFAULT NULL,
  PRIMARY KEY (`id_reuniao`,`matricula`),
  CONSTRAINT `fk_reuniao_lista` FOREIGN KEY (`id_reuniao`) REFERENCES `REUNIAO` (`id_reuniao`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela LISTA_PRESENCA.LISTA: ~1 rows (aproximadamente)
/*!40000 ALTER TABLE `LISTA` DISABLE KEYS */;
INSERT INTO `LISTA` (`id_reuniao`, `matricula`, `nome_completo`, `funcao`, `empresa`, `checkin`) VALUES
	(1, 'e203289', 'Estanislau Ribeiro Junior', 'Analista de Sistemas', 'Axxiom', '2016-07-15 13:22:33'),
	(1, 'e999998', 'Teste 2', 'Usuario Teste', 'Cemig', '2016-07-15 16:12:49'),
	(1, 'e999999', 'Teste ', 'Usuario Teste', 'Cemig', '2016-07-15 16:13:11');
/*!40000 ALTER TABLE `LISTA` ENABLE KEYS */;


-- Copiando estrutura para tabela LISTA_PRESENCA.REUNIAO
CREATE TABLE IF NOT EXISTS `REUNIAO` (
  `id_reuniao` int(11) NOT NULL AUTO_INCREMENT,
  `nome_reuniao` varchar(100) NOT NULL,
  `local` varchar(100) NOT NULL,
  `data_reuniao` date NOT NULL,
  `hora_inicio` time NOT NULL,
  `hora_termino` time NOT NULL,
  `organizador` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `qr_code` varchar(25) NOT NULL,
  PRIMARY KEY (`id_reuniao`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela LISTA_PRESENCA.REUNIAO: ~1 rows (aproximadamente)
/*!40000 ALTER TABLE `REUNIAO` DISABLE KEYS */;
INSERT INTO `REUNIAO` (`id_reuniao`, `nome_reuniao`, `local`, `data_reuniao`, `hora_inicio`, `hora_termino`, `organizador`, `email`, `qr_code`) VALUES
	(1, 'Teste', 'Cemig Sede - SA03', '2016-07-15', '13:00:00', '17:00:00', 'Estanislau Ribeiro Junior', 'estanislau.junior2@cemig.com.br', 'qr_1.png');
/*!40000 ALTER TABLE `REUNIAO` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
