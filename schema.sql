-- MySQL dump 10.11
--
--
-- Host: localhost    Database: Dolphin_crm
-- ------------------------------------------------------
-- Server version   5.0.45-log

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

DROP DATABASE IF EXISTS Dolphin_crm;
CREATE DATABASE Dolphin_crm;
USE Dolphin_crm;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
    `id` int NOT NULL auto_increment,
    `firstname` char(255) NOT NULL DEFAULT '',
    `lastname` char(255) NOT NULL DEFAULT '',
    `password` char(255) NOT NULL DEFAULT'',
    `email` char(255) NOT NULL DEFAULT '' ,
    `role` char(255) NOT NULL DEFAULT '' ,
    `created_at` datetime DEFAULT NULL,
    PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4080 DEFAULT CHARSET=utf8mb4;

--
-- Insert data into `users`
--

INSERT INTO `users` VALUES (1,'Admin', 'User', 'password123', 'admin@project2.com', 'Admin', '2022-12-01 12:46:41'),
(2,'Group','15','password','group15@project2.com', 'Member','2021-12-05 04:03:26');




--
-- Table structure for table `Contacts`
--

DROP TABLE IF EXISTS `Contacts`;
CREATE TABLE `Contacts` (
    `id` int NOT NULL auto_increment,
    `title` char(255) NOT NULL DEFAULT '' ,
    `firstname` char(255) NOT NULL DEFAULT '' ,
    `lastname` char(255) NOT NULL DEFAULT '' ,
    `email` char(255) NOT NULL DEFAULT '' ,
    `telephone` char(255) NOT NULL DEFAULT '' ,
    `company` char(255) NOT NULL DEFAULT '' ,
    `type` char(255) NOT NULL DEFAULT '' ,
    `assigned_to` int NOT NULL,
    `created_by` int NOT NULL,
    `created_at` datetime DEFAULT NULL,
    `updated_at` datetime DEFAULT NULL,
    PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4080 DEFAULT CHARSET=utf8mb4;

--
-- Insert values into `contacts`
--

INSERT INTO `Contacts` VALUES (3,'Mr','John', 'Brown', 'johnbrown@ue.com','8765432178','Paper Company', 'Support', 1, 1, '2021-12-05 04:03:26', '2021-12-05 04:03:26' );
INSERT INTO `Contacts` VALUES (4,'Dr','Jane', 'Doe', 'janedoe@random.com','8765557777','Pen Company', 'Sales Lead', 2, 1, '2022-12-03 12:03:26', '2022-12-03 13:03:26' );


--
-- Table Structure for table `Notes`
--

DROP TABLE IF EXISTS `Notes`;
CREATE TABLE `Notes`(
    `id` int NOT NULL auto_increment,
    `contact_id` int NOT NULL,
    `comment` text NOT NULL DEFAULT '',
    `created_by` int NOT NULL,
    `created_at` datetime DEFAULT NULL,
    PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4080 DEFAULT CHARSET=utf8mb4;

--
-- Insert Values into `Notes`
--

INSERT INTO `Notes` VALUES (4, 3, 'John Brown is very hard working', 1, '2021-12-05 04:03:26');


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;