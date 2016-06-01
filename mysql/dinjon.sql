-- MySQL dump 10.13  Distrib 5.7.9, for osx10.9 (x86_64)
--
-- Host: 10.10.10.10    Database: dinjon
-- ------------------------------------------------------
-- Server version 5.5.49-MariaDB-1ubuntu0.14.04.1

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
-- Table structure for table `account`
--

DROP TABLE IF EXISTS `account`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `account` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `create_dt` datetime DEFAULT NULL,
  `order` int(11) DEFAULT '0',
  `level` int(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `account`
--

LOCK TABLES `account` WRITE;
/*!40000 ALTER TABLE `account` DISABLE KEYS */;
INSERT INTO `account` VALUES (6,'admin','cGFzc3dvcmQ=','2016-05-08 18:46:28',19,1),(26,'aircomfy','$2y$10$infqU/z3lo2tar5PXiCRw.OBW5qlPb0kSAdidlgnHo8gpu0ssxgOa','2016-05-30 01:17:05',20,0);
/*!40000 ALTER TABLE `account` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `index_data`
--

DROP TABLE IF EXISTS `index_data`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `index_data` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `img_url` varchar(200) CHARACTER SET utf8 NOT NULL,
  `create_dt` datetime DEFAULT NULL,
  `order` int(5) NOT NULL,
  `lang` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `index_data`
--

LOCK TABLES `index_data` WRITE;
/*!40000 ALTER TABLE `index_data` DISABLE KEYS */;
INSERT INTO `index_data` VALUES (43,'/feature-ci3/assets/filemanager/userfiles/img/W_Motors_Lykan_HyperSport.jpg','2016-05-26 22:19:29',1,'ch'),(44,'/feature-ci3/assets/filemanager/userfiles/img/img-3.jpg','2016-05-29 00:34:17',2,'ch'),(45,'/feature-ci3/assets/filemanager/userfiles/img/img-4.jpg','2016-05-29 00:34:43',3,'ch');
/*!40000 ALTER TABLE `index_data` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `index_other`
--

DROP TABLE IF EXISTS `index_other`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `index_other` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `youtube` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `create_dt` datetime NOT NULL,
  `lang` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `index_other`
--

LOCK TABLES `index_other` WRITE;
/*!40000 ALTER TABLE `index_other` DISABLE KEYS */;
INSERT INTO `index_other` VALUES (1,'https://www.youtube.com/embed/Fn7NLWHJw4s','0000-00-00 00:00:00','ch');
/*!40000 ALTER TABLE `index_other` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `news`
--

DROP TABLE IF EXISTS `news`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `title` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci,
  `lang` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'ch',
  `order` int(5) NOT NULL DEFAULT '0',
  `create_dt` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `news`
--

LOCK TABLES `news` WRITE;
/*!40000 ALTER TABLE `news` DISABLE KEYS */;
/*!40000 ALTER TABLE `news` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_details`
--

DROP TABLE IF EXISTS `product_details`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `product_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `content_sample` text CHARACTER SET utf8 NOT NULL,
  `content_details` text CHARACTER SET utf8 NOT NULL,
  `img_url` varchar(200) CHARACTER SET utf8 NOT NULL,
  `create_dt` datetime NOT NULL,
  `order` int(5) NOT NULL,
  `project` int(5) DEFAULT NULL,
  `type` int(11) DEFAULT NULL,
  `lang` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `index_s_banner` int(11) DEFAULT NULL,
  `product_detailscol` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_details`
--

LOCK TABLES `product_details` WRITE;
/*!40000 ALTER TABLE `product_details` DISABLE KEYS */;
INSERT INTO `product_details` VALUES (1,'細項名稱1','<ul>\r\n <li>\r\n  <p>外框</p>\r\n\r\n <p>FRP 玻璃纖維複合材料</p>\r\n </li>\r\n <li>\r\n  <p>葉片</p>\r\n\r\n <p>36&quot;</p>\r\n </li>\r\n <li>\r\n  <p>葉數</p>\r\n\r\n <p>七葉塑鋼</p>\r\n </li>\r\n <li>\r\n  <p>馬達</p>\r\n\r\n <p>3/4HP F級，10Pole</p>\r\n  </li>\r\n <li>\r\n  <p>電壓</p>\r\n\r\n <p>可依區域，國別訂製</p>\r\n  </li>\r\n <li>\r\n  <p>轉速</p>\r\n\r\n <p>630 RPM</p>\r\n  </li>\r\n <li>\r\n  <p>音量</p>\r\n\r\n <p>65~70dB</p>\r\n  </li>\r\n <li>\r\n  <p>尺寸</p>\r\n\r\n <p>108&times;108&times;60cm</p>\r\n </li>\r\n <li>\r\n  <p>總重量</p>\r\n\r\n  <p>45Kg</p>\r\n </li>\r\n</ul>\r\n','<p>dddd</p>\r\n','/feature-ci3/assets/filemanager/userfiles/img/W_Motors_Lykan_HyperSport.jpg','2016-05-28 22:37:46',1,5,1,'ch',1,0),(3,'bbb','','','','2016-05-30 00:23:08',2,5,1,'ch',0,0);
/*!40000 ALTER TABLE `product_details` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_project`
--

DROP TABLE IF EXISTS `product_project`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `product_project` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lang` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `order` int(10) NOT NULL DEFAULT '0',
  `create_dt` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_project`
--

LOCK TABLES `product_project` WRITE;
/*!40000 ALTER TABLE `product_project` DISABLE KEYS */;
INSERT INTO `product_project` VALUES (5,'產品介紹','ch',1,'2016-05-28 22:27:09'),(6,'工程實績','ch',2,'2016-05-28 22:27:15'),(7,'專業技術','ch',3,'2016-05-29 00:09:05');
/*!40000 ALTER TABLE `product_project` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_type`
--

DROP TABLE IF EXISTS `product_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `product_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lang` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `create_dt` datetime DEFAULT NULL,
  `order` int(10) DEFAULT '0',
  `project` int(5) NOT NULL,
  `img_url` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_type`
--

LOCK TABLES `product_type` WRITE;
/*!40000 ALTER TABLE `product_type` DISABLE KEYS */;
INSERT INTO `product_type` VALUES (1,'塑鋼系列 54\"七葉直結式風機 Y70131231231231231231231231','ch','2016-05-28 22:34:43',1,5,'/feature-ci3/assets/filemanager/userfiles/img/2.JPG'),(2,'分類二','ch','2016-05-28 22:35:36',2,5,'/feature-ci3/assets/filemanager/userfiles/img/W_Motors_Lykan_HyperSport.jpg');
/*!40000 ALTER TABLE `product_type` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-06-01 17:49:10
