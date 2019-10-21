<?php
require_once "BD.php";
class Produto{
	private $conexao;

	function __construct(){
		$this->conexao = new BD();
	}

	function consultaProduto($id){
		$sql = "SELECT produto.id as idProduto, produto.nome as nomeProduto, imagem, descricao,  
		qtde, valor,  as valorFinal, fabricante.id as idFabricante, 
		fabricante.nome as nomeFabricante FROM produto LEFT JOIN fabricante ON 
		produto.idFabricante = fabricante.id WHERE produto.id = $id";
		return $this->conexao->select($sql);	
	}

	function listarTodos($campo= "produto.nome", $ordem="asc"){
		$sql = "SELECT produto.id as idProduto, produto.nome as nomeProduto, imagem, descricao, 
		qtde, valor,  as valorFinal, fabricante.id as idFabricante, 
		fabricante.nome as nomeFabricante FROM produto LEFT JOIN fabricante 
		ON produto.idFabricante = fabricante.id order by $campo $ordem";
		
		return $this->conexao->select($sql);	
	}

	function cadastrar ($dados){
		$sql= "INSERT INTO produto(nome,idFabricante,imagem,descricao,qtde, valor, desconto) 
		VALUES('{$dados['nome']}',
			{$dados['idFabricante']},
			'{$dados['imagem']}',
			'{$dados['descricao']}',
			{$dados['qtd']},
			{$dados['valor']}";

		return $this->conexao->query($sql);

	}
	
	function alterar($dados){
		$sql= "UPDATE produto SET  nome = '{$dados['nome']}', idFabricante = '{$dados['idFabricante']}',
		    imagem = '{$dados['imagem']}', descricao = '{$dados['descricao']}', qtd =  '{$dados['qtd']}',
			valor = '{$dados['valor']}', WHERE id = {$dados ['$id']}";

		return $this->conexao->query($sql);

	}

	function excluir($id){
		$sql="DELETE FROM produto WHERE id=$id";
		return $this->conexao->query($sql);
	}

	function erro(){
		return $this->conexao->erro();
	}
}
?>