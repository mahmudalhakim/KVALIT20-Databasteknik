<?php

/***************************************************************
 *
 *                     NamnAPI Adminpanel
 *               Skapa nya namn via ett formulär
 *
 ***************************************************************/

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (empty($_POST['firstname']) && empty($_POST['lastname']))
        printMessage("Ange förnamn eller efternamn tack", "warning");

    if (!empty($_POST['lastname']))
        insertInto("lastNames", $_POST['lastname']);

    if (!empty($_POST['firstname'])) {
        if ($_POST['gender'] == "male")
            insertInto("firstNamesMale", $_POST['firstname']);
        else if ($_POST['gender'] == "female")
            insertInto("firstNamesFemale", $_POST['firstname']);
        else
            printMessage("Välj kön tack!", "warning");
    }
}

function insertInto($table, $name)
{
    try {
        global $conn; // från db.php
        $sql = "INSERT INTO $table VALUES (:name)";
        $stmt = $conn->prepare($sql);
        $parameters = array(':name' => $name);
        //https://www.php.net/manual/en/pdostatement.execute
        $stmt->execute($parameters);
        printMessage("$name inserted successfully.", "success");
    } catch (Exception $e) {
        printMessage($e->getMessage());
    }
}

/**
 * En funktion som skriver ut ett felmeddelande
 * $messageType enligt Bootstrap Alerts
 * https://getbootstrap.com/docs/5.0/components/alerts/
 */
function printMessage($message, $messageType = "danger")
{
    echo "<div class='my-2 col-md-6 offset-md-3 alert alert-$messageType alert-dismissible fade show' role='alert'>
            $message
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
        </div>";
}

?>



<form action="#" method="post" class="row">

<div class="col-md-6 offset-md-3 mt-2">
    <input type="text" name="firstname" class="form-control" placeholder="Ange förnamn">
</div>

<div class="col-md-6 offset-md-3 mt-2">
    <input type="text" name="lastname" class="form-control" placeholder="Ange efternamn">
</div>

<div class="col-md-6 offset-md-3  mt-2">
    <select name="gender" class="form-select">
        <option value="">-- Välj kön --</option>
        <option value="male">Man</option>
        <option value="female">Kvinna</option>
    </select>
</div>

<div class="col-md-6 offset-md-3  mt-2">
    <input type="submit" class="form-control mt-2 btn btn-primary" value="Lägg till">
</div>

</form>