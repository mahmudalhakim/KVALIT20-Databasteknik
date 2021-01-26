<?php

/***************************************************************
 *
 *  Arbeta med UPDATE
 *
 ***************************************************************/

require_once 'header.php';
require_once 'db.php';
if (isset($_GET['id'])) {
    $id =  $_GET['id'];
    $stmt = $conn->prepare("SELECT * FROM contacts WHERE id = :id");
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    print_r($result);
    $name = $result['name'];
    $tel = $result['tel'];
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $id  = $_POST['id'];
    $name = $_POST['name'];
    $tel  = $_POST['tel'];

    $stmt = $conn->prepare("UPDATE contacts SET name = :name, tel = :tel WHERE id = :id");
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':tel', $tel);

    $stmt->execute();

    echo $stmt->rowCount() . " record updated!";
}

?>

<form action="#" method="post" class="row">

    <div class="col-md-5">
        <input type="text" name="name" class="form-control mt-2" value="<?php echo $name ?>" placeholder="Ange namn">
    </div>

    <div class="col-md-5">
        <input type="text" name="tel" class="form-control mt-2" value="<?php echo $tel ?>" placeholder="Ange telefon">
    </div>

    <input type="hidden" name="id" value="<?php echo $id ?>">

    <div class="col-md-2">
        <input type="submit" class="form-control mt-2 btn btn-primary" value="Uppdatera">
    </div>

</form>

<?php
require_once 'footer.php';