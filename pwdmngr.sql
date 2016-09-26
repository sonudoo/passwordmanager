SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";
CREATE TABLE IF NOT EXISTS `autologin` (
  `pin_post` varchar(1000) NOT NULL,
  `autologin_key` varchar(1000) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
CREATE TABLE IF NOT EXISTS `login_stat` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `SessionID` varchar(100) NOT NULL,
  `IP` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;
CREATE TABLE IF NOT EXISTS `pwdmngr` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `Website` varchar(1000) NOT NULL,
  `UserName` varchar(50) NOT NULL,
  `Password` varchar(500) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='Private Database' AUTO_INCREMENT=1 ;
CREATE TABLE IF NOT EXISTS `status` (
  `status` varchar(1000) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
INSERT INTO `status` (`status`) VALUES
('unlocked');
CREATE TABLE IF NOT EXISTS `unlockednow` (
  `unlockednow` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;