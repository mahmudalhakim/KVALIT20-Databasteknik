<?php

$password = '$2y$10$PZ0Z9flqjGNy2ieZ6j4dsOHCd8W7CfHEIafbK0.1skuc85Uu1uTx.';

// echo password_hash("YES", PASSWORD_DEFAULT);
// $2y$10$PZ0Z9flqjGNy2ieZ6j4dsOHCd8W7CfHEIafbK0.1skuc85Uu1uTx.

if (isset($_POST['confirm'])) {

    if (password_verify($_POST['confirm'], $password)) {
        restore();
    } else {
        echo "<h2>Felaktigt lösenord</h2>";
    }
}


function restore()
{
    try {

        // Logga in på servern (Skapa $conn)
        require_once 'db.php';

        // Ta bort en databas (för att t.ex. nollställa allting)
        $dbName = "namnapi";
        $conn->exec("DROP DATABASE $dbName");
        echo "<p>Database <b>$dbName</b> deleted successfully";

        // Skapa en databas
        $conn->exec("CREATE DATABASE $dbName CHARACTER SET utf8 COLLATE utf8_swedish_ci");
        // OBS! Det är viktigt att lägga till
        // SET utf8 COLLATE utf8_swedish_ci
        // för att kunna sortera svenska namn korrekt 
        // T.ex. Åsa bör hamna längst ner 
        echo "<p>Database <b>$dbName</b> created successfully";

        // Välj (använd) en databas (ett krav för att kunna gå vidare)
        $conn->exec("use $dbName");
        echo "<p>You are using this database: <b>$dbName</b>";

        // Skapa tabellen firstNamesMale
        $tableName = $columnName = "firstNamesMale";
        $sql = "CREATE TABLE $tableName (
            id INT(11) AUTO_INCREMENT PRIMARY KEY,
            $columnName VARCHAR(50) NOT NULL)";
        $conn->exec($sql);
        echo "<p>Table <b>$tableName</b> created successfully";

        // Skapa tabellen firstNamesFemale
        $tableName = $columnName = "firstNamesFemale";
        $sql = "CREATE TABLE $tableName (
            id INT(11) AUTO_INCREMENT PRIMARY KEY,
            $columnName VARCHAR(50) NOT NULL)";

        $conn->exec($sql);
        echo "<p>Table <b>$tableName</b> created successfully";

        // Skapa tabellen lastNames
        $tableName = $columnName = "lastNames";
        $sql = "CREATE TABLE $tableName (
            id INT(11) AUTO_INCREMENT PRIMARY KEY,
            $columnName VARCHAR(50) NOT NULL)";
        $conn->exec($sql);
        echo "<p>Table <b>$tableName</b> created successfully";

        // Infoga data i tabellen
        $sql = "INSERT INTO firstNamesMale VALUES (NULL, 'Test')";
        $conn->exec($sql);
        echo "<p>New record created successfully";

        // Lägg alla namn som finns i arrayerna till tabellerna
        include 'namesArrays.php';
        foreach ($firstNamesMale as $key => $value) {
            $sql = "INSERT INTO firstNamesMale VALUES (NULL, '$value')";
            $conn->exec($sql);
            echo "<div><b>$value</b> added successfully";
        }

        foreach ($firstNamesFemale as $key => $value) {
            $sql = "INSERT INTO firstNamesFemale VALUES (NULL, '$value')";
            $conn->exec($sql);
            echo "<div><b>$value</b> added successfully";
        }

        foreach ($lastNames as $key => $value) {
            $sql = "INSERT INTO lastNames VALUES (NULL, '$value')";
            $conn->exec($sql);
            echo "<div><b>$value</b> added successfully";
        }
    } catch (PDOException $e) {
        echo "<p>Error: " . $e->getMessage();
        return;
    }
}
