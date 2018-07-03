-- MySQL dump 10.16  Distrib 10.1.13-MariaDB, for Win32 (AMD64)
--
-- Host: localhost    Database: railbook
-- ------------------------------------------------------
-- Server version	10.1.13-MariaDB

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
-- Table structure for table `passenger`
--

CREATE DATABASE IF NOT EXISTS RailBook;
USE RailBook;

DROP TABLE IF EXISTS `passenger`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `passenger` (
  `train_id` varchar(10) NOT NULL,
  `email_id` varchar(128) NOT NULL,
  `seat_no` int(11) NOT NULL,
  `name` text NOT NULL,
  `age` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `registered_member`
--

DROP TABLE IF EXISTS `registered_member`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `registered_member` (
  `email_id` varchar(128) NOT NULL,
  `name` text NOT NULL,
  `pswd` text NOT NULL,
  `dob` date NOT NULL,
  `phone_no` int(12) NOT NULL,
  PRIMARY KEY (`email_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `registered_member`
--

LOCK TABLES `registered_member` WRITE;
/*!40000 ALTER TABLE `registered_member` DISABLE KEYS */;
INSERT INTO `registered_member` VALUES ('abc@gmail.com','abc','202cb962ac59075b964b07152d234b70','1998-01-01',987654321);
/*!40000 ALTER TABLE `registered_member` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `temp_member`
--

DROP TABLE IF EXISTS `temp_member`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `temp_member` (
  `randkey` varchar(64) NOT NULL,
  `email_id` varchar(128) NOT NULL,
  `name` text NOT NULL,
  `pswd` text NOT NULL,
  `dob` date NOT NULL,
  `phone_no` int(12) NOT NULL,
  PRIMARY KEY (`email_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `temp_member`
--

LOCK TABLES `temp_member` WRITE;
/*!40000 ALTER TABLE `temp_member` DISABLE KEYS */;
/*!40000 ALTER TABLE `temp_member` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `train`
--

DROP TABLE IF EXISTS `train`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `train` (
  `id` varchar(10) NOT NULL,
  `start` text NOT NULL,
  `end` text NOT NULL,
  `time` time NOT NULL,
  `max_cap` int(11) NOT NULL,
  `fare` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `train`
--

LOCK TABLES `train` WRITE;
/*!40000 ALTER TABLE `train` DISABLE KEYS */;
INSERT INTO `train` VALUES ('A001','Chennai','Delhi','08:00:00',200,400),('A002','Chennai','Trichy','09:00:00',200,150),('A003','Chennai','Madurai','10:00:00',200,200);
/*!40000 ALTER TABLE `train` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `train_cap`
--

DROP TABLE IF EXISTS `train_cap`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `train_cap` (
  `train_id` varchar(10) NOT NULL,
  `cap_rem` int(11) NOT NULL,
  `date` date NOT NULL,
  KEY `fk` (`train_id`),
  CONSTRAINT `fk` FOREIGN KEY (`train_id`) REFERENCES `train` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `train_cap`
--

LOCK TABLES `train_cap` WRITE;
/*!40000 ALTER TABLE `train_cap` DISABLE KEYS */;
INSERT INTO `train_cap` VALUES ('A001',200,'2017-01-01'),('A002',200,'2017-01-01'),('A003',200,'2017-01-01');
/*!40000 ALTER TABLE `train_cap` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on yyyy-mm-dd hh:mm:ss