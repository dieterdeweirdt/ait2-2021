<?php

require '../db.php';

$page_id = $_GET['page_id'] ?? 0;

if( $page_id ) {

    $sql = 'DELETE FROM `pages` WHERE `page_id` = ?';
    
    $stmnt = $db->prepare($sql);
    $stmnt->execute( [ $page_id ] );

}

header('location: index.php');
die(); //of exit()