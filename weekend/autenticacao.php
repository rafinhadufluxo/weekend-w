<?php
include "classes/Cliente.php";
$client = new Cliente();
$dados = $client->autenticar($_POST['usuario']);



if(empty($dados)){ // usuario nao existe
	header("Location: login.php?erro=1");
}
else{ // usuario existe
	$pass = md5($_POST['senha']);
	if($pass != $dados[0]['senha']){
		header("Location: login.php?erro=2");
	}
	else{ // login e senha corretos
		session_start(); // abre uma nova sessao
		$_SESSION['nome'] = $dados[0]['nome']; 
		$_SESSION['id'] =  $dados[0]['id'];
		if(isset($_POST['lembrar'])){
			$expira = time() + 60 * 60 * 24 * 7;
			setcookie("nome", $dados[0]['nome'], $expira);
			setcookie("id", $dados[0]['id'], $expira);
	
		}
	
		header("Location: index.php");
	}
}
?>