-- --------------------------------------------------------
--
-- Utveckla en databas med SQL
--
-- Datum: 2021-02-17
-- Utvecklare: Mahmud Al Hakim
-- Copyright: MIT
--
-- --------------------------------------------------------

-- Skapa databasen moviedb
CREATE DATABASE moviedb 
CHARACTER SET utf8 
COLLATE utf8_swedish_ci;

USE moviedb;

-- Skapa tabellen customers
CREATE TABLE customers (
  customer_id int(11) NOT NULL AUTO_INCREMENT,
  name varchar(100) NOT NULL,
  email varchar(100) NOT NULL, 
  PRIMARY KEY (customer_id)
);

INSERT INTO customers (name, email) 
VALUES
('Mahmud Al Hakim', 'mahmud@alhakim.com'),
('Yasmin Al Hakim', 'yasmin@alhakim.com');

-- Skapa tabellen films
CREATE TABLE films (
  film_id int(11) NOT NULL AUTO_INCREMENT,
  title varchar(100) NOT NULL,
  price int(11) NOT NULL,
  image varchar(255) DEFAULT 'no-poster.png',
  PRIMARY KEY (film_id)
);

INSERT INTO films (title, price, image) VALUES
('Braveheart', 20, 'Braveheart.jpg'),
('Matrix', 40, 'Matrix.jpg'),
('Fight Club', 15 , 'Fight-Club.jpg'),
('Patrioten', 15, 'The-Patriot.jpg'),
('GoldenEye', 30, 'GoldenEye.jpg'),
('Blair Witch Project', 25 , 'Blair-Witch-Project.jpg'),
('Dum dummare', 30, DEFAULT),
('Dödslängtan', 30, DEFAULT);


-- Skapa tabellen orders
CREATE TABLE orders (
  order_id int(11) NOT NULL AUTO_INCREMENT,
  customer_id int(11) NOT NULL,
  film_id int(11) NOT NULL,
  order_date DATETIME DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (order_id)
);

-- Kundnummer 1 har köpt filmerna som har id 5 och 3
INSERT INTO orders (customer_id, film_id) 
VALUES (1,5), (1,3);

-- Kund med id 2 har köpt filmerna som har id 1 och 6
INSERT INTO orders (customer_id, film_id) 
VALUES (2,1), (2,6);

-- Referensintegritetsvillkor
ALTER TABLE orders ADD CONSTRAINT 
FOREIGN KEY (film_id) REFERENCES films(film_id);

ALTER TABLE orders ADD CONSTRAINT 
FOREIGN KEY (customer_id) REFERENCES customers(customer_id);

-- Visa alla kunder som har gjort minst en beställning
SELECT * 
FROM customers, orders
WHERE customers.customer_id = orders.customer_id;

-- Visa alla kunder som inte har någon beställning
SELECT * 
FROM customers
WHERE customers.customer_id NOT IN (SELECT customer_id FROM orders);

-- Visa alla filmer som har minst en beställning
SELECT * 
FROM films, orders 
WHERE films.film_id = orders.film_id;

-- Visa detaljerad information om alla beställningar
SELECT * 
FROM customers, films, orders
WHERE customers.customer_id = orders.customer_id
AND films.film_id = orders.film_id;

-- Skapa alias
-- Visa info om alla kunder som har köpt filmer. 
-- Visa ordernummer, Orderdatum, Kundnummer och Artikelnummer.
SELECT 
orders.order_id AS Ordernummer,
orders.order_date AS Orderdatum,
customers.customer_id AS Kundnummer,
films.film_id AS Artikelnummer
FROM customers, films, orders
WHERE customers.customer_id = orders.customer_id
AND films.film_id = orders.film_id;

-- Skriv ut info om order nr 1.
-- Visa ordernummer, orderdatum, kundnamn och filmtitel.
SELECT 
	orders.order_id AS Ordernummer,
	orders.order_date AS Orderdatum,
	customers.customer_id AS Kundnummer,
	films.title AS Filmtitel
FROM customers, films, orders
WHERE customers.customer_id = orders.customer_id
	AND films.film_id = orders.film_id
	AND orders.order_id = 1;

-- Vilka kunder har köpt ”Braveheart”?
SELECT customers.name
FROM customers, films, orders
WHERE customers.customer_id = orders.customer_id
AND films.film_id = orders.film_id
AND films.title LIKE '%Braveheart%';

-- Vilka filmer har "Yasmin" köpt?
SELECT films.title
FROM customers, films, orders
WHERE customers.customer_id = orders.customer_id
AND films.film_id = orders.film_id
AND customers.name LIKE '%Yasmin%';
