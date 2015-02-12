CREATE DATABASE RESTO CHARACTER SET utf8 COLLATE utf8_general_ci;
GRANT ALL ON RESTO.* TO 'Catherine'@'%' identified by 'AAAaaa111';

USE RESTO;



CREATE TABLE CLIENT (
	ID_CLIENT INT NOT NULL AUTO_INCREMENT,
	NOM VARCHAR(25) NOT NULL,
	PRENOM VARCHAR(25) NOT NULL,
	DATENAISSANCE DATE NOT NULL,
	ADRESSE VARCHAR(75) NOT NULL,
	TELEPHONE VARCHAR(25) NOT NULL,
	COURRIEL VARCHAR(75) NOT NULL UNIQUE,
	MDP VARCHAR(100) NOT NULL,
	VISIBILITE INT NOT NULL,
	PRIMARY KEY PK_ID (ID_CLIENT),
	UNIQUE (ID_CLIENT),
	UNIQUE (COURRIEL)
);

CREATE TABLE COMPTE (
	ID_COMPTE INT NOT NULL AUTO_INCREMENT,
	ID_CLIENT INT NOT NULL,
	UNIQUE (ID_COMPTE),
	PRIMARY KEY PK_ID (ID_COMPTE),
	FOREIGN KEY FK_ID_EMPLOYE (ID_CLIENT)
	REFERENCES CLIENT(ID_CLIENT)
	ON DELETE CASCADE
);

CREATE TABLE ENTREPRENEUR (
	ID_ENTREPRENEUR INT NOT NULL AUTO_INCREMENT,
	NOM VARCHAR(25),
	PRENOM VARCHAR(25),
	TELEPHONE VARCHAR(25),
	COURRIEL VARCHAR(75) NOT NULL UNIQUE,
	MDP VARCHAR(100) NOT NULL,
	-- VISIBILITE INT NOT NULL,
	PRIMARY KEY PK_ID (ID_ENTREPRENEUR),
	UNIQUE (ID_ENTREPRENEUR),
	UNIQUE (COURRIEL)
);

CREATE TABLE RESTAURATEUR (
	ID_RESTAURATEUR INT NOT NULL AUTO_INCREMENT,
	NOM VARCHAR(25) NOT NULL,
	PRENOM VARCHAR(25) NOT NULL,
	TELEPHONE VARCHAR(25) NOT NULL,
	COURRIEL VARCHAR(75) NOT NULL UNIQUE,
	MDP VARCHAR(100) NOT NULL,
	-- VISIBILITE INT NOT NULL,
	PRIMARY KEY PK_ID (ID_RESTAURATEUR),
	UNIQUE (ID_RESTAURATEUR),
	UNIQUE (COURRIEL)
);

CREATE TABLE RESTAURANT (
	ID_RESTAURANT INT NOT NULL AUTO_INCREMENT,
	NOM VARCHAR(25) NOT NULL,
	TELEPHONE VARCHAR(25) NOT NULL,
	COURRIEL VARCHAR(75) NOT NULL UNIQUE,
	MDP VARCHAR(100) NOT NULL,
	-- VISIBILITE INT NOT NULL,
	PRIMARY KEY PK_ID (ID_RESTAURANT),
	UNIQUE (ID_RESTAURANT),
	UNIQUE (COURRIEL)
);

