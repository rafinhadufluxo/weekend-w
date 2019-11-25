<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">

    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/loga.css">
    

    <title>Weekend Warriors</title>
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
                        <?php
                        if (isset($_SESSION['nome'])) { ?><li>
                            <span id="login">Olá, <?= $_SESSION['nome']; ?>
                                (<a href="sair.php">sair</a>)</span></li>
                        <?php
                        } else { ?>
                            <li><span id="login">Olá, visitante! (<a href="login.php">login</a>)</span></li>
                        <?php
                        }
                        ?><br>
                        <li><span id="carrinho"><a href="carrinho.php">carrinho <span id="numItensCarrinho">(<?= isset($_SESSION['carrinho']) ? count($_SESSION['carrinho']) : "0"; ?>)</span><img src="Img/cart.png" width="32" alt="carrinho de compras"></a></span></li>
                    </div>
                </div>
                
            </ul>
        </nav>

    </header>