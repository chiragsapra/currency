# ************************************************************
# Sequel Ace SQL dump
# Version 20046
#
# https://sequel-ace.com/
# https://github.com/Sequel-Ace/Sequel-Ace
#
# Host: 127.0.0.1 (MySQL 5.7.29)
# Database: symfony
# Generation Time: 2023-05-07 15:50:12 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
SET NAMES utf8mb4;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE='NO_AUTO_VALUE_ON_ZERO', SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table currency
# ------------------------------------------------------------

DROP TABLE IF EXISTS `currency`;

CREATE TABLE `currency` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `currency_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `currency_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `currency` WRITE;
/*!40000 ALTER TABLE `currency` DISABLE KEYS */;

INSERT INTO `currency` (`id`, `currency_code`, `currency_name`)
VALUES
	(1,'eur','Euro'),
	(2,'inr','Indian rupee'),
	(3,'gbp','Pound sterling'),
	(4,'usd','United States dollar'),
	(5,'sgd','Singapore dollar'),
	(6,'rub','Russian ruble');

/*!40000 ALTER TABLE `currency` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table exchange
# ------------------------------------------------------------

DROP TABLE IF EXISTS `exchange`;

CREATE TABLE `exchange` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `currency_from` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `currency_to` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rate` float DEFAULT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `exchange` WRITE;
/*!40000 ALTER TABLE `exchange` DISABLE KEYS */;

INSERT INTO `exchange` (`id`, `currency_from`, `currency_to`, `rate`, `date`)
VALUES
	(1,'Indian rupee','United States dollar',0.012229,'2023-05-03'),
	(2,'United States dollar','Indian rupee',81.7705,'2023-05-03'),
	(3,'Pound sterling','United States dollar',1.24787,'2023-05-03'),
	(4,'United States dollar','Pound sterling',0.801365,'2023-05-03');

/*!40000 ALTER TABLE `exchange` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
