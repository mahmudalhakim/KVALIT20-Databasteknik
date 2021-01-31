<?php

// Viktigt att läsa om MVC
// http://thecodetutorial.com/php-mvc/

require_once("model/Database.php");
require_once("model/Model.php");
require_once("view/View.php");
require_once("controller/Controller.php");

$db = new Database("localhost" , "moviedb", "root", "root");
$view = new View();
$model = new Model($db, $view);
$controller = new Controller($model, $view);