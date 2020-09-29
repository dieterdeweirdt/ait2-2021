<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Week 01 AIT-2</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="rainbow">
<?php


    for( $h  = 0 ; $h < 360 ; $h++) {
        for( $l  = 0 ; $l < 100 ; $l++) {
            echo '<div class="block" style="background: hsl(' . $h . ', 100%, ' . $l . '%)"></div>'; 
        }
    }



?>
</div>
</body>
</html>
