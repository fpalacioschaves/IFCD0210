// Crear tabla
CREATE TABLE IF NOT EXISTS `cyb_users` (
  `ID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL DEFAULT '',
  `email` varchar(100) NOT NULL DEFAULT '',
  `url` varchar(100) NOT NULL DEFAULT '',
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

// Insertar información de ejemplo
INSERT INTO `cyb_users` (`ID`, `username`, `email`, `url`) VALUES
(1, 'Paco', 'thisismy@email.com', 'http://miblog.name'),
(2, 'Juan', 'elcorreode@juan.com', 'http://www.misitio.com'),
(3, 'Ana', 'escribrea@ana.com', 'http://lawebdeana.com');