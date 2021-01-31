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

    if (!empty($_POST['lastname'])) {
        $lastname = sanitize($_POST['lastname']);
        processLastname($lastname);
    }

    if (!empty($_POST['firstname'])) {
        $lastname = sanitize($_POST['firstname']);
        $gender = sanitize($_POST['gender']);
        processFirstname($lastname, $gender);
    }
}

/**
 * 
 */
function processLastname($lastname)
{
    insertInto("lastNames", $lastname);
}

/**
 * 
 */
function processFirstname($firstname, $gender)
{
    if ($gender == "male")
        insertInto("firstNamesMale", $firstname);
    else if ($gender == "female")
        insertInto("firstNamesFemale", $firstname);
    else
        printMessage("Välj kön tack!", "warning");
}




/**
 * En funktion som testar om ett namn finns redan i en tabell
 */

function nameExists($table, $name)
{
    global $conn; // från db.php

    $sql = "SELECT * FROM $table WHERE $table = :name";
    $stmt = $conn->prepare($sql);
    $parameters = array(':name' => $name);
    //https://www.php.net/manual/en/pdostatement.execute
    $stmt->execute($parameters); 
    if ($stmt->rowCount() > 0) {
        printMessage("$name finns redan i databasen!", "warning");
        return true;
    }
    return false;
}


/**
 * En funktion som lägger till ett namn i en tabell
 */
function insertInto($table, $name)
{

    if (nameExists($table, $name))
        return;

    global $conn; // från db.php

    $sql = "INSERT INTO $table VALUES (:name)";
    $stmt = $conn->prepare($sql);
    $parameters = array(':name' => $name);
    //https://www.php.net/manual/en/pdostatement.execute
    $stmt->execute($parameters);
    
    printMessage("$name inserted successfully.", "success");
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