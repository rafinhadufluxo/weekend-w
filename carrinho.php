<?php include "includes/cabecalho.php"; ?>
	<!-- area central com 3 colunas -->
	<div class="container">
	
		<section class="col-2">
			<?php
			include "includes/functions.php";
			if(!isset($_SESSION['carrinho'])){
				echo "<h2>Seu carrinho está vazio.";
			}
			else {
				?>
			<form action="fecharCompra.php" method="post">
				<table id="carrinho">
					<tr>
						<th>Produto</th>
						<th>Valor unitário</th>
						<th>Quantidade</th>
						<th>Total Produto</th>
						<th>Excluir</th>
					</tr>
					<?php
					$total = 0;
					foreach($_SESSION['carrinho'] as $id => $item){					
					?>
					<tr>
						<td><?=$item['nome'];?></td>
						<td class="celulaValor">R$ <span id="unitario<?=$id;?>"><?=str_replace(".", ",", number_format($item['valorFinal'], 2));?></span></td>
						<td><input type="number" value="<?=$item['quantidade'];?>" min="1" onchange="atualizaValor(<?=$id;?>, document.getElementById('unitario<?=$id;?>').innerHTML, this.value)"></td>
						<td class="celulaValor">R$ <span id="total<?=$id;?>" class="totalUni"><?=str_replace(".", ",", number_format($item['valorFinal'] * $item['quantidade'], 2));?></span></td>
						<td><a href="exclui.php?id=<?=$id;?>">X</a></td>
					</tr>
					<?php
					}
					?>					
					<tr class="linhaFinal">
						<td colspan="3">Total do pedido:</td>
						<td class="celulaValor">R$ <span id="totalPedido"></span></td>
						<td></td>
					</tr>
				
				</table>
		
				<br>
				<div class="botoes">
					<a href="index.php"><input type="button" name="" value ="Continuar comprando"></a>
					<input type="submit" name="finalizar" value ="Finalizar pedido" 
					onclick="return confirm('Tem certeza de que deseja finalizar seu pedido?')"></a>
				</div>
			</form>	
			<?php
			} // fecha else
			?>			
		</section>
        
	</div>
	<!-- fim area central -->
	<script src="js/carrinho.js"></script>
	<?php include "includes/rodape.php"; ?>	