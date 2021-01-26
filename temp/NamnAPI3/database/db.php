<?php

/***************************************************************
 *
 *  Logga in i MySQL-databasen med PHP PDO (PHP Data Objects)
 *
 ***************************************************************/

$servername = "localhost";
$username = "root";
$password = "root";
$database = "namnapi";

try {
    $conn = new PDO("mysql:host=localhost;dbname=$database", $username, $password);

    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    exit();
}
