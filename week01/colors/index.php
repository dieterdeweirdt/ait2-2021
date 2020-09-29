<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cars</title>
</head>
<body>
    <?php 

    require_once 'data.php';

    foreach($colors as $key => $item) {
        //echo $key;
        include 'views/color.php';
    }
    ?>
</body>
</html>