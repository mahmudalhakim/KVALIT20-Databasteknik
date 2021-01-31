<?php

/***************************************************************
 *
 *                     Uppatera ett namn
 *
 ***************************************************************/

require_once 'header.php';
require_once '../database/db.php';

if (isset($_GET['name']) && isset($_GET['table'])) {
    $oldName =  sanitize($_GET['name']);
    $table   =  sanitize($_GET['table']);
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $newName = sanitize( $_POST['newName']);
    $oldName = sanitize( $_POST['oldName']);
    $table   = sanitize( $_POST['table']);

    $stmt = $conn->prepare("UPDATE $table SET $table = :newName WHERE $table = :oldName");
    $parameters = array(
        ':newName' => $newName,
        ':oldName' => $oldName
    );
    //https://www.php.net/manual/en/pdostatement.execute
    $stmt->execute($parameters);

    printMessage("$oldName har uppdaterats till $newName", "success");
    $oldName = $newName;
}
?>

<form action="#" method="post" class="row">

    <div class="col-md-6 offset-md-3  mt-2">
        <input type="text" name="newName" class="form-control mt-2" value="<?php echo $oldName ?>">
        <input type="hidden" name="oldName" value="<?php echo $oldName ?>">
        <input type="hidden" name="table" value="<?php echo $table ?>">
    </div>

    <div class="col-md-6 offset-md-3  mt-2">
        <input type="submit" class="form-control mt-2 btn btn-primary" value="Uppdatera">
    </div>

</form>

<form action="delete.php" method="post" class="row">

    <div class="col-md-6 offset-md-3  mt-2">
        <input type="hidden" name="table" value="<?php echo $table ?>">
        <input type="hidden" name="name" value="<?php echo $oldName ?>">
        <input type="submit" class="form-control mt-2 btn btn-outline-danger" value="Ta bort">
    </div>

</form>

<?php

require_once 'footer.php';
