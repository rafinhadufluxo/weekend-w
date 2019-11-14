<?php include "cabecalhoAdm.php"; ?>



<div class="conteiner">
    <main>
        <?php
        require "../classes/Evento.php";
        require "../classes/Fabricante.php";
        require "../includes/functions.php";
        if(isset($_GET['acao'])){
            switch($_GET['acao']){
                case "cadastro":
                $titulo = "Cadastrar Evento";
                if(isset($_POST['cadastrar'])){
                    //dados foram submetidos
                    $dados = array();
                    $dados ['nome'] = $_POST['nome'];
                    $dados ['idFabricante'] = $_POST['idFabricante'] == 0 ?  'NULL' :  $_POST['idFabicante'];
                    $dados ['imagem'] = (!empty($_FILES['arquivos']['name']))? $_FILES['arquivos']['name'] :' ';
                    $dados['descricao'] = $_POST['descricao'];
                    $dados['qtde'] = isset($_POST['quantidade'])? $_POST['quantidade'] : 0;
                    $dados['valor'] = isset($_POST['valor'])? $_POST['valor'] : 0;

                    $evento = new Evento();
                    $resultado = $evento->cadastrar($dados);
                    if($resultado){
                        $mensagem = "O evento <strong> {$dados['nome']}</strong>
                                    foi cadastro com sucesso";

                                    //tenta upload
                        if(!move_uploaded_file($_FILES['arquivo']['tmp_name'],
                            "../img/vintage/{$_FILES['arquivo']['name']}")){
                            
                            $mensagem .= "<br> No entanto, a imagem não pode ser enviada. Contate o suporte";
                        }

                    }else{
                        $mensagem = "Erro. O evento <strong> {$dados['nome']}
                                        </strong> não foi cadastrado";
                        $mensagem .= $evento->erro();
                    }
                    include 'views/eventoConfirmacao.php';

                }else{
                    include "views/eventoCadastro.php";
                }

                break;

                case "altera":
                $titulo = "Alteração do evento";
                break;

                case "exclui":
                $titulo = "Exclusão do evento";
                break;
            };

        }
        else{

            $titulo = "relatorio de evento";
            $evento = new Evento();
            $lista = $evento->listarTodos();
            include "views/eventoIndex.php";

        };


    ?>

    </main>
    <br><br><br><br>
</div>

<?php include "rodapeAdm.php"; ?>