-- MariaDB dump 10.19  Distrib 10.4.21-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: securitydb
-- ------------------------------------------------------
-- Server version	10.4.21-MariaDB

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
-- Table structure for table `handler`
--

DROP TABLE IF EXISTS `handler`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `handler` (
  `handlerID` int(11) NOT NULL,
  `incidentID` int(11) NOT NULL,
  `personID` int(11) NOT NULL,
  `reason` varchar(100) NOT NULL,
  PRIMARY KEY (`handlerID`),
  KEY `handler_fk_refer_incidents` (`incidentID`),
  KEY `handler_fk_refer_people` (`personID`),
  CONSTRAINT `handler_fk_refer_incidents` FOREIGN KEY (`incidentID`) REFERENCES `incidents` (`incidentID`),
  CONSTRAINT `handler_fk_refer_people` FOREIGN KEY (`personID`) REFERENCES `people` (`personID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `handler`
--

LOCK TABLES `handler` WRITE;
/*!40000 ALTER TABLE `handler` DISABLE KEYS */;
INSERT INTO `handler` VALUES (1,3,2,'stealing personal data'),(2,1,1,'selling unwanted softwares'),(3,2,3,'malicious activity');
/*!40000 ALTER TABLE `handler` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `incidents`
--

DROP TABLE IF EXISTS `incidents`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `incidents` (
  `incidentID` int(11) NOT NULL,
  `typeID` int(11) NOT NULL,
  `personID` int(11) NOT NULL,
  `date` date DEFAULT NULL,
  `state` char(20) NOT NULL,
  PRIMARY KEY (`incidentID`),
  KEY `Incidents_fk_refer_type` (`typeID`),
  KEY `Incidents_fk_refer_person` (`personID`),
  CONSTRAINT `Incidents_fk_refer_person` FOREIGN KEY (`personID`) REFERENCES `people` (`personID`),
  CONSTRAINT `Incidents_fk_refer_type` FOREIGN KEY (`typeID`) REFERENCES `incidenttypes` (`typeID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `incidents`
--

LOCK TABLES `incidents` WRITE;
/*!40000 ALTER TABLE `incidents` DISABLE KEYS */;
INSERT INTO `incidents` VALUES (1,3,1,'2007-09-20','Closed'),(2,2,3,'2008-11-04','Stalled'),(3,1,2,'2008-02-29','Closed');
/*!40000 ALTER TABLE `incidents` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `incidents_comments`
--

DROP TABLE IF EXISTS `incidents_comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `incidents_comments` (
  `commentID` int(11) NOT NULL,
  `handlerID` int(11) NOT NULL,
  `comments` varchar(500) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `ipAddress` varchar(500) NOT NULL,
  PRIMARY KEY (`commentID`),
  KEY `comments_fk_refer_handler` (`handlerID`),
  KEY `comments_fk_refer_ipAddress` (`ipAddress`),
  CONSTRAINT `comments_fk_refer_handler` FOREIGN KEY (`handlerID`) REFERENCES `handler` (`handlerID`),
  CONSTRAINT `comments_fk_refer_ipAddress` FOREIGN KEY (`ipAddress`) REFERENCES `incidents_ipaddresses` (`ipAddress`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `incidents_comments`
--

LOCK TABLES `incidents_comments` WRITE;
/*!40000 ALTER TABLE `incidents_comments` DISABLE KEYS */;
INSERT INTO `incidents_comments` VALUES (1,2,'user selling unwanted and dangerous softwares to seek personal data','2007-09-20','179.182.51.41'),(2,1,'gaining acess to files by using inappropriate softwares','2008-02-29','190.177.17.171'),(3,3,'creating trojans and worms to infect machines','2008-11-04','190.177.45.215');
/*!40000 ALTER TABLE `incidents_comments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `incidents_ipaddresses`
--

DROP TABLE IF EXISTS `incidents_ipaddresses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `incidents_ipaddresses` (
  `ipAddress` varchar(500) NOT NULL,
  `incidentID` int(11) NOT NULL,
  `handlerID` int(11) NOT NULL,
  PRIMARY KEY (`ipAddress`),
  KEY `IpAddress_fk_refer_incidents` (`incidentID`),
  KEY `IpAddress_fk_refer_handler` (`handlerID`),
  CONSTRAINT `IpAddress_fk_refer_handler` FOREIGN KEY (`handlerID`) REFERENCES `handler` (`handlerID`),
  CONSTRAINT `IpAddress_fk_refer_incidents` FOREIGN KEY (`incidentID`) REFERENCES `incidents` (`incidentID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `incidents_ipaddresses`
--

LOCK TABLES `incidents_ipaddresses` WRITE;
/*!40000 ALTER TABLE `incidents_ipaddresses` DISABLE KEYS */;
INSERT INTO `incidents_ipaddresses` VALUES ('179.182.51.41',1,2),('190.177.17.171',3,1),('190.177.45.215',2,3);
/*!40000 ALTER TABLE `incidents_ipaddresses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `incidenttypes`
--

DROP TABLE IF EXISTS `incidenttypes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `incidenttypes` (
  `typeID` int(11) NOT NULL,
  `typeName` char(200) NOT NULL,
  PRIMARY KEY (`typeID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `incidenttypes`
--

LOCK TABLES `incidenttypes` WRITE;
/*!40000 ALTER TABLE `incidenttypes` DISABLE KEYS */;
INSERT INTO `incidenttypes` VALUES (1,'Scareware'),(2,'Malware'),(3,'Exploitation');
/*!40000 ALTER TABLE `incidenttypes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `login`
--

DROP TABLE IF EXISTS `login`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `login` (
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  PRIMARY KEY (`password`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `login`
--

LOCK TABLES `login` WRITE;
/*!40000 ALTER TABLE `login` DISABLE KEYS */;
INSERT INTO `login` VALUES ('runtimeerrors@gmail.com','1234');
/*!40000 ALTER TABLE `login` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `people`
--

DROP TABLE IF EXISTS `people`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `people` (
  `personID` int(11) NOT NULL,
  `firstname` char(40) NOT NULL,
  `lastname` char(40) NOT NULL,
  `jobTitle` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`personID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `people`
--

LOCK TABLES `people` WRITE;
/*!40000 ALTER TABLE `people` DISABLE KEYS */;
INSERT INTO `people` VALUES (1,'John','Smith','Data-Analyst','js12@gmail.com'),(2,'Trevor','Jobs','Programmer','TJ233@gmail.com'),(3,'Dan','Cage','Software-Engineer','dc903@gmail.com');
/*!40000 ALTER TABLE `people` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `teams`
--

DROP TABLE IF EXISTS `teams`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `teams` (
  `teamID` int(11) NOT NULL,
  `personID` int(11) NOT NULL,
  `teamName` varchar(150) NOT NULL,
  PRIMARY KEY (`teamID`),
  KEY `teams_fk_refer` (`personID`),
  CONSTRAINT `teams_fk_refer` FOREIGN KEY (`personID`) REFERENCES `people` (`personID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `teams`
--

LOCK TABLES `teams` WRITE;
/*!40000 ALTER TABLE `teams` DISABLE KEYS */;
INSERT INTO `teams` VALUES (1,2,'Engineers21'),(2,1,'CyberAgents'),(3,3,'CodeBreakers');
/*!40000 ALTER TABLE `teams` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-12-11 15:50:41
