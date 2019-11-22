<?php include "includes/cabecalho.php"; ?>
<!-- area central com 3 colunas -->
    <div class="container">

        <section class="col-2">
            <?php
            require_once "classes/Evento.php";
            require_once "includes/functions.php";

            if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
                echo "<h2>Identificador de evento inválido</h2>";
            } else {
                $obj = new Evento();
                $evento = $obj->consultaEvento($_GET['id']);
                if (empty($evento)) {
                    echo "<h2>Evento não encontrado</h2>";
                } else {
                    ?>
                    <div class="detalhes-evento">
                        <h2><?= $evento[0]['nomeEvento']; ?></h2>
                        <br>
                        <figure>
                            <img src="Img/vintage/<?= mostraImagem($evento[0]['imagem']); ?>" alt="<?= $evento[0]['nomeEvento']; ?>">
                        </figure>
                        <div class="form">
            
                            <p>
                             <br><br>
                                <span class="precoFinal">
                                
                                    <?= formataPreco($evento[0]['valorFinal']); ?>
                                </span>
                               
                            </p>
                            <br><br>
                            <form action="adiciona.php" method="post" id="add-carrinho">
                                <label for="quantidade">Quantidade:</label>
                                <input type="number" name="quantidade" value="1" min="1">
                                <input type="hidden" name="id" value="<?= $evento[0]['idEvento'] ?>">
                                <input type="hidden" name="nome" value="<?= $evento[0]['nomeEvento'] ?>">
                                <input type="hidden" name="valorFinal" value="<?= ($evento[0]['valorFinal']) ?>">
                                <br><br>
                                <input type="submit" value="Adicionar ao Carrinho" name="adicionar">
                                <br><br>
                            </form>
                        </div>
                        <div class="detalhes">
                            <h4>Detalhes do Evento</h4>
                            <p class="fab">Fabricante: <?= ($evento[0]['nomeFabricante'] == NULL) ? "Não informado" : $evento[0]['nomeFabricante']; ?></p>

                            <p class="dataEvento">Data: <?= nl2br($evento[0]['dataEvento']) ?></p>
                            <p class="LocalEvento">Local: <?= nl2br($evento[0]['LocalEvento']) ?></p>
                            <p class="desc">Descricao: <?= nl2br($evento[0]['descricao']) ?></p>
                            



                        </div>
                    </div>
            <?php
                } // else num_rows == 0
            } // is_numeric				
            ?>
        </section>
    </div>
    
    <!-- fim area central -->
    <?php include "includes/rodape.php"; ?>