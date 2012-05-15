-- Date: May 13, 2012, 07:41 AM
-- MySQL: 5.0.51

/* SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";*/

DROP TABLE IF EXISTS `selectmenus`;
CREATE TABLE `selectmenus` (
  `id` int(5) NOT NULL auto_increment,
  `menu_name` varchar(25) NOT NULL,
  `menu_item` varchar(80) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `selectmenus` VALUES (1, 'Size', 'Extralarge;XL|Large;L|Medium;M|Small;S');
INSERT INTO `selectmenus` VALUES (2, 'Color', 'White;#FFF|Black;#000|Red;#F00');