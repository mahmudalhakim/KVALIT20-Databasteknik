-- 
-- Lektion 4
-- Skapa databaser med SQL 
--------------------------------
-- Ett praktiskt exempel   
-- Namn API
--

-- Skapa en databas
CREATE DATABASE namnapi
CHARACTER SET utf8
COLLATE utf8_swedish_ci;

-- Skapa tabellen firstNamesMale
CREATE TABLE firstNamesMale(
    firstNamesMale VARCHAR(50) PRIMARY KEY
);

-- Skapa tabellen firstNamesFemale
CREATE TABLE firstNamesFemale(
    firstNamesFemale VARCHAR(50) PRIMARY KEY
);

-- Skapa tabellen lastNames
CREATE TABLE lastNames(
    lastNames VARCHAR(50) PRIMARY KEY
);

-- Infoga ett namn (test)
INSERT INTO firstNamesMale
VALUES ('First Name Test');

-- Tom en tabell med Truncate
TRUNCATE TABLE firstNamesMale;