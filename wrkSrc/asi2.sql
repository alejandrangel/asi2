-- MySQL dump 10.13  Distrib 5.7.12, for osx10.9 (x86_64)
--
-- Host: localhost    Database: asi2
-- ------------------------------------------------------
-- Server version	5.7.13

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `actividad`
--

create database asi2;

use asi2;

DROP TABLE IF EXISTS `actividad`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `actividad` (
  `id_actividad` int(11) NOT NULL,
  `actividad` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_actividad`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `actividad`
--

LOCK TABLES `actividad` WRITE;
/*!40000 ALTER TABLE `actividad` DISABLE KEYS */;
INSERT INTO `actividad` VALUES (1,'Recoleccion de Basusa');
/*!40000 ALTER TABLE `actividad` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `actividad_planificada`
--

DROP TABLE IF EXISTS `actividad_planificada`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `actividad_planificada` (
  `id_actividad_planificacion` int(11) NOT NULL AUTO_INCREMENT,
  `tipo` enum('U','P') DEFAULT NULL COMMENT 'U=> Unica\nP=> Periodica',
  `fecha_inicio` varchar(45) DEFAULT NULL,
  `fecha_final` varchar(45) DEFAULT NULL,
  `periodicidad` varchar(2) DEFAULT NULL,
  `dias` varchar(15) DEFAULT NULL,
  `id_plan` int(11) DEFAULT NULL,
  `id_ruta` int(11) DEFAULT NULL,
  `actividad` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_actividad_planificacion`),
  KEY `id_actividad_fk_idx` (`actividad`),
  KEY `id_plan_fk_idx` (`id_plan`),
  KEY `fk_actividad_planificada_ruta_idx` (`id_ruta`),
  CONSTRAINT `fk_actividad_planificada_ruta` FOREIGN KEY (`id_ruta`) REFERENCES `ruta` (`id_ruta`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `id_actividad_fk` FOREIGN KEY (`actividad`) REFERENCES `actividad` (`id_actividad`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `id_plan_fk` FOREIGN KEY (`id_plan`) REFERENCES `plan` (`id_plan`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `actividad_planificada`
--

LOCK TABLES `actividad_planificada` WRITE;
/*!40000 ALTER TABLE `actividad_planificada` DISABLE KEYS */;
INSERT INTO `actividad_planificada` VALUES (1,'U','2016-01-12','2016-01-12','M','L,Ma',1,NULL,NULL),(6,'U','02/10/2016','30/11/2016','',NULL,1,1,1);
/*!40000 ALTER TABLE `actividad_planificada` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `automor_equipo`
--

DROP TABLE IF EXISTS `automor_equipo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `automor_equipo` (
  `id_automor` int(11) NOT NULL,
  `id_equipo` int(11) NOT NULL,
  PRIMARY KEY (`id_automor`,`id_equipo`),
  KEY `id_equipo_idx` (`id_equipo`),
  CONSTRAINT `id_automotor` FOREIGN KEY (`id_automor`) REFERENCES `automotor` (`id_automotor`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `id_equipo` FOREIGN KEY (`id_equipo`) REFERENCES `equipo` (`id_equipo`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `automor_equipo`
--

LOCK TABLES `automor_equipo` WRITE;
/*!40000 ALTER TABLE `automor_equipo` DISABLE KEYS */;
INSERT INTO `automor_equipo` VALUES (1,1);
/*!40000 ALTER TABLE `automor_equipo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `automotor`
--

DROP TABLE IF EXISTS `automotor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `automotor` (
  `id_automotor` int(11) NOT NULL,
  `placa` varchar(45) DEFAULT NULL,
  `modelo` int(11) DEFAULT NULL,
  `anio` int(11) DEFAULT NULL,
  `capacidad` varchar(45) DEFAULT NULL,
  `tipo` int(11) DEFAULT NULL,
  `estado` int(11) DEFAULT NULL,
  `chasis` varchar(45) DEFAULT NULL,
  `color` int(11) DEFAULT NULL,
  `numero_motor` varchar(45) DEFAULT NULL,
  `combustible` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_automotor`),
  KEY `id_modelo_fk_idx` (`modelo`),
  KEY `id_tipo_fk_idx` (`tipo`),
  KEY `id_estado_fk_idx` (`estado`),
  KEY `id_color_fk_idx` (`color`),
  KEY `id_combustible_fk_idx` (`combustible`),
  CONSTRAINT `id_color_fk` FOREIGN KEY (`color`) REFERENCES `color` (`id_color`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `id_combustible_fk` FOREIGN KEY (`combustible`) REFERENCES `combustible` (`id_combustible`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `id_estado_fk` FOREIGN KEY (`estado`) REFERENCES `estado` (`id_estado`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `id_modelo_fk` FOREIGN KEY (`modelo`) REFERENCES `modelo` (`id_modelo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `id_tipo_fk` FOREIGN KEY (`tipo`) REFERENCES `tipo` (`id_tipo`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `automotor`
--

LOCK TABLES `automotor` WRITE;
/*!40000 ALTER TABLE `automotor` DISABLE KEYS */;
INSERT INTO `automotor` VALUES (1,'1',1,1,'1',1,1,'1',3,'1',1);
/*!40000 ALTER TABLE `automotor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `automotor_historial`
--

DROP TABLE IF EXISTS `automotor_historial`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `automotor_historial` (
  `id_automotor_historial` int(11) NOT NULL,
  `automotor` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_automotor_historial`),
  KEY `automotor_idx` (`automotor`),
  CONSTRAINT `automotor` FOREIGN KEY (`automotor`) REFERENCES `automotor` (`id_automotor`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `automotor_historial`
--

LOCK TABLES `automotor_historial` WRITE;
/*!40000 ALTER TABLE `automotor_historial` DISABLE KEYS */;
/*!40000 ALTER TABLE `automotor_historial` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cargo`
--

DROP TABLE IF EXISTS `cargo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cargo` (
  `id_cargo` int(11) NOT NULL,
  `descripcion` varchar(200) NOT NULL,
  `activo` char(1) NOT NULL DEFAULT 'A',
  PRIMARY KEY (`id_cargo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cargo`
--

LOCK TABLES `cargo` WRITE;
/*!40000 ALTER TABLE `cargo` DISABLE KEYS */;
INSERT INTO `cargo` VALUES (1,'Supervisor','1'),(2,'ADMINISTRADOR','A'),(3,'desc','');
/*!40000 ALTER TABLE `cargo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `catalogo_tabla`
--

DROP TABLE IF EXISTS `catalogo_tabla`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `catalogo_tabla` (
  `id_catalogo_tabla` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_catalogo_tabla`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `catalogo_tabla`
--

LOCK TABLES `catalogo_tabla` WRITE;
/*!40000 ALTER TABLE `catalogo_tabla` DISABLE KEYS */;
INSERT INTO `catalogo_tabla` VALUES (1,'solicitud'),(2,'orden'),(3,'plan');
/*!40000 ALTER TABLE `catalogo_tabla` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `colonia`
--

DROP TABLE IF EXISTS `colonia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `colonia` (
  `id_colonia` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  `id_distrito` int(11) NOT NULL,
  PRIMARY KEY (`id_colonia`),
  UNIQUE KEY `nombre_UNIQUE` (`nombre`),
  KEY `fk_colonia_distrito1_idx` (`id_distrito`),
  CONSTRAINT `fk_colonia_distrito1` FOREIGN KEY (`id_distrito`) REFERENCES `distrito` (`id_distrito`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=88 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `colonia`
--

LOCK TABLES `colonia` WRITE;
/*!40000 ALTER TABLE `colonia` DISABLE KEYS */;
INSERT INTO `colonia` VALUES (1,'Residencial Acovit',1),(2,'Residencial Girasoles',1),(3,'Reparto El Quequeisque',1),(4,'Colonia Quezaltepec',1),(5,'Residencial Alpes Suizos 1',1),(6,'Residencial Alpes Suizos 2',1),(7,'Residencial Europa',1),(8,'Lotificación Monteverde',1),(9,'Colonia Nuevo Amanecer',1),(10,'Colonia Don Bosco',1),(11,'Colonia Las Delicias',1),(12,'Residencial Pinares de Suiza',1),(13,'Comunidad Guadalupe 1 y 2',1),(14,'Cantón Victoria',1),(15,'Casa Comunal Col. San Antonio',2),(16,'Boulevard El Hipodromo y Final 6a Avenida Norte',2),(17,'Colonia San Antonio',2),(18,'Bosques de Santa Teresa',3),(19,'Finca de Asturias Norte',3),(20,'Finca de Asturias Sur',3),(21,'Joyas de la Montaña',3),(22,'La Montaña 1',3),(23,'La Montaña 2',3),(24,'Paso Fresco',3),(25,'Jardines de La Sabana 1, 2 y 3',3),(26,'Jardines de Merliot',3),(27,'Jardines del Volcán 1, 2, 3 y 4',3),(28,'Comunidad El Rosal',3),(29,'Residencial Maya',3),(30,'Jardines de la Libertad',3),(31,'Jardines de Merliot.',3),(32,'Comunidad El Trébol',3),(33,'Residencial Miraflores',3),(34,'Residencial Británica',3),(35,'Cantón Álvarez',3),(36,'Cantón El Progreso',3),(37,'6° Calle',4),(38,'10 ° Calle',4),(39,'14 ° Calle',4),(40,'12 ° Calle',4),(41,'Comunidad María Victoria',4),(42,'Residencial El Paraíso',4),(43,'Residencial Las Colinas 1',4),(44,'Residencial Cima del Paraíso',4),(45,'Comunidad El Paraíso',4),(46,'Comunidad San Martin',4),(47,'Urbanización Alemania',4),(48,'Colonia Residencial El Paraíso',4),(49,'Residencial Las Gardenias',4),(50,'Comunidad El Carmencito',4),(51,'Comunidad Nueva Esperanza',4),(52,'Residencial Altos de Utila 1',4),(53,'Residencial Altos de Utila 2',4),(54,'Residencial Altos de Utila 3',4),(55,'Residencial Bethania',4),(56,'Residencial Las Piletas',4),(57,'Residencial Utila Place',4),(58,'Quinta Residencial Las Piletas',4),(59,'Urbanización Villa Bosque',4),(60,'Urbanización Palmira',4),(61,'Parque Residencial Primavera 1 y 2',4),(62,'Colonia San José del Pino',4),(63,'Comunidad San Rafael',4),(64,'Comunidad Fátima',4),(65,'Comunidad La Cruz del Refugio',4),(66,'Residencial Alturas De Tenerife',4),(67,'Los Arrecifes',4),(68,'8° Calle',4),(69,'4° Calle',4),(70,'3° Calle Entre 16° Y 7° Av.',4),(71,'1° Calle Entre 16° Y 7° Av.',4),(72,'6° Calle.',4),(73,'Calle Daniel Hernández',4),(74,'2° Calle',4),(75,'Calle José Ciriaco López',4),(76,'7° Calle (Entre 2° Y 4° Av.)',4),(77,'5° Calle (Entre 2° Y 4° Av.)',4),(78,'9° Calle Entre 2° Y 4° Av.)',4),(79,'Cantón Ayagualo',5),(80,'Cantón Las Granadillas',5),(81,'Cantón El Triunfo',5),(82,'Cantón El Limón',5),(83,'Cantón El Matazano',5),(84,'Cantón Sacazil',5),(85,'Cantón Los Pajales',5),(86,'Comunidad Santa Marta',5),(87,'Comunidad Altos del Matazano',5);
/*!40000 ALTER TABLE `colonia` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `color`
--

DROP TABLE IF EXISTS `color`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `color` (
  `id_color` int(11) NOT NULL,
  `color` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_color`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `color`
--

LOCK TABLES `color` WRITE;
/*!40000 ALTER TABLE `color` DISABLE KEYS */;
INSERT INTO `color` VALUES (3,'rrrr');
/*!40000 ALTER TABLE `color` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `combustible`
--

DROP TABLE IF EXISTS `combustible`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `combustible` (
  `id_combustible` int(11) NOT NULL,
  `combustible` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_combustible`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `combustible`
--

LOCK TABLES `combustible` WRITE;
/*!40000 ALTER TABLE `combustible` DISABLE KEYS */;
INSERT INTO `combustible` VALUES (1,'GAS');
/*!40000 ALTER TABLE `combustible` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dia_asueto`
--

DROP TABLE IF EXISTS `dia_asueto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dia_asueto` (
  `id_dia_asueto` int(11) NOT NULL,
  `fecha` datetime DEFAULT NULL,
  `plan` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_dia_asueto`),
  KEY `id_plan_idx` (`plan`),
  CONSTRAINT `id_plan` FOREIGN KEY (`plan`) REFERENCES `plan` (`id_plan`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dia_asueto`
--

LOCK TABLES `dia_asueto` WRITE;
/*!40000 ALTER TABLE `dia_asueto` DISABLE KEYS */;
/*!40000 ALTER TABLE `dia_asueto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `distrito`
--

DROP TABLE IF EXISTS `distrito`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `distrito` (
  `id_distrito` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_distrito`),
  UNIQUE KEY `nombre_UNIQUE` (`nombre`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `distrito`
--

LOCK TABLES `distrito` WRITE;
/*!40000 ALTER TABLE `distrito` DISABLE KEYS */;
INSERT INTO `distrito` VALUES (1,'Distrito 1'),(2,'Distrito 2'),(3,'Distrito 3'),(4,'Distrito 4'),(5,'Distrito 5');
/*!40000 ALTER TABLE `distrito` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `empleado`
--

DROP TABLE IF EXISTS `empleado`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `empleado` (
  `id_empleado` int(11) NOT NULL,
  `nombres` varchar(100) NOT NULL,
  `apellidos` varchar(100) NOT NULL,
  `direccion` varchar(500) DEFAULT NULL,
  `telefono` varchar(10) DEFAULT NULL,
  `celular` varchar(10) DEFAULT NULL,
  `fnacimiento` datetime NOT NULL,
  `cargo` int(11) NOT NULL,
  PRIMARY KEY (`id_empleado`),
  KEY `id_cargo_fk_idx` (`cargo`),
  CONSTRAINT `id_cargo_fk` FOREIGN KEY (`cargo`) REFERENCES `cargo` (`id_cargo`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `empleado`
--

LOCK TABLES `empleado` WRITE;
/*!40000 ALTER TABLE `empleado` DISABLE KEYS */;
INSERT INTO `empleado` VALUES (1,'Edgar','Pascacio','Res. Villas de Suiza, Senda Zurich 9-B','22284367','73181822','2016-10-01 00:00:00',1),(2,'nelson','Ortega','Res. Villas de Suiza, Senda Zurich 9-B','22284367','22284367','2016-10-20 22:32:02',1),(3,'Rosa','Santos','22284367','22284367','22284367','2016-10-20 22:32:40',1),(4,'Juan','Nolasco','22284367','22284367','22284367','2016-10-20 22:32:40',1),(5,'paco','Rosales','22284367','22284367','22284367','2016-10-20 22:32:40',1);
/*!40000 ALTER TABLE `empleado` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `entrega`
--

DROP TABLE IF EXISTS `entrega`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `entrega` (
  `id_entrega` int(11) NOT NULL,
  `tonelada` varchar(45) DEFAULT NULL,
  `fecha` datetime DEFAULT NULL,
  `id_orden_trabajo` int(11) NOT NULL,
  PRIMARY KEY (`id_entrega`),
  KEY `entrega_orden_trabajo_fk_idx` (`id_orden_trabajo`),
  CONSTRAINT `entrega_orden_trabajo_fk` FOREIGN KEY (`id_orden_trabajo`) REFERENCES `orden_trabajo` (`id_orden_trabajo`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `entrega`
--

LOCK TABLES `entrega` WRITE;
/*!40000 ALTER TABLE `entrega` DISABLE KEYS */;
/*!40000 ALTER TABLE `entrega` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `equipo`
--

DROP TABLE IF EXISTS `equipo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `equipo` (
  `id_equipo` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(150) NOT NULL,
  `estado` enum('A','I') DEFAULT 'A',
  `fecha_creacion` datetime DEFAULT CURRENT_TIMESTAMP,
  `id_plan` int(11) NOT NULL,
  PRIMARY KEY (`id_equipo`),
  KEY `fk_equipo_plan1_idx` (`id_plan`),
  CONSTRAINT `fk_equipo_plan1` FOREIGN KEY (`id_plan`) REFERENCES `plan` (`id_plan`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `equipo`
--

LOCK TABLES `equipo` WRITE;
/*!40000 ALTER TABLE `equipo` DISABLE KEYS */;
INSERT INTO `equipo` VALUES (1,'Equipo de Trabajo 1','A','2016-01-01 00:00:00',1),(2,'Equipo de trabajo','A',NULL,1);
/*!40000 ALTER TABLE `equipo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `estado`
--

DROP TABLE IF EXISTS `estado`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `estado` (
  `id_estado` int(11) NOT NULL,
  `estado` varchar(45) DEFAULT NULL,
  `descripcion` varchar(45) DEFAULT NULL,
  `id_tabla` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_estado`),
  KEY `id_tabla_idx` (`id_tabla`),
  CONSTRAINT `id_tabla` FOREIGN KEY (`id_tabla`) REFERENCES `catalogo_tabla` (`id_catalogo_tabla`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estado`
--

LOCK TABLES `estado` WRITE;
/*!40000 ALTER TABLE `estado` DISABLE KEYS */;
INSERT INTO `estado` VALUES (1,'Registrado','Registrado',2),(2,'Aprobado','Aprobado',2),(3,'Rechazada','Rechazada',2),(4,'Registrada','Registrada',1),(5,'Denegada','Denegada',1);
/*!40000 ALTER TABLE `estado` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `fuente`
--

DROP TABLE IF EXISTS `fuente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fuente` (
  `id_fuente` int(11) NOT NULL,
  `fuente` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_fuente`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fuente`
--

LOCK TABLES `fuente` WRITE;
/*!40000 ALTER TABLE `fuente` DISABLE KEYS */;
INSERT INTO `fuente` VALUES (1,'Pagina Web');
/*!40000 ALTER TABLE `fuente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `herramienta`
--

DROP TABLE IF EXISTS `herramienta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `herramienta` (
  `id_herramienta` int(11) NOT NULL,
  `descripcion` varchar(200) NOT NULL,
  `activo` char(1) NOT NULL DEFAULT 'A',
  PRIMARY KEY (`id_herramienta`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `herramienta`
--

LOCK TABLES `herramienta` WRITE;
/*!40000 ALTER TABLE `herramienta` DISABLE KEYS */;
INSERT INTO `herramienta` VALUES (1,'de','A');
/*!40000 ALTER TABLE `herramienta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `log_usuario`
--

DROP TABLE IF EXISTS `log_usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `log_usuario` (
  `id_log` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` int(11) NOT NULL,
  `fecha` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `accion` varchar(500) NOT NULL,
  PRIMARY KEY (`id_log`),
  KEY `id_usuario_fk_idx` (`usuario`),
  CONSTRAINT `id_usuario_fk` FOREIGN KEY (`usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `log_usuario`
--

LOCK TABLES `log_usuario` WRITE;
/*!40000 ALTER TABLE `log_usuario` DISABLE KEYS */;
INSERT INTO `log_usuario` VALUES (1,2,'2016-09-20 00:58:58','Entro al sistema'),(2,2,'2016-09-20 01:02:36','Salio del sistema'),(3,2,'2016-09-20 01:04:22','Entro al sistema'),(4,2,'2016-09-24 14:24:55','Entro al sistema'),(5,2,'2016-09-24 14:36:05','Salio del sistema'),(6,2,'2016-09-24 14:36:16','Entro al sistema'),(7,2,'2016-09-29 23:12:58','Entro al sistema'),(8,2,'2016-09-30 23:16:46','Entro al sistema'),(9,2,'2016-10-01 14:27:13','Entro al sistema'),(10,2,'2016-10-01 21:40:25','Salio del sistema'),(11,2,'2016-10-01 21:40:31','Entro al sistema'),(12,2,'2016-10-01 22:18:10','Entro al sistema'),(13,2,'2016-10-02 15:00:10','Entro al sistema'),(14,2,'2016-10-02 15:15:54','Entro al sistema'),(15,2,'2016-10-02 15:21:26','Entro al sistema'),(16,2,'2016-10-02 15:24:04','Entro al sistema'),(17,2,'2016-10-02 15:59:20','Salio del sistema'),(18,2,'2016-10-02 15:59:32','Entro al sistema'),(19,2,'2016-10-02 16:05:13','Salio del sistema'),(20,2,'2016-10-02 16:06:20','Salio del sistema'),(21,2,'2016-10-02 16:14:01','Entro al sistema'),(22,2,'2016-10-10 20:05:08','Entro al sistema'),(23,2,'2016-10-12 19:51:09','Entro al sistema'),(24,2,'2016-10-13 20:40:48','Entro al sistema'),(25,2,'2016-10-15 15:00:03','Entro al sistema'),(26,2,'2016-10-15 15:02:52','Salio del sistema'),(27,2,'2016-10-15 15:03:39','Entro al sistema'),(28,2,'2016-10-15 15:24:27','Salio del sistema'),(29,3,'2016-10-15 15:24:34','Entro al sistema'),(30,3,'2016-10-15 15:25:08','Salio del sistema'),(31,2,'2016-10-15 15:25:17','Entro al sistema'),(32,2,'2016-10-15 15:25:26','Salio del sistema'),(33,2,'2016-10-17 20:58:47','Entro al sistema'),(34,2,'2016-10-17 22:54:13','Entro al sistema');
/*!40000 ALTER TABLE `log_usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `marca`
--

DROP TABLE IF EXISTS `marca`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `marca` (
  `id_marca` int(11) NOT NULL,
  `marca` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_marca`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `marca`
--

LOCK TABLES `marca` WRITE;
/*!40000 ALTER TABLE `marca` DISABLE KEYS */;
INSERT INTO `marca` VALUES (1,'Toyota'),(2,'Mazda');
/*!40000 ALTER TABLE `marca` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `menu`
--

DROP TABLE IF EXISTS `menu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `menu` (
  `id_menu` int(11) NOT NULL,
  `label` varchar(45) NOT NULL,
  `url` varchar(500) NOT NULL,
  `id_parent` int(11) DEFAULT NULL,
  `id_rol` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_menu`),
  KEY `rol_menu_fk_idx` (`id_rol`),
  KEY `menu_menu_fk_idx` (`id_parent`),
  CONSTRAINT `menu_menu_fk` FOREIGN KEY (`id_parent`) REFERENCES `menu` (`id_menu`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `rol_menu_fk` FOREIGN KEY (`id_rol`) REFERENCES `rol` (`id_rol`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `menu`
--

LOCK TABLES `menu` WRITE;
/*!40000 ALTER TABLE `menu` DISABLE KEYS */;
INSERT INTO `menu` VALUES (1,'Procesos','#',NULL,1),(2,'Mantenimientos','#',NULL,1),(3,'Administracion','#',NULL,1),(4,'Solicitud','/solicitud',1,1),(5,'Planificación','/plan',1,1),(6,'Orden de Trabajo','/orden',1,1),(7,'Entrega','/entrega',1,1),(8,'Equipo','/equipo',2,1),(9,'Herramientas','/herramienta',2,1),(10,'Vehiculos','/vehiculo',2,1),(11,'Usuario','/usuario',3,1),(12,'Rol','/rol',3,1),(13,'Empleado','/empleado',2,1),(14,'Solicitud','/solicitud',NULL,3);
/*!40000 ALTER TABLE `menu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `modelo`
--

DROP TABLE IF EXISTS `modelo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `modelo` (
  `id_modelo` int(11) NOT NULL,
  `modelo` varchar(45) DEFAULT NULL,
  `marca` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_modelo`),
  KEY `id_marca_fk_idx` (`marca`),
  CONSTRAINT `id_marca_fk` FOREIGN KEY (`marca`) REFERENCES `marca` (`id_marca`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `modelo`
--

LOCK TABLES `modelo` WRITE;
/*!40000 ALTER TABLE `modelo` DISABLE KEYS */;
INSERT INTO `modelo` VALUES (1,'1',1),(2,'2',2);
/*!40000 ALTER TABLE `modelo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orden_actividad`
--

DROP TABLE IF EXISTS `orden_actividad`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `orden_actividad` (
  `id_orden_actividad` int(11) NOT NULL,
  `id_orden` int(11) DEFAULT NULL,
  `id_actividad` int(11) DEFAULT NULL,
  `dias` enum('LU','MA','MI','JU','VI','SA','DO') DEFAULT NULL,
  `fecha_inicio` varchar(45) DEFAULT NULL,
  `fecha_final` varchar(45) DEFAULT NULL,
  `periodicidad` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_orden_actividad`),
  KEY `id_orden_idx` (`id_orden`),
  KEY `id_actividad_idx` (`id_actividad`),
  CONSTRAINT `id_actividad` FOREIGN KEY (`id_actividad`) REFERENCES `actividad` (`id_actividad`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `id_orden` FOREIGN KEY (`id_orden`) REFERENCES `orden_trabajo` (`id_orden_trabajo`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orden_actividad`
--

LOCK TABLES `orden_actividad` WRITE;
/*!40000 ALTER TABLE `orden_actividad` DISABLE KEYS */;
/*!40000 ALTER TABLE `orden_actividad` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orden_automotor`
--

DROP TABLE IF EXISTS `orden_automotor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `orden_automotor` (
  `id_orden_automotor` int(11) NOT NULL,
  `km_inicial` varchar(45) DEFAULT NULL,
  `km_final` varchar(45) DEFAULT NULL,
  `codigo_vale` varchar(45) DEFAULT '-',
  `monto` decimal(18,2) DEFAULT '0.00',
  `id_orden` int(11) DEFAULT NULL,
  `id_automotor` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_orden_automotor`),
  KEY `id_orden_fk_idx` (`id_orden`),
  KEY `id_automotor_fk_idx` (`id_automotor`),
  CONSTRAINT `id_automotor_fk` FOREIGN KEY (`id_automotor`) REFERENCES `automotor` (`id_automotor`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `id_orden_fk` FOREIGN KEY (`id_orden`) REFERENCES `orden_trabajo` (`id_orden_trabajo`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orden_automotor`
--

LOCK TABLES `orden_automotor` WRITE;
/*!40000 ALTER TABLE `orden_automotor` DISABLE KEYS */;
INSERT INTO `orden_automotor` VALUES (1,NULL,NULL,NULL,NULL,14,1);
/*!40000 ALTER TABLE `orden_automotor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orden_empleado`
--

DROP TABLE IF EXISTS `orden_empleado`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `orden_empleado` (
  `id_empleado` int(11) NOT NULL,
  `id_orden` int(11) NOT NULL,
  `observaciones` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`id_empleado`,`id_orden`),
  KEY `id_orden_fk_idx` (`id_orden`),
  KEY `id_empleado_fk_idx` (`id_empleado`),
  CONSTRAINT `ord_empleado_empleado_fk` FOREIGN KEY (`id_empleado`) REFERENCES `empleado` (`id_empleado`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `ord_empleado_orden_fk` FOREIGN KEY (`id_orden`) REFERENCES `orden_trabajo` (`id_orden_trabajo`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orden_empleado`
--

LOCK TABLES `orden_empleado` WRITE;
/*!40000 ALTER TABLE `orden_empleado` DISABLE KEYS */;
INSERT INTO `orden_empleado` VALUES (1,12,''),(1,14,''),(2,12,''),(2,14,''),(3,12,''),(3,14,'');
/*!40000 ALTER TABLE `orden_empleado` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orden_herramienta`
--

DROP TABLE IF EXISTS `orden_herramienta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `orden_herramienta` (
  `id_orden_herramienta` int(11) NOT NULL,
  `id_orden` int(11) DEFAULT NULL,
  `id_herramienta` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_orden_herramienta`),
  KEY `orde_herramienta_orden_fk_idx` (`id_orden`),
  KEY `orde_herramienta_herramienta_fk_idx` (`id_herramienta`),
  CONSTRAINT `orde_herramienta_herramienta_fk` FOREIGN KEY (`id_herramienta`) REFERENCES `herramienta` (`id_herramienta`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `orde_herramienta_orden_fk` FOREIGN KEY (`id_orden`) REFERENCES `orden_trabajo` (`id_orden_trabajo`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orden_herramienta`
--

LOCK TABLES `orden_herramienta` WRITE;
/*!40000 ALTER TABLE `orden_herramienta` DISABLE KEYS */;
/*!40000 ALTER TABLE `orden_herramienta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orden_trabajo`
--

DROP TABLE IF EXISTS `orden_trabajo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `orden_trabajo` (
  `id_orden_trabajo` int(11) NOT NULL AUTO_INCREMENT,
  `orden_trabajo` varchar(45) DEFAULT NULL,
  `tipo` enum('E','P') DEFAULT NULL,
  `id_estado` int(11) DEFAULT NULL,
  `fecha_inicio` datetime DEFAULT NULL,
  `fecha_final` datetime DEFAULT NULL,
  `descripcion` varchar(45) DEFAULT NULL,
  `solicitud` int(11) DEFAULT NULL,
  `actividad` int(11) DEFAULT NULL,
  `actividad_planificacion` int(11) DEFAULT NULL,
  `hora_inicio` time(6) DEFAULT NULL,
  `hora_final` time(6) DEFAULT NULL,
  `id_equipo` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_orden_trabajo`),
  KEY `ord_trabajo_equipo_fk_idx` (`id_equipo`),
  CONSTRAINT `ord_trabajo_equipo_fk` FOREIGN KEY (`id_equipo`) REFERENCES `equipo` (`id_equipo`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orden_trabajo`
--

LOCK TABLES `orden_trabajo` WRITE;
/*!40000 ALTER TABLE `orden_trabajo` DISABLE KEYS */;
INSERT INTO `orden_trabajo` VALUES (12,'Pedro Sanchez 016108','E',1,'2016-10-02 00:00:00','2016-10-02 00:00:00','hola',8,NULL,NULL,'23:59:59.000000','23:59:59.000000',1),(13,'Pedro Sanchez 016108','E',1,'2016-10-02 00:00:00','2016-10-02 00:00:00','hola',8,NULL,NULL,'23:59:59.000000','23:59:59.000000',1),(14,'Pedro Sanchez 016109','E',1,'2016-10-02 00:00:00','2016-10-02 00:00:00','hola',9,NULL,NULL,'23:59:59.000000','23:59:59.000000',1);
/*!40000 ALTER TABLE `orden_trabajo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personal`
--

DROP TABLE IF EXISTS `personal`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `personal` (
  `id_equipo` int(11) NOT NULL,
  `id_empleado` int(11) NOT NULL,
  `estado` enum('A') DEFAULT 'A',
  PRIMARY KEY (`id_equipo`,`id_empleado`),
  KEY `equipo_personal_fk_idx` (`id_empleado`),
  CONSTRAINT `equipo_personal_fk` FOREIGN KEY (`id_empleado`) REFERENCES `empleado` (`id_empleado`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `personal_equipo_fk` FOREIGN KEY (`id_equipo`) REFERENCES `equipo` (`id_equipo`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personal`
--

LOCK TABLES `personal` WRITE;
/*!40000 ALTER TABLE `personal` DISABLE KEYS */;
INSERT INTO `personal` VALUES (1,1,'A'),(1,2,'A'),(1,3,'A'),(2,4,'A'),(2,5,'A');
/*!40000 ALTER TABLE `personal` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `plan`
--

DROP TABLE IF EXISTS `plan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `plan` (
  `id_plan` int(11) NOT NULL,
  `fecha_inicia` datetime NOT NULL,
  `fecha_final` datetime NOT NULL,
  `descripcion` varchar(255) DEFAULT NULL,
  `estado` enum('R','A','C') DEFAULT NULL,
  PRIMARY KEY (`id_plan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `plan`
--

LOCK TABLES `plan` WRITE;
/*!40000 ALTER TABLE `plan` DISABLE KEYS */;
INSERT INTO `plan` VALUES (1,'2016-01-01 00:00:00','2016-12-31 00:00:00','Plan de Recolección de Desechos 2016','R'),(2,'2015-01-01 00:00:00','2015-12-31 00:00:00','Plan de 2015','C');
/*!40000 ALTER TABLE `plan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rol`
--

DROP TABLE IF EXISTS `rol`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rol` (
  `id_rol` int(11) NOT NULL,
  `rol` varchar(45) NOT NULL,
  `activo` char(1) NOT NULL DEFAULT 'A' COMMENT '		',
  PRIMARY KEY (`id_rol`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rol`
--

LOCK TABLES `rol` WRITE;
/*!40000 ALTER TABLE `rol` DISABLE KEYS */;
INSERT INTO `rol` VALUES (1,'ADMINISTRADOR','1'),(2,'SUPERVISOR','1'),(3,'OPERADOR','1');
/*!40000 ALTER TABLE `rol` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ruta`
--

DROP TABLE IF EXISTS `ruta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ruta` (
  `id_ruta` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  PRIMARY KEY (`id_ruta`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ruta`
--

LOCK TABLES `ruta` WRITE;
/*!40000 ALTER TABLE `ruta` DISABLE KEYS */;
INSERT INTO `ruta` VALUES (1,'Ruta Zona Itca'),(2,'Ruta Zona Estadio'),(3,'El Cafetalon'),(4,'Las Delicias');
/*!40000 ALTER TABLE `ruta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ruta_colonia`
--

DROP TABLE IF EXISTS `ruta_colonia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ruta_colonia` (
  `id_ruta_colonia` int(11) NOT NULL,
  `id_ruta` int(11) NOT NULL,
  `id_colonia` int(11) NOT NULL,
  `orden` smallint(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_ruta_colonia`),
  KEY `ruta_colonia_ruta_fk_idx` (`id_ruta`),
  KEY `ruta_colonia_colonia_idx` (`id_colonia`),
  CONSTRAINT `ruta_colonia_colonia` FOREIGN KEY (`id_colonia`) REFERENCES `colonia` (`id_colonia`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `ruta_colonia_ruta_fk` FOREIGN KEY (`id_ruta`) REFERENCES `ruta` (`id_ruta`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ruta_colonia`
--

LOCK TABLES `ruta_colonia` WRITE;
/*!40000 ALTER TABLE `ruta_colonia` DISABLE KEYS */;
INSERT INTO `ruta_colonia` VALUES (1,1,4,1),(2,1,3,2),(3,1,5,3);
/*!40000 ALTER TABLE `ruta_colonia` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `solicitud`
--

DROP TABLE IF EXISTS `solicitud`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `solicitud` (
  `id_solicitud` int(11) NOT NULL AUTO_INCREMENT,
  `fecha` datetime DEFAULT NULL,
  `telefono` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `direccion` tinytext,
  `observacion` tinytext,
  `id_estado` int(11) NOT NULL,
  `id_fuente` int(11) NOT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `referencia` varchar(45) DEFAULT NULL,
  `id_ruta` int(11) NOT NULL,
  PRIMARY KEY (`id_solicitud`),
  KEY `solicitud_estado_fk_idx` (`id_estado`),
  KEY `solicitud_fuente_fk_idx` (`id_fuente`),
  KEY `solicitud_ruta_fk_idx` (`id_ruta`),
  CONSTRAINT `solicitud_estado_fk` FOREIGN KEY (`id_estado`) REFERENCES `estado` (`id_estado`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `solicitud_fuente_fk` FOREIGN KEY (`id_fuente`) REFERENCES `fuente` (`id_fuente`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `solicitud_ruta_fk` FOREIGN KEY (`id_ruta`) REFERENCES `ruta` (`id_ruta`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `solicitud`
--

LOCK TABLES `solicitud` WRITE;
/*!40000 ALTER TABLE `solicitud` DISABLE KEYS */;
INSERT INTO `solicitud` VALUES (8,'2016-10-02 00:00:00','61425952','pedro822@hotmail.com','Pedro Sanchez','Colonia las Delicias','Recoleccion de desechos solidos',1,1,1,'016108',4),(9,'2016-10-02 00:00:00','61425952','pedro822@hotmail.com','Pedro Sanchez','Las delicias','Recoleccion de desechos solidos',1,1,1,'016109',4),(10,'2016-10-15 00:00:00','3232323','alex087309@gmail.com','Nombre de prueba','d','d',1,1,1,'161010',4),(11,'2016-10-15 00:00:00','2','alex087309@gmail.com','aaaaaa','a','a',1,1,1,'161011',4);
/*!40000 ALTER TABLE `solicitud` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipo`
--

DROP TABLE IF EXISTS `tipo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipo` (
  `id_tipo` int(11) NOT NULL,
  `tipo` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_tipo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo`
--

LOCK TABLES `tipo` WRITE;
/*!40000 ALTER TABLE `tipo` DISABLE KEYS */;
INSERT INTO `tipo` VALUES (1,'1');
/*!40000 ALTER TABLE `tipo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  `clave` varchar(255) NOT NULL,
  `fecha_creacion` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `estado` enum('A','B') DEFAULT 'A',
  `id_empleado` int(11) NOT NULL,
  PRIMARY KEY (`id_usuario`),
  UNIQUE KEY `nombre_UNIQUE` (`nombre`),
  KEY `fk_usuario_empleado1_idx` (`id_empleado`),
  CONSTRAINT `fk_usuario_empleado1` FOREIGN KEY (`id_empleado`) REFERENCES `empleado` (`id_empleado`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES (2,'supervisor1','fe01ce2a7fbac8fafaed7c982a04e229','2016-01-01 00:00:00','A',1),(3,'operador','fe01ce2a7fbac8fafaed7c982a04e229','2016-01-01 00:00:00','A',1);
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario_rol`
--

DROP TABLE IF EXISTS `usuario_rol`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuario_rol` (
  `id_rol` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  PRIMARY KEY (`id_rol`,`id_usuario`),
  KEY `id_usuario_rol_usuario_fk_idx` (`id_usuario`),
  CONSTRAINT `id_usuario_rol_rol_fk` FOREIGN KEY (`id_rol`) REFERENCES `rol` (`id_rol`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `id_usuario_rol_usuario_fk` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario_rol`
--

LOCK TABLES `usuario_rol` WRITE;
/*!40000 ALTER TABLE `usuario_rol` DISABLE KEYS */;
INSERT INTO `usuario_rol` VALUES (1,2),(3,3);
/*!40000 ALTER TABLE `usuario_rol` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-10-21  0:30:43
