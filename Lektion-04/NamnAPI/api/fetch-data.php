<?php

require_once("../database/database.php");
$conn->exec("USE $dbName");

/**
 * Get data from a table
 * Returns Assoc. Array
 */

function getArrayFromTable($table)
{

    global $conn; // Hämtas från db.php
    $stmt = $conn->prepare("SELECT * FROM $table ");
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

try {
    $firstNamesMale = getArrayFromTable("firstNamesMale");
    $firstNamesFemale = getArrayFromTable("firstNamesFemale");
    $lastNames = getArrayFromTable("lastNames");
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
    exit();
}
