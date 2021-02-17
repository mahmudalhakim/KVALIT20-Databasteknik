<?php

require_once("models/Database.php");
require_once("models/Model.php");
require_once("views/View.php");
require_once("controllers/Controller.php");

$db = new Database("localhost" , "course-evaluation", "root", "root");
$view = new View();
$model = new Model($db, $view);
$controller = new Controller($model, $view);

$controller->run();