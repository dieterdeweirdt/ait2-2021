<?php 
include_once "data.php";

//zoeken

$search_term = '';
if( isset($_GET['type']) ) {
    $search_term = $_GET['type'];
}

?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cars</title>
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
    <p>
        <form method="GET">
            <input type="text" name="type" placeholde="zoekterm" value="<?php echo $search_term; ?>">
            <input type="submit" name="filter" value="Zoeken">
        </form>
    </p>

    <div class="cars">
        <?php
            foreach ( $cars as $key => $car )
            {
                //echo $car['brand'];
                //Array omvormen naar een object
                //  $car_als_object = (object) $car;
                //Parameter uit het object halen
                //  echo $car_als_object->brand;

                include 'views/car.php';
            }
        ?>
    </div>
</body>
</html>