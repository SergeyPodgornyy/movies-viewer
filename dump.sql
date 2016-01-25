-- MySQL dump 10.13  Distrib 5.6.27, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: webbylab_movies
-- ------------------------------------------------------
-- Server version	5.6.27-0ubuntu1

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
-- Table structure for table `cast`
--

DROP TABLE IF EXISTS `cast`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cast` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) DEFAULT NULL,
  `surname` varchar(20) NOT NULL,
  `info_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cast`
--

LOCK TABLES `cast` WRITE;
/*!40000 ALTER TABLE `cast` DISABLE KEYS */;
INSERT INTO `cast` VALUES (1,'Alan','Howard',1),(2,'Noel','Appleby',1),(3,'Sean','Astin',1),(4,'Sala','Baker',1),(5,'Sean','Bean',1),(6,'Cate','Blanchett',1),(7,'Orlando','Bloom',1),(8,'Billy','Boyd',1),(9,'Marton','Csokas',1),(10,'Ian','Holm',1),(11,'Christopher','Lee',1),(12,'Keanu','Reeves',2),(13,'Laurence','Fishburne',2),(14,'Carrie-Anne','Moss',2),(15,'Hugo','Weaving',2),(16,'Gloria','Foster',2),(17,'Tom','Hanks',3),(18,'Rebecca','Williams',3),(19,'Sally','Field',3),(20,'Michael Conner','Humphreys',3),(21,'Harold G.','Herthum',3),(22,'George','Kelly',3),(23,'Bob','Penny',3),(24,'John','Randall',3);
/*!40000 ALTER TABLE `cast` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `info`
--

DROP TABLE IF EXISTS `info`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `year` int(11) NOT NULL,
  `format` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `info`
--

LOCK TABLES `info` WRITE;
/*!40000 ALTER TABLE `info` DISABLE KEYS */;
INSERT INTO `info` VALUES (1,'The Lord of the Rings: The Fellowship of the Ring',2001,'Blu-Ray'),(2,'The Matrix',1999,'DVD'),(3,'Forrest Gump',1994,'VHS');
/*!40000 ALTER TABLE `info` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-01-25  3:56:55
