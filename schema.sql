-- I CREATE THIS IN MYSQL SCHEMA, SO I USE MYSQL
USE torn;

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

INSERT INTO USERS VALUES (
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
);

-- WHILE ITEMS TABLE IN TORN SCHEMA, YOU MUST CHANGE THEM RESPECTIVELY IN EVERY LAST mysqli_connect() ARGUMENT TO THE SPECIFIC SCHEMA
-- ALSO IF YOU DON'T HAVE THE SCHEMA, YOU CAN CREATE THE SCHEMA USING "CREATE SCHEMA torn;"
USE torn;

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

-- CREATE INVENTORY TABLE
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
	1, 7
),(
	1, 8
),(
	1, 6
);

-- CREATING GYMS TABLE
CREATE TABLE GYMS (
	id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
	name VARCHAR(100) NOT NULL;
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