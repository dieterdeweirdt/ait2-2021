<?php
    require 'db.php';

    //haal id uit querystring en hou bij in een variabele
    $v_id = $_GET['q_id'] ?? 0;

    //sql met parameter placeholders
    $sql = 'SELECT * FROM `projects` WHERE `project_id` = :p_id';

    //voorbereiding
    $pdo_statement = $db->prepare($sql);
    //uitvoeren met parameters
    $pdo_statement->execute([
            ':p_id' => $v_id
        ]);
    //resultaat opvragen
    $result = $pdo_statement->fetchObject();
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
    <a href="index.php">< Alle projecten</a>
    <h1><?= $result->title; ?></h1>
    <?= $result->students; ?>
    <p><?= $result->description; ?></p>
    <img src="<?= $result->photo; ?>">
</body>
</html>