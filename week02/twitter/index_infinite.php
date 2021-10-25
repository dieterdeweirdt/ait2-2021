<?php 
setlocale(LC_ALL, 'nl_BE');

require 'includes/db.php';

$search = $_GET['search_string'] ?? '';

$sql = 'SELECT *
FROM `message` 
INNER JOIN `users` ON message.user_id = `users`.`user_id`
WHERE `message`.`message` LIKE :search
ORDER BY `created_on` DESC 
LIMIT 25';

$stmnt = $db->prepare($sql);
$stmnt->execute( [':search' => '%' . $search . '%'] );
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

        <button id="next">Volgende berichten</button>
    </div>

</div>
<script>
    let current_page = 1;
    document.getElementById('next').addEventListener('click', ()=>{
        current_page++;

        fetch('api/get_tweets.php?page=' + current_page, {
            method: 'get'
        })
        .then(response => response.json())
        .then(data => console.log(data))
        .catch(function(err) {
            // Error :(
            console.log(err);
        });
    });

</script>
</body>
</html>

<?php
$prev_month = '';
foreach($events as $event ) {
    if($prev_month != date('M', $event['date']) ) {
        echo date('M', $event['date']);
        $prev_month = date('M', $event['date']);
    }

    ///de rest

}