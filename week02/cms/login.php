<?php
include 'app.php';
$message = '';
if( isset($_POST['login'] ) ) {

    $user = User::getUserByEmail( $_POST['email'] );
    
    //controle of er een user inzit
    if( isset($user->email) ) {
        //controle of wachtwoord juist is
        if( password_verify ( $_POST['password'], $user->password) )
        {
            $_SESSION['user_id'] = $user->user_id;
            header('location: index.php');
        }
        else {
            $message = 'E-mail en/of wachtwoord is verkeerd';
        }
    }else {
        $message = 'E-mail en/of wachtwoord is verkeerd';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
<div class="container">
    <h1>Login</h1>
    <?php if($message) : ?>
        <div class="alert"><?= $message; ?></div>
    <?php endif; ?>
    <form method="POST">
        <p>
            <label for="email">E-mail</label>
            <input type="email" name="email" id="email">
        </p>
        <p>
            <label for="password">Wachtwoord</label>
            <input type="password" name="password" id="password">
        </p>
        <button type="submit" name="login">Login</button>
    
    </form>
</div>

</body>
</html>