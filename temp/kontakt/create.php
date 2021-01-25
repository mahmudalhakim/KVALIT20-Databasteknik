<?php

/***************************************************************
*
* Arbeta med CREATE
*
***************************************************************/

require_once 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Hämta data från post-arrayen
    $name = $_POST['name'];
    $tel  = $_POST['tel'];

    // Förbered en SQL-sats and binda parametrar
    $stmt = $conn->prepare("INSERT INTO contacts (name, tel) 
                        VALUES (:name, :tel)");
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':tel', $tel);

    // Kör SQL-satsen (infoga en rad)
    $stmt->execute();
    $last_id = $conn->lastInsertId();

    echo "<p>New record created successfully. Last inserted ID is: " . $last_id;
}
?>

<form action="#" method="post" class="row">

    <div class="col-md-5">
        <input type="text" name="name" class="form-control mt-2" placeholder="Ange namn">
    </div>

    <div class="col-md-5">
        <input type="text" name="tel" class="form-control mt-2" placeholder="Ange telefon">
    </div>

    <div class="col-md-2">
        <input type="submit" class="form-control mt-2 btn btn-primary" value="Lägg till">
    </div>

</form>