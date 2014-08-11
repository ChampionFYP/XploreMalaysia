USE `xplorema_FYP`;
-- MySQL dump 10.13  Distrib 5.6.16, for Linux (x86_64)
--
-- Host: 127.0.0.1    Database: FYP
-- ------------------------------------------------------
-- Server version	5.6.16

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
-- Table structure for table `package`
--

DROP TABLE IF EXISTS `package`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `package` (
  `package_id` int(11) NOT NULL AUTO_INCREMENT,
  `package_name` varchar(45) NOT NULL,
  `package_price` varchar(45) NOT NULL,
  `image_id` varchar(45) DEFAULT NULL,
  `description` varchar(200) NOT NULL,
  `status` tinyint(2) DEFAULT NULL,
  `created` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `country_id` int(11) NOT NULL,
  `transport_id` int(11) NOT NULL,
  `accomodation_id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  PRIMARY KEY (`package_id`),
  KEY `fk_package_country1_idx` (`country_id`),
  KEY `fk_package_transport1_idx` (`transport_id`),
  KEY `fk_package_accomodation1_idx` (`accomodation_id`),
  KEY `fk_package_admin1_idx` (`admin_id`),
  CONSTRAINT `fk_package_accomodation1` FOREIGN KEY (`accomodation_id`) REFERENCES `accomodation` (`accomodation_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_package_admin1` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`admin_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_package_country1` FOREIGN KEY (`country_id`) REFERENCES `country` (`country_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_package_transport1` FOREIGN KEY (`transport_id`) REFERENCES `transport` (`transport_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `package`
--

LOCK TABLES `package` WRITE;
/*!40000 ALTER TABLE `package` DISABLE KEYS */;
INSERT INTO `package` VALUES (1,'first','23',NULL,'no',1,'0000-00-00 00:00:00',1,1,1,1),(2,'ki','',NULL,'',1,'2014-08-03 04:24:50',1,1,1,1),(3,'ki','',NULL,'',1,'2014-08-03 04:25:23',1,1,1,1),(4,'4123','41231',NULL,'4123124',1,'2014-08-03 04:42:22',1,1,1,1),(12,'kirill','4234',NULL,'4234',1,'2014-08-03 06:18:09',1,1,2,1),(13,'asd','50','','fun',1,'2014-08-11 06:38:02',1,1,1,1),(14,'asd','50','','fun',1,'2014-08-11 06:38:55',1,1,1,1),(15,'asd','50','','fun',1,'2014-08-11 06:40:01',1,1,1,1),(16,'fsdf','4234','','4234',1,'2014-08-11 06:40:15',1,1,1,1),(17,'fsdf','4234','','4234',1,'2014-08-11 06:43:00',1,1,1,1),(18,'fsdf','4234','','4234',1,'2014-08-11 06:48:26',1,1,1,1),(19,'fsdf','4234','','4234',1,'2014-08-11 06:50:00',1,1,1,1),(20,'fsdf','4234','','4234',1,'2014-08-11 06:50:53',1,1,1,1),(21,'4123','4123','Screenshot from 2014-07-15 12:27:09.png','4123',1,'2014-08-11 07:03:42',1,1,1,1),(22,'gsdf','fsdf','1876','fsdf',1,'2014-08-11 07:19:48',1,1,1,1),(23,'gsdf','fsdf','5510','fsdf',1,'2014-08-11 07:24:46',1,1,1,1),(24,'gsdf','fsdf','7698','fsdf',1,'2014-08-11 07:25:19',1,1,1,1),(25,'gsdf','fsdf','6409','fsdf',1,'2014-08-11 07:25:43',1,1,1,1),(26,'gsdf','fsdf','4686','fsdf',1,'2014-08-11 07:27:06',1,1,1,1),(27,'gsdf','fsdf','1802','fsdf',1,'2014-08-11 07:27:14',1,1,1,1),(28,'gsdf','fsdf','2247','fsdf',1,'2014-08-11 07:29:07',1,1,1,1),(29,'gsdf','fsdf','4515','fsdf',1,'2014-08-11 07:30:02',1,1,1,1),(30,'gsdf','fsdf','1313','fsdf',1,'2014-08-11 07:31:36',1,1,1,1),(31,'gsdf','fsdf','6736','fsdf',1,'2014-08-11 07:33:52',1,1,1,1),(32,'gsdf','fsdf','9503','fsdf',1,'2014-08-11 07:34:28',1,1,1,1);
/*!40000 ALTER TABLE `package` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2014-08-11 16:22:37
