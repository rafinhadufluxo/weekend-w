<?php
session_start();
$_SESSION['carrinho'][$_POST['idEvento']]['quantidade'] = $_POST['quantidade'];

// calculando total
$total = 0;
foreach ($_SESSION['carrinho'] as $evento) {
	$valorItem = $evento['quantidade'] * $evento['valorFinal'];
	$total += $valorItem;
}
echo $total; // retorna o novo total para o objeto req do navegador

?>