CREATE DATABASE  IF NOT EXISTS `cruise` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `cruise`;
-- MySQL dump 10.13  Distrib 5.6.13, for osx10.6 (i386)
--
-- Host: randd.local    Database: cruise
-- ------------------------------------------------------
-- Server version	5.5.35-0ubuntu0.12.04.2

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
-- Table structure for table `cabins`
--

DROP TABLE IF EXISTS `cabins`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cabins` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ship_id` int(11) NOT NULL,
  `code` varchar(45) NOT NULL,
  `description` varchar(2000) NOT NULL,
  `passengers` int(11) NOT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `fk_cabins_ships_idx` (`ship_id`),
  CONSTRAINT `fk_cabins_ships` FOREIGN KEY (`ship_id`) REFERENCES `ships` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cabins`
--

LOCK TABLES `cabins` WRITE;
/*!40000 ALTER TABLE `cabins` DISABLE KEYS */;
INSERT INTO `cabins` VALUES (1,1,'Presidential suite','The most luxurious cabin on the ship',2,'2014-03-12 04:05:40'),(2,1,'Budget Suite','only for broke bastards (NOTE: this is a really kak cabin)',1,NULL),(3,1,'Love Cabin','for those special moments with loved ones',3,'2014-03-12 03:58:21');
/*!40000 ALTER TABLE `cabins` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cruise_lines`
--

DROP TABLE IF EXISTS `cruise_lines`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cruise_lines` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(45) NOT NULL,
  `name` varchar(100) NOT NULL,
  `url` varchar(100) NOT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cruise_lines`
--

LOCK TABLES `cruise_lines` WRITE;
/*!40000 ALTER TABLE `cruise_lines` DISABLE KEYS */;
INSERT INTO `cruise_lines` VALUES (1,'001','MSC Cruise 01','msc.com/cruise01','2014-03-12 04:28:01'),(2,'002','Titanic Cruise Lux','http://www.google.com?q=titanic','2014-03-12 05:14:57'),(3,'003','Plank','www.onamotherfuckingplank.com/superior_cruises_on_a_floating_plank','2014-03-12 04:25:53');
/*!40000 ALTER TABLE `cruise_lines` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `itineraries`
--

DROP TABLE IF EXISTS `itineraries`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `itineraries` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ship_id` int(11) NOT NULL,
  `route_id` int(11) NOT NULL,
  `code` varchar(45) NOT NULL,
  `start_date` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `fk_itineraries_ships_idx` (`ship_id`),
  KEY `fk_itineraries_routes_idx` (`route_id`),
  CONSTRAINT `fk_itineraries_ships` FOREIGN KEY (`ship_id`) REFERENCES `ships` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_itineraries_routes` FOREIGN KEY (`route_id`) REFERENCES `routes` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `itineraries`
--

LOCK TABLES `itineraries` WRITE;
/*!40000 ALTER TABLE `itineraries` DISABLE KEYS */;
/*!40000 ALTER TABLE `itineraries` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `permissions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `description` varchar(200) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name_UNIQUE` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permissions`
--

LOCK TABLES `permissions` WRITE;
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ports`
--

DROP TABLE IF EXISTS `ports`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ports` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `code` varchar(3) NOT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ports`
--

LOCK TABLES `ports` WRITE;
/*!40000 ALTER TABLE `ports` DISABLE KEYS */;
INSERT INTO `ports` VALUES (1,'Port1','001','2014-03-12 06:25:12'),(2,'Port2','002',NULL);
/*!40000 ALTER TABLE `ports` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pricing`
--

DROP TABLE IF EXISTS `pricing`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pricing` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `itinerary_id` int(11) NOT NULL,
  `cabin_id` int(11) NOT NULL,
  `cabin_fare` float NOT NULL,
  `port_charge` float NOT NULL,
  `service_fee` float NOT NULL,
  `insurance` float NOT NULL,
  `special` int(11) NOT NULL,
  `modified` datetime DEFAULT NULL,
  `code` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_pricing_cabins_idx` (`cabin_id`),
  KEY `fk_pricing_itineraries_idx` (`itinerary_id`),
  CONSTRAINT `fk_pricing_cabins` FOREIGN KEY (`cabin_id`) REFERENCES `cabins` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_pricing_itineraries` FOREIGN KEY (`itinerary_id`) REFERENCES `itineraries` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pricing`
--

LOCK TABLES `pricing` WRITE;
/*!40000 ALTER TABLE `pricing` DISABLE KEYS */;
/*!40000 ALTER TABLE `pricing` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL,
  `level` int(11) NOT NULL DEFAULT '999',
  PRIMARY KEY (`id`),
  UNIQUE KEY `name_UNIQUE` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'admin','tha admin role biatches ;)',999),(2,'Pleb','yes it\'s in the name',999);
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles_permissions`
--

DROP TABLE IF EXISTS `roles_permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `roles_permissions` (
  `role_id` int(11) NOT NULL,
  `permission_id` int(11) NOT NULL,
  PRIMARY KEY (`role_id`,`permission_id`),
  KEY `fk_roles_permissions_permissions_id` (`permission_id`),
  CONSTRAINT `fk_roles_permissions_permissions_id` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`),
  CONSTRAINT `fk_roles_permissions_roles_id` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles_permissions`
--

LOCK TABLES `roles_permissions` WRITE;
/*!40000 ALTER TABLE `roles_permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `roles_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles_roles`
--

DROP TABLE IF EXISTS `roles_roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `roles_roles` (
  `parent_role_id` int(11) NOT NULL,
  `child_role_id` int(11) NOT NULL,
  PRIMARY KEY (`parent_role_id`,`child_role_id`),
  KEY `fk_roles_roles_child_role_id` (`child_role_id`),
  CONSTRAINT `fk_roles_roles_child_role_id` FOREIGN KEY (`child_role_id`) REFERENCES `roles` (`id`),
  CONSTRAINT `fk_roles_roles_parent_role_id` FOREIGN KEY (`parent_role_id`) REFERENCES `roles` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles_roles`
--

LOCK TABLES `roles_roles` WRITE;
/*!40000 ALTER TABLE `roles_roles` DISABLE KEYS */;
/*!40000 ALTER TABLE `roles_roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `routes`
--

DROP TABLE IF EXISTS `routes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `routes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `start_port_id` int(11) NOT NULL,
  `end_port_id` int(11) NOT NULL,
  `duration` int(11) NOT NULL,
  `port_of_call` varchar(500) NOT NULL,
  `area` varchar(100) NOT NULL,
  `url` varchar(200) NOT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `routes`
--

LOCK TABLES `routes` WRITE;
/*!40000 ALTER TABLE `routes` DISABLE KEYS */;
INSERT INTO `routes` VALUES (1,1,2,3,'Boomshakalaka','Mordor','http://msc.com/mordor','2014-03-12 06:25:36');
/*!40000 ALTER TABLE `routes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ships`
--

DROP TABLE IF EXISTS `ships`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ships` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cruise_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `code` varchar(45) NOT NULL,
  `url` varchar(100) NOT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `fk_ships_cruise_idx` (`cruise_id`),
  CONSTRAINT `fk_ships_cruise` FOREIGN KEY (`cruise_id`) REFERENCES `cruise_lines` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ships`
--

LOCK TABLES `ships` WRITE;
/*!40000 ALTER TABLE `ships` DISABLE KEYS */;
INSERT INTO `ships` VALUES (1,1,'Ship 1','S001','None',NULL),(2,2,'THE TITANIC','Tit','http://google.com?q=titanic','2014-03-12 05:13:55');
/*!40000 ALTER TABLE `ships` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(254) NOT NULL,
  `description` varchar(200) DEFAULT NULL,
  `role_id` int(11) NOT NULL DEFAULT '5',
  `status` int(11) NOT NULL DEFAULT '1',
  `last_login_time` timestamp NULL DEFAULT NULL,
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `create_user_id` int(11) DEFAULT NULL,
  `update_user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username_UNIQUE` (`username`),
  KEY `fk_users_users_idx` (`create_user_id`,`update_user_id`),
  KEY `fk_update_user_id_idx` (`update_user_id`),
  KEY `fk_users_roles_id` (`role_id`),
  CONSTRAINT `fk_users_roles_id` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`),
  CONSTRAINT `fk_users_users_create_user_id` FOREIGN KEY (`create_user_id`) REFERENCES `users` (`id`),
  CONSTRAINT `fk_users_users_modify_user_id` FOREIGN KEY (`update_user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (5,'admin','21232f297a57a5a743894a0e4a801fc3','admin','1@2.com','admin',1,1,'2014-03-11 23:40:17','2014-03-11 16:47:35','2014-03-11 22:07:44',NULL,5),(6,'dylan','827ccb0eea8a706c4c34a16891f84e7b','Dylan','dg.roux@gmail.com','',1,1,'2014-03-11 21:13:10','2014-03-11 17:02:22','2014-03-12 00:51:56',5,5),(8,'richard','827ccb0eea8a706c4c34a16891f84e7b','Richard','dhazeldend@gmail.com','',1,1,NULL,'2014-03-11 17:04:57','2014-03-11 22:07:48',5,5),(11,'pleb01','827ccb0eea8a706c4c34a16891f84e7b','Pleb01','pleb@gmail.com','test',2,1,NULL,'2014-03-11 21:56:01','2014-03-11 21:56:05',5,5);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'cruise'
--
/*!50003 DROP PROCEDURE IF EXISTS `sp_hasaccess` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = '' */ ;
DELIMITER ;;
CREATE PROCEDURE `sp_hasaccess`(in user_id int, in operation varchar(50))
BEGIN

set @role_id    =   (select role_id from users where id = user_id);
set @opcount    =   (select sum(n) from
                        (select count(1) as n
                            from roles_roles rr
                            inner join roles_permissions rp on rr.child_role_id = rp.role_id
                            inner join permissions p on rp.permission_id = p.id
                            where rr.parent_role_id = @role_id and p.name = operation
                            union
                            select count(1) as n
                            from roles_permissions rp
                            inner join permissions p on rp.permission_id = p.id
                            where rp.role_id = @role_id and p.name = operation) a);

select case when @opcount > 0 then 1 else 0 end as hasaccess;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2014-03-13 17:14:15
