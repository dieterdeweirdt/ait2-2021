<?php
    require '../db.php';
    $page_id = $_GET['page_id'] ?? 0;

    //SQL om page_id, slug en name op te vragen van alle paginas
    $sql = 'SELECT * FROM `pages` WHERE `page_id` = :page_id';
    $pdo_statement = $db->prepare($sql);
    $pdo_statement->execute( [ ':page_id' => $page_id ] );
    $page = $pdo_statement->fetchObject();
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CMS</title>
    <link rel="stylesheet" href="css/main.min.css">
</head>
<body>
<div class="container">
<h1>CMS > Edit Page</h1>

<form>
    <p>
        <label>
            Name
            <input type="text" name="name" value="<?= $page->name; ?>">
        </label>
    </p>
    <p>
        <label>
            Slug
            <input type="text" name="slug" value="<?= $page->slug; ?>">
        </label>
    </p>
    <p>
        <label>
            Content
            <textarea name="content"><?= $page->content ?></textarea>
        </label>
    </p>
    <button type="submit" class="btn btn-primary">Aanpassen</button>
</form>


<a href="index.php" class="btn btn-secondary">Terug</a>
</div>
    
    
</body>
</html>