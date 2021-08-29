/*
Based on SQL provided on brightspace
Modified for purpose by Finlay Daniel Coull and team
2020-05-05
UHI Water Sports Centre
Create and populate tables SQL script
*/

CREATE TABLE IF NOT EXISTS `EMEMBER`
(
	memberno INT(5) AUTO_INCREMENT NOT NULL PRIMARY KEY,
	forename VARCHAR(20),
	surname VARCHAR(20),
	street VARCHAR(40),
	town VARCHAR(20),
	postcode VARCHAR(10),
	email VARCHAR(40),
	password VARCHAR(25),
	category VARCHAR(6)
);

CREATE TABLE IF NOT EXISTS `ESTOCK`
(
	stockno CHAR(5) NOT NULL PRIMARY KEY,
	description VARCHAR(60),
	price DECIMAL(7,2),
	qtyinstock INT(4),
	details VARCHAR(500)
);

CREATE TABLE IF NOT EXISTS `EORDER`
(
	orderno INT(5) NOT NULL,
  memberno INT(5),
  PRIMARY KEY (orderno),
  FOREIGN KEY (memberno) REFERENCES EMEMBER(memberno)
);

CREATE TABLE IF NOT EXISTS `EORDERLINE`
(
  orderno INT(5) NOT NULL,
  stockno CHAR(5),
  quantity INT(5),
  CONSTRAINT PK_Order PRIMARY KEY (orderno, stockno)
);

/* Populate EMEMBER table */
/* given membernos not included as table uses auto_increment */
INSERT INTO EMEMBER (forename, surname, street, town, postcode, email, password, category) VALUES
("Chrispoher", "Brown", "12 High Street", "Perth", "PH3 WE4", "c.brown@hotmail.com", "password", "gold"),
("Anne", "Greenfield", "7 George Street", "Perth", "PH1 4ER", "anne.greenfield@yahoo.co.uk", "password", "silver"),
("Gillian", "Higgins", "8A Princess Rd", "Dundee", "DD7 2WE", "g.higgins@hotmail.com", "password", "bronze"),
("Hannah", "Bluefish", "101 Queens Rd", "Perth", "PH2 3ZX", "blue.hannah@goal.com", "password", "gold"),
("Teresa", "Edwards", "4 St Johns Rd", "Dundee", "DD1 RT5", "t.eddy@yahoo.co.uk", "password", "bronze");

/* Populate ESTOCK table */
INSERT INTO ESTOCK (stockno, description, price, qtyinstock, details) VALUES
("EG334", "Firefox Twin Turbo", 600, 20, "Reach high speeds in the Firefox Twin Turbo short shaft outboard engine for boats and dinghies! Rated at 15HP, twin turbo with carburettor fuel injection system and the weight of 36kg, this engine is the perfect combination of lightness and speed."),
("HG602", "Life Jackets Mk4", 200, 50, "Stay safe in the water with a one size fits all Life Jackets Mk4! Whether you're fishing, kayaking, or anything in between, kit up in one of our lightweight foam life jackets to prepare for the unexpected!"),
("SH990", "Waterproof Shoes", 35, 100, "Keep dry and protect your feet with our waterproof shoes! 5mm thick, split toe and hard rubber sole, guaranteed to keep you comfortable and in the water for longer!"),
("SP120", "Galaxy Open Topped", 500, 3, "Carry more with the Galaxy Open Topped! With a length of 2.5M, this open top canoe can carry plenty of equipment and take you to wherever you need to go. Holds a maximum of three people and a maximum load of 450kg."),
("WS980", "5mm Long Sleeved Nordic", 350, 40, "Keep warm and dry with this 5mm Long Sleeved Nordic Wetsuit! Made from nylon and rubber, it's great for cold weather and wintery conditions."),
("GD500", "Ladies MonoSki", 250, 40, "Drift through the water with the Ladies MonoSki board! Best for gliding at speeds between 30 and 35mph."),
("GD550", "Ladies MonoSki II", 300, 40, "Drift through the water with the new and improved Ladies MonoSki II! This lightweight waterski board is best for more advanced users and works optimally gliding at speeds between 35 and 45mph.");
