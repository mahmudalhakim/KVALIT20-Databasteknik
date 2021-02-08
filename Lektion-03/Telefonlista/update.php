<?php

/***************************************
 * 
 *                UPPDATE
 *          Uppdatera en kontakt
 * 
 ***************************************/

require_once("header.php");
require_once("database.php");


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Uppdatera databasen

    $id      = htmlspecialchars($_POST['id']);
    $name    = htmlspecialchars($_POST['name']);
    $tel     = htmlspecialchars($_POST['tel']);
    $email   = htmlspecialchars($_POST['email']);
    $address = htmlspecialchars($_POST['address']);

    $sql = "UPDATE contacts 
            SET 
                name    = :name, 
                tel     = :tel,
                email   = :email,
                address = :address
            WHERE id = :id";

    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':tel', $tel);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':address', $address);
    $stmt->execute();


    $rowCount = $stmt->rowCount();

    $message = "<div class='alert alert-success' role='alert'>
                    <p>$rowCount rad har uppdaterats!</p>
                </div>";


    // header("Location:index.php");


}


$id = htmlspecialchars($_GET['id']);

$stmt = $conn->prepare("SELECT * FROM contacts WHERE id = :id");
$stmt->bindParam(':id', $id);
$stmt->execute();
$result = $stmt->fetch();

$name  =  $result['name'];
$tel  =  $result['tel'];
$email  = $result['email'];
$address  = $result['address'];

// echo "<h2> $name </h2>";
// echo "<h2> $tel </h2>";


?>

<h2>Uppdatera</h2>

<form action="#" class="row" method="post">

    <div class="col-md-6 my-2">
        <label for="name" class="form-label">Ange namn</label>
        <input id="name" type="text" class="form-control" name="name" value="<?php echo $name; ?>">
    </div>

    <div class="col-md-6 my-2">
        <label for="tel" class="form-label">Ange telefonnummer</label>
        <input id="tel" type="text" class="form-control" name="tel" value="<?php echo $tel; ?>">
    </div>

    <div class="col-md-6 my-2">
        <label for="email" class="form-label">Ange E-post</label>
        <input id="email" type="email" class="form-control" name="email" value="<?php echo $email; ?>">
    </div>

    <div class="col-md-6 my-2">
        <label for="address" class="form-label">Ange adress</label>
        <input id="address" type="text" class="form-control" name="address" value="<?php echo $address; ?>">
    </div>

    <div class="col-md-6 my-2">
        <input type="submit" value="Uppdatera" class="form-control btn btn-outline-dark">
    </div>

    <input type="hidden" name="id" value="<?php echo $id; ?>">

</form>

<?php

if (isset($message)) echo $message;

require_once("footer.php");

?>