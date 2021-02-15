<?php

/**
 * NamnAPI med en databas
 * En egenutvecklad version av https://namnapi.se/
 * 
 * Begränsningar
 *  - APIet skapar enbart 10 olika namn!
 *  - Data levereras enbart i JSON-format (ej XML)
 * 
 * Date: 2021-02-10
 * Copyright: MIT
 * Contact: Mahmud Al Hakim
 * https://github.com/mahmudalhakim/
 * 
 */


header("Content-Type: application/json; charset=UTF-8");

include_once("Name.php");
include_once("fetch-data.php");

$names = array();

while (count($names) < 10) {

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

echo json_encode($names, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);