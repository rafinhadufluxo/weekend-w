<?php 
require_once ("BD.php");
class Pedido
{
    private $conexao;

    function __construct() {
        $this->conexao = new BD();
    }    
    
    function cadastrar() {

    	$data = date("Y-m-d H:i:s");
    	$this->conexao->query("start transaction");
    	$insere = $this->conexao->query("insert into compra (idCompra, idCliente, dataPedido) values ({$_SESSION['id']},{$_SESSION['id']},'$data')");
    	if($insere){
    		$this->conexao->query("set @numCompra = last_insert_id()");
    		foreach ($_SESSION['carrinho'] as $idProduto => $item){
    			$insereItem = $this->conexao->query("insert into itemCompra (numCompra, idEvento, quantidade) values (@numPedido, $idProduto, {$item['quantidade']})");
    			if(!$insereItem)
    				break;
    		}
    	}
    	if($insere && $insereItem)
    		$this->conexao->query("commit");
    	else
    		$this->conexao->query("rollback");

    	return ($insere && $insereItem);
    }
}
?>