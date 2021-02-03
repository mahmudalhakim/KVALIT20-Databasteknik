<?php

require_once ("db.php");

try {

    // Ta bort en databas (för att t.ex. nollställa allting)
    $conn->exec("DROP DATABASE namnapi");
    echo "<p>Database <b>namnapi</b> deleted successfully";

    // Skapa en databas
    $conn->exec("CREATE DATABASE namnapi CHARACTER SET utf8 COLLATE utf8_swedish_ci");
    // OBS! Det är viktigt att lägga till
    // SET utf8 COLLATE utf8_swedish_ci
    // för att kunna sortera svenska namn korrekt 
    // T.ex. Åsa bör hamna längst ner 
    echo "<p>Database <b>namnapi</b> created successfully";

    // Välj (använd) en databas (ett krav för att kunna gå vidare)
    $conn->exec("use namnapi");
    echo "<p>You are using this database: <b>namnapi</b>";

    // Skapa tabellen firstNamesMale
    $sql = "CREATE TABLE firstNamesMale (
            firstNamesMale VARCHAR(50) PRIMARY KEY)";
    $conn->exec($sql);
    echo "<p>Table <b>firstNamesMale</b> created successfully";

    // Skapa tabellen firstNamesFemale
    $sql = "CREATE TABLE firstNamesFemale (
            firstNamesFemale VARCHAR(50) PRIMARY KEY)";
    $conn->exec($sql);
    echo "<p>Table <b>firstNamesFemale</b> created successfully";

    // Skapa tabellen lastNames
    $sql = "CREATE TABLE lastNames (
            lastNames VARCHAR(50) PRIMARY KEY)";
    $conn->exec($sql);
    echo "<p>Table <b>lastNames</b> created successfully";

    // Infoga data i tabellen
    $sql = "INSERT INTO firstNamesMale VALUES ('Test')";
    $conn->exec($sql);
    echo "<p>New record created successfully";

    // Lägg alla namn som finns i arrayerna till tabellerna
    include 'namesArrays.php';
    foreach ($firstNamesMale as $key => $value) {
        $sql = "INSERT INTO firstNamesMale VALUES ('$value')";
        $conn->exec($sql);
        echo "<div><b>$value</b> added successfully";
    }

    foreach ($firstNamesFemale as $key => $value) {
        $sql = "INSERT INTO firstNamesFemale VALUES ('$value')";
        $conn->exec($sql);
        echo "<div><b>$value</b> added successfully";
    }

    foreach ($lastNames as $key => $value) {
        $sql = "INSERT INTO lastNames VALUES ('$value')";
        $conn->exec($sql);
        echo "<div><b>$value</b> added successfully";
    }

} catch (PDOException $e) {
    echo "<h2>Error: " . $e->getMessage() . "</h2>";
    return;
}
