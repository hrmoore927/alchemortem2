/* 
database login username=root password=""
user login username=test@test.com password=1234
admin login username=admin@test.com password=111111
*/

DROP DATABASE IF EXISTS alchemortem;

CREATE DATABASE  IF NOT EXISTS `alchemortem` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `alchemortem`;
-- MySQL dump 10.13  Distrib 5.7.17, for macos10.12 (x86_64)
--
-- Host: localhost    Database: alchemortem
-- ------------------------------------------------------
-- Server version	5.7.19

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
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2018_02_05_031849_create_shippings_table',1),(2,'2018_02_06_163516_create_payment_table',1),(3,'2018_02_06_163819_create_users_table',1),(4,'2018_02_06_163918_create_password_resets_table',1),(5,'2018_02_06_164155_create_orders_table',1),(6,'2018_02_12_163426_create_products_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `orders` (
  `order_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `shipLine1` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipLine2` text COLLATE utf8mb4_unicode_ci,
  `shipCity` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipState` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipZip` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `custName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `orderDate` date NOT NULL,
  `shipDate` date DEFAULT NULL,
  `orderStatus` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'paid',
  `cart` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`order_id`),
  KEY `orders_user_id_foreign` (`user_id`),
  KEY `orderDate` (`orderDate`),
  CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
INSERT INTO `orders` VALUES (1,1,'75 Dilworth Circle','Apt 206','Asheville','NC','28806','Heather R Moore','2018-04-17',NULL,'paid','O:8:\"App\\Cart\":3:{s:5:\"items\";a:2:{i:2;a:3:{s:3:\"qty\";i:1;s:5:\"price\";i:20;s:4:\"item\";O:11:\"App\\Product\":26:{s:11:\"\0*\0fillable\";a:11:{i:0;s:11:\"productName\";i:1;s:6:\"image1\";i:2;s:6:\"image2\";i:3;s:6:\"image3\";i:4;s:6:\"image4\";i:5;s:11:\"description\";i:6;s:9:\"materials\";i:7;s:10:\"dimensions\";i:8;s:8:\"category\";i:9;s:5:\"price\";i:10;s:6:\"status\";}s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";N;s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:13:\"\0*\0attributes\";a:14:{s:2:\"id\";i:2;s:11:\"productName\";s:25:\"Snake Rib Earrings - Blue\";s:6:\"image1\";s:31:\"https://i.imgur.com/10Eo23d.jpg\";s:6:\"image2\";s:31:\"https://i.imgur.com/FRY8IdW.jpg\";s:6:\"image3\";N;s:6:\"image4\";N;s:11:\"description\";s:164:\"These snake rib earrings have been dyed blue and are attached with silver french hooks. There are 2 ribs on each earring with a small vertebrae just below the hook.\";s:9:\"materials\";s:42:\"snake ribs, vertebrae, silver french hooks\";s:10:\"dimensions\";s:6:\"2.5 in\";s:8:\"category\";s:8:\"earrings\";s:5:\"price\";i:20;s:6:\"status\";s:9:\"available\";s:10:\"created_at\";N;s:10:\"updated_at\";N;}s:11:\"\0*\0original\";a:14:{s:2:\"id\";i:2;s:11:\"productName\";s:25:\"Snake Rib Earrings - Blue\";s:6:\"image1\";s:31:\"https://i.imgur.com/10Eo23d.jpg\";s:6:\"image2\";s:31:\"https://i.imgur.com/FRY8IdW.jpg\";s:6:\"image3\";N;s:6:\"image4\";N;s:11:\"description\";s:164:\"These snake rib earrings have been dyed blue and are attached with silver french hooks. There are 2 ribs on each earring with a small vertebrae just below the hook.\";s:9:\"materials\";s:42:\"snake ribs, vertebrae, silver french hooks\";s:10:\"dimensions\";s:6:\"2.5 in\";s:8:\"category\";s:8:\"earrings\";s:5:\"price\";i:20;s:6:\"status\";s:9:\"available\";s:10:\"created_at\";N;s:10:\"updated_at\";N;}s:10:\"\0*\0changes\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:8:\"\0*\0dates\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:10:\"timestamps\";b:1;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}}i:3;a:3:{s:3:\"qty\";i:1;s:5:\"price\";i:30;s:4:\"item\";O:11:\"App\\Product\":26:{s:11:\"\0*\0fillable\";a:11:{i:0;s:11:\"productName\";i:1;s:6:\"image1\";i:2;s:6:\"image2\";i:3;s:6:\"image3\";i:4;s:6:\"image4\";i:5;s:11:\"description\";i:6;s:9:\"materials\";i:7;s:10:\"dimensions\";i:8;s:8:\"category\";i:9;s:5:\"price\";i:10;s:6:\"status\";}s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";N;s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:13:\"\0*\0attributes\";a:14:{s:2:\"id\";i:3;s:11:\"productName\";s:32:\"Ombre Green Bead Vertebrae Hoops\";s:6:\"image1\";s:31:\"https://i.imgur.com/55tKUXW.jpg\";s:6:\"image2\";s:31:\"https://i.imgur.com/RgxRb0Z.jpg\";s:6:\"image3\";N;s:6:\"image4\";N;s:11:\"description\";s:73:\"These hoops have multiple vertebrae separated by ombre style green beads.\";s:9:\"materials\";s:57:\"vertebrae, silver french hooks, green beads, silver hoops\";s:10:\"dimensions\";s:4:\"45mm\";s:8:\"category\";s:8:\"earrings\";s:5:\"price\";i:30;s:6:\"status\";s:9:\"available\";s:10:\"created_at\";N;s:10:\"updated_at\";N;}s:11:\"\0*\0original\";a:14:{s:2:\"id\";i:3;s:11:\"productName\";s:32:\"Ombre Green Bead Vertebrae Hoops\";s:6:\"image1\";s:31:\"https://i.imgur.com/55tKUXW.jpg\";s:6:\"image2\";s:31:\"https://i.imgur.com/RgxRb0Z.jpg\";s:6:\"image3\";N;s:6:\"image4\";N;s:11:\"description\";s:73:\"These hoops have multiple vertebrae separated by ombre style green beads.\";s:9:\"materials\";s:57:\"vertebrae, silver french hooks, green beads, silver hoops\";s:10:\"dimensions\";s:4:\"45mm\";s:8:\"category\";s:8:\"earrings\";s:5:\"price\";i:30;s:6:\"status\";s:9:\"available\";s:10:\"created_at\";N;s:10:\"updated_at\";N;}s:10:\"\0*\0changes\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:8:\"\0*\0dates\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:10:\"timestamps\";b:1;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}}}s:8:\"totalQty\";i:2;s:10:\"totalPrice\";i:50;}','ch_1CHvLGEdsB1900pk1OayS4s1','2018-04-17 19:03:36','2018-04-17 19:03:36'),(2,3,'198 kimberly ave','apt1','asheville','nc','28801','miguel','2018-04-24',NULL,'paid','O:8:\"App\\Cart\":3:{s:5:\"items\";a:4:{i:10;a:3:{s:3:\"qty\";i:1;s:5:\"price\";i:25;s:4:\"item\";O:11:\"App\\Product\":27:{s:11:\"\0*\0fillable\";a:11:{i:0;s:11:\"productName\";i:1;s:6:\"image1\";i:2;s:6:\"image2\";i:3;s:6:\"image3\";i:4;s:6:\"image4\";i:5;s:11:\"description\";i:6;s:9:\"materials\";i:7;s:10:\"dimensions\";i:8;s:8:\"category\";i:9;s:5:\"price\";i:10;s:6:\"status\";}s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";N;s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:13:\"\0*\0attributes\";a:14:{s:2:\"id\";i:10;s:11:\"productName\";s:28:\"Snake Rib Earrings - Rainbow\";s:6:\"image1\";s:31:\"https://i.imgur.com/wCQLm8q.jpg\";s:6:\"image2\";s:31:\"https://i.imgur.com/WBEdv4M.jpg\";s:6:\"image3\";s:31:\"https://i.imgur.com/39FmveJ.jpg\";s:6:\"image4\";N;s:11:\"description\";s:143:\"These snake rib earrings have been dyed multiple colors on the tips and are attached with brass french hooks. There are 5 ribs on each earring.\";s:9:\"materials\";s:31:\"snake ribs, silver french hooks\";s:10:\"dimensions\";s:4:\"3 in\";s:8:\"category\";s:8:\"earrings\";s:5:\"price\";i:25;s:6:\"status\";s:9:\"available\";s:10:\"created_at\";N;s:10:\"updated_at\";N;}s:11:\"\0*\0original\";a:14:{s:2:\"id\";i:10;s:11:\"productName\";s:28:\"Snake Rib Earrings - Rainbow\";s:6:\"image1\";s:31:\"https://i.imgur.com/wCQLm8q.jpg\";s:6:\"image2\";s:31:\"https://i.imgur.com/WBEdv4M.jpg\";s:6:\"image3\";s:31:\"https://i.imgur.com/39FmveJ.jpg\";s:6:\"image4\";N;s:11:\"description\";s:143:\"These snake rib earrings have been dyed multiple colors on the tips and are attached with brass french hooks. There are 5 ribs on each earring.\";s:9:\"materials\";s:31:\"snake ribs, silver french hooks\";s:10:\"dimensions\";s:4:\"3 in\";s:8:\"category\";s:8:\"earrings\";s:5:\"price\";i:25;s:6:\"status\";s:9:\"available\";s:10:\"created_at\";N;s:10:\"updated_at\";N;}s:10:\"\0*\0changes\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:8:\"\0*\0dates\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:10:\"timestamps\";b:1;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}s:16:\"\0*\0scoutMetadata\";a:0:{}}}i:3;a:3:{s:3:\"qty\";i:1;s:5:\"price\";i:30;s:4:\"item\";O:11:\"App\\Product\":27:{s:11:\"\0*\0fillable\";a:11:{i:0;s:11:\"productName\";i:1;s:6:\"image1\";i:2;s:6:\"image2\";i:3;s:6:\"image3\";i:4;s:6:\"image4\";i:5;s:11:\"description\";i:6;s:9:\"materials\";i:7;s:10:\"dimensions\";i:8;s:8:\"category\";i:9;s:5:\"price\";i:10;s:6:\"status\";}s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";N;s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:13:\"\0*\0attributes\";a:14:{s:2:\"id\";i:3;s:11:\"productName\";s:32:\"Ombre Green Bead Vertebrae Hoops\";s:6:\"image1\";s:31:\"https://i.imgur.com/55tKUXW.jpg\";s:6:\"image2\";s:31:\"https://i.imgur.com/RgxRb0Z.jpg\";s:6:\"image3\";N;s:6:\"image4\";N;s:11:\"description\";s:73:\"These hoops have multiple vertebrae separated by ombre style green beads.\";s:9:\"materials\";s:57:\"vertebrae, silver french hooks, green beads, silver hoops\";s:10:\"dimensions\";s:4:\"45mm\";s:8:\"category\";s:8:\"earrings\";s:5:\"price\";i:30;s:6:\"status\";s:9:\"available\";s:10:\"created_at\";N;s:10:\"updated_at\";N;}s:11:\"\0*\0original\";a:14:{s:2:\"id\";i:3;s:11:\"productName\";s:32:\"Ombre Green Bead Vertebrae Hoops\";s:6:\"image1\";s:31:\"https://i.imgur.com/55tKUXW.jpg\";s:6:\"image2\";s:31:\"https://i.imgur.com/RgxRb0Z.jpg\";s:6:\"image3\";N;s:6:\"image4\";N;s:11:\"description\";s:73:\"These hoops have multiple vertebrae separated by ombre style green beads.\";s:9:\"materials\";s:57:\"vertebrae, silver french hooks, green beads, silver hoops\";s:10:\"dimensions\";s:4:\"45mm\";s:8:\"category\";s:8:\"earrings\";s:5:\"price\";i:30;s:6:\"status\";s:9:\"available\";s:10:\"created_at\";N;s:10:\"updated_at\";N;}s:10:\"\0*\0changes\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:8:\"\0*\0dates\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:10:\"timestamps\";b:1;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}s:16:\"\0*\0scoutMetadata\";a:0:{}}}i:1;a:3:{s:3:\"qty\";i:1;s:5:\"price\";i:25;s:4:\"item\";O:11:\"App\\Product\":27:{s:11:\"\0*\0fillable\";a:11:{i:0;s:11:\"productName\";i:1;s:6:\"image1\";i:2;s:6:\"image2\";i:3;s:6:\"image3\";i:4;s:6:\"image4\";i:5;s:11:\"description\";i:6;s:9:\"materials\";i:7;s:10:\"dimensions\";i:8;s:8:\"category\";i:9;s:5:\"price\";i:10;s:6:\"status\";}s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";N;s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:13:\"\0*\0attributes\";a:14:{s:2:\"id\";i:1;s:11:\"productName\";s:26:\"Snake Rib Earrings - Black\";s:6:\"image1\";s:31:\"https://i.imgur.com/tvtH4G7.jpg\";s:6:\"image2\";s:31:\"https://i.imgur.com/hBTIGR7.jpg\";s:6:\"image3\";s:31:\"https://i.imgur.com/Cr3jKd1.jpg\";s:6:\"image4\";N;s:11:\"description\";s:121:\"These snake rib earrings have been dyed black and are attached with brass french hooks. There are 5 ribs on each earring.\";s:9:\"materials\";s:30:\"snake ribs, brass french hooks\";s:10:\"dimensions\";s:6:\"2.5 in\";s:8:\"category\";s:8:\"earrings\";s:5:\"price\";i:25;s:6:\"status\";s:9:\"available\";s:10:\"created_at\";N;s:10:\"updated_at\";N;}s:11:\"\0*\0original\";a:14:{s:2:\"id\";i:1;s:11:\"productName\";s:26:\"Snake Rib Earrings - Black\";s:6:\"image1\";s:31:\"https://i.imgur.com/tvtH4G7.jpg\";s:6:\"image2\";s:31:\"https://i.imgur.com/hBTIGR7.jpg\";s:6:\"image3\";s:31:\"https://i.imgur.com/Cr3jKd1.jpg\";s:6:\"image4\";N;s:11:\"description\";s:121:\"These snake rib earrings have been dyed black and are attached with brass french hooks. There are 5 ribs on each earring.\";s:9:\"materials\";s:30:\"snake ribs, brass french hooks\";s:10:\"dimensions\";s:6:\"2.5 in\";s:8:\"category\";s:8:\"earrings\";s:5:\"price\";i:25;s:6:\"status\";s:9:\"available\";s:10:\"created_at\";N;s:10:\"updated_at\";N;}s:10:\"\0*\0changes\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:8:\"\0*\0dates\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:10:\"timestamps\";b:1;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}s:16:\"\0*\0scoutMetadata\";a:0:{}}}i:8;a:3:{s:3:\"qty\";i:1;s:5:\"price\";i:30;s:4:\"item\";O:11:\"App\\Product\":27:{s:11:\"\0*\0fillable\";a:11:{i:0;s:11:\"productName\";i:1;s:6:\"image1\";i:2;s:6:\"image2\";i:3;s:6:\"image3\";i:4;s:6:\"image4\";i:5;s:11:\"description\";i:6;s:9:\"materials\";i:7;s:10:\"dimensions\";i:8;s:8:\"category\";i:9;s:5:\"price\";i:10;s:6:\"status\";}s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";N;s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:13:\"\0*\0attributes\";a:14:{s:2:\"id\";i:8;s:11:\"productName\";s:30:\"Medium Vertabrae Hoops - Black\";s:6:\"image1\";s:31:\"https://i.imgur.com/8xb2kN8.jpg\";s:6:\"image2\";s:31:\"https://i.imgur.com/BexrRZ6.jpg\";s:6:\"image3\";s:31:\"https://i.imgur.com/z0SETjI.jpg\";s:6:\"image4\";N;s:11:\"description\";s:125:\"These vertebrae have been dyed black and are attached with silver french hooks. There are multiple vertebrae on each earring.\";s:9:\"materials\";s:44:\"vertebrae, silver french hooks, silver hoops\";s:10:\"dimensions\";s:4:\"45mm\";s:8:\"category\";s:8:\"earrings\";s:5:\"price\";i:30;s:6:\"status\";s:9:\"available\";s:10:\"created_at\";N;s:10:\"updated_at\";N;}s:11:\"\0*\0original\";a:14:{s:2:\"id\";i:8;s:11:\"productName\";s:30:\"Medium Vertabrae Hoops - Black\";s:6:\"image1\";s:31:\"https://i.imgur.com/8xb2kN8.jpg\";s:6:\"image2\";s:31:\"https://i.imgur.com/BexrRZ6.jpg\";s:6:\"image3\";s:31:\"https://i.imgur.com/z0SETjI.jpg\";s:6:\"image4\";N;s:11:\"description\";s:125:\"These vertebrae have been dyed black and are attached with silver french hooks. There are multiple vertebrae on each earring.\";s:9:\"materials\";s:44:\"vertebrae, silver french hooks, silver hoops\";s:10:\"dimensions\";s:4:\"45mm\";s:8:\"category\";s:8:\"earrings\";s:5:\"price\";i:30;s:6:\"status\";s:9:\"available\";s:10:\"created_at\";N;s:10:\"updated_at\";N;}s:10:\"\0*\0changes\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:8:\"\0*\0dates\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:10:\"timestamps\";b:1;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}s:16:\"\0*\0scoutMetadata\";a:0:{}}}}s:8:\"totalQty\";i:4;s:10:\"totalPrice\";i:110;}','ch_1CKSPIEdsB1900pkCa9gmGGe','2018-04-24 18:46:14','2018-04-24 18:46:14'),(3,4,'ghghg',NULL,'hghg','hghghg','28806','Rob','2018-04-24',NULL,'paid','O:8:\"App\\Cart\":3:{s:5:\"items\";a:1:{i:2;a:3:{s:3:\"qty\";i:1;s:5:\"price\";i:20;s:4:\"item\";O:11:\"App\\Product\":27:{s:11:\"\0*\0fillable\";a:11:{i:0;s:11:\"productName\";i:1;s:6:\"image1\";i:2;s:6:\"image2\";i:3;s:6:\"image3\";i:4;s:6:\"image4\";i:5;s:11:\"description\";i:6;s:9:\"materials\";i:7;s:10:\"dimensions\";i:8;s:8:\"category\";i:9;s:5:\"price\";i:10;s:6:\"status\";}s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";N;s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:13:\"\0*\0attributes\";a:14:{s:2:\"id\";i:2;s:11:\"productName\";s:25:\"Snake Rib Earrings - Blue\";s:6:\"image1\";s:31:\"https://i.imgur.com/10Eo23d.jpg\";s:6:\"image2\";s:31:\"https://i.imgur.com/FRY8IdW.jpg\";s:6:\"image3\";N;s:6:\"image4\";N;s:11:\"description\";s:164:\"These snake rib earrings have been dyed blue and are attached with silver french hooks. There are 2 ribs on each earring with a small vertebrae just below the hook.\";s:9:\"materials\";s:42:\"snake ribs, vertebrae, silver french hooks\";s:10:\"dimensions\";s:6:\"2.5 in\";s:8:\"category\";s:8:\"earrings\";s:5:\"price\";i:20;s:6:\"status\";s:9:\"available\";s:10:\"created_at\";N;s:10:\"updated_at\";N;}s:11:\"\0*\0original\";a:14:{s:2:\"id\";i:2;s:11:\"productName\";s:25:\"Snake Rib Earrings - Blue\";s:6:\"image1\";s:31:\"https://i.imgur.com/10Eo23d.jpg\";s:6:\"image2\";s:31:\"https://i.imgur.com/FRY8IdW.jpg\";s:6:\"image3\";N;s:6:\"image4\";N;s:11:\"description\";s:164:\"These snake rib earrings have been dyed blue and are attached with silver french hooks. There are 2 ribs on each earring with a small vertebrae just below the hook.\";s:9:\"materials\";s:42:\"snake ribs, vertebrae, silver french hooks\";s:10:\"dimensions\";s:6:\"2.5 in\";s:8:\"category\";s:8:\"earrings\";s:5:\"price\";i:20;s:6:\"status\";s:9:\"available\";s:10:\"created_at\";N;s:10:\"updated_at\";N;}s:10:\"\0*\0changes\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:8:\"\0*\0dates\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:10:\"timestamps\";b:1;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}s:16:\"\0*\0scoutMetadata\";a:0:{}}}}s:8:\"totalQty\";i:1;s:10:\"totalPrice\";i:20;}','ch_1CKSk7EdsB1900pk4Q3YWMq3','2018-04-24 19:07:45','2018-04-24 19:07:45'),(4,2,'234 jkllkd',NULL,'Asheville','nc','28803','Uma','2018-04-24',NULL,'paid','O:8:\"App\\Cart\":3:{s:5:\"items\";a:1:{i:2;a:3:{s:3:\"qty\";i:1;s:5:\"price\";i:20;s:4:\"item\";O:11:\"App\\Product\":27:{s:11:\"\0*\0fillable\";a:11:{i:0;s:11:\"productName\";i:1;s:6:\"image1\";i:2;s:6:\"image2\";i:3;s:6:\"image3\";i:4;s:6:\"image4\";i:5;s:11:\"description\";i:6;s:9:\"materials\";i:7;s:10:\"dimensions\";i:8;s:8:\"category\";i:9;s:5:\"price\";i:10;s:6:\"status\";}s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";N;s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:13:\"\0*\0attributes\";a:14:{s:2:\"id\";i:2;s:11:\"productName\";s:25:\"Snake Rib Earrings - Blue\";s:6:\"image1\";s:31:\"https://i.imgur.com/10Eo23d.jpg\";s:6:\"image2\";s:31:\"https://i.imgur.com/FRY8IdW.jpg\";s:6:\"image3\";N;s:6:\"image4\";N;s:11:\"description\";s:164:\"These snake rib earrings have been dyed blue and are attached with silver french hooks. There are 2 ribs on each earring with a small vertebrae just below the hook.\";s:9:\"materials\";s:42:\"snake ribs, vertebrae, silver french hooks\";s:10:\"dimensions\";s:6:\"2.5 in\";s:8:\"category\";s:8:\"earrings\";s:5:\"price\";i:20;s:6:\"status\";s:9:\"available\";s:10:\"created_at\";N;s:10:\"updated_at\";N;}s:11:\"\0*\0original\";a:14:{s:2:\"id\";i:2;s:11:\"productName\";s:25:\"Snake Rib Earrings - Blue\";s:6:\"image1\";s:31:\"https://i.imgur.com/10Eo23d.jpg\";s:6:\"image2\";s:31:\"https://i.imgur.com/FRY8IdW.jpg\";s:6:\"image3\";N;s:6:\"image4\";N;s:11:\"description\";s:164:\"These snake rib earrings have been dyed blue and are attached with silver french hooks. There are 2 ribs on each earring with a small vertebrae just below the hook.\";s:9:\"materials\";s:42:\"snake ribs, vertebrae, silver french hooks\";s:10:\"dimensions\";s:6:\"2.5 in\";s:8:\"category\";s:8:\"earrings\";s:5:\"price\";i:20;s:6:\"status\";s:9:\"available\";s:10:\"created_at\";N;s:10:\"updated_at\";N;}s:10:\"\0*\0changes\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:8:\"\0*\0dates\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:10:\"timestamps\";b:1;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}s:16:\"\0*\0scoutMetadata\";a:0:{}}}}s:8:\"totalQty\";i:1;s:10:\"totalPrice\";i:20;}','ch_1CKTRxEdsB1900pk83LthbUs','2018-04-24 19:53:03','2018-04-24 19:53:03'),(5,1,'75 Dilworth Circle','Apt 206','Asheville','NC','28806','Heather R Moore','2018-04-26',NULL,'paid','O:8:\"App\\Cart\":3:{s:5:\"items\";a:1:{i:2;a:3:{s:3:\"qty\";i:1;s:5:\"price\";i:20;s:4:\"item\";O:11:\"App\\Product\":27:{s:11:\"\0*\0fillable\";a:11:{i:0;s:11:\"productName\";i:1;s:6:\"image1\";i:2;s:6:\"image2\";i:3;s:6:\"image3\";i:4;s:6:\"image4\";i:5;s:11:\"description\";i:6;s:9:\"materials\";i:7;s:10:\"dimensions\";i:8;s:8:\"category\";i:9;s:5:\"price\";i:10;s:6:\"status\";}s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";N;s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:13:\"\0*\0attributes\";a:14:{s:2:\"id\";i:2;s:11:\"productName\";s:25:\"Snake Rib Earrings - Blue\";s:6:\"image1\";s:32:\"https://i.imgur.com/10Eo23dl.jpg\";s:6:\"image2\";s:32:\"https://i.imgur.com/FRY8IdWl.jpg\";s:6:\"image3\";N;s:6:\"image4\";N;s:11:\"description\";s:164:\"These snake rib earrings have been dyed blue and are attached with silver french hooks. There are 2 ribs on each earring with a small vertebrae just below the hook.\";s:9:\"materials\";s:42:\"snake ribs, vertebrae, silver french hooks\";s:10:\"dimensions\";s:6:\"2.5 in\";s:8:\"category\";s:8:\"earrings\";s:5:\"price\";i:20;s:6:\"status\";s:9:\"available\";s:10:\"created_at\";N;s:10:\"updated_at\";N;}s:11:\"\0*\0original\";a:14:{s:2:\"id\";i:2;s:11:\"productName\";s:25:\"Snake Rib Earrings - Blue\";s:6:\"image1\";s:32:\"https://i.imgur.com/10Eo23dl.jpg\";s:6:\"image2\";s:32:\"https://i.imgur.com/FRY8IdWl.jpg\";s:6:\"image3\";N;s:6:\"image4\";N;s:11:\"description\";s:164:\"These snake rib earrings have been dyed blue and are attached with silver french hooks. There are 2 ribs on each earring with a small vertebrae just below the hook.\";s:9:\"materials\";s:42:\"snake ribs, vertebrae, silver french hooks\";s:10:\"dimensions\";s:6:\"2.5 in\";s:8:\"category\";s:8:\"earrings\";s:5:\"price\";i:20;s:6:\"status\";s:9:\"available\";s:10:\"created_at\";N;s:10:\"updated_at\";N;}s:10:\"\0*\0changes\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:8:\"\0*\0dates\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:10:\"timestamps\";b:1;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}s:16:\"\0*\0scoutMetadata\";a:0:{}}}}s:8:\"totalQty\";i:1;s:10:\"totalPrice\";i:20;}','ch_1CL0aQEdsB1900pkPkngqBVu','2018-04-26 07:15:59','2018-04-26 07:15:59'),(6,1,'test',NULL,'test','NC','28806','Heather R Moore','2018-04-26',NULL,'paid','O:8:\"App\\Cart\":3:{s:5:\"items\";a:1:{i:4;a:3:{s:3:\"qty\";i:1;s:5:\"price\";i:25;s:4:\"item\";O:11:\"App\\Product\":27:{s:11:\"\0*\0fillable\";a:11:{i:0;s:11:\"productName\";i:1;s:6:\"image1\";i:2;s:6:\"image2\";i:3;s:6:\"image3\";i:4;s:6:\"image4\";i:5;s:11:\"description\";i:6;s:9:\"materials\";i:7;s:10:\"dimensions\";i:8;s:8:\"category\";i:9;s:5:\"price\";i:10;s:6:\"status\";}s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";N;s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:13:\"\0*\0attributes\";a:14:{s:2:\"id\";i:4;s:11:\"productName\";s:16:\"Jawbone Earrings\";s:6:\"image1\";s:32:\"https://i.imgur.com/5BfMPm5l.jpg\";s:6:\"image2\";s:32:\"https://i.imgur.com/zbBrZJLl.jpg\";s:6:\"image3\";s:32:\"https://i.imgur.com/kIcM6Hcl.jpg\";s:6:\"image4\";N;s:11:\"description\";s:69:\"These jawbone earrings are attached by chain with brass french hooks.\";s:9:\"materials\";s:40:\"jawbone, brass french hooks, brass chain\";s:10:\"dimensions\";s:7:\"3.75 in\";s:8:\"category\";s:8:\"earrings\";s:5:\"price\";i:25;s:6:\"status\";s:9:\"available\";s:10:\"created_at\";N;s:10:\"updated_at\";N;}s:11:\"\0*\0original\";a:14:{s:2:\"id\";i:4;s:11:\"productName\";s:16:\"Jawbone Earrings\";s:6:\"image1\";s:32:\"https://i.imgur.com/5BfMPm5l.jpg\";s:6:\"image2\";s:32:\"https://i.imgur.com/zbBrZJLl.jpg\";s:6:\"image3\";s:32:\"https://i.imgur.com/kIcM6Hcl.jpg\";s:6:\"image4\";N;s:11:\"description\";s:69:\"These jawbone earrings are attached by chain with brass french hooks.\";s:9:\"materials\";s:40:\"jawbone, brass french hooks, brass chain\";s:10:\"dimensions\";s:7:\"3.75 in\";s:8:\"category\";s:8:\"earrings\";s:5:\"price\";i:25;s:6:\"status\";s:9:\"available\";s:10:\"created_at\";N;s:10:\"updated_at\";N;}s:10:\"\0*\0changes\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:8:\"\0*\0dates\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:10:\"timestamps\";b:1;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}s:16:\"\0*\0scoutMetadata\";a:0:{}}}}s:8:\"totalQty\";i:1;s:10:\"totalPrice\";i:25;}','ch_1CL0dBEdsB1900pkNc0uBhtI','2018-04-26 07:18:50','2018-04-26 07:18:50');
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `payment`
--

DROP TABLE IF EXISTS `payment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `payment` (
  `payment_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `payment_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`payment_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `payment`
--

LOCK TABLES `payment` WRITE;
/*!40000 ALTER TABLE `payment` DISABLE KEYS */;
INSERT INTO `payment` VALUES (1,'Stripe'),(2,'Square');
/*!40000 ALTER TABLE `payment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `products` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `productName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image4` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `materials` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dimensions` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `productName` (`productName`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (1,'Snake Rib Earrings - Black','https://i.imgur.com/tvtH4G7l.jpg','https://i.imgur.com/hBTIGR7l.jpg','https://i.imgur.com/Cr3jKd1l.jpg',NULL,'These snake rib earrings have been dyed black and are attached with brass french hooks. There are 5 ribs on each earring.','snake ribs, brass french hooks','2.5 in','earrings',25,'available',NULL,NULL),(2,'Snake Rib Earrings - Blue','https://i.imgur.com/10Eo23dl.jpg','https://i.imgur.com/FRY8IdWl.jpg',NULL,NULL,'These snake rib earrings have been dyed blue and are attached with silver french hooks. There are 2 ribs on each earring with a small vertebrae just below the hook.','snake ribs, vertebrae, silver french hooks','2.5 in','earrings',20,'available',NULL,NULL),(3,'Ombre Green Bead Vertebrae Hoops','https://i.imgur.com/55tKUXWl.jpg','https://i.imgur.com/RgxRb0Zl.jpg',NULL,NULL,'These hoops have multiple vertebrae separated by ombre style green beads.','vertebrae, silver french hooks, green beads, silver hoops','45mm','earrings',30,'sold',NULL,'2018-04-25 07:32:58'),(4,'Jawbone Earrings','https://i.imgur.com/5BfMPm5l.jpg','https://i.imgur.com/zbBrZJLl.jpg','https://i.imgur.com/kIcM6Hcl.jpg',NULL,'These jawbone earrings are attached by chain with brass french hooks.','jawbone, brass french hooks, brass chain','3.75 in','earrings',25,'available',NULL,NULL),(5,'Large Vertebrae Hoops','https://i.imgur.com/V1mCYq3l.jpg','https://i.imgur.com/qsHA6Mhl.jpg','https://i.imgur.com/HvU4VCtl.jpg','https://i.imgur.com/X8HWyHv.jpg','These vertebrae hoops have multiple vertebrae per hoop. The earrings have a leverback closing.','vertebrae, leverback silver hoops','70mm','earrings',35,'available',NULL,NULL),(6,'Medium Vertebrae Hoops - Purple','https://i.imgur.com/ONBhVe9l.jpg','https://i.imgur.com/Ci69uSql.jpg','https://i.imgur.com/o9e2V1El.jpg',NULL,'These silver hoops encircle a single vertebrae per earring topped by ombre purple beads. There hoops include silver french hooks.','vertebrae, silver french hooks, purple beads, silver hoops','45mm','earrings',30,'available',NULL,NULL),(7,'Medium Vertebrae Hoops','https://i.imgur.com/xoIzl6kl.jpg','https://i.imgur.com/91bfPdSl.jpg','https://i.imgur.com/286cwqul.jpg',NULL,'These vertebrae are attached with silver french hooks. There are multiple vertebrae on each earring.','vertebrae, silver french hooks, silver hoops','45mm','earrings',30,'available',NULL,NULL),(8,'Medium Vertabrae Hoops - Black','https://i.imgur.com/8xb2kN8l.jpg','https://i.imgur.com/BexrRZ6l.jpg','https://i.imgur.com/z0SETjIl.jpg',NULL,'These vertebrae have been dyed black and are attached with silver french hooks. There are multiple vertebrae on each earring.','vertebrae, silver french hooks, silver hoops','45mm','earrings',30,'sold',NULL,'2018-04-25 07:32:40'),(9,'African Porcupine Quill Earrings','https://i.imgur.com/Bn6dTMel.jpg','https://i.imgur.com/f5Ik2pzl.jpg',NULL,NULL,'These earrings hold one black porcupine quill per earring. The quills are topped with two aqua blue beads and silver french hooks.','quills, silver french hooks','5 in','earrings',20,'available',NULL,NULL),(10,'Snake Rib Earrings - Rainbow','https://i.imgur.com/wCQLm8ql.jpg','https://i.imgur.com/WBEdv4Ml.jpg','https://i.imgur.com/39FmveJl.jpg',NULL,'These snake rib earrings have been dyed multiple colors on the tips and are attached with brass french hooks. There are 5 ribs on each earring.','snake ribs, silver french hooks','3 in','earrings',25,'available',NULL,NULL),(11,'Small 4 Vertebrae Hoops','https://i.imgur.com/2BaADQml.jpg','https://i.imgur.com/8XuTcfYl.jpg','https://i.imgur.com/cdIbh8Nl.jpg',NULL,'These brass hoops encircle 4 vertebrae. The hoops include brass french hooks','vertebrae, brass french hooks, brass hoops','30mm','earrings',25,'available',NULL,NULL),(12,'Small Vertebrae Earrings','https://i.imgur.com/E8aRSzKl.jpg','https://i.imgur.com/WxbdzvJl.jpg','https://i.imgur.com/PhXdSgBl.jpg',NULL,'These vertebrae are attached with brass french hooks. There are multiple vertebrae on each earring.','vertebrae, brass french hooks, brass hoops','30mm','earrings',25,'available',NULL,NULL),(13,'Stingray Barb Earrings','https://i.imgur.com/Ic1bG76l.jpg','https://i.imgur.com/8Z9fDOdl.jpg','https://i.imgur.com/tkWHtghl.jpg',NULL,'These earrings hold one stingray barb per earring. They are held by brass french hooks.','stingray barb, brass french hooks','5.5 in','earrings',20,'available',NULL,NULL),(14,'Snake Rib Earrings','https://i.imgur.com/3ZWTyLbl.jpg','https://i.imgur.com/x2mhKNrl.jpg','https://i.imgur.com/dvj0aBIl.jpg',NULL,'These snake rib earrings are attached with brass french hooks. There is one rib on each earring with a small vertebrae just below the hook.','snake rib, vertebrae, brass french hooks','3 in','earrings',20,'available',NULL,NULL);
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `shippings`
--

DROP TABLE IF EXISTS `shippings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `shippings` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `shipLine1` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipLine2` text COLLATE utf8mb4_unicode_ci,
  `shipCity` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipState` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipZip` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shippings`
--

LOCK TABLES `shippings` WRITE;
/*!40000 ALTER TABLE `shippings` DISABLE KEYS */;
/*!40000 ALTER TABLE `shippings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `fName` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lName` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(70) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Heather','Moore','hrmoore927@gmail.com','$2y$10$obGP0MQ7p7Czv5vMn78xG.rh0NdQVOhW8eOl4WC7iRhdNM.5CrLUy','admin','pcQns4uMZpGlf6nS7EIcy2iqB2VUesi88gHjKbJcNwu0VHw7Pb6k9F2PHvfh','2018-04-17 19:00:43','2018-04-19 18:42:49'),(2,'test','test','test@test.com','$2y$10$dH26fqwJtirEpvQQszZ9qubSS/A.b2GuAImeGLW9DwpbTDnAx.i2y','user','CbepMwlopuMWWmkkq1c1siIcR2V5g8Bb9rnvBFwIecKKub24bZSwiYgRyEzT','2018-04-24 06:38:53','2018-04-24 06:38:53'),(3,'miguel','tejeda','miguel@aol.com','$2y$10$YO1JA0V6lQcgql2UHpC33OYPzAKZeCpzUDvh/8XcR8/7uugYXVKRy','user','H0x8FeOwbD0CKpEDHr87IKbzE57yjRKGMy4n5B3o9tMaioXjitQgU9AR155R','2018-04-24 18:43:52','2018-04-24 18:43:52'),(4,'Rob','P','rob@rob.com','$2y$10$XZ7eIb1dvNUXcDYU8H5uU.Kcw3ge8cD4HXOmp5s3Jm3EM3h/S20Pu','user','IG2lkrh8UjYW5ILCrYlcdoJF4vHLfMpwCrmrvPlXkCJWdIYUmD7NsyC6T0Cv','2018-04-24 19:01:50','2018-04-24 19:01:50'),(7,'Admin','Test','admin@test.com','$2y$10$npzJwjK9P0VDtlmGlvoln.4krhjsM9huSov5EkDI6oSKUvs.WxBwe','admin',NULL,'2018-05-01 02:54:20','2018-05-01 02:54:20');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'alchemortem'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-04-30 18:56:26
