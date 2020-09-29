<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Festival Namegenerator</title>
</head>
<body>
    <h1>Festival Namegenerator</h1>

    <?php
    require 'data.php';

    do {
        
        $prefix_count = count($prefix);
        $suffix_count = count($suffix);
        $random_prefix = rand(0, $prefix_count-1);
        $random_suffix = rand(0, $suffix_count-1);
        $name = $prefix[$random_prefix] . $suffix[$random_suffix];  
        
    } while ( in_array($name, $unavailable) );

    echo '<br>' . $name;

    ?>

    <p>
        <a href="index.php">Opnieuw</a>
    </p>
</body>
</html>