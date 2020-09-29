<?php
    /*
    //lange notatie
    $name = 'gebruiker';
    if(isset($_GET['name'])){
        $name = $_GET['name'];
    } 
    */

    //korte notatie
    $name = $_GET['name'] ?? 'gebruiker';
    $last_name = $_GET['last_name'] ?? '';
    //print_r($_GET);

?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Week 02 Querystring en $_GET superglobal</title>
</head>
<body>
    <h1>Querystring en $_GET superglobal</h1>

    <h2>Hallo <?= $name . ' ' . $last_name; ?></h2>

    <ul>
        <li><a href="/week02/gdmgent/">GDM gent project detail</a></li>
        <li><a href="/week02/cms/">Graduaat programmeren website</a></li>
    </ul>
</body>
</html>