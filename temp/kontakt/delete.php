<?php

/***************************************************************
 *
 *  Arbeta med DELETE
 *
 ***************************************************************/

require_once 'header.php';
require_once 'db.php';
if (isset($_GET['id'])) {
    $id =  $_GET['id'];
    $stmt = $conn->prepare("DELETE FROM contacts WHERE  id = :id");
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    echo $stmt->rowCount() . " record deleted!";
}
require_once 'footer.php';