<?php

/***************************************************************
 *
 *  Ta bort ett namn
 *
 ***************************************************************/

require_once 'header.php';
require_once '../database/db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name  = $_POST['name'];
    $table = $_POST['table'];
    $stmt = $conn->prepare("DELETE FROM $table WHERE $table = :name");
    $stmt->bindParam(':name', $name);
    $stmt->execute();
    printMessage("$name har tagits bort!", "danger");
}

require_once 'footer.php';