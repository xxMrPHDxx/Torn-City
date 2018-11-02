-- I CREATE THIS IN MYSQL SCHEMA, SO I USE MYSQL
USE mysql;

CREATE TABLE TORN_USERS (
	userid INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
	name VARCHAR(100),
	money INT,
	level INT,
	points INT,
	merits INT,
	energy INT,
	maxenergy INT,
	nerve INT,
	maxnerve INT,
	happy INT,
	maxhappy INT,
	life INT,
	maxlife INT,
	gender CHAR(1)
);

-- INSERTING DATA INTO mysql.TORN_USERS TABLE
INSERT INTO TORN_USERS (name,money,level,points,merits,energy,maxenergy,nerve,maxnerve,happy,maxhappy,life,maxlife,gender) VALUES (
	"Your Name",
	10000,
	20,
	10,
	1,
	50,
	100,
	10,
	15,
	150,
	200,
	240,
	250,
	"M"
);

-- WHILE ITEMS TABLE IN TORN SCHEMA, YOU MUST CHANGE THEM RESPECTIVELY IN EVERY LAST mysqli_connect() ARGUMENT TO THE SPECIFIC SCHEMA
USE torn;

CREATE TABLE ITEMS (
	id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
	name VARCHAR(100),
	type VARCHAR(100),
	price INT
);

-- INSERTING AN ITEM INTO torn.ITEMS
INSERT INTO ITEMS (name,type,price) VALUES (
	"Katana Sword",
	"Melee",
	10000
);