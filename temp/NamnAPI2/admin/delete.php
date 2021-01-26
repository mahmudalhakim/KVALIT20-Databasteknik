<?php

/***************************************************************
 *
 *  Ta bort ett namn
 *
 ***************************************************************/

require_once 'header.php';
require_once '../database/db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $id  = $_POST['id'];
    $table = $_POST['table'];
    $name = $_POST['name'];
    $stmt = $conn->prepare("DELETE FROM $table WHERE  id = :id");
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    printMessage("$name har tagits bort!", "danger");
    
}
require_once 'footer.php';