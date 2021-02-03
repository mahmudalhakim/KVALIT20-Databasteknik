<?php

/****************************************
 * 
 *                READ
 * Läs tabellen contacts från databasen
 * Presentera resultatet i en HTML-tabell
 * 
 ***************************************/

 // Hämta $conn (en instans av PDO)
 require_once ("database.php");

 // Förbered en SQL-sats
 $stmt = $conn->prepare("SELECT * FROM contacts");

 // Kör SQL-satsen
 $stmt->execute();

 // Hämta alla rader som finns i contacts
 // fetchAll()
 // Returns an array containing all of the result set rows
 $result = $stmt->fetchAll();

 $table = "
    <table class='table table-hover'>
    <tr>
        <th>Namn</th>
        <th>Telefon</th>
        <th>Admin</th>
    </tr>
    ";

 foreach($result as $key => $value){

    // echo $key; // 012345
    // echo $value; // OBS! $value är en array
    // echo "<hr><pre>";
    // print_r($value);
    // echo "</pre>";

    // echo $value['name'] . ", " . $value['tel']  . "<br>";
    // Eller
    // echo "$value[name] , $value[tel] <br>";

    $id = $value['id'];  // Detta är en primärnyckel

    $table .= "
        <tr>
            <td>$value[name]</td>
            <td>$value[tel]</td>
            <td>
                <a href='update.php?id=$value[id]'>Uppdatera</a> |
                <a href='delete.php?id=$value[id]'>Ta bort</a>
            </td>
        </tr>
    ";

 }

 $table .= "</table>";

 echo $table;


 /*
 echo "<hr><pre>";
 print_r($result);
 echo "</pre>";
 */