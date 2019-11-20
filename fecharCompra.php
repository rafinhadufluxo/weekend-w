<?php include "includes/cabecalho.php"; 
if(!isset($_SESSION['id'])) // usuario nao logado
	header("Location: login.php");
?>
	<!-- area central com 3 colunas -->
	<div class="container">
		
		<section class="col-2">
			<h2>Finalizar compra</h2>
			<?php
			if(!isset($_SESSION['carrinho']))
				echo "<p>Seu carrinho está vazio</p>";
			else{
				if(isset($_POST['finalizar'])){
					include "classes/Compra.php";
					$novo = new Compra();
					if($novo->cadastrar()){
						echo "<p>Sua compra foi finalizado</p>";
						unset($_SESSION['carrinho']);
					}
					else{
						echo "<p>Ocorreu um erro ao registrar sua compra</p>";
					}

				}
			}
			?>
		</section>
       
	</div>
	<!-- fim area central -->
<?php include "includes/rodape.php"; ?>	