-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.7.33 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             11.2.0.6213
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for pet-store-project
CREATE DATABASE IF NOT EXISTS `pet-store-project` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `pet-store-project`;

-- Dumping structure for table pet-store-project.animals
CREATE TABLE IF NOT EXISTS `animals` (
  `animals_id` varchar(50) NOT NULL,
  `animals_name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`animals_id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Data exporting was unselected.

-- Dumping structure for table pet-store-project.customers
CREATE TABLE IF NOT EXISTS `customers` (
  `customers_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `customers_name` varchar(50) DEFAULT NULL,
  `customers_email` varchar(50) DEFAULT NULL,
  `customers_phone` int(11) DEFAULT NULL,
  `customers_password` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`customers_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=87 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Data exporting was unselected.

-- Dumping structure for table pet-store-project.delivery
CREATE TABLE IF NOT EXISTS `delivery` (
  `delivery_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `delivery_address` varchar(50) NOT NULL DEFAULT '0',
  PRIMARY KEY (`delivery_id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Data exporting was unselected.

-- Dumping structure for table pet-store-project.items
CREATE TABLE IF NOT EXISTS `items` (
  `Items_id` int(11) NOT NULL,
  `Items_name` varchar(50) DEFAULT NULL,
  `Items_quantity` int(11) DEFAULT NULL,
  `Items_price` double DEFAULT NULL,
  PRIMARY KEY (`Items_id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Data exporting was unselected.

-- Dumping structure for table pet-store-project.orders
CREATE TABLE IF NOT EXISTS `orders` (
  `order_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `customers_id` int(11) DEFAULT NULL,
  `commodity` varchar(64) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `create_time` datetime DEFAULT NULL,
  `status` int(4) DEFAULT '10' COMMENT '10  20   30',
  `image_url` varchar(255) DEFAULT NULL,
  `amount` int(1) DEFAULT NULL,
  PRIMARY KEY (`order_id`) USING BTREE,
  KEY `customers_id` (`customers_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=59 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Data exporting was unselected.

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
