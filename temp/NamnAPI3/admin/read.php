<?php

/***************************************************************
 *
 *                      Visa alla namn
 *
 ***************************************************************/

require_once ("header.php");
include_once ("../database/fetch-data.php");
showTemplate();
require_once ("footer.php");

function showTemplate() {
    
    // Hämtas från fetch-data.php
    global $firstNamesMale;
    global $firstNamesFemale;
    global $lastNames;

    $template  = "<div class='row mt-2'>";
    
    $template  .= "<div class='col'>";
    $template  .= "<h4 class='display-6 text-center'>Manliga namn</h4>";
    foreach ($firstNamesMale as $key => $value) {
        $template  .= "
            <div>
            <a href='update.php?name=$value[firstNamesMale]&table=firstNamesMale' class='btn btn-light d-block'>"
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
        <a href='update.php?name=$value[firstNamesFemale]&table=firstNamesFemale' class='btn btn-light d-block'>"
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
        <a href='update.php?name=$value[lastNames]&table=lastNames' class='btn btn-light d-block'>"
            . $value['lastNames'] .
            "</a>
        </div>";
    }
    $template  .= "</div> <!-- col -->";
    
    $template  .= "</div> <!-- row -->";
    
    echo $template;
    
    }