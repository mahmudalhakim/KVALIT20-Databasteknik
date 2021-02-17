<?php

/******************************************************
 * 
 *               PHP OOP Database Class
 * 
 *        A general purpose MySQL Database Class
 * 
 * Date: 2021-02-17
 * Developer: Mahmud Al Hakim
 * Copyright: MIT
 * 
 * Credits
 * https://devjunky.com/PHP-OOP-Database-Class-Example/
 * 
 ******************************************************/

class Database
{

    private $conn = null;

    // this function is called everytime this class is instantiated		
    public function __construct($dbhost, $dbname, $username, $password, $port = "80")
    {
        try {
            $this->conn = new PDO("mysql:host={$dbhost};dbname={$dbname};port={$port};charset=utf8", $username, $password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    // Insert a row in a Database Table
    public function insert($statement, $parameters = [])
    {
        try {
            $this->executeStatement($statement, $parameters);
            return $this->conn->lastInsertId();
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    // Select rows from a Database Table
    public function select($statement, $parameters = [])
    {
        try {
            $stmt = $this->executeStatement($statement, $parameters);
            return $stmt->fetchAll();
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    // Update a row in a Database Table
    public function update($statement, $parameters = [])
    {
        try {
            $this->executeStatement($statement, $parameters);
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    // Remove a row in a Database Table
    public function remove($statement, $parameters = [])
    {
        try {
            $this->executeStatement($statement, $parameters);
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    // Execute statement
    private function executeStatement($statement, $parameters = [])
    {
        try {
            $stmt = $this->conn->prepare($statement);
            $stmt->execute($parameters);
            return $stmt;
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
}
