<?php

/**********************************************
 *       
 *                 order.php
 *           Hanterar en beställning
 *       
 **********************************************/

require_once("config.php");

$controller->getHeader();

$controller->getOrderForm();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $controller->processOrderForm();
}

$controller->getFooter();