<?php
    require 'db.php';

session_start();
$user_id = $_SESSION['user_id'] ?? 0;

if($user_id) {
    //SQL om all info op te vragen van de huidige page_id ($v_id)
    $sql = 'SELECT * FROM `users` WHERE `user_id` = :p_id';
    $pdo_statement = $db->prepare($sql);
    $pdo_statement->execute( [ ':p_id' => $user_id ] );
    $user = $pdo_statement->fetchObject();
}


    $v_id = $_GET['q_id'] ?? 1;

    //SQL om page_id, slug en name op te vragen van alle paginas
    $sql = 'SELECT `page_id`, `slug`, `name` FROM `pages` ORDER BY `sort_order`';
    $pdo_statement = $db->prepare($sql);
    $pdo_statement->execute();
    $all_pages = $pdo_statement->fetchAll();

    //SQL om all info op te vragen van de huidige page_id ($v_id)
    $sql = 'SELECT * FROM `pages` WHERE `page_id` = :p_id';
    $pdo_statement = $db->prepare($sql);
    $pdo_statement->execute( [ ':p_id' => $v_id ] );
    $current_page = $pdo_statement->fetchObject();

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