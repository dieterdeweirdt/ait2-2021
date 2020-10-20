<?php
require '../app.php';

$page_id = $_GET['page_id'] ?? 0;

if( $page_id ) {

   Page::deleteById( $page_id );

}

header('location: index.php');
die(); //of exit()