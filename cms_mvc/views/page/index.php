<?php

    //Pagina ophalen adhv huidige page_id ($v_id)
    $v_id = $_GET['q_id'] ?? 1;
    $current_page = Page::getById($v_id);
    
    $all_pages = Page::getAll();

    

    //pad naar de juist view
    $view = 'views/' . $current_page->template . '.php';
    //Indien het php bestand niet bestaat gebruik dan page.php
    if(  ! file_exists($view) ) {
        $view = 'views/page.php';
    }

    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
    <div class="container">
        <?php if ($user_id ) : ?>
            Hallo <?= $user->firstname; ?>, <a href="logoff.php">Uitloggen</a>
        <?php else : ?>
            <a href="login.php">Inloggen</a> <a href="register.php">Registreren</a>
        <?php endif; ?>
    <nav>
        <?php
        foreach($all_pages as $page) {
            echo '<a href="index.php?q_id=' . $page['page_id'] . '">' . $page['name'] . '</a>';
        }
        ?>
        
    </nav>
    <?php
    //Laad de view in
    include $view;
    ?>
</div>
</body>
</html>