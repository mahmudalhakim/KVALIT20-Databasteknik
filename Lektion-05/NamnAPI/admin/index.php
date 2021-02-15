<?php
require_once("../database/database.php");
$conn->exec("USE $dbName");

require_once 'header.php';
require_once 'create.php';
require_once 'footer.php';