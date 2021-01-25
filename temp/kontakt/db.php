<?php

/***************************************************************
 *
 *  Logga in i MySQL-databasen med PHP PDO (PHP Data Objects)
 *
 ***************************************************************/

$servername = "localhost";
$username = "root";
$password = "root";

try {
    $conn = new PDO("mysql:host=$servername;dbname=contactsdb", $username, $password);

    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    echo "<p>Connected successfully</p>";
} catch (PDOException $e) {
    echo "<p>Connection failed: " . $e->getMessage();
}
