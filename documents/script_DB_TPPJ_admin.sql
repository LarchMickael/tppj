-- --------------------------------------------------------
-- Hôte :                        127.0.0.1
-- Version du serveur:           5.5.46-0ubuntu0.14.04.2 - (Ubuntu)
-- SE du serveur:                debian-linux-gnu
-- HeidiSQL Version:             9.3.0.4984
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Export de la structure de la base pour tppjdb
DROP DATABASE IF EXISTS `tppjdb`;
CREATE DATABASE IF NOT EXISTS `tppjdb` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci */;
USE `tppjdb`;


-- Export de la structure de table tppjdb. tpj_countries
DROP TABLE IF EXISTS `tpj_countries`;
CREATE TABLE IF NOT EXISTS `tpj_countries` (
  `cou_code` varchar(3) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cou_label` tinytext COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`cou_code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Export de données de la table tppjdb.tpj_countries : ~0 rows (environ)
/*!40000 ALTER TABLE `tpj_countries` DISABLE KEYS */;
/*!40000 ALTER TABLE `tpj_countries` ENABLE KEYS */;


-- Export de la structure de table tppjdb. tpj_diets
DROP TABLE IF EXISTS `tpj_diets`;
CREATE TABLE IF NOT EXISTS `tpj_diets` (
  `die_id` int(11) NOT NULL AUTO_INCREMENT,
  `die_label` tinytext COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`die_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Export de données de la table tppjdb.tpj_diets : ~0 rows (environ)
/*!40000 ALTER TABLE `tpj_diets` DISABLE KEYS */;
/*!40000 ALTER TABLE `tpj_diets` ENABLE KEYS */;


-- Export de la structure de table tppjdb. tpj_ingredients
DROP TABLE IF EXISTS `tpj_ingredients`;
CREATE TABLE IF NOT EXISTS `tpj_ingredients` (
  `ing_id` int(11) NOT NULL AUTO_INCREMENT,
  `ing_label` tinytext COLLATE utf8mb4_unicode_ci NOT NULL,
  `unt_id` int(11) NOT NULL,
  `unt_id_tpj_units` int(11) NOT NULL,
  PRIMARY KEY (`ing_id`),
  KEY `FK_tpj_ingredients_unt_id_tpj_units` (`unt_id_tpj_units`),
  CONSTRAINT `FK_tpj_ingredients_unt_id_tpj_units` FOREIGN KEY (`unt_id_tpj_units`) REFERENCES `tpj_units` (`unt_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Export de données de la table tppjdb.tpj_ingredients : ~0 rows (environ)
/*!40000 ALTER TABLE `tpj_ingredients` DISABLE KEYS */;
/*!40000 ALTER TABLE `tpj_ingredients` ENABLE KEYS */;


-- Export de la structure de table tppjdb. tpj_meals
DROP TABLE IF EXISTS `tpj_meals`;
CREATE TABLE IF NOT EXISTS `tpj_meals` (
  `mea_id` int(11) NOT NULL AUTO_INCREMENT,
  `mea_label` tinytext COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`mea_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Export de données de la table tppjdb.tpj_meals : ~0 rows (environ)
/*!40000 ALTER TABLE `tpj_meals` DISABLE KEYS */;
/*!40000 ALTER TABLE `tpj_meals` ENABLE KEYS */;


-- Export de la structure de table tppjdb. tpj_permissions
DROP TABLE IF EXISTS `tpj_permissions`;
CREATE TABLE IF NOT EXISTS `tpj_permissions` (
  `per_id` int(11) NOT NULL AUTO_INCREMENT,
  `per_label` tinytext COLLATE utf8mb4_unicode_ci NOT NULL,
  `per_desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`per_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Export de données de la table tppjdb.tpj_permissions : ~0 rows (environ)
/*!40000 ALTER TABLE `tpj_permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `tpj_permissions` ENABLE KEYS */;


-- Export de la structure de table tppjdb. tpj_recipes
DROP TABLE IF EXISTS `tpj_recipes`;
CREATE TABLE IF NOT EXISTS `tpj_recipes` (
  `rec_id` int(11) NOT NULL AUTO_INCREMENT,
  `rec_label` tinytext COLLATE utf8mb4_unicode_ci NOT NULL,
  `rec_link` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `rec_tppj` char(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mea_id` int(11) NOT NULL,
  `die_id` int(11) NOT NULL,
  `cou_code` varchar(3) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`rec_id`),
  CONSTRAINT `FK_tpj_recipes_cou_code` FOREIGN KEY (`cou_code`) REFERENCES `tpj_countries` (`cou_code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Export de données de la table tppjdb.tpj_recipes : ~0 rows (environ)
/*!40000 ALTER TABLE `tpj_recipes` DISABLE KEYS */;
/*!40000 ALTER TABLE `tpj_recipes` ENABLE KEYS */;


-- Export de la structure de table tppjdb. tpj_recipes_contain_ingredients
DROP TABLE IF EXISTS `tpj_recipes_contain_ingredients`;
CREATE TABLE IF NOT EXISTS `tpj_recipes_contain_ingredients` (
  `quantity` int(11) NOT NULL,
  `ing_id` int(11) NOT NULL,
  `rec_id` int(11) NOT NULL,
  PRIMARY KEY (`ing_id`,`rec_id`),
  KEY `FK_tpj_recipes_contain_ingredients_rec_id` (`rec_id`),
  CONSTRAINT `FK_tpj_recipes_contain_ingredients_rec_id` FOREIGN KEY (`rec_id`) REFERENCES `tpj_recipes` (`rec_id`),
  CONSTRAINT `FK_tpj_recipes_contain_ingredients_ing_id` FOREIGN KEY (`ing_id`) REFERENCES `tpj_ingredients` (`ing_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Export de données de la table tppjdb.tpj_recipes_contain_ingredients : ~0 rows (environ)
/*!40000 ALTER TABLE `tpj_recipes_contain_ingredients` DISABLE KEYS */;
/*!40000 ALTER TABLE `tpj_recipes_contain_ingredients` ENABLE KEYS */;


-- Export de la structure de table tppjdb. tpj_recipes_fit_diets
DROP TABLE IF EXISTS `tpj_recipes_fit_diets`;
CREATE TABLE IF NOT EXISTS `tpj_recipes_fit_diets` (
  `rec_id` int(11) NOT NULL,
  `die_id` int(11) NOT NULL,
  PRIMARY KEY (`rec_id`,`die_id`),
  KEY `FK_tpj_recipes_fit_diets_die_id` (`die_id`),
  CONSTRAINT `FK_tpj_recipes_fit_diets_die_id` FOREIGN KEY (`die_id`) REFERENCES `tpj_diets` (`die_id`),
  CONSTRAINT `FK_tpj_recipes_fit_diets_rec_id` FOREIGN KEY (`rec_id`) REFERENCES `tpj_recipes` (`rec_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Export de données de la table tppjdb.tpj_recipes_fit_diets : ~0 rows (environ)
/*!40000 ALTER TABLE `tpj_recipes_fit_diets` DISABLE KEYS */;
/*!40000 ALTER TABLE `tpj_recipes_fit_diets` ENABLE KEYS */;


-- Export de la structure de table tppjdb. tpj_recipes_is_meals
DROP TABLE IF EXISTS `tpj_recipes_is_meals`;
CREATE TABLE IF NOT EXISTS `tpj_recipes_is_meals` (
  `mea_id` int(11) NOT NULL,
  `rec_id` int(11) NOT NULL,
  PRIMARY KEY (`mea_id`,`rec_id`),
  KEY `FK_tpj_recipes_is_meals_rec_id` (`rec_id`),
  CONSTRAINT `FK_tpj_recipes_is_meals_rec_id` FOREIGN KEY (`rec_id`) REFERENCES `tpj_recipes` (`rec_id`),
  CONSTRAINT `FK_tpj_recipes_is_meals_mea_id` FOREIGN KEY (`mea_id`) REFERENCES `tpj_meals` (`mea_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Export de données de la table tppjdb.tpj_recipes_is_meals : ~0 rows (environ)
/*!40000 ALTER TABLE `tpj_recipes_is_meals` DISABLE KEYS */;
/*!40000 ALTER TABLE `tpj_recipes_is_meals` ENABLE KEYS */;


-- Export de la structure de table tppjdb. tpj_roles
DROP TABLE IF EXISTS `tpj_roles`;
CREATE TABLE IF NOT EXISTS `tpj_roles` (
  `rol_id` int(11) NOT NULL AUTO_INCREMENT,
  `rol_label` tinytext COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`rol_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Export de données de la table tppjdb.tpj_roles : ~0 rows (environ)
/*!40000 ALTER TABLE `tpj_roles` DISABLE KEYS */;
/*!40000 ALTER TABLE `tpj_roles` ENABLE KEYS */;


-- Export de la structure de table tppjdb. tpj_roles_as_permissions
DROP TABLE IF EXISTS `tpj_roles_has_permissions`;
CREATE TABLE IF NOT EXISTS `tpj_roles_as_permissions` (
  `rol_id` int(11) NOT NULL,
  `per_id` int(11) NOT NULL,
  PRIMARY KEY (`rol_id`,`per_id`),
  KEY `FK_tpj_roles_as_permissions_per_id` (`per_id`),
  CONSTRAINT `FK_tpj_roles_as_permissions_per_id` FOREIGN KEY (`per_id`) REFERENCES `tpj_permissions` (`per_id`),
  CONSTRAINT `FK_tpj_roles_as_permissions_rol_id` FOREIGN KEY (`rol_id`) REFERENCES `tpj_roles` (`rol_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Export de données de la table tppjdb.tpj_roles_as_permissions : ~0 rows (environ)
/*!40000 ALTER TABLE `tpj_roles_as_permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `tpj_roles_as_permissions` ENABLE KEYS */;


-- Export de la structure de table tppjdb. tpj_units
DROP TABLE IF EXISTS `tpj_units`;
CREATE TABLE IF NOT EXISTS `tpj_units` (
  `unt_id` int(11) NOT NULL AUTO_INCREMENT,
  `unt_label` tinytext COLLATE utf8mb4_unicode_ci NOT NULL,
  `ing_id` int(11) NOT NULL,
  PRIMARY KEY (`unt_id`),
  KEY `FK_tpj_units_ing_id` (`ing_id`),
  CONSTRAINT `FK_tpj_units_ing_id` FOREIGN KEY (`ing_id`) REFERENCES `tpj_ingredients` (`ing_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Export de données de la table tppjdb.tpj_units : ~0 rows (environ)
/*!40000 ALTER TABLE `tpj_units` DISABLE KEYS */;
/*!40000 ALTER TABLE `tpj_units` ENABLE KEYS */;


-- Export de la structure de table tppjdb. tpj_users
DROP TABLE IF EXISTS `tpj_users`;
CREATE TABLE IF NOT EXISTS `tpj_users` (
  `use_id` int(11) NOT NULL AUTO_INCREMENT,
  `use_login` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `use_password` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `use_lastname` tinytext COLLATE utf8mb4_unicode_ci,
  `use_firstname` tinytext COLLATE utf8mb4_unicode_ci,
  `use_mail` text COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`use_id`),
  UNIQUE KEY `use_login` (`use_login`,`use_password`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Export de données de la table tppjdb.tpj_users : ~0 rows (environ)
/*!40000 ALTER TABLE `tpj_users` DISABLE KEYS */;
REPLACE INTO `tpj_users` (`use_id`, `use_login`, `use_password`, `use_lastname`, `use_firstname`, `use_mail`) VALUES
	(1, 'Tropos', 'ed1031d3008c28f5e5bac226fea5454680f09f09', NULL, NULL, NULL);
/*!40000 ALTER TABLE `tpj_users` ENABLE KEYS */;


-- Export de la structure de table tppjdb. tpj_users_get_roles
DROP TABLE IF EXISTS `tpj_users_get_roles`;
CREATE TABLE IF NOT EXISTS `tpj_users_get_roles` (
  `use_id` int(11) NOT NULL,
  `rol_id` int(11) NOT NULL,
  PRIMARY KEY (`use_id`,`rol_id`),
  KEY `FK_tpj_users_get_roles_rol_id` (`rol_id`),
  CONSTRAINT `FK_tpj_users_get_roles_rol_id` FOREIGN KEY (`rol_id`) REFERENCES `tpj_roles` (`rol_id`),
  CONSTRAINT `FK_tpj_users_get_roles_use_id` FOREIGN KEY (`use_id`) REFERENCES `tpj_users` (`use_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Export de données de la table tppjdb.tpj_users_get_roles : ~0 rows (environ)
/*!40000 ALTER TABLE `tpj_users_get_roles` DISABLE KEYS */;
/*!40000 ALTER TABLE `tpj_users_get_roles` ENABLE KEYS */;


-- Export de la structure de table tppjdb. tpj_users_recipes
DROP TABLE IF EXISTS `tpj_users_recipes`;
CREATE TABLE IF NOT EXISTS `tpj_users_recipes` (
  `use_id` int(11) NOT NULL,
  `rec_id` int(11) NOT NULL,
  PRIMARY KEY (`use_id`,`rec_id`),
  KEY `FK_tpj_users_recipes_rec_id` (`rec_id`),
  CONSTRAINT `FK_tpj_users_recipes_rec_id` FOREIGN KEY (`rec_id`) REFERENCES `tpj_recipes` (`rec_id`),
  CONSTRAINT `FK_tpj_users_recipes_use_id` FOREIGN KEY (`use_id`) REFERENCES `tpj_users` (`use_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Export de données de la table tppjdb.tpj_users_recipes : ~0 rows (environ)
/*!40000 ALTER TABLE `tpj_users_recipes` DISABLE KEYS */;
/*!40000 ALTER TABLE `tpj_users_recipes` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
