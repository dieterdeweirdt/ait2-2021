<?php
     require '../app.php';

    //SQL om page_id, slug en name op te vragen van alle paginas
    $all_pages = Page::getAll();

    
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
<h1>CMS</h1>
<?php foreach ( $all_pages as  $page ) : ?>
    <div class="row mb-3">
        <div class="col-8">
            <?= $page['name']; ?>
        </div>
        <div class="col-4 text-right">
            <a href="edit_page.php?page_id=<?= $page['page_id']; ?>" class="btn btn-primary">Bewerk</a>
            <a href="delete_page.php?page_id=<?= $page['page_id']; ?>" onclick="return confirm('Ben je zeker?');" class="btn btn-danger">Verwijder</a>
        </div>
    </div>
<?php endforeach; ?>
<a href="edit_page.php" class="btn btn-success">Pagina toevoegen</a>
</div>
    
    
</body>
</html>