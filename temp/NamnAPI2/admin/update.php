<?php

/***************************************************************
 *
 *  Uppatera ett namn
 *
 ***************************************************************/

require_once 'header.php';
require_once '../database/db.php';

if (isset($_GET['id']) && isset($_GET['table'])) {
    $id =  $_GET['id'];
    $tableName =  $_GET['table'];
    $sql = "SELECT * FROM $tableName WHERE id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $name = $result[$tableName];
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $id  = $_POST['id'];
    $name = $_POST['name'];
    $oldName = $_POST['oldName'];

    $stmt = $conn->prepare("UPDATE $tableName SET $tableName = :name WHERE id = :id");
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':name', $name);

    $stmt->execute();
    printMessage("$oldName har uppdaterats till $name", "success");

}

?>

<form action="#" method="post" class="row">

    <div class="col-md-6 offset-md-3  mt-2">
        <input type="text" name="name" class="form-control mt-2" value="<?php echo $name ?>" placeholder="Ange namn">
    </div>

    <div class="col-md-6 offset-md-3  mt-2">
        <input type="submit" class="form-control mt-2 btn btn-primary" value="Uppdatera">
    </div>

    <input type="hidden" name="id" value="<?php echo $id ?>">
    <input type="hidden" name="oldName" value="<?php echo $name ?>">

</form>

<form action="delete.php" method="post" class="row">

    <div class="col-md-6 offset-md-3  mt-2">
        <input type="submit" class="form-control mt-2 btn btn-outline-danger" value="Ta bort">
    </div>

    <input type="hidden" name="id" value="<?php echo $id ?>">
    <input type="hidden" name="table" value="<?php echo $tableName ?>">
    <input type="hidden" name="name" value="<?php echo $name ?>">

</form>

<?php

require_once 'footer.php';
