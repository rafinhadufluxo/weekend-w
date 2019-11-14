<h2><?$titulo;?></h2>
<p>|  <a href="eventoController.php?acao=cadastro"> Inserir novo </a> | </p>

<table border = "1" style="border-collapse: collapse">
    <tr>
        <th>Nome</th>
        <th>Quantidade</th>
        <th>Fabricante</th>
        <th>Valor</th>
        <th>Ação</th>
    </tr>
    <?php
    if(empty($lista)){
        echo "<tr><td colspan = '4'> Nenhuma evento cadastrado </td></tr>";

    }else{
        foreach($lista as $evento){
            ?>
            <tr>
                <td> <?= $evento['nomeEvento'];?> </td>
                <td> <?= $evento['qtde'];?> </td>
                <td> <?= $evento['nomeFabricante'];?> </td>
                <td> <?= $evento['valorFinal'];?> </td>
                <td> 
                    <a href="eventoController.php?acao=altera&id = <?=$evento['idEvento'];?>"> Alterar </a> |
                    <a href="eventoController.php?acao=exclui&id = <?=$evento['idEvento'];?>">excluir </td>
            </tr>
            <?php

        }
    }
    ?>

</table>