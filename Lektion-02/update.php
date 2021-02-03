<?php
    
/***************************************
 * 
 *                UPPDATE
 *          Uppdatera en kontakt
 * 
 ***************************************/

require_once ("header.php");
require_once ("database.php");


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Uppdatera databasen

    $id   = $_POST['id'];
    $name = $_POST['name'];
    $tel  = $_POST['tel'];

    $sql = "UPDATE contacts SET name = :name, tel = :tel WHERE id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':tel', $tel);
    $stmt->execute();


    $rowCount = $stmt->rowCount();

    $message = "<div class='alert alert-success' role='alert'>
                    <p>$rowCount rad har uppdaterats!</p>
                </div>";  


    // header("Location:index.php");

    /*
    echo "<hr><pre>";
    print_r($_POST);
    echo "</pre>";
    */
    

}


$id = $_GET['id'];
// echo "<h2> $id </h2>";

$stmt = $conn->prepare("SELECT * FROM contacts WHERE id = :id");
$stmt->bindParam(':id' , $id);
$stmt->execute();
$result = $stmt->fetch();

$name = $result['name'];
$tel  = $result['tel'];

// echo "<h2> $name </h2>";
// echo "<h2> $tel </h2>";


?>

<h2>Uppdatera</h2>

<form action="#" class="row" method="post">

<div class="col-md-6 my-2">
    <label for="name" class="form-label">Ange namn</label>
    <input id="name" type="text" class="form-control" 
    name="name" value="<?php echo $name;?>">
</div>

<div class="col-md-6 my-2">
    <label for="tel" class="form-label">Ange telefonnummer</label>
    <input id="tel" type="text" class="form-control" 
    name="tel" value="<?php echo $tel;?>">
</div>

<div class="col-md-6 my-2">
    <input type="submit" value="Uppdatera" 
    class="form-control btn btn-outline-dark">
</div>

<input type="hidden" name="id" value="<?php echo $id;?>">

</form>

<?php

    if(isset($message)) echo $message;
    
    require_once ("footer.php");
?>

