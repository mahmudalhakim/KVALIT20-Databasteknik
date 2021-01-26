<?php

/***************************************************************
 *
 *  Visa alla namn
 *
 ***************************************************************/

require_once '../database/db.php';
require_once 'header.php';

$stmt = $conn->prepare("SELECT * FROM firstNamesMale ORDER BY firstNamesMale");
$stmt->execute();
$firstNamesMale = $stmt->fetchAll();
//print_r($result); exit();

$stmt = $conn->prepare("SELECT * FROM firstNamesFemale ORDER BY firstNamesFemale");
$stmt->execute();
$firstNamesFemale = $stmt->fetchAll();

$stmt = $conn->prepare("SELECT * FROM lastNames ORDER BY lastNames");
$stmt->execute();
$lastNames = $stmt->fetchAll();


// Create and show template

$template  = "<div class='row mt-2'>";

$template  .= "<div class='col'>";
$template  .= "<h4 class='display-6 text-center'>Manliga namn</h4>";
foreach ($firstNamesMale as $key => $value) {
    $template  .= "
        <div>
        <a href='update.php?id=$value[id]&table=firstNamesMale' class='btn btn-light d-block'>"
        . $value['firstNamesMale'] .
        "</a>
        </div>";
}
$template  .= "</div> <!-- col -->";

$template  .= "<div class='col'>";
$template  .= "<h4 class='display-6 text-center'>Kvinnliga namn</h4>";
foreach ($firstNamesFemale as $key => $value) {
    $template  .= "
    <div>
    <a href='update.php?id=$value[id]&table=firstNamesFemale' class='btn btn-light d-block'>"
        . $value['firstNamesFemale'] .
        "</a>
    </div>";
}
$template  .= "</div> <!-- col -->";

$template  .= "<div class='col'>";
$template  .= "<h4 class='display-6 text-center'>Efternamn</h4>";
foreach ($lastNames as $key => $value) {
    $template  .= "
    <div>
    <a href='update.php?id=$value[id]&table=lastNames' class='btn btn-light d-block'>"
        . $value['lastNames'] .
        "</a>
    </div>";
}
$template  .= "</div> <!-- col -->";

$template  .= "</div> <!-- row -->";

echo $template;


require_once 'footer.php';
