-- --------------------------------------------------------
-- Hostitel:                     localhost
-- Verze serveru:                10.4.20-MariaDB - mariadb.org binary distribution
-- OS serveru:                   Win64
-- HeidiSQL Verze:               11.3.0.6295
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Exportování struktury databáze pro
CREATE DATABASE IF NOT EXISTS `eshop` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `eshop`;

-- Exportování struktury pro tabulka eshop.cart
CREATE TABLE IF NOT EXISTS `cart` (
  `cartsId` int(11) NOT NULL AUTO_INCREMENT,
  `usersId` int(11) DEFAULT NULL,
  `productsId` int(11) DEFAULT NULL,
  `productsQuantity` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`cartsId`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=95 DEFAULT CHARSET=utf8mb4;

-- Exportování dat pro tabulku eshop.cart: ~14 rows (přibližně)
DELETE FROM `cart`;
/*!40000 ALTER TABLE `cart` DISABLE KEYS */;
INSERT INTO `cart` (`cartsId`, `usersId`, `productsId`, `productsQuantity`) VALUES
	(62, 71, 6, 4),
	(64, 71, 6, 0),
	(65, 71, 6, 0),
	(74, 71, 6, 0),
	(75, 71, 6, 0),
	(76, 53, 6, 0),
	(77, 53, 6, 0),
	(83, 73, 0, 0),
	(84, 73, 5, 2),
	(85, 73, 1, 2),
	(86, 73, 2, 3),
	(87, 74, 0, 0),
	(91, 74, 5, 1),
	(92, 74, 5, 1),
	(94, 74, 2, 2);
/*!40000 ALTER TABLE `cart` ENABLE KEYS */;

-- Exportování struktury pro tabulka eshop.order
CREATE TABLE IF NOT EXISTS `order` (
  `ordersId` int(11) NOT NULL,
  `usersId` int(11) NOT NULL,
  `status` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`ordersId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Exportování dat pro tabulku eshop.order: ~0 rows (přibližně)
DELETE FROM `order`;
/*!40000 ALTER TABLE `order` DISABLE KEYS */;
INSERT INTO `order` (`ordersId`, `usersId`, `status`) VALUES
	(0, 53, 'Vyřizuje se');
/*!40000 ALTER TABLE `order` ENABLE KEYS */;

-- Exportování struktury pro tabulka eshop.order_details
CREATE TABLE IF NOT EXISTS `order_details` (
  `ordersId` int(11) DEFAULT NULL,
  `productsId` int(11) DEFAULT NULL,
  `productsQuantity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Exportování dat pro tabulku eshop.order_details: ~0 rows (přibližně)
DELETE FROM `order_details`;
/*!40000 ALTER TABLE `order_details` DISABLE KEYS */;
INSERT INTO `order_details` (`ordersId`, `productsId`, `productsQuantity`) VALUES
	(0, 2, 3),
	(0, 1, 2);
/*!40000 ALTER TABLE `order_details` ENABLE KEYS */;

-- Exportování struktury pro tabulka eshop.products
CREATE TABLE IF NOT EXISTS `products` (
  `productsId` int(11) NOT NULL AUTO_INCREMENT,
  `productsName` varchar(50) NOT NULL,
  `productsPrice` float DEFAULT NULL,
  `productAvailable` int(11) DEFAULT 1,
  PRIMARY KEY (`productsId`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4;

-- Exportování dat pro tabulku eshop.products: ~6 rows (přibližně)
DELETE FROM `products`;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` (`productsId`, `productsName`, `productsPrice`, `productAvailable`) VALUES
	(1, 'Cacti Plant', 19.99, 1),
	(2, 'Cactus Plant', 11.99, 1),
	(4, 'Aloe Very Plant', 7.99, 1),
	(5, 'Succulent Plant', 5.99, 1),
	(6, 'Green Plant', 8.99, 1);
/*!40000 ALTER TABLE `products` ENABLE KEYS */;

-- Exportování struktury pro tabulka eshop.users
CREATE TABLE IF NOT EXISTS `users` (
  `usersId` int(11) NOT NULL AUTO_INCREMENT,
  `usersName` varchar(50) CHARACTER SET utf8mb4 NOT NULL,
  `usersEmail` varchar(128) CHARACTER SET utf8mb4 NOT NULL,
  `usersPwd` varchar(128) COLLATE utf8mb4_czech_ci NOT NULL,
  `usersRole` varchar(50) COLLATE utf8mb4_czech_ci DEFAULT NULL,
  PRIMARY KEY (`usersId`)
) ENGINE=InnoDB AUTO_INCREMENT=76 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_czech_ci;

-- Exportování dat pro tabulku eshop.users: ~5 rows (přibližně)
DELETE FROM `users`;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`usersId`, `usersName`, `usersEmail`, `usersPwd`, `usersRole`) VALUES
	(53, 'admin', 'admin@eshopu.cz', '$2y$10$wXsOLd6ZFcolBQYGvdlyye.3kETsuOC.k7zkoWfjqwKlSJj3XWL22', 'admin'),
	(64, 'a', '', '', 'admin '),
	(73, 'Miroslav Stejskal', 'czsondik@gmail.com', '$2y$10$UCFWC4NmhWqG91c8.OaqSOCN94chUavjZjqLFM12rZkoZDlyYFlLa', 'user'),
	(74, 'user', 'user@eshop.cz', '$2y$10$bQq2RmUSAdBn7xDTparK5.VNEcPvgCWg.4dVg2evAsTL8P3lzedsS', 'user'),
	(75, 'Kalhoty Gradient', 'axyx@df.cz', '$2y$10$EoyX.wNWMwRd7lnVLBqWXeE3NYhRLR.jl8rVdf..r.0VG8M9Ceh4C', 'user');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
