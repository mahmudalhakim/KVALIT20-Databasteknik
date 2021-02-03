<?php

/**
 * En funktion som skriver ut ett felmeddelande
 * $messageType enligt Bootstrap Alerts
 * https://getbootstrap.com/docs/5.0/components/alerts/
 */
function printMessage($message, $messageType = "danger")
{
    echo "
        <div class='my-2 col-md-6 offset-md-3 alert alert-$messageType alert-dismissible fade show' role='alert'>
            $message
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
        </div>";
}


/**
 * Sanitize Inputs
 * https://www.w3schools.com/php/php_form_validation.asp
 */
function sanitize($text)
{
    $text = trim($text);
    $text = stripslashes($text);
    $text = htmlspecialchars($text);
    return $text;
}

/**
 * Debug $_POST and $_POST
 */
function debug(){

    if(isset($_GET['debug'])){
   
        echo "<hr><h2 class='text-center text-danger'>DEBUG</h2>";
        echo "<hr><h3>GET<h3><pre>";
        var_dump($_GET);
        echo "</pre>";
        
        echo "<hr><h3>POST<h3><pre>";
        var_dump($_POST);
        echo "</pre>";
    }

}
