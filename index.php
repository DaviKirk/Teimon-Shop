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
    <?php
    $connect = mysqli_connect("127.0.0.1", "root", "");
    mysqli_select_db($connect, "lojasteimo");
    mysqli_set_charset($connect, "UTF8");

    $query = mysqli_query($connect, "SELECT * FROM estoqueteimo");

    ?>
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
            <a class="btnCarrinho" href="carrinho.php">Carrinho🛒</a>
            <a class="btnCarrinho" href="https://pt.wikipedia.org/wiki/Finl%C3%A2ndia">Finlândia 🇫🇮</a>
            <a class="btnCarrinho" href="https://my-summer-car.fandom.com/wiki/Teimo">TeimoShop🏪</a>
        </div>
    </nav>

    <section class="container">
        <div class="shop">
            <?php


            if ($_SERVER['REQUEST_METHOD'] === 'POST') {

                $imgProduto = $_POST['imgProduto'];
                $NomeProduto = $_POST['nome_produto'];
                $precoProduto = $_POST['precoProduto'];
                $descProduto = $_POST['descProduto'];
                $idProduto = $_POST['id'];


                if (isset($_COOKIE['carrinho'])) {
                    $carrinho = unserialize($_COOKIE['carrinho']);
                } else {
                    $carrinho = [];
                }

                $carrinho[] = [
                    'id'  => $idProduto,
                    'img' => $imgProduto,
                    'nome' => $NomeProduto,
                    'preco' => $precoProduto,
                    'desc' => $descProduto,
                ];
                setcookie('carrinho', serialize($carrinho), time() + 10);

                // echo 'Produto adicionado ao carrinho!<br>';

                // echo '<pre>';
                // print_r($carrinho);
                // echo '</pre>';
            }

            while ($result = mysqli_fetch_array($query)) {

                echo '   
        <div method="post" class="produto">
        <div class="divImg">
            <img class="imgProduto" src="img/' . $result[4] . '" alt="">
        </div>
        <h1 class="tituloProduto">' . $result[1] . '</h1>
        <div>
              <p class="descProduto">' . $result[3] . '</p>
               <p class="descProduto"> <b>  MK$ ' . $result[2] . ' </b>  </p>
               <form method="post">
                  <input type="hidden" name="id" value="' . $result[0] . '">
                  <input type="hidden" name="imgProduto" value="' . $result[4] . '">
                  <input type="hidden" name="nome_produto" value="' . $result[1] . '">
                   <input type="hidden" name="precoProduto" value="' . $result[2] . '">
                  <input type="hidden" name="descProduto" value="' . $result[3] . '">
                  <button type="submit" class="btnADD"> Add to cart</button>
               </form>
            </div>
         </div>';
            }
            ?>
        </div>
    </section>
    <footer>
        <ul>
            <li>By:Davi Kirk</li>
            <li>Game: My summer car</li>
        </ul>
    </footer>


</body>

</html>