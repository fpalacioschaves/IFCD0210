# Creación de la Base de Datos PUBLICATIONS
CREATE DATABASE publications;
USE publications;
#
USE publications;
CREATE TABLE classics (
author VARCHAR(128),
title VARCHAR(128),
category VARCHAR(16),
year SMALLINT,
INDEX(author(20)),
INDEX(title(20)),
INDEX(category(4)),
INDEX(year)) ENGINE InnoDB DEFAULT CHARSET=latin1;
#
INSERT INTO classics(author, title, category, year)
	VALUES('Mark Twain','The Adventures of Tom Sawyer','Fiction','1876');
INSERT INTO classics(author, title, category, year)
	VALUES('Jane Austen','Pride and Prejudice','Fiction','1811');
INSERT INTO classics(author, title, category, year)
	VALUES('Charles Darwin','The Origin of Species','Non-Fiction','1856');
INSERT INTO classics(author, title, category, year)
	VALUES('Charles Dickens','The Old Curiosity Shop','Fiction','1841');
INSERT INTO classics(author, title, category, year)
	VALUES('William Shakespeare','Romeo and Juliet','Play','1594');
#
SELECT * FROM classics;
#
ALTER TABLE classics ADD isbn CHAR(13);
UPDATE classics SET isbn='9781598184891' WHERE year='1876';
UPDATE classics SET isbn='9780582506206' WHERE year='1811';
UPDATE classics SET isbn='9780517123201' WHERE year='1856';
UPDATE classics SET isbn='9780099533474' WHERE year='1841';
UPDATE classics SET isbn='9780192814968' WHERE year='1594';
#
ALTER TABLE classics ADD PRIMARY KEY(isbn);
DESCRIBE classics;
SELECT * FROM classics;
#
