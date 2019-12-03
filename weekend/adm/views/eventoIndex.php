<div class="alok">    
    <h2><?$titulo;?></h2>
    <!-- Neste campo, pode adicionar mais eventos. Informando qtde e entre outros requisitos -->
    <p>|  <a href="eventoController.php?acao=cadastro">Inserir novo</a> | </p>
</div>
<br>
<div class="centralizandoCompra">
    
    <!-- MENU PRINCIPAL DO ADM  -->
    <table border = "1" style="tr > td { padding:30px }">

        <tr>
            <th>Nome</th>
            <th>Quantidade</th>
            
            <th>Data</th>
            <th>Valor</th>
            <th>Ação</th>
        </tr>
        <?php
        if(empty($lista)){
            echo "<tr><td colspan = '5'> Nenhuma evento cadastrado </td></tr>";

        }else{
            foreach($lista as $evento){
                ?>
                <tr>
                    <td> <?= $evento['nomeEvento'];?> </td>
                    <td> <?= $evento['qtde'];?> </td>
                   
                    <td> <?= $evento['dataEvento'];?> </td>
                    <td> <?= $evento['valorFinal'];?> </td>
                    <td> 
                        <a href="eventoController.php?acao=altera&id=<?=$evento['idEvento'];?>">Alterar</a> |
                        <a href="eventoController.php?acao=exclui&id=<?=$evento['idEvento'];?>">excluir</td>
                </tr>
                <?php

            }
        }
        ?>

    </table>
</div>

