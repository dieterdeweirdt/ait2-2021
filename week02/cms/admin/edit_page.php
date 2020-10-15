<?php
         require '../app.php';


    $page_id = $_GET['page_id'] ?? 0;
   
    if( isset($_POST['update']) ) {

        $new_test_page = new Page();
        $new_test_page->page_id = $page_id;
        $new_test_page->slug = $_POST['slug'] ?? '';
        $new_test_page->name = $_POST['name'] ?? '';
        $new_test_page->title = $_POST['title'] ?? '';
        $new_test_page->content = $_POST['content'] ?? '';
        $new_test_page->template = $_POST['template'] ?? 'page';
        $new_test_page->save();
        
    }

    if ( $page_id ) {
        //SQL om page_id, slug en name op te vragen van alle paginas
        $page = Page::getById($page_id);
    } 
    

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
<h1>CMS > <?= ( $page_id ) ? 'Edit' : 'Add'; ?> Page</h1>

<form method="POST" >
    <p>
        <label>
            Name<br>
            <input type="text" name="name" value="<?= ($page_id) ? $page->name : ''; ?>" class="form-control">
        </label>
    </p>
    <p>
        <label>
            Slug<br>
            <input type="text" name="slug" value="<?=  ($page_id) ? $page->slug : ''; ?>" class="form-control">
        </label>
    </p>
    <p>
        <label>
            Content<br>
            <textarea name="content" rows="5" class="form-control"><?=  ($page_id) ? $page->content : '' ?></textarea>
        </label>
    </p>
    <p>
        <label>
            Template<br>

            <select name="template" required class="form-control">
            <?php 
                $templates = [ 
                    'page' => 'Pagina', 
                    'home' => 'Startpagina', 
                    'projects' => 'Projecten' ];
                foreach($templates as $key => $value) : ?>
                    <option value="<?= $key; ?>" <?php if($page_id && $page->template == $key) { echo 'selected';  } ?>><?= $value; ?></option>
                <?php endforeach;  ?>
                </select>
            </label>
    </p>

    <button type="submit" class="btn btn-primary" name="update">Aanpassen</button>
    <a href="index.php" class="btn btn-outline-secondary">Terug</a>

</form>


</div>
    
    
</body>
</html>