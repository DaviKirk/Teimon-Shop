<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header('Location: login.php');
    exit();
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

    <header>
        <div class="cabecalho">
            <img class="imgLogo" src="img/Teimoh.webp" alt="">
            <div>
                <h1 class="tittleLogo">TEIMON LAUPA</h1>
                <h4>🇫🇮 🇪🇺</h4>
            </div>
        </div>
    </header>
    <nav>
        <!-- <img src="img/Teimos_Shop.webp" alt=""> -->
        <div class="btnNav">
            <a class="btnCarrinho" href="index.php">Home🏠</a>
            <a class="btnCarrinho" href="carrinho.php">Cart🛒</a>
            <a class="btnCarrinho" href="https://pt.wikipedia.org/wiki/Finl%C3%A2ndia">Finlândia 🇫🇮</a>
            <a class="btnCarrinho" href="https://my-summer-car.fandom.com/wiki/Teimo">TeimoShop🏪</a>
        </div>
    </nav>

    <section class="container">
        <div class="shop">
            <?php


            $carrinho = [];
            $iteracao = 0;


            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $limparCart = $_POST['Clear'];

                if (isset($_COOKIE['carrinho'])) {
                    setcookie('carrinho', serialize($carrinho), time() - 10);
                }
            }

            if (isset($_COOKIE['carrinho'])) {
                $carrinho = unserialize($_COOKIE['carrinho']);

                $iteracao = count($carrinho) - 1;

                // echo '<pre>';
                // print_r($carrinho);
                // echo '</pre>';
            
                for ($i = $iteracao; $i >= 0; $i--) {

                    $id = $carrinho[$i]['id'];
                    $img = $carrinho[$i]['img'];
                    $nome = $carrinho[$i]['nome'];
                    $preco = $carrinho[$i]['preco'];
                    $desc = $carrinho[$i]['desc'];

                    echo '
        <div class="produto">
              <div class="divImg">
            <img class="imgProduto" src="img/' . $img . '" alt="">
            </div>
            <h1 class="tituloProduto">' . $nome . '</h1>
            <div>
             <p class="descProduto">' . $desc . '</p>
             <p class="preco"> MK$ ' . $preco . '</p>
            </div>
         </div>
        ';
                }
            } else {

                $emptyCart = '<h1 class="cartVazio"> <br> <br> Não há nada aqui <br> 😢 </h1>';
            }

            ?>
        </div>
    </section>
    <?php
    if (isset($emptyCart)) {
        echo $emptyCart;
    }
    ?>
    <form class="clearCarrinho" method="POST">
        <input type="hidden" name="Clear" value="ClearCart">
        <button type="submit" class="btnADD">clean the cart</button>
    </form>

</body>

</html>