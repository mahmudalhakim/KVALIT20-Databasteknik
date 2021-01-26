<?php
/***************************************************************
 *
 *  Arbeta med READ
 *
 ***************************************************************/

// Förbered en SQL-sats
$stmt = $conn->prepare("SELECT * FROM contacts");

// Kör SQL-satsen 
$stmt->execute();

// Hämta all data från tabellen 
$result = $stmt->fetchAll();

// fetchAll — Returns an array containing all of the result set rows
// https://www.php.net/manual/en/pdostatement.fetchall.php
// print_r($result);


$table  = "<table class='table'>";
$table .= "<tr><th>Namn</th><th>Telefon</th><th>Admin</th></tr>";
foreach ($result as $key => $value) {
    $table .= "<tr>
                <td>$value[name]</td>
                <td>$value[tel]</td>
                <td>
                <a href='update.php?id=$value[id]'>Uppdatera</a>
                |
                <a href='delete.php?id=$value[id]'>Ta bort</a>
                </td>
            </tr>";
}
$table .= '</table>';
echo $table;
