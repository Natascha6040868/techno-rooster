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


ALTER TABLE users
ADD CONSTRAINT unique_email UNIQUE (email);
