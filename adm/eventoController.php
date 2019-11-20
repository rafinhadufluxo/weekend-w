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
                $titulo = "Cadastro de Evento";
                if(isset($_POST['cadastrar'])){
                    //dados foram submetidos
                    $dados = array();
                    $dados ['nome'] = $_POST['nome'];
                    $dados ['idFabricante'] = $_POST['idFabricante'] == 0 ?  'NULL' :  $_POST['idFabricante'];
                    $dados ['imagem'] = (!empty($_FILES['arquivos']['name']))? $_FILES['arquivos']['name'] :' ';
                    $dados ['LocalEvento'] = $_POST['LocalEvento'];
                    $dados ['dataEvento'] = $_POST['dataEvento'];
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
                if(isset($_POST['alterar'])){
					//dados foram submetidos
                    $dados = array();
                    $dados ['id'] = $_GET['id'];
                    $dados ['nome'] = $_POST['nome'];
                    $dados ['idFabricante'] = $_POST['idFabricante'] == 0 ?  'NULL' :  $_POST['idFabricante'];
                    $dados ['imagem'] = (!empty($_FILES['arquivos']['name']))? $_FILES['arquivos']['name'] :' ';
                    $dados ['LocalEvento'] = $_POST['LocalEvento'];
                    $dados ['dataEvento'] = $_POST['dataEvento'];
                    $dados['descricao'] = $_POST['descricao'];
                    $dados['qtde'] = isset($_POST['quantidade'])? $_POST['quantidade'] : 0;
                    $dados['valor'] = isset($_POST['valor'])? $_POST['valor'] : 0;
					$evento = new Evento();
					$resultado = $evento->alterar($dados);
					if($resultado){
						$mensagem = "O evento <strong>{$dados['nome']}</strong> foi alterado com sucesso";
						// TENTA O UPLOAD
						if(!empty($_FILES['arquivo']['name'])){
							if(!move_uploaded_file($_FILES['arquivo']['tmp_name'], "../Img/vintage/{$_FILES['arquivo']['name']}")){
								$mensagem.="<br>No entanto, a imagem não pode ser enviada. Contate o suporte";
							}
						}
					}
					else{
						$mensagem = "Erro. O evento <strong>{$dados['nome']}</strong> não foi alterado";
						$mensagem .= $evento->erro();
					}
					include "views/eventoConfirmacao.php";
				}
				else{ // carrega dados atuais
					$evento = new Evento();
					$prod = $evento->consultaEvento($_GET['id']);
					include "views/eventoAltera.php";
				}
				break;
                
    

                case "exclui":
                    $titulo = "Exclusão de Evento";
                    if(is_numeric($_GET['id'])){
                        $evento = new Evento();
                        $resultado = $evento->excluir($_GET['id']);
                        if($resultado){
                            $mensagem = "Evento excluído com sucesso";
                        }
                        else{
                            $mensagem = "Erro. O evento não foi excluído<br>";
                            $mensagem .= $evento->erro();
                        }
                        
                    }
                    else{ // nao eh numero
                        $mensagem = "O formato do código do evento é inválido";
                    }
                    include "views/eventoConfirmacao.php";
                    break;		
            }

        }
        else{

            $titulo = "relatorio de evento";
            $evento = new Evento();
            $lista = $evento->listarTodos();
            if(isset($_GET['campo']) & isset($_GET['ordem']))
			    $lista = $evento->listarTodos($_GET['campo'], $_GET['ordem']);
		    else
			    $lista = $evento->listarTodos();
		    include "views/eventoIndex.php";
        };


    ?>

    </main>
    <br><br><br><br>
</div>

<?php include "rodapeAdm.php"; ?>