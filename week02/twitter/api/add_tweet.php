<?php

//connecteren met databank
require '../includes/db.php';

$tweet = $_POST['tweet'] ?? '';
$user_id = 55;
$photo = '';
$created_on = date("Y-m-d H:i:s");

//controle doen op afbeelding en uploaden
if( isset($_FILES['photo']) && $_FILES['photo']['size'] > 0 ) {

    $upload_dir = '../images/' . $user_id . '/';
    if( ! is_dir( $upload_dir ) ) {
        mkdir( $upload_dir, 0777);
    }

    $tmp_location = $_FILES['photo']['tmp_name'];
    $old_name = $_FILES['photo']['name'];
    $file_type = $_FILES['photo']['type'];
    $file_info = pathinfo($old_name);
    $extension = $file_info['extension'];
    
    //controle doet op file_type voor je gaat uploaden
    if( in_array($file_type, ['image/jpeg', 'image/png', 'image/gif']) ) {
        $photo = uniqid() . '.' . $file_info['extension'];
        $new_location = $upload_dir . $photo;

        move_uploaded_file($tmp_location, $new_location);
    }
    else {
        //bericht de gebruiker over een foutief bestand
    }

}


//Insert into query schrijven
$sql = "INSERT INTO message 
        (user_id, message, created_on, photo)
        VALUES
        (:user_id, :message, :created_on, :photo);";

//Uitvoeren
$sth = $db->prepare($sql);
$sth->execute([
    ':user_id' => $user_id,
    ':message' => $tweet,
    ':created_on' => $created_on,
    ':photo' => $photo,
]);

//terugkeren naar de index.php
header( 'location: ../index.php' );