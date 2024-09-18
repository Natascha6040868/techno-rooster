-- Maak een nieuwe database aan
CREATE DATABASE T_T_Rooster;

-- Gebruik de database
USE T_T_Rooster;

-- Maak een tabel voor gebruikers aan
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    full_name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Users table iets aanpassen toch 
ALTER TABLE users
ADD CONSTRAINT unique_email UNIQUE (email);

-- Table voor roosters 
CREATE TABLE roosters (
    id INT AUTO_INCREMENT PRIMARY KEY,
    naam VARCHAR(255) NOT NULL,
    inhoud TEXT
);

-- toegangcodes voor roosters 
CREATE TABLE toegangscodes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    code VARCHAR(50) NOT NULL,
    rooster_id INT,
    FOREIGN KEY (rooster_id) REFERENCES roosters(id)
);

-- Geeft acces tot de rooster code 
CREATE TABLE category_access_codes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    category_name VARCHAR(255) NOT NULL,
    access_code VARCHAR(255) NOT NULL
);


-- Aanpassing voor users 
CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    password VARCHAR(255) NOT NULL
);

ALTER TABLE users ADD COLUMN name VARCHAR(100) NOT NULL;
