<?php

include 'app.php';

if( isset($_POST['register'] ) ) {

    
    //TODO: validatie op velden... (bv lengte van wachtwoord)
    //TODO: Controle of email adres reeds gebruikt wordt
    $sql = 'SELECT COUNT(`email`) as total from `users` WHERE `email` = :email';
    $pdo_statement = $db->prepare($sql);
    $pdo_statement->execute( [ 
    ':email' => $_POST['email'] ?? '',
    ] );
    $total = (int) $pdo_statement->fetchColumn();

    if($total > 0) {
        echo 'email bestaat al...';
    } else {

        //SQL om all info op te vragen van de huidige page_id ($v_id)
        $sql = 'INSERT INTO `users` (`firstname`, `lastname`, `email`, `password`)
                VALUES (:firstname, :lastname, :email, :password)';
        $pdo_statement = $db->prepare($sql);
        $pdo_statement->execute( [ 
            ':firstname' => $_POST['firstname'] ?? '',
            ':lastname' => $_POST['lastname'] ?? '',
            ':email' => $_POST['email'] ?? '',
            ':password' => password_hash( $_POST['password'], PASSWORD_DEFAULT ),
        ] );

        $user_id = $db->lastInsertId();
        echo 'Gebruiker ' . $user_id . ' is aangemaakt';

    }

    //header('location: login.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
<div class="container">
    <h1>Registreer</h1>
    <form method="POST">

        <p>
            <label for="firstname">Voornaam</label>
            <input type="text" name="firstname" id="firstname">
        </p>
        <p>
            <label for="lastname">Familienaam</label>
            <input type="text" name="lastname" id="lastname">
        </p>
        <p>
            <label for="email">E-mail</label>
            <input type="email" name="email" id="email">
        </p>
        <p>
            <label for="password">Wachtwoord</label>
            <input type="password" name="password" id="password">
        </p>
        <button type="submit" name="register">Registreer</button>
    
    </form>
</div>

</body>
</html>