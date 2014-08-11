CREATE DATABASE  IF NOT EXISTS `xplorema_FYP` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `xplorema_FYP`;
-- MySQL dump 10.13  Distrib 5.6.16, for Linux (x86_64)
--
-- Host: 127.0.0.1    Database: xplorema_FYP
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
-- Table structure for table `accomodation`
--

DROP TABLE IF EXISTS `accomodation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `accomodation` (
  `accomodation_id` int(11) NOT NULL AUTO_INCREMENT,
  `accomodation_name` varchar(45) NOT NULL,
  `image_id` varchar(45) DEFAULT NULL,
  `category` varchar(45) NOT NULL,
  `accomodation_address` varchar(200) NOT NULL,
  `accomodation_phone` varchar(45) NOT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `created` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`accomodation_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `accomodation`
--

LOCK TABLES `accomodation` WRITE;
/*!40000 ALTER TABLE `accomodation` DISABLE KEYS */;
INSERT INTO `accomodation` VALUES (1,'hotel',NULL,'1','123','333',1,'2014-07-08 13:48:12'),(2,'motel',NULL,'2','321','444',1,'2014-07-08 13:48:12');
/*!40000 ALTER TABLE `accomodation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL AUTO_INCREMENT,
  `admin_username` varchar(45) NOT NULL,
  `admin_password` varchar(45) NOT NULL,
  `status` tinyint(2) DEFAULT NULL,
  `created` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin`
--

LOCK TABLES `admin` WRITE;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` VALUES (1,'kirill','kok',1,'2014-07-02 18:01:05');
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `booking`
--

DROP TABLE IF EXISTS `booking`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `booking` (
  `booking_id` int(11) NOT NULL AUTO_INCREMENT,
  `booking_date` date NOT NULL,
  `no_person` int(11) NOT NULL,
  `status` tinyint(2) DEFAULT NULL,
  `created` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `admin_id` int(11) NOT NULL,
  `package_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  PRIMARY KEY (`booking_id`),
  KEY `fk_booking_admin1_idx` (`admin_id`),
  KEY `fk_booking_package1_idx` (`package_id`),
  KEY `fk_booking_customer1_idx` (`customer_id`),
  CONSTRAINT `fk_booking_admin1` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`admin_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_booking_customer1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_booking_package1` FOREIGN KEY (`package_id`) REFERENCES `package` (`package_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `booking`
--

LOCK TABLES `booking` WRITE;
/*!40000 ALTER TABLE `booking` DISABLE KEYS */;
/*!40000 ALTER TABLE `booking` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `country`
--

DROP TABLE IF EXISTS `country`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `country` (
  `country_id` int(11) NOT NULL AUTO_INCREMENT,
  `country_name` varchar(45) NOT NULL,
  `country_region` tinyint(2) NOT NULL,
  `created` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`country_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `country`
--

LOCK TABLES `country` WRITE;
/*!40000 ALTER TABLE `country` DISABLE KEYS */;
INSERT INTO `country` VALUES (1,'malaysia',0,'2014-07-21 13:12:50');
/*!40000 ALTER TABLE `country` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `customer`
--

DROP TABLE IF EXISTS `customer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `customer` (
  `customer_id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_username` varchar(45) NOT NULL,
  `customer_password` varchar(45) NOT NULL,
  `csutomer_name` varchar(45) NOT NULL,
  `gender` tinyint(2) NOT NULL,
  `customer_ic` varchar(45) NOT NULL,
  `customer_email` varchar(45) NOT NULL,
  `customer_phone` varchar(45) DEFAULT NULL,
  `customer_address` varchar(200) DEFAULT NULL,
  `status` tinyint(2) DEFAULT NULL,
  `created` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`customer_id`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customer`
--

LOCK TABLES `customer` WRITE;
/*!40000 ALTER TABLE `customer` DISABLE KEYS */;
INSERT INTO `customer` VALUES (26,'4444','3123','4444',2,'44444','3123@3336','3123','3123, 31231, 3123, 123123',NULL,'2014-07-23 16:37:16'),(37,'321321','kok','kirill',1,'123123','kfc1346@gmail.com','123','123, 123, 123, 123',NULL,'2014-07-24 10:26:10');
/*!40000 ALTER TABLE `customer` ENABLE KEYS */;
UNLOCK TABLES;

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
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `package`
--

LOCK TABLES `package` WRITE;
/*!40000 ALTER TABLE `package` DISABLE KEYS */;
INSERT INTO `package` VALUES (1,'first','23',NULL,'no',1,'0000-00-00 00:00:00',1,1,1,1),(2,'ki','',NULL,'',1,'2014-08-03 04:24:50',1,1,1,1),(3,'ki','',NULL,'',1,'2014-08-03 04:25:23',1,1,1,1),(4,'4123','41231',NULL,'4123124',1,'2014-08-03 04:42:22',1,1,1,1),(12,'kirill','4234',NULL,'4234',1,'2014-08-03 06:18:09',1,1,2,1),(13,'asd','50','','fun',1,'2014-08-11 06:38:02',1,1,1,1),(14,'asd','50','','fun',1,'2014-08-11 06:38:55',1,1,1,1),(15,'asd','50','','fun',1,'2014-08-11 06:40:01',1,1,1,1),(16,'fsdf','4234','','4234',1,'2014-08-11 06:40:15',1,1,1,1),(17,'fsdf','4234','','4234',1,'2014-08-11 06:43:00',1,1,1,1),(18,'fsdf','4234','','4234',1,'2014-08-11 06:48:26',1,1,1,1),(19,'fsdf','4234','','4234',1,'2014-08-11 06:50:00',1,1,1,1),(20,'fsdf','4234','','4234',1,'2014-08-11 06:50:53',1,1,1,1),(21,'4123','4123','Screenshot from 2014-07-15 12:27:09.png','4123',1,'2014-08-11 07:03:42',1,1,1,1),(22,'gsdf','fsdf','1876','fsdf',1,'2014-08-11 07:19:48',1,1,1,1),(23,'gsdf','fsdf','5510','fsdf',1,'2014-08-11 07:24:46',1,1,1,1),(24,'gsdf','fsdf','7698','fsdf',1,'2014-08-11 07:25:19',1,1,1,1),(25,'gsdf','fsdf','6409','fsdf',1,'2014-08-11 07:25:43',1,1,1,1),(26,'gsdf','fsdf','4686','fsdf',1,'2014-08-11 07:27:06',1,1,1,1),(27,'gsdf','fsdf','1802','fsdf',1,'2014-08-11 07:27:14',1,1,1,1),(28,'gsdf','fsdf','2247','fsdf',1,'2014-08-11 07:29:07',1,1,1,1),(29,'gsdf','fsdf','4515','fsdf',1,'2014-08-11 07:30:02',1,1,1,1),(30,'gsdf','fsdf','1313','fsdf',1,'2014-08-11 07:31:36',1,1,1,1),(31,'gsdf','fsdf','6736','fsdf',1,'2014-08-11 07:33:52',1,1,1,1),(32,'gsdf','fsdf','9503','fsdf',1,'2014-08-11 07:34:28',1,1,1,1),(33,'gsdf','fsdf','8385','fsdf',1,'2014-08-11 08:29:35',1,1,1,1);
/*!40000 ALTER TABLE `package` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `payment`
--

DROP TABLE IF EXISTS `payment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `payment` (
  `payment_id` int(11) NOT NULL AUTO_INCREMENT,
  `price` varchar(45) NOT NULL,
  `date` datetime NOT NULL,
  `payment_type` tinyint(3) NOT NULL,
  `status` tinyint(2) DEFAULT NULL,
  `created` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `booking_id` int(11) NOT NULL,
  PRIMARY KEY (`payment_id`),
  KEY `fk_payment_booking1_idx` (`booking_id`),
  CONSTRAINT `fk_payment_booking1` FOREIGN KEY (`booking_id`) REFERENCES `booking` (`booking_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `payment`
--

LOCK TABLES `payment` WRITE;
/*!40000 ALTER TABLE `payment` DISABLE KEYS */;
/*!40000 ALTER TABLE `payment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `review`
--

DROP TABLE IF EXISTS `review`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `review` (
  `review_id` int(11) NOT NULL AUTO_INCREMENT,
  `review` varchar(200) NOT NULL,
  `created` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `customer_id` int(11) NOT NULL,
  `package_id` int(11) NOT NULL,
  PRIMARY KEY (`review_id`),
  KEY `fk_review_customer_idx` (`customer_id`),
  KEY `fk_review_package1_idx` (`package_id`),
  CONSTRAINT `fk_review_customer` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_review_package1` FOREIGN KEY (`package_id`) REFERENCES `package` (`package_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `review`
--

LOCK TABLES `review` WRITE;
/*!40000 ALTER TABLE `review` DISABLE KEYS */;
/*!40000 ALTER TABLE `review` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `transport`
--

DROP TABLE IF EXISTS `transport`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `transport` (
  `transport_id` int(11) NOT NULL AUTO_INCREMENT,
  `transport_name` varchar(45) NOT NULL,
  `description` varchar(200) NOT NULL,
  `type` varchar(45) NOT NULL,
  `created` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `status` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`transport_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `transport`
--

LOCK TABLES `transport` WRITE;
/*!40000 ALTER TABLE `transport` DISABLE KEYS */;
INSERT INTO `transport` VALUES (1,'bus','k','k','2014-07-15 18:21:04',1);
/*!40000 ALTER TABLE `transport` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2014-08-11 16:30:28
