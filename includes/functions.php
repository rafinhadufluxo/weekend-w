<?php
function mostraImagem($nomeArquivo){
	if($nomeArquivo =='')
		return "default.jpg";
	else
		return $nomeArquivo;
}

function formataPreco($valor){
	return "R$ ".str_replace(".", ",", number_format($valor, 2));
}
?>