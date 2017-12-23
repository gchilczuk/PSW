CREATE user 'kucharz'@'localhost' identified by 'kuchnia';
GRANT select, insert, update, delete, create, drop, references, execute ON *.* TO 'kucharz'@'localhost';

DROP DATABASE IF EXISTS PSW_DB;

CREATE DATABASE PSW_DB;

USE PSW_DB;

CREATE TABLE users
(
  ID int NOT NULL AUTO_INCREMENT PRIMARY KEY,
  Login varchar(32) NOT NULL,
  Password_hash varchar(64) NOT NULL,
  FirstName varchar(32),
  LastName varchar(64),
  Email varchar(255),
  Phone varchar(14)
);


