<h2><?=$titulo?></h2>
<br>
<br>
<br>
<!-- container de produtos -->
<div class="lista-produtos">

    <?php
    if(empty($listas)) {
        echo "<p>Nenhum produto encontrado</p>";
    }
    else {
        #$linha = $consulta->fetch(PDO::FETCH_ASSOC)
        foreach($listas as $v => $lista){
        ?>
        
        <!-- um produto -->
        <div class="produto">    
            <a href="evento.php?id=<?=$lista['id'];?>">                  
                <figure>                           
                    <img src="Img/vintage/<?=mostraImagem($lista['imagem']);?>" alt="<?=$lista['nome'];?>">
                    <figcaption><?=$lista['nome'];?>
                    <br>
                    <span class="precoFinal">
                        <?=formataPreco($lista['valor']);?>
                    </span>
                    </figcaption>                          
                </figure>      
            </a>              
            <?php
            if(@array_key_exists($lista['id'], $_SESSION['carrinho'])){
                echo "<p class='noCarrinho'>no carrinho!</p>";
            }
            else{
                $preco = $lista['valor'];
                echo "<p class='rapida' id='{$lista['id']}' 
                onclick=\"compraRapida({$lista['id']}, '{$lista['nome']}', $preco)\">compra rápida</p>";
            }
            ?>       
        </div>   
        <!-- fim produto -->       
        <?php  
        }
    }
    ?>
<script src="js/rapida.js"></script>