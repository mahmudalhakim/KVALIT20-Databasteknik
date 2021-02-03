<?php

/***************************************
 * 
 *                CREATE
 *          Skapa en ny kontakt
 * 
 ***************************************/

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    require_once ("database.php");

    // Test att skriva ut arrayen med formulärdata
    // echo "<pre>";
    // print_r($_POST);
    // echo "</pre>";

    $name = $_POST['name'];
    $tel = $_POST['tel'];

    // Skapa en SQL-sats (förbereda en sats)
    $stmt = $conn->prepare("INSERT INTO contacts (name, tel)
                                VALUES (:name , :tel)");

    // Binda parametrar (binda variabler med platshållare)
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':tel', $tel);

    // Kör SQL-sats
    $stmt->execute();

    // Hämta sista id som infogats A_I
    $last_id = $conn->lastInsertId();

    $message = "<div class='alert alert-success' role='alert'>
                    <p>$name har sparats i databasen med id=$last_id</p>
                </div>";  
    
}

?>


<form action="#" class="row" method="post">

<div class="col-md-4 my-2">
    <input type="text" class="form-control" name="name">
</div>

<div class="col-md-4 my-2">
    <input type="text" class="form-control" name="tel">
</div>

<div class="col-md-4 my-2">
    <input type="submit" value="Lägg till" class="form-control btn btn-outline-dark">
</div>

</form>


<?php

if(isset($message)) echo $message;

// echo isset($message) ? $message : "";