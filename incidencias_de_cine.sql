-- MariaDB dump 10.19  Distrib 10.4.24-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: incidencias_de_cine
-- ------------------------------------------------------
-- Server version	10.4.24-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `clientes`
--

DROP TABLE IF EXISTS `clientes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `clientes` (
  `ID` varchar(5) NOT NULL,
  `ASUNTO` varchar(30) NOT NULL,
  `FECHA` varchar(10) NOT NULL,
  `AUTOR` varchar(10) NOT NULL,
  `PRIORIDAD` enum('BAJA','MEDIA','ALTA') NOT NULL,
  `LUGAR` varchar(10) NOT NULL,
  `DESCRIPCION` varchar(300) NOT NULL,
  `DOC` enum('SI','NO') NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clientes`
--

LOCK TABLES `clientes` WRITE;
/*!40000 ALTER TABLE `clientes` DISABLE KEYS */;
INSERT INTO `clientes` VALUES ('CL-1','Caída Cliente','2022-05-17','Víctor','BAJA','Hall','SE ha caido un cliente en el Hall del cine, se ha podido levantar por sí misma. No había líquidos ni nada que pudiera ser peligroso.','NO'),('CL-2','Atragantamiento ','2022-05-16','Victor','BAJA','Sala 1','Persona mayor atragantada con las palomitas. Llamamos al 112 y se la llevan al hospital. SE reanuda proyección','NO');
/*!40000 ALTER TABLE `clientes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `imagen`
--

DROP TABLE IF EXISTS `imagen`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `imagen` (
  `ID` varchar(5) NOT NULL,
  `ASUNTO` varchar(30) NOT NULL,
  `FECHA` varchar(10) NOT NULL,
  `AUTOR` varchar(20) NOT NULL,
  `PRIORIDAD` enum('BAJA','MEDIA','ALTA') NOT NULL,
  `LUGAR_INCIDENTE` varchar(10) DEFAULT NULL,
  `DETALLES` varchar(500) DEFAULT NULL,
  `DOC` enum('SI','NO') DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `imagen`
--

LOCK TABLES `imagen` WRITE;
/*!40000 ALTER TABLE `imagen` DISABLE KEYS */;
INSERT INTO `imagen` VALUES ('IM-1','Pixeles muertos Sala 2 ','2022-05-13','Víctor','BAJA','Sala 2','Aparecen 3 pixeles muertos en la proyección.','SI'),('IM-2','Voces enlatadas, sala 4','2022-05-18','Raúl','MEDIA','Sala 4','El canal de sonido que emite las voces se escucha enlatado','NO'),('IM-3','Imagen desenfocada sala 3','2022-05-18','Victor','ALTA','Sala 3','El foco de la sala 3 está muy desviado, provocando que la imagen se vea borrosa','SI'),('IM-4','Parón en la imagen','2022-05-19','Víctor','BAJA','Sala 3','Ha habido un pequeño paron en la imagen durante los primeros segundos de la película. Luego se ha reanudado con normalidad','SI');
/*!40000 ALTER TABLE `imagen` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `instalaciones`
--

DROP TABLE IF EXISTS `instalaciones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `instalaciones` (
  `ID` varchar(5) NOT NULL,
  `ASUNTO` varchar(50) NOT NULL,
  `FECHA` varchar(10) NOT NULL,
  `AUTOR` varchar(10) NOT NULL,
  `PRIORIDAD` enum('BAJA','MEDIA','ALTA') NOT NULL,
  `LUGAR` varchar(10) NOT NULL,
  `DESCRIPCION` varchar(300) NOT NULL,
  `DOC` enum('SI','NO') NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `instalaciones`
--

LOCK TABLES `instalaciones` WRITE;
/*!40000 ALTER TABLE `instalaciones` DISABLE KEYS */;
INSERT INTO `instalaciones` VALUES ('IN-1','Fallo eléctrico','2022-05-09','Miguel','MEDIA','Sala 1','En los diferenciales de la sala 1 saltan ciertos interruptores','SI'),('IN-2','Baño averiado ','2022-05-18','Victor','BAJA','Pasillos','Uno de los baños del pasillo no para de soltar agua por lo que hemos tenido que cortar el suministro.','SI');
/*!40000 ALTER TABLE `instalaciones` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `login`
--

DROP TABLE IF EXISTS `login`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `login` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `NOMBRE` varchar(10) NOT NULL,
  `PRIMER APELLIDO` varchar(30) DEFAULT NULL,
  `USUARIO` varchar(4) NOT NULL,
  `CONTRASEÑA` int(4) NOT NULL,
  `PUESTO` varchar(30) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `login`
--

LOCK TABLES `login` WRITE;
/*!40000 ALTER TABLE `login` DISABLE KEYS */;
INSERT INTO `login` VALUES (1,'Víctor','Rodríguez','VICR',1234,'GERENTE'),(2,'Lucas','Fernández','LUCF',1111,'ENCARGADO');
/*!40000 ALTER TABLE `login` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `prl`
--

DROP TABLE IF EXISTS `prl`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `prl` (
  `ID` varchar(5) NOT NULL,
  `ASUNTO` varchar(30) NOT NULL,
  `AUTOR` varchar(10) NOT NULL,
  `PRIORIDAD` enum('BAJA','MEDIA','ALTA') NOT NULL,
  `AFECTADO` varchar(30) NOT NULL,
  `DESCRIPCION` varchar(300) NOT NULL,
  `FECHA` varchar(10) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `prl`
--

LOCK TABLES `prl` WRITE;
/*!40000 ALTER TABLE `prl` DISABLE KEYS */;
INSERT INTO `prl` VALUES ('PR-1','Caída trabajador','Víctor','BAJA','Mariano Rivas','Mariano se ha caído en el almacén de palomitas por que había un charco','2022-05-13'),('PR-3','Corte trabajador','Miguel','ALTA','Susana','Susana se ha cortado un dedo mientras cortaba pan para la elaboración de bocadillos. SE la han llevado al hospital','2022-05-17');
/*!40000 ALTER TABLE `prl` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `robos`
--

DROP TABLE IF EXISTS `robos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `robos` (
  `ID` varchar(5) NOT NULL,
  `ASUNTO` varchar(20) NOT NULL,
  `AUTOR` varchar(10) NOT NULL,
  `PRIORIDAD` enum('BAJA','MEDIA','ALTA') NOT NULL,
  `DESCRIPCION` varchar(300) NOT NULL,
  `FECHA` varchar(10) DEFAULT NULL,
  `VALOR` int(4) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `robos`
--

LOCK TABLES `robos` WRITE;
/*!40000 ALTER TABLE `robos` DISABLE KEYS */;
INSERT INTO `robos` VALUES ('RB-1','Simulacro ','Víctor','BAJA','Se realiza un simulacro por petición de los bomberos','2022-05-12',0);
/*!40000 ALTER TABLE `robos` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-05-20 13:43:54
