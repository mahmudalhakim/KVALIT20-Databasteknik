<?php

/**
 * NamnAPI V.3 (med en databas)
 * En egenutvecklad version av https://namnapi.se/
 * 
 * Date: 2021-01-26
 * Copyright: MIT
 * Contact: Mahmud Al Hakim
 * https://github.com/mahmudalhakim/
 */


// Övningar
// 1. Använd en databas istället för arrayer i vårt NamnAPI
// 2. Skapa en webbsida för att lägga till flera namn i databasen
// 3. Se till att inte lägga in dubbletter i databassen!

// Lösning

header("Content-Type: application/json; charset=UTF-8");
include('Name.php');
// include('namesArrays.php');

try {
    $dbFile = "../database/db.php";
    if (!file_exists($dbFile))
        throw new \Exception("$dbFile does not exist");
    include_once $dbFile;

    $firstNamesMale = getArrayFromTable($conn, "firstNamesMale");
    $firstNamesFemale = getArrayFromTable($conn, "firstNamesFemale");
    $lastNames = getArrayFromTable($conn, "lastNames");
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
    exit();
}


$limit = getLimit(1, 100);

$names = array();

while (count($names) < $limit) {

    if (rand(0, 1) == 0) {

        $name = new Name(
            $firstNamesMale[rand(0, count($firstNamesMale) - 1)]['firstNamesMale'],
            $lastNames[rand(0, count($lastNames) - 1)]['lastNames'],
            'male'
        );
    } else {

        $name = new Name(
            $firstNamesFemale[rand(0, count($firstNamesFemale) - 1)]['firstNamesFemale'],
            $lastNames[rand(0, count($lastNames) - 1)]['lastNames'],
            'female'
        );
    }

    array_push($names, $name->toArray());
}

shuffle($names);

echo json_encode($names, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);


/**
 * Get data from a table
 * Returns Assoc. Array
 */
function getArrayFromTable($conn, $table)
{
    $stmt = $conn->prepare("SELECT * FROM $table ");
    $stmt->execute();
    $result = $stmt->fetchAll();
    //print_r($result);
    return $result;
}

/**
 * Test and retrun limit between min and max
 * Return error message in JSON-format
 */
function getLimit($min, $max)
{
    $limit = isset($_GET["limit"]) ? $_GET["limit"] : 10;
    if (filter_var(
        $limit,
        FILTER_VALIDATE_INT,
        array("options" => array("min_range" => $min, "max_range" => $max))
    ) === false) {
        echo ("{\"error\":\"Limit must be between 1 and 100\"}");
        exit();
    }

    return $limit;
}
