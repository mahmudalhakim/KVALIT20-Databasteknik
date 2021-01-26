<?php

require_once 'header.php';

?>

<div class="col-md-6 offset-md-3 mt-2 alert alert-danger text-center">

    <h2>DANGER ZONE</h2>
    <h3>Du håller på att ÅTERSTÄLLA en hel databas!</h3>
    <h4>Vill du verkligen gå vidare? <br>
        Skirv <span class="text-danger">YES</span> här nedan och klicka på knappen</h4>

    <form action="#" method="post">
        <input type="text" class="form-control" required name="confirm">
        <input type="submit" class="form-control mt-2 btn btn-outline-danger" value="Ja, återställ databasen nu!">
    </form>

</div>

<div class='col-md-6 offset-md-3 mt-2 text-danger text-center'>

    <?php

    if (isset($_POST['confirm'])) {

        if ($_POST['confirm']  != 'YES') {
            printMessage("Du skrev " . $_POST['confirm'] .
                "<br> Databasen har inte återställts!");
        } else {


            try {

                // Skapa en PDO (Logga in på servern)
                $conn = new PDO("mysql:host=localhost", "root", "root");
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                echo "<p>Connected successfully";

                // Ta bort en databas (för att t.ex. nollställa allting)
                $dbName = "namnapi";
                $conn->exec("DROP DATABASE $dbName");
                echo "<p>Database <b>$dbName</b> deleted successfully";

                // Skapa en databas
                $conn->exec("CREATE DATABASE $dbName CHARACTER SET utf8 COLLATE utf8_swedish_ci");
                // OBS! Det är viktigt att lägga till
                // COLLATE utf8_swedish_ci
                // för att kunna sortera svenska namn korrekt 
                // T.ex. Åsa bör hamna längst ner 
                echo "<p>Database <b>$dbName</b> created successfully";

                // Välj (använd) en databas (ett krav för att kunna gå vidare)
                $conn->exec("use $dbName");
                echo "<p>You are using this database: <b>$dbName</b>";

                // Skapa tabellen firstNamesMale
                $tableName = $columnName = "firstNamesMale";
                $sql = "CREATE TABLE $tableName (
                id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                $columnName VARCHAR(50) NOT NULL
            )";
                $conn->exec($sql);
                echo "<p>Table <b>$tableName</b> created successfully";

                // Övning
                // Skapa tabellen firstNamesFemale

                $tableName = $columnName = "firstNamesFemale";
                $sql = "CREATE TABLE $tableName (
                id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                $columnName VARCHAR(50) NOT NULL 
            )";

                $conn->exec($sql);
                echo "<p>Table <b>$tableName</b> created successfully";

                // Övning
                // Skapa tabellen lastNames
                $tableName = $columnName = "lastNames";
                $sql = "CREATE TABLE $tableName (
                id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                $columnName VARCHAR(50) NOT NULL
            )";
                $conn->exec($sql);
                echo "<p>Table <b>$tableName</b> created successfully";


                // Infoga data i tabellen
                $sql = "INSERT INTO firstNamesMale
            VALUES (NULL, 'Test')";
                $conn->exec($sql);
                echo "<p>New record created successfully";

                // Övning
                // Lägg alla namn som finns i arrayen $firstNamesMale 
                // till tabellen firstNamesMale

                // Lösning
                include 'namesArrays.php';
                foreach ($firstNamesMale as $key => $value) {
                    $sql = "INSERT INTO firstNamesMale
            VALUES (NULL, '$value')";
                    $conn->exec($sql);
                    echo "<div><b>$value</b> added successfully";
                }

                foreach ($firstNamesFemale as $key => $value) {
                    $sql = "INSERT INTO firstNamesFemale
            VALUES (NULL, '$value')";
                    $conn->exec($sql);
                    echo "<div><b>$value</b> added successfully";
                }

                foreach ($lastNames as $key => $value) {
                    $sql = "INSERT INTO lastNames
            VALUES (NULL, '$value')";
                    $conn->exec($sql);
                    echo "<div><b>$value</b> added successfully";
                }

                // Övning
                // Använd databasen istället för arrayer i vårt NamnAPI

            } catch (PDOException $e) {
                echo "<p>Error: " . $e->getMessage();
                exit();
            }
        }
    }


echo "</div>";

require_once 'footer.php';
