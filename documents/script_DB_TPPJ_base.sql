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

USE `tppjfryodljokeur`;


-- Export de la structure de table tppjdb. tpj_countries
DROP TABLE IF EXISTS `tpj_countries`;
CREATE TABLE IF NOT EXISTS `tpj_countries` (
  `cou_code` varchar(3) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cou_name` tinytext COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`cou_code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Export de données de la table tppjdb.tpj_countries : ~249 rows (environ)
/*!40000 ALTER TABLE `tpj_countries` DISABLE KEYS */;
REPLACE INTO `tpj_countries` (`cou_code`, `cou_name`) VALUES
	('ABW', 'Aruba'),
	('AFG', 'Afghanistan'),
	('AGO', 'Angola'),
	('AIA', 'Anguilla'),
	('ALA', 'Îles Åland'),
	('ALB', 'Albanie'),
	('AND', 'Andorre'),
	('ARE', 'Émirats arabes unis'),
	('ARG', 'Argentine'),
	('ARM', 'Arménie'),
	('ASM', 'Samoa américaines'),
	('ATA', 'Antarctique'),
	('ATF', 'Terres australes et antarctiques françaises'),
	('ATG', 'Antigua-et-Barbuda'),
	('AUS', 'Australie'),
	('AUT', 'Autriche'),
	('AZE', 'Azerbaïdjan'),
	('BDI', 'Burundi'),
	('BEL', 'Belgique'),
	('BEN', 'Bénin'),
	('BES', 'Pays-Bas caribéens'),
	('BFA', 'Burkina Faso'),
	('BGD', 'Bangladesh'),
	('BGR', 'Bulgarie'),
	('BHR', 'Bahreïn'),
	('BHS', 'Bahamas'),
	('BIH', 'Bosnie-Herzégovine'),
	('BLM', 'Saint-Barthélemy'),
	('BLR', 'Biélorussie'),
	('BLZ', 'Belize'),
	('BMU', 'Bermudes'),
	('BOL', 'Bolivie'),
	('BRA', 'Brésil'),
	('BRB', 'Barbade'),
	('BRN', 'Brunei'),
	('BTN', 'Bhoutan'),
	('BVT', 'Île Bouvet'),
	('BWA', 'Botswana'),
	('CAF', 'République centrafricaine'),
	('CAN', 'Canada'),
	('CCK', 'Îles Cocos'),
	('CHE', 'Suisse'),
	('CHL', 'Chili'),
	('CHN', 'Chine'),
	('CIV', 'Côte d\'Ivoire'),
	('CMR', 'Cameroun'),
	('COD', 'République démocratique du Congo'),
	('COG', 'République du Congo'),
	('COK', 'Îles Cook'),
	('COL', 'Colombie'),
	('COM', 'Comores (pays)'),
	('CPV', 'Cap-Vert'),
	('CRI', 'Costa Rica'),
	('CUB', 'Cuba'),
	('CUW', 'Curaçao'),
	('CXR', 'Île Christmas'),
	('CYM', 'Îles Caïmans'),
	('CYP', 'Chypre (pays)'),
	('CZE', 'République tchèque'),
	('DEU', 'Allemagne'),
	('DJI', 'Djibouti'),
	('DMA', 'Dominique'),
	('DNK', 'Danemark'),
	('DOM', 'République dominicaine'),
	('DZA', 'Algérie'),
	('ECU', 'Équateur (pays)'),
	('EGY', 'Égypte'),
	('ERI', 'Érythrée'),
	('ESH', 'République arabe sahraouie démocratique'),
	('ESP', 'Espagne'),
	('EST', 'Estonie'),
	('ETH', 'Éthiopie'),
	('FIN', 'Finlande'),
	('FJI', 'Fidji'),
	('FLK', 'Malouines'),
	('FRA', 'France'),
	('FRO', 'Îles Féroé'),
	('FSM', 'Micronésie (pays)'),
	('GAB', 'Gabon'),
	('GBR', 'Royaume-Uni'),
	('GEO', 'Géorgie (pays)'),
	('GGY', 'Guernesey'),
	('GHA', 'Ghana'),
	('GIB', 'Gibraltar'),
	('GIN', 'Guinée'),
	('GLP', 'Guadeloupe'),
	('GMB', 'Gambie'),
	('GNB', 'Guinée-Bissau'),
	('GNQ', 'Guinée équatoriale'),
	('GRC', 'Grèce'),
	('GRD', 'Grenade (pays)'),
	('GRL', 'Groenland'),
	('GTM', 'Guatemala'),
	('GUF', 'Guyane'),
	('GUM', 'Guam'),
	('GUY', 'Guyana'),
	('HKG', 'Hong Kong'),
	('HMD', 'Îles Heard-et-MacDonald'),
	('HND', 'Honduras'),
	('HRV', 'Croatie'),
	('HTI', 'Haïti'),
	('HUN', 'Hongrie'),
	('IDN', 'Indonésie'),
	('IMN', 'Île de Man'),
	('IND', 'Inde'),
	('IOT', 'Territoire britannique de l\'océan Indien'),
	('IRL', 'Irlande (pays)'),
	('IRN', 'Iran'),
	('IRQ', 'Irak'),
	('ISL', 'Islande'),
	('ISR', 'Israël'),
	('ITA', 'Italie'),
	('JAM', 'Jamaïque'),
	('JEY', 'Jersey'),
	('JOR', 'Jordanie'),
	('JPN', 'Japon'),
	('KAZ', 'Kazakhstan'),
	('KEN', 'Kenya'),
	('KGZ', 'Kirghizistan'),
	('KHM', 'Cambodge'),
	('KIR', 'Kiribati'),
	('KNA', 'Saint-Christophe-et-Niévès'),
	('KOR', 'Corée du Sud'),
	('KWT', 'Koweït'),
	('LAO', 'Laos'),
	('LBN', 'Liban'),
	('LBR', 'Liberia'),
	('LBY', 'Libye'),
	('LCA', 'Sainte-Lucie'),
	('LIE', 'Liechtenstein'),
	('LKA', 'Sri Lanka'),
	('LSO', 'Lesotho'),
	('LTU', 'Lituanie'),
	('LUX', 'Luxembourg(pays)'),
	('LVA', 'Lettonie'),
	('MAC', 'Macao'),
	('MAF', 'Saint-Martin'),
	('MAR', 'Maroc'),
	('MCO', 'Monaco'),
	('MDA', 'Moldavie'),
	('MDG', 'Madagascar'),
	('MDV', 'Maldives'),
	('MEX', 'Mexique'),
	('MHL', 'Îles Marshall(pays)'),
	('MKD', 'Macédoine (pays)'),
	('MLI', 'Mali'),
	('MLT', 'Malte'),
	('MMR', 'Birmanie'),
	('MNE', 'Monténégro'),
	('MNG', 'Mongolie'),
	('MNP', 'Îles Mariannes du Nord'),
	('MOZ', 'Mozambique'),
	('MRT', 'Mauritanie'),
	('MSR', 'Montserrat'),
	('MTQ', 'Martinique'),
	('MUS', 'Maurice (pays)'),
	('MWI', 'Malawi'),
	('MYS', 'Malaisie'),
	('MYT', 'Mayotte'),
	('NAM', 'Namibie'),
	('NCL', 'Nouvelle-Calédonie'),
	('NER', 'Niger'),
	('NFK', 'Île Norfolk'),
	('NGA', 'Nigeria'),
	('NIC', 'Nicaragua'),
	('NIU', 'Niue'),
	('NLD', 'Pays-Bas'),
	('NOR', 'Norvège'),
	('NPL', 'Népal'),
	('NRU', 'Nauru'),
	('NZL', 'Nouvelle-Zélande'),
	('OMN', 'Oman'),
	('PAK', 'Pakistan'),
	('PAN', 'Panama'),
	('PCN', 'Îles Pitcairn'),
	('PER', 'Pérou'),
	('PHL', 'Philippines'),
	('PLW', 'Palaos'),
	('PNG', 'Papouasie-Nouvelle-Guinée'),
	('POL', 'Pologne'),
	('PRI', 'Porto Rico'),
	('PRK', 'Corée du Nord'),
	('PRT', 'Portugal'),
	('PRY', 'Paraguay'),
	('PSE', 'Palestine'),
	('PYF', 'Polynésie française'),
	('QAT', 'Qatar'),
	('REU', 'La Réunion'),
	('ROU', 'Roumanie'),
	('RUS', 'Russie'),
	('RWA', 'Rwanda'),
	('SAU', 'Arabie saoudite'),
	('SDN', 'Soudan'),
	('SEN', 'Sénégal'),
	('SGP', 'Singapour'),
	('SGS', 'Géorgie du Sud-et-les Îles Sandwich du Sud'),
	('SHN', 'Sainte-Hélène, Ascension et Tristan da Cunha'),
	('SJM', 'Svalbard et ile Jan Mayen'),
	('SLB', 'Salomon'),
	('SLE', 'Sierra Leone'),
	('SLV', 'Salvador'),
	('SMR', 'Saint-Marin'),
	('SOM', 'Somalie'),
	('SPM', 'Saint-Pierre-et-Miquelon'),
	('SRB', 'Serbie'),
	('SSD', 'Soudan du Sud'),
	('STP', 'Sao Tomé-et-Principe'),
	('SUR', 'Suriname'),
	('SVK', 'Slovaquie'),
	('SVN', 'Slovénie'),
	('SWE', 'Suède'),
	('SWZ', 'Swaziland'),
	('SXM', 'Sint Maarten'),
	('SYC', 'Seychelles'),
	('SYR', 'Syrie'),
	('TCA', 'Îles Turques-et-Caïques'),
	('TCD', 'Tchad'),
	('TGO', 'Togo'),
	('THA', 'Thaïlande'),
	('TJK', 'Tadjikistan'),
	('TKL', 'Tokelau'),
	('TKM', 'Turkménistan'),
	('TLS', 'Timor oriental'),
	('TON', 'Tonga'),
	('TTO', 'Trinité-et-Tobago'),
	('TUN', 'Tunisie'),
	('TUR', 'Turquie'),
	('TUV', 'Tuvalu'),
	('TWN', 'Taïwan / (République de Chine (Taïwan))'),
	('TZA', 'Tanzanie'),
	('UGA', 'Ouganda'),
	('UKR', 'Ukraine'),
	('UMI', 'Îles mineures éloignées des États-Unis'),
	('URY', 'Uruguay'),
	('USA', 'États-Unis'),
	('UZB', 'Ouzbékistan'),
	('VAT', 'Saint-Siège (État de la Cité du Vatican)'),
	('VCT', 'Saint-Vincent-et-les Grenadines'),
	('VEN', 'Venezuela'),
	('VGB', 'Îles Vierges britanniques'),
	('VIR', 'Îles Vierges des États-Unis'),
	('VNM', 'Viêt Nam'),
	('VUT', 'Vanuatu'),
	('WLF', 'Wallis-et-Futuna'),
	('WSM', 'Samoa'),
	('YEM', 'Yémen'),
	('ZAF', 'Afrique du Sud'),
	('ZMB', 'Zambie'),
	('ZWE', 'Zimbabwe');
/*!40000 ALTER TABLE `tpj_countries` ENABLE KEYS */;


-- Export de la structure de table tppjdb. tpj_diets
DROP TABLE IF EXISTS `tpj_diets`;
CREATE TABLE IF NOT EXISTS `tpj_diets` (
  `die_id` int(11) NOT NULL AUTO_INCREMENT,
  `die_label` tinytext COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`die_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Export de données de la table tppjdb.tpj_diets : ~3 rows (environ)
/*!40000 ALTER TABLE `tpj_diets` DISABLE KEYS */;
REPLACE INTO `tpj_diets` (`die_id`, `die_label`) VALUES
	(1, '$content[\'choice_diet_omni\']'),
	(2, '$content[\'choice_diet_vegel\']'),
	(3, '$content[\'choice_diet_veger\']');
/*!40000 ALTER TABLE `tpj_diets` ENABLE KEYS */;


-- Export de la structure de table tppjdb. tpj_ingredients
DROP TABLE IF EXISTS `tpj_ingredients`;
CREATE TABLE IF NOT EXISTS `tpj_ingredients` (
  `ing_id` int(11) NOT NULL AUTO_INCREMENT,
  `ing_label` tinytext COLLATE utf8mb4_unicode_ci NOT NULL,
  `unt_id` int(11) NOT NULL,
  PRIMARY KEY (`ing_id`),
  KEY `unt_id` (`unt_id`),
  CONSTRAINT `unt_id` FOREIGN KEY (`unt_id`) REFERENCES `tpj_units` (`unt_id`)
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Export de données de la table tppjdb.tpj_meals : ~3 rows (environ)
/*!40000 ALTER TABLE `tpj_meals` DISABLE KEYS */;
REPLACE INTO `tpj_meals` (`mea_id`, `mea_label`) VALUES
	(1, '$content[\'choice_meal_morning\']'),
	(2, '$content[\'choice_meal_noon\']'),
	(3, '$content[\'choice_meal_evening\']');
/*!40000 ALTER TABLE `tpj_meals` ENABLE KEYS */;


-- Export de la structure de table tppjdb. tpj_permissions
DROP TABLE IF EXISTS `tpj_permissions`;
CREATE TABLE IF NOT EXISTS `tpj_permissions` (
  `per_id` int(11) NOT NULL AUTO_INCREMENT,
  `per_label` tinytext COLLATE utf8mb4_unicode_ci NOT NULL,
  `per_desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`per_id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Export de données de la table tppjdb.tpj_permissions : ~15 rows (environ)
/*!40000 ALTER TABLE `tpj_permissions` DISABLE KEYS */;
REPLACE INTO `tpj_permissions` (`per_id`, `per_label`, `per_desc`) VALUES
	(1, 'profil', '$content["perm_profil"]'),
	(2, 'menu', '$content["perm_menu"]'),
	(3, 'seemenu', '$content["perm_seemenu"]'),
	(4, 'managerecipe', '$content["perm_managerecipe"]'),
	(5, 'addrecipe', '$content["perm_addrecipe"]'),
	(6, 'modrecipe', '$content["perm_modrecipe"]'),
	(7, 'delrecipe', '$content["perm_delrecipe"]'),
	(8, 'managerole', '$content["perm_managerole"]'),
	(9, 'addroles', '$content["perm_addroles"]'),
	(10, 'modroles', '$content["perm_modroles"]'),
	(11, 'delroles', '$content["perm_delroles"]'),
	(12, 'manageusers', '$content["perm_manageusers"]'),
	(13, 'addusers', '$content["perm_addusers"]'),
	(14, 'modusers', '$content["perm_modusers"]'),
	(15, 'delusers', '$content["perm_delusers"]');
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
  KEY `FK_tpj_recipes_cou_code` (`cou_code`),
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Export de données de la table tppjdb.tpj_roles : ~2 rows (environ)
/*!40000 ALTER TABLE `tpj_roles` DISABLE KEYS */;
REPLACE INTO `tpj_roles` (`rol_id`, `rol_label`) VALUES
	(1, 'admin'),
	(2, 'user');
/*!40000 ALTER TABLE `tpj_roles` ENABLE KEYS */;


-- Export de la structure de table tppjdb. tpj_roles_has_permissions
DROP TABLE IF EXISTS `tpj_roles_has_permissions`;
CREATE TABLE IF NOT EXISTS `tpj_roles_has_permissions` (
  `rol_id` int(11) NOT NULL,
  `per_id` int(11) NOT NULL,
  PRIMARY KEY (`rol_id`,`per_id`),
  KEY `FK_tpj_roles_as_permissions_per_id` (`per_id`),
  CONSTRAINT `FK_tpj_roles_as_permissions_per_id` FOREIGN KEY (`per_id`) REFERENCES `tpj_permissions` (`per_id`),
  CONSTRAINT `FK_tpj_roles_as_permissions_rol_id` FOREIGN KEY (`rol_id`) REFERENCES `tpj_roles` (`rol_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Export de données de la table tppjdb.tpj_roles_has_permissions : ~18 rows (environ)
/*!40000 ALTER TABLE `tpj_roles_has_permissions` DISABLE KEYS */;
REPLACE INTO `tpj_roles_has_permissions` (`rol_id`, `per_id`) VALUES
	(1, 1),
	(2, 1),
	(1, 2),
	(2, 2),
	(1, 3),
	(2, 3),
	(1, 4),
	(1, 5),
	(1, 6),
	(1, 7),
	(1, 8),
	(1, 9),
	(1, 10),
	(1, 11),
	(1, 12),
	(1, 13),
	(1, 14),
	(1, 15);
/*!40000 ALTER TABLE `tpj_roles_has_permissions` ENABLE KEYS */;


-- Export de la structure de table tppjdb. tpj_units
DROP TABLE IF EXISTS `tpj_units`;
CREATE TABLE IF NOT EXISTS `tpj_units` (
  `unt_id` int(11) NOT NULL AUTO_INCREMENT,
  `unt_label` tinytext COLLATE utf8mb4_unicode_ci NOT NULL,
  `unt_desc` tinytext COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`unt_id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Export de données de la table tppjdb.tpj_units : ~0 rows (environ)
/*!40000 ALTER TABLE `tpj_units` DISABLE KEYS */;
REPLACE INTO `tpj_units` (`unt_id`, `unt_label`, `unt_desc`) VALUES
	(14, 'kg', 'Kilogramme(s)'),
	(15, 'g', 'Gramme(s)'),
	(16, 'mg', 'Milligramme(s)'),
	(17, 'l', 'Litre(s)'),
	(18, 'dl', 'Decilitre(s)'),
	(19, 'cl', 'Centilitre(s)'),
	(20, 'ml', 'Millilitre(s)'),
	(21, 'u', 'Unite(s)'),
	(22, 'cas', 'Cuillere(s) a soupe'),
	(23, 'cac', 'Cuillere(s) a cafe'),
	(24, 'p', 'Pincee(s)'),
	(25, 'bt', 'Botte(s)'),
	(26, 'bq', 'Bouquet(s)');
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Export de données de la table tppjdb.tpj_users : ~2 rows (environ)
/*!40000 ALTER TABLE `tpj_users` DISABLE KEYS */;
REPLACE INTO `tpj_users` (`use_id`, `use_login`, `use_password`, `use_lastname`, `use_firstname`, `use_mail`) VALUES
	(1, 'Tropos', '$2y$10$zXwICoC6.ToB4lMUZalzvemqyLfA4v0TReMII3scsdw5vAkLMl9zK', NULL, NULL, NULL),
	(2, 'nafault29@hotmail.com', '$2y$10$IA9oSUgEuHotQk3e6Lad1uRn5OjErQUR0bi0O4uXYsuKpH5bZj0PC', 'nafault', '29', NULL);
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

-- Export de données de la table tppjdb.tpj_users_get_roles : ~2 rows (environ)
/*!40000 ALTER TABLE `tpj_users_get_roles` DISABLE KEYS */;
REPLACE INTO `tpj_users_get_roles` (`use_id`, `rol_id`) VALUES
	(1, 1),
	(2, 2);
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
