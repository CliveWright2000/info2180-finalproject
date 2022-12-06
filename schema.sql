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

INSERT INTO `users` VALUES (1,'Admin', 'User', 'password123', 'admin@project2.com', 'admin', NULL),
(2,'Group','15','password','group15@project2.com', 'member',NULL);




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

INSERT INTO `Contacts` VALUES (2,'Mr','John', 'Brown', 'johnbrown@ue.com','8765432178','Paper Company', 'Sales Lead', 1, 1, '2021-12-05 04:03:26', '2021-12-05 04:03:26' ),
(5,'Mr','Gary', 'Brown', 'Garybrown@ue.com','8765332178','Paper Company', 'Support', 1, 1, '2022-12-05 04:03:26', '2021-12-05 04:03:26' ),
(6,'Ms','Mary', 'Brown', 'Marybrown@ue.com','8765832178','Soap Company', 'Sales Lead', 1, 1, '2022-11-05 04:03:26', '2022-11-05 04:03:26' ),
(8,'Mr','Sal', 'Brown', 'salbrown@ue.com','8765772178','Fridge Company', 'Support', 1, 1, '2022-10-05 04:03:26', '2022-10-05 04:03:26' );



--
-- Table Structure for table `Notes`
--

DROP TABLE IF EXISTS `Notes`;
CREATE TABLE `Notes`(
    `id` int DEFAULT NULL auto_increment,
    `contact_id` int DEFAULT NULL,
    `comment` text NOT NULL DEFAULT '',
    `created_by` int DEFAULT NULL,
    `created_at` datetime DEFAULT NULL,
    PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4080 DEFAULT CHARSET=utf8mb4;

--
-- Insert Values into `Notes`
--

INSERT INTO `Notes` VALUES (1, 2, 'John Brown is very hard working', 1, '2021-12-05 04:03:26'),
(2, 5, 'Gary Brown is very hard working and dedicated', 1, '2021-12-05 04:03:26'),
(3, 6, 'Mary Brown is very hard working, loving adn capable young woman', 1, '2021-12-05 04:03:26'),
(4, 6, 'Mary Brown is going to make it far', 1, '2021-12-05 04:03:26'),
(5, 8, 'Sal Brown is very hard working', 1, '2021-12-05 04:03:26');



/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;