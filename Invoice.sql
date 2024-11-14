/*
SQLyog Ultimate v13.1.1 (64 bit)
MySQL - 10.4.28-MariaDB : Database - invoice
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`invoice` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;

USE `invoice`;

/*Table structure for table `cache` */

DROP TABLE IF EXISTS `cache`;

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `cache` */

/*Table structure for table `cache_locks` */

DROP TABLE IF EXISTS `cache_locks`;

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `cache_locks` */

/*Table structure for table `failed_jobs` */

DROP TABLE IF EXISTS `failed_jobs`;

CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `failed_jobs` */

/*Table structure for table `invoice_items` */

DROP TABLE IF EXISTS `invoice_items`;

CREATE TABLE `invoice_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `invoice_id` int(155) NOT NULL,
  `item_name` varchar(155) DEFAULT NULL,
  `quantity` int(155) DEFAULT NULL,
  `price` int(155) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `hsncode` varchar(155) DEFAULT NULL,
  `note` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=72 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `invoice_items` */

insert  into `invoice_items`(`id`,`invoice_id`,`item_name`,`quantity`,`price`,`created_at`,`updated_at`,`hsncode`,`note`) values 
(5,3,'Car Service',1,2850,'2024-08-06 09:26:21','2024-08-06 09:26:21',NULL,'15/7/2024\r\nRajpur to Kolkata Airport Drop\r\nInnova'),
(7,5,'Car Service',1,3900,'2024-08-06 09:28:38','2024-08-06 09:28:38',NULL,'15/07/2024\r\nLocal car service at Agartala for full day with Airport Drop'),
(8,6,'Car Service',1,2500,'2024-08-06 09:31:32','2024-08-06 09:31:32',NULL,'16/07/2024\r\nService at Agartala\r\nDezire'),
(9,6,'Parking',1,250,'2024-08-06 09:31:32','2024-08-06 09:31:32',NULL,NULL),
(10,7,'Car Service',1,3800,'2024-08-06 09:36:16','2024-08-06 09:36:16',NULL,'16/07/2024\r\nService at Guwahati\r\nAirport Pickup and Full Day'),
(11,7,'Extra Hours - 2 hrs',2,250,'2024-08-06 09:36:16','2024-08-06 09:36:16',NULL,NULL),
(12,7,'Parking',1,100,'2024-08-06 09:36:16','2024-08-06 09:36:16',NULL,NULL),
(13,8,'Car Service',1,3800,'2024-08-06 09:40:03','2024-08-06 09:40:03',NULL,'17/07/2024\r\nFull Day Service at Guwahati'),
(14,8,'Extra Kms - 81 Km',81,20,'2024-08-06 09:40:03','2024-08-06 09:40:03',NULL,NULL),
(15,9,'Car Service',1,6500,'2024-08-06 09:44:24','2024-08-06 09:44:24',NULL,'17/07/2024\r\nGuwahati - Shillong - Guwahati'),
(16,9,'Extra Kms - 80 Kms',80,20,'2024-08-06 09:44:24','2024-08-06 09:44:24',NULL,NULL),
(17,9,'Driver Allowance for outstation',1,500,'2024-08-06 09:44:24','2024-08-06 09:44:24',NULL,NULL),
(18,9,'Parking & Toll',1,380,'2024-08-06 09:44:24','2024-08-06 09:44:24',NULL,NULL),
(19,10,'Car Service',1,2800,'2024-08-06 09:47:11','2024-08-06 09:47:11',NULL,'19/07/2024\r\nAirport Drop'),
(20,10,'Early Morning Charges',1,400,'2024-08-06 09:47:11','2024-08-06 09:47:11',NULL,NULL),
(21,11,'Car Service',1,2850,'2024-08-06 09:51:45','2024-08-06 09:51:45',NULL,'20/07/2024\r\nKolkata Airport - Rajpur'),
(22,11,'Parking',1,150,'2024-08-06 09:51:45','2024-08-06 09:51:45',NULL,NULL),
(23,12,'Car Service',1,2850,'2024-08-06 09:54:32','2024-08-06 09:54:32',NULL,'22/07/2024\r\nKolkata - Rajpur Airport Drop'),
(24,12,'Early Morning Charges',1,300,'2024-08-06 09:54:32','2024-08-06 09:54:32',NULL,NULL),
(25,13,'Car Service',1,6500,'2024-08-06 09:56:34','2024-08-06 09:56:34',NULL,'22/07/2024\r\nService at Aizawl\r\nAirport Pickup & Full Day Local Service'),
(26,14,'Car Service',1,3500,'2024-08-06 09:58:03','2024-08-06 09:58:03',NULL,'23/07/2024\r\nAizawl Airport Drop'),
(27,15,'Car Service',1,4000,'2024-08-06 10:02:27','2024-08-06 10:02:27',NULL,'23/07/2024\r\nCar Service at Silchar\r\nAirport Pickup & Full Day Local Service'),
(28,15,'Extra Kms - 53 Kms',53,20,'2024-08-06 10:02:27','2024-08-06 10:02:27',NULL,NULL),
(29,15,'Parking',1,160,'2024-08-06 10:02:27','2024-08-06 10:02:27',NULL,NULL),
(30,16,'Car Service',1,4000,'2024-08-06 10:04:24','2024-08-06 10:04:24',NULL,'24/07/2024\r\nLocal Car Service & Airport Drop at Silchar'),
(31,17,'Car Service',1,2850,'2024-08-06 10:06:22','2024-08-06 10:06:22',NULL,'24/07/2024\r\nCar Service at Kolkata \r\nAirport Pickup & Drop to Rajpur'),
(32,17,'Parking',1,150,'2024-08-06 10:06:22','2024-08-06 10:06:22',NULL,NULL),
(33,18,'Car Service',1,2850,'2024-08-06 10:08:32','2024-08-06 10:08:32',NULL,'29/07/2024\r\nService from Kolkata - Rajpur - Airport Drop'),
(34,18,'Early Morning Charges',1,300,'2024-08-06 10:08:32','2024-08-06 10:08:32',NULL,NULL),
(35,19,'Car Service',1,4000,'2024-08-06 10:10:47','2024-08-06 10:10:47',NULL,'Service at Guwahati\r\nAirport Pickup & Full day local service'),
(36,19,'Extra Hrs - 2hrs',2,250,'2024-08-06 10:10:47','2024-08-06 10:10:47',NULL,NULL),
(37,19,'Airport Parking',1,100,'2024-08-06 10:10:47','2024-08-06 10:10:47',NULL,NULL),
(38,20,'Car Service',1,9000,'2024-08-06 10:12:44','2024-08-06 10:12:44',NULL,'30/07/2024\r\nGuwahati to Shillong with Toll , Parking & Night Charges'),
(39,21,'Car Service',1,8500,'2024-08-06 10:14:12','2024-08-06 10:14:12',NULL,'31/07/2024\r\nShillong to Guwahati Local Service & Airport Drop'),
(40,22,'Car Service',1,2850,'2024-08-06 10:16:02','2024-08-06 10:16:02',NULL,'31/07/2024\r\nService from Kolkata Airport to Rajpur'),
(41,22,'Airport Parking',1,150,'2024-08-06 10:16:02','2024-08-06 10:16:02',NULL,NULL),
(42,23,'Car Service',1,3500,'2024-08-06 10:18:28','2024-08-06 10:18:28',NULL,'26/27/2024\r\nRajpur - Kalyani - Ranaghat - Rajpur'),
(43,23,'Parking & Toll',1,180,'2024-08-06 10:18:28','2024-08-06 10:18:28',NULL,NULL),
(47,27,'Car Service',434,22,'2024-08-08 09:04:52','2024-08-08 09:04:52',NULL,'11/07/2024 -12/07/2024\r\nKolkata - Burdwan - Kolkata'),
(48,27,'Toll & Parking',1,425,'2024-08-08 09:04:52','2024-08-08 09:04:52',NULL,NULL),
(49,27,'Night Stay Charges',1,750,'2024-08-08 09:04:52','2024-08-08 09:04:52',NULL,NULL),
(50,28,'Car Service',432,22,'2024-08-08 09:06:55','2024-08-08 09:06:55',NULL,'27/07/2024 - 28/07/2024\r\nKolkata - Burdwan - Kolkata'),
(51,28,'Toll & Parking',1,385,'2024-08-08 09:06:55','2024-08-08 09:06:55',NULL,NULL),
(52,28,'Night Stay Chaeges',1,750,'2024-08-08 09:06:55','2024-08-08 09:06:55',NULL,NULL),
(53,29,'Car Service',190,22,'2024-08-08 09:09:11','2024-08-08 09:09:11',NULL,'04/08/2024\r\nKolkata - Howrah Local Service & Return to Kolkata'),
(54,29,'Parking & Toll',1,241,'2024-08-08 09:09:11','2024-08-08 09:09:11',NULL,NULL),
(55,30,'Car Service',238,22,'2024-08-08 09:10:35','2024-08-08 09:10:35',NULL,'12/08/2024\r\nBurdwan - Bankura - Burdwan'),
(56,30,'Toll & Parking',1,220,'2024-08-08 09:10:35','2024-08-08 09:10:35',NULL,NULL),
(57,31,'Car Service',1,3500,'2024-08-08 10:09:22','2024-08-08 10:09:22',NULL,'15/07/2024\r\nAirport Pickup & Local Service at Bhubaneshwar with Parking'),
(58,32,'Car Service',1,3500,'2024-08-08 10:10:30','2024-08-08 10:10:30',NULL,'16/07/2024\r\nLocal Car Service at Bhubaneshwar & Airport Drop'),
(59,33,'Car Service',369,22,'2024-08-08 10:12:04','2024-08-08 10:12:04',NULL,'18/07/2024\r\nKolkata - Burdawan - Kolkata'),
(60,33,'Toll & Parking',1,285,'2024-08-08 10:12:04','2024-08-08 10:12:04',NULL,NULL),
(62,35,'Room Accommodation',1,2530,'2024-08-13 10:58:10','2024-08-13 10:58:10',NULL,'For Dr Pallavi Joshi\r\nCheck Inn - 10/08/2024\r\nCheck Out - 11/08/2024'),
(63,36,'Car Service',1,3150,'2024-09-04 09:28:38','2024-09-04 09:28:38',NULL,'Rajpur - Kolkata Airport'),
(64,36,'Early Morning Charges',1,200,'2024-09-04 09:28:38','2024-09-04 09:28:38',NULL,NULL),
(65,37,'Car Service',1,3150,'2024-09-04 09:29:54','2024-09-04 09:29:54',NULL,'For Dr. Anil Singh\r\nDisposal Basis'),
(66,38,'Car Service',1,3150,'2024-09-04 09:31:55','2024-09-04 09:31:55',NULL,'Kolkata Airport - Raypur'),
(67,38,'Parking',1,110,'2024-09-04 09:31:55','2024-09-04 09:31:55',NULL,NULL),
(68,39,'Car Service',1,3150,'2024-09-04 09:33:10','2024-09-04 09:33:10',NULL,'For Dr Anil Singh\r\nDisposal Basis'),
(69,39,'Parking',1,100,'2024-09-04 09:33:10','2024-09-04 09:33:10',NULL,NULL),
(70,39,'Night Charges',1,200,'2024-09-04 09:33:10','2024-09-04 09:33:10',NULL,NULL),
(71,40,'Car',1,1000,'2024-09-11 08:57:24','2024-09-11 08:57:24','1','Demo');

/*Table structure for table `invoices` */

DROP TABLE IF EXISTS `invoices`;

CREATE TABLE `invoices` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `company_name` varchar(255) DEFAULT NULL,
  `customer_name` varchar(255) DEFAULT NULL,
  `custmore_mobile` varchar(255) DEFAULT NULL,
  `custmore_email` varchar(255) DEFAULT NULL,
  `invoice_number` varchar(255) DEFAULT NULL,
  `invoice_date` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `total_amount` int(11) DEFAULT NULL,
  `tax_amount` int(11) DEFAULT NULL,
  `final_amount` int(11) DEFAULT NULL,
  `discount` int(11) DEFAULT NULL,
  `final_amount_after_discount` int(11) DEFAULT NULL,
  `tax_type` int(2) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `gst` varchar(255) DEFAULT NULL,
  `pan` varchar(255) DEFAULT NULL,
  `service` varchar(255) DEFAULT NULL,
  `event_date` varchar(255) DEFAULT NULL,
  `venue` varchar(255) DEFAULT NULL,
  `note` text DEFAULT NULL,
  `tax_for` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`,`created_at`,`updated_at`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `invoices` */

insert  into `invoices`(`id`,`company_name`,`customer_name`,`custmore_mobile`,`custmore_email`,`invoice_number`,`invoice_date`,`created_at`,`updated_at`,`total_amount`,`tax_amount`,`final_amount`,`discount`,`final_amount_after_discount`,`tax_type`,`address`,`gst`,`pan`,`service`,`event_date`,`venue`,`note`,`tax_for`) values 
(3,'b2b','Mr Sujit Banerjee','9903944349','b2beventz.kol@gmail.com','73/aug/24-25','06-08-2024','2024-08-06 09:26:21','2024-08-06 09:26:21',2850,143,2993,0,2993,5,'Rajpur, Rathtala,South 24Pgs ,Kolkata - 700149',NULL,NULL,'Car Service','15/7/24','Rajpur',NULL,'CGST & SGST'),
(5,'b2b','Mr Sujit Banerjee','9903944349','b2beventz.kol@gmail.com','74/aug/24-25','06-08-2024','2024-08-06 09:28:38','2024-08-06 09:28:38',3900,195,4095,0,4095,5,'Rajpur, Rathtala,South 24Pgs ,Kolkata - 700149',NULL,NULL,'Car Service','15/7/24','Agartala',NULL,'CGST & SGST'),
(6,'b2b','Mr Sujit Banerjee','9903944349','b2beventz.kol@gmail.com','75/aug/24-25','06-08-2024','2024-08-06 09:31:32','2024-08-06 09:31:32',2750,138,2888,0,2888,5,'Rajpur, Rathtala,South 24Pgs ,Kolkata - 700149',NULL,NULL,'Car Service','16/07/2024','Agartala',NULL,'CGST & SGST'),
(7,'b2b','Mr Sujit Banerjee','9903944349','b2beventz.kol@gmail.com','76/aug/24-25','06-08-2024','2024-08-06 09:36:16','2024-08-06 09:36:16',4400,220,4620,0,4620,5,'Rajpur, Rathtala,South 24Pgs ,Kolkata - 700149',NULL,NULL,'Car Service','16/07/2024','Guwahiti',NULL,'CGST & SGST'),
(8,'b2b','Mr Sujit Banerjee','9903944349','b2beventz.kol@gmail.com','77/aug/24-25','06-08-2024','2024-08-06 09:40:03','2024-08-06 09:40:03',5420,271,5691,0,5691,5,'Rajpur, Rathtala,South 24Pgs ,Kolkata - 700149',NULL,NULL,'Car Service','17/07/2024','Guwahiti',NULL,'CGST & SGST'),
(9,'b2b','Mr Sujit Banerjee','9903944349','b2beventz.kol@gmail.com','78/aug/24-25','06-08-2024','2024-08-06 09:44:24','2024-08-06 09:44:24',8980,449,9429,0,9429,5,'Rajpur, Rathtala,South 24Pgs ,Kolkata - 700149',NULL,NULL,'Car Service','18/07/2024','Guwahiti',NULL,'CGST & SGST'),
(10,'b2b','Mr Sujit Banerjee','9903944349','b2beventz.kol@gmail.com','79/aug/24-25','06-08-2024','2024-08-06 09:47:11','2024-08-06 09:47:11',3200,160,3360,0,3360,5,'Rajpur, Rathtala,South 24Pgs ,Kolkata - 700149',NULL,NULL,'Car Service','19/07/2024','Guwahiti',NULL,'CGST & SGST'),
(11,'b2b','Mr Sujit Banerjee','9903944349','b2beventz.kol@gmail.com','80/aug/24-25','06-08-2024','2024-08-06 09:51:45','2024-08-06 09:51:45',3000,150,3150,0,3150,5,'Rajpur, Rathtala,South 24Pgs ,Kolkata - 700149',NULL,NULL,'Car Service','20/07/2024','Kolkata',NULL,'CGST & SGST'),
(12,'b2b','Mr Sujit Banerjee','9903944349','b2beventz.kol@gmail.com','81/aug/24-25','06-08-2024','2024-08-06 09:54:32','2024-08-06 09:54:32',3150,158,3308,0,3308,5,'Rajpur, Rathtala,South 24Pgs ,Kolkata - 700149',NULL,NULL,'Car Service','22/07/2024','Kolkata',NULL,'CGST & SGST'),
(13,'b2b','Mr Sujit Banerjee','9903944349','b2beventz.kol@gmail.com','82/aug/24-25','06-08-2024','2024-08-06 09:56:34','2024-08-06 09:56:34',6500,325,6825,0,6825,5,'Rajpur, Rathtala,South 24Pgs ,Kolkata - 700149',NULL,NULL,'Car Service','22/07/2024','Aizwal',NULL,'CGST & SGST'),
(14,'b2b','Mr Sujit Banerjee','9903944349','b2beventz.kol@gmail.com','83/aug/24-25','06-08-2024','2024-08-06 09:58:03','2024-08-06 09:58:03',3500,175,3675,0,3675,5,'Rajpur, Rathtala,South 24Pgs ,Kolkata - 700149',NULL,NULL,'Car Service','23/07/2024','Aizwal',NULL,'CGST & SGST'),
(15,'b2b','Mr Sujit Banerjee','9903944349','b2beventz.kol@gmail.com','84/aug/24-25','06-08-2024','2024-08-06 10:02:27','2024-08-06 10:02:27',5220,261,5481,0,5481,5,'Rajpur, Rathtala,South 24Pgs ,Kolkata - 700149',NULL,NULL,'Car Service','23/07/2024','Silchar',NULL,'CGST & SGST'),
(16,'b2b','Mr Sujit Banerjee','9903944349','b2beventz.kol@gmail.com','85/aug/24-25','06-08-2024','2024-08-06 10:04:24','2024-08-06 10:04:24',4000,200,4200,0,4200,5,'Rajpur, Rathtala,South 24Pgs ,Kolkata - 700149',NULL,NULL,'Car Service','24/07/2024','Silchar',NULL,'CGST & SGST'),
(17,'b2b','Mr Sujit Banerjee','9903944349','b2beventz.kol@gmail.com','86/aug/24-25','06-08-2024','2024-08-06 10:06:22','2024-08-06 10:06:22',3000,150,3150,0,3150,5,'Rajpur, Rathtala,South 24Pgs ,Kolkata - 700149',NULL,NULL,'Car Service','24/07/2024','Kolkata',NULL,'CGST & SGST'),
(18,'b2b','Mr Sujit Banerjee','9903944349','b2beventz.kol@gmail.com','87/aug/24-25','06-08-2024','2024-08-06 10:08:32','2024-08-06 10:08:32',3150,158,3308,0,3308,5,'Rajpur, Rathtala,South 24Pgs ,Kolkata - 700149',NULL,NULL,'Car Service','29/07/2024','Kolkata',NULL,'CGST & SGST'),
(19,'b2b','Mr Sujit Banerjee','9903944349','b2beventz.kol@gmail.com','88/aug/24-25','06-08-2024','2024-08-06 10:10:47','2024-08-06 10:10:47',4600,230,4830,0,4830,5,'Rajpur, Rathtala,South 24Pgs ,Kolkata - 700149',NULL,NULL,'Car Service','29/07/2024','Guwahiti',NULL,'CGST & SGST'),
(20,'b2b','Mr Sujit Banerjee','9903944349','b2beventz.kol@gmail.com','89/aug/24-25','06-08-2024','2024-08-06 10:12:44','2024-08-06 10:12:44',9000,450,9450,0,9450,5,'Rajpur, Rathtala,South 24Pgs ,Kolkata - 700149',NULL,NULL,'Car Service','30/07/2024','Shillong',NULL,'CGST & SGST'),
(21,'b2b','Mr Sujit Banerjee','9903944349','b2beventz.kol@gmail.com','90/aug/24-25','06-08-2024','2024-08-06 10:14:12','2024-08-06 10:14:12',8500,425,8925,0,8925,5,'Rajpur, Rathtala,South 24Pgs ,Kolkata - 700149',NULL,NULL,'Car Service','31/07/2024','Guwahiti',NULL,'CGST & SGST'),
(22,'b2b','Mr Sujit Banerjee','9903944349','b2beventz.kol@gmail.com','91/aug/24-25','06-08-2024','2024-08-06 10:16:02','2024-08-06 10:16:02',3000,150,3150,0,3150,5,'Rajpur, Rathtala,South 24Pgs ,Kolkata - 700149',NULL,NULL,'Car Service','31/07/2024','Kolkata',NULL,'CGST & SGST'),
(23,'b2b','Mr Sujit Banerjee','9903944349','b2beventz.kol@gmail.com','92/aug/24-25','06-08-2024','2024-08-06 10:18:28','2024-08-06 10:18:28',3680,184,3864,0,3864,5,'Rajpur, Rathtala,South 24Pgs ,Kolkata - 700149',NULL,NULL,'Car Service','26/07/2024','Rajpur',NULL,'CGST & SGST'),
(27,'b2b','Mr. Indranil Banerjee',NULL,'b2beventz.kol@gmail.com','93/aug/24-25','08-08-2024','2024-08-08 09:04:52','2024-08-08 09:04:52',10506,525,11031,0,11031,5,'Green Field City, Sibrampore, Kolkata- 700141',NULL,NULL,'Car Service','11th & 12th July 2024','Kolkata',NULL,'CGST & SGST'),
(28,'b2b','Mr. Indranil Banerjee',NULL,'b2beventz.kol@gmail.com','94/aug/24-25','08-08-2024','2024-08-08 09:06:55','2024-08-08 09:06:55',10423,521,10944,0,10944,5,'Green Field City, Sibrampore, Kolkata- 700141',NULL,NULL,'Car Service','27th -28th July 2024','Kolkata',NULL,'CGST & SGST'),
(29,'b2b','Mr. Indranil Banerjee',NULL,'b2beventz.kol@gmail.com','95/aug/24-25','08-08-2024','2024-08-08 09:09:11','2024-08-08 09:09:11',4326,216,4542,0,4542,5,'Green Field City, Sibrampore, Kolkata- 700141',NULL,NULL,'Car Service','4/8/24','Kolkata',NULL,'CGST & SGST'),
(30,'b2b','Mr. Indranil Banerjee',NULL,'b2beventz.kol@gmail.com','96/aug/24-25','08-08-2024','2024-08-08 09:10:35','2024-08-08 09:10:35',5337,267,5604,0,5604,5,'Green Field City, Sibrampore, Kolkata- 700141',NULL,NULL,'Car Service','12/08/2024','Burdwan',NULL,'CGST & SGST'),
(31,'b2b','Mr. Indranil Banerjee',NULL,'b2beventz.kol@gmail.com','97/aug/24-25','08-08-2024','2024-08-08 10:09:22','2024-08-08 10:09:22',3500,175,3675,0,3675,5,'Green Field City, Sibrampore, Kolkata- 700141',NULL,NULL,'Car Service','15/7/2024','Bhubaneshwar',NULL,'CGST & SGST'),
(32,'b2b','Mr. Indranil Banerjee',NULL,'b2beventz.kol@gmail.com','98/aug/24-25','08-08-2024','2024-08-08 10:10:30','2024-08-08 10:10:30',3500,175,3675,0,3675,5,'Green Field City, Sibrampore, Kolkata- 700141',NULL,NULL,'Car Service','16/07/2024','Bhubaneshwar',NULL,'CGST & SGST'),
(33,'b2b','Mr. Indranil Banerjee',NULL,'b2beventz.kol@gmail.com','99/aug/24-25','08-08-2024','2024-08-08 10:12:04','2024-08-08 10:12:04',8219,411,8629,0,8629,5,'Green Field City, Sibrampore, Kolkata- 700141',NULL,NULL,'Car Service','18/07/2024','Kolkata',NULL,'CGST & SGST'),
(35,'b2b','FCM Travel Solution India PVT LTD',NULL,'b2beventz.kol@gmail.com','100/aug/24-25','13-08-2024','2024-08-13 10:58:10','2024-08-13 10:58:10',2530,455,2985,0,2985,18,'224 A , AJC BOSE ROAD ,KRISHNA BUILDING','19AAACF2674C1ZU',NULL,'Room Accommodation','10/08/2024','Cochin',NULL,'CGST & SGST'),
(36,'b2b','Mr Sujit Banerjee','9903944349','b2beventz.kol@gmail.com','101/sep/24-25','04-09-2024','2024-09-04 09:28:38','2024-09-04 09:28:38',3350,168,3518,0,3518,5,'Rajpur, Rathtala,South 24Pgs ,Kolkata - 700149',NULL,NULL,'Car Service','3/9/24','Kolkata',NULL,'CGST & SGST'),
(37,'b2b','Mr Sujit Banerjee','9903944349','b2beventz.kol@gmail.com','102/sep/24-25','04-09-2024','2024-09-04 09:29:54','2024-09-04 09:29:54',3150,158,3308,0,3308,5,'Rajpur, Rathtala,South 24Pgs ,Kolkata - 700149',NULL,NULL,'Car Service','13/8/24',NULL,NULL,'CGST & SGST'),
(38,'b2b','Mr Sujit Banerjee','9903944349','b2beventz.kol@gmail.com','103/sep/24-25','04-09-2024','2024-09-04 09:31:55','2024-09-04 09:31:55',3260,163,3423,0,3423,5,'Rajpur, Rathtala,South 24Pgs ,Kolkata - 700149',NULL,NULL,'Car Service','14/8/24','Kolkata',NULL,'CGST & SGST'),
(39,'b2b','Mr Sujit Banerjee','9903944349','b2beventz.kol@gmail.com','104/sep/24-25','04-09-2024','2024-09-04 09:33:10','2024-09-04 09:33:10',3450,173,3623,0,3623,5,'Rajpur, Rathtala,South 24Pgs ,Kolkata - 700149',NULL,NULL,'Car Service','14/8/24',NULL,NULL,'CGST & SGST'),
(40,'excel','Text Free','9879879878','tax@gmail.com','22/sep/24-25','11-09-2024','2024-09-11 08:57:24','2024-09-11 08:57:24',1000,0,1000,0,1000,0,'Pune',NULL,NULL,'Text Free','12 OCT 2024','Pune',NULL,'Free');

/*Table structure for table `job_batches` */

DROP TABLE IF EXISTS `job_batches`;

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `job_batches` */

/*Table structure for table `jobs` */

DROP TABLE IF EXISTS `jobs`;

CREATE TABLE `jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) unsigned NOT NULL,
  `reserved_at` int(10) unsigned DEFAULT NULL,
  `available_at` int(10) unsigned NOT NULL,
  `created_at` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `jobs` */

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `migrations` */

insert  into `migrations`(`id`,`migration`,`batch`) values 
(1,'0001_01_01_000000_create_users_table',1),
(2,'0001_01_01_000001_create_cache_table',1),
(3,'0001_01_01_000002_create_jobs_table',1),
(4,'2024_07_02_160853_add_tax_type_to_invoices_table',2);

/*Table structure for table `password_reset_tokens` */

DROP TABLE IF EXISTS `password_reset_tokens`;

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `password_reset_tokens` */

/*Table structure for table `sessions` */

DROP TABLE IF EXISTS `sessions`;

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `sessions` */

insert  into `sessions`(`id`,`user_id`,`ip_address`,`user_agent`,`payload`,`last_activity`) values 
('a4M5jiWTaHY9VZbFk6pgqDrWJCBSmrNanWcOhWEF',1,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36','YTo0OntzOjY6Il90b2tlbiI7czo0MDoiZ1JYcjYya3dGQWo5aGV1VUVIaXFsTk1OR0VhY3VJem1lOXpBQlpuQyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hZG1pbi9pbnZvaWNlL3BkZi8zIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTt9',1731041793),
('cnOHEFdZg9s9ZjfgRfMXIQgSZP89oawWl7HsuZ1r',1,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/128.0.0.0 Safari/537.36','YTo0OntzOjY6Il90b2tlbiI7czo0MDoiNHdaeFZyUXp0bmZ5dTEyQ2xJdGRGelRURTBsN0xmMGlLMXdyYkdtViI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hZG1pbi9kYXNoYm9hcmQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO30=',1726562928),
('Eokh9I9WPOKpK7lYPgSw5sMNEqhC3pCMHo0WMNpF',NULL,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/128.0.0.0 Safari/537.36','YTozOntzOjY6Il90b2tlbiI7czo0MDoidXZCdk9ybnVvTm5HcXdNaDJmQmI1NFlVUDRpZ0s0TEFwbnN0Vld1QSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',1726558303),
('isWOMyT9qNKkNI1iRyJB2kiXcBDuL6Ae3maHNPdj',NULL,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/128.0.0.0 Safari/537.36','YToyOntzOjY6Il90b2tlbiI7czo0MDoiUmsyNHlsc1RERU5KY1dFMW1HcXJjWklvU3AzNDM3MnBkQ3R6Vjg1ciI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',1726557815),
('kPEM8y7SuJTgyysxQ6EvqHNo63uAAtSO79voe2WG',1,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36','YTo0OntzOjY6Il90b2tlbiI7czo0MDoiRFYzZ0VtczV6OXlxeVhDREFIQ3paMmF3TlRUdzIzTDJLODFMVVVOcyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hZG1pbi9kYXNoYm9hcmQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO30=',1731572284),
('Y0wmlsdn0BB9IwtxJjsf2qluAooH6EoII97HART8',NULL,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/128.0.0.0 Safari/537.36','YTozOntzOjY6Il90b2tlbiI7czo0MDoiOWZaWnNmaDhUbVdYM1dXRk9BalQzWkNKRm16eTJ3clEwUUFRTFpzciI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fX0=',1726565196);

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role` enum('admin','subscriber') DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`name`,`email`,`email_verified_at`,`password`,`remember_token`,`created_at`,`updated_at`,`role`) values 
(1,'Admin','laravedev2024@gmail.com',NULL,'$2y$12$pTfo5cQjU08Z8xVucFhE2.cXjwnXJxSwVgqpGynWmA8w1ktrNUnIK','hFjcw8ZvkwTXwUtR8dQSjUIitIKxAiAJAMAT17uG8uZ2lqhNmoiPHSgxClZz','2024-05-10 05:42:46','2024-09-17 08:55:09','admin');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
