<?php
session_start();

include 'loginInfo.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $userLogin = $_POST['user'];

    $senhaLogin = md5($_POST['pass']);

    if ($userLogin === $user && $senhaLogin === $senha) {
        $_SESSION['loggedin'] = true;
        $_SESSION['user'] = $userLogin;
        header('Location: index.php');
        exit();
    } else {
        $error = 'O login falhou, tente novamente';
    }
}

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teimo Shop</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="shortcut icon" href="img/icon.ico" type="image/x-icon">
</head>

<body>

    <?php
    if (isset($error)) {
        echo $error;
    }

    ?>
    <div class="loginContainer">
        <form class="formLogin" method="POST">
            <img class="imgLogin" src="img/Teimoh.webp" alt="">
            <h1 class="tittleLogin">Teimon Shop</h1>
            <span>User:</span> 
            <input class="LoginInput" type="text" name="user">
            <span>Senha:</span>
            <input class="LoginInput" type="password" name="pass">
            <input class="btnADD" type="submit" value="enviado">
        </form>
    </div>
</body>

</html>