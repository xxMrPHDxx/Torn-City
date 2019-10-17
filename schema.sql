-- DELETE EXISTING SCHEMA NAMED torn
DROP SCHEMA IF EXISTS torn;

-- I CREATE THIS IN MYSQL SCHEMA, SO I USE MYSQL
CREATE SCHEMA torn;
USE torn;

-- DROP IF EXISTS AND CREATE TABLE USER
DROP TABLE IF EXISTS USER;
CREATE TABLE USER (
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

-- DROP IF EXISTS AND CREATE TABLE USERS
DROP TABLE IF EXISTS USERS;
CREATE TABLE USERS (
	id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
	name VARCHAR(100),
	email VARCHAR(100),
	password VARCHAR(100),
	money INT DEFAULT 0,
	level INT DEFAULT 0,
	points INT DEFAULT 0,
	merits INT DEFAULT 0,
	energy INT DEFAULT 0,
	maxenergy INT DEFAULT 0,
	nerve INT DEFAULT 0,
	maxnerve INT DEFAULT 0,
	happy INT DEFAULT 0,
	maxhappy INT DEFAULT 0,
	life INT DEFAULT 0,
	maxlife INT DEFAULT 0,
	gender CHAR(1) DEFAULT "M"
);

-- INSERTING DATA INTO mysql.TORN_USERS TABLE
INSERT INTO USERS (name,email,password,money,level,points,merits,energy,maxenergy,nerve,maxnerve,happy,maxhappy,life,maxlife,gender) VALUES (
	"Your Name",
	"Your Email",
	"Your Password",
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

-- DROP IF EXISTS AND CREATE TABLE ITEM_TYPE
DROP TABLE IF EXISTS ITEM_TYPE;
-- CREATING STORAGE FOR ALL ITEM TYPES
CREATE TABLE ITEM_TYPE (
	id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
	name VARCHAR(100) NOT NULL,
	type VARCHAR(100) NOT NULL
);

-- INSERTING ALL AVAILABLE ITEM TYPES
INSERT INTO ITEM_TYPE (name, type) VALUES (
	"Primary",
	"primary"
),(
	"Secondary",
	"secondary"
),(
	"Melee",
	"meele"
),(
	"Armor",
	"armor"
),(
	"Medical",
	"medical"
),(
	"Electrical",
	"electrical"
),(
	"Jewelry",
	"jewelry"
),(
	"Plushies",
	"plushies"
),(
	"Viruses",
	"viruses"
),(
	"Temporary",
	"temporary"
),(
	"Clothing",
	"clothing"
),(
	"Drugs",
	"drugs"
),(
	"Energy Drink",
	"energy-drink"
),(
	"Alcohol",
	"alcohol"
),(
	"Boosters",
	"boosters"
),(
	"Enhancer",
	"enhancer"
),(
	"Supply Packs",
	"supply-packs"
),(
	"Flowers",
	"flowers"
),(
	"Cars",
	"cars"
),(
	"Artifacts",
	"artifacts"
),(
	"Books",
	"books"
),(
	"Special",
	"special"
),(
	"Collectibles",
	"collectibles"
),(
	"Misc",
	"misc"
);

-- DROP IF EXISTS AND CREATE TABLE ITEMS
DROP TABLE IF EXISTS ITEMS;
CREATE TABLE ITEMS (
	id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
	name VARCHAR(100),
	type_id INT,
	price INT
);

ALTER TABLE ITEMS ADD FOREIGN KEY (type_id) REFERENCES ITEM_TYPE(id);

-- INSERTING AN ITEM INTO torn.ITEMS
INSERT INTO ITEMS (name,type_id,price) VALUES
(
	"Katana Sword",
	3,
	10000
),(
	"XM8 Rifle",
	1,
	250000
),(
	"USP",
	2,
	2000
);


-- DROP IF EXISTS AND CREATE TABLE INVENTORY
DROP TABLE IF EXISTS INVENTORY;
CREATE TABLE INVENTORY (
	id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
	user_id INT NOT NULL,
	item_id INT NOT NULL
);

-- ADD FOREIGN KEYS INTO INVENTORY TABLE
ALTER TABLE INVENTORY ADD FOREIGN KEY (user_id) REFERENCES USERS(id);
ALTER TABLE INVENTORY ADD FOREIGN KEY (item_id) REFERENCES ITEMS(id);

-- INSERT VALUES INTO INVENTORY TABLE
INSERT INTO INVENTORY (user_id, item_id) VALUES (
	1, 1
),(
	1, 2
),(
	1, 3
);


-- DROP IF EXISTS AND CREATE TABLE GYMS
DROP TABLE IF EXISTS GYMS;
CREATE TABLE GYMS (
	id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
	name VARCHAR(100) NOT NULL,
	strength_gain DECIMAL(9,2) default 0,
	defense_gain DECIMAL(9,2) default 0,
	speed_gain DECIMAL(9,2) default 0,
	dexterity_gain DECIMAL(9,2) default 0,
	cost INT default 0,
	energy_usage INT default 5
);

-- INSERTING 3 GYMS INTO GYMS TABLE
INSERT INTO GYMS (name,strength_gain,defense_gain,speed_gain,dexterity_gain,cost,energy_usage) VALUES (
	"Premiere Club",
	1.88,
	1.78,
	1.66,
	1.36,
	100,
	5
),(
	"Average Joe's Club",
	1.98,
	2.30,
	1.76,
	1.62,
	150,
	5
),(
	"Woody's Workout",
	1.58,
	1.84,
	2.40,
	1.32,
	200,
	5
);