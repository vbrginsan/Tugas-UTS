# Host: localhost  (Version 5.5.5-10.1.30-MariaDB)
# Date: 2018-04-22 21:42:17
# Generator: MySQL-Front 6.0  (Build 2.20)


#
# Structure for table "tbcache"
#

DROP TABLE IF EXISTS `tbcache`;
CREATE TABLE `tbcache` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Query` varchar(100) NOT NULL,
  `DocId` varchar(150) NOT NULL,
  `Value` float NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

#
# Data for table "tbcache"
#

