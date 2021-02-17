<?php

/**********************************************
 *       
 *        En Databasbaserad Applikation
 *        -----------------------------
 * Utvecklare: Mahmud Al Hakim
 * Datum: 2021-02-17
 * Copyright: MIT
 * GitHub: https://github.com/mahmudalhakim  
 *       
 **********************************************/

require_once("models/Database.php");
require_once("models/Model.php");
require_once("views/View.php");
require_once("controllers/Controller.php");

$db = new Database("localhost", "moviedb", "root", "root");
$view = new View();
$model = new Model($db, $view);
$controller = new Controller($model, $view);

$controller->main();
