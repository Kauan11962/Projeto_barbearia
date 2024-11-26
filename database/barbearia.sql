-- MySQL dump 10.13  Distrib 8.0.38, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: barbearia
-- ------------------------------------------------------
-- Server version	5.5.5-10.4.32-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `agendamento`
--

DROP TABLE IF EXISTS `agendamento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `agendamento` (
  `id_agendamento` int(11) NOT NULL AUTO_INCREMENT,
  `data_hora` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `id_cliente` int(11) DEFAULT NULL,
  `id_profissional` int(11) DEFAULT NULL,
  `id_servico` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_agendamento`),
  KEY `id_cliente` (`id_cliente`),
  KEY `id_profissional` (`id_profissional`),
  KEY `id_servico` (`id_servico`),
  CONSTRAINT `agendamento_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id_cliente`),
  CONSTRAINT `agendamento_ibfk_2` FOREIGN KEY (`id_profissional`) REFERENCES `profissional` (`id_profissional`),
  CONSTRAINT `agendamento_ibfk_3` FOREIGN KEY (`id_servico`) REFERENCES `servico` (`id_servico`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `agendamento`
--

LOCK TABLES `agendamento` WRITE;
/*!40000 ALTER TABLE `agendamento` DISABLE KEYS */;
/*!40000 ALTER TABLE `agendamento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `barbearia`
--

DROP TABLE IF EXISTS `barbearia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `barbearia` (
  `id_barbearia` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `endereco` varchar(100) NOT NULL,
  `celular` varchar(20) NOT NULL,
  `cnpj` varchar(20) NOT NULL,
  `descricao` text DEFAULT NULL,
  `imagem` blob DEFAULT NULL,
  `instagram` varchar(45) DEFAULT NULL,
  `whatsapp` varchar(45) DEFAULT NULL,
  `horario` text DEFAULT NULL,
  `id_dono` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_barbearia`),
  KEY `id_dono` (`id_dono`),
  CONSTRAINT `barbearia_ibfk_1` FOREIGN KEY (`id_dono`) REFERENCES `dono` (`id_dono`)
) ENGINE=InnoDB AUTO_INCREMENT=143 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `barbearia`
--

LOCK TABLES `barbearia` WRITE;
/*!40000 ALTER TABLE `barbearia` DISABLE KEYS */;
INSERT INTO `barbearia` VALUES (142,'Barber SHOP','Rua Mario Sergio 980','(14) 99865-8821','42.845.678/0001-00','Cortes para todas as idades pelo melhor preço!',_binary 'barberialogo.avif','barbershop','(14) 99566-9176','Seg à sex - 9h às 18h / \r\nSáb - 10h às 17h /\r\nDom - Fechado',1);
/*!40000 ALTER TABLE `barbearia` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cliente`
--

DROP TABLE IF EXISTS `cliente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cliente` (
  `id_cliente` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `sobrenome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `celular` varchar(20) DEFAULT NULL,
  `senha` varchar(100) NOT NULL,
  `imagem` blob DEFAULT NULL,
  `preferencias` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_cliente`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cliente`
--

LOCK TABLES `cliente` WRITE;
/*!40000 ALTER TABLE `cliente` DISABLE KEYS */;
INSERT INTO `cliente` VALUES (4,'FELIPe','Ortigoza','felipe@gmail.com','(14) 99840-5428','202cb962ac59075b964b07152d234b70',_binary 'nj.jpg','');
/*!40000 ALTER TABLE `cliente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dono`
--

DROP TABLE IF EXISTS `dono`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `dono` (
  `id_dono` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `sobrenome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `celular` varchar(20) NOT NULL,
  `senha` varchar(100) NOT NULL,
  `cpf` varchar(100) NOT NULL,
  `data_nasc` varchar(100) NOT NULL,
  `imagem` blob DEFAULT NULL,
  PRIMARY KEY (`id_dono`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dono`
--

LOCK TABLES `dono` WRITE;
/*!40000 ALTER TABLE `dono` DISABLE KEYS */;
INSERT INTO `dono` VALUES (1,'Felipe','Ortigoza','felipe@gmail.com','(14) 99840-5428','202cb962ac59075b964b07152d234b70','549.421.848-19','09/03/2005',_binary 'ftperfil.webp');
/*!40000 ALTER TABLE `dono` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `profissional`
--

DROP TABLE IF EXISTS `profissional`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `profissional` (
  `id_profissional` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(20) NOT NULL,
  `imagem` blob NOT NULL,
  `id_barbearia` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_profissional`),
  KEY `id_barbearia` (`id_barbearia`),
  CONSTRAINT `profissional_ibfk_1` FOREIGN KEY (`id_barbearia`) REFERENCES `barbearia` (`id_barbearia`)
) ENGINE=InnoDB AUTO_INCREMENT=81 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `profissional`
--

LOCK TABLES `profissional` WRITE;
/*!40000 ALTER TABLE `profissional` DISABLE KEYS */;
INSERT INTO `profissional` VALUES (78,'Messi',_binary 'messi.jpg',142),(79,'Neymar',_binary 'nj.jpg',142),(80,'Arboleda',_binary 'arbolenda.png',142);
/*!40000 ALTER TABLE `profissional` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `servico`
--

DROP TABLE IF EXISTS `servico`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `servico` (
  `id_servico` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `descricao` varchar(100) DEFAULT NULL,
  `tempo` varchar(10) NOT NULL,
  `preco` decimal(10,2) NOT NULL,
  `id_barbearia` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_servico`),
  KEY `id_barbearia` (`id_barbearia`),
  CONSTRAINT `servico_ibfk_1` FOREIGN KEY (`id_barbearia`) REFERENCES `barbearia` (`id_barbearia`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `servico`
--

LOCK TABLES `servico` WRITE;
/*!40000 ALTER TABLE `servico` DISABLE KEYS */;
/*!40000 ALTER TABLE `servico` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-11-26 18:46:39
