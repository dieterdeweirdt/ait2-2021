<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
  <?php



echo '<h2>Via while</h2>';

$trekking = [];
while ( count($trekking) < 6 ) {
    $new = rand(1,45);
    if( ! in_array($new, $trekking) ) {
        array_push($trekking, $new);
    }
}
echo implode(',', $trekking);






echo '<h2>Via do... while</h2>';
$trekking = [];
do {
    $new = rand(1,45);
    if(!in_array($new, $trekking)) {
        array_push($trekking, $new);
    }
} while ( count($trekking) < 6 );
echo implode(',', $trekking);



echo '<h2>Via een function</h2>';

$trekking = [];
function getUniqueNumber() {
    global $trekking;
    $new = rand(1,45);
    if(!in_array($new, $trekking)) {
        $trekking[] = $new;
    }
}

while (count($trekking) < 6) {
    getUniqueNumber();
}

echo implode(',', $trekking);
?>
  
</body>
</html>