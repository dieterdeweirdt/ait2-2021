<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
<div class="projects">
    <?php

    require 'db.php';

    $sql = 'SELECT * FROM `projects` LIMIT 5';

    //voorbereiding
    $pdo_statement = $db->prepare($sql);
    //uitvoeren
    $pdo_statement->execute();
    //resultaat opvragen
    $result = $pdo_statement->fetchAll();

    foreach($result as $project) {
        include 'views/project.php';
    }

    ?>
    </div>
</body>
</html>