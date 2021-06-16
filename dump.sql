-- MySQL dump 10.13  Distrib 8.0.25, for Linux (x86_64)
--
-- Host: localhost    Database: TALLER2021_1
-- ------------------------------------------------------
-- Server version	8.0.25-0ubuntu0.20.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Current Database: `TALLER2021_1`
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `TALLER2021_1` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;

USE `TALLER2021_1`;

--
-- Table structure for table `apunte`
--

DROP TABLE IF EXISTS `apunte`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `apunte` (
  `id` int NOT NULL AUTO_INCREMENT,
  `tipo_id` int NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contenido_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_E39B0232A9276E6C` (`tipo_id`),
  CONSTRAINT `FK_E39B0232A9276E6C` FOREIGN KEY (`tipo_id`) REFERENCES `apunte_tipo` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `apunte`
--

LOCK TABLES `apunte` WRITE;
/*!40000 ALTER TABLE `apunte` DISABLE KEYS */;
INSERT INTO `apunte` VALUES (1,1,'Patron MVC','https://www.youtube.com/watch?v=zhSDjntidws',1),(2,2,'MVC utilizado en programas de optimización','https://www.researchgate.net/publication/27558517_Utilizacion_del_patron_MVC_en_el_desarrollo_de_programas_de_optimizacion_caso_aplicado_al_despacho_economico_con_restriccion_de_emision_de_gases_contaminantes',1),(4,4,'Detalle de contenido y definición de MVC','https://es.wikipedia.org/wiki/Modelo%E2%80%93vista%E2%80%93controlador',1);
/*!40000 ALTER TABLE `apunte` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `apunte_tipo`
--

DROP TABLE IF EXISTS `apunte_tipo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `apunte_tipo` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha_creacion` datetime NOT NULL,
  `fecha_actualizacion` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `apunte_tipo`
--

LOCK TABLES `apunte_tipo` WRITE;
/*!40000 ALTER TABLE `apunte_tipo` DISABLE KEYS */;
INSERT INTO `apunte_tipo` VALUES (1,'Video','2016-01-01 00:00:00','2016-01-01 00:00:00'),(2,'PDF','2016-01-01 00:00:00','2016-01-01 00:00:00'),(3,'Imagen','2016-01-01 00:00:00','2016-01-01 00:00:00'),(4,'Website','2016-01-01 00:00:00','2016-01-01 00:00:00');
/*!40000 ALTER TABLE `apunte_tipo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contenido`
--

DROP TABLE IF EXISTS `contenido`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `contenido` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha_creacion` datetime NOT NULL,
  `fecha_actualizacion` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contenido`
--

LOCK TABLES `contenido` WRITE;
/*!40000 ALTER TABLE `contenido` DISABLE KEYS */;
INSERT INTO `contenido` VALUES (1,'MVC, Arquitectura de Aplicaciones WEB','El MVC es uno de los principales modelo o arquitectura de aplicaciones WEB utilizado en la actualidad. Permite separar la construcción de un producto de Software en tres grandes componentes para su mejor manipulación.','2016-01-01 00:00:00','2016-01-01 00:00:00');
/*!40000 ALTER TABLE `contenido` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `doctrine_migration_versions`
--

DROP TABLE IF EXISTS `doctrine_migration_versions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `doctrine_migration_versions`
--

LOCK TABLES `doctrine_migration_versions` WRITE;
/*!40000 ALTER TABLE `doctrine_migration_versions` DISABLE KEYS */;
INSERT INTO `doctrine_migration_versions` VALUES ('DoctrineMigrations\\Version20210604211614','2021-06-04 18:28:08',78),('DoctrineMigrations\\Version20210604212640','2021-06-06 13:24:16',313);
/*!40000 ALTER TABLE `doctrine_migration_versions` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-06-09 10:30:23
