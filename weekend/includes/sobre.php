<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/about.css">
    <title>ABOUT</title>
</head>

<body>
    <header class="main-header">
        <!-- NAVIGATION -->
        <nav class="front-nav">
            <ul class="nav-ul">
                <div class="right-element">

                    <li><a href="index.php">Home</a></li>
                    
                    <li><a href="about.php">About</a></li>


                </div>
                <div class="left-element">
                    <div class="left-element">
                   
                        <li><span id="login"><a href="login.php">login <img src="Img/entrar.png" width="32" alt="login"></a></span></a></span>
                        <li><span id="carrinho"><a href="carrinho.php">carrinho <span id="numItensCarrinho">(<?= isset($_SESSION['carrinho']) ? count($_SESSION['carrinho']) : "0"; ?>)</span><img src="Img/cart.png" width="32" alt="carrinho de compras"></a></span></li>
                    </div>
                    </div>
                </div>
            </ul>
        </nav>

        <!-- FIRST CONTAINER -->
        <div class="first-container3">
            <div class="insideFirstContainer">
                <!-- esta incluido a imagem no css -->
            </div>
        </div>
    </header>