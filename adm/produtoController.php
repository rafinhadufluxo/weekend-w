<?php include "cabecalho.php"; ?>



<div class="conteiner">
    <main>
        <?php
        require "../classes/Produto.php";
        require "../classes/Fabricante.php";
        require "../includes/functions.php";
        if(isset($_GET['acao'])){
            switch($_GET['acao']){
                case "cadastro":
                $titulo = "Cadastrar Produto";
                if(isset($_POST['cadastrar'])){
                    //dados foram submetidos
                    $dados = array();
                    $dados ['nome'] = $_POST['nome'];
                    $dados ['idFabricante'] = $_POST['idFabricante'] == 0 ?  'NULL' :  $_POST['idFabicante'];
                    $dados ['imagem'] = (!empty($_FILES['arquivos']['name']))? $_FILES['arquivos']['name'] :' ';
                    $dados['descricao'] = $_POST['descricao'];
                    $dados['qtd'] = isset($_POST['quantidade'])? 1: 0;
                    $dados['valor'] = isset($_POST['valor'])? 1: 0;

                    $produto = new Produto();
                    $resultado = $produto->cadastrar($dados);
                    if($resultado){
                        $mensagem = "O produto <strong> {$dados['nome']}</strong>
                                    foi cadastro com sucesso";

                                    //tenta upload
                        if(!move_uploaded_file($_FILES['arquivo']['tmp_name'],
                            "../img/produtos/{$_FILES['arquivo']['name']}")){
                            
                            $mensagem .= "<br> No entanto, a imagem não pode ser enviada. Contate o suporte";
                        }

                    }else{
                        $mensagem = "Erro. O produto <strong> {$dados['nome']}
                                        </strong> não foi cadastrado";
                        $mensagem .= $produto->erro();
                    }
                    include 'views/produtoConfirmacao.php';

                }else{
                    include "views/produtoCadastro.php";
                }

                break;

                case "altera":
                $titulo = "Alteração de produto";
                break;

                case "exclui":
                $titulo = "Exclusão de Produto";
                break;
            };

        }
        else{

            $titulo = "relatorio de produtos";
            $produto = new Produto();
            $lista = $produto->listarTodos();
            include "views/produtoIndex.php";

        };


    ?>

    </main>
    <br><br><br><br>
</div>
<?php include "rodape.php"; ?>