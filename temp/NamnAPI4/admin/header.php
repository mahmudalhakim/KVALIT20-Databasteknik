<?php

require_once ("../database/db.php");
require_once ("functions.php");

?>

<!doctype html>
<html lang="sv">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
    <title>NamnAPI Adminpanel</title>
</head>

<body class="container">
    <h1 class="text-center">
        <a href="index.php" class=" text-decoration-none">NamnAPI Adminpanel</a>
    </h1>


    <div class="row">

        <div class="col-lg-2 offset-lg-3  mt-2">
            <form action="read.php" method="post" class="mb-2">
                <input type="submit" class="form-control mt-2 btn btn-outline-info" value="Visa alla namn">
            </form>
        </div>

        <div class="col-lg-2 mt-2">
            <form action="restore.php" method="post" class="mb-2">
                <input type="submit" class="form-control mt-2 btn btn-outline-danger" value="Återställ">
            </form>
        </div>

        <div class="col-lg-2 mt-2">
            <a href="../api/index.php" class="mt-2 btn btn-outline-success d-block">API</a>
        </div>

    </div>