<?php

/***************************************
 * 
 *                CREATE
 *          Skapa en ny kontakt
 * 
 ***************************************/

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    require_once("database.php");

    // Test att skriva ut arrayen med formulärdata
    // echo "<pre>";
    // print_r($_POST);
    // echo "</pre>";

    $name    = htmlspecialchars($_POST['name']);
    $tel     = htmlspecialchars($_POST['tel']);
    $email   = htmlspecialchars($_POST['email']);
    $address = htmlspecialchars($_POST['address']);

    // Skapa en SQL-sats (förbereda en sats)
    $stmt = $conn->prepare("INSERT INTO contacts (name, tel, email, address)
                                VALUES (:name , :tel, :email, :address)");

    // Binda parametrar (binda variabler med platshållare)
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':tel', $tel);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':address', $address);

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

    <div class="col-md-6 my-2">
        <label for="name">Namn:</label>
        <input id="name" type="text" class="form-control" name="name" required>
    </div>

    <div class="col-md-6 my-2">
        <label for="tel">Telefonnummer:</label>
        <input id="tel" type="text" class="form-control" name="tel" required>
    </div>

    <div class="col-md-6 my-2">
        <label for="email">E-post:</label>
        <input id="email" type="email" class="form-control" name="email">
    </div>

    <div class="col-md-6 my-2">
        <label for="address">Adress:</label>
        <input id="address" type="text" class="form-control" name="address">
    </div>


    <div class="col-md-6 my-2">
        <input type="submit" value="Lägg till" class="form-control btn btn-outline-dark">
    </div>

</form>


<?php

if (isset($message)) echo $message;

// echo isset($message) ? $message : "";