<?php
require_once "BD.php";

class Evento{
	private $conexao;

	function __construct(){
		$this->conexao = new BD();
	}

	function consultaEvento($id){
		$sql = "SELECT evento.id as idEvento, evento.nome as nomeEvento, imagem, LocalEvento, dataEvento, descricao,  
		qtde, valor as valorFinal, fabricante.id as idFabricante, 
		fabricante.nome as nomeFabricante FROM evento LEFT JOIN fabricante ON 
		evento.idFabricante = fabricante.id WHERE evento.id = $id";
		return $this->conexao->select($sql);	
	}

	function listarTodos($campo= "evento.nome", $ordem="asc"){
		$sql = "SELECT evento.id as idEvento, evento.nome as nomeEvento, imagem, LocalEvento, dataEvento, descricao, 
		qtde, valor as valorFinal, fabricante.id as idFabricante, 
		fabricante.nome as nomeFabricante FROM evento LEFT JOIN fabricante 
		ON evento.idFabricante = fabricante.id order by $campo $ordem";
		
		return $this->conexao->select($sql);	
	}

	function filtroNovidades() {
        $sql = "SELECT * FROM evento ORDER BY id desc limit 10";
		$result = $this->conexao->query($sql);
        return $result;
    }

	function cadastrar ($dados){
		$sql= "INSERT INTO evento(nome,idFabricante,LocalEvento,dataEvento,descricao,qtde, valor) 
		VALUES('{$dados['nome']}',
			{$dados['idFabricante']},
			
			'{$dados['LocalEvento']}',
			'{$dados['dataEvento']}',
			'{$dados['descricao']}',
			{$dados['qtde']},
			{$dados['valor']})";

		return $this->conexao->query($sql);

	}
	function filtroBusca($palavraChave) {
        $sql = "SELECT * FROM evento where nome like '%{$palavraChave}%' ORDER BY nome";
        $result = $this->conexao->query($sql);
        return $result;
    } 
	
	function alterar($dados){
		
		$sql= "UPDATE evento SET  nome = '{$dados['nome']}', idFabricante = {$dados['idFabricante']},
		     LocalEvento = '{$dados['LocalEvento']}', dataEvento = '{$dados['dataEvento']}', descricao = '{$dados['descricao']}', qtde =  {$dados['qtde']},
			valor = {$dados['valor']} WHERE id = {$dados ['id']}";	
		return $this->conexao->query($sql);

	}


	function excluir($id){
		$sql="DELETE FROM evento WHERE id=$id";
		return $this->conexao->query($sql);
	}

	function erro(){
		return $this->conexao->erro();
	}
}
?>