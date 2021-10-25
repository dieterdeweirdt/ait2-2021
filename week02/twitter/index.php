


<?php 
setlocale(LC_ALL, 'nl_BE');

require 'includes/db.php';

$search = $_GET['search_string'] ?? '';
$page = (int) $_GET['page'] ?? 1;
if($page < 1) {
    $page = 1;
}
$page_size = 25;
$offset = $page_size*($page - 1);

$sql = "SELECT COUNT(*) as 'total' from message;";
$stmnt = $db->prepare($sql);
$stmnt->execute( );
$total = $stmnt->fetchColumn();

$number_of_pages = ceil($total/$page_size);

$sql = 'SELECT *
FROM `message` 
INNER JOIN `users` ON message.user_id = `users`.`user_id`
WHERE `message`.`message` LIKE :search
ORDER BY `created_on` DESC 
LIMIT :offset,:page_size';

$stmnt = $db->prepare($sql);
$search_param = '%' . $search . '%';
$stmnt->bindParam(':search', $search_param);
$stmnt->bindParam(':offset', $offset, PDO::PARAM_INT);
$stmnt->bindParam(':page_size', $page_size, PDO::PARAM_INT);
$stmnt->execute( );
$messages = $stmnt->fetchAll();

?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PGM Tweets</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="container">
    <div class="messages">
        <form method="POST" action="api/add_tweet.php" enctype="multipart/form-data">
            <div class="message message-new">
            
                <div class="avatar">JD</div>

                <div class="content">
                    <textarea name="tweet"></textarea>
                    <input type="file" name="photo" multiple>
                    <button type="submit">Tweet</button>
                </div>
            </div>
        </form>

        <form>
            <div class="search">
                <div class="content">
                    
                    <input value="<?= $search; ?>" name="search_string" placeholder="Zoekterm">
                    <button type="submit">Zoeken</button>
                </div>
            </div>
        </form>

        <?php foreach($messages as $message) {
            include 'views/message.php';
        } ?>

        <?php for( $i = 1; $i <= $number_of_pages; $i++) : ?>
        <a href="index.php?page=<?= $i; ?>"><?= $i; ?></a>
        <?php endfor; ?>
    </div>

</div>

</body>
</html>


