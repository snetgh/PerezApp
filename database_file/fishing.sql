-- MySQL dump 10.13  Distrib 5.7.25, for Linux (x86_64)
--
-- Host: localhost    Database: fishing
-- ------------------------------------------------------
-- Server version	5.7.25-0ubuntu0.18.04.2

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
-- Table structure for table `admin_users_table`
--

DROP TABLE IF EXISTS `admin_users_table`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin_users_table` (
  `users_table_id` int(100) NOT NULL AUTO_INCREMENT,
  `user_username` varchar(50) NOT NULL,
  `user_pass` mediumtext NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `user_status` int(50) NOT NULL,
  `user_type` int(50) NOT NULL,
  `timestamp` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`users_table_id`),
  KEY `user_status` (`user_status`),
  KEY `user_type` (`user_type`),
  CONSTRAINT `admin_users_table_ibfk_1` FOREIGN KEY (`user_status`) REFERENCES `user_status` (`user_status_id`),
  CONSTRAINT `admin_users_table_ibfk_2` FOREIGN KEY (`user_type`) REFERENCES `user_work_types` (`work_type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin_users_table`
--

LOCK TABLES `admin_users_table` WRITE;
/*!40000 ALTER TABLE `admin_users_table` DISABLE KEYS */;
INSERT INTO `admin_users_table` VALUES (1,'peter','$2y$10$ho2duXpIKe0sEAChUr3p6.D8VpC9NGktJRqwdXvwMXBA/mDthxLoC','Peter Fool',1,1,'2018-12-11 04:38:39'),(2,'stephen','$2y$10$MDdFPP1XNoqrtI1JLqceSuQsmy1ps0rCIREl6abH5MCRR/X0/3lI2','stephen kwabena',1,1,'2018-12-15 15:49:13');
/*!40000 ALTER TABLE `admin_users_table` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `branch_request_table`
--

DROP TABLE IF EXISTS `branch_request_table`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `branch_request_table` (
  `request_table_id` int(100) NOT NULL AUTO_INCREMENT,
  `request_id` varchar(10) NOT NULL,
  `button_id` int(20) DEFAULT NULL,
  `item_id` int(20) NOT NULL,
  `sending_branch` int(20) NOT NULL,
  `item_description` mediumtext NOT NULL,
  `quantity_required` int(20) NOT NULL,
  `receiving_branch` int(20) NOT NULL,
  `request_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`request_table_id`),
  KEY `sending_branch` (`sending_branch`),
  KEY `receiving_branch` (`receiving_branch`),
  CONSTRAINT `branch_request_table_ibfk_1` FOREIGN KEY (`sending_branch`) REFERENCES `system_branches` (`system_branch_id`),
  CONSTRAINT `branch_request_table_ibfk_2` FOREIGN KEY (`receiving_branch`) REFERENCES `system_branches` (`system_branch_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `branch_request_table`
--

LOCK TABLES `branch_request_table` WRITE;
/*!40000 ALTER TABLE `branch_request_table` DISABLE KEYS */;
/*!40000 ALTER TABLE `branch_request_table` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `checked_branch_request_table`
--

DROP TABLE IF EXISTS `checked_branch_request_table`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `checked_branch_request_table` (
  `request_table_id` int(100) NOT NULL AUTO_INCREMENT,
  `request_id` varchar(10) NOT NULL,
  `button_id` int(20) DEFAULT NULL,
  `item_id` int(20) NOT NULL,
  `sending_branch` varchar(50) NOT NULL,
  `item_description` mediumtext NOT NULL,
  `quantity_required` int(20) NOT NULL,
  `receiving_branch` varchar(50) NOT NULL,
  `request_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`request_table_id`),
  KEY `sending_branch` (`sending_branch`),
  KEY `receiving_branch` (`receiving_branch`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `checked_branch_request_table`
--

LOCK TABLES `checked_branch_request_table` WRITE;
/*!40000 ALTER TABLE `checked_branch_request_table` DISABLE KEYS */;
/*!40000 ALTER TABLE `checked_branch_request_table` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `checked_pending_branch_request_table`
--

DROP TABLE IF EXISTS `checked_pending_branch_request_table`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `checked_pending_branch_request_table` (
  `request_table_id` int(100) NOT NULL AUTO_INCREMENT,
  `request_id` varchar(10) NOT NULL,
  `item_id` int(20) NOT NULL,
  `sending_branch` varchar(50) NOT NULL,
  `item_description` mediumtext NOT NULL,
  `item_sent` varchar(50) NOT NULL,
  `quantity_required` int(20) NOT NULL,
  `quantity_given` int(20) NOT NULL,
  `receiving_branch` varchar(50) NOT NULL,
  `request_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`request_table_id`),
  KEY `sending_branch` (`sending_branch`),
  KEY `receiving_branch` (`receiving_branch`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `checked_pending_branch_request_table`
--

LOCK TABLES `checked_pending_branch_request_table` WRITE;
/*!40000 ALTER TABLE `checked_pending_branch_request_table` DISABLE KEYS */;
/*!40000 ALTER TABLE `checked_pending_branch_request_table` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `customers_table`
--

DROP TABLE IF EXISTS `customers_table`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `customers_table` (
  `customers_id` int(100) NOT NULL AUTO_INCREMENT,
  `customer_name` varchar(50) NOT NULL,
  `customer_branch` int(100) NOT NULL,
  `customer_email` varchar(20) NOT NULL,
  `customer_address` mediumtext NOT NULL,
  `customer_contact` int(20) NOT NULL,
  `items_credited_quantity` int(100) NOT NULL DEFAULT '0',
  `items_credited_cost` int(100) NOT NULL DEFAULT '0',
  `items_credited_balance` int(100) NOT NULL DEFAULT '0',
  `customer_type` int(5) NOT NULL DEFAULT '0',
  `customer_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`customers_id`),
  KEY `customer_branch` (`customer_branch`),
  CONSTRAINT `customers_table_ibfk_1` FOREIGN KEY (`customer_branch`) REFERENCES `system_branches` (`system_branch_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customers_table`
--

LOCK TABLES `customers_table` WRITE;
/*!40000 ALTER TABLE `customers_table` DISABLE KEYS */;
/*!40000 ALTER TABLE `customers_table` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `main_customers_table`
--

DROP TABLE IF EXISTS `main_customers_table`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `main_customers_table` (
  `customers_id` int(100) NOT NULL AUTO_INCREMENT,
  `customer_name` varchar(50) NOT NULL,
  `customer_branch` int(100) NOT NULL,
  `customer_email` varchar(20) NOT NULL,
  `customer_address` mediumtext NOT NULL,
  `customer_contact` int(20) NOT NULL,
  `items_credited_quantity` int(100) NOT NULL DEFAULT '0',
  `items_credited_cost` int(100) NOT NULL DEFAULT '0',
  `items_credited_balance` int(100) NOT NULL DEFAULT '0',
  `customer_type` int(5) NOT NULL DEFAULT '0',
  `customer_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`customers_id`),
  KEY `customer_branch` (`customer_branch`),
  CONSTRAINT `main_customers_table_ibfk_1` FOREIGN KEY (`customer_branch`) REFERENCES `system_branches` (`system_branch_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `main_customers_table`
--

LOCK TABLES `main_customers_table` WRITE;
/*!40000 ALTER TABLE `main_customers_table` DISABLE KEYS */;
/*!40000 ALTER TABLE `main_customers_table` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `main_product_category`
--

DROP TABLE IF EXISTS `main_product_category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `main_product_category` (
  `product_category_id` int(100) NOT NULL AUTO_INCREMENT,
  `product_category_name` varchar(50) NOT NULL,
  `product_category_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`product_category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `main_product_category`
--

LOCK TABLES `main_product_category` WRITE;
/*!40000 ALTER TABLE `main_product_category` DISABLE KEYS */;
INSERT INTO `main_product_category` VALUES (1,'Baab','2018-12-11 04:41:23'),(2,'john','2018-12-11 04:41:30');
/*!40000 ALTER TABLE `main_product_category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `main_product_names`
--

DROP TABLE IF EXISTS `main_product_names`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `main_product_names` (
  `product_id` int(100) NOT NULL AUTO_INCREMENT,
  `product_name` varchar(50) NOT NULL,
  `roduct_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `main_product_names`
--

LOCK TABLES `main_product_names` WRITE;
/*!40000 ALTER TABLE `main_product_names` DISABLE KEYS */;
/*!40000 ALTER TABLE `main_product_names` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `main_sales_table`
--

DROP TABLE IF EXISTS `main_sales_table`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `main_sales_table` (
  `sales_id` int(100) NOT NULL AUTO_INCREMENT,
  `button_id` int(10) NOT NULL,
  `invoice_id` varchar(50) NOT NULL,
  `customer_name` varchar(50) NOT NULL,
  `item_description` mediumtext NOT NULL,
  `item_quantity` int(100) NOT NULL,
  `item_price` int(25) NOT NULL,
  `total_amount` int(100) NOT NULL,
  `item_id` int(25) NOT NULL,
  `discount_given` int(10) DEFAULT NULL,
  `amount_payed` int(100) NOT NULL,
  `sales_person` varchar(20) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`sales_id`),
  KEY `sales_table_ibfk_1` (`item_id`),
  CONSTRAINT `main_sales_table_ibfk_1` FOREIGN KEY (`item_id`) REFERENCES `main_stock_product_table` (`stock_product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `main_sales_table`
--

LOCK TABLES `main_sales_table` WRITE;
/*!40000 ALTER TABLE `main_sales_table` DISABLE KEYS */;
INSERT INTO `main_sales_table` VALUES (1,1,'nu3aY9','stephen me','beefÂ -Â Baab',5,10,50,1,0,50,'kwabena','2018-12-11 04:58:52'),(2,1,'nV1RTX','Kofi Mensah','beefÂ -Â Baab',1,10,10,1,0,10,'kwabena','2018-12-15 15:53:56'),(3,2,'nV1RTX','Kofi Mensah','fishÂ -Â john',2,5,10,2,0,10,'kwabena','2018-12-15 15:54:09');
/*!40000 ALTER TABLE `main_sales_table` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `main_stock_product_table`
--

DROP TABLE IF EXISTS `main_stock_product_table`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `main_stock_product_table` (
  `stock_product_id` int(100) NOT NULL AUTO_INCREMENT,
  `stock_product_name` varchar(50) NOT NULL,
  `stock_product_category` int(20) NOT NULL,
  `stock_product_unit_price` varchar(50) NOT NULL DEFAULT '0',
  `stock_product_items_avail` int(50) NOT NULL DEFAULT '0',
  `stock_product_expiry_date` varchar(50) NOT NULL,
  `stock_product_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`stock_product_id`),
  KEY `stock_product_category` (`stock_product_category`),
  CONSTRAINT `main_stock_product_table_ibfk_1` FOREIGN KEY (`stock_product_category`) REFERENCES `main_product_category` (`product_category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `main_stock_product_table`
--

LOCK TABLES `main_stock_product_table` WRITE;
/*!40000 ALTER TABLE `main_stock_product_table` DISABLE KEYS */;
INSERT INTO `main_stock_product_table` VALUES (1,'beef',1,'10',34,'2018-12-11','2018-12-11 04:41:56'),(2,'fish',2,'5',18,'2018-12-19','2018-12-11 04:42:19'),(3,'yellow fish',1,'15',20,'2018-12-12','2018-12-11 04:42:38');
/*!40000 ALTER TABLE `main_stock_product_table` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `main_users_table`
--

DROP TABLE IF EXISTS `main_users_table`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `main_users_table` (
  `users_table_id` int(100) NOT NULL AUTO_INCREMENT,
  `user_username` varchar(50) NOT NULL,
  `user_pass` mediumtext NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `user_status` int(50) NOT NULL,
  `user_type` int(50) NOT NULL,
  `user_branch` int(50) NOT NULL,
  `user_email` varchar(20) NOT NULL,
  `user_contact` varchar(20) NOT NULL,
  `timestamp` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`users_table_id`),
  KEY `user_status` (`user_status`),
  KEY `user_type` (`user_type`),
  KEY `user_branch` (`user_branch`),
  CONSTRAINT `main_users_table_ibfk_1` FOREIGN KEY (`user_status`) REFERENCES `user_status` (`user_status_id`),
  CONSTRAINT `main_users_table_ibfk_2` FOREIGN KEY (`user_type`) REFERENCES `user_work_types` (`work_type_id`),
  CONSTRAINT `main_users_table_ibfk_3` FOREIGN KEY (`user_branch`) REFERENCES `system_branches` (`system_branch_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `main_users_table`
--

LOCK TABLES `main_users_table` WRITE;
/*!40000 ALTER TABLE `main_users_table` DISABLE KEYS */;
INSERT INTO `main_users_table` VALUES (1,'step','$2y$10$Pq/B4G/WLKbSipijENELxeedN6XqcI82BAaLF7Bxqd0c9IN2U9wUq','Stephen Kwabena',1,2,25,'stephen@gamil.com','0245908362','2018-12-11 04:40:30'),(2,'step','$2y$10$1XE36yga6pAkn95PDC7P6OX33Pv0LAq89GIMz7cZ5KYD3t5xt10.e','kwabena fosu',1,5,25,'fosu@gmail.com','0245908362','2018-12-11 04:50:20'),(3,'john','$2y$10$w0YeVY.6qDK8BeG1f3beVO2LGxdtGFiz9Q08GZxTT0YCp2khiBqgW','john doe',1,6,25,'doe@gmail.com','0245908632','2018-12-11 04:51:17'),(4,'abi','$2y$10$B542/R3FdxWS2Mgqp0rOfO/njQu9/5u9/LvWspIES4nBoZIID7CnK','abigail kwabena',1,7,25,'kwabena@gmail.com','0245908362','2018-12-11 04:51:58'),(5,'kwabena','$2y$10$tZ6zG4QviQkOws4/7bZoLe/r5nZqFyrBXgUD6TiJgDGHG0C9coyCi','step',1,3,25,'step@gmail.com','0245908362','2018-12-11 04:58:18');
/*!40000 ALTER TABLE `main_users_table` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pending_branch_request_table`
--

DROP TABLE IF EXISTS `pending_branch_request_table`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pending_branch_request_table` (
  `request_table_id` int(100) NOT NULL AUTO_INCREMENT,
  `request_id` varchar(10) NOT NULL,
  `item_id` int(20) NOT NULL,
  `sending_branch` int(20) NOT NULL,
  `item_description` mediumtext NOT NULL,
  `item_sent` varchar(50) NOT NULL,
  `quantity_required` int(20) NOT NULL,
  `quantity_given` int(20) NOT NULL,
  `receiving_branch` int(20) NOT NULL,
  `request_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`request_table_id`),
  KEY `sending_branch` (`sending_branch`),
  KEY `receiving_branch` (`receiving_branch`),
  CONSTRAINT `pending_branch_request_table_ibfk_1` FOREIGN KEY (`receiving_branch`) REFERENCES `system_branches` (`system_branch_id`),
  CONSTRAINT `pending_branch_request_table_ibfk_2` FOREIGN KEY (`sending_branch`) REFERENCES `system_branches` (`system_branch_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pending_branch_request_table`
--

LOCK TABLES `pending_branch_request_table` WRITE;
/*!40000 ALTER TABLE `pending_branch_request_table` DISABLE KEYS */;
/*!40000 ALTER TABLE `pending_branch_request_table` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_category`
--

DROP TABLE IF EXISTS `product_category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `product_category` (
  `product_category_id` int(100) NOT NULL AUTO_INCREMENT,
  `product_category_name` varchar(50) NOT NULL,
  `product_category_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`product_category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_category`
--

LOCK TABLES `product_category` WRITE;
/*!40000 ALTER TABLE `product_category` DISABLE KEYS */;
INSERT INTO `product_category` VALUES (1,'Fish','2018-10-11 15:29:33'),(2,'Beef','2018-10-11 15:29:33');
/*!40000 ALTER TABLE `product_category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_names`
--

DROP TABLE IF EXISTS `product_names`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `product_names` (
  `product_id` int(100) NOT NULL AUTO_INCREMENT,
  `product_name` varchar(50) NOT NULL,
  `roduct_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_names`
--

LOCK TABLES `product_names` WRITE;
/*!40000 ALTER TABLE `product_names` DISABLE KEYS */;
INSERT INTO `product_names` VALUES (1,'Beef Sausage','2018-10-11 15:40:47'),(2,'Chicken Back','2018-10-11 15:40:47');
/*!40000 ALTER TABLE `product_names` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `stock_oficer`
--

DROP TABLE IF EXISTS `stock_oficer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `stock_oficer` (
  `stock_officer_record_id` int(100) NOT NULL AUTO_INCREMENT,
  `stock_product_name` int(50) NOT NULL,
  `stock_product_category` int(50) NOT NULL,
  `stock_container_number` varchar(50) NOT NULL,
  `stock_expected_quantity` int(50) NOT NULL,
  `stock_shortages` int(50) NOT NULL DEFAULT '0',
  `stock_supplier` varchar(60) NOT NULL,
  `stock_date` varchar(20) NOT NULL,
  `stock_car_number` varchar(20) NOT NULL,
  `stock_driver` varchar(20) NOT NULL,
  `record_status` int(5) NOT NULL DEFAULT '0',
  `stock_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`stock_officer_record_id`),
  KEY `stock_oficer_ibfk_1` (`stock_product_category`),
  KEY `stock_oficer_ibfk_2` (`stock_product_name`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `stock_oficer`
--

LOCK TABLES `stock_oficer` WRITE;
/*!40000 ALTER TABLE `stock_oficer` DISABLE KEYS */;
INSERT INTO `stock_oficer` VALUES (1,1,1,'123',20,0,'Gt','2018-12-11','GW 20-19','Peter Donk',1,'2018-12-11 04:55:20');
/*!40000 ALTER TABLE `stock_oficer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `stock_product_table`
--

DROP TABLE IF EXISTS `stock_product_table`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `stock_product_table` (
  `stock_product_id` int(100) NOT NULL AUTO_INCREMENT,
  `stock_product_name` varchar(50) NOT NULL,
  `stock_product_category` int(20) NOT NULL,
  `stock_product_unit_price` int(50) NOT NULL DEFAULT '0',
  `stock_product_items_avail` int(50) NOT NULL DEFAULT '0',
  `stock_product_expiry_date` varchar(50) NOT NULL,
  `stock_product_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`stock_product_id`),
  KEY `stock_product_category` (`stock_product_category`),
  CONSTRAINT `stock_product_table_ibfk_1` FOREIGN KEY (`stock_product_category`) REFERENCES `product_category` (`product_category_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `stock_product_table`
--

LOCK TABLES `stock_product_table` WRITE;
/*!40000 ALTER TABLE `stock_product_table` DISABLE KEYS */;
/*!40000 ALTER TABLE `stock_product_table` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `stock_product_transactions`
--

DROP TABLE IF EXISTS `stock_product_transactions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `stock_product_transactions` (
  `stock_transaction_id` int(100) NOT NULL AUTO_INCREMENT,
  `stock_product_id` int(50) NOT NULL,
  `receipt_invoice_number` varchar(50) NOT NULL,
  `stock_transaction_discount` int(20) NOT NULL,
  `stock_transaction_unit_cost` int(20) NOT NULL,
  `stock_transaction_product_quantity` int(20) NOT NULL,
  `stock_transaction_total_price` int(20) NOT NULL,
  `stock_transaction_amount_paid` int(20) NOT NULL,
  `stock_transaction_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`stock_transaction_id`),
  KEY `stock_product_id` (`stock_product_id`),
  CONSTRAINT `stock_product_transactions_ibfk_1` FOREIGN KEY (`stock_product_id`) REFERENCES `stock_product_table` (`stock_product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `stock_product_transactions`
--

LOCK TABLES `stock_product_transactions` WRITE;
/*!40000 ALTER TABLE `stock_product_transactions` DISABLE KEYS */;
/*!40000 ALTER TABLE `stock_product_transactions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `system_branches`
--

DROP TABLE IF EXISTS `system_branches`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `system_branches` (
  `system_branch_id` int(100) NOT NULL AUTO_INCREMENT,
  `system_branch_name` varchar(50) NOT NULL,
  `branch_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`system_branch_id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `system_branches`
--

LOCK TABLES `system_branches` WRITE;
/*!40000 ALTER TABLE `system_branches` DISABLE KEYS */;
INSERT INTO `system_branches` VALUES (25,'main','2018-12-11 04:40:29');
/*!40000 ALTER TABLE `system_branches` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_status`
--

DROP TABLE IF EXISTS `user_status`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_status` (
  `user_status_id` int(50) NOT NULL AUTO_INCREMENT,
  `status_name` varchar(20) NOT NULL,
  `status_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`user_status_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_status`
--

LOCK TABLES `user_status` WRITE;
/*!40000 ALTER TABLE `user_status` DISABLE KEYS */;
INSERT INTO `user_status` VALUES (1,'active','2018-10-09 00:00:05'),(2,'hold','2018-10-09 00:00:05');
/*!40000 ALTER TABLE `user_status` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_work_types`
--

DROP TABLE IF EXISTS `user_work_types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_work_types` (
  `work_type_id` int(50) NOT NULL AUTO_INCREMENT,
  `work_type` varchar(50) NOT NULL,
  `work_type_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`work_type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_work_types`
--

LOCK TABLES `user_work_types` WRITE;
/*!40000 ALTER TABLE `user_work_types` DISABLE KEYS */;
INSERT INTO `user_work_types` VALUES (1,'Administrator','2018-10-09 00:13:57'),(2,'Manager','2018-10-09 00:13:57'),(3,'Sales Person','2018-10-09 00:13:57'),(5,'Stock Control Officer','2018-11-05 23:53:30'),(6,'Warehouse Manager','2018-11-05 23:53:30'),(7,'General Stock Keeper','2018-11-05 23:53:30');
/*!40000 ALTER TABLE `user_work_types` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users_table`
--

DROP TABLE IF EXISTS `users_table`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users_table` (
  `users_table_id` int(100) NOT NULL AUTO_INCREMENT,
  `user_username` varchar(50) NOT NULL,
  `user_pass` mediumtext NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `user_status` int(50) NOT NULL,
  `user_type` int(50) NOT NULL,
  `user_branch` int(50) NOT NULL,
  `user_email` varchar(20) NOT NULL,
  `user_contact` varchar(20) NOT NULL,
  `timestamp` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`users_table_id`),
  KEY `user_status` (`user_status`),
  KEY `user_type` (`user_type`),
  KEY `user_branch` (`user_branch`),
  CONSTRAINT `users_table_ibfk_1` FOREIGN KEY (`user_status`) REFERENCES `user_status` (`user_status_id`),
  CONSTRAINT `users_table_ibfk_2` FOREIGN KEY (`user_type`) REFERENCES `user_work_types` (`work_type_id`),
  CONSTRAINT `users_table_ibfk_3` FOREIGN KEY (`user_branch`) REFERENCES `system_branches` (`system_branch_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users_table`
--

LOCK TABLES `users_table` WRITE;
/*!40000 ALTER TABLE `users_table` DISABLE KEYS */;
INSERT INTO `users_table` VALUES (1,'step','$2y$10$Pq/B4G/WLKbSipijENELxeedN6XqcI82BAaLF7Bxqd0c9IN2U9wUq','Stephen Kwabena',1,2,25,'stephen@gamil.com','0245908362','2018-12-11 04:40:29'),(2,'step','$2y$10$1XE36yga6pAkn95PDC7P6OX33Pv0LAq89GIMz7cZ5KYD3t5xt10.e','kwabena fosu',1,5,25,'fosu@gmail.com','0245908362','2018-12-11 04:50:20'),(3,'john','$2y$10$w0YeVY.6qDK8BeG1f3beVO2LGxdtGFiz9Q08GZxTT0YCp2khiBqgW','john doe',1,6,25,'doe@gmail.com','0245908632','2018-12-11 04:51:17'),(4,'abi','$2y$10$B542/R3FdxWS2Mgqp0rOfO/njQu9/5u9/LvWspIES4nBoZIID7CnK','abigail kwabena',1,7,25,'kwabena@gmail.com','0245908362','2018-12-11 04:51:58');
/*!40000 ALTER TABLE `users_table` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `warehouse_manager`
--

DROP TABLE IF EXISTS `warehouse_manager`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `warehouse_manager` (
  `recroded_item_id` int(100) NOT NULL AUTO_INCREMENT,
  `product_id` int(100) NOT NULL,
  `actual_quantity_received` int(50) NOT NULL,
  `production_date` varchar(20) NOT NULL,
  `expiry_date` varchar(20) NOT NULL,
  `item_receiver` varchar(50) NOT NULL,
  `warehouse_item_status` int(5) NOT NULL DEFAULT '0',
  `warehouse_manager_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`recroded_item_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `warehouse_manager`
--

LOCK TABLES `warehouse_manager` WRITE;
/*!40000 ALTER TABLE `warehouse_manager` DISABLE KEYS */;
INSERT INTO `warehouse_manager` VALUES (1,1,20,'2018-12-11','2018-12-11','stephen',1,'2018-12-11 04:56:18');
/*!40000 ALTER TABLE `warehouse_manager` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'fishing'
--

--
-- Dumping routines for database 'fishing'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-03-29 18:35:05
