CREATE DATABASE contacts_management_db;
USE contacts_management_db;

CREATE TABLE contacts (
    id INT AUTO_INCREMENT PRIMARY KEY,   
    username VARCHAR(50) NOT NULL,       
    email VARCHAR(100) NOT NULL,         
    age INT NOT NULL,
    description VARCHAR(300)
);

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,   
    username VARCHAR(50) NOT NULL UNIQUE,       
    email VARCHAR(100) NOT NULL     
);

