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
    $parameters = array(':name' => $name);
    //https://www.php.net/manual/en/pdostatement.execute
    $stmt->execute($parameters); 
    
    printMessage("$name har tagits bort!", "danger");
}

require_once 'footer.php';