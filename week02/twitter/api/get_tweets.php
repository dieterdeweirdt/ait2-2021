<?php

//Pas het content type aan van je response
header( 'Content-Type: application/json' );

//data
require '../includes/db.php';

$search = $_GET['search'] ?? '';
$page = 1;
if( isset($_GET['page']) ) {
    $page = (int) $_GET['page'];
    if($page < 1) {
        $page = 1;
    }
}

$page_size = 25;
$offset = $page_size*($page - 1);

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

//output data
echo json_encode($messages);