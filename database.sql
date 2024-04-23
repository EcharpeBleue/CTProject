drop database if exists CTDB;
create database CTDB;
use CTDB;
CREATE TABLE `USER` (
    id INT PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(50),
    userEmail VARCHAR(100),
    userPassword VARCHAR(100)
);

CREATE TABLE `SERVICES` (
    id INT PRIMARY KEY AUTO_INCREMENT,
    serviceName VARCHAR(100),
    serviceDescription TEXT,
    servicePrice DECIMAL(10, 2),
    idUser INT
);

CREATE TABLE `MESSAGES` (
    id INT PRIMARY KEY AUTO_INCREMENT,
    messageSent TEXT,
    messageDate DATETIME,
    idUser INT
);

ALTER TABLE `SERVICES` ADD FOREIGN KEY (idUser) REFERENCES `USER` (id);
ALTER TABLE `MESSAGES` ADD FOREIGN KEY (idUser) REFERENCES `USER` (id);