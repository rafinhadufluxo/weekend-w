<h2><?=$titulo?></h2>
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
            <p class="rapida">compra rápida</p>
        </div>   
        <!-- fim produto -->       
        <?php  
        }
    }
    ?>