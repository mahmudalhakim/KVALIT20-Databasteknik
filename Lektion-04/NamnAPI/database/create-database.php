<?php

require_once ('namesArrays.php');
// Arrayen $firstNamesMale finns i namesArrays.php

require_once ('database.php'); // Hämta $conn

// TA bort databasen!
$conn->exec("DROP DATABASE IF EXISTS $dbName");
echo "<h2>$dbName deleted</h2>";

// Skapa en ny databas
$conn->exec("CREATE DATABASE IF NOT EXISTS $dbName
             CHARACTER SET utf8
             COLLATE utf8_swedish_ci;");
echo "<h2>$dbName created</h2>";

// Välj databasen
$conn->exec("USE $dbName");
echo "<h2>$dbName selected!</h2>";

// Skapa tabellerna

// Skapa tabellen firstNamesMale
$conn->exec("CREATE TABLE firstNamesMale(
                firstNamesMale VARCHAR(50) PRIMARY KEY
            )"
);

echo "<h2>firstNamesMale created</h2>";


// Skapa tabellen firstNamesFemale
$conn->exec("CREATE TABLE firstNamesFemale(
                firstNamesFemale VARCHAR(50) PRIMARY KEY
            )"
);
echo "<h2>firstNamesFemale created</h2>";

// Skapa tabellen lastNames
$conn->exec("CREATE TABLE lastNames(
                lastNames VARCHAR(50) PRIMARY KEY
            )"
);
echo "<h2>firstNamesFemale created</h2>";

foreach ($firstNamesMale as $key => $name) {
    $sql = "INSERT INTO firstNamesMale VALUE ('$name')";
    $conn->exec($sql);    
    echo "<p>$name added to firstNamesMale successfully</p>";
}

foreach ($firstNamesFemale as $key => $name) {
    $sql = "INSERT INTO firstNamesFemale VALUE ('$name')";
    $conn->exec($sql);    
    echo "<p>$name added to firstNamesFemale successfully</p>";
}

foreach ($lastNames as $key => $name) {
    $sql = "INSERT INTO lastNames VALUE ('$name')";
    $conn->exec($sql);    
    echo "<p>$name added to lastNames successfully</p>";
}