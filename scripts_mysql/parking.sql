CREATE DATABASE IF NOT EXISTS Parking;
USE Parking;

DROP TABLE IF EXISTS Utilisateur;
DROP TABLE IF EXISTS Reservation;
DROP TABLE IF EXISTS Place;

CREATE TABLE Utilisateur (
id_utilisateur TINYINT UNSIGNED NOT NULL, 
nom_utilisateur VARCHAR(50) NOT NULL,
prenom_utilisateur VARCHAR(50) NOT NULL,
est_admin BOOLEAN DEFAULT FALSE NOT NULL,
id_reservation TINYINT UNSIGNED,
CONSTRAINT PK_Utilisateur PRIMARY KEY (id_utilisateur)
)ENGINE=INNODB; 

CREATE TABLE Reservation (
id_reservation TINYINT UNSIGNED,
date_fin_reservation DATE DEFAULT NULL,
est_active BOOLEAN NOT NULL DEFAULT FALSE,
num_liste_attente TINYINT UNSIGNED,
num_place TINYINT UNSIGNED, 
CONSTRAINT PK_Reservation PRIMARY KEY (id_reservation)
)ENGINE=INNODB;

CREATE TABLE Place ( 
num_place TINYINT UNSIGNED NOT NULL,
est_occupee BOOLEAN NOT NULL,
CONSTRAINT PK_Place PRIMARY KEY(num_place)
)ENGINE=INNODB;


ALTER TABLE Reservation ADD FOREIGN KEY (num_place) REFERENCES Place (num_place);
ALTER TABLE Utilisateur ADD FOREIGN KEY (id_reservation) REFERENCES Reservation (id_reservation);

CREATE USER IF NOT EXISTS 'parking_app'@'localhost' IDENTIFIED BY '6ai%75KS!q29';
GRANT ALL ON Parking.* TO 'parking_app'@'localhost';
ALTER USER 'parking_app'@'localhost' WITH MAX_QUERIES_PER_HOUR 100;
