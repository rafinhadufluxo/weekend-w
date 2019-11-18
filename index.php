<?php include "includes/cabecalho.php"; ?>

<!-- section 1 - tomorrowland alfter -->
<section>
    <div class="container">
        <br><br>
        <section class="busca">
            <form>
                <input type="search" placeholder="Busca..." name="busca">
                <button>OK</button>
            </form>
        </section>
        <br> <br>
        <div class="content2">
            <section class="col-2">
                <?php
                    require_once "classes/Evento.php";
                    require_once "includes/functions.php";

                    $produto = new Evento();

                    if (isset($_GET['busca'])) {
                        $lista = $produto->filtroBusca($_GET['busca']);
                        $titulo =
                            "Resultado da busca por \"{$_GET['busca']}\" ";
                        
                    } else {
                        $lista = $produto->filtroNovidades();
                        $titulo = "Novidades";
                    }

                    // echo "<pre>";
                    // print_r($lista);
                    // echo "</pre>";
                    require_once "views/listaEventos.php";

                ?>
            </section>


        </div>

    </div>
    </div>
</section>

<?php include "includes/rodape.php"; ?>