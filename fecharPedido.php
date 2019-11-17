<?php
session_start();
if(!isset($_SESSION['login'])){			
	header("Location: login.php");
}

include "includes/conexao.php";
if(isset($_POST['finalizar'])){
	/* realizar a inserção na tabela pedido e, em seguida, dos itens presentes no carrinho na tabela pedido_itens. Após, desalocar o carrinho da sessão.
	No campo tipoEntrega: gravar 1 para grátis e 2 para receber em casa
	No campo dataPedido: usar funcao date('Y-m-d H:i:s')
	No campo status: gravar 1 */
	$tipoEntrega = ($_POST['taxa'] == 0) ? 1 : 2;
	$dataPedido = date('Y-m-d H:i:s');
	$sql = "insert into pedido (idCliente, taxaEntrega, tipoEntrega, dataPedido, status) values 
			({$_SESSION['id']}, {$_POST['taxa']}, $tipoEntrega, '$dataPedido', 1)";
	$resultado = mysqli_query($conexao, $sql);


	if($resultado){
		$sql = "select numero from pedido where idCliente = {$_SESSION['id']} order by numero desc limit 1"; // pega o último numero do pedido do cliente
		$resultado = mysqli_query($conexao, $sql);
		$numPedido = mysqli_fetch_array($resultado)[0];
		foreach ($_SESSION['carrinho'] as $idProduto => $item){
			// insere cada item do carrinho
			$sql = "insert into pedido_itens (numPedido, idProduto, quantidade, valorLocacao) values 
					($numPedido, $idProduto, {$item['quantidade']}, {$item['valorFinal']})";
			$resultado = mysqli_query($conexao, $sql);
		}
		$mensagem = "Seu pedido foi finalizado com sucesso. Acompanhe o status através da opção Minha Conta.";
		unset($_SESSION['carrinho']);
	}
	else {
		$mensagem = "Erro ao gravar o pedido";
	}
}
include "includes/cabecalho.php";
?>
	<!-- area central com 3 colunas -->
	<div class="container">
		<?php
		include "includes/menu_lateral.php";
		?>		

		<section class="col-2">
		<?php
		if(!isset($_POST['finalizar']) && !isset($_SESSION['carrinho'])){
			echo "<h2>Seu carrinho está vazio!</h2>";
		}
		else{
		?>
			<h2>Fechar pedido</h2>
			<?php
			if(!isset($_POST['finalizar'])){ // ainda nao confirmou, apresenta dados
			?>
			<hr>
			<p><strong>Escolha o tipo de entrega:</strong></p>
			<form method="post">
				<div class="form-item">
				 <label><input type="radio" name="taxa" value="0" id="retirar" checked onclick="taxaEntrega(this.value)">Retirar na loja (grátis)</label><br>
				  <label><input type="radio" name="taxa" value="20" id="retirar" onclick="taxaEntrega(this.value)">Receber em <em><?=$_SESSION['endereco'];?></em> (<strong>R$ 20,00</strong>)</label>
				</div>
				<hr>
				<?php
				include "includes/functions.php";
				echo "<p><strong>Confira seus produtos:</strong></p>";
				echo "<div class='itemCarrinho'>
						<span class='produtoCarrinho'><strong>Produto</strong></span>
						<span class='qtdeCarrinho'><strong>Quantidade</strong></span>
						<span class='precoCarrinho'><strong>Total do item</strong></span>
					</div>";
				$total = 0;
				foreach($_SESSION['carrinho'] as $idProduto => $item){
				?>
					<div class="itemCarrinho" id="<?=$idProduto?>">
						<span class="produtoCarrinho"><?=$item['nome'];?></span>
						<span class="qtdeCarrinho"><?=$item['quantidade'];?></span>
						<span class="precoCarrinho"><?=formataPreco($item['quantidade'] * $item['valorFinal']);?></span>
					</div>
					<?php
					$total += $item['quantidade'] * $item['valorFinal'];
				}
				?>
				<div class="itemCarrinho total">
					<span>Total em produtos:</span>
					<span class="precoCarrinho"><strong><?=formataPreco($total);?></strong></span>
					<input type="hidden" name="totalProdutos" id="totalProdutos" value="<?=$total;?>">
				</div>
				<div class="itemCarrinho total">
					<span>Taxa de Entrega:</span>
					<span class="precoCarrinho" id="taxaExibida"><strong><?=formataPreco(0);?></strong></span>					
				</div>
				<div class="itemCarrinho total">
					<span>TOTAL DO PEDIDO:</span>
					<span class="precoCarrinho" id="totalExibido"><strong><?=formataPreco($total);?></strong></span>	
				</div>
				<div class="botoes">
				<a href="carrinho.php"><button type="button">Voltar para o carrinho</button></a>
				<button type="submit" name="finalizar">Finalizar pedido</button>
				</div>
				</form>
				<?php
				}
				else{ 
					echo $mensagem;
				}
		}
		?>
		</section>
		
	</div>
	<!-- fim area central -->
<?php
include "includes/rodape.php";
?>
